<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?php //echo base_url('assets/jquery/jquery-1.12.0.min.js')?>"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/buttons.flash.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/buttons.html5.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/buttons.print.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.buttons.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jszip.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/pdfmake.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/vfs_fonts.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.min.js')?>"></script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/datatables/css/buttons.dataTables.min.css" type="text/css" />

<script type="text/javascript">

$(document).ready(function() {
//alert('oi');

function starting(){
    if($("#forpi1m").val() == '1'){
            hide_all();
            //$("#region_div").show();
          }        
          else if($("#forpi1m").val() == '2'){
            hide_all();
            //$("#region_div").show();
          }             
          else if($("#forpi1m").val() == '3'){
            hide_all();
            $("#region_div").show();
            //$("#region").val('1');
          }
          else if ($("#forpi1m").val() == '4'){
            hide_all();
            $.ajax({
                type: 'GET',
                dataType: "json",
                url: 'reporting/get_clusterbyuser?'+ 'userid=' + '<?php echo $userid; ?>' + '&userlevel=' + '<?php echo $userLevel; ?>',
                
                success: function (data){
                    console.log(data);
                    $el = $("#cluster");
                    $el.empty();
                    //$el.append($("<option></option>")
                    //        .attr("value", '').text('Please Select'));
                    $.each(data, function(value, key) {
                        $el.append($("<option></option>")
                                .attr("value", value).text(key));
                      });
                }
            });
            $("#cluster_div").show();
          }
          else if ($("#forpi1m").val() == '5'){
            hide_all();
            $("#site_div").show();
          }
          else if ($("#forpi1m").val() == '6'){
            hide_all();
            $("#member_div").show();
          }
  //$("#region_div").show();
}

var $loading = $('#loading').hide();
$(document)
  .ajaxStart(function () {
    $loading.show();
  })
  .ajaxStop(function () {
    $loading.hide();
  });
//$("#forpi1m").val($("#forpi1m option:first").val()); 
//$("#forpi1m option:first").attr('selected', true);
//$('#forpi1m option:first-child').attr("selected", "selected");
$("#forpi1m").change(starting).trigger('change');
// $('#forpi1m').trigger('change');
$('#dateFrom').datepicker({ dateFormat: 'dd-mm-yy' });
    $('#dateTo').datepicker({ dateFormat: 'dd-mm-yy' });      

      $("#sitename").autocomplete({
        source: "reporting/get_site", // path to the get_site method
        select: function (event, ui){
          event.preventDefault();
          $("#sitename").val(ui.item.label);
          //PK.render(ui.item.value);
          //console.log(ui.item.value);
          $("#siteid").val(ui.item.value);
          //alert($("#siteid").val());
          //$("#siteid").val();
        }
      });

      $("#sitename").change(function(){
        if($("#sitename").val().length == 0){
          $("#siteid").val('');
        }
      });

      $("#membername").autocomplete({
        source: "reporting/get_user", // path to the get_user method
        select: function (event, ui){
          event.preventDefault();
          $("#membername").val(ui.item.label);
          //PK.render(ui.item.value);
          //console.log(ui.item.value);
          $("#memberid").val(ui.item.value);
          //alert($("#siteid").val());
          //$("#siteid").val();
        }
      });

      $("#membername").change(function(){
        if($("#membername").val().length == 0){
          $("#memberid").val('');
        }
      });      

      $("#modulename").autocomplete({
        source: "reporting/get_module", // path to the get_module method
        select: function (event, ui){
          event.preventDefault();
          $("#modulename").val(ui.item.label);
          //PK.render(ui.item.value);
          //console.log(ui.item.value);
          $("#moduleid").val(ui.item.value);
          //alert($("#siteid").val());
          //$("#siteid").val();
        }
      });     

      $("#modulename").change(function(){
        if($("#modulename").val().length == 0){
          $("#moduleid").val('');
        }
      });       

      $("#regionTESTTTTT").change(function(){
      //$("#region").change(function(){
        //console.log('region clicked');
          var id = $(this).val();
          //console.log(id);
          $.ajax({
            url : "reporting/get_cluster",
            data : "region_selected=" + $(this).val(),
            dataType : 'json',
            //async : false,
            success : function(response){
                data = response;
                //var obj = jQuery.parseJSON(data);
                //console.log(data);
                var select = $('#cluster');
                select.empty();
                $.each(data, function(index, value) { 
                  console.log(index);         
                    select.append(
                            $('<option></option>').val(index).html(value)
                        );
                });
                //return data;
            },
            error: function() {
              alert('Error occured');
            }
          });
      });
      $("#modulepackage").change(function(){
        if($("#modulepackage").val() == '1'){
          console.log("package div show");
          hide_modulepackage();
          $("#package").val($("#package option:eq(1)").val());
          $("#package_div").show();
        }
        else if ($("#modulepackage").val() == '2'){
          hide_modulepackage();
          $("#module_div").show();
        }
        else if ($("#modulepackage").val() == '0'){
          hide_modulepackage();
          //$("#module_div").show();
        }
      });

      $("#forpi1m").change(function(){
        // '1'  => 'All Pi1M Managers',
        // '2'  => 'All Nusuara Staff',
        // '3'  => 'Region',
        // '4' => 'Cluster',
        // '5' => 'Pi1M Site',
        // '6' => 'Manager',
        // '7' => 'Staff',   
          if($("#forpi1m").val() == '1'){
            hide_all();
            //$("#region_div").show();
          }        
          else if($("#forpi1m").val() == '2'){
            hide_all();
            //$("#region_div").show();
          }             
          else if($("#forpi1m").val() == '3'){
            hide_all();
            $("#region_div").show();
            $("#region").val('1');
          }
          else if ($("#forpi1m").val() == '4'){
            hide_all();
            $.ajax({
                type: 'GET',
                dataType: "json",
                url: 'reporting/get_clusterbyuser?'+ 'userid=' + '<?php echo $userid; ?>' + '&userlevel=' + '<?php echo $userLevel; ?>',
                
                success: function (data){
                    console.log(data);
                    $el = $("#cluster");
                    $el.empty();
                    //$el.append($("<option></option>")
                    //        .attr("value", '').text('Please Select'));
                    $.each(data, function(value, key) {
                        $el.append($("<option></option>")
                                .attr("value", value).text(key));
                      });
                }
            });
            $("#cluster_div").show();
          }
          else if ($("#forpi1m").val() == '5'){
            hide_all();
            $("#site_div").show();
          }
          else if ($("#forpi1m").val() == '6'){
            hide_all();
            $("#member_div").show();
          }                          
      });
  
      function hide_all(){
          $("#region_div").hide();
          

          $("#cluster_div").hide();
          //$("#cluster").val('');

          $("#site_div").hide(); 
           $("#sitename").val('');
           $("#siteid").val('');

          $("#member_div").hide(); 
          $("#membername").val('');
          $("#memberid").val('');        
      }

      function hide_modulepackage(){
          $("#package_div").hide();
          $("#package").val(''); 

          $("#module_div").hide(); 
          $("#modulename").val('');
          $("#moduleid").val('');          
      }

//$('#tableResultReport').html('abc');
$("#submitbtn").click(function(){
            //console.log($("form").serialize());
            var reporttype = $("#reporttype").val();
            console.log($("#reporttype").val());

            //console.log("<?php echo base_url() . 'reporting/result_list/?';?>" + $("form").serialize());
            
            if (reporttype == 1){
                console.log("<?php echo base_url() . 'reporting/result_member_passed_list/?';?>" + $("form").serialize());
                usm_report();
            }
            else if (reporttype == 2){
                console.log("<?php echo base_url() . 'reporting/result_list/?';?>" + $("form").serialize());
                nusuara_report();
            }
            

      });

  function usm_report(){
      //$("#report_div").empty();
      //$("#report_div").append('<table id="tableResultReport" class="table table-striped m-b-none"></table>');
            $("#report_div_nusuara").hide();
            $("#report_div_usm").show();      
                $.ajax({
                type: 'GET',
                dataType: "json",
                //url: 'reporting/result_list',
                url: 'reporting/result_member_passed_list',
                data: $("form").serialize(),
                success: function(data) {
                    //alert(data);
                    var tableData = data;
                    console.log(tableData);
                    //$("#testdiv").text(tableData);
                    $('#tableResultReportUSM').DataTable({ 
                        "data": tableData,
                        "bDestroy":true,
                        //"ajax": "reporting/attendance_list",
                        "processing": true, //Feature control the processing indicator.
                        //"serverSide": true, //Feature control DataTables' server-side processing mode.
                        "order": [], //Initial no order.
                        
                        // Load data for the table's content from an Ajax source
                        // "ajax": {
                        //     "url": "<?php //echo base_url() . 'reporting/attendance_list/?' . $query;?>",
                        //     "type": "POST"
                        // },

                        //Set column definition initialisation properties.
                        "columns": [
                          {title : "Name" },
                          {title : "I/C" },
                          {title : "Cluster" },
                          {title : "Pi1M" },
                          {title : "Package" },
                          //{title : "Module" },
                          {title : "Date Pass" },
                          {title : "Date Payment" },
                        ],
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'excelHtml5',
                                title: 'Data export \n',
                                orientation: "landscape",
                                filename: "Learning Management Report",


                            },
                            {
                                extend: 'pdfHtml5',
                                title: 'Data export \n',
                                orientation: "landscape",
                                filename: "Learning Management Report",
                            },
                            // 'copy', 'csv', 'excel', 'pdf', 'print'
                             'copy', 'csv', 'print'
                        ],


                    });//end datatable

                }
            });
  }

  function nusuara_report(){
            //$("#report_div").empty();
            //$("#report_div").append('<table id="tableResultReport" class="table table-striped m-b-none"></table>');
            $("#report_div_nusuara").show();
            $("#report_div_usm").hide();
            $("#pay_div").show();
            $.ajax({
                type: 'GET',
                dataType: "json",
                //url: 'reporting/result_list',
                url: 'reporting/result_list',
                data: $("form").serialize(),
                success: function(data) {
                    //alert(data);
                    var tableData = data;
                    console.log(tableData);
                    //$("#testdiv").text(tableData);
                    $('#tableResultReportNusuara').DataTable({ 
                        "data": tableData,
                        "bDestroy":true,
                        //"ajax": "reporting/attendance_list",
                        "processing": true, //Feature control the processing indicator.
                        //"serverSide": true, //Feature control DataTables' server-side processing mode.
                        "order": [], //Initial no order.

                        // Load data for the table's content from an Ajax source
                        // "ajax": {
                        //     "url": "<?php //echo base_url() . 'reporting/attendance_list/?' . $query;?>",
                        //     "type": "POST"
                        // },

                        //Set column definition initialisation properties.
                        "columns": [
                          {title : "Name" },
                          // {title : "I/C" },
                          {title : "Cluster" },
                          {title : "Pi1M" },
                          {title : "Package" },
                          {title : "Module" },
                          {title : "Paid Status" },
                          {title : "Quiz Status" },

                          // {title : "Date" },
                        ],
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'excelHtml5',
                                title: 'Data export \n',
                                orientation: "landscape",
                                filename: "Learning Management Report",


                            },
                            {
                                extend: 'pdfHtml5',
                                title: 'Data export \n',
                                orientation: "landscape",
                                filename: "Learning Management Report",
                            },
                            // 'copy', 'csv', 'excel', 'pdf', 'print'
                             'copy', 'csv', 'print'
                        ],

                    });//end datatable

                }
            });    
  }

  $("#reporttype").change(function(){
    if($("#reporttype").val() == 1){//usm
      hideNusuara();
      $("#datefrom_div").show();
      $("#dateto_div").show();      
      $el = $("#modulepackage");
      $el.empty();
      var dataModule = jQuery.parseJSON( '{ "0": "All Packages", "1": "Choose Package" }' );;
      //$el.append($("<option></option>")
      //        .attr("value", '').text('Please Select'));
      $.each(dataModule, function(value, key) {
          $el.append($("<option></option>")
                  .attr("value", value).text(key));
        });

      $("#modulepackage").val($("#modulepackage option:first").val());     
      $("#package").val($("#package option:first").val());     
      $("#forpi1m").val($("#forpi1m option:first").val());
      starting();     
    }
    else if($("#reporttype").val() == 2){//nusuara
      hideNusuara();
      //$("#participant_div").show();
      $("#test_result_div").show();
      $("#pay_div").show();

      $el = $("#modulepackage");
      $el.empty();
      // <option value="">All Modules/Packages</option>
      // <option value="1">Package</option>
      // <!-- <option value="2">Module</option> -->
      //var dataModule = '{1:"For USM", 2:"For NuSuara"}';
      var dataModule = jQuery.parseJSON( '{ "0": "All Modules/Packages", "1": "Choose Package", "2": "Choose Module" }' );
      //$el.append($("<option></option>")
      //        .attr("value", '').text('Please Select'));
      $.each(dataModule, function(value, key) {
          $el.append($("<option></option>")
                  .attr("value", value).text(key));
        });
      $("#modulepackage").val($("#modulepackage option:first").val());
      $("#package").val($("#package option:first").val());
      $("#forpi1m").val($("#forpi1m option:first").val()); 
    }

  });//reporttype onchange

  function hideNusuara(){
      $("#participant_div").hide();
      $("#test_result_div").hide();
      $("#pay_div").hide();
      $("#datefrom_div").hide();
      $("#dateto_div").hide();

  }
});
</script>
 
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icon.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css" type="text/css" /> 

