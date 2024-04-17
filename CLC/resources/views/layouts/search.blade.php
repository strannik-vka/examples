<div class="modal modal-search" data-modal-id="search-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-body">
                <div class="text-6 text-center">
                    <div data-search-form class="form">
                        <div class="row g-4">
                            <div class="col-12">
                                <input name="search" type="search" class="form-control form-control-bottom" placeholder="Страницы, новости, эксперты">
                            </div>
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-6 col-md-4 order-1">
                                        <input name="categories[]" value="about" type="checkbox" class="btn-check" id="btn-check" autocomplete="off">
                                        <label class="btn btn-primary w-100" for="btn-check">О проекте</label>
                                    </div>
                                    <div class="col-12 col-md-4 order-3 order-md-2">
                                        <input name="categories[]" value="contest" type="checkbox" class="btn-check" id="btn-check2" autocomplete="off">
                                        <label class="btn btn-primary w-100" for="btn-check2">О конкурсе</label>
                                    </div>
                                    <div class="col-6 col-md-4 order-2 order-md-3">
                                        <input name="categories[]" value="experts" type="checkbox" class="btn-check" id="btn-check3" autocomplete="off">
                                        <label class="btn btn-primary w-100" for="btn-check3">Эксперты</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-content">
                        <div class="row">
                            <!-- Когда не пользовались поиском -->
                            <div class="col-12" data-search-start>
                                <div class="search-start">
                                    Вы можете искать по ключевому слову как в категориях, так и вне их
                                </div>
                            </div>

                            <!-- Прелоадер -->
                            <div class="col-12" items-preloader-search style="display: none;">
                                <div class="search-preloader">
                                    <div class="spinner-border" role="status"></div>
                                </div>
                            </div>

                            <!-- Когда нет результатов -->
                            <div class="col-12" items-empty-search style="display: none;">
                                <div class="search-empty">
                                    <!-- По запросу «<span html="query"></span>» и категории <span html="category"></span> ничего не найдено. -->
                                    По запросу «<span html="query"></span>» ничего не найдено.
                                </div>
                            </div>

                            <!-- Список результатов -->
                            <div class="col-12">
                                <div items-html-search style="display: none;">
                                    <a attr="href:url" target="_blank" class="search-item">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="search-item-text" html="name"></div>
                                            </div>
                                            <div class="col-3">
                                                <div class="search-item-category" html="category"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="search-list" items-list-search="{{ route('search.index') }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>