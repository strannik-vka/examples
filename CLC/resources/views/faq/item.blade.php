<div class="collapse-card" data-collapse-id="collapse_{{ $i }}">
    <div class="collapse-card-header" data-collapse-toggle="collapse_{{ $i }}">
        <div class="row g-3 align-items-start">
            <div class="col">
                <span class="text-4">
                    @if($i == 0)
                    Что нужно для того, чтобы <br class="d-inline d-md-none">начать обучение?
                    @elseif($i == 1)
                    Что делать, если не успел начать обучение на этапе старта курса?
                    @elseif($i == 2)
                    Нужно ли выполнять задания и участвовать в лидермайндах, чтобы получить доступ к следующему видео?
                    @elseif($i == 3)
                    Есть ли возможность задавать вопросы преподавателям?
                    @elseif($i == 4)
                    Есть ли возможность обсуждать материал с другими студентами онлайн-курса?
                    @elseif($i == 5)
                    Кто может обучаться на курсе?
                    @elseif($i == 6)
                    Сколько стоит обучение в «Лагере креативных лидеров»?
                    @endif
                </span>
            </div>
            <div class="col-auto">
                <div class="collapse-card-button">
                    <button type="button" class="btn btn-nav btn-icon btn-icon-burger">
                        <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line y1="13" x2="25" y2="13" stroke="#020726" />
                            <line x1="12.5" y1="25.5" x2="12.5" y2="0.5" stroke="#020726" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse-card-collapsed">
        <br>
        <div class="row">
            <div class="col-12">
                @if($i == 0)
                <p>
                    Зарегистрироваться на сайте <a href="https://creative-leaders.ru/" target="_blank">creative-leaders.ru</a>, войти в личный кабинет и начать обучение. Для регистрации вы можете использовать e-mail. Для активации аккаунта вам нужно подтвердить почтовый адрес. Проверьте входящую почту (включая папку «Спам») <br class="d-inline d-md-none">в электронном ящике, указанном при регистрации: если там есть письмо от <a href="https://creative-leaders.ru/" target="_blank">creative-leaders.ru</a>, перейдите по ссылке, указанной <br class="d-inline d-md-none">в теле письма. В случае, если вам не пришло письмо со ссылкой активации, напишите на почту <a href="mailto:support@creative-leaders.ru">support@creative-leaders.ru</a>, в телеграмм по телефону <a href="https://t.me/CreativeLeadersCamp" target="_blank">+7 (925) 369-60-69</a>.
                </p>
                @elseif($i == 1)
                <p>
                    Начать обучение можно даже тогда, когда он уже начался. <br class="d-none d-md-inline">Регистрация на сайте предоставит вам доступ к урокам в любое время.
                </p>
                @elseif($i == 2)
                <p>
                    Доступ к последующим лекциям и материалам онлайн-курса получат все студенты, вне зависимости от выполненных заданий. Можно просто просмотреть все видеоуроки и не выполнить ни одного задания. Однако, в итоге такой слушатель получит только сертификат слушателя. Те студенты, кто выполнит все задания курса, получат продвинутый сертификат Creative Leaders Camp.
                </p>
                @elseif($i == 3)
                <p>
                    Да, для студентов программы предусмотрена возможность адресовать вопросы экспертам курса. <br class="d-none d-lg-inline">Вы можете обратиться, направив письмо на почту: <a href="mailto:experts@creative-way.ru">experts@creative-way.ru</a>
                </p>
                @elseif($i == 4)
                <p>
                    Да, эта функция реализована. Обсуждение материалов онлайн-курса возможно в <a href="https://t.me/CreativeLeadersCamp" target="_blank">телеграмм-чате</a> проекта
                </p>
                @elseif($i == 5)
                <p>
                    Любой желающий. В проекте нет возрастных или других ограничений. Обучение доступно всем, у кого <br class="d-none d-md-inline">возник запрос на развитие, изменение подхода к управлению проектами и командой <br class="d-none d-md-inline">и бизнес-трансформации, а также есть доступ к интернету.
                </p>
                @elseif($i == 6)
                <p>
                    Базовый онлайн-курс <span class="fw-bold">«Креативное лидерство: авторский подход к управлению»</span> доступен бесплатно.
                </p>
                <p>
                    Если в процессе внедрения полученных знаний у вас возник запрос на работу с наставником, вы можете обратиться <br class="d-none d-lg-inline">к организаторам CLC, направив письмо на почту: <a href="mailto:experts@creative-way.ru">experts@creative-way.ru</a>, для уточнения формата <br class="d-none d-lg-inline">и стоимости расширенного формата обучения.
                </p>
                <p class="fw-bold">
                    Остались еще вопросы?<br>
                    Пиши на почту <a href="mailto:inbox@creative-leaders.ru">inbox@creative-leaders.ru</a> или в телеграмм по телефону <a href="https://t.me/CreativeLeadersCamp" target="_blank">+7 (925) 369-60-69</a>
                </p>
                @endif
            </div>
        </div>
    </div>
</div>