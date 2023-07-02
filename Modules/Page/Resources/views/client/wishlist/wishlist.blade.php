@extends('client.layout.total')
@section('content')

    <main class="main">
       @include('page::client.wishlist.slider.sliderOne')

        <div class="page-content">
            <div class="container">
               @include('page::client.wishlist.content.tableHorizontalOne')
               @include('page::client.compare.content.wishlistShareOne')
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->


@endsection
