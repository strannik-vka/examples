@extends('layouts.app')

@section('title', 'Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/course/index.scss')
@endsection

@section('content')
<!-- Главный экран -->
<section class="section section-content section-main">
    <div class="container">
        <div class="section-main-inner">
            <div class="section-main-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                <h1>
                    Креативное <br>
                    лидерство
                </h1>
            </div>
            <div class="section-main-description wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="text-6">
                    Курс поможет исследовать подходы, обнаружить <br>
                    точки роста, сформировать авторский подход <br>
                    к управлению на основе навыков <br>
                    креативного лидерства
                </div>
            </div>
            <div class="section-main-callback wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.75s">
                @guest
                <a href="{{ Route('register') }}?redirectUrl={{ Route('course.show', ['id' => 1]) }}" target="_blank" class="btn btn-primary btn-wider w-xs-100">Зарегистрироваться</a>
                @else
                <a href="{{ Route('course.show', ['id' => 1]) }}" target="_blank" class="btn btn-primary btn-wider w-xs-100">Начать обучение</a>
                @endif
            </div>
            <div class="section-main-background">
                <img src="/assets/images/pages/course/index/{{ request('id'); }}.svg" class="lazyload wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
            </div>
        </div>
    </div>
</section>

@include('sections.mentors-new')

<!-- О курсе -->
<section class="section section-content section-program">
    <div class="section-program-inner">
        <div class="section-program-header">
            <div class="container">
                <div class="section-program-title">
                    <h4 class="h-4">
                        О курсе
                    </h4>
                </div>
                <div class="section-program-cards">
                    <div class="container">
                        <div class="cards-discordantly">
                            <div class="card-discordantly">
                                <div class="card-discordantly-inner">
                                    <div class="card-discordantly-description text-6">
                                        <p>
                                            Образовательная <br>
                                            программа
                                        </p>
                                    </div>
                                    <div class="card-discordantly-title">
                                        <span class="h-4 text-green">
                                            24 <br>
                                            видеолекции
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-discordantly">
                                <div class="card-discordantly-inner">
                                    <div class="card-discordantly-description text-6">
                                        <p>
                                            Онлайн-сессии <br>
                                            с экспертами
                                        </p>
                                    </div>
                                    <div class="card-discordantly-title">
                                        <span class="h-4 text-green">
                                            4 <br>
                                            встречи
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-discordantly">
                                <div class="card-discordantly-inner">
                                    <div class="card-discordantly-description text-6">
                                        <p>
                                            Лидермайнды <br>
                                            с предприни<span class="d-inline d-xl-none">-<br></span>мателями
                                        </p>
                                    </div>
                                    <div class="card-discordantly-title">
                                        <span class="h-4 text-green">
                                            4 <br>
                                            встречи
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-discordantly">
                                <div class="card-discordantly-inner">
                                    <div class="card-discordantly-description text-6">
                                        <p>
                                            По итогам <br>
                                            прохождения
                                        </p>
                                    </div>
                                    <div class="card-discordantly-title">
                                        <span class="h-4 text-green">
                                            Сертификат
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-program-content">
            <div class="container">
                <div class="section-program-collapses">
                    <div class="collapse-card collapse-card-mobile" data-collapse-id="collapse_1" data-collapse-toggle="collapse_1">
                        <div class="collapse-card-inner">
                            <div class="collapse-card-content">
                                <div class="collapse-card-title">
                                    <span class="text-4">
                                        Погружение
                                    </span>
                                </div>
                                <div class="collapse-card-description">
                                    <p>
                                        Знакомимся с процессом обучения, <br>
                                        формулируем личную цель на курс
                                    </p>
                                </div>
                                <div class="collapse-card-tags">
                                    <span>#1 занятие</span>
                                    <span>#1 домашнее задание</span>
                                </div>
                            </div>
                            <div class="collapse-card-button">
                                <button type="button" class="btn btn-nav btn-icon btn-icon-burger">
                                    <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line y1="13" x2="25" y2="13" stroke="#020726" />
                                        <line x1="12.5" y1="25.5" x2="12.5" y2="0.5" stroke="#020726" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="collapse-card collapse-card-mobile" data-collapse-id="collapse_2" data-collapse-toggle="collapse_2">
                        <div class="collapse-card-inner">
                            <div class="collapse-card-content">
                                <div class="collapse-card-title">
                                    <span class="text-4">
                                        Креативное мышление
                                    </span>
                                </div>
                                <div class="collapse-card-description">
                                    <p>
                                        Формируем навык по расширению <br class="d-inline d-md-none">видения, позволяющий <br class="d-none d-md-inline">
                                        смотреть <br class="d-inline d-md-none">на все как на потенциал. Отрабатываем <br class="d-inline d-md-none">методы <br class="d-none d-md-inline">
                                        генерации идей. Учимся <br class="d-inline d-md-none">оценке креативности.
                                    </p>
                                </div>
                                <div class="collapse-card-tags">
                                    <span>#4 занятия</span>
                                    <span>#1 лидермайнд</span>
                                    <span>#1 сессия с кураторами</span>
                                    <span>#1 домашнее задание</span>
                                </div>
                            </div>
                            <div class="collapse-card-button">
                                <button type="button" class="btn btn-nav btn-icon btn-icon-burger">
                                    <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line y1="13" x2="25" y2="13" stroke="#020726" />
                                        <line x1="12.5" y1="25.5" x2="12.5" y2="0.5" stroke="#020726" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="collapse-card collapse-card-mobile" data-collapse-id="collapse_3" data-collapse-toggle="collapse_3">
                        <div class="collapse-card-inner">
                            <div class="collapse-card-content">
                                <div class="collapse-card-title">
                                    <span class="text-4">
                                        Личностный потенциал <br>
                                        и формирование креативного <br>
                                        лидерского подхода
                                    </span>
                                </div>
                                <div class="collapse-card-description">
                                    <p>
                                        Проводим анализ своих подходов <br class="d-inline d-md-none">к управлению. <br class="d-none d-md-inline">
                                        Формируем пути развития <br class="d-inline d-md-none">и трансформации бизнеса <br class="d-none d-md-inline">
                                        через призму идеологии. Работаем с внутренним <br class="d-none d-md-inline">
                                        состоянием лидера. Формулируем ценности. Готовим <br class="d-none d-md-inline">
                                        проект корпоративного кодекса организации.
                                    </p>
                                </div>
                                <div class="collapse-card-tags">
                                    <span>#4 занятия</span>
                                    <span>#1 лидермайнд</span>
                                    <span>#1 сессия с кураторами</span>
                                    <span>#4 домашних задания</span>
                                </div>
                            </div>
                            <div class="collapse-card-button">
                                <button type="button" class="btn btn-nav btn-icon btn-icon-burger">
                                    <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line y1="13" x2="25" y2="13" stroke="#020726" />
                                        <line x1="12.5" y1="25.5" x2="12.5" y2="0.5" stroke="#020726" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="collapse-card collapse-card-mobile" data-collapse-id="collapse_4" data-collapse-toggle="collapse_4">
                        <div class="collapse-card-inner">
                            <div class="collapse-card-content">
                                <div class="collapse-card-title">
                                    <span class="text-4">
                                        Дизайн-мышление
                                    </span>
                                </div>
                                <div class="collapse-card-description">
                                    <p>
                                        Изучаем методы и инструменты <br>
                                        дизайн-мышления, учимся <br class="d-inline d-md-inline">«думать руками»
                                    </p>
                                </div>
                                <div class="collapse-card-tags">
                                    <span>#3 занятия</span>
                                    <span>#1 лидермайнд</span>
                                    <span>#1 сессия с кураторами</span>
                                    <span>#3 домашних задания</span>
                                </div>
                            </div>
                            <div class="collapse-card-button">
                                <button type="button" class="btn btn-nav btn-icon btn-icon-burger">
                                    <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line y1="13" x2="25" y2="13" stroke="#020726" />
                                        <line x1="12.5" y1="25.5" x2="12.5" y2="0.5" stroke="#020726" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="collapse-card collapse-card-mobile" data-collapse-id="collapse_5" data-collapse-toggle="collapse_5">
                        <div class="collapse-card-inner">
                            <div class="collapse-card-content">
                                <div class="collapse-card-title">
                                    <span class="text-4">
                                        Креативные техники <br>
                                        и практические навыки <br>
                                        современных презентаций
                                    </span>
                                </div>
                                <div class="collapse-card-description">
                                    <p>
                                        Формулируем ключевое сообщение аудитории. Собираем <br class="d-none d-md-inline">
                                        креативную <br class="d-inline d-md-none">презентацию. Оттачиваем свои <br>
                                        коммуникативные навыки. <br class="d-inline d-md-none">Тренируемся питчить свой <br class="d-none d-md-inline">
                                        проект – команде, клиенту, инвестору.
                                    </p>
                                </div>
                                <div class="collapse-card-tags">
                                    <span>#6 занятий</span>
                                    <span>#1 лидермайнд</span>
                                    <span>#1 сессия с кураторами</span>
                                    <span>#5 домашних задания</span>
                                </div>
                            </div>
                            <div class="collapse-card-button">
                                <button type="button" class="btn btn-nav btn-icon btn-icon-burger">
                                    <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line y1="13" x2="25" y2="13" stroke="#020726" />
                                        <line x1="12.5" y1="25.5" x2="12.5" y2="0.5" stroke="#020726" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="collapse-card collapse-card-mobile" data-collapse-id="collapse_6" data-collapse-toggle="collapse_6">
                        <div class="collapse-card-inner">
                            <div class="collapse-card-content">
                                <div class="collapse-card-title">
                                    <span class="text-4">
                                        Интеллектуальное <br>
                                        право
                                    </span>
                                </div>
                                <div class="collapse-card-description">
                                    <p>
                                        Разбираемся, что такое интеллектуальная <br class="d-inline d-md-none">собственность <br class="d-none d-md-inline">
                                        (ИС). Изучаем специфику <br class="d-inline d-md-none">авторского права в отношении <br class="d-none d-md-inline">
                                        различных <br class="d-inline d-md-none">объектов ИС. Знакомимся с базовыми <br>
                                        правилами защиты исключительных прав.
                                    </p>
                                </div>
                                <div class="collapse-card-tags">
                                    <span>#4 занятия</span>
                                    <span>#3 домашних задания</span>
                                </div>
                            </div>
                            <div class="collapse-card-button">
                                <button type="button" class="btn btn-nav btn-icon btn-icon-burger">
                                    <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line y1="13" x2="25" y2="13" stroke="#020726" />
                                        <line x1="12.5" y1="25.5" x2="12.5" y2="0.5" stroke="#020726" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="collapse-card collapse-card-mobile" data-collapse-id="collapse_7" data-collapse-toggle="collapse_7">
                        <div class="collapse-card-inner">
                            <div class="collapse-card-content">
                                <div class="collapse-card-title">
                                    <span class="text-4">
                                        Управление <br>
                                        в креативных <br>
                                        индустриях
                                    </span>
                                </div>
                                <div class="collapse-card-description">
                                    <p>
                                        Формулируем понятие «продюсер», <br class="d-inline d-md-none">определяем его роль <br class="d-none d-md-inline">
                                        в проекте. <br class="d-inline d-md-none">Разбираемся с ролью культуры <br class="d-inline d-md-none">и сообществ <br class="d-none d-md-inline">
                                        в развитии креативной <br class="d-inline d-md-none">экономики. Оттачиваем лайфхаки <br>
                                        реализации проектов без бюджетов <br class="d-inline d-md-none">или <br class="d-none d-md-inline">
                                        при наличии минимального ресурса.
                                    </p>
                                </div>
                                <div class="collapse-card-tags">
                                    <span>#4 занятия</span>
                                    <span>#1 домашнее задание</span>
                                </div>
                            </div>
                            <div class="collapse-card-button">
                                <button type="button" class="btn btn-nav btn-icon btn-icon-burger">
                                    <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line y1="13" x2="25" y2="13" stroke="#020726" />
                                        <line x1="12.5" y1="25.5" x2="12.5" y2="0.5" stroke="#020726" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-program-action" style="display:none!important;">
                    @guest
                    <a href="{{ Route('register') }}" target="_blank" class="btn btn-primary btn-wider w-xs-100">Начать обучение</a>
                    @else
                    <a href="{{ Route('profile.settings') }}" target="_blank" class="btn btn-primary btn-wider w-xs-100">Начать обучение</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Что ты будешь уметь: блок -->
