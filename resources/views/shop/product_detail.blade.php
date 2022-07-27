<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Your Store</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{--        <base href="http://localhost:8000/opencart-3.0.3.8/upload/">--}}
    <meta property="og:url"           content="{{ url()->full() }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $product->product_name }}" />
    <meta property="og:description"   content="{{ $product->description }}" />
    <meta property="og:image"         content="../image/{{ $product->product_image }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css">

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <link href="{{ url('/css/stylesheet.css') }}" rel="stylesheet">
</head>
<body onload="total_online()"><Br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('shop_home') }}">
                <img src="../image/logo.jpg" title="Your Store" alt="Your Store">
            </a>
        </div>
        <div class="col-md-2">
        </div>
        <div class="col-12 col-md-6">
            <nav class="navbar navbar-expand-sm d-none d-md-block ">
                <form class="input-group" action="{{ route('shop_search_product') }}" method="get">
                    <input type="text" class="form-control" placeholder="Search" name="name_product">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </nav>
            <nav class="navbar navbar-expand-sm d-block d-md-none ">
                <form class="input-group" action="{{ route('shop_search_product') }}" method="get">
                    <div class="input-group-append">
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="height:60%; width: 90%;">
                            <div class="offcanvas-body">
                                <div class="row">
                                    <div class="col-10">MENU</div>
                                    <div class="col-2">
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                </div>
                                <hr>
                                <div style="line-height: 25px;">
                                    <a href="/category_product?category=1">Rau</a><Br>
                                    <a href="/category_product?category=2">Củ</a><br>
                                    <a href="/category_product?category=3">Quả</a><Br>
                                    <a href="/category_product?category=4">
                                        Đồ tươi sống
                                    </a><br>
                                    &emsp;&emsp;-<a href="/category_product?category=5"> Thịt</a><br>
                                    &emsp;&emsp;-<a href="/category_product?category=6"> Cá</a><br>
                                    &emsp;&emsp;-<a href="/category_product?category=7"> Cua</a><br>
                                    <a class="nav-link" href="/category_product?category=8">
                                        Đồ uống
                                    </a>
                                    &emsp;&emsp;-<a  href="/category_product?category=9"> Có ga</a><br>
                                    &emsp;&emsp;-<a  href="/category_product?category=10"> Không ga</a><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Search" name="name_product">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </nav>
        </div>
    </div>
</div>

<div class="container d-none d-md-block" style="margin-top: 10px;">
    <nav class="navbar navbar-expand bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/category_product?category=1"><b style="color: white;">&emsp;Rau</b></a>
            </li>&emsp;&emsp;
            <li class="nav-item">
                <a class="nav-link" href="/category_product?category=2"><b style="color: white;">&emsp;Củ</b></a>
            </li>&emsp;&emsp;
            <li class="nav-item">
                <a class="nav-link" href="/category_product?category=3"><b style="color: white;">&emsp;Quả</b></a>
            </li>&emsp;&emsp;

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  style="color: white;" href="/category_product?category=4" data-bs-toggle="dropdown">
                    &emsp;<b>Đồ tươi sống</b>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/category_product?category=5">Thịt</a>
                    <a class="dropdown-item" href="/category_product?category=6">Cá</a>
                    <a class="dropdown-item" href="/category_product?category=7">Cua</a>
                </div>
            </li>&emsp;&emsp;

            <li  class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/category_product?category=8" data-bs-toggle="dropdown" style="color: white;" >
                    &emsp;<b>Đồ uống</b>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/category_product?category=9">Có ga</a>
                    <a class="dropdown-item" href="/category_product?category=10">Không ga</a>
                </div>
            </li>&emsp;&emsp;


            <li class="nav-item">
                <a class="nav-link" href="/cart"  style="color: white;">
                    <b>&emsp;Giỏ hàng</b>
                    <i class="fa fa-shopping-cart" style="font-size:20px;color:white"></i>
                    (<b><span class="total">
                            @if(session()->has('cart'))
                                @php
                                    $sl = 0;
                                @endphp
                                @for($i=0;$i<count(session('cart'));$i++)
                                    @php
                                        $sl+= session('cart')[$i]['sl'];
                                    @endphp
                                @endfor
                                {{ $sl }}
                            @else
                                0
                            @endif
                        </span></b>)
                </a>
            </li>
        </ul>
    </nav>
