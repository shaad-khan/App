<!DOCTYPE html>
<html lang="en" ng-app="continuity">
<?php
session_start();
if(!$_SESSION["user"])
  {
    header('Location:https://apps.continuserve.com/');
  }

  include("db.php");
$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$c="";
$c2="";

date_default_timezone_set('Asia/Kolkata');
                  $d=date('m/d/y H:i:s');;
 $sql2 = "select count(*) as c from dbo.Continuity where Status like '%pending%' and Comments like '' and (DATEDIFF(day,Weekend, '$d') > 0 or DATEDIFF(day,Weekend, '$d') = 0) and (Wflag=0 or Wflag=1) and Checklist_flag=0 and Assign_team like '%L3%'";
$result2=$conn->query($sql2);
//while($row=$result->fetch())
//echo $sql2."<br>";
 while($row2=$result2->fetch())
{
  $c=$row2['c'];
}
$sql2 = "select count(*) as c from dbo.Continuity where Status like '%pending%' and Comments like '' and (DATEDIFF(day,Weekend, '$d') > 0 or DATEDIFF(day,Weekend, '$d') = 0) and Checklist_flag=1";
$result2=$conn->query($sql2);
//while($row=$result->fetch())
//echo $sql2;
 while($row2=$result2->fetch())
{
  $c2=$row2['c'];
}
?>
  <head>
   <!-- <meta http-equiv="refresh" content="20" />-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Continuitylate, Theme, Responsive, Fluid, Retina">

    <title>Continuity App</title>
    <link rel="stylesheet" href="components/bootstrap3/css/bootstrap.min.css">
	<link rel="stylesheet" href="components/bootstrap3/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/calendar.css">
    <style>

        [class*="cal-cell"] {
  float: left;
  margin-left: 0;
  min-height: 1px;
}
.cal-row-fluid {
  width: 100%;
  *zoom: 1;
}
.cal-row-fluid:before,
.cal-row-fluid:after {
  display: table;
  content: "";
  line-height: 0;
}
.cal-row-fluid:after {
  clear: both;
}
.cal-row-fluid [class*="cal-cell"] {
  display: block;
  width: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  float: left;
  margin-left: 0%;
  *margin-left: -0.05213764337851929%;
}
.cal-row-fluid [class*="cal-cell"]:first-child {
  margin-left: 0;
}
.cal-row-fluid .controls-row [class*="cal-cell"] + [class*="cal-cell"] {
  margin-left: 0%;
}
.cal-row-fluid .cal-cell7 {
  width: 100%;
  *width: 99.94669509594883%;
}
.cal-row-fluid .cal-cell6 {
  width: 85.71428571428571%;
  *width: 85.66098081023453%;
}
.cal-row-fluid .cal-cell5 {
  width: 71.42857142857142%;
  *width: 71.37526652452024%;
}
.cal-row-fluid .cal-cell4 {
  width: 57.14285714285714%;
  *width: 57.089552238805965%;
}
.cal-row-fluid .cal-cell3 {
  width: 42.857142857142854%;
  *width: 42.80383795309168%;
}
.cal-row-fluid .cal-cell2 {
  width: 28.57142857142857%;
  *width: 28.518123667377395%;
}
.cal-row-fluid .cal-cell1 {
  width: 14.285714285714285%;
  *width: 14.232409381663112%;
}
.cal-week-box .cal-offset7,
.cal-row-fluid .cal-offset7,
.cal-row-fluid .cal-offset7:first-child {
  margin-left: 100%;
  *margin-left: 99.89339019189765%;
}
.cal-week-box .cal-offset6,
.cal-row-fluid .cal-offset6,
.cal-row-fluid .cal-offset6:first-child {
  margin-left: 85.71428571428571%;
  *margin-left: 85.60767590618336%;
}
.cal-week-box .cal-offset5,
.cal-row-fluid .cal-offset5,
.cal-row-fluid .cal-offset5:first-child {
  margin-left: 71.42857142857142%;
  *margin-left: 71.32196162046907%;
}
.cal-week-box .cal-offset4,
.cal-row-fluid .cal-offset4,
.cal-row-fluid .cal-offset4:first-child {
  margin-left: 57.14285714285714%;
  *margin-left: 57.03624733475479%;
}
.cal-week-box .cal-offset3,
.cal-row-fluid .cal-offset3,
.cal-row-fluid .cal-offset3:first-child {
  margin-left: 42.857142857142854%;
  *margin-left: 42.750533049040506%;
}
.cal-week-box .cal-offset2,
.cal-row-fluid .cal-offset2,
.cal-row-fluid .cal-offset2:first-child {
  margin-left: 28.57142857142857%;
  *margin-left: 28.46481876332622%;
}
.cal-week-box .cal-offset1,
.cal-row-fluid .cal-offset1,
.cal-row-fluid .cal-offset1:first-child {
  margin-left: 14.285714285714285%;
  *margin-left: 14.17910447761194%;
}
.cal-row-fluid .cal-cell1 {
  width: 14.285714285714285%;
  *width: 14.233576642335766%;
}
[class*="cal-cell"].hide,
.cal-row-fluid [class*="cal-cell"].hide {
  display: none;
}
[class*="cal-cell"].pull-right,
.cal-row-fluid [class*="cal-cell"].pull-right {
  float: right;
}
.cal-row-head [class*="cal-cell"]:first-child,
.cal-row-head [class*="cal-cell"] {
  min-height: auto;
  overflow: hidden;
  text-overflow: ellipsis;
}
.cal-events-num {
  margin-top: 20px;
}
.cal-month-day {
  position: relative;
  display: block;
  width: 100%;
}
#cal-week-box {
  position: absolute;
  width: 70px;
  left: -71px;
  top: -1px;
  padding: 8px 5px;
  cursor: pointer;
}
#cal-day-tick {
  position: absolute;
  right: 50%;
  bottom: -21px;
  padding: 0px 5px;
  cursor: pointer;
  z-index: 5;
  text-align: center;
  width: 26px;
  margin-right: -17px;
}
.cal-year-box #cal-day-tick {
  margin-right: -7px;
}
#cal-slide-box {
  position: relative;
}
#cal-slide-tick {
  position: absolute;
  width: 16px;
  margin-left: -7px;
  height: 9px;
  top: -1px;
  z-index: 1;
}
#cal-slide-tick.tick-month1 {
  left: 12.5%;
}
#cal-slide-tick.tick-month2 {
  left: 37.5%;
}
#cal-slide-tick.tick-month3 {
  left: 62.5%;
}
#cal-slide-tick.tick-month4 {
  left: 87.5%;
}
#cal-slide-tick.tick-day1 {
  left: 7.14285714285715%;
}
#cal-slide-tick.tick-day2 {
  left: 21.42857142857143%;
}
#cal-slide-tick.tick-day3 {
  left: 35.71428571428572%;
}
#cal-slide-tick.tick-day4 {
  left: 50%;
}
#cal-slide-tick.tick-day5 {
  left: 64.2857142857143%;
}
#cal-slide-tick.tick-day6 {
  left: 78.57142857142859%;
}
#cal-slide-tick.tick-day7 {
  left: 92.85714285714285%;
}
.events-list {
  position: absolute;
  bottom: 0;
  left: 0;
  overflow: hidden;
}
#cal-slide-content ul.unstyled {
  margin-bottom: 0;
}
.cal-week-box {
  position: relative;
}
.cal-week-box [data-event-class] {
  white-space: nowrap;
  height: 30px;
  margin: 1px 1px;
  line-height: 30px;
  text-overflow: ellipsis;
  overflow: hidden;
  padding-left: 10px;
}
.cal-week-box .cal-column {
  position: absolute;
  height: 100%;
  z-index: -1;
}
.cal-week-box .arrow-before,
.cal-week-box .arrow-after {
  position: relative;
}
.cal-week-box .arrow-after:after {
  content: "";
  position: absolute;
  top: 0px;
  width: 0;
  height: 0;
  right: 0;
  border-top: 15px solid #ffffff;
  border-left: 8px solid;
  border-bottom: 15px solid #FFFFFF;
}
.cal-week-box .arrow-before:before {
  content: "";
  position: absolute;
  top: 0px;
  width: 0;
  height: 0;
  left: 1px;
  border-top: 15px solid transparent;
  border-left: 8px solid #FFFFFF;
  border-bottom: 15px solid transparent;
}
#cal-day-box {
  text-wrap: none;
}
#cal-day-box .cal-day-hour-part {
  height: 30px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  border-bottom: thin dashed #e1e1e1;
}
#cal-day-box .cal-day-hour .day-highlight {
  height: 30px;
}
#cal-day-box .cal-hours {
  font-weight: bolder;
}
#cal-day-box .cal-day-hour:nth-child(odd) {
  background-color: #fafafa;
}
#cal-day-box #cal-day-panel {
  position: relative;
  padding-left: 60px;
}
#cal-day-box #cal-day-panel-hour {
  position: absolute;
  width: 100%;
  margin-left: -60px;
}
#cal-day-box .day-event {
  position: relative;
  max-width: 200px;
  overflow: hidden;
}
#cal-day-box .day-highlight {
  line-height: 30px;
  padding-left: 8px;
  padding-right: 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  border: 1px solid #c3c3c3;
  margin: 1px 1px;
  overflow: hidden;
  text-overflow: ellipsis;
}
#cal-day-box .day-highlight.dh-event-important {
  border: 1px solid #ad2121;
}
#cal-day-box .day-highlight.dh-event-warning {
  border: 1px solid #e3bc08;
}
#cal-day-box .day-highlight.dh-event-info {
  border: 1px solid #1e90ff;
}
#cal-day-box .day-highlight.dh-event-inverse {
  border: 1px solid #1b1b1b;
}
#cal-day-box .day-highlight.dh-event-success {
  border: 1px solid #006400;
}
#cal-day-box .day-highlight.dh-event-special {
  background-color: #ffe6ff;
  border: 1px solid #800080;
}
.event {
  display: block;
  background-color: #c3c3c3;
  width: 12px;
  height: 12px;
  margin-right: 2px;
  margin-bottom: 2px;
  -webkit-box-shadow: inset 0px 0px 5px 0px rgba(0, 0, 0, 0.4);
  box-shadow: inset 0px 0px 5px 0px rgba(0, 0, 0, 0.4);
  border-radius: 8px;
  border: 1px solid #ffffff;
}
.event-block {
  display: block;
  background-color: #c3c3c3;
  width: 20px;
  height: 100%;
}
.cal-event-list .event.pull-left {
  margin-top: 3px;
}
.event-important {
  background-color: #ad2121;
}
.event-info {
  background-color: #1e90ff;
}
.event-warning {
  background-color: #e3bc08;
}
.event-inverse {
  background-color: #1b1b1b;
}
.event-success {
  background-color: #006400;
}
.event-special {
  background-color: #800080;
}
.day-highlight:hover,
.day-highlight {
  background-color: #dddddd;
}
.day-highlight.dh-event-important:hover,
.day-highlight.dh-event-important {
  background-color: #fae3e3;
}
.day-highlight.dh-event-warning:hover,
.day-highlight.dh-event-warning {
  background-color: #fdf1ba;
}
.day-highlight.dh-event-info:hover,
.day-highlight.dh-event-info {
  background-color: #d1e8ff;
}
.day-highlight.dh-event-inverse:hover,
.day-highlight.dh-event-inverse {
  background-color: #c1c1c1;
}
.day-highlight.dh-event-success:hover,
.day-highlight.dh-event-success {
  background-color: #caffca;
}
.day-highlight.dh-event-special:hover,
.day-highlight.dh-event-special {
  background-color: #ffe6ff;
}
.cal-row-head [class*="cal-cell"]:first-child,
.cal-row-head [class*="cal-cell"] {
  font-weight: bolder;
  text-align: center;
  border: 0px solid;
  padding: 5px 0;
}
.cal-row-head [class*="cal-cell"] small {
  font-weight: normal;
}
.cal-year-box .row-fluid:hover,
.cal-row-fluid:hover {
  background-color: #fafafa;
}
.cal-month-day {
  height: 100px;
}
[class*="cal-cell"]:hover {
  background-color: #ededed;
}
.cal-year-box [class*="span"],
.cal-month-box [class*="cal-cell"] {
  min-height: 100px;
  border-right: 1px solid #e1e1e1;
  position: relative;
}
.cal-year-box [class*="span"] {
  min-height: 60px;
}
.cal-year-box .row-fluid [class*="span"]:last-child,
.cal-month-box .cal-row-fluid [class*="cal-cell"]:last-child {
  border-right: 0px;
}
.cal-year-box .row-fluid,
.cal-month-box .cal-row-fluid {
  border-bottom: 1px solid #e1e1e1;
  margin-left: 0px;
  margin-right: 0px;
}
.cal-year-box .row-fluid:last-child,
.cal-month-box .cal-row-fluid:last-child {
  border-bottom: 0px;
}
.cal-month-box,
.cal-year-box,
.cal-week-box {
  border-top: 1px solid #e1e1e1;
  border-bottom: 1px solid #e1e1e1;
  border-right: 1px solid #e1e1e1;
  border-left: 1px solid #e1e1e1;
  border-radius: 2px;
}
span[data-cal-date] {
  font-size: 1.2em;
  font-weight: normal;
  opacity: 0.5;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.1s ease-in-out;
  -moz-transition: all 0.1s ease-in-out;
  -ms-transition: all 0.1s ease-in-out;
  -o-transition: all 0.1s ease-in-out;
  margin-top: 15px;
  margin-right: 15px;
}
span[data-cal-date]:hover {
  opacity: 1;
}
.cal-day-outmonth span[data-cal-date] {
  opacity: 0.1;
  cursor: default;
}
.cal-day-today {
  background-color: #e8fde7;
}
.cal-day-today span[data-cal-date] {
  color: darkgreen;
}
.cal-month-box .cal-day-today span[data-cal-date] {
  font-size: 1.9em;
}
.cal-day-holiday span[data-cal-date] {
  color: #800080;
}
.cal-day-weekend span[data-cal-date] {
  color: darkred;
}
#cal-week-box {
  border: 1px solid #e1e1e1;
  border-right: 0px;
  border-radius: 5px 0 0 5px;
  background-color: #fafafa;
  text-align: right;
}
#cal-day-tick {
  border: 1px solid #e1e1e1;
  border-top: 0px solid;
  border-radius: 0 0 5px 5px;
  background-color: #ededed;
  text-align: center;
}
#cal-slide-box {
  border-top: 0px solid #8c8c8c;
}
#cal-slide-content {
  padding: 20px;
  color: #ffffff;
  background-image: url("img/dark_wood.png");
  -webkit-box-shadow: inset 0px 0px 15px 0px rgba(0, 0, 0, 0.5);
  box-shadow: inset 0px 0px 15px 0px rgba(0, 0, 0, 0.5);
}
#cal-slide-tick {
  background-image: url("img/tick.png?2");
}
#cal-slide-content:hover {
  background-color: transparent;
}
#cal-slide-content a.event-item {
  color: #ffffff;
  font-weight: normal;
  line-height: 22px;
}
.events-list {
  max-height: 47px;
  padding-left: 5px;
}
.cal-column {
  border-left: 1px solid #e1e1e1;
}
a.cal-event-week {
  text-decoration: none;
  color: #151515;
}
.badge-important {
  background-color: #b94a48;
}
</style>
 <link rel="stylesheet" type="text/css" href="dateresource/jquery.datetimepicker.css"/>
