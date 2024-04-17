<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=0" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    @vite('resources/scss/app.scss')

    @yield('head')

    <title>@yield('title')</title>

    @hasSection('description')
    <meta name="description" content="@yield('description')" />
    @else
    <meta name="description" content="Ценности — основа целей, они помогают сохранять мотивацию и не идти за чужими мечтами. Этот воркшоп поможет тебе осознать свои истинные ценности, синхронизировать свои цели и сформулировать план их достижения." />
    @endif

    @hasSection('keywords')
    <meta name="keywords" content="@yield('keywords')" />
    @else
    <meta name="keywords" content="ценности, воркшоп, основа, мотивация, мечты, помощь, сознание, достижения" />
    @endif



    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Chrome -->
    <meta name="theme-color" content="#ffffff">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#ffffff">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#ffffff">

    @hasSection('image')
    <meta property="og:image" content="{{ config('app.url') }}@yield('image')">
    @else
    <meta property="og:image" content="/preview.png">
    @endif

    @yield('opengraph')
</head>