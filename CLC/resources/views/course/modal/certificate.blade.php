@include('course.modal.certificate-empty')

<!-- Попап: прошли все курсы -->
<div class="modal" data-modal-id="certificateModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Поздравляем!
                </h6>
            </div>
            <div class="modal-body text-center">
                <p class="text-6 opacity-75" data-advanced>
                    Вы прошли курс <br>
                    «{{ $course->name }}» <br>
                    и получили продвинутый <br>
                    сертификат
                </p>
                <p class="text-6 opacity-75" data-basic>
                    Вы прошли курс <br>
                    «{{ $course->name }}» <br>
                    и получили базовый <br>
                    сертификат
                </p>
                <p class="text-6 opacity-75" data-basic>
                    Для получения продвинутого <br>
                    сертификата, сдайте все задания
                </p>
                <br>
                <a data-url href="javascript://" target="_blank" class="btn btn-primary">Скачать сертификат</a>
            </div>
        </div>
    </div>
</div>