<?php

//echo $_GET['Email'];
//echo $_GET['Type'];
 ?>


 <div class="row mt" ng-controller="Ticket">
   <div class="col-md-12">
 <div class="content-panel" id="reload">


                          <div class="row">

                             <div class="col-xs-12" style="padding-left:40px;padding-right:40px;">
                               <div class="panel panel-primary">
                                 <div class="panel-heading" style="background-color:#001a33"><div class="row"><div class="col-xs-8">

                                   Task Report </div><div class="col-xs-4" align="right" ng-hide="load"><img src="assets/ajax-loader.gif"/>
                                   </div></div></div>
       <div class="panel-body" ng-controller="table_count">
         <table class="table"><tr>
     <th>Ticket_ID</th>
     <th>Client</th>
     <th>Project</th>
     <th>Discription</th>
     <th>Status</th>
     <th>Creation_DateTime</th>
     <th>Update_DateTime</th>
     <th>UpdatedBy</th>


   </tr>

    <tr ng-repeat="res in results">
<td><button class="btn btn-info" ng-click="pop(res.Ticket_ID)"><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</button></td>
<td>{{res.Client}}</td>
<td>{{res.Project}}</td>
<td>{{res.Tdiscription}}</td>
<td>{{res.Status}}</td>
<td>{{res.Cdatetime}}</td>
<td>NA</td>
<td>{{res.Creator}}</td>

    </tr>
 </table
</div>
</div>
</div>
</div>
</div>
</div>
</div>
