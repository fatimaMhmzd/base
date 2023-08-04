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
                                @if($cart)
                                    @foreach($cart->part as $item)
                                        <tr>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="{{route('shop_productDetail', $item->product->slug)}}">
                                                            <img src="/{{$item->product->image[0]->url}}"
                                                                 alt="تصویر محصول">
                                                        </a>
                                                    </figure>

                                                    <h3 class="product-title">
                                                        <a href="{{route('shop_productDetail', $item->product->slug)}}">{{$item->product->title}}</a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col" id="pricee{{$item->id}}">{{$item->last_price}}</td>
                                            <td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" value="{{$item->count}}" min="1" max="100"
                                                           step="1" data-decimals="0" onchange="pricePerQt({{$item->product->id}}, this.value, {{$item->id}})" required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
                                            <td class="total-col" id="priceeT{{$item->id}}">{{$item->total_price}}</td>
                                            <td class="remove-col">
                                                <a href="{{route('shop_basket_order_destroy',$item->id)}}"><i
                                                        class="icon-close"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td>
                                            <div><h5>سبد خرید شما خالی است</h5></div>
                                        </td></tr>

                                @endif
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

<!--                                <a href="#" class="btn btn-outline-dark-2"><span>به روز رسانی سبد خرید</span><i
                                        class="icon-refresh"></i></a>-->
                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">جمع سبد خرید</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                    <tr class="summary-subtotal">
                                        <td>جمع کل سبد خرید :</td>
                                        <td class="text-left" id="totalBasket">{{$cart->total_part_price ?? "0"}} تومان</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>شیوه ارسال :</td>
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
                                        <td class="text-left">-</td>
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
                                        <td>آدرس<br> <a href={{route('page_panelClient')}}>تغییر آدرس</a></td>
                                        <td>&nbsp;</td>
                                    </tr><!-- End .summary-shipping-estimate -->

                                    <tr class="summary-total">
                                        <td>مبلغ قابل پرداخت :</td>
                                        <td class="text-left" id="totalPayable">{{$cart->total_amount ?? "0"}} تومان</td>
                                    </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="{{route('shop_checkoutPageClient')}}"
                                   class="btn btn-outline-primary-2 btn-order btn-block">رفتن
                                    به صفحه پرداخت</a>
                            </div><!-- End .summary -->

                            <a href="{{route('shop_storePageClient')}}"
                               class="btn btn-outline-dark-2 btn-block mb-3"><span>ادامه
                                        خرید</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

@stop
@section('script')
    <script>
        function pricePerQt(id, val, part) {
            //alert(id + 'idme')
            console.log(val)
            var isAuth = {{\Illuminate\Support\Facades\Auth::check()}};
            if(isAuth){
                $.ajax({
                    url: `/shop_basket/order/store?productId=${id}&count=${val}`,
                    type: "Get",
                    success: function (res){ //alert('1')
                        console.log('res');console.log(res);
                        for(var i=0; i < res['part'].length ; i++) {
                            if (res['part'][i]['product_id'] == id) {
                                //alert(res['part'][i]['product_id'] + 'idif')
                                document.getElementById(`pricee${part}`).innerHTML = res['part'][i]['last_price'];
                                document.getElementById(`priceeT${part}`).innerHTML = res['part'][i]['total_price'];
                            }
                        }
                        document.getElementById('totalBasket').innerHTML = res['total_part_price'];
                        document.getElementById('totalPayable').innerHTML = res['total_amount'];

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
                            title: 'سبد خرید با موفقت به روز رسانی شد'
                        })

                    }
                });
                cartContent()
            }
        }
    </script>

@endsection
