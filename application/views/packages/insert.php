
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
                    <form class="form-horizontal" data-validate="parsley" method="post" action="<?php echo base_url() ?>package/package_data">
                    <div class="form-group">
             
                          

                     
                      <div class="form-group">
                      <label class="col-sm-2 control-label">Package name</label>
                      <div class="col-md-5">
                      <input type="text" data-required="true" name="name" id="name" class="form-control" />
                      <input type="hidden" data-required="true" name="status" id="status" value="1" />
                      </div>
                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>
                     <div class="form-group">
                     <label class="col-sm-2 control-label">Billing Item</label>
                     <div class="col-md-5">
                     <select data-required="true" style="width:260px" name="billing_item_id" class="form-control m-b"><option value="">Select one </option>;
                     <?php 
                     foreach($group as $row)
                      { 
                        echo '<option value="'.$row->billingItemID.'">'.$row->billingItemName.'</option>';
                      }
                      ?>
                      </select>
                      </div>
                      </div>

                           <div class="doc-buttons">
                           <button type="submit" class="btn btn-sm btn-default">Submit</button>
                           <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-default">Cancel</a></div>

                     </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->

   