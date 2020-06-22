@extends('layout.master')
@section('content')
<link rel="stylesheet" href="{{asset('css/home/home.css')}}">
<body >
        @if(Request::get('errorcart'))
       <p style="margin-left: 200px;color: red;font-weight: bold">{{Request::get('errorcart')}}</p>
        @endif
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="storage/public/slide3.jpg" alt="First slide" height="500px" >
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="storage/public/slide2.jpg" alt="Second slide" height="500px" >
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="storage/public/slide1.png" alt="Third slide" height="500px" >
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
           <!------------------ Hover Effect Style : Demo - 8 --------------->
        <div class="container mt-40" style="margin-top: 50px">

            {{-- <div class="row mt-30">
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
            </div> --}}
        </div>
        <div class="container" id="recommend">

        <ul id="menu">
            <li id="item1" class="active" onclick="item(1)"><a>SẢN PHẨM MỚI</a></li>
            <li id="item2" class="none" onclick="item(2)"><a >SẢN PHẨM BÁN CHẠY</a></li>
            <li id="item3" class="none" onclick="item(3)"><a>SẢN PHẨM PHỔ BIẾN</a></li>
        </ul>
        <hr class="hr-commend">

        <div class="tab-content">
            {{-- <div id="menu1">
            @foreach ($product as $itemphone)
            @if($itemphone->category=='phone')
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
            @endif
            @endforeach
            </div> --}}
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
            <div id="menu3"  style="display: none">
                <div class="item-new">
                    <img src="https://24hstore.vn/images/products/2019/11/29/large/iPhone-11-3.jpg" alt="" height="200px" width="200px">
                    <p>Iphone X</p>
                    <p><b>10,230,000 đ</b></p>
                    <button class="btn btn-danger">Thêm vào giỏ hàng</button>
            </div>
            </div>
        </div>
        {{-- <div class="container" id="other" style="margin-top: 100px">
               <p class="txt-other"> PHỤ KIỆN KHÁC</p>
               <hr class="hr-commend">
               <div style="display: flex;margin-left: 50px">
                @foreach ($product as $itemphone)
                @if($itemphone->category=='ipod')
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
            @endif
            @endforeach
               </div>
        </div> --}}
        </div>
        <script>
            function item(id){
                if(id==3){
                    document.getElementById('menu3').style.display = "flex";
                    document.getElementById('menu2').style.display = 'none';
                    document.getElementById('menu1').style.display = 'none';
                    document.getElementById("item1").className = "none";
                    document.getElementById("item3").className = "active";
                    document.getElementById("item2").className = "none";
                }
                if(id==2){
                    document.getElementById('menu2').style.display = "flex";
                    document.getElementById('menu1').style.display = 'none';
                    document.getElementById('menu3').style.display = 'none';
                    document.getElementById("item1").className = "none";
                    document.getElementById("item2").className = "active";
                    document.getElementById("item3").className = "none";
                }
                if(id==1){
                    document.getElementById('menu1').style.display = "flex";
                    document.getElementById('menu2').style.display = 'none';
                    document.getElementById('menu3').style.display = 'none';
                    document.getElementById("item2").className = "none";
                    document.getElementById("item1").className = "active";
                    document.getElementById("item3").className = "none";
                }

            }
        </script>
</body>
@endsection
