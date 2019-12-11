@extends('layouts.app')

@section('content')

<!-- Start Banner Area -->
<section class="home-banner-area relative">
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-8 col-md-12">
                <h1 class="wow fadeIn" data-wow-duration="4s"> </h1>
                <p class="text-white">  </p>
                <div class="input-wrap">
                    <form action="" class="form-box d-flex justify-content-between">
                        <input type="text" placeholder="Search Courses" class="form-control" name="search">
                        <button type="submit" class="btn search-btn">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="rocket-img">
        <img src="{!! asset('/storage/images/guitar.png') !!}" alt="guitar">
    </div>
</section>
<!-- End Banner Area -->

<!-- Start top-category-widget Area -->
<section class="about-area section-gap">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-5 col-md-6 about-left">
                <img class="img-fluid" src="{!! asset('/storage/images/music.svg') !!}" alt="">
            </div>
            <div class="offset-lg-1 col-lg-6 offset-md-0 col-md-12 about-right">
                <a href="/song">
                    <h1>Songs </h1>
                    <div class="wow fadeIn" data-wow-duration="1s">
                        <h5> @if(!empty($songsCount)) {!! $songsCount !!}@endif</h5>
                    </div>
                </a>
                <a href="/band-artist">
                    <h1>Bands </h1>
                    <div class="wow fadeIn" data-wow-duration="1.5s">
                        <h5> @if(!empty($bandsCount)) {!! $bandsCount !!}@endif</h5>
                    </div>
                </a>
                <a href="/chord">
                    <h1>Chords </h1>
                    <div class="wow fadeIn" data-wow-duration="2s">
                        <h5> @if(!empty($chordsCount)) {!! $chordsCount !!}@endif</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- End top-category-widget Area -->

<!-- Start Latest Songs -->
<section class="post-content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-1 posts-list">
                <h2 class="mb-30">Last Added Song</h2>
                <div class="single-post row">
                    <div class="col-lg-6  col-md-6 meta-details">
                        @forelse($songs as $song)
                            <a href="{!! $song->pathTitle() !!}">
                                <h4 class="view col-lg-12 col-md-12 col-12">{!! $song->title !!} <span class="lnr lnr-music-note"></span></h4>
                            </a>
                        @empty
                        @endforelse
                    </div>
                    <div class="col-lg-6 col-md-6 ">
                        <a href="/">
                            <div class="feature-img">
                                <img class="img-fluid" src="{!! asset('/storage/images/dance.svg') !!}" alt="song">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Area -->


<!-- Start Courses Area -->
<section class="courses-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-1 posts-list">
                <h2 class="mb-30">Latest Bands</h2>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-4 about-right">
                <div class="wow fadeIn" data-wow-duration="1s">
                    <img class="img-fluid" src="{!! asset('/storage/images/band.svg') !!}" alt="band">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="courses-right">
                    <div class="row">
                        <?php $count = 0; ?>
                        @forelse($bands as $band)
                        <?php $count +=4 ?>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <ul class="courses-list">
                                    <li>
                                        <a class="wow @if($band->id % 2 != 0) fadeInLeft @else fadeInRight  @endif" href="{!! $band->pathTitle() !!}" data-wow-duration="1s" data-wow-delay="{!! $count/20 !!}s">
                                            <i class="fa fa-music"></i> {!! $band->name !!}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Courses Area -->

@endsection
