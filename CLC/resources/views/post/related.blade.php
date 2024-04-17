<article class="col-6 col-md-4">
    <div class="post-item">
        <a href="{{ Route('post.show', $relatedPost->id) }}" class="stretched-link"></a>
        <div class="row">
            <div class="col-12">
                <div class="post-item-picture">
                    <img data-src="{{ ImageUrl($relatedPost->image, 640) }}" class="lazyload">
                </div>
            </div>
            <div class="col-12">
                <div class="post-item-content">
                    <div class="post-item-header">
                        <div class="row">
                            <div class="col-auto">
                                @if($relatedPost->category)
                                <div class="post-item-category">
                                    <div class="post-item-icon">
                                        <img src="/assets/images/block/post/category/{{ $relatedPost->category->slug }}.svg" />
                                    </div>
                                    <div class="post-item-name">{{ $relatedPost->category->name }}</div>
                                </div>
                                @endif
                            </div>
                            <div class="col">
                                <div class="post-item-date">
                                    {{ $relatedPost->created_at->format('d.m.Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post-item-title">
                        {!! $relatedPost->name !!}
                    </div>
                    <div class="post-item-description">{{ $relatedPost->shortText() }}</div>
                    <div class="post-item-button">
                        <a href="{{ Route('post.show', $relatedPost->id) }}" class="btn btn-icon btn-readmore">
                            <span class="btn-readmore-text">Читать</span>
                            <img src="/assets/images/icons/card/post/readmore.svg">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>