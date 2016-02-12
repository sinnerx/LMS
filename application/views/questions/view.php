
                <!-- Main content -->
    <!-- <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none"></h3>
              </div> -->
              
                
              <section class="panel panel-default">
                <header class="panel-heading font-bold">                  
                 <?php echo $nav_subtitle;?>
                </header>
                 <div class="panel-body">

                <form method="post" class="form-horizontal" action="<?php echo base_url() ?>index.php/question/Update_question">
                     <div class="form-group">
                           
                             <!--    <input type="hidden" name="q_id" id="q_id" value="<?php echo $question['q_id']; ?>" />
                            <!--    <input type="hidden" name="no_pictures" id="no_pictures" value="<?php echo $dd_report['no_pictures']; ?>" />-->
                              <!--     <input type="submit" class="btn btn-info btn-sm fa fa-floppy-o" value="Submit" />
                         
                            </i>
                        </div><!-- /.box-header -->

                        
                               <label class="col-sm-2 control-label">Course</label>
                               <div class="col-sm-10">
                               <input type="text" name="q_id" class="form-control" value="<?php echo $question['q_id']; ?>">
                               </div>
                               </div>

                               <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label class="col-sm-2 control-label">Package name</label>
                               <div class="col-sm-10">
                               <input type="text" name="q_text" class="form-control" value="<?php echo $question['q_text']; ?>">
                               </div>
                               </div> 

                               <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label class="col-sm-2 control-label">Course ID</label>
                               <div class="col-sm-10">
                               <input type="text" name="id" class="form-control" value="<?php echo $question['id']; ?>">
                               </div>
                               </div>

                               <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label class="col-sm-2 control-label">Type</label>
                               <div class="col-sm-10">
                               <input type="text" name="type" class="form-control" value="<?php echo $question['type']; ?>">
                        
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Answers</label>
                      <div class="col-sm-10">
                        <div class="checkbox i-checks">
                          <label>
                            <input type="checkbox" value="">
                            <i></i>
                            <?php echo $question['type']; ?>
                          </label>
                        </div>
                        <div class="checkbox i-checks">
                          <label>
                            <input type="checkbox" checked value="">
                            <i></i>
                            <?php echo $question['type']; ?>
                          </label>
                        </div>
                     <button type="submit" class="btn btn-sm btn-default">Submit</button>
                 </form>

                </section><!-- /.content -->

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        
</html>