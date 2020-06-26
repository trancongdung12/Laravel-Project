@extends('layout.adminMaster')
@section('content')
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
                <th></th>
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
                    <button class="btn btn-success">Shipping</button>
                    @endif
                </td>
                <td style="display: flex">
                    @if($item->status == 1)
                    <form action="/admin/order/{{$item->id}}/accept" method="post" >
                        @csrf
                        <button type="submit" class="btn btn-success"><i style="color: white" class="fas fa-check"></i></button>
                    </form>
                    @endif
                        <button style="margin-left: 10px" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal{{$item->id}}">
                            <i style="color: white" class="fas fa-eye"></i>
                        </button>
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
        @foreach($orders as $item)
         <!-- Modal -->
                <div class="modal fade" id="modal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead class="thead-dark">
                                  <tr>

                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Note</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Discount</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach(json_decode($item->detail) as $product)
                                  <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->note}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{number_format($product->price)}} đ</td>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->percent*100}}%</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
