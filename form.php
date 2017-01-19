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
    background-color:black;
  }
  .clear{

	  padding:10px;
	  
  }
  </style>
</head>
<body>

<div class="container">
<br>
  <div class="panel panel-primary">
    <div class="panel-heading">Edit Form For Ticket ID: <?php Echo $ID;?></div>
    <div class="panel-body"><div class="row clear">
	<div class="col-xs-3 glyphicon glyphicon-pencil">Ticket Id : </div><div class="col-xs-3"><input type="text"/></div>
	<div class="col-xs-3 glyphicon glyphicon-pencil">Created By : </div><div class="col-xs-3"><input type="text"/></div>
	
	</div>
	
	<div class="row clear">
	<div class="col-xs-3 glyphicon glyphicon-pencil">Client : </div><div class="col-xs-3"><input type="text"/></div>
	<div class="col-xs-3 glyphicon glyphicon-pencil">Created Date Time :</div><div class="col-xs-3"><input type="text"/></div>
	
	</div>
	<div class="row clear">
	<div class="col-xs-3 glyphicon glyphicon-pencil">Project : </div><div class="col-xs-3"><input type="text"/></div>
	<div class="col-xs-3 glyphicon glyphicon-pencil">Updated By : </div><div class="col-xs-3"><input type="text"/></div>
	
	</div>
	<div class="row clear">
	<div class="col-xs-3 glyphicon glyphicon-pencil">Assigned To : </div><div class="col-xs-3"><input type="text"/></div>
	<div class="col-xs-3 glyphicon glyphicon-pencil">Updated Date Time :</div><div class="col-xs-3"><input type="text"/></div>
	
	</div>
	<div class="row clear">
	<div class="col-xs-3 glyphicon glyphicon-pencil">Assigned To :</div><div class="col-xs-3"><input type="text"/></div>
	<div class="col-xs-3 glyphicon glyphicon-pencil">Updated Date Time :</div><div class="col-xs-3"><input type="text"/></div>
	</div>
  </div>
</div>

</body>
</html>
