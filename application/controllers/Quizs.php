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
 $userid 	 = $this->nativesession->get( 'userid' );
 $userLevel  = $this->nativesession->get( 'userLevel' );

  	if (!isset($_SESSION['sessionid'])) 
  	{
		$data['sessionid'] 	= $this->input->post('sessionid');
		echo $_SESSION['sessionid'] 	= $data['sessionid'];
  	}

	if (!isset($_SESSION['id'])) 
	{
  		$_SESSION['id'] 		= $data['id'];
  	}

		$data = array(
		'userid' => $userid,
		'userLevel' => $userLevel,
		'message' => 'My Message'
		);

		$this->load->helper(array('date','url'));
		$id = $this->input->post('id');
		
			if (!isset($_SESSION['q_shuffle'])) 
			{
				$limit= 5;
				$this->db->select('q_id');
				$query = $this->db->get_where('lms_questions_bank', array('id' => $id),$limit);
				$result = $query->result();
				shuffle($result);
				$_SESSION["q_shuffle"] = $result;
			}

				$nq_shuffle = $_SESSION["q_shuffle"];
				$total_question = count($nq_shuffle);
				//session_destroy();
				echo $total_question;
				//print_r($nq_shuffle);
				$this->show($total_question);
}

public function show($total_question)
{
 $this->load->library( 'nativesession' );
 $this->load->helper('url');
 $userid = $this->nativesession->get( 'userid' );
 $userLevel = $this->nativesession->get( 'userLevel' );
 echo $sessionid=$_SESSION['sessionid'];
 $id=$_SESSION['id'];
			 
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

			if (!isset($_SESSION['question_key'])) 
			{
				$_SESSION["question_key"] = '0';
			}

			foreach ($_SESSION["q_shuffle"] as $key => $value) 
			{

				if ($key == $_SESSION["question_key"]) 
				{
					echo $next_question_id = $key;
					echo $current_question_id = $value->q_id;
				}

			}

			$this->db->select('*');
			$q_details = $this->db->get_where('lms_questions_bank', array('q_id'=>$current_question_id,'id' => $id));

			$q = $q_details->result();

			foreach ($q as $key => $value) 
			{
				$q_text 			= $value->q_text;
				$correct 			= $value->correct;
				$this_q_id 			= $value->id;
			}
				 
			
					
			$a = $this->db->
						where(array('q_id'=>$current_question_id))->
						order_by('q_id','asc')->
						get('lms_answer')->
						result_array();


			// Get the ids of the previous
			// and next questions

			$_SESSION["question_key"] = $next_question_id + 1;

			$prev = 0;
			echo $next = $_SESSION["question_key"];  

			$this->load->view('quiz/index',array(
				'q_text'	=> $q_text,
				'correct'   => $correct,
				'id'   		=> $this_q_id,
				'sessionid' => $sessionid,
				'answers'	=> $a,
				'previous'	=> $prev,
				'next'		=> $next,
				'q_id'		=> $current_question_id,
				'total_question' => $total_question
			));

	}

