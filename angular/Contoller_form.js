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
$scope.lists=[];
 $scope.lists=servicecall.serv('Client').then(function(response){
   $scope.lists = response.data;
});
console.log($scope.lists);

});

app.factory("servicecall",function($http){
var fac={};
fac.serv=function($url)
{
return $http.get("https://apps.continuserve.com/webservice/service.php?type="+$url);
};

return fac;


});

