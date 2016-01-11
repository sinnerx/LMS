
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
 
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icon.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css" type="text/css" /> 

<section id="content">
    <section class="vbox">
    <section class="scrollable padder">
        <!-- Main content -->
    <div class="m-b-md">
        <h3 class="m-b-none"></h3>
     </div>
        <section class="panel panel-default">
        <header class="panel-heading font-bold">                  
        <?php echo $nav_subtitle; ?>                
        </header>
        <div class="box-tools">
        <div class="input-group">
        </div>
        </div>
        </div><!-- /.box-header -->
                
        <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
            <th>No.</th>
            <th>Answer</th>
            <th></th>
            </tr>

            <?php $count=0; foreach ($answer as $answer_list): $count++; ?>
            <tr>
            <td><?php echo $count; ?></td>
            <td><a href="<?php echo base_url().'index.php/answer/edit/'.$answer_list['a_id'] ;?>"> <?php echo $answer_list['a_text']; ?></a></td>
            

             <div class="col-md-3 col-sm-4"><td><a href="<?php echo base_url().'index.php/answer/delete/'.$answer_list['a_id'] ;?>"><i class="fa fa-trash-o "></i></a> <td></div>
            </tr>

            <?php endforeach ?>
            </table>
            </div><!-- /.box-body -->
            </div><!-- /.box -->
            <br/>
            <form action="<?php echo base_url(); ?>index.php/answer/insert/">
            <input type="submit" class="btn btn-s-md btn-default" value="Add New" />     
            </form>
        </section><!-- /.content -->





    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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