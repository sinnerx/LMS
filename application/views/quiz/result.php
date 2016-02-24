
            <section class="panel panel-default">
            <header class="panel-heading font-bold">                  
                  Pi1M Online Examination Result      
            </header>
           
            <div class="panel-body">

            <form action ="<?php echo base_url() ?>" method = "post" class="form-horizontal" data-validate="parsley">
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
            <label class="col-sm-2 control-label">Module:</label>
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

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/timer/compiled/jquery.cookie.js"></script>  
 <script>

//  $(function(){
//       resettimer() {
//           $.removeCookie('endDate');
//        }
//        resettimer();
// });
 $( document ).ready(function() {
    $.removeCookie('endDate');
});
  </script>     
</html>
</div>

<?php
unset($_SESSION['packageid']);
unset($_SESSION['id']);
unset($_SESSION['sessionid']); 
unset($_SESSION['pop']); 

// unset($_SESSION['userid']);
// unset($_SESSION['userlevel']);

?>