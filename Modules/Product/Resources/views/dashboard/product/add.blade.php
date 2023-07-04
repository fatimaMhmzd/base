@extends('dashboard.layoute.total')

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
                                            <label  style="margin-top: 20px">انتخاب گروهبندی</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="basicSelect" name="product_group_id"  id="group"
                                                        onchange="getData()">
                                                    @foreach($all as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label  style="margin-top: 20px">عنوان</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="first-name-column" class="form-control" placeholder="عنوان" name="title">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label  style="margin-top: 20px">زیر عنوان</label>
                                            <fieldset class="form-group">
                                                <input type="text" id="last-name-column" class="form-control" placeholder="زیر عنوان" name="sub_title">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="companyinput1" style="margin-top: 20px">عکس اصلی</label>
                                                <fieldset class="form-group">
                                                    <input type="file" name="file" class="form-control-file"
                                                           id="exampleInputFile">
                                                </fieldset>
                                            </div>
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
                                                               name="sliderimg[]">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-12">
                                                    <button type="button" class="btn btn-danger mt-3"
                                                            onclick="deleteRow(0)">delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12">
                                            <button type="button" class="btn btn-primary w-100" onclick="addRow()">
                                                add row
                                            </button>

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

        function getData() {

            //var firstGroupId = document.getElementById('group').value;
            var firstGroupId = $('#group').val();

            $.ajax({
                url: "/admin/getSubGroup/" + firstGroupId,

                type: 'GET',
                success: function (res) {

                    // document.getElementById('subGroup').innerHTML = res;

                    $('#subGroup').html(res)


                }
            });


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
                                                                   name="sliderimg[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-12">
                                                        <button type="button" class="btn btn-danger mt-3" onclick="deleteRow(` + counter + `)">delete</button>
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

@endsection