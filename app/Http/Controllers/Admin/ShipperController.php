<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class ShipperController extends Controller
{
    function index(){
        $order = Order::all();
        return view('admin.ship.index',['orders'=>$order]);
    }
    function shipped($id){
        $order = Order::find($id);
        $order->status = 3;
        $order->save();
        return redirect('/admin/ship');
    }
}
