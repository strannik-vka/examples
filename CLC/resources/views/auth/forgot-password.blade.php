@extends('layouts.app')

@section('title', 'Восстановление пароля - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/auth/forgot.scss')
@endsection

@section('content')

<section class="section section-content section-forgot">
    <div class="container">
        <div class="section-forgot-inner">
            <form data-ajax-form="forgot" data-ajax-form-hide="forgot" method="POST" action="{{ route('password.email') }}" class="form-auth" auth-form-submit>
                @csrf
                <input type="hidden" name="remember" value="1">
                <h5 class="form-auth-title">
                    Восстановление пароля
                </h5>
                <div class="row">
                    <div class="col-12">
                        <div class="text-6 text-center w-100">
                            Введите электронный адрес, на который<br>
                            зарегистрирован аккаунт. Мы вышлем письмо<br>
                            с возможностью восстановления.
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-auth-navigate">
                            <div>
                                <input name="email" type="email" class="form-control form-control-bottom" placeholder="Email" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100">Отправить</button>
                    </div>
                </div>
            </form>
            <div class="form-auth" style="display:none;" data-ajax-form-show="forgot">
                <div class="row">
                    <div class="col-12">
                        <h5 class="form-auth-title text-center" style="padding:0;">
                            Восстановление пароля
                        </h5>
                    </div>
                    <div class="col-12">
                        <div class="text-6 text-center w-100">
                            Письмо с ссылкой для восстановления <br>
                            успешно отправлено на <span data-forgot-email></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('auth.footer')
</section>
@endsection

@section('scripts')
@vite('resources/js/pages/auth/forgot.js')
@endsection