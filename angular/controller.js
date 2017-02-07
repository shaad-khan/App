app.controller("Ticket",function($scope,$routeParams,service,$interval){
  
	(function () {
//$scope.load='true';
	}());
	$scope.pop=function(ID) {
		var id=ID;
		var url="form.php?ID="+id;
	//	alert(url);
	  newwindow=window.open(url,'name','height=600,width=1500');
	  if (window.focus) {newwindow.focus()}
	  return false;
	};
var ticketapi=$interval(statuscheck, 5000);
var name=$routeParams.email;
var type=$routeParams.type;
function statuscheck() {
 
	//alert("https://apps.continuserve.com/continuity/App/webservice/status.php?name="+name+"&type="+type);
service.serv("https://apps.continuserve.com/webservice/status.php?name="+name+"&type="+type).then(function(response){
	$scope.load='false';
		$scope.results=response.data;
console.log(response.data.length);
  
	});
  
};
//$scope.email=$routeParams.email;
//$scope.name="shaad";
//$scope.type=$routeParams.Type;

$scope.$on('$destroy', function () { 
  
  
  if (angular.isDefined(ticketapi)) {
    
            $interval.cancel(ticketapi);
            ticketapi = undefined;
          }

 });

});




app.controller("clientgraph", function($scope,$http,$interval){
	 var x=0;

$interval(callAtInterval, 30000);
function callAtInterval(){
   console.log("called");
  x++;
	google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Client', 'No.of Task done'],
          ['Recall',    x ],
          ['GatesAir',      2],
          ['Brinks',  2],
          ['Crons', 2],

        ]);

        var options = {
          title: 'My Daily Activities Client wise Report',
          pieHole: 0.4,
          is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      };


};

});

app.controller("taskgraph", function($scope,$http,$interval){
	 var x=0;

$interval(callAtInterval2, 30000);
function callAtInterval2(){
   console.log("called");
  x++;
	google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Task-type", "Count", { role: "style" } ],
        ["Migration", x, "#b87333"],
        ["Sql Exe", 10.49, "silver"],
        ["Path update", 19.30, "gold"],
        ["Restore", 21.45, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Type of task Done",
        width: 400,
        height: 250,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);

};

};
});

app.controller("table_count",function($scope,service,$interval){
  var vm = this;
   vm.Total = 0;
service.serv("https://apps.continuserve.com/webservice/Tab_content.php").then(function(response){
  
     	$scope.load2='false';
      $scope.items=response.data;
    }); 
 var tableapi= $interval(function(){
  
service.serv("https://apps.continuserve.com/webservice/Tab_content.php").then(function(response){
  console.log("inetval call for ticket count");
     	$scope.load2='false';
      $scope.items=response.data;
    }); 
  
 }, 8000)
  




$scope.$on('$destroy', function () { 
  
  
  if (angular.isDefined(tableapi)) {
    console.log("i am here he he he he");
            $interval.cancel(tableapi);
            tableapi = undefined;
          }

 });

});
/*-------------------------------------------------------------------------------*/

app.controller("tcount",function($scope,service,$interval){
  //var vm = this;
   //vm.Total = 0;
   $scope.showtkt=function($param){
  if($param=='total')
  {
var url="list.php?param=total";
	//	alert(url);
	  newwindow=window.open(url,'name','height=600,width=1500');
	  if (window.focus) {newwindow.focus()}
	  return false;
	
  }
  else if($param=='pending')
  {
var url="list.php?param=pending";
	//	alert(url);
	  newwindow=window.open(url,'name','height=600,width=1500');
	  if (window.focus) {newwindow.focus()}
	  return false;
  }
  else if($param=='close')
  {
var url="list.php?param=close";
	//	alert(url);
	  newwindow=window.open(url,'name','height=600,width=1500');
	  if (window.focus) {newwindow.focus()}
	  return false;
  }
   
   };

service.serv("https://apps.continuserve.com/webservice/tcount.php").then(function(response){
  
     //	$scope.load2='false';
      $scope.totals=response.data;
    }); 
 var tableapi= $interval(function(){
  
service.serv("https://apps.continuserve.com/webservice/tcount.php").then(function(response){
 // console.log("inetval call for total ticket count");
    // 	$scope.load2='false';
      $scope.totals=response.data;
    }); 
  
 }, 8000)
  




$scope.$on('$destroy', function () { 
  
  
  if (angular.isDefined(tableapi)) {
    //console.log("i am here he he he he");
            $interval.cancel(tableapi);
            tableapi = undefined;
          }

 });

});


app.controller("searchcontrol",function($scope,service,$interval){
var x;
$scope.search=function(text)
{
var url="list.php?param="+text;
		alert(url);
	  newwindow=window.open(url,'name','height=600,width=1500');
	  if (window.focus) {newwindow.focus()}
	  return false;
};


});





app.factory("service",function($http)
{
var fac={};
fac.serv=function($url)
{
  //console.log($url);
return $http.get($url);
};

return fac;

});


