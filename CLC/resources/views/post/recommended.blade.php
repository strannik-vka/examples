@if(count($relatedPosts))
<section data-clone-elem class="section section-content section-recommended">
    <div class="container">
        <div class="section-recommended-inner">
            <div class="section-recommended-title">
                <h4>
                    Рекомендуем
                </h4>
            </div>
            <div class="section-recommended-content">
                <div class="post-recommended post-min">
                    <div class="row">
                        @foreach($relatedPosts as $relatedPost)
                        @include('post.related')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif