@extends('layouts.app')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> Chords From Song - </h1>
                    <div class="link-nav">
						<span class="box">
							<a href="/">Home </a>
							<i class="lnr lnr-arrow-right"></i>
							<a href="/chordsSong">Go Back</a>
						</span>
                    </div>
                    <div class="input-wrap p-2">
                        <form action="" class="form-box d-flex justify-content-between">
                            <input type="text" placeholder="Search Song Artist-Band Or Chord" class="form-control" id="search" name="search">
                        </form>
                        <div id="display" class="text-center"> </div>
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
                            @include('chordsSongs.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('chordsSongs.modal.delete')
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
                <div class="row gallery-item col-lg-8">
                    @forelse($chordsSongs as $c )
                        <div class="col-lg-4">
                            <a href="{!! $c->chord->chordPics() !!}" class="img-pop-up"><div class="single-gallery-image" style="background: url({!! $c->chord->chordPics() !!});"></div></a>
                        </div>
                        @empty
                    @endforelse
                </div>
                <div class="col-lg-4 sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget search-widget">
                            <form class="search-form" action="#">
                                <input placeholder="Search Chords" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Chords'">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End post-content Area -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#search").keyup(function() {
                var output = $('#search').val();
                if (output == "") {
                    $("#display").html("");
                }
                else {
                    $.ajax({
                        type: "GET",
                        url: "/searchW",
                        data: {
                            search: output
                        },
                        success: function(html) {
                            $("#display").html(html).show();
                        }
                    });
                }
            });
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>

@endsection

