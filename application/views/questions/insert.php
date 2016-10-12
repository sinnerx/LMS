
        <!-- Main content -->
       <!-- <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none"></h3>
              </div> -->
              
              <style type="text/css">
              .imgCover {
  object-fit: cover;
  width: 300px;
  height: 200px;
}

.thumbCover {
  object-fit: cover;
  width: 250px;
  height: 150px;
}

              </style>
                
              <section class="panel panel-default">
                <header class="panel-heading font-bold">  <?php echo $nav_subtitle; ?>   
                </header>
                  
                     <div class="panel-body">
                    
                    <?php echo form_open_multipart('question/questions_data','class="form-horizontal"');?>

                    <div class="form-group">
           
                            <label class="col-sm-2 control-label">Module name</label>
                            <div class="col-md-4">
                            <select name="id" data-required="true" class="form-control m-b"><option value="">Select one </option>
                            <?php


                              foreach($groups as $row)
                            { 
                              echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                            }
                            ?>
                            </select>
                           


                            </div>
                            </div>
                        
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Type</label>
                            <div class="col-md-4">
                            <select name="type" class="form-control m-b">
                            <option value="">Select one </option>
                            <option value="Easy">Easy</option>
                            <option value="Intermidiate">Intermidiate</option>
                            <option value="Hard">Hard</option>
                            </select>
                            </div>
                            </div>

                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Image</label>
                            <div class="col-md-5">
                            <img id="preview_q_img1" class="imgCover" src="<?php echo base_url(); ?>assets/images/noimage.png" />
                            <input type='file' id="input_q_img1" name="input_q_img1" accept="image/*"/>

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
                            <div class="line"></div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Answer</label>
                            <div class="col-md-5">

                            <input name="a_text1" type="text" id="name" class="form-control">
                            <br>
                            <img id="preview_a_img1" class="thumbCover" src="<?php echo base_url(); ?>assets/images/noimage.png" />
                            <input type="file" id="input_a_img1" name="input_a_img1" accept="image/*"/>

                            </div><!-- <input type="radio" value="1" name="correct"> --> 
                            <img src="<?php echo base_url(); ?>assets/add/add.png" width="32" height="32" border="0" align="top" class="add" id="add" />
                            
                            </div>

                            </div></div>


                            <div class="doc-buttons">
                           <button type="submit" class="btn btn-sm btn-default" >Submit</button>
                           <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
                           <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-default">Cancel</a></div>
                     </form>
                </div><!-- /.box-body -->
                <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Which one is correct answer? </h4>
      </div>
      <div class="modal-body">
        <form>
          
      </form>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
            </div><!-- /.box -->
        </section><!-- /.content -->

<script type="text/javascript">
  function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#preview_'+id).attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(document).on('change', 'input:file', function(){
     str = $(this).attr('id');
      str = str.substring(str.indexOf("_") + 1);
      //alert(str);

      readURL(this,str);
  });



</script>