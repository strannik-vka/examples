@extends('layouts.app')

@section('title', 'Воркшоп — цели и ценности')

@section('head')
@vite('resources/scss/pages/index.scss')
@endsection

@section('content')
@include('sections.cover')
@include('sections.main')
@include('sections.expert')
@include('sections.about')
@include('sections.program')
@include('sections.work')
@include('sections.get')
@include('sections.rate')
<!-- include('sections.faq') -->
@endsection

@section('scripts')
@vite('resources/js/pages/index.js')
@endsection