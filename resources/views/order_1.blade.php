@extends('home_1')
@section('content')
    <section class="content"><Br>
        <div class="od_header">
            <div class="header_1" style="float: left; width: 12%; padding-right: 10px;">
                <div class="form-group">
                    <label for="orders">Email:</label>
                    <input type="text" class="form-control" name="od_search_email" id="od_search_email" placeholder="Nhập email">
                </div>
            </div>
            <div class="header_2" style="float: left; width: 15%; padding-right: 10px;">
                <div class="form-group">
                    <label for="orders">Mã đơn hàng:</label>
                    <input type="text" class="form-control" name="od_search_code" id="od_search_code" placeholder="Nhập mã">
                </div>
            </div>
            <div class="header_3" style="float: left; width: 15%; padding-right: 10px;">
                <div class="form-group">
                    <label for="orders">Trạng thái:</label>
                    <select class="custom-select rounded-0" name="od_search_status" id="od_search_status">
                        <option selected disabled value="Null">Chọn trạng thái</option>
                        <option value="1">Đang giao hàng</option>
                        <option value="0">Đã giao hàng</option>
                    </select>
                </div>
            </div>
            <div class="header_4" style="float: left; width: 15%; padding-right: 10px;">
                <div class="form-group">
                    <label>Thanh toán:</label>
                    <select class="custom-select rounded-0" name="od_search_payment" id="od_search_payment">
                        <option selected disabled value="Null">Chọn trạng thái</option>
                        <option value="0">Chưa thanh toán</option>
                        <option value="1">Đã thanh toán</option>
                    </select>
                </div>
            </div>
            <div class="header_5" style="float: left; width: 15%; padding-right: 10px;">
                <div class="form-group">
                    <label for="orders">Ngày đặt đơn:</label>
                    <input type="date" class="form-control" name="od_search_date" id="od_search_date">
                </div>
            </div>
            <div class="header_6" style="float: right; width: 28%; padding-top: 30px; text-align: left;">
                <button type="button" class="btn btn-primary" id="od_search" style="width: 110px">Tìm kiếm</button>&emsp;
                <button type="button" class="btn btn-success" id="od_drop" style="width: 110px;">Xóa tìm</button>
            </div>
        </div>
        <div id="order_content">
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
                            <a href="{{ route('order_detail', ['order_id'=> $value->order_id]) }}">{{ $value->code_order }}</a>
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
        </div>
    </section>
    {{--    ------------------------------POPUP UPDATE---------------------}}
    <div class="modal fade" id="myPopup" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa Đơn hàng</h5>
                </div>
                <div class="modal-body">
                    <table  style="width: 600px; line-height: 55px;">
                        <span id="order_id" hidden></span>
                        <tr>
                            <th width="30%">Email khách hàng</th>
                            <td><input type="text" id="update_order_email" name="update_order_email"  class="form-control" readonly></td>
                        </tr>

                        <tr>
                            <th>Tổng tiền</th>
                            <td><input type="text" id="update_order_total" name="update_order_total" class="form-control" readonly></td>
                        </tr>

                        <tr>
                            <th>Trạng thái</th>
                            <td>
                                <select name="update_order_status" id="update_order_status" style="height:34px; width: 200px;" class="custom-select rounded-0" >
                                    <option value="0">Đã giao hàng</option>
                                    <option value="1">Đang giao hàng</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Ngày đặt hàngg</th>
                            <td><input type="datetime-local" id="update_order_date" name="update_order_date" class="form-control"></td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td id="txt_update_result" colspan="2" style="text-align: center"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close_update_popup" class="btn btn-default" data-dismiss="modal">Thoát</button>
                    <button type="button" id="submit_update_popup" class="btn btn-success">Lưu</button>
                </div>
            </div>

        </div>
    </div>
    {{--    ------------------------------POPUP DELETE---------------------}}
    <div class="modal fade" id="popup_delete" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bạn có chắc xóa đơn hàng #<span id="name_delete"></span> chứ?</h5>
                    <span id="order_id_delete" hidden></span>
                </div>
                <div class="modal-body">
                    <button type="button" id="close_delete_popup" class="btn btn-default" data-dismiss="modal">Thoát</button>
                    <button type="button" id="submit_delete_popup" class="btn btn-success" style="width:15%;">Xóa</button><br>
                    <span id="txt_delete_result" style="color: red;"></span>
                </div>
            </div>
        </div>
    </div>
    {{--    ------------------------------POPUP OPEN KEY---------------------}}
    <div class="modal fade" id="popup_open_key" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bạn có chắc đổi thanh toán đơn hàng #<span id="name_open_key"></span>?</h5>
                    <span id="order_id_open_key" hidden></span>
                </div>
                <div class="modal-body">
                    <button type="button" id="close_open_key_popup" class="btn btn-default" data-dismiss="modal">Thoát</button>
                    <button type="button" id="submit_open_key_popup" class="btn btn-success" style="width:15%;">Gửi</button><br>
                    <span id="txt_open_key_result" style="color: red;"></span>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
