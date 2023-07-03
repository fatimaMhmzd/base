@extends('dashboard.layoute.total')


@section('content')



    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-colored-form-control">ایجاد بلاگ </h4>
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
                    <form class="form" method="post"
{{--                          action="{{route('storeUserProfile')}}"--}}
                    >
{{--                        @csrf--}}
                        <div class="form-body">

<!--                            <h4 class="form-section">
                                <i class="ft-briefcase"></i> ایجاد بلاگ جدید</h4>-->
                            <div class="row">
                                <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="contactinput5">عنوان</label>
                                <input class="form-control border-primary" type="text" placeholder="عنوان" id="contactinput5" name="title">
                            </div>
                            </div>
                                <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="contactinput5">زیر عنوان</label>
                                <input class="form-control border-primary" type="text" placeholder="زیر عنوان" id="contactemail5" name="sub_title">
                            </div>
                            </div>
                            </div>
                            <div class="row" >
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="companyinput1" style="margin-top: 20px">عکس اصلی</label>
                                    <fieldset class="form-group">
                                        <input type="file" name="file" class="form-control-file"
                                               id="exampleInputFile">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="companyinput1" style="margin-top: 20px">link</label>
                                    <fieldset class="form-group">
                                        <input type="text" id="company-column" class="form-control" name="link" placeholder="link">
                                    </fieldset>
                                </div>
                            </div>

                            </div>
                            <div class="form-group">
                                <label>توضیحات</label>
                                <input class="form-control border-primary" id="contactinput7" type="password" placeholder="توضیحات" name="description">
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="companyinput8">محتوا</label>
                                    <textarea id="companyinput8" rows="10" class="form-control"
                                              name="content" placeholder="محتوا"></textarea>
                                </div>
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


@stop

@section('script')

    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content', {
            language: 'fa',
            content: 'fa',
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>

@endsection
