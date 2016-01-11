<?php 

Class Package_data extends CI_Model
{

 public function packages()
 {
  $data=array(
    'm_id'=>$this->input->post('m_id'),
    'Name'=>$this->input->post('Name'),
);

  $this->db->insert('lms_package_module',$data);

 }

  public function package_report()
  {
      $query = $this->db->get('lms_package_module');
      return $query->result_array();
  }
}
?>