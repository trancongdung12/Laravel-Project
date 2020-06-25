<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
class OrderController extends Controller
{
    function index(){
        $order = Order::all();
        return view('admin.order.index',['orders'=>$order]);
    }
    function accept($id){
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        return redirect('/admin/order');
    }
}
