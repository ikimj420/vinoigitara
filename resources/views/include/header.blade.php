<header id="header">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="/"><img src="{!! asset('/storage/images/logo.svg') !!}" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="/">Band</a></li>
                    <li><a href="/">Song</a></li>
                    <li><a href="/">Chords</a></li>
                    <li><a href="/">Get Some Random Song</a></li>
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
