@extends('layouts.app')

@section('title', 'Лагерь креативных лидеров - Оценка проектов')

@section('head')
@vite('resources/scss/pages/evaluation/index.scss')
@endsection

@section('content')
<section class="section section-content section-evaluation">
    <div class="container">
        <div class="section-evaluation-row row">
            <div class="col-lg-6 col-12">
                <div class="section-evaluation-title h-3">
                    {{ $user->name }}
                </div>
                <div class="section-evaluation-score d-md-block d-none">
                    @include('evaluation.block.timer')
                </div>
                <div class="section-evaluation-support d-md-block d-none">
                    <div class="section-evaluation-text opacity-70">
                        <p class="m-0">
                            Если у вас возникли сложности в оценивании работ,<br class="d-md-inline d-sm-inline d-none">
                            обратитесь к&nbsp;менеджеру образовательной&nbsp;программы.
                        </p>
                    </div>
                    <div class="section-evaluation-support-footer">
                        <a href="https://t.me/+79511327901" class="text-decoration-none" target="_blank" rel="nofollow">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="support-link">
                                        <span class="btn btn-social btn-social-light">
                                            <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.5507 0.132424C15.5507 0.132424 17.1233 -0.516861 16.9922 1.05998C16.9486 1.70927 16.5554 3.98177 16.2496 6.4398L15.2012 13.7211C15.2012 13.7211 15.1139 14.7878 14.3275 14.9733C13.5412 15.1588 12.3618 14.324 12.1433 14.1385C11.9686 13.9994 8.86704 11.9123 7.77492 10.892C7.46912 10.6138 7.11965 10.0572 7.81859 9.40795L12.4054 4.77021C12.9296 4.21367 13.4538 2.9151 11.2696 4.49194L5.15388 8.89782C5.15388 8.89782 4.45494 9.36158 3.14444 8.94419L0.304956 8.01664C0.304956 8.01664 -0.743463 7.32098 1.04759 6.62528C5.416 4.44553 10.7891 2.2194 15.5507 0.132424Z" fill="#020726" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="support-link">
                                        Юлия Шапошникова +79511327901
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="section-evaluation-column">
                    <div class="section-evaluation-description">
                        <div class="evaluation-textblock">
                            <div class="section-evaluation-subtitle h-6">Проект «Лагерь креативных лидеров»</div>
                            <p class="evaluation-textblock-description opacity-70">
                                Благодаря Вашей оценке будут определены 10 <br class="d-none d-lg-inline d-xl-none">победителей, <br class="d-none d-md-inline d-lg-none d-xl-inline">
                                которые примут участие в очных <br class="d-none d-lg-inline d-xl-none">образовательных <br class="d-none d-md-inline d-lg-none d-xl-inline">
                                интенсивах в Ульяновске, Тюмени, <br class="d-none d-lg-inline d-xl-none">Москве, Красноярске и под <br class="d-none d-md-inline d-lg-none d-xl-inline">
                                руководством наставников <br class="d-none d-lg-inline d-xl-none">смогут трансформировать модель <br class="d-none d-md-inline d-lg-none d-xl-inline">
                                управления, выйти <br class="d-none d-lg-inline d-xl-none">на новый уровень развития бизнеса.
                            </p>
                            <p class="evaluation-textblock-description opacity-70">
                                Просим Вас оценить конкурсные заявки в личном <br class="d-none d-md-inline">
                                кабинете эксперта до 6 августа. <a href="javascript://" style="color: #60D700;text-decoration-skip-ink: none;" data-modal-open="readmore-modal">Читать далее.</a>
                            </p>
                        </div>
                    </div>
                    <div class="section-evaluation-score d-md-none d-block">
                        @include('evaluation.block.timer')
                        <div class="section-evaluation-support d-md-none d-block">
                            <div class="section-evaluation-text opacity-70">
                                <p class="m-0">
                                    Если у вас возникли сложности в оценивании работ,<br class="d-md-inline d-sm-inline d-none">
                                    обратитесь к&nbsp;менеджеру образовательной&nbsp;программы.
                                </p>
                            </div>
                            <div class="section-evaluation-support-footer">
                                <a href="https://t.me/+79511327901" class="text-decoration-none" target="_blank" rel="nofollow">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="support-link">
                                                <span class="btn btn-social btn-social-light">
                                                    <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.5507 0.132424C15.5507 0.132424 17.1233 -0.516861 16.9922 1.05998C16.9486 1.70927 16.5554 3.98177 16.2496 6.4398L15.2012 13.7211C15.2012 13.7211 15.1139 14.7878 14.3275 14.9733C13.5412 15.1588 12.3618 14.324 12.1433 14.1385C11.9686 13.9994 8.86704 11.9123 7.77492 10.892C7.46912 10.6138 7.11965 10.0572 7.81859 9.40795L12.4054 4.77021C12.9296 4.21367 13.4538 2.9151 11.2696 4.49194L5.15388 8.89782C5.15388 8.89782 4.45494 9.36158 3.14444 8.94419L0.304956 8.01664C0.304956 8.01664 -0.743463 7.32098 1.04759 6.62528C5.416 4.44553 10.7891 2.2194 15.5507 0.132424Z" fill="#020726" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="support-link">
                                                Юлия Шапошникова +79511327901
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if(count($evaluations))
                    <div class="section-evaluation-nominees">
                        <div class="evaluation-textblock">
                            <div class="section-evaluation-subtitle">
                                <a href="{{ Route('evaluation.projects') }}" class="h-6 opacity-70">Заявки для оценки</a>
                            </div>
                            <div class="evaluation-textblock-description">
                                <div class="section-evaluation-nomlist">
                                    @foreach($evaluations as $evaluation)
                                    @include('evaluation.block.nominees-list-item')
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('modals')
<div class="modal modal-readmore" data-modal-id="readmore-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-body">
                <div class="text-6 opacity-75">
                    <p>
                        При заполнении конкурсной заявки на сайте проекта, каждому лидеру было <br class="d-none d-lg-inline">
                        предложено рассказать о себе и деятельности команды в регионе, а также приложить <br class="d-none d-lg-inline">
                        личное резюме, мотивационную видеовизитку и портфолио команды.
                    </p>

                    <p>
                        Предполагается, что оценка выполняется по пяти критериям:
                    </p>
                    <p>
                        <b>1. Социальная&nbsp;значимость <br class="d-inline d-md-none">деятельности&nbsp;для&nbsp;региона/города</b>
                        <br>
                        В рамках этого критерия просим обратить внимание на влияние деятельности <br class="d-none d-lg-inline">
                        лидера и команды на решение актуальных социальных проблем в регионе, <br class="d-none d-lg-inline">
                        на цель и миссию команды для решения данных задач
                    </p>
                    <p>
                        <b>2. Экономическая&nbsp;значимость <br class="d-inline d-md-none">деятельности&nbsp;для&nbsp;региона/города</b>
                        <br>
                        По этому критерию оценивается влияние деятельности на экономическое развитие региона и его <br class="d-none d-lg-inline">
                        приоритетных направлений, в том числе цель и миссия команды для решения данных задач
                    </p>
                    <p>
                        <b>3. Уровень медийности</b>
                        <br>
                        В рамках данного критерия учитывается упоминаемость деятельности лидера и команды в СМИ и <br class="d-none d-lg-inline">
                        социальных сетях согласно предоставленной участником информации
                    </p>
                    <p>
                        <b>4. Соответствие&nbsp;деятельности команды&nbsp;высоким профессиональным принципам&nbsp;и&nbsp;стандартам</b>
                        <br>
                        По описанию деятельности лидера и команды, его квалификации и портфолио просим оценить уровень <br class="d-none d-lg-inline">
                        профессиональных компетенций команды и ее лидера
                    </p>
                    <p>
                        <b>5. Уровень лидерских&nbsp;качеств и&nbsp;мотивация&nbsp;на развитие</b>
                        <br>
                        По приложенному к заявке видеообращению вы можете оценить личные качества заявителя как <br class="d-none d-lg-inline">
                        креативного лидера и его видение пути развития себя и команды <br class="d-none d-lg-inline">
                        Каждый критерий оценивается по 10-ти балльной шкале.
                    </p>

                    <p>
                        При возникновении вопросов в процессе оценки или сложностей в работе личного кабинета, вы можете <br class="d-none d-lg-inline">
                        обратиться к менеджеру образовательной программы Юлии Шапошниковой +7 (951) 132 79 01
                    </p>
                    <p>
                        Спасибо за сотрудничество!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@vite('resources/js/pages/evaluation/index.js')
@endsection