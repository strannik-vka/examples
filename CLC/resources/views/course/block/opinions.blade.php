<!-- Форма опроса по курсу -->
<form id="opinionForm" @if($OpinionAnswer) readonly="readonly" @endif data-reset="false" action="{{ route('course.opinion.store') }}" class="poll-form">
    @csrf
    <input type="hidden" name="course_id" value="{{ $course->id }}">
    <div class="poll-form-qa">
        <div class="row" ajax-elem>
            <!-- Поле ввода текста опроса по курсу. Удалено из макета -->
            <div class="col-12" style="display: none !important;" elem-hide>
                <div class="form-floating">
                    <textarea rows="1" name="opinion" type="text" class="form-control form-control-bottom" id="opinion" placeholder="Ваше мнение" data-autosize="true" style="flex:1;resize:none;"></textarea>
                    <label for="opinion">Ваше мнение</label>
                </div>
            </div>
            <!-- Поле ввода текста опроса по курсу. Удалено из макета -->

            @if($answerFields)
            <div class="col-12">
                <div class="section-main-title" style="margin:0;">
                    Поделись своим мнением о курсе
                </div>
            </div>

            @foreach($answerFields as $answerField)
            <div class="col-12">
                <div class="qa-block @if(App\Helpers\OpinionHelper::isHorizontalVariants($answerField)) qa-block-horizontal @endif">
                    <div class="row" data-field>
                        <!-- Вопрос -->
                        <div class="col-12">
                            <div class="qa-block-header">
                                <div class="qa-block-title">
                                    {{ $loop->iteration }}. {{ $answerField->value['question'] }}
                                </div>
                                <div class="qa-block-description">
                                    {{ $answerField->value['description'] }}
                                </div>
                            </div>
                        </div>

                        @if($answerField->value['variants'])
                        <!-- Варианты ответа -->
                        <div class="col-12">
                            <div class="qa-block-content">
                                @if(App\Helpers\OpinionHelper::isHorizontalVariants($answerField))
                                <div class="text-5 opacity-50">
                                    1
                                </div>
                                @endif
                                @if($answerField->value['variants'])
                                @foreach($answerField->value['variants'] as $key => $variant)
                                <div class="form-check form-check-center">
                                    @if($answerField->value['type'] == 'radio')
                                    <input @if($variant['checked']) checked @endif class="form-check-input" type="radio" value="{{ $key }}" name="answer_data[{{ $answerField->value['id'] }}]" id="answer_data{{ $variant['id'] }}">
                                    @else
                                    <input @if($variant['checked']) checked @endif class="form-check-input" type="checkbox" value="{{ $key }}" name="answer_data[{{ $answerField->value['id'] }}]" id="answer_data{{ $variant['id'] }}">
                                    @endif
                                    <label class="form-check-label" for="answer_data{{ $variant['id'] }}">
                                        {{ $variant['text'] }}
                                    </label>
                                </div>
                                @endforeach
                                @endif
                                @if(App\Helpers\OpinionHelper::isHorizontalVariants($answerField))
                                <div class="text-5 opacity-50">
                                    5
                                </div>
                                @endif
                            </div>
                        </div>
                        @elseif($answerField->value['isUserVariant'])
                        <!-- Поле ввода -->
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea rows="1" name="answer_data[{{ $answerField->value['id'] }}]" type="text" class="form-control form-control-bottom" id="answer_data{{ $answerField->value['id'] }}_other" placeholder="Ответ" data-autosize="true" style="flex:1;resize:none;">{{ $answerField->value['value'] }}</textarea>
                                <label for="answer_data{{ $answerField->value['id'] }}_other">Ответ</label>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            @endif

            @if($userFields)
            <!-- Блок: расскажи о себе -->
            <div class="col-12">
                <span class="section-main-title">
                    Расскажите о себе
                </span>
            </div>

            @foreach($userFields as $userField)
            <div class="col-12" data-field-parent>
                <div class="qa-block" data-valid-group>
                    <div class="row" data-field>
                        <!-- Вопрос -->
                        <div class="col-12">
                            <div class="qa-block-header">
                                <div class="qa-block-title">
                                    {{ $loop->iteration }}. {{ $userField->value['question'] }}
                                </div>
                                @if(strpos($userField->value['question'], 'индустр') === false)
                                <div class="qa-block-description">
                                    {{ strpos($userField->value['question'], 'егион') !== false ? 'Начните вводить текст' : '' }}
                                </div>
                                @endif
                            </div>
                        </div>

                        @if($userField->value['variants'])
                        <!-- Варианты ответа -->
                        <div class="col-12">
                            <div class="qa-block-content">
                                @if($userField->value['variants'])
                                @foreach($userField->value['variants'] as $key => $variant)
                                <div class="form-check form-check-center">
                                    @if($userField->value['type'] == 'radio')
                                    <input @if($variant['checked']) checked @endif class="form-check-input" type="radio" value="{{ $key }}" name="user_data[{{ $userField->value['id'] }}]" id="user_data{{ $variant['id'] }}">
                                    @else
                                    <input @if($variant['checked']) checked @endif class="form-check-input" type="checkbox" value="{{ $key }}" name="user_data[{{ $userField->value['id'] }}]" id="user_data{{ $variant['id'] }}">
                                    @endif
                                    <label class="form-check-label" for="user_data{{ $variant['id'] }}">
                                        {{ $variant['text'] }}
                                    </label>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        @elseif(strpos($userField->value['question'], 'индустр') !== false)
                        <div class="col-12">
                            <div class="form-floating form-floating-list" data-popover-toggle="myindustries">
                                <input data-valid-input="user_data[{{ $userField->value['id'] }}][]" readonly type="text" class="form-control form-control-bottom" id="field_industries" placeholder="{{ $userField->value['question'] }}">
                                <label for="field_industries">{{ $userField->value['question'] }}</label>
                                <div class="form-icon form-icon-dropdown form-icon-end form-icon-middle" id="portfolio-btn">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.4">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill="#020726" />
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        @elseif($userField->value['isUserVariant'])
                        <!-- Поле ввода -->
                        <div class="col-12">
                            <div class="form-floating">
                                @if(strpos($userField->value['question'], 'ФИО') !== false)
                                <textarea rows="1" name="user_data[{{ $userField->value['id'] }}]" type="text" class="form-control form-control-bottom" id="user_data{{ $userField->value['id'] }}_other" placeholder="Ответ" data-autosize="true" style="flex:1;resize:none;">{{ request()->user()->name }}</textarea>
                                @else
                                <textarea @if(strpos($userField->value['question'], 'егион') !== false) data-region @endif rows="1" name="user_data[{{ $userField->value['id'] }}]" type="text" class="form-control form-control-bottom" id="user_data{{ $userField->value['id'] }}_other" placeholder="Ответ" data-autosize="true" style="flex:1;resize:none;">{{ $userField->value['value'] }}</textarea>
                                @endif
                                <label for="user_data{{ $userField->value['id'] }}_other">Ответ</label>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- сферы деятельности -->
                    @if(strpos($userField->value['question'], 'индустр') !== false)
                    <div class="popover popover-list popover-list-check" id="myindustries">
                        <div class="popover-body">
                            <div class="row g-3">
                                @foreach($industries_chunks as $chunk)
                                <div class="col-12 col-md-6">
                                    <div class="row g-3">
                                        @foreach($chunk as $sphere)
                                        <div class="col-12">
                                            <div class="form-check form-check-center h-100">
                                                <input @if(is_array($userField->value['value']) && in_array($sphere['id'], $userField->value['value'])) checked @endif name="user_data[{{ $userField->value['id'] }}][]" class="form-check-input" type="checkbox" value="{{ $sphere['id'] }}" id="industries_{{ $sphere['id'] }}">
                                                <label class="form-check-label" for="industries_{{ $sphere['id'] }}">
                                                    {{ $sphere['name'] }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-12 d-block d-md-none">
                                    <button type="button" class="btn btn-primary w-100" popper-close>Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
            @endif

            @if(!$OpinionAnswer)
            <!-- Согласие на обработку -->
            <div class="col-12" data-is-answer-hide>
                <div class="qa-block">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-check form-check-center">
                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked required>
                                <label class="form-check-label opacity-50" for="flexCheckChecked">
                                    Даю согласие на публикацию этого отзыва <br class="d-inline d-md-none">на сайте проекта, <br class="d-none d-md-inline">
                                    в социальных сетях <br class="d-inline d-md-none">организаторов и партнеров проекта
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12" data-is-answer-hide>
                <div class="poll-form-agreement">
                    <div class="row justify-content-end">

                        <!-- Кнопка отправки формы/перепрохождении формы теста -->
                        <div class="col-12 col-lg-auto">
                            <button type="submit" class="btn btn-primary w-100">Отправить</button>
                        </div>
                        <!-- Кнопка отправки формы/перепрохождении формы теста -->

                    </div>
                </div>
            </div>
            @else
            <div class="col-12">
                <div class="poll-form-agreement">
                    <div class="row justify-content-end">

                        <!-- Кнопка отправки формы/перепрохождении формы теста -->
                        <div class="col-12 col-lg-auto">
                            <a href="{{ Route('course.certificate.show', $course->id) }}" class="btn btn-primary w-100">Скачать сертификат</a>
                        </div>
                        <!-- Кнопка отправки формы/перепрохождении формы теста -->

                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</form>