<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none"></h3>
              </div>
              
                
              <section class="panel panel-default">
                <header class="panel-heading font-bold">                  
                 Add New Course
                </header>
                <div class="panel-body">
                  <form class="form-horizontal" method="post" data-validate="parsley" action="<?php echo base_url() ?>index.php/course/courses_data">
                    <div class="form-group">


                    <div class="form-group">
                 
                    
                     <div class="line line-dashed b-b line-lg pull-in"></div>
                      <label class="col-sm-2 control-label">Module ID</label>
                      <div class="col-md-5">
                        <input type="text" name="code" id="code" class="form-control" data-required="true"/>
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Module name</label>
                      <div class="col-md-5">
                        <input type="text" name="name" id="name" class="form-control" data-required="true"/>
                      </div>
                    </div>
                     <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Description</label>
                      <div class="col-md-5">
                        <textarea name="description" id="description" class="form-control"/></textarea>
                        
                      </div>
                    </div>
                       <input type="hidden" name="status" class="form-control" value="1">


                      <div class="line line-dashed b-b line-lg pull-in"></div>
                     <div class="form-group">
                     <label class="col-sm-2 control-label">Training type</label>
                     <div class="col-md-5">
                     <select data-required="true" style="width:260px" name="typeid" class="form-control m-b"/><option value="">Select one </option>;
                     <?php 
                     foreach($group as $row)
                      { 
                        echo '<option value="'.$row->trainingTypeID.'">'.$row->trainingTypeName.'</option>';
                      }
                      ?>
                      </select>
                      </div>
                      </div>
                     <!--  <input type="hidden" name="typeid" class="form-control" value="2"> -->
                     <div class="doc-buttons">
                     <button type="submit" class="btn btn-sm btn-default">Submit</button>
                    <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-default">Cancel</a></div>
                  </form>                  
                </div>
              </section>
             