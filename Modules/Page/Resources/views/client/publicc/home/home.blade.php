@inject('slider', 'Modules\Slider\Services\SliderService')

@extends('client.layout.total')
@section('content')

    <main class="main">
        @if(Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
                <strong></strong> {{ Session::get('message', '') }}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
                <strong></strong> {{ Session::get('message', '') }}
            </div>
        @endif
        @if(count($errors) > 0 )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="p-0 m-0" style="list-style: none;">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{--        'slider'         --}}
        <div class="intro-section pt-3 pb-3 mb-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="intro-slider-container slider-container-ratio mb-2 mb-lg-0">
                            <div class="intro-slider owl-carousel owl-simple owl-dark owl-nav-inside"
                                 data-toggle="owl" data-owl-options='{
                                        "nav": false,
                                        "dots": true,
                                        "rtl": true,
                            "responsive": {
                                            "768": {
                                                "nav": true,
                                                "dots": false
                                            }
                                        }
                                    }'>
                                @if($slider->getBy(1))
                                    @foreach($slider->getBy(1) as $slide)
{{--                                        @if($slide->title == "پیشنهادهای روزانه")--}}
                                            <div class="intro-slide">
                                                <figure class="slide-image">
                                                    <picture>
                                                        <source media="(max-width: 480px)"
                                                                srcset="/assets/images/demos/demo-3/slider/slide-1-480w.jpg">
                                                        <img src="/{{$slide->image->url}}"
                                                             alt="توضیحات عکس">
                                                    </picture>
                                                </figure><!-- End .slide-image -->

                                                <div class="intro-content">
                                                    <h3 class="intro-subtitle text-primary">{{$slide->title}}</h3>
                                                    <!-- End .h3 intro-subtitle -->
                                                    <h1 class="intro-title">
                                                        {{$slide->sub_title1}}
                                                    </h1><!-- End .intro-title -->

                                                    <div class="intro-price">
                                                        <sup>{{$slide->sub_title2}} </sup>
                                                        <span class="text-primary">
                                                    {{$slide->sub_title4}}
                                                </span>
                                                    </div><!-- End .intro-price -->

                                                    <a href="{{$slide->link}}" class="btn btn-primary btn-round">
                                                        <i class="icon-long-arrow-left"></i>
                                                        <span>{{$slide->sub_title3}}</span>
                                                    </a>
                                                </div><!-- End .intro-content -->
                                            </div><!-- End .intro-slide -->
{{--                                        @endif--}}
                                    @endforeach
                                @else
                                    <div class="intro-slide">
                                        <figure class="slide-image">
                                            <picture>
                                                <source media="(max-width: 480px)"
                                                        srcset="/assets/images/demos/demo-3/slider/slide-1-480w.jpg">
                                                <img src="/assets/images/demos/demo-3/slider/slide-1.jpg"
                                                     alt="توضیحات عکس">
                                            </picture>
                                        </figure><!-- End .slide-image -->

                                        <div class="intro-content">
                                            <h3 class="intro-subtitle text-primary">پیشنهاد های روزانه</h3>
                                            <!-- End .h3 intro-subtitle -->
                                            <h1 class="intro-title">
                                                هندزفری <br>ایرپاد
                                            </h1><!-- End .intro-title -->

                                            <div class="intro-price">
                                                <sup>امروز : </sup>
                                                <span class="text-primary">
                                                    247,000 تومان
                                                </span>
                                            </div><!-- End .intro-price -->

                                            <a href="category.html" class="btn btn-primary btn-round">
                                                <i class="icon-long-arrow-left"></i>
                                                <span>اینجا کلیک کنید</span>
                                            </a>
                                        </div><!-- End .intro-content -->
                                    </div><!-- End .intro-slide -->

                                    <div class="intro-slide">
                                        <figure class="slide-image">
                                            <picture>
                                                <source media="(max-width: 480px)"
                                                        srcset="/assets/images/demos/demo-3/slider/slide-2-480w.jpg">
                                                <img src="/assets/images/demos/demo-3/slider/slide-2.jpg"
                                                     alt="توضیحات عکس">
                                            </picture>
                                        </figure><!-- End .slide-image -->

                                        <div class="intro-content">
                                            <h3 class="intro-subtitle text-primary">پیشنهاد های روزانه</h3>
                                            <!-- End .h3 intro-subtitle -->
                                            <h1 class="intro-title">
                                                سیستم صوتی <br>پیشرفته
                                            </h1><!-- End .intro-title -->

                                            <div class="intro-price" dir="rtl">
                                                <sup class="intro-old-price">49,000</sup>
                                                <span class="text-primary">
                                                    29,999 تومان
                                                </span>
                                            </div><!-- End .intro-price -->

                                            <a href="category.html" class="btn btn-primary btn-round">
                                                <i class="icon-long-arrow-left"></i>
                                                <span>اینجا کلیک کنید</span>
                                            </a>
                                        </div><!-- End .intro-content -->
                                    </div><!-- End .intro-slide -->
                                @endif
                            </div><!-- End .intro-slider owl-carousel owl-simple -->

                            <span class="slider-loader"></span><!-- End .slider-loader -->
                        </div><!-- End .intro-slider-container -->
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                        <div class="intro-banners">
                            @if($slider->getBy(1))
                                @foreach($slider->getBy(1) as $slide)
{{--                                    @if($slide->title != "پیشنهادهای روزانه")--}}
                                        <div class="banner mb-lg-1 mb-xl-2">
                                            <a href="#">
                                                <img src="/{{$slide->image->url}}" alt="بنر">
                                            </a>

                                            <div class="banner-content text-right">
                                                <h4 class="banner-subtitle d-lg-none d-xl-block"><a
                                                        href="#">{{$slide->title}}</a>
                                                </h4><!-- End .banner-subtitle -->
                                                <h3 class="banner-title"><a href="#">{{$slide->sub_title1}}</a></h3>
                                                <!-- End .banner-title -->
                                                <a href="{{$slide->url}}" class="banner-link">{{$slide->sub_title3}}<i class="icon-long-arrow-left"></i></a>
                                            </div><!-- End .banner-content -->
                                        </div><!-- End .banner -->
{{--                                    @endif--}}
                                @endforeach
                            @else
                                <div class="banner mb-lg-1 mb-xl-2">
                                    <a href="#">
                                        <img src="/assets/images/demos/demo-3/banners/banner-1.jpg" alt="بنر">
                                    </a>

                                    <div class="banner-content text-right">
                                        <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#">محصولات برتر</a>
                                        </h4><!-- End .banner-subtitle -->
                                        <h3 class="banner-title"><a href="#">هدفون<br>استریو بلوتوث</a></h3>
                                        <!-- End .banner-title -->
                                        <a href="#" class="banner-link">خرید<i class="icon-long-arrow-left"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->

                                <div class="banner mb-lg-1 mb-xl-2">
                                    <a href="#">
                                        <img src="/assets/images/demos/demo-3/banners/banner-2.jpg" alt="بنر">
                                    </a>

                                    <div class="banner-content text-right">
                                        <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#">محصولات جدید</a>
                                        </h4>
                                        <!-- End .banner-subtitle -->
                                        <h3 class="banner-title"><a href="#">دوربین های 360 درجه<span>70%
                                                    تخفیف</span></a></h3><!-- End .banner-title -->
                                        <a href="#" class="banner-link">خرید<i class="icon-long-arrow-left"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->

                                <div class="banner mb-0">
                                    <a href="#">
                                        <img src="/assets/images/demos/demo-3/banners/banner-3.jpg" alt="بنر">
                                    </a>

                                    <div class="banner-content text-right">
                                        <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#">محصولات ویژه</a>
                                        </h4>
                                        <!-- End .banner-subtitle -->
                                        <h3 class="banner-title"><a href="#">ساعت اپل 4</a></h3>
                                        <!-- End .banner-title -->
                                        <a href="#" class="banner-link">خرید<i class="icon-long-arrow-left"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            @endif
                        </div><!-- End .intro-banners -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .intro-section -->
        {{--        'End slider'         --}}


        {{--       homeTopCategoryProduct       --}}
        <div class="container featured">
            <ul class="nav nav-pills nav-border-anim nav-big justify-content-center mb-3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="products-featured-link" data-toggle="tab"
                       href="#products-featured-tab" role="tab" aria-controls="products-featured-tab"
                       aria-selected="true">{{$indexPageData->suggests[3]->title}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="products-sale-link" data-toggle="tab" href="#products-sale-tab"
                       role="tab" aria-controls="products-sale-tab" aria-selected="false">{{$indexPageData->suggests[4]->title}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="products-top-link" data-toggle="tab" href="#products-top-tab" role="tab"
                       aria-controls="products-top-tab" aria-selected="false">{{$indexPageData->suggests[5]->title}}</a>
                </li>
            </ul>

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel"
                     aria-labelledby="products-featured-link">
                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": true,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "rtl": true,
                            "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "600": {
                                        "items":2
                                    },
                                    "992": {
                                        "items":3
                                    },
                                    "1200": {
                                        "items":4
                                    }
                                }
                            }'>
                        @foreach($indexPageData->suggests[3]->product as $bestP)
                            <div class="product product-2">
                                <figure class="product-media">
                                    <a href="{{route('shop_productDetail', $bestP->slug)}}">
                                        <img
                                            src="/{{$bestP->banner ? $bestP->banner : "assets/images/demos/demo-3/products/product-1.jpg"}}"
                                            alt="{{$bestP->title}}"
                                            class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a onclick="addToWishlist(this,{{$bestP->id}})" class="btn-product-icon btn-wishlist btn-wishlist-selected btn-expandable @if($bestP->is_wish) btn-wishlist-selected @endif">
                                            <span>افزودن به لیست علاقه مندی</span>
                                        </a>
{{--                                        href="/product/wishlist/store?productId={{$bestP->id}}"--}}
                                    </div><!-- End .product-action -->

                                    <div class="product-action product-action-dark">
                                        <a onclick="addToBasket({{$bestP->id}})" type="button" class="btn-product btn-cart text-decoration-none" title="افزودن به سبد خرید">
                                            <span>افزودن به سبد خرید</span>
                                        </a>
{{--                                        href="/shop_basket/order/store?productId={{$bestP->id}}"--}}

                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{$bestP->title}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title">
                                        <a href="{{route('shop_productDetail', $bestP->slug)}}">{{$bestP->full_title}}</a>
                                    </h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{$bestP->price}} تومان
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{$bestP->avg_rate}}%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( {{$bestP->num_visit}} بازدید )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="products-sale-tab" role="tabpanel"
                     aria-labelledby="products-sale-link">
                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": true,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "rtl": true,
                            "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "600": {
                                        "items":2
                                    },
                                    "992": {
                                        "items":3
                                    },
                                    "1200": {
                                        "items":4
                                    }
                                }
                            }'>
                        @foreach($indexPageData->suggests[4]->product as $mostS)
                            <div class="product product-2">
                                <figure class="product-media">
                                    <a href={{route('shop_productDetail', $mostS->slug)}}>
                                        <img
                                        src="/{{$mostS->banner ? $mostS->banner : "assets/images/demos/demo-3/products/product-1.jpg"}}"
                                        alt="{{$mostS->title}}" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a onclick="addToWishlist(this,{{$mostS->id}})" class="btn-product-icon btn-wishlist btn-expandable @if($mostS->is_wish) btn-wishlist-selected @endif"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action product-action-dark">
                                        <a onclick="addToBasket({{$mostS->id}})" class="btn-product btn-cart text-decoration-none" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                      </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{$mostS->title}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{route('shop_productDetail', $mostS->slug)}}">{{$mostS->full_title}}</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        {{$mostS->price}} تومان
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{$mostS->avg_rate}}%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( {{$mostS->num_visit}} بازدید )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="products-top-tab" role="tabpanel"
                     aria-labelledby="products-top-link">
                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": true,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "rtl": true,
                            "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "600": {
                                        "items":2
                                    },
                                    "992": {
                                        "items":3
                                    },
                                    "1200": {
                                        "items":4
                                    }
                                }
                            }'>
                        @foreach($indexPageData->suggests[5]->product as $highR)
                            <div class="product product-2">
                                <figure class="product-media">
                                    <a href={{route('shop_productDetail', $highR->slug)}}>
                                        <img
                                            src="/{{$highR->banner ? $highR->banner : "assets/images/demos/demo-3/products/product-1.jpg"}}"
                                            alt="{{$highR->title}}" class="product-image">
                                    </a>


                                    <div class="product-action-vertical">
                                        <a onclick="addToWishlist(this,{{$highR->id}})" class="btn-product-icon btn-wishlist btn-expandable text-decoration-none @if($highR->is_wish) btn-wishlist-selected @endif">
                                            <span>افزودن به لیست علاقه مندی</span></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action product-action-dark">
                                        <a onclick="addToBasket({{$highR->id}})" class="btn-product btn-cart text-decoration-none" title="افزودن به سبد خرید">
                                            <span>افزودن به سبد خرید </span></a>
                                        </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{$highR->title}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{route('shop_productDetail', $highR->slug)}}">{{$highR->full_title}}</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="out-price">{{$highR->price}} تومان</span>
                                        @if(!$highR->status)
                                            <span class="out-text">ناموجود</span>
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{$highR->avg_rate}}%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( {{$highR->num_visit}} بازدید )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endforeach
      {{--                  <div class="product product-2">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="/assets/images/demos/demo-3/products/product-1.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">دوربین فیلمبرداری</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">دوربین عکاسی 360 درجه ضد آب</a>
                                </h3><!-- End .product-title -->
                                <div class="product-price">
                                    349,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 2 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="/assets/images/demos/demo-3/products/product-4.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">دوربین دیجیتال</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">دوربین سونی - آلفا 5100</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    499,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 11 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-new">جدید</span>
                                <a href="product.html">
                                    <img src="/assets/images/demos/demo-3/products/product-2.jpg" alt="تصویر محصول"
                                         class="product-image">
                                    <img src="/assets/images/demos/demo-3/products/product-2-2.jpg" alt="تصویر محصول"
                                         class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">ساعت هوشمند</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">ساعت اپل - با بند سفید اسپورت</a>
                                </h3><!-- End .product-title -->
                                <div class="product-price">
                                    214,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 0 بازدید )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #e2e2e2;"><span
                                            class="sr-only">نام رنگ</span></a>
                                    <a href="#" style="background: #333333;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" style="background: #f2bc9e;"><span class="sr-only">نام
                                                رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="/assets/images/demos/demo-3/products/product-1.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">دوربین فیلمبرداری</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">دوربین عکاسی 360 درجه ضد آب</a>
                                </h3><!-- End .product-title -->
                                <div class="product-price">
                                    349,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 2 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->--}}
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .container -->
        {{--       End homeTopCategoryProduct       --}}


        <div class="mb-7 mb-lg-11"></div><!-- End .mb-7 -->

        {{--        newOffer        --}}
        <div class="container">
            <div class="cta cta-border cta-border-image mb-5 mb-lg-7"
                 style="background-image: url('/assets/images/demos/demo-3/bg-1.jpg');">
                <div class="cta-border-wrapper bg-white">
                    <div class="row justify-content-center">
                        <div class="col-md-11 col-xl-11">
                            <div class="cta-content">
                                <div class="cta-heading">
                                    <h3 class="cta-title text-left"><span class="text-primary">پیشنهاد های
                                                جدید</span>
                                        <br>هر روز ساعت 12 ظهر</h3><!-- End .cta-title -->
                                </div><!-- End .cta-heading -->

                                <div class="cta-text">
                                    <p>دریافت کد <span class="text-dark font-weight-normal">تخفیف 5 درصدی</span>
                                        برای
                                        <br>تمام خرید هایی که از فروشگاه ما داشته باشید</p>
                                </div><!-- End .cta-text -->
                                <a href="#" class="btn btn-primary btn-round"><span>افزودن به سبد خرید / 15 هزار
                                            تومان سالیانه</span><i class="icon-long-arrow-left"></i></a>
                            </div><!-- End .cta-content -->
                        </div><!-- End .col-xl-7 -->
                    </div><!-- End .row -->
                </div><!-- End .bg-white -->
            </div><!-- End .cta -->
        </div><!-- End .container -->
        {{--        End newOffer        --}}


        {{--        specialDiscount        --}}
        <div class="bg-light deal-container pt-7 pb-7 mb-5">
            <div class="container">
                <div class="heading text-center mb-4">
                    <h2 class="title text-center">{{$indexPageData->suggests[2]->title}}</h2><!-- End .title -->
                    <p class="title-desc text-center">{{$indexPageData->suggests[2]->sub_title}}</p><!-- End .title-desc -->
                </div><!-- End .heading -->

                <div class="row">
                    @if($indexPageData->suggests[2]->image)
                    <div class="col-lg-6 deal-col">
                        <div class="deal"
                             style="background-image: url('/{{$indexPageData->suggests[2]->image->url}}');">
                            <div class="deal-top">
                                <h2>{{$indexPageData->suggests[2]->title_banner}}</h2>
                                <h4 class="text-center">{{$indexPageData->suggests[2]->sub_title_banner}}</h4>
                            </div><!-- End .deal-top -->

                            <div class="deal-content">
                                <h3 class="product-title"><a href="product.html">{{$indexPageData->suggests[2]->lable_banner}}</a>
                                </h3>
                                <!-- End .product-title -->
