@if(isset($professionals) && $professionals)
<section id="professionals" class="section section-content section-expert" data-speakers-block>
    <div class="container">
        <div class="section-expert-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
            <h4>
                @if(Route::is('courses.list.item'))
                Преподаватели
                @else
                Кто будет <br>
                тебя обучать
                @endif
            </h4>
            @if(!Route::is('courses.list.item'))
            <br>
            <p style="margin:0;">
                Профессионалы креативного <br class="d-inline d-md-none">бизнеса, <br class="d-none d-md-inline">
                которые реализовали <br class="d-inline d-md-none">десятки кейсов
            </p>
            @endif
        </div>
    </div>
    <div class="section-expert-inner wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
        <div class="swiper-container swiper-expert">
            <div class="swiper-wrapper">
                @foreach($professionals as $professional)
                <div class="swiper-slide">
                    <div class="expert-card">
                        <div class="expert-card-left">
                            <div class="expert-card-wrapper">
                                <img class="lazyload" data-src="{{ ImageUrl($professional->photo, 500) }}">
                            </div>
                        </div>
                        <div class="expert-card-right">
                            <div class="expert-card-header">
                                <span class="expert-card-name h-6">{{ $professional->name }}</span>
                            </div>
                            <div class="expert-card-description">{!! $professional->position !!}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-navigation expert-nav">
                <div class="expert-nav-inner">
                    <div class="expert-btn expert-btn-prev">
                        <img data-src="/assets/images/icons/swiper/expert/arrow-left.svg" class="lazyload">
                    </div>
                    <div class="expert-pagination"></div>
                    <div class="expert-btn expert-btn-next">
                        <img data-src="/assets/images/icons/swiper/expert/arrow-right.svg" class="lazyload">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-expert-outer wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="swiper-container swiper-teacher teacher-block">
            <div class="swiper-wrapper">
                @foreach($professionals as $professional)
                <div class="swiper-slide" data-professional-id="{{ $professional->id }}">
                    <div class="teacher-card active" data-speaker="">
                        <div class="teacher-card-photo">
                            <img class="lazyload" data-src="{{ ImageUrl($professional->photo, 500) }}">
                        </div>
                        <div class="teacher-card-name">{{ $professional->name }}</div>
                        <div class="teacher-card-description">{!! $professional->position !!}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif