<?php

Class Update_course extends CI_Model
{

 function update_cou($id,$data)
 {
 	//var_dump($data);
 	//die;
//$id=$_GET['id'];
    $this->db->where('id', $id);
    $this->db->update('lms_module', $data);  
    //print_r($data);
 }

 
}

?>