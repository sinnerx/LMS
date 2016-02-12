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
   <!--  <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none"></h3>
              </div>
               -->
                
              <section class="panel panel-default">
                <header class="panel-heading font-bold">                  
                 <?php echo $nav_subtitle;?>
                </header>
                 <div class="panel-body">

                <form method="post" class="form-horizontal" action="<?php echo base_url() ?>module/module_datas">
                     <div class="form-group">
                           
                               
                               
                              <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label class="col-sm-2 control-label">Package Name</label>
                               <div class="col-md-5">
                               <input type="text" name="name" class="form-control" value="<?php echo $module['name']; ?>"disabled>
                               <input type="hidden" name="packageid" class="form-control" value="<?php echo $module['a']; ?>">
                               </div>
                               </div> 
                               <div class="line line-dashed b-b line-lg pull-in"></div>
                              <!--   <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">Module</label>
                                <div class="col-md-5">
                                <select data-required="true" style="width:260px" name="packageid" class="form-control m-b">
                                <?php 

                                foreach($groups as $row)
                                { 
                                  echo '<option value="'.$row->packageid.'" selected="selected">'.$row->name.'</option>';
                                }
                                ?>
                                </select>
                                </div>
                                </div> -->
                               
                              
        

                             <!--  <?php foreach ($modules as $y):{?>
                               <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label for= "Module" class="col-sm-2 control-label">Module :</label>
                               <div class="col-md-5">
                               <input name="name" type="text" id="name" class="form-control" value="<?php echo $y['module_name']; ?>"><input name="id[]" type="hidden" id="id" class="form-control" value="<?php echo $y['id']; ?>"></div>&nbsp; &nbsp;&nbsp;<a href="<?php echo base_url().'module/deletes/'.$y['id'] ;?>"><i class="fa fa-trash-o "></i></a><br/>

                               <?php } endforeach ?>
                             </div></div></div> -->


                             <div class="col-sm-5">

            
          Modules<select name="a_" id="multiselect" class="form-control" size="8" multiple="multiple">
             <?php foreach ($modu as $n):{?><option value="<?php echo $n['id'];?> " data-position="1"><?php echo $n['name'];?></option> <?php } endforeach ?>
          </select>
        </div>
        
        <div class="col-sm-2">
          <button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
          <button type="button" id="multiselect_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
          <button type="button" id="multiselect_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
          <button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
        </div>
        
         <div class="col-sm-5">

          Selected Modules<select name="moduleid[]" id="multiselect_to" class="form-control" size="8" multiple="multiple">
           <?php foreach ($modules as $y):{?><option  value="<?php echo $y['id'];?> " data-position="1"><?php echo $y['module_name'];?></option><?php } endforeach ?>
         </select>
         </div>
                        
                            <div class="doc-buttons">

                           <center> <button type="submit" class="btn btn-sm btn-default">Submit</button>
                            <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-default">Cancel</a><center> </div>

                           
                            </form>

                </section><!-- /.content -->

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        
</html>