<style type="text/css">
		.btn-twitter {
			padding-left: 30px;
			background: rgba(0, 0, 0, 0) url(https://platform.twitter.com/widgets/images/btn.27237bab4db188ca749164efd38861b0.png) -20px 9px no-repeat;
		}
		.btn-twitter:hover {
			background-position:  -21px -16px;
		}
	</style>
<script src="dateresource/jquery.js"></script>
 <script src="dateresource/jquery.datetimepicker.js"></script>
 
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bo
   <script src="dateresource/jquery.datetimepicker.js"></script>otstrap.min.css">
<link rel="stylesheet" type="text/css" href="dateresource/jquery.datetimepicker.css"/>
<!-- Optional theme -->
<script>
function myFunction1() {
    document.getElementById("demo").innerHTML = "Checklist Task";
}
</script>

   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <script src="angular/app.js"></script>

            <script src="angular/controller.js"></script>
    <!-- Custom styles for this Continuitylate -->
    
    <link href="assets/css/style2.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



<!--nic Edit


      <script src="nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
 // new nicEditor().panelInstance('area1');
  //new nicEditor({fullPanel : true}).panelInstance('area2');
  //new nicEditor({iconsPath : 'nicEditorIcons.gif'}).panelInstance('area3');
 // new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
  new nicEditor({maxHeight : 200}).panelInstance('area5');
});
</script>-->
<style>
element.style {
    width: 14px;
    /*height: 133px;
    background-color: rgb(78, 205, 196);*/
    background-color:#777;
}
.btn-circle.btn-xl {
  width: 70px;
  height: 70px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 35px;
}
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}

