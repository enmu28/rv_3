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

    <form action="{{ route('insert_product') }}" name="" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-6 edit_product">
            <table>
                <tr>
                    <td>
                        <label for="product">Nhập tên sản phẩm: </label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control"  name="edit_product_name" id="edit_product_name" placeholder="Nhập tên sản phẩm" size="30">
                        </div>
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
                    <td>
                        <label for="product">Gía bán: </label>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="number" name="edit_product_price" id="edit_product_price"
                               placeholder="Nhập giá bán" size="30" class="form-control" >
                        </div>
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
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="product" style="margin-top: 16px;">Trạng thái: </label>
                    </td>
                    <td>
                        <select class="custom-select rounded-0"  name="edit_product_status" id="edit_product_status" style="width: 200px; margin-top: 16px;">
                            <option selected disabled value="Null">Chọn trạng thái</option>
                            <option value="1">Đang bán</option>
                            <option value="0">Hết hàng</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-4"><br>
                <b>Hình ảnh</b><br><br>
                <div class="edit_image_product" style="border-radius: 20px;">
                    <center>
                        <img src="../image/edit_product.png" id="img_src">
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
                <input type="text" id="image_product_name" name="image_product_name" placeholder="tên file upload" style="border-radius: 5px; border: lightblue 1px solid;height: 34px;">
        </div>
        <div class="col-2"></div>
    </div><br><Br><Br>
        <input type="reset" value="Hủy" id="exit_edit_product" style=" border: 1px solid lightblue;">&emsp;
        <input type="submit" style="width: 80px; height: 45px; border-radius: 10px; background-color: orange; border: 1px solid lightblue;">
    </form>
        @if(isset($result))
            &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
    <h3>{{ $result }}</h3>
            @endif
    {{--    ---------------------------------------------------------}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            /**  Change image background when upload file image */
            $("#imgInp").change(function(){
                let [file] = imgInp.files;
                if (file) {
                    img_src.src = URL.createObjectURL(file);
                    console.log($('#imgInp')[0].files[0].name);
                    let name = $('#imgInp')[0].files[0].name;
                    $('#image_product_name').val(name);
                }
            });


            /**  Drop image background */
            $("#del").click(function(){
                img_src.src = '../image/edit_product.png';
                $('#image_product_name').val('');
            });

            // $("#exit_edit_product").click(function(){
            //     window.location="../product";
            // });
        });
    </script>
@endsection
