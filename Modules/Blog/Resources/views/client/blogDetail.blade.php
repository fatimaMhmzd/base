@extends('client.layout.total')
@section('content')

    <main class="main">
    <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">{{$data->blog->title}}<span>{{$data->blog->sub_title}}</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{route('indexClient')}}>خانه</a></li>
                <li class="breadcrumb-item"><a href={{route('blog_list')}}>مقالات</a></li>
                <li class="breadcrumb-item active" aria-current="page">جزئیات مقاله</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article class="entry single-entry">
                        <figure class="entry-media">
                            <img src="{{$data->blog->image ? "/".$data->blog->image->url : "/assets/images/blog/grid/3cols/post-1.jpg"}}" alt="{{$data->blog->slug}}">
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                        <span class="entry-author">
                                            نویسنده : <a href="#">{{$data->blog->user->full_name  ?? "مدیر سایت" }}</a>
                                        </span>
                                <span class="meta-separator">|</span>
                                <a href="#">{{$data->blog->date_shamsi}}</a>
                                <span class="meta-separator">|</span>
{{--                                <a href="#">{{count($data->comment)}} دیدگاه</a>--}}
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title">
                                {{$data->blog->description}}
                            </h2><!-- End .entry-title -->

<!--                            <div class="entry-cats">
                                <a href="#">سبک زندگی</a>،
                                <a href="#">فروشگاه</a>
                            </div>-->
                            <!-- End .entry-cats -->

                            <div class="entry-content editor-content">
                              @ {!! $data->blog->content !!}
                            </div><!-- End .entry-content -->

                            <div class="entry-footer row no-gutters flex-column flex-md-row">
                                <div class="col-md">
                                    <div class="entry-tags">
                                        <span>برچسب : </span>
                                        @foreach($data->blog->lables as $label)
                                        <a href="#">{{$label->title}}</a>
                                        @endforeach
                                    </div><!-- End .entry-tags -->
                                </div><!-- End .col -->

                                <div class="col-md-auto mt-2 mt-md-0">
                                    <div class="social-icons social-icons-color">
                                        <span class="social-label">اشتراک گذاری این پست : </span>
                                        <a href="#" class="social-icon social-facebook" title="فیسبوک"
                                           target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon social-twitter" title="توییتر"
                                           target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon social-pinterest" title="پینترست"
                                           target="_blank"><i class="icon-pinterest"></i></a>
                                        <a href="#" class="social-icon social-linkedin" title="لینکدین"
                                           target="_blank"><i class="icon-linkedin"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .col-auto -->
                            </div><!-- End .entry-footer row no-gutters -->
                        </div><!-- End .entry-body -->

                        <div class="entry-author-details">
                            <figure class="author-media">
                                <a href="#">
                                    <img src="/assets/images/blog/single/author.jpg" alt="User name">
                                </a>
                            </figure><!-- End .author-media -->

                            <div class="author-body">
                                <div class="author-header row no-gutters flex-column flex-md-row">
                                    <div class="col-12">
                                        <h4><a href="#">مدیر سایت</a></h4>
                                    </div><!-- End .col -->
                                    <div class="col-auto mt-1 mt-md-0">
                                        <a href="#" class="author-link">مشاهده همه پست های این نویسنده <i
                                                class="icon-long-arrow-left"></i></a>
                                    </div><!-- End .col -->
                                </div><!-- End .row -->

                                <div class="author-content">
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با
                                        تولید سادگی نامفهوملورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم
                                        ایپسوم متن ساختگی با تولید سادگی
                                    </p>
                                </div><!-- End .author-content -->
                            </div><!-- End .author-body -->
                        </div><!-- End .entry-author-details-->
                    </article><!-- End .entry -->

                    <nav class="pager-nav" aria-label="Page navigation">
                        <a class="pager-link pager-link-prev" href="#" aria-label="Previous" tabindex="-1">
                            پست قبلی
                            <span class="pager-link-title">لورم ایپسوم متن ساختگی با تولید سادگی</span>
                        </a>

                        <a class="pager-link pager-link-next" href="#" aria-label="Next" tabindex="-1">
                            پست بعدی
                            <span class="pager-link-title">لورم ایپسوم متن ساختگی</span>
                        </a>
                    </nav><!-- End .pager-nav -->

