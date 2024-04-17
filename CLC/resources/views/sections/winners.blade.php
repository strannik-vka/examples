@php
$winner = isset($i) ? $i : 1;
@endphp

<section class="section section-content section-winners section-winners-green" id="winners2023">
    <div class="container">
        <div class="section-winners-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
            <h4>
                Победители 2023
            </h4>
        </div>
    </div>
    <div class="section-winners-inner">
        <div class="section-winners-swiper wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
            <div class="swiper-container swiper-winner">
                <div class="swiper-wrapper">
                    @for($winner = 1; $winner < 11; $winner++) <div class="swiper-slide">
                        <div class="winner-card">
                            <a class="stretched-link" target="_blank" data-modal-open="winner-modal-{{$winner}}"></a>
                            <div class="winner-card-wrapper">
                                <img class="lazyload" data-src="/assets/images/block/winners/{{$winner}}.jpg">
                            </div>
                            <div class="winner-card-name">
                                @if($winner == 1)
                                Екатерина <br class="d-inline d-xl-none">Семенова
                                @endif
                                @if($winner == 2)
                                Анастасия <br class="d-inline d-xl-none">Еременко
                                @endif
                                @if($winner == 3)
                                Тимур <br class="d-inline d-xl-none">Багов
                                @endif
                                @if($winner == 4)
                                Елена <br class="d-inline d-xl-none">Коробейникова
                                @endif
                                @if($winner == 5)
                                Виталий <br class="d-inline d-xl-none">Тамм
                                @endif
                                @if($winner == 6)
                                Даниил <br class="d-inline d-xl-none">Бредихин
                                @endif
                                @if($winner == 7)
                                Юлия <br class="d-inline d-xl-none">Хамитова
                                @endif
                                @if($winner == 8)
                                Яна <br class="d-inline d-xl-none">Манькова
                                @endif
                                @if($winner == 9)
                                Илья <br class="d-inline d-xl-none">Орлов-Бунин
                                @endif
                                @if($winner == 10)
                                Екатерина <br class="d-inline d-xl-none">Тайлакова
                                @endif
                            </div>
                            <div class="winner-card-description">
                                @if($winner == 1)
                                «Путь героя»: от мамы в декрете до автора успешного бизнес-проекта в сфере
                                интеллектуального отдыха
                                @endif
                                @if($winner == 2)
                                «Путь героя»: от модели до рулевого индустрии моды в регионе
                                @endif
                                @if($winner == 3)
                                «Путь героя»: от начальника производственно-технического отдела в сфере строительства
                                до директора школы креативных индустрий и кинопродюсера
                                @endif
                                @if($winner == 4)
                                «Путь героя»: от вдохновленного творца к руководителю общественной отраслевой
                                организации.
                                @endif
                                @if($winner == 5)
                                «Путь героя»: от музейного сотрудника до креативного директора крупных проектов.
                                @endif
                                @if($winner == 6)
                                «Путь героя»: от студента ПТУ до генерального директора дизайн-студии, работе с
                                Ростехом, Невским торгово-промышленным комплексом, Quarzwerke и выходу в ТОП-10
                                лучших стартапов России
                                @endif
                                @if($winner == 7)
                                «Путь героя»: от роли Буратино на новогоднем представлении в Ледовом дворце Санкт-
                                Петербурга до создания международной платформы для актеров и режиссеров Casting
                                Bridge
                                @endif
                                @if($winner == 8)
                                «Путь героя»: от участия в конкурсах красоты до директора WORLD FASHION FORUM
                                RUSSIA
                                @endif
                                @if($winner == 9)
                                «Путь героя»: от капитана команды КВН до сооснователя креативных кластеров на
                                старинных производствах
                                @endif
                                @if($winner == 10)
                                «Путь героя»: от филолога до руководителя агентства креативных индустрий
                                @endif
                            </div>
                            <div class="winner-card-link">
                                <div class="btn btn-icon btn-readmore">
                                    <span class="btn-readmore-text text-lowercase" style="color:#5B657D;">подробнее</span>
                                    <img src="/assets/images/icons/card/post/readmore.svg">
                                </div>
                            </div>
                        </div>
                </div>
                @endfor
            </div>
            <div class="swiper-nav">
                <div class="row">
                    <div class="col-auto">
                        <div class="winner-btn winner-btn-prev">
                            <img data-src="/assets/images/icons/swiper/mentor/arrow-left.svg" class="lazyload">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="winner-btn winner-btn-next">
                            <img data-src="/assets/images/icons/swiper/mentor/arrow-right.svg" class="lazyload">
                        </div>
                    </div>
                    <div class="col">
                        <div class="winner-scrollbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@if(isset($winnerModal))
