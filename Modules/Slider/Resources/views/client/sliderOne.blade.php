@inject('slider', 'Modules\Slider\Services\SliderService')
{{--@dd($slider->getBy(1))--}}

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
                                    @if($slide->title == "پیشنهادهای روزانه")
                                        <div class="intro-slide">
                                            <figure class="slide-image">
                                                <picture>
                                                    <source media="(max-width: 480px)"
                                                            srcset="assets/images/demos/demo-3/slider/slide-1-480w.jpg">
                                                    <img src="/{{$slide->image->url}}"
                                                         alt="توضیحات عکس">
                                                </picture>
                                            </figure><!-- End .slide-image -->

                                            <div class="intro-content">
                                                <h3 class="intro-subtitle text-primary">{{$slide->title}}</h3>
                                                <!-- End .h3 intro-subtitle -->
                                                <h1 class="intro-title">
                                                    {{$slide->sub_title}}
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
                                    @endif
                                @endforeach
                            @else
                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <source media="(max-width: 480px)"
                                                srcset="assets/images/demos/demo-3/slider/slide-1-480w.jpg">
                                        <img src="assets/images/demos/demo-3/slider/slide-1.jpg"
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
                                                srcset="assets/images/demos/demo-3/slider/slide-2-480w.jpg">
                                        <img src="assets/images/demos/demo-3/slider/slide-2.jpg"
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
                                @if($slide->title != "پیشنهادهای روزانه")
                                    <div class="banner mb-lg-1 mb-xl-2">
                                        <a href="#">
                                            <img src="/{{$slide->image->url}}" alt="بنر">
                                        </a>

                                        <div class="banner-content text-right">
                                            <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#">{{$slide->title}}</a>
                                            </h4><!-- End .banner-subtitle -->
                                            <h3 class="banner-title"><a href="#">{{$slide->sub_title}}</a></h3>
                                            <!-- End .banner-title -->
                                            <a href="#" class="banner-link">خرید<i class="icon-long-arrow-left"></i></a>
                                        </div><!-- End .banner-content -->
                                    </div><!-- End .banner -->
                                @endif
                            @endforeach
                                @else
                        <div class="banner mb-lg-1 mb-xl-2">
                            <a href="#">
                                <img src="assets/images/demos/demo-3/banners/banner-1.jpg" alt="بنر">
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
                                <img src="assets/images/demos/demo-3/banners/banner-2.jpg" alt="بنر">
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
                                <img src="assets/images/demos/demo-3/banners/banner-3.jpg" alt="بنر">
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