<!--                    <div class="related-posts">
                        <h3 class="title">پست های مرتبط</h3>&lt;!&ndash; End .title &ndash;&gt;

                        <div class="owl-carousel owl-simple" data-toggle="owl" data-owl-options='{
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
                                            }
                                        }
                                    }'>
                            <article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="single.html">
                                        <img src="/assets/images/blog/grid/3cols/post-1.jpg" alt="توضیحات عکس">
                                    </a>
                                </figure>&lt;!&ndash; End .entry-media &ndash;&gt;

                                <div class="entry-body">
                                    <div class="entry-meta justify-content-start">
                                        <a href="#">22 اسفند 1401</a>
                                        <span class="meta-separator">|</span>
                                        <a href="#">2 دیدگاه</a>
                                    </div>&lt;!&ndash; End .entry-meta &ndash;&gt;

                                    <h2 class="entry-title">
                                        <a href="/single.html">لورم ایپسوم متن ساختگی با تولید سادگی</a>
                                    </h2>&lt;!&ndash; End .entry-title &ndash;&gt;

                                    <div class="entry-cats">
                                        <a href="#">سبک زندگی</a>،
                                        <a href="#">فروشگاه</a>
                                    </div>&lt;!&ndash; End .entry-cats &ndash;&gt;
                                </div>&lt;!&ndash; End .entry-body &ndash;&gt;
                            </article>&lt;!&ndash; End .entry &ndash;&gt;

                            <article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="single.html">
                                        <img src="/assets/images/blog/grid/3cols/post-2.jpg" alt="توضیحات عکس">
                                    </a>
                                </figure>&lt;!&ndash; End .entry-media &ndash;&gt;

                                <div class="entry-body">
                                    <div class="entry-meta justify-content-start">
                                        <a href="#">21 اسفند 1401</a>
                                        <span class="meta-separator">|</span>
                                        <a href="#">0 دیدگاه</a>
                                    </div>&lt;!&ndash; End .entry-meta &ndash;&gt;

                                    <h2 class="entry-title">
                                        <a href="single.html">لورم ایپسوم متن ساختگی</a>
                                    </h2>&lt;!&ndash; End .entry-title &ndash;&gt;

                                    <div class="entry-cats">
                                        <a href="#">سبک زندگی</a>
                                    </div>&lt;!&ndash; End .entry-cats &ndash;&gt;
                                </div>&lt;!&ndash; End .entry-body &ndash;&gt;
                            </article>&lt;!&ndash; End .entry &ndash;&gt;

                            <article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="single.html">
                                        <img src="/assets/images/blog/grid/3cols/post-3.jpg" alt="توضیحات عکس">
                                    </a>
                                </figure>&lt;!&ndash; End .entry-media &ndash;&gt;

                                <div class="entry-body">
                                    <div class="entry-meta justify-content-start">
                                        <a href="#">18 اسفند 1401</a>
                                        <span class="meta-separator">|</span>
                                        <a href="#">3 دیدگاه</a>
                                    </div>&lt;!&ndash; End .entry-meta &ndash;&gt;

                                    <h2 class="entry-title">
                                        <a href="single.html">لورم ایپسوم متن ساختگی.</a>
                                    </h2>&lt;!&ndash; End .entry-title &ndash;&gt;

                                    <div class="entry-cats">
                                        <a href="#">مد</a>،
                                        <a href="#">سبک زندگی</a>
                                    </div>&lt;!&ndash; End .entry-cats &ndash;&gt;
                                </div>&lt;!&ndash; End .entry-body &ndash;&gt;
                            </article>&lt;!&ndash; End .entry &ndash;&gt;

                            <article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="single.html">
                                        <img src="/assets/images/blog/grid/3cols/post-4.jpg" alt="توضیحات عکس">
                                    </a>
                                </figure>&lt;!&ndash; End .entry-media &ndash;&gt;

                                <div class="entry-body">
                                    <div class="entry-meta justify-content-start">
                                        <a href="#">15 اسفند 1401</a>
                                        <span class="meta-separator">|</span>
                                        <a href="#">4 دیدگاه</a>
                                    </div>&lt;!&ndash; End .entry-meta &ndash;&gt;

                                    <h2 class="entry-title">
                                        <a href="single.html">لورم ایپسوم متن ساختگی</a>
                                    </h2>&lt;!&ndash; End .entry-title &ndash;&gt;

                                    <div class="entry-cats">
                                        <a href="#">سفر</a>
                                    </div>&lt;!&ndash; End .entry-cats &ndash;&gt;
                                </div>&lt;!&ndash; End .entry-body &ndash;&gt;
                            </article>&lt;!&ndash; End .entry &ndash;&gt;
                        </div>&lt;!&ndash; End .owl-carousel &ndash;&gt;
                    </div>--><!-- End .related-posts -->

                    <div class="comments">
                        <h3 class="title">{{count($data->blog->comments)}} دیدگاه</h3><!-- End .title -->

                        <ul>
                            @foreach($data->blog->comments as $comment)
                            <li>
                                <div class="comment">
                                    <figure class="comment-media">
                                        <a href="#">
                                            <img  src="/assets/images/blog/comments/1.jpg" alt="User name">
                                        </a>
                                    </figure>

                                    <div class="comment-body">
