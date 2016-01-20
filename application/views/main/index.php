<?php
if($_SESSION['userLevel'] != 2){
       
      header("location: ./package");
     
  }

  elseif ($_SESSION['userLevel'] != 99){
  	header("location: ./packages/landing");
  }

  else {

  	header("location: ../dashboard/login");
  }
  ?>


