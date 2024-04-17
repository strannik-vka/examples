<div class="row g-2">
    <div class="col-md col-12">
        <div class="progress-block">
            <div class="progress-block-inner">
                <div class="row">
                    <div class="col-auto">
                        <!-- Иконка ракеты -->
                        <div class="progress-block-rocket">
                            @include('course.block.progress.icons.rocket')
                        </div>
                        <!-- Иконка ракеты -->
                    </div>
                    <div class="col">
                        <!-- Отображение прогресс-блока в мобильной/десктоп версии -->
                        @if(isset($mobile))
                        @include('course.block.progress.mobile')
                        @else
                        @include('course.block.progress.desktop')
                        @endif
                        <!-- Отображение прогресс-блока в мобильной/десктоп версии -->
                    </div>
                    <div class="col-auto">
                        <!-- Иконка флага -->
                        <div class="progress-block-flag">
                            @include('course.block.progress.icons.flag')
                        </div>
                        <!-- Иконка флага -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-auto d-none d-md-block">
        <div class="progress-block progress-counter">
            <div class="progress-block-inner row" ajax-elem>
                @if($course->isPassed())
                <!-- Если закончили проходить курс -->
                <div class="col-12">
                    <div class="progress-certificate">
                        Скачать
                        сертификат
                        <a href="{{ route('course.certificate.show', $course->id) }}" class="stretched-link"></a>
                    </div>
                </div>
                <!-- Если закончили проходить курс -->
                @else
                <div class="col-12">
                    <!-- Процент заполнения прогресса всех пройденных уроков -->
                    <div data-percent-wrap class="progress-desktop progress-desktop-points position-relative">
                        <div data-percent class="progress-desktop-counter"></div>
                    </div>
                    <!-- Процент заполнения прогресса всех пройденных уроков -->
                </div>
                @endif
            </div>
        </div>
    </div>
</div>