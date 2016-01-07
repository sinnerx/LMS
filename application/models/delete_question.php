<?php

Class delete_question extends CI_Model
{

function delete_data($q_id)
{
	 $this->load->database();

	$this->db->where('q_id', $q_id);
    $this->db->delete('lms_questions_bank');
}

 
}

?>