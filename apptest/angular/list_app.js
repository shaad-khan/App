var app=angular.module("list_app",[]);

app.controller("listc",function($scope,$interval,$http,servicecall){
    var param;
   
       $scope.$watch("testInput", function(){
        param=$scope.testInput;
    });
	$scope.pop=function(ID) {
		var id=ID;
		var url="form.php?ID="+id;
	//	alert(url);
	  newwindow=window.open(url,'name','height=600,width=1500');
	  if (window.focus) {newwindow.focus()}
	  return false;
	};

    //url=https://apps.continuserve.com/apptestwebservice/ticket_data.php



$interval(callApi, 8000);

  function callApi(){
    $scope.date = new Date();
    servicecall.serv("https://apps.continuserve.com/apptestwebservice/list_serv.php?param="+param).then(function(response){
     	$scope.load='false';
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
