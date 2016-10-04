<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function favourites(){
        if(!Auth::check()){
            // Auth::user()->id
            return redirect()->back();
        }
        $user =  User::find(Auth::user()->id);
        return view('user.favourites',['products' => $user->favourites ]);
    }



}
