@extends('layouts.app')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> {{ __('Verify Your Email Address') }}</h1>
                    <p> {{ __('Before proceeding, please check your email for a verification link.') }}</p>
                    <p> {{ __('If you did not receive the email') }},</p>
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

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    <!-- Start Verification Area -->
    <section class="courses-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="offset-lg-2 col-lg-10">
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="genric-btn success radius">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Verification Area -->

@endsection
