<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Order;
use App\User;
use App\Ship;
use PDF;
class ExportController extends Controller
{
    function excel(){
        return Excel::download(new OrderExport, 'orders.xlsx');
   }
   function pdf()
    {
        $user = User::where('role','shipper')->get();
        $order = Order::all();
        $shipper = Ship::all();
        foreach($shipper as $ship){
            $ship->users;
        }
    	$data = ['shipper'=>$shipper,'users'=>$user,'orders'=>$order];
    	$pdf = PDF::loadView('admin.order.exportPDF',$data);
    		return $pdf->download('order.pdf');
    }
}
