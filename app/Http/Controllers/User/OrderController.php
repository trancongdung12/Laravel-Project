<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Cart;
use App\Profile;
use App\Order;
use App\User;
class OrderController extends Controller
{
    function store(Request $request){


        $type =$request->type;
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $note = $request->note;
        if($note==null){
            $note = " ";
        }
        $user_id = Auth::user()->id;
        $total = Session::get('total');
        if(Session::get('discount')!=null){
            $codeDiscount = Session::get('discount');
            $percentDiscount = Session::get('percent');
        }else{
            $codeDiscount = '';
            $percentDiscount = '';
        }

        $carts = Cart::where('user_id',$user_id)->get();
        foreach ($carts as $cart) {
            $cart->products;
        }
        foreach ($carts as $cart) {
           foreach ($cart->products as $product) {
            $arrayProduct[] = array(
            'name'=>$product->name,
            'price'=>$product->price,
            'quantity'=>$cart->quantity
                );
           }
        }
        $detail = json_encode($arrayProduct);

        if($type=='online'){
            $amount = Auth::user()->amount;
            if($amount<$total){
                return redirect()->route('user.payment',['error'=>'Số tiền trong tài khoản của bạn không đủ! Vui lòng nạp thêm tiền']);
            }else{
            foreach ($carts as $cart) {
                Cart::find($cart->id)->delete();
            }
            $users = User::find($user_id);
            $users->amount = $users->amount-$total;
            $users->save();

            $orders = new Order;
            $orders->user_id = $user_id;
            $orders->detail = $detail;
            $orders->total = $total;
            $orders->code = $codeDiscount;
            $orders->percent = (float)$percentDiscount;
            $orders->type = $type;
            $orders->status = 1;
            $orders->name = $name;
            $orders->address = $address;
            $orders->phone = $phone;
            $orders->note = $note;
            $orders->save();
            }
        }else{
            foreach ($carts as $cart) {
                Cart::find($cart->id)->delete();
            }
            $orders = new Order;
            $orders->user_id = $user_id;
            $orders->detail = $detail;
            $orders->total = $total;
            $orders->code = $codeDiscount;
            $orders->percent = (float)$percentDiscount;
            $orders->type = $type;
            $orders->status = 1;
            $orders->name = $name;
            $orders->address = $address;
            $orders->phone = $phone;
            $orders->note = $note;
            $orders->save();
        }


        $pro = Profile::where('user_id', $user_id)->get();
        if (count($pro)>0) {
            Profile::where('user_id', $user_id)->delete();
            $profiles = new Profile;
            $profiles->user_id = $user_id;
            $profiles->name = $name;
            $profiles->address = $address;
            $profiles->phone = $phone;
            $profiles->note = $note;
            $profiles->save();
        }else{
            $profiles = new Profile;
            $profiles->user_id = $user_id;
            $profiles->name = $name;
            $profiles->address = $address;
            $profiles->phone = $phone;
            if ($profiles->note==null) {
                $profiles->note = " ";
            } else {
                $profiles->note = $note;
            }
            $profiles->save();
        }

        return redirect('/home');

    }
}
