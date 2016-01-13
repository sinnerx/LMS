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
                <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/course/Update_course">
                  <div class="form-group">
                  <input type="hidden" name="id" id="id" value="<?php echo $course['id']; ?> ">
                  <label class="col-sm-2 control-label">Course ID</label>
                  <div class="col-md-5">
                  <input type="text" name="courseID" id="courseID" value="<?php echo $course['courseID']; ?>" class="form-control">
                  </div>
                  </div>
                        <!--- wsig-->



                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Topic</label>
                      <div class="col-md-5">
                        <input type="text" name="Topics" id="Topics" value="<?php echo $course['Topics']; ?>"  class="form-control">
                        
                      </div>
                    </div>
                     <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Description</label>
                      <div class="col-md-5">
                        <input type="text" name="Descr" id="Descr" value="<?php echo $course['Descr']; ?>" class="form-control">
                        
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Package</label>
                      <div class="col-md-5">
                       
                        <select style="width:260px" name="m_id" class="form-control m-b" > <option>Select One</option> 
                        <?php 

                        foreach($groups as $row)
                         { 

                       
                        echo '<option value="'.$row->m_id.'">'.$row->Name.'</option>';
                          }
                           ?>
                       </select>
                      </div>



                    </div>
                    <div class="doc-buttons">
                     <button type="submit" class="btn btn-sm btn-default">Submit</button>
                     <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-default">Cancel</a></div>

                  </form>                  
                </div>
              </section>
             