<table width="100%" class="table table-striped">
    <thead>
    <tr>
        <th width="5%">#</th>
        <th width="15%">Tên sản phẩm</th>
        <th width="35%">Mô tả</th>
        <th width="10%">Gía</th>
        <th width="25%">Tình trạng</th>
        <th width="15%"></th>
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
<script>
    /**  Function hide/show image product */
        Array.prototype.forEach.call(document.getElementsByClassName('product_image'), function(element) {
            let user_id = element.dataset.im;
            element.addEventListener('mouseover', function() {
                $("#image_"+user_id).css("display", 'block');
            });
            element.addEventListener('mouseout', function() {
                $("#image_"+user_id).css("display", 'none');
            });
        });
        // let del = ;   //----------DELETE



        /**  Function show name product in popup Delete product (ajax ) */
        Array.prototype.forEach.call(document.getElementsByClassName('pr_delete'), function(element) {
            element.addEventListener('click', function() {
                let user_id = element.dataset.delete;
                let arrayStrig = user_id.split(",");
                $("#pr_id_delete").val(arrayStrig[0]);
                $("#pr_name_delete").html(arrayStrig[1]);
                console.log(arrayStrig[1]);
            });
        });
</script>
