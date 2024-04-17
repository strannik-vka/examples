<div data-progress-mobile data-percent-wrap class="progress-mobile">
    <!-- Линия заполнения прогресса всех пройденных уроков -->
    <div class="progress-mobile-line">
        <div data-progress-width class="progress-mobile-line-active"></div>
    </div>
    <!-- Линия заполнения прогресса всех пройденных уроков -->

    <!-- Процент заполнения прогресса всех пройденных уроков -->
    <div class="progress-mobile-inner" ajax-elem>
        @if($course->isPassed())
        <!-- Если закончили проходить курс -->
        <div class="progress-mobile-certificate">
            Скачать
            сертификат
            <a href="{{ route('course.certificate.show', $course->id) }}" class="stretched-link"></a>
        </div>
        <!-- Если закончили проходить курс -->
        @else
        <div data-percent class="progress-mobile-counter"></div>
        @endif
    </div>
    <!-- Процент заполнения прогресса всех пройденных уроков -->
</div>