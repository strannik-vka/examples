<div class="notify-bar">
    <div class="notify-bar-content">
        <div class="notify-bar-header">
            <div class="notify-bar-title">
                Уведомления
            </div>
            <button type="button" class="notify-bar-close" popper-close></button>
        </div>
        <div class="notify-bar-body">
            <div class="notify-bar-scroller">
                <div class="row">
                    <!-- Новые уведомления -->
                    <div class="col-12" data-block-notify-new style="display: none;">
                        <div class="notify-bar-title opacity-50 text-uppercase">
                            Новые
                        </div>
                    </div>
                    <div class="col-12" data-block-notify-new style="display: none;">
                        <div class="notify-bar-collection">
                            <div items-html-notify-new style="display: none;">
                                @include('blocks.notification')
                            </div>
                            <div items-list-notify-new="{{ Route('notifications.new') }}" class="row" style="display: none;"></div>
                        </div>
                    </div>

                    <!-- Ранее полученные уведомления -->
                    <div class="col-12" data-block-notify style="display: none;">
                        <div class="notify-bar-title opacity-50 text-uppercase">
                            Ранее
                        </div>
                    </div>
                    <div class="col-12" data-block-notify style="display: none;">
                        <div class="notify-bar-collection">
                            <div items-html-notify style="display: none;">
                                @include('blocks.notification')
                            </div>
                            <div items-list-notify="{{ Route('notifications.index') }}" class="row" style="display: none;"></div>
                        </div>
                    </div>

                    <!-- Нет уведомлений -->
                    <div class="col-12" data-block-notify-empty>
                        <div class="notify-bar-empty">
                            <span class="text-10">
                                У вас еще нет уведомлений
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>