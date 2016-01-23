<!doctype html>
<html>
    <head>
        @include('includes.head')
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootswatch/3.2.0/sandstone/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap-datepicker.css">

        <style>
            .room{
                margin:2%;
            }
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="../../assets/js/bootstrap-datepicker.js"></script>

        <style>
            body { padding-top:50px; }
        </style>

        <!-- JS -->
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
        <script src="../../assets/js/app.js"></script>
    </head>
    <body class="body">
        {{--<div id="page-wrapper">--}}
            @include('includes.clubheader')

            @yield('content')

            @include('includes.footer')
            <script src="../../assets/js/jquery.min.js"></script>
            <script src="../../assets/js/jquery.dropotron.min.js"></script>
            <script src="../../assets/js/jquery.scrollgress.min.js"></script>
            <script src="../../assets/js/skel.min.js"></script>
            <script src="../../assets/js/util.js"></script>
            <!--[if lte IE 8]><script src="../../assets/js/ie/respond.min.js"></script><![endif]-->
            <script src="../../assets/js/main.js"></script>
        {{--</div>--}}
    </body>
</html>