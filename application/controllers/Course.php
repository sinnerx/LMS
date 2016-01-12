<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Course extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
 //  $this->load->model('data');
  $this->load->model('coursedata');
  $this->load->model('courses_data');
  $this->load->model('Update_course');
  $this->load->model('delete_course');
  $this->load->model('template_model');
  }

function index()
  {
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
    $data['page_title'] = 'Learning Management System';
    $data['nav_title'] = 'Course';
    $data['nav_subtitle'] = 'Course List';
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
     //$this->view($id=null);
     $this->load->view('courses/index');

   //  $this->load->view('announce/index',$data);
     $this->load->view('templates/footer');
  }
  /* else
    {
     //If no session, redirect to login page
     redirect('login', 'refresh');
    } 
  }*/


  public function ajax_list()
  {
    $list = $this->coursedata->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $course) {
      $no++;
      $row = array();
      $row[] = $course->id;
      $row[] = $course->courseID;
      $row[] = $course->Topics;
      $row[] = $course->Descr;
      // $row[] = $person->address;
      // $row[] = $person->dob;

      //add html for action
     $row[] = '<a href="course/edit/'."".$course->id."".'"><i class="fa fa-pencil"></i></a>
          <a href="course/delete/'."".$course->id."".'"><i class="fa fa-trash-o "></i></a>';
    
      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->coursedata->count_all(),
            "recordsFiltered" => $this->coursedata->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }



  public function ajax_edit($id)
  {
    $data = $this->coursedata->get_by_id($id);
    //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
    echo json_encode($data);
  }

  public function ajax_add()
  {
    $this->_validate();
    $data = array(
        'firstName' => $this->input->post('firstName'),
        'lastName' => $this->input->post('lastName'),
        'gender' => $this->input->post('gender'),
        'address' => $this->input->post('address'),
        'dob' => $this->input->post('dob'),
      );
    $insert = $this->coursedata->save($data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_update()
  {
    $this->_validate();
    $data = array(
        'id' => $this->input->post('id'),
        'q_text' => $this->input->post('q_text'),
        'type' => $this->input->post('type'),
        //'address' => $this->input->post('address'),
        //'dob' => $this->input->post('dob'),
      );
    $this->coursedata->update(array('id' => $this->input->post('id')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete($id)
  {
    $this->coursedata->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
  }


  private function _validate()
  {
    $data = array();
    $data['error_string'] = array();
    $data['inputerror'] = array();
    $data['status'] = TRUE;

    if($this->input->post('firstName') == '')
    {
      $data['inputerror'][] = 'firstName';
      $data['error_string'][] = 'First name is required';
      $data['status'] = FALSE;
    }

    if($this->input->post('lastName') == '')
    {
      $data['inputerror'][] = 'lastName';
      $data['error_string'][] = 'Last name is required';
      $data['status'] = FALSE;
    }

    if($this->input->post('dob') == '')
    {
      $data['inputerror'][] = 'dob';
      $data['error_string'][] = 'Date of Birth is required';
      $data['status'] = FALSE;
    }

    if($this->input->post('gender') == '')
    {
      $data['inputerror'][] = 'gender';
      $data['error_string'][] = 'Please select gender';
      $data['status'] = FALSE;
    }

    if($this->input->post('address') == '')
    {
      $data['inputerror'][] = 'address';
      $data['error_string'][] = 'Addess is required';
      $data['status'] = FALSE;
    }

    if($data['status'] === FALSE)
    {
      echo json_encode($data);
      exit();
    }
  }


  function insert()
  {
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
     $data['groups'] = $this->courses_data->getAllGroups();
    $data['page_title'] = 'Learning Management System';
    $data['nav_title'] = 'Course';
    $data['nav_subtitle'] = 'New Course';
    $data['home'] = 'Home';

    $this->load->helper('url');

   /* if($this->session->userdata('logged_in'))
    {
     $session_data = $this->session->userdata('logged_in');

     $data['username'] = $session_data['username'];*/

     $this->load->view('templates/head', $data);
     $this->load->view('templates/header', $data);
     $this->load->view('templates/left_side', $data);
   // $this->load->view('templates/content_header', $data);
     $this->load->view('courses/insert',$data);
     $this->load->view('templates/footer');

    }
    //else
   // {
     //If no session, redirect to login page
    // redirect('login', 'refresh');
  //}
//  }


  function view($id)
  { 
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
    if ($id !== null){

      // If has id and go to single view
      $data['course'] = $this->coursedata->id($id);
      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Course';
      $data['nav_subtitle'] = 'Course Details';
      $data['home'] = 'Home';

      $this->load->helper('url');

     /* if($this->session->userdata('logged_in'))
      {
       $session_data = $this->session->userdata('logged_in');

       $data['username'] = $session_data['username'];*/

       // view template
       $this->load->view('templates/head', $data);
       $this->load->view('templates/header', $data);
       $this->load->view('templates/left_side', $data);
       $this->load->view('templates/content_header', $data);
       $this->load->view('courses/view', $data);
       $this->load->view('templates/footer');

     }
      //else
      //{
       //If no session, redirect to login page
      // redirect('login', 'refresh');
     // }

  // } 
    else {

      $data['course'] = $this->coursedata->course();

      $this->load->view('courses/index', $data);
    }
  }

  function courses_data() 
  {
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
    $data = array(
    'courseID' => $this->input->post('courseID'),
    'Topics' => $this->input->post('Topics'),
    'Descr' => $this->input->post('Descr'),
    'm_id' => $this->input->post('m_id'),
    'Name' => $this->input->post('Name')
     );
    $this->courses_data->courses($data);
    // If has id and go to single view
      $data['course'] = $this->coursedata->id($id);
      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Course';
      $data['nav_subtitle'] = 'Course Details';
      $data['home'] = 'Home';

      $this->load->helper('url');

      $this->load->view('templates/head', $data);
       $this->load->view('templates/header', $data);
       $this->load->view('templates/left_side', $data);
       $this->load->view('templates/content_header', $data);
       redirect ( base_url().'index.php/course');
       $this->load->view('templates/footer');

   // redirect('course/insert');
  }



    function edit($id)
  { 
    if ($id !== null){
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
      // If has id and go to single view
      $data['course'] = $this->coursedata->id($id);

      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Course';
      $data['nav_subtitle'] = 'Course Details';
      $data['home'] = 'Home';

      $this->load->helper('url');

     /* if($this->session->userdata('logged_in'))
      {
       $session_data = $this->session->userdata('logged_in');

       $data['username'] = $session_data['username'];*/

       // view template
       $this->load->view('templates/head', $data);
       $this->load->view('templates/header', $data);
       $this->load->view('templates/left_side', $data);
       $this->load->view('templates/content_header', $data);
       $this->load->view('courses/edit', $data);
       $this->load->view('templates/footer');

      }
    /*  else
      {
       //If no session, redirect to login page
       redirect('login', 'refresh');
      }

    }*/
    else {

      $data['course'] = $this->coursedata->course();

      $this->load->view('courses/view', $data);

    }
  }


function delete($id)
  { 

    if ($id !== null){
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

      // If has id and go to single view
      $data['course'] = $this->delete_course->delete_data($id);

      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'course';
      $data['nav_subtitle'] = 'Course Details';
      $data['home'] = 'Home';

      $this->load->helper('url');

     /* if($this->session->userdata('logged_in'))
      {
       $session_data = $this->session->userdata('logged_in');

       $data['username'] = $session_data['username'];*/

       // view template
       $this->load->view('templates/head', $data);
       $this->load->view('templates/header', $data);
       $this->load->view('templates/left_side', $data);
       $this->load->view('templates/content_header', $data);
       redirect ( base_url().'index.php/course');
       $this->load->view('templates/footer');

      }
   /*   else
      {
       //If no session, redirect to login page
       redirect('login', 'refresh');
      }

    }*/
    else {

      $data['course'] = $this->delete_course->delete_data();

      $this->load->view('courses/index', $data);

    }
  }




  function Update_course() 
  {
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

    $id = $this->input->post('id');
    $courseID = $this->input->post('courseID');
    $m_id = $this->input->post('m_id');
    $Topics = $this->input->post('Topics');
    $Descr = $this->input->post('Descr');
    
    $data = array(
    'id' => $this->input->post('id'),
    'courseID' => $this->input->post('courseID'),
    'm_id' => $this->input->post('m_id'),
    'Topics' => $this->input->post('Topics'),
    'Descr' => $this->input->post('Descr'),
    );

    $this->Update_course->update_cou($id,$data);

    $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'course';
      $data['nav_subtitle'] = 'Course Details';
      $data['home'] = 'Home';

      $this->load->helper('url');

     /* if($this->session->userdata('logged_in'))
      {
       $session_data = $this->session->userdata('logged_in');

       $data['username'] = $session_data['username'];*/

       // view template
       $this->load->view('templates/head', $data);
       $this->load->view('templates/header', $data);
       $this->load->view('templates/left_side', $data);
       $this->load->view('templates/content_header', $data);
       redirect ( base_url().'index.php/course');
       $this->load->view('templates/footer');
   /* redirect('course/view/'.$id, 'refresh'); */
    }
   }
     
    function delete_course($id)
    {
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
    $delete=$this->delete_course->delete_data($id);
    $this->display();
    }
  
