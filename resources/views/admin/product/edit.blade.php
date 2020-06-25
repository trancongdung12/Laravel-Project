@extends('layout.adminMaster')
@section('content')
<div class="page-container" style="margin-top: 15px">
    <div class="container" style="background-color: white">
        <h1>Cập nhật sản phẩm</h1>
        <hr>
    <form action="/product/{{$pro->id}}" method="post" enctype="multipart/form-data" style="padding: 0px 40px">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
            <input type="text" style="width: 300px" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" value="{{$pro->name}}">

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Price</label>
              <input type="text" name="price" style="width: 300px" class="form-control" id="exampleInputPassword1" placeholder="Price" value="{{$pro->price}}">
            </div>
            <label for="inputGroupFile04">Image</label>
            <div class="input-group">

                <div class="custom-file">
                  <input type="file" name="image"  class="custom-file-input" id="inputGroupFile04">
                  <label class="custom-file-label"  style="width: 300px" for="inputGroupFile04">Choose file</label>
                </div>
              </div>
            <button style="margin-top: 20px" type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>
</div>
@endsection
