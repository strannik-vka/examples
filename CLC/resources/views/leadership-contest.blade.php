@extends('layouts.app')

@section('title', 'Конкурс - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/contest.scss')
@endsection

@section('content')
<section class="section section-content section-main">
    <div class="container">
        <div class="section-main-inner">
            <div class="section-main-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                <h1>
                    Конкурс <br>
                    креативных <br>
                    лидеров 2023<br>
                    завершен
                </h1>
            </div>
            <div class="section-main-callback wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                @guest
                <a href="{{ Route('courses.list.item', ['id' => 1]) }}" target="_blank" class="btn btn-primary btn-wider w-xs-100">Начать обучение</a>
                @else
                <a href="{{ Route('course.show', ['id' => 1]) }}" target="_blank" class="btn btn-primary btn-wider w-xs-100">Начать обучение</a>
                @endif
            </div>
        </div>
    </div>
    <div class="section-main-background-container">
        <div class="container position-relative">
            <div class="section-main-background">
                <img src="/assets/images/pages/contest/main-bg.svg?v=3" class="lazyload wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
            </div>
        </div>
    </div>
</section>

@include('sections.winners', ['winnerModal' => true])

<section class="section section-content section-take">
    <div class="container">
        <div class="section-take-inner">
            <div class="row">
                <div class="col-12 col-md-auto">
                    <div class="section-take-primary">
                        <div class="section-take-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                            <h4>
                                Кто может <br>
                                принимать участие <br>
                                в конкурсе
                            </h4>
                        </div>
                        <div class="section-take-link wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                            <a href="/docs/polozhenie_creative_leaders.pdf?v=1" class="h-6 opacity-75" target="_blank">Положение <br class="d-inline d-md-none">о конкурсе</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-auto">
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
                                        Предприниматели <br>
                                        в сфере КИ
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
                                        Лидеры креативных <br>
                                        команд
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
                                        Основатели <br>
                                        стартапов
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="take-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                                    <div class="take-card-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 17C8.38071 17 9.5 15.8807 9.5 14.5C9.5 13.1193 8.38071 12 7 12C5.61929 12 4.5 13.1193 4.5 14.5C4.5 15.8807 5.61929 17 7 17Z" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M17 17C18.3807 17 19.5 15.8807 19.5 14.5C19.5 13.1193 18.3807 12 17 12C15.6193 12 14.5 13.1193 14.5 14.5C14.5 15.8807 15.6193 17 17 17Z" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 7C13.3807 7 14.5 5.88071 14.5 4.5C14.5 3.11929 13.3807 2 12 2C10.6193 2 9.5 3.11929 9.5 4.5C9.5 5.88071 10.6193 7 12 7Z" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 22C12 19.2386 9.7614 17 7 17C4.23857 17 2 19.2386 2 22" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M22 22C22 19.2386 19.7614 17 17 17C14.2386 17 12 19.2386 12 22" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M17 12C17 9.2386 14.7614 7 12 7C9.2386 7 7 9.2386 7 12" stroke="#020726" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="take-card-description">
                                        Граждане РФ <br>
                                        в возрасте <br class="d-inline d-lg-none">от 18 до 40 лет
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

@include('sections.matches')

<!-- include('sections.mentors-new') -->

@include('sections.expert')

@include('sections.open')
@endsection

@section('scripts')
@vite('resources/js/pages/contest.js')
@endsection