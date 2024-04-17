@vite('resources/js/app.js')

@yield('scripts')

@if (strpos($_SERVER['HTTP_HOST'], '.loc') === false && strpos($_SERVER['HTTP_HOST'], '.test') === false && strpos($_SERVER['HTTP_HOST'], 'dev.') === false && strpos($_SERVER['HTTP_HOST'], '.beget.tech') === false && (isset($_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'], 'Lighthouse') === false))
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

    ym(96965064, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/96965064" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript>
<!-- /Yandex.Metrika counter -->
@endif