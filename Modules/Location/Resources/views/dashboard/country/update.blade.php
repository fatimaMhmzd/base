@extends('dashboard.layoute.total')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">بروزرسانی  اندازه </h4>
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
                            <form class="form" method="post" action="{{route('dashboard_location_country_update' , $data->id)}}"
                                  enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-body">
                                    <div class="row">

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
                                                    <input type="text" id="last-name-column" class="form-control" placeholder="نام انگلیسی کشور در صورت دلخواه" name="en_name" value="{{$data->en_name}}">
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
@endsection