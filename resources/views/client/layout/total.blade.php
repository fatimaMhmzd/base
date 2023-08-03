<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>فروشگاه صنایع دستی</title>
    <meta name="keywords" content="فروشگاه">
    <meta name="description" content="فروشگاه">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="/assets/images/icons/site.webmanifest">
    <link rel="mask-icon" href="/assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="/assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/skins/skin-demo-3.css">
    <link rel="stylesheet" href="/assets/css/demos/demo-3.css">
    <link rel="stylesheet" href="/sweetAlert/sweetalert2.min.css">

    @yield('style')

</head>

<body>
<div class="page-wrapper">
    <header class="header header-intro-clearance header-3">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <a href="tel_3A#"><i class="icon-phone"></i>تلفن تماس : {{setting()->phone }}</a>
                </div><!-- End .header-left -->

                <div class="header-right">

                    <ul class="top-menu">
                        <li>
                            <a href="#">لینک ها</a>
                            <ul>
<!--                                <li>
                                    <div class="header-dropdown">
                                        <a href="#">تومان</a>
                                        <div class="header-menu">
                                            <ul>
                                                <li><a href="#">دلار</a></li>
                                                <li><a href="#">تومان</a></li>
                                            </ul>
                                        </div>&lt;!&ndash; End .header-menu &ndash;&gt;
                                    </div>
                                </li>
                                <li>
                                    <div class="header-dropdown">
                                        <a href="#">فارسی</a>
                                        <div class="header-menu">
                                            <ul>
                                                <li><a href="#">انگلیسی</a></li>
                                                <li><a href="#">فرانسوی</a></li>
                                                <li><a href="#">ترکی استانبولی</a></li>
                                            </ul>
                                        </div>&lt;!&ndash; End .header-menu &ndash;&gt;
                                    </div>&lt;!&ndash; End .header-dropdown &ndash;&gt;
                                </li>-->
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <li><a href="{{ route('user_logout') }}">خروج</a></li>
                                @else
                                    <li><a href="#signin-modal" data-toggle="modal">ورود / ثبت نام</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                </div><!-- End .header-right -->

            </div><!-- End .container -->
        </div><!-- End .header-top -->

        <div class="header-middle">
            <div class="container">
                <div class="header-left">
                    <button class="mobile-menu-toggler">
                        <span class="sr-only">فهرست</span>
                        <i class="icon-bars"></i>
                    </button>

                    <a href="/" class="logo">
                        <img src="{{setting()->logo}}" alt="Molla Logo" width="105" height="25">
                    </a>
                </div><!-- End .header-left -->

                <div class="header-center">
                    <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                        <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                        <form  method="get" id="searchForm" action="{{route('shop_search')}}" enctype="multipart/form-data">
                            <div class="header-search-wrapper search-wrapper-wide">
                                <label for="q" class="sr-only">جستجو</label>
                                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                <input type="search" class="form-control" name="search" id="q"
                                       placeholder="جستجوی محصول ..." required>
                            </div><!-- End .header-search-wrapper -->
                        </form>
                    </div><!-- End .header-search -->
                </div>

                <div class="header-right">
                    <!--                    <div class="dropdown compare-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" data-display="static" title="مقایسه محصولات"
                           aria-label="Compare Products">
                            <div class="icon">
                                <i class="icon-random"></i>
                            </div>
                            <p>مقایسه</p>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="compare-products">
                                <li class="compare-product">
                                    <a href="#" class="btn-remove" title="حذف محصول"><i class="icon-close"></i></a>
                                    <h4 class="compare-product-title"><a href="product.html">گوشی سامسونگ مدل S9</a>
                                    </h4>
                                </li>
                                <li class="compare-product">
                                    <a href="#" class="btn-remove" title="حذف محصول"><i class="icon-close"></i></a>
                                    <h4 class="compare-product-title"><a href="product.html">گوشی سامسونگ مدل S8</a>
                                    </h4>
                                </li>
                            </ul>

                            <div class="compare-actions">
                                <a href="#" class="action-link">حذف همه</a>
                                <a href="{{route('page_compareClient')}}"
                                   class="btn btn-outline-primary-2"><span>مقایسه</span><i
                                        class="icon-long-arrow-left"></i></a>
                            </div>
                        </div>&lt;!&ndash; End .dropdown-menu &ndash;&gt;
                    </div>--><!-- End .compare-dropdown -->

                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="wishlist">
                            <a href="{{route('page_wishlistClient')}}" title="لیست محصولات مورد علاقه شما">
                                <div class="icon">
                                    <i class="icon-heart-o"></i>
                                    <span id="wishlist-count" class="wishlist-count badge">3</span>
                                </div>
                                <p>مورد علاقه</p>
                            </a>
                        </div>

                        <div class="dropdown cart-dropdown">
                            <a href="{{route('shop_cartPageClient')}}" class="dropdown-toggle" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count" id="cartCount">{{count(cartItems())}}</span>
                                </div>
                                <p>سبد خرید</p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products" id="cartList">
                                    @foreach(cartItems() as $item)
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="product.html">کتونی ورزشی مخصوص دویدن رنگ بژ</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                <span class="cart-product-qty">1 x </span>
                                                84,000 تومان
                                            </span>
                                            </div><!-- End .product-cart-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="/assets/images/products/cart/product-1.jpg" alt="product">
                                                </a>
                                            </figure>
                                            <a href="#" class="btn-remove" title="حذف محصول"><i class="icon-close"></i></a>
                                        </div>
                                    @endforeach

                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>مجموع</span>

                                    <span class="cart-total-price" id="cartTotal">0 تومان</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="{{route('shop_basket_show')}}" class="btn btn-primary">مشاهده سبد
                                        خرید</a>
                                    <a href="{{route('shop_checkoutPageClient')}}"
                                       class="btn btn-outline-primary-2"><span>پرداخت</span><i
                                            class="icon-long-arrow-left"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div>
                    @endif
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-middle -->

        <div class="header-bottom sticky-header">
            <div class="container">
                <div class="header-left">
                    <div class="dropdown category-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" data-display="static"
                           title="دسته بندی فروشگاه">
                            فهرست دسته بندی ها <i class="icon-angle-down"></i>
                        </a>

                        <div class="dropdown-menu">
                            <nav class="side-nav">
                                <ul class="menu-vertical sf-arrows">
                                    @if(count(allGroup()) > 0)
                                        @foreach(allGroup() as $group)
                                            @if($group->title != null)
                                                <li class="item-lead"><a href="{{route('shop_storePageClient',$group->slug)}}">{{$group->title}}</a></li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li class="item-lead"><a href="#">تخفیف های روزانه</a></li>
                                        <li class="item-lead"><a href="#">هدیه ها</a></li>
                                        <li><a href="#">تخت خواب</a></li>
                                        <li><a href="#">روشنایی</a></li>
                                        <li><a href="#">مبل</a></li>
                                        <li><a href="#">حافظه های ذخیره سازی</a></li>
                                        <li><a href="#">میز و صندلی</a></li>
                                        <li><a href="#">وسایل تزیینی </a></li>
                                        <li><a href="#">کابینت آشپزخانه</a></li>
                                        <li><a href="#">قهوه</a></li>
                                        <li><a href="#">لوازم تعمیرات </a></li>
                                    @endif
                                </ul><!-- End .menu-vertical -->
                            </nav><!-- End .side-nav -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .category-dropdown -->
                </div><!-- End .header-left -->

                <div class="header-center">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li class="megamenu-container active">
                                <a href="{{route('indexClient')}}" class="">خانه</a>
                                <!--                                <div class="megamenu demo">
                                                                    <div class="menu-col">
                                                                        <div class="menu-title">دمو خود را انتخاب کنید</div>&lt;!&ndash; End .menu-title &ndash;&gt;

                                                                        <div class="demo-list">
                                                                            <div class="demo-item">
                                                                                <a href="index-1.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/1.jpg);"></span>
                                                                                    <span class="demo-title">01 - فروشگاه مبلمان</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item">
                                                                                <a href="index-2.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/2.jpg);"></span>
                                                                                    <span class="demo-title">02 - فروشگاه مبلمان</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item">
                                                                                <a href="index-3.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/3.jpg);"></span>
                                                                                    <span class="demo-title">03 - فروشگاه لوازم الکترونیکی</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item">
                                                                                <a href="index-4.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/4.jpg);"></span>
                                                                                    <span class="demo-title">04 - فروشگاه لوازم الکترونیکی</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item">
                                                                                <a href="index-5.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/5.jpg);"></span>
                                                                                    <span class="demo-title">05 - فروشگاه مد و لباس</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item">
                                                                                <a href="index-6.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/6.jpg);"></span>
                                                                                    <span class="demo-title">06 - فروشگاه مد و لباس</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item">
                                                                                <a href="index-7.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/7.jpg);"></span>
                                                                                    <span class="demo-title">07 - فروشگاه مد و لباس</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item">
                                                                                <a href="index-8.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/8.jpg);"></span>
                                                                                    <span class="demo-title">08 - فروشگاه مد و لباس</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item">
                                                                                <a href="index-9.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/9.jpg);"></span>
                                                                                    <span class="demo-title">09 - فروشگاه مد و لباس</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item">
                                                                                <a href="index-10.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/10.jpg);"></span>
                                                                                    <span class="demo-title">10 - فروشگاه کفش</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-11.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/11.jpg);"></span>
                                                                                    <span class="demo-title">11 - فروشگاه مبل</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-12.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/12.jpg);"></span>
                                                                                    <span class="demo-title">12 - فروشگاه مُد</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-13.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/13.jpg);"></span>
                                                                                    <span class="demo-title">13 - بازار</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-14.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/14.jpg);"></span>
                                                                                    <span class="demo-title">14 - بازار تمام عرض</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-15.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/15.jpg);"></span>
                                                                                    <span class="demo-title">15 - مد و زیبایی</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-16.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/16.jpg);"></span>
                                                                                    <span class="demo-title">16 - مُد و زیبایی</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-17.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/17.jpg);"></span>
                                                                                    <span class="demo-title">17 - فروشگاه مُد و لباس</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-18.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/18.jpg);"></span>
                                                                                    <span class="demo-title">18 - فروشگاه مُد و لباس (با
                                                                                            سایدبار)</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-19.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/19.jpg);"></span>
                                                                                    <span class="demo-title">19 - فروشگاه بازی</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-20.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/20.jpg);"></span>
                                                                                    <span class="demo-title">20 - فروشگاه کتاب</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-21.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/21.jpg);"></span>
                                                                                    <span class="demo-title">21 - فروشگاه ورزشی</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-22.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/22.jpg);"></span>
                                                                                    <span class="demo-title">22 - فروشگاه ابزار</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-23.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/23.jpg);"></span>
                                                                                    <span class="demo-title">23 - -فروشگاه مد با نوبار سمت
                                                                                            راست</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-24.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/24.jpg);"></span>
                                                                                    <span class="demo-title">24 - فروشگاه ورزشی</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-25.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/25.jpg);"></span>
                                                                                    <span class="demo-title">25 - فروشگاه زیورآلات</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-26.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/26.jpg);"></span>
                                                                                    <span class="demo-title">26 - فروشگاه بازار</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-27.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/27.jpg);"></span>
                                                                                    <span class="demo-title">27 - فروشگاه مُد</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-28.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/28.jpg);"></span>
                                                                                    <span class="demo-title">28 - فروشگاه مواد غذایی</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-29.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/29.jpg);"></span>
                                                                                    <span class="demo-title">29 - فروشگاه تی شرت</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-30.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/30.jpg);"></span>
                                                                                    <span class="demo-title">30 - فروشگاه هدفون</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;

                                                                            <div class="demo-item hidden">
                                                                                <a href="index-31.html">
                                                                                        <span class="demo-bg"
                                                                                              style="background-image: url(assets/images/menu/demos/31.jpg);"></span>
                                                                                    <span class="demo-title">31 - فروشگاه یوگا</span>
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .demo-item &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .demo-list &ndash;&gt;

                                                                        <div class="megamenu-action text-center">
                                                                            <a href="demo.html"
                                                                               class="btn btn-outline-primary-2 view-all-demos"><span>مشاهده همه
                                                                                        دمو ها</span><i class="icon-long-arrow-left"></i></a>
                                                                        </div>&lt;!&ndash; End .text-center &ndash;&gt;
                                                                    </div>&lt;!&ndash; End .menu-col &ndash;&gt;
                                                                </div>-->
                                <!-- End .megamenu -->
                            </li>
                            <li>
                                <a href="{{route('shop_storePageClient')}}">فروشگاه</a>
                                {{--                                class="sf-with-ul"--}}
                                <!--                                <div class="megamenu megamenu-md">
                                                                    <div class="row no-gutters">
                                                                        <div class="col-md-8">
                                                                            <div class="menu-col">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="menu-title">فروشگاه با سایدبار</div>
                                                                                        &lt;!&ndash; End .menu-title &ndash;&gt;
                                                                                        <ul>
                                                                                            <li><a href="category-list.html">فروشگاه لیست</a></li>
                                                                                            <li><a href="category-2cols.html">فروشگاه 2 ستونه</a>
                                                                                            </li>
                                                                                            <li><a href="category.html">فروشگاه 3 ستونه</a></li>
                                                                                            <li><a href="category-4cols.html">فروشگاه 4 ستونه</a>
                                                                                            </li>
                                                                                            <li><a href="category-market.html"><span>فروشگاه
                                                                                                            بازار<span
                                                                                                            class="tip tip-new">جدید</span></span></a>
                                                                                            </li>
                                                                                        </ul>

                                                                                        <div class="menu-title">فروشگاه بدون سایدبار</div>
                                                                                        &lt;!&ndash; End .menu-title &ndash;&gt;
                                                                                        <ul>
                                                                                            <li><a href="category-boxed.html"><span>فروشگاه با حالت
                                                                                                            باکس<span
                                                                                                            class="tip tip-hot">ویژه</span></span></a>
                                                                                            </li>
                                                                                            <li><a href="category-fullwidth.html">فروشگاه تمام
                                                                                                    صفحه</a></li>
                                                                                        </ul>
                                                                                    </div>&lt;!&ndash; End .col-md-6 &ndash;&gt;

                                                                                    <div class="col-md-6">
                                                                                        <div class="menu-title">دسته بندی محصولات</div>
                                                                                        &lt;!&ndash; End .menu-title &ndash;&gt;
                                                                                        <ul>
                                                                                            <li><a href="product-category-boxed.html">دسته بندی
                                                                                                    محصولات با حالت باکس</a></li>
                                                                                            <li><a href="product-category-fullwidth.html"><span>دسته
                                                                                                            بندی محصولات تمام صفحه<span
                                                                                                            class="tip tip-new">جدید</span></span></a>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div class="menu-title">صفحات فروشگاه</div>
                                                                                        &lt;!&ndash; End .menu-title &ndash;&gt;
                                                                                        <ul>
                                                                                            <li><a href="cart.html">سبد خرید</a></li>
                                                                                            <li><a href="cart2.html">سبد خرید 2</a></li>
                                                                                            <li><a href="cart-empty.html">سبد خرید خالی</a></li>
                                                                                            <li><a href="checkout.html">پرداخت</a></li>
                                                                                            <li><a href="checkout2.html">پرداخت 2</a></li>
                                                                                            <li><a href="compare.html">مقایسه محصولات</a></li>
                                                                                            <li><a href="compare2.html">مقایسه محصولات 2</a></li>
                                                                                            <li><a href="wishlist.html">لیست علاقه مندی ها</a></li>
                                                                                            <li><a href="gift-cart.html">کارت هدیه</a></li>
                                                                                            <li><a href="dashboard.html">داشبورد</a></li>

                                                                                        </ul>
                                                                                    </div>&lt;!&ndash; End .col-md-6 &ndash;&gt;
                                                                                </div>&lt;!&ndash; End .row &ndash;&gt;
                                                                            </div>&lt;!&ndash; End .menu-col &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .col-md-8 &ndash;&gt;

                                                                        <div class="col-md-4">
                                                                            <div class="banner banner-overlay">
                                                                                <a href="category.html" class="banner banner-menu">
                                                                                    <img src="assets/images/menu/banner-1.jpg" alt="Banner">

                                                                                    <div class="banner-content banner-content-top">
                                                                                        <div class="banner-title text-white">آخرین
                                                                                            <br>شانس<br><span><strong>فروش</strong></span></div>
                                                                                        &lt;!&ndash; End .banner-title &ndash;&gt;
                                                                                    </div>&lt;!&ndash; End .banner-content &ndash;&gt;
                                                                                </a>
                                                                            </div>&lt;!&ndash; End .banner banner-overlay &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .col-md-4 &ndash;&gt;
                                                                    </div>&lt;!&ndash; End .row &ndash;&gt;
                                                                </div>-->
                                <!-- End .megamenu megamenu-md -->
                            </li>
                            <!--                            <li>
                                                            <a href="#" class="sf-with-ul">محصول</a>

                                                            &lt;!&ndash;                                <div class="megamenu megamenu-sm">
                                                                                                <div class="row no-gutters">
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="menu-col">
                                                                                                            <div class="menu-title">جزئیات محصول</div>
                                                                                                            &lt;!&ndash; End .menu-title &ndash;&gt;
                                                                                                            <ul>
                                                                                                                <li><a href="product.html">پیش فرض</a></li>
                                                                                                                <li><a href="product-centered.html">توضیحات وسط چین</a></li>
                                                                                                                <li><a href="product-extended.html"><span>توضیحات گسترده<span
                                                                                                                                class="tip tip-new">جدید</span></span></a></li>
                                                                                                                <li><a href="product-gallery.html">گالری</a></li>
                                                                                                                <li><a href="product-sticky.html">اطلاعات چسبیده</a></li>
                                                                                                                <li><a href="product-sidebar.html">صفحه جمع با سایدبار</a></li>
                                                                                                                <li><a href="product-fullwidth.html">تمام عرض</a></li>
                                                                                                                <li><a href="product-masonry.html">اطلاعات چسبیده</a></li>
                                                                                                            </ul>
                                                                                                        </div>&lt;!&ndash; End .menu-col &ndash;&gt;
                                                                                                    </div>&lt;!&ndash; End .col-md-6 &ndash;&gt;

                                                                                                    <div class="col-md-6">
                                                                                                        <div class="banner banner-overlay">
                                                                                                            <a href="category.html">
                                                                                                                <img src="assets/images/menu/banner-2.jpg" alt="Banner">

                                                                                                                <div class="banner-content banner-content-bottom">
                                                                                                                    <div class="banner-title text-white">محصولات
                                                                                                                        جدید<br><span><strong>بهار 1401</strong></span>
                                                                                                                    </div>&lt;!&ndash; End .banner-title &ndash;&gt;
                                                                                                                </div>&lt;!&ndash; End .banner-content &ndash;&gt;
                                                                                                            </a>
                                                                                                        </div>&lt;!&ndash; End .banner &ndash;&gt;
                                                                                                    </div>&lt;!&ndash; End .col-md-6 &ndash;&gt;
                                                                                                </div>&lt;!&ndash; End .row &ndash;&gt;
                                                                                            </div>&ndash;&gt;
                                                            &lt;!&ndash; End .megamenu megamenu-sm &ndash;&gt;
                                                        </li>-->
                            <li>
                                <a href="{{route('page_aboutClient')}}" class="">درباره ما </a>
                                <div>
                                    <!--                                <ul>
                                                                        <li>
                                                                            <a href="about.html" class="sf-with-ul">درباره ما</a>

                                                                            <ul>
                                                                                <li><a href="about.html">درباره ما 01</a></li>
                                                                                <li><a href="about-2.html">درباره ما 02</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>
                                                                            <a href="contact.html" class="sf-with-ul">تماس با ما</a>

                                                                            <ul>
                                                                                <li><a href="contact.html">تماس با ما 01</a></li>
                                                                                <li><a href="contact-2.html">تماس با ما 02</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>
                                                                            <a href="invoice-template/invoice-template.html" class="sf-with-ul">قالب
                                                                                فاکتور</a>

                                                                            <ul>
                                                                                <li><a href="invoice-template/invoice-template.html">قالب فاکتور 01</a></li>
                                                                                <li><a href="invoice-template/invoice-template2.html">قالب فاکتور 02</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>
                                                                            <a href="email-template/email-template.html" class="sf-with-ul">قالب
                                                                                ایمیل</a>

                                                                            <ul>
                                                                                <li><a href="email-template/email-template.html">قالب ایمیل 01</a>
                                                                                </li>
                                                                                <li><a href="email-template/email-order-success.html">قالب ایمیل 02 - سفارش موفق</a>
                                                                                </li>
                                                                                <li><a href="email-template/email-promotional.html">قالب ایمیل 03</a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li><a href="login.html">ورود</a></li>
                                                                        <li><a href="forget-password.html">فراموشی رمز عبور</a></li>
                                                                        <li><a href="track-order.html">پیگیری سفارش</a></li>
                                                                        <li><a href="faq.html">سوالات متداول</a></li>
                                                                        <li><a href="404.html">خطای 404</a></li>
                                                                        <li><a href="coming-soon.html">به زودی</a></li>
                                                                    </ul>-->
                                </div>
                            </li>
                            <li>
                                <a href="{{route('page_contactClient')}}" class="">تماس با ما</a>
                                <div>
                                    <!--                                <ul>
                                                                        <li><a href="blog.html">کلاسیک</a></li>
                                                                        <li><a href="blog-listing.html">لیست</a></li>
                                                                        <li>
                                                                            <a href="#">شبکه بندی</a>
                                                                            <ul>
                                                                                <li><a href="blog-grid-2cols.html">2 ستونه</a></li>
                                                                                <li><a href="blog-grid-3cols.html">3 ستونه</a></li>
                                                                                <li><a href="blog-grid-4cols.html">4 ستونه</a></li>
                                                                                <li><a href="blog-grid-sidebar.html">با سایدبار</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">سایز های مختلف</a>
                                                                            <ul>
                                                                                <li><a href="blog-masonry-2cols.html">2 ستونه</a></li>
                                                                                <li><a href="blog-masonry-3cols.html">3 ستونه</a></li>
                                                                                <li><a href="blog-masonry-4cols.html">4 ستونه</a></li>
                                                                                <li><a href="blog-masonry-sidebar.html">با سایدبار</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">ماسک</a>
                                                                            <ul>
                                                                                <li><a href="blog-mask-grid.html">نوع 1</a></li>
                                                                                <li><a href="blog-mask-masonry.html">نوع 2</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">پست تکی</a>
                                                                            <ul>
                                                                                <li><a href="single.html">پیش فرض با سایدبار</a></li>
                                                                                <li><a href="single-fullwidth.html">تمام صفحه بدون سایدبار</a></li>
                                                                                <li><a href="single-fullwidth-sidebar.html">تمام صفحه باسایدبار</a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>-->
                                </div>
                            </li>
                            <li>
                                <a href="{{route('blog_list')}}" class="">بلاگ</a>
                            </li>
                            <li>
                                <a href="{{route('page_panelClient')}}" class="">پنل کاربری</a>
                            </li>
                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->
                </div><!-- End .header-center -->

                <div class="header-right">
                    <i class="la la-lightbulb-o"></i>
                    <p>خرید<span class="highlight">&nbsp;تا 30 درصد تخفیف</span></p>
                </div>
            </div><!-- End .container -->
        </div><!-- End .header-bottom -->
    </header><!-- End .header -->


    @yield('content')


    <footer class="footer">
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="widget widget-about">
                            <img src="{{setting()->footerLogo}}" class="footer-logo"
                                 alt="Footer Logo" width="105" height="25">
                            <p></p>

                            <div class="widget-call">
                                <i class="icon-phone"></i>
                                سوالی دارید؟<br/> 7روز هفته/24ساعته
                                <a href="tel:#">{{setting()->phone}}</a>
                            </div><!-- End .widget-call -->
                        </div><!-- End .widget about-widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h4 class="widget-title">لینک های مفید</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="{{route('page_aboutClient')}}">درباره ما</a></li>
                                <li><a href="{{route('page_services_serviceClient')}}">خدمات</a></li>
                                <li><a href="{{route('page_services_howToBuyClient')}}">نحوه خرید</a></li>
                                <li><a href="{{route('page_faqClient')}}">سوالات متداول</a></li>
                                <li><a href="{{route('page_contactClient')}}">تماس با ما</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h4 class="widget-title">خدمات مشتری</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="{{route('page_services_howToPayClient')}}">شیوه پرداخت</a></li>
                                <li><a href="{{route('page_services_PaybackClient')}}">گارانتی بازگشت وجه</a></li>
                                <li><a href="{{route('page_services_deliveryMethodClient')}}">شیوه ارسال محصولات</a>
                                </li>
                                <li><a href="{{route('page_services_rulesClient')}}">قوانین و مقررات</a></li>
                                <li><a href="{{route('page_services_policyClient')}}">خط مشی</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h4 class="widget-title">حساب کاربری</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="#">ورود</a></li>
                                <li><a href="{{route('shop_cartPageClient')}}">سبد خرید</a></li>
                                <li><a href="{{route('page_wishlistClient')}}">لیست علاقه مندی ها</a></li>
                                <li><a href="#">پیگیری سفارشات</a></li>
                                <li><a href="#">راهنما</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .footer-middle -->

    </footer><!-- End .footer -->
