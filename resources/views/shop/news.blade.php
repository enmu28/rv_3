@extends("shop/index")
@section('contain')
    <div class="d-none d-md-block">
        Trang Chủ &emsp; >> &emsp;
        <a href="{{ route('shop_news') }}">News</a> &emsp; >> &emsp;
        @if(app('request')->input('category') == 1 || app('request')->input('category') == 4 || app('request')->input('category') == 5)
            Nông sản
        @elseif(app('request')->input('category') == 2 || app('request')->input('category') == 6 || app('request')->input('category') == 7)
            Hải sản
        @else
            Một số thông tin khác
        @endif
        <hr style="color: lightblue;"><Br>
        <div class="row">
            <div id="content" class="col-sm-8">
                <div class="row">
                    @if($news!= NULL)
                        @foreach($news as $key => $value)
                            <div class="col-2">
                                <div style="border: 1px solid lightblue; padding: 10px;">
                                    {{ date("Y-m-d", strtotime($value->created_at) ) }}
                                </div>
                                <div style="border-left: 1px solid lightblue; height: 515px;margin-left: 30%;"></div>
                            </div>
                            <div class="col-10">
                                <h3>{{ $value->post_title }}</h3>
                                <img src="{{ $value->post_image }}" height="350px" width="100%"><Br><Br>
                                {!! html_entity_decode($value->post_excerpt) !!}...<br><Br>
                                <div class="row">
                                    <div class="col-4 col-xl-6">Lượt xem : {{ $value->post_views }}</div>
                                    <div class="col-8 col-xl-6" style="text-align: right;">
                                        <div style="padding: 5px; border:  1px solid lightblue; width: 45%; float: right; text-align: center;margin-top: -7px;">
                                            <a href="/news/{{ $value->post_name }}">Xem thêm</a>
                                        </div>
                                    </div><Br><br>
                                </div>
                                <hr style="color: lightblue" width="100%;"><br><br>
                            </div>
                        @endforeach
                    @else
                        Không có kết quả!
                    @endif
                </div><Br>
            </div>
            <div class="col-sm-4 hidden-xs">
                <div class="list-group" style="line-height: 15px;">
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
                            <div style="overflow: hidden; height: 45px;"><a href="/news/{{ $value->post_name }}">{{ $value->post_title }}</a></div>
                            by <span style="color: olive;">{{ $value->post_auth }}</span><br>
                            <i>{{ $value->created_at }}</i>
                        </div>
                    </div><Br>
                @endforeach

            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-3">
                {!! $news->appends(request()->query())->links('pagination::bootstrap-4') !!}
            </div>
            <div class="col-2"></div>
            @if(count($news)>2)
                <div class="col-4" style="text-align: center;">
                    @foreach ($news as $key => $val)
                    @endforeach
                    Hiển thị từ {{ ($news->currentpage()-1)*$news->perpage() + 1 }} ~
                    {{ ($news->currentpage()-1) * $news->perpage() + $key + 1 }}
                    tổng số <B>{{ $total_news }}</B> tin tức
                </div>
            @endif
        </div>
    </div>

{{----------------------------------------------MOBILE--}}
    <div class="row d-block d-md-none">
        <span style="font-size: 14px"> Trang Chủ &emsp; >> &emsp;
            <a href="{{ route('shop_news') }}">News</a> &emsp; >> &emsp;
            @if(app('request')->input('category') == 1)
                Nông sản
                @elseif(app('request')->input('category') == 2)
                Hải sản
                @else
                Một số thông tin khác
                @endif
            <hr style="color: lightblue;"><Br>
        </span>
        <div id="content" class="container">
            @if($news!= NULL)
                @foreach($news as $key => $value)
                    <h4>{{ $value->post_title }}</h4>
                    <img src="{{ $value->post_image }}" height="200px" width="100%"><Br><Br>
                    {!! html_entity_decode($value->post_excerpt) !!}...<br><Br>
                    <div class="row">
                        <div class="col-6">Lượt xem : {{ $value->post_views }}</div>
                        <div class="col-6" style="text-align: right;">
                            <div style="padding: 5px; border:  1px solid lightblue; float: right; text-align: center;margin-top: -7px;">
                                <a href="/news/{{ $value->post_name }}">Xem thêm</a>
                            </div>
                        </div><Br>
                    </div>
                    <hr style="color: lightblue" width="100%;">
                @endforeach
            @else
                Không có kết quả!
            @endif
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                {!! $news->appends(request()->query())->links('pagination::bootstrap-4') !!}
            </div>
        </div>
        <br>
        &ensp;Bài viết mới
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
@endsection
