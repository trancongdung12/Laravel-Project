<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Ship;
class OrderController extends Controller
{
    function index(){
        $user = User::where('role','shipper')->get();
        $order = Order::all();
        $shipper = Ship::all();
        foreach($shipper as $ship){
            $ship->users;
        }
        //echo "<pre>".json_encode($shipper,JSON_PRETTY_PRINT)."</pre>";
        return view('admin.order.index',['shipper'=>$shipper,'users'=>$user,'orders'=>$order]);
    }
    function accept($id,Request $request){
        $order = Order::find($id);
        $order->status = 2;
        $order->save();

        $ship = new Ship();
        $ship->user_id = $request->shipper;
        $ship->order_id =$id;
        $ship->save();
        return redirect('/admin/order');
    }
}
