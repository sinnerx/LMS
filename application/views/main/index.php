<?php
if($_SESSION['userLevel'] == 2 ){
      //echo "userlvl 2";
      header("location: ./package");
     
  }

  else if ($_SESSION['userLevel'] == 99){
    header("location: ./package");
  }
  elseif ($_SESSION['userLevel'] != 99){
  	header("location: ./quizs/login");
  }

  else {

  	header("location: ../dashboard/login");
  }
  ?>


