<div class="mobile-menu">
    <div class="container h-100">
        <div class="mobile-menu-header">
            <div class="mobile-menu-logo">
                <a href="/">
                    <img data-src="/assets/images/logotypes/logo-all.svg" class="lazyload">
                </a>
            </div>
            <button type="button" class="mobile-menu-close" menu-close></button>
        </div>
        <div class="mobile-menu-content">

            <div class="badge badge-primary w-100">
                <div class="row g-3">
                    @guest
                    <div class="col-auto">
                        <a href="{{ Route('login') }}" class="btn-text">Личный кабинет</a>
                    </div>
                    <div class="col-auto">
                        <div class="text-white">|</div>
                    </div>
                    <div class="col">
                        <a href="{{ Route('register') }}" class="btn-text w-100 text-left">Регистрация</a>
                    </div>
                    @else
                    <div class="col-auto">
                        <a href="{{ Route('profile.settings') }}" class="btn-text">Профиль</a>
                    </div>
                    <div class="col-auto">
                        <div class="text-white">|</div>
                    </div>
                    <div class="col">
                        <a href="{{ url('/logout') }}" class="btn-text w-100 text-left">Выйти</a>
                    </div>
                    @endif
                </div>
            </div>

            <div class="mobile-menu-navigation">
                <div class="nav-mobile">
                    <div class="row">
                        @if(Route::currentRouteName() == 'profile.settings' || Route::currentRouteName() == 'profile.leaders.competition' || Route::is('evaluation.index') || Route::is('evaluation.projects') || Route::is('evaluation.process') || Route::is('course.show') || Route::is('lesson.show') || Route::is('meeting.index') || Route::is('profile.recommendations'))
                        <div class="col-12">
                            @if(Auth::user()->group_id == 3)
                            <a href="{{ Route('evaluation.index') }}" class="nav-mobile-link" menu-close>Оценка конкурсных заявок</a>
                            @else
                            <a href="{{ Route('profile.leaders.competition') }}" class="nav-mobile-link" menu-close>Конкурсная заявка</a>
                            @endif
                        </div>
                        <div class="col-12">
                            <a href="{{ Route('course.show', ['id' => 1]) }}" class="nav-mobile-link" menu-close>Обучение</a>
                        </div>
                        <div class="col-12">
                            <a href="{{ Route('meeting.index') }}" class="nav-mobile-link" menu-close>Онлайн-встречи</a>
                        </div>
                        <div class="col-12">
                            <a href="{{ Route('profile.recommendations') }}" class="nav-mobile-link" menu-close>Рекомендации</a>
                        </div>
                        @else
                        <div class="col-12">
                            <a href="{{ Route('about') }}" class="nav-mobile-link" menu-close>О проекте</a>
                        </div>
                        <div class="col-12">
                            <a href="{{ Route('courses.list.item', ['id' => 1]) }}" class="nav-mobile-link" menu-close>О курсе</a>
                        </div>
                        <div class="col-12">
                            <a href="{{ Route('leadership.contest') }}" class="nav-mobile-link" menu-close>Конкурс</a>
                        </div>
                        <div class="col-12">
                            <a href="{{ Route('post.index') }}" class="nav-mobile-link" menu-close>Новости</a>
                        </div>
                        <div class="col-12">
                            <a href="{{ Route('faq.index') }}" class="nav-mobile-link" menu-close>Вопросы/ответы</a>
                        </div>
                        @endif
                        <div class="col-12">
                            <a href="javascript://" class="nav-mobile-link" menu-close data-modal-open="search-modal">Поиск</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu-footer">
            <div class="row">
                <div class="col-auto">
                    <div class="mobile-menu-title">Общие вопросы</div>
                    <a href=" mailto:inbox@creative-leaders.ru" class="mobile-menu-email">inbox@creative-leaders.ru</a>
                    <br>
                    <a href="tel:+7 (925) 369-60-69" class="mobile-menu-email">+7 (925) 369-60-69</a>
                </div>
                <div class="col-auto">
                    <div class="mobile-menu-title">Для общения со СМИ</div>
                    <a href="mailto:pr@creative-leaders.ru" class="mobile-menu-email">pr@creative-leaders.ru</a>
                </div>
                <div class="col-auto">
                    <a href="https://vk.com/creativeleaders_camp" class="btn btn-social btn-social-grey" target="_blank">
                        <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.71451 10C3.24792 10 0.129919 6.24625 0 0H2.73829C2.82823 4.58458 4.84692 6.52653 6.44592 6.92693V0H9.02441V3.95395C10.6034 3.78378 12.2622 1.98198 12.8218 0H15.4003C14.9705 2.44244 13.1717 4.24424 11.8925 4.98498C13.1717 5.58559 15.2205 7.15716 16 10H13.1617C12.5521 8.0981 11.0332 6.62663 9.02441 6.42643V10H8.71451Z" fill="#020726" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>