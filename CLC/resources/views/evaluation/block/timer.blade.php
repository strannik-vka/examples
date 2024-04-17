<div class="timer-block">
    <div class="row">
        <div class="col-12">
            <div class="timer-block-title h-6 opacity-70">До конца оценки осталось:</div>
        </div>
        <div class="col-12">
            <div class="timer-block-wrapper" data-countdown="{{ $period ? $period->evaluation_stop_at->format('Y/m/d H:i:s') : '' }}">
                <div class="timer-block-item">
                    <div class="timer-block-item-inner">
                        <div class="timer-block-value" data-days>00</div>
                        <div class="timer-block-name" data-days-text>Дней</div>
                    </div>
                </div>
                <div class="timer-block-item">
                    <div class="timer-block-item-inner">
                        <div class="timer-block-value" data-hours>00</div>
                        <div class="timer-block-name" data-hours-text>Часов</div>
                    </div>
                </div>
                <div class="timer-block-item">
                    <div class="timer-block-item-inner">
                        <div class="timer-block-value" data-minutes>00</div>
                        <div class="timer-block-name" data-minutes-text>Минут</div>
                    </div>
                </div>
                <div class="timer-block-item">
                    <div class="timer-block-item-inner">
                        <div class="timer-block-value" data-seconds>00</div>
                        <div class="timer-block-name" data-seconds-text>Секунд</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="timer-block-list">
                <div class="row">
                    <div class="col-auto">
                        <div class="timer-block-col">
                            <div class="timer-block-suptitle opacity-70">Оценено</div>
                            <div class="timer-block-subtitle">{{ $evaluation_completed_count }}/{{ $evaluation_count }}</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="timer-block-col">
                            <div class="timer-block-suptitle opacity-70">Окончание срока оценки</div>
                            <div class="timer-block-subtitle">{{ $period ? $period->evaluation_stop_at->format('d.m.Y H:i') : null }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="timer-block-footer">
        <div class="row">
            @if($isEvaluationCompleted)
            @if($evaluation_completed_count)
            <div class="col-12">
                <div class="badge text-left w-100">
                    <div class="text-4">Спасибо за оценку!</div>
                    <div class="text-10 opacity-70">Номинируемых больше нет.</div>
                </div>
            </div>
            @endif
            @else
            <div class="col-12">
                <a href="{{ Route('evaluation.process') }}" class="btn btn-primary btn-form w-100">Перейти к оценке</a>
            </div>
            @endif
        </div>
    </div>
</div>