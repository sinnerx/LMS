<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginexam extends CI_Controller{

public function __construct() {
    parent::__construct();
   
   $this->load->model('users','',TRUE);
}

public function hashPassword($val,$salt = null)
{
    ## create a simple salt if salt isn't passed..
    $salt   = $salt?$salt:sha1($val.substr($val, 0,4));
    return md5($salt.$val);
}

function index()
{
   
    $userEmail = $this->input->post('userEmail');
    $userid = $this->input->post('userid');
    $packageid = $this->input->post('packageid');
    $moduleid = $this->input->post('moduleid');
    // var_dump($userid . $packageid);
    // die;
    //$userPassword = $this->input->post('userPassword');
   //$post_password = md5($this->input->post('userPassword', TRUE));
    $post_password = $this->hashPassword($this->input->post('userPassword', TRUE));

   //print_r($post_password);

      $this->db->where('userEmail', $this->input->post('userEmail'));
      $this->db->where('userPassword', $post_password);
      $result = $this->db->get('user');
      // var_dump($_SESSION['pop']['moduleid']);
      // die;
      // If we find a user output correct, else output wrong.
      if($result->num_rows() != 0)
      {
        header('location:quizs/enter');
      
      }
      else
      {
         // header('location:login?'.'moduleid='.$moduleid.'&packageid='.$packageid.'&userid='.$userid ); 
         $location =  'login?'.'moduleid='.$moduleid.'&packageid='.$packageid.'&userid='.$userid;
        $message = 'You have entered incorrect email or password of the manager ';

        echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$message');
        window.location.replace(\"$location\");
        </SCRIPT>";         
        
      }


    
    }
    
    
    

  //  $this->db->select('userID,userEmail,userPassword');
  // // $this->db->from('user');
  //  $this->db->where('userEmail', $userEmail);
  //  $this->db->where('userPassword', $post_password);
  //  $this->db->limit(1);
  //  $query = $this->db->get('user');
  //  //return $query->result();

  //  if($query->num_rows() == 1)
  //  {
  //    return $query->result();
  //    print_r('huuuu');
  //  }
  //  else
  //  {
  //    print_r('hye');
  //  }

   
     // function to the password.
//       $this->db->where('username', $this->input->post('username'));
//       $this->db->where('password', md5($this->input->post('password')));
//       $result = $this->db->get('users');
      
//       // If we find a user output correct, else output wrong.
//       if($result->num_rows() != 0)
//       {
//         echo 'Correct!';
//       }
//       else
//       {
//         echo 'Wrong!';  
        
//       }
    
//     }
    
//     $this->load->view('welcome_message');
//     }
    
// }

   // $query = $db->query("SELECT userID, userEmail, userPassword FROM user WHERE `userEmail`='$userEmail' AND `userPassword`=md5('$post_password')");
   //      $result = $query->num_rows(); 

   //      if ($result == 0)
   //      {
   //         header('location:login');
   //      }
   //      else 
   //      {
   //          // Session cookie creation goes here //
   //          return TRUE;
   //      }


//     $result = $this->users->login($userEmail, $post_password);
//     print_r($userEmail);
//     print_r($post_password);
//    if($result==FALSE)
//    {
     
//      header('location:login');
//    }
//    else
//    {
   
//     header('location:quizs/enter');
   

// }


}
 ?>