@extends('home_1')
@section('content')
    <section class="content"><Br>
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label for="usr">Tên:</label>
                    <input type="text" class="form-control" name="search_name" id="search_name" placeholder="Nhập họ tên">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="usr">Email:</label>
                    <input type="text" class="form-control" name="search_email" id="search_email" placeholder="Nhập email">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="usr">Nhóm:</label>
                    <select class="custom-select rounded-0" name="search_group" id="search_group">
                        <option selected disabled value="Null">Chọn nhóm</option>
                        <option value="1">Admin</option>
                        <option value="2">Editor</option>
                        <option value="3">Reviewer</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label>Trạng thái:</label>
                    <select class="custom-select rounded-0" name="search_status" id="search_status">
                        <option selected disabled value="Null">Chọn trạng thái</option>
                        <option value="0">Đang hoạt động</option>
                        <option value="1">Tạm khóa</option>
                    </select>
                </div>
            </div>
            <div class="col-4" style="padding-top: 30px; text-align: left;">
                <button type="button" class="btn btn-primary" id="search_user" style="width: 110px">Tìm kiếm</button>&emsp;
                <button type="button" class="btn btn-success" id="search_drop" style="width: 110px;">Xóa tìm</button>
            </div>
        </div>
        <div class="row">
            <div class="col-10"></div>
            <div class="col-2" style="text-align: right;">
                <button type="button" class="btn btn-primary" id="insert_user" data-toggle="modal" data-target="#myModal" style="width: 110px;">Thêm mới</button>
            </div>
        </div>
            <div id="user_content">
                <table width="100%" class="table table-striped">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="20%">Họ Tên</th>
                        <th width="30%">Email</th>
                        <th width="15%">Nhóm</th>
                        <th width="20%">Trạng Thái</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $key => $value)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td>
                                {{ $value->name }}
                            </td>
                            <td>
                                {{ $value->email }}
                            </td>
                            <td>
                                @if($value->group_role == 1)
                                    Admin
                                @elseif($value->group_role == 2)
                                    Editor
                                @else
                                    Reviewer
                                @endif
                            </td>
                            <td>
                                {{ $value->is_active == 0 ? 'Đang Hoạt Động' : 'Tạm Khóa' }}
                            </td>
                            <td>
                                <i class="fas fa-pen edit" data-edit="{{ $value->id }}" data-toggle="modal" data-target="#myPopup"></i>
                                <i class="fas fa-trash-alt delete" data-delete="{{ $value->id }},{{ $value->name }}" style="color: red;"
                                   data-toggle="modal" data-target="#popup_delete"></i>
                                <i class="fas fa-user-times open_key" data-open_key="{{ $value->id }},{{ $value->name }}"
                                   data-toggle="modal" data-target="#popup_open_key"></i>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row" style="height: 100px; padding-top: 25px;">
                    <div class="col-1"></div>
                    <div class="col-7">
                        <center>{!! $user->links('pagination::bootstrap-4') !!}</center>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-3" style="padding-top: 10px;">
                        @foreach ($user as $key => $val)
                        @endforeach
                        Hiển thị từ {{ ($user->currentpage()-1)*$user->perpage() + 1 }} ~
                        {{ ($user->currentpage()-1) * $user->perpage() + $key + 1 }}
                        tổng số <B>{{ $total_user }}</B> user
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
                    <h5 class="modal-title">Thêm User</h5>
                </div>
                <div class="modal-body">
                    <table  style="width: 600px; line-height: 55px; align-content: center;">
                        <tr>
                            <th>Tên</th>
                            <td><input type="text" id="pop_user_name" name="pop_user_name" class="form-control"
                                placeholder="Nhập họ tên"></td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_pop_user_name"></td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td><input type="email" id="pop_user_email" name="pop_user_email" class="form-control"
                                placeholder="Nhập Email"></td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_pop_user_email"></td>
                        </tr>

                        <tr>
                            <th>Mật khẩu</th>
                            <td><input type="password" id="pop_user_password" name="pop_user_password" class="form-control"
                                placeholder="Nhập password"></td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_pop_user_password"></td>
                        </tr>
                        <tr id="tr_pop_user_pw">
                            <th>Xác nhận</th>
                            <td><input type="password" id="pop_user_pw" name="pop_user_pw" class="form-control"
                                placeholder="Nhập lại password"></td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_pop_user_pw"></td>
                        </tr>
                        <tr>
                            <th>Nhóm</th>
                            <td>
                                <select  class="custom-select rounded-0"  name="pop_user_group" id="pop_user_group" style="height: 34px;width: 200px;">
                                    <option value="1">Admin</option>
                                    <option value="2">Editor</option>
                                    <option value="3" selected>Reviewer</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Trạng thái</th>
                            <td id="pop_user_status">TRUE</td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_result"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close_popup" class="btn btn-default" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-success" id="submit_popup" style="width: 15%;">Lưu</button>
                </div>
            </div>

        </div>
    </div>
    {{--    ------------------------------POPUP UPDATE---------------------}}
    <div class="modal fade" id="myPopup" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa User</h5>
                </div>
                <div class="modal-body">
                    <table  style="width: 600px; line-height: 55px;">
                        <span id="user_id" hidden></span>
                        <tr>
                            <th>Tên</th>
                            <td><input type="text" id="update_user_name" name="update_user_name"  class="form-control"></td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_update_user_name"></td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td><input type="email" id="update_user_email" name="update_user_email" class="form-control"></td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_update_user_email"></td>
                        </tr>

                        <tr>
                            <th>Mật khẩu</th>
                            <td><input type="password" id="update_user_password" name="update_user_password" class="form-control"></td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_update_user_password"></td>
                        </tr>

                        <tr>
                            <th>Nhóm</th>
                            <td>
                                <select name="update_user_group" id="update_user_group" style="height:34px; width: 200px;" class="custom-select rounded-0" >
                                    <option value="1">Admin</option>
                                    <option value="2">Editor</option>
                                    <option value="3" selected>Reviewer</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Trạng thái</th>
                            <td id="update_user_status">TRUE</td>
                        </tr>
                        <tr style="line-height: 5px; color: red;">
                            <td></td>
                            <td id="txt_update_result"></td>
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
                    <h5 class="modal-title">Bạn có chắc xóa User - <span id="name_delete"></span> chứ?</h5>
                    <span id="user_id_delete" hidden></span>
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
                    <h5 class="modal-title">Bạn có chắc khóa/mở khóa User - <span id="name_open_key"></span>?</h5>
                    <span id="user_id_open_key" hidden></span>
                </div>
                <div class="modal-body">
                    <button type="button" id="close_open_key_popup" class="btn btn-default" data-dismiss="modal">Thoát</button>
                    <button type="button" id="submit_open_key_popup" class="btn btn-success" style="width:15%;">Gửi</button><br>
                    <span id="txt_open_key_result" style="color: red;"></span>
                </div>
            </div>
        </div>
    </div>

    {{--    ---------------------------------------------------------}}

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
                    url:"users/fetch_data?page="+page,
                    success:function(response)
                    {
                        return RenderListUser(response);
                    }
                });
            }
            // function fetch_data(page)
            // {
            //     let search_name = $("input[name=search_name]").val();
            //     let search_email = $("input[name=search_email]").val();
            //     let search_group = $( "#search_group option:selected").val();
            //     let search_status = $( "#search_status option:selected").val();
            //     $.ajax({
            //         url:"users/fetch_data?page="+page+"search_name="+search_name+"search_email="+search_email+"search_group="+search_group+"search_status="+search_status,
            //         success:function(response)
            //         {
            //             return RenderListUser(response);
            //         }
            //     });
            // }
