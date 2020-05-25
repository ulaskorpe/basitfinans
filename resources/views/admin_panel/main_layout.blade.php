<!DOCTYPE html>
<html lang="{{Session::get('lang')}}">
@include("admin_panel.partials.head")

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            @include('admin_panel.partials.left_menu')
        </div>
        <!-- top navigation -->
            @include("admin_panel.partials.top_menu")
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                @yield('main')
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include("admin_panel.partials.footer")
        <!-- /footer content -->
    </div>
</div>

@include("admin_panel.partials.scripts")
@yield('scripts')

</body>
</html>