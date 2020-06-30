<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Cart;
use App\Profile;
use App\Order;
use App\Product;
use App\Sale;
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
            'image'=>$product->image,
            'name'=>$product->name,
            'price'=>$product->price,
            'quantity'=>$cart->quantity
                );
           }
        }
        $detail = json_encode($arrayProduct);
        //Thanh toán online
        if($type=='online'){
            $amount = Auth::user()->amount;
            if($amount<$total){
                return redirect()->route('user.payment',['error'=>'Số tiền trong tài khoản của bạn không đủ! Vui lòng nạp thêm tiền']);
            }else{
            //Trừ số lượng sản phẩm
            foreach ($carts as $cart) {
            $products = Product::find($cart->product_id);
            $products->quantity = $products->quantity - $cart->quantity;
            $products->save();
            }
            //Thêm vào bảng tính số lượng bán
            foreach ($carts as $cart) {
                //Sản phẩm đã có hay chưa
                $count = Sale::where('product_id',$cart->product_id)->count();
                if($count>0){
                    $sales = Sale::where('product_id',$cart->product_id)->first();
                    $sales->quantity =$sales->quantity+$cart->quantity;
                }else{
                    $sales = new Sale();
                    $sales->product_id =  $cart->product_id;
                    $sales->quantity =  $cart->quantity;
                }
                $sales->save();
            }
            //Xóa giỏ hàng
            foreach ($carts as $cart) {
                Cart::find($cart->id)->delete();
            }
            //Trừ tiền trong tài khoản
            $users = User::find($user_id);
            $users->amount = $users->amount-$total;
            $users->save();

            //Lưu vào order
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
            //Trừ số lượng sản phẩm
            foreach ($carts as $cart) {
                $products = Product::find($cart->product_id);
                $products->quantity = $products->quantity - $cart->quantity;
                $products->save();
                }
                //Thêm vào bảng tính số lượng bán
                foreach ($carts as $cart) {
                    //Sản phẩm đã có hay chưa
                    $count = Sale::where('product_id',$cart->product_id)->count();
                    if($count>0){
                        $sales = Sale::where('product_id',$cart->product_id)->first();
                        $sales->quantity =$sales->quantity+$cart->quantity;
                    }else{
                        $sales = new Sale();
                        $sales->product_id =  $cart->product_id;
                        $sales->quantity =  $cart->quantity;
                    }
                    $sales->save();
            }
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

        return redirect('/home')->with('status','Thanh toán thành công. Bạn có thể xin chi tiết đơn hàng trong lịch sử mua hàng!');;

    }
}
