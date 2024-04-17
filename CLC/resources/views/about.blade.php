@extends('layouts.app')

@section('title', 'О проекте - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/about.scss')
@endsection

@section('content')
<section class="section section-content section-main">
    <div class="container">
        <div class="section-main-inner">
            <div class="section-main-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                <h1>
                    Открой в себе <br>
                    креативного <br>
                    лидера
                </h1>
            </div>
            <div class="section-main-description wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="text-6">
                    Развиваем навыки креативного лидерства, <br>
                    даем инструменты повышения качества <br class="d-inline d-lg-none">реализуемых <br class="d-none d-lg-inline">
                    проектов. Формируем авторский <br class="d-inline d-lg-none">подход к управлению. <br class="d-none d-lg-inline">
                    Все участники <br class="d-inline d-md-none">становятся <br class="d-none d-md-inline d-lg-none">частью профессионального <br class="d-inline d-md-none d-lg-inline">
                    лидерского сообщества
                </div>
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

<section class="section section-content section-take">
    <div class="container">
        <div class="section-take-inner">
            <div class="row">
                <div class="col-12 col-md-auto">
                    <div class="section-take-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                        <h4>
                            Преимущества <br>
                            проекта
                        </h4>
                    </div>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="section-take-cards">
                        <div class="row">
                            <div class="col-6">
                                <div class="take-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                    <div class="take-card-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 2L12 9L19 2" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M5 22L12 15L19 22" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M21.5 5L14.5 12L21.5 19" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M2 5L9 12L2 19" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="take-card-description">
                                        Курс для лидеров, <br class="d-inline d-xl-none">которые <br class="d-none d-xl-inline">
                                        хотят <br class="d-inline d-xl-none">привнести <br class="d-inline d-xl-none">креативность <br>
                                        и осознанность <br class="d-inline d-xl-none">в свой <br class="d-none d-xl-inline">
                                        стиль <br class="d-inline d-xl-none">управления
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="take-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="take-card-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.5 10C11.433 10 13 8.433 13 6.5C13 4.56701 11.433 3 9.5 3C7.567 3 6 4.56701 6 6.5C6 8.433 7.567 10 9.5 10Z" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M16.3038 3.5C17.3202 4.11245 18 5.22685 18 6.5C18 7.77315 17.3202 8.88755 16.3038 9.5" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M2 20.4V21H17V20.4C17 18.1598 17 17.0397 16.564 16.184C16.1805 15.4314 15.5686 14.8195 14.8159 14.436C13.9603 14 12.8402 14 10.6 14H8.4C6.1598 14 5.0397 14 4.18404 14.436C3.43139 14.8195 2.81947 15.4314 2.43598 16.184C2 17.0397 2 18.1598 2 20.4Z" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M22 21.0005V20.4005C22 18.1603 22 17.0402 21.564 16.1846C21.1805 15.4319 20.5686 14.82 19.8159 14.4365" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="take-card-description">
                                        Мотивация <br class="d-inline d-xl-none">и экспертная <br>
                                        поддержка: <br class="d-inline d-xl-none">сопровождать <br>
                                        процесс обучения <br class="d-inline d-xl-none">будут <br class="d-none d-xl-inline">
                                        профессионалы <br class="d-inline d-xl-none">креативного <br class="d-none d-xl-inline">
                                        бизнеса
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="take-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                                    <div class="take-card-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.5 19C15.1944 19 19 15.1944 19 10.5C19 5.8056 15.1944 2 10.5 2C5.8056 2 2 5.8056 2 10.5C2 15.1944 5.8056 19 10.5 19Z" stroke="#020726" stroke-width="1.5625" stroke-linejoin="round" />
                                            <path d="M16.6108 16.6113L20.8535 20.854" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="take-card-description">
                                        Практико-<br class="d-inline d-xl-none">ориентированный <br>
                                        подход: обучение <br class="d-inline d-xl-none">на ваших <br class="d-none d-xl-inline">
                                        конкретных <br class="d-inline d-xl-none">задачах, <br class="d-none d-xl-inline">
                                        мастер<span class="d-inline d-xl-none"><br></span>майнды для обмена <br>
                                        опытом с экспертами <br>
                                        и другими <br class="d-inline d-xl-none">участниками
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="take-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                                    <div class="take-card-icon">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1447_5062)">
                                                <path d="M21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 5.47715 5.47715 1 11 1V11H21Z" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M20.5422 8.00024H14V1.45801C17.1101 2.43483 19.5654 4.89014 20.5422 8.00024Z" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1447_5062">
                                                    <rect width="22" height="22" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="take-card-description">
                                        Активное <br>
                                        сообщество <br class="d-inline d-xl-none">креативных <br>
                                        предпринимателей – <br>
                                        единомышленники, <br>
                                        с кем все получится
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

