var app=angular.module("continuity_form",[]);

app.controller("Form_data",function($scope,$interval,$http,servicecall){
  $scope.jjf=1;
  $scope.changedValue=function(x){
    $scope.dflag=x;
    console.log(x);
    $http.get("https://apps.continuserve.com/sss/webservice/ntask.php?val="+x).then(function(response){
      //$scope.load2='false';
     $scope.nitems=response.data;
     if(response.data.Job_Type)
     {
       $scope.jjf=2;
     }
     

   });


    };
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
servicecall.serv("Team").then(function(response){
$scope.cteams=response.data;
});

$interval(callApi, 1000);

  function callApi(){
    $scope.date = new Date();
    $http.get("https://apps.continuserve.com/sss/webservice/ticket_data.php?ID="+$scope.ID).then(function(response){
     	//$scope.load2='false';
      $scope.items=response.data;

    });
 }


});

app.controller("update",function($scope,$interval,$http,servicecall){

$http.get("https://apps.continuserve.com/sss/webservice/updateinfo.php?ID="+$scope.ID).then(function(response){
     	//$scope.load2='false';
      $scope.updates=response.data;

    });
//console.log($scope.ID +"  :i am here");
$interval(callApi, 10000);

  function callApi(){
    $scope.date = new Date();
    $http.get("https://apps.continuserve.com/sss/webservice/updateinfo.php?ID="+$scope.ID).then(function(response){
     	//$scope.load2='false';
      $scope.updates=response.data;

    });
  }

});



app.factory("servicecall",function($http){
var fac={};
fac.serv=function($url)
{
  console.log($url);
return $http.get("https://apps.continuserve.com/sss/webservice/service.php?type="+$url);
};

return fac;


});
