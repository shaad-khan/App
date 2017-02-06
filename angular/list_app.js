var app=angular.module("list_app",[]);

app.controller("Ticket",function($scope,$interval,$http,servicecall){
    
    console.log($scope.param);
    
/*$interval(callApi, 8000);

  function callApi(){
    $scope.date = new Date();
    servicecall.serv("https://apps.continuserve.com/webservice/ticket_data.php?ID="+$scope.ID).then(function(response){
     	//$scope.load2='false';
      $scope.items=response.data;

    });
 }*/


});
app.factory("servicecall",function($http){
var fac={};
fac.serv=function($url)
{
  console.log($url);
return $http.get($url);
};

return fac;


});
