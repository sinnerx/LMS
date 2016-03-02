<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Reporting extends CI_Controller {

  public $userid;  
  public $userLevel;  
  public function __construct()
  {
    parent::__construct();
    $this->load->library( 'nativesession' );     
 	$this->load->model('template_model');
    $this->userid = $this->nativesession->get( 'userid' );
    $this->userLevel = $this->nativesession->get( 'userLevel' );    
  }

  public function index (){
  	$data['page_title'] = 'Monte Carlo';
    $data['nav_title'] = 'Answer';
    $data['nav_subtitle'] = 'Answer List';
    $data['home'] = 'Home';

    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('reporting_model');

        //Read the username from session
        
    

    $data = array(
        'userid' => $this->userid,
        'userLevel' => $this->userLevel,
        'message' => 'My Message'
    );  	

        if ($this->userLevel == 99 || $this->userLevel == 3 || $this->userLevel == 999)
            $data['cluster_list'] = $this->reporting_model->get_cluster();
        elseif ($this->userLevel == 3)
            $data['cluster_list'] = $this->reporting_model->get_cluster($this->userid);

        $data['package_list'] = $this->reporting_model->get_list_package();
   /* if($this->session->userdata('logged_in'))
    {
     $session_data = $this->session->userdata('logged_in');

     $data['username'] = $session_data['username']; */

$this->load->view('page_view',$data);
     // $this->load->view('templates/head', $data);
     // $this->load->view('templates/header', $data);
     // $this->load->view('templates/left_side', $data);
     // $this->load->view('templates/content_header', $data);
     //$this->load->view('reporting/filter', $data);
     $this->load->view('reporting/result_reporting', $data);
     //$this->view($a_id=null);
   //  $this->load->view('announce/index',$data);
     //$this->load->view('templates/footer');

  }

    public function result_list()
    {   
        // {
        // participant: "1",
        // testresult: "1",
        // payment: "1",
        // modulepackage: "1",
        // package: "",
        // modulename: "",
        // moduleid: "",
        // forpi1m: "",
        // region: "1",
        // cluster: "",
        // sitename: "",
        // siteid: "",
        // membername: "",
        // memberid: "",
        // dateFrom: "21-02-2016",
        // dateTo: "21-02-2016"
        // }      

        //print_r($_GET);
        //die;
        $this->load->model('reporting_model');
        $list = $this->reporting_model->get_list_result($_GET);
        //print_r($list[0]);
        //die;
        $data = array();
        foreach ($list as $key) {
            //print_r($key);
            //die;
            # code...
            $row = array();
            $row[] = $key["username"];
            
            $row[] = $key["Cluster"];
            $row[] = $key["Pi1M"];
            
            $row[] = $key["PackageName"];
            $row[] = $key["ModuleName"];
            
            $key['billingTransactionUserID'] != '' ? $paid = "Paid" : $paid = "Unpaid";
            $row[] = $paid;
            
            $key['status'] != '' ? $statusquiz = "Pass" : $statusquiz = "Failed";
            $row[] = $statusquiz;
            $data[] = $row; 
        }
        //$list = json_encode($list);
        //return $list;
       $output = array(
                        //"draw" => isset($_POST['draw']),
                        //"recordsTotal" => $this->reporting_model->count_all(),
                        //"recordsFiltered" => $this->reporting_model->count_filtered(),
                        "data" => $data,
                                                
                );        
        echo json_encode($data);
        //echo $list;
    }

    public function get_site(){
        $this->load->model('reporting_model');
        if (isset($_GET['term'])){
          $q = strtolower($_GET['term']);
          $this->reporting_model->get_list_site($q);
        }
    }

    public function get_user(){
        $this->load->model('reporting_model');
        //print_r($this->user_model->get_list_user('a'));
        if (isset($_GET['term'])){
          $q = strtolower($_GET['term']);
          $this->reporting_model->get_list_user($q);
        }
    }

    public function get_module(){
        $this->load->model('reporting_model');
        //print_r($this->user_model->get_list_user('a'));
        if (isset($_GET['term'])){
          $q = strtolower($_GET['term']);
          $this->reporting_model->get_list_module($q);
        }
    }    
    public function get_cluster($id = null){
        //print_r($_GET['region_selected']);

         
        $this->load->model('reporting_model');
        if ($id)
            $id = $this->reporting_model->getClusterByUserID($id);

        $data = $this->reporting_model->get_cluster($id);
        echo json_encode($data);
        //return $data['cluster_list'];
        //print_r($data['cluster_list']);

    }    

    public function get_clusterbyuser(){

        $userid = $_GET['userid'];
        $userlevel = $_GET['userlevel'];
        // Array
        // (
        //     [userid] => 167
        //     [userlevel] => 3
        // )
        //echo $_GET['userid'];
        if ($userlevel == 99 || $userlevel == 999)
            $data = $this->reporting_model->get_cluster();
        elseif ($userlevel == 3)
            //$data = $this->reporting_model->get_cluster($userid);
            $data = $this->reporting_model->getClusterByUserID($userid);

        echo json_encode($data);

    } 

public function result_member_passed_list()
    {   
        // {
        // participant: "1",
        // testresult: "1",
        // payment: "1",
        // modulepackage: "1",
        // package: "",
        // modulename: "",
        // moduleid: "",
        // forpi1m: "",
        // region: "1",
        // cluster: "",
        // sitename: "",
        // siteid: "",
        // membername: "",
        // memberid: "",
        // dateFrom: "21-02-2016",
        // dateTo: "21-02-2016"
        // }      

        //print_r($_GET);
        //die;
        $this->load->model('reporting_model');
        $list = $this->reporting_model->get_list_member_passed($_GET);

        //print_r($list);
        //die;
        //print_r($list[0]);
        //die;
        $data = array();
        foreach ($list as $key) {
            //print_r($key);
            //die;
            # code...
            $row = array();
            $row[] = $key["username"];
            $row[] = $key["userIC"];
            
            $row[] = $key["userCluster"];
            $row[] = $key["userSite"];
            $row[] = $key["package"];
            //$row[] = $key["module"];
            $row[] = $key["date"];
            
            $data[] = $row; 
        }
        //$list = json_encode($list);
        //return $list;
       $output = array(
                        //"draw" => isset($_POST['draw']),
                        //"recordsTotal" => $this->reporting_model->count_all(),
                        //"recordsFiltered" => $this->reporting_model->count_filtered(),
                        "data" => $data,
                                                
                );        
        echo json_encode($data);
        //echo $list;
    }


public function result_nusuara_list()
    {   
        // {
        // participant: "1",
        // testresult: "1",
        // payment: "1",
        // modulepackage: "1",
        // package: "",
        // modulename: "",
        // moduleid: "",
        // forpi1m: "",
        // region: "1",
        // cluster: "",
        // sitename: "",
        // siteid: "",
        // membername: "",
        // memberid: "",
        // dateFrom: "21-02-2016",
        // dateTo: "21-02-2016"
        // }      

        //print_r($_GET);
        //die;
        $this->load->model('reporting_model');
        $list = $this->reporting_model->get_list_result($_GET);

        //print_r($list);
        //die;
        //print_r($list[0]);
        //die;
        $data = array();
        foreach ($list as $key) {
            //print_r($key);
            //die;
            # code...
            $row = array();
            $row[] = $key["username"];
            $row[] = $key["userIC"];
            
            $row[] = $key["userCluster"];
            $row[] = $key["userSite"];
            $row[] = $key["package"];
            //$row[] = $key["module"];
            $row[] = $key["date"];
            
            $data[] = $row; 
        }
        //$list = json_encode($list);
        //return $list;
       $output = array(
                        //"draw" => isset($_POST['draw']),
                        //"recordsTotal" => $this->reporting_model->count_all(),
                        //"recordsFiltered" => $this->reporting_model->count_filtered(),
                        "data" => $data,
                                                
                );        
        echo json_encode($data);
        //echo $list;
    }                                
}