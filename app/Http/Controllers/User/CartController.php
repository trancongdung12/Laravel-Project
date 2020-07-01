<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Cart;
use App\Category;
use App\Discount;

class CartController extends Controller
{
    function index(){
        if(Auth::user()){
            if(Session::get('countCart')!=0){
            $category = Category::all();
            $id_user = Auth::user()->id;
            $carts = Cart::where('user_id',$id_user)->get();
            foreach ($carts as $cart) {
                $cart->products;
            }
                return view('user.cart',['categories'=>$category,'cart'=>$carts]);
            }else{
                return redirect('/home')->with('status','Giỏ hàng trống!');
            }
        }else{
            return redirect()->route('auth.login',['error'=>'Bạn phải đăng nhập trước khi thêm vào giỏ hàng']);
        }
    }

    function store($id_product){
        if(Auth::user()){
        $id_user = Auth::user()->id;
        $cart = Cart::where('product_id',$id_product)->first();
        if($cart){
                $carts= Cart::find($cart->id);
                $carts->quantity = $cart->quantity+1;
                $carts->save();
            }else{
                $carts = new Cart;
                $carts->user_id = $id_user;
                $carts->product_id = $id_product;
                $carts->quantity = 1;
                $carts->save();
            }
             return redirect('/home')->with('status','Thêm vào giỏ hàng thành công!');
        }else{
            return redirect('/home')->with('status','Bạn chưa đăng nhập!');
        }
    }
    function cartDetail($slug,$id_product,Request $request){
        if(Auth::user()){
            $qty = $request->input('qty-cart');
            Session::put('countCart',$qty);
            $id_user = Auth::user()->id;
            $cart = DB::table('carts')->where('user_id',$id_user)->where('product_id',$id_product)->first();
            if($cart){
                DB::table('carts')->where('id',$cart->id)->update(['quantity'=>$cart->quantity+$qty]);
            }else{
                DB::table('carts')->insert(['user_id'=>$id_user,'product_id'=>$id_product,'quantity'=>$qty]);
            }
            return redirect('/cart')->with('status','Thêm vào giỏ hàng thành công!');
        }else{
            return redirect('/details/'.$slug.'_'.$id_product)->with('status','Bạn chưa đăng nhập!');
        }
    }
    function update($id,Request $request){
            $qty = $request->input('qty-cart');
            $carts = Cart::find($id);
            $carts->quantity = $qty;
            $carts->save();
            return redirect('/cart')->with('status','Cập nhật thành công!');;
    }
    function destroy($id){
        Cart::find($id)->delete();
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        $count = 0;
            foreach ( $carts as $cart) {
               $count += $cart->quantity;
            }
            Session::put('countCart', $count);
        return redirect('/cart')->with('status','Xóa thành công!');
    }
    function discount(Request $request){
            $code = strtoupper($request->input('discount'));
            $discounts = Discount::all();
            foreach ($discounts as $discount) {
                if($code == $discount->code){
                    Session::put('discount',$discount->code);
                    Session::put('percent',$discount->percent);
                 return redirect()->route('user.cart');
                }
            }


    }
}
