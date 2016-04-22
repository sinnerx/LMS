<?php 

Class Courses_data extends CI_Model
{

 public function courses()
 {
  $data=array(
    'code'=>$this->input->post('code'),
    'name'=>$this->input->post('name'),
    'description'=>$this->input->post('description'),
      'typeid' => $this->input->post('typeid'),
    'status' => $this->input->post('status'),
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

public function getAllGroup()
    {
    $query = $this->db->query('SELECT *  FROM training_type ');
    return $query->result();
    }

  public function courses_report()
  {
      $query = $this->db->get('lms_module');
      return $query->result_array();
  }
}
?>