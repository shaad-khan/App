<?php

session_start();
$u=$_SESSION['user'];
$admin=$_SESSION["admin"];

?>


 <div class="row mt"  ng-init="setuser('<?php echo $u;?>')" ng-controller="credentials" style="margin-top: 17px;">
   <div class="col-md-12" style="width: 101%;">
 <div class="content-panel" id="reload">


                          <div class="row">

                             <div class="col-xs-12" style="padding-left: 18px;padding-right: 21px;">
                               <div class="panel panel-primary">
                                 <div class="panel-heading" style="background-color:#001a33"><div class="row"><div class="col-xs-8">

                                  <span class="glyphicon glyphicon-menu-hamburger"></span> Credentials

                                   <!--<a href="https://apps.continuserve.com/main.php#!/" style="color:aqua;font-size:18px;">
                                    <span class="glyphicon glyphicon-home"></a></span>--></div>
                                    <div class="col-xs-2" style="padding-left:580px">
                                    
                                    <div class="form-group">
            
           <input type="text" class="form-control" value=""  style="color:black" placeholder="Filter keyword" ng-model="ftext"/>
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
<td><button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-edit
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





