

app.controller("Ticket",function($scope,$routeParams,service,$interval,$location,$http){
 $scope.setuser=function(text)
 {
$scope.u=text;
console.log($scope.u);
 };

  $scope.push=function(text)
  {
    $http.get("https://apps.continuserve.com/sss/webservice/block.php?ID="+text).then(function(response){
     	//$scope.load2='false';
      //$scope.updates=response.data;
 console.log(response.data);
    });
  };
$scope.remove=function(text)
  {
   // alert(text);
    $http.get("https://apps.continuserve.com/sss/webservice/remove.php?ID="+text).then(function(response){
     	//$scope.load2='false';
      //$scope.updates=response.data;
 alert(text+" ticket is deleted successfully");
 $scope.results={};
    });
    //alert(text);
  };
  $scope.stat=function(text)
  {
    $http.get("https://apps.continuserve.com/sss/webservice/block.php?ID="+text+"&status=1").then(function(response){
     	//$scope.load2='false';
      //$scope.updates=response.data;
 alert(text+" ticket is blocked by "+response.data[0].Blocker_name);
    });
    //alert(text);
  };
	(function () {
//$scope.load='true';
	}());
	$scope.pop=function(ID) {
    // window.location=("https://apps.continuserve.com/sss/main.php#!/");
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
 
	//alert("https://apps.continuserve.com/sss/continuity/App/webservice/status.php?name="+name+"&type="+type);
service.serv("https://apps.continuserve.com/sss/webservice/status.php?name="+name+"&type="+type).then(function(response){
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

app.controller("Report",function($scope,service){
$edate='';
$sdate='';
$scope.orderByMe = function(x) {
    $scope.myOrderBy = x;
  }
$scope.search=function(v1,v2)
{
  $sdate=v1;
  $edate=v2;
//  alert($sdate+""+$sdate);
service.serv("https://apps.continuserve.com/sss/webservice/temp.php?sdate="+$sdate+"&edate="+$edate).then(function(response){
	//$scope.load='false';
		//$scope.results=response.data;
//console.log(response.data.length);
  
	});
}


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

app.controller("taskgraph", function($scope,$http,$interval,service){
	 var x=0;
service.serv("https://apps.continuserve.com/sss/webservice/service.php?type=Task_Category").then(function(response){
var tasks=response.data;
});
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
service.serv("https://apps.continuserve.com/sss/webservice/test.php").then(function(response){
  
     	$scope.load2='false';
      $scope.items=response.data;
    }); 
 var tableapi= $interval(function(){
  
service.serv("https://apps.continuserve.com/sss/webservice/test.php").then(function(response){
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
app.controller("credentials",function($scope,service,$interval){
service.serv("https://apps.continuserve.com/sss/webservice/credentials_data.php").then(function(response){
  
     //	$scope.load2='false';
      $scope.creds=response.data;
      console.log($scope.creds[0].Client);
    }); 


})

/*______________________________________________________________________________*/

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

service.serv("https://apps.continuserve.com/sss/webservice/tcount.php").then(function(response){
  
     //	$scope.load2='false';
      $scope.totals=response.data;
    }); 
 var tableapi= $interval(function(){
  
service.serv("https://apps.continuserve.com/sss/webservice/tcount.php").then(function(response){
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
		//alert(url);
	  newwindow=window.open(url,'List','height=600,width=1500');
	  if (window.focus) {newwindow.focus()}
	  return false;
};


});


/*------------------------------------------------------------------*/
app.controller("Task",function($scope,service,$interval,$http,$rootScope){
var x;
/*service.serv("https://apps.continuserve.com/sss/webservice/task_serv.php").then(function(response){
  
     	//$scope.load='false';
      $scope.tasks=response.data;
    });
     service.serv("https://apps.continuserve.com/sss/webservice/task_aserv.php").then(function(response){
  
     //	$scope.load='false';
      $scope.atask=response.data;
    });*/
$scope.search=function(s,e)
{
  $scope.tasks={};
  $scope.atask={};
  
  console.log("https://apps.continuserve.com/sss/webservice/task_serv.php?sdate="+s+"& edate="+e);
  $http.get("https://apps.continuserve.com/sss/webservice/task_serv.php?sdate="+s+"& edate="+e).then(function(response){
  
     	$scope.load='false';
      $scope.tasks=response.data;
    }); 
    $http.get("https://apps.continuserve.com/sss/webservice/task_aserv.php?sdate="+s+"& edate="+e).then(function(response){
  
     	$scope.load='false';
      $scope.atask=response.data;
    }); 


}

$scope.getTotal = function(){
    var total = 0;
    for(var i = 0; i < $scope.tasks.length; i++){
        var product = $scope.tasks[i];
        total +=  product.TimeTaken;
    }
    if(total>0)
    {
    var h = Math.floor(total / 60);
  var m = total % 60;
  $rootScope.h=h;
  $rootScope.m=m;
  h = h < 10 ? '0' + h : h;
  m = m < 10 ? '0' + m : m;
  
    //$scope.taskhour=$total/60;
    //console.log("total="+total);
    return  h + ':' + m;
  }
  else
  {
    return "00:00";
  }
}
$scope.getatotal = function(){
    var total = 0;
    for(var i = 0; i < $scope.atask.length; i++){
        var product = $scope.atask[i];
        total +=  product.Total_time;
    }
    if(total>0)
    {
    var h = Math.floor(total / 60);
  var m = total % 60;
  $rootScope.h=$rootScope.h+h;
  $rootScope.m=$rootScope.m+m;
  h = h < 10 ? '0' + h : h;
  m = m < 10 ? '0' + m : m;
  
    //$scope.taskhour=$total/60;
    //console.log("total="+total);
    return  h + ':' + m;
  }
  else{
    return "00:00";
  }
}
$scope.getGrandtotal=function()
{
   
  //console.log($rootScope.h + ":" + $rootScope.m);
  if($rootScope.h>0 || $rootScope.m>0)
  {
    $rootScope.h = $rootScope.h < 10 ? '0' + $rootScope.h : $rootScope.h;
 $rootScope.m = $rootScope.m < 10 ? '0' +$rootScope.m : $rootScope.m;
  return $rootScope.h + ":" + $rootScope.m;
}
else{
   $rootScope.h=0;
  $rootScope.m=0;
  return 0;
}
}

});

app.controller("addtask",function($scope,$interval,$http,service){
service.serv("https://apps.continuserve.com/SSS/webservice/service.php?type=Adhoc_task").then(function(response){
     	//$scope.load2='false';
      $scope.tts=response.data;

});
service.serv("https://apps.continuserve.com/SSS/webservice/service.php?type=Project_tab").then(function(response){
$scope.projects=response.data;
});
service.serv("https://apps.continuserve.com/SSS/webservice/service.php?type=shiftschedule").then(function(response){
$scope.sts=response.data;
});

$scope.adhoc_add=function(pt,tt,ts,ad,am)
{

if(pt.length == 0 || tt.length ==0 ||  ts.length ==0 || ad.length ==0|| am.length ==0 || $scope.stype.length == 0 || $scope.jtype.length == 0)
{
  alert("One or more fields are blank please fill the required field");
  console.log("blank_ alert");

}
else{
var data=$.param({
ptype:pt,
ttype:tt,
tspent:ts,
adate:ad,
amessage:am,
stype:$scope.stype,
jtype:$scope.jtype
});
console.log(data);
var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            }

$http.post('https://apps.continuserve.com/SSS/webservice/adhocadd.php', data, config)
            .then(function (data, status, headers, config) {
                $scope.res= data.data;
                //console.log($scope.res[0].Ticket_ID);
                alert("Adhoc Ticket Created :" + $scope.res[0].Ticket_ID);
                $scope.projecttype='';
                 $scope.tasktype='';
                  $scope.tspent='';
                   $scope.adate='';
                    $scope.amessage='';
            });
            

};
}



});
app.controller("checklist",function($scope,$routeParams,service,$interval,$location,$http){
 var ticketapi=$interval(statuscheck, 5000);
var name=$routeParams.email;
var type=$routeParams.type;
service.serv("https://apps.continuserve.com/SSS/webservice/service.php?type=shiftschedule").then(function(response){
$scope.sts=response.data;
});
function statuscheck() {
 
	//alert("https://apps.continuserve.com/sss/continuity/App/webservice/status.php?name="+name+"&type="+type);
service.serv("https://apps.continuserve.com/sss/webservice/checklist.php").then(function(response){
	//$scope.load='false';
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
 $scope.close=function(v1)
{
  service.serv("https://apps.continuserve.com/sss/webservice/checklist_u.php?id="+v1).then(function(response){
	//$scope.load='false';
		$scope.res=response.data;
console.log(response.data.length);
  
	});
}


})


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


