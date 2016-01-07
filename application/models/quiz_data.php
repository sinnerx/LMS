<?php 

Class quiz_data extends CI_Model
{
public function __construct()
{
    parent::__construct();
    $this->load->database();

   
}
 public function quiz()
 {
  $data=array(
    'q_id'=>$this->input->post('q_id'),
    'a_id'=>$this->input->post('a_id'),
);
  print_r($data);
  $this->db->insert('lms_user_answer',$data);


 }

  
}
?>