<!-- Попап: Введите данные для оплаты -->
<div class="modal modal-payment" data-modal-id="payment">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <div class="h-4">
                    «Креативное лидерство: <br>
                    авторский подход к управлению»
                </div>
                <br>
                <div class="h-6">
                    Цена {{ $course_1_price }} Р.
                </div>
            </div>
            <div class="modal-body text-center">
                <form data-ajax-form action="{{ route('payment.store') }}" class="row g-4">
                    @csrf
                    <input type="hidden" name="paymentable_type" value="App\Models\Course" />
                    <input type="hidden" name="paymentable_id" value="1" />
                    <div class="col-12">
                        <div class="form-floating">
                            <input value="{{ request()->user()->name ?? '' }}" name="name" type="text" class="form-control form-control-bottom" id="payment_name" placeholder="Имя Фамилия">
                            <label for="payment_name">Имя Фамилия</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input value="{{ request()->user()->email ?? '' }}" name="email" type="text" class="form-control form-control-bottom" id="payment_email" placeholder="E-mail">
                            <label for="payment_email">E-mail</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input value="{{ request()->user()->phone ?? '' }}" name="phone" type="text" class="form-control form-control-bottom" id="payment_phone" placeholder="Телефон">
                            <label for="payment_phone">Телефон</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input value="{{ request('promo_code') }}" name="promo_code" type="text" class="form-control form-control-bottom" id="payment_promocode" placeholder="введите промокод, если есть">
                            <label for="payment_promocode">введите промокод, если есть</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <p class="text-6 opacity-50">
                            чек после оплаты будет <br class="d-inline d-md-none">направлен вам на почту
                        </p>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100">Перейти к оплате</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="text-6 text-center">
                    нажимая на кнопку, вы разрешаете нам обрабатывать ваши <br class="d-none d-md-inline">
                    <a href="{{ Route('agreement.data') }}" class="link" target="_blank">персональные данные</a> и соглашаетесь с <a href="{{ Route('agreement.offer') }}" class="link" target="_blank">условиями оферты</a>
                </p>
            </div>
        </div>
    </div>
</div>