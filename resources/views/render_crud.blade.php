{{--<div class="row" style="height: 40px; padding-top: 10px;">--}}
{{--    <h5 style="margin-left: 20px;">Users</h5>--}}
{{--</div>--}}
{{--<hr style="border: lightblue solid 1px;">--}}
{{--<table width="100%" style="margin-left: 10px;">--}}
{{--    <tr>--}}
{{--        <th>Tên</th>--}}
{{--        <th>Email</th>--}}
{{--        <th>Nhóm</th>--}}
{{--        <th>Trạng thái</th>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td>--}}
{{--            <input type="text" name="search_name" id="search_name" placeholder="Nhập họ tên">--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            <input type="text" name="search_email" id="search_email" placeholder="Nhập email">--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            <select name="search_group" id="search_group" style="width: 200px;">--}}
{{--                <option selected disabled value="Null">Chọn nhóm</option>--}}
{{--                <option value="1">Admin</option>--}}
{{--                <option value="2">Editor</option>--}}
{{--                <option value="3">Reviewer</option>--}}
{{--            </select>--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            <select name="search_status" id="search_status" style="width: 200px;">--}}
{{--                <option selected disabled value="Null">Chọn trạng thái</option>--}}
{{--                <option value="0">Đang hoạt động</option>--}}
{{--                <option value="1">Tạm khóa</option>--}}
{{--            </select>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--</table>--}}

{{--<div class="row" style="margin-top: 25px;">--}}
{{--    <div class="col-2">--}}
{{--        <div class="butt">--}}
{{--            <img src="../image/insert_user.png" width="20%">--}}
{{--            <div class="butt_1" id="insert_user" data-toggle="modal" data-target="#myModal">Thêm mới</div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-6"></div>--}}
{{--    <div class="col-2">--}}
{{--        <div class="butt">--}}
{{--            <img src="../image/search_user.png" width="20%">--}}
{{--            <div class="butt_1" id="search_user">Tìm kiếm</div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-2">--}}
{{--        <div class="butt">--}}
{{--            <img src="../image/search_drop.png" width="20%">--}}
{{--            <div class="butt_2" id="search_drop">Xóa tìm</div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div id="user_content">--}}
{{--    <div class="row" style="height: 100px; padding-top: 25px;">--}}
{{--        <div class="col-1"></div>--}}
{{--        <div class="col-7">--}}
{{--            <center>{!! $user->links('pagination::bootstrap-4') !!}</center>--}}
{{--        </div>--}}
{{--        <div class="col-1"></div>--}}
{{--        <div class="col-3" style="padding-top: 10px;">--}}
{{--            @foreach ($user as $key => $val)--}}
{{--            @endforeach--}}
{{--            Hiển thị từ {{ ($user->currentpage()-1)*$user->perpage() }} ~--}}
{{--            {{ ($user->currentpage()-1) * $user->perpage() + $key + 1 }}--}}
{{--            tổng số <B>{{ $total_user }}</B> user--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <table width="100%">--}}
{{--        <tr style="background-color: brown; color: white;">--}}
{{--            <th>#</th>--}}
{{--            <th>Họ Tên</th>--}}
{{--            <th>Email</th>--}}
{{--            <th>Nhóm</th>--}}
{{--            <th>Trạng Thái</th>--}}
{{--            <th></th>--}}
{{--        </tr>--}}
{{--        @foreach($user as $key => $value)--}}
{{--            <tr>--}}
{{--                <td>--}}
{{--                    {{ $key + 1 }}--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                    {{ $value->name }}--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                    {{ $value->email }}--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                    @if($value->group_role == 1)--}}
{{--                        Admin--}}
{{--                    @elseif($value->group_role == 2)--}}
{{--                        Editor--}}
{{--                    @else--}}
{{--                        Reviewer--}}
{{--                    @endif--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                    {{ $value->is_active == 0 ? 'Đang Hoạt Động' : 'Tạm Khóa' }}--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                    <i class="fas fa-pen"></i>--}}
{{--                    <i class="fas fa-trash-alt" style="color: red;"></i>--}}
{{--                    <i class="fas fa-user-times"></i>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}
{{--    <div class="row" style="height: 100px; padding-top: 25px;">--}}
{{--        <div class="col-1"></div>--}}
{{--        <div class="col-7">--}}
{{--            <center>{!! $user->links('pagination::bootstrap-4') !!}</center>--}}
{{--        </div>--}}
{{--        <div class="col-4"></div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--    ------------------------------POPUP INSERT DELETE---------------------}}
{{--<div class="modal fade" id="myModal" role="dialog" >--}}
{{--    <div class="modal-dialog">--}}
{{--        <!-- Modal content-->--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title">Thêm User / Chỉnh sửa User</h5>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <table  style="width: 600px; line-height: 55px;">--}}
{{--                    <tr>--}}
{{--                        <th>Tên</th>--}}
{{--                        <td><input type="text" id="pop_user_name" name="pop_user_name"></td>--}}
{{--                    </tr>--}}
{{--                    <tr style="line-height: 5px; color: red;">--}}
{{--                        <td></td>--}}
{{--                        <td id="txt_pop_user_name"></td>--}}
{{--                    </tr>--}}

{{--                    <tr>--}}
{{--                        <th>Email</th>--}}
{{--                        <td><input type="email" id="pop_user_email" name="pop_user_email"></td>--}}
{{--                    </tr>--}}
{{--                    <tr style="line-height: 5px; color: red;">--}}
{{--                        <td></td>--}}
{{--                        <td id="txt_pop_user_email"></td>--}}
{{--                    </tr>--}}

{{--                    <tr>--}}
{{--                        <th>Mật khẩu</th>--}}
{{--                        <td><input type="password" id="pop_user_password" name="pop_user_password"></td>--}}
{{--                    </tr>--}}
{{--                    <tr style="line-height: 5px; color: red;">--}}
{{--                        <td></td>--}}
{{--                        <td id="txt_pop_user_password"></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th>Xác nhận</th>--}}
{{--                        <td><input type="password" id="pop_user_pw" name="pop_user_pw"></td>--}}
{{--                    </tr>--}}
{{--                    <tr style="line-height: 5px; color: red;">--}}
{{--                        <td></td>--}}
{{--                        <td id="txt_pop_user_pw"></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th>Nhóm</th>--}}
{{--                        <td>--}}
{{--                            <select name="pop_user_group" id="pop_user_group" style="width: 200px;">--}}
{{--                                <option selected disabled value="3">Chọn nhóm</option>--}}
{{--                                <option value="1">Admin</option>--}}
{{--                                <option value="2">Editor</option>--}}
{{--                                <option value="3">Reviewer</option>--}}
{{--                            </select>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th>Trạng thái</th>--}}
{{--                        <td>TRUE</td>--}}
{{--                    </tr>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>--}}
{{--                <button type="button" id="submit_popup">Lưu</button>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}
