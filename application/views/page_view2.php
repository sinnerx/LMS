<!DOCTYPE html>
<html lang="en" class="app">
<?php
if (!isset($_SESSION['userid'])) {

 header("location: ../dashboard");
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
  <script src="<?php echo base_url(); ?>assets/js/calendar/demo.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/sortable/jquery.sortable.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/app.plugin.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/add/jquery-1.10.2.min.js"></script>
<!-- popup correct -->

 <!-- <link href="<?php echo base_url(); ?>assets/csss/bootstrap.css" rel="stylesheet" type="text/css" /> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
  <script src="<?php echo base_url(); ?>assets/js/wysiwyg/demo.js"></script>
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



<!--untuk pagination-->

  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="">
  <section class="vbox">
    <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
          <i class="fa fa-bars"></i>
        </a>
        <a href="#" class="navbar-brand"><img src="<?php echo base_url(); ?>assets/images/logo.png" class="m-r-sm">Learning Management System</a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>   
      <!-- <ul class="nav navbar-nav hidden-xs">
       <li>
         <a href="../dashboard"  style="border-left:1px dashed #CECECE;">
         <span class="btn btn-s-md btn-success">Go to Pi1m</span>
         </a>
       </li>
      </ul> -->
    
           
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
       
        <!-- /.aside -->
        <!--left_side-->


<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
             <div class="m-b-md">
                <h3 class="m-b-none"></h3>
                  </div>
