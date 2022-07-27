<table width="100%" class="table table-striped">
    <thead>
    <tr>
        <th width="5%">#</th>
        <th width="10%">Mã đơn hàng</th>
        <th width="15%">Email khách hàng</th>
        <th width="10%">Tổng tiền</th>
        <th width="15%">Trạng Thái</th>
        <th width="15%">Ngày đặt hàng</th>
        <th width="15%">Thanh toán</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($order as $key => $value)
        <tr>
            <td>
                {{ $key + 1 }}
            </td>
            <td>
                <a href="../admin/order_detail/{{ $value->order_id }}">{{ $value->code_order }}</a>
            </td>
            <td>
                {{ $value->customer_email }}
            </td>
            <td>
                {{ $value->total_price }}
            </td>
            <td>
                @if($value->order_status == 1)
                    Đang giao hàng
                @else
                    Đã giao hàng
                @endif
            </td>
            <td>
                {{ $value->created_at }}
            </td>
            <td>
                {{ $value->payment == 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}
            </td>
            <td>
                <i class="fas fa-pen edit" data-edit="{{ $value->order_id }}" data-toggle="modal" data-target="#myPopup"></i>
                <i class="fas fa-trash-alt delete" data-delete="{{ $value->order_id }},{{ $value->code_order }}" style="color: red;"
                   data-toggle="modal" data-target="#popup_delete"></i>
                <i class="fas fa-user-times open_key" data-open_key="{{ $value->order_id }},{{ $value->code_order }}"
                   data-toggle="modal" data-target="#popup_open_key"></i>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row" style="height: 100px; padding-top: 25px;">
    <div class="col-1"></div>
    <div class="col-7">
        <center>{!! $order->links('pagination::bootstrap-4') !!}</center>
    </div>
    <div class="col-1"></div>
    <div class="col-3" style="padding-top: 10px;">
        @foreach ($order as $key => $val)
        @endforeach
        Hiển thị từ {{ ($order->currentpage()-1)*$order->perpage() + 1 }} ~
        {{ ($order->currentpage()-1) * $order->perpage() + $key + 1 }}
        tổng số <B>{{ $total_order }}</B> user
    </div>
</div>
<script>
     //----------UPDATE
    Array.prototype.forEach.call(document.getElementsByClassName('edit'), function(element) {
        element.addEventListener('click', function() {
            $("#txt_update_result").html('');
            let order_id = element.dataset.edit;
            $('#order_id').val(order_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('pop_order_update') }}",
                type:"POST",
                data:{
                    order_id : order_id,
                },
                success: function(response){
                    let order_status = response.update_order_status;
                    $( "#update_order_status").val(order_status).change();
                    $( "#update_order_date").val(response.update_order_date);
                    $( "#update_order_email").val(response.update_order_email);
                    $( "#update_order_total").val(response.update_order_total);
                    // console.log(response)
                }
            });
        });
    });

     //----------DELETE
     Array.prototype.forEach.call(document.getElementsByClassName('delete'), function(element) {
         element.addEventListener('click', function() {
             $("#txt_delete_result").html('');
             let user_id = element.dataset.delete;
             let arrayStrig = user_id.split(",");
             $("#order_id_delete").val(arrayStrig[0]);
             $("#name_delete").html(arrayStrig[1]);
         });
     });
       //----------OPEN
     Array.prototype.forEach.call(document.getElementsByClassName('open_key'), function(element) {
         element.addEventListener('click', function() {
             $("#txt_open_key_result").html('');
             let user_id = element.dataset.open_key;
             let arrayStrig = user_id.split(",");
             $("#order_id_open_key").val(arrayStrig[0]);
             $("#name_open_key").html(arrayStrig[1]);
         });
     });
</script>
