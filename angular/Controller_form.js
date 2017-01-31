var app=angular.module("continuity_form",[]);

app.controller("Form_data",function($scope,$interval,$http,servicecall){
    servicecall.serv("Client").then(function(response){
     	//$scope.load2='false';
      $scope.lists=response.data;
    });

    servicecall.serv("shiftschedule").then(function(response){
$scope.schedules=response.data;
});
servicecall.serv("Task_Category").then(function(response){
$scope.tasks=response.data;
});
servicecall.serv("Project_tab").then(function(response){
$scope.projects=response.data;
}); 
    
$interval(callApi, 1000);

  function callApi(){
    $scope.date = new Date();
    $http.get("https://apps.continuserve.com/webservice/ticket_data.php?ID="+$scope.ID).then(function(response){
     	//$scope.load2='false';
      $scope.items=response.data;

    });
 }


});

app.controller("update",function($scope,$interval,$http,servicecall){


console.log($scope.ID +"  :i am here");

});



app.factory("servicecall",function($http){
var fac={};
fac.serv=function($url)
{
  console.log($url);
return $http.get("https://apps.continuserve.com/webservice/service.php?type="+$url);
};

return fac;


});

