<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('indexClient')}}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">مدیریت فروشگاه</h2></a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
<!--            <li class=" nav-item"><a href="index.html"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">تنظیمات صفحه اصلی</span><span class="badge badge badge-warning badge-pill float-right mr-2">2</span></a>
                <ul class="menu-content">
                    <li><a href="dashboard-analytics.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">افزودن</span></a>
                    </li>
                    <li><a href="dashboard-ecommerce.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">لیست </span></a>
                    </li>
                </ul>
            </li>-->
            <li class=" navigation-header"><span>مدیریت سایت</span>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">صفحات</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_page_index') ? 'active' : '' }}"><a href="{{route('dashboard_page_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_page_create') ? 'active' : '' }}"><a href="{{route('dashboard_page_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">اسلایدر</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_slider_index') ? 'active' : '' }}"><a href="{{route('dashboard_slider_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_slider_create') ? 'active' : '' }}"><a href="{{route('dashboard_slider_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">تنظیمات</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_setting_index') ? 'active' : '' }}"><a href="{{route('dashboard_setting_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_setting_create') ? 'active' : '' }}"><a href="{{route('dashboard_setting_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">شبکه های اجتماعی</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_social_media_index') ? 'active' : '' }}"><a href="{{route('dashboard_social_media_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_social_media_create') ? 'active' : '' }}"><a href="{{route('dashboard_social_media_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>
            <li class=" navigation-header"><span>مدیریت وبلاگ</span>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">گروهبندی</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_blog_group_index') ? 'active' : '' }}"><a href="{{route('dashboard_blog_group_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_blog_group_create') ? 'active' : '' }}"><a href="{{route('dashboard_blog_group_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">برچسب</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_blog_lable_index') ? 'active' : '' }}"><a href="{{route('dashboard_blog_lable_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_blog_lable_create') ? 'active' : '' }}"><a href="{{route('dashboard_blog_lable_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">بلاگ</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_blog_index') ? 'active' : '' }}"><a href="{{route('dashboard_blog_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_blog_create') ? 'active' : '' }}"><a href="{{route('dashboard_blog_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>
            <li class=" navigation-header"><span>مدیریت آدرس</span>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">کشور</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_location_country_index') ? 'active' : '' }}"><a href="{{route('dashboard_location_country_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_location_country_create') ? 'active' : '' }}"><a href="{{route('dashboard_location_country_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">استان</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_location_province_index') ? 'active' : '' }}"><a href="{{route('dashboard_location_province_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_location_province_create') ? 'active' : '' }}"><a href="{{route('dashboard_location_province_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">شهرستان</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_location_city_index') ? 'active' : '' }}"><a href="{{route('dashboard_location_city_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_location_city_create') ? 'active' : '' }}"><a href="{{route('dashboard_location_city_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>

            <li class=" navigation-header"><span>مدیریت محصولات</span>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">رنگ بندی</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_color_index') ? 'active' : '' }}"><a href="{{route('dashboard_color_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_color_create') ? 'active' : '' }}"><a href="{{route('dashboard_color_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">واحد ها</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_unit_index') ? 'active' : '' }}"><a href="{{route('dashboard_unit_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_unit_create') ? 'active' : '' }}"><a href="{{route('dashboard_unit_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">سایزبندی</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_size_index') ? 'active' : '' }}"><a href="{{route('dashboard_size_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_size_create') ? 'active' : '' }}"><a href="{{route('dashboard_size_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">گروهبندی</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_product_group_index') ? 'active' : '' }}"><a href="{{route('dashboard_product_group_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_product_group_create') ? 'active' : '' }}"><a href="{{route('dashboard_product_group_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>
<!--            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">گروهبندی</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_group_index') ? 'active' : '' }}"><a href="{{route('dashboard_group_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_group_create') ? 'active' : '' }}"><a href="{{route('dashboard_group_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>-->
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">محصول</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_product_index') ? 'active' : '' }}"><a href="{{route('dashboard_product_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_product_create') ? 'active' : '' }}"><a href="{{route('dashboard_product_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">افزودن</span></a>
                    </li>

                </ul>
            </li>
            <li class=" navigation-header"><span>مدیریت سایت</span>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">صفحه ی اول سایت</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_product_suggest_index') ? 'active' : '' }}"><a href="{{route('dashboard_product_suggest_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>


                </ul>
            </li>
            <li class=" navigation-header"><span>مدیریت سفارشات</span>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">سفارشات</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_shop_basket_factor_index') ? 'active' : '' }}"><a href="{{route('dashboard_shop_basket_factor_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>


                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">شیوه های ارسال</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_shop_basket_sending_method_index') ? 'active' : '' }}"><a href="{{route('dashboard_shop_basket_sending_method_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_shop_basket_sending_method_create') ? 'active' : '' }}"><a href="{{route('dashboard_shop_basket_sending_method_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">افزودن</span></a>
                    </li>


                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">شیوه های پرداخت</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_shop_basket_payment_method_index') ? 'active' : '' }}"><a href="{{route('dashboard_shop_basket_payment_method_index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">لیست</span></a>
                    </li>
                    <li class="{{ Request::routeIs('dashboard_shop_basket_payment_method_create') ? 'active' : '' }}"><a href="{{route('dashboard_shop_basket_payment_method_create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">افزودن</span></a>
                    </li>


                </ul>
            </li>

            <li class=" navigation-header"><span>گزارش ها</span>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file"></i><span class="menu-title" data-i18n="User">گزارش ها</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::routeIs('dashboard_product_report') ? 'active' : '' }}"><a href="{{route('dashboard_product_report')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">بازدید محصولات</span></a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
