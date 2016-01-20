
<html lang="en" class="app">
<?php
if($_SESSION['userLevel'] != 2){
       
      header("location: ./");
     
  }
  ?>
<head>  
  <meta charset="utf-8" />
 
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icon.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css" type="text/css" /> 
        <!-- Main content -->
        <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
        <!-- Main content -->
 <div class="m-b-md">
                <h3 class="m-b-none"></h3>
              </div>
                 <section class="panel panel-default">
                <header class="panel-heading font-bold">                  
                <?php echo $nav_subtitle; ?>                
            </header>
                    
        <br />
        
        <a href="<?php echo base_url(); ?>packages/"><button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Choose Package</button></a>
    <!--     <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button> -->
        <br />
        <br />
       mydashboard
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
</body>
</html>