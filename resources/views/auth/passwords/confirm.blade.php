@extends('layouts.app')

@section('content')

    <!-- Start Confirm Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> Hire You Can Confirm Your Password</h1>
                    <p>{{ __('Please confirm your password before continuing.') }}</p>
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

    <!-- Start Login Area -->
    <section class="courses-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="offset-lg-2 col-lg-10">
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                            <input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Password'"
                                   required class="single-input current-password">
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="genric-btn success radius">
                                    {{ __('Confirm Password') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Confirm Area -->

@endsection
