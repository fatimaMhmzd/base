@extends('dashboard.layoute.total')
@section('link')
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/vendors/css/forms/select/select2.min.css">
@endsection
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">افزودن محصول</h4>
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
                            <form class="form" method="post" action="{{route('dashboard_product_store')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">انتخاب گروهبندی</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="basicSelect" name="product_group_id"
                                                        id="group">
                                                    @foreach($group as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>

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
                                            <label style="margin-top: 20px">برند</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="برند" name="brand">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">عنوان کامل</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="عنوان کامل" name="full_title">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">قیمت سازمانی</label>
                                            <fieldset class="form-group">
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="قیمت" name="price">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">قیمت با تخفیف </label>
                                            <fieldset class="form-group">
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="قیمت با تخفیف " name="off_price">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">تخفیف </label>
                                            <fieldset class="form-group">
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="تخفیف " name="off">

                                            </fieldset>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">موجودی </label>
                                            <fieldset class="form-group">
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="موجودی " name="available">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">لینک </label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="لینک " name="link">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">کلمه کلیدی </label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="کلمه کلیدی" name="key_word">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">توضیحات سـو</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="توضیحات سـو" name="seo_description">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">طول</label>
                                            <fieldset class="form-group">
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="طول" name="length">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">عرض</label>
                                            <fieldset class="form-group">
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="عرض" name="width">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">ارتفاع</label>
                                            <fieldset class="form-group">
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="ارتفاع" name="height">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">وزن</label>
                                            <fieldset class="form-group">
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="وزن" name="weight">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">وزن با بسته بندی</label>
                                            <fieldset class="form-group">
                                                <input type="number" id="last-name-column" class="form-control"
                                                       placeholder="وزن با بسته بندی " name="weight_with_packaging">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">واحد وزن</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="basicSelect" name="unit_weight">
                                                    @foreach($unit as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>

                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">وضعیت</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="وضعیت " name="status">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">بارکد</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control"
                                                       placeholder="بارکد " name="barcode">

                                            </fieldset>
                                        </div>


                                        <div class="col-xl-12 col-md-12 col-12 mb-1">
                                            <fieldset class="form-group">
                                                <div class="col mb-1">
                                                    <label>عکس اصلی</label>
                                                </div>

                                                <img id="companyLogo" data-type="editable" height="200px"
                                                     width="200px"/>


                                            </fieldset>
                                        </div>
                                        <div class="col-12" id="sliderArea">
                                            <div class="row" id="location0">
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="form-group">
                                                        <p class="text-bold-600 font-medium-2">
                                                            عکس اسلایدر
                                                        </p>
                                                        <input type="file" class="form-control"
                                                               placeholder="عکس اسلایدر"
                                                               name="file[]">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-12 text-center">
                                                    <button type="button" class="btn btn-danger mt-3"
                                                            onclick="deleteRow(0)">حذف
                                                    </button>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-12 mb-1">
                                            <button type="button" class="w-100 btn btn-primary mt-3" onclick="addRow()">
                                                افزودن ردیف اسلایدر
                                            </button>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="companyinput8">توضیحات کوتاه </label>
                                                <textarea id="companyinput8" rows="5" class="form-control"
                                                          name="short_description"
                                                          placeholder="توضیحات "></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="companyinput8">توضیحات بلند </label>
                                                <textarea id="long_description" rows="5" class="form-control"
                                                          name="long_description"
                                                          placeholder="توضیحات "></textarea>
                                            </div>
                                        </div>


                                        <div class="col-12" id="pricearea">
                                            <div class="row" id="priceloc0">
                                                <div class="col-xl-4 col-lg-12">
                                                    <div class="form-group">
                                                        <label style="margin-top: 20px">تعداد خرید</label>
                                                        <fieldset class="form-group">
                                                            <input type="number" class="form-control"
                                                                   placeholder="تعداد خرید"
                                                                   name="numberarray[]">
                                                        </fieldset>


                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-12">
                                                    <label style="margin-top: 20px">قیمت به ازای خرید</label>
                                                    <fieldset class="form-group">
                                                        <input type="number" class="form-control"
                                                               placeholder="قیمت به ازای خرید"
                                                               name="pricearray[]">
                                                    </fieldset>

                                                </div>
                                                <div class="col-xl-4 col-lg-12 text-center">
                                                    <button type="button" class="btn btn-danger mt-3"
                                                            onclick="deleteRowPrice(0)">حذف
                                                    </button>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <button type="button" class="btn btn-primary mt-3 w-100"
                                                    onclick="addPrice()">
                                                افزودن ردیف جدید برای قیمت گذاری
                                            </button>
                                        </div>
                                        <section class="custom-checkbox">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">تنظیمات سفارشی نمایش محصول در صفحه ی اصلی</h4>
                                                        </div>
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <ul class="list-unstyled mb-0">
                                                                    @foreach($suggests as $suggest)
                                                                    <li class="d-inline-block mr-2">
                                                                        <fieldset>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" value="{{$suggest->id}}" name="suggest[]" id="customCheck{{$suggest->id}}">
                                                                                <label class="custom-control-label" for="customCheck{{$suggest->id}}">{{$suggest->title}}</label>
                                                                            </div>
                                                                        </fieldset>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
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
    <script>

        function getData() {

            //var firstGroupId = document.getElementById('group').value;
            var unitId = $('#unit').val();

            $.ajax({
                url: "/dashboard/size/getSizeByUnit?unitId=" + unitId,

                type: 'GET',
                success: function (res) {
                    var result = ``
                    for (var i = 0; i < res.length; i++) {
                        result += `<option value="` + res[i]['id'] + `">` + res[i]['title'] + `</option>`

                    }

                    // document.getElementById('subGroup').innerHTML = res;

                    $('#size').html(result)


                }
            });


        }

    </script>


    <script>
        counterp = 1;

        function addPrice() {

            var node = `
<div class="col-xl-4 col-lg-12">
                                                    <div class="form-group">
                                                        <label  style="margin-top: 20px">تعداد خرید</label>
                                                        <fieldset class="form-group">
                                                            <input type="number" class="form-control"
                                                                   placeholder="تعداد خرید"
                                                                   name="numberarray[]">
                                                        </fieldset>


                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-12">
                                                    <label  style="margin-top: 20px">قیمت به ازای خرید</label>
                                                    <fieldset class="form-group">
                                                        <input type="number" class="form-control"
                                                               placeholder="قیمت به ازای خرید"
                                                               name="pricearray[]">
                                                    </fieldset>

                                                </div>
                                                <div class="col-xl-4 col-lg-12 text-center">
                                                    <button type="button" class="btn btn-danger mt-3"
                                                            onclick="deleteRowPrice(` + counterp + `)">حذف
                                                    </button>

                                                </div>`

            var divData = document.createElement("div");

            divData.id = 'priceloc' + counterp
            divData.className = 'row'

            divData.innerHTML = node;


            document.getElementById("pricearea").appendChild(divData)
            counterp++
        }


        function deleteRowPrice(index) {

            var idd = 'priceloc' + index

            document.getElementById(idd).innerHTML = ''
        }

    </script>
    <script>
        counter = 1;

        function addRow() {

            var node = `
                                                    <div class="col-xl-6 col-lg-12">
                                                        <div class="form-group">
                                                            <p class="text-bold-600 font-medium-2">
                                                                عکس اسلایدر
                                                            </p>
                                                            <input type="file" class="form-control"
                                                                   placeholder="عکس اسلایدر"
                                                                   name="file[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-12  text-center">
                                                        <button type="button" class="btn btn-danger mt-3" onclick="deleteRow(` + counter + `)">حذف</button>
                                                    </div>
                                                `

            var divData = document.createElement("div");

            divData.id = 'location' + counter
            divData.className = 'row'

            divData.innerHTML = node;


            document.getElementById("sliderArea").appendChild(divData)
            counter++
        }


        function deleteRow(index) {

            var idd = 'location' + index

            document.getElementById(idd).innerHTML = ''
        }

    </script>
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
                    .attr('name', 'file[]')
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
