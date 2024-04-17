<article class="col-6 col-md-4" items-html-meeting style="display: none">
    <div class="meeting-item">
        <div class="row">
            <div class="col-12">
                <div class="meeting-item-picture">
                    <img attr="src:thumb">
                </div>
            </div>
            <div class="col-12">
                <div class="meeting-item-content">
                    <div class="meeting-item-header">
                        <div class="row">
                            <div class="col-auto" isset="category.name">
                                <div class="meeting-item-category">
                                    <div class="meeting-item-icon">
                                        <img attr="src:category.icon" />
                                    </div>
                                    <div class="meeting-item-name" html="category.name"></div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="meeting-item-date" html="date"></div>
                            </div>
                        </div>
                    </div>
                    <div class="meeting-item-title" html="name"></div>
                    <div class="meeting-item-description" html="shortText"></div>
                    <div class="meeting-item-button">
                        <button type="button" class="btn btn-icon btn-readmore">
                            <span class="btn-readmore-text">Смотреть</span>
                            <img src="/assets/images/icons/card/meeting/readmore.svg">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>