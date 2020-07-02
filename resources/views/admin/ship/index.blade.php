<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <title>Shipper</title>
</head>
<style>
    .waring{
        color: red;
    }
</style>
<body>
<div class="page-container" style="margin-top: 15px;">
    <div class="container" style="background-color: white;height: 800px">
        <h1>Ship order</h1>
        <h2>Hello {{Auth::user()->name}}</h2>
        <form action="/home/logout" method="get">
            <button class="btn btn-danger">Log out</button>
        </form>
        <hr>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Product</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Total</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($ship as $item)
              <tr>
                <th scope="row"><?php echo $i++; ?></th>
                <td>{{$item->orders->name}}</td>
                <td>
                     @foreach(json_decode($item->orders->detail) as $product)
                     {{$product->name .' , '}}
                     @endforeach
                </td>
                <td>{{$item->orders->address}}</td>
                <td>{{$item->orders->phone}}</td>
                <td>
                    @if($item->orders->type =='online')
                        0 đ
                    @else
                    {{number_format($item->orders->total)}} đ
                    @endif
                </td>
                <td>
                    @if($item->orders->type =='money')
                    Thanh toán sau khi nhận hàng
                    @else
                    Đã thanh toán online
                    @endif
                </td>
                <td>
                    @if($item->orders->status == 1)
                    <p class="waring">Processing</p>
                    @elseif($item->orders->status == 2)
                    <p class="waring">Shipping</p>
                    @elseif($item->orders->status == 3)
                    <p class="waring">Shipped</p>
                    @endif
                </td>
                <td style="display: flex">
                    @if($item->orders->status == 2)
                    <form action="/admin/{{$item->orders->id}}/shipped" method="post" >
                        @csrf
                        <button type="submit" class="btn btn-success">Shipped</button>
                    </form>
                    @endif
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>
