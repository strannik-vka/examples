<section class="section section-content section-subject">
    <div class="section-subject-content wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="subject-block">
            <div class="subject-block-stage">
                @foreach(['Санкт-Петербург', 'Казань', 'Санкт-Петербург', 'Казань', 'Санкт-Петербург', 'Казань', 'Санкт-Петербург', 'Казань', 'Санкт-Петербург', 'Казань'] as $city)
                @include('blocks.subject-item')
                @endforeach
                <div class="subject-block-item">
                    <div class="subject-block-name">
                        <span class="text-green">Очный интенсив - Москва</span>
                    </div>
                </div>
                @foreach(['Санкт-Петербург', 'Казань', 'Санкт-Петербург', 'Казань', 'Санкт-Петербург', 'Казань', 'Санкт-Петербург', 'Казань', 'Санкт-Петербург', 'Казань'] as $city)
                @include('blocks.subject-item')
                @endforeach
            </div>
            <div class="subject-block-stage">
                @foreach(['Владивосток', 'Тверь', 'Волгоград', 'Владивосток', 'Тверь', 'Волгоград', 'Владивосток', 'Тверь', 'Волгоград', 'Владивосток', 'Тверь', 'Волгоград'] as $city)
                @include('blocks.subject-item')
                @endforeach
                <div class="subject-block-item">
                    <div class="subject-block-name">
                        <span class="text-green">Очный интенсив - Ульяновск</span>
                    </div>
                </div>
                @foreach(['Владивосток', 'Тверь', 'Волгоград', 'Владивосток', 'Тверь', 'Волгоград', 'Владивосток', 'Тверь', 'Волгоград', 'Владивосток', 'Тверь', 'Волгоград'] as $city)
                @include('blocks.subject-item')
                @endforeach
            </div>
            <div class="subject-block-stage">
                @foreach(['Тюмень', 'Саратов', 'Киров', 'Ярославль', 'Тюмень', 'Саратов', 'Киров', 'Ярославль', 'Тюмень', 'Саратов', 'Киров', 'Ярославль'] as $city)
                @include('blocks.subject-item')
                @endforeach
                <div class="subject-block-item">
                    <div class="subject-block-name">
                        <span class="text-green">Очный интенсив - Тюмень</span>
                    </div>
                </div>
                @foreach(['Тюмень', 'Саратов', 'Киров', 'Ярославль', 'Тюмень', 'Саратов', 'Киров', 'Ярославль', 'Тюмень', 'Саратов', 'Киров', 'Ярославль'] as $city)
                @include('blocks.subject-item')
                @endforeach
            </div>
            <div class="subject-block-stage">
                @foreach(['Тюмень', 'Сочи', 'Тула', 'Калининград', 'Тюмень', 'Сочи', 'Тула', 'Калининград', 'Тюмень', 'Сочи', 'Тула', 'Калининград'] as $city)
                @include('blocks.subject-item')
                @endforeach
                <div class="subject-block-item">
                    <div class="subject-block-name">
                        <span class="text-green">Очный интенсив - Красноярск</span>
                    </div>
                </div>
                @foreach(['Тюмень', 'Сочи', 'Тула', 'Калининград', 'Тюмень', 'Сочи', 'Тула', 'Калининград', 'Тюмень', 'Сочи', 'Тула', 'Калининград'] as $city)
                @include('blocks.subject-item')
                @endforeach
            </div>
        </div>
    </div>
</section>