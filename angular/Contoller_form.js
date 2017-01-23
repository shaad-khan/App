var app=angular.module("continuity_form",[]);

app.controller("Form_data",function($scope,$interval,$http,servicecall){
    $scope.lists=servicecall.serv("Client");
    
$interval(callApi, 1000);

  function callApi(){
    $http.get("https://apps.continuserve.com/webservice/ticket_data.php?ID="+$scope.ID).then(function(response){
     	//$scope.load2='false';
      $scope.items=response.data;

    });
 }

});

app.factory("servicecall",function($http){
var fac={};
fac.serv=function($url)
{
 $http.get("https://apps.continuserve.com/webservice/service.php?type="+$url).then(function(response){
     	//$scope.load2='false';
    return response.data;
    });
};

return fac;


});

