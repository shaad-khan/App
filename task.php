<?php

session_start();
$u=$_SESSION['user'];

?>


 <div class="row mt"  ng-init="setuser('<?php echo $u;?>')">
  
   <div class="col-md-12">
 <div class="content-panel" id="reload">


                          <div class="row">

                             <div class="col-xs-12" style="padding-left: 21px;padding-right: 21px;">
                               <div class="panel panel-primary">
                                 <div class="panel-heading" style="background-color:#001a33"><div class="row"><div class="col-xs-4">

                                  <span class="glyphicon glyphicon-menu-hamburger"></span> Task List for <?php echo $u;?>

                                    <!--<a href="https://apps.continuserve.com/main.php#!/" style="color:aqua;font-size:18px;">
                                    <span class="glyphicon glyphicon-home"></a></span>--></div>
                                   <div class="col-xs-2">
                                    
                                    
            <div class="form-group">
           <input type="text" class="form-control" value="" id="some_class_1" name="date" style="color:black" placeholder="Start date" ng-model="sdate"/>
          
          </div>
                                    
                                    </div> 
                                     <div class="col-xs-2">
                                    
                                    <div class="form-group">
            
           <input type="text" class="form-control" value="" id="some_class_2" name="date" style="color:black" placeholder="End date" ng-model="edate"/>
          
          </div>
                                    
                                    </div>
                                    <div class="col-xs-2" >
                                    
                                    <div class="form-group">
            
         <button type="button" class="btn btn-primary" ng-click="search(sdate,edate)"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> </button>
          
          </div>
                                    
                                    </div>
                                     <div class="col-xs-2">
                                    
                                    <div class="form-group">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-plus
" aria-hidden="true"></span>Add Adhoc Task</button>
        <!-- <button type="button" class="btn btn-primary" ng-click="add(sdate,edate)"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></button>
          -->
          </div>
                                    
                                    </div>



                                   <!-- <div class="col-xs-4" align="right" ng-hide="load"><img src="assets/ajax-loader.gif"/>
                                   </div>--></div></div>
       <div class="panel-body" ng-controller="Task" >
         <table class="table" ><tr>
     <th ng-click="orderByMe('Ticket_ID')">Ticket_ID</th>
     <th ng-click="orderByMe('Client')">Client</th>
     <th ng-click="orderByMe('Project')">Project</th>
     <th ng-click="orderByMe('Tdiscription')">Discription</th>
     <th ng-click="orderByMe('Status')">Status</th>
     <th ng-click="orderByMe('UpdateTime')">DateTime</th>
     <th ng-click="orderByMe('TimeTaken')">Time Spend</th>
     


   </tr>


    <tr ng-repeat="res in tasks | orderBy:myOrderBy" ng-class="$index % 2 > 0 ? 'active':''" ng-if="tasks!=null">
<!--<td ng-if="res.Blocker_flag==0 && ((res.Status=='WIP')||(res.Status=='AUI'))"><button class="btn btn-info" ng-click="pop(res.Ticket_ID)"><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</button></td>
<td ng-if="res.Blocker_flag==1 && ((res.Status=='WIP')||(res.Status=='AUI'))&&((u!=res.Blocker_name))"><button class="btn btn-default" ><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</button></td>
<td ng-if="res.Blocker_flag==1 && ((res.Status=='WIP')||(res.Status=='AUI'))&&((u==res.Blocker_name))"><button class="btn btn-info" ng-click="pop(res.Ticket_ID)"><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</button></td>
<td ng-if="((res.Status=='Review')||(res.Status=='Doc') ||(res.Status=='Closure')||(res.Status=='Classify'))"><button class="btn btn-info" ng-click="pop(res.Ticket_ID)"><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</button></td>-->
<td ><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</td>
<td>{{res.Client}}</td>
<td>{{res.Project}}</td>
<td>{{res.Tdiscription}}</td>
<td>{{res.Status}}</td>

<td>{{res.UpdateTime}}</td>
<td >{{res.TimeTaken}} min</td>
<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" data-ticket-id="task.Ticket_ID"><span class="glyphicon glyphicon-pencil"></span></button></td>
<!--<td ng-if="res.Blocker_flag==0 && ((res.Status=='WIP')||(res.Status=='AUI'))"><button class="btn btn-info" ng-click="push(res.Ticket_ID)"><span class="glyphicon glyphicon-check"></span></sbutton>
</td>
<td ng-if="res.Blocker_flag==1 && ((res.Status=='WIP')||(res.Status=='AUI'))"><button class="btn btn-danger" ng-click="stat(res.Ticket_ID)"><span class="glyphicon glyphicon-check"></span></button>
</td>-->
    </tr>
    <tr style="background:#428bca;color:white" ng-if="getTotal()" ng-init="tot1=getTotal()">
    <td colspan="5">Total Time Spent On Tickets</td><td colspan="4">{{getTotal()}}  hh:mm <span class="glyphicon glyphicon-time"></span> </td></tr>
    </table>
    <table class="table" >
