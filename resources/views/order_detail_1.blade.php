@extends('home_1')
@section('content')
    <section class="content"><Br>
        <div class="row">
            <div class="col-9">
                <h5>&emsp;Chi tiết đơn hàng</h5>
            </div>
            <div class="col-3">
                <a href="{{ route('order_manage') }}">Đơn hàng</a> >> Chi tiết đơn hàng
            </div>
        </div><Br><Br>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-4" style="padding: 15px;" id="order_detail_content">
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
            </div>
            <div class="col-1"></div>
            <div class="col-5">
                <table class="table table-bordered table-hover" style="border-radius: 10px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="40%">Tên sản phẩm</th>
                            <th width="25%">Số lượng</th>
                            <th width="25%">Gía</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_product as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->product_name }}</td>
                                <td>{{ $value->quantity }}</td>
                                <td>{{ $value->product_price }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                {{ $list_product->links('pagination::bootstrap-4') }}
            </div>
        </div><Br><br>
        <div class="row">
            <div class="col-2">
                <button class="form-control" id="open_popup" style="width: 70%;" data-edit="{{ $detail->order_id }}" data-toggle="modal" data-target="#myPopup">Chỉnh sửa</button>
            </div>
            <div class="col-2">
                <button class="form-control" id="export_pdf" style="width: 70%;">
                    <a href="{{ route('print_PDF', ['order_id'=>$detail->order_id]) }}">In PDF</a>
                </button>
            </div>
            <div class="col-8"></div>
        </div>
    </section>
    {{--    ------------------------------POPUP UPDATE---------------------}}
    <div class="modal fade" id="myPopup" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa đơn hàng &emsp; {{ $detail->code_order }}</h5>
                </div>
                <div class="modal-body">
                    <table  style="width: 600px; line-height: 55px;">
                        <input type="text" value="{{ $detail->order_id }}" name="odd_id" id="odd_id" hidden>
                        <tr>
                            <th width="30%">Email khách hàng</th>
                            <td><input type="text" id="odd_email" name="odd_email" class="form-control" value="{{ $detail->email }}" readonly></td>
                        </tr>

                        <tr>
                            <th>Tên khách hàng</th>
                            <td><input type="text" id="odd_name" name="odd_name" class="form-control" value="{{ $detail->customer_name }}"></td>
                        </tr>

                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_odd_name"></td>
                        </tr>

                        <tr>
                            <th>SĐT khách hàng</th>
                            <td><input type="text" id="odd_phone" name="odd_phone" class="form-control" value="{{ $detail->tel_num }}"></td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_odd_phone"></td>
                        </tr>

                        <tr>
                            <th>Địa chỉ</th>
                            <td><input type="text" id="odd_address" name="odd_address" class="form-control" value="{{ $detail->address }}"></td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_odd_address"></td>
                        </tr>

                        <tr>
                            <th>Thanh toán</th>
                            <td>
                                <select name="odd_payment" id="odd_payment" style="height:37px; width: 200px;" class="custom-select rounded-0" >
                                    @if($detail->payment == 0)
                                        <option value="1">Đã thanh toán</option>
                                        <option value="0" selected>Chưa thanh toán</option>
                                    @else
                                        <option value="1" selected>Đã thanh toán</option>
                                        <option value="0">Chưa thanh toán</option>
                                    @endif
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th>Tình trạng</th>
                            <td>
                                <select name="odd_status" id="odd_status" style="height:37px; width: 200px;" class="custom-select rounded-0" >
                                    @if($detail->order_status == 0)
                                            <option value="0" selected>Đã giao hàng</option>
                                            <option value="1">Đang giao hàng</option>
                                        @else
                                            <option value="0">Đã giao hàng</option>
                                            <option value="1" selected>Đang giao hàng</option>
                                        @endif
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th>Ghi chú</th>
                            <td><textarea id="odd_note" name="odd_note" class="form-control" style="width: 200px;">
                                    {{ $detail->note_customer }}
                                </textarea></td>
                        </tr>

                        <tr>
                            <th>Tổng tiền</th>
                            <td><input type="text" id="odd_total" name="odd_total" class="form-control" value="{{ $detail->total_price }} đ" readonly></td>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
//-------------------------------------------------------------------------------------- Pagination
//             $(document).on('click', '.pagination a', function(event){
//                 event.preventDefault();
//                 var page = $(this).attr('href').split('page=')[1];
//                 fetch_data(page);
//             });

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
//---------------------------------------------------------------------------------------- CURD

            $("#open_popup").click(function(){
                $("#txt_update_result").html('');
            });
            $("#submit_update_popup").click(function(){
                let odd_id = $("#odd_id").val();
                let odd_name = $("#odd_name").val();
                let odd_note = $("#odd_note").val();
                let odd_status = $("#odd_status option:selected").val();
                let odd_payment = $("#odd_payment option:selected").val();
                let odd_address = $("#odd_address").val();
                let odd_phone = $("#odd_phone").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('order_detail_update') }}",
                    type:"POST",
                    data:{
                        odd_id : odd_id,
                        odd_name : odd_name,
                        odd_note : odd_note,
                        odd_status : odd_status,
                        odd_payment : odd_payment,
                        odd_address : odd_address,
                        odd_phone : odd_phone,
                    },
                    success: function(response){
                        if(response.messenge){
                            // dd(response.messenge);
                            if(response.messenge.odd_name){
                                $("#txt_odd_name").html(response.messenge.odd_name[0]);
                            }else{
                                $("#txt_odd_name").html('');
                            }
                            if(response.messenge.odd_address){
                                $("#txt_odd_address").html(response.messenge.odd_address[0]);
                            }else{
                                $("#txt_odd_address").html('');
                            }
                            if(response.messenge.odd_phone){
                                $("#txt_odd_phone").html(response.messenge.odd_phone[0]);
                            }else{
                                $("#txt_odd_phone").html('');
                            }
                        }
                        else{
                            $("#txt_odd_name").html('');
                            $("#txt_odd_address").html('');
                            $("#txt_odd_phone").html('');
                            $("#txt_update_result").html(response.result);
                            show_result();
                        }
                    }
                });
            });
        });

        function show_result(){
            let odd_id = $("#odd_id").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('order_update_list') }}",
                type:"GET",
                data :{
                    odd_id :  odd_id,
                },
                success: function(response){
                    $("#order_detail_content").empty();
                    $("#order_detail_content").html(response);
                }
            });
        }
    </script>
@endsection
