<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Order;
use App\Product;
use App\Setting;
use App\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use DB;
use Dompdf\Dompdf;
class ProductController extends Controller
{
    public function index(){

    }

    public function show($id){
        $product = Product::find($id);
        return view('product.show',[ 'product' => $product ]);

    }

    public function doOrder(Request $request){
        $data = $request->session()->get('basket');
        $user_id = Auth::user()->id;
        $products = Product::whereIn('id', array_keys($data))->get();


        $json_product = [];
        $customer_data = User::find(Auth::user()->id)->first()->toArray();

        foreach($products as $k => $product){
            $prod = $product->toArray();
            $prod['count'] = $data[$product->id];
            $prod['total_price_product'] = $product->price * $prod['count'];
            $prod['total_price_dph_product'] = ($product->price + ($product->dph * ($product->price/100))) * $prod['count'];
            $json_product[] = $prod;

        }

        $json_order_data = json_encode($json_product, JSON_UNESCAPED_UNICODE);
        $json_customer_data = json_encode($customer_data, JSON_UNESCAPED_UNICODE);

        $order = new Order();
        $order->user_id = $user_id;
        $order->json_order_data = $json_order_data;
        $order->json_customer_data = $json_customer_data;

        if($order->save()){
            $this->createNewInvoice($order);
        }

    }

    public function createNewInvoice($order){

        $pdf = new Dompdf();
        $year = date("Y");

        $last_invoice_number = DB::table('invoices')->whereYear('created_at', $year )->orderBy('id', 'desc')->first();
        $last_invoice = is_null($last_invoice_number) ? 0 : substr($last_invoice_number->invoice_number, -5);
        $invoice_number = $year.str_pad($last_invoice + 1, 5, '0', STR_PAD_LEFT);

        $html = view('pdf.invoice')
            ->with('order_data', json_decode($order->json_order_data))
            ->with('customer_data', json_decode($order->json_customer_data))
            ->with('company_data', Setting::all()->first())
            ->with('invoice_number', $invoice_number);

        /*$html = mb_convert_encoding($html,'HTML-ENTITIES', 'UTF-8');*/

        $pdf->loadHTML($html);
        $path = 'pdfs/'.$year.'/'.$invoice_number;
        $pdf->render();
        $pdf->stream($path);
        $output = $pdf->output();

        $dir = 'pdfs/'.$year;
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        file_put_contents($dir.'/'.$invoice_number.'.pdf', $output);

        $invoice = new Invoice();
        $invoice->order_id = $order->id;
        $invoice->invoice_number = $invoice_number;
        $invoice->url = $path.'.pdf';
        $invoice->save();

    }

    public function updateBasket()
    {

        $input = Input::only('quantity', 'product_id');
        if(isset($input['product_id'])){
            for($i = 0; $i < count($input['product_id']); $i++){
                Session::put('basket.'.$input['product_id'][$i], $input['quantity'][$i]);
            }
        }
        return redirect()->back();
    }

    public function proceedToCheckoutStep_1()
    {
        return view ('order.proceedToCheckoutStep_1', []);
    }

    public function basket(Request $request){
        $quantity =  $request->session()->get('basket');
        $product = new Product();
        $basket = ($quantity) ? $product->getHumanDataFromSessionForBasket($quantity): NULL;
        return view ('basket.index', ['basket' => $basket, 'quantity' => $quantity]);
    }

    public function addItemToBasket(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        $request->session()->put('basket.'.$id, $request->session()->get('basket.'.$id) + 1 );
        return redirect()->back();
    }

    public function addToBasket(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        if($request->session()->get('basket.'.$id)){
            $this->addItemToBasket($request, $id);
        }else{
            $request->session()->put('basket.'.$id, 1 );
        }
        return redirect()->back();
    }

    public function removeItemFromBasket(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }

        if($request->session()->get('basket.'.$id) == 1){
            Session::forget('basket.'.$id);
        }elseif($request->session()->get('basket.'.$id) > 1){
            $request->session()->put('basket.'.$id, $request->session()->get('basket.'.$id) - 1 );
        }

        return redirect()->back();

    }

    public function removeFromBasket(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }

        if($request->session()->get('basket.'.$id)){
            Session::forget('basket.'.$id);
        }
        return redirect()->back();
    }

    public function addToFavourites($id)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }

        $user = User::find(Auth::user()->id);
        if( $user->favourites->where('id', $id)->count() == 0){
            $user->favourites()->attach($id);
        }
        return redirect()->back();
    }

    public function removeFromFavourites($id)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }

        $user = User::find(Auth::user()->id);

        if( $user->favourites->where('id', $id)->count() > 0){
            $user->favourites()->detach($id);
        }
        return redirect()->back();
    }

    public function removeItemFromBasketAjax(Request $request, $id){

        if($request->session()->get('basket.'.$id)){
            Session::forget('basket.'.$id);
        }
        $quantity =  $request->session()->get('basket');
        $product = new Product();
        $basket = ($quantity) ? $product->getHumanDataFromSessionForBasket($quantity): NULL;
        $view = view ('basket._items', ['basket' => $basket, 'quantity' => $quantity])->render();

        return response()->json(['error'=>false, 'html' => $view]);
    }
}