<!--

                                <div class="product-price mt-3">
                                    <span class="new-price d-block w-100">129,000 تومان</span>
                                    <span class="old-price d-block w-100">قیمت قبلی 214,000 تومان</span>
                                </div>&lt;!&ndash; End .product-price &ndash;&gt;
-->

                                <a href="{{$indexPageData->suggests[2]->link_banner}}" class="btn btn-link mt-3"><span>خرید</span><i
                                        class="icon-long-arrow-left"></i></a>
                            </div><!-- End .deal-content -->

                            <div class="deal-bottom">
                                <div class="deal-countdown" data-until="+10h"></div><!-- End .deal-countdown -->
                            </div><!-- End .deal-bottom -->
                        </div><!-- End .deal -->
                    </div><!-- End .col-lg-6 -->
                    @else
                    <div class="col-lg-6 deal-col">
                        <div class="deal"
                             style="background-image: url('/assets/images/demos/demo-3/deal/bg-1.jpg');">
                            <div class="deal-top">
                                <h2>تخفیف ویژه امروز</h2>
                                <h4 class="text-center">فروش محدود </h4>
                            </div><!-- End .deal-top -->

                            <div class="deal-content">
                                <h3 class="product-title"><a href="product.html">اسپیکر هوشمند خانگی</a>
                                </h3>
                                <!-- End .product-title -->

                                <div class="product-price mt-3">
                                    <span class="new-price d-block w-100">129,000 تومان</span>
                                    <span class="old-price d-block w-100">قیمت قبلی 214,000 تومان</span>
                                </div><!-- End .product-price -->

                                <a href="product.html" class="btn btn-link mt-3"><span>خرید</span><i
                                        class="icon-long-arrow-left"></i></a>
                            </div><!-- End .deal-content -->

                            <div class="deal-bottom">
                                <div class="deal-countdown" data-until="+10h"></div><!-- End .deal-countdown -->
                            </div><!-- End .deal-bottom -->
                        </div><!-- End .deal -->
                    </div><!-- End .col-lg-6 -->
                    @endif
                    <div class="col-lg-6">
                        <div class="products">
                            <div class="row">
                                @foreach($indexPageData->suggests[2]->product as $off)
                                <div class="col-6">
                                    <div class="product product-2">
                                        <figure class="product-media">
