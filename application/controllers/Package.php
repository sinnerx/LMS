<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Package extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

  $this->load->model('packagedata');
  $this->load->model('package_data');
  $this->load->model('Update_package');
  $this->load->model('delete_package');
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


  $data['page_title'] = 'Monte Carlo';
  $data['nav_title'] = 'Package';
  $data['nav_subtitle'] = 'Package List';
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
  $this->load->view('packages/index');
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
    $list = $this->packagedata->get_datatables();
    $data = array();
    $no = $_POST['start'];
      foreach ($list as $package) 
        {
        $no++;
        $row = array();
        $row[] = $package->m_id;
        $row[] = $package->Name;
    
   

      //add html for action
       $row[] = '<a href="package/edit/'."".$package->m_id."".'"><i class="fa fa-pencil"></i></a>
          <a href="package/delete/'."".$package->m_id."".'"><i class="fa fa-trash-o "></i></a>';
    
       $data[] = $row;
       }

       $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->packagedata->count_all(),
            "recordsFiltered" => $this->packagedata->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }



  public function ajax_edit($m_id)
  {
     $data = $this->packagedata->get_by_id($m_id);
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
    $insert = $this->packagedata->save($data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_update()
  {
    $this->_validate();
    $data = array(
        'm_id' => $this->input->post('m_id'),
        'Name' => $this->input->post('Name'),
        
        //'address' => $this->input->post('address'),
        //'dob' => $this->input->post('dob'),
      );
    $this->packagedata->update(array('m_id' => $this->input->post('m_id')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete($m_id)
  {
    $this->packagedata->delete_by_id($m_id);
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
    $data['page_title'] = 'Monte Carlo';
    $data['nav_title'] = 'Question';
    $data['nav_subtitle'] = 'New Question';
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
     $this->load->view('packages/insert',$data);
     $this->load->view('templates/footer');

    }
    
  /*  else
    {
     //If no session, redirect to login page
     redirect('login', 'refresh');
    }
  } */


  function view($m_id)
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
    if ($m_id !== null){

      // If has id and go to single view
      $data['question'] = $this->packagedata->m_id($m_id);
      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'package';
      $data['nav_subtitle'] = 'package Details';
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
       $this->load->view('packages/view', $data);
       $this->load->view('templates/footer');

      }
     /* else
      {
       //If no session, redirect to login page
       redirect('login', 'refresh');
      }

    } */
     else {

      $data['package'] = $this->packagedata->package();

      $this->load->view('packages/index', $data);

    }
  }



function package_data() 
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
    'm_id' => $this->input->post('m_id'),
    'Name' => $this->input->post('Name'),
     );
       
    $this->package_data->packages($data);
   

      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'package';
      $data['nav_subtitle'] = 'package Details';
      $data['home'] = 'Home';

      $this->load->helper('url');

      // if($this->session->userdata('logged_in'))
      // {
      //  $session_data = $this->session->userdata('logged_in');

      //  $data['username'] = $session_data['username']; 

       // view template
       $this->load->view('templates/head', $data);
       $this->load->view('templates/header', $data);
       $this->load->view('templates/left_side', $data);
       $this->load->view('templates/content_header', $data);
       redirect ( base_url().'index.php/package');
       $this->load->view('templates/footer');
   // redirect('package/insert');
    }



function edit($m_id)
  { 
    if ($m_id !== null){
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
      $data['package'] = $this->packagedata->m_id($m_id);

      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'package';
      $data['nav_subtitle'] = 'package Details';
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
       $this->load->view('packages/edit', $data);
       $this->load->view('templates/footer');

      }
     /* else
      {
       //If no session, redirect to login page
       redirect('login', 'refresh');
      }

    } */
     else {

      $data['package'] = $this->packagedata->package();

      $this->load->view('packages/index', $data);

    }
  }


function delete($m_id)
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
    if ($m_id !== null){

      // If has id and go to single view
      $data['package'] = $this->delete_package->delete_data($m_id);

      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'package';
      $data['nav_subtitle'] = 'package Details';
      $data['home'] = 'Home';

      $this->load->helper('url');

      // if($this->session->userdata('logged_in'))
      // {
      //  $session_data = $this->session->userdata('logged_in');

      //  $data['username'] = $session_data['username']; 

       // view template
       $this->load->view('templates/head', $data);
       $this->load->view('templates/header', $data);
       $this->load->view('templates/left_side', $data);
       $this->load->view('templates/content_header', $data);
        redirect ( base_url().'index.php/package');
       $this->load->view('templates/footer');

      }
     /* else
      {
       //If no session, redirect to login page
       redirect('login', 'refresh');
      }

    } */
     else {

      $data['package'] = $this->delete_package->delete_data();

      $this->load->view('packages/index', $data);

    }
  }




  function Update_package() 
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
    $m_id = $this->input->post('m_id');
    $Name = $this->input->post('Name');
  
    
    $data = array(
      'm_id' => $this->input->post('m_id'),
      'Name' => $this->input->post('Name'),

      );

    $this->Update_package->update_pac($m_id,$data);
   

      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'package';
      $data['nav_subtitle'] = 'package Details';
      $data['home'] = 'Home';

      $this->load->helper('url');

      $this->load->view('templates/head', $data);
      $this->load->view('templates/header', $data);
      $this->load->view('templates/left_side', $data);
      $this->load->view('templates/content_header', $data);
      redirect ( base_url().'index.php/package');
      $this->load->view('templates/footer');
    
     //redirect('package/view/'.$m_id, 'refresh');
    }
   }
     
    function delete_package($m_id)
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
    $delete=$this->delete_package->delete_data($m_id);
    //$this->display();
    }
  
