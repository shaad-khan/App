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
  .clear{

	  padding:12px;
	  
  }
  </style>
</head>
<body>

<div class="container">
<br>
  <div class="panel panel-primary">
    <div class="panel-heading">Edit Form For Ticket ID: <?php Echo $ID;?></div>
    <div class="panel-body"><div class="row clear">
	<div class="col-xs-3">Ticket Id : <input type="text"/></div>
	<div class="col-xs-3">Created By : <input type="text"/></div>
	
	</div>
	
	<div class="row clear">
	<div class="col-xs-3">Client : <input type="text"/></div>
	<div class="col-xs-3">Created Date Time :</div><div class="col-xs-3"><input type="text"/></div>
	
	</div>
	<div class="row clear">
	<div class="col-xs-3">Project : <input type="text"/></div>
	<div class="col-xs-3">Updated By : <input type="text"/></div>
	
	</div>
	<div class="row clear">
	<div class="col-xs-3">Assigned To : <input type="text"/></div>
	<div class="col-xs-3">Updated Date Time : <input type="text"/></div>
	
	</div>
	<div class="row clear">
	<div class="col-xs-3">Assigned To :</div><div class="col-xs-3"><input type="text"/></div>
	<div class="col-xs-3">Updated Date Time :</div><div class="col-xs-3"><input type="text"/></div>
	</div>
  </div>
</div>

</body>
</html>
