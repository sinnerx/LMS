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
                  <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/course/courses_data">
                    <div class="form-group">


                    <div class="form-group">
                      <label class="col-sm-2 control-label">Package</label>
                      <div class="col-md-5">
                        <?php
                            $query = "SELECT * FROM lms_package_module"; $result = mysqli_query($query); ?> 
                        <select style="width:260px" name="m_id" class="form-control m-b" ><option>Select one </option><?php while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) { ?> 
                          
                          <option value="<?php echo $line['m_id'];?> "> <?php echo $line['Name'];?></option> <?php } ?>
                       </select>
                      </div>
                    </div>
                    
                     <div class="line line-dashed b-b line-lg pull-in"></div>
                      <label class="col-sm-2 control-label">Course ID</label>
                      <div class="col-md-5">
                        <input type="text" name="courseID" id="courseID" class="form-control"/>
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Topic</label>
                      <div class="col-md-5">
                        <input type="text" name="Topics" id="Topics" class="form-control"/>
                      </div>
                    </div>
                     <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Description</label>
                      <div class="col-md-5">
                        <input type="text" name="Descr" id="Descr" class="form-control"/>
                        
                      </div>
                    </div>
                   
                     <div class="doc-buttons">
                     <button type="submit" class="btn btn-sm btn-default">Submit</button>
                    <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-default">Cancel</a></div>
                  </form>                  
                </div>
              </section>
             