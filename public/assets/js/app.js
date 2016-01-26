// app.js
angular.module('sortApp', [])

    .controller('mainController', function($scope, $http) {

        $scope.slotData = {};
        $scope.message = '';
        $scope.fetchSlots = function(date, venueId){

            if(date===undefined || venueId===undefined){
                $scope.message = 'Please Select Venue/Room First';
                return;
            }
            console.log("Fetching Slots ");

            $http.get('/slots?date='+date+'&venueId='+venueId).
                then(function(response) {
                    $scope.slotData = response.data;
                    if($scope.slotData.data.length == 0)
                        $scope.message = 'No Rooms Found';
                    else
                        $scope.message = '';
                    console.log(JSON.stringify(response.data));
                }, function(response) {
                    // called asynchronously if an error occurs
                    // or server returns response with an error status.
                });

        };
    });