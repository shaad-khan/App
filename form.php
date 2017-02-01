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
  <?php
  session_start();

$user_session=$_SESSION["user"];
if($user_session=='')
{
   echo "<script> alert('Session Expired Please Relogin in app');
     setTimeout(function(){window.close()}, 1000);
     </script>";
}
  $ID=$_GET['ID'];
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

  </style>
</head>
<body>

<div class="container">
<br>
  <div class="panel panel-primary" ng-controller="Form_data">
    <div class="panel-heading" ng-init="ID='<?php Echo $ID;?>'">Edit Form For Ticket ID: {{ID}}  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-paperclip
"></span></button></div>
    <div class="panel-body" ><form class="form-inline" action="webservice/add.php"> 

<table>
<tr><td>

<div class="form-group">
    <label for="exampleInputEmail1">Ticket Id <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php Echo $ID;?>"  disabled>

  <input type="hidden" name="TID" value="<?php Echo $ID;?>"/>
  </div>

</div></td>
<td>

<div class="form-group">
    <label for="exampleInputEmail1">CreatedBy <span class="glyphicon glyphicon-info-sign"></span></label></td><td>
    <input type="hidden" value="{{items[0].Creator}}" name="creator"/>
    <input type="Text" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].Creator}}" disabled>
  </div>
  </td>
  <td>

    <div class="form-group">
    <label for="exampleInputEmail1">Client  <span class="glyphicon glyphicon-info-sign
"></span></label></td><td ng-if="items[0].Client==''">
    
    <select class="form-control" name="client">
  <option ng-repeat="list in lists" value="{{list.Client_name}}">{{list.Client_name}}</option>
</select>
  </div>
  </td>
  <td ng-if="items[0].Client!=''">
     <input type="Text" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].Client}}" disabled>
    
  </div>
  </td>
</tr>
<tr>
  <td>
<div class="form-group">
    <label for="exampleInputEmail1">CreationDateTime <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].Cdatetime}}" disabled>
  </div>
    </td><td>
<div class="form-group">
    <label for="exampleInputEmail1">Project <span class="glyphicon glyphicon-info-sign
"></span></label></td><td ng-if="items[0].Project==''">
   <select class="form-control" name="project" >
  <option ng-repeat="project in projects" value="{{project.Project}}">{{project.Project}}</option>
</select>
  </div></td>
  
  <td ng-if="items[0].Project!=''">
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].Project}}" disabled>
  </div></td>
  
  
  <td>
<div class="form-group">
    <label for="exampleInputEmail1">UpdatedBy <span class="glyphicon glyphicon-info-sign
"></span></label></td><td> <input type="hidden" value="<?php echo $user_session;?>" name="uname">
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $user_session;?>"  disabled>
  </div></td>
  </tr>
<tr> <td>
<div class="form-group">
    <label for="exampleInputEmail1">Assigned To <span class="glyphicon glyphicon-info-sign
"></span></label> </td> <td><input type="hidden" name="assign" value="{{items[0].Assign_to}}"/>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].Assign_to}}" name="aname" disabled>
  </div> </td>
 <td>
<div class="form-group">
    <label for="exampleInputEmail1">UpadateDateTime <span class="glyphicon glyphicon-info-sign
"></span></label> </td><input type="hidden" value="{{date | date:'yyyy-MM-dd HH:mm:ss'}}" name="utime"/>
     <td><input type="text" class="form-control"  id="exampleInputEmail1" placeholder="{{date | date:'yyyy-MM-dd HH:mm:ss'}}" disabled>
  </div> </td>
 <td>
  <div class="form-group">
    <label for="exampleInputEmail1">Status <span class="glyphicon glyphicon-info-sign
"></span></label> </td> <td><input type="hidden" class="form-control" name="status" value="{{items[0].Status}}"/>
    <input type="text" class="form-control"  id="exampleInputEmail1" placeholder="{{items[0].Status}}" disabled/>
  </div> </td>

  <tr>
<!--<td>
<div class="form-group">
    <label for="exampleInputEmail1">Resolver <span class="glyphicon glyphicon-info-sign
"></span></label>
</td>
<td>
  <input type="email" class="form-control" name="resolver" id="exampleInputEmail1" placeholder="Resolver">
  </div>
  </td>-->
