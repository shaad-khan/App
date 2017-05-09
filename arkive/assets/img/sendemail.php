<!DOCTYPE html>
<html lang="en">
<?php
//echo $_POST["template"];
session_start();
if(!$_SESSION["user"])
  {
    header('Location:https://csmonitoring-dev.azurewebsites.net/continuity');
  }
  include("db.php"); 
$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$c="";
$c2="";

date_default_timezone_set('Asia/Kolkata');
                  $d=date('m/d/y H:i:s');;
 $sql2 = "select count(*) as c from dbo.temp where Status like '%pending%' and Comments like '' and (DATEDIFF(day,Weekend, '$d') > 0 or DATEDIFF(day,Weekend, '$d') = 0) and (Wflag=0 or Wflag=1) and Checklist_flag=0";
$result2=$conn->query($sql2);
//while($row=$result->fetch())
//echo $sql2."<br>";
 while($row2=$result2->fetch())
{
  $c=$row2['c'];
}
$sql2 = "select count(*) as c from dbo.temp where Status like '%pending%' and Comments like '' and (DATEDIFF(day,Weekend, '$d') > 0 or DATEDIFF(day,Weekend, '$d') = 0) and Checklist_flag=1";
$result2=$conn->query($sql2);
//while($row=$result->fetch())
//echo $sql2;
 while($row2=$result2->fetch())
{
  $c2=$row2['c'];
}
$tcl=$_POST["template"];
$recp="";
$body="";
$sendr="";
$template = "select * from dbo.template where Client='".$tcl."'";

$resulttemp=$conn->query($template);
//while($row=$result->fetch())
//echo $sql2;
 while($row4=$resulttemp->fetch())
{
 $recp=$row4["Recipients"];
 $body=$row4["Body"];
 $sendr=$row4["sender"];
}

?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Continuity App</title>
<script>
function myFunction1() {
    document.getElementById("demo").innerHTML = "Checklist Task";
}
</script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

  <?php 
   include("db.php"); 
$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$sql4 = "select * from autofill";
$result4=$conn->query($sql4);
//while($row=$result->fetch())
//echo $sql2."<br>";
$tag="";
 while($row4=$result4->fetch())
{
$tag=$tag.'"'.$row4['email'].'"'.',';
//$rows[]=$row4['email'];
}
//echo $tag;
// $_SESSION["tags"]=$tag;
?>
  <script>
  $(function() {
    //var availableTags = "["+'<%=Session("admin")%>'+"]";
    var availableTags =<?php echo "[".$tag."]" ?>;
    //alert(availableTags);
    $( "#tags" ).autocomplete({
      source: availableTags
    });
    $( "#tags2" ).autocomplete({
      source: availableTags
    });
  });
  </script>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style2.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
 // new nicEditor().panelInstance('area1');
  //new nicEditor({fullPanel : true}).panelInstance('area2');
  //new nicEditor({iconsPath : 'nicEditorIcons.gif'}).panelInstance('area3');
 // new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
  new nicEditor({maxHeight : 200}).panelInstance('area5');
});
</script>
 </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="#" class="logo"><b><span style="color:white"><img src="assets/img/continuity.jpg"/> </span></b><!--<span style="text-transform: uppercase;">| L3</span><span style="text-transform: lowercase;"> Application For Handling Shift</span>--></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu" >
                <!--  notification start -->
                <ul class="nav top-menu" >
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" title='<?php echo "There are $c2 unworked pending checklists";?>' >
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme"><?php

                            echo $c2;
                            ?>





                            </span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar" style="height: 400px; overflow: auto" >
                            <div class="notify-arrow notify-arrow-green" ></div>
                            <li>
                                <p class="green">You have <?php

                            echo $c2;
                            ?> pending Checklist tasks</p>
                            </li>
                            <?php
                            $sql2 = "select * from dbo.temp where Status like '%pending%' and (DATEDIFF(day,Weekend, '$d') > 0 or DATEDIFF(day,Weekend, '$d') = 0) and Checklist_flag=1 ORDER BY ID DESC";
