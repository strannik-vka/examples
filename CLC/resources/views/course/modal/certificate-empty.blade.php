<!-- Попап: прошли все курсы, но сертификат еще не доступен -->
<div class="modal" data-modal-id="certificateEmptyModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Поздравляем!
                </h6>
            </div>
            <div class="modal-body text-center">
                <p class="text-6 opacity-75">
                    Вы прошли курс <br>
                    «{{ $course->name }}». <br>
                    Мы оповестим вас, когда <br>
                    сертификат станет доступен
                </p>
                <br>
                <a href="javascript://" class="btn btn-primary" btn-close-modal>Хорошо</a>
            </div>
        </div>
    </div>
</div>