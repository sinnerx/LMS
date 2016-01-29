<?php
if($_SESSION['userLevel'] != 2){
       
      header("location: ./package");
     
  }

  elseif ($_SESSION['userLevel'] != 99){
  	header("location: ./quizs/enter");
  }

  else {

  	header("location: ../dashboard/login");
  }
  ?>


