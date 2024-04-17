@extends('layouts.app')

@section('title', 'Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/index.scss')
@endsection

@section('content')
<section class="section section-content section-main">
    <div class="container">
        <div class="section-main-inner">
            <div class="section-main-suptitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                <h6>
                    Открой в себе креативного лидера
                </h6>
            </div>
            <div class="section-main-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                <h1>
                    Лагерь<br>
                    креативных<br>
                    лидеров
                </h1>
            </div>
            <div class="section-main-description wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                <p class="text-6">
                    Образовательный проект для <br>
                    предпринимателей в креативных индустриях
                </p>
                <p class="text-6" style="margin:0;">
                    Формируем авторский подход к управлению. <br>
                    Развиваем навыки осознанного лидерства <br>
                    и креативной трансформации бизнеса
                </p>
            </div>
            <div class="section-main-callback wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                @guest
                <a href="{{ Route('register') }}?redirectUrl={{ Route('course.show', ['id' => 1]) }}" target="_blank" class="btn btn-primary btn-wider w-xs-100">Начать обучение</a>
                @else
                <a href="{{ Route('course.show', ['id' => 1]) }}" target="_blank" class="btn btn-primary btn-wider w-xs-100">Начать обучение</a>
                @endif
            </div>
            <div class="section-main-background">
                <div class="lazyload wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
                    <img src="/assets/images/pages/main/main-bg.svg?v=3" class="infiniteStepRotation">
                </div>
            </div>
        </div>
    </div>
</section>

@include('sections.word')

