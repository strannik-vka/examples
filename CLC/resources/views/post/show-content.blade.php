@foreach($contents as $content)
@if($content->type == 'texteditor')
<div class="col-12">
    <div class="section-post-text">{!! $content->value !!}</div>
</div>
@elseif($content->type == 'string')
<div class="col-12">
    <div class="section-post-string">
        <p>{{ $content->value }}</p>
    </div>
</div>
@elseif($content->type == 'image')
<div class="col-12">
    <div class="section-post-pictures">
        <picture>
            @if(isset($preview))
            <img src="{{ $content->value }}">
            @else
            <img data-src="{{ ImageUrl($content->value) }}" class="lazyload">
            @endif
        </picture>
    </div>
</div>
@elseif($content->type == 'numbers3' || $content->type == 'numbers6')
<div class="col-12">
    <div class="section-post-advantages">
        <div class="row">
            @foreach($content->value as $number)
            @if(isset($number['value']))
            <div class="advantages-item-col">
                <div class="advantages-item advantages-item-{{ $loop->iteration%3 == 1 ? 'dark' : ($loop->iteration%2 ? 'white' : 'light') }} advantages-item-{{ ($loop->iteration%2 ? 'circle' : 'square') }}">
                    <div class="advantages-item-content">
                        <div class="advantages-item-number" content="telephone=no">{{ $number['value'] }}</div>
                        <div class="advantages-item-description">{{ $number['text'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@elseif($content->type == 'blocks')
<div class="col-12">
    <div class="section-post-quotes">
        <div class="blockquote-block">
            @foreach($content->value['text'] as $key => $text)
            <blockquote>
                <figcaption>{{ $content->value['title'][$key] }}</figcaption>
                <p>{{ $text }}</p>
            </blockquote>
            @endforeach
        </div>
    </div>
</div>
@elseif($content->type == 'audio')
<div class="col-12">
    <div class="section-post-audio">
        <div class="audio-player" audio-item>
            <div class="audio-player-row row">
                <div class="col-auto">
                    <div class="audio-player-btn" audio-play="{{ $content->value }}"></div>
                </div>
                <div class="col-auto d-none d-xl-block">
                    <div class="volume-wrap">
                        <div class="volume-icon"></div>
                        <div class="audio-volume-container">
                            <div class="audio-volume" audio-volume>
                                <div class="volume-default"></div>
                                <div class="volume-line" audio-line></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="audio-w-100">
                        <div audio-progress class="audio-wave-wrap">
                            <div class="audio-wave audio-wave-progress" audio-wave progress-time></div>
                            <div class="audio-wave" audio-wave audio-wave-load></div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="time-place">
                        <div class="time" time-current>00:00</div>
                        <div class="time">&nbsp;/&nbsp;</div>
                        <div class="time" time-full time-load>00:00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif($content->type == 'poll')
<div class="col-12">
    <div class="section-post-polls">
        <div class="poll-block">
            <div class="poll">
                <div class="poll-question">{{ $content->value['question'] }}</div>
                <div class="poll-type">Анонимный опрос</div>
                <div class="poll-inputs" poll-question @if($content->value['isVoice']) style="display:none;" @endif>
                    @foreach($content->value['variants'] as $key => $variant)
                    <div class="form-check" poll-option>
                        <input name="{{ $content->value['id'] }}" data-post-id="{{ $post->id ?? '' }}" value="{{ $key }}" class="form-check-input" type="radio" id="poll{{ $key }}{{ $post->id ?? '' }}">
                        <label class="form-check-label" for="poll{{ $key }}{{ $post->id ?? '' }}">
                            {{ $variant['text'] }}
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="poll-inputs row g-3" poll-answer @if(!$content->value['isVoice']) style="display:none!important;" @endif>
                    @foreach($content->value['variants'] as $key => $variant)
                    <div class="col-12">
                        <div class="poll-answer row">
                            <div class="col-auto">
                                <div class="poll-percent">
                                    <span html="percent">{{ $variant['percent'] }}</span>%
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-check-label">
                                    {{ $variant['text'] }}
                                </label>
                                <div class="progress">
                                    <div data-progress="{{ $variant['percent'] }}" class="progress-bar bg-primary" role="progressbar" style="width: {{ $variant['percent'] }}%;" aria-valuenow="{{ $variant['percent'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@elseif($content->type == 'video')
<div class="col-12">
    <div class="section-post-video">
        <div class="video-wrapper ratio ratio-16x9">
            {!! $content->value !!}
        </div>
    </div>
</div>
@endif
@endforeach