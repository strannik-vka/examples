@if(count($criterions) > 0)
<form id="score_form" class="score-block" action="{{ Route('evaluation.update', $project->id) }}">
    <div class="score-block-content">

        @foreach($criterions as $criterion)
        <div class="score-block-stripe row justify-content-between">
            <div class="col score-block-name">
                <div for="score-1" class="score-block-nomination">{{ $criterion->name }}</div>
            </div>
            <div class="col score-block-val">
                <div class="score-group w-100" data-score-group>
                    <input name="criterions[{{ $criterion->id }}]" class="form-type-score w-100 opacity-30" type="text" @if(isset($evaluation->criterions[$criterion->id]))
                    value="{{ $evaluation->criterions[$criterion->id] }}"
                    @else
                    value="0/10"
                    @endif>
                    <button type="button" class="btn-score btn-score-up" data-score-plus></button>
                    <button type="button" class="btn-score btn-score-down" data-score-minus></button>
                </div>
            </div>
        </div>
        @endforeach

        <div class="score-block-stripe row justify-content-between">
            <div class="col-6 d-flex align-items-center">
                <div class="score-block-nomination">
                    Суммарный балл
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-5 d-flex align-items-center justify-content-center">
                <span class="form-val-score text-blue opacity-30" data-score-total>{{ $evaluation->total ?? '0' }}</span>
            </div>
        </div>
    </div>
    <div class="score-block-footer">
        <div class="row">
            <div class="col-12">
                <div class="score-block-comment">
                    <div class="form-floating">
                        <textarea name="comment" id="comment" rows="1" class="form-control form-control-bottom w-100 overflow-hidden" placeholder="Комментарий для оценочного листа" style="appearance: none;" data-autosize>{{ $evaluation->comment }}</textarea>
                        <label for="comment">Комментарий для оценочного листа</label>
                    </div>
                </div>
            </div>
            @if($evaluation->completed)
            <div class="col-12">
                <button type="submit" disabled class="btn btn-primary w-100">Вы уже оценили эту заявку</button>
            </div>
            @else
            <div class="col-12">
                <button type="submit" class="btn btn-primary w-100">Отправить оценку</button>
            </div>
            @endif
        </div>
    </div>
</form>
@endif