.modal {
    position: fixed;
    top: -4px;
    right: -126px;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;
    outline: 0;
}
.close:hover, .close:focus {
    color: #f2f2f2;
    text-decoration: none;
    cursor: pointer;
    filter: alpha(opacity=50);
    opacity: .5;
}
/*
.table-fixed {
  width: 100%;
  background-color: #f3f3f3;
}
.table-fixed tbody {
  height: 200px;
  overflow-y: auto;
  width: 100%;
}
.table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
  display: block;
}
.table-fixed tbody td {
  float: left;
}
.table-fixed thead tr th {
  float: left;
  background-color: #f39c12;
  border-color: #e67e22;
}
*/

</style>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg" >
              <div class="sidebar-toggle-box" ng-init="user=<?php echo $_SESSION['user'];?>">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="#" class="logo"><b><span style="color:white"><img src="lassets/img/continuity.jpg"/> </span></b><!--<span style="text-transform: uppercase;">| L3</span><span style="text-transform: lowercase;"> Application For Handling Shift</span>--></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu" >
               
            </div>
            <div class="top-menu" >

<div ng-controller="searchcontrol">
              <ul class="nav pull-right top-menu">
                  <li> <div class="col-xs-4" style="padding-top: 12px;"><div class="form-group" style="position:relative;left: -80px;">
    
    
    <input type="Text" class="form-control" ng-model="fill" style="width:202px" placeholder="search Box"/>
    
  </div> </li>
   <li> <div class="col-xs-2" style="padding-top: 12px;"><div class="form-group" style="position:relative;left: -99px;">
    
    
 <button type="button" class="btn btn-primary" ng-click="search(fill)"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
    
  </div>
    </li>
                    <li><a class="logout" href="logout.php">Logout</a></li>
              </ul>
            </div>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <p class="centered"><a href="#">
                    <?php
                    if($_SESSION["user"]=="shadab.k")
                    {

                   echo "<img src='assets/img/shaad.jpg' class='img-circle' width='60'></a></p>";
                 }
                 else
                 {
                  echo "<img src='assets/img/user.png' class='img-circle' width='60'></a></p>";
                 }
                 ?></p>
                  <h5 class="centered"><?php echo $_SESSION["user"];

 if($_SESSION['admin']==1)
                    {
                      echo "  (Admin)";
                    }


                  ?></h5>

                 <!-- <li class="mt">
                      <a href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>UI Elements</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="general.html">General</a></li>
                          <li><a  href="buttons.html">Buttons</a></li>
                          <li><a  href="panels.html">Panels</a></li>
                      </ul>
                  </li>
