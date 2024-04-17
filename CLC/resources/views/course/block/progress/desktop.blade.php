<div data-progress-desktop class="progress-desktop">
    <!-- Линия заполнения прогресса всех пройденных уроков -->
    <div class="progress-desktop-line">
        <div data-progress-width class="progress-desktop-line-active"></div>
    </div>
    <!-- Линия заполнения прогресса всех пройденных уроков -->

    <!-- Количество всех пройденных уроков -->
    <div class="progress-desktop-points">
        @foreach($lessons as $itemLesson)
        @if($itemLesson->number)
        <span data-point ajax-elem class="progress-desktop-point @if($itemLesson->user) active @endif"></span>
        @endif
        @endforeach
    </div>
    <!-- Количество всех пройденных уроков -->
</div>