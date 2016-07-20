<!DOCTYPE html>
<html lang="en" class="app">
<?php
if (!isset($_SESSION['userid'])) {

  header("location: http://localhost/digitalgaia/iris/dashboard");
}
  //echo $_SESSION['userid'];
?>
<head>  
  <meta charset="utf-8" />
  <title>Learning Management System</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icon.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css" type="text/css" />  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/calendar/bootstrap_calendar.css" type="text/css" />

  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/multi/google-code-prettify/prettify.css" />
      

        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?php echo base_url(); ?>assets/js/app.js"></script>  
  <script src="<?php echo base_url(); ?>assets/js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/charts/flot/jquery.flot.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/charts/flot/jquery.flot.spline.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/charts/flot/jquery.flot.pie.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/charts/flot/jquery.flot.resize.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/charts/flot/jquery.flot.grow.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/charts/flot/demo.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/calendar/bootstrap_calendar.js"></script>
  <!--<script src="<?php echo base_url(); ?>assets/js/calendar/demo.js"></script>-->

  <script src="<?php echo base_url(); ?>assets/js/sortable/jquery.sortable.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/app.plugin.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/add/jquery-1.10.2.min.js"></script>
<!-- popup correct -->

 <!-- <link href="<?php echo base_url(); ?>assets/csss/bootstrap.css" rel="stylesheet" type="text/css" /> -->

 <!-- /////////////////////// -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/jss/bootstrap.js"></script>




 <!-- datepicker -->
  <script src="<?php echo base_url(); ?>assets/js/datepicker/bootstrap-datepicker.js"></script>
  <!-- slider -->
  <script src="<?php echo base_url(); ?>assets/js/slider/bootstrap-slider.js"></script>
  <!-- file input -->  
  <script src="<?php echo base_url(); ?>assets/js/file-input/bootstrap-filestyle.min.js"></script>
  <!-- wysiwyg -->
  <script src="<?php echo base_url(); ?>assets/js/wysiwyg/jquery.hotkeys.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/wysiwyg/bootstrap-wysiwyg.js"></script>
  <!--<script src="<?php echo base_url(); ?>assets/js/wysiwyg/demo.js"></script>-->
  <!-- markdown -->
  <script src="<?php echo base_url(); ?>assets/js/markdown/epiceditor.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/markdown/demo.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/chosen/chosen.jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/app.plugin.js"></script>
   <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
  <!-- parsley -->
<script src="<?php echo base_url(); ?>assets/js/parsley/parsley.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/parsley/parsley.extend.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/app.plugin.js"></script>


<script language ="javascript">
        var tim;       
        var min = '${sessionScope.min}';
        var sec = '${sessionScope.sec}';
        var f = new Date();

        function customSubmit(someValue){  
           document.questionForm.minute.value = min;   
           document.questionForm.second.value = sec; 
           document.questionForm.submit();  
           }  

        function examTimer() {
            if (parseInt(sec) >0) {

          document.getElementById("showtime").innerHTML = "Time Remaining :"+min+" Minutes ," + sec+" Seconds";
                sec = parseInt(sec) - 1;                
                tim = setTimeout("examTimer()", 1000);
            }
            else {

          if (parseInt(min)==0 && parseInt(sec)==0){
            document.getElementById("showtime").innerHTML = "Time Remaining :"+min+" Minutes ," + sec+" Seconds";
             alert("Time Up");
             document.questionForm.minute.value=0;
             document.questionForm.second.value=0;
             document.questionForm.submit();

           }

                if (parseInt(sec) == 0) {       
            document.getElementById("showtime").innerHTML = "Time Remaining :"+min+" Minutes ," + sec+" Seconds";         
                    min = parseInt(min) - 1;
          sec=59;
                    tim = setTimeout("examTimer()", 1000);
                }

            }
        }
    </script>
  
<!--untuk pagination-->

  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>