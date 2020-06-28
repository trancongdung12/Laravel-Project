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
                        <form action="/details/cart/{{$product->id}}" method="post">
                        <input type="number" name="qty-cart" min="1" max="{{$product->quantity}}" value="1">
                            @csrf
                        <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                         </form>
                    </div>
                    <div class="item-star">
                        <img src="/storage/public/star/five.png" alt="" width="150px">{{"(".$rates[1].")"}}

                    </div>
                    @if(Auth::user())
                        @if($checkRated == 1)
                        <button class="btn btn-warning" >Bạn đã đánh giá sản phẩm</button>
                        @else
                        <button class="btn btn-purpel" data-toggle="modal" data-target="#exampleModal">Đánh giá sản phẩm</button>
                        @endif
                    @else
                        <button class="btn btn-purpel" onclick="alert('Bạn phải đăng nhập trước khi đánh giá')">Đánh giá sản phẩm</button>
                    @endif
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Đánh giá sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <a type="submit" href="/rate-star-1/{{$product->id}}" class="btn-none"><span id="star-1" class="fa fa-star" onmouseover="rate(1)"></span></a>
                                <a  type="submit" href="/rate-star-2/{{$product->id}}"  class="btn-none"><span id="star-2" class="fa fa-star" onmouseover="rate(2)"></span></a>
                                <a  type="submit" href="/rate-star-3/{{$product->id}}"  class="btn-none"><span id="star-3" class="fa fa-star" onmouseover="rate(3)"></span></a>
                                <a  type="submit" href="/rate-star-4/{{$product->id}}"  class="btn-none"><span id="star-4" class="fa fa-star" onmouseover="rate(4)"></span></a>
                                <a type="submit" href="/rate-star-5/{{$product->id}}"  class="btn-none"><span id="star-5" class="fa fa-star" onmouseover="rate(5)"></span></a>
                            </div>
                            </div>
                            <div class="modal-footer">
                        </div>
                    </div>
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
    <script src="{{asset('js/home.js')}}"> </script>
</div>

@endsection
