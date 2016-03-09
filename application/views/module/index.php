<?php if($_SESSION['userLevel'] != 99){
       
      header("location: ./");
      //echo $userid;
       //if ($_SERVER['PHP_SELF'] != "") header("Location: admin/");
       //echo "Admin is here";
  } ?>
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
        <!-- Main content -->
        
                 <section class="panel panel-default">
                <header class="panel-heading font-bold">                  
                <?php echo $nav_subtitle; ?>                
            </header>
                    
        <br />
        
        <a href="<?php echo base_url(); ?>module/insert/"><button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add Package Module</button></a>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Package Name</th>
                    <th>Module Name</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            

            
        </table>
    </div>

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('module/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});



function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Question'); // Set Title to Bootstrap modal title
}

function edit_person(packageid)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('module/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

           
            $('[name="packageid"]').val(data.id);
            $('[name="name"]').val(data.name);
            //$('[name="type"]').val(data.type);
            /*$('[name="gender"]').val(data.gender);
            $('[name="address"]').val(data.address);
            $('[name="dob"]').datepicker('update',data.dob);*/
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Question'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('module/ajax_add')?>";
    } else {
        url = "<?php echo site_url('module/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_person(packageid)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('package/ajax_delete')?>/"+packageid,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

// </script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <?php echo $list; ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
               <form class="form-horizontal" method="post" id="form" action="<?php echo base_url() ?>question/questions_data">
                    <div class="form-group">
                                <?php echo "Welcome userID = ". $userid .". Your user level ID is ". $userLevel; ?>
                            <label class="col-sm-2 control-label">Course</label>
                            <div class="col-md-4">
                            <?php
                            $query = "SELECT * FROM lms_module"; $result = mysql_query($query); ?> 
                            <select name="id" class="form-control m-b"><?php while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) { ?> 
                            <option value=" <?php echo $line['id'];?> "> <?php echo $line['name'];?></option> <?php } ?>
                            </select>
                            </div>
                            </div>
                        
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Type</label>
                            <div class="col-md-4">
                            <select name="type" class="form-control m-b">
                            <option value="Easy">Easy</option>
                            <option value="Intermidiate">Intermidiate</option>
                            <option value="Hard">Hard</option>
                            </select>
                            </div>
                            </div>

                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Question</label>
                            <div class="col-md-5">
                            <input type="text" name="q_text" id="q_text" class="form-control" />
                            </div>
                            </div>

                            <div id="box">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Answer</label>
                            <div class="col-md-5">

                            <input name="a_text" type="text" id="name" class="form-control"></div><input type="radio" value="1" name="correct"> 
                            <img src="<?php echo base_url(); ?>assets/add/add.png" width="32" height="32" border="0" align="top" class="add" id="add" />
                            </div></div></div>



                           <button type="submit" class="btn btn-sm btn-default">Submit</button
                     </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
</body>
</html>