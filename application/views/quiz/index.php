
<!DOCTYPE html>
<html>
    <head>
<script type="text/javascript">
function pre_sbtform(){
if((document.getElementById('warning_div').style.display)=="block"){
document.getElementById('warning_div').style.display="none";
}else{
document.getElementById('warning_div').style.display="block";
}

}

function sbtform(){


document.getElementById('form-horizontal').submit();

}


</script>
<body OnLoad="timeIt()">




        <meta charset="utf-8" />
        
    
    </head>

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
              
            <form method="POST" name="form-horizontal" class="form-horizontal" id="form-horizontal" action="<?php echo base_url() ?>quizs/quiz_data"  onsubmit="return confirm('Are you sure want to finish?');">
            <div class="form-group">
            <div class="col-sm-10">
            <CENTER><label><?php echo $q_text?></label></CENTER>
            <input type="hidden" name="q_id" id="q_id" value="<?php echo $q_id?>">
            <input type="hidden" name="id" id="id" value="<?php echo $id?>">
            <input type="hidden" name="next" id="next" value="<?php echo $next?>">
            <input type="hidden" name="questionNumber" value="<?php echo $questionNumber?>" />
            <input type="hidden" name="correct" value="<?php echo $correct?>" />
            <input type="hidden" name="userid" value="<?php echo $userid?>" />
            <input type="hidden" name="sessionid" value="<?php echo $sessionid?>" />
            
           
          
            <?php foreach ($answers as $ans): ?>

            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
            <input type="radio" name="a_id" id="a_id" value="<?php echo $ans['a_id']?>">  <label><?php echo $ans['a_text']?></label>

            </div>
            
            <?php endforeach; ?>

           <!-- <?php if($previous) echo anchor("quizs/show/$previous",'&laquo;','class="arrow left" ')?>
            
           <?php if($next) echo anchor("quizs/show/$next",'&raquo;','class="arrow right" onclick="javascript:sbtform();"')?>-->
            
            
           <!--  <a href="javascript:pre_sbtform();"   class="btn btn-danger"  style="cursor:pointer;" >Cancel</a> &nbsp; &nbsp; &nbsp; &nbsp; -->

           &nbsp; &nbsp; &nbsp; 
           &nbsp; &nbsp; &nbsp;<center> <!-- <a onclick="javascript:sbtform();"  name="submit" class="btn btn-info" style="cursor:pointer;">Save & Next</a> -->
            <input type="submit" class="btn btn-s-md btn-primary" name="submit" value="Save & Next" />
            <input type="submit" class="btn btn-s-md btn-success" name="submiting" value="Finish" />
           <!-- <button class="btn btn-success" type="submiting"><a href="<?php echo base_url(); ?>quizs/result/">Finish</a></button> -->
           </center>
</form>     
</html>
</div>
