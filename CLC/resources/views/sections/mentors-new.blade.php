<section class="section section-content section-mentors">
    <div class="container">
        <div class="section-mentors-inner">
            <div class="section-mentors-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                <h4>
                    Наставники лагеря <br class="d-inline d-md-none">
                    креативных лидеров
                </h4>
            </div>
            <div class="section-mentors-subtitle">
                <div class="row">
                    <div class="col-12 col-md-auto d-none d-md-block">
                        <div class="section-mentors-figure">
                            <div class="section-mentors-icon infiniteStepRotation"></div>
                        </div>
                    </div>
                    <div class="col-12 col-md">
                        <p style="margin:0;">
                            «Мы работаем над тем, чтобы <br class="d-inline d-md-none"> навыки осознанного лидерства <br class="d-inline d-md-none">и креативной <br class="d-none d-md-inline">
                            трансформации <br class="d-inline d-md-none"> бизнеса были триггером <br class="d-inline d-md-none"> финансового роста <br class="d-inline d-md-none"> вашего бизнеса»
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-mentors-content">
        <div class="section-mentors-swiper wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
            <div class="swiper-container swiper-mentors">
                <div class="swiper-wrapper">
                    @for($i = 1; $i < 5; $i++) <div class="swiper-slide">
                        <div class="mentor-card" data-mentor-id="{{ $i }}">
                            <div class="mentor-card-wrapper">
                                <img data-src="/assets/images/block/mentors/{{ $i }}.jpg" class="lazyload" />
                            </div>
                            <div class="mentor-card-content">
                                <div class="mentor-card-position">
                                    наставник
                                </div>
                                <div class="mentor-card-name">
                                    @if($i == 1)
                                    Игорь М. Намаконов
                                    @endif
                                    @if($i == 2)
                                    Маруся Горфиль
                                    @endif
                                    @if($i == 3)
                                    Алена Кукушкина
                                    @endif
                                    @if($i == 4)
                                    Екатерина Кузнецова
                                    @endif
                                </div>
                                <div class="mentor-card-meo">
                                    @if($i == 1)
                                    Генеральный директор Федерации креативных индустрий, автор бестселлера «Кроссфит мозга», обладатель золотого Каннского льва
                                    @endif
                                    @if($i == 2)
                                    Методист, фасилитатор и продюсер в Центре дизайн-мышления, а также научный редактор, журналист и креативный управленец
                                    @endif
                                    @if($i == 3)
                                    Режиссёр, продюсер, куратор факультета Filmmaking Aкадемии Коммуникаций Wordshop, курсов «Креатив в рекламе» и «Режиссура клипа» НИУ ВШЭ
                                    @endif
                                    @if($i == 4)
                                    Основатель маркетингового и креативного агентства Fingertips, архитектурного бюро «Больше» и школы маркетинга Yummy Tips
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
                @endfor
            </div>
            <div class="swiper-nav">
                <div class="row">
                    <div class="col-auto">
                        <div class="mentor-btn mentor-btn-prev">
                            <img data-src="/assets/images/icons/swiper/mentor/arrow-left.svg" class="lazyload">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="mentor-btn mentor-btn-next">
                            <img data-src="/assets/images/icons/swiper/mentor/arrow-right.svg" class="lazyload">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mentor-scrollbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>