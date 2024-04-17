<div class="video-playlist-scroll">
    <div class="video-playlist">
        <div class="video-playlist-inner">
            <div class="swiper-container swiper-playlist">
                <div class="swiper-wrapper">
                    @foreach($lessons as $itemLesson)
                    <div class="swiper-slide" ajax-elem>
                        <div data-href="{{ Route('course.show', $course->id) }}?lesson_id={{ $itemLesson->id }}" class="video-playlist-item @if($itemLesson->id == $lesson->id && !request('test_id')) active @endif @if(!$itemLesson->access()) video-playlist-block @endif">
                            <div class="video-playlist-row">
                                <div class="row">
                                    <div class="col-12 col-md">
                                        <div class="video-playlist-content welcome d-none d-md-block">
                                            <span>{{ $itemLesson->number }}.</span> {{ $itemLesson->number ? ($itemLesson->shortName ? $itemLesson->shortName : $itemLesson->name) : 'Введение' }}&nbsp;
                                        </div>
                                        <div class="video-playlist-content welcome d-block d-md-none">
                                            {{ $itemLesson->number ? 'Урок ' . $itemLesson->number : 'Введение' }}
                                        </div>
                                    </div>
                                    @if($itemLesson->name !== 'Введение')
                                    <div class="col col-md-auto">
                                        <div class="video-playlist-time text-blue text-nowrap">
                                            {{ $itemLesson->duration ?? '' }}
                                        </div>
                                    </div>
                                    @else
                                    @endif
                                    @if(isset($itemLesson->description) && $itemLesson->description)
                                    <div class="d-none d-md-block col-md">
                                        <div class="video-playlist-description">
                                            {{ $itemLesson->description ?? '' }}
                                        </div>
                                    </div>
                                    @endif
                                    @if($itemLesson->status)
                                    <div class="col-auto">
                                        <div class="video-playlist-status">
                                            <div class="row">
                                                <div class="col-auto d-none d-md-block">
                                                    <div class="video-playlist-status-text">
                                                        {!! $itemLesson->status->name !!}
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="video-playlist-status-icon">
                                                        <img data-src="/assets/images/pages/course/icons/video-playlist/{{ $itemLesson->status->icon }}.svg?v=1" class="lazyload" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Рефлексия -->
                    @if($opinion)
                    <div class="swiper-slide" ajax-elem>
                        <div class="video-playlist-item @if(!$course->isPassed()) video-playlist-block @endif @if(isset($opinionIsActive)) active @endif">
                            <div class="video-playlist-row">
                                <a href="{{ Route('course.opinion.show', $opinion->id) }}" class="row" style="text-decoration: none">
                                    <div class="col-12 col-md">
                                        <div class="video-playlist-content welcome d-none d-md-block">
                                            {{ __('Рефлексия') }}&nbsp;
                                        </div>
                                        <div class="video-playlist-content welcome d-block d-md-none">
                                            Рефлек-<br>сия&nbsp;
                                        </div>
                                    </div>
                                    <div class="col col-md-auto d-block d-md-none">
                                        <div class="video-playlist-time text-blue text-nowrap">
                                            {{ __('20 min') }}
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block col-md">
                                        <div class="video-playlist-description" style="max-width: 100%;">
                                            {{ __('Оцените наш курс') }}
                                        </div>
                                    </div>
                                    <div class="col-auto d-block d-md-none">
                                        <div class="video-playlist-status">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="video-playlist-status-icon">
                                                        <img data-src="/assets/images/pages/course/icons/video-playlist/{{ $opinion->status->icon }}.svg?v=1" class="lazyload" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- Рефлексия -->
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </div>
</div>