<!DOCTYPE html>
<html lang="en">


<head>  
  <meta charset="utf-8" />
 
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icon.css" type="text/css" />



                <!-- Main content -->
    
              
                
              <section class="panel panel-default">
                <header class="panel-heading font-bold">                  
                 <?php echo $nav_subtitle;?>
                </header>
                 <div class="panel-body">

                <form method="post" class="form-horizontal" action="">
                     <div class="form-group">
                           
              
                             <!--  <?php foreach ($result as $y):{?> -->
                               <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label for= "Answer" class="col-sm-2 control-label">Answer :</label>
                               <div class="col-md-5">
                               <input name="a_text[]" type="text" id="a_text" class="form-control" value="<?php echo $result['a_text']; ?>">

                             <!--   <?php } endforeach ?> -->
                             </div></div></div>
                        
                            <div class="doc-buttons">
                            <button type="submit" class="btn btn-sm btn-default">Submit</button>
                            <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-default">Cancel</a></div>
                            </form>

                </section><!-- /.content -->

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        
</html>

