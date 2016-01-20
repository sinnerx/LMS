<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Answers extends CI_Controller {

	public function add($q_id = -1){

		$this->load->database();
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation');
		
		// Check if there is such a question

		$q = $this->db->
				where(array('q_id'=>$q_id))->
				get('questions_bank')->
				result_array();

		if(empty($q)){
			// Show an error page
			show_404();
		}
		
		// Adding validation rules.
		
		// $this->form_validation->set_rules('name', 'name', 'required|min_length[2]|max_length[32]');
		// $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		// $this->form_validation->set_rules('answer', 'Answer', 'required|min_length[5]|max_length[255]');
				
		// If there are errors, show the form
		if ($this->form_validation->run() == FALSE){
			
			$this->load->view('add_answer',array(
				'question'	=> $q[0]['question'],
				'qid'		=> $q[0]['id']
			));
			
		}
		else{
			
			// Otherwise insert the answer to the database
			
			$this->db->insert('lms_user_answer', array(
				'u_id'	=> $q[0]['u_id'],
				'email'	=> htmlspecialchars($this->input->post('email')),
				'name'	=> htmlspecialchars($this->input->post('name')),
				
				// preserving the new lines:
				'answer'=> nl2br(htmlspecialchars($this->input->post('answer')))
			));
			
			redirect('questions/show/'.$q[0]['q_id']);
		}
		
	}
}

$this->db->insert('lms_user_answer', array(
				'q_id'	=> $q[0]['q_id'],
				'a_id'	=> $this->input->post('a_id'),
				//'name'	=> $this->input->post('name'),
				
				// preserving the new lines:
				//'answer'=> nl2br(htmlspecialchars($this->input->post('answer')))
			));