</div><!-- End .page-wrapper -->
<button id="scroll-top" title="بازگشت به بالا"><i class="icon-arrow-up"></i></button>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">جستجو</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search"
                   placeholder="جستجو در ..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab"
                   role="tab" aria-controls="mobile-menu-tab" aria-selected="true">منو</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab"
                   aria-controls="mobile-cats-tab" aria-selected="false">دسته بندی ها</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel"
                 aria-labelledby="mobile-menu-link">
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        <li class="active">
                            <a href={{route('indexClient')}}>خانه</a>
                            <!--                            <ul>
                                                            <li><a href="index-1.html">01 - فروشگاه مبلمان</a></li>
                                                            <li><a href="index-2.html">02 - فروشگاه مبلمان</a></li>
                                                            <li><a href="index-3.html">03 - فروشگاه لوازم الکترونیکی</a></li>
                                                            <li><a href="index-4.html">04 - فروشگاه لوازم الکترونیکی</a></li>
                                                            <li><a href="index-5.html">05 - فروشگاه مد و لباس</a></li>
                                                            <li><a href="index-6.html">06 - فروشگاه مد و لباس</a></li>
                                                            <li><a href="index-7.html">07 - فروشگاه مد و لباس</a></li>
                                                            <li><a href="index-8.html">08 - فروشگاه مد و لباس</a></li>
                                                            <li><a href="index-9.html">09 - فروشگاه مد و لباس</a></li>
                                                            <li><a href="index-10.html">10 - فروشگاه کفش</a></li>
                                                            <li><a href="index-11.html">11 - فروشگاه مبل</a></li>
                                                            <li><a href="index-12.html">12 - فروشگاه مد</a></li>
                                                            <li><a href="index-13.html">13 - بازار</a></li>
                                                            <li><a href="index-14.html">14 - بازار تمام عرض</a></li>
                                                            <li><a href="index-15.html">15 - مد و زیبایی</a></li>
                                                            <li><a href="index-16.html">16 - مد و زیبایی</a></li>
                                                            <li><a href="index-17.html">17 - فروشگاه مد و لباس</a></li>
                                                            <li><a href="index-18.html">18 - فروشگاه مد (با سایدبار)</a></li>
                                                            <li><a href="index-19.html">19 - فروشگاه بازی</a></li>
                                                            <li><a href="index-20.html">20 - فروشگاه کتاب</a></li>
                                                            <li><a href="index-21.html">21 - فروشگاه ورزشی</a></li>
                                                            <li><a href="index-22.html">22 - فروشگاه ابزار</a></li>
                                                            <li><a href="index-23.html">23 - فروشگاه مد با نوبار سمت راست</a></li>
                                                            <li><a href="index-24.html">24 - فروشگاه ورزشی</a></li>
                                                            <li><a href="index-25.html">25 - فروشگاه زیورآلات</a></li>
                                                            <li><a href="index-26.html">26 - فروشگاه بازار</a></li>
                                                            <li><a href="index-27.html">27 - فروشگاه مُد</a></li>
                                                            <li><a href="index-28.html">28 - فروشگاه مواد غذایی</a></li>
                                                            <li><a href="index-29.html">29 - فروشگاه تی شرت</a></li>
                                                            <li><a href="index-30.html">30 - فروشگاه هدفون</a></li>
                                                            <li><a href="index-31.html">31 - فروشگاه یوگا</a></li>
                                                        </ul>-->
                        </li>
                        <li>
                            <a href={{route('shop_storePageClient')}}>فروشگاه</a>
                            <!--                            <ul>
                                                            <li><a href="category-list.html">فروشگاه لیست</a></li>
                                                            <li><a href="category-2cols.html">2 ستونه</a></li>
                                                            <li><a href="category.html">3 ستونه</a></li>
                                                            <li><a href="category-4cols.html">4 ستونه</a></li>
                                                            <li><a href="category-boxed.html"><span>فروشگاه با حالت بسته بدون سایدبار<span
                                                                            class="tip tip-hot">ویژه</span></span></a></li>
                                                            <li><a href="category-fullwidth.html">فروشگاه تمام عرض بدون سایدبار</a></li>
                                                            <li><a href="product-category-boxed.html">دسته بندی محصولات با حالت بسته</a></li>
                                                            <li><a href="product-category-fullwidth.html"><span>دسته بندی محصولات تمام عرض<span
                                                                            class="tip tip-new">جدید</span></span></a></li>
                                                            <li><a href="cart.html">سبد خرید</a></li>
                                                            <li><a href="checkout.html">پرداخت</a></li>
                                                            <li><a href="checkout2.html">پرداخت 2</a></li>
                                                            <li><a href="compare.html">مقایسه محصولات</a></li>
                                                            <li><a href="compare2.html">مقایسه محصولات 2</a></li>
                                                            <li><a href="wishlist.html">لیست علاقه مندی</a></li>
                                                            <li><a href="gift-cart.html">کارت هدیه</a></li>
                                                            <li><a href="dashboard.html">داشبورد</a></li>
                                                        </ul>-->
                        </li>
                        <li>
                            <a href={{route('page_aboutClient')}} class="sf-with-ul">درباره ما</a>
                            <!--                            <ul>
                                                            <li><a href="product.html">پیش فرض</a></li>
                                                            <li><a href="product-centered.html">توضیحات وسط چین</a></li>
                                                            <li><a href="product-extended.html"><span>توضیحات گسترده<span
                                                                            class="tip tip-new">جدید</span></span></a></li>
                                                            <li><a href="product-gallery.html">گالری</a></li>
                                                            <li><a href="product-sticky.html">اطلاعات چسبیده</a></li>
                                                            <li class=""><a href="product-sidebar.html">صفحه جمع با سایدبار</a></li>
                                                            <li><a href="product-fullwidth.html">تمام صفحه</a></li>
                                                            <li><a href="product-masonry.html">اطلاعات چسبیده</a></li>
                                                        </ul>-->
                        </li>
                        <li>
                            <a href={{route('page_contactClient')}}>تماس با ما</a>
                            <!--                            <ul>
                                                            <li>
                                                                <a href="about.html" class="sf-with-ul">درباره ما</a>

                                                                <ul style="display: none;">
                                                                    <li><a href="about.html">درباره ما 01</a></li>
                                                                    <li><a href="about-2.html">درباره ما 02</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="contact.html" class="sf-with-ul">تماس با ما</a>

                                                                <ul style="display: none;">
                                                                    <li><a href="contact.html">تماس با ما 01</a></li>
                                                                    <li><a href="contact-2.html">تماس با ما 02</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="login.html">ورود</a></li>
                                                            <li><a href="forget-password.html">فراموشی رمز عبور</a></li>
                                                            <li><a href="track-order.html">پیگیری سفارش</a></li>
                                                            <li><a href="faq.html">سوالات متداول</a></li>
                                                            <li><a href="404.html">خطای 404</a></li>
                                                            <li><a href="coming-soon.html">به زودی</a></li>
                                                        </ul>-->
                        </li>
                        <li>
                            <a href={{route('page_panelClient')}}>پنل کاربری</a>

                            <!--                            <ul>
                                                            <li class=""><a href="blog.html">کلاسیک</a></li>
                                                            <li><a href="blog-listing.html">لیست</a></li>
                                                            <li>
                                                                <a href="#" class="sf-with-ul">شبکه بندی</a>
                                                                <ul style="display: none;">
                                                                    <li><a href="blog-grid-2cols.html">2 ستونه</a></li>
                                                                    <li><a href="blog-grid-3cols.html">3 ستونه</a></li>
                                                                    <li><a href="blog-grid-4cols.html">4 ستونه</a></li>
                                                                    <li><a href="blog-grid-sidebar.html">با سایدبار</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="sf-with-ul">سایز های مختلف</a>
                                                                <ul style="display: none;">
                                                                    <li><a href="blog-masonry-2cols.html">2 ستونه</a></li>
                                                                    <li><a href="blog-masonry-3cols.html">3 ستونه</a></li>
                                                                    <li><a href="blog-masonry-4cols.html">4 ستونه</a></li>
                                                                    <li><a href="blog-masonry-sidebar.html">با سایدبار</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="sf-with-ul">ماسک</a>
                                                                <ul style="display: none;">
                                                                    <li><a href="blog-mask-grid.html">نوع 1</a></li>
                                                                    <li><a href="blog-mask-masonry.html">نوع 2</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="sf-with-ul">پست تکی</a>
                                                                <ul style="display: none;">
                                                                    <li><a href="single.html">پیش فرض با سایدبار</a></li>
                                                                    <li><a href="single-fullwidth.html">تمام صفحه بدون سایدبار</a></li>
                                                                    <li><a href="single-fullwidth-sidebar.html">تمام صفحه باسایدبار</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>-->
                        </li>
                        <!--                        <li>
                                                    <a href="elements-list.html">عناصر طراحی</a>
                                                    <ul>
                                                        <li class=""><a href="elements-products.html">محصولات</a></li>
                                                        <li><a href="elements-typography.html">تایپوگرافی</a></li>
                                                        <li><a href="elements-titles.html">عناوین</a></li>
                                                        <li><a href="elements-banners.html">بنرها</a></li>

                                                        <li><a href="elements-product-category.html">دسته بندی محصولات</a></li>
                                                        <li><a href="elements-video-banners.html">بنرهای ویدیویی</a></li>
                                                        <li><a href="elements-buttons.html">دکمه ها</a></li>
                                                        <li><a href="elements-accordions.html">آکاردئون</a></li>
                                                        <li><a href="elements-lookbook.html">لوک بوک</a></li>
                                                        <li><a href="elements-tabs.html">تب ها</a></li>
                                                        <li><a href="elements-testimonials.html">توصیف و نقل قول</a></li>
                                                        <li><a href="elements-blog-posts.html">اخبار</a></li>
                                                        <li><a href="elements-portfolio.html">نمونه کار</a></li>
                                                        <li><a href="elements-cta.html">پاسخ به عمل</a></li>
                                                        <li><a href="elements-icon-boxes.html">باکس های آیکون</a></li>
                                                    </ul>
                                                </li>-->
                    </ul>
                </nav><!-- End .mobile-nav -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                <nav class="mobile-cats-nav">
                    <ul class="mobile-cats-menu">
                        @if(count(allGroup()) > 0)
                            @foreach(allGroup() as $group)
                                @if($group->sub_title === null)
                                    <li class="item-lead"><a href="#">{{$group->title}}</a></li>
                                @endif
                            @endforeach
                        @else
                            <li><a class="mobile-cats-lead" href="#">پیشنهاد روزانه</a></li>
                            <li><a class="mobile-cats-lead" href="#">هدیه</a></li>
                            <li><a href="#">تخت خواب</a></li>
                            <li><a href="#">روشنایی</a></li>
                            <li><a href="#">مبلمان</a></li>
                            <li><a href="#">فضای ذخیره سازی</a></li>
                            <li><a href="#">میز وصندلی</a></li>
                            <li><a href="#">دکور </a></li>
                            <li><a href="#">کابینت</a></li>
                            <li><a href="#">قهوه</a></li>
                            <li><a href="#">مبلمان خارج از منزل </a></li>
                        @endif
                    </ul><!-- End .mobile-cats-menu -->
                </nav><!-- End .mobile-cats-nav -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="فیسبوک"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="توییتر"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="اینستاگرام"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="یوتیوب"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

