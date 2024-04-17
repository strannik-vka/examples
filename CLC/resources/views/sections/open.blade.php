<section class="section section-content section-open">
    <div class="section-open-circle circle-left">
        <img data-src="/assets/images/logotypes/logo-grey-black.svg" class="lazyload infiniteStepRotation">
    </div>
    <div class="section-open-circle circle-right">
        <img data-src="/assets/images/logotypes/logo-grey-black.svg" class="lazyload infiniteStepRotation">
    </div>
    <div class="container">
        <div class="section-open-inner">
            <div class="section-open-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                <h4>
                    Лагерь <br>
                    креативных <br>
                    лидеров
                </h4>
            </div>
            <div class="section-open-description wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
                <div class="text-3">
                    @if(Route::is('index'))
                    Чтобы принять участие, <br>
                    пройди регистрацию
                    @else
                    Присоединиться к сообществу <br>
                    единомышленников
                    @endif
                </div>
            </div>
            <div class="section-open-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                @guest
                <a href="{{ Route('courses.list.item', ['id' => 1]) }}" target="_blank" class="btn btn-white btn-wider w-xs-100 w-sm-100 w-md-auto">Начать обучение</a>
                @else
                <a href="{{ Route('course.show', ['id' => 1]) }}" target="_blank" class="btn btn-white btn-wider w-xs-100 w-sm-100 w-md-auto">Начать обучение</a>
                @endif
            </div>
        </div>
    </div>
</section>