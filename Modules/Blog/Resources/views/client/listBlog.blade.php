@extends('client.layout.total')
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">لیست مقالات<span>بلاگ</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{route('indexClient')}}>خانه</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">مقالات</a></li>

            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <nav class="blog-nav">
                <ul class="menu-cat entry-filter justify-content-center">
                    <li class="active"><a href="#" data-filter="*">همه اخبار</a></li>
                    @if(count($blogGroup) > 0)
                    @foreach($blogGroup as $group)
                        <li><a href="{{route('blog_list',$group->slug)}}" data-filter=".{{$group->sub_title}}">{{$group->title}}</a></li>
                    @endforeach
                    @else
                    <li><a href="#" data-filter=".lifestyle">سبک زندگی<span>3</span></a></li>
                    <li><a href="#" data-filter=".shopping">فروشگاه<span>1</span></a></li>
                    <li><a href="#" data-filter=".fashion">مد<span>2</span></a></li>
                    <li><a href="#" data-filter=".travel">سفر<span>4</span></a></li>
                    <li><a href="#" data-filter=".hobbies">سرگرمی<span>2</span></a></li>
                    @endif
                </ul><!-- End .blog-menu -->
            </nav><!-- End .blog-nav -->

            <div class="entry-container max-col-3" data-layout="fitRows" dir="rtl">

                @if(count($blogGroup) > 0)
                    @foreach($blogGroup as $group)
                        @if(count($group->blogs) > 0)
                            @foreach($group->blogs as $blog)
                                <div class="entry-item lifestyle shopping col-sm-6 col-lg-4">
                                    <article class="entry entry-grid text-center">
                                        <figure class="entry-media">
                                            <a href={{route('blog_blogDetail', $blog->slug)}}>
                                                <img src="{{$blog->image ? "/".$blog->image->url : "/assets/images/blog/grid/3cols/post-1.jpg"}}" alt="توضیحات عکس">
                                            </a>
                                        </figure><!-- End .entry-media -->

                                        <div class="entry-body">
                                            <div class="entry-meta">
                                        <span class="entry-author">
                                            نویسنده : <a href="#">{{$blog->user->full_name ?? "مدیر سایت"}}</a>
                                        </span>
                                                <span class="meta-separator">|</span>
                                                <a href="#">{{$blog->date_shamsi}}</a>
                                                <span class="meta-separator">|</span>
                                                <a href="#">{{count($blog->comments)}} دیدگاه</a>
{{--                                                {{count($blog->comments)}}--}}
                                            </div><!-- End .entry-meta -->

                                            <h2 class="entry-title text-center">
                                                <a href={{route('blog_blogDetail', $blog->slug)}}>{{$blog->title}}</a>
                                            </h2><!-- End .entry-title -->

                                            <div class="entry-cats text-center">
                                                <a href="#">{{$group->title}}</a>
                                            </div><!-- End .entry-cats -->

                                            <div class="entry-content text-center">
                                                <p>{{ substr($blog->content , 0, 199)."....." }}</p>
                                                <a href={{route('blog_blogDetail', $blog->slug)}} class="read-more">ادامه
                                                    خواندن</a>
                                            </div><!-- End .entry-content -->
                                        </div><!-- End .entry-body -->
                                    </article><!-- End .entry -->
                                </div><!-- End .entry-item -->
                            @endforeach
                        @endif
                    @endforeach
                @else

                <div class="entry-item lifestyle shopping col-sm-6 col-lg-4">
                    <article class="entry entry-grid text-center">
                        <figure class="entry-media">
                            <a href={{route('blog_blogDetail', $blogGroup[0]->slug)}}>
                                <img src="/assets/images/blog/grid/3cols/post-1.jpg" alt="توضیحات عکس">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                        <span class="entry-author">
                                            نویسنده : <a href="#">مدیر سایت</a>
                                        </span>
                                <span class="meta-separator">|</span>
                                <a href="#">22 اسفند 1401</a>
                                <span class="meta-separator">|</span>
                                <a href="#">2 دیدگاه</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title text-center">
                                <a href={{route('blog_blogDetail', $blogGroup[0]->slug)}}>لورم ایپسوم متن ساختگی با تولید سادگی</a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats text-center">
                                <a href="#">سبک زندگی</a>،
                                <a href="#">فروشگاه</a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content text-center">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                    ساختگی با تولید سادگی نامفهوم ...</p>
                                <a href={{route('blog_blogDetail', $blogGroup[0]->slug)}} class="read-more">ادامه
                                    خواندن</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .entry-item -->

                <div class="entry-item lifestyle col-sm-6 col-lg-4">
                    <article class="entry entry-grid text-center">
                        <figure class="entry-media entry-video">
                            <a href={{route('blog_blogDetail', $blogGroup[0]->slug)}}>
                                <img src="/assets/images/blog/grid/3cols/post-2.jpg" alt="توضیحات عکس">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                        <span class="entry-author">
                                            نویسنده : <a href="#">مدیر سایت</a>
                                        </span>
                                <span class="meta-separator">|</span>
                                <a href="#">21 اسفند 1401</a>
                                <span class="meta-separator">|</span>
                                <a href="#">0 دیدگاه</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title text-center">
                                <a href={{route('blog_blogDetail', $blogGroup[0]->slug)}}>لورم ایپسوم متن ساختگی با تولید سادگی</a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats text-center">
                                <a href="#">سبک زندگی</a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content text-center">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                    ساختگی با تولید سادگی نامفهوم ...</p>
                                <a href={{route('blog_blogDetail', $blogGroup[0]->slug)}} class="read-more">ادامه
                                    خواندن</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .entry-item -->

                <div class="entry-item lifestyle fashion col-sm-6 col-lg-4">
                    <article class="entry entry-grid text-center">
                        <figure class="entry-media">
                            <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl"
                                 data-owl-options='{"rtl": true}'>
                                <a href={{route('blog_blogDetail', $blogGroup[0]->slug)}}>
                                    <img src="/assets/images/blog/grid/3cols/post-3.jpg" alt="توضیحات عکس">
                                </a>
                                <a href={{route('blog_blogDetail', $blogGroup[0]->slug)}}>
                                    <img src="/assets/images/blog/grid/3cols/post-4.jpg" alt="توضیحات عکس">
                                </a>
                            </div><!-- End .owl-carousel -->
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                        <span class="entry-author">
                                            نویسنده : <a href="#">مدیر سایت</a>
                                        </span>
                                <span class="meta-separator">|</span>
                                <a href="#">18 اسفند 1401</a>
                                <span class="meta-separator">|</span>
                                <a href="#">3 دیدگاه</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title text-center">
                                <a href="single.html">لورم ایپسوم متن ساختگی.</a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats text-center">
                                <a href="#">مد</a>،
                                <a href="#">سبک زندگی</a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content text-center">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                    ساختگی با تولید سادگی نامفهوم ... </p>
                                <a href="single.html" class="read-more">ادامه
                                    خواندن</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .entry-item -->

                <div class="entry-item travel col-sm-6 col-lg-4">
                    <article class="entry entry-grid text-center">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="/assets/images/blog/grid/3cols/post-4.jpg" alt="توضیحات عکس">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                        <span class="entry-author">
                                            نویسنده : <a href="#">مدیر سایت</a>
                                        </span>
                                <span class="meta-separator">|</span>
                                <a href="#">15 اسفند 1401</a>
                                <span class="meta-separator">|</span>
                                <a href="#">4 دیدگاه</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title text-center">
                                <a href="single.html">لورم ایپسوم متن ساختگی</a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats text-center">
                                <a href="#">سفر</a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content text-center">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                    ساختگی با تولید سادگی نامفهوم ... </p>
                                <a href="single.html" class="read-more">ادامه
                                    خواندن</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .entry-item -->

                <div class="entry-item travel hobbies col-sm-6 col-lg-4">
                    <article class="entry entry-grid text-center">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="/assets/images/blog/grid/3cols/post-5.jpg" alt="توضیحات عکس">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                        <span class="entry-author">
                                            نویسنده : <a href="#">مدیر سایت</a>
                                        </span>
                                <span class="meta-separator">|</span>
                                <a href="#">11 اسفند 1401</a>
                                <span class="meta-separator">|</span>
                                <a href="#">2 دیدگاه</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title text-center">
                                <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی</a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats text-center">
                                <a href="#">سفر</a>،
                                <a href="#">سرگرمی</a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content text-center">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                    ساختگی با تولید سادگی نامفهوم ... </p>
                                <a href="single.html" class="read-more">ادامه
                                    خواندن</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .entry-item -->

                <div class="entry-item hobbies col-sm-6 col-lg-4">
                    <article class="entry entry-grid text-center">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="/assets/images/blog/grid/3cols/post-6.jpg" alt="توضیحات عکس">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                        <span class="entry-author">
                                            نویسنده : <a href="#">مدیر سایت</a>
                                        </span>
                                <span class="meta-separator">|</span>
                                <a href="#">10 اسفند 1401</a>
                                <span class="meta-separator">|</span>
                                <a href="#">4 دیدگاه</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title text-center">
                                <a href="single.html">لورم ایپسوم متن ساختگی</a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats text-center">
                                <a href="#">سرگرمی</a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content text-center">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                    ساختگی با تولید سادگی نامفهوم ... </p>
                                <a href="single.html" class="read-more">ادامه
                                    خواندن</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .entry-item -->

                <div class="entry-item travel col-sm-6 col-lg-4">
                    <article class="entry entry-grid text-center">
                        <figure class="entry-media">
                            <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl"
                                 data-owl-options='{"rtl": true}'>
                                <a href="single.html">
                                    <img src="/assets/images/blog/grid/3cols/post-7.jpg" alt="توضیحات عکس">
                                </a>
                                <a href="single.html">
                                    <img src="/assets/images/blog/grid/3cols/post-6.jpg" alt="توضیحات عکس">
                                </a>
                            </div><!-- End .owl-carousel -->
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                        <span class="entry-author">
                                            نویسنده : <a href="#">مدیر سایت</a>
                                        </span>
                                <span class="meta-separator">|</span>
                                <a href="#">11 اسفند 1401</a>
                                <span class="meta-separator">|</span>
                                <a href="#">3 دیدگاه</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title text-center">
                                <a href="single.html">لورم ایپسوم متن ساختگی.</a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats text-center">
                                <a href="#">سفر</a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content text-center">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                    ساختگی با تولید سادگی نامفهوم ... </p>
                                <a href="single.html" class="read-more">ادامه
                                    خواندن</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .entry-item -->

                <div class="entry-item fashion col-sm-6 col-lg-4">
                    <article class="entry entry-grid text-center">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="/assets/images/blog/grid/3cols/post-8.jpg" alt="توضیحات عکس">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                        <span class="entry-author">
                                            نویسنده : <a href="#">مدیر سایت</a>
                                        </span>
                                <span class="meta-separator">|</span>
                                <a href="#">8 اسفند 1401</a>
                                <span class="meta-separator">|</span>
                                <a href="#">0 دیدگاه</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title text-center">
                                <a href="single.html">لورم ایپسوم متن ساختگی </a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats text-center">
                                <a href="#">مد</a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content text-center">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                    ساختگی با تولید سادگی نامفهوم ... </p>
                                <a href="single.html" class="read-more">ادامه
                                    خواندن</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .entry-item -->

                <div class="entry-item travel col-sm-6 col-lg-4">
                    <article class="entry entry-grid text-center">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="/assets/images/blog/grid/3cols/post-9.jpg" alt="توضیحات عکس">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                        <span class="entry-author">
                                            نویسنده : <a href="#">مدیر سایت</a>
                                        </span>
                                <span class="meta-separator">|</span>
                                <a href="#">7 اسفند 1401</a>
                                <span class="meta-separator">|</span>
                                <a href="#">5 دیدگاه</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title text-center">
                                <a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی</a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats text-center">
                                <a href="#">سفر</a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content text-center">
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن
                                    ساختگی با تولید سادگی نامفهوم ...</p>
                                <a href="single.html" class="read-more">ادامه
                                    خواندن</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .entry-item -->
                @endif
            </div><!-- End .entry-container -->

<!--            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                           aria-disabled="true">
                            <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>قبلی
                        </a>
                    </li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item">
                        <a class="page-link page-link-next" href="#" aria-label="Next">
                            بعدی<span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>
                        </a>
                    </li>
                </ul>
            </nav>-->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
