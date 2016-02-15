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

                <form method="post" class="form-horizontal" action="<?php echo base_url() ?>index.php/question/Update_question">
                     <div class="form-group">
                           
                               <input type="hidden" name="q_id" id="q_id" value="<?php echo $question['q_id']; ?> ">
                            <!--    <input type="hidden" name="no_pictures" id="no_pictures" value="<?php echo $dd_report['no_pictures']; ?>" />-->
                              <!--     <input type="submit" class="btn btn-info btn-sm fa fa-floppy-o" value="Submit" />
                         
                            </i>
                        </div><!-- /.box-header -->

                        
                              


                               <div class="form-group">
                               <label class="col-sm-2 control-label">Module ID</label>
                               <div class="col-md-5">
                               <input type="text" name="id" class="form-control" value="<?php echo $question['code']; ?>-<?php echo $question['name']; ?>"disabled>
                               </div>
                               </div>
                               
                               <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label class="col-sm-2 control-label">Question</label>
                               <div class="col-md-5">
                               <input type="text" name="q_text" class="form-control" value="<?php echo $question['q_text']; ?>">
                               </div>
                               </div> 

                               
                               <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Type</label>
                            <div class="col-md-4">
                            <select name="type" class="form-control m-b">
                            <option <?php echo ($question['type']=='Easy')?'selected="selected"':''; ?>>Easy</option>
                            <option <?php echo ($question['type']=='Intermidiate')?'selected="selected"':''; ?>>Intermidiate</option>
                            <option <?php echo ($question['type']=='Hard')?'selected="selected"':''; ?>>Hard</option>
                            </select>
                            </div>
                            </div>
                              <!--  <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label class="col-sm-2 control-label">Type</label>
                               <div class="col-md-5">
                               <input type="text" name="type" class="form-control" value="<?php echo $question['type']; ?>">
                               </div><!-- /.box-body -->
                              <!--  </div> --><!-- /.box -->

                              <?php foreach ($answer as $y):{?>
                               <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label for= "Answer" class="col-sm-2 control-label">Answer :</label>
                               <div class="col-md-5">
                               <input name="a_text[]" type="text" id="a_text" class="form-control" value="<?php echo $y['a_text']; ?>"><input name="a_id[]" type="hidden" id="a_id" class="form-control" value="<?php echo $y['a_id']; ?>"></div><input type="radio" value="<?php echo $y['a_id']; ?>" id="correct"  name="correct">&nbsp; &nbsp;&nbsp;<a href="<?php echo base_url().'question/deletes/'.$y['a_id'] ;?>"><i class="fa fa-trash-o "></i></a><br/>

                               <?php } endforeach ?>
                             </div></div></div>
                        
                            <div class="doc-buttons">
                            <button type="submit" class="btn btn-sm btn-default">Submit</button>
                            <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-default">Cancel</a></div>
                            </form>

                </section><!-- /.content -->

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        
</html>

