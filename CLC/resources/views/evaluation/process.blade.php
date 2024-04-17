@extends('layouts.app')

@section('title', 'Лагерь креативных лидеров - Название проекта')

@section('head')
@vite('resources/scss/pages/evaluation/process.scss')
@endsection

@section('content')
<section class="section section-content section-navigation">
    <div class="container">
        <div class="section-navigation-inner">
            <a href="{{ $url_previous }}" class="btn btn-icon">
                <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.292893 7.29289C-0.097631 7.68342 -0.097631 8.31658 0.292893 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292893 7.29289ZM2 7H1L1 9H2L2 7Z" fill="#020726" />
                </svg>
                <span class="btn-icon-text">Назад</span>
            </a>
        </div>
    </div>
</section>

<section class="section section-content section-process">
    <div class="container">
        <div class="section-process-row row">
            <div class="col-lg-6 col-12 order-lg-2">
                <div class="section-process-title">
                    <h3 class="h3 m-0">
                        {{ $project->fio }}
                    </h3>
                </div>
                <div class="section-process-score d-lg-flex d-none">
                    @include('evaluation.block.score')
                </div>
            </div>
            <div class="col-lg-6 col-12 order-lg-1">

                <div class="badge badge-primary text-left w-100">
                    <div class="section-process-portfolio">
                        <div class="row">
                            <div class="col-12">
                                <span class="h-6">Портфолио</span>
                            </div>
                            <div class="col-12">
                                <div class="devider devider-dark devider-x2 opacity-20"></div>
                            </div>
                            @if($project->portfolio_file)
                            <div class="col-12">
                                <a target="_blank" href="{{ $project->portfolio_file }}" class="text-4">Резюме лидера.pdf</a>
                            </div>
                            @endif
                            @if($project->video)
                            <div class="col-12">
                                <a target="_blank" href="{{ $project->video }}" class="text-4">Мотивационная видеовизитка лидера</a>
                            </div>
                            @endif
                            @if($project->portfolio_team)
                            <div class="col-12">
                                <a target="_blank" href="{{ $project->portfolio_team }}" class="text-4">Портфолио команды.pdf</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="section-process-description">
                    <div class="h-6">Общие сведения</div>
                </div>

                @if($project->name)
                <div class="section-process-description">
                    <div class="evaluation-textblock">
                        <div class="section-process-subtitle text-6">Наименование команды/ организации</div>
                        <div class="evaluation-textblock-description text-6">
                            <p>{{ $project->name }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($activitySphereNames)
                <div class="section-process-description">
                    <div class="evaluation-textblock">
                        <div class="section-process-subtitle text-6">Сфера деятельности</div>
                        <div class="evaluation-textblock-description text-6">
                            <p>{{ implode("\n", $activitySphereNames) }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($project->website)
                <div class="section-process-description">
                    <div class="evaluation-textblock">
                        <div class="section-process-subtitle text-6">Сайт организации/страница в соц.сетях</div>
                        <div class="evaluation-textblock-description text-6">
                            <p><a href="{{ $project->website }}" target="_blank">{{ $project->website }}</a> </p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="section-process-description">
                    <div class="h-6">Лидер</div>
                </div>

                @if($project->fio)
                <div class="section-process-description">
                    <div class="evaluation-textblock">
                        <div class="section-process-subtitle text-6">ФИО</div>
                        <div class="evaluation-textblock-description text-6">
                            <p>{{ $project->fio }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($project->social_network)
                <div class="section-process-description">
                    <div class="evaluation-textblock">
                        <div class="section-process-subtitle text-6">Ссылка на страницу в соц.сетях</div>
                        <div class="evaluation-textblock-description text-6">
                            <p><a href="{{ $project->social_network }}" target="_blank">{{ $project->social_network }}</a></p>
                        </div>
                    </div>
                </div>
                @endif

                @if($project->region)
                <div class="section-process-description">
                    <div class="evaluation-textblock">
                        <div class="section-process-subtitle text-6">Регион проживания</div>
                        <div class="evaluation-textblock-description text-6">
                            <p>{{ $project->region }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="section-process-description">
                    <div class="h-6">Команда</div>
                </div>

                @if($project->about_team)
                <div class="section-process-description">
                    <div class="evaluation-textblock">
                        <div class="section-process-subtitle text-6">Общая информация о команде</div>
                        <div class="evaluation-textblock-description text-6">
                            <p>{{ $project->about_team }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($project->mission)
                <div class="section-process-description">
                    <div class="evaluation-textblock">
                        <div class="section-process-subtitle text-6">Миссия, цели</div>
                        <div class="evaluation-textblock-description text-6">
                            <p>{{ $project->mission }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($project->social)
                <div class="section-process-description">
                    <div class="evaluation-textblock">
                        <div class="section-process-subtitle text-6">Социальная значимость для региона/города</div>
                        <div class="evaluation-textblock-description text-6">
                            <p>{{ $project->social }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($project->economic)
                <div class="section-process-description">
                    <div class="evaluation-textblock">
                        <div class="section-process-subtitle text-6">Экономическая значимость для региона/города</div>
                        <div class="evaluation-textblock-description text-6">
                            <p>{{ $project->economic }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($project->levels_media)
                <div class="section-process-description">
                    <div class="evaluation-textblock">
                        <div class="section-process-subtitle text-6">Уровень медийности</div>
                        <div class="evaluation-textblock-description text-6">
                            <p>{{ $project->levels_media }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="section-process-score d-lg-none d-flex">
                    @include('evaluation.block.score')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('modals')
<!-- Оценка успешно изменена -->
<div class="modal modal-notify" data-modal-id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Ваша <br>
                    оценка изменена!
                </h6>
            </div>
            <div class="modal-body">
                <a href="{{ Route('evaluation.index') }}" class="btn btn-primary w-100">На главную</a>
            </div>
        </div>
    </div>
</div>

<!-- Оценка успешна отправлена -->
<div class="modal modal-notify" data-modal-id="successModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Спасибо, ваша <br>
                    оценка отправлена!
                </h6>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-12">
                        <a href="{{ Route('evaluation.process') }}" class=" btn btn-primary w-100">Следующая заявка</a>
                    </div>
                    <div class="col-12">
                        <a href="{{ Route('evaluation.projects') }}" class="btn btn-outline-primary w-100">Список заявок</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@vite('resources/js/pages/evaluation/process.js')
@endsection