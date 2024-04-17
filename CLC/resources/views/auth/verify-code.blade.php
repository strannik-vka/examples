@extends('layouts.app')

@section('title', 'Введите код авторизации - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/auth/verify.scss')
@endsection

@section('content')

<section class="section section-content section-verify">
    <div class="container">
        <div class="section-verify-inner">
            <div class="form-verify">
                <h5 class="form-verify-title" style="padding-bottom:15px;">
                    Принято! А теперь <br>
                    проверь свою почту
                </h5>
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-6">
                            На указанную в анкете почту, мы направили <br>
                            письмо с кодом, введите его в поле ниже
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="verifyForm-inner">
                            <div class="verifyForm-inputs" data-code-form>
                                <input type="text" class="form-control form-control-bottom" maxLength="1">
                                <input type="text" class="form-control form-control-bottom" maxLength="1">
                                <input type="text" class="form-control form-control-bottom" maxLength="1">
                                <input type="text" class="form-control form-control-bottom" maxLength="1">
                            </div>
                            <div class="verifyForm-preloader" data-code-preloader style="display: none;">
                                <div class="spinner-border" role="status"></div>
                            </div>
                        </div>
                        <div class="verifyForm-error" data-code-error style="display: none;"></div>
                    </div>
                    <div class="col-12">
                        <div class="w-100 text-center">
                            <a href="javascript://" data-code-resend class="send-link text-uppercase" style="text-decoration-skip-ink: none;">Отправить код повторно<span data-code-seconds></span></a>
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
@vite('resources/js/pages/auth/verify.js')
@endsection