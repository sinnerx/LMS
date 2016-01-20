<?php 

Class Courses_data extends CI_Model
{

 public function courses()
 {
  $data=array(
    'code'=>$this->input->post('code'),
    'name'=>$this->input->post('name'),
    'description'=>$this->input->post('description'),
  
     'packageid'=>$this->input->post('packageid'),
  );

  $this->db->insert('lms_module',$data);
return false;
 }

 public function getAllGroups()
    {
      

        $query = $this->db->query('SELECT *  FROM lms_package');


        return $query->result();

        //echo 'Total Results: ' . $query->num_rows();
    }

  public function courses_report()
  {
      $query = $this->db->get('lms_module');
      return $query->result_array();
  }
}
?>