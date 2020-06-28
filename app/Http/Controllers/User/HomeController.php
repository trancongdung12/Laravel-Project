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
use App\Comment;
use App\DescriptionProduct;
use App\Order;
use App\Rate;
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
            $id_user = Auth::user()->id;
            $order = Order::where('user_id',$id_user)->get();
            $carts = Cart::where('user_id',$id_user)->get();
            $count = 0;
            foreach ( $carts as $cart) {
               $count += $cart->quantity;
            }
            Session::put('countCart', $count);
            return view('user.home',['orders'=>$order,'product'=>$product,'hotphone'=>$hotphone,'categories'=>$category,'getAllProducts'=>$getAllProduct]);

        }else{
            return view('user.home',['product'=>$product,'hotphone'=>$hotphone,'categories'=>$category,'getAllProducts'=>$getAllProduct]);

        }
    }
    function details($id){
        $id_user = Auth::user()->id;
        $category = Category::all();
        $getProduct = Product::find($id);
        $detail = DescriptionProduct::where('product_id',$id)->first();
        $sameproduct= Product::where('category_id',$getProduct->category_id)->limit(4)->get();
        $comment = Comment::where('product_id',$id)->orderBy('id','desc')->get();
        foreach ($comment as $comments) {
            $comments->users;
        }
        $rate = Rate::where(['product_id'=>$id,'user_id'=>$id_user])->get();
        $checkRated = count($rate);


        //Rate Percent
        $rates = Rate::where('product_id',$id)->sum('quantity');
        $count = Rate::where('product_id',$id)->count();
        $total= array(round($rates/$count),$count);
          //echo "<pre>".json_encode($rates/$count,JSON_PRETTY_PRINT)."</pre>";
        return view('user.product.details',['rates'=>$total,'checkRated'=>$checkRated,'comments'=>$comment,'product'=>$getProduct,'detail'=>$detail,'sameproduct'=>$sameproduct,'categories'=>$category]);
     }
     function addComment(Request $request){
         $content = $request->content;
         $id_product= $request->product_id;
         $id_user = Auth::user()->id;
         $comments = new Comment();
         $comments->user_id = $id_user;
         $comments->product_id = $id_product;
         $comments->content = $content;
         $comments->save();
         return redirect('/details/'.$id_product);
     }
     function rate($qty,$id_product){
        $id_user = Auth::user()->id;
        $rates = new Rate();
        $rates->user_id= $id_user;
        $rates->product_id = $id_product;
        $rates->quantity = $qty;
        $rates->save();
        return redirect('/details/'.$id_product);
     }

}
