<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quizs extends CI_Controller {

	public function __construct(){
		    parent::__construct();
		    //$this->load->model('quiz_data');
		 	$this->load->helper('form');
		    $this->load->helper('url');
		    $this->load->model('template_model');
		
		  }
  
	  public function index(){
		$this->load->database();
		$data['sessionid'] = $this->input->post('sessionid');
		$data['id'] = $this->input->post('id');  
   	  	$_SESSION['sessionid'] = $data['sessionid'];
   	  	$this->load->helper(array('date','url'));
		$id= $this->input->post('id');
		print_r($id);

		// Get the id of the last question
		$res = $this->db->
			   select_min('q_id')->where('id',$id)->
			   get('lms_questions_bank')->
			   result_array();
		
		$q_id = $res[0]['q_id'];


			
		$this->show($q_id);
	  }

  public function show($q_id = -1){
  $this->load->library( 'nativesession' );
  $this->load->helper('url');   

        //Read the username from session
        
  $userid = $this->nativesession->get( 'userid' );
  $userLevel = $this->nativesession->get( 'userLevel' );
  $sessionid=$_SESSION['sessionid'];
 
    
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
     $data['id'] = $this->input->post('id');
   	 $id = $this->input->post('id');
   	   
   	 print_r($id);
     $q = $this->db->
				where(array('q_id'=>$q_id))->
				get('lms_questions_bank')->
				result_array();

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

	print_r($id);
	$res = $this->db->
				select_min('q_id')->
				where("q_id > $q_id")->where('id',$id)->
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
	} else

//if (!empty($_POST['submiting'])) 
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

	print_r($sessionid);
	$data['m'] = $m;
	$data['status'] = $status;
	$this->load->view('quiz/result', $data);
	$this->load->view('templates/content_header', $data);
    $this->load->view('templates/footer');
}

}

// public function result()
// {


// 	$this->load->library( 'nativesession' );
//     $this->load->helper('url');   
// 	$userid = $this->nativesession->get( 'userid' );
//     $userLevel = $this->nativesession->get( 'userLevel' );
     
      
//     $data = array(
//         'userid' => $userid,
//         'userLevel' => $userLevel,
//         'message' => 'My Message'
//     );



// 	$data['page_title'] = 'Monte Carlo';
//    	$data['nav_title'] = 'Quiz';
//     $data['nav_subtitle'] = 'Quiz List';
//     $data['home'] = 'Home';

// 	$this->load->database();
// 	$this->load->helper(array('date','url'));

	
		
// 		// Select the question
// 	 $this->load->view('templates/head', $data);
//      $this->load->view('templates/header', $data);
//      $this->load->view('templates/left_side_manager', $data);
//      $this->load->view('templates/content_header', $data);
//      $this->load->view('templates/footer');



//       $this->db->select('*');
// 	  $this->db->where("marks","1");
//       $this->db->where("id",$id);
//       $this->db->where("sessionid",$sessionid);
// 	  $query = $this->db->get('lms_question_user');
// 	  $count = $query->num_rows();
// 	  print_r($id);
// 	  //print_r($sessionid);

// 	 //$count = $this->db->query('SELECT * FROM lms_question_user where marks=1 and sessionid=$sessionid');

//      //echo $count->num_rows();
// 	// $count = $this->db->select('marks');
//  //    $this->db->from('lms_question_user');
//  //    $this->db->where("marks","1");
//  //    $this->db->where("id",$id);
//  //    $this->db->where("sessionid",$sessionid);
//  //    $total = $count->num_rows()
//     //$count = $this->db->where("marks","1")->count_all_results("lms_question_user");


   



// 	$m= ($count/20)*100;

// 	if ($m  >= 50 || $m==50){
// 		$status='Pass';
// 	}

// 	else
// 	{
// 		$status='Fail';
// 	}

// 	$data = array(
// 	        'result' => $m,
// 	        );

// 	    $data = array(
// 	    'result' => $m,
// 	    'status'=>$status,
// 	    'userid'=> $userid,
// 	    //'packageid' => $id,	    
// 	     );
// 	  $this->db->insert('lms_result',$data);

	   
// 	//print_r($count);
// 	print_r($sessionid);
// 	$data['m'] = $m;
// 	$data['status'] = $status;
// 	$this->load->view('quiz/result', $data);

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

      
      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Question';
      $data['nav_subtitle'] = 'Question Details';
      $data['home'] = 'Home';
      

      $this->load->helper('url');

   	   //session_start();
   	   //$sessionid=$_SESSION['sessionid'];
       $this->load->view('templates/head', $data);
       $this->load->view('templates/header', $data);
       $this->load->view('templates/left_side_manager', $data);
       $this->load->view('templates/content_header', $data);
       $this->load->view('quiz/enter', $data);
       $this->load->view('templates/footer');

      
	}



	
}