-->
                   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Task List</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#!/task"><span class="glyphicon glyphicon-tasks"></span> Your Task List </a></li>
                          <!--<li><a  href="alerticket.php">TrackServe Alert Tickets</a></li>
                 <?php
                 if($_SESSION['admin']==1)
                    {?>
                <li><a  href="admin.php">Resolved ticket list</a></li>

               <?php
           }?>

                          <li><a  href="userapp.php">Tasks Pending For User Confirmation</a></li>
                          <li><a  href="approval.php">Tasks Pending For Approval</a></li>
                           <li><a  href="in_progress.php">Tasks In_progress</a></li>
                          <li><a  href="weekdays.php?wflag=0">Weekdays</a></li>
                          <li><a  href="weekdays.php?wflag=1">Weekends</a></li>
                           <li><a  href="Credential_view.php">Find Credentials</a></li>
                           <li><a  href="add_cred.php">Add New Credential</a></li>
                          <li><a  href="search.php">Search</a></li>
                          <li class="sub-menu">
                             <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span style="color:white">Report</span>
                      </a>
                           <ul class="sub">
                            <li><a  href="chart.php">Client_Report</a></li>
                             <li><a  href="pending_chart.php">Client_Report(Pending)</a></li>
                            <li><a  href="report2.php">Team_Report</a></li>
                           </ul>
                       </li>
                           <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span style="color:white">Checklist</span>
                      </a>
                           <ul class="sub">
                            <li><a  href="home.php?chk=1&status=1" onclick="myFunction1()">pending</a></li>
                            <li><a  href="home.php?chk=1&status=0" onclick="myFunction1()">Closed</a></li>
                           </ul>
<?php
                           if($_SESSION['admin']==1)
                           {?>
                           <li><a  href="notice_create.php">Add_Notice</a></li>
                          <?php
                           }
                           ?>
                           <li><a  href="Notice_view.php">View_Notice</a></li>
                           <!-- <li><a  href="gallery.php">Video_Gallery</a></li>-->
                      </ul>
                  </li>
                  <!--<li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Extra Pages</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="blank.html">Blank Page</a></li>
                          <li><a  href="login.html">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Forms</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">Form Components</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="basic_table.html">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>-->

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