<!--                                        <a href="#" class="comment-reply">پاسخ</a>-->
                                        <div class="comment-user">
                                            <h4><a href="#">@if($comment->name) {{$comment->name}} @else کاربر عادی @endif</a></h4>
                                            <span class="comment-date">{{$comment->date_shamsi}}</span>
                                        </div> <!-- End .comment-user -->

                                        <div class="comment-content">
                                            <p>{{ htmlspecialchars($comment->content) }}
                                            </p>
                                        </div><!-- End .comment-content -->
                                    </div><!-- End .comment-body -->
                                </div><!-- End .comment -->

<!--                                <ul>
                                    <li>
                                        <div class="comment">
                                            <figure class="comment-media">
                                                <a href="#">
                                                    <img src="/assets/images/blog/comments/2.jpg"
                                                         alt="User name">
                                                </a>
                                            </figure>

                                            <div class="comment-body">
                                                <a href="#" class="comment-reply">پاسخ</a>
                                                <div class="comment-user">
                                                    <h4><a href="#">کاربر 2</a></h4>
                                                    <span class="comment-date">9 اسفند 1401 - 2:19
                                                                بعدازظهر</span>
                                                </div>&lt;!&ndash; End .comment-user &ndash;&gt;

                                                <div class="comment-content">
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.</p>
                                                </div>&lt;!&ndash; End .comment-content &ndash;&gt;
                                            </div>&lt;!&ndash; End .comment-body &ndash;&gt;
                                        </div>&lt;!&ndash; End .comment &ndash;&gt;
                                    </li>
                                </ul>-->
                            </li>

                            @endforeach
                        </ul>
                    </div><!-- End .comments -->
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
                            <input name="blogId" value="{{$data->blog->id}}" hidden>
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
                    </div><!-- End .reply -->
                </div><!-- End .col-lg-9 -->

                <aside class="col-lg-3">
                    <div class="sidebar">
                        <div class="widget widget-search">
                            <h3 class="widget-title">جستجو</h3><!-- End .widget-title -->

                            <form method="get" action="{{route('blog_list')}}">
                                <label for="ws" class="sr-only">جستجوی اخبار</label>
                                <input type="search" class="form-control" name="search" id="ws"
                                       placeholder="جستجوی خبر مورد نظر" required>
                                <button type="submit" class="btn"><i class="icon-search"></i><span
                                        class="sr-only">جستجو</span></button>
                            </form>
                        </div><!-- End .widget -->

                        <div class="widget widget-cats">
                            <h3 class="widget-title">دسته بندی ها</h3><!-- End .widget-title -->

                            <ul>
                                @foreach($data->group as $group)
                                <li><a href="{{route('blog_list',$group->slug)}}">{{$group->title}}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- End .widget -->

                        <div class="widget">
                            <h3 class="widget-title">محبوب ترین اخبار</h3><!-- End .widget-title -->

                            <ul class="posts-list">
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="/assets/images/blog/sidebar/post-1.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>22 اسفند 1401</span>
                                        <h4><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="/assets/images/blog/sidebar/post-2.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>19 اسفند 1401</span>
                                        <h4><a href="#">لورم ایپسوم متن ساختگی</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="/assets/images/blog/sidebar/post-3.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>12 اسفند 1401</span>
                                        <h4><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="/assets/images/blog/sidebar/post-4.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>25 اسفند 1401</span>
                                        <h4><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h4>
                                    </div>
                                </li>
                            </ul><!-- End .posts-list -->
                        </div><!-- End .widget -->

                        <div class="widget widget-banner-sidebar">
                            <div class="banner-sidebar-title">قسمت تبلیغات 280 در 280</div>
                            <!-- End .ad-title -->

                            <div class="banner-sidebar banner-overlay">
                                <a href="#">
                                    <img src="/assets/images/blog/sidebar/banner.jpg" alt="بنر">
                                </a>
                            </div><!-- End .banner-ad -->
                        </div><!-- End .widget -->

                        <div class="widget">
                            <h3 class="widget-title">برچسب ها</h3><!-- End .widget-title -->

                            <div class="tagcloud">
                                <a href="#">مد</a>
                                <a href="#">استایل</a>
                                <a href="#">زنانه</a>
                                <a href="#">عکس</a>
                                <a href="#">سفر</a>
                                <a href="#">خرید</a>
                                <a href="#">سرگرمی</a>
                            </div><!-- End .tagcloud -->
                        </div><!-- End .widget -->

                        <div class="widget widget-text">
                            <h3 class="widget-title">درباره بخش اخبار</h3><!-- End .widget-title -->

                            <div class="widget-text-content">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی با
                                    تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با لورم ایپسوم متن ساختگی با
                                    تولید سادگی نامفهوم</p>
                            </div><!-- End .widget-text-content -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
