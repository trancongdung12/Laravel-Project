<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckLoginRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('auth.login',['error'=>'Bạn phải đăng nhập']);
        }
        else if(Auth::user()->role!='admin'){
            return redirect()->route('auth.login',['error'=>'Bạn phải đăng nhập admin']);
        }
        return $next($request);
    }
}