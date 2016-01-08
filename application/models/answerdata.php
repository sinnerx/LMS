<?php

Class Answerdata extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }



  public function answer()
  {
    $query = $this->db->get('answer');
      return $query->result_array();

  
  }


  public function a_id($a_id)
  { 
   
     $query = $this->db->get_where('answer',array('a_id' => $a_id));
      return $query->row_array();
  }

  } ?>