<?php

Class Delete_answer extends CI_Model
{

function delete_data($a_id)
{
	 $this->load->database();

$this->db->where('a_id', $a_id);
$this->db->delete('lms_answer');
}

 
}

?>