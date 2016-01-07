<?php

session_start();

ob_start();
  
if(isset($_SESSION['name']))

 echo  "Welcome... exam of " . $_SESSION['name'];

else

 header("location:studentlogin.php"); 

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Exam</title>
<script language="javascript">

function changeQuestion(ques){	
	document.form1.questionNumber.value=ques-2;
    var formToSend = document.getElementById("form1");   
    formToSend.submit();
}


<!-- Begin
// Take user here after session timed out


timedouturl = "result.php";

function Minutes(data) {
for (var i = 0; i < data.length; i++)
if (data.substring(i, i + 1) == ":")
break;
return (data.substring(0, i));
}
function Seconds(data) {
for (var i = 0; i < data.length; i++)
if (data.substring(i, i + 1) == ":")
break;
return (data.substring(i + 1, data.length));
}
function Display(min, sec) {
var disp;
if (min <= 9) disp = " 0";
else disp = " ";
disp += min + ":";
if (sec <= 9) disp += "0" + sec;
else disp += sec;
return (disp);
}
function Down() {
sec--;
if (sec == -1) { sec = 59; min--; }
document.form1.clock.value = Display(min, sec);
window.status = "Session will time out in: " + Display(min, sec);
if (min == 0 && sec == 0) {
alert("Your session has timed out.");
window.location.href = timedouturl;
}
else down = setTimeout("Down()", 100);
}
function timeIt() {
min = 1 * Minutes(document.form1.clock.value);
sec = 0 + Seconds(document.form1.clock.value);
Down();
}
//  End -->
</script>
<style type="text/css">

body {
	font: 100% Verdana, Arial, Helvetica, sans-serif;
	background: #666666;
	margin: 0; /* it's good practice to zero the margin and padding of the body element to account for differing browser defaults */
	padding: 0;
	text-align: center; /* this centers the container in IE 5* browsers. The text is then set to the left aligned default in the #container selector */
	color: #000000;
}
.twoColFixLtHdr #container {
	width: 780px;  /* using 20px less than a full 800px width allows for browser chrome and avoids a horizontal scroll bar */
	background: #FFFFFF;
	margin: 0 auto; /* the auto margins (in conjunction with a width) center the page */
	border: 1px solid #000000;
	text-align: left; /* this overrides the text-align: center on the body element. */
}
.twoColFixLtHdr #header {
	background: #DDDDDD;
	padding: 0 10px 0 20px;  /* this padding matches the left alignment of the elements in the divs that appear beneath it. If an image is used in the #header instead of text, you may want to remove the padding. */
}
.twoColFixLtHdr #header h1 {
	margin: 0; /* zeroing the margin of the last element in the #header div will avoid margin collapse - an unexplainable space between divs. If the div has a border around it, this is not necessary as that also avoids the margin collapse */
	padding: 10px 0; /* using padding instead of margin will allow you to keep the element away from the edges of the div */
}
.twoColFixLtHdr #sidebar1 {
	float: left; /* since this element is floated, a width must be given */
	width: 200px; /* the actual width of this div, in standards-compliant browsers, or standards mode in Internet Explorer will include the padding and border in addition to the width */
	background: #EBEBEB; /* the background color will be displayed for the length of the content in the column, but no further */
	padding: 15px 10px 15px 20px;
	margin: 10px;
}
.twoColFixLtHdr #mainContent {
	margin: 0 0 0 0px; /* the left margin on this div element creates the column down the left side of the page - no matter how much content the sidebar1 div contains, the column space will remain. You can remove this margin if you want the #mainContent div's text to fill the #sidebar1 space when the content in #sidebar1 ends. */
	padding: 0 20px; /* remember that padding is the space inside the div box and margin is the space outside the div box */
	height: 600px;
}
.twoColFixLtHdr #footer {
	padding: 0 10px 0 20px; /* this padding matches the left alignment of the elements in the divs that appear above it. */
	background:#DDDDDD;
}
.twoColFixLtHdr #footer p {
	margin: 0; /* zeroing the margins of the first element in the footer will avoid the possibility of margin collapse - a space between divs */
	padding: 10px 0; /* padding on this element will create space, just as the the margin would have, without the margin collapse issue */
}
.fltrt { /* this class can be used to float an element right in your page. The floated element must precede the element it should be next to on the page. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* this class can be used to float an element left in your page */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* this class should be placed on a div or break element and should be the final element before the close of a container that should fully contain a float */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
A:link {
	text-decoration: none;
}
A:active {
	text-decoration: none;
}
A:visited {
	text-decoration: none;
}
A:hover {
	color: #C0FFC0;
	background-color: lightslategray;
	text-decoration: none;
}
#first {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 16px;
	color: #0C3;
	background: #CCC;
	height: 50px;
}
#submit {
	margin-left: 650px;
	margin-top: -10px;
}
#second {
}
#third {
}
#fourth {
}
#fifth {
}

