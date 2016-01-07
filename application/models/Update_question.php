<?php

Class Update_question extends CI_Model
{

 function update_que($q_id,$data)
 {
 	  
 	//print_r($data);

// $this->load->database();
//     // $this->db->set($data);
//     // $this->db->where('a.q_id', $q_id);
//     // $this->db->where('b.q_id', $q_id);
//     // $this->db->update('questions_bank as a, answer as b');
// // $this->db->set($data);
// //  	$this->db->where('b.q_id', $q_id);
// //     $this->db->where('a.q_id', $q_id);
// // $this->db->update('questions_bank as a, answer as b');

// $query_update = "UPDATE questions_bank as a, answer as b
//         SET a.q_id = $q_id, a.q_text = $q_text
//         WHERE a.q_id= $q_id and b.q_id= $q_id";


// $this->db->query($query_update);





/* 	$data = array(
                    'a.ED_FName' => $_POST['firstname'],
                    'a.ED_MName' => $_POST['middlename'],
                    'a.ED_LName' => $_POST['lastname'],
                    'a.ED_Location' => $_POST['location'],
                    'a.ED_Company' => $_POST['company'],
                    'b.EMD_Department' => $_POST['department']
                     );


$this->db->set($data);

$this->db->where('a.EmpID', $empID);

$this->db->where('b.EmpID', $empID);

$this->db->update('tbl_employeedetails as a, tbl_employeementdetails as b');*/
 }

 
}

?>