@if($lesson->speaker)
@foreach($lesson->speaker as $key => $speaker)
@if(isset($speaker['name']))
<!-- Попап спикера курса -->
<div class="modal modal-author" data-modal-id="courseAuthorModal{{ $key }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="author-header">
                            <div class="row">

                                <!-- Аватар спикера курса -->
                                <div class="col-auto">
                                    <div class="author-header-avatar">
                                        <picture>
                                            @if($speaker['photo'])
                                            <img data-src="{{ ImageUrl($speaker['photo'], 500) }}" class="lazyload" />
                                            @else
                                            <img data-src="/assets/images/icons/user/default/avatar.svg" class="lazyload" />
                                            @endif
                                        </picture>
                                    </div>
                                </div>
                                <!-- Аватар спикера курса -->


                                <!-- Основные данные спикера курса -->
                                <div class="col">
                                    <div class="author-header-content">
                                        <div class="author-header-name">
                                            {{ $speaker['name'] ?? '' }}
                                        </div>
                                        @if(isset($speaker['position']) && $speaker['position'])
                                        <div class="author-header-meo">
                                            {{ $speaker['position'] ?? '' }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- Основные данные спикера курса -->
                            </div>
                        </div>
                    </div>
                    @if(isset($speaker['about']) && $speaker['about'])
                    <!-- О спикера курса -->
                    <div class="col-12 col-lg">
                        <div class="author-header-text">
                            {{ $speaker['about'] }}
                        </div>
                    </div>
                    @endif
                    <!-- О спикера курса -->

                    @if(isset($speaker['socials']) && $speaker['socials'])
                    @php
                    $socials = getSocials($speaker['socials']);
                    @endphp
                    <!-- Социальные сети спикера курса -->
                    <div class="col-12 col-lg-auto">
                        <div class="author-header-social">
                            <div class="row">
                                @foreach($socials as $social)
                                <div class="col-auto">
                                    <a href="{{ $social->url }}" class="btn btn-social btn-social-grey" target="_blank">
                                        <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.71451 10C3.24792 10 0.129919 6.24625 0 0H2.73829C2.82823 4.58458 4.84692 6.52653 6.44592 6.92693V0H9.02441V3.95395C10.6034 3.78378 12.2622 1.98198 12.8218 0H15.4003C14.9705 2.44244 13.1717 4.24424 11.8925 4.98498C13.1717 5.58559 15.2205 7.15716 16 10H13.1617C12.5521 8.0981 11.0332 6.62663 9.02441 6.42643V10H8.71451Z" fill="#020726" />
                                        </svg>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Социальные сети спикера курса -->
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endif