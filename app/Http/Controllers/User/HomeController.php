<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Cart;
use App\DescriptionProduct;

class HomeController extends Controller
{
    function index(){
        $getAllProduct = Product::all();
        $product = Product::all()->take(4);
        $category = Category::all();
        foreach($category as $item){
            $item->products;
        }
         //echo "<pre>".json_encode($category,JSON_PRETTY_PRINT)."</pre>";
        $hotphone = Product::all()->take(3);
        if(Auth::user()){
            $carts = Cart::where('user_id',Auth::user()->id)->get();
            $count = 0;
            foreach ( $carts as $cart) {
               $count += $cart->quantity;
            }
            Session::put('countCart', $count);
        }
        return view('user.home',['product'=>$product,'hotphone'=>$hotphone,'categories'=>$category,'getAllProducts'=>$getAllProduct]);
    }
    function details($id){
        $category = Category::all();
        $getProduct = Product::find($id);
        $detail = DescriptionProduct::where('product_id',$id)->first();
        $sameproduct= Product::where('category_id',$getProduct->category_id)->limit(4)->get();
        return view('user.product.details',['product'=>$getProduct,'detail'=>$detail,'sameproduct'=>$sameproduct,'categories'=>$category]);
     }
}
