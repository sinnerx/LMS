<?php 

Class Questions_data extends CI_Model
{

 public function questions($data)
 {

      //get code
      $code = $data['code'];
 
    //insert new question
    $data = array(
    'q_id' => $this->input->post('q_id'),
    'id' => $this->input->post('id'),
    'type' => $this->input->post('type'),
    'q_text' => $this->input->post('q_text'),
    'correct' => $this->input->post('correct')
     );

    $this->db->insert('lms_questions_bank',$data);
    $correct = $this->input->post('correct');
    $questID = $this->db->insert_id();

    $q_img_empty = $_FILES['input_q_img1']['name'];

    $config['upload_path'] = FCPATH. '/assets/uploads/tmp';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);

    if($q_img_empty!==""){
     //upload question image
      
        if (!is_dir(FCPATH. 'assets/uploads/tmp'))
        {
            mkdir(FCPATH. 'assets/uploads/tmp', 0777, true);
        }     


         //$this->upload->do_upload('input_q_img1');
         if (!$this->upload->do_upload('input_q_img1')):
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
            else:
              //var_dump("success!");
          endif;

         $data_upload_files = $this->upload->data();
    //relocate image file
    $arrayFileRelocate = array(
              'imgPath'     => $data_upload_files['file_name'],
              'code'      => $code,
              'questID'     => $questID,
              'answerID'    => ''
            );

    $questImagePath = $this->relocateImageFile($arrayFileRelocate); 
    //update question with new img path
    $imgData = array(
                'imgPath' => $questImagePath,
                'questionID' => $questID
              );
    $this->update_image_path($imgData);
    }



/*$config['upload_path'] = FCPATH. '/assets/uploads';
$config['allowed_types'] = 'gif|jpg|png|jpeg';
 $this->load->library('upload', $config);*/
 

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
            preg_match_all('!\d+!', $key, $fileNo);
            
            $a_file ='input_a_img'. $fileNo[0][0];

           // var_dump($onefile);
            //die();
            //var_dump($this->upload->do_upload( 'input_a_img'. $fileNo[0][0] ));
 //die();

            //if(strpos($key,'input_a_img') !== false){

          

        if (!is_dir(FCPATH. 'assets/uploads'))
        {
            mkdir(FCPATH. 'assets/uploads', 0777, true);
        }     

         if (!$this->upload->do_upload($a_file)):
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
            else:
              //var_dump("success!");
          endif;

        $a_img_upload = $this->upload->data();

         //$image = $data_upload_files[full_path];

         //$image = $imgPath.'/'.$data_upload_files[file_name];

        //}




            $array_ans = array(
                'q_id' => $questID,
                'a_text' => $value
                //'a_img_path' => $image
                //'correct' => $correct[$i],
              );
            //print_r($array_ans);

            $this->db->insert('lms_answer', $array_ans);

            $answerID = $this->db->insert_id();

            //relocate image file
    $a_img_relocate = array(
              'imgPath'     => $a_img_upload['file_name'],
              'code'      => $code,
              'questID'     => $questID,
              'answerID'    => $answerID
            );

    $ansImagePath = $this->relocateImageFile($a_img_relocate); 
    //update question with new img path
    $a_imgData = array(
                'img_path' => $ansImagePath,
                'answerID' => $answerID
              );
    $this->update_a_image_path($a_imgData);


  

        }
      }

    }
     
function add_posto($data){
           
  $last_row=$this->db->select('q_id')->order_by('q_id',"desc")->limit(1)->get('lms_questions_bank');
  return $last_row->row();
  print_r($last_row);
        }



//relocate file


    public function relocateImageFile($data){

    $imgPath  = $data['imgPath'];
    $code     = $data['code'];
    $questID  = $data['questID'];
    $data['answerID'] != '' ? $answerID = 'A'. $data['answerID'] : $answerID = '';

    $filename = FCPATH. 'assets/uploads/tmp/' . $imgPath;

    if (file_exists($filename)) {
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if (!is_dir(FCPATH. 'assets/uploads/'. $code))
          {
              mkdir(FCPATH. 'assets/uploads/'. $code, 0777, true);
          }           

      $newImagePath = FCPATH . 'assets/uploads/' . $code . '/' . 'Q' . $questID . $answerID .'.' . $ext;
      rename(FCPATH. 'assets/uploads/tmp/'. $imgPath , $newImagePath);
      $finalImagePath = $code . '/' . 'Q' . $questID . $answerID . '.' . $ext;
    }
    else {
      $finalImagePath = "";
    }

    return $finalImagePath;

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

  public function insert_question($data)
  {
    $this->db->insert('lms_questions_bank',$data);
    $questID = $this->db->insert_id();
    return $questID;
  }

  public function update_correct_answer($data)
  {
    $this->db->set('correct', $data['correctAnswerID']);
    $this->db->where('q_id', $data['questionID']);
    $this->db->update('lms_questions_bank');
  }

  public function update_image_path($data)
  {
    $this->db->set('img_path', $data['imgPath']);
    $this->db->where('q_id', $data['questionID']);
    $this->db->update('lms_questions_bank');    
  }

   public function update_a_image_path($data)
  {
    $this->db->set('a_img_path', $data['img_path']);
    $this->db->where('a_id', $data['answerID']);
    $this->db->update('lms_answer');    
  }
}
?>