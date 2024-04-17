<header class="header header-accent @yield('header-class')" style="@yield('header-style')" scroll-fixed>
    <div class="container">
        <div class="header-inner">
            <div class="row">
                <div class="col-auto">
                    <div class="header-logo lazyload" data-expand="-10">
                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                            <use xlink:href="/sprite.svg#logo"></use>
                        </svg>
                        <a href="{{ Route('index') }}" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="header-navigation">
                        <ul class="nav nav-horizontal">
                            @include('layouts.navigation', ['megaMenu' => true])
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-buttons">
                        <button type="button" class="btn btn-icon btn-transparent text-black p-0" style="--bs-btn-size: 1.875rem;" data-menu-open="">
                            <svg fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                                <use xlink:href="/sprite.svg#hamburgerMenu"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>