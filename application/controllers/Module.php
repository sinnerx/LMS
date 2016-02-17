<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Module extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

  $this->load->model('moduledata');
  $this->load->model('module_data');
  //$this->load->model('Update_module');
  $this->load->model('delete_module');
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
  $data['nav_title'] = 'Module';
  $data['nav_subtitle'] = 'Module List';
  $data['home'] = 'Home';

  //alan
  $list = $this->moduledata->get_datatables();
  $data['list'] = $list;


  $this->load->helper('url');

   /* if($this->session->userdata('logged_in'))
    {
     $session_data = $this->session->userdata('logged_in');

     $data['username'] = $session_data['username']; */

  // $this->load->view('templates/head', $data);
  // $this->load->view('templates/header', $data);
  // $this->load->view('templates/left_side', $data);
  // $this->load->view('templates/content_header', $data);
  $this->load->view('page_view',$data);
  $this->load->view('module/index');
  // $this->load->view('templates/footer');

    }
   /* else
    {
     //If no session, redirect to login page
     redirect('login', 'refresh');
    } 
  }*/

public function ajax_list()
  {
    $list = $this->moduledata->get_datatables();
    //var_dump($list);
    $data = array();
    $no = $_POST['start'];
      foreach ($list as $module) 
        {
        $no++;
        $row = array();
        $row[] = $module->package_name;
        $row[] = $module->module_name;
      
   

      //add html for action
       $row[] = '<a href="module/edit/'."".$module->ni."".'"><i class="fa fa-pencil"></i></a>&emsp;
          <a href="module/delete/'."".$module->no."".'"><i class="fa fa-trash-o "></i></a>';
    
       $data[] = $row;
       }

       $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->moduledata->count_all(),
            "recordsFiltered" => $this->moduledata->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }



  public function ajax_edit($packageid)
  {
     $data = $this->packagedata->get_by_id($packageid);
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
        'packageid' => $this->input->post('packageid'),
        'name' => $this->input->post('name'),
        
        //'address' => $this->input->post('address'),
        //'dob' => $this->input->post('dob'),
      );
    $this->packagedata->update(array('packageid' => $this->input->post('packageid')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete($packageid)
  {
    $this->packagedata->delete_by_id($packageid);
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
    $data['groups'] = $this->module_data->getAllGroups();
    $data['group'] = $this->module_data->getAllGroup();
    $data['page_title'] = 'Monte Carlo';
    $data['nav_title'] = 'Module';
    $data['nav_subtitle'] = 'New Module';
    $data['home'] = 'Home';

    $this->load->helper('url');

   /* if($this->session->userdata('logged_in'))
    {
     $session_data = $this->session->userdata('logged_in');

     $data['username'] = $session_data['username']; */

     // $this->load->view('templates/head', $data);
     // $this->load->view('templates/header', $data);
     // $this->load->view('templates/left_side', $data);
     // $this->load->view('templates/content_header', $data);
     $this->load->view('page_view',$data);
     $this->load->view('module/insert',$data);
     //$this->load->view('templates/footer');

    }

    function insert2()
  {
  $this->load->library( 'nativesession' );
  $this->load->helper('url');   

        //Read the username from session
        
  $userid = $this->nativesession->get( 'userid' );
  $userLevel = $this->nativesession->get( 'userLevel' );

      
    $data = array(
        'userid' => $userid,
        'userLevel' => $userLevel,
        'message' => 'My Message',
        'modules' => $this->module_data->packageids($packageid),
    );

    $data['groups'] = $this->module_data->getAllGroups();
    $data['group'] = $this->module_data->getAllGroup();
    $data['page_title'] = 'Monte Carlo';
    $data['nav_title'] = 'Module';
    $data['nav_subtitle'] = 'New Module';
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
     $this->load->view('module/insert2',$data);
     $this->load->view('templates/footer');

    }
    
  /*  else
    {
     //If no session, redirect to login page
     redirect('login', 'refresh');
    }
  } */


  function view($packageid)
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
    if ($packageid !== null){

      // If has id and go to single view
      $data['question'] = $this->packagedata->packageid($packageid);
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
       // $this->load->view('templates/head', $data);
       // $this->load->view('templates/header', $data);
       // $this->load->view('templates/left_side', $data);
       // $this->load->view('templates/content_header', $data);
       $this->load->view('page_view',$data);
       $this->load->view('packages/view', $data);
       // $this->load->view('templates/footer');

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



function module_data() 
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
    'packageid' => $this->input->post('packageid'),
    'moduleid' => $this->input->post('moduleid'),
     );
       
    $this->module_data->modules($data);
   

      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'package';
      $data['nav_subtitle'] = 'package Details';
      $data['home'] = 'Home';

      $this->load->helper('url');
       $this->load->view('page_view',$data);
       redirect ( base_url().'module');
       //$this->load->view('templates/footer');
   // redirect('package/insert');
    }


function module_datas() 
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

    $packageid=$_POST['packageid'];
    $moduleid=$_POST['moduleid'];
    $count = count($_POST['moduleid']);
   // $count = count($_POST['packageid']);
   
    
    for($i=0; $i<$count; $i++) {
    $datas = array(
           'packageid' => $packageid, 
           'moduleid' => $moduleid[$i],
           

           );
$q =  $this->db->select('packageid,moduleid')
      ->from('lms_package_module')
      ->where(array('packageid' => $packageid, 'moduleid' => $moduleid[$i]))->get();
if($q->num_rows() == 0){
   $this->db->insert('lms_package_module', $datas);
}

  
}
    // $data = array(
    // 'packageid' => $this->input->post('packageid'),
    // 'moduleid' => $this->input->post('moduleid'),
    //  );
       
    //$this->module_data->modules($data);
   

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
       // $this->load->view('templates/head', $data);
       // $this->load->view('templates/header', $data);
       // $this->load->view('templates/left_side', $data);
       // $this->load->view('templates/content_header', $data);
      $this->load->view('page_view',$data);
       redirect ( base_url().'module');
      // $this->load->view('templates/footer');
   // redirect('package/insert');
    }
