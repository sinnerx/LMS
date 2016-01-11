<?php

Class User extends CI_Model
{

 function login($username, $password)
 {
   $this -> db -> select('id_user, nm_user, tx_password');
   $this -> db -> from('DD_USERS');
   $this -> db -> where('nm_user', $username);
   //$this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 public function register()
 {
  $data=array(
    'id_user'=>$this->input->post('username'),
    'email'=>$this->input->post('email'),
    'tx_password'=>md5($this->input->post('password'))
  );
  $this->db->insert('DD_USERS',$data);

  return false;
 }

}

?>