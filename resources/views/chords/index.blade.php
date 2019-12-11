@extends('layouts.app')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> Hire You Can See Chord</h1>
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
                            @include('chords.modal.add')
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endauth

    <!-- Start top-category-widget Area -->
    <section class="top-category-widget-area pt-3 pb-3 ">
        <div class="container">
            <div class="row">
                @forelse($categories as $category)
                    <div class="col-lg-12 p-3">
                        <div class="thumb">
                            <img class="content-image img-fluid d-block mx-auto" src="{!! $category->categoryPics() !!}" alt="{!! $category->name !!}">
                        </div>
                    </div>
                    @forelse($chords as $chord)
                        @if($category->id == $chord->category_id)
                            <div class="col-lg-3 pb-3">
                                <div class="single-cat-widget">
                                    <div class="content relative">
                                        <div class="overlay overlay-bg"></div>
                                        <a href="{!! $chord->pathTitle() !!}">
                                            <div class="thumb">
                                                <img class="content-image img-fluid d-block mx-auto" src="{!! $chord->chordPics() !!}" alt="{!! $chord->name !!}">
                                            </div>
                                            <div class="content-details">
                                                <h4 class="content-title mx-auto text-uppercase">{!! $chord->name !!}</h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                            @empty
                    @endforelse
                    @empty
                @endforelse
            </div>
        </div>
    </section>
    <!-- End top-category-widget Area -->

@endsection

