@extends('layout.master')
@section('content')
<link rel="stylesheet" href="{{asset('css/home/cart.css')}}">
        <div class="container" style="margin-top: 100px">
                <p style="color: red">{{Request::get('message')}}</p>
                <div class="form" style="display: flex">

                    <div class="left-form">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $total =0; ?>
                                @foreach ($cart as $carts)
                                @foreach ($carts->products as $products)
                              <tr >
                                <td>
                                    <img src="/storage/{{$products->image}}" alt="Image" height="100px" width="100px">
                                    <b>{{$products->name}}</b>
                                </td>
                                <td class="td-cart">{{$carts->getFormatedNumber($products->price)}}</td>
                                <td class="td-cart">
                                    <form action="/cart/{{$carts->id}}" method="post">
                                        @method('PATCH')
                                        @csrf
                                    <input type="number" name="qty-cart" value="{{$carts->quantity}}" min="1" max="{{$products->quantity}}">
                                    <button class="btn-update-cart">Cập nhật</button>
                                     </form>
                                </td>
                                <td  class="td-cart">{{$carts->getFormatedNumber($carts->getTotalProduct($products->price))}}</td>
                                <td> <form action="/cart/{{$carts->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button style="background:none;border:none" type="submit"><i class="fas fa-trash-alt"></i></button>
                                </form></td>

                              </tr>
                              <?php
                                   $total += $carts->quantity*$products->price;
                              ?>
                              @endforeach
                              @endforeach
                              {{Session::put('total', $total)}}
                            </tbody>
                        </table>
                        <div style="margin-left: 50px">
                            <form action="/home" method="get">
                            <button class="btn-countinue" type="submit"><i class="fas fa-long-arrow-alt-left"></i>TIẾP TỤC XEM SẢN PHẨM</button>
                            </form>

                        </div>
                    </div>
                    <div class="right-form" >
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Tổng số lượng</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr >
                                <td id="col-space"><span>Tổng phụ </span><b>{{number_format(Session::get('total'))}} đ</b></td>
                              </tr>
                              <tr >
                                <td  id="col-space"><span>Giao hàng</span> <b>Giao hàng miễn phí</b></td>
                              </tr>
                              <thead>
                                @if(Session::get('discount'))
                                <tr>
                                    <th  style="color:red"  id="col-space" scope="col"><span>Giảm giá</span> <b>{{number_format($discount=$total*Session::get('percent'))}} đ</b></th>
                                </tr>
                                {{Session::put('total',Session::get('total')-$discount)}}
                                @endif
                                <tr>
                                  <th  id="col-space" scope="col"><span>Tổng</span> <b>{{number_format(Session::get('total'))}} đ</b></th>
                                </tr>
                              </thead>
                              <tr>
                                    <td>
                                        <form action="/payment" method="get">
                                            @csrf
                                            <button class="btn-pay">TIẾN HÀNH THANH TOÁN</button>
                                        </form>
                                    </td>
                              </tr>
                              <thead>
                                <tr>
                                  <th scope="col"><i class="fas fa-tags"></i> Phiếu ưu đãi</th>
                                </tr>
                              </thead>
                              <tr>
                                  <td><form action="/discount/cart" method="post">
                                    @csrf
                                    <small style="color:red">Nhập mã: 'BANCUADUNG' để được giảm 25%</small>
                                    <input class="discount" name="discount" type="text" placeholder="Mã ưu đãi">
                                    @if(Session::get('discount'))
                                    <small style="color:red;font-weight: bold">Đã nhập mã '{{Session::get('discount')}}' giảm {{Session::get('percent')*100}}%</small>
                                    @endif
                                </td>
                              </tr>
                              <tr>
                                <td>

                                    <button class="btn-primary">Áp Dụng</button></form>
                                </td>
                              </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endsection
