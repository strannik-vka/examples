<header class="header" scroll-fixed>
    <div class="container">
        <div class="header-inner">
            <div class="header-logo">
                <img data-src="/assets/images/logotypes/logo-all.svg" class="lazyload">
                <a href="{{ Route('index') }}" class="stretched-link"></a>
            </div>
            <div class="nav-header @if(Route::currentRouteName() == 'profile.settings' || Route::currentRouteName() == 'profile.leaders.competition' || Route::is('evaluation.index') || Route::is('evaluation.projects') || Route::is('evaluation.process') || Route::is('course.show') || Route::is('lesson.show') || Route::is('meeting.index')) nav-header-profile @endif d-none d-lg-block">
                <div class="row">
                    @if(Route::currentRouteName() == 'profile.settings' || Route::currentRouteName() == 'profile.leaders.competition' || Route::is('evaluation.index') || Route::is('evaluation.projects') || Route::is('evaluation.process') || Route::is('course.show') || Route::is('lesson.show') || Route::is('meeting.index') || Route::is('profile.recommendations'))
                    <div class="col-auto">
                        @if(Auth::user()->group_id == 3)
                        <a href="{{ Route('evaluation.index') }}" class="nav-header-link">Оценка конкурсных заявок</a>
                        @else
                        <a href="{{ Route('profile.leaders.competition') }}" class="nav-header-link">Конкурсная заявка</a>
                        @endif
                    </div>
                    <div class="col-auto">
                        <a href="{{ Route('course.show', ['id' => 1]) }}" class="nav-header-link">Обучение</a>
                    </div>
                    <div class="col-auto">
                        <a href="{{ Route('meeting.index') }}" class="nav-header-link">Онлайн-встречи</a>
                    </div>
                    <div class="col-auto">
                        <a href="{{ Route('profile.recommendations') }}" class="nav-header-link">Рекомендации</a>
                    </div>
                    @else
                    <div class="col-auto">
                        <a href="{{ Route('index') }}" class="nav-header-link">Главная</a>
                    </div>
                    <div class="col-auto">
                        <a href="{{ Route('courses.list.item', ['id' => 1]) }}" class="nav-header-link">О курсе</a>
                    </div>
                    <div class="col-auto">
                        <a href="{{ Route('leadership.contest') }}" class="nav-header-link">Конкурс</a>
                    </div>
                    <div class="col-auto">
                        <a href="{{ Route('post.index') }}" class="nav-header-link">Новости</a>
                    </div>
                    <div class="col-auto">
                        <a href="#footer" class="nav-header-link">Контакты</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="header-menu">
                <div class="row">
                    <div class="col-auto d-none d-md-block">
                        <button type="button" class="btn btn-nav btn-icon btn-icon-search" data-modal-open="search-modal">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.6667 17.6667L10.9581 10.9581M10.95 10.95L10.9581 10.9581M10.9581 10.9581C12.0137 9.9025 12.6667 8.44416 12.6667 6.83333C12.6667 3.61167 10.055 1 6.83333 1C3.61167 1 1 3.61167 1 6.83333C1 10.055 3.61167 12.6667 6.83333 12.6667C8.44416 12.6667 9.9025 12.0137 10.9581 10.9581Z" stroke="#020726" stroke-width="2" stroke-miterlimit="10" />
                            </svg>
                        </button>
                    </div>
                    @guest
                    <div class="col-auto d-none d-lg-block">
                        <a href="{{ Route('login') }}" class="nav-header-link btn-icon btn-icon-login">
                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.17008 1H16.6666V16H9.16663M8.74996 12.25L12.5 8.5L8.74996 4.75M1.66663 8.49654H12.5" stroke="#020726" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="btn-icon-text">Личный кабинет</span>
                        </a>
                    </div>
                    @else
                    <div class="col-auto d-md-block">
                        <button id="notify-btn" type="button" class="btn btn-auth btn-icon btn-icon-notify">
                            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.3019 14.4219C16.2157 14.4219 15.332 13.5387 15.332 12.4531V6.82812C15.332 3.33887 12.4914 0.5 8.99998 0.5C5.50853 0.5 2.66801 3.33887 2.66801 6.82812V12.4531C2.66801 13.5387 1.7843 14.4219 0.698164 14.4219C-0.232103 14.4219 -0.233339 15.8281 0.698164 15.8281H6.95968V16.4609C6.95968 17.5853 7.87498 18.5 8.99998 18.5C10.125 18.5 11.0403 17.5853 11.0403 16.4609V15.8281H17.3018C18.2321 15.8281 18.2334 14.4219 17.3019 14.4219ZM4.07522 6.82812C4.07522 4.11423 6.28444 1.90625 8.99998 1.90625C11.7155 1.90625 13.9249 4.11423 13.9249 6.82812V11.75H4.07522V6.82812ZM9.63321 16.4609C9.63321 16.8099 9.34921 17.0938 8.99998 17.0938C8.65089 17.0938 8.36676 16.8099 8.36676 16.4609V15.8281H9.63321V16.4609ZM3.43953 14.4219C3.70814 14.0494 3.90219 13.6203 4.00093 13.1562H13.999C14.0978 13.6203 14.292 14.0494 14.5604 14.4219C14.1873 14.4219 3.63495 14.4219 3.43953 14.4219Z" fill="#020726" />
                            </svg>
                            <!-- Если есть новое уведомление -->
                            <div data-notify-count style="display: none;" class="count count-top count-end"></div>
                        </button>
                        @include('layouts.notifybar')
                    </div>
                    <div class="col-auto d-md-block" ajax-elem>
                        @if(request()->user()->photo)
                        <a href="{{ Route('profile.settings') }}" class="btn btn-avatar">
                            <picture>
                                <img data-src="{{ ImageUrl(request()->user()->photo, 500) }}" class="lazyload">
                            </picture>
                        </a>
                        @else
                        <a href="{{ Route('profile.settings') }}" class="btn btn-auth btn-icon btn-icon-profile">
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.75 16C14.75 12.2721 11.7279 9.25 8 9.25C4.27209 9.25 1.25 12.2721 1.25 16M11 4C11 5.65685 9.65685 7 8 7C6.34315 7 5 5.65685 5 4C5 2.34315 6.34315 1 8 1C9.65685 1 11 2.34315 11 4Z" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        @endif
                    </div>
                    <div class="col-auto d-none d-md-block">
                        @csrf
                        <form method="GET" action="{{ url('/logout') }}">
                            <button type="submit" class="btn btn-auth btn-icon btn-icon-logout">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.8286 9.22476C17.8357 9.21608 17.8419 9.20694 17.8486 9.19805C17.8566 9.18736 17.8649 9.17692 17.8723 9.16581C17.8794 9.15516 17.8856 9.14408 17.8921 9.13311C17.8981 9.12306 17.9044 9.11325 17.91 9.10288C17.916 9.0917 17.921 9.08021 17.9264 9.06882C17.9315 9.05802 17.9369 9.04741 17.9415 9.03637C17.946 9.02529 17.9497 9.01401 17.9538 9.00276C17.958 8.99091 17.9625 8.97921 17.9662 8.96708C17.9696 8.95583 17.9721 8.9444 17.975 8.93305C17.9781 8.92071 17.9816 8.90851 17.9841 8.89592C17.9867 8.88274 17.9882 8.86945 17.9901 8.8562C17.9917 8.84527 17.9938 8.83447 17.9949 8.8234C17.9997 8.77418 17.9997 8.72458 17.9949 8.67536C17.9938 8.66429 17.9917 8.65353 17.9901 8.6426C17.9882 8.62931 17.9867 8.61602 17.984 8.60287C17.9815 8.59029 17.9781 8.57812 17.975 8.56579C17.9721 8.5544 17.9696 8.54297 17.9662 8.53172C17.9625 8.51963 17.958 8.50792 17.9538 8.49611C17.9497 8.48486 17.946 8.47354 17.9415 8.46247C17.9369 8.45143 17.9315 8.44081 17.9264 8.43005C17.921 8.41863 17.916 8.40713 17.91 8.39595C17.9045 8.38562 17.8981 8.37581 17.8922 8.36576C17.8856 8.35479 17.8794 8.34371 17.8723 8.33303C17.8649 8.32195 17.8566 8.31151 17.8486 8.30086C17.842 8.29193 17.8357 8.28275 17.8286 8.27407C17.813 8.25512 17.7967 8.23688 17.7793 8.21955C17.7795 8.21969 17.7792 8.21941 17.7793 8.21955L15.529 5.96922C15.2362 5.67634 14.7613 5.67634 14.4684 5.96922C14.1755 6.26209 14.1755 6.73696 14.4684 7.02984L15.438 7.99948H11.2489C10.8347 7.99948 10.4989 8.33524 10.4989 8.74943C10.4989 9.16363 10.8347 9.49939 11.2489 9.49939H15.438L14.4684 10.469C14.1755 10.7619 14.1755 11.2368 14.4684 11.5297C14.7612 11.8225 15.2361 11.8225 15.529 11.5297L17.7789 9.27975C17.7788 9.27989 17.779 9.2796 17.7789 9.27975C17.7963 9.26238 17.813 9.24375 17.8286 9.22476Z" fill="#020726" />
                                    <path d="M12.7498 10.9995C12.3356 10.9995 11.9998 11.3353 11.9998 11.7495V15.4994H8.99993V3.50015C8.99993 3.16895 8.78268 2.87668 8.46548 2.78151L5.86015 1.99992H11.9998V5.74977C11.9998 6.16397 12.3356 6.49973 12.7498 6.49973C13.164 6.49973 13.4997 6.16397 13.4997 5.74977V1.24996C13.4997 0.835764 13.164 0.500001 12.7498 0.500001H0.750261C0.750331 0.500001 0.75019 0.500001 0.750261 0.500001C0.728078 0.499966 0.705895 0.50102 0.684099 0.502919C0.340074 0.528863 0.115822 0.755154 0.0343331 1.02532C0.029095 1.04212 0.0245249 1.05928 0.020447 1.07665C0.0200251 1.07851 0.0196735 1.08041 0.0192517 1.08231C0.0152089 1.10016 0.011834 1.1183 0.0090568 1.13669C0.0086701 1.13929 0.00824824 1.14186 0.00786154 1.14446C0.00550616 1.16123 0.00364296 1.17821 0.00241254 1.1954C0.000232941 1.2231 -0.000434999 1.25087 0.000268097 1.27864V16.2496C0.000268097 16.6071 0.252609 16.9149 0.603173 16.985L8.10285 18.485C8.56693 18.5778 8.9999 18.2228 8.9999 17.7496V16.9993H12.7498C13.1639 16.9993 13.4997 16.6636 13.4997 16.2494V11.7495C13.4997 11.3353 13.1639 10.9995 12.7498 10.9995ZM7.49998 16.8348L1.50022 15.6348V2.25823L7.49998 4.05816V16.8348Z" fill="#020726" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    @endif
                    <div class="col-auto d-block d-lg-none">
                        <button type="button" class="btn btn-nav btn-icon btn-icon-burger" menu-open>
                            <svg width="25" height="18" viewBox="0 0 25 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0H25V2H0V0Z" fill="#020726" />
                                <path d="M0 8H25V10H0V8Z" fill="#020726" />
                                <path d="M0 16H25V18H0V16Z" fill="#020726" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>