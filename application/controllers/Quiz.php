<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Quiz extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

  $this->load->model('quizdata');
  //$this->load->model('quiz_data');
  //$this->load->model('Update_question');
 // $this->load->model('delete_question');
  }

function index()
  {
    $data['page_title'] = 'Monte Carlo';
    $data['nav_title'] = 'Quiz';
    $data['nav_subtitle'] = 'Quiz List';
    $data['home'] = 'Home';

    $this->load->helper('url');

   /* if($this->session->userdata('logged_in'))
    {
     $session_data = $this->session->userdata('logged_in');

     $data['username'] = $session_data['username']; */

     $this->load->view('templates/head', $data);
     $this->load->view('templates/header', $data);
     $this->load->view('templates/left_side', $data);
     $this->load->view('templates/content_header', $data);
     //$this->view($q_id=null);
     $this->load->view('quiz/index',$data);
     $this->load->view('templates/footer');

    }
   /* else
    {
     //If no session, redirect to login page
     redirect('login', 'refresh');
    } 
  }*/



  function insert()
  {
    $data['page_title'] = 'Monte Carlo';
    $data['nav_title'] = 'Quiz';
    $data['nav_subtitle'] = 'New Quiz';
    $data['home'] = 'Home';

    $this->load->helper('url');

   /* if($this->session->userdata('logged_in'))
    {
     $session_data = $this->session->userdata('logged_in');

     $data['username'] = $session_data['username']; */

     $this->load->view('templates/head', $data);
     $this->load->view('templates/header', $data);
     $this->load->view('templates/left_side', $data);
     $this->load->view('templates/content_header', $data);
     $this->load->view('quiz/insert',$data);
     $this->load->view('templates/footer');

    }
  /*  else
    {
     //If no session, redirect to login page
     redirect('login', 'refresh');
    }
  } */


  function view($q_id)
  { 
    if ($q_id !== null){

      // If has id and go to single view
      $data['quiz'] = $this->quizdata->q_id($q_id);
      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Quiz';
      $data['nav_subtitle'] = 'Quiz Details';
      $data['home'] = 'Home';

      $this->load->helper('url');

     /* if($this->session->userdata('logged_in'))
      {
       $session_data = $this->session->userdata('logged_in');

       $data['username'] = $session_data['username']; */

       // view template
       $this->load->view('templates/head', $data);
       $this->load->view('templates/header', $data);
       $this->load->view('templates/left_side', $data);
       $this->load->view('templates/content_header', $data);
       $this->load->view('quiz/view', $data);

       $this->load->view('templates/footer');

      }
     /* else
      {
       //If no session, redirect to login page
       redirect('login', 'refresh');
      }

    } */
     else {

      $data['quiz'] = $this->quizdata->quiz();

      $this->load->view('quiz/index', $data);

    }
  }



function questions_data() 
  {
    $data = array(
    'q_id' => $this->input->post('q_id'),
    'id' => $this->input->post('id'),
    'type' => $this->input->post('type'),
    'q_text' => $this->input->post('q_text')
     );
       
    $this->questions_data->quiz($data);
    redirect('quiz/insert');
    }



function edit($q_id)
  { 
    if ($q_id !== null){

      // If has id and go to single view
      $data['quiz'] = $this->quizdata->q_id($q_id);

      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Quiz';
      $data['nav_subtitle'] = 'Quiz Details';
      $data['home'] = 'Home';

      $this->load->helper('url');

      /*if($this->session->userdata('logged_in'))
      {
       $session_data = $this->session->userdata('logged_in');

       $data['username'] = $session_data['username'];*/

       // view template
       $this->load->view('templates/head', $data);
       $this->load->view('templates/header', $data);
       $this->load->view('templates/left_side', $data);
       $this->load->view('templates/content_header', $data);
       $data['q_id'] = $q_id;
       $this->load->view('quiz/edit', $data);
       
       $this->load->view('templates/footer');

      }
     /* else
      {
       //If no session, redirect to login page
       redirect('login', 'refresh');
      }

    } */
     else {

      $data['quiz'] = $this->quizdata->quiz();

      $this->load->view('quiz/index', $data);

    }
  }


function delete($q_id)
  { 
    if ($q_id !== null){

      // If has id and go to single view
      $data['quiz'] = $this->delete_question->delete_data($q_id);

      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Quiz';
      $data['nav_subtitle'] = 'Quiz Details';
      $data['home'] = 'Home';

      $this->load->helper('url');

      /*if($this->session->userdata('logged_in'))
      {
       $session_data = $this->session->userdata('logged_in');

       $data['username'] = $session_data['username']; */

       // view template
       $this->load->view('templates/head', $data);
       $this->load->view('templates/header', $data);
       $this->load->view('templates/left_side', $data);
       $this->load->view('templates/content_header', $data);
       $this->load->view('quiz/view', $data);
       $this->load->view('templates/footer');

      }
     /* else
      {
       //If no session, redirect to login page
       redirect('login', 'refresh');
      }

    } */
     else {

      $data['quiz'] = $this->delete_question->delete_data();

      $this->load->view('quiz/index', $data);

    }
  }




  function Update_question() 
  {

    $q_id = $this->input->post('q_id');
    $a_text = $this->input->post('a_text');
    $q_text = $this->input->post('q_text');
    $type = $this->input->post('type');
    
    $data = array(
      'q_id' => $this->input->post('q_id'),
      'a_text' => $this->input->post('a_text'),
      'q_text' => $this->input->post('q_text'),
      'type' => $this->input->post('type'),
      );

    $this->Update_question->update_que($q_id,$data);
    redirect('quiz/view/'.$q_id, 'refresh');
    }
   }
     
    function delete_question($q_id)
    {
    $delete=$this->delete_question->delete_data($q_id);
    //$this->display();
    }
  
