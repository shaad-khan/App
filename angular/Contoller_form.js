var app=angular.module("continuity_form",[]);

app.controller("Form_data",function($scope,$interval,$http){
$interval(callApi, 1000);

  function callApi(){
    $http.get("https://apps.continuserve.com/webservice/ticket_data.php?ID="+$scope.ID).then(function(response){
     	//$scope.load2='false';
      $scope.items=response.data;

    });
 }

});


app.controller("client",function($scope,servicecall){

servicecall.service('Client');

});

app.factory("servicecall",function($http){
var fac={};
fac.serv=function($url)
{
$http.get("https://apps.continuserve.com/webservice/servcie.php?type="+$url).then(function(response){
$scope.lists=reponse.data;
});

}
return fac;

});

