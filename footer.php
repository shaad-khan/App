   <footer class="site-footer">
          <div class="text-center">
              2017 - Continuity
              <a href="home.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>
  <script type="text/javascript">
  var j = jQuery.noConflict();
          j(document).ready(function () {
            
             j(function () {
                j('#datetimepicker2').datetimepicker();
            });
          });
        </script>
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@  -->
<script language="javascript" type="text/javascript">

function popitup(url) {
  newwindow=window.open(url,'name','height=200,width=450');
  if (window.focus) {newwindow.focus()}
  return false;
}
function popitup2(url) {
  newwindow=window.open(url,'name','height=400,width=600');
  if (window.focus) {newwindow.focus()}
  return false;
}
/*function popitup3(url) {
  newwindow=window.open(url,'name','height=600,width=1100');
  if (window.focus) {newwindow.focus()}
  return false;
}*/
function popitup4(url) {
  newwindow=window.open(url,'name','height=600,width=900');
  if (window.focus) {newwindow.focus()}
  return false;
}
// -->

</script>

<!--<script src="dateresource/jquery.js"></script>
<script src="dateresource/jquery.datetimepicker.js"></script>
<script>/*
window.onerror = function(errorMsg) {
  $('#console').html($('#console').html()+'<br>'+errorMsg)
}*/
$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:  '1986/01/05'
});
$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});

$('.some_class').datetimepicker();

$('#default_datetimepicker').datetimepicker({
  formatTime:'H:i',
  formatDate:'d.m.Y',
  defaultDate:'8.12.1986', // it's my birthday
  defaultTime:'10:00',
  timepickerScrollbar:false
});

$('#datetimepicker10').datetimepicker({
  step:5,
  inline:true
});
$('#datetimepicker_mask').datetimepicker({
  mask:'9999/19/39 29:59'
});

$('#datetimepicker1').datetimepicker({
  datepicker:false,
  format:'H:i',
  step:5
});
$('#datetimepicker2').datetimepicker({
  yearOffset:222,
  lang:'ch',
  timepicker:false,
  format:'d/m/Y',
  formatDate:'Y/m/d',
  minDate:'-1970/01/02', // yesterday is minimum date
  maxDate:'+1970/01/02' // and tommorow is maximum date calendar
});
$('#datetimepicker3').datetimepicker({
  inline:true
});
$('#datetimepicker4').datetimepicker();
$('#open').click(function(){
  $('#datetimepicker4').datetimepicker('show');
});
$('#close').click(function(){
  $('#datetimepicker4').datetimepicker('hide');
});
$('#reset').click(function(){
  $('#datetimepicker4').datetimepicker('reset');
});
$('#datetimepicker5').datetimepicker({
  datepicker:false,
  allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00'],
  step:5
});
$('#datetimepicker6').datetimepicker();
$('#destroy').click(function(){
  if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
    $('#datetimepicker6').datetimepicker('destroy');
    this.value = 'create';
  }else{
    $('#datetimepicker6').datetimepicker();
    this.value = 'destroy';
  }
});
var logic = function( currentDateTime ){
  if( currentDateTime.getDay()==6 ){
    this.setOptions({
      minTime:'11:00'
    });
  }else
    this.setOptions({
      minTime:'8:00'
    });
};
$('#datetimepicker7').datetimepicker({
  onChangeDateTime:logic,
  onShow:logic
});
$('#datetimepicker8').datetimepicker({
  onGenerate:function( ct ){
    $(this).find('.xdsoft_date')
      .toggleClass('xdsoft_disabled');
  },
  minDate:'-1970/01/2',
  maxDate:'+1970/01/2',
  timepicker:false
});
$('#datetimepicker9').datetimepicker({
  onGenerate:function( ct ){
    $(this).find('.xdsoft_date.xdsoft_weekend')
      .addClass('xdsoft_disabled');
  },
  weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
  timepicker:false
});
var dateToDisable = new Date();
  dateToDisable.setDate(dateToDisable.getDate() + 2);
$('#datetimepicker11').datetimepicker({
  beforeShowDay: function(date) {
    if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
      return [false, ""]
    }

    return [true, ""];
  }
});
$('#datetimepicker12').datetimepicker({
  beforeShowDay: function(date) {
    if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
      return [true, "custom-date-style"];
    }

    return [true, ""];
  }
});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})


</script>
    <!-- js placed at the end of the document so the pages load faster -->
    <!-- sumoselect->
   <script src="assets/js/jquery.js"></script>-->


   <!-- <script src="assets/js/bootstrap.min.js"></script>-->
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <!--<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>-->


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->

 <!-- <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>-->

  </body>
</html>
