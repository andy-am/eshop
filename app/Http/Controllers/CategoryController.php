<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::paginate(3);
        return view('categories.index',['categories' => $categories, 'products' => $products ]);
    }
}