<!--                                            <span class="product-label label-circle label-top">برتر</span>
                                            <span class="product-label label-circle label-sale">فروش ویژه</span>-->
                                            <a href={{route('shop_productDetail', $off->slug)}}>
                                                <img src="/{{$off->banner}}"
                                                     alt="{{$off->title}}" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a onclick="addToWishlist(this,{{$off->id}})"
                                                   class="btn-product-icon btn-wishlist btn-expandable @if($off->is_wish) btn-wishlist-selected @endif"><span>افزودن
                                                            به لیست علاقه مندی</span></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action product-action-dark">
                                                <a onclick="addToBasket({{$off->id}})" class="btn-product btn-cart"
                                                   title="افزودن به سبد خرید"><span>افزودن به سبد خرید</span></a>
<!--                                                <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                   title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>-->
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{$off->title}}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="{{route('shop_productDetail', $off->slug)}}">{{$off->full_title}}</a></h3><!-- End .product-title -->
                                             <div class="product-price">
                                                <span class="new-price">{{$off->price}} تومان</span>
                                                @if(!$off->status)
                                                    <span class="out-text">ناموجود</span>
                                            @endif
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 5 بازدید )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 -->

                                @endforeach
                            </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->

                <div class="more-container text-center mt-3 mb-0">
                    <a href="#" class="btn btn-outline-dark-2 btn-round btn-more"><span>مشاهده تخفیف های ویژه
                                بیشتر</span><i class="icon-long-arrow-left"></i></a>
                </div><!-- End .more-container -->
            </div><!-- End .container -->
        </div><!-- End .deal-container -->
        {{--        End specialDiscount        --}}


        {{--        brands        --}}
        <div class="container">
            <div class="owl-carousel mt-5 mb-5 owl-simple" data-toggle="owl" data-owl-options='{
                            "nav": false,
                            "dots": false,
                            "margin": 30,
                            "loop": false,
                            "rtl": true,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "420": {
                                    "items":3
                                },
                                "600": {
                                    "items":4
                                },
                                "900": {
                                    "items":5
                                },
                                "1024": {
                                    "items":6
                                }
                            }
                        }'>
                <a href="#" class="brand">
                    <img src="assets/images/brands/1.png" alt="نام برند">
                </a>

                <a href="#" class="brand">
                    <img src="assets/images/brands/2.png" alt="نام برند">
                </a>

                <a href="#" class="brand">
                    <img src="assets/images/brands/3.png" alt="نام برند">
                </a>

                <a href="#" class="brand">
                    <img src="assets/images/brands/4.png" alt="نام برند">
                </a>

                <a href="#" class="brand">
                    <img src="assets/images/brands/5.png" alt="نام برند">
                </a>

                <a href="#" class="brand">
                    <img src="assets/images/brands/6.png" alt="نام برند">
                </a>
            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
        {{--        End brands        --}}


        <div class="container">
            <hr class="mt-3 mb-6">
        </div><!-- End .container -->


        {{--        specialProducts        --}}
        <div class="container trending">
            <div class="heading heading-flex mb-3">
                <div class="heading-left">
                    <h2 class="title">{{$indexPageData->suggests[1]->title}}</h2><!-- End .title -->
                </div><!-- End .heading-left -->

