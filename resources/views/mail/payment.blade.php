<style>
    .sub-total{
        display: flex;
        justify-content: space-between;
    }
    .container{
        margin-left: 20%;
        width: 60%;
    }
    .item{
        display: flex;
    }
    .sub-item{
        margin-right: 10px;
    }
</style>
<div class="container">

<h3>Hi {{$data['name']}},</h3>
<h2>Cảm ơn bạn đã mua hàng của chúng tôi !</h2>
<div>
    <b>Địa chỉ giao hàng</b>
    <p>{{$data['address']}}</p>
    <b>Sản phẩm của bạn</b>
    <hr>
    <div class="item">
        @foreach ($data['product'] as $item)
        <div class="sub-item">
            <img src="https://didongviet.vn/pub/media/catalog/product//i/p/iphone-11-didongviet_3_8.jpg" alt="" height="200px" width="200px">
            <div>
                <b>{{$item['name']}}</b>
                <p>Số lượng: {{$item['quantity']}}</p>
                <p>Giá: {{number_format($item['price'])}} đ</p>
            </div>
        </div>
        @endforeach
    </div>
    <hr>
    <div>
        <div class="sub-total">
            <p><b>Phương thức thanh toán</b></p>
            <p>
                @if($data['type'] == 'online')
                Thanh toán online
                @else
                Thanh toán sau khi nhận hàng
                @endif
            </p>
        </div>
        <div class="sub-total">
            <p><b>Phí ship</b></p>
            <p>Free</p>
        </div>
        <div class="sub-total">
            <p><b>Tổng</b></p>
            <p>{{number_format($data['total'])}} đ</p>
        </div>
    </div>
</div>

</div>
