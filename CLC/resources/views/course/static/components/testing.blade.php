<!-- Форма домашнего задания -->
<form id="test" data-reset="false" action="" class="poll-form">
    @csrf
    <input type="hidden" name="test_id" value="1">
    <div class="poll-form-qa">
        <div class="row">
            <!-- Вопросы по домашнему заданию -->
            <div class="col-12">
                <div class="qa-block">
                    <div class="row" data-field>
                        <div class="col-12">
                            <!-- Заголовок опроса домашнего задания -->
                            <div class="qa-block-header">
                                <div class="qa-block-title">
                                    1. Где вы работаете?
                                </div>
                                <div class="qa-block-description">
                                    Выберите, пожалуйста, один ответ.
                                </div>
                            </div>
                            <!-- Заголовок опроса домашнего задания -->
                        </div>
                        <!-- Варианты ответа на домашнее задание -->
                        <div class="col-12">
                            <div class="qa-block-content">
                                <div class="form-check form-check-center">
                                    <input class="form-check-input" type="radio" value="1" name="question1" id="question1_1" required>
                                    <label class="form-check-label" for="question1_1">
                                        Самозанятый
                                    </label>
                                </div>
                                <div class="form-check form-check-center">
                                    <input class="form-check-input" type="radio" value="2" name="question1" id="question1_2" required>
                                    <label class="form-check-label" for="question1_2">
                                        ИП
                                    </label>
                                </div>
                                <div class="form-check form-check-center">
                                    <input class="form-check-input" type="radio" value="3" name="question1" id="question1_3" required>
                                    <label class="form-check-label" for="question1_3">
                                        Коммерческая организация
                                    </label>
                                </div>
                                <div class="form-check form-check-center">
                                    <input class="form-check-input" type="radio" value="4" name="question1" id="question1_4" required>
                                    <label class="form-check-label" for="question1_4">
                                        Некоммерческая организация
                                    </label>
                                </div>
                                <div class="form-check form-check-center">
                                    <input class="form-check-input" type="radio" value="5" name="question1" id="question1_5" required>
                                    <label class="form-check-label" for="question1_5">
                                        Государственное учреждение
                                    </label>
                                </div>
                                <div class="form-check form-check-center">
                                    <input class="form-check-input" type="radio" value="6" name="question1" id="question1_6" required>
                                    <label class="form-check-label" for="question1_6">
                                        В данный момент не трудоустроен
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Варианты ответа на домашнее задание -->
                    </div>
                </div>
            </div>
            <!-- Вопросы по домашнему заданию -->

            <!-- Вопросы по домашнему заданию -->
            <div class="col-12">
                <div class="qa-block">
                    <div class="row" data-field>
                        <div class="col-12">
                            <!-- Заголовок опроса домашнего задания -->
                            <div class="qa-block-header">
                                <div class="qa-block-title">
                                    2. Где вы работаете?
                                </div>
                                <div class="qa-block-description">
                                    Выберите, пожалуйста, один ответ.
                                </div>
                            </div>
                            <!-- Заголовок опроса домашнего задания -->
                        </div>
                        <!-- Варианты ответа на домашнее задание -->
                        <div class="col-12">
                            <div class="qa-block-content">
                                <div class="form-check form-check-center">
                                    <input class="form-check-input" type="radio" value="1" name="question2" id="question2_1" required>
                                    <label class="form-check-label" for="question2_1">
                                        Самозанятый
                                    </label>
                                </div>
                                <div class="form-check form-check-center">
                                    <input class="form-check-input" type="radio" value="2" name="question2" id="question2_2" required>
                                    <label class="form-check-label" for="question2_2">
                                        ИП
                                    </label>
                                </div>
                                <div class="form-check form-check-center">
                                    <input class="form-check-input" type="radio" value="3" name="question2" id="question2_3" required>
                                    <label class="form-check-label" for="question2_3">
                                        Коммерческая организация
                                    </label>
                                </div>
                                <div class="form-check form-check-center">
                                    <input class="form-check-input" type="radio" value="4" name="question2" id="question2_4" required>
                                    <label class="form-check-label" for="question2_4">
                                        Некоммерческая организация
                                    </label>
                                </div>
                                <div class="form-check form-check-center">
                                    <input class="form-check-input" type="radio" value="5" name="question2" id="question2_5" required>
                                    <label class="form-check-label" for="question2_5">
                                        Государственное учреждение
                                    </label>
                                </div>
                                <div class="form-check form-check-center">
                                    <input class="form-check-input" type="radio" value="6" name="question2" id="question2_6" required>
                                    <label class="form-check-label" for="question2_6">
                                        В данный момент не трудоустроен
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Варианты ответа на домашнее задание -->
                    </div>
                </div>
            </div>
            <!-- Вопросы по домашнему заданию -->

            <!-- Поле ввода текста домашнего задания -->
            <div class="col-12">
                <div class="form-floating">
                    <div class="form-icon form-icon-info form-icon-end form-icon-start" data-popover-toggle="homeWorkText">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="20" height="20" rx="10" fill="#88FF0B" />
                            <path d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                        </svg>
                    </div>
                    <textarea rows="1" name="home_work" type="text" class="form-control form-control-bottom" id="home_work" placeholder="Домашнее задание" data-autosize="true" style="flex:1;resize:none;"></textarea>
                    <label for="home_work">Домашнее задание</label>
                </div>
            </div>
            <!-- Поле ввода текста домашнего задания -->

            <!-- Поле приклепления файла домашнего задания -->
            <div class="col-12">
                <div class="form-floating form-types form-types-file" file-group>
                    <label class="form-type-label " for="file-upload">Файл</label>
                    <input value="" name="photo" id="file-upload" type="file" class="form-control form-control-bottom">
                    <div class="form-control form-type-file form-control-bottom" file-change-name="photo">
                        <span class="file-delete" delete=""></span>
                        <a target="_blank" href="javascript://"></a>
                    </div>
                    <div class="form-icon form-icon-info form-icon-end form-icon-middle" data-popover-toggle="homeWorkFile">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="20" height="20" rx="10" fill="#88FF0B" />
                            <path d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                        </svg>
                    </div>
                </div>
            </div>
            <!-- Поле приклепления файла домашнего задания -->

            <div class="col-12">
                <div class="poll-form-agreement">
                    <div class="row row-reverse justify-content-end">

                        <!-- Карточка с подсказкой о сданных заданиях -->
                        <div class="col-12 col-lg">
                            <div class="card-hint">
                                <div class="card-hint-body">
                                    Вы не сдали задания: 1/2/3/4/5/6/7/8/9/10/11/12/13/14
                                </div>
                            </div>
                        </div>
                        <!-- Карточка с подсказкой о сданных заданиях -->

                        <!-- Кнопка отправки формы/перепрохождении формы теста -->
                        <div class="col-12 col-lg-auto">
                            <!-- if($answer) -->
                            <button type="submit" class="btn btn-primary w-100" style="display:none;">Перепройти</button>
                            <!-- else -->
                            <button type="submit" class="btn btn-primary w-100">Отправить</button>
                            <!-- endif -->
                        </div>
                        <!-- Кнопка отправки формы/перепрохождении формы теста -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>