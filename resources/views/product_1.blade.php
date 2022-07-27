@extends('home_1')
@section('content')
    <section class="content">
        <Br>
        <div class="row" >
            <div class="col-2">
                <div class="form-group">
                    <label for="product">Tên sản phẩm:</label>
                    <input type="text" class="form-control" name="pr_search_name" id="pr_search_name" placeholder="Nhập tên sản phẩm">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label>Trạng thái:</label>
                    <select class="custom-select rounded-0" name="pr_search_status" id="pr_search_status">
                        <option selected disabled value="Null">Chọn trạng thái</option>
                        <option value="1">Đang bán</option>
                        <option value="0">Hết hàng</option>
                    </select>
                </div>
            </div>
            <div class="col-2" style="text-align: left;">
                <div class="form-group" style="width: 70%;">
                    <label for="price_product_1">Gía bán từ: &emsp;&ensp;~</label>
                    <input type="text" class="form-control"  name="pr_search_price_1" id="pr_search_price_1" size="10">
                </div>
            </div>
            <div class="col-2" style="margin-left: -50px;text-align: left;">
                <div class="form-group" style="width: 70%;">
                    <label for="price_product_2">Gía bán đến: </label>
                    <input type="text" class="form-control"  name="pr_search_price_21" id="pr_search_price_2" size="10">
                </div>
            </div>
            <div class="col-4" style="text-align: left; padding-top: 30px;margin-left: -40px;">
                <button type="button" class="btn btn-primary" id="search_product" style="width: 110px;" >Tìm kiếm</button>&emsp;
                <button type="button" class="btn btn-success" id="pr_search_drop" style="width: 110px">Xóa tìm</button>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
            </div>
            <div class="col-2" style="text-align: right;">
                <button type="button" class="btn btn-primary" id="insert_product" style="width: 110px;">
                    <a href="{{ route('edit_product') }}" style="text-decoration: none; color: white;">Thêm mới</a>
                </button>
            </div>
        </div>
        <div id="product_content">
            <table width="100%" class="table table-striped">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="15%">Tên sản phẩm</th>
                        <th width="35%">Mô tả</th>
                        <th width="10%">Gía</th>
                        <th width="25%">Tình trạng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($product as $key => $value)
                    <tr>
                        <td>
                            {{ $key + 1 }}
                        </td>
                        @if($value->product_image != '')
                            <img src="../image/{{ $value->product_image }}" width="150px;" height="150px;" id="image_{{ $value->product_id }}"
                                 style="display: none; position: absolute; z-index: 1;
                                     margin-left: 450px; margin-top: {{ 45*$key }}px; border-radius: 10px; border: 1px solid;">
                        @endif
                        <td class="product_image" data-im="{{ $value->product_id }}">
                            {{ $value->product_name }}
                        </td>
                        <td width="400px;">
                            {{ substr($value->description, 0, 41) }}&ensp;...
                        </td>
                        <td>
                            {{ $value->product_price }}
                        </td>
                        <td>
                            @if($value->is_sales == 1)
                                Đang bán
                            @elseif($value->is_sales == 0)
                                Hết hàng
                            @endif
                        </td>
                        <td>
                            <a href="update_product/{{ $value->product_id }}">
                                <i class="fas fa-pen"></i>&ensp;
                            </a>
                            <i class="fas fa-trash-alt pr_delete" data-delete="{{ $value->product_id }},{{ $value->product_name }}"
                               style="color: red;" data-toggle="modal" data-target="#pr_popup_delete"></i>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row" style="height: 100px; padding-top: 25px;">
                <div class="col-1"></div>
                <div class="col-7">
                    <center>{!! $product->links('pagination::bootstrap-4') !!}</center>
                </div>
                <div class="col-1"></div>
                <div class="col-3" style="padding-top: 10px;">
                    @foreach ($product as $key => $val)
                    @endforeach
                    Hiển thị từ {{ ($product->currentpage()-1)*$product->perpage() + 1 }} ~
                    {{ ($product->currentpage()-1) * $product->perpage() + $key + 1 }}
                    tổng số <B>{{ $total_product }}</B> sản phẩm
                </div>
            </div>
        </div>
    </section>


    {{--    ------------------------------POPUP DELETE---------------------}}
    <div class="modal fade" id="pr_popup_delete" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bạn có chắc xóa sản phẩm - <span id="pr_name_delete"></span> chứ?</h5>
                    <span id="pr_id_delete" hidden></span>
                </div>
                <div class="modal-body">
                    <button type="button" id="pr_close_delete_popup" class="btn btn-default" data-dismiss="modal">Thoát</button>
                    <button type="button" id="pr_submit_delete_popup">Xóa</button><br>
                    <span id="pr_txt_delete_result" style="color: red;"></span>
                </div>
            </div>
        </div>
    </div>
    {{--    ---------------------------------------------------------}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            /**  Function hide/show image product */
            let image = document.getElementsByClassName('product_image');
            Array.prototype.forEach.call(image, function(element) {
                let user_id = element.dataset.im;
                element.addEventListener('mouseover', function() {
                    $("#image_"+user_id).css("display", 'block');
                });
                element.addEventListener('mouseout', function() {
                    $("#image_"+user_id).css("display", 'none');
                });
            });
//-------------------------------------------------------------------------------------- Pagination
            /**  Pagination for page Product ( ajax ) */
            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
                $.ajax({
                    url:"product/fetch_data?page="+page,
                    success:function(response)
                    {
                        return RenderListProduct(response);
                    }
                });
            }

            $("#pr_search_drop").click(function(){
                show_result();
            });


            /**  Search of Product page ( ajax ) */
            $("#search_product").click(function(){
                let pr_search_name = $("input[name=pr_search_name]").val();
                let pr_search_status = $( "#pr_search_status option:selected").val();
                let pr_search_price_1 = $("input[name=pr_search_price_1]").val();
                let pr_search_price_2 = $("input[name=pr_search_price_2]").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('search_product') }}",
                    type:"GET",
                    data:{
                        pr_search_name : pr_search_name,
                        pr_search_status : pr_search_status,
                        pr_search_price_1 : pr_search_price_1,
                        pr_search_price_2 : pr_search_price_2,
                    },
                    success: function(response){
                        return RenderListProduct(response);
                    },
                    error: function(){
                        not_result();
                    }
                });
            });


            /**  Delete Product ( ajax ) */
            $("#pr_submit_delete_popup").click(function(){
                let id_delete = $("#pr_id_delete").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('product_delete') }}",
                    type:"POST",
                    data:{
                        id : id_delete,
                    },
                    success: function(response){
                        $("#pr_txt_delete_result").html(response.messenge_delete);
                        show_result();
                    }
                });
            });

            /**  Close Popup */
            $("#pr_close_delete_popup").click(function(){
                $("#pr_txt_delete_result").html('');
                $("#name_delete").html('');
            });


            /**  Show value Product name in Popup delete product ( ajax ) */
            let del = document.getElementsByClassName('pr_delete');   //----------DELETE
            Array.prototype.forEach.call(del, function(element) {
                element.addEventListener('click', function() {
                    let user_id = element.dataset.delete;
                    let arrayStrig = user_id.split(",");
                    $("#pr_id_delete").val(arrayStrig[0]);
                    $("#pr_name_delete").html(arrayStrig[1]);
                    console.log(arrayStrig[1]);
                });
            });
        });
        //---------------------------------------------------------------------------------FUNCTION
        /**  Function reset table Product (ajax) */
        function RenderListProduct(response){
            $("#product_content").empty();
            $("#product_content").html(response);
        }


        /**  Function response view list_product ( ajax ) */
        function show_result(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('pr_search_drop') }}",
                type:"GET",
                success: function(response){
                    return RenderListProduct(response);
                }
            });
        }


        /**  Function for response view not result ( ajax ) */
        function not_result(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('not_product') }}",
                type:"GET",
                success: function(response){
                    $("#product_content").empty();
                    $("#product_content").html(response);
                }
            });
        }
    </script>
@endsection
