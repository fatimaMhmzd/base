@extends('client.layout.total')
@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">تماس با ما <span>صفحات</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('indexClient')}}">خانه</a></li>
                    <li class="breadcrumb-item"><a href="#">صفحات</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تماس با ما </li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-box text-center">
                            <h3>دفتر</h3>

                            <address>تهران، میدان آزادی <br>خیابان آزادی، پلاک 7</address>
                        </div><!-- End .contact-box -->
                    </div><!-- End .col-md-4 -->

                    <div class="col-md-4">
                        <div class="contact-box text-center">
                            <h3>اطلاعات تماس</h3>

                            <div><a href="mailto:#">info@exaple.com</a></div>
                            <div><a href="tel:#">09024980577</a></div>
                        </div><!-- End .contact-box -->
                    </div><!-- End .col-md-4 -->

                    <div class="col-md-4">
                        <div class="contact-box text-center">
                            <h3>شبکه های اجتماعی</h3>

                            <div class="social-icons social-icons-color justify-content-center">
                                <a href="#" class="social-icon social-facebook" title="فیسبوک" target="_blank"><i
                                        class="icon-facebook-f"></i></a>
                                <a href="#" class="social-icon social-twitter" title="توییتر" target="_blank"><i
                                        class="icon-twitter"></i></a>
                                <a href="#" class="social-icon social-instagram" title="اینستاگرام"
                                   target="_blank"><i class="icon-instagram"></i></a>
                                <a href="#" class="social-icon social-youtube" title="یوتیوب" target="_blank"><i
                                        class="icon-youtube"></i></a>
                                <a href="#" class="social-icon social-pinterest" title="پینترست" target="_blank"><i
                                        class="icon-pinterest"></i></a>
                            </div><!-- End .soial-icons -->
                        </div><!-- End .contact-box -->
                    </div><!-- End .col-md-4 -->
                </div><!-- End .row -->

                <hr class="mt-3 mb-5 mt-md-1">
                <div class="touch-container row justify-content-center">
                    <div class="col-md-9 col-lg-7">
                        <div class="text-center">
                            <h2 class="title mb-1 text-center">تماس با ما</h2><!-- End .title mb-2 -->
                            <p class="lead text-primary text-center mb-5">
                                از طریق فرم زیر میتوانید با ما ارتباط برقرار کنید
                            </p><!-- End .lead text-primary -->
                            @if(Session::has('success'))
                                <div class="alert alert-success mt-3">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    <strong></strong> {{ Session::get('message', '') }}
                                </div>
                            @endif
                            @if(count($errors) > 0 )
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
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
                            <form action="{{route('contactus_store')}}" class="contact-form mb-2" method="post">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="cname" class="sr-only">نام</label>
                                        <input type="text" class="form-control" id="cname" name="name"
                                               placeholder="نام خود را وارد کنید *" required>
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <label for="cemail" class="sr-only">ایمیل</label>
                                        <input type="email" class="form-control" id="cemail" name="email"
                                               placeholder="ایمیل خود را وارد کنید *" required>
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <label for="cphone" class="sr-only">شماره موبایل</label>
                                        <input type="tel" class="form-control" id="cphone" name="mobile"
                                               placeholder="شماره موبایل خود را وارد کنید">
                                    </div><!-- End .col-sm-4 -->
                                </div><!-- End .row -->

                                <label for="csubject" class="sr-only">موضوع</label>
                                <input type="text" class="form-control" id="csubject" name="title"
                                       placeholder="موضوع پیام شما">

                                <label for="cmessage" class="sr-only">پیام</label>
                                <textarea class="form-control" cols="30" rows="4" id="cmessage" name="message" required
                                          placeholder="متن پیام شما *"></textarea>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                        <span>تایید و ارسال</span>
                                        <i class="icon-long-arrow-left"></i>
                                    </button>
                                </div><!-- End .text-center -->
                            </form><!-- End .contact-form -->
                        </div><!-- End .col-md-9 col-lg-7 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div>

            <hr class="mt-4 mb-5">

            <div class="stores mb-4 mb-lg-5">
                <h2 class="title text-center mb-3">فروشگاه های ما</h2><!-- End .title text-center mb-2 -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="store">
                            <div class="row">
                                <div class="col-sm-5 col-xl-6">
                                    <figure class="store-media mb-2 mb-lg-0">
                                        <img src="/assets/images/stores/img-1.jpg" alt="image">
                                    </figure><!-- End .store-media -->
                                </div><!-- End .col-xl-6 -->
                                <div class="col-sm-7 col-xl-6">
                                    <div class="store-content">
                                        <h3 class="store-title">فروشگاه شماره 1</h3><!-- End .store-title -->
                                        <address>تهران، میدان تجریش</address>
                                        <div><a href="tel:#">88776655</a></div>

                                        <h4 class="store-subtitle">ساعت کاری فروشگاه :</h4>
                                        <!-- End .store-subtitle -->
                                        <div>شنبه-چهارشنبه 11صبح تا 7 عصر</div>
                                        <div>پنج شنبه 11 صبح تا 6 عصر</div>

                                        <a href="#" class="btn btn-link" target="_blank"><span>مشاهده روی
                                                        نقشه</span><i class="icon-long-arrow-left"></i></a>
                                    </div><!-- End .store-content -->
                                </div><!-- End .col-xl-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .store -->
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-6">
                        <div class="store">
                            <div class="row">
                                <div class="col-sm-5 col-xl-6">
                                    <figure class="store-media mb-2 mb-lg-0">
                                        <img src="/assets/images/stores/img-2.jpg" alt="image">
                                    </figure><!-- End .store-media -->
                                </div><!-- End .col-xl-6 -->

                                <div class="col-sm-7 col-xl-6">
                                    <div class="store-content">
                                        <h3 class="store-title">فروشگاه شماره 2</h3><!-- End .store-title -->
                                        <address>تهران، میدان منیریه</address>
                                        <div><a href="tel:#">77558866</a></div>

                                        <h4 class="store-subtitle">ساعت کاری فروشگاه :</h4>
                                        <!-- End .store-subtitle -->
                                        <div>شنبه-چهارشنبه 11صبح تا 7 عصر</div>
                                        <div>پنج شنبه 11 صبح تا 6 عصر</div>
                                        <div>جمعه - تعطیل</div>

                                        <a href="#" class="btn btn-link" target="_blank"><span>مشاهده روی
                                                        نقشه</span><i class="icon-long-arrow-left"></i></a>
                                    </div><!-- End .store-content -->
                                </div><!-- End .col-xl-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .store -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .stores -->

            <div class="col-12 d-flex">
                <div class="bg-white w-100">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.0762034011345!2d51.33938432078328!3d35.69974233666176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzXCsDQxJzU5LjEiTiA1McKwMjAnMTMuOSJF!5e0!3m2!1sfa!2s!4v1585894944267!5m2!1sfa!2s"
                        width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div><!-- End .page-content -->
    </main><!-- End .main -->

    <!-- Google Map -->
    <script src="../../../maps.googleapis.com/maps/api/js@key=AIzaSyDc3LRykbLB-y8MuomRUIY0qH5S6xgBLX4"></script>

@endsection
