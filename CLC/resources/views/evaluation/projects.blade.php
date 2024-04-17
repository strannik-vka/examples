@extends('layouts.app')

@section('title', 'Лагерь креативных лидеров - Список проектов')

@section('head')
@vite('resources/scss/pages/evaluation/projects.scss')
@endsection

@section('content')
<section class="section section-content section-navigation">
    <div class="container">
        <div class="section-navigation-inner">
            <a href="{{ Route('evaluation.index') }}" class="btn btn-icon">
                <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.292893 7.29289C-0.097631 7.68342 -0.097631 8.31658 0.292893 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292893 7.29289ZM2 7H1L1 9H2L2 7Z" fill="#020726" />
                </svg>
                <span class="btn-icon-text">Назад</span>
            </a>
        </div>
    </div>
</section>

<section class="section section-content section-projects">
    <div class="container">
        <div class="section-projects-header">
            <div class="section-projects-title">
                <h3 class="h-3">Полный список заявок</h3>
            </div>

            <div class="section-projects-after text-8">У вас есть доступ к оценке заявок</div>

        </div>
        <div class="section-projects-content">
            <div class="project-table">
                <div class="project-table-header">
                    <div class="row">
                        <div class="col-auto project-table-switch">
                            <a href="javascript://" class="rewind-link" data-sort="id">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.111 10.8889V5.44444H8.55542V10.8889H6.22209L9.3332 14L12.4443 10.8889H10.111ZM4.66653 0L1.55542 3.11111H3.88875V8.55556H5.44431V3.11111H7.77764L4.66653 0Z" fill="#020726" />
                                </svg>

                            </a>
                        </div>
                        <div class="col project-table-fio project-table-title">
                            Фио
                        </div>
                        <div class="col-auto project-table-eval project-table-title">
                            <a href="javascript://" class="rewind-link" data-sort="completed">
                                <span class="rewind-link-text">Оценено</span>
                                <span class="rewind-link-icon">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.111 10.8889V5.44444H8.55542V10.8889H6.22209L9.3332 14L12.4443 10.8889H10.111ZM4.66653 0L1.55542 3.11111H3.88875V8.55556H5.44431V3.11111H7.77764L4.66653 0Z" fill="#020726" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="col-auto project-table-result project-table-title">
                            <a href="javascript://" class="rewind-link" data-sort="total">
                                <span class="rewind-link-text">
                                    Сум.<br>
                                    балл
                                </span>
                                <span class="rewind-link-icon">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.111 10.8889V5.44444H8.55542V10.8889H6.22209L9.3332 14L12.4443 10.8889H10.111ZM4.66653 0L1.55542 3.11111H3.88875V8.55556H5.44431V3.11111H7.77764L4.66653 0Z" fill="#020726" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="col-12 project-table-filter">
                            <div class="form-types">
                                <div data-valid-group>
                                    <div data-select data-valid-input="sort">
                                        <div class="form-floating" id="sortSelect" aria-expanded="false" data-popover-toggle="sortable_list">
                                            <input data-check-value="1" type="select" id="sort_input" class="form-control form-control-bottom deactive" autocomplete="off" style="cursor:pointer;" placeholder="Сортировка" readonly required>
                                            <label data-valid-label data-select-title for="sort_input">Сортировка</label>
                                            <div class="form-icon form-icon-dropdown form-icon-end form-icon-middle">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g opacity="0.4">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill="#020726" />
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                        <div data-select-options class="popover" id="sortable_list" aria-labelledby="sortSelect">
                                            <div class="popover-body">
                                                <div class="input-box-list-row row g-3">
                                                    <div class="col-12">
                                                        <div class="text-6">Порядковый номер</div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input value="id:asc" class="form-check-input" type="radio" name="sort" id="sort_1">
                                                            <label class="form-check-label" for="sort_1">
                                                                По возрастанию
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input value="id:desc" class="form-check-input" type="radio" name="sort" id="sort_2">
                                                            <label class="form-check-label" for="sort_2">
                                                                По убыванию
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="text-6">Оценено</div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input value="completed:asc" class="form-check-input" type="radio" name="sort" id="sort_3">
                                                            <label class="form-check-label" for="sort_3">
                                                                По возрастанию
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input value="completed:desc" class="form-check-input" type="radio" name="sort" id="sort_4">
                                                            <label class="form-check-label" for="sort_4">
                                                                По убыванию
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="text-6">Сумм. баллов</div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input value="total:asc" class="form-check-input" type="radio" name="sort" id="sort_5">
                                                            <label class="form-check-label" for="sort_5">
                                                                По возрастанию
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input value="total:desc" class="form-check-input" type="radio" name="sort" id="sort_6">
                                                            <label class="form-check-label" for="sort_6">
                                                                По убыванию
                                                            </label>
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

                @include('evaluation.block.nominees-item')

                <div class="project-table-content" items-list-project="{{ Route('evaluation.projects') }}"></div>
            </div>
        </div>
    </div>
    <div items-preloader-project class="section-projects-preloader" style="display:none;">
        <div class="spinner-grow" role="status"></div>
    </div>
</section>
@endsection

@section('scripts')
@vite('resources/js/pages/evaluation/projects.js')
@endsection