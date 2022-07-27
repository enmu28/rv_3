@extends("shop/index")
@section('contain')
    Trang Chủ &emsp; >> &emsp;
        <a href="{{ route('shop_news') }}">News</a> &emsp; >> &emsp; {{ $new->post_title }}
    <hr style="color: lightblue;"><Br>
    <div class="container d-none d-md-block">
        <div class="row">
            <div id="content" class="col-8">
                <div class="row">
                    <h3>{{ $new->post_title }}</h3>
                    <span style="width: 100%; text-align: left">{{ $new->created_at }}</span> <br><br>
                    <img src="{{ $new->post_image }}" height="350px" width="100%">
                    <div style="line-height: 35px;">
                        <Br>{!! html_entity_decode($new->post_content) !!}...<br><Br>
                    </div>
                    <div class="col-4" style="text-align: left; margin-left: -10px;">Lượt xem : {{ $new->post_views }}</div>
                    <div class="col-8" style="text-align: right;">Tác giả : {{ $new->post_auth }}</div>
                </div><Br>
            </div>
            <div class="col-4 hidden-xs" style="padding-left: 30px;">
                <div class="list-group"  style="line-height: 15px;">
                    <div class="list-group-item"><center><b>Danh mục tham khảo</b></center></div>
                    <a href="/news/category_post?category=1" class="list-group-item">Nông sản</a>
                    <a href="/news/category_post?category=4" class="list-group-item">&nbsp;&nbsp;&nbsp;- Bảo quản</a>
                    <a href="/news/category_post?category=5" class="list-group-item">&nbsp;&nbsp;&nbsp;- Cách mua sắm</a>
                    <a href="/news/category_post?category=2" class="list-group-item">Hải sản</a>
                    {{--                    <a href="#" class="list-group-item active">&nbsp;&nbsp;&nbsp;- Thịt (1)</a>--}}
                    <a href="/news/category_post?category=6" class="list-group-item">&nbsp;&nbsp;&nbsp;- Bảo quản </a>
                    <a href="/news/category_post?category=7" class="list-group-item">&nbsp;&nbsp;&nbsp;- Cách mua sắm </a>
                    <a href="/news/category_post?category=3" class="list-group-item">Một số thông tin khác</a>
                </div>
                <hr style="color: lightblue; width: 100%">
                Bài viết mới
                <br><hr style="color: lightblue; width: 100%">
                <Br>
                @foreach($post_new as $key => $value)
                    <div class="row">
                        <div class="col-4" style="padding-top: 10px;">
                            <img src="{{ $value->post_image }}" width="100%;">
                        </div>
                        <div class="col-8">
                            <div style="overflow: hidden; height: 46px;"><a href="/news/{{ $value->post_name }}">{{ $value->post_title }}</a></div>
                            by <span style="color: olive;">{{ $value->post_auth }}</span><br>
                            <i>{{ $value->created_at }}</i>
                        </div>
                    </div><Br>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container d-block d-md-none">
        <div class="row">
            <div id="content" class="col-12">
                <div class="row">
                    <h3>{{ $new->post_title }}</h3>
                    <span style="width: 100%; text-align: left">{{ $new->created_at }}</span> <br><br>
                    <img src="{{ $new->post_image }}" height="350px" width="100%">
                    <div style="line-height: 35px;">
                        <Br>{!! html_entity_decode($new->post_content) !!}...<br><Br>
                    </div>
                    <div class="col-4" style="text-align: left; margin-left: -10px;">Lượt xem : {{ $new->post_views }}</div>
                    <div class="col-8" style="text-align: right;">Tác giả : {{ $new->post_auth }}</div>
                </div><Br>
            </div>
            <hr style="color: lightblue; width: 100%">
            Bài viết mới
            <br><hr style="color: lightblue; width: 100%">
            <Br>
            @foreach($post_new as $key => $value)
                <div class="row">
                    <div class="col-4" style="padding-top: 10px;">
                        <img src="{{ $value->post_image }}" width="100%;">
                    </div>
                    <div class="col-8">
                        <div style="overflow: hidden; height: 46px;"><a href="/news/{{ $value->post_name }}">{{ $value->post_title }}</a></div>
                        by <span style="color: olive;">{{ $value->post_auth }}</span><br>
                        <i>{{ $value->created_at }}</i>
                    </div>
                </div><Br>
            @endforeach
        </div>
    </div>

@endsection
