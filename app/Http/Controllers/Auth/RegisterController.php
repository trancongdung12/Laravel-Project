<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{

    function index(){
        return view('auth.register');
    }
    function register(Request $request){
        $name = $request->input('name');
        $username = $request->input('username');
        $password = $request->input('password');
        DB::table('users')->insert(['name'=>$name,'username'=>$username,'password'=>Hash::make($password),'role'=>'user']);
        return redirect('/home/login');
    }
}
