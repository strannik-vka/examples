@extends('layouts.app')

@section('title', 'Рефлексия - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/course/opinion.scss')
@endsection

@section('content')
<section class="section section-content section-main">
    <div class="container">
        <div class="section-main-inner">
            <div class="row">

                <!-- Левый сайдбар в десктопе -->
                <div class="col-12 col-md-4">
                    <div class="sticky-block" sticky>
                        <div class="row">
                            <!-- Блок плейлиста в мобильной версии -->
                            <div class="col-12">
                                123
                                <!-- include('course.block.playlist') -->
                            </div>
                            <!-- Блок плейлиста в мобильной версии -->
                        </div>
                    </div>
                </div>
                <!-- Левый сайдбар в десктопе -->

                <!-- Контентная часть -->
                <div class="col-12 col-md">
                    <div class="section-main-primary">
                        <div class="row">
                            <!-- Блок контента -->
                            <div class="col-12">
                                <div class="section-main-content">
                                    <!-- Блок -->
                                    <div class="section-main-blocktitle">
                                        Блок: {{ __('Рефлексия') }}
                                    </div>
                                    <!-- Блок -->

                                    <!-- Заголовок блока опроса -->
                                    <div class="section-main-title">
                                        Ты успешно завершил онлайн-курс проекта <br>
                                        «Лагерь креативных лидеров».
                                    </div>
                                    <!-- Заголовок блока опроса -->

                                    <!-- Текст описания опроса -->
                                    <div class="section-main-description">
                                        <p>
                                            Для повышения результатов обучающихся по программе <br class="d-none d-md-inline">
                                            предлагаем дать обратную связь, заполнив короткую анкету.
                                        </p>
                                    </div>
                                    <!-- Текст описания опроса -->
                                </div>
                            </div>
                            <!-- Блок контента -->

                            <!-- Блок тестирования -->
                            <div class="col-12">
                                @include('course.block.opinions')
                            </div>
                            <!-- Блок тестирования -->

                        </div>
                    </div>
                </div>
                <!-- Контентная часть -->
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@vite('resources/js/pages/course/opinion.js')
@endsection