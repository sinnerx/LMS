<?php 

Class Reporting extends CI_Model
{

 public function list_user()
 {
    $this->db->get('user U');
    $this->db->join('activity_user AU', 'AU.userid = U.userid');
    $this->db->join('training T', 'T.activityID = AU.activityID');
    $this->db->join('training_lms TLMS', 'TLMS.trainingID = T.trainingID');

 }

  public function answer_report()
  {
      $query = $this->db->get('lms_answer');
      return $query->result_array();
  }
}
?>