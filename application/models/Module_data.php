<?php 

Class Module_data extends CI_Model
{

 public function modules()
 {
   $packageid= $this->input->post('packageid');
   print_r($packageid);
  foreach ($_POST as $key => $value) {   
      
        if (strpos($key,'moduleid') !== false) {

            $array_mod = array(
                'packageid' => $packageid,
                'moduleid' => $value,
                
              );

            $this->db->insert('lms_package_module', $array_mod);
        }

        }

 }

  public function package_report()
  {
      $query = $this->db->get('lms_package_module');
      return $query->result_array();
  }


  public function getAllGroups()
    {
    $query = $this->db->query('SELECT *  FROM lms_package');
    return $query->result();
    }

    public function getAllGroup()
    {
    $query = $this->db->query('SELECT *  FROM lms_module');
    return $query->result();
    }


   public function packageids($packageid)
  { 
    $this->db->select('lms_package.name as package_name,lms_module.name as module_name,lms_package.packageid,lms_module.id');
    $this->db->from('lms_package_module');
    $this->db->join('lms_module','lms_module.id = '. $this->table .'.moduleid');
    $this->db->join('lms_package','lms_package.packageid = '. $this->table .'.packageid');
    $this->db->where('lms_package.packageid',$packageid);
    $query = $this->db->get();
    return $query->result_array();
     // $query = $this->db->get_where('lms_package_module',array('id' => $id));
     // return $query->row_array();
  }
}
?>