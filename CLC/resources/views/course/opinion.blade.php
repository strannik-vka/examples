@extends('layouts.app')

@section('title', 'Рефлексия - ' . $course->name . ' - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/course/opinion.scss')
<script>
    window.globalVar = {
        course: {
            id: <?= $opinion->course_id ?>
        },
    }

    window.csrf_token = '<?= csrf_token() ?>'
</script>
@endsection

@section('content')
<section class="section section-content section-main">
    <div class="container">
        <div class="section-main-inner">
            <div class="row">

                <!-- Левый сайдбар в десктопе -->
                <div class="col-12 col-md-auto">
                    <div class="sticky-block" sticky>
                        <div class="row">
                            <!-- Блок плейлиста в мобильной версии -->
                            <div class="col-12">
                                @include('course.block.playlist')
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
                            <div class="col-12">
                                <div class="badge w-100 text-left" style="background:#ffff00;white-space:normal;">
                                    Внимание! Для получения сертификата просим проверить актуальность персональных данных в <a href="{{ Route('profile.settings') }}" class="text-decoration-underline">профиле</a>
                                </div>
                            </div>
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
                                        «{{ $course->name }}».
                                    </div>
                                    <!-- Заголовок блока опроса -->
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

@section('modals')
@include('course.modal.opinion-finish')
@include('course.modal.certificate')
@endsection

@section('scripts')
@vite('resources/js/pages/course/opinion.js')
@endsection