//-------------------------------------------------------------------------------------- Pagination
            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
                $.ajax({
                    url:"order/fetch_data?page="+page,
                    success:function(response)
                    {
                        return RenderListOrder(response);
                    }
                });
            }
//---------------------------------------------------------------------------------------Button
            $("#od_search").click(function(){
                let od_search_email = $("input[name=od_search_email]").val();
                let od_search_code = $("input[name=od_search_code]").val();
                let od_search_status = $( "#od_search_status option:selected").val();
                let od_search_payment = $( "#od_search_payment option:selected").val();
                let od_search_date = $("input[name=od_search_date]").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('search_order') }}",
                    type:"GET",
                    data:{
                        od_search_email : od_search_email,
                        od_search_code : od_search_code,
                        od_search_status : od_search_status,
                        od_search_payment : od_search_payment,
                        od_search_date : od_search_date,
                    },
                    success: function(response){
                        return RenderListOrder(response);
                    },
                    error: function(){
                        not_result();
                    }
                });
            });

            $("#od_drop").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('od_search_drop') }}",
                    type:"GET",
                    success: function(response){
                        return RenderListOrder(response);
                    }
                });
            });

//---------------------------------------------------------------------------------------- CURD

            $("#submit_update_popup").click(function(){
                let id = $("#order_id").val();
                let update_order_status = $( "#update_order_status option:selected").val();
                let date = new Date($('#update_order_date').val());
                let month = date.getMonth() + 1;
                let date_time = date.getFullYear()+"-"+month+"-"+date.getDate()+" "+date.getHours()+":"+date.getMinutes();
                // "2021-08-25 14:30:32"
                // console.log(date_time);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('order_update') }}",
                    type:"POST",
                    data:{
                        order_id : id,
                        update_order_date : date_time,
                        update_order_status : update_order_status
                    },
                    success: function(response){
                        $("#txt_update_result").html(response.result);
                        show_result();
                    }
                });
            });

            $("#submit_delete_popup").click(function(){
                let id = $("#order_id_delete").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('order_delete') }}",
                    type:"POST",
                    data:{
                        order_id : id,
                    },
                    success: function(response){
                        $("#txt_delete_result").html(response.result);
                        show_result();
                    }
                });
            });

            $("#submit_open_key_popup").click(function(){
                let order_id = $("#order_id_open_key").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('order_open_key') }}",
                    type:"POST",
                    data:{
                        order_id : order_id,
                    },
                    success: function(response){
                        if(response.key == 0){
                            $("#txt_open_key_result").html('Đã thanh toán thành công!');
                        }
                        else{
                            $("#txt_open_key_result").html('Chưa thanh toán!');
                        }
                        show_result();
                    }
                });
            });

            $("#close_popup").click(function(){
                $("#txt_result").html('');
                show_result();
            });

            $("#close_update_popup").click(function(){
                $("#txt_update_result").html('');
            });

            $("#close_delete_popup").click(function(){
                $("#txt_delete_result").html('');
                $("#name_delete").html('');
            });

            $("#close_open_key_popup").click(function(){
                $("#txt_open_key_result").html('');
                $("#name_open_key").html('');
            });


            let dd = document.getElementsByClassName('edit');   //----------UPDATE
            Array.prototype.forEach.call(dd, function(element) {
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

            let del = document.getElementsByClassName('delete');   //----------DELETE
            Array.prototype.forEach.call(del, function(element) {
                element.addEventListener('click', function() {
                    $("#txt_delete_result").html('');
                    let user_id = element.dataset.delete;
                    let arrayStrig = user_id.split(",");
                    $("#order_id_delete").val(arrayStrig[0]);
                    $("#name_delete").html(arrayStrig[1]);
                });
            });

            let op = document.getElementsByClassName('open_key');   //----------OPEN
            Array.prototype.forEach.call(op, function(element) {
                element.addEventListener('click', function() {
                    $("#txt_open_key_result").html('');
                    let user_id = element.dataset.open_key;
                    let arrayStrig = user_id.split(",");
                    $("#order_id_open_key").val(arrayStrig[0]);
                    $("#name_open_key").html(arrayStrig[1]);
                });
            });

        });

        //---------------------------------------------------------------------------------FUNCTION
        function not_result(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('not_order') }}",
                type:"GET",
                success: function(response){
                    $("#order_content").empty();
                    $("#order_content").html(response);
                }
            });
        }
        function RenderListOrder(response){
            $("#order_content").empty();
            $("#order_content").html(response);
        }
        function show_result(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('od_search_drop') }}",
                type:"GET",
                success: function(response){
                    return RenderListOrder(response);
                }
            });
        }

    </script>
@endsection
