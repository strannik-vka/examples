@extends('layouts.app')

@section('title', 'Рекомендации - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/profile/recommendations.scss')
@endsection

@section('content')
@include('sections.recommendations.block')
@endsection

@section('hints')
@include('sections.recommendations.book', ['bookFilter' => true])
@include('sections.recommendations.film', ['filmFilter' => true])
@endsection

@section('modals')
@include('sections.recommendations.modal')
@endsection

@section('scripts')
@vite('resources/js/pages/profile/recommendations.js')
@endsection