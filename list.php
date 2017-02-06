<!DOCTYPE html>
<html lang="en" ng-app="list_app">
<head>
  <title>List Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
   
   <script src="angular/list_app.js"></script>
  <?php
  session_start();

$user_session=$_SESSION["user"];
if($user_session=='')
{
   echo "<script> alert('Session Expired Please Relogin in app');
     setTimeout(function(){window.close()}, 1000);
     </script>";
}
  $param=$_GET['param'];
  ?>
  <style>
  body{
    background-color:#001a33;
  }
  .clear{

    padding:5px;
    
    
  }
  .glyphicon-info-sign
{
  /*color:#5bc0de;*/
  color:red;
}
.swid
{
  width:100px;

}
td
{
  padding:3px;
}
.container
{
      width: 1119px;
}

.material-switch > input[type="checkbox"] {
    display: none;   
}

.material-switch > label {
    cursor: pointer;
    height: 0px;
    position: relative; 
    width: 40px;  
}

.material-switch > label::before {
    background: rgb(0, 0, 0);
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    content: '';
    height: 16px;
    margin-top: -8px;
    position:absolute;
    opacity: 0.3;
    transition: all 0.4s ease-in-out;
    width: 40px;
}
.material-switch > label::after {
    background: rgb(255, 255, 255);
    border-radius: 16px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    content: '';
    height: 24px;
    left: -4px;
    margin-top: -8px;
    position: absolute;
    top: -4px;
    transition: all 0.3s ease-in-out;
    width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
    background: inherit;
    opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
    background: inherit;
    left: 20px;
}
.tab2>td
{
  padding-left:1px;

}
.form-control {

  height: 28px;
  
}

  </style>
</head>
<body>

<div class="container"  ng-controller="listc" >
<div class="row mt">
    <input type="hidden" id="testInput" ng-model="testInput" ng-init="testInput='<?php echo $param;?>'" />
   <div class="col-md-12">
 <div class="content-panel" id="reload" >


                          <div class="row">

                             <div class="col-xs-12" style="padding-left:40px;padding-right:40px;">
                               <div class="panel panel-primary">
                                 <div class="panel-heading" style="background-color:#001a33"><div class="row"><div class="col-xs-8">

                                   Task Report    <img src="assets/ajax-loader.gif"/>
                                   </div></div></div>
       <div class="panel-body" >
         <table class="table"><tr>
     <th>Ticket_ID</th>
     <th>Client</th>
     <th>Project</th>
     <th>Discription</th>
     <th>Status</th>
     <th>Creation_DateTime</th>
     <th>Last_Update_DateTime</th>
     <th>Creator</th>


   </tr>


    <tr ng-repeat="res in results" ng-class="$index % 2 > 0 ? 'active':''">
<td><button class="btn btn-info" ng-click="pop(res.Ticket_ID)"><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</button></td>
<td>{{res.Client}}</td>
<td>{{res.Project}}</td>
<td>{{res.Tdiscription}}</td>
<td>{{res.Status}}</td>
<td>{{res.Cdatetime}}</td>
<td>{{res.Updatetime}}</td>
<td>{{res.Creator}}</td>

    </tr>
 </table
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>