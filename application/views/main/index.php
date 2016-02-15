<?php
if($_SESSION['userLevel'] == 2){
       
      header("location: ./package");
     
  }

  elseif ($_SESSION['userLevel'] == 99){
  	header("location: ./package");
  	
  }

  else {

  	header("location: ./quizs/login");
  }
  ?>


