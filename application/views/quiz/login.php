
    <!-- <section id="content">
    <section class="vbox">
    <section class="scrollable padder">
    <div class="m-b-md">
    <h3 class="m-b-none"></h3>
    </div> -->
            <section class="panel panel-default">
            <header class="panel-heading font-bold">                  
             Manager Authenthication       
            </header>

            <div class="panel-body">
                   
            <form action ="<?php echo base_url() ?>Loginexam" method ="post" class="form-horizontal" data-validate="parsley">
            <div class="form-group">

            <div class="form-group">
            
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Username :</label>
            <div class="col-lg-3">
            <input type="text" name="userEmail" id="userEmail" placeholder="User Email" class="form-control">
            </div>
            </div>
           
            
            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Password :</label>
            <div class="col-lg-3">
            <input type="password" name="userPassword" id="userPassword" placeholder="Password"class="form-control">
            </div>
            </div>

            
            
            <div class="col-xs-8">
            <div class="doc-buttons">
            <center><input type="Reset" class="btn btn-s-md btn-info" value="Reset">&emsp;<input type="submit" class="btn btn-s-md btn-success" value="Login"></center></div></div>
            </form>
           


           
       
        </div><!-- /.box-body -->
        </div><!-- /.box -->
        </section><!-- /.content -->
