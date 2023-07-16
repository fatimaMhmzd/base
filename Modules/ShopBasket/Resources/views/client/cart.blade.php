@extends('client.layout.total')
@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">سبد خرید<span>فروشگاه</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('indexClient')}}">خانه</a></li>
                    <li class="breadcrumb-item"><a href="{{route('shop_storePageClient')}}">فروشگاه</a></li>
                    <li class="breadcrumb-item active" aria-current="page">سبد خرید</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                <tr>
                                    <th>محصول</th>
                                    <th>قیمت</th>
                                    <th>تعداد</th>
                                    <th>مجموع</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($cart->part as $item)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="/{{$item->product->image[0]->url}}"
                                                     alt="تصویر محصول">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{$item->product->title}}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{$item->last_price}}</td>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input type="number" class="form-control" value="1" min="1" max="10"
                                                   step="1" data-decimals="0" required>
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col">{{$item->total_price}}</td>
                                    <td class="remove-col"><button class="btn-remove"><i
                                                class="icon-close"></i></button></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table><!-- End .table table-wishlist -->

                            <div class="cart-bottom">
                                <div class="cart-discount">
                                    <form action="#">
                                        <div class="input-group">
                                            <input type="text" class="form-control" required placeholder="کد تخفیف">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary-2" type="submit"><i
                                                        class="icon-long-arrow-left"></i></button>
                                            </div><!-- .End .input-group-append -->
                                        </div><!-- End .input-group -->
                                    </form>
                                </div><!-- End .cart-discount -->

                                <a href="#" class="btn btn-outline-dark-2"><span>به روز رسانی سبد خرید</span><i
                                        class="icon-refresh"></i></a>
                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">جمع سبد خرید</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                    <tr class="summary-subtotal">
                                        <td>جمع کل سبد خرید : </td>
                                        <td class="text-left">{{$cart->total_part_price}} تومان</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>شیوه ارسال : </td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping"
                                                       class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">ارسال
                                                    رایگان</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td class="text-left">0,000 تومان</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="standart-shipping" name="shipping"
                                                       class="custom-control-input">
                                                <label class="custom-control-label" for="standart-shipping">پست
                                                    سفارشی :</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td class="text-left">10,000 تومان</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="express-shipping" name="shipping"
                                                       class="custom-control-input">
                                                <label class="custom-control-label" for="express-shipping">پست
                                                    پیشتاز :</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td class="text-left">20,000 تومان</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-shipping-estimate">
                                        <td>آدرس<br> <a href="dashboard.html">تغییر آدرس</a></td>
                                        <td>&nbsp;</td>
                                    </tr><!-- End .summary-shipping-estimate -->

                                    <tr class="summary-total">
                                        <td>مبلغ قابل پرداخت :</td>
                                        <td class="text-left">{{$cart->total_amount}} تومان</td>
                                    </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="{{route('shop_checkoutPageClient')}}" class="btn btn-outline-primary-2 btn-order btn-block">رفتن
                                    به صفحه پرداخت</a>
                            </div><!-- End .summary -->

                            <a href="{{route('shop_storePageClient')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>ادامه
                                        خرید</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->


@endsection