$result2=$conn->query($sql2);
//while($row=$result->fetch())
//echo $sql2;
 while($row2=$result2->fetch())
{
  
?>
                            <li >
                                <a href="#">
                                   <div class="task-info" >
                                        <div class="desc" ><span style='font-size:9px'><?php 
                                        $string = explode(' ', $row2['Message']);
    if (empty($string) == false) {
        $string = array_chunk($string, 5);
        $string = $string[0];
    }
    $string = implode(' ', $string);
   // return $string;



                                        echo  $string."     [".$row2['Client']."]";?></span></div>
                                       <!-- <div class="percent">40%</div>-->
                                        <?php
                                       if($row2['Comments']=="")
                                       {
                                        echo "<img src='assets/img/initiated.png'/>";
                                      }
                                      else
                                      {
                                      echo "<img src='assets/img/working.png'/>";
                                    }
                                    ?>
                                    </div>
                                   <!-- <div class="progress progress-striped">
                                        <!--<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>

                                    </div>-->
                                </a>
                            </li>
                            <?php
                          }?>
                            <!--<li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Database Update</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Product Development</div>
                                        <div class="percent">80%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Payments Sent</div>
                                        <div class="percent">70%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Complete (Important)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>-->
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" title='<?php echo "There are $c unworked pending issues";?> '>
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme"><?php
                            echo $c;
                            ?></span>
                        </a>
                        <ul class="dropdown-menu extended inbox" style="height: 400px; overflow: auto">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have <?php echo $c." ";?> pending Tasks</p>
                            </li>
 <?php
                            $sql2 = "select *  from dbo.temp where Status like '%pending%' and (DATEDIFF(day,Weekend, '$d') > 0 or DATEDIFF(day,Weekend, '$d') = 0) and (Wflag=0 or Wflag=1) and Checklist_flag=0 ORDER BY ID DESC";

$result2=$conn->query($sql2);
//while($row=$result->fetch())
//echo $sql2;
 while($row2=$result2->fetch())
{
  
?>
                          
<!---------------------------------------------------------------------------------------------->
 <li >
                                <a href="#">
                                   <div class="task-info" >
                                        <div class="desc" ><span style='font-size:9px'><?php 
                                        $string = explode(' ', $row2['Message']);
    if (empty($string) == false) {
        $string = array_chunk($string, 5);
        $string = $string[0];
    }
    $string = implode(' ', $string);
   // return $string;



                                        echo  $string."     [".$row2['Client']."]";?></span></div>
                                       <!-- <div class="percent">40%</div>-->
                                        <?php
                                       if($row2['Comments']=="")
                                       {
                                        echo "<img src='assets/img/initiated.png'/>";
                                      }
                                      else
                                      {
                                      echo "<img src='assets/img/working.png'/>";
                                    }
                                    ?>
                                    </div>
                                   <!-- <div class="progress progress-striped">
                                        <!--<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>

                                    </div>-->
                                </a>
                            </li>

<?php

}
?>



<!-------------------------------------------------------------------------------------------------->
                            <!--<li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Zac Snider</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hi mate, how is everything?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Divya Manian</span>
                                    <span class="time">40 mins.</span>
                                    </span>
                                    <span class="message">
                                     Hi, I need your help with this.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-danro.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Dan Rogers</span>
                                    <span class="time">2 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Love your new Dashboard.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-sherman.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Dj Sherman</span>
                                    <span class="time">4 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Please, answer asap.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">See all messages</a>
                            </li>-->
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
              </ul>
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
              
                  <p class="centered"><a href="#"> <?php
                    if($_SESSION["user"]=="shadab.k")
                    {

                   echo "<img src='assets/img/shaad.jpg' class='img-circle' width='60'></a></p>";
                 }
                 else
                 {
                  echo "<img src='assets/img/user.png' class='img-circle' width='60'></a></p>";
                 }
                 ?></p>
                  <h5 class="centered"><?php echo $_SESSION["user"];?></h5>
                    
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
                          <li><a  href="home.php">Today's Pending Tasks</a></li>
                          <li><a  href="weekdays.php?wflag=0">Weekdays</a></li>
                          <li><a  href="weekdays.php?wflag=1">Weekends</a></li>
                           <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span style="color:white">Checklist</span>
                      </a>
                           <ul class="sub">
                            <li><a  href="home.php?chk=1&status=1" onclick="myFunction1()">pending</a></li>
                            <li><a  href="home.php?chk=1&status=0" onclick="myFunction1()">Closed</a></li>
                           </ul>
                           <li><a  href="#">Calendar</a></li>
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
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Email Form</h3>
          	<div align="right"><a href="home.php"><img src="/assets/img/home.png"/><a>
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <div align="right"><h4 class="mb">
                       <form method="POST" action="">
                      Select template
                            <select name="template" size="1" style="max-width:50%;">
                              <option value="None">None</option>
                              <?php
                              $t = "select Client from dbo.template";


