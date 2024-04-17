<!-- Карточка с оценкой ДЗ -->
<div class="valuation-card">
    <div class="valuation-card-content">
        <div class="valuation-card-header">
            <div class="row">
                <!-- Общая оценка: текущий балл из всего баллов -->
                <div class="col">
                    <div class="valuation-card-title">
                        <span class="h-6 text-green-pressed">
                            Общая оценка: <span valuation="">9</span>/10
                        </span>
                    </div>
                </div>
                <!-- Общая оценка: текущий балл из всего баллов -->
                <!-- Кнопка открытия попап оценки -->
                <div class="col-auto">
                    @if(isset($myHomeWork))
                    <!-- Оценка нашей работы: меня оценили -->
                    <button type="button" class="btn btn-lg btn-social btn-social-grey btn-icon" data-modal-open="myHomeWork">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.9362 19.7913C15.8262 19.7913 19.7904 15.8272 19.7904 10.9372C19.7904 6.04717 15.8262 2.08301 10.9362 2.08301C6.0462 2.08301 2.08203 6.04717 2.08203 10.9372C2.08203 15.8272 6.0462 19.7913 10.9362 19.7913Z" stroke="currentColor" stroke-width="1.5625" stroke-linejoin="round" style="fill:transparent!important;" />
                            <path d="M17.3047 17.3027L21.7241 21.7222" stroke="currentColor" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <!-- Оценка нашей работы: меня оценили -->
                    @else
                    <!-- Оценка чужой работы: я оценил -->
                    <button type="button" class="btn btn-lg btn-social btn-social-grey btn-icon">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.9362 19.7913C15.8262 19.7913 19.7904 15.8272 19.7904 10.9372C19.7904 6.04717 15.8262 2.08301 10.9362 2.08301C6.0462 2.08301 2.08203 6.04717 2.08203 10.9372C2.08203 15.8272 6.0462 19.7913 10.9362 19.7913Z" stroke="currentColor" stroke-width="1.5625" stroke-linejoin="round" style="fill:transparent!important;" />
                            <path d="M17.3047 17.3027L21.7241 21.7222" stroke="currentColor" stroke-width="1.5625" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <!-- Оценка чужой работы: я оценил -->
                    @endif
                </div>
                <!-- Кнопка открытия попап оценки -->
            </div>
        </div>
        <!-- Комментарий, если есть -->
        <div class="valuation-card-body">
            <div class="valuation-card-comments">
                <div class="row">
                    <!-- От кого комментарий -->
                    <div class="col-12">
                        @if(isset($myHomeWork))
                        <span class="opacity-50">
                            От ученика:
                        </span>
                        @else
                        <span class="opacity-50">
                            От вас:
                        </span>
                        @endif
                    </div>
                    <!-- От кого комментарий -->
                    <!-- От кого текст комментария -->
                    <div class="col-12 col-lg">
                        @if(isset($myHomeWork))
                        Учитывая ключевые сценарии поведения, консультация с широким активом не даёт нам иного выбора, кроме определения системы массового участия. Вот вам яркий пример современных тенденций — разбавленное изрядной долей эмпатии, рациональное мышление способствует подготовке и реализации соответствующих условий активизации. Прежде всего, сплочённость команды профессионалов способствует подготовке и реализации вывода текущих активов!
                        @else
                        Внезапно, предприниматели в сети интернет, превозмогая сложившуюся непростую экономическую ситуацию, преданы социально-демократической анафеме. В частности, высокое качество позиционных исследований является качественно новой ступенью существующих финансовых и административных условий. Для современного мира современная методология разработки предполагает независимые способы реализации вывода текущих активов.
                        @endif
                    </div>
                    <!-- От кого текст комментария -->
                    <!-- Ответить/изменить -->
                    <div class="col-12 col-lg-auto">
                        @if(isset($myHomeWork))
                        <a href="javascript://" class="link" data-modal-open="myHomeWork">Ответить</a>
                        @else
                        <a href="javascript://" class="link">Изменить</a>
                        @endif
                    </div>
                    <!-- Ответить/изменить -->
                </div>
            </div>
        </div>
        <!-- Комментарий, если есть -->
    </div>
</div>