@php
$itemPodcast = $i;
@endphp

@if(isset($podcast))
<div class="podcast-item">
    <div class="podcast-item-content">
        <div class="row flex-column flex-md-row">
            <div class="col-12 col-md-auto">
                <div class="podcast-item-title">
                    @if($itemPodcast == 1)
                    Красная кнопка ФКИ
                    @endif
                    @if($itemPodcast == 2)
                    Дело во мне
                    @endif
                    @if($itemPodcast == 3)
                    «По уму»
                    @endif
                    @if($itemPodcast == 4)
                    Для tech и этих
                    @endif
                    @if($itemPodcast == 5)
                    Культурная страна
                    @endif
                    @if($itemPodcast == 6)
                    The Creators
                    @endif
                </div>
            </div>
            <div class="col-12 col-md flex-xs-fill flex-sm-fill">
                <div class="podcast-item-description">
                    @if($itemPodcast == 1)
                    Телеграм-канал для креативного сообщества от Федерации креативных индустрий.
                    Самое важное и полезное для креаторов и предпринимателей: новости об антикризисных
                    законотворческих инициативах, экономических мерах поддержки, специальных программах,
                    ресурсах, которые могут заменить зарубежные сервисы, недоступные в России.
                    @endif
                    @if($itemPodcast == 2)
                    Просто и непринужденно про мышление и успех в бизнесе. Что внутри нас может помочь
                    начать бизнес и кратно вырасти. Какие убеждения, страхи и ограничения могут помешать. И
                    что со всем этим делать.
                    @endif
                    @if($itemPodcast == 3)
                    Подкаст о малом и среднем бизнесе Школы управления СКОЛКОВО. Для тех, кто
                    сомневается, чувствует в себе зачатки предпринимательства и тягу к созданию новых
                    продуктов, но не может решиться сделать первые шаги.
                    @endif
                    @if($itemPodcast == 4)
                    Какие идеи привели технологические компании к успеху, как они стали мировыми лидерами
                    и чему можно у них научиться. Например, здесь есть выпуск “Зачем становиться лидером в
                    IT”. Лидерами рождаются или становятся? С какими сложностями сталкиваются управленцы
                    в IT? Полезно послушать, даже если вы из другой сферы.
                    @endif
                    @if($itemPodcast == 5)
                    Подкаст о главных культурных и спортивных событиях – или о том, как бизнес, технологии и
                    социальная ответственность уживаются вместе. И почему это важно для всех.
                    @endif
                    @if($itemPodcast == 6)
                    Подкаст о том, как думать нестандартно и смотреть на задачи по-новому. Ведущие –
                    креаторы Александр Козлов и Анна Ягода – разбираются, что же такое креативность на
                    самом деле, и приглашают в гости людей творческих профессий.
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-auto">
                <div class="podcast-item-icon">
                    <a href="@if($itemPodcast == 1) https://t.me/redbuttonCIF @endif @if($itemPodcast == 2) https://delovomne.mave.digital/ @endif @if($itemPodcast == 3) https://www.skolkovo.ru/news/kak-stat-biznesmenom-novyj-podkast-skolkovo-po-umu/  @endif @if($itemPodcast == 4) https://pc.st/1622963255 @endif @if($itemPodcast == 5) https://pc.st/1639535097/info @endif @if($itemPodcast == 6) https://podcast.ru/1533520015/info @endif" class="stretched-link" target="_blank"></a>
                    <img data-src="/assets/images/block/recommendations/icons/arrow-right-circle.svg" class="lazyload" />
                </div>
            </div>
        </div>
    </div>
</div>
@endif