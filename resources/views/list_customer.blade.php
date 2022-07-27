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
<script>
    /**  Exit edit customer ( ajax )

     * @return: response view list_customer
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    $(".cs_exit").click(function(){
        show_result();
    });



    /**  Show Update customer

     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    Array.prototype.forEach.call(document.getElementsByClassName('cs_edit'), function(element) {
        element.addEventListener('click', function() {
            let user_id = element.dataset.edit;
            $(this).hide();
            $(".cs_hidden"+user_id).hide();
            $(".cs_edit"+user_id).show();
            $(".cs_exit"+user_id).show();
        });
    });



    /**  Update customer ( ajax )

     * @param Request $request
     * @return: response view list_customer with new result update
     * @author : Mr Vi <nguyen.vi@rivercrane.com.vn>
     * @lastupdate: Mr Vi <nguyen.vi@rivercrane.com.vn>
     */
    Array.prototype.forEach.call(document.getElementsByClassName('cs_submit'), function(element) {
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
</script>
