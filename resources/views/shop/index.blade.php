<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Your Store</title>
    {{--        <base href="http://localhost:8000/opencart-3.0.3.8/upload/">--}}


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
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
                                    <a href="/category_product?category=8">
                                        Đồ uống
                                    </a><br>
                                    &emsp;&emsp;-<a  href="/category_product?category=9"> Có ga</a><br>
                                    &emsp;&emsp;-<a  href="/category_product?category=10"> Không ga</a><br>
                                    <a href="/news">Tin tức</a><Br>
                                    &emsp;&emsp;-<a  href="/news/category_post?category=1">Nông sản</a><br>
                                    &emsp;&emsp;-<a  href="/news/category_post?category=2">Hải sản</a><br>
                                    &emsp;&emsp;-<a  href="/news/category_post?category=3">Một số thông tin khác</a><br>
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
                    (<b><span id="total">
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
    <Br>
</div>
<div class="container">
    @yield('contain')
</div>
<Br>
<div class="container-fluid"  style="background-color: #343a40; color: white; padding-top: 25px;">
    <div class="container d-none d-md-block">
        <div class="row" id="footer">
            <div class="col-md-3">
                <h5>Information</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('introduce') }}">About Us</a></li>
                    <li><a href="{{ route('conditions') }}">Terms &amp; Conditions</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Customer Service</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('shop_contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('policy') }}">Privacy Policy</a></li>
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
                    <li><a href="{{ route('introduce') }}">About Us</a></li>
                    <li><a href="{{ route('conditions') }}">Terms &amp; Conditions</a></li>
                </ul>
            </div>
            <div class="col-4">
                <h5>Customer Service</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('shop_contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('policy') }}">Privacy Policy</a></li>
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

{{-------------------------------------Popup ajax----------------------------------}}
<div class="modal hide" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Modal body..
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
</body></html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
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
</script>
