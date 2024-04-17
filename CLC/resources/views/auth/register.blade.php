@extends('layouts.app')

@section('title', 'Регистрация - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/auth/register.scss')
@endsection

@section('content')

<section class="section section-content section-register">
    <div class="container">
        <div class="section-register-inner">
            <form data-ajax-form="register" action="{{ Route('register.step1') }}" class="form-auth" auth-form-submit>
                <input type="hidden" name="remember" value="1">
                <input type="hidden" name="redirectUrl" value="{{ request('redirectUrl') }}">
                <h5 class="form-auth-title">
                    Зарегистрируйся, чтобы <br>
                    начать обучение
                </h5>
                <div class="row">
                    <div class="col-12">
                        <div class="form-auth-navigate" data-inputs-navigate>
                            <div data-inputs-input class="active">
                                <input name="name" type="text" class="form-control form-control-bottom" placeholder="Имя">
                            </div>
                            <div data-inputs-input style="display: none;">
                                <input name="email" type="text" class="form-control form-control-bottom" placeholder="Email">
                            </div>
                            <div data-inputs-input style="display: none;">
                                <input name="password" type="password" class="form-control form-control-bottom" placeholder="Пароль">
                            </div>
                            <div data-inputs-input style="display: none;">
                                <input name="password_confirmation" type="password" class="form-control form-control-bottom" placeholder="Повторите пароль">
                            </div>
                            <div class="form-auth-btns">
                                <button type="button" class="form-auth-btn form-auth-prev deactive" data-inputs-prev></button>
                                <button type="button" class="form-auth-btn form-auth-next" data-inputs-next></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" style="display: none;" data-inputs-end-show>
                        <button class="btn btn-primary w-100">Зарегистрироваться</button>
                    </div>
                    <div class="col-12" style="display: none;" data-inputs-end-show>
                        <div class="text-6 text-center w-100">
                            Нажимая кнопу «Зарегистрироваться»,<br>
                            Вы принимаете условия <a href="/docs/polzovatelskoe_soglashenie.pdf" target="_blank">Пользова<br>
                                -тельского соглашения</a>
                        </div>
                    </div>
                    <div class=" form-auth-footer text-center">
                        Есть аккаунт? <a href="{{ Route('login') }}">Войти</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('auth.footer')
</section>
@endsection

@section('scripts')
@vite('resources/js/pages/auth/register.js')
@endsection