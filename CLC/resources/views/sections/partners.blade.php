@if(isset($partnerCategories) && count($partnerCategories) > 0)
<section class="section section-content section-partners">
    <div class="container">
        <div class="section-partners-inner">
            <div class="row">
                <div class="col-12">
                    <div class="section-partners-title">
                        <h4>Организаторы и партнеры</h4>
                    </div>
                    <div class="section-partners-content">
                        <div class="row">
                            <!-- <div class="d-none d-md-block col-12 section-partners-blank"></div> -->
                            <!-- <div class="col-12 col-md offset-md-8 offset-xl-9 section-partners-blank"></div> -->
                            <!-- <div class="col offset-6 offset-md-4 offset-xl-9 section-partners-blank"></div> -->

                            @foreach($partnerCategories as $partnerCategory)
                            @foreach($partnerCategory->partners as $partner)
                            <div class="col-6 col-md-4 col-xl-3">
                                <div class="section-partners-card">
                                    <div class="section-partners-name">
                                        {!! $partner->name !!}
                                    </div>
                                    <div class="section-partners-role">
                                        {{ $partnerCategory->name }}
                                    </div>
                                    <div class=" section-partners-picture">
                                        <img data-src="{{ $partner->logo }}" class="lazyload">
                                    </div>
                                    <a href="{{ $partner->url }}" rel="nofollow" target="_blank" class="stretched-link"></a>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-12 section-partners-blank"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif