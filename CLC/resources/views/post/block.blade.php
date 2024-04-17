<section class="section section-content section-post">
    <div class="container">
        <div class="section-post-inner">
            <div class="section-post-title">
                <h4>
                    Новости
                </h4>
            </div>
            <div class="section-post-content">
                <div class="post-block @if(Route::currentRouteName() == 'index') post-min @else post-index @endif">
                    @include('post.item')
                    <div items-list-post="{{ Route('post.index') }}" class="row"></div>
                    <div items-empty-post style="display: none;">
                        Новостей нет
                    </div>
                    <div class="preloader" items-preloader-post>
                        <div class="spinner-border" role="status"></div>
                    </div>
                </div>
            </div>
            @if(Route::currentRouteName() == 'index')
            <div class="section-post-more">
                <div class="row">
                    <div class="col-12 col-md-4 offset-md-4">
                        <a href="{{ Route('post.index') }}" class="btn btn-primary w-100">Смотреть ещё</a>
                    </div>
                </div>
            </div>
            @else
            <div class="section-post-more" items-show-more-post style="display: none;">
                <div class="row">
                    <div class="col-12 col-md-4 offset-md-4">
                        <button type="button" class="btn btn-primary w-100">Загрузить ещё</button>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</section>