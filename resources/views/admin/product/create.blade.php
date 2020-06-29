@extends('layout.adminMaster')
@section('title', 'Add Product')
@section('content')
<div class="page-container" style="margin-top: 15px">
    <div class="container" style="background-color: white">
        <h1>Thêm sản phẩm</h1>
        <hr>
        <form action="/product/store" method="post" enctype="multipart/form-data" style="padding: 0px 40px;display:flex">
            @csrf
            <div class="form-left">
                <div class="form-group">
                    @error('slug')
                    <div style="color: red">{{$message}}</div>
                    @enderror
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" style="width: 300px" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Slug">
                  </div>
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
                    @foreach ($categories as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
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
                    <label for="exampleFormControlTextarea1">Mô tả sản phẩm</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" cols="50" rows="10"></textarea>
                  </div>

          </form>
    </div>
</div>
<script>
    function select(){
      var type =  document.getElementById('type-product').value;
      if(type=='1'){
        document.getElementById('ipod').style.display= 'block';
        document.getElementById('iphone').style.display= 'none';
      }else{
        document.getElementById('iphone').style.display= 'block';
        document.getElementById('ipod').style.display= 'none';
      }
    }
</script>
@endsection
