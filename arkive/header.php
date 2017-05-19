<!DOCTYPE html>
<html lang="en" ng-app="continuity">
<?php
session_start();
if(!$_SESSION["user"])
  {
    header('Location:https://apps.continuserve.com/arkive');
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
 <link rel="stylesheet" type="text/css" href="dateresource/jquery.datetimepicker.css"/>
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
.table2 > tbody > tr > th, .table2 > tfoot > tr > th, .table2 > thead > tr > td, .table2 > tbody > tr > td, .table2 > tfoot > tr > td {
    padding: 3px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
.btn-circle.btn-xl {
  width: 90px;
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
            <a href="https://apps.continuserve.com/arkive/main.php#!/" class="logo"><b><span style="color:white"><img src="assets/img/continuity.jpg"/> </span></b><!--<span style="text-transform: uppercase;">| L3</span><span style="text-transform: lowercase;"> Application For Handling Shift</span>--></a>
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
    <button type="button" class="btn btn-primary" ><a href="https://apps.continuserve.com/arkive/main.php#!/" style="color:#fafafa;font-size:14px;">
                                    <span class="glyphicon glyphicon-home"></a></span></button>
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

                  <p class="centered"><a href="https://apps.continuserve.com/arkive/main.php#!/">
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

                  
<!--
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
                            <li><a  href="#!/calender"><span class="glyphicon glyphicon-calendar"></span> Calender View </a></li>
                           
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
                  <!--<li class="mt">
                      <li><a  href="#!/credentials"><span class="glyphicon glyphicon-tasks"></span> Credentials </a></li>
                  </li>-->
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
