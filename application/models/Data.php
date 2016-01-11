<?php

Class Data extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  // DD Report

  public function dd_report()
  {
      $query = $this->db->get('DD_REPORTS');
      return $query->result_array();
  }

  // total report number
  public function dd_report_total()
  {
      $query = $this->db->get('DD_REPORTS');
      return $query->num_rows();
  }

  public function dd_report_id($id)
  {
      $query = $this->db->get_where('DD_REPORTS',array('id_report' => $id));
      return $query->row_array();
  }

  //=======================================================================

  // total unregistered premises
  public function dd_report_total_unregistered()
  {
      $query = $this->db->get_where('DD_REPORTS',array('is_registered' => 0));
      return $query->num_rows();
  }

  // total registered premises
  public function dd_report_total_registered()
  {
      $query = $this->db->get_where('DD_REPORTS',array('is_registered' => 1));
      return $query->num_rows();
  }

  // total expired premises
  public function dd_report_total_expired()
  {
      $query = $this->db->get_where('DD_REPORTS',array('is_registered' => 2));
      return $query->num_rows();
  }

  //=======================================================================

  // total unlicensed premises
  public function dd_report_total_unlicensed()
  {
      $query = $this->db->get_where('DD_REPORTS',array('is_licensed' => 0));
      return $query->num_rows();
  }

  // total unlicensed premises
  public function dd_report_total_licensed()
  {
      $query = $this->db->get_where('DD_REPORTS',array('is_licensed' => 1));
      return $query;
  }

  

  //=======================================================================

  // get value from licensed by month

  // total licensed november
  public function li_nov()
  {
      $query = $this->db->get_where('DD_REPORTS',array('MONTH(dt_create)' => 11, 'is_licensed' => 1));
      return $query->num_rows();
  }

  public function unli_nov()
  {
      $query = $this->db->get_where('DD_REPORTS',array('MONTH(dt_create)' => 11, 'is_licensed' => 0));
      return $query->num_rows();
  }

  // total licensed October
  public function li_oct()
  {
      $query = $this->db->get_where('DD_REPORTS',array('MONTH(dt_create)' => 10, 'is_licensed' => 1));
      return $query->num_rows();
  }

  public function unli_oct()
  {
      $query = $this->db->get_where('DD_REPORTS',array('MONTH(dt_create)' => 10, 'is_licensed' => 0));
      return $query->num_rows();
  }

  // total licensed September
  public function li_sep()
  {
      $query = $this->db->get_where('DD_REPORTS',array('MONTH(dt_create)' => 9, 'is_licensed' => 1));
      return $query->num_rows();
  }

  public function unli_sep()
  {
      $query = $this->db->get_where('DD_REPORTS',array('MONTH(dt_create)' => 9, 'is_licensed' => 0));
      return $query->num_rows();
  }

  
  //=======================================================================

  // get value from Registered by month

  // total registered november
  public function re_nov()
  {
      $query = $this->db->get_where('DD_REPORTS',array('MONTH(dt_create)' => 11, 'is_registered' => 1));
      return $query->num_rows();
  }

  public function unre_nov()
  {
      $query = $this->db->get_where('DD_REPORTS',array('MONTH(dt_create)' => 11, 'is_registered' => 0));
      return $query->num_rows();
  }

  // total registered October
  public function re_oct()
  {
      $query = $this->db->get_where('DD_REPORTS',array('MONTH(dt_create)' => 10, 'is_registered' => 1));
      return $query->num_rows();
  }

  public function unre_oct()
  {
      $query = $this->db->get_where('DD_REPORTS',array('MONTH(dt_create)' => 10, 'is_registered' => 0));
      return $query->num_rows();
  }

  // total registered September
  public function re_sep()
  {
      $query = $this->db->get_where('DD_REPORTS',array('MONTH(dt_create)' => 9, 'is_registered' => 1));
      return $query->num_rows();
  }

  public function unre_sep()
  {
      $query = $this->db->get_where('DD_REPORTS',array('MONTH(dt_create)' => 9, 'is_registered' => 0));
      return $query->num_rows();
  }

 

  //=======================================================================

  // User

  public function users()
  {
      $query = $this->db->get('DD_USERS');
      return $query->result_array();
  }

  public function users_total()
  {
      $query = $this->db->get('DD_USERS');
      return $query->num_rows();
  }

  public function user_id($id)
  {
      $query = $this->db->get_where('DD_USERS',array('id_user' => $id));
      return $query->row_array();
  }

}

?>