<nav class="navbar navbar-expand-lg bg-primary fixed-top " color-on-scroll="400">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="/">Imperium</a>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
            <ul class="navbar-nav">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/backend') }}"><p>Admin Panel</p></a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><p>@lang('auth.login')</p></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><p>@lang('auth.register')</p></a>
                        </li>
                    @endauth
                @endif
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="@lang('auth.follow', ['social' => 'Twitter'])" data-placement="bottom" href="" target="_blank">
                        <i class="fa fa-twitter"></i>
                        <p class="d-lg-none d-xl-none">Twitter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="@lang('auth.like', ['social' => 'Facebook'])" data-placement="bottom" href="" target="_blank">
                         <i class="fa fa-facebook-square"></i>
                        <p class="d-lg-none d-xl-none">Facebook</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="@lang('auth.follow', ['social' => 'Instagram'])" data-placement="bottom" href="" target="_blank">
                        <i class="fa fa-instagram"></i>
                        <p class="d-lg-none d-xl-none">Instagram</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>