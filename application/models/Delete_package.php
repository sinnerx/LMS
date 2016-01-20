<?php

Class Delete_package extends CI_Model
{

function delete_data($packageid)
{
	 $this->load->database();

$this->db->where('packageid', $packageid);
    $this->db->delete('lms_package');
}

 
}

?>