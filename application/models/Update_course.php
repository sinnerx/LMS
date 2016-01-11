<?php

Class Update_course extends CI_Model
{

 function update_cou($id,$data)
 {
 
//$id=$_GET['id'];
    $this->db->where('id', $id);
    $this->db->update('lms_course', $data);  
    print_r($data);
 }

 
}

?>