<tr ng-repeat="task in atask | orderBy:myOrderBy" ng-class="$index % 2 > 0 ? 'active':''" ng-if="atask!=null">
<!--<td ng-if="res.Blocker_flag==0 && ((res.Status=='WIP')||(res.Status=='AUI'))"><button class="btn btn-info" ng-click="pop(res.Ticket_ID)"><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</button></td>
<td ng-if="res.Blocker_flag==1 && ((res.Status=='WIP')||(res.Status=='AUI'))&&((u!=res.Blocker_name))"><button class="btn btn-default" ><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</button></td>
<td ng-if="res.Blocker_flag==1 && ((res.Status=='WIP')||(res.Status=='AUI'))&&((u==res.Blocker_name))"><button class="btn btn-info" ng-click="pop(res.Ticket_ID)"><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</button></td>
<td ng-if="((res.Status=='Review')||(res.Status=='Doc') ||(res.Status=='Closure')||(res.Status=='Classify'))"><button class="btn btn-info" ng-click="pop(res.Ticket_ID)"><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{res.Ticket_ID}}</button></td>-->
<td ><span class="glyphicon glyphicon-briefcase" aria-hidden="true">
</span> {{task.Ticket_ID}}</td>
<td>{{task.Client}}</td>
<td>{{task.Project}}</td>
<td>{{task.atype}}</td>
<td>{{task.Tdiscription}}</td>
<td>{{task.Status}}</td>

<td>{{task.Updatetime}}</td>
<td >{{task.Total_time}} min</td>
<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" data-ticket-id="{{task.Ticket_ID}}"><span class="glyphicon glyphicon-pencil"></span></button></td>

<!--<td ng-if="res.Blocker_flag==0 && ((res.Status=='WIP')||(res.Status=='AUI'))"><button class="btn btn-info" ng-click="push(res.Ticket_ID)"><span class="glyphicon glyphicon-check"></span></sbutton>
</td>
<td ng-if="res.Blocker_flag==1 && ((res.Status=='WIP')||(res.Status=='AUI'))"><button class="btn btn-danger" ng-click="stat(res.Ticket_ID)"><span class="glyphicon glyphicon-check"></span></button>
</td>-->
    </tr>
    <tr style="background:#428bca;color:white" ng-if="getatotal()"ng-init="tot2=getatotal();">
    <td colspan="6" >Total Time Spent On Adhoc Task</td><td colspan="4">{{getatotal()}} hh:mm <span class="glyphicon glyphicon-time"></span></td></tr>

 </table>
 <div class="panel-footer" ng-if="getGrandtotal() !=0" style="background-color:#001a33;color:white">Grand total for all task      {{getGrandtotal()}} hh:mm   <span class="glyphicon glyphicon-time"></span></div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" ng-controller="addtask">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #000d1a; color:white;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #f2f2f2;">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Adhoc Task Entry Form</h4>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Environment Type</label>
             
            
           <input type="text" class="form-control" value="General" placeholder="General" disabled/>
          
          
           
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Select Project</label>
             
            
           <select class="form-control" name="project" ng-model='projecttype' >
  <option ng-repeat="project in projects" value="{{project.Project}}">{{project.Project}}</option>
</select>
          
           
          </div>
           <div class="form-group">
            <label for="recipient-name" class="control-label">Select Task Type</label>
             
            
           <select class="form-control" name="project"  ng-model='tasktype'>
  <option ng-repeat="tt in tts" value="{{tt.Task}}">{{tt.Task}}</option>
</select>
          
           
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Total Time Spent </label>
             
            
           <input type="number" class="form-control" value="" placeholder="in min" ng-model="tspent" required/>
          
          
           
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Select Date:</label>
             
            
           <input type="text" class="form-control" value="" id="some_class_3" name="date" style="color:black" placeholder="Date Time" ng-model="adate"/>
          
          
           
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control" id="message-text" ng-model='amessage'></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer" >
      <!--<div class="row" ng-if="res[0].Ticket_ID">
      <div class="col-md-3" style="color:red">{{res[0].Ticket_ID}} created</div>
      </div>-->
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" ng-click="adhoc_add(projecttype,tasktype,tspent,adate,amessage)">Add Task</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p><input type="text" name="ticketId"/></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<script>
$('#my_modal').on('show.bs.modal', function(e) {
  alert("here");
    var bookId = $(e.relatedTarget).data('ticket-id');
    $(e.currentTarget).find('input[name="ticketId"]').val(bookId);
});
window.onerror = function(errorMsg) {
  $('#console').html($('#console').html()+'<br>'+errorMsg)
}
//alert("hello");
 $(function() {
          $('#some_class_1').datetimepicker();
           $('#some_class_2').datetimepicker();
            $('#some_class_3').datetimepicker();
         });

         </script>