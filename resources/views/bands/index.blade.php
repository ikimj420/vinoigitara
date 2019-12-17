@extends('layouts.app')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area relative">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white"> Hire You Can See Bands - Artist</h1>
                    <div class="link-nav">
						<span class="box">
							<a href="/">Home </a>
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

    <!-- Add Button -->
    @auth
        @if(Auth::user()->Admin())
            <section class="post-content-area single-post-area">
                <div class="container">
                    <div class="row">
                        <div class="mt-3">
                            @include('bands.modal.add')
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
                @forelse($categories as $category)
                    <div class="col-lg-12 p-3">
                        <div class="thumb">
                            <img class="content-image img-fluid d-block mx-auto" src="{!! $category->categoryPics() !!}" alt="{!! $category->name !!}">
                        </div>
                    </div>
                    @forelse($bands as $band)
                        @if($category->id == $band->category_id)
                            <div class="col-lg-3 pb-3">
                                <div class="single-cat-widget">
                                    <div class="content relative">
                                        <div class="overlay overlay-bg"></div>
                                        <a href="{!! $band->pathTitle() !!}">
                                            <div class="thumb">
                                                <img class="content-image img-fluid d-block mx-auto" src="{!! $band->bandPics() !!}" alt="{!! $band->name !!}">
                                            </div>
                                            <div class="content-details">
                                                <h4 class="content-title mx-auto text-uppercase">{!! $band->name !!}</h4>
                                                <span>{!! count(\App\Models\Song::where('band_id', '=', $band->id)->get()) !!} Songs</span>
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

