<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Quizs extends CI_Controller {

public function __construct(){
	parent::__construct();
	//$this->load->model('quiz_data');
		$this->load->helper('form');
	$this->load->helper('url');
	$this->load->model('template_model');
	//  $this->load->model('users','',TRUE);

}

public function index(){
	$this->load->database();
	$data['sessionid'] = $this->input->post('sessionid');
	$data['id'] = $this->input->post('id'); 
	$userid = $this->nativesession->get( 'userid' );
	$userLevel = $this->nativesession->get( 'userLevel' );

	  	$_SESSION['sessionid'] = $data['sessionid'];
	  	$_SESSION['id'] = $data['id'];

	  	$data = array(
		        'userid' => $userid,
		        'userLevel' => $userLevel,
		        'message' => 'My Message'
		    );

	$this->load->helper(array('date','url'));
	$id= $this->input->post('id');
	

	// Get the id of the last question
	$res = $this->db->
		   select_min('q_id')->where('id',$id)->
		   get('lms_questions_bank')->
		   result_array();
	
	$q_id = $res[0]['q_id'];


$this->db->select('q_id');
$this->db->where('id',$id);
$this->db->where('userid',$userid);
$this->db->from('lms_question_user');
$subQuery = $this->db->get_compiled_select();
// $where_clause = $this->db->_compile_select();
// $this->db->_reset_select();

#Create main query
$this->db->select('q_id');
$this->db->where('id',$id);
$this->db->where("q_id NOT IN ($subQuery)", NULL, FALSE);
//$this->db->where_not_in("q_id",($subQuery), NULL, FALSE);
//$this->db->having('q_id <=', $subQuery);
$this->db->get('lms_questions_bank')->result();
//$this->db->escape();
//var_dump($this->db->last_query()); 
//var_dump($this->db->get('lms_questions_bank')->result());
//$this->db->result();
 

//print_r($subQuery);

	// $nes = $this->db->select('q_id');
	// 		$this->db->from('lms_questions_bank');
	// 		$this->db->where('id',$id);
	// 		$this->db->where('q_id', NOT IN ('select q_id from lms_question_user where userid=$userid and id=$id'), NULL, FALSE);
	// 		$query = $this->db->get();
 //    return $query->result_array();

 //    print_r($nes);

	//select q_id from lms_questions_bank where id=1 and q_id not in ( select q_id from lms_question_user where userid=134 and id=1)




		
	$this->show($q_id);
}

public function show($q_id = -1){
		$this->load->library( 'nativesession' );
		$this->load->helper('url');   

	        //Read the username from session
			        
		  $userid = $this->nativesession->get( 'userid' );
		  $userLevel = $this->nativesession->get( 'userLevel' );
		  $sessionid=$_SESSION['sessionid'];
		  $id=$_SESSION['id'];
		 
		    
		    $data = array(
		        'userid' => $userid,
		        'userLevel' => $userLevel,
		        'message' => 'My Message'
		    );



			$data['page_title'] = 'Monte Carlo';
		   	$data['nav_title'] = 'Quiz';
		    $data['nav_subtitle'] = 'Quiz List';
		    $data['home'] = 'Home';

			$this->load->database();
			$this->load->helper(array('date','url'));
				
				// Select the question
			 $this->load->view('templates/head', $data);
		     $this->load->view('templates/header', $data);
		     $this->load->view('templates/left_side_manager', $data);
		     $this->load->view('templates/content_header', $data);
		     $this->load->view('templates/footer');
		     
		   	   
		   	
		    $q = $this->db->
			where(array('q_id'=>$q_id))->where('id',$id)->
			//where('q_id'>$q_id)->where('id',$id)->
			get('lms_questions_bank')->
			result_array();
		  
			//print_r($q);
			//$q=$this->input->post('q');
			if(empty($q)){
					// Show an error page
			 redirect('/quizs/quiz_data/', 'refresh');
				 
			
			}
			
						
			$a = $this->db->
						where(array('q_id'=>$q_id))->
						order_by('q_id','asc')->
						get('lms_answer')->
						result_array();


				// Get the ids of the previous
				// and next questions

			$prev = 0;
			$next = 0;

			
			$res = $this->db->
						select_min('q_id')->where('id',$id)->
						where("q_id > $q_id")->
						get('lms_questions_bank')->
						result_array();
				
				if(!empty($res)){

					

					$next = $res[0]['q_id'];

				}

				$res = $this->db->
						select_max('q_id')->
						where("q_id < $q_id")->where('id',$id)->
						get('lms_questions_bank')->
						result_array();
				
				if(!empty($res)){
					$prev = $res[0]['q_id'];
				}
			



				if(!isset($_POST['questionNumber']))
				$_POST['questionNumber'] = '-1';
				$questionNumber=$_POST['questionNumber'];
		        $questionNumber=$questionNumber+1;
		        if($questionNumber>=10)
		        header("location:result.php");
		    	$displayNumber= $questionNumber+1;     

				$this->load->view('quiz/index',array(
					'q_text'	=> $q[0]['q_text'],
					'correct'   => $q[0]['correct'],
					'id'   		=> $q[0]['id'],
					'sessionid' => $sessionid,
					'answers'	=> $a,
					'previous'	=> $prev,
					'next'		=> $next,
					'q_id'		=> $q_id,
					'questionNumber' => $questionNumber
				));



			}

public	function quiz_data() 
  {


			if (!empty($_POST['submit'])) {
			  // submit button pressed
			 
			$this->load->helper('url');
			$this->load->database();
			 if(!isset($_POST['questionNumber']))
			 $_POST['questionNumber'] = '-1';
			$questionNumber=$_POST['questionNumber'];
			$a_id= $this->input->post('a_id');
			$q_id= $this->input->post('q_id');
			$correct= $this->input->post('correct');
			$sessionid= $this->input->post('sessionid');
			$id= $this->input->post('id');

				

			    $optionChoose=$a_id;
				$correctOption = $correct;
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
			    'id'=> $this->input->post('id'),
			     );

			  	$this->db->insert('lms_question_user',$data);			
			    $data = array(
			    'q_id' => $this->input->post('q_id'),
			    'a_id' => $this->input->post('a_id'),
			     );
			   $search_query = $this->input->post('next');
			   $this->db->insert('lms_user_answer',$data);

			   redirect(base_url().'quizs/show/'.$search_query,'refresh');
			   $data['id'] = $this->input->post('id');
			   $data['sessionid'] = $this->input->post('sessionid'); 
				} 

			if (!empty($_POST['submiting'])) 
			{
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

				$this->load->database();
				$this->load->helper(array('date','url'));

				 $this->load->view('templates/head', $data);
			     $this->load->view('templates/header', $data);
			     $this->load->view('templates/left_side_manager', $data);
			    

				  $this->db->select('*');
				  $this->db->where("marks","1");
			      $this->db->where("id",$id);
			      $this->db->where("sessionid",$sessionid);
				  $query = $this->db->get('lms_question_user');
				  $count = $query->num_rows();
				  
				$m= ($count/20)*100;

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
				    'packageid'=> $id,
				    'sessionid'=> $sessionid	    
				     );
				$this->db->insert('lms_result',$data);
				$data['id'] = $id;
				$data['sessionid'] = $sessionid;
				$data['m'] = $m;
				$data['status'] = $status;
				$this->load->view('quiz/result', $data);
				$this->load->view('templates/content_header', $data);
			    $this->load->view('templates/footer');
			}
			else
			{
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

				$this->load->database();
				$this->load->helper(array('date','url'));

				 $this->load->view('templates/head', $data);
			     $this->load->view('templates/header', $data);
			     $this->load->view('templates/left_side_manager', $data);
			    

				  $this->db->select('*');
				  $this->db->where("marks","1");
			      $this->db->where("id",$id);
			      $this->db->where("sessionid",$sessionid);
				  $query = $this->db->get('lms_question_user');
				  $count = $query->num_rows();
				  
				$m= ($count/20)*100;

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
				     );
				$this->db->insert('lms_result',$data);

				$data['id'] = $id;
				$data['sessionid'] = $sessionid;
				$data['m'] = $m;
				$data['status'] = $status;
				$this->load->view('quiz/result', $data);
				$this->load->view('templates/content_header', $data);
			    $this->load->view('templates/footer');
			}

}

public function login() {
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



       $this->load->view('templates/head', $data);
       $this->load->view('templates/header', $data);
       $this->load->view('templates/left_side_manager', $data);
       $this->load->view('templates/content_header', $data);
       $this->load->view('quiz/login', $data);
       $this->load->view('templates/footer');
}

public function verifylogin() {
	$this->load->library('form_validation');
	$userEmail = $this->input->post('userEmail');
	$userPassword = $this->input->post('userPassword');

   //query the database
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

function getRandomQuestion()
{
			    $sql = "SELECT * FROM lms_questions_bank ORDER BY RAND() LIMIT 1 )";
			    $query = $this->db->query($sql);
			    $result = $query->result_array();

			    $count = count($result);

			    if (empty($count) ||$count > 1) {
			        echo "Inavliad Question";
			    }
			    else{
			        return $result;
			    }
}


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





	
}