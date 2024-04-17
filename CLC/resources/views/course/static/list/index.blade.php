@extends('layouts.app')

@section('title', 'Список курсов - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/course/list.scss')
@endsection

@section('content')

<!-- Карточка курса -->
<section class="section section-content section-courseblock">
    <div class="container">
        <div class="section-courseblock-title">
            <h4 class="h-2">
                Список курсов <br>
                для обучения
            </h4>
        </div>
    </div>
    <div class="section-courseblock-inner">
        <div class="section-courseblock-list">
            <div class="row gy-md-4">
                <div class="col-12">
                    <div class="course-block">
                        <div class="course-block-main">
                            <div class="course-block-title">
                                <span class="h-4">
                                    Креативное лидерство
                                </span>
                            </div>
                            <div class="course-block-description">
                                Креативные лидеры – рациональные <br class="d-inline d-md-none">интуиты, те, <br class="d-none d-md-inline">
                                кто находят перспективы <br class="d-inline d-md-none">в неизвестности, смело ведут за <br class="d-none d-md-inline">
                                собой <br class="d-inline d-md-none">команды, мотивируют каждого искать <br class="d-inline d-md-none">новые решения <br class="d-none d-md-inline">
                                и открывать возможности <br class="d-inline d-md-none">и непрерывно развиваются.
                            </div>
                            <div class="course-block-button">
                                <a href="{{ Route('courses.list.item', ['id' => 1]) }}" target="_blank" class="btn btn-white text-nowrap w-xs-100 w-sm-100 w-md-auto">Подробнее о курсе</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="course-block course-block-red">
                        <div class="course-block-main">
                            <div class="course-block-title">
                                <span class="h-4">
                                    Курс №2
                                </span>
                            </div>
                            <div class="course-block-description">
                                В стадии разработки...
                            </div>
                            <div class="course-block-button">
                                <a href="javascript://" class="btn btn-white text-nowrap w-xs-100 w-sm-100 w-md-auto" data-modal-open="notAvailable">Подробнее о курсе</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="course-block course-block-yellow">
                        <div class="course-block-main">
                            <div class="course-block-title">
                                <span class="h-4">
                                    Курс №3
                                </span>
                            </div>
                            <div class="course-block-description">
                                В стадии разработки...
                            </div>
                            <div class="course-block-button">
                                <a href="javascript://" class="btn btn-white text-nowrap w-xs-100 w-sm-100 w-md-auto" data-modal-open="notAvailable">Подробнее о курсе</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="course-block course-block-dark">
                        <div class="course-block-main">
                            <div class="course-block-title">
                                <span class="h-4">
                                    Курс №4
                                </span>
                            </div>
                            <div class="course-block-description">
                                В стадии разработки...
                            </div>
                            <div class="course-block-button">
                                <a href="javascript://" class="btn btn-white text-nowrap w-xs-100 w-sm-100 w-md-auto" data-modal-open="notAvailable">Подробнее о курсе</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Регистрация на курс -->
<section class="section section-content section-open">
    <div class="section-open-circle circle-left">
        <img data-src="/assets/images/logotypes/logo-grey-black.svg" class="lazyload infiniteStepRotation">
    </div>
    <div class="section-open-circle circle-right">
        <img data-src="/assets/images/logotypes/logo-grey-black.svg" class="lazyload infiniteStepRotation">
    </div>
    <div class="container">
        <div class="section-open-inner">
            <div class="section-open-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                <h4>
                    Начать <br>
                    учиться
                </h4>
            </div>
            <div class="section-open-description wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                <div class="text-3">
                    Чтобы начать обучение, <br>
                    пройди регистрацию
                </div>
            </div>
            <div class="section-open-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                @guest
                <a href="{{ Route('register') }}?redirectUrl={{ Route('course.show', ['id' => 1]) }}" target="_blank" class="btn btn-white btn-wider w-xs-100 w-sm-100 w-md-auto">Зарегистрироваться</a>
                @else
                <a href="{{ Route('course.show', ['id' => 1]) }}" target="_blank" class="btn btn-white btn-wider w-xs-100 w-sm-100 w-md-auto">Начать обучение</a>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection

@section('modals')
<div class="modal modal-notify" data-modal-id="notAvailable">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <h6 class="modal-title">
                Пока недоступно
            </h6>
            <div class="modal-body text-center">
                Курс еще в стадии <br>
                разработки...
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@vite('resources/js/pages/course/list.js')
@endsection