//---------------------------------------------------------------------------------------Button
            $("#search_user").click(function(){
                let search_name = $("input[name=search_name]").val();
                let search_email = $("input[name=search_email]").val();
                let search_group = $( "#search_group option:selected").val();
                let search_status = $( "#search_status option:selected").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('search_user') }}",
                    type:"GET",
                    data:{
                        search_name : search_name,
                        search_email : search_email,
                        search_group : search_group,
                        search_status : search_status,
                    },
                    success: function(response){
                        return RenderListUser(response);
                    },
                    error: function(){
                        not_result();
                    }
                });
            });

            $("#search_drop").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('search_drop') }}",
                    type:"GET",
                    success: function(response){
                        return RenderListUser(response);
                    }
                });
            });

//---------------------------------------------------------------------------------------- CURD
            $("#submit_popup").click(function(){
                let pop_user_name = $("input[name=pop_user_name]").val();
                let pop_user_email = $("input[name=pop_user_email]").val();
                let pop_user_password = $("input[name=pop_user_password]").val();
                let pop_user_pw = $("input[name=pop_user_pw]").val();
                let pop_user_group = $( "#pop_user_group option:selected").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('pop_user_insert') }}",
                    type:"POST",
                    data:{
                        pop_user_name : pop_user_name,
                        email : pop_user_email,
                        pop_user_password : pop_user_password,
                        pop_user_pw : pop_user_pw,
                        pop_user_group : pop_user_group,
                    },
                    success: function(response){
                        if(response.messenge){
                            if(response.messenge.pop_user_name){
                                $("#txt_pop_user_name").html(response.messenge.pop_user_name[0]);
                            }else{
                                $("#txt_pop_user_name").html('');
                            };
                            if(response.messenge.email){
                                $("#txt_pop_user_email").html(response.messenge.email[0]);
                            }else{
                                $("#txt_pop_user_email").html('');
                            };
                            if(response.messenge.pop_user_password){
                                $("#txt_pop_user_password").html(response.messenge.pop_user_password[0]);
                            }else{
                                $("#txt_pop_user_password").html('');
                            };
                            if(response.messenge.pop_user_pw){
                                $("#txt_pop_user_pw").html(response.messenge.pop_user_pw[0]);
                            }else{
                                $("#txt_pop_user_pw").html('');
                            };
                        }
                        else{
                            $("#txt_result").html(response.result);
                            delete_content();
                            show_result();
                        }
                    }
                });
            });

            $("#submit_update_popup").click(function(){
                let id = $("#user_id").val();
                let update_user_name = $("input[name=update_user_name]").val();
                let update_user_email = $("input[name=update_user_email]").val();
                let update_user_password = $("input[name=update_user_password]").val();
                let update_user_group = $( "#update_user_group option:selected").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('user_update') }}",
                    type:"POST",
                    data:{
                        id : id,
                        pop_user_name : update_user_name,
                        email : update_user_email,
                        pop_user_password : update_user_password,
                        pop_user_group : update_user_group,
                    },
                    success: function(response){
                        if(response.messenge){
                            if(response.messenge.pop_user_name){
                                $("#txt_update_user_name").html(response.messenge.pop_user_name[0]);
                            }else{
                                $("#txt_update_user_name").html('');
                            };
                            if(response.messenge.pop_user_password){
                                $("#txt_update_user_password").html(response.messenge.pop_user_password[0]);
                            }else{
                                $("#txt_update_user_password").html('');
                            };
                        }
                        else{
                            $("#txt_update_result").html(response.result);
                            $("#txt_update_user_name").html('');
                            $("#txt_update_user_email").html('');
                            $("#txt_update_user_password").html('');
                            $("#txt_update_user_pw").html('');
                            show_result();
                        }
                    }
                });
            });

            $("#submit_delete_popup").click(function(){
                let id = $("#user_id_delete").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('user_delete') }}",
                    type:"POST",
                    data:{
                        id : id,
                    },
                    success: function(response){
                        $("#txt_delete_result").html(response.messenge_delete);
                        show_result();
                    }
                });
            });

            $("#submit_open_key_popup").click(function(){
                let id = $("#user_id_open_key").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('user_open_key') }}",
                    type:"POST",
                    data:{
                        id : id,
                    },
                    success: function(response){
                        if(response.key == 1){
                            $("#txt_open_key_result").html('Đã mở khóa thành công!');
                        }
                        else{
                            $("#txt_open_key_result").html('Đã khóa thành công!');
                        }
                        show_result();
                    }
                });
            });

            $("#close_popup").click(function(){
                $("#txt_result").html('');
                delete_content();
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
                    let user_id = element.dataset.edit;
                    console.log(element.dataset.edit);
                    $('#user_id').val(user_id);
                    $('#update_user_email').attr('readonly', true);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ route('pop_user_update') }}",
                        type:"POST",
                        data:{
                            user_id : user_id,
                        },
                        success: function(response){
                            $("#update_user_name").val(response.name);
                            $("#update_user_email").val(response.email);
                            $("#update_user_password").val(response.password);
                            let check_a = response.group_role;
                            console.log(check_a);
                            $( "#update_user_group").val(check_a).change();
                            if(response.is_active==1){
                                $("#update_user_status").html('FALSE');
                            }
                            else{
                                $("#update_user_status").html('TRUE');
                            }
                        }
                    });
                });
            });

            let del = document.getElementsByClassName('delete');   //----------DELETE
            Array.prototype.forEach.call(del, function(element) {
                element.addEventListener('click', function() {
                    let user_id = element.dataset.delete;
                    let arrayStrig = user_id.split(",");
                    $("#user_id_delete").val(arrayStrig[0]);
                    $("#name_delete").html(arrayStrig[1]);
                    console.log(arrayStrig[1]);
                });
            });

            let op = document.getElementsByClassName('open_key');   //----------DELETE
            Array.prototype.forEach.call(op, function(element) {
                element.addEventListener('click', function() {
                    let user_id = element.dataset.open_key;
                    let arrayStrig = user_id.split(",");
                    $("#user_id_open_key").val(arrayStrig[0]);
                    $("#name_open_key").html(arrayStrig[1]);
                    console.log(arrayStrig[1]);
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
                url: "{{ route('not_user') }}",
                type:"GET",
                success: function(response){
                    $("#user_content").empty();
                    $("#user_content").html(response);
                }
            });
        }
        function RenderListUser(response){
            $("#user_content").empty();
            $("#user_content").html(response);
        }
        function show_result(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('search_drop') }}",
                type:"GET",
                success: function(response){
                    return RenderListUser(response);
                }
            });
        }
        function delete_content(){
            $("#pop_user_name").val('');
            $("#pop_user_email").val('');
            $("#pop_user_password").val('');
            $("#pop_user_pw").val('');
            $("#txt_pop_user_name").html('');
            $("#txt_pop_user_email").html('');
            $("#txt_pop_user_password").html('');
            $("#txt_pop_user_pw").html('');
        }

    </script>
@endsection
