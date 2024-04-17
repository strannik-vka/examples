@extends('layouts.app')

@section('title', 'На сайте ведутся технические работы - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/error/index.scss')
@endsection

@section('content')
<section class="section section-content section-error">
    <div class="container">
        <div class="section-error-inner row">
            <div class="col-12">
                <div class="section-error-title">Упс...</div>
            </div>
            <div class="col-12">
                <div class="section-error-content">
                    <div class="text-1">
                        На сайте ведутся технические работы
                    </div>
                    <br>
                    <div class="text-3">Скоро включимся!</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection