<!-- Моя оценка ДЗ учеников -->
@if(isset($rated))
@include('course.block.grade.homework.card', ['myHomeWork' => true])
@else
@include('course.block.grade.status', ['myHomeWork' => true], ['process' => true])
@endif