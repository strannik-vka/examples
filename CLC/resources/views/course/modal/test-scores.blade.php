<!-- Баллы за тест -->
<div class="modal" data-modal-id="testScores">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Результат
                </h6>
            </div>
            <div class="modal-body text-center">
                <p class="text-6 opacity-75">
                    Оценка за тест: <br>
                    <span class="fw-bold" data-points></span>
                </p>
                <p class="text-6 opacity-75" data-success="end-text">
                    Ты хорошо усвоил материал!
                </p>
                <p class="text-6 opacity-75" data-success="text">
                    Ты хорошо усвоил <br>
                    материал, переходи <br>
                    к следующему уроку!
                </p>
                <p class="text-6 opacity-75" data-error>
                    Рекомендуем тебе просмотреть <br>
                    видео еще раз и перепройти тест, <br>
                    чтобы улучшить свои <br>
                    результаты!
                </p>
                <br>
                <div class="row g-2" data-success>
                    <div class="col-12">
                        <a data-next-btn href="javascript://" class="btn btn-primary w-100">Следующий урок</a>
                    </div>
                </div>
                <div class="row g-2" data-error>
                    <div class="col-12">
                        <a data-retest href="javascript://" class="btn btn-primary w-100">Перепройти</a>
                    </div>
                    <div class="col-12">
                        <a data-next-btn href="javascript://" class="btn btn-outline-dark w-100">Следующий урок</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>