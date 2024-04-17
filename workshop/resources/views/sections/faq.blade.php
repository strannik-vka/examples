<section class="section section-content section-faq">
    <div class="container">
        <div class="section-faq-inner">
            <div class="section-faq-content">
                <div class="section-faq-cards">
                    @for ($i = 1; $i < 3; $i++) <!-- Вопросы/ответы -->
                        <div class="collapse collapse-card" data-collapse-id="collapse_{{ $i }}">
                            <div class="collase-card-inner">
                                <div class="collapse-card-header" data-collapse-toggle="collapse_{{ $i }}">
                                    <div class="row g-3 align-items-start align-items-md-center">
                                        <div class="col-12 col-md">
                                            @if($i == 1)
                                            Могу ли я оплатить иностранной картой?
                                            @elseif($i == 2)
                                            Проходил семинар, можно ли участвовать онлайн?
                                            @endif
                                        </div>
                                        <div class="col-auto">
                                            <div class="collapse-card-button">
                                                <button type="button" class="btn btn-icon btn-icon-burger">
                                                    <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <line y1="13" x2="25" y2="13" stroke="#020726" />
                                                        <line x1="12.5" y1="25.5" x2="12.5" y2="0.5" stroke="#020726" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse-card-collapsed">
                                    @if($i == 1)
                                    <ul>
                                        <li>Внимательно прочитать Положение о Конкурсе <a href="#" target="_blank">здесь</a></li>
                                        <li>Заполнить заявку и подтвердить согласие на обработку персональных данных</li>
                                        <li>Загрузить презентацию и / или видеоролик</li>
                                        <li>Не забыть указать свои контакты, чтобы мы могли с вами связаться</li>
                                    </ul>
                                    @elseif($i == 2)
                                    <ul>
                                        <li>Внимательно прочитать Положение о Конкурсе <a href="#" target="_blank">здесь</a></li>
                                        <li>Заполнить заявку и подтвердить согласие на обработку персональных данных</li>
                                        <li>Загрузить презентацию и / или видеоролик</li>
                                        <li>Не забыть указать свои контакты, чтобы мы могли с вами связаться</li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Вопросы/ответы -->
                        @endfor
                </div>
            </div>
            <div class="section-faq-button">
                <button data-modal-open="soon" type="button" class="btn btn-outline-primary btn-colored w-xs-100 w-sm-100 w-md-auto">
                    купить за {{ $course_1_price }} руб.
                </button>
            </div>
        </div>
    </div>
</section>