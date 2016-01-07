<?php

Class coursedata extends CI_Model
{
 var $table = 'lms_course';
  var $column = array('id','courseID','Topics','Descr'); //set column field database for order and search
  var $order = array('id' => 'asc');
  public function __construct()
  {
    $this->load->database();
  }

  // DD Report

  public function course()
  {

    $this->db->select('lms_package_module.Name,lms_course.Topics,course.id,lms_course.courseID,lms_course.Descr,course.m_id');
    $this->db->from('lms_course');
    $this->db->join('lms_package_module','lms_package_module.m_id = lms_course.m_id'); 
    $query = $this->db->get();
    return $query->result_array();
      //$query = $this->db->get('course');
      //return $query->result_array();
  }


  public function id($id)
  {
      $query = $this->db->get_where('lms_course',array('id' => $id));
      return $query->row_array();
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

  public function get_by_id($id)
  {
    $this->db->from($this->table);
    $this->db->where('id',$id);
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

  public function delete_by_id($id)
  {
    $this->db->where('id', $id);
    $this->db->delete($this->table);
  }

  } ?>