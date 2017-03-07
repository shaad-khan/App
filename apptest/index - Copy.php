<?php
//require("header.php");
include('header.php');
//require_once('/site/wwwroot/continuity/App/header.php');
?>


 <section id="main-content">
          <section class="wrapper">

<div class="row mt">
  <div class="col-md-12">
<div class="content-panel" id="reload">


                         <div class="row">

                            <div class="col-xs-6" ng-controller="clientgraph">

                           <div id="donutchart" style="width: 400px; height:250px;"></div>
                           </div>

                        <div class="col-xs-6" ng-controller="taskgraph">

                           <div id="barchart_values" style="width: 400px; height:250px;"></div>

                         </div>
                         </div>

                          </div>


</div>
</div>
<div class="row mt">
  <div class="col-md-12">
<div class="content-panel" id="reload">


                         <div class="row">

                            <div class="col-xs-12" style="padding-left:40px;padding-right:40px;">
                              <div class="panel panel-primary">
                                <div class="panel-heading">Task Report</div>
      <div class="panel-body" ng-controller="table_count">
        <table class="table"><tr>
    <th></th>
      <th>  <span class="glyphicon glyphicon-menu-hamburger"></span>Classify</th>
      <th>WIP</th>
      <th>AUI</th>
      <th>Review</th>
      <th>Documentation</th>
      <th>Closure</th>
      <th>Total</th>
    </tr>
    <tr>
      <td>Unassigned</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>6</td><td>7</td>


    </tr>
    <tr ng-repeat="item in items">
      <td>{{item.Email.split('@')[0]}}</td><td ng-init="table_count.Total=table_count.Total+item.classify">{{item.Classify}}</td>
      <td ng-init="total_Wip=total_Wip+item.Wip">{{item.Wip}}</td>
      <td ng-init="total_Aui=total_Aui+item.Aui">{{item.Aui}}</td>
      <td ng-init="total_Review=total_Review+item.Review">{{item.Review}}</td>
      <td ng-init="total_Doc=total_Doc+item.Doc">{{item.Doc}}</td>
      <td ng-init="total_Closure=total_Closure+item.Closure">{{item.Closure}}</td>
    <td ng-init="total= item.Classify+item.Wip+item.Aui+item.Review+item.Doc+item.Closure; controller.ttotal=controller.ttotal+total;">{{total}}</td>


    </tr>
    <tr><td></td><td>{{table_count.Total}}</td>
      <td>{{total_Wip}}</td>
      <td>{{total_Aui}}</td>
      <td>{{total_Review}}</td>
      <td>{{total_Doc}}</td>
<td>{{total_Closure}}</td>
<td>{{ttotal}}</td>
    </tr>
    <!--<tr>
      <td>Jaaga</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>6</td><td>7</td>


    </tr>
    <tr>
      <td>Unassigned</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>6</td><td>7</td>

    </tr>
    <tr>
      <td>Anmol</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>6</td><td>7</td>

    </tr>-->

  </table>
      </div>
      <div class="panel-footer">Panel footer</div>
    </div>

                           </div>



                         </div>
                         </div>

                          </div>


</div>
</div>
</section>
</section>
<script type="text/javascript">
var app=angular.module("continuity",[]);
app.controller("clientgraph", function($scope,$http,$interval){
	 var x=0;

$interval(callAtInterval, 10000);
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

$interval(callAtInterval2, 10000);
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

app.controller("table_count",function($scope,$http,$interval){
  var vm = this;
   vm.Total = 0;
  $interval(callApi, 5000);
  function callApi(){
    $http.get("https://apps.continuserve.com/continuity/App/webservice/Tab_content.php").then(function(response){

      $scope.items=response.data;
    });



}




});

  </script>


<?php include("footer.php");?>
