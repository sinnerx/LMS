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

                <form method="post" class="form-horizontal" action="<?php echo base_url() ?>index.php/question/Update_correct">
                     <div class="form-group">

                               
                               <?php foreach ($result as $y => $value) {?> 
                               <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label for= "Answer" class="col-sm-2 control-label">Answer :</label>
                               <div class="col-md-5">
                                <input type="hidden" name="q_id" id="q_id" value="<?php echo $value->q_id; ?> ">
                                
                                <input name="a_text[]" type="text" id="a_text" class="form-control" value="<?php echo $value->a_text; ?>"><input name="a_id[]" type="hidden" id="a_id" class="form-control" value="<?php echo $value->a_id; ?>"></div><input type="radio" value="<?php echo $value->a_id; ?>" id="correct"  name="correct"><br/>
                               <!-- <input name="a_text[]" type="text" id="a_text" class="form-control" value="<?php echo $value->a_text; ?>"> -->

                               <?php } ?>
                             </div></div>
                        
                            <div class="doc-buttons">
                            <button type="submit" class="btn btn-sm btn-default">Set</button>
                            <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-default">Cancel</a>
                            </div>
                            </form>

                </section><!-- /.content -->

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        
</html>

