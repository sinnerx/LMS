<?php 

Class Questions_data extends CI_Model
{

 public function questions($data)
 {
 
    
    $this->db->insert('lms_questions_bank',$data);
    $correct = $this->input->post('correct');
    $questID = $this->db->insert_id();
 
      foreach ($_POST as $key => $value) {   
      
        if (strpos($key,'a_text') !== false) {

           $row_count = count($correct);

            //for ($i=0; $i < $row_count; $i++) { 
            // if ($correct == '1'){
            //   //$correctradio = $this->input->post('correct');
            //   $correct = '1';
            // }
            // else {
            //   $correct = '0';
            // }
            //print_r($row_count);
            $array_ans = array(
                'q_id' => $questID,
                'a_text' => $value,
                //'correct' => $correct[$i],
              );
            //print_r($array_ans);

            $this->db->insert('lms_answer', $array_ans);
        //}

        }
      }
     
   // $a_text1[] = array();
   //  foreach($_POST['a_text1'] as $a_text1)
   //    {
   //    $a_text1['q_id'] = $this->db->insert_id();
   //    $this->db->insert('answer', $a_text1);
   //    print_r($a_text1);
   //    }
   /* $a_text1 = array(
    'a_text'=>$this->input->post('a_text'),  
    );
      $a_text1['q_id'] = $this->db->insert_id();
      $this->db->insert('answer', $a_text1);
      print_r($a_text1);



    /*$data1 = array(
     'q_id' => $this->input->post('q_id'), 
    'a_text' => $_POST['a_text']
    );

    $data1['q_id'] = $this->db->insert_id();
    $this->db->insert('answer', $data1);
    print_r($data1);*/




    
  }

public function getAllGroups()
    {
      

        $query = $this->db->query('SELECT *  FROM lms_course');


        return $query->result();

        //echo 'Total Results: ' . $query->num_rows();
    }

  public function questions_report()
  {
      $query = $this->db->get('lms_questions_bank');
      return $query->result_array();
  }
}
?>