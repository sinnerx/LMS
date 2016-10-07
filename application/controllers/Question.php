<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Question extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  $this->load->helper('url'); 
  $this->load->helper('form');
  $this->load->model('questiondata');
  $this->load->model('questions_data');
  $this->load->model('Update_question');
  $this->load->model('delete_question');
  $this->load->model('delete_answer');
  $this->load->model('template_model');
  }

function index()
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
    $data['nav_title'] = 'Questions';
    $data['nav_subtitle'] = 'Questions Listsssss';
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
     //$this->view($q_id=null);
     $this->load->view('questions/index');
   //  $this->load->view('announce/index',$data);
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

    //$this->load->model('template_model');
    $list = $this->questiondata->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $question) {
      $no++;
      $row = array();
      $row[] = $question->q_id;
      $row[] = $question->q_text;
      $row[] = $question->type;
      // $row[] = $person->address;
      // $row[] = $person->dob;

      //add html for action
     $row[] = '<a href="question/edit/'."".$question->q_id."".'"><i class="fa fa-pencil"></i></a> &emsp;
          <a href="question/delete/'."".$question->q_id."".'"><i class="fa fa-trash-o "></i></a>';
    
      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->questiondata->count_all(),
            "recordsFiltered" => $this->questiondata->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }



  public function ajax_edit($q_id)
  {
    $data = $this->questiondata->get_by_id($q_id);
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
    $insert = $this->questiondata->save($data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_update()
  {
    $this->_validate();
    $data = array(
        'q_id' => $this->input->post('q_id'),
        'q_text' => $this->input->post('q_text'),
        'type' => $this->input->post('type'),
        //'address' => $this->input->post('address'),
        //'dob' => $this->input->post('dob'),
      );
    $this->questiondata->update(array('q_id' => $this->input->post('q_id')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function ajax_delete($q_id)
  {
    $this->questiondata->delete_by_id($q_id);
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
  $userid = $this->nativesession->get( 'userid' );
  $userLevel = $this->nativesession->get( 'userLevel' );

  $data = array(
        'userid' => $userid,
        'userLevel' => $userLevel,
        'message' => 'My Message'
    );
    $data['groups'] = $this->questions_data->getAllGroups();
   // $data['ques'] = $this->questions_data->getLastInserted();
    $data['page_title'] = 'Monte Carlo';
    $data['nav_title'] = 'Question';
    $data['nav_subtitle'] = 'New Question';
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
     $this->load->view('questions/insert',$data);

     //$this->load->view('templates/footer');

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
  $this->load->library( 'nativesession' );
  $this->load->helper('url');
  $userid = $this->nativesession->get( 'userid' );
  $userLevel = $this->nativesession->get( 'userLevel' );

  $data = array(
        'userid' => $userid,
        'userLevel' => $userLevel,
        'message' => 'My Message'
    );

      // If has id and go to single view
      $data['question'] = $this->questiondata->q_id($q_id);
      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Question';
      $data['nav_subtitle'] = 'Question Details';
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
       $this->load->view('questions/view', $data);
       //$this->load->view('templates/footer');

      }
     /* else
      {
       //If no session, redirect to login page
       redirect('login', 'refresh');
      }

    } */
     else {

      $data['question'] = $this->questiondata->question();

      $this->load->view('questions/index', $data);

    }
  }



function questions_data() 
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

  $imgPath = 'assets/uploads';

  $config['upload_path'] = FCPATH. '/assets/uploads';
         $config['allowed_types'] = 'gif|jpg|png|jpeg';
         $this->load->library('upload', $config);
        
        $this->load->library('upload', $config);

        if (!is_dir(FCPATH. 'assets/uploads'))
        {
            mkdir(FCPATH. 'assets/uploads', 0777, true);
        }     

         $this->upload->do_upload('inputImg');
         $data_upload_files = $this->upload->data();

         //$image = $data_upload_files[full_path];

         $image = $imgPath.'/'.$data_upload_files[file_name];


    $data = array(
    'q_id' => $this->input->post('q_id'),
    'id' => $this->input->post('id'),
    'type' => $this->input->post('type'),
    'q_text' => $this->input->post('q_text'),
    'correct' => $this->input->post('correct'),
    'img_path' => $image
     );

     
     $caca= $this->questions_data->questions($data);
     print_r($caca);
     $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Question';
      $data['nav_subtitle'] = 'Question Details';
      $data['home'] = 'Home';

      $this->load->helper('url');

      // foreach ($caca as $key => $value) {
      //   echo $value;
      // }

       // $this->load->view('templates/head', $data);
       // $this->load->view('templates/header', $data);
       // $this->load->view('templates/left_side', $data);
       // $this->load->view('templates/content_header', $data);
      //$this->load->view('page_view',$data);
      // $this->load->view('questions/correct', $data);
    redirect ( base_url().'question/correct',$data);
       //$this->load->view('templates/footer');
    
    }

    function correct()
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
    
    $max=$this->questions_data->add_posto($data);

    foreach ($max as $key => $value) {
        //echo $value;
       }

    $this->db->select('*');
    $q_details = $this->db->get_where('lms_answer', array('q_id'=>$value));
    $data['result'] = $q_details->result();

    // foreach ($q as $key => $value) 
    //   {
    //     $a_id       = $value->a_id;
    //     $a_text      = $value->a_text;
    //     $correct      = $value->correct;
    //   }
    // print_r($q);
   
    //$data['result'] = $this->db->insert_id();

    $data['page_title'] = 'Monte Carlo';
    $data['nav_title'] = 'Question';
    $data['nav_subtitle'] = 'Please click on radio button to set correct answer';
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
     // $data['a_id'] = $a_id;
     // $data['a_text'] = $a_text;
     //$data['status'] = $status;
     $this->load->view('page_view',$data);
     $this->load->view('questions/correct',$data);
      
    }




    function edit($q_id)
      { 
        if ($q_id !== null){
      $userid = $this->nativesession->get( 'userid' );
      $userLevel = $this->nativesession->get( 'userLevel' );
      $correct = $this->input->post('correct');
  
      $data= array(
      'userid' => $userid,
      'userLevel' => $userLevel,
        //'correct' =>$correct,
      'question' => $this->questiondata->q_id($q_id),
      'answer' => $this->questiondata->q_ids($q_id)
        );

      //$data['answer'] = $this->questiondata->q_ids($q_id);

      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Question';
      $data['nav_subtitle'] = 'Question Details';
      $data['home'] = 'Home';

      $this->load->helper('url');
 
       // $this->load->view('templates/head', $data);
       // $this->load->view('templates/header', $data);
       // $this->load->view('templates/left_side', $data);
       // $this->load->view('templates/content_header', $data);
       $this->load->view('page_view',$data);
       $this->load->view('questions/edit', $data);
       //$this->load->view('templates/footer');

      }
     
     else {
      $data['question'] = $this->questiondata->question();
      $userid = $this->nativesession->get( 'userid' );
      $userLevel = $this->nativesession->get( 'userLevel' );
      $this->load->view('questions/index', $data);

    }
  }


function delete($q_id)
  { 
    if ($q_id !== null){
      $this->load->library( 'nativesession' );
  $this->load->helper('url');
  $userid = $this->nativesession->get( 'userid' );
  $userLevel = $this->nativesession->get( 'userLevel' );

  $data = array(
        'userid' => $userid,
        'userLevel' => $userLevel,
        'message' => 'My Message'
    );

      // If has id and go to single view
      $data['question'] = $this->delete_question->delete_data($q_id);

      $data['page_title'] = 'Monte Carlo';
      $data['nav_title'] = 'Question';
      $data['nav_subtitle'] = 'Question Details';
      $data['home'] = 'Home';

      $this->load->helper('url');

      /*if($this->session->userdata('logged_in'))
      {
       $session_data = $this->session->userdata('logged_in');

       $data['username'] = $session_data['username']; */

       // view template
       // $this->load->view('templates/head', $data);
       // $this->load->view('templates/header', $data);
       // $this->load->view('templates/left_side', $data);
       // $this->load->view('templates/content_header', $data);
       $this->load->view('page_view',$data);
       redirect ( base_url().'question');
       //$this->load->view('templates/footer');

      }
     /* else
      {
       //If no session, redirect to login page
       redirect('login', 'refresh');
      }

    } */
     else {

      $data['question'] = $this->delete_question->delete_data();

      $this->load->view('questions/index', $data);

    }
  }

 function deletes($a_id)
  { 
    if ($a_id !== null){
  $this->load->library( 'nativesession' );
  $this->load->helper('url');
  $userid = $this->nativesession->get( 'userid' );
  $userLevel = $this->nativesession->get( 'userLevel' );

  $data = array(
        'userid' => $userid,
        'userLevel' => $userLevel,
        'message' => 'My Message'
    );

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
       // $this->load->view('templates/head', $data);
       // $this->load->view('templates/header', $data);
       // $this->load->view('templates/left_side', $data);
       // $this->load->view('templates/content_header', $data);
       $this->load->view('page_view',$data);
       redirect ( base_url().'question');
       //$this->load->view('templates/footer');

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

function Update_correct()
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
    
    $correct = $this->input->post('correct');
    $q_id = $this->input->post('q_id');
  
    
    $data = array(
      'correct' => $this->input->post('correct'),
      'q_id' => $this->input->post('q_id')

      );

    $this->db->where('q_id', $q_id);
    $this->db->update('lms_questions_bank', $data); 
   

      redirect ( base_url().'question');
     
    
     //redirect('package/view/'.$packageid, 'refresh');
    
   }


  function Update_question() 
  {



    $q_id = $this->input->post('q_id');
    $a_text = $this->input->post('a_text');
    $q_text = $this->input->post('q_text');
    $type = $this->input->post('type');
    $a_text = $this->input->post('a_text');
    $a_id = $this->input->post('a_id');
    $correct = $this->input->post('correct');


    $row_count = count($a_text);
    $row_count = count($a_id);

    for ($i=0; $i < $row_count; $i++) { 
    $rows = array(
      'a.q_id' => $q_id,
      'a.q_text' => $q_text,
      'a.type' => $type,
      'b.q_id' =>$q_id,
      'b.a_id' =>$a_id[$i],
      'b.a_text' =>$a_text[$i],
      
       );


 

      $query_update = "UPDATE lms_questions_bank as a, lms_answer as b
         SET a.q_id = '$q_id', a.q_text = '$q_text',a.type = '$type', b.a_text = '$a_text[$i]',a.correct = '$correct'
      WHERE a.q_id= '$q_id' and b.a_id= '$a_id[$i]'";

      $this->db->query($query_update);
    }
      //print_r($query_update);
      // $data['page_title'] = 'Monte Carlo';
      // $data['nav_title'] = 'Answer';
      // $data['nav_subtitle'] = 'Answer List';
      // $data['home'] = 'Home';
        $this->load->helper('url');
      
      // $this->load->model('template_model');
      // $this->load->view('templates/head', $data);
      // $this->load->view('templates/header', $data);
      // $this->load->view('templates/left_side', $data);
      // $this->load->view('templates/content_header', $data);
      redirect ( base_url().'question');
     // $this->load->view('templates/footer');
//     //$this->Update_question->update_que($q_id,$data);
//     //redirect('question/view/'.$q_id, 'refresh');
       
      
   }
 }
     




    function delete_question($q_id)
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
    $delete=$this->delete_question->delete_data($q_id);
    //$this->display();
    }

     function delete_answer($q_id)
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
    $delete=$this->delete_answer->delete_datas($q_id);
    //$this->display();
    }


  
