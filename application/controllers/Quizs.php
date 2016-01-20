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
		$this->load->helper(array('date','url'));
		// Get the id of the last question
		$res = $this->db->
			   select_min('q_id')->
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
				where(array('q_id'=>$q_id))->
				get('lms_questions_bank')->
				result_array();

	if(empty($q)){
			// Show an error page
	show_404();
		 
	
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
				select_min('q_id')->
				where("q_id > $q_id")->
				get('lms_questions_bank')->
				result_array();
		
		if(!empty($res)){

			

			$next = $res[0]['q_id'];

		}

		$res = $this->db->
				select_max('q_id')->
				where("q_id < $q_id")->
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
			'answers'	=> $a,
			'previous'	=> $prev,
			'next'		=> $next,
			'q_id'		=> $q_id,

			'questionNumber' => $questionNumber
		));



	}

public	function quiz_data() 
  {
$this->load->helper('url');
$this->load->database();
                       

if(!isset($_POST['questionNumber']))
$_POST['questionNumber'] = '-1';
$questionNumber=$_POST['questionNumber'];
$a_id= $this->input->post('a_id');
$q_id= $this->input->post('q_id');
$correct= $this->input->post('correct');



    $optionChoose=$a_id;
    //print_r($a_id);

	$correctOption = $correct;
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
    'marks' => $marks,
    'userid'=> $this->input->post('userid'),
    'id'=> $this->input->post('id'),
    
     );
  $this->db->insert('lms_question_user',$data);			

                                  
                                   // //$result1=mysql_query("select result from student where student_id='$studentId' ");
                                   // while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC))
                                   // {                        
                                   //      $marks=$marks+$row['result'] ;
                                   //      //echo "MARKS="+$marks;	
                                   //      $sql4 = "update student set result = $marks  where student_id='$studentId' ";
                                   //      $result4 = mysqli_query($con,$sql4);
                                   //      //mysqli_query($con,"update student set result = $marks  where student_id='$studentId' ");												
                                   //  }				
                                //echo "OPTION CHOOSED was $optionChoose";
                        //      }
                        // }



        // if(isset($_POST['submitPaper']))
        //                     header("location:result.php");

        //                 $questionNumber=$questionNumber+1;

        //                 if($questionNumber>=10)
        //                     header("location:result.php");


        //                 $displayNumber= $questionNumber+1;             





    $data = array(
    'q_id' => $this->input->post('q_id'),
    'a_id' => $this->input->post('a_id'),
    
     );
   $search_query = $this->input->post('next');
   $this->db->insert('lms_user_answer',$data);
   redirect(base_url().'quizs/show/'.$search_query,'refresh');
     
  
}



}