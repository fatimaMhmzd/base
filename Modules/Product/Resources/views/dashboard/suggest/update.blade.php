@extends('dashboard.layoute.total')

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش</h4>
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
                            <form class="form" method="post" action="{{route('dashboard_product_suggest_update' , $data->id)}}"
                                  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">عنوان</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="first-name-column" class="form-control"
                                                       placeholder="عنوان" name="title" value="{{$data->title}}">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">زیر عنوان</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="زیر عنوان" name="sub_title"
                                                       value="{{$data->sub_title}}">

                                            </fieldset>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">عنوان بنر</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="عنوان بنر" name="title_banner" value="{{$data->title_banner}}">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">زیر عنوان بنر</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="عنوان بنر" name="sub_title_banner"
                                                       value="{{$data->sub_title_banner}}">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">برچسب بنر</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="برچسب بنر" name="lable_banner" value="{{$data->lable_banner}}">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">لینک بنر</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="برچسب بنر" name="link_banner" value="{{$data->link_banner}}">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">توضیحات بنر </label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="عنوان بنر" name="lable_description"
                                                       value="{{$data->lable_description}}">

                                            </fieldset>
                                        </div>


                                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                                            <fieldset class="form-group">
                                                <div class="col mb-1">
                                                    <label>عکس بنر</label>
                                                </div>

                                                <img @if($data->image) src="/{{$data->image->url}}"
                                                     @endif id="companyLogo" data-type="editable" height="200px"
                                                     width="200px"/>


                                            </fieldset>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">ارسال</button>
                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">تنظیم مجدد
                                            </button>
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

@stop

@section('script')

    <script src="/dashboard/app-assets/js/scripts/forms/select/form-select2.min.js"></script>
    <script src="/dashboard/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('long_description', {
            language: 'fa',
            content: 'fa',
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script>

        function init() {
            $("img[data-type=editable]").each(function (i, e) {
                var _inputFile = $('<input/>')
                    .attr('type', 'file')
                    .attr('hidden', 'hidden')
                    .attr('onchange', 'readImage()')
                    .attr('name', 'file')
                    .attr('data-image-placeholder', e.id);

                $(e.parentElement).append(_inputFile);

                $(e).on("click", _inputFile, triggerClick);
            });
        }

        function triggerClick(e) {
            e.data.click();
        }

        Element.prototype.readImage = function () {
            var _inputFile = this;
            if (_inputFile && _inputFile.files && _inputFile.files[0]) {
                var _fileReader = new FileReader();
                _fileReader.onload = function (e) {
                    var _imagePlaceholder = _inputFile.attributes.getNamedItem("data-image-placeholder").value;
                    var _img = $("#" + _imagePlaceholder);
                    _img.attr("src", e.target.result);
                };
                _fileReader.readAsDataURL(_inputFile.files[0]);
            }
        };

        //
        // IIFE - Immediately Invoked Function Expression
        // https://stackoverflow.com/questions/18307078/jquery-best-practises-in-case-of-document-ready
        (

            function (yourcode) {
                "use strict";
                // The global jQuery object is passed as a parameter
                yourcode(window.jQuery, window, document);
            }(
                function ($, window, document) {
                    "use strict";
                    // The $ is now locally scoped
                    $(function () {
                        // The DOM is ready!
                        init();
                    });

                    // The rest of your code goes here!
                }));

    </script>
@endsection
