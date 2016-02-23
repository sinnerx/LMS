<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enter extends  CI_Controller{

public function __construct() {
    parent::__construct();
   
}

function index()
{
if($this->session->userdata('logged_in'))
   {
    
     $session_data = $this->session->userdata('logged_in');
     $data['userEmail'] = $session_data['userEmail'];
     
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
      

      $this->load->helper('url');
     
    
      
       $this->load->view('templates/head', $data);
       $this->load->view('templates/header', $data);
       $this->load->view('templates/left_side_manager', $data);
       $this->load->view('templates/content_header', $data);
       $this->load->view('quiz/enter', $data);
       $this->load->view('templates/footer');
   }
else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 ?>