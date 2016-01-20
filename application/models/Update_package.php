<?php

Class Update_package extends CI_Model
{

 function update_pac($packageid,$data)
 {
    $this->db->where('packageid', $packageid);
    $this->db->update('lms_package', $data); 
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