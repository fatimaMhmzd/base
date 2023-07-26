@extends('client.layout.total')
@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">لیست<span>فروشگاه</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('indexClient')}}">خانه</a></li>
                    <li class="breadcrumb-item"><a href="{{route('shop_storePageClient')}}">فروشگاه</a></li>
                    <li class="breadcrumb-item active" aria-current="page">لیست</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    نمایش <span>9 از 56</span> محصول
                                </div><!-- End .toolbox-info -->
                            </div><!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">مرتب سازی براساس : </label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control">
                                            <option value="popularity" selected="selected">بیشترین خرید</option>
                                            <option value="rating">بیشترین امتیاز</option>
                                            <option value="date">تاریخ</option>
                                        </select>
                                    </div>
                                </div><!-- End .toolbox-sort -->
                                <div class="toolbox-layout">
                                    <a onclick="changeStyle('showStyleOne', 'one')" id="one"
                                       class="btn-layout active activing">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4"/>
                                            <rect x="6" y="0" width="10" height="4"/>
                                            <rect x="0" y="6" width="4" height="4"/>
                                            <rect x="6" y="6" width="10" height="4"/>
                                        </svg>
                                    </a>

                                    <a onclick="changeStyle('showStyleTwo', 'two')" id="two"
                                       class="btn-layout activing">
                                        <svg width="10" height="10">
                                            <rect x="0" y="0" width="4" height="4"/>
                                            <rect x="6" y="0" width="4" height="4"/>
                                            <rect x="0" y="6" width="4" height="4"/>
                                            <rect x="6" y="6" width="4" height="4"/>
                                        </svg>
                                    </a>

                                    <a onclick="changeStyle('showStyleThree', 'three')" id="three"
                                       class="btn-layout activing">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4"/>
                                            <rect x="6" y="0" width="4" height="4"/>
                                            <rect x="12" y="0" width="4" height="4"/>
                                            <rect x="0" y="6" width="4" height="4"/>
                                            <rect x="6" y="6" width="4" height="4"/>
                                            <rect x="12" y="6" width="4" height="4"/>
                                        </svg>
                                    </a>

                                    <a onclick="changeStyle('showStyleFour', 'four')" id="four"
                                       class="btn-layout activing">
                                        <svg width="22" height="10">
                                            <rect x="0" y="0" width="4" height="4"/>
                                            <rect x="6" y="0" width="4" height="4"/>
                                            <rect x="12" y="0" width="4" height="4"/>
                                            <rect x="18" y="0" width="4" height="4"/>
                                            <rect x="0" y="6" width="4" height="4"/>
                                            <rect x="6" y="6" width="4" height="4"/>
                                            <rect x="12" y="6" width="4" height="4"/>
                                            <rect x="18" y="6" width="4" height="4"/>
                                        </svg>
                                    </a>
                                </div><!-- End .toolbox-layout -->
                            </div><!-- End .toolbox-right -->
                        </div><!-- End .toolbox -->

                        <div class="products products-area mb-3" style="display: block" id="showStyleOne">
                            @if(count($data->product) > 0)
                                @foreach($data->product as $product)
                                    <div class="product product-list">
                                        <div class="row">
                                            <div class="col-6 col-lg-3">
                                                <figure class="product-media">
                                                    {{--                                                    <span class="product-label label-new">جدید</span>--}}
                                                    <a href="{{route('shop_productDetail', $product->slug)}}">
                                                        <img src="/{{$product->banner}}" alt="تصویر محصول"
                                                             class="product-image">
                                                    </a>
                                                </figure><!-- End .product-media -->
                                            </div><!-- End .col-sm-6 col-lg-3 -->

                                            <div class="col-6 col-lg-3 order-lg-last">
                                                <div class="product-list-action">
                                                    <div class="product-price">
                                                        {{$product->price}} تومان
                                                    </div><!-- End .product-price -->
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val"
                                                                 style="width: {{$product->avg_rate}}%;"></div>
                                                            <!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                        <span
                                                            class="ratings-text">( {{$product->num_visit}} بازدید )</span>
                                                    </div><!-- End .rating-container -->

                                                    <div class="product-action">
                                                        <!--                                                        <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                                                                                   title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>-->
                                                        <!--                                                        <a href="#" class="btn-product btn-compare"
                                                                                                                   title="مقایسه"><span>مقایسه</span></a>-->
                                                    </div><!-- End .product-action -->

                                                    <a onclick="addToBasket({{$product->id}})" type="button"
                                                       class="btn-product btn-cart">
                                                        <span>افزودن به سبد خرید</span></a>
                                                </div><!-- End .product-list-action -->
                                            </div><!-- End .col-sm-6 col-lg-3 -->

                                            <div class="col-lg-6">
                                                <div class="product-body product-action-inner">
                                                    <a onclick="addToWishlist({{$product->id}})" type="button"
                                                       class="btn-product btn-wishlist"
                                                       title="افزودن به لیست علاقه مندی"><span>افزودن به لیست علاقه
                                                        مندی</span></a>
                                                    <div class="product-cat">
                                                        <a href="{{route('shop_storePageClient', $product->group->slug)}}">{{$product->group->title}}</a>
                                                    </div><!-- End .product-cat -->
                                                    <h3 class="product-title"><a
                                                            href="{{route('shop_productDetail', $product->slug)}}">{{$product->title}}</a>
                                                    </h3><!-- End .product-title -->

                                                    <div class="product-content">
                                                        <p>{{$product->short_description}}</p>
                                                    </div><!-- End .product-content -->
                                                    <div class="mb-3">
                                                        <p>{{$product->length}} * {{$product->width}}
                                                            * {{$product->height}}</p>
                                                    </div><!-- End .product-dims -->
                                                    <div class="product-nav product-nav-thumbs">
                                                        @foreach($product->image as $pic)
                                                            <a href="#" class="">
                                                                <img src="/{{$pic->url}}"
                                                                     alt="product desc">
                                                            </a>
                                                        @endforeach
                                                    </div><!-- End .product-nav -->
                                                </div><!-- End .product-body -->
                                            </div><!-- End .col-lg-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .product -->
                                @endforeach
                            @else
                                <div class="product product-list">
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <figure class="product-media">
                                                <span class="product-label label-new">جدید</span>
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-4.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-6 col-lg-3 order-lg-last">
                                            <div class="product-list-action">
                                                <div class="product-price">
                                                    60,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-action">
                                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action -->

                                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد
                                                        خرید</span></a>
                                            </div><!-- End .product-list-action -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-lg-6">
                                            <div class="product-body product-action-inner">
                                                <a href="#" class="btn-product btn-wishlist"
                                                   title="افزودن به لیست علاقه مندی"><span>افزودن به لیست علاقه
                                                        مندی</span></a>
                                                <div class="product-cat">
                                                    <a href="#">زنانه</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">دامن چرم قهوه ای</a>
                                                </h3><!-- End .product-title -->

                                                <div class="product-content">
                                                    <p> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوملورم ایپسوم متن
                                                        ساختگی با تولید سادگی نامفهوم </p>
                                                </div><!-- End .product-content -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-4-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-4-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>

                                                    <a href="#">
                                                        <img src="/assets/images/products/product-4-3-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .product -->

                                <div class="product product-list">
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-5.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-6 col-lg-3 order-lg-last">
                                            <div class="product-list-action">
                                                <div class="product-price">
                                                    84,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-action">
                                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action -->

                                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد
                                                        خرید</span></a>
                                            </div><!-- End .product-list-action -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-lg-6">
                                            <div class="product-body product-action-inner">
                                                <a href="#" class="btn-product btn-wishlist"
                                                   title="افزودن به لیست علاقه مندی"><span>افزودن به لیست علاقه
                                                        مندی</span></a>
                                                <div class="product-cat">
                                                    <a href="#">لباس</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">لباس زنانه زرد تیره</a>
                                                </h3><!-- End .product-title -->

                                                <div class="product-content">
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                                        ساختگی با تولید سادگی نامفهوم. </p>
                                                </div><!-- End .product-content -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-5-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-5-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .product -->

                                <div class="product product-list">
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <figure class="product-media">
                                                <span class="product-label label-out">ناموجود</span>
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-6.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-6 col-lg-3 order-lg-last">
                                            <div class="product-list-action">
                                                <div class="product-price">
                                                    <span class="out-price">120,000 تومان</span>
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 6 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-action">
                                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action -->

                                                <a href="#" class="btn-product btn-cart disabled"><span>افزودن به سبد
                                                        خرید</span></a>
                                            </div><!-- End .product-list-action -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-lg-6">
                                            <div class="product-body product-action-inner">
                                                <a href="#" class="btn-product btn-wishlist"
                                                   title="افزودن به لیست علاقه مندی"><span>افزودن به لیست علاقه
                                                        مندی</span></a>
                                                <div class="product-cat">
                                                    <a href="#">ژاکت</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">بلوز شلوار خاکی</a>
                                                </h3><!-- End .product-title -->

                                                <div class="product-content">
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                                        ساختگی با تولید سادگی نامفهوم </p>
                                                </div><!-- End .product-content -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .product -->

                                <div class="product product-list">
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-7.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-6 col-lg-3 order-lg-last">
                                            <div class="product-list-action">
                                                <div class="product-price">
                                                    76,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-action">
                                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action -->

                                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد
                                                        خرید</span></a>
                                            </div><!-- End .product-list-action -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-lg-6">
                                            <div class="product-body product-action-inner">
                                                <a href="#" class="btn-product btn-wishlist"
                                                   title="افزودن به لیست علاقه مندی"><span>افزودن به لیست علاقه
                                                        مندی</span></a>
                                                <div class="product-cat">
                                                    <a href="#">لی</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">سارافون زنانه آبی</a>
                                                </h3><!-- End .product-title -->

                                                <div class="product-content">
                                                    <p> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                                        ساختگی با تولید سادگی نامفهوم </p>
                                                </div><!-- End .product-content -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .product -->

                                <div class="product product-list">
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <figure class="product-media">
                                                <span class="product-label label-new">جدید</span>
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-8.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-6 col-lg-3 order-lg-last">
                                            <div class="product-list-action">
                                                <div class="product-price">
                                                    84,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-action">
                                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action -->

                                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد
                                                        خرید</span></a>
                                            </div><!-- End .product-list-action -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-lg-6">
                                            <div class="product-body product-action-inner">
                                                <a href="#" class="btn-product btn-wishlist"
                                                   title="افزودن به لیست علاقه مندی"><span>افزودن به لیست علاقه
                                                        مندی</span></a>
                                                <div class="product-cat">
                                                    <a href="#">کفش</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">کتونی ورزشی زنانه رنگ
                                                        بژ</a></h3><!-- End .product-title -->

                                                <div class="product-content">
                                                    <p>Lلورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                                        ساختگی با تولید سادگی نامفهوم. </p>
                                                </div><!-- End .product-content -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-8-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-8-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .product -->

                                <div class="product product-list">
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-9.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-6 col-lg-3 order-lg-last">
                                            <div class="product-list-action">
                                                <div class="product-price">
                                                    52,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 1 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-action">
                                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action -->

                                                <a href="#" class="btn-product btn-cart"><span>افزودن به سبد
                                                        خرید</span></a>
                                            </div><!-- End .product-list-action -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-lg-6">
                                            <div class="product-body product-action-inner">
                                                <a href="#" class="btn-product btn-wishlist"
                                                   title="افزودن به لیست علاقه مندی"><span>افزودن به لیست علاقه
                                                        مندی</span></a>
                                                <div class="product-cat">
                                                    <a href="#">کیف</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">کیف بلند دوشی زنجیز
                                                        دار</a></h3><!-- End .product-title -->

                                                <div class="product-content">
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                                        ساختگی با تولید سادگی نامفهوم </p>
                                                </div><!-- End .product-content -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-9-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-9-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-9-3-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .product -->
                            @endif
                        </div><!-- End .products -->

                        <div class="products products-area mb-3" style="display: none" id="showStyleTwo">
                            <div class="row justify-content-center">
                                @if(count($data->product) > 0)
                                    @foreach($data->product as $product)
                                        <div class="col-6">
                                            <div class="product product-7 text-center">
                                                <figure class="product-media">
                                                    {{--                                                    <span class="product-label label-new">جدید</span>--}}
                                                    <a href="{{route('shop_productDetail', $product->slug)}}">
                                                        <img src="/{{$product->banner}}" alt="تصویر محصول"
                                                             class="product-image">
                                                    </a>

                                                    <div class="product-action-vertical">
                                                        <a onclick="addToWishlist({{$product->id}})"
                                                           class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                        <!--                                                        <a href="popup/quickView.html"
                                                                                                                   class="btn-product-icon btn-quickview"
                                                                                                                   title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>-->
                                                        <!--                                                        <a href="#" class="btn-product-icon btn-compare"
                                                                                                                   title="مقایسه"><span>مقایسه</span></a>-->
                                                    </div><!-- End .product-action-vertical -->

                                                    <div class="product-action">
                                                        <a onclick="addToBasket({{$product->id}})" type="button"
                                                           class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                    </div><!-- End .product-action -->
                                                </figure><!-- End .product-media -->

                                                <div class="product-body">
                                                    <div class="product-cat text-center">
                                                        <a href="{{route('shop_storePageClient', $product->group->slug)}}">{{$product->group->title}}</a>
                                                    </div><!-- End .product-cat -->
                                                    <h3 class="product-title text-center">
                                                        <a href="{{route('shop_productDetail', $product->slug)}}">{{$product->title}}</a>
                                                    </h3><!-- End .product-title -->
                                                    <div class="product-price">
                                                        {{$product->price}} تومان
                                                    </div><!-- End .product-price -->
                                                    <div class="mb-1 d-flex align-items-center justify-content-center">
                                                        <p>{{$product->length}} * {{$product->width}}
                                                            * {{$product->height}}</p>
                                                    </div><!-- End .product-dims -->
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val"
                                                                 style="width: {{$product->avg_rate}}%;"></div>
                                                            <!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                        <span
                                                            class="ratings-text">( {{$product->num_visit}} بازدید )</span>
                                                    </div><!-- End .rating-container -->

                                                    <div class="product-nav product-nav-thumbs">
                                                        @foreach($product->image as $pic)
                                                            <a href="#" class="">
                                                                <img src="/{{$pic->url}}"
                                                                     alt="product desc">
                                                            </a>
                                                        @endforeach
                                                    </div><!-- End .product-nav -->
                                                </div><!-- End .product-body -->
                                            </div><!-- End .product -->
                                        </div><!-- End .col-sm-6 -->
                                    @endforeach
                                @else
                                    <div class="col-6">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-new">جدید</span>
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-4.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">زنانه</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">دامن چرمی
                                                        قهوه ای</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    60,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-4-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-4-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>

                                                    <a href="#">
                                                        <img src="/assets/images/products/product-4-3-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-6">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-5.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">لباس</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">لباس زنانه
                                                        زرد تیره</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    84,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-5-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-5-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-6">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-out">ناموجود</span>
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-6.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">ژاکت</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">بلوز شلوار
                                                        خاکی</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    <span class="out-price">120,000 تومان</span>
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 6 بازدید )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-6">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-7.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">لی</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">سارافون
                                                        آبی</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    76,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 بازدید )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-6">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-new">جدید</span>
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-8.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">کفش</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">کفش ورزشی
                                                        بژ</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    84,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-8-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-8-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-6">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-9.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">کیف</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">کیف بلند
                                                        زنجیزی</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    66,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 60%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 1 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-9-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-9-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-9-3-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 -->
                                @endif
                            </div><!-- End .row -->
                        </div><!-- End .products -->

                        <div class="products products-area mb-3" style="display: none" id="showStyleThree">
                            <div class="row justify-content-center">
                                @if(count($data->product) > 0)
                                    @foreach($data->product as $product)
                                        <div class="col-6 col-md-4 col-lg-4">
                                            <div class="product product-7 text-center">
                                                <figure class="product-media">
                                                    {{--                                                    <span class="product-label label-new">جدید</span>--}}
                                                    <a href="{{route('shop_productDetail', $product->slug)}}">
                                                        <img src="/{{$product->banner}}" alt="تصویر محصول"
                                                             class="product-image">
                                                    </a>

                                                    <div class="product-action-vertical">
                                                        <a onclick="addToWishlist({{$product->id}})" type="button"
                                                           class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                        <!--                                                        <a href="popup/quickView.html"
                                                                                                                   class="btn-product-icon btn-quickview"
                                                                                                                   title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>-->
                                                        <!--                                                        <a href="#" class="btn-product-icon btn-compare"
                                                                                                                   title="مقایسه"><span>مقایسه</span></a>-->
                                                    </div><!-- End .product-action-vertical -->

                                                    <div class="product-action">
                                                        <a onclick="addToBasket({{$product->id}})" type="button"
                                                           class="btn-product btn-cart">
                                                            <span>افزودن به سبد خرید</span></a>
                                                    </div><!-- End .product-action -->
                                                </figure><!-- End .product-media -->

                                                <div class="product-body">
                                                    <div class="product-cat text-center">
                                                        <a href="{{route('shop_storePageClient', $product->group->slug)}}">{{$product->group->title}}</a>
                                                    </div><!-- End .product-cat -->
                                                    <h3 class="product-title text-center">
                                                        <a href="{{route('shop_productDetail', $product->slug)}}">{{$product->title}}</a>
                                                    </h3><!-- End .product-title -->
                                                    <div class="product-price">
                                                        {{$product->price}} تومان
                                                    </div><!-- End .product-price -->
                                                    <div class="mb-1 d-flex align-items-center justify-content-center">
                                                        <p>{{$product->length}} * {{$product->width}}
                                                            * {{$product->height}}</p>
                                                    </div><!-- End .product-dims -->
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val"
                                                                 style="width: {{$product->avg_rate}}%;"></div>
                                                            <!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                        <span
                                                            class="ratings-text">( {{$product->num_visit}} بازدید )</span>
                                                    </div><!-- End .rating-container -->

                                                    <div class="product-nav product-nav-thumbs">
                                                        @foreach($product->image as $pic)
                                                            <a href="#" class="">
                                                                <img src="/{{$pic->url}}" alt="product desc">
                                                            </a>
                                                        @endforeach
                                                    </div><!-- End .product-nav -->
                                                </div><!-- End .product-body -->
                                            </div><!-- End .product -->
                                        </div><!-- End .col-sm-6 col-lg-4 -->

                                    @endforeach
                                @else
                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-new">جدید</span>
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-4.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">زنانه</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">دامن چرمی
                                                        قهوه ای</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    64,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-4-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-4-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>

                                                    <a href="#">
                                                        <img src="/assets/images/products/product-4-3-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-5.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">لباس</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">لباس زنانه
                                                        زرد تیره</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    84,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-5-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-5-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-out">ناموجود</span>
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-6.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">ژاکت</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">بلوز شلوار
                                                        خاکی</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    <span class="out-price">120,000 تومان</span>
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 6 بازدید )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-7.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">لی</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">سارافون
                                                        آبی</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    76,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 بازدید )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-new">جدید</span>
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-8.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">کفش</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">کفش ورزشی
                                                        بژ</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    84,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-8-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-8-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-9.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">کیف</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">کیف بلند
                                                        زنجیزی</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    52,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 60%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 1 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-9-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-9-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-9-3-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-top">برتر</span>
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-11.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">کفش</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">کفش زنانه
                                                        قهوه ای روشن</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    110,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 1 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-11-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-11-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>

                                                    <a href="#">
                                                        <img src="/assets/images/products/product-11-3-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-10.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">لباس ورزشی</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">لباس زنانه
                                                        زرد دکمه دار</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    66,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 بازدید )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->

                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-12.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">کیف</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">کیف مسافرتی
                                                        مشکی</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    68,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 بازدید )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->
                                @endif
                            </div><!-- End .row -->
                        </div><!-- End .products -->

                        <div class="products products-area mb-3" style="display: none" id="showStyleFour">
                            <div class="row justify-content-center">
                                @if(count($data->product) > 0)
                                    @foreach($data->product as $product)
                                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                            <div class="product product-7 text-center">
                                                <figure class="product-media">
                                                    {{--                                                    <span class="product-label label-new">جدید</span>--}}
                                                    <a href="{{route('shop_productDetail', $product->slug)}}">
                                                        <img src="/{{$product->banner}}" alt="تصویر محصول"
                                                             class="product-image">
                                                    </a>

                                                    <div class="product-action-vertical">
                                                        <a onclick="addToWishlist({{$product->id}})" type="button"
                                                           class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                        <!--                                                        <a href="popup/quickView.html"
                                                                                                                   class="btn-product-icon btn-quickview"
                                                                                                                   title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>-->
                                                        <!--                                                        <a href="#" class="btn-product-icon btn-compare"
                                                                                                                   title="مقایسه"><span>مقایسه</span></a>-->
                                                    </div><!-- End .product-action-vertical -->

                                                    <div class="product-action">
                                                        <a onclick="addToBasket({{$product->id}})" type="button"
                                                           class="btn-product btn-cart">
                                                            <span>افزودن به سبد خرید</span></a>
                                                    </div><!-- End .product-action -->
                                                </figure><!-- End .product-media -->

                                                <div class="product-body">
                                                    <div class="product-cat text-center">
                                                        <a href="{{route('shop_storePageClient', $product->group->slug)}}">{{$product->group->title}}</a>
                                                    </div><!-- End .product-cat -->
                                                    <h3 class="product-title text-center">
                                                        <a href="{{route('shop_productDetail', $product->slug)}}">{{$product->title}}</a>
                                                    </h3><!-- End .product-title -->
                                                    <div class="product-price">
                                                        {{$product->price}} تومان
                                                    </div><!-- End .product-price -->
                                                    <div class="mb-1 d-flex align-items-center justify-content-center">
                                                        <p>{{$product->length}} * {{$product->width}}
                                                            * {{$product->height}}</p>
                                                    </div><!-- End .product-dims -->
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val"
                                                                 style="width: {{$product->avg_rate}}%;"></div>
                                                            <!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                        <span
                                                            class="ratings-text">( {{$product->num_visit}} بازدید )</span>
                                                    </div><!-- End .rating-container -->

                                                    <div class="product-nav product-nav-thumbs">
                                                        @foreach($product->image as $pic)
                                                            <a href="#" class="">
                                                                <img src="/{{$pic->url}}" alt="product desc">
                                                            </a>
                                                        @endforeach
                                                    </div><!-- End .product-nav -->
                                                </div><!-- End .product-body -->
                                            </div><!-- End .product -->
                                        </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                    @endforeach
                                @else
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-new">جدید</span>
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-4.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">زنانه</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">دامن چرمی
                                                        قهوه ای</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    60,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-4-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-4-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>

                                                    <a href="#">
                                                        <img src="/assets/images/products/product-4-3-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-5.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">لباس</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">لباس زنانه
                                                        زرد تیره</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    84,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-5-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-5-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-out">ناموجود</span>
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-6.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">ژاکت</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">بلوز شلوار
                                                        خاکی</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    <span class="out-price">120,000 تومان</span>
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 6 بازدید )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-7.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">لی</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">سارافون
                                                        آبی</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    76,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 بازدید )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-new">جدید</span>
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-8.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">کفش</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">کفش ورزشی
                                                        بژ</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    84,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-8-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-8-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-9.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">کیف</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">کیف بلند
                                                        زنجیزی</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    74,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 60%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 1 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-9-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-9-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-9-3-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-top">برتر</span>
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-11.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">کفش</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">کفش زنانه
                                                        قهوه ای روشن</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    110,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 1 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-11-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-11-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>

                                                    <a href="#">
                                                        <img src="/assets/images/products/product-11-3-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-10.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">لباس زنانه</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">لباس زنانه
                                                        زرد دکمه دار</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    56,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 بازدید )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-12.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">کیف</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">کیف مسافرتی
                                                        مشکی</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    68,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 بازدید )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-13.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">کیف</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">کیف
                                                        زنانه</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    87,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 40%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 1 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-13-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-13-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-14.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">لباس</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">لباس زنانه
                                                        طرح گوره خری قهوه ای</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    90,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 بازدید )</span>
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="/assets/images/products/product-14-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-14-2-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="/assets/images/products/product-14-3-thumb.jpg"
                                                             alt="product desc">
                                                    </a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/products/product-15.jpg" alt="تصویر محصول"
                                                         class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                       class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                                    <a href="popup/quickView.html"
                                                       class="btn-product-icon btn-quickview"
                                                       title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                       title="مقایسه"><span>مقایسه</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>افزودن به
                                                            سبد خرید</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat text-center">
                                                    <a href="#">کیف</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title text-center"><a href="product.html">کیف زنانه
                                                        دوشی</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    65,000 تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 0 بازدید )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                @endif
                            </div><!-- End .row -->
                        </div><!-- End .products -->


                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                       aria-disabled="true">
                                        <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>قبلی
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item-total">از 6</li>
                                <li class="page-item">
                                    <a class="page-link page-link-next" href="#" aria-label="Next">
                                        بعدی <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>فیلترها : </label>
                                <a href="#" class="sidebar-filter-clear">پاک کردن همه</a>
                            </div><!-- End .widget widget-clean -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                       aria-controls="widget-1">
                                        دسته بندی
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-1">
                                                    <label class="custom-control-label" for="cat-1">لباس</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">3</span>
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-2">
                                                    <label class="custom-control-label" for="cat-2">تی شرت</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">0</span>
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-3">
                                                    <label class="custom-control-label" for="cat-3">کیف</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">4</span>
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-4">
                                                    <label class="custom-control-label" for="cat-4">ژاکت</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">2</span>
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-5">
                                                    <label class="custom-control-label" for="cat-5">کفش</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">2</span>
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-6">
                                                    <label class="custom-control-label" for="cat-6">شال و
                                                        روسری</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">1</span>
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-7">
                                                    <label class="custom-control-label" for="cat-7">لی</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">1</span>
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cat-8">
                                                    <label class="custom-control-label" for="cat-8">لباس
                                                        ورزشی</label>
                                                </div><!-- End .custom-checkbox -->
                                                <span class="item-count">0</span>
                                            </div><!-- End .filter-item -->
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true"
                                       aria-controls="widget-2">
                                        سایز
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-2">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-1">
                                                    <label class="custom-control-label" for="size-1">XS</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-2">
                                                    <label class="custom-control-label" for="size-2">S</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked
                                                           id="size-3">
                                                    <label class="custom-control-label" for="size-3">M</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked
                                                           id="size-4">
                                                    <label class="custom-control-label" for="size-4">L</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-5">
                                                    <label class="custom-control-label" for="size-5">XL</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-6">
                                                    <label class="custom-control-label" for="size-6">XXL</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true"
                                       aria-controls="widget-3">
                                        رنگ
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-3">
                                    <div class="widget-body">
                                        <div class="filter-colors">
                                            <a href="#" style="background: #b87145;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                            <a href="#" style="background: #f0c04a;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                            <a href="#" style="background: #333333;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                            <a href="#" class="selected" style="background: #cc3333;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                            <a href="#" style="background: #3399cc;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                            <a href="#" style="background: #669933;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                            <a href="#" style="background: #f2719c;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                            <a href="#" style="background: #ebebeb;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                        </div><!-- End .filter-colors -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true"
                                       aria-controls="widget-4">
                                        برند
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-4">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="brand-1">
                                                    <label class="custom-control-label" for="brand-1">نکست</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="brand-2">
                                                    <label class="custom-control-label" for="brand-2">ریور
                                                        ایسلند</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="brand-3">
                                                    <label class="custom-control-label" for="brand-3">جیوکس</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="brand-4">
                                                    <label class="custom-control-label" for="brand-4">نیو بالانس</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="brand-5">
                                                    <label class="custom-control-label" for="brand-5">یو جی جی</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="brand-6">
                                                    <label class="custom-control-label" for="brand-6">اف اند اف</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="brand-7">
                                                    <label class="custom-control-label" for="brand-7">نایکی</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                       aria-controls="widget-5">
                                        قیمت
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-5">
                                    <div class="widget-body">
                                        <div class="filter-price">
                                            <div class="filter-price-text">
                                                محدوده قیمت :
                                                <span id="filter-price-range"></span>
                                            </div><!-- End .filter-price-text -->

                                            <div id="price-slider"></div><!-- End #price-slider -->
                                        </div><!-- End .filter-price -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

    <script>


        function changeStyle(divId, iconId) {
            const divsToHide = document.getElementsByClassName('products-area');
            for (var i = 0; i < divsToHide.length; i++) {
                divsToHide[i].style.display = "none";
            }
            document.getElementById(`${divId}`).style.display = "block";

            const iconActve = document.getElementsByClassName('activing');
            for (var j = 0; j < iconActve.length; j++) {
                iconActve[j].classList.remove('active');
            }
            document.getElementById(`${iconId}`).classList.add('active');
        }

    </script>
@endsection