$r=$conn->query($t);
//while($row=$result->fetch())
//echo $sql2;
 while($r4=$r->fetch())
{
 
?>
  <option value="<?php echo $r4['Client'];?>"><?php echo $r4['Client'];?></option>
  <!--<option value="HUDSON">Hudson</option>-->
  <?php
}
  ?>
</select>
<input type="image" src="assets/img/apply.png" alt="Apply">
</form>


                      </h4>
                    </div>
                      
                      <form class="form-horizontal style-form" method="POST" action="email_cust.php">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" for="tags">sender</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control"  name="sender" id="tags" value="<?php echo $sendr;?>">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" for="tags2">Recipients</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="res" id="tags2" value="<?php echo $recp;?>">
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Subject</label>
                              <?php 
                              $addcode=$_GET['addcode'];
                              if($addcode==0)
                                {?>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control round-form" name="sub" placeholder="<?php echo $_GET['sub'].' (^'.$_GET['ID'].')';?>">
                                  <input type="hidden" value="<?php echo $_GET['sub'].' (^'.$_GET['ID'].')';?>" name="sub2"/>
                                  <input type="hidden" value="<?php echo $_GET['ID'];?>" name="ID"/>
                            

                              </div>
                              <?php
                            }
                            else
                            {
                            ?>
                            <div class="col-sm-10">
                                  <input type="text" class="form-control round-form" name="sub" placeholder="<?php echo $_GET['sub'];?>">
                                  <input type="hidden" value="<?php echo $_GET['sub'];?>" name="sub2"/>
                                  <input type="hidden" value="<?php echo $_GET['ID'];?>" name="ID"/>
                              </div>
                             
                                  
                              <?php
                            }
                            ?>
                            
                              
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email Body</label>
                              <div class="col-sm-10">
                                 <textarea style="height: 200px;" cols="126" id="area5" name="body" ><span style="font-family: Calibri;font-size: 14px;color:blue;"><?php echo $body;?><br><br><br><hr>STATEMENT OF CONFIDENTIALITY:
 
The information contained in this message and any attachments to this message are intended for the exclusive use of the addressee(s) and may contain confidential or privileged information. If you are not the intended recipient, please notify the sender and destroy all copies of this message and any attachments.
P Please consider the environment before printing this email.<hr>
<?php
$link=$_GET['link'];
$lk= "../$link";
//echo $lk;
$myfile = fopen("$lk", "r") or die("New Ticket");
//$myfile = preg_replace("/\r\n|\r|\n/",'<br/>',$myfile);
//echo fread($myfile,filesize("$lk"));
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}

fclose($myfile);
//echo $row['Attachment'];

?>

