<?php 

Class Courses_data extends CI_Model
{

 public function courses()
 {
  $data=array(
    'courseID'=>$this->input->post('courseID'),
    'Topics'=>$this->input->post('Topics'),
    'Descr'=>$this->input->post('Descr'),
  
     'm_id'=>$this->input->post('m_id'),
  );

  $this->db->insert('lms_course',$data);
return false;
 }

 public function getAllGroups()
    {
      

        $query = $this->db->query('SELECT *  FROM lms_package_module');


        return $query->result();

        //echo 'Total Results: ' . $query->num_rows();
    }

  public function courses_report()
  {
      $query = $this->db->get('lms_course');
      return $query->result_array();
  }
}
?>