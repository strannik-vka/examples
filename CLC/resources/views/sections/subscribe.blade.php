<section class="section section-content section-subscribe">
    <div class="container">
        <div class="section-subscribe-inner">
            <form data-ajax-form action="{{ Route('subscribe.store') }}" class="row">
                <div class="col-12 col-md-6 col-xl-auto">
                    <div class="section-subscribe-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                        <h5 data-ajax-form-hide>
                            @if(Route::is('post.index') || Route::is('post.show'))
                            Подписывайся и будь <br>
                            в курсе новостей
                            @else
                            Получи чек-лист <br>
                            креативного лидера
                            @endif
                        </h5>
                        <h5 data-ajax-form-show style="display: none;">
                            @if(Route::is('post.index') || Route::is('post.show'))
                            Спасибо <br>
                            за подписку!
                            @else
                            Проверь <br>
                            свою почту!
                            @endif
                        </h5>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-auto">
                    <div class="section-subscribe-description wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                        <div data-ajax-form-hide class="text-5 opacity-50 text-left text-md-right text-xl-left">
                            @if(Route::is('post.index') || Route::is('post.show'))
                            Мы будем направлять только <br>
                            полезную для тебя информацию
                            @else
                            Мы направим чек-лист <br>
                            на указанную тобой почту
                            @endif
                        </div>
                        <div data-ajax-form-show style="display: none;" class="text-5 opacity-50 text-left text-md-right text-xl-left">
                            @if(Route::is('post.index') || Route::is('post.show'))
                            Мы будем направлять только <br>
                            полезную для тебя информацию
                            @else
                            Мы направим чек-лист <br>
                            на указанную тобой почту
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl">
                    <div class="section-subscribe-form input-group wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        @if(Route::is('post.index') || Route::is('post.show'))
                        <input type="hidden" name="type_id" value="2" />
                        @else
                        <input type="hidden" name="type_id" value="1" />
                        @endif
                        <input type="email" name="email" class="form-control form-control-large" placeholder="Твой e-mail" aria-label="Твой e-mail">
                        <button data-ajax-form-hide class="btn btn-primary" type="submit">
                            @if(Route::is('post.index') || Route::is('post.show'))
                            Подписаться
                            @else
                            Получить
                            @endif
                        </button>
                        <button data-ajax-form-show data-ajax-form-reset style="display:none" type="button" class="btn btn-icon btn-primary">
                            Изменить E-mail
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>