</span>
</textarea>  
                              </div>
                          </div>
                          <div class="form-group">
                              <!--<label class="col-sm-2 col-sm-2 control-label">Disabled</label>-->
                              <div class="col-sm-10" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   <a href='#' title="Click to Save" style="background-color:#FFFFFF;color:#000000;text-decoration:none"> <input type="image" src="assets/img/email.png" alt="Submit"><!--<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>--></a></td>
                                 
                              </div>
                          </div>
                         <!--<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Placeholder</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="placeholder">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password</label>
                              <div class="col-sm-10">
                                  <input type="password"  class="form-control" placeholder="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">Static control</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static">email@example.com</p>
                              </div>
                          </div>-->
                             
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
          	<!-- INLINE FORM ELELEMNTS -->
          <!--	<div class="row mt">
          		<div class="col-lg-12">
          			<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>
                      <form class="form-inline" role="form">
                          <div class="form-group">
                              <label class="sr-only" for="exampleInputEmail2">Email address</label>
                              <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                          </div>
                          <div class="form-group">
                              <label class="sr-only" for="exampleInputPassword2">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                          </div>
                          <button type="submit" class="btn btn-theme">Sign in</button>
                      </form>
          			</div><!-- /form-panel -->
          	<!--	</div><!-- /col-lg-12 -->
          	<!--</div><!-- /row -->
          	
          	<!-- INPUT MESSAGES -->
          <!--	<div class="row mt">
          		<div class="col-lg-12">
          			<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Input Messages</h4>
                          <form class="form-horizontal tasi-form" method="get">
                              <div class="form-group has-success">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Input with success</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="inputSuccess">
                                  </div>
                              </div>
                              <div class="form-group has-warning">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputWarning">Input with warning</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="inputWarning">
                                  </div>
                              </div>
                              <div class="form-group has-error">
                                  <label class="col-sm-2 control-label col-lg-2" for="inputError">Input with error</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="inputError">
                                  </div>
                              </div>
                          </form>
          			</div><!-- /form-panel -->
          		<!--</div><!-- /col-lg-12 -->
          	<!--</div><!-- /row -->
          	
          	<!-- INPUT MESSAGES -->
          	<!--<div class="row mt">
          		<div class="col-lg-12">
          			<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Checkboxes, Radios & Selects</h4>
						<div class="checkbox">
						  <label>
						    <input type="checkbox" value="">
						    Option one is this and that&mdash;be sure to include why it's great
						  </label>
						</div>
						
						<div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
						    Option one is this and that&mdash;be sure to include why it's great
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
						    Option two can be something else and selecting it will deselect option one
						  </label>
						</div>
						
						<hr>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
						</label>
						
						<hr>
						<select class="form-control">
						  <option>1</option>
						  <option>2</option>
						  <option>3</option>
						  <option>4</option>
						  <option>5</option>
						</select>
						<br>
						<select multiple class="form-control">
						  <option>1</option>
						  <option>2</option>
						  <option>3</option>
						  <option>4</option>
						  <option>5</option>
						</select>        		
          			</div><!-- /form-panel -->
          <!--		</div><!-- /col-lg-12 -->
          		
          	<!-- CUSTOM TOGGLES -->
          	<!--	<div class="col-lg-12">
          			<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Custom Toggles</h4>
                          <div class="row mt">
                              <div class="col-sm-6 text-center">
                                  <input type="checkbox" checked="" data-toggle="switch" />
                              </div>
                              <div class="col-sm-6 text-center">
                                  <input type="checkbox" data-toggle="switch" />
                              </div>
                          </div>
                          <div class="row mt">
                              <div class="col-sm-6 text-center">
                                  <div class="switch switch-square"
                                       data-on-label="<i class=' fa fa-check'></i>"
                                       data-off-label="<i class='fa fa-times'></i>">
                                      <input type="checkbox" />
                                  </div>
                              </div>
                              <div class="col-sm-6 text-center">
                                  <div class="switch switch-square"
                                       data-on-label="<i class=' fa fa-check'></i>"
                                       data-off-label="<i class='fa fa-times'></i>">
                                      <input type="checkbox" checked="" />
                                  </div>
                              </div>
                          </div>
                          <div class="row mt">
                              <div class="col-sm-6 text-center">
                                  <input type="checkbox" disabled data-toggle="switch" />
                              </div>
                              <div class="col-sm-6 text-center">
                                  <input type="checkbox" checked disabled data-toggle="switch" />
                              </div>
                          </div>
          			</div>
          		</div>
          	</div><!-- /row -->
          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
               2015 - Continuitys
              <a href="form_component.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
