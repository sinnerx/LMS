<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Reporting extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
 	$this->load->model('template_model');

  }

  public function index (){
  	$data['page_title'] = 'Monte Carlo';
    $data['nav_title'] = 'Answer';
    $data['nav_subtitle'] = 'Answer List';
    $data['home'] = 'Home';

    $this->load->helper('url');
    $this->load->library( 'nativesession' );  

        //Read the username from session
        
  	$userid = $this->nativesession->get( 'userid' );
  	$userLevel = $this->nativesession->get( 'userLevel' );    

    $data = array(
        'userid' => $userid,
        'userLevel' => $userLevel,
        'message' => 'My Message'
    );  	
   /* if($this->session->userdata('logged_in'))
    {
     $session_data = $this->session->userdata('logged_in');

     $data['username'] = $session_data['username']; */

     $this->load->view('templates/head', $data);
     $this->load->view('templates/header', $data);
     $this->load->view('templates/left_side', $data);
     $this->load->view('templates/content_header', $data);
     $this->load->view('reporting/filter', $data);
     //$this->view($a_id=null);
   //  $this->load->view('announce/index',$data);
     $this->load->view('templates/footer');
  }
}