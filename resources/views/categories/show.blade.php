@extends('layouts.app')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> Category - {!! $category->name !!}</h1>
                    <div class="link-nav">
						<span class="box">
							<a href="/">Home </a>
							<i class="lnr lnr-arrow-right"></i>
							<a href="/category">Go Back</a>
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
                            @include('categories.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('categories.modal.delete')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- Start post-content Area -->
    <section class="post-content-area single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="{!! $category->categoryPics() !!}" alt="{!! $category->name !!}">
                            </div>
                        </div>
                        <div class="col-lg-6  col-md-6 meta-details">
                            <div class="user-details row">
                                <p class="view col-lg-12 col-md-12 col-6">{!! $category->name !!} <span class="lnr lnr-eye"></span></p>
                                <p class="comments col-lg-12 col-md-12 col-6">{!! $category->desc !!} <span class="lnr lnr-book"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End post-content Area -->
@endsection

