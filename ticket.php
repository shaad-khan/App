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
                                 <div class="panel-heading" style="background-color:#001a33"><div class="row"><div class="col-xs-8">

                                  <span class="glyphicon glyphicon-menu-hamburger"></span> L3 Support Team (Status: {{type}})

                                   <!--<a href="https://apps.continuserve.com/main.php#!/" style="color:aqua;font-size:18px;">
                                    <span class="glyphicon glyphicon-home"></a></span>--></div>
                                    <div class="col-xs-4" align="right" ng-hide="load"><img src="assets/ajax-loader.gif"/>
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
<td>{{res.Tdiscription}}</td>
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
<input type="text" ng-model="actualtime"/>
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
</div>





