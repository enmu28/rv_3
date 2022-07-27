@extends("shop/index")
@section('contain')
    Trang Chủ &emsp; >> &emsp;Giỏ hàng
    <hr style="color: lightblue;">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" width="10%">Sản phẩm</th>
                <th scope="col" width="40%" style="padding-left: 50px;">Thông tin sản phẩm</th>
                <th scope="col" width="10%">Đơn giá</th>
                <th scope="col" width="10%">Số lượng</th>
                <th scope="col" width="10%">Thành tiền</th>
                <th scope="col" width="10%">Xóa</th>
            </tr>
        </thead>
        <tbody>
        @if(session()->has('cart'))
            @php
                $total = 0;
            @endphp
            @for($i=0; $i<count(session('cart')); $i++)
                @php
                    $product = DB::table('mst_product')->where('product_id', session('cart')[$i]['id'])->first();
                    $total += $product->product_price * session('cart')[$i]['sl'];
                @endphp
                <tr>
                    <td>
                        <img src="../image/{{ $product->product_image }}" width="100%" height="70px;">
                    </td>
                    <td style="padding-left: 50px;"><Br>
                        {{ $product->product_name }}
                    </td>
                    <td><Br>
                        {{ $product->product_price }} đ
                    </td>
                    <td><Br>
                        {{ session('cart')[$i]['sl'] }}
                    </td>
                    <td><Br>
                        {{ $product->product_price * session('cart')[$i]['sl'] }} đ
                    </td>
                    <td><Br>
                        <i class="fa fa-trash-o" style="font-size:24px"></i>
                    </td>
                </tr>
                @endfor
            @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-10"></div>
        <div class="col-2">
            <span id="total"><b>Tổng tiền : {{ $total }} đ</b></span>
        </div>
    </div>
    <div class="row" style="height: 50px;">
        <div class="col-7"></div>
        <div class="col-2" style="background-color: lightblue; padding-top: 12px; text-align: center; border-radius: 9px;">
            <a href="/" style="color: black;"><b>Tiếp tục mua sắp</b></a>
        </div>
        <div class="col-1"></div>
        <div class="col-2" style="background-color: olive;color: white;padding-top: 12px;text-align: center; border-radius: 9px;">
            <a href="cart_handling" style="color: white;"> <b>Tiến hành thanh toán</b></a>
        </div>
    </div>
@endsection
