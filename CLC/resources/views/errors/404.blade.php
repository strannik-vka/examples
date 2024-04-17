@extends('layouts.app')

@section('title', 'Страница не найдена - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/error/index.scss')
@endsection

@section('content')
<section class="section section-content section-error">
    <div class="container">
        <div class="section-error-inner row">
            <div class="col-12">
                <div class="section-error-logo">
                    <svg width="504" height="250" viewBox="0 0 504 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 172.078L58.5438 3.24675H117.088V172.078H146.359V207.792H117.088V246.753H78.0584V207.792H0V172.078ZM31.8738 172.078H78.0584V37.3377L31.8738 172.078Z" fill="#020726" />
                        <path d="M252 250C208.417 250 182.073 223.052 182.073 168.831V81.1688C182.073 26.9481 208.417 0 252 0C295.583 0 321.927 26.9481 321.927 81.1688V168.831C321.927 223.052 295.583 250 252 250ZM252 214.286C271.189 214.286 282.898 202.922 282.898 168.831V81.1688C282.898 47.0779 271.189 35.7143 252 35.7143C232.811 35.7143 221.102 47.0779 221.102 81.1688V168.831C221.102 202.922 232.485 214.286 252 214.286Z" fill="#020726" />
                        <path d="M357.641 172.078L416.184 3.24675H474.728V172.078H504V207.792H474.728V246.753H435.699V207.792H357.641V172.078ZM389.514 172.078H435.699V37.3377L389.514 172.078Z" fill="#020726" />
                    </svg>
                </div>
            </div>
            <div class="col-12">
                <div class="section-error-content">
                    <a href="{{ Route('index') }}">На главную</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection