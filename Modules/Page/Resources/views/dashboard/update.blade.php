@extends('dashboard.layoute.total')


@section('content')

    <div class="col-md-12 col-lg-6 container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-colored-form-control">بروزرسانی صفحه </h4>
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
                                <i class="ft-briefcase"></i> بروزرسانی صفحه</h4>
                            <div class="form-group">
                                <label for="contactinput5">عنوان</label>
                                <input class="form-control border-primary" type="text" placeholder="عنوان" id="contactinput5" name="title">
                            </div>

                            <div class="form-group">
                                <label for="contactinput5">محتوا</label>
                                <input class="form-control border-primary" type="text" placeholder="content" id="contactemail5" name="content">
                            </div>

                            <div class="form-group">
                                <label for="عکس صفحه"></label>
                                <input type="file" class="form-control"
                                       placeholder="عکس صفحه"
                                       name="image">
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
