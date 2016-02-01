<?php

Class Quizcount extends CI_Model
{
 

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // DD Report

  public function count() //index view
  {
    $data=array(
    $sessionid = $this->input->post('sessionid'),
     $id = $this->input->post('id'),
     );
    
    $this->db->select('*');
    $this->db->from('lms_question_user');
    $this->db->where("marks","1");
    $this->db->where("id",$id);
    $this->db->where("sessionid",$sessionid);
    $query = $this->db->get();
    return $query->result();

    print_r($query);
  }

  


  

  

  }
  ?>