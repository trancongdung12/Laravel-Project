<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
class ProductController extends Controller
{
    function create(){
        return view('admin.product.create');
   }
   function index(Request $request){
    $page = $request->page;
    $allproduct = Product::all()->skip($page * 5)->take(5);
    if($allproduct->isEmpty()){ //Nếu photo lớn hơn số lượng trong database sẽ trả về 0
        $allproduct = Product::all()->take(5);
        return redirect('/product?page=0');
    }else if($page<0){
        $totalPage = round(count(Product::all())/5)-1;
        return redirect('/product?page='.$totalPage);
    }

    return view('admin.product.index', ['product'=>$allproduct, "page" => $page]);
   }
   function store(Request $request){
       $name = $request->input('name');
       $price = $request->input('price');
       $image = $request->file('image')->store('public');
       $category = $request->input('category');
       $quantity = $request->input('quantity');
       $detail = $request->input('screen').'//'.$request->input('system').'//'.$request->input('backcam').'//'.$request->input('frontcam')
       .'//'.$request->input('cpu').'//'.$request->input('ram').'//'.$request->input('store').'//'.$request->input('sim').'//'.$request->input('pin');
       echo $detail;
       DB::table('product')->insert(['name'=>$name,'price'=>$price,'image'=>$image,'quantity'=>$quantity,'category'=>$category,'detail'=>$detail]);
       return redirect('/product/');
   }
   function destroy($id){
       Product::find($id)->delete();
       return redirect('/product/');
   }
   function edit($id){
    $getProduct= Product::find($id);
      return view('admin.product.edit',['pro'=>$getProduct]);
   }
   function update($id,Request $request){
       $name = $request->input('name');
       $price = $request->input('price');
       $image = $request->file('image')->store('public');
       DB::table('product')->where('id','=',$id)->update(['name'=>$name,'price'=>$price,'price'=>$price,'image'=>$image]);
       return redirect('/product/');
   }
}
