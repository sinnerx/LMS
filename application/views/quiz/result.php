<?php
unset($_SESSION["question_key"]);
                  unset($_SESSION["q_shuffle"]);

                  unset($_SESSION["sessionid"]);
                  ?>
            <section class="panel panel-default">
            <header class="panel-heading font-bold">                  
                  Pi1M Online Examination Result      
            </header>
           
            <div class="panel-body">

            <form action ="<?php echo base_url() ?>quizs/index" method = "post" class="form-horizontal" data-validate="parsley">
            <div class="form-group">

            <div class="form-group">
           
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Session ID:</label>
            <div class="col-md-5">
            <input type="text" name="sessionid" class="form-control" value="<?php echo $sessionid?>"readonly >
            </div>
            </div>
           
            
            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Package:</label>
            <div class="col-md-5">
            <input type="text" name="id" class="form-control" value="<?php echo $id ?>" readonly>
            </div>
            </div>
            



            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Your Score:</label>
            <div class="col-md-5">
            <input type="text" name="ids" class="form-control" value="<?php echo $m ; ?>%"disabled>
            </div>
            </div>

            <div class="doc-buttons">
            <center><input type="submit" class="btn btn-s-md btn-info" value="Back"></center></div>
       
</html>
</div>

