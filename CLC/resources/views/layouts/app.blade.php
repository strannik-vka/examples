<!DOCTYPE html>
<html class="no-js" lang="ru">

@include('layouts.head')

<body>
    <div class="wrapper">

        @include('layouts.header')
        @include('layouts.mobile-menu')

        <main class="content">
            @yield('content')
        </main>

        @include('layouts.footer')

    </div>
    @include('layouts.modals')
    @include('layouts.hints')
    @include('layouts.search')
    @include('layouts.scripts')

</body>

</html>