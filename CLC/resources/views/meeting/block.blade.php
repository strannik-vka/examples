<section class="section section-content section-meeting">
    <div class="container">
        <div class="section-meeting-inner">
            <div class="section-meeting-title">
                <h4>
                    Онлайн-встречи
                </h4>
            </div>
            <div class="section-meeting-content">
                <div class="meeting-block">
                    @include('meeting.item')
                    <div items-list-meeting="{{ Route('meeting.index') }}" class="row"></div>
                    <div items-empty-meeting style="display: none;">
                        Онлайн-встреч нет
                    </div>
                    <div class="preloader" items-preloader-meeting>
                        <div class="spinner-border" role="status"></div>
                    </div>
                </div>
            </div>
            @if(Route::currentRouteName() == 'index')
            <div class="section-meeting-more">
                <div class="row">
                    <div class="col-12 col-md-4 offset-md-4">
                        <a href="{{ Route('meeting.index') }}" class="btn btn-primary w-100">Смотреть ещё</a>
                    </div>
                </div>
            </div>
            @else
            <div class="section-meeting-more" items-show-more-meeting style="display: none;">
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