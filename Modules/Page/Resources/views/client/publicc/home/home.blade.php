@extends('client.layout.total')

@section('content')


    <main class="main">

        @include('slider::client.sliderOne')

        @include('page::client.publicc.home.homeTopCategoryProduct')

        <div class="mb-7 mb-lg-11"></div><!-- End .mb-7 -->

    @include('page::client.publicc.home.newOffer')

    @include('page::client.publicc.home.specialDiscount')

    @include('page::client.publicc.home.brands')
    <!-- End .container -->

        <div class="container">
            <hr class="mt-3 mb-6">
        </div><!-- End .container -->

        @include('page::client.publicc.home.specialProducts')

       @include('page::client.publicc.home.bestSellingProducts')

        <div class="container">
            <hr class="mt-5 mb-0">
        </div><!-- End .container -->

       @include('page::client.publicc.home.services')

       @include('page::client.publicc.home.socialMedia')
    </main><!-- End .main -->







@endsection
