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
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td class="product-col">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{route('shop_productDetail', $item->product->slug)}}">
                                            <img src="/{{$item->product->banner}}" alt="{{$item->product->title}}">
                                        </a>
                                    </figure>

                                    <h3 class="product-title">
                                        <a href="{{route('shop_productDetail', $item->product->slug)}}">{{$item->product->title}}</a>
                                    </h3><!-- End .product-title -->
                                </div><!-- End .product -->
                            </td>
                            <td class="price-col">{{$item->product->price}} تومان</td>
                            @if($item->product->available > 0)
                                <td class="stock-col"><span class="in-stock">موجود</span></td>
                            @else
                                <td class="stock-col"><span class="in-stock">ناموجود</span></td>
                            @endif

                            <td class="remove-col text-left">
                                <a href="{{route('product_wishList_delete',$item->id)}}" class="btn-remove"><i
                                        class="icon-close"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table><!-- End .table table-wishlist -->

            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

@endsection
