@extends('layouts.app')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> Hire You Can See Some Random Songs</h1>
                    <div class="link-nav">
						<span class="box">
							<a href="/">Home </a>
						</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="rocket-img">
            <img src="{!! asset('/storage/images/guitar.png') !!}" alt="guitar">
        </div>
    </section>
    <!-- End Banner Area -->

    <!--Start Feature Area -->
    <section class="feature-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h1>If You Don't Know What To Play</h1>
                    </div>
                </div>
            </div>
            <div class="feature-inner row">
                @forelse($songs as $song)
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-item">
                            <a href="{!! $song->pathTitle() !!}">
                                <i class="fa fa-music"></i>
                                <h4>{!! $song->title !!}</h4>
                                <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".1s">
                                    <h5>{!! $song->band['name'] !!}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    @empty
                @endforelse
            </div>
        </div>
    </section>
    <!-- End Feature Area -->

@endsection

