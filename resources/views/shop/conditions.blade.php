<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Điều khoản RaucuquaOnline</title>
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

    <link href="{{ url('css/stylesheet.css') }}" rel="stylesheet">
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
                                    <a href="category_product?category=1">Rau</a><Br>
                                    <a href="category_product?category=2">Củ</a><br>
                                    <a href="category_product?category=3">Quả</a><Br>
                                    <a href="category_product?category=4">
                                        Đồ tươi sống
                                    </a><br>
                                    &emsp;&emsp;-<a href="category_product?category=5"> Thịt</a><br>
                                    &emsp;&emsp;-<a href="category_product?category=6"> Cá</a><br>
                                    &emsp;&emsp;-<a href="category_product?category=7"> Cua</a><br>
                                    <a href="category_product?category=8">
                                        Đồ uống
                                    </a><br>
                                    &emsp;&emsp;-<a  href="category_product?category=9"> Có ga</a><br>
                                    &emsp;&emsp;-<a  href="category_product?category=10"> Không ga</a><br>
                                    <a href="news">Tin tức</a><Br>
                                    &emsp;&emsp;-<a  href="news/category_post?category=1">Nông sản</a><br>
                                    &emsp;&emsp;-<a  href="news/category_post?category=2">Hải sản</a><br>
                                    &emsp;&emsp;-<a  href="news/category_post?category=3">Một số thông tin khác</a><br>
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
                <a class="nav-link" href="category_product?category=1"><b style="color: white;">&emsp;Rau</b></a>
            </li>&emsp;&emsp;
            <li class="nav-item">
                <a class="nav-link" href="category_product?category=2"><b style="color: white;">&emsp;Củ</b></a>
            </li>&emsp;&emsp;
            <li class="nav-item">
                <a class="nav-link" href="category_product?category=3"><b style="color: white;">&emsp;Quả</b></a>
            </li>&emsp;&emsp;

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  style="color: white;" href="category_product?category=4" data-bs-toggle="dropdown">
                    &emsp;<b>Đồ tươi sống</b>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="category_product?category=5">Thịt</a>
                    <a class="dropdown-item" href="category_product?category=6">Cá</a>
                    <a class="dropdown-item" href="category_product?category=7">Cua</a>
                </div>
            </li>&emsp;&emsp;

            <li  class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="category_product?category=8" data-bs-toggle="dropdown" style="color: white;" >
                    &emsp;<b>Đồ uống</b>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="category_product?category=9">Có ga</a>
                    <a class="dropdown-item" href="category_product?category=10">Không ga</a>
                </div>
            </li>
        </ul>
    </nav>
    <Br>
</div>
<div class="container">
    Trang Chủ &emsp; >> &emsp;Điều khoản
    <hr style="color: lightblue;">
    <span style="font-size: 27px;">Điều khoản</span><Br>
    <span style="line-height: 35px;">
        Khi quý khách truy cập vào trang web của chúng tôi có nghĩa là quý khách đồng ý với các điều khoản này. Trang web có quyền thay đổi, chỉnh sửa, thêm hoặc lược bỏ bất kỳ phần nào trong Quy định và Điều kiện sử dụng, vào bất cứ lúc nào. Các thay đổi có hiệu lực ngay khi được đăng trên trang web mà không cần thông báo trước. Và khi quý khách tiếp tục sử dụng trang web, sau khi các thay đổi về quy định và điều kiện được đăng tải, có nghĩa là quý khách chấp nhận với những thay đổi đó.
<br>
Quý khách vui lòng kiểm tra thường xuyên để cập nhật những thay đổi của chúng tôi.
<br>
        <b>1. Hướng dẫn sử dụng web</b>
<br>
- Khi vào web của chúng tôi, người dùng tối thiểu phải 18 tuổi hoặc truy cập dưới sự giám sát của cha mẹ hay người giám hộ hợp pháp.
<br>
- Chúng tôi cấp giấy phép sử dụng để bạn có thể mua sắm trên web trong khuôn khổ điều khoản và điều kiện sử dụng đã đề ra.
<br>
- Nghiêm cấm sử dụng bất kỳ phần nào của trang web này với mục đích thương mại hoặc nhân danh bất kỳ đối tác thứ ba nào nếu không được chúng tôi cho phép bằng văn bản. Nếu vi phạm bất cứ điều nào trong đây, chúng tôi sẽ hủy giấy phép của bạn mà không cần báo trước.
<br>
- Trang web này chỉ dùng để cung cấp thông tin sản phẩm chứ chúng tôi không phải nhà sản xuất nên những nhận xét hiển thị trên web là ý kiến cá nhân của khách hàng, không phải của chúng tôi.
<br>
- Quý khách phải đăng ký tài khoản với thông tin xác thực về bản thân và phải cập nhật nếu có bất kỳ thay đổi nào. Mỗi người truy cập phải có trách nhiệm với mật khẩu, tài khoản và hoạt động của mình trên web. Hơn nữa, quý khách phải thông báo cho chúng tôi biết khi tài khoản bị truy cập trái phép. Chúng tôi không chịu bất kỳ trách nhiệm nào, dù trực tiếp hay gián tiếp, đối với những thiệt hại hoặc mất mát gây ra do quý khách không tuân thủ quy định.
<br>
- Trong suốt quá trình đăng ký, quý khách đồng ý nhận email quảng cáo từ website. Sau đó, nếu không muốn tiếp tục nhận mail, quý khách có thể từ chối bằng cách nhấp vào đường link ở dưới cùng trong mọi email quảng cáo.
<br>
        <b>2. Chấp nhận đơn hàng và giá cả</b>
