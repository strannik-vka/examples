@yield('modals')

<div class="modal" data-modal-id="soon">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title text-left">
                    <div class="fw-300 text-uppercase">Воркшоп</div>
                    <div class="fw-700 text-uppercase">Цели и ценности</div>
                    <div class="fw-300 text-uppercase">14 апреля, 11:00 (МСК)</div>
                </div>
                <button type="button" class="modal-close" btn-close-modal></button>
            </div>
            <div class="modal-body">
                <form data-ajax-form class="row g-5" id="payment_form" action="{{ route('payment.store') }}" data-submit-event="{{ route('form.fill') }}">
                    @csrf
                    <input type="hidden" name="title" value="Заполнена форма оплаты" />
                    <input type="hidden" name="payment_product_id" value="1" />
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="name" name="name" class="form-control w-100" id="userName" value="" placeholder="ФИО" />
                            <label for="userName">ФИО</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control w-100" id="userEmail" value="" placeholder="E-mail" />
                            <label for="userEmail">E-mail</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" name="phone" class="form-control w-100" id="phone" value="" placeholder="Телефон" />
                            <label for="phone">Телефон</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" name="telegram" class="form-control w-100" id="userTg" value="" placeholder="Ссылка на ваш телеграм" />
                            <label for="userTg">Ссылка на ваш телеграм</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="modal-footer">
                            <div class="col-12">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-green btn-form w-100 w-md-auto disabled">Купить за {{ $course_1_price }} руб.</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-left text-md-center">
                                            Нажимая на кнопку, я даю согласие на <a href="/assets/docs/Politika_obrabotki_personalnykh_dannykh.pdf" target="_blank">обработку моих <br>
                                                персональных данных</a>, соглашаюсь с условиями <a href="/assets/docs/Oferta_o_zaklyuchenii_dogovora_okazania_uslug_po_predostavleniyu_dostupa.pdf" target="_blank">оферты</a>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="text-left text-md-center">
                                    Чек после оплаты будет направлен вам на почту.
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" data-modal-id="success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title text-left">
                    <div class="fw-700 text-uppercase">
                        Увидимся <br>
                        на воркшопе!
                    </div>
                </div>
                <button type="button" class="modal-close" btn-close-modal></button>
            </div>
            <div class="modal-body">
                <ol class="pl-3 text-secondary" style="max-width: 17.813rem;">
                    <li>На вашу почту мы направили письмо с доступами к личному кабинету онлайн-тренажера. Если не нашли письмо даже в папке “Спам”, обратитесь с этим вопросом в канал организаторов.</li>
                    <li>Мы уже сделали чат для общения тех, кто участвует в воркшопе. Вступай, именно там будут все анонсы и подготовка к Воркшопу. </li>
                </ol>
            </div>
            <div class="modal-footer">
                <div class="row g-3">
                    <div class="col-12">
                        <a data-tg-url href="https://t.me/+7V6OdRSfySY4NjUy" target="_blank" class="btn btn-green w-100">
                            Перейти в Телеграм-канал
                        </a>
                    </div>
                    <div class="col-12">
                        <button btn-close-modal type="button" class="btn btn-outline-black w-100">
                            Закрыть
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" data-modal-id="unsubscribe">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title text-left">
                    <div class="fw-700 text-uppercase">
                        Вы успешно отписались от рассылки
                    </div>
                </div>
                <button type="button" class="modal-close" btn-close-modal></button>
            </div>
            <div class="modal-body">
                Вы успешно отписались от почтовой рассылки<br>
                на Вашу почту {{ request('email') }} больше нe будут приходить письма<br>
                с сайта {{ config('app.url') }}
            </div>
            <div class="modal-footer">
                <button btn-close-modal type="button" class="btn btn-outline-black w-100">
                    Закрыть
                </button>
            </div>
        </div>
    </div>
</div>