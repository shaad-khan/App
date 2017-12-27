<!DOCTYPE html>
<html lang="en" ng-app="continuity_form">
<head>
  <title>Form Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
   <script src="https://apps.continuserve.com/angular/Contoller_form.js"></script>
   
   <script src="angular/Controller_form.js"></script>
    <link rel="stylesheet" type="text/css" href="dateresource/jquery.datetimepicker.css"/>
<script src="dateresource/jquery.js"></script>
 <script src="dateresource/jquery.datetimepicker.js"></script>
  <?php
  session_start();
$user_session=$_SESSION["user"];
$admin=$_SESSION["admin"];
if($user_session=='')
{
  
   echo "<script> alert('Session Expired Please Relogin in app');
     setTimeout(function(){window.close()}, 1000);
     </script>";
}
  $ID=$_GET['ID'];

$server = "gjtz209gib.database.windows.net";
$user = "CSL3AppsUser@gjtz209gib";
$pwd = "C0ntinue2$3rve";
$db = "CSL2AppsDB";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $sql="select * from repo where tid='$ID'";
    $result=$conn->query($sql);

  while($row4=$result->fetch())
{
  $link=$row4['link'];
}

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
.panel-primary {
    border-color: #337ab7;
    width: 1151px;
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

<div class="container">
<br>
  <div class="panel panel-primary" ng-controller="Form_data">
    <div class="panel-heading" ng-init="ID='<?php Echo $ID;?>'">Edit Form For Ticket ID: {{ID}}  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-envelope
"></span></button> <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg2"><span class="glyphicon glyphicon-comment
"></span></button>&nbsp;<button type="button" class="btn btn-primary"><a href="<?php Echo $link;?>" style="text-decoration:none;color:white"><span class="glyphicon glyphicon-paperclip
"></span></a></button></div>
    <div class="panel-body" ng-init="User='<?php Echo $user_session;?>'"><form class="form-inline" action="webservice/add.php" method="POST" enctype="multipart/form-data"> 

<table>
<tr><td>

<div class="form-group">
    <label for="exampleInputEmail1">Ticket Id <span class=""></span></label></td><td>
  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php Echo $ID;?>"  disabled>

  <input type="hidden" name="TID" value="<?php Echo $ID;?>"/>
  </div>

</div></td>
<td>

<div class="form-group">
    <label for="exampleInputEmail1">CreatedBy <span class=""></span></label></td><td>
    <input type="hidden" value="{{items[0].Creator}}" name="creator"/>
    <input type="Text" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].Creator}}" disabled>
  </div>
  </td>
<!--  <td>

    <div class="form-group">
    <label for="exampleInputEmail1">Client  <span class="
"></span></label></td><td ng-if="items[0].Client==''">
    
    <select class="form-control" name="client">
  <option ng-repeat="list in lists" value="{{list.Client_name}}">{{list.Client_name}}</option>
</select>
  </div>
  </td>-->
  <td ng-if="items[0].Client!=''"> <div class="form-group">
    <label for="exampleInputEmail1">Client  <span class="
"></span></label></td><td ng-if="items[0].Client!=''">
     <input type="Text" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].Client}}" disabled>
    
  </div>
  </td>
</tr>
<tr>
  <td>
<div class="form-group">
    <label for="exampleInputEmail1">CreationDateTime <span class="
"></span></label></td><td>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].Cdatetime}}" disabled>
  </div>
    </td><td>
<div class="form-group">
    <label for="exampleInputEmail1">Project <span class="
"></span></label></td><td ng-if="items[0].Project==''">
   <select class="form-control" name="project" >
  <option ng-repeat="project in projects | orderBy" value="{{project.Project}}">{{project.Project}}</option>
</select>
  </div></td>
  
  <td ng-if="items[0].Project!=''">
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].Project}}" disabled>
  </div></td>
  
  
  <td>
<div class="form-group">
    <label for="exampleInputEmail1">UpdatedBy <span class="
"></span></label></td><td> <input type="hidden" value="<?php echo $user_session;?>" name="uname">
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $user_session;?>"  disabled>
  </div></td>
  </tr>
