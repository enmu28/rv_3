@extends("shop/index")
@section('contain')
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="../image/banner_1.jpg" class="d-none d-md-block w-100" height="400px;">
                <img src="../image/banner_1.jpg" class="d-block d-md-none w-100" height="200px;">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="../image/banner_2.jpg" class="d-none d-md-block w-100" height="400px;">
                <img src="../image/banner_2.jpg" class="d-block d-md-none w-100" height="200px;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <br><Br>
    <h3>Hàng mới nhập về</h3>
    <div class="row">
        @foreach($product as $key => $value)
            @if($key%2==0)
                <div class="d-block d-md-none">
                    <br>
                </div>
                @endif
            <div class="col-6 col-md-3">
                <div style="border: 1px solid lightblue;">
                    <div class="image" style="width:100%">
                        <img src="../image/{{ $value->product_image }}" width="100%" height="200px" class="d-none d-md-block">
                        <img src="../image/{{ $value->product_image }}" width="100%" height="120px" class="d-block d-md-none">
                    </div>
                    <div class="container"><Br>
                        <h5><a href="/product/{{ $value->slug }}" class="d-none d-md-block">{{ $value->product_name }}</a></h5>
                        <a href="/product/{{ $value->slug }}" class="d-block d-md-none"><b>{{ $value->product_name }}</b></a>
                        <p style="height: 70px; overflow: hidden;" class="d-none d-md-block">
                            {{ $value->description.'...' }}</p>
                        <p class="price d-none d-md-block">
                            Giá tiền : &emsp; <B>{{ $value->product_price }} đ</B>
                        </p>
                        <p class="price d-block d-md-none" style="font-size: 14px;">
                            Giá tiền : <B>{{ $value->product_price }} đ</B>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div><Br><Br>


    <h3>Trái cây theo mùa</h3>
    <div class="row">
        @foreach($season as $key => $value)
            @if($key%2==0)
                <div class="d-block d-md-none">
                    <br>
                </div>
            @endif
            <div class="col-6 col-md-3">
                <div style="border: 1px solid lightblue;">
                    <div class="image" style="width:100%">
                        <img src="../image/{{ $value->product_image }}" width="100%" height="200px" class="d-none d-md-block">
                        <img src="../image/{{ $value->product_image }}" width="100%" height="120px" class="d-block d-md-none">
                    </div>
                    <div class="container"><Br>
                        <h5><a href="/product/{{ $value->slug }}" class="d-none d-md-block">{{ $value->product_name }}</a></h5>
                        <a href="/product/{{ $value->slug }}" class="d-block d-md-none"><b>{{ $value->product_name }}</b></a>
                        <p style="height: 70px; overflow: hidden;" class="d-none d-md-block">
                            {{ $value->description.'...' }}</p>
                        <p class="price d-none d-md-block">
                            Giá tiền : &emsp; <B>{{ $value->product_price }} đ</B>
                        </p>
                        <p class="price d-block d-md-none" style="font-size: 14px;">
                            Giá tiền : <B>{{ $value->product_price }} đ</B>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        var myCarousel = document.querySelector('#carouselExampleDark')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 1000,
            wrap: true,
        })
    </script>
@endsection
