@extends('layouts.app')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> Song - {!! $song->title !!} <br> Band - {!! $song->band['name'] !!}</h1>
                    <div class="link-nav">
						<span class="box">
							<a href="/">Home </a>
							<i class="lnr lnr-arrow-right"></i>
							<a href="/song">Go Back</a>
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

    <!-- Update Delete Button -->
    @auth
        @if(Auth::user()->Admin())
            <section class="post-content-area single-post-area">
                <div class="container">
                    <div class="row">
                        <div class="mt-3">
                            @include('songs.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('songs.modal.delete')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- Start post-content Area -->
    <section class="post-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12  col-md-12 meta-details">
                            <div class="user-detailsm">
                                <p class="view col-lg-12 col-md-12 col-12">{!! $song->song !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget search-widget">
                            <form class="search-form" action="#">
                                <input placeholder="Search Bend - Artist" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Bend - Artist'">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End post-content Area -->

    <!-- Video -->
    <div class="embed-responsive embed-responsive-16by9  myVideo">
        <iframe class="embed-responsive-item" src="{!! $song->video !!}" allowfullscreen></iframe>
    </div>

@endsection

