<?php
Class Users extends CI_Model
{
 function login($userEmail, $post_password)
 {
   $this ->db->select('userID,userEmail,userPassword');
   $this ->db->from('user');
   $this ->db->where('userEmail', $userEmail);
   $this ->db->where('userPassword', $post_password);
   $this ->db->limit(1);
   $query = $this->db-> get();
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

}












?>
