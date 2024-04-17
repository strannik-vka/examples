<!-- Оценка моего ДЗ учениками -->
@if(isset($rated))
@include('course.block.grade.homework.card')
@else
@include('course.block.grade.status')
@endif