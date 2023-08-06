@extends('dashboard.layoute.total')

@section('style')

    <link rel="stylesheet" href="/dashboard/datatable/css/font-awesome.min.css">

@stop
@section('content')

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h4 class="card-title">لیست نظرات</h4></div>
                    <div class="card-content">
                        <div class="card-body">

                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">

                                    </button>
                                    <strong></strong> {{ Session::get('message', '') }}
                                </div>
                            @endif
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام کاربری</th>
                                        <th>شماره موبایل</th>
                                        <th>نظر</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <th scope="row">{{$loop->index + 1}}</th>
                                            <td>{{$comment->user->username}}</td>
                                            <td>{{$comment->user->mobile}}</td>
                                            <td>{{$comment->content}}</td>
                                            <td><div class="btn-group">
                                                    <div class="dropdown">
                                                        <button class="btn btn-flat-primary dropdown-toggle" type="button" id="dropdownMenuButton100"
                                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$comment->status_comment}}</button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton100">
                                                            @foreach($comment->status_comment_title as $title)
                                                            <a class="dropdown-item" href="/dashboard/product/statusComments/{{$comment->id}}/{{$loop->index}}">{{$title}}</a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div></td>
                                            <td><a href="{{route('dashboard_product_deleteComments', $comment->id)}}" class="round"><i class="fa fa-trash danger"></i></a> </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
