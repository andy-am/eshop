<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Faker\Provider\fr_FR\Person;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Favourite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(){

    }

    public function show($id){
        $product = Product::find($id);
        return view('product.show',[ 'product' => $product ]);

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
        //dd($request->session()->get('basket'));
        $quantity =  $request->session()->get('basket');
        $product = new Product();
        $basket = ($quantity) ? $product->getHumanDataFromSessionForBasket($quantity): NULL;
       /* dump($quantity);
        dump($basket);
        die();*/
        return view ('basket.index', ['basket' => $basket, 'quantity' => $quantity]);
    }

    public function addItemToBasket(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }

        $request->session()->put('basket.'.$id, $request->session()->get('basket.'.$id) + 1 );

        /*dump( $request->session()->all());*/
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

        /*dump( $request->session()->all());*/
        return redirect()->back();

    }

    public function removeItemFromBasket(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }

        if($request->session()->get('basket.'.$id) == 1){
            Session::forget('basket.'.$id);
            //Session::forget('basket');
        }elseif($request->session()->get('basket.'.$id) > 1){
            $request->session()->put('basket.'.$id, $request->session()->get('basket.'.$id) - 1 );
        }

        /*dump( $request->session()->all());*/
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

        /*dump( $request->session()->all());*/
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
}
