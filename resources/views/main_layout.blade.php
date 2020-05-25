<!DOCTYPE html>
<html lang="{{Session::get('lang')}}">
@include("partials.head")

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            @include('partials.left_menu')
        </div>
        <!-- top navigation -->
            @include("partials.top_menu")
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                @yield('main')
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include("partials.footer")
        <!-- /footer content -->
    </div>
</div>

@include("partials.scripts")
@yield('scripts')

</body>
</html>