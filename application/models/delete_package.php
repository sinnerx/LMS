<?php

Class delete_package extends CI_Model
{

function delete_data($m_id)
{
	 $this->load->database();

$this->db->where('m_id', $m_id);
    $this->db->delete('lms_package_module');
}

 
}

?>