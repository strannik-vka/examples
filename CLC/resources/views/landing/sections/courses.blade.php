<section class="section section-content section-courses">
    <div class="container">
        <div class="section-courses-inner">
            <div class="section-courses-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                <h4>
                    Смотри видео <br>
                    и листай до сертификата
                </h4>
            </div>
            <div class="section-courses-content">
                <div class="swiper-container swiper-courses">
                    <div class="swiper-wrapper">
                        @foreach ($videos as $video)
                        <div class="swiper-slide">
                            <div class="course-item @if(!isset($video->show) || !$video->show) course-item-locked @endif" data-seconds="{{ $video->seconds }}" data-id="{{ $loop->iteration }}">
                                <a href="javascript://" class="stretched-link"></a>
                                <div class="row">
                                    @if($video->code)
                                    <div class="col-12">
                                        <div class="course-item-picture">
                                            {!! $video->code !!}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-12">
                                        <div class="course-item-content">
                                            <div class="row">
                                                @if($video->name)
                                                <div class="col-12">
                                                    <div class="course-item-title">
                                                        {!! $video->name !!}
                                                    </div>
                                                </div>
                                                @endif
                                                @if($video->description)
                                                <div class="col-12">
                                                    <div class="course-item-description">
                                                        {{ $video->description }}
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="swiper-slide">
                            <div class="course-item course-item-certificate course-item-locked" data-modal-open="reels-certificate">
                                <a href="javascript://" class="stretched-link"></a>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="course-item-cover">
                                            <h4 class="h-4">
                                                Получить сертификат
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="course-item-content">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="course-item-title">
                                                        Сертификат
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-nav">
                        <div class="row">
                            <div class="col-auto">
                                <div class="courses-btn courses-btn-prev">
                                    <img data-src="/assets/images/icons/swiper/mentor/arrow-left.svg" class="lazyload">
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="courses-btn courses-btn-next">
                                    <img data-src="/assets/images/icons/swiper/mentor/arrow-right.svg" class="lazyload">
                                </div>
                            </div>
                            <div class="col">
                                <div class="courses-scrollbar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-courses-footer">
                <div class="row flex-column align-items-center">
                    <div class="col-auto">
                        <a href="#mentors">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12ZM12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 0.999999 18.0751 1 12C1 5.92487 5.92487 0.999999 12 1Z" fill="#020726" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L7.29289 12.7071C6.90237 12.3166 6.90237 11.6834 7.29289 11.2929C7.68342 10.9024 8.31658 10.9024 8.70711 11.2929L12 14.5858L15.2929 11.2929C15.6834 10.9024 16.3166 10.9024 16.7071 11.2929Z" fill="#020726" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 7C12.5523 7 13 7.44772 13 8L13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16L11 8C11 7.44772 11.4477 7 12 7Z" fill="#020726" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto">
                        <h5 class="h-5">
                            Узнать про основной курс
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>