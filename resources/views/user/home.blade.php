@extends('layout.master')
@section('content')
<link rel="stylesheet" href="{{asset('css/home/home.css')}}">
<body >
          <img class="header-img" src="/storage/public/slide.png" alt="">
           <!------------------ Hover Effect Style : Demo - 8 --------------->
        <div class="container mt-40" style="margin-top: 50px">

            <div class="row mt-30">
                @foreach ($hotphone as $hot)
                <div class="col-md-4 col-sm-6">
                    <div class="box8">
                    <img src="storage/{{$hot->image}}">
                      <h3 class="title">{{$hot->name}}</h3>
                        <div class="box-content">
                            <ul class="icon">
                                <li class="detail"><a href="/details/{{$hot->id}}"><i class="fas fa-search">Chi tiết</i> </a> </li>
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
        <div class="container" id="recommend">

        <ul id="menu">
            <li id="item1" class="active" onclick="item(1)"><a>SẢN PHẨM MỚI NHẤT</a></li>
            <li id="item2" class="none" onclick="item(2)"><a >SẢN PHẨM BÁN CHẠY</a></li>
            {{-- <li id="item3" class="none" onclick="item(3)"><a>SẢN PHẨM PHỔ BIẾN</a></li> --}}
        </ul>
        <hr class="hr-commend">

        <div class="tab-content">
            <div id="menu1">
            @foreach ($product as $itemphone)

            <div class="item-new">
            <form action="/cart/{{$itemphone->id}}" method="post">
            <a href="details/{{$itemphone->id}}">
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
            <div id="menu2">
                <div class="item-new">
                    <img src="https://didongviet.vn/pub/media/catalog/product/cache/926507dc7f93631a094422215b778fe0/i/p/iphone-11-siver-didongviet_16_1.jpg" alt="" height="200px" width="200px">
                    <p>Iphone X</p>
                    <p><b>10,230,000 đ</b></p>
                    <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                </div>
                <div class="item-new">
                    <img src="https://didongviet.vn/pub/media/catalog/product/cache/926507dc7f93631a094422215b778fe0/i/p/iphone-11-siver-didongviet_16_1.jpg" alt="" height="200px" width="200px">
                    <p>Iphone X</p>
                    <p><b>10,230,000 đ</b></p>
                    <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                </div>
            </div>
        </div>
        @foreach ($categories as $category)
        <div id="scrollID{{$category->id}}">
        <div class="container" id="other" style="margin-top: 100px">
        <p class="txt-other" > {{$category->getToupperName()}}</p>
               <hr class="hr-commend">
               <div style="display: flex;margin-left: 50px">
                @foreach ($getAllProducts as $item)
                 @if($item->category_id==$category->id)
                <div class="item-new">
                <form action="/cart/{{$item->id}}" method="post">
                <a href="details/{{$item->id}}">
                    <img src="/storage/{{$item->image}}" alt="" height="200px" width="200px">
                </a>
                        <p>{{$item->name}}</p>
                        <p><b>{{number_format($item->price)}} đ</b></p>
                        <form action="/cart/{{$item->id}}" method="post">
                            @csrf
                        <button class="btn btn-danger">Thêm vào giỏ hàng</button>
                        </form>
                </form>
                </div>
             @endif
            @endforeach
               </div>
        </div>
    </div>
        @endforeach
        </div>
        <script>
            function item(id){
                if(id==2){
                    document.getElementById('menu2').style.display = "flex";
                    document.getElementById('menu1').style.display = 'none';
                    document.getElementById("item1").className = "none";
                    document.getElementById("item2").className = "active";
                }
                if(id==1){
                    document.getElementById('menu1').style.display = "flex";
                    document.getElementById('menu2').style.display = 'none';
                    document.getElementById("item2").className = "none";
                    document.getElementById("item1").className = "active";

                }

            }
            function scrollPage(id) {
              var item =   document.getElementById("scrollID"+id);
              window.scrollTo(item.offsetLeft,item.offsetTop-100);
            }
        </script>
</body>
@endsection
