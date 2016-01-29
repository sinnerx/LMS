<?php

Class Delete_module extends CI_Model
{

function delete_data($id)
{
	 $this->load->database();

$this->db->where('id', $id);
$this->db->delete('lms_package_module');
}

 
}

?>