</style>
<!--[if IE 5]>
<style type="text/css"> 
/* place css box model fixes for IE 5* in this conditional comment */
.twoColFixLtHdr #sidebar1 { width: 230px; }
</style>
<![endif]-->
<!--[if IE]>
<style type="text/css"> 
/* place css fixes for all versions of IE in this conditional comment */
.twoColFixLtHdr #sidebar1 { padding-top: 30px; }
.twoColFixLtHdr #mainContent { zoom: 1; }
/* the above proprietary zoom property gives IE the hasLayout it needs to avoid several bugs */
</style>
<![endif]-->
</head>
<body class="twoColFixLtHdr" OnLoad="timeIt()">
<div id="container">
<div id="header">
  <h1>KIIT ONLINE EXAMINATION CENTER </h1>
  <!-- end #header -->
</div>
<div id="mainContent">
  <form id="form1" name="form1" method="post" action="exam1.php">
    <div id="first">
      <center>
        <p>
          <?php 
	 
	 if (!isset($_POST['clock']))
	 	$totalTime="10:00";
	else $totalTime=$_POST['clock'];
     echo " <input type='text' name='clock' size='7' value='$totalTime'>";	
	?>
        
      </center>
      </div>
        <!--end first div -->
        <?php
		 /*$count = 1;
		 $totalQuestions=10;
		 while($count<=$totalQuestions){
			echo "<input type='button' value='$count' onClick='changeQuestion(".$count.")'  />";
			$count+=1;
		 }*/
		?>
        
      
   
  	
    <div id="submit">
      <input type="submit" name="submitPaper" value="Submit" />
    </div>
    <div id="third">
      <table width="740" height="383" border="1" cellpadding="2">
        <tr>
          <!--<td height="140"><h4>Question: <?php //echo ($_POST['questionNumber']+1);?> </h4>-->
          <?php
            
           include("config.php");
              
        if (!isset($_POST['questionNumber']))
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
				
                include("config.php");
                
                $sql2 = "SELECT correct_option FROM `question` limit $questionNumber,1";
                $result2 = mysqli_query($con,$sql2);
				//$result2 = mysql_query("SELECT correct_option FROM `question` limit $questionNumber,1");
				$row = mysqli_fetch_array($result2,MYSQLI_ASSOC); 
					 
				   $correctOption = $row['correct_option'];
				   				  
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
		
		if($questionNumber>=2)
			header("location:result.php");
			
			
		$displayNumber=	$questionNumber+1;
		echo "<td height='140'> <h4> Question:   {$displayNumber} </h4> ";
			
        $sql = "SELECT * FROM `questions_bank` limit $questionNumber,1 ";        
        $result = mysqli_query($con,$sql);
		 
		 //Retrieving data from dtabases
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        { 
		
          echo $row['q_text']; 
       
       ?>
          
        </tr>
        <tr>
          <td height="233"><label>
              <input type="radio" name="option"  value="1" />
              <option><?php echo $row['answer1']; ?></option>
              <br />
              <br />
            </label>
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
            </label></td>
          <?php  } ?>
        </tr>
      </table>
    </div>
    <div id="fourth">
      <?php
		// I do not want the question number 
		echo "<input type='hidden' name='questionNumber' value='$questionNumber' />";
            mysqli_close($con);
	  ?>
      <label>
        <input type="submit" name="next" id="next" value="NextQuestion" />
        <!-- <input type="reset" name="cans" id="ans" value="Clear Answer" />-->
      </label>
      
    </div>
    <br class="clearfloat" />
  <!-- end #container -->
</form>
</div>
</div>
</body>
</html>