@extends('layouts.app')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> Hire You Can See And Add Categories</h1>
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

    <!-- Add Button -->
    @auth
        @if(Auth::user()->Admin())
            <section class="post-content-area single-post-area">
                <div class="container">
                    <div class="row">
                        <div class="mt-3">
                            @include('categories.modal.add')
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
                <div class="col-lg-12 posts-list">
                    <div class="single-post row">
                        @forelse($categories as $category)
                            <a href="{!! $category->pathTitle() !!}" class="d-inline-block col-md-3">
                                <div class="col-md-12">
                                    <div class="feature-img">
                                        <img class="img-fluid" src="{!! $category->categoryPics() !!}" alt="{!! $category->name !!}">
                                    </div>
                                </div>
                                <div class="col-md-6 meta-details">
                                    <div class="user-details row">
                                        <p class="view col-lg-12 col-md-12 col-6">{!! $category->name !!} <span class="lnr lnr-eye"></span></p>
                                    </div>
                                </div>
                            </a>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End post-content Area -->
@endsection