<!-- Sign in / Register Modal -->
<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin"
                                   role="tab" aria-controls="signin" aria-selected="true">ورود</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                                   aria-controls="register" aria-selected="false">ثبت نام</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel"
                                 aria-labelledby="signin-tab">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            &times;
                                        </button>
                                        <strong></strong> {{ Session::get('message', '') }}
                                    </div>
                                @endif
                                @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            &times;
                                        </button>
                                        <strong></strong> {{ Session::get('message', '') }}
                                    </div>
                                @endif
                                @if(count($errors) > 0 )
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                                <form method="POST" action="{{ route('user_singIn') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="singin-email">شماره موبایل *</label>
                                        <input type="tel" class="form-control" id="singin-email"
                                               name="mobile" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password">رمز عبور *</label>
                                        <input type="password" class="form-control" id="singin-password"
                                               name="password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>ورود</span>
                                            <i class="icon-long-arrow-left"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="signin-remember">
                                            <label class="custom-control-label" for="signin-remember">مرا به خاطر
                                                بسپار</label>
                                        </div><!-- End .custom-checkbox -->

                                        <a href="{{route('user_forgetPassword')}}" class="forgot-link">فراموشی رمز
                                            عبور؟</a>
                                    </div><!-- End .form-footer -->
                                </form>
                                <!--                                <div class="form-choice">
                                                                    <p class="text-center">یا ورود با</p>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <a href="#" class="btn btn-login btn-g">
                                                                                <i class="icon-google"></i>
                                                                                حساب گوگل
                                                                            </a>
                                                                        </div>&lt;!&ndash; End .col-6 &ndash;&gt;
                                                                        <div class="col-sm-6">
                                                                            <a href="#" class="btn btn-login btn-f">
                                                                                <i class="icon-facebook-f"></i>
                                                                                حساب فیسبوک
                                                                            </a>
                                                                        </div>&lt;!&ndash; End .col-6 &ndash;&gt;
                                                                    </div>&lt;!&ndash; End .row &ndash;&gt;
                                                                </div>&lt;!&ndash; End .form-choice &ndash;&gt;-->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            &times;
                                        </button>
                                        <strong></strong> {{ Session::get('message', '') }}
                                    </div>
                                @endif
                                @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            &times;
                                        </button>
                                        <strong></strong> {{ Session::get('message', '') }}
                                    </div>
                                @endif
                                @if(count($errors) > 0 )
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                                <form method="POST" action="{{ route('user_singUp') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="register-email">شماره موبایل شما *</label>
                                        <input type="tel" class="form-control" id="register-phone"
                                               name="mobile" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password">رمز عبور *</label>
                                        <input type="password" class="form-control" id="register-password"
                                               name="password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>ثبت نام</span>
                                            <i class="icon-long-arrow-left"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy"
                                                   required>
                                            <label class="custom-control-label" for="register-policy">با
                                                <a href="#">قوانین و مقررات </a>موافقم *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>
                                <!--                                <div class="form-choice">
                                                                    <p class="text-center">یا عضویت با</p>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <a href="#" class="btn btn-login btn-g">
                                                                                <i class="icon-google"></i>
                                                                                حساب گوگل
                                                                            </a>
                                                                        </div>&lt;!&ndash; End .col-6 &ndash;&gt;
                                                                        <div class="col-sm-6">
                                                                            <a href="#" class="btn btn-login  btn-f">
                                                                                <i class="icon-facebook-f"></i>
                                                                                حساب فیسبوک
                                                                            </a>
                                                                        </div>&lt;!&ndash; End .col-6 &ndash;&gt;
                                                                    </div>&lt;!&ndash; End .row &ndash;&gt;
                                                                </div>&lt;!&ndash; End .form-choice &ndash;&gt;-->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div><!-- End .modal -->

