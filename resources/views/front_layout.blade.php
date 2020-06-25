<!DOCTYPE html>
<html lang="tr">
@include("partials.head")
@yield('css')
<body>
@include("partials.nav")
@yield('main')
@include("partials.footer")
@include("partials.scripts")
@yield('scripts')


@include("partials.modals")
</body>
</html>