<!--<td>
<div class="form-group">
    <label for="exampleInputEmail1">ResolvedBy <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
    <input type="text" class="form-control" name="resolver" id="exampleInputEmail1" placeholder="{{items[0].Resolved_By}}" disabled>
  </div>
  </td>-->
   <td >

      <div class="form-group">
    <label for="exampleInputEmail1">Discription <span class="glyphicon glyphicon-info-sign
"></span></label></td><td colspan="8">
<textarea class="form-control" rows="3" cols="116" name="discription" placeholder="Discription" disabled>{{items[0].Tdiscription}}</textarea>
    
  </div>
      </td>
      </tr>
      </table>
      <hr/>
      <table>
      <!--  <tr>
   <td>
    <div class="form-group">
    <label for="exampleInputEmail1">Environment Type <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
     <select class="form-control" name="env">
  <option value="Prod">Prod</option>
    <option value="Non-Prod">Non-Prod</option>
</select>
  </div>

    </td>
  <td>
    <div class="form-group">
    <label for="exampleInputEmail1">Shift <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
     <select class="form-control" name="schedule">
  <option ng-repeat="schedule in schedules" value="{{schedule.title}}">{{schedule.title}}</option>
</select>
  </div>

    </td>
    <td>

<div class="form-group" >
    <label for="exampleInputEmail1">ChangeStatus <span class="glyphicon glyphicon-info-sign
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
    <label for="exampleInputEmail1">Reviewer <span class="glyphicon glyphicon-info-sign
"></span></label> </td><td>
    <input type="text" class="form-control" name="reviewer" id="exampleInputEmail1" placeholder="Reviewer">
  </div>

      </td>
      
       <td>
<div class="form-group">
    <label for="exampleInputEmail1">Comments <span class="glyphicon glyphicon-info-sign
"></span></label></td><td colspan="8">
<textarea class="form-control" rows="3" cols="116" name="comments" placeholder="Comments" required></textarea>
    
  </div>
      
      </td>
    </tr>
    <tr>

<td>
<div class="form-group" >
    <label for="exampleInputEmail1">Enter Time<span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
    <input type="number" class="form-control" name="ttime" id="exampleInputEmail1" placeholder="Time In min" required>
  </div>

</td><td>
  <div class="form-group">
    <label for="exampleInputEmail1">Select Type Of Task <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
     <select class="form-control selectpicker" name="tcategory">

  <option ng-repeat="task in tasks" value="{{task.Category}}">{{task.Category}}</option>
</select>
  </div>

  </td>
</tr>
<tr><td>
<div class="form-group" >
    <label for="exampleInputEmail1">Select if waithing for User response<span class="glyphicon glyphicon-info-sign
"></span></label></td><td>

  <td style="position:relative;left: -285px;">
  <div class="material-switch pull-right">
                            <input id="someSwitchOptionSuccess" name="AUI" type="checkbox"/>
                            <label for="someSwitchOptionSuccess" class="label-success"></label>
                        </div>

  </td>
</td><td>
<div class="form-group" >
    <label for="exampleInputEmail1">Release The Ticket<span class="glyphicon glyphicon-info-sign
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
    <label for="exampleInputEmail1">Environment Type <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
     <select class="form-control" name="env">
  <option value="Prod">Prod</option>
    <option value="Non-Prod">Non-Prod</option>
</select>
  </div></td>
<td>

<div class="form-group">
    <label for="exampleInputEmail1">Shift <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
     <select class="form-control" name="schedule">
  <option ng-repeat="schedule in schedules" value="{{schedule.title}}">{{schedule.title}}</option>
</select>
  </div>
  </td>
  
</tr>
<tr>
<td>
  <div class="form-group">
    <label for="exampleInputEmail1">Select Type Of Task <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
     <select class="form-control selectpicker" name="tcategory">

  <option ng-repeat="task in tasks" value="{{task.Category}}">{{task.Category}}</option>
</select>
  </div>

  </td>
<td>

   <div class="form-group" >
    <label for="exampleInputEmail1">ChangeStatus <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
    <select class="form-control" name="cstatus" >
  <option value="WIP">Work In progress</option>
  <option value="next">Next Status</option>
  
