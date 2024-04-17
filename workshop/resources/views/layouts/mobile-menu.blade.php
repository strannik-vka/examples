<div class="menu menu-mobile menu-mobile-accent menu-mobile-accent-dark" data-lenis-prevent>
    <div class="menu-mobile-wrapper">
        <div class="menu-header" scroll-fixed>
            <div class="container">
                <div class="menu-header-inner">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <div class="menu-header-logo lazyload" data-expand="-10">
                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                                    <use xlink:href="/sprite.svg#logo"></use>
                                </svg>
                                <a href="{{ Route('index') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="menu-header-buttons">
                                <button type="button" class="btn btn-sm btn-icon text-white p-0" style="--bs-btn-size: 1.875rem;" data-menu-close="">
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                                        <use xlink:href="/sprite.svg#cross"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-navigation">
            <div class="container">
                <ul class="nav nav-vertical">
                    @include('layouts.navigation', ['mobile' => true])
                </ul>
            </div>
        </div>
        <div class="menu-footer">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Телеграм и инста -->
                    <div class="col-auto">
                        <a href="https://www.instagram.com/psycholog_nasibyan" target="_blank" class="btn btn-icon btn-secondary rounded-circle">
                            <svg fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                                <use xlink:href="/sprite.svg#instagram"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="https://t.me/psycholog_nasibyan" target="_blank" class="btn btn-icon btn-secondary rounded-circle">
                            <svg fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                                <use xlink:href="/sprite.svg#telegram"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>