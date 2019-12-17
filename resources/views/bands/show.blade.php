@extends('layouts.app')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> Band-Artist - {!! $band_artist->name !!}</h1>
                    <div class="link-nav">
						<span class="box">
							<a href="/">Home </a>
							<i class="lnr lnr-arrow-right"></i>
							<a href="/band-artist">Go Back</a>
						</span>
                    </div>
                    <div class="input-wrap p-2">
                        <form action="" class="form-box d-flex justify-content-between">
                            <input class="form-control" placeholder="Search Bend - Artist" id="search" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Bend - Artist'">
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
                            @include('bands.modal.update')
                        </div>
                        <div class="mt-3 ml-3">
                            @include('bands.modal.delete')
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
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-5  col-md-5 meta-details">
                            <div class="user-details row">
                                @forelse($songs as $song)
                                    <p class="view col-lg-12 col-md-12 col-12"><a href="{!! $song->pathTitle() !!}">{!! $song->title !!} </a> <span class="lnr lnr-music-note"></span></p>
                                    @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 ">
                            <div class="feature-img">
                                <img class="img-fluid" src="{!! $band_artist->bandPics() !!}" alt="{!! $band_artist->name !!}">
                            </div>
                        </div>
                        <div class="col-lg-12 ">
                            <h3>{!! $band_artist->name !!}</h3>
                            <hr>
                            <p class="excert"> <span> From Year : </span>{!! $band_artist->year_start !!} <span>To : </span>{!! $band_artist->year_end !!}</p>
                            <hr>
                            <p><span>Description </span> <br>{!! $band_artist->desc !!}</p>
                            <hr>
                            <p><span>Albums </span> <br>{!! $band_artist->albums !!}</p>
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
                        url: "/searchB",
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

