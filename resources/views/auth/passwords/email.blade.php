@extends('layouts.app')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> Hire You Can {{ __('Send Password Reset Link') }}</h1>
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

    <!-- Start Area -->
    <section class="courses-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="offset-lg-2 col-lg-10">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
                            <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                                   required class="single-input" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="genric-btn success radius">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Area -->

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

@endsection
