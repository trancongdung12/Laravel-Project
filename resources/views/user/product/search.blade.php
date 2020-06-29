@extends('layout.master')
@section('title', 'Tìm Kiếm')
@section('content')
<link rel="stylesheet" href="{{asset('css/home/search.css')}}">

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
