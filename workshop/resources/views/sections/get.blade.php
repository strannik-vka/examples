<section class="section section-content section-get">
    <div class="container">
        <div class="section-get-inner">
            <div class="section-get-header">
                <div class="hr hr-dark"></div>
                <h6 class="h-6 fw-700 text-uppercase">
                    Что получаешь после программы
                </h6>
            </div>
            <div class="section-get-content">
                <div class="section-get-sites">
                    @for($i = 1; $i < 7; $i++) <!-- site-item -->
                        <div class="site-item">
                            <div class="site-item-name">
                                @if($i == 1)
                                Волшебный пинок к реализации своих желаний
                                @endif
                                @if($i == 2)
                                Заряд энергии для достижения своих целей
                                @endif
                                @if($i == 3)
                                Поймешь свои истинные цели и ценности
                                @endif
                                @if($i == 4)
                                Поймешь, как получить желаемое
                                @endif
                                @if($i == 5)
                                Узнаешь себя настоящим
                                @endif
                                @if($i == 6)
                                Научишься слышать себя, избавишься от навязанного
                                @endif
                            </div>
                            <div class="site-item-cover">
                                <div class="site-item-animation" id="animIndustry_{{$i}}"></div>
                            </div>
                        </div>
                        <!-- site-item -->
                        @endfor
                </div>
            </div>
        </div>
    </div>
</section>