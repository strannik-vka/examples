<!-- Попап: проверка статуса оплаты -->
<div class="modal" data-modal-id="paidCourseAccess">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <div class="h-5">
                    Упс!
                </div>
            </div>
            <div class="modal-body text-center">
                <p class="text-6 opacity-75">
                    Доступ ограничен. <br>
                    Чтобы продолжить обучение, <br>
                    пожалуйста, оформите <br>
                    подписку на курс.
                </p>
                <p class="h-6">
                    Цена: {{ $course_1_price }} рублей
                </p>
                <br>
                <a href="javascript://" class="btn btn-primary w-100" data-modal-open="payment" btn-close-modal>Купить</a>
            </div>
        </div>
    </div>
</div>