<!--                <div class="heading-right">
                    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="trending-all-link" data-toggle="tab"
                               href="#trending-all-tab" role="tab" aria-controls="trending-all-tab"
                               aria-selected="true">همه</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="trending-tv-link" data-toggle="tab" href="#trending-tv-tab"
                               role="tab" aria-controls="trending-tv-tab" aria-selected="false">TV</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="trending-computers-link" data-toggle="tab"
                               href="#trending-computers-tab" role="tab" aria-controls="trending-computers-tab"
                               aria-selected="false">کامپیوتر</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="trending-phones-link" data-toggle="tab"
                               href="#trending-phones-tab" role="tab" aria-controls="trending-phones-tab"
                               aria-selected="false">موبایل و تبلت</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="trending-watches-link" data-toggle="tab"
                               href="#trending-watches-tab" role="tab" aria-controls="trending-watches-tab"
                               aria-selected="false">ساعت هوشمند</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="trending-acc-link" data-toggle="tab" href="#trending-acc-tab"
                               role="tab" aria-controls="trending-acc-tab" aria-selected="false">لوازم جانبی</a>
                        </li>
                    </ul>
                </div>-->
                <!-- End .heading-right -->
            </div><!-- End .heading -->

            <div class="row">

                <div class="col-xl-4-5col">
                    <div class="tab-content tab-content-carousel just-action-icons-sm">
                        <div class="tab-pane p-0 fade show active" id="trending-all-tab" role="tabpanel"
                             aria-labelledby="trending-all-link">
                            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow"
                                 data-toggle="owl" data-owl-options='{
                                        "nav": true,
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "rtl": true,
                            "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                @foreach($indexPageData->suggests[1]->product as $sps)
                                <div class="product product-2">
                                    <figure class="product-media">
