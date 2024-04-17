<section class="section section-content section-recommendations">
    <div class="container">
        <div class="section-recommendations-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
            <h4>
                Рекомендации
            </h4>
        </div>
        <div class="section-recommendations-inner">
            <div class="section-recommendations-nav">
                <div class="row">
                    <div class="col-auto" style="display:none;" elem-hide>
                        <button role="tab" class="btn tab-button" data-tab-toggle="articles">
                            Статьи
                        </button>
                    </div>
                    <div class="col-auto">
                        <button role="tab" class="btn tab-button" data-popover-toggle="books" data-popover-placement="bottom-start">
                            Книги
                        </button>
                    </div>
                    <div class="col-auto">
                        <button role="tab" class="btn tab-button active" data-tab-toggle="podcasts">
                            Подкасты
                        </button>
                    </div>
                    <div class="col-auto">
                        <button role="tab" class="btn tab-button" data-popover-toggle="films" data-popover-placement="bottom-start">
                            Фильмы
                        </button>
                    </div>
                    <div class="col-auto">
                        <button role="tab" class="btn tab-button" data-tab-toggle="inspirations">
                            Для вдохновения
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-recommendations-content">
        <div class="section-recommendations-tabs">
            <div class="tab-content" role="data-tabs">
                <div class="tab-pane" data-tab-id="articles" style="display:none;" elem-hide>
                    <div class="section-recommendations-articles">
                        <div class="d-block d-md-none">
                            <div class="swiper-container swiper-articles">
                                <div class="swiper-wrapper">
                                    @for($i = 1; $i < 7; $i++) <div class="swiper-slide">
                                        @include('sections.recommendations.article', ['article' => true])
                                </div>
                                @endfor
                            </div>
                            <div class="swiper-nav">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="articles-btn articles-btn-prev">
                                            <img data-src="/assets/images/icons/swiper/mentor/arrow-left.svg" class="lazyload">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="articles-btn articles-btn-next">
                                            <img data-src="/assets/images/icons/swiper/mentor/arrow-right.svg" class="lazyload">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="articles-scrollbar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-md-block">
                        <div class="container">
                            <div class="recommendations-articles">
                                <div class="row">
                                    @for($i = 1; $i < 7; $i++) <div class="col-12 col-md-4"> @include('sections.recommendations.article', ['article'=> true]) </div> @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" data-tab-id="books">
            <div class="section-recommendations-books">
                <div class="d-block d-md-none">
                    <div class="swiper-container swiper-books">
                        <div class="swiper-wrapper">
                            @for($i = 1; $i < 38; $i++) <div class="swiper-slide"> @include('sections.recommendations.book', ['book' => true]) </div> @endfor
                    </div>
                    <div class="swiper-nav">
                        <div class="row">
                            <div class="col-auto">
                                <div class="books-btn books-btn-prev">
                                    <img data-src="/assets/images/icons/swiper/mentor/arrow-left.svg" class="lazyload">
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="books-btn books-btn-next">
                                    <img data-src="/assets/images/icons/swiper/mentor/arrow-right.svg" class="lazyload">
                                </div>
                            </div>
                            <div class="col">
                                <div class="books-scrollbar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-md-block">
                <div class="container">
                    <div class="recommendations-books">
                        <div class="row">
                            @for ($i = 1; $i < 38; $i++) <div class="col-12 col-lg-6"> @include('sections.recommendations.book', ['book' => true]) </div> @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="tab-pane active" data-tab-id="podcasts">
        <div class="section-recommendations-podcasts">
            <div class="d-block d-md-none">
                <div class="swiper-container swiper-podcasts">
                    <div class="swiper-wrapper">
                        @for($i = 1; $i < 7; $i++) <div class="swiper-slide">
                            @include('sections.recommendations.podcast', ['podcast' => true])
                    </div>
                    @endfor
                </div>
                <div class="swiper-nav">
                    <div class="row">
                        <div class="col-auto">
                            <div class="podcasts-btn podcasts-btn-prev">
                                <img data-src="/assets/images/icons/swiper/mentor/arrow-left.svg" class="lazyload">
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="podcasts-btn podcasts-btn-next">
                                <img data-src="/assets/images/icons/swiper/mentor/arrow-right.svg" class="lazyload">
                            </div>
                        </div>
                        <div class="col">
                            <div class="podcasts-scrollbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-md-block">
            <div class="container">
                <div class="recommendations-podcasts">
                    <div class="row">
                        @for ($i = 1; $i < 7; $i++) <div class="col-12">@include('sections.recommendations.podcast', ['podcast' => true])</div> @endfor
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="tab-pane" data-tab-id="films">
        <div class="section-recommendations-films">
            <div class="d-block d-md-none">
                <div class="swiper-container swiper-films">
                    <div class="swiper-wrapper">
                        @for($i = 1; $i < 17; $i++) <div class="swiper-slide"> @include('sections.recommendations.film', ['film' => true]) </div> @endfor
                </div>
                <div class="swiper-nav">
                    <div class="row">
                        <div class="col-auto">
                            <div class="films-btn films-btn-prev">
                                <img data-src="/assets/images/icons/swiper/mentor/arrow-left.svg" class="lazyload">
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="films-btn films-btn-next">
                                <img data-src="/assets/images/icons/swiper/mentor/arrow-right.svg" class="lazyload">
                            </div>
                        </div>
                        <div class="col">
                            <div class="films-scrollbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-md-block">
            <div class="container">
                <div class="recommendations-films">
                    <div class="row">
                        @for ($i = 1; $i < 17; $i++) <div class="col-12 col-lg-6"> @include('sections.recommendations.film', ['film' => true]) </div> @endfor
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="tab-pane" data-tab-id="inspirations">
        <div class="section-recommendations-inspirations">
            <div class="d-block d-md-none">
                <div class="swiper-container swiper-inspirations">
                    <div class="swiper-wrapper">
                        @for($i = 1; $i < 8; $i++) <div class="swiper-slide">
                            @include('sections.recommendations.inspiration', ['inspiration' => true])
                    </div>
                    @endfor
                </div>
                <div class="swiper-nav">
                    <div class="row">
                        <div class="col-auto">
                            <div class="inspirations-btn inspirations-btn-prev">
                                <img data-src="/assets/images/icons/swiper/mentor/arrow-left.svg" class="lazyload">
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="inspirations-btn inspirations-btn-next">
                                <img data-src="/assets/images/icons/swiper/mentor/arrow-right.svg" class="lazyload">
                            </div>
                        </div>
                        <div class="col">
                            <div class="inspirations-scrollbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-md-block">
            <div class="container">
                <div class="recommendations-inspirations">
                    <div class="row">
                        @for ($i = 1; $i < 8; $i++) <div class="col-12">@include('sections.recommendations.inspiration', ['inspiration' => true])</div> @endfor
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</section>