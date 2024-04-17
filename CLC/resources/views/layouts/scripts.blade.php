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
<!-- Top.Mail.Ru counter -->
<script type="text/javascript">
   var _tmr = window._tmr || (window._tmr = []);
   _tmr.push({
      id: "3355930",
      type: "pageView",
      start: (new Date()).getTime()
   });
   (function(d, w, id) {
      if (d.getElementById(id)) return;
      var ts = d.createElement("script");
      ts.type = "text/javascript";
      ts.async = true;
      ts.id = id;
      ts.src = "https://top-fwz1.mail.ru/js/code.js";
      var f = function() {
         var s = d.getElementsByTagName("script")[0];
         s.parentNode.insertBefore(ts, s);
      };
      if (w.opera == "[object Opera]") {
         d.addEventListener("DOMContentLoaded", f, false);
      } else {
         f();
      }
   })(document, window, "tmr-code");
</script>
<noscript>
   <div><img src="https://top-fwz1.mail.ru/counter?id=3355930;js=na" style="position:absolute;left:-9999px;" alt="Top.Mail.Ru" /></div>
</noscript>
<!-- /Top.Mail.Ru counter -->
@endif