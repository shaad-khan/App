<?php

session_start();
$u=$_SESSION['user'];
$admin=$_SESSION["admin"];

?>


 <div class="row mt"  ng-init="setuser('<?php echo $u;?>')">
   <div class="col-md-12">
 <div class="content-panel" id="reload">


                          <div class="row">

                             <div class="col-xs-12" style="padding-left: 21px;padding-right: 21px;">
                               <div class="panel panel-primary">
                                 <div class="panel-heading" style="background-color:#001a33"><div class="row"><div class="col-xs-8">

                                  <span class="glyphicon glyphicon-menu-hamburger"></span> L3 Support Team 

                                    <a href="https://apps.continuserve.com/main.php#!/" style="color:aqua;font-size:18px;">
                                    <span class="glyphicon glyphicon-home"></a></span></div>
                                    <div class="col-xs-4" align="right" ng-hide="load"><img src="assets/ajax-loader.gif"/>
                                   </div></div></div>
       <div class="panel-body">
         <iframe class="embed-responsive-item" src="calender.php"></iframe>
</div>
</div>
</div>
</div>
</div>
</div>
</div>





