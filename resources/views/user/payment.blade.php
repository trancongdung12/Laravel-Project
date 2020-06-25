@extends('layout.master')
@section('content')
    <link rel="stylesheet" href="{{asset('css/home/payment.css')}}">
    <div class="container" style="margin-top: 100px">
           <form class="form-payment" action="/order" method="post">
            @csrf
               <div class="left-form">
                <p class="header">THÔNG TIN THANH TOÁN</p>
                 <div class="form-item">
                        <label for="">Tên Người Nhận <span style="color: red">*</span></label>
                 <input name="name" value="@if(isset($profiles)){{$profiles->name}}@endif" type="text" required>
                 </div>
                 <div class="form-item">
                    <label for="">Địa chỉ  <span style="color: red">*</span></label>
                    <input name="address" value="@if(isset($profiles)){{$profiles->address}}@endif" type="text" required>
                </div>
                <div class="form-item">
                <label for="">Số điện thoại <span style="color: red">*</span></label>
                <input name="phone" value="@if(isset($profiles)){{$profiles->phone}}@endif" type="text" required>
                </div>

                <div class="form-item">
                    <label for="">Ghi chú (tùy chọn)</label>
                    <textarea name="note" id="" cols="30" rows="3"></textarea>
                </div>

            </div>
            <div class="right-form">
                <p class="header">ĐƠN HÀNG CỦA BẠN</p>
                <div class="space-row">
                        <b>SẢN PHẨM</b> <b>TỔNG</b>
                </div>
                <hr>
                    @foreach ($carts as $cart)
                        @foreach ($cart->products as $product)
                    <div class="space-row">
                        <span>
                        <input disabled  name="name_product" class="input-hide" value="{{$product->name}}" type="text">
                            <b style="color: red"> x
                            {{$cart->quantity}}
                            </b>
                        </span>
                        <b>
                            {{$cart->getFormatedNumber($cart->quantity*$product->price)}}
                        </b>
                    </div>
                     @endforeach
                     @endforeach

                <hr>
                <div class="space-row">
                    <b>Tổng phụ</b> <b>
                        {{number_format(Session::get('total'))}} đ
                    </b>
               </div>
               <hr>
               <div class="space-row">
                <b>Giao hàng</b> <span>Giao hàng miễn phí</span>
                </div>
                <hr>
                <div class="space-row">
                <b>Tổng</b> <b>
                    {{number_format(Session::get('total'))}} đ
                </b>
                </div>
                <hr>

                <div class="checkbox">
                    Hình thức thoanh toán
                    <select name="type" id="">
                        <option value="money" checked>Trả tiền khi nhận hàng</option>
                        <option value="online">Thanh toán online 21APAY</option>
                    </select>
                </div>
                    <button type="submit" class="btn-pay">Đặt hàng</button>
            </div>
           </form>
    </div>
    @endsection
