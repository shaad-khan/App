<?php

session_start();
$u=$_SESSION['user'];
$admin=$_SESSION["admin"];

?>


 <div class="row mt"  ng-init="setuser('<?php echo $u;?>')" ng-controller="Ticket">
   <div class="col-md-12">
 <div class="content-panel" id="reload">


                          <div class="row">

                             <div class="col-xs-12" style="padding-left: 21px;padding-right: 21px;">
                               <div class="panel panel-primary">
                                 <div class="panel-heading" style="background-color:#001a33"><div class="row"><div class="col-xs-4">

                                  <span class="glyphicon glyphicon-menu-hamburger"></span> L3 Support Team (Status: {{type}})

                                   <!--<a href="https://apps.continuserve.com/main.php#!/" style="color:aqua;font-size:18px;">
                                    <span class="glyphicon glyphicon-home"></a></span>--></div>
                                    <div class="col-xs-4" align="right" ng-show="type=='Closure'" ><!--<img src="assets/ajax-loader.gif"/>-->select Shift </div>  <div class="col-xs-4" align="right" ng-show="type=='Closure'"> <select class="form-control" ng-model="schedule">
  <option ng-repeat="schedule in schedules" value="{{schedule.title}}">{{schedule.title}}</option>
</select>
                                   </div></div></div>
       <div class="panel-body" style="padding:0px">
         <table class="table"><tr>
     <th ng-show="type!='Closure'" >Ticket_ID</th>
     <th ng-show="type!='Review' && type!='Closure'">Client</th>
     <th>Project</th>
     <th>Discription</th>
     <th ng-show="type!='Closure'">Status</th>
     <th>Created</th>
     <th>Last_Update</th>
     <th>Creator</th>
     

   </tr>


    <tr ng-repeat="res in results" ng-class="$index % 2 > 0 ? 'active':''">
<td ng-if="res.Blocker_flag==0 && ((res.Status=='WIP')||(res.Status=='AUI'))"><button class="btn btn-info" ng-click="pop(res.Ticket_ID)"><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</button></td>
<td ng-if="res.Blocker_flag==1 && ((res.Status=='WIP')||(res.Status=='AUI'))&&((u!=res.Blocker_name))"><button class="btn btn-default" ><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</button></td>
<td ng-if="res.Blocker_flag==1 && ((res.Status=='WIP')||(res.Status=='AUI'))&&((u==res.Blocker_name))"><button class="btn btn-info" ng-click="pop(res.Ticket_ID)"><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</button></td>
<td ng-if="((res.Status=='Review')||(res.Status=='Doc'))"><a href=''  ng-click="pop(res.Ticket_ID)">
 {{res.Ticket_ID}}</a></td>
 <td ng-if="(res.Status=='Classify')"><button class="btn btn-info" ng-click="pop(res.Ticket_ID)"><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</button></td>
<td ng-show="type!='Review' && type!='Closure'">{{res.Client}}</td>
<td>{{res.Project}}</td>
<td ><a href='' data-toggle="modal" data-target=".bs-example-modal-lg2" data-ticket-id="{{res.Ticket_ID}}">{{res.Tdiscription}}</a></td>
<td ng-show="type!='Closure'">{{res.Status}}</td>
<td>{{res.Cdatetime}}</td>
<td>{{res.Updatetime}}</td>
<td>{{res.Creator}}</td>

<td ng-if="res.Blocker_flag==0 && ((res.Status=='WIP')||(res.Status=='AUI'))"><button class="btn btn-info" ng-click="push(res.Ticket_ID)"><span class="glyphicon glyphicon-check"></span></sbutton>
</td>
<td ng-if="res.Blocker_flag==1 && ((res.Status=='WIP')||(res.Status=='AUI'))"><button class="btn btn-danger" ng-click="stat(res.Ticket_ID)"><span class="glyphicon glyphicon-check"></span></button>
</td>
<td ng-if="<?php echo $admin;?>==1 && res.Status!='Closure'">
<button class="btn btn-danger" ng-click="remove(res.Ticket_ID)"><span class="glyphicon glyphicon-remove"></span></button>

</td>
<td ng-if="<?php echo $admin;?>==1 && res.Status=='Closure'">
<input type="text" ng-model="actualtime"/></td><td ng-if="<?php echo $admin;?>==1 && res.Status=='Closure'">
<button class="btn btn-danger" ng-click="remove(res.Ticket_ID,actualtime)"><span class="glyphicon glyphicon-remove"></span></button>
</td>
    </tr>
 </table
</div>
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
</div>







