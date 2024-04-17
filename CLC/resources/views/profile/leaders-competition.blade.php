@extends('layouts.app')

@section('title', 'Конкурсная заявка - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/profile/competition.scss')

<script>
    window.application = <?= toJson($application, ['id']) ?>
</script>
@endsection

@section('content')
<section class="section section-content section-competition">
    <div class="container">
        <div class="section-competition-inner">
            <div class="section-competition-header">
                <div class="row">
                    <div class="col-12 col-xl">
                        <div class="section-competition-title">
                            <div class="row">
                                <div class="col-12 col-md col-xl-12">
                                    <h4 class="h-4">
                                        Всероссийский конкурс <br>
                                        креативных лидеров
                                    </h4>
                                </div>
                                <div class="col-12 col-md-auto col-xl-12">
                                    <div class="section-competition-description">
                                        В своей заявке на участие в конкурсе <br class="d-inline d-xl-none">расскажи подробно <br class="d-none d-xl-inline">
                                        о деятельности <br class="d-inline d-xl-none">своей команды и ваших достижениях. <br>
                                        Для удобства используй подсказки, <br class="d-inline d-xl-none">они помогут <br class="d-none d-xl-inline">
                                        внести всю необходи<span class="d-inline d-xl-none">-<br></span>мую информацию.
                                        <br>
                                        Подать заявку могут граждане <br class="d-inline d-xl-none">РФ от 18 до 40 лет.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <div class="contest-banner @if($isWinner) contest-banner-winner @endif w-xl-auto">
                            <div class="contest-banner-inner">
                                <div class="row">
                                    @if($applicationsDeadlineIsUp)

                                    @if($winnerIsFound)

                                    @if($isWinner)
                                    <!-- Если победил -->
                                    <div class="col-auto">
                                        <h6>
                                            Ты стал<br />
                                            победителем
                                        </h6>
                                    </div>
                                    @else
                                    <!-- Если не победил -->
                                    <div class="col-auto">
                                        <h6>
                                            Обучайся<br>
                                            онлайн
                                        </h6>
                                    </div>
                                    <!-- <div class="col">
                                        <a href="" class="btn btn-primary h-100">Подробнее</a>
                                    </div> -->
                                    @endif

                                    @else
                                    <!-- если время истекло -->
                                    <div class="col-auto">
                                        <h6>
                                            Прием заявок <br>
                                            завершен
                                        </h6>
                                    </div>
                                    @endif

                                    @else
                                    <!-- если время не истекло -->
                                    <div class="col-12 col-md-auto col-xl-auto">
                                        <h6>
                                            Образовательный проект <br>
                                            для предпринимателей
                                        </h6>
                                    </div>
                                    <div class="col-12 col-md-auto">
                                        @include('blocks.timer')
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form data-ajax-form="leaders-competition" data-reset="false" action="{{ route('leaders.competition.store') }}" class="section-competition-content">
                <div class="row">
                    <div class="col-12">
                        <div class="section-competition-column">
                            <div class="row">
                                <div class="col-12">
                                    <div class="h-5">
                                        Общие сведения
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-floating">
                                        <input value="{{ $application->name ?? '' }}" name="name" type="text" class="form-control form-control-bottom" id="name_company" placeholder="Название команды/ организации">
                                        <label for="name_company">Название команды/ организации</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6" data-valid-group>
                                    <div class="form-floating form-floating-list" data-popover-toggle="myActivity">
                                        <input data-valid-input="activity_spheres[]" readonly type="text" class="form-control form-control-bottom" id="field_activity" placeholder="Сфера деятельности">
                                        <label for="field_activity">Сфера деятельности</label>
                                        <div class="form-icon form-icon-dropdown form-icon-end form-icon-middle" id="portfolio-btn">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.4">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill="#020726" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <!-- сферы деятельности -->
                                    <div class="popover popover-list popover-list-check" id="myActivity">
                                        <div class="popover-body">
                                            <div class="row">
                                                @foreach($activity_spheres_chunks as $chunk)
                                                <div class="col-12 col-md-6">
                                                    <div class="row g-3">
                                                        @foreach($chunk as $sphere)
                                                        <div class="col-12">
                                                            <div class="form-check form-check-center h-100">
                                                                <input @if($application && in_array($sphere['id'], (is_array($application->activity_spheres) ? $application->activity_spheres : []))) checked @endif name="activity_spheres[]" class="form-check-input" type="checkbox" value="{{ $sphere['id'] }}" id="activity_{{ $sphere['id'] }}">
                                                                <label class="form-check-label" for="activity_{{ $sphere['id'] }}">
                                                                    {{ $sphere['name'] }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-floating">
                                        <input value="{{ $application->juridical_status ?? '' }}" name="juridical_status" type="text" class="form-control form-control-bottom" id="legal_status" placeholder="Юридический статус">
                                        <label for="legal_status">Юридический статус</label>
                                        <div class="form-icon form-icon-info form-icon-end form-icon-middle" data-popover-toggle="legalStatus">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="20" height="20" rx="10" fill="white" />
                                                <path opacity="0.4" d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-floating">
                                        <input value="{{ $application->website ?? '' }}" name="website" type="text" class="form-control form-control-bottom" id="site_company" placeholder="Сайт организации/страница в соц-сетях">
                                        <label for="site_company">Сайт организации/страница в соц-сетях</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="section-competition-column">
                            <div class="row">
                                <div class="col-12">
                                    <div class="h-5">
                                        Лидер
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="form-floating">
                                        <input value="{{ $application->fio ?? '' }}" name="fio" type="text" class="form-control form-control-bottom" id="name" placeholder="ФИО">
                                        <label for="name">ФИО</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="form-floating">
                                        <input value="{{ isset($application->birthday) && $application->birthday ? $application->birthday->format('d.m.Y') : '' }}" name="birthday" type="text" class="form-control form-control-bottom" id="birthday" placeholder="Дата рождения">
                                        <label for="birthday">Дата рождения</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="form-floating">
                                        <input value="{{ $application->email ?? '' }}" name="email" type="email" class="form-control form-control-bottom" id="email" placeholder="E-mail">
                                        <label for="email">E-mail</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="form-floating">
                                        <input value="{{ $application->phone ?? '' }}" name="phone" type="text" class="form-control form-control-bottom" id="phone" placeholder="Телефон">
                                        <label for="phone">Телефон</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="form-floating">
                                        <input value="{{ $application->social_network ?? '' }}" name="social_network" type="text" class="form-control form-control-bottom" id="social_page" placeholder="Ссылка на страницу в соц-сетях">
                                        <label for="social_page">Ссылка на страницу в соц-сетях</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="form-floating">
                                        <input value="{{ $application->region ?? '' }}" name="region" type="text" class="form-control form-control-bottom" id="region_living" placeholder="Регион проживания">
                                        <label for="region_living">Регион проживания</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="form-floating">
                                        <input value="{{ $application->city ?? '' }}" name="city" type="text" class="form-control form-control-bottom" id="city_living" placeholder="Город проживания">
                                        <label for="city_living">Город проживания</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-8">
                                    <div class="form-floating form-types form-types-file @if(isset($application->portfolio_file) && $application->portfolio_file) active @endif" file-group>
                                        <label class="form-type-label @if(isset($application->portfolio_file) && $application->portfolio_file) label-up @endif" for="file-upload">Личное портфолио</label>
                                        <input value="{{ $application->portfolio_file ?? '' }}" @if(isset($application->portfolio_file) && $application->portfolio_file) data-is-file="true" @endif name="portfolio_file" id="file-upload" type="file" class="form-control form-control-bottom">
                                        <div class="form-control form-type-file form-control-bottom" file-change-name="portfolio_file">
                                            @if(isset($application->portfolio_file) && $application->portfolio_file)
                                            <span class="file-delete" delete=""></span>
                                            <a target="_blank" href="{{ $application->portfolio_file }}">Личное портфолио</a>
                                            @endif
                                        </div>
                                        <div class="form-icon form-icon-end form-icon-middle" data-popover-toggle="personalPortfolio">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="20" height="20" rx="10" fill="white" />
                                                <path opacity="0.4" d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="section-competition-column section-competition-team">
                            <div class="row">
                                <div class="col-12">
                                    <div class="h-5">
                                        Команда
                                    </div>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="form-floating form-floating-counter" textarea-counter>
                                        <div class="text-counter text-10 opacity-50"><span data-output-count="about_team">0</span>/1500</div>
                                        <textarea name="about_team" data-input-count="about_team" type="text" class="form-control form-control-bottom form-control-about" id="about_team" placeholder="Общая информация о команде">{{ $application->about_team ?? '' }}</textarea>
                                        <label for="about_team">Общая информация о команде</label>
                                        <div class="form-icon form-icon-info form-icon-end form-icon-top" data-popover-toggle="aboutTeam">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="20" height="20" rx="10" fill="white" />
                                                <path opacity="0.4" d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="section-competition-row">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-xl-12">
                                                <div class="form-floating">
                                                    <div class="form-icon form-icon-end form-icon-middle" data-popover-toggle="missionTarget">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="20" rx="10" fill="white" />
                                                            <path opacity="0.4" d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                                                        </svg>
                                                    </div>
                                                    <input value="{{ $application->mission ?? '' }}" name="mission" type="text" class="form-control form-control-bottom" id="mission_target" placeholder="Миссия, цели">
                                                    <label for="mission_target">Миссия, цели</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-xl-12">
                                                <div class="form-floating">
                                                    <div class="form-icon form-icon-end form-icon-middle" data-popover-toggle="socialSignificance">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="20" rx="10" fill="white" />
                                                            <path opacity="0.4" d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                                                        </svg>
                                                    </div>
                                                    <input value="{{ $application->social ?? '' }}" name="social" type="text" class="form-control form-control-bottom" id="social_significance" placeholder="Социальная значимость для региона/города">
                                                    <label for="social_significance">Социальная значимость для региона/города</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="section-competition-row">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-xl-12">
                                                <div class="form-floating">
                                                    <div class="form-icon form-icon-end form-icon-middle" data-popover-toggle="economicSignificance">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="20" rx="10" fill="white" />
                                                            <path opacity="0.4" d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                                                        </svg>
                                                    </div>
                                                    <input value="{{ $application->economic ?? '' }}" name="economic" type="text" class="form-control form-control-bottom" id="economic_significance" placeholder="Экономическая значимость для региона/города">
                                                    <label for="economic_significance">Экономическая значимость для региона/города</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-xl-12">
                                                <div class="form-floating">
                                                    <input value="{{ $application->levels_media ?? '' }}" name="levels_media" type="text" class="form-control form-control-bottom" id="level_media" placeholder="Уровень медийности">
                                                    <label for="level_media">Уровень медийности</label>
                                                    <div class="form-icon form-icon-info form-icon-end form-icon-middle" data-popover-toggle="levelMedia">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="20" rx="10" fill="white" />
                                                            <path opacity="0.4" d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 order-3">
                                    <div class="form-floating">
                                        <div class="form-icon form-icon-end form-icon-middle" data-popover-toggle="videoMessage">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="20" height="20" rx="10" fill="white" />
                                                <path opacity="0.4" d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                                            </svg>
                                        </div>
                                        <input value="{{ $application->video ?? '' }}" name="video" type="text" class="form-control form-control-bottom" id="video_message" placeholder="Видеообращение лидера команды">
                                        <label for="video_message">Мотивация участия лидера в образовательной программе ((Видеообращение лидера команды))</label>
                                    </div>
                                </div>
                                <div class="col-12 order-4">
                                    <div class="form-floating form-types form-types-file @if(isset($application->portfolio_team) && $application->portfolio_team) active @endif" file-group>
                                        <label class="form-type-label @if(isset($application->portfolio_team) && $application->portfolio_team) label-up @endif" for="file-upload">Портфолио команды</label>
                                        <input value="{{ $application->portfolio_team ?? '' }}" @if(isset($application->portfolio_team) && $application->portfolio_team) data-is-file="true" @endif name="portfolio_team" id="file-upload" type="file" class="form-control form-control-bottom">
                                        <div class="form-control form-type-file form-control-bottom" file-change-name="portfolio_team">
                                            @if(isset($application->portfolio_team) && $application->portfolio_team)
                                            <span class="file-delete" delete=""></span>
                                            <a target="_blank" href="{{ $application->portfolio_team }}">Портфолио команды</a>
                                            @endif
                                        </div>
                                        <div class="form-icon form-icon-end form-icon-middle" data-popover-toggle="teamPortfolio">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="20" height="20" rx="10" fill="white" />
                                                <path opacity="0.4" d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 order-5">
                                    <div class="form-floating">
                                        <div class="form-icon form-icon-end form-icon-middle" data-popover-toggle="outProject">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="20" height="20" rx="10" fill="white" />
                                                <path opacity="0.4" d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                                            </svg>
                                        </div>
                                        <input value="{{ $application->source ?? '' }}" name="source" type="text" class="form-control form-control-bottom" id="out_project" placeholder="Откуда ты узнал о проекте?">
                                        <label for="out_project">Откуда ты узнал о проекте?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="section-competition-column section-competition-team">
                            <div class="row">
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="form-check form-check-center">
                                        <input @if($application) checked @endif class="form-check-input" type="checkbox" value="" id="userAgreement" required>
                                        <label class="form-check-label" for="userAgreement">
                                            Согласие на <a href="/docs/soglasie_na_obrabotku_personalnyh_danyh.pdf" target="_blank">обработку <br>
                                                персональных данных</a>
                                        </label>
                                    </div>
                                </div>
                                <div class=" col-12 col-md-6 col-xl-4">
                                    <div class="form-check form-check-center">
                                        <input @if($application) checked @endif class="form-check-input" type="checkbox" value="" id="contestBegin" required>
                                        <label class="form-check-label" for="contestBegin">
                                            Согласие на участие во <br>
                                            всех этапах (очных и заочных)
                                        </label>
                                        <div class="form-icon form-icon-end form-icon-top" id="portfolio-btn" data-popover-toggle="myContest">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="20" height="20" rx="10" fill="white" />
                                                <path opacity="0.4" d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="form-check form-check-center">
                                        <input @if($application) checked @endif class="form-check-input" type="checkbox" value="" id="contestPublication" required>
                                        <label class="form-check-label" for="contestPublication">
                                            Согласие на публикацию <br>
                                            информации, содержащейся в заявке
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4 offset-xl-8">
                        @if($applicationsDeadlineIsUp)
                        <button disabled class="btn btn-primary w-100">
                            Редактирование закрыто
                        </button>
                        @else
                        <button ajax-elem type="submit" class="btn btn-primary w-100">
                            {{ $application ? 'Сохранить' : 'Подать заявку' }}
                        </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('hints')
<!-- Юридический статус -->
<div class="popover" id="legalStatus">
    <div class="popover-body">
        Укажи один из статусов: ИП, самозанятость, ООО, АНО, другое
    </div>
</div>

<!-- личное портфолио -->
<div class="popover" id="personalPortfolio">
    <div class="popover-body">
        Загрузи презентацию в формате pdf до 15 мб., уточни <br class="d-none d-md-inline">
        образование, поделись опытом реализации креативных <br class="d-none d-md-inline">
        проектов, отметь свои достижения
    </div>
</div>

<!-- о команде -->
<div class="popover" id="aboutTeam">
    <div class="popover-body">
        Расскажи о деятельности команды, отметь <br class="d-none d-md-inline">
        важные этапы ее формирования и развития, <br class="d-none d-md-inline">
        поделись вашими достижениями
    </div>
</div>

<!-- Откуда ты узнал о проекте? -->
<div class="popover" id="outProject">
    <div class="popover-body">
        Расскажи, откуда ты узнал о проекте - по рекомендации знакомых,
        из группы ВКонтакте, публикации в&nbsp;Интернете,
        Telegram или из других источников
    </div>
</div>

<!-- портфолио команды -->
<div class="popover" id="teamPortfolio">
    <div class="popover-body">
        <p>
            Загрузи презентацию на сайт о <br class="d-none d-md-inline">
            деятельности команды. Мы приветствуем <br class="d-none d-md-inline">
            лаконичность и рекомендуем ограничиться <br class="d-none d-md-inline">
            5-7 слайдами в формате .pdf, до 15 мб:
        </p>
        <p>
            1. Обложка – картинка для оформления заявки и привлечения внимания;
        </p>
        <p>
            2. География предпринимательства команды: регион, город;
        </p>
        <p>
            3. Информация о миссии и целях деятельности;
        </p>
        <p>
            4. Наиболее значимые реализованные проекты в сфере КИ;
        </p>
        <p>
            5. Основные достижения команды, награды (при наличии);
        </p>
        <p>
            6. Информация о медийности: публикации о лидере команды и ее участниках, реализованных проектах, информационный охват аудитории;
        </p>
        <p>
            7. Уровень вовлеченности лидера и команды в развитие КИ региона;
        </p>
        <p>
            8. Дополнительные материалы:
        </p>
        <p>
            рекомендательные письма, благодарности от партнеров и/или клиентов.
        </p>
    </div>
</div>

<!-- видеообращение -->
<div class="popover" id="videoMessage">
    <div class="popover-body">
        Прикрепи ссылку на видеообращение <br class="d-none d-md-inline">
        в формате .mp4, длительностью <br class="d-none d-md-inline">
        не более 1 минуты.
        <br><br>
        В видеообращении расскажи коротко о себе, <br class="d-none d-md-inline">
        планах по дальнейшему развитию своего дела <br class="d-none d-md-inline">
        и команды, мотивации участия в проекте <br class="d-none d-md-inline">
        и обучении креативному лидерству.
    </div>
</div>

<!-- мотивация -->
<div class="popover" id="motivationTeam">
    <div class="popover-body">
        Расскажи о своей личной мотивации участия <br class="d-none d-md-inline">
        в конкурсе, какие темы интересно изучить <br class="d-none d-md-inline">
        и почему, каковы твои ожидания от участия в <br class="d-none d-md-inline">
        образовательной программе и проекте в целом.
    </div>
</div>

<!-- Миссия, цели -->
<div class="popover" id="missionTarget">
    <div class="popover-body">
        Расскажи о целях своей деятельности
    </div>
</div>

<!-- Социальная значимость для региона/города -->
<div class="popover" id="socialSignificance">
    <div class="popover-body">
        Поделись вкладом твоей деятельности <br class="d-none d-md-inline">
        в решение актуальных социальных вопросов <br class="d-none d-md-inline">
        города или региона
    </div>
</div>

<!-- Экономическая значимость для региона/города -->
<div class="popover" id="economicSignificance">
    <div class="popover-body">
        Расскажи, как твоя деятельность влияет <br class="d-none d-md-inline">
        на экономическое развитие региона <br class="d-none d-md-inline">
        и его приоритетных направлений
    </div>
</div>

<!-- Уровень медийности -->
<div class="popover" id="levelMedia">
    <div class="popover-body">
        Поделись данными о медийности твоих <br class="d-none d-md-inline">
        проектов, показателями охвата в СМИ <br class="d-none d-md-inline">
        и соц.сетях; отметь наиболее важные из них
    </div>
</div>


<!-- Согласие на участие во всех этапах -->
<div class="popover" id="myContest">
    <div class="popover-body">
        Очные 4-дневные интенсивы пройдут <br class="d-none d-md-inline">
        в Ульяновске, Тюмени, Москве, Красноярске. <br class="d-none d-md-inline">
        Расходы на перелет и проживание за <br class="d-none d-md-inline">
        счет организатора проекта.
    </div>
</div>
@endsection

@section('modals')
<!-- заявка на рассмотрении -->
<div class="modal" id="leaders-competition-store-modal">
    <div class="modal-dialog modal-notify">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Ваша заявка <br>
                    принята!
                </h6>
            </div>
            <div class="modal-body">
                <div class="text-6 text-center opacity-75">
                    Ты можешь редактировать <br>
                    предоставленные сведения <br>
                    до окончания <br>
                    приема заявок
                </div>
            </div>
        </div>
    </div>
</div>

<!-- заявка успешно изменена -->
<div class="modal" id="leaders-competition-update-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Ваша заявка <br>
                    успешно изменена
                </h6>
            </div>
            <div class="modal-body">
                <div class="text-6 text-center">
                    Вы можете вносить <br>
                    корректировки до начала <br>
                    оценки экспертами.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@vite('resources/js/pages/profile/competition.js')
@endsection