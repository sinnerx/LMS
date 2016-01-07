<?php

Class quizdata extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  // DD Report

  public function quiz()
  {
    $this->db->select('lms_questions_bank.q_text,lms_answer.a_text,lms_answer.q_id,lms_questions_bank.q_id');
    $this->db->from('lms_questions_bank');
    $this->db->join('lms_answer','lms_questions_bank.q_id = lms_answer.q_id'); 
    $query = $this->db->get();
    return $query->result_array();

  
  }


  public function q_id($q_id)
  { 
    
    $this->db->select('lms_questions_bank.q_text,lms_answer.a_text,lms_answer.q_id,lms_questions_bank.q_id');
    $this->db->from('lms_questions_bank');
    $this->db->join('lms_answer','lms_questions_bank.q_id = lms_answer.q_id'); 
    $this->db->order_by('lms_questions_bank.q_id', '$q_id','RANDOM');
    
    $query = $this->db->get();
    return $query->row_array();
  }

  } ?>