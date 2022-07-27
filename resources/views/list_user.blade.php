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
<script>
    //----------UPDATE
    /**  Function insert value in popup Edit User (ajax ) */
    Array.prototype.forEach.call(document.getElementsByClassName('edit'), function(element) {
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

    //----------DELETE
    /**  Function show value User name in popup Delete User (ajax ) */
    Array.prototype.forEach.call(document.getElementsByClassName('delete'), function(element) {
        element.addEventListener('click', function() {
            let user_id = element.dataset.delete;
            let arrayStrig = user_id.split(",");
            $("#user_id_delete").val(arrayStrig[0]);
            $("#name_delete").html(arrayStrig[1]);
            console.log(arrayStrig[1]);
        });
    });

    //----------OPEN KEY
    Array.prototype.forEach.call(document.getElementsByClassName('open_key'), function(element) {
        element.addEventListener('click', function() {
            let user_id = element.dataset.open_key;
            let arrayStrig = user_id.split(",");
            $("#user_id_open_key").val(arrayStrig[0]);
            $("#name_open_key").html(arrayStrig[1]);
            console.log(arrayStrig[1]);
        });
    });
</script>
