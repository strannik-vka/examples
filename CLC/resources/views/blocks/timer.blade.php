<div class="timer-block">
    <div class="timer-block-wrapper" data-countdown="{{ \App\Helpers\LeadersCompetitionHelper::applicationsDeadline()->format('Y/m/d H:i:s') }}">
        <div class="row">
            <div class="col-auto">
                <div class="timer-block-item">
                    <div class="timer-block-item-inner">
                        <div class="timer-block-value" data-days></div>
                        <div class="timer-block-name" data-days-text></div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="timer-block-item">
                    <div class="timer-block-item-inner">
                        <div class="timer-block-value" data-hours></div>
                        <div class="timer-block-name" data-hours-text></div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="timer-block-item">
                    <div class="timer-block-item-inner">
                        <div class="timer-block-value" data-minutes></div>
                        <div class="timer-block-name" data-minutes-text></div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="timer-block-item">
                    <div class="timer-block-item-inner">
                        <div class="timer-block-value" data-seconds></div>
                        <div class="timer-block-name" data-seconds-text></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>