<br>
- Chúng tôi có quyền từ chối hoặc hủy đơn hàng của quý khách vì bất kỳ lý do gì vào bất kỳ lúc nào. Chúng tôi có thể hỏi thêm về số điện thoại và địa chỉ trước khi nhận đơn hàng.
<br>
- Chúng tôi cam kết sẽ cung cấp thông tin giá cả chính xác nhất cho người tiêu dùng. Tuy nhiên, đôi lúc vẫn có sai sót xảy ra, ví dụ như trường hợp giá sản phẩm không hiển thị chính xác trên trang web hoặc sai giá, tùy theo từng trường hợp chúng tôi sẽ liên hệ hướng dẫn hoặc thông báo hủy đơn hàng đó cho quý khách. Chúng tôi cũng có quyền từ chối hoặc hủy bỏ bất kỳ đơn hàng nào dù đơn hàng đó đã hay chưa được xác nhận hoặc đã bị thanh toán.
<br>
        <b>3. Thương hiệu và bản quyền</b>
<br>
- Mọi quyền sở hữu trí tuệ (đã đăng ký hoặc chưa đăng ký), nội dung thông tin và tất cả các thiết kế, văn bản, đồ họa, phần mềm, hình ảnh, video, âm nhạc, âm thanh, biên dịch phần mềm, mã nguồn và phần mềm cơ bản đều là tài sản của chúng tôi. Toàn bộ nội dung của trang web được bảo vệ bởi luật bản quyền của Việt Nam và các công ước quốc tế. Bản quyền đã được bảo lưu.
<br>
        <b>4. Quyền pháp lý</b>
<br>
- Các điều kiện, điều khoản và nội dung của trang web này được điều chỉnh bởi luật pháp Việt Nam và Tòa án có thẩm quyền tại Việt Nam sẽ giải quyết bất kỳ tranh chấp nào phát sinh từ việc sử dụng trái phép trang web này.
<br>
        <b>5. Quy định về bảo mật</b>
<br>
- Trang web của chúng tôi coi trọng việc bảo mật thông tin và sử dụng các biện pháp tốt nhất bảo vệ thông tin và việc thanh toán của quý khách. Thông tin của quý khách trong quá trình thanh toán sẽ được mã hóa để đảm bảo an toàn. Sau khi quý khách hoàn thành quá trình đặt hàng, quý khách sẽ thoát khỏi chế độ an toàn.
<br>
- Quý khách không được sử dụng bất kỳ chương trình, công cụ hay hình thức nào khác để can thiệp vào hệ thống hay làm thay đổi cấu trúc dữ liệu. Trang web cũng nghiêm cấm việc phát tán, truyền bá hay cổ vũ cho bất kỳ hoạt động nào nhằm can thiệp, phá hoại hay xâm nhập vào dữ liệu của hệ thống. Cá nhân hay tổ chức vi phạm sẽ bị tước bỏ mọi quyền lợi cũng như sẽ bị truy tố trước pháp luật nếu cần thiết.
<br>
- Mọi thông tin giao dịch sẽ được bảo mật nhưng trong trường hợp cơ quan pháp luật yêu cầu, chúng tôi sẽ buộc phải cung cấp những thông tin này cho các cơ quan pháp luật.
<br>
        <b>6. Thay đổi, hủy bỏ giao dịch tại website</b>
<br>
Trong mọi trường hợp, khách hàng đều có quyền chấm dứt giao dịch nếu đã thực hiện các biện pháp sau đây:
<br>
- Thông báo cho chúng tôi về việc hủy giao dịch qua đường dây nóng 04.6674.2332
<br>
- Trả lại hàng hoá đã nhận nhưng chưa sử dụng hoặc hưởng bất kỳ lợi ích nào từ hàng hóa đó (theo quy định của chính sách đổi trả hàng).
    </span>
    <br><Br>
    <center><hr style="color: lightblue; width: 80%;"></center>
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
                    <li><a href="news/category_post?category=1">Nông sản</a></li>
                    <li><a href="news/category_post?category=2">Hải sản</a></li>
                    <li><a href="news/category_post?category=1">Một số thông tin khác</a></li>
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
                    <li><a href="news/category_post?category=1">Nông sản</a></li>
                    <li><a href="news/category_post?category=2">Hải sản</a></li>
                    <li><a href="news/category_post?category=1">Một số thông tin khác</a></li>
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
