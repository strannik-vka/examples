@php
$itemInspiration = $i;
@endphp

@if(isset($inspiration))
<div class="inspiration-item">
    <div class="inspiration-item-content">
        <div class="row flex-column flex-md-row">
            <div class="col-12 col-md-auto">
                <div class="inspiration-item-title">
                    @if($itemInspiration == 1)
                    Telegram-канал «Креативность сто один»
                    @endif
                    @if($itemInspiration == 2)
                    Telegram-канал «Эксплойт»
                    @endif
                    @if($itemInspiration == 3)
                    vc.ru
                    @endif
                    @if($itemInspiration == 4)
                    producthunt.com
                    @endif
                    @if($itemInspiration == 5)
                    dandad.org
                    @endif
                    @if($itemInspiration == 6)
                    Pinterest
                    @endif
                    @if($itemInspiration == 7)
                    Универгения.рф
                    @endif
                </div>
            </div>
            <div class="col-12 col-md flex-xs-fill flex-sm-fill">
                <div class="inspiration-item-description">
                    @if($itemInspiration == 1)
                    Автор — Ветас Разносторонний, автор нескольких книг о развитии креативности,
                    рассказывает о том, откуда берется творчество и как его можно прокачивать. Интересные
                    факты, книги, упражнения и разборы случаев.
                    @endif
                    @if($itemInspiration == 2)
                    Медиа об интернет-культуре и технологиях.
                    @endif
                    @if($itemInspiration == 3)
                    Крупнейшая в рунете платформа для предпринимателей и высококвалифицированных
                    специалистов малых, средних и крупных компаний.
                    @endif
                    @if($itemInspiration == 4)
                    Портал о новинках и последних мобильных приложениях, веб-сайтах, аппаратных
                    проектах и технических творениях.
                    @endif
                    @if($itemInspiration == 5)
                    Здесь собраны проекты в области дизайна, рекламы, продакшна и креативных индустрий.
                    @endif
                    @if($itemInspiration == 6)
                    Визуальный инструмент для поиска идей и вдохновения.
                    @endif
                    @if($itemInspiration == 7)
                    Просветительский сайт про креативные индустрии для широкой аудитории. Посвящен материалам проекта «Гений места».
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif