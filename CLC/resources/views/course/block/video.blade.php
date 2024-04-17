@if($lesson->video_code)
<div class="video-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="video-wrapper-content">
                {!! allowedTags($lesson->video_code) !!}
            </div>
        </div>
        <div class="col-12 d-block d-md-none">
            <div class="badge text-left text-5 fw-500 text-wrap-normal w-100" style="--bs-badge-background-color: var(--yellow); --bs-badge-padding-x: 0.9375rem; --bs-badge-padding-y: 0.5rem;">
                Для просмотра видео ваш VPN должен быть отключен
            </div>
        </div>
        @if($lesson->presentation)
        <!-- Презентация проекта (по ненадобности удалить) -->
        <div class="col-12">
            <div class="video-wrapper-slide">
                <a target="_blank" href="{{ $lesson->presentation }}" class="text-decoration-none">
                    <div class="row">
                        <div class="col">
                            <div class="video-wrapper-text" style="padding-bottom: 0.125rem;">Презентация</div>
                        </div>
                        <div class="col-auto">
                            <div class="video-wrapper-icon">
                                <img data-src="/assets/images/pages/course/icons/video-wrapper/slide.svg" class="lazyload">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Презентация проекта (по ненадобности удалить) -->
        @endif
    </div>
</div>
<!-- Кнопка просмотра видео по прямой ссылке -->
<a href="javascript://" target="_blank" class="btn btn-yellow btn-icon w-100" link-to-video>
    <span class="btn-icon-text">
        Смотреть по прямой ссылке
    </span>
    <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16.0782 10.2515L0.432696 20.1047L0.29724 0.616628L16.0782 10.2515Z" fill="#212121" />
    </svg>
</a>
@endif