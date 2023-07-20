@extends('dashboard.layoute.total')

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h4 class="card-title">افزودن شبکه اجتماعی </h4></div>
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
                            <form class="form" method="post" action="{{route('dashboard_social_media_store')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">عنوان</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="first-name-column" class="form-control"
                                                       placeholder="عنوان" name="title">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">زیر عنوان</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="زیر عنوان" name="sub_title">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">لینک</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="لینک" name="link">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">آدرس شبکه اجتماعی</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="آدرس شبکه اجتماعی" name="url">

                                            </fieldset>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-6 mb-1">
                                            <fieldset class="form-group">
                                                <div class="col mb-1">
                                                    <label>عکس</label>
                                                </div>
                                                <img id="companyLogo" data-type="editable" height="100px" width="100px"/>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="companyinput8">توضیحات </label>
                                                <textarea id="companyinput8" rows="5" class="form-control"
                                                          name="description"
                                                          placeholder="توضیحات "></textarea>
                                            </div>
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



@stop
@section('script')
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