<!--                                        <span class="product-label label-circle label-top">برتر</span>-->
                                        <a href="{{route('shop_productDetail', $sps->slug)}}">
                                            <img src="/{{$sps->banner}}"
                                                 alt="{{$sps->title}}" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a onclick="addToWishlist(this,{{$sps->id}})"
                                               class="btn-product-icon btn-wishlist btn-expandable @if($sps->is_wish) btn-wishlist-selected @endif"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a onclick="addToBasket({{$sps->id}})" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
<!--                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>--><!--                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>-->
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{$sps->title}}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{route('shop_productDetail', $sps->slug)}}">{{$sps->full_title}}</a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            {{$sps->price}} تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 بازدید )</span>
                                        </div><!-- End .rating-container -->

<!--                                        <div class="product-nav product-nav-dots">
                                            <a href="#" style="background: #69b4ff;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" style="background: #ff887f;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" class="active" style="background: #333333;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                        </div>&lt;!&ndash; End .product-nav &ndash;&gt;-->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                @endforeach
                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane p-0 fade" id="trending-tv-tab" role="tabpanel"
                             aria-labelledby="trending-tv-link">
                            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow"
                                 data-toggle="owl" data-owl-options='{
                                        "nav": true,
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "rtl": true,
                            "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-new">جدید</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-13.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">تب لت</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro
                                                with Wi-Fi 256GB </a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            890,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 بازدید )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" style="background: #edd2c8;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" class="active" style="background: #333333;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-12.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">لوازم صوتی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth
                                                Speaker</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            170,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 6 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <span class="product-label label-circle label-sale">فروش ویژه</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-14.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">موبایل</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL
                                                128GB</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">1,890,000 تومان</span>
                                            <span class="old-price">2,250,000 تومان</span>
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 10 بازدید )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #edd2c8;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                            <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" style="background: #333333;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-15.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">تلویزیون و سینما خانگی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">تلویزیون سامسونگ 55
                                                اینچ</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            2,870,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 5 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-11.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">لپ تاپ</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">لپ تاپ مک بوک پرو - 13
                                                اینچ</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            4,380,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane p-0 fade" id="trending-computers-tab" role="tabpanel"
                             aria-labelledby="trending-computers-link">
                            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow"
                                 data-toggle="owl" data-owl-options='{
                                        "nav": true,
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "rtl": true,
                            "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-15.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">تلویزیون و سینما خانگی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">تلویزیون سامسونگ 55
                                                اینچ</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            2,100,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 5 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-11.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">لپ تاپ</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">لپ تاپ مک بوک پرو - 13
                                                اینچ</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            3,320,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-new">جدید</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-13.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">تب لت</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro
                                                with Wi-Fi 256GB </a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            780,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 بازدید )</span>
                                        </div><!-- End .rating-container -->

