@extends('layout.master')
@section('content')
<link rel="stylesheet" href="{{asset('css/home/home.css')}}">
<style>
    .btn-option button{
        border: none;
        background: red;
        color: white;
    }
</style>
<div class="container">
    <h2>Tìm kiếm sản phẩm: <<span style="color: red;">
        {{-- {{$message}} --}}
    </span>></h2>
    <p>Sắp xếp sản phẩm</p>
    <span class="btn-option">
        <form action="/search/desc" method="post">
            @csrf
        <button><i class="fas fa-arrow-up"></i></button>
        </form>
        <button><i class="fas fa-arrow-down"></i></button>
    </span>

    {{-- @if(isset($error))
        <h3  style="color: red;margin-bottom: 210px">{{$error}}</h3>
    @else
    <div id="menu1" style="display: flex">
        @foreach ($phone as $itemphone)
        <div class="item-new">
        <form action="/cart/{{$itemphone->id}}" method="post">
        <a href="/details/{{$itemphone->id}}">
            <img src="/storage/{{$itemphone->image}}" alt="" height="200px" width="200px">
        </a>
                <p>{{$itemphone->name}}</p>
                <p><b>{{number_format($itemphone->price)}} đ</b></p>
                <form action="/cart/{{$itemphone->id}}" method="post">
                    @csrf
                <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                </form>
        </form>
        </div>
        @endforeach
        </div>
    @endif --}}
</div>
@endsection
