<?php

Class Questiondata extends CI_Model
{
  var $table = 'lms_questions_bank';
  var $column = array('q_id','q_text','type'); //set column field database for order and search
  var $order = array('q_id' => 'asc');

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // DD Report

  public function question() //index view
  {
    
    $this->db->select('lms_questions_bank.q_text,lms_questions_bank.type,lms_course.Topics,lms_course.courseID,lms_questions_bank.q_id');
    $this->db->from('lms_questions_bank');
    $this->db->join('lms_course','lms_questions_bank.id = lms_course.id'); 
    $query = $this->db->get();
    return $query->result_array();

  
  }

  


  public function q_id($q_id)
  { 
       
    $this->db->select('*');
    $this->db->from('lms_questions_bank','lms_questions_bank.q_id = lms_answer.q_id');
    $this->db->join('lms_course','lms_course.id = lms_questions_bank.id');
   // $this->db->join('answer','answer.q_id = questions_bank.q_id'); 
    $this->db->where('lms_questions_bank.q_id',$q_id);
    $query = $this->db->get();
    return $query->row_array();
  }

public function q_ids($q_id)
{
    
$this->db->select('*');
    $this->db->from('lms_questions_bank','lms_questions_bank.q_id = lms_answer.q_id');
    $this->db->join('lms_course','lms_course.id = lms_questions_bank.id');
    $this->db->join('lms_answer','lms_answer.q_id = lms_questions_bank.q_id'); 
    $this->db->where('lms_questions_bank.q_id',$q_id);
    $query = $this->db->get();
    return $query->result_array();

    if($query == true )
    {
      echo "<script> alert('Delete Successful.')</script>";
      //echo "<script>location.href='index1.php?opt=editHardware';</script>";
    }
    else
    {
      echo "<script> alert('delete Not Successful.')</script>";
    }
  
  }




  private function _get_datatables_query()
  {
    
    $this->db->from($this->table);

    $i = 0;
  
    foreach ($this->column as $item) // loop column 
    {
      if($_POST['search']['value']) // if datatable send POST for search
      {
        
        if($i===0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
          $this->db->like($item, $_POST['search']['value']);
        }
        else
        {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if(count($this->column) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $column[$i] = $item; // set column array variable to order processing
      $i++;
    }
    
    if(isset($_POST['order'])) // here order processing
    {
      $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } 
    else if(isset($this->order))
    {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables()
  {
    $this->_get_datatables_query();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }

  public function get_by_id($q_id)
  {
    $this->db->from($this->table);
    $this->db->where('q_id',$q_id);
    $query = $this->db->get();

    return $query->row();
  }

  public function save($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  public function update($where, $data)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }

  public function delete_by_id($q_id)
  {
    $this->db->where('q_id', $q_id);
    $this->db->delete($this->table);
  }

  

  } ?>