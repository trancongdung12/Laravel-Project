<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Ship;
use Illuminate\Support\Facades\Auth;

class ShipperController extends Controller
{
    function index(){
        $id = Auth::user()->id;
        $ship =Ship::where('user_id',$id)->get();
        foreach($ship as $ships){
            $ships->orders;
        }
        //echo "<pre>".json_encode($ship,JSON_PRETTY_PRINT)."</pre>";

        return view('admin.ship.index',['ship'=>$ship]);
    }
    function shipped($id){
        $order = Order::find($id);
        $order->status = 3;
        $order->save();
        return redirect('/admin/ship');
    }
}
