@extends('layout.master')
@section('title', 'Trang Chủ')
@section('content')
<link rel="stylesheet" href="{{asset('css/home/home.css')}}">
<body >
          <img class="header-img" src="/storage/public/slide.png" alt="">
           <!------------------ Hover Effect Style : Demo - 8 --------------->
           @if (session('status'))
            <script>
                alert('{{session('status')}}');
            </script>
           @endif
        <div class="container mt-40" style="margin-top: 50px">

            <div class="row mt-30">
                @foreach ($hotphone as $hot)
                <div class="col-md-4 col-sm-6">
                    <div class="box8">
                    <img src="storage/{{$hot->image}}">
                      <h3 class="title">{{$hot->name}}</h3>
                        <div class="box-content">
                            <ul class="icon">
                                <li class="detail"><a href="/details/{{$hot->slug."_".$hot->id}}"><i class="fas fa-search">Chi tiết</i> </a> </li>
                                <form action="/cart/{{$hot->id}}" method="post">
                                    @csrf
                                <li><button type="submit"><a  href="#"><i class="fas fa-shopping-cart">Giỏ hàng</i> </a></button> </li>
                                 </form>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nạp tiền vào tài khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="/add-money" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="money" class="form-control"placeholder="Số tiền">
                      </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Nạp</button>
                </form>
                </div>
            </div>
            </div>
        </div>
        @if(Auth::user())
        <!-- Model -->
        <div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lịch sử mua hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" style="overflow-y: auto;height: 300px;">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Tên</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Ghi chú</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Mã</th>
                            <th scope="col">Giảm giá</th>
                            <th scope="col">Thanh toán</th>
                            <th scope="col">Tổng</th>
                            <th scope="col">Tình trạng</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)

                          <tr>
                            <td>{{$order->name}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->note}}</td>
                            <td style="display: flex">
                                @foreach(json_decode($order->detail) as $products)
                                <img src="/storage/{{$products->image}}" height="50px" width="50px">
                                <div style="width: 120px;">
                                    <p>{{$products->name}}</p>
                                    <b>{{number_format($products->price)}} đ x {{$products->quantity}}</b>
                                </div>
                                @endforeach
                            </td>
                            <td>{{$order->code}}</td>
                            <td>{{$order->percent*100}}%</td>
                            <td>
                                @if($order->type =='money')
                                Thanh toán sau khi nhận hàng
                                @else
                                Thanh toán online
                                @endif
                            </td>
                            <td  style="width: 120px;">{{number_format($order->total)}}  đ</td>
                            <td>
                                @if($order->status == 1)
                                <button class="btn btn-danger">Đang xử lý</button>
                                @elseif($order->status == 2)
                                <button class="btn btn-primary">Đang giao hàng</button>
                                @elseif($order->status == 3)
                                <button class="btn btn-success">Thành công</button>
                                @endif
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                    <div class="modal-footer">

                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
        @endif
        <div class="container" id="recommend">

        <ul id="menu">
            <li id="item1" class="active" onclick="item(1)"><a>SẢN PHẨM MỚI NHẤT</a></li>
            <li id="item2" class="none" onclick="item(2)"><a >SẢN PHẨM BÁN CHẠY</a></li>
        </ul>
        <hr class="hr-commend">

        <div class="tab-content">
            <div id="menu1">
            @foreach ($product as $itemphone)

            <div class="item-new">
            <form action="/cart/{{$itemphone->id}}" method="post">
            <a href="details/{{$itemphone->slug."_".$itemphone->id}}">
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

            <?php $i = 0 ?>
            @foreach ($product as $products)
                    <div class="item-respon" style="display: none">
                        <form action="/cart/{{$products->id}}" method="post">
                        <a href="details/{{$products->slug."_".$products->id}}">
                            <img src="/storage/{{$products->image}}" alt="" height="200px" width="200px">
                        </a>
                                <p>{{$products->name}}</p>
                                <p><b>{{number_format($products->price)}} đ</b></p>
                                <form action="/cart/{{$products->id}}" method="post">
                                    @csrf
                                <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                                </form>
                        </form>
                        </div>
                    <?php $i++ ?>
                    @if($i==2) @break @endif

            @endforeach
        </div>
        <div id="menu2">
            <?php $i = 0 ?>
            @foreach ($sales as $sale)
                    <div class="item-new">
                        <form action="/cart/{{$sale->products->id}}" method="post">
                        <a href="details/{{$sale->products->slug."_".$sale->products->id}}">
                            <img src="/storage/{{$sale->products->image}}" alt="" height="200px" width="200px">
                        </a>
                                <p>{{$sale->products->name}}</p>
                                <p><b>{{number_format($sale->products->price)}} đ</b></p>
                                <form action="/cart/{{$sale->products->id}}" method="post">
                                    @csrf
                                <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                                </form>
                        </form>
                        </div>
                    <?php $i++ ?>
                    @if($i==4)
                    <a href="/view-more" class="next"><i class="fa fa-chevron-circle-right"></i></a>
                    @break @endif

            @endforeach
            <?php $i = 0 ?>
            @foreach ($product as $products)
                    <div class="item-respon" style="display: none">
                        <form action="/cart/{{$products->id}}" method="post">
                        <a href="details/{{$products->slug."_".$products->id}}">
                            <img src="/storage/{{$products->image}}" alt="" height="200px" width="200px">
                        </a>
                                <p>{{$products->name}}</p>
                                <p><b>{{number_format($products->price)}} đ</b></p>
                                <form action="/cart/{{$products->id}}" method="post">
                                    @csrf
                                <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                                </form>
                        </form>
                        </div>
                    <?php $i++ ?>
                    @if($i==2) @break @endif

            @endforeach
        </div>
        </div>
        @foreach ($categories as $category)
        <div id="scrollID{{$category->id}}">
        <div class="container" id="other" style="margin-top: 100px">
        <p class="txt-other" > {{$category->getToupperName()}}</p>
               <hr class="hr-commend">
               <div class="contain-item">
            <?php $i = 0 ?>
            @foreach ($category->products as $products)
                    <div class="item-new">
                        <form action="/cart/{{$products->id}}" method="post">
                        <a href="details/{{$products->slug."_".$products->id}}">
                            <img src="/storage/{{$products->image}}" alt="" height="200px" width="200px">
                        </a>
                                <p>{{$products->name}}</p>
                                <p><b>{{number_format($products->price)}} đ</b></p>
                                <form action="/cart/{{$products->id}}" method="post">
                                    @csrf
                                <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                                </form>
                        </form>
                        </div>
                    <?php $i++ ?>
                    @if($i==4) @break @endif

            @endforeach
            @if(count($category->products)>4)
               <a href="/view-more" class="next"><i class="fa fa-chevron-circle-right"></i></a>
            @endif
            <?php $i = 0 ?>
            @foreach ($category->products as $products)
                    <div class="item-respon" style="display: none">
                        <form action="/cart/{{$products->id}}" method="post">
                        <a href="details/{{$products->slug."_".$products->id}}">
                            <img src="/storage/{{$products->image}}" alt="" height="200px" width="200px">
                        </a>
                                <p>{{$products->name}}</p>
                                <p><b>{{number_format($products->price)}} đ</b></p>
                                <form action="/cart/{{$products->id}}" method="post">
                                    @csrf
                                <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                                </form>
                        </form>
                        </div>
                    <?php $i++ ?>
                    @if($i==2) @break @endif

            @endforeach
            </div>
        </div>
    </div>
        @endforeach
        </div>

    <script src="{{asset('js/home.js')}}"> </script>
</body>
@endsection
