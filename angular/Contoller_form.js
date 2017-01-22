var app2=angular.module("continuity_form",[]);

app2.controller("Form_data",function($scope){
    

   
$interval(callApi, 5000);

  function callApi(){
    /*$http.get("https://apps.continuserve.com/webservice/ticket_data.php?ID="+$scope.ID).then(function(response){
     	$scope.load2='false';
      $scope.items=response.data;

    });*/
      console.log($scope.ID);
   // $scope.ID="xxx";

  }

});