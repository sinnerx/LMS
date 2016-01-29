<?php

Class Result extends CI_Model
{
 

  public function __construct()
  {
        parent::__construct();

    $this->load->database();
  }

  public function results()
  {
$count = $this->db->where("marks","1")->count_all_results("lms_question_user");

  $m= ($count/20)*100;

  if ($m  >= 50 || $m == 50){
    $status='Pass';
  }

  else
  {
    $status='Fail';
  }

  $data = array(
          'result' => $m,
          );

      $data = array(
      'result' => $m,
      'status'=>$status,
      'userid'=> $this->input->post('userid'),
      'packageid'=> $this->input->post('id'),
      
       );
    $this->db->insert('lms_result',$data);  
  print_r($m);
 


  
  }


 

  } ?>