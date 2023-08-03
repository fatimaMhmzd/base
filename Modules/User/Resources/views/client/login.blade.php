@extends('client.layout.total')
@section('content')

    <main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('indexClient')}}">خانه</a></li>
                <li class="breadcrumb-item"><a href="#">صفحات</a></li>
                <li class="breadcrumb-item active" aria-current="page">ورود / ثبت نام</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
             style="background-image: url('/assets/images/backgrounds/login-bg.jpg')">
            <div class="container">
                <div class="form-box">
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
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                                   aria-controls="signin-2" aria-selected="true">ورود</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2"
                                   role="tab" aria-controls="register-2" aria-selected="false">ثبت نام</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                                <form method="POST" action="{{ route('user_singIn') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="singin-email-2">شماره موبایل *</label>
                                        <input type="tel" class="form-control" id="singin-email-2"
                                               name="mobile" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password-2">رمز عبور *</label>
                                        <input type="password" class="form-control" id="singin-password-2"
                                               name="password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>ورود</span>
                                            <i class="icon-long-arrow-left"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="signin-remember-2" name="check">
                                            <label class="custom-control-label" for="signin-remember-2">مرا به خاطر
                                                بسپار</label>
                                        </div><!-- End .custom-checkbox -->

                                        <a href="{{route('user_forgetPassword')}}" class="forgot-link">رمز عبور خود را فراموش کرده اید؟</a>
                                    </div><!-- End .form-footer -->
                                </form>
<!--                                <div class="form-choice">
                                    <p class="text-center">یا ورود با </p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                حساب کاربری گوگل
                                            </a>
                                        </div>&lt;!&ndash; End .col-6 &ndash;&gt;
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-f">
                                                <i class="icon-facebook-f"></i>
                                                حساب کاربری فیسبوک
                                            </a>
                                        </div>&lt;!&ndash; End .col-6 &ndash;&gt;
                                    </div>&lt;!&ndash; End .row &ndash;&gt;
                                </div>-->
                                <!-- End .form-choice -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade show active" id="register-2" role="tabpanel"
                                 aria-labelledby="register-tab-2">
                                <form method="POST" action="{{ route('user_singUp') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="register-email-2">شماره موبایل شما *</label>
                                        <input type="tel" class="form-control" id="register-email-2"
                                               name="mobile" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password-2">رمز عبور *</label>
                                        <input type="password" class="form-control" id="register-password-2"
                                               name="password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>ثبت نام</span>
                                            <i class="icon-long-arrow-left"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="register-policy-2" required>
                                            <label class="custom-control-label" for="register-policy-2">من با <a
                                                    href="#">قوانین و مقررات</a> موافقم *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>
<!--                                <div class="form-choice">
                                    <p class="text-center">یا ورود با </p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                حساب کاربری گوگل
                                            </a>
                                        </div>&lt;!&ndash; End .col-6 &ndash;&gt;
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login  btn-f">
                                                <i class="icon-facebook-f"></i>
                                                حساب کاربری فیسبوک
                                            </a>
                                        </div>&lt;!&ndash; End .col-6 &ndash;&gt;
                                    </div>&lt;!&ndash; End .row &ndash;&gt;
                                </div>-->
                                <!-- End .form-choice -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
</main><!-- End .main -->

@endsection
