@extends('dashboard.layoute.total')
@section('link')
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/vendors/css/forms/select/select2.min.css">
@endsection

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
                        <form class="form" method="post" action="{{route('dashboard_blog_store')}}"
                              enctype="multipart/form-data">
                            @csrf
                        <div class="form-body">

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label  style="margin-top: 20px">انتخاب گروهبندی</label>
                                    <fieldset class="form-group">
                                        <select class="form-control" id="basicSelect" name="group_id"  id="group">
                                            @foreach($group as $item)
                                                <option value="{{$item->id}}">{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <label  style="margin-top: 20px">برچسب ها</label>
                                    <div class="form-group">
                                        <select class="select2 form-control" multiple="multiple" name="lable[]">
                                            @foreach($lable as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="contactinput5">عنوان</label>
                                        <input class="form-control border-primary" type="text" placeholder="عنوان"
                                               id="contactinput5" name="title">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="contactinput5">زیر عنوان</label>
                                        <input class="form-control border-primary" type="text" placeholder="زیر عنوان"
                                               id="contactemail5" name="sub_title">
                                    </div>
                                </div>
                            </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="companyinput1" style="margin-top: 20px">link</label>
                                        <fieldset class="form-group">
                                            <input type="text" id="company-column" class="form-control" name="link"
                                                   placeholder="link">
                                        </fieldset>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-6 col-md-6 col-6 mb-1">
                                <fieldset class="form-group">
                                    <div class="col mb-1">
                                        <label>عکس</label>
                                    </div>
                                    <img id="companyLogo" data-type="editable" height="200px" width="200px"/>
                                </fieldset>
                            </div>

                            <div class="form-group">
                                <label>توضیحات</label>
                                <textarea id="description" rows="5" class="form-control"
                                          name="description"
                                          placeholder="توضیحات "></textarea>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="companyinput8">محتوا</label>
                                    <textarea id="companyinput8" rows="10" class="form-control"
                                              name="content" placeholder="محتوا"></textarea>
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

@stop

@section('script')
    <script src="/dashboard/app-assets/js/scripts/forms/select/form-select2.min.js"></script>
    <script src="/dashboard/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content', {
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
