@extends('layouts.app')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> Hire You Can Register</h1>
                    <p>Or </p>
                    <div class="link-nav">
						<span class="box">
							<a href="/">Home </a>
							<i class="lnr lnr-arrow-right"></i>
							<a href="/login">Login</a>
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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                            <input type="text" name="name" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'"
                                   required class="single-input" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                            <input type="text" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                                   required class="single-input" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                            <input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Password'"
                                   required class="single-input">
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'"
                                   required class="single-input new-password">
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="genric-btn success radius">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Login Area -->

                    {{--
                        @csrf







                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="" required autocomplete="new-password">
                            </div>
                        </div>

                    </form>--}}

@endsection
