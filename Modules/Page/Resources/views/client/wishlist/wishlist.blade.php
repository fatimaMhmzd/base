@extends('client.layout.total')
@section('content')

    <main class="main">

{{--SLIDER--}}
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">لیست علاقه مندی<span>فروشگاه</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index-1.html">خانه</a></li>
                    <li class="breadcrumb-item"><a href="#">فروشگاه</a></li>
                    <li class="breadcrumb-item active" aria-current="page">لیست علاقه مندی</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
{{--END SLIDER--}}

        <div class="page-content">
            <div class="container">

                <table class="table table-wishlist table-mobile">
                    <thead>
                    <tr>
                        <th>محصول</th>
                        <th>قیمت</th>
                        <th>وضعیت محصول</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="assets/images/products/table/product-1.jpg" alt="تصویر محصول">
                                    </a>
                                </figure>

                                <h3 class="product-title">
                                    <a href="#">کتونی ورزشی مخصوص دویدن رنگ بژ</a>
                                </h3><!-- End .product-title -->
                            </div><!-- End .product -->
                        </td>
                        <td class="price-col">84,000 تومان</td>
                        <td class="stock-col"><span class="in-stock">موجود</span></td>
                        <td class="action-col">
                            <div class="dropdown">
                                <button class="btn btn-block btn-outline-primary-2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-list-alt"></i>انتخاب گزینه ها
                                </button>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">گزینه 1</a>
                                    <a class="dropdown-item" href="#">گزینه 2</a>
                                    <a class="dropdown-item" href="#">گزینه 3</a>
                                </div>
                            </div>
                        </td>
                        <td class="remove-col text-left"><button class="btn-remove"><i
                                    class="icon-close"></i></button></td>
                    </tr>
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="assets/images/products/table/product-2.jpg" alt="تصویر محصول">
                                    </a>
                                </figure>

                                <h3 class="product-title">
                                    <a href="#">لباس زنانه آبی</a>
                                </h3><!-- End .product-title -->
                            </div><!-- End .product -->
                        </td>
                        <td class="price-col">76,000 تومان</td>
                        <td class="stock-col"><span class="in-stock">موجود</span></td>
                        <td class="action-col">
                            <button class="btn btn-block btn-outline-primary-2"><i
                                    class="icon-cart-plus"></i>افزودن به سبد خرید</button>
                        </td>
                        <td class="remove-col text-left"><button class="btn-remove"><i
                                    class="icon-close"></i></button></td>
                    </tr>
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="assets/images/products/table/product-3.jpg" alt="تصویر محصول">
                                    </a>
                                </figure>

                                <h3 class="product-title">
                                    <a href="#">کیف زنانه با بند زنجیری</a>
                                </h3><!-- End .product-title -->
                            </div><!-- End .product -->
                        </td>
                        <td class="price-col">52,000 تومان</td>
                        <td class="stock-col"><span class="out-of-stock">ناموجود</span></td>
                        <td class="action-col">
                            <button class="btn btn-block btn-outline-primary-2 disabled">ناموجود</button>
                        </td>
                        <td class="remove-col text-left"><button class="btn-remove"><i
                                    class="icon-close"></i></button></td>
                    </tr>
                    </tbody>
                </table><!-- End .table table-wishlist -->

            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->


@endsection
