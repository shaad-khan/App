<!DOCTYPE html>
<html ng-app="cal">
<head>
	<title>Twitter Bootstrap jQuery Calendar component</title>

	<meta name="description" content="Full view calendar component for twitter bootstrap with year, month, week, day views.">
	<meta name="keywords" content="jQuery,Bootstrap,Calendar,HTML,CSS,JavaScript,responsive,month,week,year,day">
	<meta name="author" content="Serhioromano">
	<meta charset="UTF-8">

	<link rel="stylesheet" href="components/bootstrap3/css/bootstrap.min.css">
	<link rel="stylesheet" href="components/bootstrap3/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/calendar.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.3/angular.min.js"></script>
	<style type="text/css">
		.btn-twitter {
			padding-left: 30px;
			background: rgba(0, 0, 0, 0) url(https://platform.twitter.com/widgets/images/btn.27237bab4db188ca749164efd38861b0.png) -20px 9px no-repeat;
		}
		.btn-twitter:hover {
			background-position:  -21px -16px;
		}
	</style>
	<?php
$u=$_GET['user'];
	?>
</head>
<body>
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
		<div class="col-md-9" ng-controller="demo">
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

	<script type="text/javascript" src="components/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="components/underscore/underscore-min.js"></script>
	<script type="text/javascript" src="components/bootstrap3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="components/jstimezonedetect/jstz.min.js"></script>
	<script type="text/javascript" src="js/language/bg-BG.js"></script>
	<script type="text/javascript" src="js/language/nl-NL.js"></script>
	<script type="text/javascript" src="js/language/fr-FR.js"></script>
	<script type="text/javascript" src="js/language/de-DE.js"></script>
	<script type="text/javascript" src="js/language/el-GR.js"></script>
	<script type="text/javascript" src="js/language/it-IT.js"></script>
	<script type="text/javascript" src="js/language/hu-HU.js"></script>
	<script type="text/javascript" src="js/language/pl-PL.js"></script>
	<script type="text/javascript" src="js/language/pt-BR.js"></script>
	<script type="text/javascript" src="js/language/ro-RO.js"></script>
	<script type="text/javascript" src="js/language/es-CO.js"></script>
	<script type="text/javascript" src="js/language/es-MX.js"></script>
	<script type="text/javascript" src="js/language/es-ES.js"></script>
	<script type="text/javascript" src="js/language/es-CL.js"></script>
	<script type="text/javascript" src="js/language/es-DO.js"></script>
	<script type="text/javascript" src="js/language/ru-RU.js"></script>
	<script type="text/javascript" src="js/language/sk-SR.js"></script>
	<script type="text/javascript" src="js/language/sv-SE.js"></script>
	<script type="text/javascript" src="js/language/zh-TW.js"></script>
	<script type="text/javascript" src="js/language/cs-CZ.js"></script>
	<script type="text/javascript" src="js/language/ko-KR.js"></script>
	<script type="text/javascript" src="js/language/id-ID.js"></script>
	<script type="text/javascript" src="js/language/th-TH.js"></script>
	<script type="text/javascript" src="js/calendar.js"></script>
	<!--<script type="text/javascript" src="js/app.js"></script>-->
<script type="text/javascript">
			
var app=angular.module("cal",[]);
app.controller("demo",function()
{

	(function($) {

	"use strict";
var date=new Date();
date=date.toISOString().substring(0, 10);
//alert(date);
	var options = {
		events_source: 'https://csmonitoring-dev.azurewebsites.net/coyote/event.php?u=<?php echo $u;?>',
		view: 'month',
		tmpl_path: 'tmpls/',
		tmpl_cache: false,
		day:date,
		onAfterEventsLoad: function(events) {
			if(!events) {
				return;
			}
			var list = $('#eventlist');
			list.html('');

			$.each(events, function(key, val) {
				$(document.createElement('li'))
					.html('<a href="' + val.url + '">' + val.title + '</a>')
					.appendTo(list);
			});
		},
		onAfterViewLoad: function(view) {
			$('.page-header h3').text(this.getTitle());
			$('.btn-group button').removeClass('active');
			$('button[data-calendar-view="' + view + '"]').addClass('active');
			if(view == "month") {
                    $("#calendar .cal-month-day").click(function(e) {
                        var clicked_date = $(this).find('span').attr('data-cal-date');
                        //Do whatever you want. probably, a $.post or something to add the record on your db
                        alert(clicked_date);
                        	$('#calender .cal-momth-day').html("<small class='cal-events-num badge badge-important pull-left'>119</small>");
                        }
                    )};
		},
		classes: {
			months: {
				general: 'label'
			}
		}
	};

	var calendar = $('#calendar').calendar(options);
calendar.setOptions({modal: '#events-modal'});
	$('.btn-group button[data-calendar-nav]').each(function() {
		var $this = $(this);
		$this.click(function() {
			calendar.navigate($this.data('calendar-nav'));
		});
	});

	$('.btn-group button[data-calendar-view]').each(function() {
		var $this = $(this);
		$this.click(function() {
			calendar.view($this.data('calendar-view'));
		});
	});

	$('#first_day').change(function(){
		var value = $(this).val();
		value = value.length ? parseInt(value) : null;
		calendar.setOptions({first_day: value});
		calendar.view();
	});

	$('#language').change(function(){
		calendar.setLanguage($(this).val());
		calendar.view();
	});

	$('#events-in-modal').change(function(){
		var val = $(this).is(':checked') ? $(this).val() : null;
		console.log(val);
		calendar.setOptions({modal: val});
	});
	$('#format-12-hours').change(function(){
		var val = $(this).is(':checked') ? true : false;
		calendar.setOptions({format12: val});
		calendar.view();
	});
	$('#show_wbn').change(function(){
		var val = $(this).is(':checked') ? true : false;
		calendar.setOptions({display_week_numbers: val});
		calendar.view();
	});
	$('#show_wb').change(function(){
		var val = $(this).is(':checked') ? true : false;
		calendar.setOptions({weekbox: val});
		calendar.view();
	});
	$('#events-modal .modal-header, #events-modal .modal-footer').click(function(e){
		//e.preventDefault();
		//e.stopPropagation();
	});
}(jQuery));
})

	</script>
	<script type="text/javascript">
/*$(document).on("click",".cal-month-day",function(e) {
      var w = parseInt($(".cal-day-inmonth").css("width"));
      var x = e.offsetX;
      var cols = 8; // Really. There are 7 days in a week + 1 header column.
      var clickedColumn = Math.floor(x / (w/cols));
      // The date can be found from columns.
      var dateCol = $(".cal-row-head").find("div").eq(clickedColumn).find("span");
      var date = dateCol.attr("data-cal-date");

      // Find out the hour clicked
      var hourtxt = $(this).find(".cal-cell1 b").text()
      console.log(e.innerText);

console.log(e);
      console.log(date + " " + hourtxt);
    });
*/



		var disqus_shortname = 'bootstrapcalendar'; // required: replace example with your forum shortname
		(function() {
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
	</script>
</div>
</body>
</html>
