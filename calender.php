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
       <div class="panel-body" ng-controller="demo">
         <div class="container">
	<!--<div class="jumbotron">
		<h1>Bootstrap Calendar Demo</h1>

		<p>Bootstrap based full view calendar. Template based.</p>

		<a class="btn btn-default btn-primary" href="https://github.com/Serhioromano/bootstrap-calendar">Fork on GitHub</a>
		<a class="btn btn-default" href="index.html">Use bootstrap 2</a>
		<a href="https://twitter.com/serhioromano" class="btn btn-default btn-twitter" data-show-count="false" data-size="large">Follow @serhioromano</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
		</script>
	</div>-->

	<div class="page-header">

		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
				<button class="btn btn-default" data-calendar-nav="today">Today</button>
				<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
			</div>
			<div class="btn-group">
				<button class="btn btn-warning" data-calendar-view="year">Year</button>
				<button class="btn btn-warning active" data-calendar-view="month">Month</button>
				<button class="btn btn-warning" data-calendar-view="week">Week</button>
				<button class="btn btn-warning" data-calendar-view="day">Day</button>
			</div>
		</div>

		<h3></h3>
		<small>Rajesh</small>
	</div>

	<div class="row">
		<div class="col-md-9" >
			<div id="calendar"></div>
		</div>
		<div class="col-md-3">
			<div class="row">
				<!--<select id="first_day" class="form-control">
					<option value="" selected="selected">First day of week language-dependant</option>
					<option value="2">First day of week is Sunday</option>
					<option value="1">First day of week is Monday</option>
				</select>
				<!--<select id="language" class="form-control">
					<option value="">Select Language (default: en-US)</option>
					<option value="bg-BG">Bulgarian</option>
					<option value="nl-NL">Dutch</option>
					<option value="fr-FR">French</option>
					<option value="de-DE">German</option>
					<option value="el-GR">Greek</option>
					<option value="hu-HU">Hungarian</option>
					<option value="id-ID">Bahasa Indonesia</option>
					<option value="it-IT">Italian</option>
					<option value="pl-PL">Polish</option>
					<option value="pt-BR">Portuguese (Brazil)</option>
					<option value="ro-RO">Romania</option>
					<option value="es-CO">Spanish (Colombia)</option>
					<option value="es-MX">Spanish (Mexico)</option>
					<option value="es-ES">Spanish (Spain)</option>
					<option value="es-CL">Spanish (Chile)</option>
					<option value="es-DO">Spanish (República Dominicana)</option>
					<option value="ru-RU">Russian</option>
					<option value="sk-SR">Slovak</option>
					<option value="sv-SE">Swedish</option>
					<option value="ko-KR">Korean</option>
					<option value="zh-TW">繁體中文</option>
					<option value="th-TH">Thai (Thailand)</option>
				</select>--><br>
				<ul class="list-group" style="padding-top:9px;">
					<li class="list-group-item" style="background-color: #030d21;
    color: beige;">
   
    Date: 07-04-2017
  </li>
  <li class="list-group-item" style="background-color: #030d21;
    color: beige;">
    <span class="badge" style="background-color: #357ebd;">14</span>
    Total ticket count
  </li>
  <li class="list-group-item" style="background-color: #030d21;
    color: beige;">
    <span class="badge" style="background-color: #357ebd;">20</span>
    Total time spent for the day
  </li>
</ul>
<div class="list-group">
  <a href="#" class="list-group-item active">
    Type of task
  </a>
   <li class="list-group-item" >
    <span class="badge" style="background-color: #357ebd;">14</span>
    Sql execution
  </li>
  <li class="list-group-item" >
    <span class="badge" style="background-color: #357ebd;">20</span>
    Migration
  </li>
   <li class="list-group-item" style="background-color: #030d21;
    color: beige;">
    <span class="badge" style="background-color: #357ebd;">14</span>
    Total ticket count
  </li>
  <li class="list-group-item" style="background-color: #030d21;
    color: beige;">
    <span class="badge" style="background-color: #357ebd;">20</span>
    Total time spent for the day
  </li>
</div>
			</div>

			<!--<h4>Events</h4>
			<small>This list is populated with events dynamically</small>
			<ul id="eventlist" class="nav nav-list"></ul>-->
		</div>
	</div>

	<div class="clearfix"></div>
	<br><br>
	<!--<div id="disqus_thread"></div>
	<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>-->

	<div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Event</h3>
				</div>
				<div class="modal-body" style="height: 400px">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
</div>





