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
                    <form action="#">
                        <input type="text" class="form-control" required id="checkout-discount-input">
                        <label for="checkout-discount-input" class="text-truncate">کد تخفیف دارید؟ <span>برای
                                        وارد کردن کد تخفیف خود اینجا کلیک کنید</span></label>
                    </form>
                </div><!-- End .checkout-discount -->
                <form action="#">
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">جزئیات صورت حساب</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>نام *</label>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>نام خانوادگی *</label>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>نام شرکت (اختیاری)</label>
                            <input type="text" class="form-control">

                            <label>کشور *</label>
                            <input type="text" class="form-control" required>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>شهر *</label>
                                    <input type="text" class="form-control" required>

                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>شهرستان *</label>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>خیابان *</label>
                                    <input type="text" class="form-control" placeholder="نام خیابان و پلاک"
                                           required>

                                </div><!-- End .col-sm-12 -->

                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>کد پستی *</label>
                                    <input type="text" class="form-control" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>تلفن *</label>
                                    <input type="tel" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>ایمیل </label>
                            <input type="email" class="form-control">



                            <label>توضیحات (اختیاری)</label>
                            <textarea class="form-control" cols="30" rows="4"
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
                                    <tr>
                                        <td><a href="#">کتونی ورزشی مخصوص دویدن رنگ بژ</a></td>
                                        <td class="text-left">84,000 تومان</td>
                                    </tr>

                                    <tr>
                                        <td><a href="#">سارافون آبی بلند</a></td>
                                        <td class="text-left">152,000 تومان</td>
                                    </tr>
                                    <tr class="summary-subtotal">
                                        <td>جمع سبد خرید</td>
                                        <td class="text-left">236,000 تومان</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr>
                                        <td>شیوه ارسال : </td>
                                        <td class="text-left">ارسال رایگان</td>
                                    </tr>
                                    <tr class="summary-total">
                                        <td>مبلغ قابل پرداخت :</td>
                                        <td class="text-left">236,000 تومان</td>
                                    </tr><!-- End .summary-total -->
                                    </tbody>
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

    @endsection
