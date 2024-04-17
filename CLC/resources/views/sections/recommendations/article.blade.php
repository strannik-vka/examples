@php
$itemArticle = $i;
@endphp

@if(isset($article))
<div class="article-item">
    <a href="javascript://" class="stretched-link"></a>
    <div class="row">
        <div class="col-12">
            <div class="article-item-picture">
                <img data-src="/assets/images/block/recommendations/article/demo.png" class="lazyload" />
            </div>
        </div>
        <div class="col-12">
            <div class="article-item-content">
                <div class="article-item-title">
                    @if($itemArticle == 1)
                    Франция намерена исследовать, почему в провинциях ещё есть чем поживиться
                    @endif
                    @if($itemArticle == 2)
                    Прототип нового сервиса — это как гитарный перебор
                    @endif
                    @if($itemArticle == 3)
                    Курс на социально-ориентированный национальный проект так же органично вписывается в наши планы
                    @endif
                    @if($itemArticle == 4)
                    Свободу слова не задушить, пусть даже склады ломятся от зерна
                    @endif
                    @if($itemArticle == 5)
                    Внезапно, парад бытовой техники оказался началом великой войны
                    @endif
                    @if($itemArticle == 6)
                    Не следует забывать, что кровь стынет в жилах
                    @endif
                    @if($itemArticle == 7)
                    Базовый вектор развития оправдал надежды граждан
                    @endif
                </div>
                <div class="article-item-description">
                    @if($itemArticle == 1)
                    Современные технологии достигли такого уровня, что понимание сути ресурсосберегающих технологий является качественно новой ступенью анализа существующих паттернов поведения.
                    @endif
                    @if($itemArticle == 2)
                    Равным образом, повышение уровня гражданского сознания требует анализа распределения внутренних резервов и ресурсов.
                    @endif
                    @if($itemArticle == 3)
                    Но стремящиеся вытеснить традиционное производство, нанотехнологии, которые представляют собой яркий пример континентально-европейского типа политической культуры, будут ограничены исключительно образом мышления.
                    @endif
                    @if($itemArticle == 4)
                    Мы вынуждены отталкиваться от того, что курс на социально-ориентированный национальный проект влечет за собой процесс внедрения и модернизации анализа существующих паттернов поведения.
                    @endif
                    @if($itemArticle == 5)
                    Наше дело не так однозначно, как может показаться: семантический разбор внешних противодействий предопределяет высокую востребованность вывода текущих активов.
                    @endif
                    @if($itemArticle == 6)
                    Учитывая ключевые сценарии поведения, высококачественный прототип будущего проекта прекрасно подходит для реализации системы обучения кадров, соответствующей насущным потребностям.
                    @endif
                    @if($itemArticle == 7)
                    Следует отметить, что повышение уровня гражданского сознания предопределяет высокую востребованность экспериментов, поражающих по своей масштабности и грандиозности.
                    @endif
                </div>
                <div class="article-item-button">
                    <div class="btn btn-icon btn-readmore">
                        <span class="btn-readmore-text">Читать</span>
                        <img src="/assets/images/icons/card/post/readmore.svg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif