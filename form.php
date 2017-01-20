<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php
  $ID=$_GET['ID'];
  ?>
  <style>
  body{
    background-color:#001a33;
  }
  .clear{

    padding:2px;
    
    
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
  </style>
</head>
<body>

<div class="container">
<br>
  <div class="panel panel-primary">
    <div class="panel-heading">Edit Form For Ticket ID: <?php Echo $ID;?></div>
    <div class="panel-body"><form><div class="row clear">
  <!--<div class="col-xs-3">Ticket Id <span class="glyphicon glyphicon-info-sign"></span> </div><div class="col-xs-3"><input type="text"/></div>
  <div class="col-xs-3">Created By <span class="glyphicon glyphicon-info-sign"></span> </div><div class="col-xs-3"><input type="text"/></div>
  -->
<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">Ticket Id <span class="glyphicon glyphicon-info-sign
"></span></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="<?php Echo $ID;?>" disabled>
  </div>

</div>
<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">CreatedBy <span class="glyphicon glyphicon-info-sign
"></span></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="CreatedBy">
  </div>
  </div>
  </div>

  <div class="row clear">
  
<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">Client  <span class="glyphicon glyphicon-info-sign
"></span></label>
    <select class="form-control">
  <option>Recall</option>
  <option>GatesAir</option>
  <option>BCD</option>
  <option>Brinks</option>
  <option>Cronos</option>
</select>
  </div>

</div>
<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">CreationDateTime <span class="glyphicon glyphicon-info-sign
"></span></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Created Date time">
  </div>
  </div>
  </div>
<!-- ******************************* -->

<div class="row clear">
  
<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">Project <span class="glyphicon glyphicon-info-sign
"></span></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="project">
  </div>

</div>
<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">UpdatedBy <span class="glyphicon glyphicon-info-sign
"></span></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="updatedBy">
  </div>
  </div>
  </div>
  <!-- ******************************* -->

<div class="row clear">

<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">Assigned To <span class="glyphicon glyphicon-info-sign
"></span></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Assigned To" >
  </div>

</div>
<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">UpadationDateTime <span class="glyphicon glyphicon-info-sign
"></span></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="UpadationDateTime">
  </div>
  </div>
  </div>
  <!-- ******************************* -->

<div class="row clear">

<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">Status <span class="glyphicon glyphicon-info-sign
"></span></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Status">
  </div>

</div>
<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">Resolver <span class="glyphicon glyphicon-info-sign
"></span></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Resolver">
  </div>
  </div>
  </div>
  <!-- ******************************* -->

<div class="row clear">
  
<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">Environment <span class="glyphicon glyphicon-info-sign
"></span></label>
     <select class="form-control">
  <option>Prod</option>
  <option>Non-Prod</option>
  
</select>
  </div>

</div>
<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">ResolvedBy <span class="glyphicon glyphicon-info-sign
"></span></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ResolvedBy">
  </div>
  </div>
  </div>
  <!-- ******************************* -->

<div class="row clear">
  
<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">Shift <span class="glyphicon glyphicon-info-sign
"></span></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Shift">
  </div>

</div>
<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">Reviewer <span class="glyphicon glyphicon-info-sign
"></span></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Reviewer">
  </div>
  </div>
  </div>
  <!-- ******************************* -->
<div class="row clear">
  
<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">Discription <span class="glyphicon glyphicon-info-sign
"></span></label>
<textarea class="form-control" rows="3" placeholder="Discription" disabled></textarea>
    
  </div>
  </div>
  <div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">Comments <span class="glyphicon glyphicon-info-sign
"></span></label>
<textarea class="form-control" rows="3" placeholder="Comments" ></textarea>
    
  </div>

</div>
</div>
<div class="row clear">
  
<div class="col-xs-6">

<div class="form-group">
    <label for="exampleInputEmail1">ChangeStatus <span class="glyphicon glyphicon-info-sign
"></span></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ChangeStatus">
  </div>

</div>
<div class="col-xs-6" style="position:relative;left: 253px; top: 8px;">

<div class="form-group">
     <br>
  <button type="submit" class="btn btn-success">Submit To Save Changes</button>
  </div>
  </div>
  </div>


  </form> 
  <div class="row clear">
 <div class="col-xs-12">
  
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-success">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
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
