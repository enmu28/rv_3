@extends('home_1')
@section('content')
    <section class="content"><Br>
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label for="usr">Tên:</label>
                    <input type="text" class="form-control" name="cs_search_name" id="cs_search_name" placeholder="Nhập họ tên">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="usr">Email:</label>
                    <input type="text" class="form-control" name="cs_search_email" id="cs_search_email" placeholder="Nhập email">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label>Trạng thái:</label>
                    <select class="custom-select rounded-0" name="cs_search_status" id="cs_search_status">
                        <option selected disabled value="Null">Chọn trạng thái</option>
                        <option value="1">Đang hoạt động</option>
                        <option value="0">Tạm khóa</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="usr">Địa chỉ:</label>
                    <input type="text" class="form-control" name="cs_search_address" id="cs_search_address" placeholder="Nhập địa chỉ">
                </div>
            </div>
            <div class="col-4" style="padding-top: 30px;">
                <button type="button" class="btn btn-primary" id="search_customer">Tìm kiếm</button>&emsp;
                <button type="button" class="btn btn-success" id="search_drop" style="width:100px;">Xóa tìm</button>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form action="{{ route('export_csv') }}" method="POST">
                    <button type="button" class="btn btn-success"  id="import_customer">
                        <a href="{{ route('import') }}" style="text-decoration: none; color: white;">Import CSV</a>
                    </button>&ensp;
                    @csrf
                    <button type="submit"  class="btn btn-success" name="export_csv">Export CSV</button>
                </form>
            </div>
            <div class="col-8"  style="text-align: right; padding-top: 20px;">
                <button type="button" class="btn btn-primary" id="insert_customer"
                        data-toggle="modal" data-target="#myModal">Thêm mới</button>
            </div>
        </div>
        <div id="customer_content">
            <table width="100%" class="table table-striped">
                <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Họ Tên</th>
                    <th width="20%">Email</th>
                    <th width="25%">Địa chỉ</th>
                    <th width="10%">Điện thoại</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($customer as $key => $value)
                    <tr>
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td class="cs_hidden{{ $value->customer_id }}">
                            {{ $value->customer_name }}
                        </td>
                        <td class="cs_hidden{{ $value->customer_id }}">
                            {{ $value->email }}
                        </td>
                        <td class="cs_hidden{{ $value->customer_id }}">
                            {{ $value->address }}
                        </td>
                        <td class="cs_hidden{{ $value->customer_id }}">
                            {{ $value->tel_num }}
                        </td>

                        <td class="cs_edit{{ $value->customer_id }}" style="display: none">
                            <input type="text" value="{{ $value->customer_name }}" id="cs_edit_name{{ $value->customer_id }}"><br>
                            <span id="txt_cs_edit_name{{ $value->customer_id }}" style="color: red"></span>
                        </td>
                        <td class="cs_edit{{ $value->customer_id }}" style="display: none">
                            <input type="text" value="{{ $value->email }}" id="cs_edit_email{{ $value->customer_id }}" readonly>
                        </td>
                        <td class="cs_edit{{ $value->customer_id }}" style="display: none">
                            <input type="text" value="{{ $value->address }}" id="cs_edit_address{{ $value->customer_id }}"><br>
                            <span id="txt_cs_edit_address{{ $value->customer_id }}" style="color: red"></span>
                        </td>
                        <td class="cs_edit{{ $value->customer_id }}" style="display: none">
                            <input type="text" value="{{ $value->tel_num }}" id="cs_edit_tel_num{{ $value->customer_id }}"><Br>
                            <span id="txt_cs_edit_tel_num{{ $value->customer_id }}" style="color: red"></span>
                        </td>
                        <td style="text-align: center">
                            <i class="fas fa-pen cs_edit" data-edit="{{ $value->customer_id }}"></i>
                            <i class="fas fa-check cs_submit cs_edit{{ $value->customer_id }}"
                               data-edit="{{ $value->customer_id }}" style="display: none"></i>
                            <i class="fas fa-times cs_exit{{ $value->customer_id }} cs_exit" style="display: none"></i>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row" style="height: 100px; padding-top: 25px;">
                <div class="col-1"></div>
                <div class="col-7">
                    <center>{!! $customer->links('pagination::bootstrap-4') !!}</center>
                </div>
                <div class="col-1"></div>
                <div class="col-3" style="padding-top: 10px;">
                    @foreach ($customer as $key => $val)
                    @endforeach
                    Hiển thị từ {{ ($customer->currentpage()-1)*$customer->perpage() + 1 }} ~
                    {{ ($customer->currentpage()-1) * $customer->perpage() + $key + 1 }}
                    tổng số <B>{{ $total_customer }}</B> k.hàng
                </div>
            </div>
        </div>
    </section>


    {{--    ------------------------------POPUP INSERT---------------------}}
    <div class="modal fade" id="myModal" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Customer</h5>
                </div>
                <div class="modal-body">
                    <table  style="width: 600px; line-height: 55px;">
                        <tr>
                            <th>Tên</th>
                            <td><input type="text" class="form-control" id="pop_customer_name" name="pop_customer_name"
                                placeholder="Nhập họ tên"></td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_pop_customer_name"></td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td><input type="email" class="form-control" id="pop_customer_email" name="pop_customer_email"
                                placeholder="Nhập Email"></td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_pop_customer_email"></td>
                        </tr>

                        <tr>
                            <th>Điện thoại</th>
                            <td><input type="text" class="form-control" id="pop_customer_phone" name="pop_customer_phone"
                                placeholder="Nhập SĐT"></td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_pop_customer_phone"></td>
                        </tr>

                        <tr>
                            <th>Địa chỉ</th>
                            <td><input type="email" class="form-control" id="pop_customer_address" name="pop_customer_address"
                                placeholder="Nhập địa chỉ"></td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_pop_customer_address"></td>
                        </tr>
                        <tr>
                            <th>Trạng thái</th>
                            <td>
                                <input type="radio" name="pop_customer_status" value="1" checked/> Hoạt động &emsp;&ensp;
                                <input type="radio" name="pop_customer_status" value="0" /> Tạm dừng <br />
                            </td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_result"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close_popup" class="btn btn-default" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-success" id="submit_popup">Lưu</button>
                </div>
            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
