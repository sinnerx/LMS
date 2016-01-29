
        <!-- Main content -->
       <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none"></h3>
              </div>
              
                
              <section class="panel panel-default">
                <header class="panel-heading font-bold">  <?php echo $nav_subtitle; ?>   
                </header>
                  
                     <div class="panel-body">
                     <form class="form-horizontal" data-validate="parsley" method="post" action="<?php echo base_url() ?>module/module_data">
                     <div class="form-group">
                     <label class="col-sm-2 control-label">Package</label>
                     <div class="col-md-5">
                     <select data-required="true" style="width:260px" name="packageid" class="form-control m-b"><option value="">Select one </option>;
                     <?php 
                     foreach($groups as $row)
                      { 
                        echo '<option value="'.$row->packageid.'">'.$row->name.'</option>';
                      }
                      ?>
                      </select>
                      </div>
                      </div>


                     <div id="box">
                     <div class="line line-dashed b-b line-lg pull-in"></div>
                     <div class="form-group">
                     <label class="col-sm-2 control-label">Module</label>
                     <div class="col-md-5">
                     <select data-required="true" id="moduleid" name="moduleid" class="form-control"><option value="">Select one </option>;
                     <?php 
                     foreach($group as $row)
                      { 
                        echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                      }
                      ?>
                      </select></div>
                      <img src="<?php echo base_url(); ?>assets/add/add.png" width="32" height="32" border="0" align="top" class="tambah" id="tambah" />
                      </div>
                      </div>
                      </div>

                      <div class="doc-buttons">
                      <button type="submit" class="btn btn-sm btn-default">Submit</button>
                      <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-default">Cancel</a></div>

                     </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->

   