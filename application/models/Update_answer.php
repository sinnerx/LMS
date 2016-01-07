<?php

Class Update_answer extends CI_Model
{

 function update_ans($a_id,$data)
 {
    $this->db->where('a_id', $a_id);
    $this->db->update('lms_answer', $data);  
 }

 
}

?>