//-------------------------------------------------------------------------------------- Pagination
            /**  Pagination for page Customer ( ajax ) */
            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });
            function fetch_data(page) {
                $.ajax({
                    url: "customer/fetch_data?page=" + page,
                    success: function (response) {
                        return RenderListCustomer(response);
                    }
                });
            }
        });

        /**  Function reset table Customer (ajax) */
        function RenderListCustomer(response){
            $("#customer_content").empty();
            $("#customer_content").html(response);
        }


        //------------------------------------------------------------BUTTON
        /**  Search of Customer page ( ajax ) */
        $("#search_customer").click(function(){
            let cs_search_name = $("input[name=cs_search_name]").val();
            let cs_search_email = $("input[name=cs_search_email]").val();
            let cs_search_status = $( "#cs_search_status option:selected").val();
            let cs_search_address = $("input[name=cs_search_address]").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('search_customer') }}",
                type:"GET",
                data:{
                    cs_search_name : cs_search_name,
                    cs_search_email : cs_search_email,
                    cs_search_status : cs_search_status,
                    cs_search_address : cs_search_address,
                },
                success: function(response){
                    return RenderListCustomer(response);
                },
                error: function(){
                    return not_result();
                }
            });
        });


        /**  Search drop of Customer page ( ajax ) */
        $("#search_drop").click(function(){
            show_result();
        });


        /**  Insert customer ( popup, ajax ) */
        $("#submit_popup").click(function(){
            let pop_customer_name = $("input[name=pop_customer_name]").val();
            let pop_customer_email = $("input[name=pop_customer_email]").val();
            let pop_customer_phone = $("input[name=pop_customer_phone]").val();
            let pop_customer_address = $("input[name=pop_customer_address]").val();
            let pop_customer_status = $('input[name=pop_customer_status]:checked').val()

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('pop_customer_insert') }}",
                type:"POST",
                data:{
                    pop_customer_name : pop_customer_name,
                    email : pop_customer_email,
                    pop_customer_phone : pop_customer_phone,
                    pop_customer_address : pop_customer_address,
                    pop_customer_status : pop_customer_status,
                },
                success: function(response){
                    if(response.messenge){
                        // dd(response.messenge);
                        if(response.messenge.pop_customer_name){
                            $("#txt_pop_customer_name").html(response.messenge.pop_customer_name[0]);
                        }else{
                            $("#txt_pop_customer_name").html('');
                        }
                        if(response.messenge.email){
                            $("#txt_pop_customer_email").html(response.messenge.email[0]);
                        }else{
                            $("#txt_pop_customer_email").html('');
                        }
                        if(response.messenge.pop_customer_phone){
                            $("#txt_pop_customer_phone").html(response.messenge.pop_customer_phone[0]);
                        }else{
                            $("#txt_pop_customer_phone").html('');
                        }
                        if(response.messenge.pop_customer_address){
                            $("#txt_pop_customer_address").html(response.messenge.pop_customer_address[0]);
                        }else{
                            $("#txt_pop_customer_address").html('');
                        }
                    }
                    else{
                        $("#txt_result").html(response.result);
                        delete_content();
                        show_result();
                    }
                }
            });
        });

        $("#close_popup").click(function(){
            $("#txt_result").html('');
            delete_content();
            show_result();
        });
        /**  Exit popup Insert Customer ( ajax ) */
        $(".cs_exit").click(function(){
            show_result();
        });


        /**  Show Update customer */
        let dd = document.getElementsByClassName('cs_edit');   //----------UPDATE
        Array.prototype.forEach.call(dd, function(element) {
            element.addEventListener('click', function() {
                let user_id = element.dataset.edit;
                $(this).hide();
                $(".cs_hidden"+user_id).hide();
                $(".cs_edit"+user_id).show();
                $(".cs_exit"+user_id).show();
            });
        });


        /**  Update customer ( ajax ) */
        let d = document.getElementsByClassName('cs_submit');   //----------UPDATE
        Array.prototype.forEach.call(d, function(element) {
            element.addEventListener('click', function() {
                let cs_id = element.dataset.edit;
                let name = $("#cs_edit_name"+cs_id).val();
                let email = $("#cs_edit_email"+cs_id).val();
                let address = $("#cs_edit_address"+cs_id).val();
                let tel_num = $("#cs_edit_tel_num"+cs_id).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('cs_update') }}",
                    type:"POST",
                    data:{
                        cs_id : cs_id,
                        name : name,
                        email : email,
                        address : address,
                        tel_num : tel_num
                    },
                    success: function(response){
                        console.log(response.messenge);
                        if(response.messenge){
                            if(response.messenge.name){
                                $("#txt_cs_edit_name"+cs_id).html(response.messenge.name[0]);
                            }else{
                                $("#txt_cs_edit_name"+cs_id).html('');
                            };
                            if(response.messenge.address){
                                $("#txt_cs_edit_address"+cs_id).html(response.messenge.address[0]);
                            }else{
                                $("#txt_cs_edit_address"+cs_id).html('');
                            };
                            if(response.messenge.tel_num){
                                $("#txt_cs_edit_tel_num"+cs_id).html(response.messenge.tel_num[0]);
                            }else{
                                $("#txt_cs_edit_tel_num"+cs_id).html('');
                            };
                        }
                        else{
                            show_result()
                            alertify.success('Đã chỉnh sửa thành công!');
                        }
                    }
                });
            });
        });


        //---------------------------------FUNCTIONS
        /**  Function for response view not result ( ajax ) */
        function not_result(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('not_customer') }}",
                type:"GET",
                success: function(response){
                    $("#customer_content").empty();
                    $("#customer_content").html(response);
                }
            });
        }

        /**  Function response view list_customer ( ajax ) */
        function show_result(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('cs_search_drop') }}",
                type:"GET",
                success: function(response){
                    return RenderListCustomer(response);
                }
            });
        }

        function delete_content(){
            $("#pop_customer_name").val('');
            $("#pop_customer_email").val('');
            $("#pop_customer_address").val('');
            $("#pop_customer_phone").val('');
            $("#txt_pop_customer_name").html('');
            $("#txt_pop_customer_email").html('');
            $("#txt_pop_customer_address").html('');
            $("#txt_pop_customer_phone").html('');
        }
    </script>
@endsection
