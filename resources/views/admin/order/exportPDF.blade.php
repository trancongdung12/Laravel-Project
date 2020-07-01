<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body>
    <div class="page-container" style="margin-top: 15px;">
        <div class="container" style="background-color: white;height: 800px">
            <h1>Show order</h1>
            <hr>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($orders as $item)
                  <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td>{{$item->name}}</td>
                    <td>{{number_format($item->total)}}</td>
                    <td>{{$item->type}}</td>
                    <td>
                        @if($item->status == 1)
                        <button class="btn btn-danger">Processing</button>
                        @elseif($item->status == 2)
                        <button class="btn btn-primary">Shipping</button>
                        @elseif($item->status == 3)
                        <button class="btn btn-success">Shipped</button>
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
