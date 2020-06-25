<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Amount;
use App\User;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    function index(){
        return view('admin.dashboard');
    }
    function addMoney(Request $request){
        $id_user = Auth::user()->id;
        $amount = new Amount();
        $money = $request->money;
        $amount->money = $money;
        $amount->status = 1;
        $amount->user_id = $id_user;
        $amount->save();
        return redirect('/home');
    }
    function showAmount(){
        $amounts = Amount::all();
        foreach ($amounts as $amount) {
            $amount->user;
        }
        return view('admin.amount.index',['amount'=>$amounts]);
    }
    function updateAmount($id,Request $request){
        $amounts = Amount::find($id);
        $amounts->status = 2;
        $amounts->save();

        $users = User::find($request->user_id);
        $users->amount = $users->amount+$request->money;
        $users->save();
        return redirect('/admin/amount');
    }
}
