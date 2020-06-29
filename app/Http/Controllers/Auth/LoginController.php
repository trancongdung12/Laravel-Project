<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
class LoginController extends Controller
{
    function index(){
        return view('auth.login');
    }
    function login(LoginRequest $request){
        $username = $request->input('username');
        $password = $request->input('password');
        if(Auth::attempt(['username' => $username, 'password' => $password])){
            $user = Auth::user();
            if($user->role=='admin'){
                return redirect('admin/dashboard');
            }else if($user->role=='shipper'){
                     return redirect('admin/ship');
                }else{
                    return redirect()->route('user.home');
                }
        }else{
            return redirect()->route('auth.login',['error'=>'Sai tên đăng nhập hoặc mật khẩu']);
         }
    }
}
