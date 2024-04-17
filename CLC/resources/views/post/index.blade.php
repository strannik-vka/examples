@extends('layouts.app')

@section('title', 'Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/post/index.scss')
@endsection

@section('content')
@include('post.block')

@include('sections.subscribe')

@include('sections.partners')
@endsection

@section('scripts')
@vite('resources/js/pages/post/index.js')
@endsection