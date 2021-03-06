<!doctype html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body class="body">
        <div id="page-wrapper">
            @include('includes.faheader')

            @yield('content')

            @include('includes.footer')
            <script src="../../assets/js/jquery.min.js"></script>
            <script src="../../assets/js/jquery.dropotron.min.js"></script>
            <script src="../../assets/js/jquery.scrollgress.min.js"></script>
            <script src="../../assets/js/skel.min.js"></script>
            <script src="../../assets/js/util.js"></script>
            <!--[if lte IE 8]><script src="../../assets/js/ie/respond.min.js"></script><![endif]-->
            <script src="../../assets/js/main.js"></script>
        </div>
    </body>
</html>