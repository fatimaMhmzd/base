@extends('dashboard.layoute.total')

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">بروزرسانی کاربر</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
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
                            <form class="form" method="post" action="{{route('dashboard_user_update')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label  style="margin-top: 20px">نام</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="first-name-column" class="form-control" placeholder="نام" name="name">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label  style="margin-top: 20px">نام خانوادگی</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="نام خانوادگی" name="family">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label  style="margin-top: 20px">شماره تلفن</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="شماره تلفن" name="phone">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">موبایل</label>
                                                <input type="text" name="mobile" class="form-control"
                                                       placeholder="موبایل" value="{{old('mobile')}}">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">ایمیل</label>
                                                <input type="text" name="email" class="form-control"
                                                       placeholder="ایمیل" value="{{old('email')}}">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">نام کاربری</label>
                                                <input type="text" name="userName" class="form-control"
                                                       placeholder="نام کاربری" value="{{old('userName')}}">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">رمز</label>
                                                <input type="text" name="password" class="form-control"
                                                       placeholder="رمز" value="{{old('password')}}">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput"> تکرار رمز</label>
                                                <input type="text" name="repeatPassword" class="form-control"
                                                       placeholder="رمز" value="{{old('repeatPassword')}}">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">توضیحات</label>
                                                <textarea name="description" class="form-control" placeholder="توضیحات"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">ارسال</button>
                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">تنظیم مجدد</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection


