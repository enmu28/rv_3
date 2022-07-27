<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <title>Xử lý đơn hàng</title>
</head>
<body>
<div class="container-fluid" style="padding-left: 70px;">
    <div class="row">
        <div class="col-8" style="line-height: 30px;  padding-top: 30px;">
            <a href="{{ route('shop_home') }}">
                <img src="../image/logo.jpg" title="Your Store" alt="Your Store">
            </a>
            <div class="row">
                <div class="col-6">
                    <br>
                    <b>Thông tin mua hàng</b>
                    <form action="" method="post" name="">
                        @csrf
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email"><Br>
                        <input type="text" class="form-control" id="ho_ten" placeholder="Họ tên" name="ho_ten"><Br>
                        <input type="text" class="form-control" id="sdt" placeholder="Số điện thoại" name="sdt"><Br>
                        <input type="text" class="form-control" id="dia_chi" placeholder="Địa chỉ giao hàng" name="dia_chi"><Br>
                        <textarea rows="4" class="form-control" placeholder="Ghi chú (tùy chọn)" id="ghi_chu"></textarea>
                    </form>
                </div>
                <div class="col-6"  style="line-height: 30px;"><Br>
                    <b>Thanh toán</b><Br>
                    <div class="" style="height: 120px; width: 90%; border: 1px solid lightblue; border-radius: 5px; padding-top: 10px; padding-left: 20px;">
                        <input type="radio" name="thanh_toan" value="1" checked> Thanh toán khi giao hàng (COD)<br>
                        <hr style="color: lightblue; width: 100%">
                        <input type="radio" name="thanh_toan" value="0"> Chuyển khoản qua ngân hàng<Br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4" style="background-color: lightblue; border-left: 1px solid lightblue; padding-left: 15px; padding-bottom: 100px;"><Br>
            <h5><b>Đơn hàng ({{ $total }} sản phẩm)</b></h5>
            <hr>
            <table>
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
                            <img src="../image/{{ $product->product_image }}" width="100%" height="50px;" style="border: 1px solid olive; border-radius: 5px;">
                        </td>
                        <td style="padding-left: 50px; padding-bottom: 14px;"><Br>
                            {{ $product->product_name }}
                        </td>
                        <td style="padding-left: 50px; padding-bottom: 14px;"><Br>
                            {{ $product->product_price * session('cart')[$i]['sl'] }} đ
                        </td>
                        <td><Br>
                            <i class="fa fa-trash-o" style="font-size:24px"></i>
                        </td>
                    </tr>
                @endfor
            @endif
            </table>
            <hr>
            <table>
                <tr>
                    <td width="70%"><h5>Tổng cộng : </h5></td>
                    <td><h5><b style="color: blueviolet"><span id="tong_tien">{{ $total }}</span> đ</b> </h5></td>
                </tr>
                <tr>
                    <td><a href="cart" style="text-decoration: none;"><< Quay về giỏ hàng</a> </td>
                    <td style="background-color: mediumslateblue; padding: 10px 15px; border-radius: 5px;"><span style="text-decoration: none; color: white;"  id="dat_hang"><h5>Đặt hàng</h5></span> </td>
                </tr>
            </table>

        </div>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#dat_hang").click(function(){
            $email = $("#email").val();
            $ho_ten = $('#ho_ten').val();
            $sdt = $("#sdt").val();
            $dia_chi = $("#dia_chi").val();
            $ghi_chu = $("#ghi_chu").val();
            $tong_tien = $("#tong_tien").html();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('pay') }}",
                type:"POST",
                data: {
                    email : $email,
                    ho_ten : $ho_ten,
                    sdt : $sdt,
                    dia_chi : $dia_chi,
                    ghi_chu : $ghi_chu,
                    tong_tien : $tong_tien
                },
                success: function(response){
                    alertify.success(response.result);
                }
            });
        });
    });
</script>
</html>
