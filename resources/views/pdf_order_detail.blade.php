<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Download</title>
    <style >
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
    </style>
</head>

<body>
<center><b style="font-size: 20px;">Chi tiết đơn hàng</b></center><br><br><Br>
<table width="50%" style="float:left">
    <tr>
        <td>
            Tên khách hàng<Br><Br>
            Email khách hàng<Br><Br>
            SĐT khách hàng<Br><Br>
            Địa chỉ giao hàng<Br><Br>
            Ghi chú<Br><Br>
            Thanh toán<br><Br>
            Tình trạng<br><br><Br>
            Tổng tiền
        </td>
        <td>
            :&ensp;{{ $detail->customer_name }}<br><Br>
            :&ensp;{{ $detail->email }}<br><Br>
            :&ensp;{{ $detail->tel_num }}<br><Br>
            :&ensp;{{ $detail->address }}<br><Br>
            :&ensp;{{ $detail->note_customer }}<br><Br>
            :&ensp;@if($detail->payment == 0)
                Chưa thanh toán
            @else
                Đã thanh toán
            @endif<br><Br>

            :&ensp;@if($detail->order_status == 0)
                Đã giao hàng
            @else
                Đang giao hàng
            @endif<Br><Br><Br>
            :&ensp;<b>{{ $detail->total_price }}</b> đ
        </td>
    </tr>
</table>
<table width="50%" style="float:right; border: 1px solid lightblue; border-radius: 5px;">
    <tr style="line-height: 30px;">
        <th width="10%">#</th>
        <th width="40%">Tên sản phẩm</th>
        <th width="20%">Số lượng</th>
        <th width="30%">Gía</th>
    </tr>
    @foreach($list_product as $key => $value)
        <tr style="line-height: 30px;">
            <td><center>{{ $key + 1 }}</center></td>
            <td style="padding-left: 20px;">{{ $value->product_name }}</td>
            <td>{{ $value->quantity }}</td>
            <td style="padding-left: 35px;">{{ $value->product_price }}</td>
        </tr>
        @endforeach
</table>
</body>
</html>