<section class="section section-content section-matches">
    <div class="container">
        <div class="section-matches-inner">
            <div class="row">
                <div class="col-12 col-lg-auto col-xl">
                    <div class="section-matches-primary">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-matches-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                                    <h4 class="h4">
                                        Что ты <br>
                                        будешь уметь:
                                    </h4>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="ability-list wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="ability-card">
                                                <div class="ability-card-description">
                                                    Генерить идеи <br>
                                                    и тестировать гипотезы
                                                </div>
                                                <div class="ability-card-number">
                                                    01
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="ability-card">
                                                <div class="ability-card-description">
                                                    Прогнозировать риски <br>
                                                    и видеть возможности
                                                </div>
                                                <div class="ability-card-number">
                                                    02
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="ability-card">
                                                <div class="ability-card-description">
                                                    Формировать <br>
                                                    и внедрять путь <br>
                                                    изменений
                                                </div>
                                                <div class="ability-card-number">
                                                    03
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="ability-card">
                                                <div class="ability-card-description">
                                                    Мотивировать <br>
                                                    и грамотно управлять <br>
                                                    командой
                                                </div>
                                                <div class="ability-card-number">
                                                    04
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="ability-card">
                                                <div class="ability-card-description">
                                                    Применять <br>
                                                    инструменты дизайн-<br>
                                                    мышления в построении <br>
                                                    процессов
                                                </div>
                                                <div class="ability-card-number">
                                                    05
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="ability-card">
                                                <div class="ability-card-description">
                                                    Питчить <br>
                                                    проект <br>
                                                    любой <br>
                                                    аудитории
                                                </div>
                                                <div class="ability-card-number">
                                                    06
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="ability-card">
                                                <div class="ability-card-description">
                                                    Обеспечивать <br>
                                                    защиту своей <br>
                                                    интеллектуальной <br>
                                                    собственности
                                                </div>
                                                <div class="ability-card-number">
                                                    07
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="ability-card">
                                                <div class="ability-card-description">
                                                    Продюсировать <br>
                                                    проекты любой <br>
                                                    сложности
                                                </div>
                                                <div class="ability-card-number">
                                                    08
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg col-xl-auto">
                    <div class="section-matches-secondary">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-matches-title">
                                    <h4 class="h4">
                                        По завершении обучения <br>
                                        у тебя будет:
                                    </h4>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="matches-list wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="matches-list-inner">
                                        <div class="matches-card">
                                            <div class="matches-card-inner">
                                                <div class="row">
                                                    <div class="col-6 col-md-5">
                                                        <div class="matches-card-title">
                                                            Корпоративный <br>
                                                            кодекс организации
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-7">
                                                        <div class="matches-card-description">
                                                            свод правил и <br>
                                                            убеждений вашей команды
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="matches-card">
                                            <div class="matches-card-inner">
                                                <div class="row">
                                                    <div class="col-6 col-md-5">
                                                        <div class="matches-card-title">
                                                            Презентация <br>
                                                            проекта
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-7">
                                                        <div class="matches-card-description">
                                                            документ для партнеров <br>
                                                            и инвесторов
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="matches-card">
                                            <div class="matches-card-inner">
                                                <div class="row">
                                                    <div class="col-6 col-md-5">
                                                        <div class="matches-card-title">
                                                            Чек-лист управленца
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-7">
                                                        <div class="matches-card-description">
                                                            план изменений
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="matches-card">
                                            <div class="matches-card-inner">
                                                <div class="row">
                                                    <div class="col-6 col-md-5">
                                                        <div class="matches-card-title">
                                                            Инструкция <br>
                                                            креативного лидера
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-7">
                                                        <div class="matches-card-description">
                                                            тактика, ведущая <br>
                                                            к результату
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="matches-card">
                                            <div class="matches-card-inner">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="matches-card-description" style="margin:0;">
                                                            Креативные лидеры – рациональные интуиты, те, кто <br>
                                                            находят перспективы в неизвестности, смело ведут за собой <br>
                                                            команды, мотивируют каждого искать новые решения <br>
                                                            и открывать возможности и непрерывно развиваются.
                                                        </p>
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
        </div>
    </div>
</section>

<!-- Преподаватели -->
@include('sections.professional')

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

@section('scripts')
@vite('resources/js/pages/course/index.js')
@endsection