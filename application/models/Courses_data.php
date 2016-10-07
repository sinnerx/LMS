<?php 

Class Courses_data extends CI_Model
{

 public function courses($data)
   {

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

  public function getAllTypes($id = null)
  {
      $this->db->select("*");
      //$this->db->from("training_type");

      if($id)
        $this->db->where("trainingTypeID", $id);

      $query = $this->db->get('training_type');

      return $query->result();
  }

  public function getSubTypes($parentId)
  {
      //var_dump($parentId);
      $this->db->select("trainingSubTypeID as subTypeID,trainingSubTypeName as subTypeName");
      $this->db->where("trainingSubTypeParent", $parentId);
      $query = $this->db->get('training_subtype');
      //var_dump($query->result_array());
      return $query->result_array();
  }
}
?>