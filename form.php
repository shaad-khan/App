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

	  padding:10px;
	  
  }
  .glyphicon-info-sign
{
  color:red;
}
  </style>
</head>
<body>

<div class="container">
<br>
  <div class="panel panel-primary">
    <div class="panel-heading">Edit Form For Ticket ID: <?php Echo $ID;?></div>
    <div class="panel-body"><form class="form-inline"><div class="row clear">
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
    <label for="exampleInputEmail1">Client <span class="glyphicon glyphicon-info-sign
"></span></label>
   <select class="form-control">
  <option>C1</option>
  <option>C2</option>
  <option>C3</option>
  <option>C4</option>
  <option>C5</option>
</select>
  </div>

</div>


</div>


	</div>
	
<!--	<div class="row clear">
	<div class="col-xs-3">Client <span class="glyphicon glyphicon-info-sign"></span> </div><div class="col-xs-3"><input type="text"/></div>
	<div class="col-xs-3">Created Date Time <span class="glyphicon glyphicon-info-sign"></span></div><div class="col-xs-3"><input type="text"/></div>
	
	</div>
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
