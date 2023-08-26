@extends('dashboard.layoute.total')

@section('style')

    <link rel="stylesheet" href="/dashboard/datatable/css/font-awesome.min.css">

@stop
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">بیشترین بازدید در ماه گذشته</h4>
                                </div>
                                <div class="card-content mt-2">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <th>محصول</th>
                                                <th>تعداد بازدید</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data->lastMonth as $month)
                                                <tr>
                                                    <th> <a href="{{route('shop_productDetail', $month->slug)}}">{{$month->product}}</a></th>
                                                    <td>{{$month->visit}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">بیشترین بازدید در هفته گذشته</h4>
                                </div>
                                <div class="card-content mt-2">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <th>محصول</th>
                                                <th>تعداد بازدید</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data->lastWeek as $week)
                                                <tr>
                                                    <th> <a href="{{route('shop_productDetail', $week->slug)}}">{{$week->product}}</a></th>
                                                    <td>{{$month->visit}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">بیشترین بازدید در روز گذشته</h4>
                                </div>
                                <div class="card-content mt-2">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <th>محصول</th>
                                                <th>تعداد بازدید</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data->yesterday as $yester)
                                            <tr>
                                                <th> <a href="{{route('shop_productDetail', $yester->slug)}}">{{$yester->product}}</a></th>
                                                <td>{{$month->visit}}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop


@section('script')


@endsection