<tr> <td>
<div class="form-group">
    <label for="exampleInputEmail1">Assigned To <span class="
"></span></label> </td> <td><input type="hidden" name="assign" value="{{items[0].Assign_to}}"/>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].Assign_to}}" name="aname" disabled>
  </div> </td>
 <td>
<div class="form-group">
    <label for="exampleInputEmail1">UpadateDateTime <span class="
"></span></label> </td><input type="hidden" value="{{date | date:'yyyy-MM-dd HH:mm:ss'}}" name="utime"/>
     <td><input type="text" class="form-control"  id="exampleInputEmail1" placeholder="{{date | date:'yyyy-MM-dd HH:mm:ss'}}" disabled>
  </div> </td>
 <td>
  <div class="form-group">
    <label for="exampleInputEmail1">Status <span class="
"></span></label> </td> <td><input type="hidden" class="form-control" name="status" value="{{items[0].Status}}"/>
    <input type="text" class="form-control"  id="exampleInputEmail1" placeholder="{{items[0].Status}}" disabled/>
  </div> </td>

  <tr>
<!--<td>
<div class="form-group">
    <label for="exampleInputEmail1">Resolver <span class="
"></span></label>
</td>
<td>
  <input type="email" class="form-control" name="resolver" id="exampleInputEmail1" placeholder="Resolver">
  </div>
  </td>-->
<!--<td>
<div class="form-group">
    <label for="exampleInputEmail1">ResolvedBy <span class="
"></span></label></td><td>
    <input type="text" class="form-control" name="resolver" id="exampleInputEmail1" placeholder="{{items[0].Resolved_By}}" disabled>
  </div>
  </td>-->
   <td >

      <div class="form-group">
    <label for="exampleInputEmail1">Discription <span class="
"></span></label></td><td colspan="8">
<textarea class="form-control" rows="3" cols="118" name="discription" placeholder="Discription" disabled>{{items[0].Tdiscription}}</textarea>
    
  </div>
      </td>
      </tr>
      </table>
      <hr/>
      <table>
      <!--  <tr>
   <td>
    <div class="form-group">
    <label for="exampleInputEmail1">Environment Type <span class="
"></span></label></td><td>
     <select class="form-control" name="env">
  <option value="Prod">Prod</option>
    <option value="Non-Prod">Non-Prod</option>
</select>
  </div>

    </td>
  <td>
    <div class="form-group">
    <label for="exampleInputEmail1">Shift <span class="
"></span></label></td><td>
     <select class="form-control" name="schedule">
  <option ng-repeat="schedule in schedules" value="{{schedule.title}}">{{schedule.title}}</option>
</select>
  </div>

    </td>
    <td>

<div class="form-group" >
    <label for="exampleInputEmail1">ChangeStatus <span class="
"></span></label></td><td>
    <select class="form-control" name="cstatus" >
  <option value="WIP">Work In progress</option>
  <option value="next">Next Status</option>
  
</select>
  </div>
  </td>
  </tr>
  <tr>
    <!--<td>
<div class="form-group">
    <label for="exampleInputEmail1">Reviewer <span class="
"></span></label> </td><td>
    <input type="text" class="form-control" name="reviewer" id="exampleInputEmail1" placeholder="Reviewer">
  </div>

      </td>
      
       <td>
<div class="form-group">
    <label for="exampleInputEmail1">Comments <span class="
"></span></label></td><td colspan="8">
<textarea class="form-control" rows="3" cols="116" name="comments" placeholder="Comments" required></textarea>
    
  </div>
      
      </td>
    </tr>
    <tr>

<td>
<div class="form-group" >
    <label for="exampleInputEmail1">Enter Time<span class="
"></span></label></td><td>
    <input type="number" class="form-control" name="ttime" id="exampleInputEmail1" placeholder="Time In min" required>
  </div>

</td><td>
  <div class="form-group">
    <label for="exampleInputEmail1">Select Type Of Task <span class="
"></span></label></td><td>
     <select class="form-control selectpicker" name="tcategory">

  <option ng-repeat="task in tasks" value="{{task.Category}}">{{task.Category}}</option>
