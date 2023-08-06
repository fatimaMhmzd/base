@extends('dashboard.layoute.total')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">بروزرسانی شهرستان</h4>
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
                            <form class="form" method="post" action="{{route('dashboard_location_city_update' , $data->id)}}"
                                  enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">انتخاب کشور</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="country" name="country_id">
                                                    @foreach($country as $item)
                                                        <option @if($data->country_id == $item->id) selected @endif value="{{$item->id}}">{{$item->fa_name}}({{$item->en_name}})</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label style="margin-top: 20px">انتخاب استان</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="province" name="province_id">
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label  style="margin-top: 20px">عنوان فارسی</label>
                                                <fieldset class="form-group">
                                                    <input type="text"  class="form-control" placeholder="نام فارسی کشور" name="fa_name" value="{{$data->fa_name}}">
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label  style="margin-top: 20px">عنوان انگلیسی</label>
                                                <fieldset class="form-group">
                                                    <input type="text" id="last-name-column" class="form-control" placeholder="نام انگلیسی کشور در صورت دلخواه" name="en_name"  value="{{$data->en_name}}">
                                                </fieldset>
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
        getProvince()
        $('#country').on('change', function () {
            getProvince()

        });


        function getProvince() {
            var countryId = $('#country').val();
            var url = '{{ route("dashboard_location_province_all", ":id") }}';
            url = url.replace(':id', countryId);
            var input = ``;
            $.ajax({
                url: url,
                type: 'GET',
                success: function (res) {
                    console.log(res)
                    for (var i = 0; i < res.length; i++) {
                        if ({!! json_encode($data->province_id) !!} == res[i]['id']){
                        input += ` <option selected value="` + res[i]['id'] + `">` + res[i]['fa_name'] + `</option>`
                        }
                        else {
                            input += ` <option value="` + res[i]['id'] + `">` + res[i]['fa_name'] + `</option>`
                        }

                    }
                    $('#province').html(input)


                }
            });


        }


    </script>
@endsection