<!-- <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none"></h3>
              </div> -->
              
                
              <section class="panel panel-default">
                <header class="panel-heading font-bold">                  
                 Reporting
                </header>
                <div class="panel-body">
                  
                                <?php echo form_open('reporting/show_result', array('target'=>'_blank', 'id'=>'myform'))?>
                                    <input type="hidden" name="userlevel" id="userLevel" value="<?php echo $userLevel;?>">
                                    <input type="hidden" name="defaultuserid" id="defaultuserid" value="<?php echo $userid;?>">
                                    <div class="modal-body form">
                                      <div class='form-group' class='col-sm-12'>
                                          <div class="col-md-2">  
                                                        <label>Type</label>
                                                      <select id="reporttype" name="reporttype" class="form-control">
                                                        <option value="1">USM Pass Report</option>
                                                        <option value="2">General Report</option>
                                                        <!-- <option value="4">Punch Anomaly</option>                               -->

                                                        <!-- <option value="3">Insufficient Hours</option>
                                                        <option value="4">Both Late/Early and Insufficient Hours</option>
                                                        <option value="5">Punch Anomaly</option>
                                                        <option value="6">No Attendance Problem</option> -->
                                                      </select>
                                          </div>                                        
                                          <div class="col-md-2" style="display:none" id="participant_div">  
                                                        <label>Show Participant</label>
                                                      <select id="participant" name="participant" class="form-control">
                                                        <option value="">All</option>
                                                        <option value="1">In Progress</option>
                                                        <option value="2">Completed Package</option>
                                                        <!-- <option value="4">Punch Anomaly</option>                               -->

                                                        <!-- <option value="3">Insufficient Hours</option>
                                                        <option value="4">Both Late/Early and Insufficient Hours</option>
                                                        <option value="5">Punch Anomaly</option>
                                                        <option value="6">No Attendance Problem</option> -->
                                                      </select>
                                          </div>
                                          <div class="col-md-2" style="display:none" id="test_result_div">  
                                                        <label>With Test Result</label>
                                                      <select id="testresult" name="testresult" class="form-control">
                                                        <option value="">Any</option>
                                                        <option value="1">Passed</option>
                                                        <!-- <option value="2">Failed/Not Taken</option> -->
                                                        <!-- <option value="4">Punch Anomaly</option>                               -->

                                                        <!-- <option value="3">Insufficient Hours</option>
                                                        <option value="4">Both Late/Early and Insufficient Hours</option>
                                                        <option value="5">Punch Anomaly</option>
                                                        <option value="6">No Attendance Problem</option> -->
                                                      </select>
                                          </div> 
                                          <div class="col-md-2" style="display:none" id="pay_div">  
                                                        <label>With Payment Status</label>
                                                      <select id="payment" name="payment" class="form-control">
                                                        <option value="">Any</option>
                                                        <option value="1">Paid</option>
                                                        <option value="2">Unpaid</option>
                                                        <!-- <option value="4">Punch Anomaly</option>                               -->

                                                        <!-- <option value="3">Insufficient Hours</option>
                                                        <option value="4">Both Late/Early and Insufficient Hours</option>
                                                        <option value="5">Punch Anomaly</option>
                                                        <option value="6">No Attendance Problem</option> -->
                                                      </select>
                                          </div>
                                          <div class="col-md-2">  
                                                        <label>For Modules/Packages</label>
                                                      <select id="modulepackage" name="modulepackage" class="form-control">
                                                        <option value="0">All Packages</option>
                                                        <option value="1">Choose Package</option>
                                                        <!-- <option value="2">Module</option> -->
                                                        <!-- <option value="4">Punch Anomaly</option>                               -->

                                                        <!-- <option value="3">Insufficient Hours</option>
                                                        <option value="4">Both Late/Early and Insufficient Hours</option>
                                                        <option value="5">Punch Anomaly</option>
                                                        <option value="6">No Attendance Problem</option> -->
                                                      </select>
                                          </div>
                                          <div id="package_div" class='col-md-2' style="display:none;">
                                            
                                              <label>Package</label>
                                              
                                              <?php 
                                                //$package_list = '';
                                                echo form_dropdown('package', $package_list, '', 'id="package" name="package" class="form-control"');
                                                ?>                   
                                          </div>
                                          <div id="module_div" class='col-md-4' style="display:none">
                                            
                                              <label>Module</label>
                                              
                                              <?php 
                                                $data = array(
                                                          'name'        => 'modulename',
                                                          'value'       => "",
                                                          //'class'       => 'input-sm input-s datepicker-input form-control',
                                                          'id'          => 'modulename',
                                                          'size'        => 50,
                                                          'class'       => 'form-control',
                                                          'placeholder' => "Enter Module Name",

                                                  );
                                                //$js = 'onclick="participants.searchByObj(this)"';
                                                echo form_input($data);

                                                $dataid = array(
                                                          'name'        => 'moduleid',
                                                          'value'       => "",
                                                          //'class'       => 'input-sm input-s datepicker-input form-control',
                                                          'id'          => 'moduleid',
                                                          'type'        => 'hidden',

                                                  );                                
                                                echo form_input($dataid);
                                                ?>

                                                                       
                                          </div>                                       
                                        </div>
                                                      
                                        <div class='form-group' class='col-sm-12'>
                                          <br>
                                          <div class="clearfix"></div>                    
                                          <div class="col-md-2">
                                                        <label>For</label>

                                                        <?php if($userLevel==99){ 
                                                                //echo "Administration Mode";
                                                                $options = array(
                                                                  //''  =>  'Select',
                                                                  '3'  => 'Region',
                                                                  '4' => 'Cluster',
                                                                  '5' => 'Pi1M Site',
                                                                  '6' => 'Member',
                                                                  //'7' => 'Staff',
                                                                );
                                                              }

                                                          else if($userLevel == 2 ){ 
                                                              //echo "Manager";
                                                              $options = array(
                                                                //''  =>  'Select',
                                                                //'1'  => 'All Pi1M Managers',
                                                                //'2'  => 'All Nusuara Staff',
                                                                //'3'  => 'Region',
                                                                //'4' => 'Cluster',
                                                                //'5' => 'Pi1M Site',
                                                                '6' => 'Member',
                                                                //'7' => 'Staff',
                                                              ); 
                                                          }                                                          

                                                          else if($userLevel == 3 ){ 
                                                              //echo "Cluster Lead";
                                                              $options = array(
                                                                //''  =>  'Select',
                                                                //'1'  => 'All Pi1M Managers',
                                                                //'2'  => 'All Nusuara Staff',
                                                                //'3'  => 'Region',
                                                                //'4' => 'Cluster',
                                                                '5' => 'Pi1M Site',
                                                                '6' => 'Member',
                                                                //'7' => 'Staff',
                                                              ); 
                                                          }

                                                          else if($userLevel == 4 ){ 
                                                              //echo "Operation Manager";
                                                              $options = array(
                                                                //''  =>  'Select',
                                                                //'1'  => 'All Pi1M Managers',
                                                                //'2'  => 'All Nusuara Staff',
                                                                '3'  => 'Region',
                                                                '4' => 'Cluster',
                                                                '5' => 'Pi1M Site',
                                                                '6' => 'Member',
                                                                //'7' => 'Staff',
                                                              ); 
                                                          }
                                                      ?>

                                                      <?php 

                                                        echo form_dropdown('forpi1m', $options, '', 'id="forpi1m" name="forpi1m" class="form-control"');


                                                        ?> 
                                                         
                                                      </div>

                                                        <div id="region_div" class='col-md-2' style="display:none;">
                                                          
                                                            <label>Region</label>
                                                            
                                                            <?php 
                                                              $options = array(
                                                                  '1' => 'All',
                                                                  '2' => 'Peninsular',
                                                                  '3' => 'Sabah/Sarawak',
                                                                );
                                                              echo form_dropdown('region', $options, '', 'id="region" name="region" class="form-control"');


                                                              ?>                    
                                                        </div> 

                                                        <div id="cluster_div" class='col-md-2' style="display:none">
                                                          <div class='form-group'>
                                                            <label>Cluster</label>
                                                            
                                                            <?php 
                                                              echo form_dropdown('cluster', $cluster_list, '', 'id="cluster" name="cluster" class="form-control"');
                                                              ?>

                                                          </div>                            
                                                        </div> 

                                                        <div id="site_div" class='col-md-4' style="display:none">
                                                            
                                                              <label>Site</label>
                                                              
                                                              <?php 
                                                                $data = array(
                                                                          'name'        => 'sitename',
                                                                          'value'       => "",
                                                                          //'class'       => 'input-sm input-s datepicker-input form-control',
                                                                          'id'          => 'sitename',
                                                                          'size'        => 50,
                                                                          'class'       => 'form-control',
                                                                          'placeholder' => "Enter Site Name",

                                                                  );
                                                                //$js = 'onclick="participants.searchByObj(this)"';
                                                                echo form_input($data);

                                                                $dataid = array(
                                                                          'name'        => 'siteid',
                                                                          'value'       => "",
                                                                          //'class'       => 'input-sm input-s datepicker-input form-control',
                                                                          'id'          => 'siteid',
                                                                          'type'        => 'hidden',

                                                                  );                                
                                                                echo form_input($dataid);
                                                                ?>

                                                                                       
                                                          </div>
                                                          <div id="member_div" class='col-md-4' style="display:none">
                                                              <label>Member</label>
                                                              
                                                              <?php 
                                                                $data = array(
                                                                          'name'        => 'membername',
                                                                          'value'       => "",
                                                                          //'class'       => 'input-sm input-s datepicker-input form-control',
                                                                          'id'          => 'membername',
                                                                          'size'        => 50,
                                                                          'class'       => 'form-control',
                                                                          'placeholder' => "Enter Member Name",

                                                                  );
                                                                //$js = 'onclick="participants.searchByObj(this)"';
                                                                echo form_input($data);

                                                                $dataid = array(
                                                                          'name'        => 'memberid',
                                                                          'value'       => "",
                                                                          //'class'       => 'input-sm input-s datepicker-input form-control',
                                                                          'id'          => 'memberid',
                                                                          'type'        => 'hidden',

                                                                  );                                
                                                                echo form_input($dataid);
                                                                ?>
                                                   
                                                          </div> 
                                                          <div class="col-md-2" id="datefrom_div">
                                                      <label>From</label>
                                                      <?php 
                                                        $data = array(
                                                                  'name'        => 'dateFrom',
                                                                  'value'       => "".date('d-m-Y', strtotime(date('d-m-Y')))."",
                                                                  // 'class'       => 'input-sm input-s datepicker-input form-control',
                                                                  'class'       => 'datepicker-input form-control',
                                                                  'id'          => 'dateFrom',
                                                                  'data-date-format'    => 'dd-mm-yyyy'
                                                          );
                                                        echo form_input($data);
                                                        ?>    
                                                      </div>
                                                      <div class="col-md-2" id="dateto_div">
                                                      <label>Until</label>
                                                      <?php 
                                                        $data = array(
                                                                  'name'        => 'dateTo',
                                                                  'value'       => "".date('d-m-Y', strtotime(date('d-m-Y')))."",
                                                                  'class'       => 'idatepicker-input form-control',
                                                                  'id'          => 'dateTo',
                                                                  'data-date-format'    => 'dd-mm-yyyy'
                                                          );
                                                        echo form_input($data);
                                                        ?>
                                                      </div>                                      
                                                                                                                    
                                                    </div>
                                                    <div class='col-md-4 '>
                                                        <!-- <div class='form-group'> -->

                                                          <input type="button" id="submitbtn" value="Show Report" class="btn btn-primary ">
                                                        <!-- </div> -->
                                                      </div> 
                                                    </div>

                                          <?php //echo form_submit('mysubmit', 'Show Report', 'class="btn btn-primary"'); ?>
                                         
                                      </div>
                                      <div class="clearfix"></div>
                                      <br>
                                    <div id="loading" class="col-sm-12" style="text-align: center">
                                        <img src="<?php echo base_url('assets/images/ajax-loader.gif'); ?>" />
                                    </div>                                      
                                   <div class='form-group' class='col-sm-12' id="report_div_usm" style="display:none">
                                       <table id="tableResultReportUSM" class="table table-striped m-b-none" ></table>
                                    </div>                                   
                                    <div class='form-group' class='col-sm-12' id="report_div_nusuara" style="display:none">
                                       <table id="tableResultReportNusuara" class="table table-striped m-b-none" ></table>
                                    </div>

                                    </div>

                </div>
              </section>
</section>  