<!--                                        <div class="product-nav product-nav-dots">
                                            <a href="#" style="background: #edd2c8;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" class="active" style="background: #333333;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                        </div>-->

                                        <!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-12.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">لوازم صوتی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth
                                                Speaker</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            290,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 6 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <span class="product-label label-circle label-sale">فروش ویژه</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-14.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">موبایل</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL
                                                128GB</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">1,350,000 تومان</span>
                                            <span class="old-price">1,540,000 تومان</span>
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 10 بازدید )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #edd2c8;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                            <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" style="background: #333333;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane p-0 fade" id="trending-phones-tab" role="tabpanel"
                             aria-labelledby="trending-phones-link">
                            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow"
                                 data-toggle="owl" data-owl-options='{
                                        "nav": true,
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "rtl": true,
                            "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-11.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">لپ تاپ</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">لپ تاپ مک بوک پرو - 13
                                                اینچ</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            1,970,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-12.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">لوازم صوتی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth
                                                Speaker</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            120,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 6 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-new">جدید</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-13.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">تب لت</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro
                                                with Wi-Fi 256GB </a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            540,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 بازدید )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" style="background: #edd2c8;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" class="active" style="background: #333333;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-15.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">تلویزیون و سینما خانگی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">تلویزیون سامسونگ 55
                                                اینچ</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            1,900,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 5 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-11.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">لپ تاپ</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">لپ تاپ مک بوک پرو - 13
                                                اینچ</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            2,490,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <span class="product-label label-circle label-sale">فروش ویژه</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-14.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title=" "><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">موبایل</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL
                                                128GB</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">2,430,000 تومان</span>
                                            <span class="old-price">2,850,000 تومان</span>
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 10 بازدید )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #edd2c8;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                            <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" style="background: #333333;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane p-0 fade" id="trending-watches-tab" role="tabpanel"
                             aria-labelledby="trending-watches-link">
                            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow"
                                 data-toggle="owl" data-owl-options='{
                                        "nav": true,
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "rtl": true,
                            "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <span class="product-label label-circle label-sale">فروش ویژه</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-14.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">موبایل</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL
                                                128GB</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">2,430,000 تومان</span>
                                            <span class="old-price">2,850,000 تومان</span>
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 10 بازدید )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #edd2c8;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                            <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" style="background: #333333;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-11.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">لپ تاپ</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">لپ تاپ مک بوک پرو - 13
                                                اینچ</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            3,850,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-12.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">لوازم صوتی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth
                                                Speaker</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            560,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 6 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-new">جدید</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-13.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">تب لت</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro
                                                with Wi-Fi 256GB </a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            1,260,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 بازدید )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" style="background: #edd2c8;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" class="active" style="background: #333333;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane p-0 fade" id="trending-acc-tab" role="tabpanel"
                             aria-labelledby="trending-acc-link">
                            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow"
                                 data-toggle="owl" data-owl-options='{
                                        "nav": true,
                                        "dots": false,
                                        "margin": 20,
                                        "loop": false,
                                        "rtl": true,
                            "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            }
                                        }
                                    }'>
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-11.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">لپ تاپ</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">لپ تاپ مک بوک پرو - 13
                                                اینچ</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            3,850,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-15.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">تلویزیون و سینما خانگی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">تلویزیون سامسونگ 55
                                                اینچ</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            1,260,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 5 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">برتر</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-11.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">لپ تاپ</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">لپ تاپ مک بوک پرو - 13
                                                اینچ</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            3,850,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-12.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">لوازم صوتی</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth
                                                Speaker</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            560,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 6 بازدید )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-new">جدید</span>
                                        <a href="product.html">
                                            <img src="assets/images/demos/demo-3/products/product-13.jpg"
                                                 alt="تصویر محصول" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                               class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart"
                                               title="افزودن به سبد خرید"><span>افزودن
                                                        به سبد خرید</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                               title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">تب لت</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro
                                                with Wi-Fi 256GB </a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            1,260,000 تومان
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 بازدید )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" style="background: #edd2c8;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                        رنگ</span></a>
                                            <a href="#" class="active" style="background: #333333;"><span
                                                    class="sr-only">نام رنگ</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .col-xl-4-5col -->
            </div><!-- End .row -->
        </div><!-- End .container -->
        {{--        End specialProducts        --}}


        <div class="container">
            <hr class="mt-5 mb-6">
        </div><!-- End .container -->


        {{--        bestSellingProducts        --}}
        <div class="container top">
            <div class="heading heading-flex mb-3">
                <div class="heading-left">
                    <h2 class="title">{{$indexPageData->suggests[0]->title}}</h2><!-- End .title -->
                </div><!-- End .heading-left -->

<!--                <div class="heading-right">
                    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab"
                               role="tab" aria-controls="top-all-tab" aria-selected="true">همه</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="top-tv-link" data-toggle="tab" href="#top-tv-tab" role="tab"
                               aria-controls="top-tv-tab" aria-selected="false">TV</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="top-computers-link" data-toggle="tab" href="#top-computers-tab"
                               role="tab" aria-controls="top-computers-tab" aria-selected="false">کامپیوتر</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="top-phones-link" data-toggle="tab" href="#top-phones-tab"
                               role="tab" aria-controls="top-phones-tab" aria-selected="false">موبایل و تب لت</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="top-watches-link" data-toggle="tab" href="#top-watches-tab"
                               role="tab" aria-controls="top-watches-tab" aria-selected="false">ساعت هوشمند</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="top-acc-link" data-toggle="tab" href="#top-acc-tab" role="tab"
                               aria-controls="top-acc-tab" aria-selected="false">لوازم جانبی</a>
                        </li>
                    </ul>
                </div>--><!-- End .heading-right -->
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel just-action-icons-sm">
                <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel"
                     aria-labelledby="top-all-link">
                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": true,
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "rtl": true,
                            "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                        @foreach($indexPageData->suggests[0]->product as $mostSell)
                        <div class="product product-2">
                            <figure class="product-media">
