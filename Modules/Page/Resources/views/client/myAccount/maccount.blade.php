@extends('client.layout.total')
@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">داشبورد<span>فروشگاه</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('indexClient')}}">خانه</a></li>
                    <li class="breadcrumb-item"><a href="{{route('shop_storePageClient')}}">فروشگاه</a></li>
                    <li class="breadcrumb-item active" aria-current="page">داشبورد</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-4 col-lg-3">
                            <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab"
                                       href="#tab-dashboard" role="tab" aria-controls="tab-dashboard"
                                       aria-selected="true">داشبورد</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders"
                                       role="tab" aria-controls="tab-orders" aria-selected="false">سفارشات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-downloads-link" data-toggle="tab"
                                       href="#tab-downloads" role="tab" aria-controls="tab-downloads"
                                       aria-selected="false">دانلود ها</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address"
                                       role="tab" aria-controls="tab-address" aria-selected="false">آدرس</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account"
                                       role="tab" aria-controls="tab-account" aria-selected="false">جزئیات حساب
                                        کاربری</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">خروج از حساب کاربری</a>
                                </li>
                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel"
                                     aria-labelledby="tab-dashboard-link">
                                    <p>سلام <span class="font-weight-normal text-dark">کاربر</span>
                                        <br>
                                        شما در اینجا میتوانید <a href="#tab-orders"
                                                                 class="tab-trigger-link link-underline">سفارشات خود را ببینید</a>، وضعیت
                                        ارسال <a href="#tab-address" class="tab-trigger-link">سفارشات خود را مشاهده
                                            کنید وآدرس خود را تغییر دهید</a>، و همچنین <a href="#tab-account"
                                                                                          class="tab-trigger-link">می توانید رمز عبور یا جزئیات حساب کاربری خود را
                                            ویرایش کنید </a>.</p>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-orders" role="tabpanel"
                                     aria-labelledby="tab-orders-link">
                                    <p>سفارش جدیدی وجود ندارد</p>
                                    <a href="{{route('shop_storePageClient')}}" class="btn btn-outline-primary-2"><span>رفتن به
                                                فروشگاه</span><i class="icon-long-arrow-left"></i></a>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-downloads" role="tabpanel"
                                     aria-labelledby="tab-downloads-link">
                                    <p>دانلود جدیدی وجود ندارد</p>
                                    <a href="{{route('shop_storePageClient')}}" class="btn btn-outline-primary-2"><span>رفتن به
                                                فروشگاه</span><i class="icon-long-arrow-left"></i></a>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-address" role="tabpanel"
                                     aria-labelledby="tab-address-link">
                                    <p>آدرسی که اینجا ثبت می کنید به صورت پیش فرض برای ارسال محصولات برای شما استفاده
                                        می شود.</p>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">آدرس شما</h3><!-- End .card-title -->

                                                    <p>نام کاربری شما<br>
                                                        نام شرکت شما<br>
                                                        محمد محمدی<br>
                                                        تهران-تهران<br>
                                                        خیابان آزادی - پلاک 7<br>
                                                        yourmail@mail.com<br>
                                                        <a href="#address-modal">ویرایش <i class="icon-edit"></i></a></p>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-12 -->
                                    </div><!-- End .row -->
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-account" role="tabpanel"
                                     aria-labelledby="tab-account-link">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>نام *</label>
                                                <input type="text" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>نام خانوادگی *</label>
                                                <input type="text" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <label>نام نمایش *</label>
                                        <input type="text" class="form-control" required>
                                        <small class="form-text">این نام در قسمت بازدیدها، نظرات و حساب کاربری شما
                                            نمایش داده می شود.</small>

                                        <label>شماره موبایل *</label>
                                        <input type="email" class="form-control" required>

                                        <label>پسورد فعلی</label>
                                        <input type="password" class="form-control">

                                        <label>پسورد جدید</label>
                                        <input type="password" class="form-control">

                                        <label>تکرار پسورد جدید</label>
                                        <input type="password" class="form-control mb-2">

                                        <button type="submit" class="btn btn-outline-primary-2 float-right">
                                            <span>ذخیره تغییرات</span>
                                            <i class="icon-long-arrow-left"></i>
                                        </button>
                                    </form>
                                </div><!-- .End .tab-pane -->
                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->


    <div class="modal fade" id="address-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin"
                                       role="tab" aria-controls="signin" aria-selected="true">ورود</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                                       aria-controls="register" aria-selected="false">ثبت نام</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel"
                                     aria-labelledby="signin-tab">
                                    <form method="POST" action="{{ route('user_singIn') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="singin-email">شماره موبایل *</label>
                                            <input type="text" class="form-control" id="singin-email"
                                                   name="mobile" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">رمز عبور *</label>
                                            <input type="password" class="form-control" id="singin-password"
                                                   name="password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>ورود</span>
                                                <i class="icon-long-arrow-left"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">مرا به خاطر
                                                    بسپار</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="{{route('user_forgetPassword')}}" class="forgot-link">فراموشی رمز
                                                عبور؟</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <!--                                <div class="form-choice">
                                                                        <p class="text-center">یا ورود با</p>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <a href="#" class="btn btn-login btn-g">
                                                                                    <i class="icon-google"></i>
                                                                                    حساب گوگل
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .col-6 &ndash;&gt;
                                                                            <div class="col-sm-6">
                                                                                <a href="#" class="btn btn-login btn-f">
                                                                                    <i class="icon-facebook-f"></i>
                                                                                    حساب فیسبوک
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .col-6 &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .row &ndash;&gt;
                                                                    </div>&lt;!&ndash; End .form-choice &ndash;&gt;-->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
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
                                    <form method="POST" action="{{ route('user_singUp') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="register-email">شماره موبایل شما *</label>
                                            <input type="tel" class="form-control" id="register-phone"
                                                   name="mobile" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">رمز عبور *</label>
                                            <input type="password" class="form-control" id="register-password"
                                                   name="password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>ثبت نام</span>
                                                <i class="icon-long-arrow-left"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy"
                                                       required>
                                                <label class="custom-control-label" for="register-policy">با
                                                    <a href="#">قوانین و مقررات </a>موافقم *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <!--                                <div class="form-choice">
                                                                        <p class="text-center">یا عضویت با</p>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <a href="#" class="btn btn-login btn-g">
                                                                                    <i class="icon-google"></i>
                                                                                    حساب گوگل
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .col-6 &ndash;&gt;
                                                                            <div class="col-sm-6">
                                                                                <a href="#" class="btn btn-login  btn-f">
                                                                                    <i class="icon-facebook-f"></i>
                                                                                    حساب فیسبوک
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .col-6 &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .row &ndash;&gt;
                                                                    </div>&lt;!&ndash; End .form-choice &ndash;&gt;-->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

@endsection
