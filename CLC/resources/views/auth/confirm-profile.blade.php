@extends('layouts.app')

@section('title', 'Подтверждение учетной записи - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/auth/confirm.profile.scss')
@endsection

@section('content')

<section class="section section-content section-profile">
    <div class="container">
        <div class="section-profile-inner">
            <form data-ajax-form="register" action="{{ Route('register.step2') }}" class="form-auth" auth-form-submit>
                <input type="hidden" name="password" value="{{ request('password') }}">
                <input type="hidden" name="password_confirmation" value="{{ request('password') }}">
                <input type="hidden" name="email" value="{{ request('email') }}">
                <input type="hidden" name="remember" value="1">
                <input type="hidden" name="redirectUrl" value="{{ request('redirectUrl') }}">
                <h5 class="form-auth-title">
                    Профиль
                </h5>
                <div class="row">
                    <div class="col-12">
                        <div class="text-6 text-center w-100">
                            Заполните для полного доступа к материалам
                        </div>
                    </div>
                    <div class="col-12">
                        <input name="name" value="{{ request('name') }}" type="text" class="form-control form-control-bottom" placeholder="ФИО">
                    </div>
                    <div class="col-12">
                        <input name="birthday" type="text" class="form-control form-control-bottom" placeholder="Дата рождения">
                    </div>
                    <div class="col-12">
                        <input name="city" type="text" class="form-control form-control-bottom" placeholder="Город">
                    </div>
                    <div class="col-12">
                        <input name="place_work" type="text" class="form-control form-control-bottom" placeholder="Место работы/учебы">
                    </div>
                    <div class="col-12">
                        <input name="phone" type="text" class="form-control form-control-bottom" placeholder="Телефон">
                    </div>
                    <div class="col-12">
                        <input name="position" type="text" class="form-control form-control-bottom" placeholder="Должность">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('auth.footer')
</section>
@endsection

@section('scripts')
@vite('resources/js/pages/auth/confirm.profile.js')
@endsection