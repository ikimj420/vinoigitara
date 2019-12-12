@extends('layouts.app')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> Hire You Can See Role</h1>
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
                            @include('roles.modal.add')
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
                @forelse($roles as $role)
                    <div class="col-lg-4 pb-3">
                        <div class="single-cat-widget">
                            <div class="content relative">
                                <div class="overlay overlay-bg"></div>
                                <a href="{!! $role->pathTitle() !!}">
                                    <div class="thumb">
                                        <img class="content-image img-fluid d-block mx-auto" src="/storage/images/role.svg" alt="{!! $role->userLevel !!}">
                                    </div>
                                    <div class="content-details">
                                        <h4 class="content-title mx-auto text-uppercase">{!! $role->userLevel !!}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                @endforelse
            </div>
        </div>
    </section>
    <!-- End top-category-widget Area -->

@endsection