<!--                                <span class="product-label label-circle label-top">برتر</span>-->
                                <a href="{{route('shop_productDetail', $mostSell->slug)}}">
                                    <img src="/{{$mostSell->banner}}" alt="تصویر محصول"
                                         class="{{$mostSell->title}}">
                                </a>

                                <div class="product-action-vertical">
                                    <a onclick="addToWishlist(this,{{$mostSell->id}})"
                                       class="btn-product-icon btn-wishlist btn-expandable @if($mostSell->is_wish) btn-wishlist-selected @endif"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a onclick="addToBasket({{$mostSell->id}})" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
<!--                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>-->
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">{{$mostSell->title}}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="{{route('shop_productDetail', $mostSell->slug)}}">{{$mostSell->full_title}}</a>
                                </h3><!-- End .product-title -->
                                <div class="product-price">
                                    {{$mostSell->price}} تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="top-tv-tab" role="tabpanel" aria-labelledby="top-tv-link">
                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": true,
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "rtl": true,
                            "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-new">جدید</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-13.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">تب لت</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">آیپد پرو اپل - سایز 11 اینچ - حافظه
                                        256 گیگ</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    1,260,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 بازدید )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" style="background: #edd2c8;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" class="active" style="background: #333333;"><span
                                            class="sr-only">نام رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-12.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">لوازم صوتی</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">اسپیکر بلوتوث</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    560,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 6 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">برتر</span>
                                <span class="product-label label-circle label-sale">فروش ویژه</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-14.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">موبایل</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">گوشی گوشی گوگل مدل پیکسل 3 - 128
                                        گیگابایت</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">2,430,000 تومان</span>
                                    <span class="old-price">2,850,000 تومان</span>
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 10 بازدید )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #edd2c8;"><span
                                            class="sr-only">نام رنگ</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" style="background: #333333;"><span class="sr-only">نام
                                                رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">برتر</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-15.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">تلویزیون و سینما خانگی</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">تلویزیون ال ای دی سامسونگ - سایز 55
                                        اینچ</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    1,260,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 5 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">برتر</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-11.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">لپ تاپ</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">لپ تاپ مک بوک پرو - 13 اینچ</a>
                                </h3><!-- End .product-title -->
                                <div class="product-price">
                                    3,850,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="top-computers-tab" role="tabpanel"
                     aria-labelledby="top-computers-link">
                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": true,
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "rtl": true,
                            "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">برتر</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-15.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">تلویزیون و سینما خانگی</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">تلویزیون ال ای دی سامسونگ - سایز 55
                                        اینچ</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    1,260,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 5 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">برتر</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-11.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">لپ تاپ</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">لپ تاپ مک بوک پرو - 13 اینچ</a>
                                </h3><!-- End .product-title -->
                                <div class="product-price">
                                    3,850,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-new">جدید</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-13.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">تب لت</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">آیپد پرو اپل - سایز 11 اینچ - حافظه
                                        256 گیگ</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    1,260,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 بازدید )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" style="background: #edd2c8;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" class="active" style="background: #333333;"><span
                                            class="sr-only">نام رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-12.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">لوازم صوتی</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">اسپیکر بلوتوث</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    560,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 6 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">برتر</span>
                                <span class="product-label label-circle label-sale">فروش ویژه</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-14.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">موبایل</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">گوشی گوشی گوگل مدل پیکسل 3 - 128
                                        گیگابایت</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">2,430,000 تومان</span>
                                    <span class="old-price">2,850,000 تومان</span>
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 10 بازدید )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #edd2c8;"><span
                                            class="sr-only">نام رنگ</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" style="background: #333333;"><span class="sr-only">نام
                                                رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="top-phones-tab" role="tabpanel"
                     aria-labelledby="top-phones-link">
                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": true,
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "rtl": true,
                            "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">برتر</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-11.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">لپ تاپ</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">لپ تاپ مک بوک پرو - 13 اینچ</a>
                                </h3><!-- End .product-title -->
                                <div class="product-price">
                                    3,850,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-12.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">لوازم صوتی</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">اسپیکر بلوتوث</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    560,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 6 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-new">جدید</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-13.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">تب لت</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">آیپد پرو اپل - سایز 11 اینچ - حافظه
                                        256 گیگ</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    1,260,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 بازدید )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" style="background: #edd2c8;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" class="active" style="background: #333333;"><span
                                            class="sr-only">نام رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">برتر</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-15.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">تلویزیون و سینما خانگی</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">تلویزیون ال ای دی سامسونگ - سایز 55
                                        اینچ</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    1,260,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 5 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">برتر</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-11.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">لپ تاپ</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">لپ تاپ مک بوک پرو - 13 اینچ</a>
                                </h3><!-- End .product-title -->
                                <div class="product-price">
                                    3,850,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">برتر</span>
                                <span class="product-label label-circle label-sale">فروش ویژه</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-14.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">موبایل</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">گوشی گوشی گوگل مدل پیکسل 3 - 128
                                        گیگابایت</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">2,430,000 تومان</span>
                                    <span class="old-price">2,850,000 تومان</span>
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 10 بازدید )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #edd2c8;"><span
                                            class="sr-only">نام رنگ</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" style="background: #333333;"><span class="sr-only">نام
                                                رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="top-watches-tab" role="tabpanel"
                     aria-labelledby="top-watches-link">
                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": true,
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "rtl": true,
                            "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">برتر</span>
                                <span class="product-label label-circle label-sale">فروش ویژه</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-14.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">موبایل</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">گوشی گوشی گوگل مدل پیکسل 3 - 128
                                        گیگابایت</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">2,430,000 تومان</span>
                                    <span class="old-price">2,850,000 تومان</span>
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 10 بازدید )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #edd2c8;"><span
                                            class="sr-only">نام رنگ</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" style="background: #333333;"><span class="sr-only">نام
                                                رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">برتر</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-11.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">لپ تاپ</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">لپ تاپ مک بوک پرو - 13 اینچ</a>
                                </h3><!-- End .product-title -->
                                <div class="product-price">
                                    3,850,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-12.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">لوازم صوتی</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">اسپیکر بلوتوث</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    560,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 6 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-new">جدید</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-13.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">تب لت</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">آیپد پرو اپل - سایز 11 اینچ - حافظه
                                        256 گیگ</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    1,260,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 بازدید )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" style="background: #edd2c8;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" class="active" style="background: #333333;"><span
                                            class="sr-only">نام رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="top-acc-tab" role="tabpanel" aria-labelledby="top-acc-link">
                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": true,
                                "dots": false,
                                "margin": 20,
                                "loop": false,
                                "rtl": true,
                            "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">برتر</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-11.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">لپ تاپ</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">لپ تاپ مک بوک پرو - 13 اینچ</a>
                                </h3><!-- End .product-title -->
                                <div class="product-price">
                                    3,850,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">برتر</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-15.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">تلویزیون و سینما خانگی</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">تلویزیون ال ای دی سامسونگ - سایز 55
                                        اینچ</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    1,260,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 5 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
