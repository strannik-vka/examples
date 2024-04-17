<!-- Оценка моего домашнего задания -->
<div class="modal modal-homework" data-modal-id="myHomeWork">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <span class="h-6">
                        Оценка вашей работы по уроку
                        <!-- Номер урока домашнего задания -->
                        {{ __('номер урока') }}:
                        <!-- Сколько пользователей оценило мое домашнее задание -->
                        <span class="text-green-pressed">1/2</span>
                    </span>
                </div>
                <button type="button" class="modal-close" btn-close-modal></button>
            </div>

            <div class="modal-homework-primary">
                <div class="modal-body">
                    <div class="row">
                        <!-- Блок с пользовательскими данными -->
                        <div class="col-12">
                            <div class="username-block">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="username-block-avatar">
                                            <img data-src="/assets/images/icons/user/default/avatar.svg" class="lazyload" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="username-block-content">
                                            <div class="text-11">
                                                {{ __('Имя Фамилия') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Блок с пользовательскими данными -->

                        <!-- Блок описания задания -->
                        <div class="col-12">
                            <div class="modal-homework-description">
                                Господа, синтетическое тестирование влечет за собой процесс внедрения и модернизации позиций, занимаемых участниками в отношении поставленных задач. Современные технологии достигли такого уровня, что высокотехнологичная концепция общественного уклада выявляет срочную потребность существующих финансовых и административных условий. Прежде всего, консультация с широким активом однозначно фиксирует необходимость переосмысления внешнеэкономических политик!
                            </div>
                        </div>
                        <!-- Блок описания задания -->

                        <!-- Блок с ответом на домашнее задание -->
                        <div class="col-12">
                            <div class="valuation-block">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="valuation-block-label">
                                            Ответ
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        Домашнее задание, что человек ответил
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Блок с ответом на домашнее задание -->

                        <!-- Прикрепленный файл к домашнему заданию -->
                        <div class="col-12">
                            <div class="valuation-block">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="valuation-block-label">
                                            Файл
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="javascript://" class="link" download>Название-файла.pdf</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Прикрепленный файл к домашнему заданию -->
                    </div>
                </div>
            </div>

            <div class="modal-homework-secondary">
                <div class="modal-body">
                    <form class="row">
                        <!-- Оценка -->
                        <div class="col-12">
                            <div class="valuation-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="valuation-form-label">
                                            Оценка:
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        Оцените ответ пользователя по следующим <br>
                                        критериям (от 0 до 10 баллов)
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Критерии оценки -->
                        <div class="col-12">
                            <div class="valuation-form-row">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="valuation-form-context">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="valuation-form-title">
                                                        Уровень <br>
                                                        медийности
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="valuation-form-counter">
                                                        <div class="score-block-val">
                                                            <div class="score-group" data-score-group>
                                                                <input name="score" class="form-type-score w-100 opacity-30" type="text" placeholder="0/10">
                                                                <button type="button" class="btn-score btn-score-up" data-score-plus></button>
                                                                <button type="button" class="btn-score btn-score-down" data-score-minus></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="valuation-form-context">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="valuation-form-title">
                                                        Уровень <br>
                                                        медийности
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="valuation-form-counter">
                                                        <div class="score-block-val">
                                                            <div class="score-group" data-score-group>
                                                                <input name="score" class="form-type-score w-100 opacity-30" type="text" placeholder="0/10">
                                                                <button type="button" class="btn-score btn-score-up" data-score-plus></button>
                                                                <button type="button" class="btn-score btn-score-down" data-score-minus></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Критерии оценки -->

                        <!-- Блок комментирования -->
                        <div class="col-12">
                            @include('course.block.grade.homework.comment')
                        </div>
                        <!-- Блок комментирования -->
                        <!-- Оценка -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Поп-ап после сдачи Д/З - тест + задание -->
<div class="modal modal-notify" data-modal-id="workFinishTestTaskModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Спасибо
                </h6>
            </div>
            <div class="modal-body text-center">
                <div class="opacity-75">
                    <div class="text-7">Оценка за тест:</div>
                    <div class="text-6 fw-500">10 баллов</div>
                </div>
                <br>
                <div class="devider devider-dark opacity-10"></div>
                <br>
                <p class="text-6 opacity-75">
                    Оценка за задание: <br>
                    <span class="fw-500">
                        Сейчас другие ученики оценивают вашу работу,
                        скоро мы оповестим вас
                        о результатах
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Поп-ап после сдачи Д/З - тест -->
<div class="modal modal-notify" data-modal-id="workFinishTestModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Спасибо
                </h6>
            </div>
            <div class="modal-body text-center">
                <div class="opacity-75">
                    <div class="text-7">Оценка за тест:</div>
                    <div class="text-6 fw-500">10 баллов</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Поп-ап после сдачи Д/З - тест + задание -->
<div class="modal modal-notify" data-modal-id="workFinishTestMatchModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Спасибо
                </h6>
            </div>
            <div class="modal-body text-center">
                <p class="text-6 opacity-75">
                    Оценка за задание: <br>
                    <span class="fw-500">
                        Сейчас другие ученики оценивают вашу работу,
                        скоро мы оповестим вас
                        о результатах
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Оцените двух учеников, пожалуйста -->
<div class="modal modal-notify" data-modal-id="rateTwoStudentsModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Оцените двух учеников, <br>
                    пожалуйста
                </h6>
            </div>
            <div class="modal-body text-center">
                <p class="text-6 opacity-75">
                    Перед тем, как перейти <br>
                    к следующему уроку, тебе <br>
                    необходимо оценить работы <br>
                    двух других участников
                </p>
                <br>
                <a href="javascript://" class="btn btn-primary w-100">Начать</a>
            </div>
        </div>
    </div>
</div>

<!-- Спасибо  за оценку! -->
<div class="modal modal-notify" data-modal-id="rateThanksModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Спасибо <br>
                    за оценку
                </h6>
            </div>
            <div class="modal-body text-center">
                <p class="text-6 opacity-75">
                    Все работы по <br>
                    уроку <span>n</span> оценены
                </p>
                <br>
                <a href="javascript://" class="btn btn-primary btn-wider">К уроку</a>
            </div>
        </div>
    </div>
</div>

<!-- Спасибо  за оценку! -->
<div class="modal modal-notify" data-modal-id="rateEditModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Спасибо, <br>
                    ваша оценка <br>
                    изменена
                </h6>
            </div>
        </div>
    </div>
</div>