@extends('home_1')
@section('content')
    <div class="row" style="height: 40px; padding-top: 10px;">
        <div class="col-2">
            <h5 style="margin-left: 20px;">Chi tiết sản phẩm</h5>
        </div>
        <div class="col-7"></div>
        <div class="col-3">
            <a href="{{ route('product_manage') }}">Sản phẩm</a> >> Chi tiết sản phẩm
        </div>
    </div>
    <hr style="border: lightblue solid 1px;">

    <form action="{{ route('update2_product') }}" name="" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="product_id"
              hidden size="30" value="@if(isset($product_id))
        {{ $product_id }}
        @endif">
        <div class="row">
            <div class="col-6 edit_product">
                <table>
                    <tr>
                        <td><b>Tên sản phẩm</b></td>
                        <td>
                            <input type="text" name="edit_product_name" id="edit_product_name" class="form-control"
                                   placeholder="Nhập tên sản phẩm" size="30" <?php if(isset($product_name)) echo "value='".$product_name."'"; ?>>
                        </td>
                    </tr>
                    <tr style="line-height: 5px; color: red;">
                        <td></td>
                        <td id="txt_edit_product_name">
                            @if ($errors->has('edit_product_name'))
                                {{ $errors->first('edit_product_name') }}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td><b>Gía bán</b></td>
                        <td>
                            <input type="text" name="edit_product_price" id="edit_product_price" class="form-control"
                                   placeholder="Nhập giá bán" size="30" <?php if(isset($product_price)) echo "value='".$product_price."'"; ?>>
                        </td>
                    </tr>
                    <tr style="line-height: 5px; color: red;">
                        <td></td>
                        <td id="txt_edit_product_price">
                            @if ($errors->has('edit_product_price'))
                                {{ $errors->first('edit_product_price') }}
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="product">Mô tả: </label>
                        </td>
                        <td>
                        <textarea name="description" id="description" class="form-control">
                            <?php if(isset($description)) echo $description; ?>
                         </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="product" style="margin-top: 16px;">Trạng thái: </label>
                        </td>
                        <td>
                            <select name="edit_product_status" class="custom-select rounded-0" id="edit_product_status" style="width: 200px;">
                                <option disabled value="Null">Chọn trạng thái</option>
                                @if(isset($is_sales))
                                        @if($is_sales==0)
                                            <option value='0' selected >Hết hàng</option>
                                            <option value='1'>Đang bán</option>
                                        @else
                                            <option value='0'>Hết hàng</option>
                                            <option value='1' selected>Đang bán</option>
                                        @endif
                                    @else
                                         <option value='0'>Hết hàng</option>
                                        <option value='1' selected>Đang bán</option>
                                    @endif
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-4"><br>
                <b>Hình ảnh</b><br><br>
                <div class="edit_image_product" style="border-radius: 20px;">
                    <center>
                        @if(isset($product_image))
                            @if($product_image!='')
                                <img src="http://it15.internship.rcvn.work/image/{{ $product_image }}" id="img_src">
                            @else
                                <img src="http://it15.internship.rcvn.work/image/edit_product.png" id="img_src">
                                @endif
                        @else
                            <img src="http://it15.internship.rcvn.work/image/edit_product.png" id="img_src">
                            @endif
                    </center>
                </div>
                <span style="color: red;">
                    @if ($errors->has('image_file'))
                        {{ $errors->first('image_file') }}
                    @endif
                </span>
                <Br><Br>
                <input type="file" id="imgInp" name="image_file" hidden/>
                <label style="background-color: dodgerblue; height: 30px; width: 70px;
                       border: 1px solid; border-radius: 5px;"
                       for="imgInp"><b><center>Upload</center></b></label>
                <label style="background-color: #f6993f;height: 30px; width: 70px;
                       border: 1px solid; border-radius: 5px;" id="del"><b><center>Xóa file</center></b></label>
                <input type="text" id="image_product_name" name="image_product_name" readonly placeholder="tên file upload" style="border-radius: 5px; border: lightblue 1px solid;height: 34px;"
                <?php if(isset($product_image)) echo "value='".$product_image."'"; ?>>
            </div>
            <div class="col-2"></div>
        </div><br><Br><Br>
        <button id="exit_edit_product" style="width: 80px; height: 45px; border-radius: 10px; background-color: lightblue;  border: 1px solid lightblue;
                margin-left: 900px;">
            <a href="{{ route('product_manage') }}">Hủy</a>
            </button>&emsp;
        <input type="submit" style="width: 80px; height: 45px; border-radius: 10px; background-color: orange;  border: 1px solid lightblue;">
    </form>
    @if(isset($result))
    <h3>&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;{{ $result }}</h3>
    @endif
    {{--    ---------------------------------------------------------}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#imgInp").change(function(){
                let [file] = imgInp.files;
                if (file) {
                    img_src.src = URL.createObjectURL(file);
                    console.log($('#imgInp')[0].files[0].name);
                    let name = $('#imgInp')[0].files[0].name;
                    $('#image_product_name').val(name);
                }
            });
            $("#del").click(function(){
                img_src.src = '../image/edit_product.png';
                $('#image_product_name').val('');
            });
        });
    </script>
@endsection
