@extends('layout.adminMaster')
@section('title', 'Product')
@section('content')
<div class="page-container" style="margin-top: 15px">
    <div class="container" style="background-color: white">
        <h1>Show product</h1>
        <hr>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th ></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
              <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{number_format($item->price)}}</td>
                <td><img src="/storage/{{$item->image}}" alt="" height="50px" width="50px"></td>
                <td style="display: flex">
                    <form action="/product/{{$item->id}}/edit" method="get" >
                        @csrf
                        <button type="submit" class="btn btn-dark"><i style="color: white" class="fas fa-edit"></i></button>
                    </form>
                    <form action="/product/{{$item->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button style="margin-left: 10px" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>

                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
        <a href="/product?page={{$page-1}}">Previous</a>
        <a href="/product?page={{$page+1}}">Next</a>
    </div>
    </div>
@endsection
