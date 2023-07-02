@extends('dashboard.layoute.total')


@section('content')

    <div class="col-md-12 col-lg-6 container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-colored-form-control">بروزرسانی بلاگ </h4>
                <a class="heading-elements-toggle">
                    <i class="la la-ellipsis-v font-medium-3"></i>
                </a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a data-action="collapse">
                                <i class="ft-minus"></i>
                            </a>
                        </li>
                        <li>
                            <a data-action="reload">
                                <i class="ft-rotate-cw"></i>
                            </a>
                        </li>
                        <li>
                            <a data-action="expand">
                                <i class="ft-maximize"></i>
                            </a>
                        </li>
                        <li>
                            <a data-action="close">
                                <i class="ft-x"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">

                    <form class="form" method="post"
                        {{--                          action="{{route('storeUserProfile')}}"--}}
                    >
                        {{--                        @csrf--}}
                        <div class="form-body">

                            <h4 class="form-section">
                                <i class="ft-briefcase"></i> ایجاد بلاگ جدید</h4>
                            <div class="form-group">
                                <label for="contactinput5">نام</label>
                                <input class="form-control border-primary" type="text" placeholder="نام" id="contactinput5" name="name">
                            </div>

                            <div class="form-group">
                                <label for="contactinput5">نام خانوادگی</label>
                                <input class="form-control border-primary" type="text" placeholder="نام خانوادگی" id="contactemail5" name="family">
                            </div>

                            <div class="form-group">
                                <label for="contactinput6">تلفن</label>
                                <input class="form-control border-primary" type="tel" placeholder="تلفن" id="contactinput6" name="phone">
                            </div>

                            <div class="form-group">
                                <label>رمزعبور</label>
                                <input class="form-control border-primary" id="contactinput7" type="password" placeholder="رمزعبور" name="pass">
                            </div>

                        </div>

                        <div class="form-actions right">
                            <button type="button" class="btn btn-danger mr-1">
                                <i class="ft-x"></i> لغو
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> ذخیره
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
