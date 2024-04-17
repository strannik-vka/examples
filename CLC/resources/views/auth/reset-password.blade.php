@extends('layouts.app')

@section('title', 'Воссановление пароля - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/auth/confirm.scss')
@endsection

@section('content')

<section class="section section-content section-confirm">
    <div class="container">
        <div class="section-confirm-inner">
            <form data-ajax-form="confirm" method="POST" action="{{ route('password.store') }}" class="form-auth" auth-form-submit>
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <input type="hidden" name="email" value="{{ $request->email }}" readonly>

                <input type="hidden" name="remember" value="1">

                <h5 class="form-auth-title">
                    Восстановление пароля
                </h5>
                <div class="row">
                    <div class="col-12">
                        <div class="text-6 text-center w-100">
                            Придумайте новый пароль
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-auth-navigate" data-inputs-navigate>
                            <div data-inputs-input class="active">
                                <input type="password" name="password" required class="form-control form-control-bottom" placeholder="Пароль" autocomplete="current-password">
                            </div>
                            <div data-inputs-input style="display: none;">
                                <input type="password" name="password_confirmation" required class="form-control form-control-bottom" placeholder="Повторите пароль" autocomplete="current-password">
                            </div>
                            <div class="form-auth-btns">
                                <button type="button" class="form-auth-btn form-auth-prev deactive" data-inputs-prev></button>
                                <button type="button" class="form-auth-btn form-auth-next" data-inputs-next></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" style="display: none;" data-inputs-end-show>
                        <button class="btn btn-primary w-100">Отправить</button>
                    </div>
                </div>

            </form>
            <!-- include('auth.footer') -->
        </div>
    </div>
    @include('auth.footer')
</section>
@endsection

@section('scripts')
@vite('resources/js/pages/auth/reset-password.js')
@endsection