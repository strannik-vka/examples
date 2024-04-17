<!DOCTYPE html>
<html class="no-js" lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=0" />
    <meta name="apple-mobile-web-app-capable" content="yes">

    <title>Лагерь креативных лидеров</title>
    <meta name="description" content="Лагерь креативных лидеров - Образовательный проект, направленный на формирование лидерского мышления." />

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#682EE">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#682EE">

    <meta property="og:image" content="/preview.png">

    @vite('resources/scss/app.scss')
    @vite('resources/scss/pages/plug.scss')
    <!-- head -->
</head>

<body>
    <div class="wrapper">

        <!-- header -->

        <main class="content">
            <section class="section section-plug">
                <div class="container h-100">
                    <div class="section-plug-inner">
                        <div class="section-plug-logotypes">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="animatedElem">
                                        <a href=" {{ Route('plug') }}">
                                            <img data-src="/assets/images/logotypes/logo.svg" class="lazyload infiniteRotation">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="animatedElem">
                                        <a href="https://xn--80aeeqaabljrdbg6a3ahhcl4ay9hsa.xn--p1ai/" target="_blank">
                                            <img data-src="/assets/images/partners/pfki.svg" class="lazyload">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="animatedElem">
                                        <a href="https://creative-way.ru/" target="_blank">
                                            <img data-src="/assets/images/partners/creative-way.svg" class="lazyload">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-plug-title animatedElem">
                            <h2>
                                Лагерь <br>
                                креативных <br>
                                лидеров
                            </h2>
                        </div>
                        <div class="section-plug-text animatedElem">
                            <span class="text-6">
                                Сообщество профессионалов. <br>
                                Образовательная программа для развития <br>
                                навыков достижения результата. <br class="d-inline d-xl-none">Наставничество.
                            </span>
                        </div>
                        <div class="section-plug-form">
                            @include('blocks.form-plug')
                        </div>
                        <div class="section-plug-social animatedElem">
                            <a href="https://vk.com/creativeleaders_camp" class="btn btn-outline-dark btn-social rounded-pill" target="_blank">
                                <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.71451 10C3.24792 10 0.129919 6.24625 0 0H2.73829C2.82823 4.58458 4.84692 6.52653 6.44592 6.92693V0H9.02441V3.95395C10.6034 3.78378 12.2622 1.98198 12.8218 0H15.4003C14.9705 2.44244 13.1717 4.24424 11.8925 4.98498C13.1717 5.58559 15.2205 7.15716 16 10H13.1617C12.5521 8.0981 11.0332 6.62663 9.02441 6.42643V10H8.71451Z" fill="#020726" />
                                </svg>
                            </a>
                        </div>
                        <div class="section-plug-date animatedElem">
                            <span class="text-7">
                                <?php echo date('Y') ?>
                            </span>
                        </div>
                    </div>
                </div>
            </section>

            @include('blocks.screensaver')
        </main>

    </div>
    <!-- scripts -->
    @vite('resources/js/plug.js')

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(93449145, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/93449145" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</body>

</html>