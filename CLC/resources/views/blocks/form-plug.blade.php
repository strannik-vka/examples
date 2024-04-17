<form data-ajax-form action="{{ Route('subscribe.store') }}" class="form form-plug-feedback">
    <input type="hidden" name="type_id" value="1">
    <div class="row">
        <div class="col-12">
            <div class="form-plug-title animatedElem">
                <h5>
                    <span data-ajax-form-hide>Узнать о запуске первым</span>
                    <span data-ajax-form-show style="display:none">Спасибо за подписку</span>
                </h5>
            </div>
        </div>
        <div class="col-12">
            <div class="form-plug-description animatedElem">
                <span class="text-6 stuff">
                    <span data-ajax-form-hide>
                        Узнай первым о программе обучения <br>
                        и получи чек-лист креативного лидера
                    </span>
                    <span data-ajax-form-show style="display:none">
                        Мы направим чек-лист креативного <br>
                        лидера на указанную почту
                    </span>
                </span>
            </div>
        </div>
        <div class="col-12">
            <div class="form-plug-place animatedElem">
                <div class="form-floating">
                    <input type="email" name="email" required class="form-control" id="floatingInput" placeholder="ваша@почта">
                    <label for="floatingInput">ваша@почта</label>
                    <button data-ajax-form-hide type="submit" class="form-floating-button"></button>
                    <button data-ajax-form-show style="display:none" data-ajax-form-reset type="button" class="form-floating-reset"></button>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-plug-text animatedElem">
                <span class="text-11 opacity-40">
                    Я даю свое согласие на обработку <br class="d-inline d-xl-none">
                    и использование <a href="javascript://" class="text-link" target="_blank">персональных данных</a>
                </span>
            </div>
        </div>
    </div>
</form>