
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
        

        <!-- Our CSS stylesheet file -->
        <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho" /> -->
       

        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
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
            <div class="collapse navbar-collapse test3" id="bs-example-navbar-collapse-5">
                         <?php 
                             /*Time Showing JavaScript Code*/
                             if (!isset($_POST['clock']))
                                $totalTime="10:00";
                             else $totalTime=$_POST['clock'];  
                                /*echo "Time: " .$totalTime;*/
                                echo " <input type='text' name='clock' size='7' value='$totalTime'>";   
                         ?>
            <div class="panel-body">
           
            <br/>
            <?php
              if(!isset($_POST['questionNumber']))
                            $_POST['questionNumber'] = '-1';
                        $questionNumber=$_POST['questionNumber'];

                        if($questionNumber!=-1)
                        {
                             if (!isset($_POST['option']))
                             {
                                //not pressed
                                //echo "<strong>Note:</strong>No option choosed.Please choose option and press next button <br>";
                             }else
                             {
                                $optionChoose=$_POST['option'];     


                                $sql2 = "SELECT correct FROM `answer` limit $questionNumber,1";
                                $result2 = mysqli_query($con,$sql2);
                                //$result2 = mysql_query("SELECT correct_option FROM `question` limit $questionNumber,1");
                                $row = mysqli_fetch_array($result2,MYSQLI_ASSOC); 

                                   $correctOption = $row['correct'];

                                    $marks=0;
                                    if($optionChoose==$correctOption)
                                      $marks=1;
                                    else 
                                      $marks=0;             

                                   $studentId=$_SESSION['student_id'];
                                   $sql1 = "select result from student where student_id='$studentId' ";
                                   $result1 = mysqli_query($con,$sql1);
                                   //$result1=mysql_query("select result from student where student_id='$studentId' ");
                                   while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC))
                                   {                        
                                        $marks=$marks+$row['result'] ;
                                        //echo "MARKS="+$marks; 
                                        $sql4 = "update student set result = $marks  where student_id='$studentId' ";
                                        $result4 = mysqli_query($con,$sql4);
                                        //mysqli_query($con,"update student set result = $marks  where student_id='$studentId' ");                                              
                                    }               
                                //echo "OPTION CHOOSED was $optionChoose";
                             }
                        }



                        

                        ?>

              <form method="POST" name="form-horizontal" class="form-horizontal" id="form-horizontal" action="<?php echo base_url() ?>index.php/quizs/quiz_data">
            <div class="form-group">
            <div class="col-sm-10">
            <CENTER><label><?php echo $q_text?></label></CENTER>
            <input type="hidden" name="q_id" id="q_id" value="<?php echo $q_id?>">
            <input type="hidden" name="next" id="next" value="<?php echo $next?>">
            <input type="hidden" name="questionNumber" value="<?php echo $questionNumber?>" />
            <input type="hidden" name="correct" value="<?php echo $correct?>" />
           
          
            <?php foreach ($answers as $ans): ?>

            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
            <input type="radio" name="a_id" id="a_id" value="<?php echo $ans['a_id']?>">  <label><?php echo $ans['a_text']?></label>

            </div>
            </div>
            <?php endforeach; ?>

           <!-- <?php if($previous) echo anchor("quizs/show/$previous",'&laquo;','class="arrow left" ')?>
            
           <?php if($next) echo anchor("quizs/show/$next",'&raquo;','class="arrow right" onclick="javascript:sbtform();"')?>-->
            
            
           <!--  <a href="javascript:pre_sbtform();"   class="btn btn-danger"  style="cursor:pointer;" >Cancel</a> &nbsp; &nbsp; &nbsp; &nbsp; -->

           &nbsp; &nbsp; &nbsp; 
           &nbsp; &nbsp; &nbsp; <a onclick="javascript:sbtform();"   class="btn btn-info" style="cursor:pointer;">Save & Next</a>
           
</html>