</select>
  </div>
  </td>
  </tr>
  <tr>
<td>
<div class="form-group" >
    <label for="exampleInputEmail1">If waithing for User response<span class="glyphicon glyphicon-info-sign
"></span></label></td><td>

  <td style="position:relative;left: -490px;">
  <div class="material-switch pull-right">
                            <input id="someSwitchOptionSuccess" name="AUI" type="checkbox"/>
                            <label for="someSwitchOptionSuccess" class="label-success"></label>
                        </div>

  </td>

    </tr>
<tr>
  <td>
<div class="form-group" >
    <label for="exampleInputEmail1">Enter Time<span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
    <input type="number" class="form-control" name="ttime" id="exampleInputEmail1" placeholder="Time In min" required>
  </div>
    </td>
  </tr>
<tr> <td>
<div class="form-group">
    <label for="exampleInputEmail1">Comments <span class="glyphicon glyphicon-info-sign
"></span></label></td><td colspan="8">
<textarea class="form-control" rows="3" cols="110" name="comments" placeholder="Comments" required></textarea>
    
  </div> </td>
 

  <tr>
<!--<td>
<div class="form-group">
    <label for="exampleInputEmail1">Resolver <span class="glyphicon glyphicon-info-sign
"></span></label>
</td>
<td>
  <input type="email" class="form-control" name="resolver" id="exampleInputEmail1" placeholder="Resolver">
  </div>
  </td>-->
<!--<td>
<div class="form-group">
    <label for="exampleInputEmail1">ResolvedBy <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
    <input type="text" class="form-control" name="resolver" id="exampleInputEmail1" placeholder="{{items[0].Resolved_By}}" disabled>
  </div>
  </td>-->
   <td >

      <div class="form-group">
  <button type="submit" class="btn btn-success">Submit To Save Changes</button>
  </div>
      </td>
      </tr>


  
</table>


  </form> 
  <div class="row clear">
 <div class="col-xs-12">
  <h4>Update History</h4>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" ng-controller="update" ng-init="ID='<?php Echo $ID;?>'">
  <div class="panel panel-info" ng-repeat="update in updates">
    <div class="panel-heading" role="tab" id="heading{{update.UID}}">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{update.UID}}" aria-expanded="false" aria-controls="collapse{{update.UID}}">
  <span class="glyphicon glyphicon-pushpin"> </span> Updater Name: {{update.UpdateBy}} [DateTime: {{update.UpdateTime}} ]        <span class="glyphicon glyphicon-flag" ng-if="update.AUI_flag==1" style="color:red"></span>
        </a>
      </h4>
    </div>
    <div id="collapse{{update.UID}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{update.UID}}">
      <div class="panel-body">
        {{update.Comments}} 
      </div>
    </div>
  </div>
 
  </div>
  <!--
  <div class="row clear">
  <div class="col-xs-3">Project <span class="glyphicon glyphicon-info-sign"></span> </div><div class="col-xs-3"><input type="text"/></div>
  <div class="col-xs-3">Updated By <span class="glyphicon glyphicon-info-sign"></span> </div><div class="col-xs-3"><input type="text"/></div>
  
  </div>
  <div class="row clear">
  <div class="col-xs-3 ">Assigned To <span class="glyphicon glyphicon-info-sign"></span> </div><div class="col-xs-3"><input type="text"/></div>
  <div class="col-xs-3">Updated Date Time <span class="glyphicon glyphicon-info-sign"></span></div><div class="col-xs-3"><input type="text"/></div>
  
  </div>
  <div class="row clear">
  <div class="col-xs-3">Assigned To <span class="glyphicon glyphicon-info-sign"></span></div><div class="col-xs-3"><input type="text"/></div>
  <div class="col-xs-3">Updated Date Time <span class="glyphicon glyphicon-info-sign"></span></div><div class="col-xs-3"><input type="text"/></div>
  </div>-->
  </div>
</div>

<!--/*************************************** Modal Code*************************************/-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-envelope
">   Email Chain</span></h4>
      </div>
     
     <div class="panel panel-default">
  
  <div class="panel-body">
    
                                  <textarea class="form-control" rows="30" cols="100" name="comments" placeholder="Comments" disabled>
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
</body>
</html>
