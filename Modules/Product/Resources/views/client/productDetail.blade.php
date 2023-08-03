@extends('client.layout.total')

@section('style')
    <link rel="stylesheet" href="/assets/css/plugins/nouislider/nouislider.css">
@stop
@section('content')
    <div class="page-content mt-2">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="/{{$data->banner}}"
                                         data-zoom-image="/{{$data->banner}}"
                                         alt="تصویر محصول">

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->

                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    <!--                                    <a class="product-gallery-item active" href="#"
                                                                           data-image="/assets/images/products/single/1.jpg"
                                                                           data-zoom-image="/assets/images/products/single/1-big.jpg">
                                                                            <img src="/assets/images/products/single/1-small.jpg"
                                                                                 alt="توضیحات تصویر">
                                                                        </a>-->
                                    @foreach($data->image as $img)
                                        <a class="product-gallery-item @if($img->is_cover) active @endif" href="#"
                                           data-image="/{{$img->url}}"
                                           data-zoom-image="/{{$img->url}}">
                                            <img src="/{{$img->url}}"
                                                 alt="توضیحات تصویر">
                                        </a>
                                    @endforeach
                                    <!--                                    <a class="product-gallery-item" href="#"
                                       data-image="/assets/images/products/single/3.jpg"
                                       data-zoom-image="/assets/images/products/single/3-big.jpg">
                                        <img src="/assets/images/products/single/3-small.jpg"
                                             alt="توضیحات تصویر">
                                    </a>

                                    <a class="product-gallery-item" href="#"
                                       data-image="/assets/images/products/single/4.jpg"
                                       data-zoom-image="/assets/images/products/single/4-big.jpg">
                                        <img src="/assets/images/products/single/4-small.jpg" alt="product back">
                                    </a>-->
                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div>

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{$data->full_title}}</h1>
                            <!-- End .product-title -->

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: {{$data->avg_rate}}%;"></div>
                                    <!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <a class="ratings-text" href="#product-review-link"
                                   id="review-link">( {{$data->num_visit}} نظر
                                    )</a>
                            </div><!-- End .rating-container -->

                            <div class="product-price">
                                {{$data->price}} تومان
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p>{{$data->short_description}}
                                </p>
                            </div><!-- End .product-content -->
                            @if(count($data->color) != 0)
                                <div class="details-filter-row details-row-size">
                                    <label>رنگ : </label>

                                    <div class="product-nav product-nav-thumbs">
                                        @foreach($data->color as $colour)
                                            <a href="#">
                                                {{--<img src="/assets/images/products/single/1-thumb.jpg" alt="product desc">--}}
                                                <div
                                                    style="width: 50px ; height:40px; background-color: {{$colour->code}}"></div>
                                            </a>
                                        @endforeach

                                    </div><!-- End .product-nav -->
                                </div><!-- End .details-filter-row -->
                            @endif
                            @if(count($data->size) != 0)
                                <div class="details-filter-row details-row-size">
                                    <label for="size">سایز : </label>
                                    <div class="select-custom">
                                        <select name="size" id="size" class="form-control">
                                            <option value="#" selected="selected">سایز را انتخاب کنید</option>
                                            @if(count($data->size) > 0)
                                                @foreach($data->size as $item)
                                                @endforeach
                                            @else
                                                <option value="s">کوچک (Small)</option>
                                                <option value="m">متوسط (Medium)</option>
                                                <option value="l">بزرگ (Large)</option>
                                                <option value="xl">خیلی بزرگ (XLarge)</option>
                                            @endif
                                        </select>
                                    </div><!-- End .select-custom -->

                                    <a href="#" class="size-guide"><i class="icon-th-list"></i>راهنمای اندازه</a>
                                </div><!-- End .details-filter-row -->
                            @endif

                            <div class="details-filter-row details-row-size">
                                <label for="qty">تعداد : </label>
                                <div class="product-details-quantity">
                                    <input type="number" id="qty" class="form-control" value="1" min="1"
                                           max="10" step="1" data-decimals="0" required>
                                </div><!-- End .product-details-quantity -->
                            </div><!-- End .details-filter-row -->

                            <div class="product-details-action">
                                <button class="btn-product btn-cart" onclick="submitData({{$data->id}})">
                                    <span>افزودن به سبد خرید</span></button>

                                <div class="details-action-wrapper">
                                    <a onclick="addToWishlist({{$data->id}})" class="btn-product btn-wishlist"
                                       title="لیست علاقه مندی"><span>افزودن
                                                    به
                                                    علاقه مندی</span></a>

                                </div><!-- End .details-action-wrapper -->
                            </div><!-- End .product-details-action -->

                            <div class="product-details-footer">
                                <div class="product-cat text-center">
                                    <span>دسته بندی : </span>
                                    <a href="#">{{$data->group->title}}</a>،
                                </div><!-- End .product-cat -->

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">اشتراک گذاری : </span>
                                    <a href="#" class="social-icon" title="فیسبوک" target="_blank"><i
                                            class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="توییتر" target="_blank"><i
                                            class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="اینستاگرام" target="_blank"><i
                                            class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="پینترست" target="_blank"><i
                                            class="icon-pinterest"></i></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab"
                           href="#product-desc-tab" role="tab" aria-controls="product-desc-tab"
                           aria-selected="true">توضیحات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab"
                           role="tab" aria-controls="product-info-tab" aria-selected="false">اطلاعات بیشتر</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab"
                           href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab"
                           aria-selected="false">ارسال و بازگشت</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-review-link" data-toggle="tab"
                           href="#product-review-tab" role="tab" aria-controls="product-review-tab"
                           aria-selected="false">نظرات ({{count($data->comments)}})</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                         aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>اطلاعات محصول</h3>
                            {!! $data->long_description !!}
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel"
                         aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <h3>اطلاعات</h3>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                                سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوملورم ایپسوم متن
                                ساختگی با تولید سادگی نامفهوملورم ایپسوم متن ساختگی با تولید سادگی نامفهوملورم
                                ایپسوم متن ساختگی با تولید سادگی نامفهوم. </p>

                            <h3>اطلاعات بیشتر</h3>
                            <ul>
                                <li>لورم ایپسوم متن ساختگی</li>
                                <li>لورم ایپسوم متن ساختگی با تولید سادگی</li>
                                <li>لورم ایپسوم</li>
                                <li>لورم ایپسوم متن ساختگی</li>
                                <li>لورم ایپسوم متن ساختگی با تولید سادگی</li>
                                <li> ارتفاع: 31سانتی متر; عرض: 32سانتی متر; عمق: 12سانتی متر</li>
                            </ul>

                            <h3>سایز</h3>
                            <p>تک سایز</p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                         aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <h3>ارسال و بازگشت</h3>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                                سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                ساختگی با تولید سادگی نامفهوم<br>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                                سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوملورم ایپسوم متن
                                ساختگی با تولید سادگی نامفهوملورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.
                            </p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                         aria-labelledby="product-review-link">
                        <div class="reviews">

                            @foreach($data->comments as $command)
                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">@if($command->user and $command->user->username) {{$command->user->username}} @else کاربر عادی @endif</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">2 روز پیش</span>
                                        </div><!-- End .col -->
                                        <div class="col-12">
