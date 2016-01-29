<?php
 
//$_SESSION["sessionid"] ='green';

?>
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
        <title><?php echo $question?> - Question of the day | Tutorialzine Demo</title>
    
    </head>
    <section id="content">
    <section class="vbox">
    <section class="scrollable padder">
    <div class="m-b-md">
    <h3 class="m-b-none"></h3>
    </div>
            <section class="panel panel-default">
            <header class="panel-heading font-bold">                  
            <red>Instruction: </red>Please Read all the instruction carefully. Good Luck              
            </header>
            print_r($_SESSION);
            Subject :
            Time : 
            <form action ="<?php echo base_url() ?>quizs/index" method = "post">
            <input value="<?php $today = date("ymdhis");echo $unique = $today ; ?>" name="sessionid"/>
            <button type="submit" class="btn btn-sm btn-default">Start</button>
            </form>
           


</form>           
</html>
</div>
