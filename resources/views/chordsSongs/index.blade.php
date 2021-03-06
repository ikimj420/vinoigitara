@extends('layouts.app')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> Hire You Can See Chords For Song</h1>
                    <div class="link-nav">
						<span class="box">
							<a href="/">Home </a>
						</span>
                    </div>
                    <div class="input-wrap p-2">
                        <form class="form-box d-flex justify-content-between">
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

    <!-- Add Button -->
    @auth
        @if(Auth::user()->Admin())
            <section class="post-content-area single-post-area">
                <div class="container">
                    <div class="row">
                        <div class="mt-3">
                            @include('chordsSongs.modal.add')
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
                @forelse($songs as $song)
                    <div class="col-lg-12 p-3">
                        <div class="thumb">
                            <h1>{!! $song->title !!}</h1>
                        </div>
                    </div>
                    @forelse($chordsSongs as $c)
                        @if($c->song_id == $song->id)
                            <div class="col-lg-3 pb-3">
                                <div class="single-cat-widget">
                                    <div class="content relative">
                                        <div class="overlay overlay-bg"></div>
                                        <a href="{!! $c->pathTitle() !!}">
                                            <div class="thumb">
                                                <img class="content-image img-fluid d-block mx-auto" src="{!! $c->chord->chordPics() !!}" alt="{!! $c->chord['name'] !!}">
                                            </div>
                                            <div class="content-details">
                                                <h4 class="content-title mx-auto text-uppercase">{!! $c->chord['name'] !!}</h4>
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
            <nav class="blog-pagination justify-content-center d-flex">
                {!! $songs->links() !!}
            </nav>
        </div>
    </section>
    <!-- End top-category-widget Area -->

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

