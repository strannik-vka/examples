@extends('layouts.app')

@section('title', html_entity_decode($post->name))

@section('head')
@vite('resources/scss/pages/post/show.scss')
<link rel="next" href="{{ $post->nextUrl() }}">
@endsection

@section('content')

<section data-clone-elem class="section section-content section-post">
    <div class="container">
        <div class="section-post-inner">
            <div class="row">
                <div class="col-12">
                    <div class="section-post-header">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-post-breadcrumbs">
                                    <div class="breadcrumbs">
                                        <a href="{{ Route('index') }}" class="breadcrumbs-link breadcrumbs-link-index text-7">Главная</a>

                                        @if($post->category)
                                        <div class="breadcrumbs-devider">/</div>
                                        <span class="breadcrumbs-link breadcrumbs-link-index text-7">{{ $post->category->name }}</span>
                                        @endif

                                        <div class="breadcrumbs-devider">/</div>
                                        <span class="breadcrumbs-link breadcrumbs-link-title text-decoration-none text-7">{!! $post->name !!}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="section-post-title">
                                    <h4>{!! $post->name !!}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($post->image)
                <div class="col-12">
                    <div class="section-post-preview">
                        <picture>
                            <img data-src="{{ $post->image }}" class="lazyload">
                        </picture>
                    </div>
                </div>
                @endif

                <div class="col-12">
                    <div class="section-post-content">
                        <div class="row">
                            @include('post.show-content', [
                            'contents' => $contents
                            ])
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="section-post-footer">
                        <!-- date -->
                        <div class="section-post-date">
                            <span class="text-7">{{ $post->created_at->format('d.m.Y') }}</span>
                        </div>
                        <!-- date -->
                        <!-- social media links -->
                        <div class="section-post-social">
                            <div class="row">
                                <div class="col-auto">
                                    <a target="_blank" href="http://vk.com/share.php?url={{ Route('post.show', $post->id) }}&title={{ strip_tags($post->name) }}" class="btn btn-social btn-social-light">
                                        <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.71451 10C3.24792 10 0.129919 6.24625 0 0H2.73829C2.82823 4.58458 4.84692 6.52653 6.44592 6.92693V0H9.02441V3.95395C10.6034 3.78378 12.2622 1.98198 12.8218 0H15.4003C14.9705 2.44244 13.1717 4.24424 11.8925 4.98498C13.1717 5.58559 15.2205 7.15716 16 10H13.1617C12.5521 8.0981 11.0332 6.62663 9.02441 6.42643V10H8.71451Z" fill="#020726" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- social media links -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('post.recommended')

<div data-ep-preloader style="display: none;">
    <div class="preloader">
        <div class="spinner-border text-dark" role="status">
            <span class="visually-hidden">Загрузка...</span>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@vite('resources/js/pages/post/show.js')
@endsection