@extends('layouts.app')

@section('content')

<!-- Start Banner Area -->
<section class="banner-area relative">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white"> Hire You Can Login</h1>
                <p>Or </p>
                <div class="link-nav">
						<span class="box">
							<a href="/">Home </a>
							<i class="lnr lnr-arrow-right"></i>
							<a href="/register">Register</a>
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
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
                        <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                               required class="single-input" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                        <input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Password'"
                               required class="single-input">
                    </div>
                    <div class="input-group-icon mt-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="input-group-icon mt-10">
                        <div class="col-md-8 offset-md-3">
                            <button type="submit" class="genric-btn success radius">
                                {{ __('Login') }}
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
<!-- End Login Area -->

@endsection
