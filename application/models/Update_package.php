<?php

Class Update_package extends CI_Model
{

 function update_pac($m_id,$data)
 {
    $this->db->where('m_id', $m_id);
    $this->db->update('package_module', $data); 
if($data == true )
            {
            echo "<script> alert('Success')</script>";
            
            }
           else
           {
            echo "<script> alert('Update Failed')</script>";
          } 
 }

 
}

?>