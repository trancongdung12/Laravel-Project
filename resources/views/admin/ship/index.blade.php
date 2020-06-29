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
<body>
<div class="page-container" style="margin-top: 15px;">
    <div class="container" style="background-color: white;height: 800px">
        <h1>Ship order</h1>
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
                @foreach ($orders as $item)
              <tr>
                <th scope="row"><?php echo $i++; ?></th>
                <td>{{$item->name}}</td>
                <td>
                     @foreach(json_decode($item->detail) as $product)
                     {{$product->name .' , '}}
                     @endforeach
                </td>
                <td>{{$item->address}}</td>
                <td>{{$item->phone}}</td>
                <td>
                    @if($item->type =='online')
                        0 đ
                    @else
                    {{number_format($item->total)}} đ
                    @endif
                </td>
                <td>
                    @if($item->type =='money')
                    Thanh toán sau khi nhận hàng
                    @else
                    Đã thanh toán online
                    @endif
                </td>
                <td>
                    @if($item->status == 1)
                    <button class="btn btn-danger">Processing</button>
                    @elseif($item->status == 2)
                    <button class="btn btn-primary">Shipping</button>
                    @elseif($item->status == 3)
                    <button class="btn btn-success">Shipped</button>
                    @endif
                </td>
                <td style="display: flex">
                    @if($item->status == 2)
                    <form action="/admin/{{$item->id}}/shipped" method="post" >
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
