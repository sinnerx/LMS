<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//load our Nativesession library
        $this->load->library( 'nativesession' );
        $this->load->helper('url');		

        //Read the username from session
        
        $userid = $this->nativesession->get( 'userid' );
        $userLevel = $this->nativesession->get( 'userLevel' );

        //Update session data
        //$this->nativesession->set( 'cart', $cart );

        //delete session data
        //$this->nativesession->delete('userid');

		$data = array(
		    'userid' => $userid,
		    'userLevel' => $userLevel,
		    'message' => 'My Message'
		);

		$this->load->view('welcome_message', $data);
	}

	public function test(){
		$data = array(
		    'userid' => 'testid',
		    'userLevel' => 'testlevel',
		    'message' => 'My Message'
		);
		$this->load->view('welcome_message', $data);
	}

	public function sessionStart($userid = null, $userLevel = null){


		//load our Nativesession library
        $this->load->library( 'nativesession' );

		//Update session data
        $this->nativesession->set( 'userid', $userid );
        $this->nativesession->set( 'userLevel', $userLevel );
	}

	public function sessionEnd (){
		//load our Nativesession library
        $this->load->library( 'nativesession' );
        $this->load->helper('url');

        //delete session data
        $this->nativesession->delete('userid');
        $this->nativesession->delete('userLevel');

        session_destroy();

        redirect("../../../iris/dashboard");
	}

	public function doNothing (){

	}
}
