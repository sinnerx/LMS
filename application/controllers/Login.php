<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Login extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
    $this->load->model('template_model');
 }
 
 function index()
 {

	$this->load->library( 'nativesession' );
	$this->load->helper('url');
	$userid = $this->nativesession->get( 'userid' );
	$userLevel = $this->nativesession->get( 'userLevel' );

	$data = array(
		'userid' => $userid,
		'userLevel' => $userLevel,
		'message' => 'My Message'
	);

	$data['page_title'] = 'Monte Carlo';
	$data['nav_title'] = 'Question';
	$data['nav_subtitle'] = 'Question Details';
	$data['home'] = 'Home';

	$this->load->helper(array('form'));
	$this->load->view('templates/head', $data);
	$this->load->view('templates/header', $data);
	$this->load->view('templates/left_side_manager', $data);
	$this->load->view('templates/content_header', $data);
	$this->load->view('quiz/login', $data);
	$this->load->view('templates/footer');
   
 }
 
}
 
?>