@include('sections.graphic')

@include('sections.subject')

<section class="section section-content section-result section-result-green">
    <div class="container">
        <div class="section-result-inner">
            <div class="row">
                <div class="col-12 col-md-auto col-lg">
                    <div class="section-result-left">
                        <div class="section-result-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                            <h4>
                                В результате <br>
                                обучения ты:
                            </h4>
                        </div>
                        <div class="section-result-link d-none d-md-block wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            @guest
                            <a href="{{ Route('register') }}" target="_blank" class="btn btn-white btn-wider w-xs-100 text-nowrap">Начать обучение</a>
                            @else
                            <a href="{{ Route('profile.settings') }}" target="_blank" class="btn btn-white btn-wider w-xs-100 text-nowrap">Начать обучение</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md col-lg-auto">
                    <div class="section-result-cards">
                        <div class="row">
                            <div class="col-6">
                                <div class="result-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                                    <div class="result-card-icon">
                                        1
                                    </div>
                                    <div class="result-card-description">
                                        Создашь свой <br class="d-inline d-xl-none">профиль <br class="d-none d-xl-inline">
                                        креативного <br class="d-inline d-xl-none">лидера, <br class="d-none d-xl-inline">
                                        сформируешь <br class="d-inline d-xl-none">план изменений <br>
                                        и начнешь его <br class="d-inline d-xl-none">реализацию
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="result-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="result-card-icon">
                                        2
                                    </div>
                                    <div class="result-card-description">
                                        Сформируешь <br class="d-inline d-xl-none">навык <br class="d-none d-xl-inline">
                                        по <br class="d-inline d-xl-none">расширению <br class="d-inline d-xl-none">видения, <br>
                                        позволяющий <br class="d-inline d-xl-none">смотреть <br>
                                        на все как <br class="d-inline d-xl-none">на потенциал
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="result-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                                    <div class="result-card-icon">
                                        3
                                    </div>
                                    <div class="result-card-description">
                                        Создашь или <br>
                                        трансформируешь <br>
                                        уникальность своего <br class="d-inline d-xl-none">дела <br class="d-none d-xl-inline">
                                        (проекта или <br class="d-inline d-xl-none">бизнеса)
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="result-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                                    <div class="result-card-icon">
                                        4
                                    </div>
                                    <div class="result-card-description">
                                        Создашь <br>
                                        корпоративный <br>
                                        кодекс своей <br>
                                        организации
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="result-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                                    <div class="result-card-icon">
                                        5
                                    </div>
                                    <div class="result-card-description">
                                        Скорректируешь <br class="d-inline d-xl-none">процессы <br>
                                        с применением <br class="d-inline d-xl-none">инструментов <br>
                                        дизайн-мышления <br class="d-inline d-xl-none">для <br class="d-none d-xl-inline">
                                        повышения <br class="d-inline d-xl-none">их эффективности
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="result-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                                    <div class="result-card-icon">
                                        6
                                    </div>
                                    <div class="result-card-description">
                                        Усилишь свои <br>
                                        коммуникативные <br class="d-inline d-xl-none">навыки <br class="d-none d-xl-inline">
                                        и внедришь <br class="d-inline d-xl-none">во взаимодействие <br>
                                        с командой новые <br class="d-inline d-xl-none">практики
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="result-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                                    <div class="result-card-icon">
                                        7
                                    </div>
                                    <div class="result-card-description">
                                        Сможешь использовать реальный опыт <br class="d-inline d-xl-none">креативных предпринимателей, <br class="d-none d-xl-inline">
                                        узнаешь их <br class="d-inline d-xl-none">ценности и практики, встретишь интересные <br class="d-inline d-xl-none">идеи, которые <br class="d-none d-xl-inline">
                                        сможешь интегрировать <br class="d-inline d-xl-none">в свой лидерский путь
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-block d-md-none">
                    @guest
                    <a href="{{ Route('register') }}" target="_blank" class="btn btn-white btn-wider w-xs-100 text-nowrap">Начать обучение</a>
                    @else
                    <a href="{{ Route('profile.settings') }}" target="_blank" class="btn btn-white btn-wider w-xs-100 text-nowrap">Начать обучение</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@include('sections.opinions', ['opinion' => true])

@include('sections.recommendations.block')

@include('sections.partners')

@include('sections.join')
@endsection

@section('hints')
@include('sections.recommendations.book', ['bookFilter' => true])
@include('sections.recommendations.film', ['filmFilter' => true])
@endsection

@section('modals')
@include('sections.opinions', ['opinionModal' => true])
@include('sections.recommendations.modal')
@endsection

@section('scripts')
@vite('resources/js/pages/about.js')
@endsection