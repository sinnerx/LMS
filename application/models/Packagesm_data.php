<?php 

Class Packagesm_data extends CI_Model
{

 public function package()
 {
  $data=array(
    'packageid'=>$this->input->post('packageid'),
    'name'=>$this->input->post('name'),
);

  $this->db->insert('lms_package',$data);

 }

  public function package_report()
  {
      $query = $this->db->get('lms_package');
      return $query->result_array();
  }
}
?>