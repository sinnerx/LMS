<!DOCTYPE html>
<html lang="en">

                <!-- Main content -->
    <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="m-b-md">
                <h3 class="m-b-none"></h3>
              </div>
              
                
              <section class="panel panel-default">
                <header class="panel-heading font-bold">                  
                <red>Instruction: </red>Please answer all the questions. Good Luck
                </header>
                 <div class="panel-body">
                  <br/>

                <form method="post" class="form-horizontal" action="<?php echo base_url() ?>index.php/quiz/Update_quiz">
                     <div class="form-group">
                        
                              
                               <div class="col-sm-10">
                              <CENTER><label><?php echo $quiz['q_text']; ?></label></CENTER>
                              
                            
                               </div>
                               </div>

                              <?php $query = $this->db->query("select q.q_id, q.q_text,a.a_text,a.a_id from lms_questions_bank q, lms_answer a where q.q_id=a.q_id and q.q_id=$q_id");

                              if ($query->num_rows() > 0)
                              {
                              foreach ($query->result() as $row)
                              {
                              ?>

                               <div class="line line-dashed b-b line-lg pull-in"></div>
                               <div class="form-group">
                               <label class="col-sm-2 control-label"></label>
                               <div class="col-sm-10">
                               <input type="radio" name="myradio" value="<?php  echo $row->a_text; ?>"> <label><?php  echo $row->a_text; ?> <label>
                               </div>
                               </div> 

                             <?php   }} ?>
                        
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
    
                 
                    

     
        <div class="col-sm-5">

     
      

      <button type="submit" class="btn btn-sm btn-default">Back</button>
      <buttononclick="location.href='<?php echo base_url();?>quiz/edit/'" class="btn btn-sm btn-default">Next>></button>
 

         </form>

                </section><!-- /.content -->

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        
</html>

