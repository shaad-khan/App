<div class="row mt">
  <div class="col-md-12">
<div class="content-panel" id="reload">


                         <div class="row">

                            <div class="col-xs-6" ng-controller="clientgraph">

                           <div id="donutchart" style="width: 400px; height:250px;"></div>
                           </div>

                        <div class="col-xs-6" ng-controller="taskgraph">

                           <div id="barchart_values" style="width: 400px; height:250px;"></div>

                         </div>
                         </div>

                          </div>


</div>
</div>
<div class="row mt">
  <div class="col-md-12">
<div class="content-panel" id="reload">


                         <div class="row">

                            <div class="col-xs-12" style="padding-left:40px;padding-right:40px;">
                              <div class="panel panel-primary">
                                <div class="panel-heading">Task Report</div>
      <div class="panel-body" ng-controller="table_count">
        <table class="table"><tr>
    <th></th>
      <th>  <span class="glyphicon glyphicon-menu-hamburger"></span>Classify</th>
      <th>WIP</th>
      <th>AUI</th>
      <th>Review</th>
      <th>Documentation</th>
      <th>Closure</th>
      <th>Total</th>
    </tr>
    <tr>
      <td>Unassigned</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>6</td><td>7</td>


    </tr>
    <tr ng-repeat="item in items">
      <td ng-init="email=item.Email.split('@')[0]">{{email}}</td><td ng-init="table_count.Total=table_count.Total+item.classify"><a href="#/ticket">{{item.Classify}}</a></td>
      <td ng-init="total_Wip=total_Wip+item.Wip"><a href="#ticket/{{email}}/Wip">{{item.Wip}}</a></td>
      <td ng-init="total_Aui=total_Aui+item.Aui"><a href="#ticket/{{email}}/Aui">{{item.Aui}}</td>
      <td ng-init="total_Review=total_Review+item.Review"><a href="#ticket/{{email}}/Review">{{item.Review}}</td>
      <td ng-init="total_Doc=total_Doc+item.Doc"><a href="#ticket/{{email}}/Doc">{{item.Doc}}</td>
      <td ng-init="total_Closure=total_Closure+item.Closure"><a href="#ticket/{{email}}/Closure">{{item.Closure}}</td>
    <td ng-init="total= item.Classify+item.Wip+item.Aui+item.Review+item.Doc+item.Closure; controller.ttotal=controller.ttotal+total;">{{total}}</td>


    </tr>
    <tr><td></td><td>{{table_count.Total}}</td>
      <td>{{total_Wip}}</td>
      <td>{{total_Aui}}</td>
      <td>{{total_Review}}</td>
      <td>{{total_Doc}}</td>
<td>{{total_Closure}}</td>
<td>{{ttotal}}</td>
    </tr>
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
      <div class="panel-footer">Panel footer</div>
    </div>

                           </div>



                         </div>
                         </div>

                          </div>


</div>
