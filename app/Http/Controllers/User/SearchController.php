<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Category;
class SearchController extends Controller
{
    function index(Request $request){
        $categories = Category::all();
        $txt =$request->input('txtsearch');
        $product = Product::where('name','LIKE','%'.$txt.'%')->get();
        if($txt!=null){
            Session::put('search',$txt);
        }
        if($request->sort =="desc"){
            $product = Product::where('name','LIKE','%'.Session::get('search').'%')->orderBy('price','desc')->get();
        }else if($request->sort =="asc"){
            $product = Product::where('name','LIKE','%'.Session::get('search').'%')->orderBy('price','asc')->get();
        }
        if(count($product)>0){
            return view('user.product.search',['products'=>$product,'categories'=>$categories]);
        }else{
            return view('user.product.search',['error'=>'Không tìm thấy sản phẩm của bạn','categories'=>$categories]);
        }
    }
}
