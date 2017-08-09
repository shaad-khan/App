<?php

session_start();
$u=$_SESSION['user'];
$rev=$_SESSION['Review'];
$doc=$_SESSION['Doc'];
$close=$_SESSION['Closure'];
?>


<div class="row mt"  ng-controller="tcount" style="margin-bottom:-400px">
  <div class="col-md-12">
<div class="col-lg-4 col-md-4 col-sm-4 mb">
						<div class="panel panel-info">
  <div class="panel-heading">Total no.of tickets  <span class="glyphicon glyphicon-tasks
" aria-hidden="true"></span></div>
  <div class="panel-body" align="center">
    <button type="button" class="btn btn-info btn-circle btn-xl" ng-click="showtkt('total')">{{totals[0].tcount}}</button>

  </div>
</div>
						</div>
<div class="col-lg-4 col-md-4 col-sm-4 mb">
						<div class="panel panel-danger">
  <div class="panel-heading">Total no.of pending tickets  <span class="glyphicon glyphicon-tasks
" aria-hidden="true"></span></div>
  <div class="panel-body" align="center">
   <button type="button" class="btn btn-danger btn-circle btn-xl" ng-click="showtkt('pending')"> {{totals[1].pcount}}</button>
  </div>
</div>
						</div>
            <div class="col-lg-4 col-md-4 col-sm-4 mb">
						<div class="panel panel-success">
  <div class="panel-heading">Total no.of Closed tickets  <span class="glyphicon glyphicon-tasks
" aria-hidden="true"></span></div>
  <div class="panel-body" align="center">
   <button type="button" class="btn btn-success btn-circle btn-xl" ng-click="showtkt('close')"> {{totals[2].ccount}}</button>
  </div>
</div>
						</div>
            </div>
            </div>

<div class="row mt" ng-controller="table_count">
  <div class="col-md-12">
<div class="content-panel" id="reload"  >


                         <div class="row" >

                            <div class="col-xs-12" style="padding-left:40px;padding-right:40px;">
                              <div class="panel panel-primary">
                                <div class="panel-heading" style="background-color:#001a33"><div class="row"><div class="col-xs-8">

                                 <span class="glyphicon glyphicon-menu-hamburger"></span> SSS Support Team </div><div class="col-xs-4" align="right" ng-hide="load2"><img src="assets/ajax-loader.gif"/>
                                  </div></div></div>
      <div class="panel-body">
        <table class="table table-fixed">
        <thead>
        <tr>
    <th></th>
      <th>  <span class="glyphicon glyphicon-menu-hamburger"></span>Classify</th>
      <th>WIP</th>
      <th>AUI</th>
      <th>Review</th>
     <!-- <th>Documentation</th>-->
      <th>Closure</th>
      <th>Total</th>
    </tr>
    </thead>
  <tbody>


    <tr ng-repeat="item in items" ng-class="$index % 2 > 0 ? 'active':''">
      <td ng-init="email=item.Email.split('@')[0]"><span class="glyphicon glyphicon-user" style="font-size:20px;color:black;padding:5px;"></span>  {{item.Name}}</td><td ng-init="table_count.Total=table_count.Total+item.classify"><a href="#!/ticket/{{email}}/Classify">{{item.Classify}}</a></td>
      <td ng-init="total_Wip=total_Wip+item.Wip"><a href="#!/ticket/{{email}}/Wip"> {{item.Wip}}</a></td>
      <td ng-init="total_Aui=total_Aui+item.Aui"><a href="#!/ticket/{{email}}/Aui">{{item.Aui}}</a></td>
      
      <td ng-init="total_Review=total_Review+item.Review" >
        
        
        <?php 
        if($rev==1)
        {?>
        <a href="#!/ticket/{{email}}/Review">{{item.Review}}</a></td>
        <?php
        }
        else
        {?>
        
        {{item.Review}}</td>
        <?php
        }?>

     <!--   <td ng-init="total_Doc=total_Doc+item.Doc">
          <?php
        if($doc==1)
        {?>
      <a href="#!/ticket/{{email}}/Doc">{{item.Doc}}</td>
      <?php
        }
        else
        {?>
        
       {{item.Doc}}</td>
        <?php
        }?>-->
        <td ng-init="total_Closure=total_Closure+item.Closure">
          <?php
        if($close==1)
        {?>
        
      <a href="#!/ticket/{{email}}/Closure">{{item.Closure}}</a></td>
      <?php
        }
        else{?>
          {{item.Closure}}</td>
        <?php 
        }
        ?>
    <td ng-init="total= item.Classify+item.Wip+item.Aui+item.Review+item.Doc+item.Closure; controller.ttotal=controller.ttotal+total;">{{total}}</td>


    </tr>
     </tbody>
   <!-- <tr><td></td><td>{{table_count.Total}}</td>
      <td>{{total_Wip}}</td>
      <td>{{total_Aui}}</td>
      <td>{{total_Review}}</td>
      <td>{{total_Doc}}</td>
<td>{{total_Closure}}</td>
<td>{{ttotal}}</td>
    </tr>-->
    
    <!--<tr>
      <td>Jaaga</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>6</td><td>7</td>


    </tr>
    <tr>
      <td>Unassigned</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>6</td><td>7</td>

    </tr>
    <tr>
      <td>Anmol</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>6</td><td>7</td>

    </tr>-->

  </table>
      </div>
      <div class="panel-footer"></div>
    </div>

                           </div>



                         </div>
                         </div>

                          </div>


</div>
<div class="row mt" ng-controller="checklist">
 <div class="col-md-12">
<div class="content-panel" id="reload"  >


                         <div class="row" >

                            <div class="col-xs-12" style="padding-left:40px;padding-right:40px;">
                              <div class="panel panel-primary">
                                <div class="panel-heading" style="background-color:#001a33"><div class="row"><div class="col-xs-8">

                                 <span class="glyphicon glyphicon-menu-hamburger"></span> Check List Task</div><div class="col-xs-4" align="right" ng-hide="load2"><img src="assets/ajax-loader.gif"/>
                                  </div></div></div>
      <div class="panel-body">

                           <!-- <div class="col-xs-6" ng-controller="clientgraph">

                           <div id="donutchart" style="width: 400px; height:250px;"></div>
                           </div>

                        <div class="col-xs-6" ng-controller="taskgraph">

                           <div id="barchart_values" style="width: 400px; height:250px;"></div>

                         </div>-->
                         <table class="table">
    <thead>
      <tr>
      
        <th>CheckList</th>
        <th>Client</th>
        <th>DateTime</th>
        <th>Status</th>
        <th>Select Shift</th>
      </tr>
    </thead>
    <tbody>
         
      
      <tr class="info"  ng-repeat="item in results">
        <td>{{item.Tdiscription}}</td>
         <td>{{item.Client}}</td>
        <td>{{item.Cdatetime}}</td>
        <td>{{item.Status}}</td>
        <td>
          <div class="form-group">
           
             
            
           <select class="form-control" name="stype"  ng-model='stype' required>
           
  <option ng-repeat="tt in sts" value="{{tt.title}}">{{tt.title}}</option>
</select>
          
           
          </div>
        
        </td>
         <td><button class="btn btn-success" ng-click="close(item.Id,stype)"><span class="glyphicon glyphicon-ok
"></span></button></td>
      </tr>
      
    </tbody>
  </table>
                         </div>

                          </div>


</div>
</div>



