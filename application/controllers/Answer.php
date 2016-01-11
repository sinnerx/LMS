<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Answer extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

  $this->load->model('answerdata');
  $this->load->model('answer_data');
  $this->load->model('Update_answer');
 $this->load->model('delete_answer');
  }

function index()
  {
    $data['page_title'] = 'Monte Carlo';
    $data['nav_title'] = 'Answer';
    $data['nav_subtitle'] = 'Answer List';
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
     $this->view($a_id=null);
   //  $this->load->view('announce/index',$data);
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
    $data['nav_title'] = 'Answer';
    $data['nav_subtitle'] = 'Answer List';
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
     $this->load->view('answers/insert',$data);
     $this->load->view('templates/footer');

    }
  /*  else
    {
     //If no session, redirect to login page
     redirect('login', 'refresh');
    }
  } */


  function view($a_id)
  { 
    if ($a_id !== null){

      // If has id and go to single view
      $data['answer'] = $this->answerdata->a_id($a_id);
      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Answer';
      $data['nav_subtitle'] = 'Answer List';
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
       $this->load->view('answers/view', $data);
       $this->load->view('templates/footer');

      }
     /* else
      {
       //If no session, redirect to login page
       redirect('login', 'refresh');
      }

    } */
     else {

      $data['answer'] = $this->answerdata->answer();

      $this->load->view('answers/index', $data);

    }
  }



function answer_data() 
  {
    $data = array(
    'a_id' => $this->input->post('a_id'),
    'q_id' => $this->input->post('q_id'),
   //'type' => $this->input->post('type'),
    'a_text' => $this->input->post('a_text')
     );
       
    $this->answer_data->answers($data);
    redirect('answer/insert');
    }



function edit($a_id)
  { 
    if ($a_id !== null){

      // If has id and go to single view
      $data['answer'] = $this->answerdata->a_id($a_id);

      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Answer';
      $data['nav_subtitle'] = 'Answer List';
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
       $this->load->view('answers/edit', $data);
       $this->load->view('templates/footer');

      }
     /* else
      {
       //If no session, redirect to login page
       redirect('login', 'refresh');
      }

    } */
     else {

      $data['answer'] = $this->answerdata->answer();

      $this->load->view('answers/index', $data);

    }
  }


function delete($a_id)
  { 
    if ($a_id !== null){

      // If has id and go to single view
      $data['answer'] = $this->delete_answer->delete_data($a_id);

      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Answer';
      $data['nav_subtitle'] = 'Answer List';
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
       $this->load->view('answers/view', $data);
       $this->load->view('templates/footer');

      }
     /* else
      {
       //If no session, redirect to login page
       redirect('login', 'refresh');
      }

    } */
     else {

      $data['answer'] = $this->delete_answer->delete_data();

      $this->load->view('answers/index', $data);

    }
  }




  function Update_answer() 
  {

    $a_id = $this->input->post('a_id');
    $q_id = $this->input->post('q_id');
    $a_text = $this->input->post('a_text');
    //$type = $this->input->post('type');
    
    $data = array(
    'a_id' => $this->input->post('a_id'),
    'q_id' => $this->input->post('q_id'),
   //'type' => $this->input->post('type'),
    'a_text' => $this->input->post('a_text')
     
      );

    $this->Update_answer->update_ans($a_id,$data);
    redirect('answer/view/'.$a_id, 'refresh');
    }
   }
     
    function delete_answer($a_id)
    {
    $delete=$this->delete_answer->delete_data($a_id);
    //$this->display();
    }
  
