@extends('client.layout.total')
@section('content')

    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('indexClient')}}">خانه</a></li>
                    <li class="breadcrumb-item"><a href="#">صفحات</a></li>
                    <li class="breadcrumb-item active" aria-current="page">فراموشی رمز عبور</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
             style="background-image: url('/assets/images/backgrounds/login-bg.jpg')">
            <div class="container">
                <div class="form-box">
                    <div class="row m-0">
                        <div class="col-12 p-0">
                            <form>
                                <h3 class="mb-4 mt-3 text-center">بازنشانی رمز عبور</h3>
                                <div class="form-group">
                                    <label class="d-inline-block w-100 text-right font-weight-bold">شماره موبایل خود
                                        را وارد
                                        کنید</label>
                                    <div class="row">
                                        <div class="col-4 col-sm-3">
                                            <input class="form-control" type="text" value="98+">
                                        </div>
                                        <div class="col-8 col-sm-9">
                                            <input class="form-control" type="number" placeholder="000-000-0000">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-outline-primary-2" type="submit">ارسال</button>
                                </div>
                                <div class="form-group text-right"><span class="reset-password-link">رمز را دریافت
                                            نکردید؟  <a class="text-danger" href="javascript:void(0)">ارسال
                                                مجدد</a></span></div>
                                <div class="form-group">
                                    <label class="d-inline-block w-100 text-right font-weight-bold">رمز دریافت شده
                                        را وارد
                                        کنید</label>
                                    <div class="row">
                                        <div class="col">
                                            <input class="form-control text-center opt-text" type="text" value="00"
                                                   maxlength="2">
                                        </div>
                                        <div class="col">
                                            <input class="form-control text-center opt-text" type="text" value="00"
                                                   maxlength="2">
                                        </div>
                                        <div class="col">
                                            <input class="form-control text-center opt-text" type="text" value="00"
                                                   maxlength="2">
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-right">ایجاد رمز عبور</h6>
                                <div class="form-group">
                                    <label>رمز عبور جدید</label>
                                    <input type="password" class="form-control" id="register-password-3"
                                           name="new-password" placeholder="*********" required="">
                                </div>
                                <div class="form-group">
                                    <label>تکرار رمز عبور جدید</label>
                                    <input type="password" class="form-control" id="register-password-4"
                                           name="confirm-password" placeholder="*********" required="">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                        <label class="custom-control-label" for="signin-remember-2">مرا به خاطر
                                            بسپار</label>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button class="btn btn-outline-primary-2 btn-block" type="submit">انجام شد
                                    </button>
                                </div>
                                <p>رمز عبور خود را به یاد آوردید؟<a class="mr-2" href="#">وارد
                                        شوید</a></p>
                            </form>
                        </div>
                    </div>
                </div><!-- End .form-box -->
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->

@endsection
