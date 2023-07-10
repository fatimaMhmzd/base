<!DOCTYPE html>
<!--
Template Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://www.rtl-theme.com/vuexy-Admin-Dashboard-Template
Renew Support: https://www.rtl-theme.com/vuexy-Admin-Dashboard-Template
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>ویرایش کاربر - Vuexy - قالب مدیریتی نوین پردازش آروکو</title>
    <link rel="apple-touch-icon" href="/dashboard/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/dashboard/app-assets/images/ico/favicon.ico">
    <link href="/dashboard/app-assets/images/fonts.googleapis.css" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/vendors/css/vendors-rtl.min.css">
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/css-rtl/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/css-rtl/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/css-rtl/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/css-rtl/colors.min.css">
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/css-rtl/components.min.css">
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/css-rtl/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/css-rtl/themes/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/css-rtl/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/css-rtl/pages/app-user.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/dashboard/app-assets/css-rtl/custom-rtl.min.css">
    <link rel="stylesheet" type="text/css" href="/dashboard/assets/css/style-rtl.css">
    <!-- END: Custom CSS-->
    @yield('link')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
@include('dashboard.layoute.header')

@include('dashboard.layoute.menu')



<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
<!--        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">طرح فرم</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">خانه</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">فرم ها</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">طرح فرم</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrum-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">گفتگو</a><a class="dropdown-item" href="#">ایمیل</a><a class="dropdown-item" href="#">تقویم</a></div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="content-body"><!-- Basic Horizontal form layout section start -->
            @yield('content')

        </div>
    </div>
</div>

<!-- END: Content-->






<!-- BEGIN: Vendor JS-->
<script src="/dashboard/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="/dashboard/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="/dashboard/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
<script src="/dashboard/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="/dashboard/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/dashboard/app-assets/js/core/app-menu.min.js"></script>
<script src="/dashboard/app-assets/js/core/app.min.js"></script>
<script src="/dashboard/app-assets/js/scripts/components.min.js"></script>
<script src="/dashboard/app-assets/js/scripts/customizer.min.js"></script>
<script src="/dashboard/app-assets/js/scripts/footer.min.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="/dashboard/app-assets/js/scripts/pages/app-user.min.js"></script>
<script src="/dashboard/app-assets/js/scripts/navs/navs.min.js"></script>
<!-- END: Page JS-->
@yield('script')
</body>
<!-- END: Body-->
</html>
