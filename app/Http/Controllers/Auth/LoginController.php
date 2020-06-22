<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    function index(){
        return view('auth.login');
    }
    function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        if(Auth::attempt(['username' => $username, 'password' => $password])){
            $user = Auth::user();
            if($user->role=='user'){
                return redirect()->route('user.home');
            }else{
                return redirect('admin/dashboard');
            }
        }else{
            return redirect()->route('auth.login',['error'=>'Sai tên đăng nhập hoặc mật khẩu']);
         }
    }
}
