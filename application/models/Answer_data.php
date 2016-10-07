<?php 

Class Answer_data extends CI_Model
{

 public function answers()
 {
  $data=array(
    
    'q_id'=>$this->input->post('q_id'),
    'a_text'=>$this->input->post('a_text'),
);

  $this->db->insert('lms_answer',$data);
  
    if($data == true )
            {
            echo "<script> alert('Insert Successful.')</script>";
            echo "<script>location.href='insert/?';</script>";
            }
           else
           {
            echo "<script> alert('Insert Failed')</script>";
          } 
 }

  public function answer_report()
  {
      $query = $this->db->get('lms_answer');
      return $query->result_array();
  }

  public function insert_answer($data)
  {
      $this->db->insert('lms_answer',$data);
      $answerID = $this->db->insert_id();
      return $answerID;
  }

  public function update_image_path($data)
  {
    $this->db->set('a_img_path', $data['imgPath']);
    $this->db->where('a_id', $data['answerID']);
    $this->db->update('lms_answer');    
  }  
}
?>