</div>
<div class="container d-none d-md-block">
    <Br>
    Trang Chủ &emsp; >> &emsp; Sản phẩm &emsp; >> &emsp; {{ $product->product_name }}<hr style="color: lightblue;"><Br>
    <div class="row">
        <div class="col-3">
            <img src="../image/{{ $product->product_image }}" width="100%" style="border:1px solid lightblue" height="250px;">
        </div>
        <div class="col-5" style="padding-left: 30px;">
            <h3 style="color: black;"><b>{{ $product->product_name }}</b></h3>
            Trạng thái : <b style="color: green; line-height: 35px;">Còn hàng</b><br>
            Giá : <span style="color: orangered;"><b>{{ $product->product_price }}</b></span>&ensp;VNĐ
            <hr style="color: lightblue;">
            {{ $product->description }}
            <hr style="color: lightblue;">
            <Br>
            <div class="row">
                <div class="col-6">
                    Số lượng : <div style="height:40px; text-align: center; padding-top: 7px; margin-top: -30px; margin-left: 80px; border: 1px solid lightblue;">
                        <span style="width: 40%; text-align: center" id="giam">-</span>&emsp;
                        <span style="width: 20%" id="so_luong">1</span>&emsp;
                        <span style="width: 40%" id="tang"><b>+</b></span>
                    </div>
                </div>
                <div class="col-6">
                    <div id="mua_hang" data-id="{{ $product->product_id }}" style="background-color: forestgreen; height: 42px; width: 70%; border-radius: 5px; text-align: center; color: white; border: 1px solid lightblue; padding-top: 7px; margin-top: -7px;">
                        <B>Mua hàng</B>
                    </div>
                </div>
            </div>


            <Br>
            <div class="row">
                <div class="col-3">
                    Chia sẻ :
                </div>
                <div class="col-3">
                    <div id="fb-root"></div>
                    <div class="fb-share-button"
                         data-href="{{ url()->full() }}"
                         data-layout="button_count">
                    </div>
                </div>
                <div class="col-3">
                    <div style="border: 1px solid lightblue; height: 23px; margin-top: 3px; border-radius: 5px; text-align: center; overflow: hidden;">
                        <a href="https://twitter.com/intent/tweet?text={{ $product->slug }}&url={{ url()->full() }}" style="font-size: 12px; ">
                            <i class="fa fa-twitter" style="font-size:15px;color:#4267b2"></i><b>&ensp;Share</b></a>
                    </div>
                </div>
                <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
            </div>
        </div>
        <div class="col-1"></div>
        <div class="col-3">
            <div style="width: 100%; height: 50px; background-color: #0b2e13; padding-top: 15px; text-align: center; overflow: hidden;">
                <b style="color: white;">Các sản phẩm liên quan</b><Br><br>
            </div>
            @foreach($product_1 as $key => $val)
                <br>
                <a href="/product/{{ $val->slug }}">
                    <div style="border: 1px solid black; height: 152px;">
                        <img src="../image/{{ $val->product_image }}"
                             width="100%" height="150px" title="{{ $val->product_name }}">
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <Br><br>
</div>

<div class="container-fluid d-block d-md-none">
    Trang Chủ &ensp; >> &ensp; {{ $product->product_name }}<hr style="color: lightblue;">
    <div class="row">
        <div style="border: 1px solid lightblue; padding: 10%; margin-top: 5px; height: 259px;">
            <img src="../image/{{ $product->product_image }}" width="100%" style="border:1px solid lightblue" height="100%;">
        </div>
        <div class="col-6"><br>
            <h5 style="color: black; line-height: 17px;"><b>{{ $product->product_name }}</b></h5>
            Trạng thái : <b style="color: green; line-height: 35px;">Còn hàng</b><br>
            Giá : <span style="color: orangered;"><b>{{ $product->product_price }}</b></span>&ensp;VNĐ
        </div>
        <div class="col-12">
            <hr style="color: lightblue;">
            {{ $product->description }}
            <hr style="color: lightblue;">
            Chia sẻ :
            <br>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

            <!-- Your share button code -->
            <div class="fb-share-button" style="width: 18%;"
                 data-href="{{ url()->full() }}"
                 data-layout="button_count">
            </div>&emsp;

            <div style="border: 1px solid lightblue; height: 23px; width: 18%; border-radius: 5px; text-align: center; margin-top: -21px; margin-left: 95px; overflow: hidden;">
                <a href="https://twitter.com/intent/tweet?text={{ $product->slug }}&url={{ url()->full() }}" style="font-size: 12px; ">
                    <i class="fa fa-twitter" style="font-size:15px;color:#4267b2"></i><b>&ensp;Share</b></a>
            </div>
        </div>

        <div class="col-12">
            <hr style="color: lightblue">
            <div style="width: 50%; height: 40px; background-color: forestgreen; padding-top: 7px; text-align: center; overflow: hidden; margin-left: 25%; border-radius: 5px;">
                <b style="color: white;">Sản phẩm liên quan</b><br>
            </div>
            <center><i style="font-size: 14px;">Có phải bạn đang tìm những sản phẩm dưới đây</i></center><br>
            <div class="row">
                @foreach($product_1 as $key => $val)
                    <br>
                    <div class="col-6">
                        <a href="/product/{{ $val->slug }}">
                            <div style="border: 1px solid lightblue; height: 172px;">
                                <img src="../image/{{ $val->product_image }}"
                                     width="100%" height="135px" style="margin-bottom: 10px;">
                                <center><b>{{ $val->product_name }}</b></center>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <Br>
