@extends('client.layout.total')
@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
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
                            <div><a href="tel:#">55667788</a>، <a href="tel:#">99887733</a></div>
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

                            <form action="#" class="contact-form mb-2">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="cname" class="sr-only">نام</label>
                                        <input type="text" class="form-control" id="cname"
                                               placeholder="نام خود را وارد کنید *" required>
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <label for="cemail" class="sr-only">ایمیل</label>
                                        <input type="email" class="form-control" id="cemail"
                                               placeholder="ایمیل خود را وارد کنید *" required>
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-4">
                                        <label for="cphone" class="sr-only">شماره موبایل</label>
                                        <input type="tel" class="form-control" id="cphone"
                                               placeholder="شماره موبایل خود را وارد کنید">
                                    </div><!-- End .col-sm-4 -->
                                </div><!-- End .row -->

                                <label for="csubject" class="sr-only">موضوع</label>
                                <input type="text" class="form-control" id="csubject" placeholder="موضوع پیام شما">

                                <label for="cmessage" class="sr-only">پیام</label>
                                <textarea class="form-control" cols="30" rows="4" id="cmessage" required
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
            <div class="col-12 d-flex mb-5">
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
