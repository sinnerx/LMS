<section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none"></h3>
              </div>
              
                
              <section class="panel panel-default">
                <header class="panel-heading font-bold">                  
                 Choose Package
                </header>
                <div class="panel-body">
                  <form class="form-horizontal" method="post" data-validate="parsley" action="<?php echo base_url() ?>packages/packages_data">
                    <div class="form-group">


                    <div class="form-group">
                      <label class="col-sm-2 control-label">Package Name</label>
                      <div class="col-md-5">
                        <select data-required="true" style="width:260px" name="m_id" class="form-control m-b"><option value="">Select one </option>;
                        <?php 

                    foreach($groups as $row)
                    { 
                    echo '<option value="'.$row->m_id.'">'.$row->Name.'</option>';
                    }
                    ?>
                    </select>
                            
                       
                      </div>
                    </div>
                    
                     <div class="line line-dashed b-b line-lg pull-in"></div>
                      <label class="col-sm-2 control-label">Module ID</label>
                      <div class="col-md-5">
                        <input type="text" name="courseID" id="courseID" class="form-control" data-required="true"/>
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Module Name</label>
                      <div class="col-md-5">
                        <input type="text" name="Topics" id="Topics" class="form-control" data-required="true"/>
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
             