@php
$itemFilm = isset($i) ? $i : 1;

$itemFilmFilters = [
'item' => [
['id' => 1, 'name' => 'Про великие бизнесы и их основателей'],
['id' => 2, 'name' => 'Что смотреть тем, кто хочет научиться <br>говорить красиво'],
]
];
@endphp

@if(isset($film))
<div class="film-item" @if($itemFilm==1 || $itemFilm==2 || $itemFilm==3) data-film-type="film_type:1" @endif @if($itemFilm==4 || $itemFilm==5 || $itemFilm==6 || $itemFilm==7 || $itemFilm==8) data-film-type="film_type:2" @endif>
    <a href="javascript://" class="stretched-link" data-rec-open></a>
    <div class="row">
        <div class="col-12 col-md-auto">
            <div class="film-item-picture">
                <img data-src="/assets/images/block/recommendations/films/film-{{ $itemFilm }}.png?v=2" class="lazyload" />
            </div>
        </div>
        <div class="col-12 col-md">
            <div class="film-item-content">
                <div class="row">
                    <div class="col-12">
                        <div class="film-item-title">
                            @if($itemFilm == 1)
                            Air: Большой прыжок
                            @endif
                            @if($itemFilm == 2)
                            Харли и братья Дэвидсон
                            @endif
                            @if($itemFilm == 3)
                            Основатель
                            @endif
                            @if($itemFilm == 4)
                            Король говорит!
                            @endif
                            @if($itemFilm == 5)
                            Ларри Краун
                            @endif
                            @if($itemFilm == 6)
                            Начало
                            @endif
                            @if($itemFilm == 7)
                            Сериал «Безумцы»
                            @endif
                            @if($itemFilm == 8)
                            Опасная игра Слоун
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="film-item-author">
                            @if($itemFilm == 1)
                            Про риск и веру в себя
                            @endif
                            @if($itemFilm == 2)
                            Про несгибаемость
                            @endif
                            @if($itemFilm == 3)
                            Про глобальное видение
                            @endif
                            @if($itemFilm == 4)
                            режиссер Том Хупер
                            @endif
                            @if($itemFilm == 5)
                            режиссер Том Хэнкс
                            @endif
                            @if($itemFilm == 6)
                            режиссер Кристофер Нолан
                            @endif
                            @if($itemFilm == 7)
                            Создатель: Мэттью Вайнер
                            @endif
                            @if($itemFilm == 8)
                            режиссер Джон Мэдден
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="film-item-description">
                            @if($itemFilm == 1)
                            Сюжет фильма построен на истории сделки Nike с восходящей звездой NBA Майклом
                            Джорданом. <br>
                            1980-е. Nike серьезно проигрывает конкурентам – Adidas и Converse. Молодой Джордан
                            любит Adidas и терпеть не может Nike. В успех этой затеи не верит никто из профессионалов
                            рынка. Но глава баскетбольного отдела компании решает рискнуть и подписать контракт.
                            Проявив упорство и волю к победе, не пасуя перед отказами, метко аргументируя к
                            ценностям оппонента.
                            @endif
                            @if($itemFilm == 2)
                            3-х серийный фильм рассказывает про людей, стоявших у истоков: Уильяма
                            Харли и 3-х братьев Дэвидсон. Как они начинали в гараже, как преодолевали сложности, как
                            распределяли ответственность и договаривались друг с другом. Для предпринимателей
                            фильм – иллюстрация того, что даже когда агрессивная среда пытается уничтожить твой
                            бизнес, можно выбрать путь к успеху и не сдаваться.
                            @endif
                            @if($itemFilm == 3)
                            История становления McDonald`s. Фильм – пример кейса материализации мечты.
                            Рей Крок искал инновационную бизнес-идею, которая покорит всю Америку. К своим 52
                            годам он уже перепробовал множество продуктов, но ни один на тот момент не взлетел. За
                            эти годы он исколесил Америку вдоль и поперек и регулярно ел в придорожных
                            забегаловках. Он был искушенным клиентом и сразу увидел потенциал масштабирования в
                            том, что придумали братья МакДональд.
                            @endif
                            @if($itemFilm == 4)
                            Как поверить в себя, как работать с психологическими и физиологическими
                            зажимами. Король смог, сможем и мы!
                            @endif
                            @if($itemFilm == 5)
                            Том Хэнкс показывает, что с любым бэкграундом, любой профессией и в любом
                            возрасте можно научиться логично и красиво говорить. А Джулия Робертс плохому не
                            научит!
                            @endif
                            @if($itemFilm == 6)
                            Пример того, как с помощью презентаций мы передаём и продаём свои идеи.
                            Задача героев – поселить в голове у человека идею. Один из способов достичь этой цели – это
                            погрузить человека в атмосферу, увлечь в детализированную историю. Это ли не прекрасный
                            пример хорошей просторечной презентации!
                            @endif
                            @if($itemFilm == 7)
                            Здесь в центре нашего внимания презентации Дональда Дрейпера – креативного
                            директора рекламного Агентства «Стерлинг-Купер», расположенного на престижной
                            Медисон-авеню в центре Нью-Йорка.
                            @endif
                            @if($itemFilm == 8)
                            Описание: Джессика Честен и институт лоббирования. Весь фильм построен на
                            коммуникативных трюках: психологические игры, искусство предсказывать шаги оппонента,
                            действовать на опережение.
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if(isset($filmFilter))
<div id="films" class="popover popover-recommendations">
    <div class="popover-body">
        <form class="input-box-list-row row g-3">
            @foreach($itemFilmFilters['item'] as $itemFilmFilter)
            <!-- Фильтр книг -->
            <div class="col-12">
                <div class="form-check form-check-center">
                    <input value="film_type:{{ $itemFilmFilter['id'] }}" class="form-check-input" type="radio" name="sort_film" id="film_{{ $itemFilmFilter['id'] }}">
                    <label class="form-check-label" for="film_{{ $itemFilmFilter['id'] }}">
                        {!! Arr::get($itemFilmFilter, 'name') !!}
                    </label>
                </div>
            </div>
            <!-- Фильтр книг -->
            @endforeach
        </form>
    </div>
</div>
@endif