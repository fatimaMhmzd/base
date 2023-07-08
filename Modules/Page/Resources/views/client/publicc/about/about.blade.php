@extends('client.layout.total')
@section('content')

    <main class="main">
        {{--        slider        --}}
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">درباره ما 2<span>صفحات</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index-1.html">خانه</a></li>
                    <li class="breadcrumb-item"><a href="#">صفحات</a></li>
                    <li class="breadcrumb-item active" aria-current="page">درباره ما 2</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
        {{--        End slider        --}}

        <div class="page-content pb-3">
            <div class="container">

                {{--               weAre               --}}
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="about-text text-center mt-3">
                            <h2 class="title text-center mb-2">ما که هستیم</h2><!-- End .title text-center mb-2 -->
                            <p class="text-center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن
                                ساختگی با تولید سادگی
                                نامفهوملورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی با
                                تولید
                                سادگی نامفهوم. لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی
                                با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با
                                تولید سادگی نامفهوم! لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم. </p>
                            <img src="assets/images/about/about-2/signature.png" alt="signature"
                                 class="mx-auto mb-5">

                            <img src="assets/images/about/about-2/img-1.jpg" alt="image" class="mx-auto mb-6">
                        </div><!-- End .about-text -->
                    </div><!-- End .col-lg-10 offset-1 -->
                </div><!-- End .row -->
                {{--               End weAre               --}}


                {{--                features                --}}
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-puzzle-piece"></i>
                                </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">طراحی فوق العاده</h3><!-- End .icon-box-title -->
                                <p class="text-center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم <br>لورم ایپسوم
                                    متن ساختگی با تولید
                                    سادگی نامفهوم <br>لورم ایپسوم.</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-life-ring"></i>
                                </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">پشتیباین حرفه ای</h3><!-- End .icon-box-title -->
                                <p class="text-center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم, <br>لورم
                                    ایپسوم متن ساختگی با
                                    تولید سادگی نامفهوم <br>لورم ایپسوم متن ساختگی </p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-heart-o"></i>
                                </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">تولید با علاقه</h3><!-- End .icon-box-title -->
                                <p class="text-center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم <br>لورم ایپسوم
                                    متن ساختگی با تولید
                                    سادگی نامفهوم <br>لورم ایپسوم با تولید سادگی نامفهوم.</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->
                </div><!-- End .row -->
                {{--                End features                --}}

            </div><!-- End .container -->

            <div class="mb-2"></div><!-- End .mb-2 -->

            {{--       statistics       --}}
            <div class="bg-image pt-7 pb-5 pt-md-12 pb-md-9"
                 style="background-image: url(assets/images/backgrounds/bg-4.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                        <span class="count" data-from="0" data-to="40" data-speed="3000"
                                              data-refresh-interval="50">0</span>k+
                                </div><!-- End .count-wrapper -->
                                <h3 class="count-title text-white">مشتری خشنود</h3><!-- End .count-title -->
                            </div><!-- End .count-container -->
                        </div><!-- End .col-6 col-md-3 -->

                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                        <span class="count" data-from="0" data-to="20" data-speed="3000"
                                              data-refresh-interval="50">0</span>+
                                </div><!-- End .count-wrapper -->
                                <h3 class="count-title text-white">تجربه در تجارت</h3><!-- End .count-title -->
                            </div><!-- End .count-container -->
                        </div><!-- End .col-6 col-md-3 -->

                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                        <span class="count" data-from="0" data-to="95" data-speed="3000"
                                              data-refresh-interval="50">0</span>%
                                </div><!-- End .count-wrapper -->
                                <h3 class="count-title text-white">بازخورد کاربران</h3><!-- End .count-title -->
                            </div><!-- End .count-container -->
                        </div><!-- End .col-6 col-md-3 -->

                        <div class="col-6 col-md-3">
                            <div class="count-container text-center">
                                <div class="count-wrapper text-white">
                                        <span class="count" data-from="0" data-to="15" data-speed="3000"
                                              data-refresh-interval="50">0</span>
                                </div><!-- End .count-wrapper -->
                                <h3 class="count-title text-white">جوایز</h3><!-- End .count-title -->
                            </div><!-- End .count-container -->
                        </div><!-- End .col-6 col-md-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .bg-image pt-8 pb-8 -->
            {{--       End statistics       --}}


            {{--        ourTeam        --}}
            <div class="bg-light-2 pt-6 pb-7 mb-6">
                <div class="container">
                    <h2 class="title text-center mb-4">آشنایی با تیم ما</h2><!-- End .title text-center mb-2 -->

                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-1.jpg" alt="توضیح عکس">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="فیسبوک" target="_blank"><i
                                                    class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="توییتر" target="_blank"><i
                                                    class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="اینستاگرام" target="_blank"><i
                                                    class="icon-instagram"></i></a>
                                        </div><!-- End .soial-icons -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">کارمند 1<span>جستجو و سئو</span></h3>
                                    <!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-2.jpg" alt="توضیح عکس">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="فیسبوک" target="_blank"><i
                                                    class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="توییتر" target="_blank"><i
                                                    class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="اینستاگرام" target="_blank"><i
                                                    class="icon-instagram"></i></a>
                                        </div><!-- End .soial-icons -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">کارمند 2<span>مدیریت فروش</span></h3>
                                    <!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-3.jpg" alt="توضیح عکس">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="فیسبوک" target="_blank"><i
                                                    class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="توییتر" target="_blank"><i
                                                    class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="اینستاگرام" target="_blank"><i
                                                    class="icon-instagram"></i></a>
                                        </div><!-- End .soial-icons -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">کارمند 3<span>مدیریت فروش</span></h3>
                                    <!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-4.jpg" alt="توضیح عکس">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="فیسبوک" target="_blank"><i
                                                    class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="توییتر" target="_blank"><i
                                                    class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="اینستاگرام" target="_blank"><i
                                                    class="icon-instagram"></i></a>
                                        </div><!-- End .soial-icons -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">کارمند 4<span>مدیریت فروش</span></h3>
                                    <!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-5.jpg" alt="توضیح عکس">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="فیسبوک" target="_blank"><i
                                                    class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="توییتر" target="_blank"><i
                                                    class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="اینستاگرام" target="_blank"><i
                                                    class="icon-instagram"></i></a>
                                        </div><!-- End .soial-icons -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">کارمند 5<span>مدیریت فروش</span></h3>
                                    <!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-6.jpg" alt="توضیح عکس">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="فیسبوک" target="_blank"><i
                                                    class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="توییتر" target="_blank"><i
                                                    class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="اینستاگرام" target="_blank"><i
                                                    class="icon-instagram"></i></a>
                                        </div><!-- End .soial-icons -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">کارمند 6<span>مدیریت محصولات</span></h3>
                                    <!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-7.jpg" alt="توضیح عکس">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="فیسبوک" target="_blank"><i
                                                    class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="توییتر" target="_blank"><i
                                                    class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="اینستاگرام" target="_blank"><i
                                                    class="icon-instagram"></i></a>
                                        </div><!-- End .soial-icons -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">کارمند 7<span>مدیریت محصولات</span></h3>
                                    <!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="member member-2 text-center">
                                <figure class="member-media">
                                    <img src="assets/images/team/about-2/member-8.jpg" alt="توضیح عکس">

                                    <figcaption class="member-overlay">
                                        <div class="social-icons social-icons-simple">
                                            <a href="#" class="social-icon" title="فیسبوک" target="_blank"><i
                                                    class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="توییتر" target="_blank"><i
                                                    class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="اینستاگرام" target="_blank"><i
                                                    class="icon-instagram"></i></a>
                                        </div><!-- End .soial-icons -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">کارمند 8<span>مدیریت محصولات</span></h3>
                                    <!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-lg-3 -->
                    </div><!-- End .row -->

                </div><!-- End .container -->
            </div><!-- End .bg-light-2 pt-6 pb-6 -->
            {{--        End ourTeam        --}}

            {{--        brandsWorkWith        --}}
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="brands-text text-center mx-auto mb-6">
                            <h2 class="title">برند های معروفی که با ما همکاری می کنند</h2>
                            <!-- End .title -->
                        </div><!-- End .brands-text -->
                        <div class="brands-display">
                            <div class="row justify-content-center">
                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/1.png" alt="نام برند">
                                    </a>
                                </div><!-- End .col-md-3 -->

                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/2.png" alt="نام برند">
                                    </a>
                                </div><!-- End .col-md-3 -->

                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/3.png" alt="نام برند">
                                    </a>
                                </div><!-- End .col-md-3 -->

                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/7.png" alt="نام برند">
                                    </a>
                                </div><!-- End .col-md-3 -->

                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/4.png" alt="نام برند">
                                    </a>
                                </div><!-- End .col-md-3 -->

                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/5.png" alt="نام برند">
                                    </a>
                                </div><!-- End .col-md-3 -->

                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/6.png" alt="نام برند">
                                    </a>
                                </div><!-- End .col-md-3 -->

                                <div class="col-6 col-sm-4 col-md-3">
                                    <a href="#" class="brand">
                                        <img src="assets/images/brands/9.png" alt="نام برند">
                                    </a>
                                </div><!-- End .col-md-3 -->
                            </div><!-- End .row -->
                        </div><!-- End .brands-display -->
                    </div><!-- End .col-lg-10 offset-lg-1 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
            {{--        End brandsWorkWith        --}}


        </div><!-- End .page-content -->
    </main><!-- End .main -->


@endsection
