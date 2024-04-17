@extends('layouts.app')

@section('title', 'Онлайн встречи - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/meeting/index.scss')
@endsection

@section('content')
@include('meeting.block')

@include('sections.subscribe')

@include('sections.partners')
@endsection

@section('modals')
@include('meeting.modal')
@endsection

@section('scripts')
@vite('resources/js/pages/meeting/index.js')
@endsection