function edit($packageid)
  { 
  if ($packageid !== null){
  $this->load->library( 'nativesession' );
  $this->load->helper('url');   

        //Read the username from session
        
  $userid = $this->nativesession->get( 'userid' );
  $userLevel = $this->nativesession->get( 'userLevel' );

       
       $data= array(
      'userid' => $userid,
      'userLevel' => $userLevel,
      'module' => $this->moduledata->packageid($packageid),
      'modules' => $this->moduledata->packageids($packageid),
      'modu' => $this->moduledata->packageidst()
      );
      $data['groups'] = $this->moduledata->getAllGroups();
      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Module';
      $data['nav_subtitle'] = 'Adding modules by selecting modules to the right';
      $data['home'] = 'Home';

      $this->load->helper('url');

       // $this->load->view('templates/head', $data);
       // $this->load->view('templates/header', $data);
       // $this->load->view('templates/left_side', $data);
       // $this->load->view('templates/content_header', $data);
      $this->load->view('page_view',$data);
       $this->load->view('module/edit', $data);
       // $this->load->view('templates/footer');

      }
     
     else {

      $data['module'] = $this->moduledata->module();

      $this->load->view('module/index', $data);

    }
  }

// function edit($id)
//   { 
//     if ($id !== null){
//   $this->load->library( 'nativesession' );
//   $this->load->helper('url');   

//         //Read the username from session
        
//   $userid = $this->nativesession->get( 'userid' );
//   $userLevel = $this->nativesession->get( 'userLevel' );

       
//        $data= array(
//       'userid' => $userid,
//       'userLevel' => $userLevel,
//       'module' => $this->moduledata->id($id),
//       'modules' => $this->moduledata->ids($id)
//       );
//       $data['groups'] = $this->moduledata->getAllGroups();
//       $data['page_title'] = 'Monte Carlo';
//       $data['nav_title'] = 'Module';
//       $data['nav_subtitle'] = 'Module Details';
//       $data['home'] = 'Home';

//       $this->load->helper('url');

//        $this->load->view('templates/head', $data);
//        $this->load->view('templates/header', $data);
//        $this->load->view('templates/left_side', $data);
//        $this->load->view('templates/content_header', $data);
//        $this->load->view('module/edit', $data);
//        $this->load->view('templates/footer');

//       }
     
//      else {

//       $data['module'] = $this->moduledata->module();

//       $this->load->view('module/index', $data);

//     }
//   }


function delete($id)
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
      $data['package'] = $this->delete_module->delete_data($id);

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
       // $this->load->view('templates/head', $data);
       // $this->load->view('templates/header', $data);
       // $this->load->view('templates/left_side', $data);
       // $this->load->view('templates/content_header', $data);
      $this->load->view('page_view',$data);
        redirect ( base_url().'module');
       //$this->load->view('templates/footer');

      }
     /* else
      {
       //If no session, redirect to login page
       redirect('login', 'refresh');
      }

    } */
     else {

      $data['module'] = $this->delete_module->delete_data();

      $this->load->view('module/index', $data);

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
    $packageid = $this->input->post('packageid');
    $name = $this->input->post('name');
  
    
    $data = array(
      'packageid' => $this->input->post('packageid'),
      'name' => $this->input->post('name'),

      );

    $this->Update_package->update_pac($packageid,$data);
   

      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'package';
      $data['nav_subtitle'] = 'package Details';
      $data['home'] = 'Home';

      $this->load->helper('url');

      // $this->load->view('templates/head', $data);
      // $this->load->view('templates/header', $data);
      // $this->load->view('templates/left_side', $data);
      // $this->load->view('templates/content_header', $data);
      $this->load->view('page_view',$data);
      redirect ( base_url().'module');
      //$this->load->view('templates/footer');
    
     
    }
   }
     
    function delete_module($id)
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
    $delete=$this->delete_module->delete_data($id);
    //$this->display();
    }
  
