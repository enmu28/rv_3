<table border="0" style="line-height: 35px;">
    <tr>
        <td><b>Mã đơn hàng</b></td>
        <td>&emsp;:&emsp;&ensp;</td>
        <td>{{ $detail->code_order }}</td>
    </tr>
    <tr>
        <td><b>Tên khách hàng</b></td>
        <td>&emsp;:&emsp;&ensp;</td>
        <td>{{ $detail->customer_name }}</td>
    </tr>
    <tr>
        <td><b>Email khách hàng&emsp;</b></td>
        <td>&emsp;:&emsp;&ensp;</td>
        <td>{{ $detail->email }}</td>
    </tr>
    <tr>
        <td><b>SĐT khách hàng</b></td>
        <td>&emsp;:&emsp;&ensp;</td>
        <td>{{ $detail->tel_num }}</td>
    </tr>
    <tr>
        <td><b>Địa chỉ giao hàng</b></td>
        <td>&emsp;:&emsp;&ensp;</td>
        <td>{{ $detail->address }}</td>
    </tr>
    <tr>
        <td><b>Ghi chú</b></td>
        <td>&emsp;:&emsp;&ensp;</td>
        <td>{{ $detail->note_customer }}</td>
    </tr>
    <tr>
        <td><b>Thanh toán</b></td>
        <td>&emsp;:&emsp;&ensp;</td>
        <td>
            @if($detail->payment == 0)
                Chưa thanh toán
            @else
                Đã thanh toán
            @endif
        </td>
    </tr>
    <tr>
        <td><b>Tình trạng</b></td>
        <td>&emsp;:&emsp;&ensp;</td>
        <td>
            @if($detail->order_status == 0)
                Đã giao hàng
            @else
                Đang giao hàng
            @endif
        </td>
    </tr>
    <tr>
        <td><b>Tổng tiền</b></td>
        <td>&emsp;:&emsp;&ensp;</td>
        <td><b>{{ $detail->total_price }}</b> đ</td>
    </tr>
</table>