</div>


<div class="container-fluid"  style="background-color: #343a40; color: white; padding-top: 25px;">
    <div class="container d-none d-md-block">
        <div class="row" id="footer">
            <div class="col-md-3">
                <h5>Information</h5>
                <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Customer Service</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('shop_contact') }}">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Newsletter</h5>
                <ul class="list-unstyled">
                    <li><a href="/news/category_post?category=1">Nông sản</a></li>
                    <li><a href="/news/category_post?category=2">Hải sản</a></li>
                    <li><a href="/news/category_post?category=1">Một số thông tin khác</a></li>
                </ul>
            </div>
            <div class="col-3"></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6" style="text-align: left">
                <p>Powered By <a href="{{ route('shop_home') }}">RauCuOnline</a><br> Your Store © 2021</p>
            </div>
            <div class="col-6" style="text-align: right">
                Số người đang online : <span id="total_online">{{ $total }}</span>
            </div>
        </div>
    </div>

    <div class="container d-block d-md-none" style="font-size: 14px;">
        <div class="row" id="footer">
            <div class="col-4">
                <h5>Information</h5>
                <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                </ul>
            </div>
            <div class="col-4">
                <h5>Customer Service</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('shop_contact') }}">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-4">
                <h5>Newsletter</h5>
                <ul class="list-unstyled">
                    <li><a href="/news/category_post?category=1">Nông sản</a></li>
                    <li><a href="/news/category_post?category=2">Hải sản</a></li>
                    <li><a href="/news/category_post?category=1">Một số thông tin khác</a></li>
                </ul>
            </div>
            <div class="col-3"></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6" style="text-align: left">
                <p>Powered By <a href="{{ route('shop_home') }}">RauCuOnline</a><br> Your Store © 2021</p>
            </div>
            <div class="col-6" style="text-align: right">
                Số người đang online : <span id="total_online">{{ $total }}</span>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="myModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sản phẩm này vừa được thêm vào giỏ hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <img src="../image/{{ $product->product_image }}" width="100%">
                    </div>
                    <div class="col-8">
                        {{ $product->product_name }}<Br>
                        Số lượng : <span id="total_product">1</span><Br>
                        Giá : {{ $product->product_price }}<br><Br><Br>
                        <b>*</b> Giỏ hàng của bạn (<span class="total"></span>) sản phẩm
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tiếp tục mua sắp</button>
                <button type="button" class="btn btn-success" style="width: 40%;">
                    <a href="{{ route('cart') }}" style="color: white;">
                        Tiến hành thanh toán
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>

</body></html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).on('click', '#giam', function () {
        let so_luong =  parseInt($('#so_luong').text());
        so_luong = so_luong - 1;
        $("#so_luong").html(so_luong);
    });
    $(document).on('click', '#tang', function () {
        let so_luong =  parseInt($('#so_luong').text());
        so_luong = so_luong + 1;
        $("#so_luong").html(so_luong);
    });
    document.addEventListener("DOMContentLoaded", function(){
// make it as accordion for smaller screens
        if (window.innerWidth > 720) {

            document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){

                everyitem.addEventListener('mouseover', function(e){

                    let el_link = this.querySelector('a[data-bs-toggle]');

                    if(el_link != null){
                        let nextEl = el_link.nextElementSibling;
                        el_link.classList.add('show');
                        nextEl.classList.add('show');
                    }

                });
                everyitem.addEventListener('mouseleave', function(e){
                    let el_link = this.querySelector('a[data-bs-toggle]');

                    if(el_link != null){
                        let nextEl = el_link.nextElementSibling;
                        el_link.classList.remove('show');
                        nextEl.classList.remove('show');
                    }


                })
            });

        }
// end if innerWidth
    });
    // DOMContentLoaded  end


    function online(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('total_online') }}",
            type:"GET",
            success: function(response){
                $("#total_online").text(response.total);
            }
        });
    }
    function total_online() {
        setInterval(online, 120000);
    }

    $(document).ready(function(){
        $("#mua_hang").click(function(){
            $id = $("#mua_hang").attr('data-id');
            $sl = $('#so_luong').text();
            // alert($sl);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('into_cart') }}",
                type:"POST",
                data: {
                    id : $id,
                    sl : $sl,
                },
                success: function(response){
                    if(response.result){
                        $("#total_product").html(response.total_product);
                        $(".total").html("&ensp;"+response.total+"&ensp;");
                        $("#myModal").modal('show');
                    }
                }
            });
        });
    });
</script>
