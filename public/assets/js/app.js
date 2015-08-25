// App.js

var roomBookingApp = angular.module('roomBookingApp', ['ngRoute']);

roomBookingApp.config(function($routeProvider) {
    $routeProvider
        // Route for the home page
        .when('/', {
            templateUrl : 'views/index.php',
            controller  : 'indexController'
        })

        .when('/swflogin', {
            templateUrl : 'views/swflogin.php',
            controller  : 'indexController'
        })

        .when('/studlogin', {
            templateUrl : 'views/studlogin.php',
            controller  : 'indexController'
        })

        .when('/securitylogin', {
            templateUrl : 'views/securitylogin.php',
            controller  : 'indexController'
        })

        .when('/venuelogin', {
            templateUrl : 'views/index.php',
            controller  : 'indexController'
        })


});



// create the controller and inject Angular's $scope
roomBookingApp.controller('indexController', function($scope) {
    // Create a message to display in our view
    $scope.message = 'Everyone come and see how good I look!';
});