</select>
  </div>

  </td>
</tr>
<tr><td>
<div class="form-group" >
    <label for="exampleInputEmail1">Select if waithing for User response<span class="
"></span></label></td><td>

  <td style="position:relative;left: -285px;">
  <div class="material-switch pull-right">
                            <input id="someSwitchOptionSuccess" name="AUI" type="checkbox"/>
                            <label for="someSwitchOptionSuccess" class="label-success"></label>
                        </div>

  </td>
</td><td>
<div class="form-group" >
    <label for="exampleInputEmail1">Release The Ticket<span class="
"></span></label></td><td><td style="position:relative;left: -161px;">

                            <input type="checkbox" name="release" value="1" />
                           
                        </div>

  </td>
</td></tr><tr>
  <td style="position:relative;left: 453px;">
<div class="form-group">
  <button type="submit" class="btn btn-success">Submit To Save Changes</button>
  </div>
  </td>

  
      </tr>-->

<tr><td>

<div class="form-group">
    <label for="exampleInputEmail1">Environment Type <span class="
"></span></label></td><td ng-if="items[0].EnvType==''">
     <select class="form-control" name="env">
  <option value="Prod">Prod</option>
    <option value="Non-Prod">Non-Prod</option>
</select>
  </div></td>
  <td ng-if="items[0].EnvType!=''">
     <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].EnvType}}" disabled>
  </div></td>
<td>

<div class="form-group">
    <label for="exampleInputEmail1">Shift <span class="
"></span></label></td><td>
     <select class="form-control" name="schedule">
  <option ng-repeat="schedule in schedules" value="{{schedule.title}}">{{schedule.title}}</option>
</select>
  </div>
  </td>
  
</tr>
<tr>
<td ng-if="items[0].Status!='Classify'">
  <div class="form-group">
    <label for="exampleInputEmail1">Select Type Of Task <span class="
"></span></label></td><td ng-if="items[0].Status!='Classify'">
     <select class="form-control selectpicker" name="tcategory">

  <option ng-repeat="task in tasks | filter : items[0].Status" value="{{task.Category}}">{{task.Category}}</option>
</select>
  </div>

  </td>
<td ng-if="((items[0].Status=='Classify')||(items[0].Status=='WIP')||(items[0].Status=='AUI'))">

   <div class="form-group" >
    <label for="exampleInputEmail1">ChangeStatus <span class="
"></span></label></td><td ng-if="((items[0].Status=='Classify')||(items[0].Status=='WIP')||(items[0].Status=='AUI'))">
    <select class="form-control" name="cstatus" >
  <option value="WIP">Work In progress</option>
  <option value="next">Next Status</option>
  
</select>
  </div>
  </td>
  <td ng-if="(items[0].Status=='Review')">

   <div class="form-group" >
    <label for="exampleInputEmail1">ChangeStatus <span class="
"></span></label></td><td ng-if="(items[0].Status=='Review')">
    <select class="form-control" name="cstatus" >
  <option value="Closure">Closure</option>
  <option value="next">Next Status</option>
  
</select>
  </div>
  </td>
  <td ng-if="((items[0].Status=='Doc')||(items[0].Status=='Closure'))">

   <div class="form-group" >
    <label for="exampleInputEmail1">ChangeStatus <span class="
"></span></label></td><td ng-if="((items[0].Status=='Doc')||(items[0].Status=='Closure'))">
  
<input type="hidden" name="cstatus" value="next"/>
<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Next Status" disabled>
  </div>
  </td>
  <td ng-if="items[0].Status=='Classify'">
  <div class="form-group">
    <label for="exampleInputEmail1">Select Team {{items[0].team}} <span class="
"></span></label></td><td ng-if="items[0].team==null">
   <select class="form-control" name="cteam" >
  <option ng-repeat="t in cteams" value="{{t.Team}}" ng-selected="t.Team=='L3'">{{t.Team}}</option>
</select>
  </div></td>
  
  <td ng-if="items[0].team!=null&& items[0].Status=='Classify'">
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].team}}" disabled>
  </div></td>

  </td>
  </tr>
  <?php 

