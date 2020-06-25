@extends('layout.adminMaster')
@section('content')
<div class="page-container" style="margin-top: 15px">
    <div class="container" style="background-color: white">
        <h1>Thêm sản phẩm</h1>
        <hr>
        <form action="/product/store" method="post" enctype="multipart/form-data" style="padding: 0px 40px;display:flex">
            @csrf
            <div class="form-left">
            <div class="form-group">
              <label for="exampleInputEmail1">Tên sản phẩm</label>
              <input type="text" style="width: 300px" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Giá</label>
              <input type="text" name="price" style="width: 300px" class="form-control" id="exampleInputPassword1" placeholder="Price">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Số Lượng</label>
                <input type="text" name="quantity" style="width: 300px" class="form-control" id="exampleInputPassword1" placeholder="Quantity">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Loại</label>
                <select  class="form-control"  onchange="select()" name="category" id="type-product" style="width: 300px" >
                    <option value="phone">Phone</option>
                    <option value="ipod">Ipod</option>
                </select>

              </div>
              <div class="form-group">
                <label for="inputGroupFile04">Ảnh</label>
                <div class="input-group">

                <div class="custom-file">
                  <input type="file" name="image"  class="custom-file-input" id="inputGroupFile04">
                  <label class="custom-file-label"  style="width: 300px" for="inputGroupFile04">Choose file</label>
                </div>
              </div>
              </div>
              <button style="margin-top: 20px" type="submit" class="btn btn-primary">Add</button>
            </div>


            <div id="iphone" class="phone-form" style="margin-left: 200px;">
                <div class="form-group">
                    <label for="exampleInputEmail1">Màn hình</label>
                    <input type="text" style="width: 300px" name="screen" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="IPS LCD, 6.1, IPS LCD, 16 triệu màu">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Hệ điều hành</label>
                    <input type="text" style="width: 300px" name="system" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="iOS 12">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Camera sau</label>
                    <input type="text" style="width: 300px" name="backcam" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="12 MP">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Camera trước</label>
                    <input type="text" style="width: 300px" name="frontcam" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="7 MP">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">CPU</label>
                    <input type="text" style="width: 300px" name="cpu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Apple A12 Bionic 6 nhân">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">RAM</label>
                    <input type="text" style="width: 300px" name="ram" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="3G">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Bộ nhớ trong</label>
                    <input type="text" style="width: 300px" name="store" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="64 GB">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Thẻ sim</label>
                    <input type="text" style="width: 300px" name="sim" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Nano SIM, Hỗ trợ 4G">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Dung lượng pin</label>
                    <input type="text" style="width: 300px" name="pin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="2942 mAh, có sạc nhanh">
                </div>

            </div>
            <div id="ipod" class="ipod-form" style="margin-left: 200px;display: none">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kích thước</label>
                    <input type="text" style="width: 300px" name="ipodsize" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="16.5 x 18.0 x 40.5 mm">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Trọng lượng</label>
                    <input type="text" style="width: 300px" name="ipodweight" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="4g">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Pin</label>
                    <input type="text" style="width: 300px" name="ipodpin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value=" 5 giờ chơi nhạc, 3 giờ gọi thoại">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tính năng khác</label>
                    <input type="text" style="width: 300px" name="ipodfeature" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Hỗ trợ Hey Siri, con chip H1 mới">
                </div>


            </div>



          </form>
    </div>
</div>
<script>
    function select(){
      var type =  document.getElementById('type-product').value;
      if(type=='ipod'){
        document.getElementById('ipod').style.display= 'block';
        document.getElementById('iphone').style.display= 'none';
      }else{
        document.getElementById('iphone').style.display= 'block';
        document.getElementById('ipod').style.display= 'none';
      }
    }
</script>
@endsection
