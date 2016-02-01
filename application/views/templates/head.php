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
  
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>