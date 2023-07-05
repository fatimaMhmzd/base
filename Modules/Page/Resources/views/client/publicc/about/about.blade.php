@extends('client.layout.total')
@section('content')

    <main class="main">
        @include('page::client.publicc.about.slider.sliderOne')

        <div class="page-content pb-3">
            <div class="container">
                @include('page::client.publicc.about.content.weAre')
               @include('page::client.publicc.about.content.features')
            </div><!-- End .container -->

            <div class="mb-2"></div><!-- End .mb-2 -->

           @include('page::client.publicc.about.content.statistics')
           @include('page::client.publicc.about.content.ourTeam')

           @include('page::client.publicc.about.content.brandsWorkWith')
        </div><!-- End .page-content -->
    </main><!-- End .main -->


@endsection
