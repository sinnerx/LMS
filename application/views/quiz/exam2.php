<?php include("session1.php");  ?>
<?php include("header.php");  ?>

<!--Body Start-->
<body OnLoad="timeIt()">
    
    <?php include("navigation2.php");  ?>
    <?php include("config.php");  ?>
    

<div class="container test1">
	<div class="row clearfix">
		<div class="col-md-12 column">
            
            <!--Form Start-->
            <form name="form1" id="form1" method="post" action="exam2.php" role="form">
                
            <!--Navigation start-->
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
                         <span class="sr-only">Toggle navigation</span>
                         <span class="icon-bar"></span><span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         </button> <a class="navbar-brand" href="#"></a>
				</div>				
				<!-- <div class="collapse navbar-collapse test3" id="bs-example-navbar-collapse-5">
                         <?php 
                             /*Time Showing JavaScript Code*/
                             if (!isset($_POST['clock']))
                                $totalTime="10:00";
                             else $totalTime=$_POST['clock'];  
                                /*echo "Time: " .$totalTime;*/
                                echo " <input type='text' name='clock' size='7' value='$totalTime'>";   
                         ?>-->
                        <button type="submit" name="submitPaper" id="submitPaper" class="btn btn-default  pull-right">Submit</button>
				</div>				 
			</nav>
            <!--Navigation End-->
            
            
            <br/>
            <br/>
            
            
            <!--Table Start-->
			<table class="table table-bordered table-condensed ">
				<!--tbody start-->
                <thead>
					<tr>
       
                        
                        <?php 
                        /*PHP code to handle the question*/
                        include("config.php");

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



                        if(isset($_POST['submitPaper']))
                            header("location:result.php");

                        $questionNumber=$questionNumber+1;

                        if($questionNumber>=10)
                            header("location:result.php");


                        $displayNumber=	$questionNumber+1;
                        echo "<th>";
                        echo "<h4> Question :   {$displayNumber} </h4> ";


                        $sql = "SELECT * FROM `lms_questions_bank` limit $questionNumber,1 ";        
                        $result = mysqli_query($con,$sql);

                        //Retrieving data from dtabases
                        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                        { 

                          echo $row['q_text']; 
                          echo "</th>";
                          echo "<br/>"
                       ?>

                        
                       
				    </tr>
				</thead>          
                <!--thead end-->
                
                <!--tbody start-->
				<tbody>
					<tr>
                        
                        
				     <td height="233">
                        <label>
                          <input type="radio" name="option"  value="1" />
                          <option><?php echo $row['answer1']; ?></option>
                        </label>
                        <br />
                        <br />
                        <label>
                          <input type="radio" name="option" value="2" />
                          <option><?php echo $row['answer2']; ?></option>
                        </label>
                        <br />
                        <br />
                        <label>
                          <input type="radio" name="option" value="3" />
                          <option><?php echo $row['answer3']; ?></option>
                        </label>
                        <br />
                        <br />
                        <label>
                          <input type="radio" name="option"  value="4" />
                          <option><?php echo $row['answer4']; ?></option>
                        </label>
                     </td>
                   
                        
                     <?php  } ?>    
                            
                    </tr>
				</tbody>
                <!--tbody end-->
			</table>
            <!--Table End-->
            
            <?php
                /*I do not want the question number*/ 
                echo "<input type='hidden' name='questionNumber' value='$questionNumber' />";
                mysqli_close($con);
	         ?>
                
            <!--Button For NextQuestion-->
			<!--<div class="btn-group btn-group-md">
				 <button class="btn btn-default btn-info" type="button"><em class=""></em> Next Question </button>
			</div>-->
            <label>
                <input class="btn btn-default btn-info" type="submit" name="next" id="next" value="NextQuestion" />        
            </label>

                
            </form>
            <!--Form End-->
		</div>
	</div>
</div>

    
    
    </body>
<!--Body End-->
</html>