@for($winner = 1; $winner < 11; $winner++) <!-- Модалка победителей -->
    <div class="modal modal-author" data-modal-id="winner-modal-{{ $winner }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="modal-close" btn-close-modal></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="winner-header">
                                <div class="row g-3">

                                    <!-- Аватар спикера курса -->
                                    <div class="col-12 col-md-auto">
                                        <div class="winner-header-avatar">
                                            <img data-src="/assets/images/block/winners/{{$winner}}.jpg" class="lazyload" />
                                            @if($winner !== 3 && $winner !== 8)
                                            <div class="winner-avatar-button">
                                                <a href="@if($winner == 1) https://vk.com/ekaterina_semenova_rnd @endif @if($winner == 2) https://vk.com/anastasiaeremenko @endif @if($winner == 4) https://vk.com/korobeinikova.elena @endif @if($winner == 5) https://vk.com/vitamm @endif @if($winner == 6) https://vk.com/breddanil @endif @if($winner == 7) https://t.me/TheArtOfNetworking @endif @if($winner == 9) https://vk.com/letonazavode @endif @if($winner == 10) https://vk.com/katerinataylakova @endif" class="btn btn-social btn-social-light" target="_blank">
                                                    @if($winner !== 7)
                                                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.71451 10C3.24792 10 0.129919 6.24625 0 0H2.73829C2.82823 4.58458 4.84692 6.52653 6.44592 6.92693V0H9.02441V3.95395C10.6034 3.78378 12.2622 1.98198 12.8218 0H15.4003C14.9705 2.44244 13.1717 4.24424 11.8925 4.98498C13.1717 5.58559 15.2205 7.15716 16 10H13.1617C12.5521 8.0981 11.0332 6.62663 9.02441 6.42643V10H8.71451Z" fill="currentColor" />
                                                    </svg>
                                                    @else
                                                    <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.5507 0.132424C15.5507 0.132424 17.1233 -0.516861 16.9922 1.05998C16.9486 1.70927 16.5554 3.98177 16.2496 6.4398L15.2012 13.7211C15.2012 13.7211 15.1139 14.7878 14.3275 14.9733C13.5412 15.1588 12.3618 14.324 12.1433 14.1385C11.9686 13.9994 8.86704 11.9123 7.77492 10.892C7.46912 10.6138 7.11965 10.0572 7.81859 9.40795L12.4054 4.77021C12.9296 4.21367 13.4538 2.9151 11.2696 4.49194L5.15388 8.89782C5.15388 8.89782 4.45494 9.36158 3.14444 8.94419L0.304956 8.01664C0.304956 8.01664 -0.743463 7.32098 1.04759 6.62528C5.416 4.44553 10.7891 2.2194 15.5507 0.132424Z" fill="currentColor" />
                                                    </svg>
                                                    @endif
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Аватар спикера курса -->


                                    <!-- Основные данные спикера курса -->
                                    <div class="col-12 col-md">
                                        <div class="winner-header-content">
                                            <div class="winner-header-name">
                                                @if($winner == 1)
                                                Екатерина Семенова
                                                @endif
                                                @if($winner == 2)
                                                Анастасия Еременко
                                                @endif
                                                @if($winner == 3)
                                                Тимур Багов
                                                @endif
                                                @if($winner == 4)
                                                Елена Коробейникова
                                                @endif
                                                @if($winner == 5)
                                                Виталий Тамм
                                                @endif
                                                @if($winner == 6)
                                                Даниил Бредихин
                                                @endif
                                                @if($winner == 7)
                                                Юлия Хамитова
                                                @endif
                                                @if($winner == 8)
                                                Яна Манькова
                                                @endif
                                                @if($winner == 9)
                                                Илья Орлов-Бунин
                                                @endif
                                                @if($winner == 10)
                                                Екатерина Тайлакова
                                                @endif
                                            </div>
                                            <div class="winner-header-meo opacity-50">
                                                @if($winner == 1)
                                                г. Ростов-на-Дону/ г. Санкт-Петербург<br>
                                                Руководитель лектория «Маяк»
                                                @endif
                                                @if($winner == 2)
                                                г. Ростов-на-Дону<br>
                                                Fashion-продюсер, основатель Fabrique.A model&event group
                                                @endif
                                                @if($winner == 3)
                                                г. Черкесск<br>
                                                Директор Школы Креативных Индустрий КЧР, кинопродюсер
                                                @endif
                                                @if($winner == 4)
                                                г. Тюмень<br>
                                                Председатель Тюменского регионального отделения Союза дизайнеров России
                                                @endif
                                                @if($winner == 5)
                                                г. Петрозаводск<br>
                                                Медиадизайнер центра «Экология культуры»
                                                @endif
                                                @if($winner == 6)
                                                г. Орел<br>
                                                Основатель дизайн-студии BRED-IDEAS
                                                @endif
                                                @if($winner == 7)
                                                г. Москва<br>
                                                Сооснователь международной платформы Casting Bridge, руководитель актёрской
                                                лаборатории «Одна шестая»
                                                @endif
                                                @if($winner == 8)
                                                г. Чита<br>
                                                Директор WORLD FASHION FORUM RUSSIA и конкурса красоты TOP QUEEN
                                                @endif
                                                @if($winner == 9)
                                                г. Екатеринбург<br>
                                                Сооснователь кластера «На Заводе», программный директор фестиваля «Лето на Заводе»
                                                @endif
                                                @if($winner == 10)
                                                г. Сургут<br>
                                                руководитель агентства креативных индустрий «КУЙ»
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Основные данные спикера курса -->
                                </div>
                            </div>
                        </div>
                        <!-- О спикера курса -->
                        <div class="col-12 col-lg">
                            <div class="winner-header-text">
                                @if($winner == 1)
                                <p>
                                    «Путь героя»: от мамы в декрете до автора успешного бизнес-проекта в сфере
                                    интеллектуального отдыха.
                                </p>
                                <p>Факты:</p>
                                <ul>
                                    <li>работала промоутером в костюме кукурузы и гордится этим;</li>
                                    <li>закончила журфак в Ростове-на-Дону, после – училась в Швеции;</li>
                                    <li>когда ребенку было 4 месяца, стала предпринимателем – купила франшизу, а затем
                                        открыла свою собственную школу «F5. Школа программирования и профессий
                                        будущего»;</li>
                                    <li>формирует интеллектуальное и культурное сообщество в Ростове-на-Дону.</li>
                                </ul>
                                @endif
                                @if($winner == 2)
                                <p>«Путь героя»: от модели до рулевого индустрии моды в регионе.</p>
                                <p>Факты:</p>
                                <ul>
                                    <li>лично работала с основателем и единственным владельцем, президентом
                                        международного телеканала «FashionTV» Мишелем Адамом;</li>
                                    <li>опыт работы в индустрии моды 18 лет;</li>
                                    <li>преподаватель mindfulness медитации;</li>
                                    <li>обладает хорошей интуицией, видит потенциал событий и людей и может
                                        подсказать вектор развития.</li>
                                </ul>
                                @endif
                                @if($winner == 3)
                                <p>
                                    «Путь героя»: от начальника производственно-технического отдела в сфере строительства
                                    до директора школы креативных индустрий и кинопродюсера.
                                </p>
                                <p>Факты:</p>
                                <ul>
                                    <li>провел детство и юношество в Монголии;</li>
                                    <li>по профессии геолог;</li>
                                    <li>курировал строительство 20 интерьеров ресторанов Макдональдс в Москве и
                                        Питере, участвовал в строительстве станций метро и перегонного тоннеля между
                                        ними, строил кино-городок из декораций в Ленинских горках;</li>
                                    <li>был приглашен для настройки процессов в съемке кино, обнаружил общий со
                                        строительством подход – так нашел свой путь в киноиндустрии и креативном
                                        бизнесе.</li>
                                </ul>
                                @endif
                                @if($winner == 4)
                                <p>
                                    «Путь героя»: от вдохновленного творца к руководителю общественной отраслевой
                                    организации.
                                </p>
                                <p>Факты:</p>
                                <ul>
                                    <li>для студенческого диплома вместо стандартной разработки логотипа сделала
                                        городскую акцию, которую «купила» администрация, дважды получила первую
                                        степень Международного смотра конкурса лучших дипломных проектов по
                                        архитектуре и дизайну;</li>
                                    <li>дизайнер, шьет авторскую одежду и участвует в модных показах, среди которых
                                        Moscow Fashion Week.</li>
                                </ul>
                                @endif
                                @if($winner == 5)
                                <p>
                                    «Путь героя»: от музейного сотрудника до креативного директора крупных проектов.
                                </p>
                                <p>Факты:</p>
                                <ul>
                                    <li>в детстве играл в духовом оркестре;</li>
                                    <li>дизайнер, веб-дизайнер, креатор, музыкальный продюсер, с 2013 года развивает
                                        музыкальный проект Sense Fencer;</li>
                                    <li>учился на музееведа, где и познакомился с креативными индустриями.</li>
                                </ul>
                                @endif
                                @if($winner == 6)
                                <p>
                                    «Путь героя»: от студента ПТУ до генерального директора дизайн-студии, работе с
                                    Ростехом, Невским торгово-промышленным комплексом, Quarzwerke и выходу в ТОП-10
                                    лучших стартапов России.
                                </p>
                                <p>Факты:</p>
                                <ul>
                                    <li>бросил школу и отучился на автомеханика, не имея водительских прав;</li>
                                    <li>чтобы достичь уровня коллег, поставил себе челлендж — читать по одной книге в
                                        неделю, за четыре года прочитал больше 200 книг;</li>
                                    <li>запустил свой бизнес, увидев в ошибках компании, где работал в найме, скрытый
                                        потенциал.</li>
                                </ul>
                                @endif
                                @if($winner == 7)
                                <p>
                                    «Путь героя»: от роли Буратино на новогоднем представлении в Ледовом дворце Санкт-
                                    Петербурга до создания международной платформы для актеров и режиссеров Casting
                                    Bridge.
                                </p>
                                <p>Факты:</p>
                                <ul>
                                    <li>работала волонтером, помогала детям адаптироваться после наводнения в
                                        Крымске;</li>
                                    <li>знает башкирский, татарский, английский, французский языки, а также тактильный
                                        жестовый язык, который выучила, чтобы играть в инклюзивном спектакле
                                        «Прикасаемые» в Театре Наций;</li>
                                    <li>профессиональная актриса, встреча с Мэрил Стрип помогла ей понять, что
                                        возможно все.</li>
                                </ul>
                                @endif
                                @if($winner == 8)
                                <p>
                                    «Путь героя»: от участия в конкурсах красоты до директора WORLD FASHION FORUM
                                    RUSSIA.
                                </p>
                                <p>Факты:</p>
                                <ul>
                                    <li>прыгала с парашютом;</li>
                                    <li>ведущая мероприятий различного формата;</li>
                                    <li>видит своей миссией развивать женщин внутренне, преображая их внешне;</li>
                                    <li>организовала первый фестиваль моды в Чите.</li>
                                </ul>
                                @endif
                                @if($winner == 9)
                                <p>
                                    «Путь героя»: от капитана команды КВН до сооснователя креативных кластеров на
                                    старинных производствах.
                                </p>
                                <p>Факты:</p>
                                <ul>
                                    <li>обучался на коуча;</li>
                                    <li>совершил кругосветное путешествие автостопом;</li>
                                    <li>открыл школу ведущих в Екатеринбурге, которая для многих стала стартом в
                                        профессии;</li>
                                    <li>соавтор продуктовой лаборатории «Антихрупкость» по созданию актуальных и
                                        конкурентноспособных изделий из фарфора.</li>
                                </ul>
                                @endif
                                @if($winner == 10)
                                <p>
                                    «Путь героя»: от филолога до руководителя агентства креативных индустрий.
                                </p>
                                <p>Факты:</p>
                                <ul>
                                    <li>от скуки прошла стажировку во МХАТе;</li>
                                    <li>набоковед, писала научные работы, делала лингвистические открытия;</li>
                                    <li>посетила 20 стран, более 100 городов;</li>
                                    <li>создатель и вдохновитель проекта «Обская кузница» в Сургуте, которая
                                        объединяет различных мастеров по металлу, дереву, коже, кости.</li>
                                </ul>
                                @endif
                            </div>
                        </div>
                        <!-- О спикера курса -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endfor
    @endisset