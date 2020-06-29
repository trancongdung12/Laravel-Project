@extends('layout.master')
@section('title', 'Thanh Toán')
@section('content')
    <link rel="stylesheet" href="{{asset('css/home/payment.css')}}">
    <div class="container">
            <p style="color: red;font-weight: bold">{{Request::get('error')}}</p>
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
                   <?php $total = 0 ?>
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
                    <?php $total += $cart->quantity*$product->price?>
                     @endforeach
                     @endforeach

                <hr>
                <div class="space-row">
                    <b>Tổng phụ</b> <b>
                        {{number_format($total)}} đ
                    </b>
               </div>
               <hr>
               @if(Session::get('discount'))
                    <div class="space-row">
                       <span style="font-weight: bold">Giảm giá</span> <b style="color: red">{{number_format($discount=$total*Session::get('percent'))}} đ</b>
                    </div>
                @endif
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
                    <b>Hình thức thoanh toán</b>
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
