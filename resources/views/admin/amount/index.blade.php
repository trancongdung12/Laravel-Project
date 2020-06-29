@extends('layout.adminMaster')
@section('title', 'Amount')
@section('content')
<div class="page-container" style="margin-top: 15px">
    <div class="container" style="background-color: white;height: 900px">
        <h1>Show amount</h1>
        <hr>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Money</th>
                <th scope="col">Status</th>
                <th ></th>
              </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($amount as $item)
              <tr>
                <th scope="row"><?php echo $i++; ?></th>
                <td>{{$item->user->name}}</td>
                <td>{{number_format($item->money)}} đ</td>
                <td>
                    @if($item->status == 1)
                    <button class="btn btn-danger">Processing</button>
                    @elseif($item->status == 2)
                    <button class="btn btn-success">Success</button>
                    @endif
                </td>
                <td style="display: flex">
                    @if($item->status == 1)
                    <form action="/admin/amount/{{$item->id}}/update" method="post" >
                        @csrf
                        <input type="text" name="user_id" hidden value="{{$item->user->id}}">
                        <input type="text" name="money" hidden value="{{$item->money}}">
                        <button type="submit" class="btn btn-success"><i style="color: white" class="fas fa-check"></i></button>
                    </form>
                    @endif
                    <form action="/admin/amount/{{$item->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button style="margin-left: 10px" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
