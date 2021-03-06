@extends('layouts.app')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> Hire You Can See Songs</h1>
                    <div class="link-nav">
						<span class="box">
							<a href="/">Home </a>
						</span>
                    </div>
                    <div class="input-wrap p-2">
                        <form action="" class="form-box d-flex justify-content-between">
                            <input class="form-control" placeholder="Search Songs" id="search" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Songs'">
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

    <!-- Add Button -->
    @auth
        @if(Auth::user()->Admin())
            <section class="post-content-area single-post-area">
                <div class="container">
                    <div class="row">
                        <div class="mt-3">
                            @include('songs.modal.add')
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
                @forelse($bands as $band)
                    <div class="col-lg-12 posts-list">
                        <div class="single-post row">
                            <div class="col-lg-6  col-md-3 meta-details">
                                @forelse($songs as $song)
                                    @if($band->id == $song->band_id)
                                    <a href="{!! $song->pathTitle() !!}">
                                        <h2 class="view col-lg-12 col-md-12 col-6">{!! $song->title !!} <span class="lnr lnr-music-note"></span></h2>
                                    </a>
                                    @endif
                                    @empty
                                @endforelse
                            </div>
                            <div class="col-lg-5 col-md-5 offset-1 ">
                                <a href="{!! $band->pathTitle() !!}">
                                    <div class="feature img">
                                        <img class="img-fluid" src="{!! $band->bandPics() !!}" alt="{!! $band->name !!}">
                                    </div>
                                    <h3>{!! $band->name !!}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                @endforelse
            </div>
            <nav class="blog-pagination justify-content-center d-flex">
                {!! $bands->links() !!}
            </nav>
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
                        url: "/searchS",
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

