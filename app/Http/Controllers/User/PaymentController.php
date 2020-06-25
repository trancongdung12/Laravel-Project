<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Cart;
use App\Profile;
use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller
{
    function index(){

        $category = Category::all();
        $id_user = Auth::user()->id;
            $carts = Cart::where('user_id',$id_user)->get();
            foreach ($carts as $cart) {
                $cart->products;
            }
        $profile = Profile::where('user_id',$id_user)->first();
        if($profile){
            return view('user.payment',['categories'=>$category,'carts'=>$carts,'profiles'=>$profile]);
        }else{
            return view('user.payment',['categories'=>$category,'carts'=>$carts]);
        }

    }

}
