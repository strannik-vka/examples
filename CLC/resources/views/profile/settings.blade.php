@extends('layouts.app')

@section('title', 'Настройки профиля - Лагерь креативных лидеров')

@section('head')
@vite('resources/scss/pages/profile/settings.scss')
@endsection

@section('content')
<section class="section section-content section-settings">
    <div class="container">
        <div class="section-settings-inner">
            <div class="section-settings-header">
                <div class="row">
                    <div class="col-6 col-xl-auto">
                        <div class="section-settings-title">
                            <h4 class="h-4">
                                Профиль
                            </h4>
                        </div>
                    </div>
                    <div class="col-6 col-xl">
                        <div class="email-block text-right text-xl-left">
                            <div class="row">
                                <div class="col-12">
                                    <div class="email-block-title text-right text-xl-left">
                                        Общие вопросы:
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="email-block-description text-right text-xl-left">
                                        <a href="mailto:inbox@creative-leaders.ru" class="link">inbox@creative-leaders.ru</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl">
                        <div class="contest-banner w-100 w-lg-auto">
                            <div class="contest-banner-inner">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-auto">
                                        <h6>
                                            Онлайн-курс по <br>
                                            креативному лидерству
                                        </h6>
                                    </div>
                                    <div class="col-12 col-md-auto">
                                        <a href="{{ Route('course.show', ['id' => 1]) }}" class="btn btn-primary btn-wider w-xs-100 w-sm-100 w-md-auto text-nowrap">Начать учиться</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form data-ajax-form="settings" data-reset="false" action="{{ Route('profile.settings.update') }}" class="section-settings-content">
                @csrf
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="section-settings-column">
                            <div class="row">
                                <div class="col-12 col-md-6 col-xl-12">
                                    <div class="form-floating">
                                        <input value="{{ $user->name }}" name="name" type="text" class="form-control form-control-bottom" id="name" placeholder="Фио">
                                        <label for="name">ФИО</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-12">
                                    <div class="form-floating">
                                        <input value="{{ $user->birthday ? $user->birthday->format('d.m.Y') : '' }}" name="birthday" type="text" class="form-control form-control-bottom" id="birthday" placeholder="Дата рождения">
                                        <label for="birthday">Дата рождения</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-12">
                                    <div class="form-floating">
                                        <input value="{{ $user->city }}" name="city" type="text" class="form-control form-control-bottom" id="city" placeholder="Город, регион">
                                        <label for="city">Город, регион</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-12">
                                    <div class="form-floating">
                                        <input value="{{ $user->place_work }}" name="place_work" type="text" class="form-control form-control-bottom" id="place" placeholder="Место работы/учебы">
                                        <label for="place">Место работы/учебы</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="section-settings-column">
                            <div class="row">
                                <div class="col-12 col-md-6 col-xl-12">
                                    <div class="form-floating">
                                        <input value="{{ $user->email }}" name="email" type="email" class="form-control form-control-bottom" id="email" placeholder="E-mail">
                                        <label for="email">E-mail</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-12">
                                    <div class="form-floating">
                                        <input value="{{ $user->phone }}" name="phone" type="text" class="form-control form-control-bottom" id="phone" placeholder="Телефон">
                                        <label for="phone">Телефон</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-12">
                                    <div class="form-floating">
                                        <input value="{{ $user->social_networks }}" name="social_networks" type="text" class="form-control form-control-bottom" id="social" placeholder="Соц-сети">
                                        <label for="social">Соц-сети</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-12">
                                    <div class="form-floating form-types @if($user->photo) active @endif" file-group>
                                        <label class="form-type-label @if($user->photo) label-up @endif" for="file-upload">Аватар</label>
                                        <input value="{{ $user->photo }}" name="photo" id="file-upload" type="file" @if($user->photo) data-is-file="true" @endif class="form-control form-control-bottom">
                                        <div class="form-control form-type-file form-control-bottom" file-change-name="photo">
                                            @if($user->photo)
                                            <span class="file-delete" delete=""></span>
                                            <a target="_blank" href="{{ $user->photo }}">Фотография</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="section-settings-column">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="about" data-input-count="about" type="text" class="form-control form-control-bottom form-control-about" id="about" placeholder="О себе">{{ $user->about }}</textarea>
                                        <label for="about">О себе</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-12">
                                    <div class="form-floating">
                                        <input name="password" type="password" class="form-control form-control-bottom" id="password" placeholder="Пароль" readonly="ac-off">
                                        <label for="password">Пароль</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-12">
                                    <div class="form-floating">
                                        <input name="password_confirmation" type="password" class="form-control form-control-bottom" id="password-repeat" placeholder="Повторите пароль" readonly="ac-off">
                                        <label for="password-repeat">Повторите пароль</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8">
                        <div class="section-settings-column">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <div class="form-icon form-icon-info form-icon-end form-icon-middle" data-popover-toggle="myPortfolioPopover">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="20" height="20" rx="10" fill="white" />
                                                <path opacity="0.4" d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                                            </svg>
                                        </div>
                                        <input value="{{ $user->portfolio }}" name="portfolio" type="text" class="form-control form-control-bottom" id="portfolio" placeholder="Портфолио">
                                        <label for="portfolio">Портфолио</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="section-settings-column">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('hints')
<div id="myPortfolioPopover" class="popover popover-myportfolio">
    <div class="popover-body">
        Прикрепи ссылку на свое портфолио или резюме, уточни <br class="d-none d-md-inline">
        образование, поделись опытом реализации креативных <br class="d-none d-md-inline">
        проектов, отметь свои достижения
    </div>
</div>
@endsection

@section('modals')
@include('course.modal.payment')
@include('course.modal.check-access-course')
<div class="modal" data-modal-id="settingUpdateModal">
    <div class="modal-dialog modal-notify">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Ваши личные данные <br>
                    успешно изменены!
                </h6>
            </div>
            <div class="modal-body">
                <div class="text-6 text-center opacity-75">
                    Сведения о вашей учетной <br>
                    записи были обновленны.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@vite('resources/js/pages/profile/settings.js')
@endsection