if($_SESSION['Doc']==1)
{?>
  <tr ng-if="items[0].Resolver == User && items[0].Status=='Doc'"><td>
    <div class="form-group" >
    <label for="exampleInputEmail1">Upload Documentation file (File size < 5 mb )</label></td><td>
    <input type="file"  name="dfile"/>
  </div>
  </td>
    </tr>
    <?php
}?>
  <tr>
<td ng-if="(items[0].Status=='WIP')||(items[0].Status=='AUI')">
<div class="form-group"  >
    <label for="exampleInputEmail1">If awaiting for User response<span class="
"></span></label></td><td ng-if="(items[0].Status=='WIP')||(items[0].Status=='AUI')" style="position:relative;left: -326px;">

  
  <div class="material-switch pull-right">
                            <input id="someSwitchOptionSuccess" name="AUI" type="checkbox"/>
                            <label for="someSwitchOptionSuccess" class="label-success"></label>
                        </div>

  </td>

    </tr>
    <tr>
      <td ng-if="items[0].Status=='Classify'">
<div class="form-group" >
    <label for="exampleInputEmail1">Client Ticket number <span class="
"></span></label></td><td ng-if="items[0].Status=='Classify'">
 <input type="text" class="form-control" id="exampleInputEmail1" name="client_tkt" placeholder="Client Ticket Number optional" />
  </td>
  <td ng-if="items[0].Status!='Classify' && items[0].CTicket!=''">
<div class="form-group" >
    <label for="exampleInputEmail1">Client Ticket number <span class="
"></span></label></td><td ng-if="items[0].Status!='Classify' && items[0].CTicket!=''">
 <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="{{items[0].CTicket}}" disabled/>
  </td>
      </tr>
<tr>
  <td>
<div class="form-group" >
    <label for="exampleInputEmail1">Enter Time<span class="
"></span></label></td><td ng-if="items[0].Status=='Classify'">
    <input type="number" class="form-control" name="ttime" id="exampleInputEmail1" placeholder="Time In min" disabled>
  </div>
    </td>
    <td ng-if="items[0].Status!='Classify' && items[0].Status!='Closure' && items[0].Status!='Close'">
    <input type="number" class="form-control" name="ttime" id="exampleInputEmail1" placeholder="Time In min" required>
  </div>

    </td>
    
     <td ng-if="items[0].Status=='Closure' || items[0].Status=='Close'">
    <input type="number" class="form-control" name="ttime" id="exampleInputEmail1" placeholder="{{items[0].Total_time}} min" disabled>
  </div>
  
    </td>
  <?php
  if($admin==1)
  {?>
    <td ng-if="items[0].Status=='Closure'"><div class="form-group" >
    <label for="exampleInputEmail1">Total Client Time</label>
    <input type="number" class="form-control" name="attime" id="exampleInputEmail1" placeholder="{{items[0].Total_time}} min" required>
  </div>
  
    </td>
    <?php
  }?>
<td ng-if="items[0].Status=='Close'"><div class="form-group" >
    <label for="exampleInputEmail1">Total Client Time</label>
    <input type="number" class="form-control" name="attime" id="exampleInputEmail1" placeholder="{{items[0].Total_client_time}} min" disabled>
  </div>
  
    </td>
  
  </tr>
<tr>

<td ><div class="form-group" >
    <label for="exampleInputEmail1">Adjust Update DateTime(Optional)</label>
  <!--  <input type="number" class="form-control" name="auptime" id="exampleInputEmail1" placeholder="{{items[0].Total_client_time}} min" disabled>
  --></td><td>
  <input type="text" class="form-control"  id="some_class_1" name="opdate" style="color:black" placeholder="Adujusted Update Date Time" ng-model="sdate"/>
          
  </div></td>
  
    </tr>

<tr> <td>
<div class="form-group">
    <label for="exampleInputEmail1">Comments <span class="
"></span></label></td><td colspan="8" ng-if="items[0].Status=='Classify' || items[0].Status=='Close'" >
<textarea class="form-control" rows="3" cols="110" name="comments" placeholder="Comments" disabled></textarea>
    
  </div> </td>
  <td colspan="8" ng-if="items[0].Status!='Classify' && items[0].Status!='Close'">
