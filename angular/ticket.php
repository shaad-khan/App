<?php

echo $_GET['Email'].$_GET['Type'];
 ?>


<div ng-controller="Ticket">

email:{{email}}
name:{{name}}

</div>
<script>


app.controller("Ticket",function($scope,$routeParams){

$scope.email=$routeParams.email;
$scope.name="shaad";
//$scope.type=$routeParams.Type;
});
</script>
