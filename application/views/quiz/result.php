
    <section id="content">
    <section class="vbox">
    <section class="scrollable padder">
    <div class="m-b-md">
    <h3 class="m-b-none"></h3>
    </div>
            <section class="panel panel-default">
            <header class="panel-heading font-bold">                  
                     
            </header>
           
            <div class="panel-body">

            <form action ="<?php echo base_url() ?>quizs/index" method = "post" class="form-horizontal" data-validate="parsley">
            <div class="form-group">

            <div class="form-group">
            <label class="col-md-6 control-label"><h3>Pi1M Online Examination Result</h3></label>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Session ID:</label>
            <div class="col-md-5">
            <input type="text" name="sessionid" class="form-control" value=""readonly >
            </div>
            </div>
           
            
            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Package:</label>
            <div class="col-md-5">
            <input type="text" name="id" class="form-control" value="1" readonly>
            </div>
            </div>
            



            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Your Score:</label>
            <div class="col-md-5">
            <input type="text" name="ids" class="form-control" value="<?php echo $m ; ?>%"disabled>
            </div>
            </div>

            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Status :</label>
            <div class="col-md-5">
            <input type="text" name="ids" class="form-control" value="<?php echo $status ; ?>"disabled>
            </div>
            </div>
       
</html>
</div>
