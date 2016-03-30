
                <!-- Main content -->
              <!--   <section id="content">
          <section class="vbox">
            <section class="scrollable padder"> -->
              
            
              
                
              <section class="panel panel-default">
                <header class="panel-heading font-bold">                  
                 <?php echo $nav_subtitle;?>
                </header>
                 <div class="panel-body">

                <form method="post" class="form-horizontal" data-validate="parsley" action="<?php echo base_url() ?>package/Update_package">
                
                <div class="form-group">
               
                 <!-- /.box-header -->

                               <!-- <div class="box-body table-responsive no-padding"> -->
                               <div class="form-group">
                               <label class="col-sm-2 control-label">Course</label>
                               <div class="col-sm-5">
                                 <input type="hidden" name="packageid" id="packageid" value="<?php echo $package['packageid']; ?>" />
                               <input type="text" name="name" class="form-control" value="<?php echo $package['name']; ?>">
                               </div>
                                </div>
                               
                                
                                  <div class="line line-dashed b-b line-lg pull-in"></div>
                                  <div class="form-group">
                                  <label class="col-sm-2 control-label">Billing Item</label>
                                  <div class="col-md-5">
                                   
                                  <select data-required="true" style="width:260px" name="billing_item_id" class="form-control m-b">
                                 <?php 
                                 foreach($groups as $row)
                                  { 
                                    if($row->billingItemID == $package['billing_item_id'])
                                      $selected = "selected";
                                    else
                                      $selected = "";
                                    echo '<option value="'.$row->billingItemID.' " '. $selected.'>'.$row->billingItemName.'</option>';
                                  }
                                  ?>
                                  </select>
                                  </div>
                                  </div>
                                 
                                    <!-- Date and time range -->
                                   <!-- <div class="input-group custom-size">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>-->
                                      <!--  <input type="text" name="dt_update" class="form-control pull-right" id="datetimepicker1" data-date-format="YYYY-MM-DD HH:mm:ss" <?php if ($dd_report['dt_update'] != '0000-00-00 00:00:00') { ?> value="<?php echo $dd_report['dt_update']; ?>" <?php } ?>/>
                                    </div><!-- /.input group -->
                      <div class="doc-buttons">
                     <button type="submit" class="btn btn-sm btn-default">Update</button>
                     <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-default">Cancel</a></div>
    


                    
                </form>
            </div>
             </div>
                </section><!-- /.content -->

            <!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- CK Editor -->
        <script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>

        <!-- Custom Script -->
        <script src="<?php echo base_url(); ?>assets/js/script.js" type="text/javascript"></script>

        <!-- Star Rating -->
        <script src="<?php echo base_url(); ?>assets/js/star-rating.min.js" type="text/javascript"></script>

        <!-- InputMask -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

        <!-- date-range-picker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datepicker/bootstrap-datepicker.min.js" type="text/javascript"></script>

        <!-- bootstrap Moment -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/moment/moment.js" type="text/javascript" ></script>
        <!-- bootstrap Date time picker -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

        <!-- Page script -->
        <script type="text/javascript">
            $(function() {

                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });

                // Date & Time
                $('#datetimepicker1').datetimepicker();
            });
        </script>

        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/dashboard.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>

    </body>
</html>