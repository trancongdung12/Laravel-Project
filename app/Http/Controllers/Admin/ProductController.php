<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;
use App\DescriptionProduct;
use App\Http\Requests\EditProductRequest;
class ProductController extends Controller
{
    function create(){
        $category = Category::all();
        return view('admin.product.create',['categories'=>$category]);
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
   function store(EditProductRequest $request){
       $name = $request->input('name');
       $slug = $request->input('slug');
       $price = $request->input('price');
       $image = $request->file('image')->store('public/product');
       $category = $request->input('category');
       $quantity = $request->input('quantity');
       $detail =  $request->description;

       $products = new Product();
       $products->name = $name;
       $products->slug = $slug;
       $products->price = $price;
       $products->image= $image;
       $products->category_id = $category;
       $products->quantity = $quantity;
       $products->save();

       $desc = new DescriptionProduct();
       $desc->product_id = $products->id;
       $desc->content = $detail;
       $desc->save();
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
