
   
            <section class="panel panel-default">
            <header class="panel-heading font-bold">                  
            Quiz For Module :  <?php echo $modulename; ?>          
            </header>

            <div class="panel-body">

            <form action ="<?php echo base_url() ?>quizs/" method = "post" class="form-horizontal" data-validate="parsley">
         

            <div class="form-group">
        
            </div>
            <div class="form-group">
                <div class="col-lg-6">
                <b>Description / Instructions</b><br/>
                1) Please Read all the question carefully.<br/>
                2) Multiple choice-Choose only <b>ONE</b> answer<br/>
                3) Quiz contain all 10 of questions. Please answer all the question<br/>
            </div>
            </div>
            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
            <div class="col-lg-2">
            <b>Session ID:</b><br/></div>
            <div class="col-md-2">
            <input type="text" name="sessionid" class="form-control" value="<?php $today = date("ymdhis");echo $unique = $today ; ?>"readonly >
            </div>
            </div>


            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
            <div class="col-lg-2">
            <b>Module ID:</b><br/></div>
            <div class="col-md-2">
             <input type="text" name="id" class="form-control" value="1" readonly>
            </div>
            </div>

            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
            <div class="col-lg-2">
            <b>Package ID:</b><br/></div>
            <div class="col-md-2">
              <input type="text" name="packageid" class="form-control" value="1" readonly>
            </div>
            </div>

           

            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
            <div class="col-lg-2">
            <b>Percentage Required to Pass :</b><br/></div>
            <div class="col-md-2">
            <input type="text" name="percent" class="form-control" value="50%" readonly>
            </div>
            </div>

            <!-- <div class="form-group">
            <label class="col-sm-2 control-label">Session ID:</label>
            <div class="col-md-2">
            <input type="text" name="sessionid" class="form-control" value="<?php $today = date("ymdhis");echo $unique = $today ; ?>"readonly >
            </div>
            </div> -->
           
            
            <!-- <div class="line line-dashed b-b line-lg pull-in"></div> -->
            <!-- <div class="form-group">
            <label class="col-sm-2 control-label">Module ID :</label>
            <div class="col-md-2">
            <input type="text" name="id" class="form-control" value="<?php echo $boss['moduleid'] ?>" readonly>
            </div>
            </div>
            
            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Package ID :</label>
            <div class="col-md-2">
            <input type="text" name="packageid" class="form-control" value="1" readonly>
            </div>
            </div> -->
            
            <div class="doc-buttons">
            <center><button type="submit" <?php if ($noq==1) { echo 'disabled'; } ?> class="btn btn-s-md btn-success">Start Test</button></center></div>
            </form>
           


           
       
        </div><!-- /.box-body -->
        </div><!-- /.box -->
        </section><!-- /.content -->