<!--                                <span class="product-label label-circle label-top">برتر</span>-->
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-11.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">لپ تاپ</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">لپ تاپ مک بوک پرو - 13 اینچ</a>
                                </h3><!-- End .product-title -->
                                <div class="product-price">
                                    3,850,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-12.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">لوازم صوتی</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">اسپیکر بلوتوث</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    560,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 6 بازدید )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->

                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-new">جدید</span>
                                <a href="product.html">
                                    <img src="assets/images/demos/demo-3/products/product-13.jpg" alt="تصویر محصول"
                                         class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                لیست علاقه مندی</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-dark">
                                    <a href="#" class="btn-product btn-cart" title="افزودن به سبد خرید"><span>افزودن
                                                به
                                                سبد خرید</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                       title="مشاهده سریع محصولات"><span>مشاهده سریع</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">تب لت</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">آیپد پرو اپل - سایز 11 اینچ - حافظه
                                        256 گیگ</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    1,260,000 تومان
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 بازدید )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" style="background: #edd2c8;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">نام
                                                رنگ</span></a>
                                    <a href="#" class="active" style="background: #333333;"><span
                                            class="sr-only">نام رنگ</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .container -->
        {{--        End bestSellingProducts        --}}


        <div class="container">
            <hr class="mt-5 mb-0">
        </div><!-- End .container -->


        {{--    services    --}}
        <div class="icon-boxes-container mt-2 mb-2 bg-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">ارسال رایگان</h3><!-- End .icon-box-title -->
                                <p>برای سفارشات بالای 50 هزار تومان</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title">بازگرداندن محصول</h3><!-- End .icon-box-title -->
                                <p>تا 30 روز بعد از خرید</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title">تخفیف 20 درصد</h3>
                                <!-- End .icon-box-title -->
                                <p>برای اولین خرید</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title">پشتیبانی محصولات</h3><!-- End .icon-box-title -->
                                <p>7 روز هفته، 24 ساعته</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .icon-boxes-container -->
        {{--    End services    --}}


        <!-- start social media -->
        <div class="container">
            <div class="cta cta-separator cta-border-image cta-half mb-0"
                 style="background-image: url(/assets/images/demos/demo-3/bg-2.jpg);">
                <div class="cta-border-wrapper bg-white">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cta-wrapper cta-text text-center">
                                <h3 class="cta-title">شبکه های اجتماعی</h3><!-- End .cta-title -->
                                <p class="cta-desc text-center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم
                                    ایپسوم متن
                                    ساختگی با تولید سادگی نامفهوم. </p><!-- End .cta-desc -->

                                <div class="social-icons social-icons-colored justify-content-center">
                                    @foreach($indexPageData->allSocialMedia as $socialMedia)
                                        <a href="{{$socialMedia->link}}" class="social-icon social-facebook"
                                           title="{{$socialMedia->title}}"
                                           target="_blank"><img src="{{$socialMedia->image->url}}"></a>
                                    @endforeach
                                </div><!-- End .soial-icons -->
                            </div><!-- End .cta-wrapper -->
                        </div><!-- End .col-lg-6 -->

                        <div class="col-lg-6">
                            <div class="cta-wrapper text-center">
                                <h3 class="cta-title">اطلاع از جدیدترین تخفیف ها</h3><!-- End .cta-title -->
                                <p class="cta-desc text-center">و <br>دریافت <span class="text-primary">کد تخفیف 20
                                            درصدی</span>
                                    برای اولین خرید</p><!-- End .cta-desc -->

                                <form action="#">
                                    <div class="input-group">
                                        <input type="email" class="form-control"
                                               placeholder="ایمیل خود را وارد کنید" aria-label="Email Adress" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-rounded" type="submit"><i
                                                    class="icon-long-arrow-left"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- .End .input-group -->
                                </form>
                            </div><!-- End .cta-wrapper -->
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .bg-white -->
            </div><!-- End .cta -->
        </div>
        <!-- end social media -->

    </main><!-- End .main -->

@endsection
