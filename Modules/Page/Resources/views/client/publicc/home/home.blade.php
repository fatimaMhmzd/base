@extends('client.layout.total')

@section('content')

    <main class="main">

        @include('slider::client.sliderOne')

        @include('page::client.publicc.home.homeTopCategoryProduct')

        <div class="mb-7 mb-lg-11"></div><!-- End .mb-7 -->

        @include('page::client.publicc.home.newOffer')

        @include('page::client.publicc.home.specialDiscount')

        @include('page::client.publicc.home.brands')
        <!-- End .container -->

        <div class="container">
            <hr class="mt-3 mb-6">
        </div><!-- End .container -->

        @include('page::client.publicc.home.specialProducts')

        @include('page::client.publicc.home.bestSellingProducts')

        <div class="container">
            <hr class="mt-5 mb-0">
        </div><!-- End .container -->

        @include('page::client.publicc.home.services')

        <!-- start social media -->
        <div class="container">
            <div class="cta cta-separator cta-border-image cta-half mb-0"
                 style="background-image: url(assets/images/demos/demo-3/bg-2.jpg);">
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
                                        <a href="{{$socialMedia->link}}" class="social-icon social-facebook" title="{{$socialMedia->title}}"
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
