<?php 

Class Package_data extends CI_Model
{

 public function packages()
 {
  $data=array(
    'packageid'=>$this->input->post('packageid'),
    'name'=>$this->input->post('name'),
    'status'=>$this->input->post('status'),
    'billing_item_id'=>$this->input->post('billing_item_id'),
);

  $this->db->insert('lms_package',$data);

 }

  public function package_report()
  {
      $query = $this->db->get('lms_package');
      return $query->result_array();
  }

 public function getAllGroups()
    {
    $query = $this->db->query('SELECT *  FROM billing_item ');
    return $query->result();
    }

  
}
?>