 <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icon.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css" type="text/css" /> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/datepicker/datepicker.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/slider/slider.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/chosen/chosen.css" type="text/css" />
  <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                
              </div>
              
                
              <section class="panel panel-default">
                <header class="panel-heading font-bold">                  
                <?php echo $nav_subtitle;?>
                </header>
                <div class="panel-body">
                <form class="form-horizontal" method="post" data-validate="parsley" action="<?php echo base_url() ?>index.php/course/Update_course">
                  <div class="form-group">
                  <input type="hidden" name="id" id="id" value="<?php echo $course['id']; ?> ">
                  <label class="col-sm-2 control-label">Module ID</label>
                  <div class="col-md-5">
                  <input type="text" name="code" id="code" value="<?php echo $course['code']; ?>" class="form-control">
                  </div>
                  </div>
                        <!--- wsig-->


                         
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Module name</label>
                      <div class="col-md-5">
                        <input type="text" name="name" id="name" value="<?php echo $course['name']; ?>"  class="form-control">
                        
                      </div>
                    </div>
                     <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Description</label>
                      <div class="col-md-5">
                        <textarea name="description" id="description" class="form-control"><?php echo $course['description']; ?></textarea>
                        
                      </div>
                    </div>


                    <div class="line line-dashed b-b line-lg pull-in"></div>
                                  <div class="form-group">
                                  <label class="col-sm-2 control-label">Training Type</label>
                                  <div class="col-md-5">
                                   
                                  <select data-required="true" style="width:260px" name="typeid" class="form-control m-b">
                                 <?php 
                                 foreach($group as $row)
                                  { 
                                    if($row->trainingTypeID == $course['typeid'])
                                      $selected = "selected";
                                    else
                                      $selected = "";
                                    echo '<option value="'.$row->trainingTypeID.' " '. $selected.'>'.$row->trainingTypeName.'</option>';
                                  }
                                  ?>
                                  </select>
                                  </div>
                                  </div>
                  <!--   <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Package</label>
                      <div class="col-md-5">
                       
                        <select style="width:260px" data-required="true" name="packageid" class="form-control m-b" > <option value="">Select One</option> 
                        <?php 

                        foreach($groups as $row)
                         { 

                       
                        echo '<option value="'.$row->packageid.'">'.$row->name.'</option>';
                          }
                           ?>
                       </select>
                      </div>
 -->


                    </div>
                    <div class="doc-buttons">
                     <button type="submit" class="btn btn-sm btn-default">Update</button>
                     <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-default">Cancel</a></div>

                  </form>                  
                </div>
              </section>
             