<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> - Sistema nutricionista - </title>

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet">


    <!-- styles -->
    @yield('style')

    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>
<body>

    <div id="wrapper">
        @include('menu.index')
        <div id="page-wrapper" class="gray-bg">
            @include('navbar.index')
            @yield('content')
            @include('footer.index')
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('/js/inspinia.js') }}"></script>
    <script src="{{ asset('/js/plugins/pace/pace.min.js') }}"></script>
    @yield('scripts')

</body>
</html>