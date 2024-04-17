@extends('layouts.app')

@section('title', $course->name . ' - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/course/show.scss')
@include('course.scriptData')
@endsection

@section('content')
<section class="section section-content section-main">
    <div class="container">
        <div class="section-main-inner">
            <div class="row">
                @if($lesson->number)
                <!-- Верхняя часть в мобильной версии -->
                <div class="col-12 d-block d-md-none">
                    @include('course.block.progress', ['mobile' => true])
                </div>
                <!-- Верхняя часть в мобильной версии -->
                @endif

                <!-- Левый сайдбар в десктопе -->
                <div class="col-12 col-md-auto">
                    <div class="sticky-block" sticky>
                        <div class="row">
                            <!-- Блок плейлиста в мобильной версии -->
                            <div class="col-12">
                                @include('course.block.playlist')
                            </div>
                            <!-- Блок плейлиста в мобильной версии -->

                            @if($lesson->number)
                            @if($lesson->video_code)
                            <!-- Блок видео в мобильной версии -->
                            <div id="mobile-video" class="col-12 d-block d-md-none">
                                @include('course.block.video')
                            </div>
                            <!-- Блок видео в мобильной версии -->
                            @endif
                            @endif

                            @if($lesson->speaker)
                            <!-- Спикеры урока -->
                            <div class="col-12">
                                <div class="author-block-row">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-4">
                                                @if($lesson->number)
                                                Спикеры модуля
                                                @else
                                                Преподаватели курса
                                                @endif
                                            </div>
                                        </div>
                                        @include('course.block.author')
                                    </div>
                                </div>
                            </div>
                            <!-- Спикеры урока -->
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Левый сайдбар в десктопе -->

                <!-- Контентная часть -->
                <div class="col-12 col-md">
                    <div class="section-main-primary">
                        <div class="row">
                            @if($lesson->number)
                            <!-- Блок прогресса -->
                            <div class="col-12 d-none d-md-block">
                                @include('course.block.progress')
                            </div>
                            <!-- Блок прогресса -->
                            @endif

                            @if($lesson->number)
                            @if($lesson->video_code)
                            <!-- Блок видео для десктопа -->
                            <div id="desktop-video" class="col-12 d-none d-md-block">
                                @include('course.block.video')
                            </div>
                            <!-- Блок видео для десктопа -->
                            @endif
                            @endif

                            <!-- Блок контента -->
                            <div class="col-12">
                                <div class="section-main-content">
                                    <!-- Блок -->

                                    @if($lesson->number)
                                    @if($lesson->block)
                                    <div class="section-main-blocktitle">
                                        Модуль: {{ $lesson->block }}
                                    </div>
                                    @endif
                                    @else
                                    <div class="section-main-blocktitle">
                                        Введение
                                    </div>
                                    @endif
                                    <!-- Блок -->

                                    <!-- Заголовок урока -->
                                    <div class="section-main-title">{{ $lesson->name }}</div>
                                    <!-- Заголовок урока -->

                                    @if(!$lesson->number)
                                    @if($lesson->description)
                                    <div class="section-main-description" style="margin-bottom: 1.88rem;">{!! allowedTags($lesson->description) !!}</div>
                                    @endif
                                    @endif

                                    <!-- Текст описания урока -->
                                    <div class="section-main-description">{!! allowedTags($lesson->contents) !!}</div>
                                    <!-- Текст описания урока -->
                                </div>
                            </div>
                            <!-- Блок контента -->

                            @if($testContents)
                            <!-- Блок тестирования -->
                            <div class="col-12">
                                <div class="section-main-title">{!! $test->name !!}</div>
                                @if($test->description)
                                <div class="section-main-content text-pre-line">{!! $test->description !!}</div>
                                @endif
                            </div>

                            <div class="col-12">
                                @include('course.block.testing')
                            </div>
                            <!-- Блок тестирования -->
                            @endif

                            <!-- Отклик на домашнее задание -->
                            @if(isset($answer->comment) && $answer->comment)
                            <div id="comment" class="col-12">
                                <div class="section-main-content">
                                    <div class="block-content block-content-purple">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="block-content-title">
                                                    {{ __('Отклик на Домашнее задание') }}
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="block-content-description">
                                                    {{ $answer->comment }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- Отклик на домашнее задание -->

                            <!-- Блок с оценкой ДЗ -->
                            <!-- <div class="col-12" style="display: none !important;" elem-hide> -->
                            <!-- include('course.block.grade.block') -->
                            <!-- </div> -->
                            <!-- Блок с оценкой ДЗ -->

                            @if(trim(allowedTags($lesson->links, false)) != '')
                            <!-- Полезные материалы -->
                            <div class="col-12">
                                <div class="section-main-content">
                                    <div class="section-main-title">
                                        {{ __('Полезные материалы:') }}
                                    </div>
                                    <div class="section-main-links">{!! $lesson->links !!}</div>
                                </div>
                            </div>
                            <!-- Полезные материалы -->
                            @endif

                            <!-- Блок с навигацией -->
                            <div class="col-12">
                                <div class="section-main-action">
                                    <div class="row">
                                        <!-- Кнопка с адресом телеграм-чата -->
                                        <div class="col-12 col-lg">
                                            <a href="https://t.me/CreativeLeadersCamp" target="_blank" class="btn btn-yellow btn-icon h-100 w-100 w-lg-auto" alert-telegram-hide>
                                                <span class="btn-icon-text">
                                                    <span class="d-none d-lg-inline">Telegram чат</span> для <span class="d-inline d-lg-none">связи</span> <span class="d-none d-md-inline">коммуникации</span> и лидермайндов
                                                </span>
                                                <svg width="24" height="24" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.2423 1.61903L22.2422 1.61902L22.2414 1.63137C22.2149 2.00663 22.0772 2.89244 21.8838 4.13565L21.879 4.16633C21.6873 5.39919 21.45 6.93172 21.2421 8.52621L19.8247 17.9206L19.8211 17.9444L19.8195 17.9633C19.8196 17.9629 19.8195 17.9639 19.8194 17.9649C19.8194 17.9652 19.8194 17.965 19.8193 17.9653C19.8189 17.969 19.818 17.9769 19.8164 17.9887C19.8131 18.0124 19.807 18.0504 19.797 18.0984C19.7766 18.1965 19.7418 18.3245 19.6863 18.4524C19.5698 18.7208 19.4189 18.8728 19.2195 18.9177C18.9527 18.9777 18.4908 18.8733 17.9397 18.6122C17.4255 18.3687 17.0034 18.0714 16.9014 17.9888L16.8923 17.9814L16.8829 17.9743C16.813 17.9211 16.5651 17.7568 16.24 17.5413C16.1725 17.4966 16.1017 17.4496 16.0285 17.401C15.5796 17.1031 14.9897 16.7102 14.3619 16.2824C13.0906 15.4161 11.714 14.4402 11.0181 13.8198L11.0182 13.8197L11.0108 13.8133C10.8618 13.6839 10.7917 13.561 10.7797 13.4847C10.7757 13.459 10.7747 13.4226 10.8006 13.3624C10.8294 13.2956 10.9007 13.1795 11.0756 13.0244L11.0875 13.0139L11.0989 13.0029L17.3046 7.01456L17.3112 7.0082L17.3176 7.00169C17.545 6.77132 17.7661 6.47293 17.9211 6.18053C17.9985 6.03452 18.0725 5.86563 18.1163 5.68939C18.1551 5.5333 18.1987 5.26099 18.0844 4.97983C17.9398 4.62404 17.6254 4.44059 17.3135 4.40098C17.0536 4.36797 16.7976 4.42995 16.5867 4.50352C16.1506 4.65561 15.5736 4.97985 14.8216 5.49795L6.57576 11.1674C6.56395 11.1734 6.54294 11.1834 6.51286 11.1958C6.44152 11.225 6.31873 11.2673 6.14576 11.2984C5.80446 11.3598 5.24589 11.3816 4.47486 11.1476L0.823833 10.0093C0.947061 9.9067 1.19836 9.75123 1.67802 9.57341L1.70949 9.56175L1.73979 9.54732C6.18882 7.4286 11.4075 5.27746 16.4809 3.18618C18.1181 2.51133 19.7402 1.84272 21.3164 1.18343L21.319 1.18246C21.3277 1.17929 21.343 1.1739 21.3637 1.16709C21.4057 1.15336 21.4678 1.13462 21.5424 1.11688C21.7007 1.07923 21.873 1.05633 22.015 1.06884C22.1528 1.08099 22.1827 1.11729 22.1853 1.12035L22.1854 1.12047L22.1854 1.12051C22.1879 1.12354 22.2764 1.2279 22.2423 1.61903Z" stroke="#020726" stroke-width="1.5" />
                                                </svg>
                                            </a>
                                        </div>
                                        <!-- Кнопка с адресом телеграм-чата -->

                                        @if(!$lesson->access())
                                        @if($nextLesson)
                                        <!-- Кнопка с переходом в следующий урок, если он открыт -->
                                        <div class="col-12 col-lg-auto" data-passed-show>
                                            <a href="{{ Route('course.show', $course->id) }}?lesson_id={{ $nextLesson->id }}" class="btn btn-primary btn-icon h-100">
                                                <span class="btn-icon-text d-inline d-lg-none">
                                                    Следующий урок
                                                </span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                                </svg>
                                            </a>
                                        </div>
                                        @endif
                                        @endif
                                        <!-- Кнопка с переходом в следующий урок, если он открыт -->
                                    </div>
                                </div>
                            </div>
                            <!-- Блок с навигацией -->
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
@include('course.modal.author')
@include('course.modal.finish-video')
@include('course.modal.finish-work')
@include('course.modal.certificate')
@include('course.modal.test-scores')
@include('course.block.grade.modal')
@endsection

@section('hints')
<!-- Подсказка: Текст для домашнего задания -->
<div class="popover" id="homeWorkText">
    <div class="popover-body">
        Расскажи, откуда ты узнал о проекте - по рекомендации знакомых,
        из группы ВКонтакте, публикации в&nbsp;Интернете,
        Telegram или из других источников
    </div>
</div>

<!-- Подсказка: Файл для домашнего задания -->
<div class="popover" id="homeWorkFile">
    <div class="popover-body">
        Загрузи презентацию в формате pdf до 15 мб., уточни <br class="d-none d-md-inline">
        образование, поделись опытом реализации креативных <br class="d-none d-md-inline">
        проектов, отметь свои достижения
    </div>
</div>
@endsection

@section('scripts')
@vite('resources/js/pages/course/show.js')
@endsection