<header id="header">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="/"><img src="{!! asset('/storage/images/logo.svg') !!}" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    @auth
                        @if(Auth::user()->Admin())
                            <li><a href="/role" class="">R</a></li>
                            <li><a href="/category" class="">C</a></li>
                            <li><a href="/chordSong" class="">SC</a></li>
                        @endif
                    @endauth
                    <li><a href="/band-artist">Band</a></li>
                    <li><a href="/song">Song</a></li>
                    <li><a href="/chord">Chords</a></li>
                    <li><a href="/songRandom">Get Some Random Song</a></li>
                    <!-- Authentication Links -->
                    @guest
                        <li> <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> </li>
                        @if (Route::has('register'))
                            <li> <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> </li>
                        @endif
                    @else
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ Auth::user()->name }} / {{ __('Logout') }} </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header>
