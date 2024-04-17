<!-- Форма домашнего задания -->
<form id="test" data-reset="false" action="{{ Route('course.test.answer.store') }}" class="poll-form">
    @csrf
    <input type="hidden" name="test_id" value="{{ $test->id }}">
    <div class="poll-form-qa">
        <div class="row">
            @foreach($testContents as $testContent)
            <!-- Вопросы по домашнему заданию -->
            <div class="col-12">
                <div class="qa-block" data-field>
                    <div class="row">
                        @if($testContent->type == 'poll')
                        <div class="col-12">
                            <!-- Заголовок опроса домашнего задания -->
                            <div class="qa-block-header">
                                @if($testContent->value['question'])
                                <div class="qa-block-title">
                                    {{ $loop->iteration }}. {{ $testContent->value['question'] }}
                                </div>
                                @endif
                                @if($testContent->value['description'])
                                <div class="qa-block-description">
                                    {{ $testContent->value['description'] }}
                                </div>
                                @endif
                            </div>
                            <!-- Заголовок опроса домашнего задания -->
                        </div>
                        <!-- Варианты ответа на домашнее задание -->
                        <div class="col-12">
                            <div class="qa-block-content">
                                @if($testContent->value['variants'])
                                @foreach($testContent->value['variants'] as $key => $variant)
                                <div class="form-check form-check-center">
                                    @if($testContent->value['type'] == 'radio')
                                    <input @if($variant['checked']) checked @endif class="form-check-input" type="radio" value="{{ $key }}" name="answer[{{ $testContent->value['id'] }}]" id="answer{{ $variant['id'] }}">
                                    @else
                                    <input @if($variant['checked']) checked @endif class="form-check-input" type="checkbox" value="{{ $key }}" name="answer[{{ $testContent->value['id'] }}][]" id="answer{{ $variant['id'] }}">
                                    @endif
                                    <label class="form-check-label" for="answer{{ $variant['id'] }}">
                                        {{ $variant['text'] }}
                                    </label>
                                </div>
                                @endforeach
                                @if($testContent->value['isUserVariant'])
                                <div class="form-check form-check-center">
                                    @if($testContent->value['type'] == 'radio')
                                    <input data-ov-input="{{ $variant['id'] }}_other" @if($variant['checked']) checked @endif class="form-check-input" type="{{ $testContent->value['type'] }}" value="" name="answer[{{ $testContent->value['id'] }}]" id="answer{{ $variant['id'] }}_other">
                                    @else
                                    <input data-ov-input="{{ $variant['id'] }}_other" @if($variant['checked']) checked @endif class="form-check-input" type="{{ $testContent->value['type'] }}" value="" name="answer[{{ $testContent->value['id'] }}]" id="answer{{ $variant['id'] }}_other">
                                    @endif
                                    <label class="form-check-label" for="answer{{ $variant['id'] }}_other">
                                        {{ $variant['text'] }}
                                        <input type="text" data-ov-text="{{ $variant['id'] }}_other" name="answer[{{ $testContent->value['id'] }}_other]" class="form-control form-control-bottom" />
                                    </label>
                                </div>
                                @endif
                                @endif
                            </div>
                        </div>
                        <!-- Варианты ответа на домашнее задание -->
                        @endif
                    </div>
                </div>
            </div>
            <!-- Вопросы по домашнему заданию -->
            @endforeach

            @if($test->isInputText)
            <!-- Поле ввода текста домашнего задания -->
            <div class="col-12">
                <div class="form-floating">
                    <div class="form-icon form-icon-info form-icon-end form-icon-start" data-popover-toggle="homeWorkText" style="display:none!important;" elem-hide>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="20" height="20" rx="10" fill="#88FF0B" />
                            <path d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                        </svg>
                    </div>
                    <textarea rows="1" name="text" type="text" class="form-control form-control-bottom" id="home_work" placeholder="Результат домашнего задания" data-autosize="true" style="flex:1;resize:none;">{{ $answer->text ?? '' }}</textarea>
                    <label for="home_work">Результат домашнего задания</label>
                </div>
            </div>
            <!-- Поле ввода текста домашнего задания -->
            @endif

            @if($test->isInputFile)
            <!-- Поле приклепления файла домашнего задания -->
            <div class="col-12">
                <div class="form-floating form-types form-types-file @if(isset($answer->file) && $answer->file) active @endif" file-group>
                    <label class="form-type-label @if(isset($answer->file) && $answer->file) label-up @endif" for="file-upload">Файл</label>
                    <input value="{{ $answer->file ?? '' }}" @if(isset($answer->file) && $answer->file) data-is-file="true" @endif accept="application/pdf,image/*" name="file" id="file-upload" type="file" class="form-control form-control-bottom">
                    <div class="form-control form-type-file form-control-bottom" file-change-name="file">
                        @if(isset($answer->file) && $answer->file)
                        <span class="file-delete" delete=""></span>
                        <a target="_blank" href="{{ $answer->file }}">Загруженный файл</a>
                        @endif
                    </div>
                    <div class="form-icon form-icon-info form-icon-end form-icon-middle" data-popover-toggle="homeWorkFile" style="display:none!important;" elem-hide>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="20" height="20" rx="10" fill="#88FF0B" />
                            <path d="M9.5791 12.5117L9.20312 7.2002V4.97852H10.7275V7.2002L10.3721 12.5117H9.5791ZM9.25781 15V13.5986H10.6729V15H9.25781Z" fill="#020726" />
                        </svg>
                    </div>
                </div>
            </div>
            <!-- Поле приклепления файла домашнего задания -->
            @endif

            <div class="col-12">
                <div class="poll-form-agreement">
                    <div class="row row-reverse justify-content-end">

                        <!-- Карточка с подсказкой о сданных заданиях -->
                        @if(isset($noHomeworkNumbers) && $noHomeworkNumbers)
                        <div class="col-12 col-lg">
                            <div class="card-hint">
                                <div class="card-hint-body">
                                    Вы не сдали задания: {{ implode('/', $noHomeworkNumbers) }}
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- Карточка с подсказкой о сданных заданиях -->

                        <!-- Кнопка отправки формы/перепрохождении формы теста -->
                        <div class="col-12 col-lg-auto" ajax-elem>
                            @if($answer)
                            <button type="submit" class="btn btn-primary w-100">Перепройти</button>
                            @else
                            <button type="submit" class="btn btn-primary w-100">Отправить</button>
                            @endif
                        </div>
                        <!-- Кнопка отправки формы/перепрохождении формы теста -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>