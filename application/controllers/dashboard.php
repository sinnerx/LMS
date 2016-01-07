<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('data');
	}

	function index()
	{
		$data['page_title'] = 'Monte Carlo';
		$data['nav_title'] = 'Dashboard';
		$data['nav_subtitle'] = 'Control panel';
		$data['home'] = 'Home';

		$this->load->helper('url');

	
	}

	function report_data() 
	{
		header('Content-type: application/json');
		$hai = $this->data->dd_report_total_licensed();
		echo json_encode($hai->result());
	}

}