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

          // $row_count = count($correct);

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
  

        }
      }
    }
     
function add_posto($data){
           
  $last_row=$this->db->select('q_id')->order_by('q_id',"desc")->limit(1)->get('lms_questions_bank');
  return $last_row->row();
  print_r($last_row);
        }




    
  

  public function getLastInserted() {

    $results = array();
    $query ="SELECT * from lms_answer where q_id = $value";

    $query = $this->db->get();

    if($query->num_rows() > 0) {
        $results = $query->result();
    }
    return $query->$results;
// $query ="SELECT * from lms_answer where q_id = LAST_INSERT_ID()";


// return $query; //line 69
       }

public function getAllGroups()
    {
      

        $query = $this->db->query('SELECT *  FROM lms_module');


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