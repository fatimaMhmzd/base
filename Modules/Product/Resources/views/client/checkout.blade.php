@extends('client.layout.total')
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">صفحه پرداخت<span>فروشگاه</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('indexClient')}}">خانه</a></li>
                <li class="breadcrumb-item"><a href="{{route('shop_storePageClient')}}">فروشگاه</a></li>
                <li class="breadcrumb-item active" aria-current="page">صفحه پرداخت</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="checkout-discount">
                    <form action="#" >
                        <input type="text" class="form-control" required id="checkout-discount-input">
                        <label for="checkout-discount-input" class="text-truncate">کد تخفیف دارید؟ <span>برای
                                        وارد کردن کد تخفیف خود اینجا کلیک کنید</span></label>
                    </form>
                </div><!-- End .checkout-discount -->
                <form class="form" method="post" action="{{route('shop_basket_store')}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">جزئیات صورت حساب</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>نام *</label>
                                    <input type="text" class="form-control" name="name" required @if(\Illuminate\Support\Facades\Auth::user() and Auth::user()->name) value="{{\Illuminate\Support\Facades\Auth::user()->name}}" @endif>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>نام خانوادگی *</label>
                                    <input type="text" class="form-control" name="family" required @if(\Illuminate\Support\Facades\Auth::user() and Auth::user()->family) value="{{\Illuminate\Support\Facades\Auth::user()->family}}" @endif>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>نام شرکت (اختیاری)</label>
                            <input type="text" class="form-control" name="company">

                            <label>کشور *</label>
                            <select class="form-control" name="country_id"  onchange="getProvince()" id="country">
                                @foreach($data->countries as $country)
                                    <option value="{{$country->id}}">{{$country->fa_name}}({{$country->en_name}})</option>
                                @endforeach
                            </select>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>شهر *</label>
                                    <select class="form-control" name="province_id" id="province">

                                    </select>

                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>شهرستان *</label>
                                    <select class="form-control" name="city_id" id="city">

                                    </select>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>خیابان *</label>
                                    <input type="text" class="form-control" placeholder="نام خیابان و پلاک" name="address"
                                           required>

                                </div><!-- End .col-sm-12 -->

                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>کد پستی *</label>
                                    <input type="text" class="form-control" required name="post_code">
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>تلفن *</label>
                                    <input type="tel" class="form-control" required name="tel">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->


                            <label>توضیحات (اختیاری)</label>
                            <textarea class="form-control" cols="30" rows="4" name="description"
                                      placeholder="شما میتوانید توضیحات اضافی خود را اینجا بنویسید"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">سفارش شما</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                    <tr>
                                        <th>محصول</th>
                                        <th class="text-left">جمع</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if($data->factor)
                                    @foreach($data->factor->part as $part)
                                    <tr>
                                        <td><a href="#">{{$part->product->title}}</a></td>
                                        <td class="text-left">{{$part->total_price}} تومان</td>
                                    </tr>
                                    @endforeach

                                    <tr class="summary-subtotal">
                                        <td>جمع سبد خرید</td>
                                        <td class="text-left">{{$data->factor->total_part_price}} تومان</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr>
                                        <td>شیوه ارسال : </td>
                                        <td class="text-left">ارسال رایگان</td>
                                    </tr>
                                    <tr class="summary-total">
                                        <td>مبلغ قابل پرداخت :</td>
                                        <td class="text-left">{{$data->factor->total_amount}} تومان</td>
                                    </tr><!-- End .summary-total -->
                                    </tbody>
                                    @endif
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="card-header" id="heading-1">
                                            <h2 class="card-title">
                                                <a role="button" data-toggle="collapse" href="#collapse-1"
                                                   aria-expanded="true" aria-controls="collapse-1">
                                                    درگاه بانک ملت
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1"
                                             data-parent="#accordion-payment">
                                            <div class="card-body">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                                ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                                                سادگی نامفهوم.
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-2">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                       href="#collapse-2" aria-expanded="false"
                                                       aria-controls="collapse-2">
                                                        درگاه شاپرک
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-2" class="collapse" aria-labelledby="heading-2"
                                                 data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوملورم ایپسوم متن
                                                    ساختگی با تولید سادگی نامفهوم.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-3">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                       href="#collapse-3" aria-expanded="false"
                                                       aria-controls="collapse-3">
                                                        زرین پال <small class="float-left paypal-link">زرین پال
                                                            چیست؟</small>
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-3" class="collapse" aria-labelledby="heading-3"
                                                 data-parent="#accordion-payment">
                                                <div class="card-body">لورم ایپسوم متن ساختگی با تولید سادگی
                                                    نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-4">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                       href="#collapse-4" aria-expanded="false"
                                                       aria-controls="collapse-4">
                                                        واریز بانک
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-4" class="collapse" aria-labelledby="heading-4"
                                                 data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم
                                                    متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با
                                                    تولید سادگی نامفهوم.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-5">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                       href="#collapse-5" aria-expanded="false"
                                                       aria-controls="collapse-5">
                                                        کارت به کارت
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-5" class="collapse" aria-labelledby="heading-5"
                                                 data-parent="#accordion-payment">
                                                <div class="card-body"> لورم ایپسوم متن ساختگی با تولید سادگی
                                                    نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                    </div><!-- End .accordion -->

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">ثبت</span>
                                        <span class="btn-hover-text">پرداخت</span>
                                    </button>
                                </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@stop
@section('script')
    <script>
        getProvince()
        $('#country').on('change', function() {
            getProvince()

        });
        $('#province').on('change', function() {
            getCity()

        });


        function getProvince() {

            var countryId = $('#country').val();
            var url = '{{ route("dashboard_location_province_all", ":id") }}';
            url = url.replace(':id', countryId);
            var input =``;
            $.ajax({
                url: url,
                type: 'GET',
                success: function (res) {
                    console.log(res)
                    for(var i = 0 ; i < res.length ; i++){
                        input += ` <option value="`+res[i]['id']+`">`+res[i]['fa_name']+`</option>`
                    }
                    $('#province').html(input)
                    getCity()


                }
            });


        }

        function getCity() {
            var provinceId = $('#province').val();
            var url = '{{ route("dashboard_location_city_all", ":id") }}';
            url = url.replace(':id', provinceId);
            var input =``;
            $.ajax({
                url: url,
                type: 'GET',
                success: function (res) {
                    console.log(res)
                    for(var i = 0 ; i < res.length ; i++){
                        input += ` <option value="`+res[i]['id']+`">`+res[i]['fa_name']+`</option>`
                    }
                    $('#city').html(input)


                }

            });


        }


    </script>
    @endsection
