<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quizs extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    //$this->load->model('quiz_data');
 	$this->load->helper('form');
        $this->load->helper('url');
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

	$data['page_title'] = 'Monte Carlo';
   	$data['nav_title'] = 'Quiz';
    $data['nav_subtitle'] = 'Quiz List';
    $data['home'] = 'Home';

	$this->load->database();
	$this->load->helper(array('date','url'));
		
		// Select the question
	 $this->load->view('templates/head', $data);
     $this->load->view('templates/header', $data);
     $this->load->view('templates/left_side', $data);
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
			'answers'	=> $a,
			'previous'	=> $prev,
			'next'		=> $next,
			'q_id'		=> $q_id,
			'questionNumber' => $questionNumber
		));



	}

	function quiz_data() 
  {
$this->load->helper('url');
$this->load->database();


                        /*PHP code to handle the question*/
                       

if(!isset($_POST['questionNumber']))
$_POST['questionNumber'] = '-1';
$questionNumber=$_POST['questionNumber'];
$a_id= $this->input->post('a_id');
$q_id= $this->input->post('q_id');
$correct= $this->input->post('correct');

   if($questionNumber!=-1)
    {
   if (!isset($_POST['a_id']))
    {
    }else
    {
    $optionChoose=$_POST['a_id'];
    print_r($optionChoose);



	$correctOption = $correct;
	print_r($correctOption);

    $marks=0;
    if($optionChoose==$correctOption)
    $marks=1;
    else 
    $marks=0;				

                                   // $studentId=$_SESSION['student_id'];
    print_r($marks);                               // $sql1 = "select result from student where student_id='$studentId' ";
                                   // $result1 = mysqli_query($con,$sql1);
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
                             }
                        }



        if(isset($_POST['submitPaper']))
                            header("location:result.php");

                        $questionNumber=$questionNumber+1;

                        if($questionNumber>=10)
                            header("location:result.php");


                        $displayNumber= $questionNumber+1;             





    // $data = array(
    // 'q_id' => $this->input->post('q_id'),
    // 'a_id' => $this->input->post('a_id'),
    
    //  );
    $search_query = $this->input->post('next');

  
     //$this->db->insert('user_answer',$data);
      //redirect('/quizs/show/$next', 'refresh');

    redirect(base_url().'index.php/quizs/show/'.$search_query,'refresh');
     
  
}



}