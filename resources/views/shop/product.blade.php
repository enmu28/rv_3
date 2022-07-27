@extends("shop/index")
@section('contain')
    <div id="product-category">
        <div class="row">
            <aside id="column-left" class="col-md-3 d-none d-md-block">
                <div class="list-group" style="line-height: 15px;">
                    <a href="/category_product?category=1" class="list-group-item">Rau ({{ $rau }})</a>
                    <a href="/category_product?category=2" class="list-group-item">Củ (7)</a>
                    <a href="/category_product?category=3" class="list-group-item">Quả (13)</a>
                    <a href="/category_product?category=4" class="list-group-item">Thịt tươi sống (3)</a>

                    <a href="/category_product?category=5" class="list-group-item">&nbsp;&nbsp;&nbsp;- Thịt (1)</a>
                    <a href="/category_product?category=6" class="list-group-item">&nbsp;&nbsp;&nbsp;- Cá (1)</a>
                    <a href="/category_product?category=7" class="list-group-item">&nbsp;&nbsp;&nbsp;- Cua (1)</a>
                    <a href="/category_product?category=8" class="list-group-item">Đồ uống (3)</a>
                    <a href="/category_product?category=9" class="list-group-item">&nbsp;&nbsp;&nbsp;- Có ga (2)</a>
                    <a href="/category_product?category=10" class="list-group-item">&nbsp;&nbsp;&nbsp;- Không ga (1)</a>
                </div>
                <br><br>
                <img src="../image/rau_cu_qua.jpg" width="100%" style="border-radius: 10px;">
            </aside>

            <div id="content" class="col-md-9 d-none d-md-block">
                <div class="row">
                    @if(count($product)!= 0)
                        @foreach($product as $key => $value)
                            <div class="col-4" style="margin-bottom: 35px;">
                                <div class="transition" style="border: 1px solid lightblue;">
                                    <img src="../image/{{ $value->product_image }}" width="100%" height="194px;">
                                    <div class="container"><Br>
                                        <h5><a href="/product/{{ $value->slug }}">{{ $value->product_name }}</a></h5>
                                        <p style="height: 70px; overflow: hidden;">
                                            {{ $value->description.'...' }}</p>
                                        <p class="price">
                                            <span class="price-new">Giá : </span>&emsp;
                                            <span class="price-old"><b>{{ $value->product_price }}</b></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        Không có kết quả!
                    @endif
                </div><Br>
                <div class="row">
                    <div class="col-sm-6" style="text-align: left;">
                        {!! $product->appends(request()->query())->links('pagination::bootstrap-4') !!}
                    </div>
                    @if(count($product)>=4)
                        <div class="col-sm-6" style="text-align: right">
                            @foreach ($product as $key => $val)
                            @endforeach
                            Hiển thị từ {{ ($product->currentpage()-1)*$product->perpage() + 1 }} ~
                            {{ ($product->currentpage()-1) * $product->perpage() + $key + 1 }}
                            tổng số <B>{{ $total_product }}</B> sản phẩm
                        </div>
                    @endif
                </div>
            </div>
        </div>

{{--------------------------------------------MOBLIE------------------------------------------------}}
        <div id="content" class="col-12 d-block d-md-none" style="font-size: 14px;">
            Home >> @if(app('request')->input('category') == 1)
                            Rau
                        @elseif(app('request')->input('category') == 2)
                            Củ
                        @elseif(app('request')->input('category') == 3)
                            Quả
                        @elseif(app('request')->input('category') == 4)
                            Đồ tươi sống
                        @elseif(app('request')->input('category') == 5)
                            Đồ tươi sống >> Thịt
                        @elseif(app('request')->input('category') == 6)
                            Đồ tươi sống >> Cá
                        @elseif(app('request')->input('category') == 7)
                            Đồ tươi sống >> Cua
                        @elseif(app('request')->input('category') == 8)
                            Đồ uống
                        @elseif(app('request')->input('category') == 9)
                            Đồ uống >> Có ga
                        @elseif(app('request')->input('category') == 10)
                            Đồ uống >> Không <ga></ga>
                    @endif
            <hr style="color: lightblue">
            <div class="row" style="margin-top: -12px;">
                @if(count($product)!= 0)
                    @foreach($product as $key => $value)
                        @if($key%2==0)
                            <div class="d-block d-md-none">
                                <br>
                            </div>
                        @endif
                        <div class="col-6">
                            <div style="border: 1px solid lightblue;">
                                <div class="image" style="width:100%">
                                    <img src="../image/{{ $value->product_image }}" width="100%" height="120px" class="d-block d-md-none">
                                </div>
                                <div class="container"><Br>
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
                @else
                    Không có kết quả!
                @endif
            </div><Br>
            <div class="row">
                <div class="col-6"  style="text-align: left;">
                    {!! $product->appends(request()->query())->links('pagination::bootstrap-4') !!}
                </div>
                @if(count($product)>=4)
                    <div class="col-6 "  style="text-align: right;">
                        @foreach ($product as $key => $val)
                        @endforeach
                        Hiển thị từ {{ ($product->currentpage()-1)*$product->perpage() + 1 }} ~
                        {{ ($product->currentpage()-1) * $product->perpage() + $key + 1 }}
                        tổng số <B>{{ $total_product }}</B> sản phẩm
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
