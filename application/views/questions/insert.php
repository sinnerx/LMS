
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
                    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>index.php/question/questions_data">
                    <div class="form-group">
           
                            <label class="col-sm-2 control-label">Course</label>
                            <div class="col-md-4">
                            <?php
                            $query = "SELECT * FROM lms_course"; $result = mysql_query($query) or die(mysql_error());  ?> 
                            <select name="id" class="form-control m-b"><option>Select one </option><?php while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) { ?> 
                            <option value=" <?php echo $line['id'];?> "> <?php echo $line['Topics'];?></option> <?php } ?>
                            </select>
                            </div>
                            </div>
                        
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Type</label>
                            <div class="col-md-4">
                            <select name="type" class="form-control m-b">
                            <option>Select one </option>
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

                            <input name="a_text1" type="text" id="name" class="form-control"></div><!-- <input type="radio" value="1" name="correct"> --> 
                            <img src="<?php echo base_url(); ?>assets/add/add.png" width="32" height="32" border="0" align="top" class="add" id="add" />
                            </div></div></div>


                            <div class="doc-buttons">
                           <button type="submit" class="btn btn-sm btn-default">Submit</button>
                           <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-default">Cancel</a></div>
                     </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section><!-- /.content -->

   