<!--                                            <h4>خیلی عالی</h4>-->

                                            <div class="review-content">
                                                <p>{{$command->content}}</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>مثبت (0)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>منفی (0)</a>
                                            </div>

                                            <!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->
                            @endforeach
                            <div class="reply">
                                <div class="heading">
                                    <h3 class="title">ارسال یک دیدگاه</h3><!-- End .title -->
                                    <p class="title-desc">ایمیل شما منتشر نخواهد شد، فیلد های اجباری با علامت * مشخص
                                        شده اند.</p>
                                </div><!-- End .heading -->

                                @if(Session::has('success'))
                                    <div class="alert alert-success mt-3">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            &times;
                                        </button>
                                        <strong></strong> {{ Session::get('message', '') }}
                                    </div>
                                @endif
                                @if(count($errors) > 0 )
                                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
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
                                <form class="form" method="post" action="{{route('comment_store')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input name="productId" value="{{$data->id}}" hidden>
                                    <label for="reply-message" class="sr-only">دیدگاه</label>
                                    <textarea name="comment" id="reply-message" cols="30" rows="4"
                                              class="form-control" required placeholder="دیدگاه شما *"></textarea>

                                    <!--
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="reply-name" class="sr-only">نام</label>
                                                                        <input type="text" class="form-control" id="reply-name" name="reply-name"
                                                                               required placeholder="نام شما *">
                                                                    </div>&lt;!&ndash; End .col-md-6 &ndash;&gt;

                                                                    <div class="col-md-6">
                                                                        <label for="reply-email" class="sr-only">ایمیل</label>
                                                                        <input type="email" class="form-control" id="reply-email" name="reply-email"
                                                                               required placeholder="ایمیل شما *">
                                                                    </div>&lt;!&ndash; End .col-md-6 &ndash;&gt;
                                                                </div>&lt;!&ndash; End .row &ndash;&gt;
                                    -->

                                    <button type="submit" class="btn btn-outline-primary-2 float-right">
                                        <span>ارسال دیدگاه</span>
                                        <i class="icon-long-arrow-left"></i>
                                    </button>
                                </form>
                            </div>
                        </div><!-- End .نظر -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->
            <!--
                        <h2 class="title text-center mb-4">محصولاتی که شاید بپسندید</h2>&lt;!&ndash; End .title text-center &ndash;&gt;

                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                             data-owl-options='{
                                        "nav": false,
                                        "dots": true,
                                        "margin": 20,
                                        "loop": false,
                                        "rtl": true,
                                        "responsive": {
                                            "0": {
                                                "items":1
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            },
                                            "1200": {
                                                "items":4,
                                                "nav": true,
                                                "dots": false
                                            }
                                        }
                                    }'>
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <span class="product-label label-new">جدید</span>
                                    <a href="product.html">
                                        <img src="/assets/images/products/product-4.jpg" alt="تصویر محصول"
                                             class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                           title="مشاهده سریع"><span>مشاهده سریع</span></a>
                                        <a href="#" class="btn-product-icon btn-compare" title="مقایسه"><span>لیست
                                                        مقایسه</span></a>
                                    </div>&lt;!&ndash; End .product-action-vertical &ndash;&gt;

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div>&lt;!&ndash; End .product-action &ndash;&gt;
                                </figure>&lt;!&ndash; End .product-media &ndash;&gt;

                                <div class="product-body">
                                    <div class="product-cat text-center">
                                        <a href="#">زنانه</a>
                                    </div>&lt;!&ndash; End .product-cat &ndash;&gt;
                                    <h3 class="product-title text-center"><a href="product.html">دامن چرم قهوه ای</a></h3>
                                    &lt;!&ndash; End .product-title &ndash;&gt;
                                    <div class="product-price">
                                        60,000 تومان
                                    </div>&lt;!&ndash; End .product-price &ndash;&gt;
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 20%;"></div>&lt;!&ndash; End .ratings-val &ndash;&gt;
                                        </div>&lt;!&ndash; End .ratings &ndash;&gt;
                                        <span class="ratings-text">( 2 دیدگاه )</span>
                                    </div>&lt;!&ndash; End .rating-container &ndash;&gt;

                                    <div class="product-nav product-nav-thumbs">
                                        <a href="#" class="active">
                                            <img src="/assets/images/products/product-4-thumb.jpg" alt="product desc">
                                        </a>
                                        <a href="#">
                                            <img src="/assets/images/products/product-4-2-thumb.jpg" alt="product desc">
                                        </a>

                                        <a href="#">
                                            <img src="/assets/images/products/product-4-3-thumb.jpg" alt="product desc">
                                        </a>
                                    </div>&lt;!&ndash; End .product-nav &ndash;&gt;
                                </div>&lt;!&ndash; End .product-body &ndash;&gt;
                            </div>&lt;!&ndash; End .product &ndash;&gt;

                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <span class="product-label label-out">ناموجود</span>
                                    <a href="product.html">
                                        <img src="/assets/images/products/product-6.jpg" alt="تصویر محصول"
                                             class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                           title="مشاهده سریع"><span>مشاهده سریع</span></a>
                                        <a href="#" class="btn-product-icon btn-compare" title="مقایسه"><span>لیست
                                                        مقایسه</span></a>
                                    </div>&lt;!&ndash; End .product-action-vertical &ndash;&gt;

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div>&lt;!&ndash; End .product-action &ndash;&gt;
                                </figure>&lt;!&ndash; End .product-media &ndash;&gt;

                                <div class="product-body">
                                    <div class="product-cat text-center">
                                        <a href="#">ژاکت</a>
                                    </div>&lt;!&ndash; End .product-cat &ndash;&gt;
                                    <h3 class="product-title text-center"><a href="product.html">بلوز شلوار خاکی</a></h3>
                                    &lt;!&ndash; End .product-title &ndash;&gt;
                                    <div class="product-price">
                                        <span class="out-price">120,000 تومان</span>
                                    </div>&lt;!&ndash; End .product-price &ndash;&gt;
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div>&lt;!&ndash; End .ratings-val &ndash;&gt;
                                        </div>&lt;!&ndash; End .ratings &ndash;&gt;
                                        <span class="ratings-text">( 6 دیدگاه )</span>
                                    </div>&lt;!&ndash; End .rating-container &ndash;&gt;
                                </div>&lt;!&ndash; End .product-body &ndash;&gt;
                            </div>&lt;!&ndash; End .product &ndash;&gt;

                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <span class="product-label label-top">برتر</span>
                                    <a href="product.html">
                                        <img src="/assets/images/products/product-11.jpg" alt="تصویر محصول"
                                             class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                           title="مشاهده سریع"><span>مشاهده سریع</span></a>
                                        <a href="#" class="btn-product-icon btn-compare" title="مقایسه"><span>لیست
                                                        مقایسه</span></a>
                                    </div>&lt;!&ndash; End .product-action-vertical &ndash;&gt;

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div>&lt;!&ndash; End .product-action &ndash;&gt;
                                </figure>&lt;!&ndash; End .product-media &ndash;&gt;

                                <div class="product-body">
                                    <div class="product-cat text-center">
                                        <a href="#">کفش</a>
                                    </div>&lt;!&ndash; End .product-cat &ndash;&gt;
                                    <h3 class="product-title text-center"><a href="product.html">کش زنانه قهوه ای پاشنه
                                            دار</a>
                                    </h3>&lt;!&ndash; End .product-title &ndash;&gt;
                                    <div class="product-price">
                                        110,000 تومان
                                    </div>&lt;!&ndash; End .product-price &ndash;&gt;
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div>&lt;!&ndash; End .ratings-val &ndash;&gt;
                                        </div>&lt;!&ndash; End .ratings &ndash;&gt;
                                        <span class="ratings-text">( 1 دیدگاه )</span>
                                    </div>&lt;!&ndash; End .rating-container &ndash;&gt;

                                    <div class="product-nav product-nav-thumbs">
                                        <a href="#" class="active">
                                            <img src="/assets/images/products/product-11-thumb.jpg" alt="product desc">
                                        </a>
                                        <a href="#">
                                            <img src="/assets/images/products/product-11-2-thumb.jpg" alt="product desc">
                                        </a>

                                        <a href="#">
                                            <img src="/assets/images/products/product-11-3-thumb.jpg" alt="product desc">
                                        </a>
                                    </div>&lt;!&ndash; End .product-nav &ndash;&gt;
                                </div>&lt;!&ndash; End .product-body &ndash;&gt;
                            </div>&lt;!&ndash; End .product &ndash;&gt;

                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="/assets/images/products/product-10.jpg" alt="تصویر محصول"
                                             class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                           title="مشاهده سریع"><span>مشاهده سریع</span></a>
                                        <a href="#" class="btn-product-icon btn-compare" title="مقایسه"><span>لیست
                                                        مقایسه</span></a>
                                    </div>&lt;!&ndash; End .product-action-vertical &ndash;&gt;

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div>&lt;!&ndash; End .product-action &ndash;&gt;
                                </figure>&lt;!&ndash; End .product-media &ndash;&gt;

                                <div class="product-body">
                                    <div class="product-cat text-center">
                                        <a href="#">لباس زنانه</a>
                                    </div>&lt;!&ndash; End .product-cat &ndash;&gt;
                                    <h3 class="product-title text-center"><a href="product.html">لباس زنانه دکمه دار رنگ
                                            زرد</a></h3>
                                    &lt;!&ndash; End .product-title &ndash;&gt;
                                    <div class="product-price">
                                        56,000 تومان
                                    </div>&lt;!&ndash; End .product-price &ndash;&gt;
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 0%;"></div>&lt;!&ndash; End .ratings-val &ndash;&gt;
                                        </div>&lt;!&ndash; End .ratings &ndash;&gt;
                                        <span class="ratings-text">( 0 دیدگاه )</span>
                                    </div>&lt;!&ndash; End .rating-container &ndash;&gt;
                                </div>&lt;!&ndash; End .product-body &ndash;&gt;
                            </div>&lt;!&ndash; End .product &ndash;&gt;

                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="/assets/images/products/product-7.jpg" alt="تصویر محصول"
                                             class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>افزودن به
                                                        لیست علاقه مندی</span></a>
                                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                           title="مشاهده سریع"><span>مشاهده سریع</span></a>
                                        <a href="#" class="btn-product-icon btn-compare" title="مقایسه"><span>لیست
                                                        مقایسه</span></a>
                                    </div>&lt;!&ndash; End .product-action-vertical &ndash;&gt;

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>افزودن به سبد خرید</span></a>
                                    </div>&lt;!&ndash; End .product-action &ndash;&gt;
                                </figure>&lt;!&ndash; End .product-media &ndash;&gt;

                                <div class="product-body">
                                    <div class="product-cat text-center">
                                        <a href="#">لی</a>
                                    </div>&lt;!&ndash; End .product-cat &ndash;&gt;
                                    <h3 class="product-title text-center"><a href="product.html">لباس آبی زنانه</a>
                                    </h3>&lt;!&ndash; End .product-title &ndash;&gt;
                                    <div class="product-price">
                                        76,000 تومان
                                    </div>&lt;!&ndash; End .product-price &ndash;&gt;
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 20%;"></div>&lt;!&ndash; End .ratings-val &ndash;&gt;
                                        </div>&lt;!&ndash; End .ratings &ndash;&gt;
                                        <span class="ratings-text">( 2 دیدگاه )</span>
                                    </div>&lt;!&ndash; End .rating-container &ndash;&gt;
                                </div>&lt;!&ndash; End .product-body &ndash;&gt;
                            </div>&lt;!&ndash; End .product &ndash;&gt;
                        </div>
                        -->
            <!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->

@stop

@section('script')

    <script src="/assets/js/jquery.elevateZoom.min.js"></script>

    <script>
        function submitData(id) {
            var number = document.getElementById('qty').value;
            addToBasket(id, number)
        }
    </script>

@endsection
