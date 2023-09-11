@extends('client.layout.total')

@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">لیست<span>فروشگاه</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('indexClient')}}">خانه</a></li>
                    <li class="breadcrumb-item"><a href="{{route('shop_storePageClient')}}">فروشگاه</a></li>
                    <li class="breadcrumb-item active" aria-current="page">لیست</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    نمایش <span id="productLenght">{{count($data->product)}} </span> محصول
                                </div><!-- End .toolbox-info -->
                            </div><!-- End .toolbox-left -->

                            <!--                            <div class="toolbox-right">
                                                            <div class="toolbox-sort">
                                                                <label for="sortby">مرتب سازی براساس : </label>
                                                                <div class="select-custom">
                                                                    <select name="sortby" id="sortby" class="form-control">
                                                                        <option value="popularity" selected="selected">بیشترین خرید</option>
                                                                        <option value="rating">بیشترین امتیاز</option>
                                                                        <option value="date">تاریخ</option>
                                                                    </select>
                                                                </div>
                                                            </div>&lt;!&ndash; End .toolbox-sort &ndash;&gt;
                                                            <div class="toolbox-layout">
                                                                <a onclick="changeStyle('showStyleOne', 'one')" id="one"
                                                                   class="btn-layout active activing">
                                                                    <svg width="16" height="10">
                                                                        <rect x="0" y="0" width="4" height="4"/>
                                                                        <rect x="6" y="0" width="10" height="4"/>
                                                                        <rect x="0" y="6" width="4" height="4"/>
                                                                        <rect x="6" y="6" width="10" height="4"/>
                                                                    </svg>
                                                                </a>

                                                                <a onclick="changeStyle('showStyleTwo', 'two')" id="two"
                                                                   class="btn-layout activing">
                                                                    <svg width="10" height="10">
                                                                        <rect x="0" y="0" width="4" height="4"/>
                                                                        <rect x="6" y="0" width="4" height="4"/>
                                                                        <rect x="0" y="6" width="4" height="4"/>
                                                                        <rect x="6" y="6" width="4" height="4"/>
                                                                    </svg>
                                                                </a>

                                                                <a onclick="changeStyle('showStyleThree', 'three')" id="three"
                                                                   class="btn-layout activing">
                                                                    <svg width="16" height="10">
                                                                        <rect x="0" y="0" width="4" height="4"/>
                                                                        <rect x="6" y="0" width="4" height="4"/>
                                                                        <rect x="12" y="0" width="4" height="4"/>
                                                                        <rect x="0" y="6" width="4" height="4"/>
                                                                        <rect x="6" y="6" width="4" height="4"/>
                                                                        <rect x="12" y="6" width="4" height="4"/>
                                                                    </svg>
                                                                </a>

                                                                <a onclick="changeStyle('showStyleFour', 'four')" id="four"
                                                                   class="btn-layout activing">
                                                                    <svg width="22" height="10">
                                                                        <rect x="0" y="0" width="4" height="4"/>
                                                                        <rect x="6" y="0" width="4" height="4"/>
                                                                        <rect x="12" y="0" width="4" height="4"/>
                                                                        <rect x="18" y="0" width="4" height="4"/>
                                                                        <rect x="0" y="6" width="4" height="4"/>
                                                                        <rect x="6" y="6" width="4" height="4"/>
                                                                        <rect x="12" y="6" width="4" height="4"/>
                                                                        <rect x="18" y="6" width="4" height="4"/>
                                                                    </svg>
                                                                </a>
                                                            </div>&lt;!&ndash; End .toolbox-layout &ndash;&gt;
                                                        </div>--><!-- End .toolbox-right -->
                        </div><!-- End .toolbox -->

                        <div class="products products-area mb-3" style="display: block" id="showAllProduct">
                            @if(count($data->product) > 0)
                                @foreach($data->product as $product)
                                    <div class="product product-list">
                                        <div class="row">
                                            <div class="col-6 col-lg-3">
                                                <figure class="product-media">
                                                    {{--                                                    <span class="product-label label-new">جدید</span>--}}
                                                    <a href="{{route('shop_productDetail', $product->slug)}}">
                                                        <img src="/{{$product->banner}}" alt="تصویر محصول"
                                                             class="product-image">
                                                    </a>
                                                </figure><!-- End .product-media -->
                                            </div><!-- End .col-sm-6 col-lg-3 -->

                                            <div class="col-6 col-lg-3 order-lg-last">
                                                <div class="product-list-action">
                                                    <div class="product-price">
                                                        {{$product->price}} تومان
                                                    </div><!-- End .product-price -->
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val"
                                                                 style="width: {{$product->avg_rate}}%;"></div>
                                                            <!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                        <span
                                                            class="ratings-text">( {{$product->num_visit}} بازدید )</span>
                                                    </div><!-- End .rating-container -->

                                                    <div class="product-action">
                                                        <!--                                                        <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                                                                                   title="مشاهده سریع محصول"><span>مشاهده سریع</span></a>-->
                                                        <!--                                                        <a href="#" class="btn-product btn-compare"
                                                                                                                   title="مقایسه"><span>مقایسه</span></a>-->
                                                    </div><!-- End .product-action -->

                                                    <a onclick="addToBasket({{$product->id}})" type="button"
                                                       class="btn-product btn-cart">
                                                        <span>افزودن به سبد خرید</span></a>
                                                </div><!-- End .product-list-action -->
                                            </div><!-- End .col-sm-6 col-lg-3 -->

                                            <div class="col-lg-6">
                                                <div class="product-body product-action-inner">
                                                    <a onclick="addToWishlist(this,{{$product->id}})" type="button"
                                                       class="btn-product btn-wishlist  @if($product->is_wish) btn-wishlist-selected @endif "
                                                       title="افزودن به لیست علاقه مندی"><span>افزودن به لیست علاقه
                                                        مندی</span></a>
                                                    <div class="product-cat">
                                                        <a href="{{route('shop_storePageClient', $product->group->slug)}}">{{$product->group->title}}</a>
                                                    </div><!-- End .product-cat -->
                                                    <h3 class="product-title"><a
                                                            href="{{route('shop_productDetail', $product->slug)}}">{{$product->title}}</a>
                                                    </h3><!-- End .product-title -->

                                                    <div class="product-content">
                                                        <p>{{$product->short_description}}</p>
                                                    </div><!-- End .product-content -->
                                                    <div class="mb-3">
                                                        <p>{{$product->length}} * {{$product->width}}
                                                            * {{$product->height}}</p>
                                                    </div><!-- End .product-dims -->
                                                    <div class="product-nav product-nav-thumbs">
                                                        @foreach($product->image as $pic)
                                                            <a href="#" class="">
                                                                <img src="/{{$pic->url}}"
                                                                     alt="product desc">
                                                            </a>
                                                        @endforeach
                                                    </div><!-- End .product-nav -->
                                                </div><!-- End .product-body -->
                                            </div><!-- End .col-lg-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .product -->
                                @endforeach

                            @endif
                        </div><!-- End .products -->


                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="widget widget-search">
                            <h3 class="widget-title">جستجو</h3><!-- End .widget-title -->

                            <form method="get">
                                <label for="ws" class="sr-only">جستجوی </label>
                                <input type="search" class="form-control" name="search" id="inputSearch"
                                       placeholder="جستجوی محصول مورد نظر" onkeyup="filterAll(this)">
                                <button type="submit" class="btn"><i class="icon-search"></i><span
                                        class="sr-only">جستجو</span></button>
                            </form>
                        </div>
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>فیلترها : </label>
                                <a href="#" class="sidebar-filter-clear">پاک کردن همه</a>
                            </div><!-- End .widget widget-clean -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                       aria-controls="widget-1">
                                        دسته بندی
                                    </a>
                                </h3><!-- End .widget-title -->
                                <form method="get" enctype="multipart/form-data">
                                    <input name="search" @if(Request::get('search')) value="{{Request::get('search')}}"
                                           @endif hidden>
                                    <div class="collapse show" id="widget-1">
                                        <div class="widget-body">
                                            <div class="filter-items filter-items-count">

                                                @foreach($data->groups as $groupData)

                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" value="{{$groupData->id}}"
                                                                   name="groupIds[]"
                                                                   onchange="filterAll(this)"
                                                                   class="custom-control-input"
                                                                   id="cat{{$loop->index}}"
                                                                   @if(Request::get('groupIds') and in_array($groupData->id , Request::get('groupIds'))) checked
                                                                   @endif @if(isset($data->group) and $data->group->id == $groupData->id) checked @endif>
                                                            <label class="custom-control-label"
                                                                   for="cat{{$loop->index}}">{{$groupData->title}}</label>
                                                        </div><!-- End .custom-checkbox -->
                                                        <!--                                                    <span class="item-count">3</span>-->
                                                    </div>
                                                @endforeach


                                                <div class="widget">
                                                    <h3 class="widget-title">قیمت</h3><!-- End .widget-title -->

                                                    <div class="widget-body">
                                                        <div class="filter-items">
                                                            <!--                                                                    <label for="vol">فیلتر قیمت از 0 تومان تا 1000000 تومان</label>-->
                                                            <!--                                                                    <div class="slider"><input name="range" type="range" min="100" max="100000" value="100" oninput="rangeValue.innerText = this.value"><p id="rangeValue">100</p></div>-->
                                                            <p id="rangeValue">ازمبلغ</p>
                                                            <div class="slider"><input id="fromRange" name="fromRange"
                                                                                       type="number" value="0"
                                                                                       oninput="filterAll(this)"></div>
                                                            <p id="rangeValue">تا مبلغ</p>
                                                            <div class="slider"><input id="toRange" name="toRange"
                                                                                       type="number" value="1000000000"
                                                                                       oninput="filterAll(this)"></div>


                                                        </div><!-- End .filter-items -->
                                                    </div><!-- End .widget-body -->
                                                </div><!-- End .widget -->
                                                <div class="mt-1 text-center">
                                                    <div class="custom-control custom-checkbox text-center">
                                                        <button class="btn btn-secondary">اعمال فیلتر</button>
                                                    </div><!-- End .custom-checkbox -->
                                                    <!--                                                    <span class="item-count">3</span>-->
                                                </div>


                                                <!-- End .filter-item -->
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->

                                </form>
                            </div><!-- End .widget -->


                            <!--                            <div class="widget widget-collapsible">
                                                            <h3 class="widget-title">
                                                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true"
                                                                   aria-controls="widget-2">
                                                                    سایز
                                                                </a>
                                                            </h3>&lt;!&ndash; End .widget-title &ndash;&gt;

                                                            <div class="collapse show" id="widget-2">
                                                                <div class="widget-body">
                                                                    <div class="filter-items">
                                                                        <div class="filter-item">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="size-1">
                                                                                <label class="custom-control-label" for="size-1">XS</label>
                                                                            </div>&lt;!&ndash; End .custom-checkbox &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .filter-item &ndash;&gt;

                                                                        <div class="filter-item">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="size-2">
                                                                                <label class="custom-control-label" for="size-2">S</label>
                                                                            </div>&lt;!&ndash; End .custom-checkbox &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .filter-item &ndash;&gt;

                                                                        <div class="filter-item">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" checked
                                                                                       id="size-3">
                                                                                <label class="custom-control-label" for="size-3">M</label>
                                                                            </div>&lt;!&ndash; End .custom-checkbox &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .filter-item &ndash;&gt;

                                                                        <div class="filter-item">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" checked
                                                                                       id="size-4">
                                                                                <label class="custom-control-label" for="size-4">L</label>
                                                                            </div>&lt;!&ndash; End .custom-checkbox &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .filter-item &ndash;&gt;

                                                                        <div class="filter-item">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="size-5">
                                                                                <label class="custom-control-label" for="size-5">XL</label>
                                                                            </div>&lt;!&ndash; End .custom-checkbox &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .filter-item &ndash;&gt;

                                                                        <div class="filter-item">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="size-6">
                                                                                <label class="custom-control-label" for="size-6">XXL</label>
                                                                            </div>&lt;!&ndash; End .custom-checkbox &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .filter-item &ndash;&gt;
                                                                    </div>&lt;!&ndash; End .filter-items &ndash;&gt;
                                                                </div>&lt;!&ndash; End .widget-body &ndash;&gt;
                                                            </div>&lt;!&ndash; End .collapse &ndash;&gt;
                                                        </div>&lt;!&ndash; End .widget &ndash;&gt;

                                                        <div class="widget widget-collapsible">
                                                            <h3 class="widget-title">
                                                                <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true"
                                                                   aria-controls="widget-3">
                                                                    رنگ
                                                                </a>
                                                            </h3>&lt;!&ndash; End .widget-title &ndash;&gt;

                                                            <div class="collapse show" id="widget-3">
                                                                <div class="widget-body">
                                                                    <div class="filter-colors">
                                                                        <a href="#" style="background: #b87145;"><span
                                                                                class="sr-only">نام رنگ</span></a>
                                                                        <a href="#" style="background: #f0c04a;"><span
                                                                                class="sr-only">نام رنگ</span></a>
                                                                        <a href="#" style="background: #333333;"><span
                                                                                class="sr-only">نام رنگ</span></a>
                                                                        <a href="#" class="selected" style="background: #cc3333;"><span
                                                                                class="sr-only">نام رنگ</span></a>
                                                                        <a href="#" style="background: #3399cc;"><span
                                                                                class="sr-only">نام رنگ</span></a>
                                                                        <a href="#" style="background: #669933;"><span
                                                                                class="sr-only">نام رنگ</span></a>
                                                                        <a href="#" style="background: #f2719c;"><span
                                                                                class="sr-only">نام رنگ</span></a>
                                                                        <a href="#" style="background: #ebebeb;"><span
                                                                                class="sr-only">نام رنگ</span></a>
                                                                    </div>&lt;!&ndash; End .filter-colors &ndash;&gt;
                                                                </div>&lt;!&ndash; End .widget-body &ndash;&gt;
                                                            </div>&lt;!&ndash; End .collapse &ndash;&gt;
                                                        </div>&lt;!&ndash; End .widget &ndash;&gt;

                                                        <div class="widget widget-collapsible">
                                                            <h3 class="widget-title">
                                                                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true"
                                                                   aria-controls="widget-4">
                                                                    برند
                                                                </a>
                                                            </h3>&lt;!&ndash; End .widget-title &ndash;&gt;

                                                            <div class="collapse show" id="widget-4">
                                                                <div class="widget-body">
                                                                    <div class="filter-items">
                                                                        <div class="filter-item">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input"
                                                                                       id="brand-1">
                                                                                <label class="custom-control-label" for="brand-1">نکست</label>
                                                                            </div>&lt;!&ndash; End .custom-checkbox &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .filter-item &ndash;&gt;

                                                                        <div class="filter-item">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input"
                                                                                       id="brand-2">
                                                                                <label class="custom-control-label" for="brand-2">ریور
                                                                                    ایسلند</label>
                                                                            </div>&lt;!&ndash; End .custom-checkbox &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .filter-item &ndash;&gt;

                                                                        <div class="filter-item">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input"
                                                                                       id="brand-3">
                                                                                <label class="custom-control-label" for="brand-3">جیوکس</label>
                                                                            </div>&lt;!&ndash; End .custom-checkbox &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .filter-item &ndash;&gt;

                                                                        <div class="filter-item">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input"
                                                                                       id="brand-4">
                                                                                <label class="custom-control-label" for="brand-4">نیو بالانس</label>
                                                                            </div>&lt;!&ndash; End .custom-checkbox &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .filter-item &ndash;&gt;

                                                                        <div class="filter-item">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input"
                                                                                       id="brand-5">
                                                                                <label class="custom-control-label" for="brand-5">یو جی جی</label>
                                                                            </div>&lt;!&ndash; End .custom-checkbox &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .filter-item &ndash;&gt;

                                                                        <div class="filter-item">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input"
                                                                                       id="brand-6">
                                                                                <label class="custom-control-label" for="brand-6">اف اند اف</label>
                                                                            </div>&lt;!&ndash; End .custom-checkbox &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .filter-item &ndash;&gt;

                                                                        <div class="filter-item">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input"
                                                                                       id="brand-7">
                                                                                <label class="custom-control-label" for="brand-7">نایکی</label>
                                                                            </div>&lt;!&ndash; End .custom-checkbox &ndash;&gt;
                                                                        </div>&lt;!&ndash; End .filter-item &ndash;&gt;

                                                                    </div>&lt;!&ndash; End .filter-items &ndash;&gt;
                                                                </div>&lt;!&ndash; End .widget-body &ndash;&gt;
                                                            </div>&lt;!&ndash; End .collapse &ndash;&gt;
                                                        </div>&lt;!&ndash; End .widget &ndash;&gt;

                                                        <div class="widget widget-collapsible">
                                                            <h3 class="widget-title">
                                                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                                                   aria-controls="widget-5">
                                                                    قیمت
                                                                </a>
                                                            </h3>&lt;!&ndash; End .widget-title &ndash;&gt;

                                                            <div class="collapse show" id="widget-5">
                                                                <div class="widget-body">
                                                                    <div class="filter-price">
                                                                        <div class="filter-price-text">
                                                                            محدوده قیمت :
                                                                            <span id="filter-price-range"></span>
                                                                        </div>&lt;!&ndash; End .filter-price-text &ndash;&gt;

                                                                        <div id="price-slider"></div>&lt;!&ndash; End #price-slider &ndash;&gt;
                                                                    </div>&lt;!&ndash; End .filter-price &ndash;&gt;
                                                                </div>&lt;!&ndash; End .widget-body &ndash;&gt;
                                                            </div>&lt;!&ndash; End .collapse &ndash;&gt;
                                                        </div>--><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

    <script>


        function changeStyle(divId, iconId) {
            const divsToHide = document.getElementsByClassName('products-area');
            for (var i = 0; i < divsToHide.length; i++) {
                divsToHide[i].style.display = "none";
            }
            document.getElementById(`${divId}`).style.display = "block";

            const iconActve = document.getElementsByClassName('activing');
            for (var j = 0; j < iconActve.length; j++) {
                iconActve[j].classList.remove('active');
            }
            document.getElementById(`${iconId}`).classList.add('active');
        }

    </script>
    <script>


        function changeStyle(divId, iconId) {
            const divsToHide = document.getElementsByClassName('products-area');
            for (var i = 0; i < divsToHide.length; i++) {
                divsToHide[i].style.display = "none";
            }
            document.getElementById(`${divId}`).style.display = "block";

            const iconActve = document.getElementsByClassName('activing');
            for (var j = 0; j < iconActve.length; j++) {
                iconActve[j].classList.remove('active');
            }
            document.getElementById(`${iconId}`).classList.add('active');
        }

    </script>
    <script>
        document.getElementById('inputSearch').addEventListener("keyup", function (evt) {

            search(this.value);
        }, false);


        function filterAll(e) {

            var text = "";
            if (e.name == "search" && e.value !== null) {

                text = e.value;
            }

            if (e.name == "fromRange" && e.value !== null) {

                fromRange = e.value;
            }

            if (e.name == "toRange" && e.value !== null) {
                toRange = e.value;

            }
            var url = '/shop/filter?search=' + text + '&fromRange=' + fromRange + '&toRange=' + toRange;

            if (e.name == "groupIds[]") {
                let opts = $(":checkbox:checked").map((i, el) => el.value).get();
                url += '&groupIds=' + opts
            }

            console.log(url);
            $.ajax({
                url: url,
                type: 'GET',
                success: function (res) {

                    var card = "";
                    var data = res.product;
                    document.getElementById('productLenght').innerHTML = data.length
                    for (var k = 0; k < data.length; k++) {

                        var item = `
 <div class="product product-list">
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <figure class="product-media">
                                                <a href="/shop/productDetail/` + data[k]['slug'] + `">
                                                    <img src="/` + data[k]['banner'] + `" alt="تصویر محصول"
                                                        class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-6 col-lg-3 order-lg-last">
                                            <div class="product-list-action">
                                                <div class="product-price">
                                                    ` + data[k]['price'] + ` تومان
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( ` + data[k]['num_visit'] + ` بازدید )</span>
                                                </div><!-- End .rating-container -->


                                                <a onclick="addToBasket(` + data[k]['id'] + `)" class="btn-product btn-cart"><span>افزودن به سبد
                                                        خرید</span></a>
                                            </div><!-- End .product-list-action -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-lg-6">
                                            <div class="product-body product-action-inner">
                                                <a onclick="addToWishlist(this,` + data[k]['id'] + `)" class="btn-product btn-wishlist"
                                                    title="افزودن به لیست علاقه مندی"><span>افزودن به لیست علاقه
                                                        مندی</span></a>
                                                <div class="product-cat">
                                                    <a href="#"> ` + data[k]['group']['title'] + `</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">` + data[k]['title'] + `</a>
                                                </h3><!-- End .product-title -->

                                                <div class="product-content">
                                                    <p> ` + data[k]['short_description'] + ` </p>
                                                </div><!-- End .product-content -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div>
                            `;
                        card += item

                    }

                    document.getElementById('showAllProduct').innerHTML = card

                }
            });


        }
    </script>

@endsection
