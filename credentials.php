<?php

session_start();
$u=$_SESSION['user'];
$admin=$_SESSION["admin"];

?>
<style>
.table-condensed>thead>tr>th, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>tbody>tr>td, .table-condensed>tfoot>tr>td {
padding: 1px;
}
</style>

 <div class="row mt"  ng-init="setuser('<?php echo $u;?>')" ng-controller="credentials" style="margin-top: 17px;">
   <div class="col-md-12" style="width: 101%;">
 <div class="content-panel" id="reload">


                          <div class="row">

                             <div class="col-xs-12" style="padding-left: 18px;padding-right: 15px;">
                               <div class="panel panel-primary">
                                 <div class="panel-heading" style="background-color:#001a33"><div class="row"><div class="col-xs-8">

                                  <span class="glyphicon glyphicon-menu-hamburger"></span> Credentials

                                   <!--<a href="https://apps.continuserve.com/main.php#!/" style="color:aqua;font-size:18px;">
                                    <span class="glyphicon glyphicon-home"></a></span>--></div>
                                   <div class="col-xs-2">
                                    
                                    <div class="form-group">
            
              <input type="text" class="form-control" value=""  style="color:black" placeholder="Filter keyword" ng-model="ftext"/>
             
          </div>
                                    
                                    </div>
                                     <div class="col-xs-2">
                                    
                                    <div class="form-group">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-plus
" aria-hidden="true"></span>Add Credentials</button>
       
          </div>
                                    
                                    </div></div></div>
       <div class="panel-body" style="padding: 3px;">
         <table class="table table-hover table-condensed table-striped" ><tr>
     <th>Client</th>
     <th>Connection Type</th>
     <th>ServerName</th>
     <th>Environment</th>
     <th>User ID</th>
     <th>Password</th>
  <th>Edit<th>


   </tr>


    <tr ng-repeat="res in creds  | filter:ftext " ng-class="$index % 2 > 0 ? 'active':''">

<td> {{res.Client}}</td>
<td>{{res.ctype}}</td>
<td>{{res.sname}}</td>
<td>{{res.Environment}}</td>
<td>{{res.uid}}</td>

<td>{{res.Password}}</td>
<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" data-ticket-id="{{res.Id}}"><span class="glyphicon glyphicon-edit
" aria-hidden="true"></span></button></td>


    </tr>
  
 </table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="myModal" role="dialog" ng-controller="modifycred">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Credentials Modification </h4>
        </div>
        <div class="modal-body">
<form>
        <div class="form-group">
            <label for="recipient-name" class="control-label">Credentials Id</label>
             
           
           <input type="text" class="form-control"  name="ticketId" disabled/>
          <input type="hidden" name="ticketId2"  id="selectedDueDate" ng-model="tid" />
          
           
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Environment</label>
             
            
           <input type="text" class="form-control" value="NA" placeholder="Environment" ng-model="cenv" required/>
          
          
           
          </div>
          
<div class="form-group">
            <label for="recipient-name" class="control-label">UserName </label>
             
            
           <input type="text" class="form-control" value="" placeholder="Username" ng-model="tspent2" required/>
          
          
           
          </div>
           <div class="form-group">
            <label for="recipient-name" class="control-label">PassWord</label>
             
            
           <input type="text" class="form-control" value="" id="some_class_4" name="date" style="color:black" placeholder="Password" ng-model="adate2"/>
          
          
           
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" ng-click="modify_cred(tid,cenv,tspent2,adate2,user2)">Modify Credentials</button>
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


