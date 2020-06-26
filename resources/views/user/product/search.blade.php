@extends('layout.master')
@section('content')
<link rel="stylesheet" href="{{asset('css/home/home.css')}}">
<style>
    .item{
        display: flex;
        justify-content: space-between;
    }
    .item b{
        font-size: 30px;
    }
    .btn-option{
        display: flex;
    }
    .btn-option a{
        font-size: 20px;
        border: none;
        margin-left: 15px;
    }
    .container{
        margin-top: 100px;
        margin-bottom: 100px;
    }
    #menu{
        margin-left: 100px;
        display: flex;
        flex-wrap: wrap;
    }
    .item-new{
        margin-bottom: 50px;
    }
</style>
<div class="container">
    <div class="item">
        <div>
            <b>Tìm kiếm sản phẩm:</b>
            <span style="color: red;">
                 <b>< {{Session::get('search')}} ></b>
            </span>
        </div>
        <span class="btn-option">
            <a href="/search?sort=desc"><i class="fas fa-arrow-up"></i></a>
            <a href="/search?sort=asc"><i class="fas fa-arrow-down"></i></a>
        </span>
    </div>



    @if(isset($error))
        <h3  style="color: red;margin-bottom: 210px">{{$error}}</h3>
    @else
    <div id="menu">
        @foreach ($products as $product)
        <div class="item-new">
        <form action="/cart/{{$product->id}}" method="post">
        <a href="/details/{{$product->id}}">
            <img src="/storage/{{$product->image}}" alt="" height="200px" width="200px">
        </a>
                <p>{{$product->name}}</p>
                <p><b>{{number_format($product->price)}} đ</b></p>
                <form action="/cart/{{$product->id}}" method="post">
                    @csrf
                <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                </form>
        </form>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
