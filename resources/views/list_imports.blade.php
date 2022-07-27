@extends('home_1')
@section('content')
    <div class="row" style="height: 40px; padding-top: 10px;">
        <h5 style="margin-left: 20px;">Import</h5>
    </div>
    <hr style="border: lightblue solid 1px;">
    <form action="{{route('import_csv')}}" method="POST" enctype="multipart/form-data" style="margin-left: 10px;">
        @csrf
        <input type="file" name="file" accept=".xlsx">&emsp;&emsp;&emsp;&emsp;
        <input type="submit" value="Import CSV" name="import_csv" class="btn btn-warning">
    </form>
    <br>
    <div class="list_imports">
        <table width="100%" class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Họ Tên</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer as $key => $value)
                <input type="text" id="cs_id{{ $key }}" hidden value="{{ $value->id }}">
                <tr>
                    <td>
                        &emsp;{{ $key + 1 }}
                    </td>
                    <td>
                        {{ $value->name }}
                        <input type="text" id="cs_name{{ $key }}" hidden value="{{ $value->name }}">
                    </td>
                    <td>
                        {{ $value->email }}
                        <input type="text" id="cs_email{{ $key }}" hidden value="{{ $value->email }}">
                    </td>
                    <td>
                        {{ $value->address }}
                        <input type="text" id="cs_address{{ $key }}" hidden value="{{ $value->address }}">
                    </td>
                    <td>
                        {{ $value->tel_num }}
                        <input type="text" id="cs_tel_num{{ $key }}" hidden value="{{ $value->tel_num }}">
                    </td>
                    <td>
                        <i class="fas fa-user-plus insert_customer" data-id="{{ $key }}"></i>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            /**  Insert customer ( ajax ) */
            let dd = document.getElementsByClassName('insert_customer');
            Array.prototype.forEach.call(dd, function(element) {
                element.addEventListener('click', function() {
                    let id = element.dataset.id;
                    insert_data(id);
                });
            });
        });


        /**  Function insert customer (ajax ) */
        function insert_data($id){
            let cs_id = $("#cs_id"+$id).val();
            let cs_name = $("#cs_name"+$id).val();
            let cs_email = $("#cs_email"+$id).val();
            let cs_address = $("#cs_address"+$id).val();
            let cs_tel_num = $("#cs_tel_num"+$id).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('csv_insert_customer') }}",
                type:"POST",
                data:{
                    id : cs_id,
                    cs_name : cs_name,
                    email : cs_email,
                    cs_address : cs_address,
                    cs_tel_num : cs_tel_num
                },
                success: function(response){
                    if(response.messenge){
                        let abc = '';
                        if(response.messenge.cs_name) {
                            abc += response.messenge.cs_name[0] + "<br>";
                        }
                        if(response.messenge.email){
                            abc += response.messenge.email[0] + "<br>";
                        }
                        if(response.messenge.cs_address){
                            abc += response.messenge.cs_address[0] + "<br>";
                        }
                        if(response.messenge.cs_tel_num){
                            abc += response.messenge.cs_tel_num[0] + "<br>";
                        }
                        alertify.error(abc);
                    }
                    else{
                        $(".list_imports").empty();
                        $(".list_imports").html(response);
                        alertify.message('Đã thêm khách hàng thành công!');
                    }
                }
            });
        }
    </script>
@endsection
