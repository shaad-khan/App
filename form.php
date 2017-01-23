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
  <?php
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
      width: 1259px;
}
  </style>
</head>
<body>

<div class="container">
<br>
  <div class="panel panel-primary" ng-controller="Form_data">
    <div class="panel-heading" ng-init="ID='<?php Echo $ID;?>'">Edit Form For Ticket ID: {{ID}}</div>
    <div class="panel-body" ><form class="form-inline" ng-submit="add();"> 

<table>
<tr><td>
<div class="form-group">
    <label for="exampleInputEmail1">Ticket Id <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php Echo $ID;?>" name="TID" disabled>
  </div>

</div></td>
<td>

<div class="form-group">
    <label for="exampleInputEmail1">CreatedBy <span class="glyphicon glyphicon-info-sign"></span></label></td><td>
    <input type="Text" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].Resolver}}" disabled>
  </div>
  </td>
  <td>

    <div class="form-group">
    <label for="exampleInputEmail1">Client  <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
    
    <select class="form-control" >
  <option ng-repeat="list in lists" value="{{list.Client_name}}">{{list.Client_name}}</option>
</select>
  </div>
  </td>
</tr>
<tr>
  <td>
<div class="form-group">
    <label for="exampleInputEmail1">CreationDateTime <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].Cdatetime}}" disabled>
  </div>
    </td><td>
<div class="form-group">
    <label for="exampleInputEmail1">Project <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="project">
  </div></td><td>
<div class="form-group">
    <label for="exampleInputEmail1">UpdatedBy <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="updatedBy">
  </div></td>
  </tr>
<tr> <td>
<div class="form-group">
    <label for="exampleInputEmail1">Assigned To <span class="glyphicon glyphicon-info-sign
"></span></label> </td> <td>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Assigned To" >
  </div> </td>
 <td>
<div class="form-group">
    <label for="exampleInputEmail1">UpadateDateTime <span class="glyphicon glyphicon-info-sign
"></span></label> </td>
     <td><input type="email" class="form-control" id="exampleInputEmail1" placeholder="UpadationDateTime">
  </div> </td>
 <td>
  <div class="form-group">
    <label for="exampleInputEmail1">Status <span class="glyphicon glyphicon-info-sign
"></span></label> </td> <td>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="{{items[0].Status}}" required>
  </div> </td>
  <tr>
<td>
<div class="form-group">
    <label for="exampleInputEmail1">Resolver <span class="glyphicon glyphicon-info-sign
"></span></label>
</td>
<td>
  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Resolver">
  </div>
  </td>
<td>
<div class="form-group">
    <label for="exampleInputEmail1">ResolvedBy <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ResolvedBy">
  </div>
  </td>
  <td>
    <div class="form-group">
    <label for="exampleInputEmail1">Shift <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
     <select class="form-control" >
  <option ng-repeat="schedule in schedules" value="{{schedule.title}}">{{schedule.title}}</option>
</select>
  </div>

    </td>
  </tr>
  <tr>
    <td>
<div class="form-group">
    <label for="exampleInputEmail1">Reviewer <span class="glyphicon glyphicon-info-sign
"></span></label> </td><td>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Reviewer">
  </div>

      </td>
       <td>

      <div class="form-group">
    <label for="exampleInputEmail1">Discription <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
<textarea class="form-control" rows="3" cols="25" placeholder="Discription" disabled>{{items[0].Tdiscription}}</textarea>
    
  </div>
      </td>
       <td>
<div class="form-group">
    <label for="exampleInputEmail1">Comments <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
<textarea class="form-control" rows="3" cols="30" placeholder="Comments" ></textarea>
    
  </div>
      
      </td>
    </tr>
    <tr>
<td>

<div class="form-group" >
    <label for="exampleInputEmail1">ChangeStatus <span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ChangeStatus">
  </div>
  </td>
<td>
<div class="form-group" >
    <label for="exampleInputEmail1">Enter Time<span class="glyphicon glyphicon-info-sign
"></span></label></td><td>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Time In min">
  </div>

</td><td>
<div class="form-group" >
    <label for="exampleInputEmail1">Select if waithing for User response<span class="glyphicon glyphicon-info-sign
"></span></label></td><td>

  <td style="position:relative;left: -256px;">
<input type="checkbox" name="vehicle" value="1">

  </td>
</tr>
<tr>
  <td style="position:relative;left: -2px;">
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
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
  <span class="glyphicon glyphicon-pushpin"> </span> Updater Name: Shadab Khan [DateTime:20/01/2017 10:30 pm]
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <span class="glyphicon glyphicon-pushpin"> </span> Updater Name: Ashish Kumar2  [DateTime:20/01/2017 8:30 pm]
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <span class="glyphicon glyphicon-pushpin"> </span> Updater Name: Anmol [DateTime:20/01/2017 11:30 pm]
        </a>

      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
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

</body>
</html>
