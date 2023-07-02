@extends('dashboard.layoute.total')

@section('content')

    <div class="col-md-12 col-lg-6 container">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">افزودن صفحه</h4>
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
                            <form class="form" method="post" action="{{route('dashboard_page_store')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group row">

                                        <div class="col-md-6">

                                            <label for="companyName" style="margin-top: 20px">عنوان</label>
                                            <input type="text" id="title" class="form-control" placeholder="عنوان"
                                                   name="title">
                                        </div>
                                        <div class="col-md-6">

                                            <label for="companyName" style="margin-top: 20px">زیر عنوان</label>
                                            <input type="text" id="sub_title" class="form-control" placeholder="عنوان"
                                                   name="sub_title">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="companyinput8">توضیحات </label>
                                                <textarea id="companyinput8" rows="5" class="form-control"
                                                          name="description"
                                                          placeholder="توضیحات "></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="companyinput1" style="margin-top: 20px">عکس اصلی</label>
                                                <fieldset class="form-group">
                                                    <input type="file" name="file" class="form-control-file"
                                                           id="exampleInputFile">
                                                </fieldset>
                                            </div>
                                        </div>


                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="companyinput8">محتوا</label>
                                                <textarea id="companyinput8" rows="10" class="form-control"
                                                          name="descriptionlong" placeholder="توضیحات بلند"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">ارسال</button>
                                    <button type="reset" class="btn btn-outline-warning mr-1 mb-1">تنظیم مجدد</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>


@stop

@section('script')

    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('descriptionlong', {
            language: 'fa',
            content: 'fa',
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>

@endsection