<section class="section section-content section-give">
    <div class="container">
        <div class="section-give-inner">
            <div class="row">
                <div class="col-12">
                    <div class="section-give-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                        <h4>
                            НАУЧИТЬ ЛИДЕРСТВУ <br>
                            НЕЛЬЗЯ, НАУЧИТЬСЯ МОЖНО!
                        </h4>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-xl">
                    <div class="section-give-left">
                        <div class="section-give-description">
                            <span class="text-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                <p>
                                    Будущее за креативными лидерами <br>
                                    – за теми, кто находит перспективы <br>
                                    в неизвестности, ведет за собой <br>
                                    и мотивирует команду искать <br>
                                    новые решения
                                </p>
                                <p>
                                    Наш проект поможет исследовать <br>
                                    подходы, обнаружить точки роста, <br>
                                    создать свой стиль управления на <br>
                                    основе навыков креативного лидерства.
                                </p>
                                <p>
                                    А сообщество курса и поддержка <br>
                                    кураторов — помогут раскрыться, <br>
                                    получить ответы на вопросы и дойти до цели.
                                </p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-xl">
                    <div class="section-give-right">
                        <div class="section-give-cards">
                            <div class="row">
                                <div class="col-12">
                                    <div class="give-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                                        <div class="give-card-icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.66248 21.75L6.905 21.7501L22.4613 6.19379L18.2187 1.95117L2.66235 17.5075L2.66248 21.75Z" stroke="#020726" stroke-width="1.5625" stroke-linejoin="round" />
                                                <path d="M13.9761 6.19336L18.2187 10.436" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="give-card-title">
                                            <div class="text-4">
                                                Участники обучения:
                                            </div>
                                        </div>
                                        <div class="give-card-description">
                                            <div class="text-6">
                                                Лидеры креативного бизнеса, <br>
                                                предприниматели в сфере КИ и их команды
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="give-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                                        <div class="give-card-icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 20C4 18 4 5 4 5C4 3.34315 5.4327 2 7.2 2H20V18C20 18 9.99075 18 7.2 18C4.68112 18 4 18.3421 4 20Z" stroke="#020726" stroke-width="1.5625" stroke-linejoin="round" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 22H20V18H6C4.89543 18 4 18.8954 4 20C4 21.1045 4.89543 22 6 22Z" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="give-card-title">
                                            <div class="text-4">
                                                Наставники:
                                            </div>
                                        </div>
                                        <div class="give-card-description">
                                            <div class="text-6">
                                                Профессионалы креативного бизнеса, <br>
                                                которые реализовали десятки кейсов
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-content section-take section-take-green">
    <div class="container">
        <div class="section-take-inner">
            <div class="row">
                <div class="col-12 col-md-auto col-lg">
                    <div class="section-take-left">
                        <div class="section-take-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                            <h4>
                                ЧТО ЖДЕТ <br>
                                ТЕБЯ НА КУРСЕ
                            </h4>
                        </div>
                        <div class="section-take-link d-none d-md-block wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            @guest
                            <a href="{{ Route('register') }}" class="btn btn-white btn-wider w-xs-100 text-nowrap" target="_blank">
                                Начать обучение
                            </a>
                            @else
                            <a href="{{ Route('profile.settings') }}" class="btn btn-white btn-wider w-xs-100 text-nowrap" target="_blank">
                                Начать обучение
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md col-lg-auto">
                    <div class="section-take-cards">
                        <div class="row">
                            <div class="col-6">
                                <div class="take-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                    <div class="take-card-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 22C14.7614 22 17.2614 20.8807 19.071 19.071C20.8807 17.2614 22 14.7614 22 12C22 9.2386 20.8807 6.7386 19.071 4.92893C17.2614 3.11929 14.7614 2 12 2C9.2386 2 6.7386 3.11929 4.92893 4.92893C3.11929 6.7386 2 9.2386 2 12C2 14.7614 3.11929 17.2614 4.92893 19.071C6.7386 20.8807 9.2386 22 12 22Z" stroke="#020726" stroke-width="1.5625" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 5.5C12.6903 5.5 13.25 6.05965 13.25 6.75C13.25 7.44035 12.6903 8 12 8C11.3096 8 10.75 7.44035 10.75 6.75C10.75 6.05965 11.3096 5.5 12 5.5Z" fill="#020726" />
                                            <path d="M12.25 17V10H11.75H11.25" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M10.5 17H14" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="take-card-description">
                                        Материалы <br class="d-inline d-lg-none">и экспертная <br>
                                        поддержка от <br class="d-inline d-lg-none">профессионалов <br>
                                        креативных индустрий <br class="d-inline d-lg-none">— им <br class="d-none d-lg-inline">
                                        есть чем поделиться
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="take-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="take-card-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 22C14.98 22 13.1679 17.568 15 15.5C16.5632 13.7354 22 14.5428 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#020726" stroke-width="1.5625" stroke-linejoin="round" />
                                            <path d="M14 8.5C14.8285 8.5 15.5 7.82845 15.5 7C15.5 6.17155 14.8285 5.5 14 5.5C13.1715 5.5 12.5 6.17155 12.5 7C12.5 7.82845 13.1715 8.5 14 8.5Z" stroke="#020726" stroke-width="1.5625" stroke-linejoin="round" />
                                            <path d="M8 10.5C8.82845 10.5 9.5 9.82845 9.5 9C9.5 8.17155 8.82845 7.5 8 7.5C7.17155 7.5 6.5 8.17155 6.5 9C6.5 9.82845 7.17155 10.5 8 10.5Z" stroke="#020726" stroke-width="1.5625" stroke-linejoin="round" />
                                            <path d="M8.5 17C9.32845 17 10 16.3285 10 15.5C10 14.6715 9.32845 14 8.5 14C7.67155 14 7 14.6715 7 15.5C7 16.3285 7.67155 17 8.5 17Z" stroke="#020726" stroke-width="1.5625" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="take-card-description">
                                        Практико-<br class="d-inline d-lg-none">ориентированный <br>
                                        подход: обучение на <br class="d-inline d-lg-none">ваших <br class="d-none d-lg-inline">
                                        конкретных <br class="d-inline d-lg-none">задачах, <br class="d-none d-lg-inline">
                                        мастермайнды <br class="d-inline d-lg-none">для обмена <br class="d-none d-lg-inline">
                                        опытом <br class="d-inline d-lg-none">с экспертами <br class="d-inline d-lg-none">и <br class="d-none d-lg-inline">
                                        другими <br class="d-inline d-lg-none">участниками
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="take-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                                    <div class="take-card-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.5 19C15.1944 19 19 15.1944 19 10.5C19 5.8056 15.1944 2 10.5 2C5.8056 2 2 5.8056 2 10.5C2 15.1944 5.8056 19 10.5 19Z" stroke="#020726" stroke-width="1.5625" stroke-linejoin="round" />
                                            <path d="M16.6113 16.6113L20.854 20.854" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="take-card-description">
                                        Гибридный <br class="d-inline d-lg-none">формат <br class="d-none d-lg-inline">
                                        обучения: <br class="d-inline d-lg-none">очные интенсивы <br>
                                        для победителей <br class="d-inline d-lg-none">конкурса <br class="d-none d-lg-inline">
                                        и бесплатный <br class="d-inline d-lg-none">онлайн-курс <br class="d-none d-lg-inline">
                                        для <br class="d-inline d-lg-none">ориентированных <br>
                                        на развитие
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="take-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                                    <div class="take-card-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2V12H22Z" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M21.5422 9.00024H15V2.45801C18.1101 3.43483 20.5654 5.89014 21.5422 9.00024Z" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="take-card-description">
                                        Активное <br>
                                        сообщество <br class="d-inline d-lg-none">креативных <br>
                                        предпринимателей – <br>
                                        единомышленники, <br>
                                        с кем все получится
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-block d-md-none">
                    @guest
                    <a href="{{ Route('register') }}" class="btn btn-white btn-wider w-xs-100 w-sm-100 text-nowrap" target="_blank">
                        Начать обучение
                    </a>
                    @else
                    <a href="{{ Route('profile.settings') }}" class="btn btn-white btn-wider w-xs-100 w-sm-100 text-nowrap" target="_blank">
                        Начать обучение
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@include('sections.professional')

<!-- Карточка курса -->
<section class="section section-content section-courseblock">
    <div class="section-courseblock-inner">
        @include('course.static.block')
    </div>
</section>

@include('sections.join')

@include('post.block')

@endsection

@section('scripts')
@vite('resources/js/pages/index.js')
@endsection