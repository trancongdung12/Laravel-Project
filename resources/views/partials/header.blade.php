<link rel="stylesheet" href="{{asset('css/home/header.css')}}">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><i class="fa fa-cube"></i> DUNGX<b>PHONE</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="/home"><i class="fa fa-home"></i> Trang chủ</a>
            </li>
            <li class="nav-item dropmenu">
              <div class="dropdown">
                <a class="nav-link dropbtn" href="#"><i class="fa fa-crosshairs"></i> Loại</a>
                <div class="dropdown-content">
                    @foreach($categories as $category)
                    <a onclick="scrollPage({{$category->id}})">{{$category->name}}</a>
                    @endforeach
                </div>
              </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-address-card"></i> Về chúng tôi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-phone-volume"></i> Liên hệ</a>
              </li>
            <li>
                <form class="form-inline my-2 my-lg-0" action="/search">
                    <input class="form-control mr-sm-2" name="txtsearch" type="search" placeholder="Tìm kiếm ....">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                  </form>
            </li>
          </ul>

          <ul class="navbar-nav my-2 mt-lg-0">
              @if(Auth::user())
              <li class="nav-item money">{{number_format(Auth::user()->amount)}} đ</li>
            <li class="nav-item">
                <a class="nav-link" href="/cart"><i class="fa fa-shopping-cart"></i> Giỏ hàng ({{Session::get('countCart')}})</a>
              </li>

            <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><i class="fa fa-user"></i> {{Auth::user()->name}} <b class="caret"></b></a>
                <div class="dropdown-menu" id="dropmenu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-address-card"></i></i> Nạp tiền</a>
                    <a class="dropdown-item" type="button" data-toggle="modal" data-target="#historyModal""><i class="fas fa-history"></i></i> Lịch sử mua hàng</a>
                    <a class="dropdown-item" href="/home/logout"><i class="fa fa-sign-out-alt"></i> Đăng xuất</a>
                  </div>
            </li>
            @else
            <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><i class="fa fa-user"></i> Đăng nhập/ Đăng ký <b class="caret"></b></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/home/login"><i class="fa fa-sign-in-alt"></i> Đăng nhập</a>
                    <a class="dropdown-item" href="/home/register"><i class="fa fa-sign-out-alt"></i> Đăng ký</a>
                  </div>
            </li>
            @endif
        </ul>
        </div>
</nav>
