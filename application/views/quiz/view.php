
                <!-- Main content -->
    <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none"></h3>
              </div>
              
                
              <section class="panel panel-default">
                <header class="panel-heading font-bold">                  
                 <?php echo $nav_subtitle;?>
                </header>
                 <div class="panel-body">

                <form method="post" class="form-horizontal" action="<?php echo base_url() ?>index.php/quiz/Update_quiz">
                     <div class="form-group">
                           
                               <label class="col-sm-2 control-label">Question:</label>
                               <div class="col-sm-10">
                               <?php echo $quiz['q_text']; ?>
                               </div>
                               </div>

                               <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label class="col-sm-2 control-label">a.</label>
                               <div class="col-sm-10">
                               <?php echo $quiz['q_id']; ?>
                               </div>
                               </div> 

                               <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label class="col-sm-2 control-label">b.</label>
                               <div class="col-sm-10">
                               <?php echo $quiz['q_id']; ?>
                               </div>
                               </div> 

                               <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label class="col-sm-2 control-label">c.</label>
                               <div class="col-sm-10">
                               <?php echo $quiz['q_id']; ?>
                               </div>
                               </div> 

                             

                               <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label class="col-sm-2 control-label">d.</label>
                               <div class="col-sm-10">
                               <?php echo $quiz['q_id']; ?>
                        
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                   
                     <button type="submit" class="btn btn-sm btn-default">Submit</button>
                 </form>

                </section><!-- /.content -->

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        
</html>