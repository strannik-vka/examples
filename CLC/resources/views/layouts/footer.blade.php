@if((Route::currentRouteName() !== 'login' && Route::currentRouteName() !== 'register' && Route::currentRouteName() !== 'password.request' && Route::currentRouteName() !== 'verify.code' && Route::currentRouteName() !== 'password.reset' && Route::currentRouteName() !== 'register.confirm'))
<!-- footer code -->

<footer class="footer wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s" id="footer">
    <div class="container">
        <div class="footer-inner">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="footer-left">
                        <div class="row">
                            <div class="col-12">
                                <a href="/" class="logo" alt="logo">
                                    <img data-src="/assets/images/logotypes/logo-grey-black.svg" class="lazyload infiniteStepRotation">
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="nav-footer">
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="{{ Route('about') }}" class="nav-footer-link">О проекте</a>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{ Route('leadership.contest') }}" class="nav-footer-link">Конкурс</a>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{ Route('post.index') }}" class="nav-footer-link">Новости</a>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{ Route('faq.index') }}" class="nav-footer-link">Вопросы/ответы</a>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{ Route('agreement.user') }}" target="_blank" class="nav-footer-link">Пользовательское соглашение</a>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{ Route('agreement.data') }}" target="_blank" class="nav-footer-link">Политика обработки перс. данных</a>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{ Route('agreement.offer') }}" target="_blank" class="nav-footer-link">Оферта</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-md-block col-12">
                                <div class="text-7">
                                    <?php echo date('Y') ?> © ИП Гребенева Е.Н. Все права защищены
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="footer-center">
                        <div class="row">
                            <div class="col-12">
                                <div class="footer-content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="footer-title">
                                                <h6>Общие вопросы:</h6>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="footer-description">
                                                <a href="mailto:inbox@creative-leaders.ru" class="link text-6 opacity-50">inbox@creative-leaders.ru</a>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="footer-description">
                                                <a href="tel:+7 (925) 369-60-69" class="link text-6 opacity-50">+7 (925) 369-60-69</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="footer-content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="footer-title">
                                                <h6>Тех. поддержка:</h6>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="footer-description">
                                                <a href="https://t.me/+79253696069" target="_blank" class="link text-6 opacity-50">Telegram-чат</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="footer-content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="footer-title">
                                                <h6>Для СМИ:</h6>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="footer-description">
                                                <a href="mailto:pr@creative-leaders.ru" class="link text-6 opacity-50">pr@creative-leaders.ru</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="footer-social">
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="https://vk.com/creativeleaders_camp" class="btn btn-social btn-social-light" target="_blank">
                                                <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.71451 10C3.24792 10 0.129919 6.24625 0 0H2.73829C2.82823 4.58458 4.84692 6.52653 6.44592 6.92693V0H9.02441V3.95395C10.6034 3.78378 12.2622 1.98198 12.8218 0H15.4003C14.9705 2.44244 13.1717 4.24424 11.8925 4.98498C13.1717 5.58559 15.2205 7.15716 16 10H13.1617C12.5521 8.0981 11.0332 6.62663 9.02441 6.42643V10H8.71451Z" fill="currentColor" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <a href="https://t.me/CreativeLeadersCamp" class="btn btn-social btn-social-light" target="_blank">
                                                <svg width="16" height="10" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.2423 1.61903L22.2422 1.61902L22.2414 1.63137C22.2149 2.00663 22.0772 2.89244 21.8838 4.13565L21.879 4.16633C21.6873 5.39919 21.45 6.93172 21.2421 8.52621L19.8247 17.9206L19.8211 17.9444L19.8195 17.9633C19.8196 17.9629 19.8195 17.9639 19.8194 17.9649C19.8194 17.9652 19.8194 17.965 19.8193 17.9653C19.8189 17.969 19.818 17.9769 19.8164 17.9887C19.8131 18.0124 19.807 18.0504 19.797 18.0984C19.7766 18.1965 19.7418 18.3245 19.6863 18.4524C19.5698 18.7208 19.4189 18.8728 19.2195 18.9177C18.9527 18.9777 18.4908 18.8733 17.9397 18.6122C17.4255 18.3687 17.0034 18.0714 16.9014 17.9888L16.8923 17.9814L16.8829 17.9743C16.813 17.9211 16.5651 17.7568 16.24 17.5413C16.1725 17.4966 16.1017 17.4496 16.0285 17.401C15.5796 17.1031 14.9897 16.7102 14.3619 16.2824C13.0906 15.4161 11.714 14.4402 11.0181 13.8198L11.0182 13.8197L11.0108 13.8133C10.8618 13.6839 10.7917 13.561 10.7797 13.4847C10.7757 13.459 10.7747 13.4226 10.8006 13.3624C10.8294 13.2956 10.9007 13.1795 11.0756 13.0244L11.0875 13.0139L11.0989 13.0029L17.3046 7.01456L17.3112 7.0082L17.3176 7.00169C17.545 6.77132 17.7661 6.47293 17.9211 6.18053C17.9985 6.03452 18.0725 5.86563 18.1163 5.68939C18.1551 5.5333 18.1987 5.26099 18.0844 4.97983C17.9398 4.62404 17.6254 4.44059 17.3135 4.40098C17.0536 4.36797 16.7976 4.42995 16.5867 4.50352C16.1506 4.65561 15.5736 4.97985 14.8216 5.49795L6.57576 11.1674C6.56395 11.1734 6.54294 11.1834 6.51286 11.1958C6.44152 11.225 6.31873 11.2673 6.14576 11.2984C5.80446 11.3598 5.24589 11.3816 4.47486 11.1476L0.823833 10.0093C0.947061 9.9067 1.19836 9.75123 1.67802 9.57341L1.70949 9.56175L1.73979 9.54732C6.18882 7.4286 11.4075 5.27746 16.4809 3.18618C18.1181 2.51133 19.7402 1.84272 21.3164 1.18343L21.319 1.18246C21.3277 1.17929 21.343 1.1739 21.3637 1.16709C21.4057 1.15336 21.4678 1.13462 21.5424 1.11688C21.7007 1.07923 21.873 1.05633 22.015 1.06884C22.1528 1.08099 22.1827 1.11729 22.1853 1.12035L22.1854 1.12047L22.1854 1.12051C22.1879 1.12354 22.2764 1.2279 22.2423 1.61903Z" stroke="currentColor" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="footer-right h-100">
                        <div class="row" style="--bs-gutter-y: 3rem;">
                            <div class="col-12">
                                <form data-ajax-form action="{{ Route('subscribe.store') }}" class="row g-3">
                                    <div class="col-12">
                                        <div class="footer-title">
                                            <h6 data-ajax-form-hide>
                                                @if(Route::is('post.index') || Route::is('post.show'))
                                                Подписывайся и будь <br>
                                                в курсе новостей
                                                @else
                                                Получи чек-лист <br>
                                                креативного лидера
                                                @endif
                                            </h6>
                                            <h6 data-ajax-form-show style="display: none;">
                                                @if(Route::is('post.index') || Route::is('post.show'))
                                                Спасибо <br>
                                                за подписку!
                                                @else
                                                Проверь <br>
                                                свою почту!
                                                @endif
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div data-ajax-form-hide class="text-6 opacity-50">
                                            @if(Route::is('post.index') || Route::is('post.show'))
                                            Мы будем направлять только <br>
                                            полезную для тебя информацию
                                            @else
                                            Мы направим чек-лист <br>
                                            на указанную тобой почту
                                            @endif
                                        </div>
                                        <div data-ajax-form-show style="display: none;" class="text-6 opacity-50">
                                            @if(Route::is('post.index') || Route::is('post.show'))
                                            Мы будем направлять только <br>
                                            полезную для тебя информацию
                                            @else
                                            Мы направим чек-лист <br>
                                            на указанную тобой почту
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-footer-group input-group">
                                            <input type="hidden" name="type_id" value="1" />
                                            <input type="email" name="email" class="form-control" placeholder="Твой E-mail" aria-label="Твой E-mail">
                                            <button data-ajax-form-hide class="btn btn-icon btn-primary" type="submit">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                                </svg>
                                            </button>
                                            <button data-ajax-form-show data-ajax-form-reset style="display:none" type="button" class="btn btn-icon btn-primary">
                                                Изменить
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12">
                                <form data-ajax-form action="{{ Route('subscribe.store') }}" class="row g-3">
                                    <div class="col-12">
                                        <div class="footer-title">
                                            <h6 data-ajax-form-hide>
                                                Получи чек-лист <br>
                                                эффективности <br>
                                                управления
                                            </h6>
                                            <h6 data-ajax-form-show style="display: none;">
                                                Проверь <br>
                                                свою почту!
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div data-ajax-form-hide class="text-6 opacity-50">
                                            Мы направим чек-лист <br>
                                            на указанную тобой почту
                                        </div>
                                        <div data-ajax-form-show style="display: none;" class="text-6 opacity-50">
                                            Мы направим чек-лист <br>
                                            на указанную тобой почту
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-footer-group input-group">
                                            <input type="hidden" name="type_id" value="3" />
                                            <input type="email" name="email" class="form-control" placeholder="Твой E-mail" aria-label="Твой E-mail">
                                            <button data-ajax-form-hide class="btn btn-icon btn-primary" type="submit">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                                </svg>
                                            </button>
                                            <button data-ajax-form-show data-ajax-form-reset style="display:none" type="button" class="btn btn-icon btn-primary">
                                                Изменить
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="d-block d-md-none col-12">
                                <div class="text-7">
                                    <?php echo date('Y') ?> © ИП Гребенева Е.Н. Все права защищены
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@else

@endif