<textarea class="form-control" rows="3" cols="110" name="comments" placeholder="Comments"></textarea>
  <!-- <textarea class="form-control" rows="3" cols="110" name="comments" placeholder="Comments-optional"  ng-if="items[0].Status!='WIP' || items[0].Status!='AUI'"></textarea> 
 --> </div> </td>
 

  <tr>
  
<!--<td>
<div class="form-group">
    <label for="exampleInputEmail1">Resolver <span class="
"></span></label>
</td>
<td>
  <input type="email" class="form-control" name="resolver" id="exampleInputEmail1" placeholder="Resolver">
  </div>
  </td>-->
<!--<td>
<div class="form-group">
    <label for="exampleInputEmail1">ResolvedBy <span class="
"></span></label></td><td>
    <input type="text" class="form-control" name="resolver" id="exampleInputEmail1" placeholder="{{items[0].Resolved_By}}" disabled>
  </div>
  </td>-->
   <td >

      <div class="form-group">
  <button type="submit" class="btn btn-success" ng-if="items[0].Status=='Close'" disabled>Submit To Save Changes</button>
  <button type="submit" class="btn btn-success" ng-if="items[0].Status!='Close'">Submit To Save Changes</button>
  </div>
      </td>
      </tr>


  
</table>


  </form> 
 

<!--/*************************************** Modal Code*************************************/-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">EmailChain <span class="glyphicon glyphicon-envelope
"> </span></h4>
      </div>
     
     <div class="panel panel-default">
  
  <div class="panel-body">

    
                                  <textarea class="form-control" rows="20" cols="100" name="comments" placeholder="Comments" style="background-color:#f4f9fd;color:#1e1833;font-family:initial" disabled>
                                    <?php
//$lk= "/automation/resource/{{ID}}.txt";
$iparr = split ("CSTKT17", $ID); 
$tid=$iparr[1];

$lk="automation/resource/$tid/$tid.txt";
//echo $lk;
$myfile = fopen("$lk", "r") or die("New Ticket");

echo fread($myfile,filesize("$lk"));

fclose($myfile);
//echo $row['Attachment'];

?>

                                </textarea>

                               
  </div>
  
</div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
       <div class="modal-header"> 
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">Update History <span class="glyphicon glyphicon-comment
"> </span></h4>
     </div> <div class="row clear">
 <div class="col-xs-12">
  
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" ng-controller="update" ng-init="ID='<?php Echo $ID;?>'">
  <div class="panel panel-info" ng-repeat="update in updates">
    <div class="panel-heading" role="tab" id="heading{{update.UID}}">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{update.UID}}" aria-expanded="false" aria-controls="collapse{{update.UID}}">
  <span class="glyphicon glyphicon-pushpin"> </span> {{update.UpdateBy}} [ {{update.UpdateTime}} ]    [ <span class="glyphicon glyphicon-bookmark" style="color:green"></span><span style="color:green">{{update.TaskName}}</span>  ]    <span class="glyphicon glyphicon-flag" ng-if="update.AUI_flag==1" style="color:red"></span>
       [{{update.TimeTaken}} min]
        </a>
      </h4>
    </div>
    <div id="collapse{{update.UID}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{update.UID}}">
      <div class="panel-body">
        {{update.Comments}} 

        <p ng-if="update.Resolver">Resolver Name : [ {{update.Resolver}}]</p>
        <p>Status :[ {{update.Status}} ]</p>
        <p>Update Was Done in Shift: [{{update.Shift}}]
      </div>
    </div>
  </div>
 
  </div>
  
  </div>
</div>
    </div>
  </div>
</div>

</body>
<script>

window.onerror = function(errorMsg) {
  $('#console').html($('#console').html()+'<br>'+errorMsg)
}
//alert("hello");
 $(function() {
          $('#some_class_1').datetimepicker();
           $('#some_class_2').datetimepicker();
            $('#some_class_3').datetimepicker();
             $('#some_class_4').datetimepicker();
         });

         </script>
</html>
