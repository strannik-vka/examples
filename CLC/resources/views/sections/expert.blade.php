@if(isset($experts) && $experts)
<section id="experts" class="section section-content section-expert" data-speakers-block>
    <div class="container">
        <div class="section-expert-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
            <h4>
                @if(Route::is('index'))
                Экспертное жюри конкурса
                @else
                @if(Route::is('leadership.contest'))
                Экспертное жюри конкурса
                @else
                Преподаватели
                @endif
                @endif
            </h4>
        </div>
    </div>
    <div class="section-expert-inner wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
        <div class="swiper-container swiper-expert">
            <div class="swiper-wrapper">
                @foreach($experts as $expert)
                <div class="swiper-slide">
                    <div class=" expert-card">
                        <div class="expert-card-left">
                            <div class="expert-card-wrapper">
                                <img class="lazyload" data-src="{{ ImageUrl($expert->photo, 500) }}">
                            </div>
                        </div>
                        <div class="expert-card-right">
                            <div class="expert-card-header">
                                <span class="expert-card-name h-6">{{ $expert->name }}</span>
                            </div>
                            <div class="expert-card-description">{!! $expert->position !!}</div>
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
                @foreach($experts as $expert)
                <div class="swiper-slide" data-expert-id="{{ $expert->id }}">
                    <div class=" teacher-card active" data-speaker="">
                        <div class="teacher-card-photo">
                            <img class="lazyload" data-src="{{ ImageUrl($expert->photo, 500) }}">
                        </div>
                        <div class="teacher-card-name">{{ $expert->name }}</div>
                        <div class="teacher-card-description">{!! $expert->position !!}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif