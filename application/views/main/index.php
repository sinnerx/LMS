<?php
if($_SESSION['userLevel'] == 2){
       
      header("location: ./reporting");
     
  }

  elseif ($_SESSION['userLevel'] == 99){
  	header("location: ./package");
  	
  }

elseif ($_SESSION['userLevel'] == 3){
    header("location: ./reporting");
    
  }

elseif ($_SESSION['userLevel'] == 4){
    header("location: ./reporting");
    
  }


  else {

  	header("location: ./quizs/login");
  }
  ?>


