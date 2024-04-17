<section class="section section-content section-join">
    <div class="section-join-circle circle-left">
        <img data-src="/assets/images/logotypes/logo-grey-black.svg" class="lazyload infiniteStepRotation">
    </div>
    <div class="section-join-circle circle-right">
        <img data-src="/assets/images/logotypes/logo-grey-black.svg" class="lazyload infiniteStepRotation">
    </div>
    <div class="container">
        <div class="section-join-inner">
            <div class="section-join-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                <h4>
                    Присоединяйся <br>
                    к сообществу <br>
                    креативных лидеров
                </h4>
            </div>
            <div class="section-join-description wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                <div class="text-3">
                    @if(Route::is('index'))
                    Регистрируйся и начни <br>
                    креативную трансформацию сейчас
                    @elseif(Route::is('about'))
                    Регистрируйся и получи доступ <br>
                    к видеокурсу по креативному лидерству
                    @else
                    Регистрируйся и начни <br>
                    креативную трансформацию сейчас
                    @endif
                </div>
            </div>
            <div class="section-join-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="h-4">
                            цена: {{ $course_1_price }} рублей
                        </div>
                    </div>
                    <div class="col-12">
                        @guest
                        <a href="{{ Route('courses.list.item', ['id' => 1]) }}" target="_blank" class="btn btn-white btn-wider w-xs-100 w-sm-100 w-md-auto">Начать обучение</a>
                        @else
                        <a href="{{ Route('profile.settings') }}" target="_blank" class="btn btn-white btn-wider w-xs-100 w-sm-100 w-md-auto">Присоединиться</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>