@extends('client.layout.total')
@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">داشبورد<span>فروشگاه</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('indexClient')}}">خانه</a></li>
                    <li class="breadcrumb-item"><a href="{{route('shop_storePageClient')}}">فروشگاه</a></li>
                    <li class="breadcrumb-item active" aria-current="page">داشبورد</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-4 col-lg-3">
                            <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab"
                                       href="#tab-dashboard" role="tab" aria-controls="tab-dashboard"
                                       aria-selected="true">داشبورد</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders"
                                       role="tab" aria-controls="tab-orders" aria-selected="false">سفارشات</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address"
                                       role="tab" aria-controls="tab-address" aria-selected="false">آدرس</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account"
                                       role="tab" aria-controls="tab-account" aria-selected="false">جزئیات حساب
                                        کاربری</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">خروج از حساب کاربری</a>
                                </li>
                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel"
                                     aria-labelledby="tab-dashboard-link">
                                    <p>سلام <span class="font-weight-normal text-dark">کاربر</span>
                                        <br>
                                        شما در اینجا میتوانید <a href="#tab-orders"
                                                                 class="tab-trigger-link link-underline">سفارشات خود را
                                            ببینید</a>، وضعیت
                                        ارسال <a href="#tab-address" class="tab-trigger-link">سفارشات خود را مشاهده
                                            کنید وآدرس خود را تغییر دهید</a>، و همچنین <a href="#tab-account"
                                                                                          class="tab-trigger-link">می
                                            توانید رمز عبور یا جزئیات حساب کاربری خود را
                                            ویرایش کنید </a>.</p>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-orders" role="tabpanel"
                                     aria-labelledby="tab-orders-link">
                                    @if(count($data->myOrder) == 0)
                                        <p>سفارش جدیدی وجود ندارد</p>
                                    @else
                                        @foreach($data->myOrder as $item)
                                            <div class="accordion" id="accordion-1">
                                                <div class="card-header" id="heading-1">
                                                    <div class="trackorder-content col-md-12">
                                                        <div class="trackorder-inner">
                                                            <div class="trackorder-top">
                                                                <div class="trackorder-detail">
                                                                    <!--                                                            <div>بازه زمانی تحویل سفارش : 1401/09/20 - 12:00 تا 15:00
                                                                                                                                </div>-->
                                                                    <div>نام تحویل گیرنده سفارش :
                                                                        <span>{{$item->address->name . $item->address->family}}</span>
                                                                    </div>
                                                                </div>
                                                                <a class="collapsed" role="button"
                                                                   data-toggle="collapse"
                                                                   href="#collapse-1" aria-expanded="false"
                                                                   aria-controls="collapse-1">
                                                                    <h2 class="trackorder-id">سفارش {{$item->id}}#</h2>
                                                                </a>
                                                            </div>
                                                            <div class="trackorder-bottom">
                                                                <div class="trackorder-progress">
                                                                    <ul class="trackorder-progressbar">
                                                                        <li class="trackorder-step active">
                                                                    <span class="track-icon">
                                                                        <img
                                                                            src="/assets/images/track order/processed.png"
                                                                            alt="track_order">
                                                                    </span>
                                                                            <span class="progressbar-track"></span>
                                                                            <span class="track-title">سفارش<br>پردازش شد</span>
                                                                        </li>
                                                                        <li class="trackorder-step @if($item->status == 1 or $item->status == 2 or $item->status == 3 ) active  @endif">
                                                                    <span class="track-icon">
                                                                        <img
                                                                            src="/assets/images/track order/packing.png"
                                                                            alt="track_order">
                                                                    </span>
                                                                            <span class="progressbar-track"></span>
                                                                            <span class="track-title">سفارش<br>بسته بندی شد</span>
                                                                        </li>
                                                                        <li class="trackorder-step  @if($item->status == 2 or $item->status == 3) active  @endif">
                                                                    <span class="track-icon">
                                                                        <img
                                                                            src="/assets/images/track order/shipped.png"
                                                                            alt="track_order">
                                                                    </span>
                                                                            <span class="progressbar-track"></span>
                                                                            <span class="track-title">سفارش<br>ارسال شد</span>
                                                                        </li>
                                                                        <li class="trackorder-step  @if($item->status == 3) active  @endif">
                                                                    <span class="track-icon">
                                                                        <img
                                                                            src="/assets/images/track order/deliveried.png"
                                                                            alt="track_order">
                                                                    </span>
                                                                            <span class="progressbar-track"></span>
                                                                            <span class="track-title">سفارش<br>تحویل داده شد</span>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="collapse-1" class="collapse show" aria-labelledby="heading-1"
                                                     data-parent="#accordion-1">
                                                    <div class="card-body">
                                                        <div class="table-responsive-md">
                                                            <table class="invoice-table ">
                                                                <thead>
                                                                <tr>
                                                                    <th>شماره</th>
                                                                    <th>جزئیات آیتم</th>
                                                                    <th>تعداد</th>
                                                                    <th>قیمت</th>
                                                                    <th>مجموع</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($item->part as $part)
                                                                    <tr>
                                                                        <td>{{$loop->index}}</td>
                                                                        <td>
                                                                            <h3>
                                                                                {{$part->product->full_title}}
                                                                            </h3>
                                                                        </td>
                                                                        <td> {{$part->count}}</td>
                                                                        <td>{{$part->last_price}} تومان</td>
                                                                        <td>{{$part->total_price}} تومان</td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                            <div class="invoice-total">
                                                                <div class="row">
                                                                    <div class="col-md-4 offset-8">
                                                                        <div class="total-right">
                                                                            <ul>
                                                                                <li>
                                                                                    جمع فاکتور
                                                                                    <span>{{$item->total_part_price}} تومان</span>
                                                                                </li>
                                                                                <li>
                                                                                    مبلغ نهایی
                                                                                    <span>{{$item->total_amount}} تومان</span>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row print-bar justify-content-end">
                                                                <div class="col-md-6">
                                                                    <div class="printbar-right">
                                                                        <button id="printinvoice"
                                                                                class="btn btn-solid btn-md ">
                                                                            چاپ فاکتور
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- End .card-body -->
                                                </div><!-- End .collapse -->

                                            </div>
                                                @endforeach
                                                @endif
                                                <a href="{{route('shop_storePageClient')}}"
                                                   class="btn btn-outline-primary-2"><span>رفتن به
                                                فروشگاه</span><i class="icon-long-arrow-left"></i></a>
                                            </div><!-- .End .tab-pane -->

                                            <div class="tab-pane fade" id="tab-downloads" role="tabpanel"
                                                 aria-labelledby="tab-downloads-link">
                                                <p>دانلود جدیدی وجود ندارد</p>
                                                <a href="{{route('shop_storePageClient')}}"
                                                   class="btn btn-outline-primary-2"><span>رفتن به
                                                فروشگاه</span><i class="icon-long-arrow-left"></i></a>
                                            </div><!-- .End .tab-pane -->

                                            <div class="tab-pane fade" id="tab-address" role="tabpanel"
                                                 aria-labelledby="tab-address-link">
                                                @foreach($data->myAddress as $address)
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card card-dashboard">
                                                                <div class="card-body">
                                                                    <h3 class="card-title">آدرس شما</h3>
                                                                    <!-- End .card-title -->

                                                                    <p>{{$address->name.'-'.$address->family}}<br>
                                                                        {{$address->company}}<br>
                                                                        {{$address->province->fa_name}}
                                                                        -{{$address->city->fa_name}}
                                                                        <br>
                                                                        {{$address->address}}<br>
                                                                        {{$address->mobile}}<br>
                                                                    </p>
                                                                </div><!-- End .card-body -->
                                                            </div><!-- End .card-dashboard -->
                                                        </div><!-- End .col-lg-12 -->
                                                    </div>
                                                @endforeach
                                            </div><!-- .End .tab-pane -->

                                            <div class="tab-pane fade" id="tab-account" role="tabpanel"
                                                 aria-labelledby="tab-account-link">
                                                <form action="#">
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

                                                    <label>نام نمایش *</label>
                                                    <input type="text" class="form-control" required>
                                                    <small class="form-text">این نام در قسمت بازدیدها، نظرات و حساب
                                                        کاربری شما
                                                        نمایش داده می شود.</small>

                                                    <label>شماره موبایل *</label>
                                                    <input type="email" class="form-control" required>

                                                    <label>پسورد فعلی</label>
                                                    <input type="password" class="form-control">

                                                    <label>پسورد جدید</label>
                                                    <input type="password" class="form-control">

                                                    <label>تکرار پسورد جدید</label>
                                                    <input type="password" class="form-control mb-2">

                                                    <button type="submit" class="btn btn-outline-primary-2 float-right">
                                                        <span>ذخیره تغییرات</span>
                                                        <i class="icon-long-arrow-left"></i>
                                                    </button>
                                                </form>
                                            </div><!-- .End .tab-pane -->
                                </div>
                            </div><!-- End .col-lg-9 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .dashboard -->
            </div><!-- End .page-content -->
    </main><!-- End .main -->


    <div class="modal fade" id="address-modal" tabindex="-1" role="dialog" aria-hidden="true" data-bs-dismiss="modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <form action="#">
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

                        <label>نام کاربری *</label>
                        <input type="text" class="form-control" required>
                        <small class="form-text">این نام در قسمت بازدیدها، نظرات و حساب کاربری شما
                            نمایش داده می شود.</small>

                        <label>شماره موبایل *</label>
                        <input type="email" class="form-control" required>

                        <label>استان</label>
                        <input type="text" class="form-control">

                        <label>شهر</label>
                        <input type="text" class="form-control">

                        <label>آدرس</label>
                        <input type="text" class="form-control mb-2">

                        <label>کد پستی</label>
                        <input type="text" class="form-control mb-2">

                        <button type="submit" class="btn btn-outline-primary-2 float-right">
                            <span>ذخیره تغییرات</span>
                            <i class="icon-long-arrow-left"></i>
                        </button>
                    </form>

                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

@endsection
