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
                        <h4 class="card-title">ویژگی محصول</h4>
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
                            <form class="form" method="post" action="{{route('dashboard_product_property_store')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <input type="number" value="{{$productId}}" name="product_id" hidden>
                                        <div class="col-md-6 col-12">
                                            <label  style="margin-top: 20px">انتخاب واحد</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="unit" name="unit_id"  id="group"
                                                        onchange="getData()">
                                                    <option value="0">انتخاب کنید</option>
                                                    @foreach($unit as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label  style="margin-top: 20px">انتخاب اندازه</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="size"  name="size_id">
                                                    <option value="0">انتخاب کنید</option>

                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <label  style="margin-top: 20px">انتخاب رنگ بندی</label>
                                            <fieldset class="form-group">
                                                <select class="form-control"  name="color_id">
                                                    <option value="0">انتخاب کنید</option>
                                                    @foreach($color as $item)
                                                        <option value="{{$item->id}}" style="background-color: {{$item->code}};">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <label  style="margin-top: 20px">قیمت</label>
                                            <fieldset class="form-group">
                                                <input type="number" id="last-name-column" class="form-control" placeholder="قیمت" name="price">

                                            </fieldset>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <label  style="margin-top: 20px">موجودی </label>
                                            <fieldset class="form-group">
                                                <input type="number" id="last-name-column" class="form-control" placeholder="موجودی " name="available">

                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label  style="margin-top: 20px">وضعیت</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" name="status">
                                                    <option value="1">موجود</option>
                                                    <option value="2">عدم موجودی</option>

                                                </select>
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

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h4 class="card-title">لیست محصولات</h4></div>
                    <div class="card-content">
                        <div class="card-body">

                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">

                                    </button>
                                    <strong></strong> {{ Session::get('message', '') }}
                                </div>
                            @endif


                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>سایز</th>
                                    <th>رنگ</th>
                                    <th>قیمت</th>
                                    <th>موجودی</th>
                                    <th>وضعیت</th>
                                    <th>توضیحات</th>
                                    <th>عکس</th>
                                    <th width="100px">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('script')

    <script src="/dashboard/datatable/ajax.js"></script>
    <script src="/dashboard/datatable/jquery.validate.js"></script>
    <script src="/dashboard/datatable/jquery.dataTables.min.js"></script>
    <script src="/dashboard/datatable/bootstrap.min.js"></script>
    <script src="/dashboard/datatable/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function () {

            var table = $('.data-table').DataTable({
                "oLanguage": {
                    "sUrl": "/dashboard/datatable/Persian.json"
                },
                "pageLength": 25,
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard_product_property_ajax',$productId) }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'size', name: 'size'},
                    {data: 'color', name: 'color', orderable: false, searchable: false},
                    {data: 'price', name: 'price'},
                    {data: 'available', name: 'available'},
                    {data: 'status', name: 'status'},
                    {data: 'description', name: 'description'},
                    {data: 'image', name: 'image', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        });
    </script>

    <script>

        function getData() {

            //var firstGroupId = document.getElementById('group').value;
            var unitId = $('#unit').val();

            $.ajax({
                url: "/dashboard/size/getSizeByUnit?unitId=" + unitId,

                type: 'GET',
                success: function (res) {
                    var result = ``
                    for (var i = 0 ; i < res.length ; i++){
                        result += `<option value="`+res[i]['id']+`">`+res[i]['title']+`</option>`

                    }

                    // document.getElementById('subGroup').innerHTML = res;

                    $('#size').html(result)


                }
            });


        }

    </script>


@endsection
