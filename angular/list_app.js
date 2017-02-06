var app=angular.module("list_app",[]);

app.controller("listc",function($scope,$interval,$http,servicecall){
    var param;
   
       $scope.$watch("testInput", function(){
        param=$scope.testInput;
    });


    //url=https://apps.continuserve.com/webservice/ticket_data.php



$interval(callApi, 8000);

  function callApi(){
    $scope.date = new Date();
    servicecall.serv("https://apps.continuserve.com/webservice/list_serv.php?param="+param).then(function(response){
     	//$scope.load2='false';
      $scope.results=response.data;

    });
 }


});
app.factory("servicecall",function($http){
var fac={};
fac.serv=function(url)
{
  console.log(url);
return $http.get(url);
};

return fac;


});
