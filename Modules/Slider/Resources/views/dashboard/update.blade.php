@extends('dashboard.layoute.total')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">بروزرسانی اسلایدر </h4>
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
                            <form class="form" method="post" action="{{route('dashboard_slider_update' , $data->id)}}"
                                  enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label  style="margin-top: 20px">صفحه ی مربوطه</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="basicSelect" name="page_id">
                                                    @foreach($allPage as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label  style="margin-top: 20px">عنوان</label>
                                                <fieldset class="form-group">
                                                    <input type="text"  class="form-control" placeholder="عنوان" name="title" value="{{$data->title}}">
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label  style="margin-top: 20px"> زیر عنوان</label>
                                                <fieldset class="form-group">
                                                    <input type="text" id="last-name-column" class="form-control" placeholder="زیر عنوان" name="sub_title1">
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label  style="margin-top: 20px"> زیر عنوان</label>
                                                <fieldset class="form-group">
                                                    <input type="text" id="last-name-column" class="form-control" placeholder="زیر عنوان" name="sub_title2">
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label  style="margin-top: 20px"> زیر عنوان</label>
                                                <fieldset class="form-group">
                                                    <input type="text" id="last-name-column" class="form-control" placeholder="زیر عنوان" name="sub_title3">
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label  style="margin-top: 20px"> زیر عنوان</label>
                                                <fieldset class="form-group">
                                                    <input type="text" id="last-name-column" class="form-control" placeholder="زیر عنوان" name="sub_title4">
                                                </fieldset>
                                            </div>
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
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="companyinput1" style="margin-top: 20px">link</label>
                                                <fieldset class="form-group">
                                                    <input type="text" id="company-column" class="form-control" name="link" placeholder="link">
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


                                        <!--                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                                    <div class="form-group">
                                                                                        <label for="companyinput8">محتوا</label>
                                                                                        <textarea id="companyinput8" rows="10" class="form-control"
                                                                                                  name="content" placeholder="محتوا"></textarea>
                                                                                    </div>
                                                                                </div>-->

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
