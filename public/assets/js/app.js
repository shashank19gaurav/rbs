// app.js
angular.module('sortApp', [])

    .controller('mainController', function($scope, $http) {

        $scope.slotData = {};
        $scope.fetchSlots = function(){
            console.log("Fetching Slots ");

            $http.get('/slots?time=1050&date=2015-08-30&venueId=1').
                then(function(response) {
                    $scope.slotData = response.data;
                    console.log(JSON.stringify(response.data));
                }, function(response) {
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });

        };

        $scope.sortType     = 'name'; // set the default sort type
        $scope.sortReverse  = false;  // set the default sort order
        $scope.searchFish   = '';     // set the default search/filter term

        // create the list of sushi rolls
        $scope.sushi = [
            { name: 'Cali Roll', fish: 'Crab', tastiness: 2 },
            { name: 'Philly', fish: 'Tuna', tastiness: 4 },
            { name: 'Tiger', fish: 'Eel', tastiness: 7 },
            { name: 'Rainbow', fish: 'Variety', tastiness: 6 }
        ];

    });