
   
            <section class="panel panel-default">
            <header class="panel-heading font-bold">                  
            <red>Instruction: </red>Please Read all the instruction carefully. Good Luck              
            </header>

            <div class="panel-body">

            <form action ="<?php echo base_url() ?>quizs/" method = "post" class="form-horizontal" data-validate="parsley">
            <div class="form-group">

            <div class="form-group">
            <label class="col-md-6 control-label">Pi1M Online Examination</label>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Session ID:</label>
            <div class="col-md-5">
            <input type="text" name="sessionid" class="form-control" value="<?php $today = date("ymdhis");echo $unique = $today ; ?>"readonly >
            </div>
            </div>
           
            
            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Module ID :</label>
            <div class="col-md-5">
            <input type="text" name="id" class="form-control" value="<?php echo $boss['moduleid'] ?>" readonly>
            </div>
            </div>
            
            
            <div class="doc-buttons">
            <center><button type="submit" <?php if ($noq==1) { echo 'disabled'; } ?> class="btn btn-s-md btn-info">Start Exam</button></center></div>
            </form>
           


           
       
        </div><!-- /.box-body -->
        </div><!-- /.box -->
        </section><!-- /.content -->
