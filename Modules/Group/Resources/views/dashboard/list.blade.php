@extends('dashboard.layoute.total')

@section('style')

    <link rel="stylesheet" href="/dashboard/datatable/css/font-awesome.min.css">

@stop
@section('content')

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h4 class="card-title">لیست گروهبندی وبلاگ</h4></div>
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
                                    <th>عنوان</th>
                                    <th>زیرعنوان</th>
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
                ajax: "{{ route('dashboard_group_ajax') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    {data: 'sub_title', name: 'sub_title'},
                    {data: 'image', name: 'image', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        });
    </script>

@endsection
