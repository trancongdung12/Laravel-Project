@extends('layout.master')
@section('content')
<link rel="stylesheet" href="{{asset('css/home/details.css')}}">
<div class="container" style="margin-bottom: 50px">
    <div class="container-form">
        <div class="container-left">
        <img src="/storage/{{$product->image}}" alt="" height="500px" width="450px">
        </div>
        <div  class="container-right">
                <p>{{$product->name}}</p>
                <hr>
                <p>{{number_format($product->price)}} đ</p>
                <div>
                    <div style="display: flex">
                        <form action="/details/cart/{{$product->product_id}}" method="post">
                        <input type="number" name="qty-cart" min="1" max="{{$product->quantity}}" value="1">
                            @csrf
                        <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                         </form>
                    </div>
                    <div class="item-star">
                        <img src="/storage/public/star/five.png" alt="" width="150px">
                    </div>
                </div>
                <div class="tableparameter">


                    <p>Thông số kỹ thuật</p>
                    <ul class="parameter">
                    {{-- @if($product->category=='phone') --}}
                        <li><b>Màn hình:</b><span>{{$detail->content}}</span></li>
                        {{-- <li><b>Hệ điều hành:</b><span>{{$detail[1]}}</span></li>
                        <li><b>Camera sau:</b><span>{{$detail[2]}}</span></li>
                        <li><b>Camera trước:</b><span>{{$detail[3]}}</span></li>
                        <li><b>CPU:</b><span>{{$detail[4]}}</span></li>
                        <li><b>RAM:</b><span>{{$detail[5]}}</span></li>
                        <li><b>Bộ nhớ trong:</b><span>{{$detail[6]}}</span></li>
                        <li><b>Thẻ SIM:</b><span>{{$detail[7]}}</span></li>
                        <li><b>Dung lượng pin:</b><span>{{$detail[8]}}</span></li> --}}
                    {{-- @else
                        <li><b>Kích thước:</b><span>{{$detail[0]}}</span></li>
                        <li><b>trọng lượng:</b><span>{{$detail[1]}}</span></li>
                        <li><b>Pin:</b><span>{{$detail[2]}}</span></li>
                        <li><b>Tính năng khác:</b><span>{{$detail[3]}}</span></li>
                    @endif --}}
                    </ul>


               </div>

        </div>

    </div>
</div>
<div class="container">
    <div class="item-comment" id="comment">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th class="id-item" scope="col">#</th>
                <th class="id-item" scope="col">Tài khoản</th>
                <th scope="col">Nội dung</th>
              </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                <div class="item-scroll">
                    @foreach($comments as $comment)
                <tr>
                <th  scope="row">{{++$i}}</th>
                <th>{{$comment->users->name}}</th>
                <td>{{$comment->content}}</td>
                </tr>
                    @endforeach
              </div>
            </tbody>
        </table>
    </div>
    <div class="last-item">
        <form action="/add-comment" method="post">
            @csrf
            <input type="text" name="product_id" hidden value="{{$detail->product_id}}">
            @if(Auth::user())
            <td><textarea name="content" id="" cols="30" rows="3"></textarea></td>
            <td><button type="submit" class="btn btn-warning">Thêm bình luận</button></td>
            @endif
        </form>

    </div>
</div>
<div class="container" id="other">
    <p class="txt-other"> SẢN PHẨM TƯƠNG TỰ</p>
    <hr class="hr-commend">
    <div style="display: flex;margin-left: 50px">
        @foreach ($sameproduct as $item)
         <div class="item-new">
         <img src="/storage/{{$item->image}}" alt="" height="200px" width="200px">
         <p>{{$item->name}}</p>
         <p><b>{{number_format($item->price)}} đ</b></p>
         <button class="btn btn-danger">Thêm vào giỏ hàng</button>
         </div>
         @endforeach
    </div>

</div>

@endsection