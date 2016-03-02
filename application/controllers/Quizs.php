<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Quizs extends CI_Controller {

public function __construct()
{
 parent::__construct();
 $this->load->helper('form');
 $this->load->helper('url');
 $this->load->model('template_model');

}

public function index()
{
 $this->load->database();
 $data['id'] = $this->input->post('id'); 
 $data['packageid'] = $this->input->post('packageid');
 $userid 	 = $this->nativesession->get( 'userid' );
 $userLevel  = $this->nativesession->get( 'userLevel' );

  	if (!isset($_SESSION['sessionid'])) 
  	{
		$data['sessionid'] 	= $this->input->post('sessionid');
		 $_SESSION['sessionid'] 	= $data['sessionid'];
  	}

	if (!isset($_SESSION['id'])) 
	{
  		$_SESSION['id'] 		= $data['id'];
  	}
  	if (!isset($_SESSION['packageid'])) 
	{
  		$_SESSION['packageid'] 		= $data['packageid'];
  	}

		$data = array(
		'userid' => $userid,
		'userLevel' => $userLevel,
		'message' => 'My Message'
		);

		$this->load->helper(array('date','url'));
		$id = $this->input->post('id');
		$packageid = $this->input->post('packageid');
		
			if (!isset($_SESSION['q_shuffle'])) 
			{
				$limit= 10;
				$this->db->select('q_id');
				$query = $this->db->get_where('lms_questions_bank', array('id' => $id),$limit);
				$result = $query->result();
				shuffle($result);
				$_SESSION["q_shuffle"] = $result;
			}

				$nq_shuffle = $_SESSION["q_shuffle"];
				$total_question = count($nq_shuffle);
				//session_destroy();
				 $total_question;
				//print_r($nq_shuffle);
				$this->show($total_question);
}



public function show($total_question)
{
if (isset($_SESSION['id'])){
 $this->load->library( 'nativesession' );
 $this->load->helper('url');
 $userid = $this->nativesession->get( 'userid' );
 $userLevel = $this->nativesession->get( 'userLevel' );
 $sessionid=$_SESSION['sessionid'];
 $id=$_SESSION['id'];
 $packageid=$_SESSION['packageid'];
			 
 $data = array(
    'userid' => $userid,
    'userLevel' => $userLevel,
    'message' => 'My Message'
 );

$data['page_title'] 	= 'Monte Carlo';
$data['nav_title'] 		= 'Quiz';
$data['nav_subtitle'] 	= 'Quiz List';
$data['home'] 			= 'Home';

$this->load->database();
$this->load->helper(array('date','url'));
$this->load->view('page_view2',$data);
//print_r($userid);
			
			$limit= 10;
			$this->db->select('*');
			$q_details = $this->db->get_where('lms_questions_bank', array('id' => $id),$limit);
			//return $q_details->row();
			$q = $q_details->result();
			shuffle($q);
			$totaly=count($q);
			//print_r($q);

			 foreach ($q as $key => $value) 
			 {
			 	$q_id               = $value->q_id;
			 	
				$q_text 			= $value->q_text;
				$this_q_id 			= $value->id;
			
				$a = $this->db->
						where(array('q_id'=>$q_id))->
						order_by('q_id','asc')->
						get('lms_answer')->
						result();

				foreach ($a as $key => $value) 
				 {
				 	 $value->q_id;
				 }
			}
				 $c = $this->db->
						// where(array('q_id'=>$q_id))->
						order_by('q_id','asc')->
						get('lms_answer')->
						result();
			
			$this->db->select('*');
			$query = $this->db->get_where('lms_module', array('id' => $id));
			$resultk = $query->row();

		 	$data = array(
			    'q' => $q,
			    'totaly' => $totaly,
			    'q_text'	=> $q_text,
			    'sessionid' => $sessionid,
			    'a'	=> $c,
			    'id'   		=> $this_q_id,
			    'modulename' => $resultk,
			    'packageid' => $packageid

			      
			    );
		 	 //print_r($data);
			// Get the ids of the previous
			// and next questions

			//$_SESSION["question_key"] = $next_question_id + 1;

			//$prev = 0;
			// $next = $_SESSION["question_key"];  
			$this->load->view('quiz/index',$data);
		}else{
			redirect ( base_url().'login');
		}

	}



public	function quiz_data() 
	  {
	
			$sessionid= $this->input->post('sessionid');
			$userid= $this->input->post('userid');
			$id= $this->input->post('id');
			$packageid= $this->input->post('packageid');
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
		   	$data['nav_title'] = 'Quiz';
		    $data['nav_subtitle'] = 'Quiz List';
		    $data['home'] = 'Home';

			$a_id= $this->input->post('a_id');
			$q_id= $this->input->post('q_id');
			//print_r($q_id);
			$sessionid= $this->input->post('sessionid');
			$id= $this->input->post('id');



					

					
			foreach ($q_id as $key => $value) {

				foreach ($a_id as $akey => $avalue) {

					if ($akey == $key) {

						$correct = $this->db->select('correct')->
						where(array('q_id'=>$value))->
						get_where('lms_questions_bank');
						$correctOption = $correct->result();

						foreach ($correctOption as $bkey => $bvalue) {
							//echo $bvalue->correct;
							$marks=0;
							if ($bvalue->correct == $avalue)
							{
								 $marks=1;
							}
							else 
							{
								 $marks=0;
							}
					$data = array(
				    'q_id' => $value,
				    'a_id' => $avalue,
				    'sessionid' =>$this->input->post('sessionid'),
				    'marks' => $marks,
				    'userid'=> $this->input->post('userid'),
				    'moduleid'=> $this->input->post('id'),
				     'packageid'=> $this->input->post('packageid')
				     );
					//print_r($data);
					$this->db->insert('lms_question_user',$data);
				
						}
						
					}

	 		  }
			}
				
				   $this->load->database();
				   $this->load->helper(array('date','url'));
				   $this->load->view('page_view2',$data);

					  $this->db->select('*');
					  $this->db->where("marks","1");
				      $this->db->where("moduleid",$id);
				      $this->db->where("sessionid",$sessionid);
					  $query = $this->db->get('lms_question_user');
					  $count = $query->num_rows();
					  
						$m= ($count/10)*100;

						if ($m  >= 50 || $m==50){
							$status='1';
						}

						else
						{
							$status='0';
						}


						$data = array(
						        'result' => $m,
						        );

						    $data = array(
						    'result' => $m,
						    'status'=>$status,
						    'userid'=> $userid,	
						    'moduleid'=> $id,
						    'packageid'=> $packageid,
						    'sessionid'=> $sessionid,
						    'datecreated'=> date("Y-m-d H:i:s"),	    
						     );




			

					    //print_r($data);
			$this->db->insert('lms_result',$data);
			$data['id'] = $id;
			$data['m'] = $m;
			$data['status'] = $status;
				
			$this->db->select('site.siteID,site.siteSlug,user.userID');
			$this->db->from('site_member');
    		$this->db->join('site','site.siteID = site_member.siteID');
    		$this->db->join('user','user.userID=site_member.userID');
    		$this->db->where('user.userID',$userid); 
    		$query = $this->db->get();
    		$my= $query->result();

    		foreach ($my as $key => $value) 
			 {
			 	$data['siteSlug']   = $value->siteSlug;
			 	
				}
				$this->load->view('quiz/result', $data);
					
		}

		public	function quiz_result($id) 
	  {

		$userid = $this->nativesession->get( 'userid' );
		
		   $this->load->database();
		   $this->load->helper(array('date','url'));
		   $this->load->view('page_view2');
						
			$this->db->select('*');
			$query = $this->db->get_where('lms_result', array('sessionid' => $id));
			$result = $query->result();
			//print_r($query->result());


			$this->db->select('site.siteID,site.siteSlug,user.userID');
			$this->db->from('site_member');
    		$this->db->join('site','site.siteID = site_member.siteID');
    		$this->db->join('user','user.userID=site_member.userID');
    		$this->db->where('user.userID',$userid); 
    		$query = $this->db->get();
    		$my= $query->result();

    		foreach ($my as $key => $value) 
			 {
			 	$data['siteSlug']   = $value->siteSlug;
			 	
				}




			foreach ($result as $key => $value) {
				$data['moduleid'] = $value->moduleid;
				$data['result'] = $value->result;
				$data['sessionid'] = $value->sessionid;
			}

			$this->load->view('quiz/result2', $data);
					
		}


public function login() 
{
  $this->load->library('form_validation');
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
      $this->load->view('page_view2',$data);
	  $this->load->view('quiz/login', $data);
	 
}

// public function verifylogin() 
// {
// 	$this->load->library('form_validation');
// 	$userEmail = $this->input->post('userEmail');
// 	$userPassword = $this->input->post('userPassword');
// 	$result = $this->users->login($userEmail, $userPassword);

// 	   if($result)
// 	   {
// 	     $sess_array = array();
// 	     foreach($result as $row)
// 	     {
// 	       $sess_array = array(
	      
// 	         'userEmail' => $row->userEmail
	         
// 	       );
// 	       $this->session->set_userdata('logged_in', $sess_array);
// 	     }
// 	     return TRUE;
// 	   }
// 	   else
// 	   {
// 	     $this->form_validation->set_message('check_database', 'Invalid username and password or email address not verified');
// 	     return false;
// 	   }
// 	}

	

public function enter()
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


	 if (isset($_SESSION['pop'])){
	 $data['boss'] = $_SESSION['pop'];

	$mmoid= $data['boss']['moduleid'];
	
	//print_r($say);
	//$data['packageid'] = $data['boss']['packageid'];
	//print_r($data['moduleid']);
	}
	else {
		$mmoid = '';
	}
 
$this->db->select('*');
$query = $this->db->get_where('lms_module', array('id' => $mmoid));
$resultk = $query->row();

if (count($resultk) < 1) {
$data = array(
    'userid' => $userid,
    'userLevel' => $userLevel,
    'message' => 'My Message',
    'modulename' => 'No Module Selected from Site'
    );
}
else{

 //print_r($resultk->name);

$data = array(
    'userid' => $userid,
    'userLevel' => $userLevel,
    'message' => 'My Message',
    'modulename' => $resultk->name
);
}


$this->db->select('q_id');
$query = $this->db->get_where('lms_questions_bank', array('id' => $mmoid));
$result = $query->result();
if (count($result)<1) {
	$data['noq']=1;
} else {
	$data['noq']=0;

}

$this->load->view('page_view2',$data);
$this->load->view('quiz/enter', $data);

}
//print_r($data['boss']);

}




	
