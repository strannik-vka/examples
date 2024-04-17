<div class="grade-status">
    @if(isset($myHomeWork))
    @if(isset($process))
    <!-- Мое ДЗ уже в процессе оценки -->
    <div class="row">
        <div class="col-12 col-lg-auto">
            <div class="grade-status-content">
                <!-- Заголовок текущего статуса -->
                <div class="grade-status-title">
                    Ваше д/з <br>
                    в процессе оценки
                </div>
                <!-- Заголовок текущего статуса -->
                <!-- Описание текущего статуса -->
                <div class="grade-status-description">
                    Мы оповестим вас, когда ученики <br>
                    оценят вашу работу, а пока вы можете <br>
                    перейти к следующему уроку
                </div>
                <!-- Описание текущего статуса -->
            </div>
        </div>
        <!-- Иконка текущего статуса -->
        <div class="col-12 col-lg">
            <div class="grade-status-icon">
                <img data-src="/assets/images/pages/course/grade/status/process.svg" class="lazyload" />
            </div>
        </div>
        <!-- Иконка текущего статуса -->
    </div>
    @else
    <!-- Мое ДЗ еще не в процессе оценки -->
    <div class="row">
        <div class="col-12 col-lg-auto">
            <div class="grade-status-content">
                <!-- Заголовок текущего статуса -->
                <div class="grade-status-title">
                    Тут появится оценка <br>
                    вашего домашнего задания
                </div>
                <!-- Заголовок текущего статуса -->
                <!-- Описание текущего статуса -->
                <div class="grade-status-description">
                    Изучите урок и сдайте задание, чтобы <br>
                    получить продвинутый сертификат
                </div>
                <!-- Описание текущего статуса -->
            </div>
        </div>
        <!-- Иконка текущего статуса -->
        <div class="col-12 col-lg">
            <div class="grade-status-icon">
                <img data-src="/assets/images/pages/course/grade/status/empty.svg" class="lazyload" />
            </div>
        </div>
        <!-- Иконка текущего статуса -->
    </div>
    @endif
    @else
    <!-- Я еще не оценивал ДЗ других учеников -->
    <div class="row">
        <div class="col-12 col-lg-auto">
            <div class="grade-status-content">
                <!-- Заголовок текущего статуса -->
                <div class="grade-status-title">
                    Вы еще не оценили <br>
                    д/з учеников
                </div>
                <!-- Заголовок текущего статуса -->
                <!-- Описание текущего статуса -->
                <div class="grade-status-description">
                    Вам откроется оценка работ других <br>
                    учеников, после того, как вы сдадите <br>
                    домашнее задание в этом уроке
                </div>
                <!-- Описание текущего статуса -->
            </div>
        </div>
        <!-- Иконка текущего статуса -->
        <div class="col-12 col-lg">
            <div class="grade-status-icon">
                <img data-src="/assets/images/pages/course/grade/status/notrated.svg" class="lazyload" />
            </div>
        </div>
        <!-- Иконка текущего статуса -->
    </div>
    @endif
</div>