public	function quiz_data() 
	  {
	  	if (!empty($_POST['submit'])) 
	  	{
				  // submit button pressed
			 
			$this->load->helper('url');
			$this->load->database();
			$a_id= $this->input->post('a_id');
			$q_id= $this->input->post('q_id');
			$sessionid= $this->input->post('sessionid');
			$id= $this->input->post('id');


				$correct = $this->db->select('correct')->
				where(array('q_id'=>$q_id))->
				get_where('lms_questions_bank')->
				row();
				$correct->correct;
				$optionChoose=$a_id;
				$correctOption = $correct->correct;
				//print_r($a_id);
				//print_r($correctOption);
			    $marks=0;
			    if($optionChoose==$correctOption)
			    $marks=1;
			    else 
			    $marks=0;	
					

				 $data = array(
			        'marks' => $marks,
			    );

			    $data = array(
			    'q_id' => $this->input->post('q_id'),
			    'a_id' => $this->input->post('a_id'),
			    'sessionid' =>$this->input->post('sessionid'),
			    'marks' => $marks,
			    'userid'=> $this->input->post('userid'),
			    'moduleid'=> $this->input->post('id'),
			     );

					  	$this->db->insert('lms_question_user',$data);			
					    $data = array(
					    'q_id' => $this->input->post('q_id'),
					    'a_id' => $this->input->post('a_id'),
					     );
					   $search_query = $this->input->post('next');
					   $this->db->insert('lms_user_answer',$data);
					   $this->load->helper('url');


				   redirect(base_url().'quizs','location', 301);
				   //redirect(base_url().'quizs/show/'.$search_query,'location', 301);
		} 

		else if (!empty($_POST['submiting'])) 
		{	
			$data['sessionid'] = $this->input->post('sessionid'); 
			$sessionid= $this->input->post('sessionid');
			$userid= $this->input->post('userid');
			$id= $this->input->post('id');
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
			$sessionid= $this->input->post('sessionid');
			$id= $this->input->post('id');


				$correct = $this->db->select('correct')->
				where(array('q_id'=>$q_id))->
				get_where('lms_questions_bank')->
				row();
				$correct->correct;
				$optionChoose=$a_id;
				$correctOption = $correct->correct;
				//print_r($a_id);
				//print_r($correctOption);
			    $marks=0;
			    if($optionChoose==$correctOption)
			    $marks=1;
			    else 
			    $marks=0;	
					

					$data = array(
				        'marks' => $marks,
				    );

				    $data = array(
				    'q_id' => $this->input->post('q_id'),
				    'a_id' => $this->input->post('a_id'),
				    'sessionid' =>$this->input->post('sessionid'),
				    'marks' => $marks,
				    'userid'=> $this->input->post('userid'),
				    'moduleid'=> $this->input->post('id'),
				     );

				  	$this->db->insert('lms_question_user',$data);			
				    $data = array(
				    'q_id' => $this->input->post('q_id'),
				    'a_id' => $this->input->post('a_id'),
				     );
				   $search_query = $this->input->post('next');
				   $this->db->insert('lms_user_answer',$data);
				   $this->load->database();
				   $this->load->helper(array('date','url'));
				   $this->load->view('page_view2',$data);

					  $this->db->select('*');
					  $this->db->where("marks","1");
				      $this->db->where("moduleid",$id);
				      $this->db->where("sessionid",$sessionid);
					  $query = $this->db->get('lms_question_user');
					  $count = $query->num_rows();
					  
						$m= ($count/5)*100;

						if ($m  >= 50 || $m==50){
							$status='Pass';
						}

						else
						{
							$status='Fail';
						}

						$data = array(
						        'result' => $m,
						        );

						    $data = array(
						    'result' => $m,
						    'status'=>$status,
						    'userid'=> $userid,	
						    'moduleid'=> $id,
						    'sessionid'=> $sessionid,	    
						     );
					    //print_r($data);
				$this->db->insert('lms_result',$data);
				$data['id'] = $id;
				$data['m'] = $m;
				$data['status'] = $status;
				$this->load->view('quiz/result', $data);
					
		}

				

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

public function verifylogin() 
{
	$this->load->library('form_validation');
	$userEmail = $this->input->post('userEmail');
	$userPassword = $this->input->post('userPassword');
	$result = $this->users->login($userEmail, $userPassword);

	   if($result)
	   {
	     $sess_array = array();
	     foreach($result as $row)
	     {
	       $sess_array = array(
	      
	         'userEmail' => $row->userEmail
	         
	       );
	       $this->session->set_userdata('logged_in', $sess_array);
	     }
	     return TRUE;
	   }
	   else
	   {
	     $this->form_validation->set_message('check_database', 'Invalid username and password or email address not verified');
	     return false;
	   }
	}

	// function getRandomQuestion()
	// {
	//     $sql = "SELECT * FROM lms_questions_bank ORDER BY RAND() LIMIT 1 )";
	//     $query = $this->db->query($sql);
	//     $result = $query->result_array();

	//     $count = count($result);

	//     if (empty($count) ||$count > 1) {
	//         echo "Inavliad Question";
	//     }
	//     else{
	//         return $result;
	//     }
	// }


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

$data['page_title'] 	= 'Monte Carlo';
$data['nav_title'] 		= 'Question';
$data['nav_subtitle']	= 'Question Details';
$data['home'] 			= 'Home';

$data['boss'] = $_SESSION['pop'];
$say = $data['boss']['moduleid']; 

$this->db->select('q_id');
$query = $this->db->get_where('lms_questions_bank', array('id' => $say));
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




	