<!--<div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="row no-gutters bg-white newsletter-popup-content">
                <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                    <div class="banner-content text-center">
                        <img src="assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60"
                             height="15">
                        <h2 class="banner-title">دریافت <span>25<light>%</light></span> تخفیف</h2>
                        <p>با عضویت در خبرنامه فروشگاه ما، یک تخفیف 25 درصدی دریافت کنید و از جدیدترین تخفیف ها مطلع
                            شوید</p>
                        <form action="#">
                            <div class="input-group input-group-round">
                                <input type="email" class="form-control form-control-white" placeholder="ایمیل شما"
                                       aria-label="Email Adress" required>
                                <div class="input-group-append">
                                    <button class="btn" type="submit"><span>تایید</span></button>
                                </div>&lt;!&ndash; .End .input-group-append &ndash;&gt;
                            </div>&lt;!&ndash; .End .input-group &ndash;&gt;
                        </form>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                            <label class="custom-control-label" for="register-policy-2">این پنجره را دوباره
                                نشان نده</label>
                        </div>&lt;!&ndash; End .custom-checkbox &ndash;&gt;
                    </div>
                </div>
                <div class="col-xl-2-5col col-lg-5 ">
                    <img src="assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                </div>
            </div>
        </div>
    </div>
</div>-->

