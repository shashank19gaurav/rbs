<html lang="en" ng-app="roomBookingApp">
<head>
    <title>Room Booking System</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/php5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>
</head>
<!--<body class="landing">-->
<body>
    <div id="main">
        <div id="page-wrapper">
            <header id="header">
                <h1><a href="#/">Room Booking System </a> for MIT, Manipal</h1>
                </nav>
            </header>
            <!--  This div is for the angular templating      -->
            <!--  Here dynamic content will be injected      -->
            <div ng-view="" autoscroll=""></div>
            <footer id="footer">
                <ul class="copyright">
                    <li>Room Booking System for <a href="http://manipal.edu">MIT  Manipal</a></li>
                </ul>
            </footer>
        </div>

    </div>

    <!-- Scripts -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/jquery.scrollgress.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>