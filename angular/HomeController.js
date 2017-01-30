app.controller("table_count",function($scope,$http,$interval){
  var vm = this;
   vm.Total = 0;

 var tableapi= $interval(function(){
$http.get("https://apps.continuserve.com/webservice/Tab_content.php").then(function(response){
     	$scope.load2='false';
       console.log("called from interval");
      $scope.items=response.data;
    });  
 }, 500);
  /*function callApi(){
    $http.get("https://apps.continuserve.com/webservice/Tab_content.php").then(function(response){
     	$scope.load2='false';
      $scope.items=response.data;
    });*/





$scope.$on('$destroy', function () { 
  
  
  if (angular.isDefined(tableapi)) {
    console.log("i am here he he he he");
            $interval.cancel(tableapi);
            tableapi = undefined;
            console.log(tableapi);
          }

 });

});