<!-- Plugins JS File -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/jquery.hoverIntent.min.js"></script>
<script src="/assets/js/jquery.waypoints.min.js"></script>
<script src="/assets/js/superfish.min.js"></script>
<script src="/assets/js/owl.carousel.min.js"></script>
<script src="/assets/js/bootstrap-input-spinner.js"></script>
<script src="/assets/js/jquery.plugin.min.js"></script>
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/jquery.countdown.min.js"></script>
<script src="/sweetAlert/sweetalert2.all.min.js"></script>
<!-- Main JS File -->
<script src="/assets/js/main.js"></script>
<script src="/assets/js/demos/demo-3.js"></script>

<script src="assets/js/jquery.elevateZoom.min.js"></script>



<script>
    function cartContent() {
        $.ajax({
            url: '{{route('shop_basket_order_show')}}',
            type: 'Get',
            success: function (res) {
                // console.log(res);
                var listItems = res['part'];
                document.getElementById('cartCount').innerHTML = res['part'].length;
                document.getElementById('cartTotal').innerHTML = res['total_part_price'] + 'تومان';

                var itemsProductHtml = ``;
                for (var i = 0; i < listItems.length; i++) {
                    var id = listItems[i]['id'];
                    var slug = listItems[i]['slug'];
                    var urlP = "{{ route('shop_productDetail', ':slug') }}";
                    var urlD = "{{ route('shop_basket_order_destroy', ':id') }}";
                    urlP = urlP.replace(':slug', slug);
                    urlD = urlD.replace(':id', id);

                    var lists = `<div class="product">
                    <div class="product-cart-details">
                        <h4 class="product-title">
                            <a href="` + urlP+ `">` + listItems[i]['title'] + `</a>
                        </h4>
                        <span class="cart-product-info">
                            <span class="cart-product-qty">` + listItems[i]['count'] + ` x </span>
                            ` + listItems[i]['price'] + ` تومان
                        </span>
                    </div>
                    <!-- End .product-cart-details -->

                    <figure class="product-image-container">
                        <a href="` + urlP+ `" class="product-image">
                            <img src="/` + listItems[i]['banner'] + ` " alt="product"/>
                        </a>
                    </figure>
                   <a> <i class="icon-close btn-remove" onclick="deleteFromBasket(` + listItems[i]['id'] + `)"></i><a>
                    </div>`
                    itemsProductHtml = itemsProductHtml + lists;
                }
                document.getElementById('cartList').innerHTML = itemsProductHtml;
            }
        });
    }
    function favoriteCount() {
        var favoriteCount = {{count(favoriteItems())}};
        document.getElementById('wishlist-count').innerHTML = favoriteCount;
    }

    @if (\Illuminate\Support\Facades\Auth::check())
    cartContent()
    favoriteCount()
    @endif

    function addToBasket(id,number = 1) {
        if (logged) {
            $.ajax({
                url: `/shop_basket/order/store?productId=${id}&count=${number}`,
                type: "Get",
                success: function (data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'با موفقیت به سبد خرید اضافه شد'
                    })
                }
            });

            cartContent()
        } else {
            Swal.fire({
                title: 'ورود به حساب کاربری!',
                text: 'برای افزودن به علاقه مندی نیاز است وارد حساب کاربری خود شوید.وارد حساب خود میشوید؟',
                icon: 'question',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر',
                showCancelButton: true
            }).then(function (isConfirm) {
                if (isConfirm.isConfirmed) {
                    window.location.assign('/user/login')
                } else {

                }
            })
        }

    }
    function deleteFromBasket(id) {

            $.ajax({
                url: `/shop_basket/order/destroy/${id}`,
                type: "Get",
                success: function (data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'error',
                        title: 'با موفقیت حذف شد'
                    })
                }
            });

            cartContent()


    }


    function addToWishlist(id) {
        if (logged) {
            $.ajax({
                url: `/product/wishlist/store?productId=${id}`,
                type: "Get",
                success: function (data) {
                    favoriteCount()
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'با موفقیت به علاقه مندی ها اضافه شد'
                    })
                    favoriteCount()
                }
            });
        } else {
            Swal.fire({
                title: 'ورود به حساب کاربری!',
                text: 'برای افزودن به علاقه مندی نیاز است وارد حساب کاربری خود شوید.وارد حساب خود میشوید؟',
                icon: 'question',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر',
                showCancelButton: true
            }).then(function (isConfirm) {
                if (isConfirm.isConfirmed) {
                    window.location.assign('/user/login')
                } else {

                }
            })
        }
    }
</script>
<script>
    $('body').keypress(function(e) {
        if (e.keyCode == 13) {
            $('#searchForm').submit();
        }
    });
</script>


@if(Auth::check())

    <script>{{ 'var logged = true;' }}</script>

@else

    <script>{{ 'var logged = false;' }}</script>
@endif

@yield('script')

</body>

</html>
