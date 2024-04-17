@foreach($lesson->speaker as $key => $speaker)
<div class="col-12">
    <div class="author-block">
        <div class="author-block-inner">
            <div class="row">
                <div class="col-auto">
                    <div class="author-block-avatar">
                        <picture>
                            @if($speaker['photo'])
                            <img data-src="{{ ImageUrl($speaker['photo'], 500) }}" class="lazyload" />
                            @else
                            <img data-src="/assets/images/icons/user/default/avatar.svg" class="lazyload" />
                            @endif
                        </picture>
                    </div>
                </div>
                <div class=" col">
                    <div class="author-block-content">
                        @if($speaker['name'])
                        <div class="author-block-name">{{ $speaker['name'] ?? '' }}</div>
                        @endif
                        <div class="author-block-btn">
                            <a href="javascript://" class="info-btn" data-modal-open="courseAuthorModal{{ $key }}">
                                <span class="info-btn-icon">
                                    <picture>
                                        <img src="/assets/images/pages/course/icons/author-block/btn.svg">
                                    </picture>
                                </span>
                                <span class="info-btn-text">подробнее</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach