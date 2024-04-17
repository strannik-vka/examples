@extends('layouts.app')

@section('title', 'Авторизация - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/auth/login.scss')
@endsection

@section('content')

<section class="section section-content section-login">
    <div class="container">
        <div class="section-login-inner">
            <form data-ajax-form="login" action="{{ Route('login') }}" class="form-auth">
                @csrf
                <input type="hidden" name="remember" value="1">
                <h5 class="form-auth-title">
                    Войди, чтобы<br>
                    начать обучение!
                </h5>
                <div class="row">
                    <div class="col-12">
                        <div class="form-auth-navigate" data-inputs-navigate>
                            <div data-inputs-input class="active">
                                <input name="email" type="text" class="form-control form-control-bottom" placeholder="Email">
                            </div>
                            <div data-inputs-input style="display: none;">
                                <input name="password" type="password" class="form-control form-control-bottom" placeholder="Пароль">
                            </div>
                            <div class="form-auth-btns">
                                <button type="button" class="form-auth-btn form-auth-prev deactive" data-inputs-prev></button>
                                <button type="button" class="form-auth-btn form-auth-next" data-inputs-next></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6 text-left">
                                <div class="form-check">
                                    <input class="form-check-input" name="remember" type="checkbox" id="customControlAutosizing" checked>
                                    <label class="form-check-label" for="customControlAutosizing">
                                        Запомнить меня
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('password.request') }}" class="forgot-link">Забыли пароль?</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" style="display: none;" data-inputs-end-show>
                        <button class="btn btn-primary w-100">Войти</button>
                    </div>
                    <div class="form-auth-footer text-center">
                        Здесь впервые? <a href="{{ Route('register') }}">Зарегистрироваться</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('auth.footer')
</section>
@endsection

@section('scripts')
@vite('resources/js/pages/auth/login.js')
@endsection