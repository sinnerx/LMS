<?php

Class Moduledata extends CI_Model
{
var $table = 'lms_package_module';
var $column = array('lms_package.name','lms_module.name');
var $order = array('lms_package_module.id' => 'asc');

  public function __construct()
  {
        parent::__construct();

    $this->load->database();
  }

  public function module()
  {
    
      $query = $this->db->get('lms_package_module');
      return $query->result_array();
  }

public function packageid($packageid)
  { 
    $this->db->select('lms_package.packageid as a,lms_package.name, lms_package_module.packageid as b');
    $this->db->from('lms_package');
    //$this->db->join('lms_module','lms_module.id = lmmoduleid');
    $this->db->join('lms_package_module','lms_package.packageid = lms_package.packageid');
    $this->db->where('lms_package.packageid',$packageid);
    $query = $this->db->get();
    return $query->row_array();
     // $query = $this->db->get_where('lms_package_module',array('id' => $id));
     // return $query->row_array();
  }

  // public function id($id)
  // { 
  //   $this->db->select('*');
  //   $this->db->from('lms_package_module');
  //   $this->db->join('lms_module','lms_module.id = '. $this->table .'.moduleid');
  //   $this->db->join('lms_package','lms_package.packageid = '. $this->table .'.packageid');
  //   $this->db->where('lms_package_module.id',$id);
  //   $query = $this->db->get();
  //   return $query->row_array();
  //    // $query = $this->db->get_where('lms_package_module',array('id' => $id));
  //    // return $query->row_array();
  // }

  public function packageids($packageid)
  { 
    $this->db->select('lms_package.name as package_name,lms_module.name as module_name,lms_package.packageid,lms_module.id');
    $this->db->from('lms_package_module');
    $this->db->join('lms_module','lms_module.id = '. $this->table .'.moduleid');
    $this->db->join('lms_package','lms_package.packageid = '. $this->table .'.packageid');
    $this->db->where('lms_package.packageid',$packageid);
    $query = $this->db->get();
    return $query->result_array();
     // $query = $this->db->get_where('lms_package_module',array('id' => $id));
     // return $query->row_array();
  }

  public function packageidst()
  { 
    $this->db->select('*');
    $this->db->from('lms_module');
    $query = $this->db->get();
    return $query->result_array();
     // $query = $this->db->get_where('lms_package_module',array('id' => $id));
     // return $query->row_array();
  }


  // public function ids($id)
  // { 
  //   $this->db->select('lms_package.name as package_name,lms_module.name as module_name,lms_package.packageid,lms_module.id');
  //   $this->db->from('lms_package_module');
  //   $this->db->join('lms_module','lms_module.id = '. $this->table .'.moduleid');
  //   $this->db->join('lms_package','lms_package.packageid = '. $this->table .'.packageid');
  //   $this->db->where('lms_package_module.id',$id);
  //   $query = $this->db->get();
  //   return $query->result_array();
  //    // $query = $this->db->get_where('lms_package_module',array('id' => $id));
  //    // return $query->row_array();
  // }

  public function getAllGroups()
    {
      

        $query = $this->db->query('SELECT *  FROM lms_package_module a, lms_module b where a.moduleid=b.id');


        return $query->result();

        //echo 'Total Results: ' . $query->num_rows();
    }

  private function _get_datatables_query()
  {
    
    $this->db->from($this->table);
    $this->db->join('lms_module','lms_module.id = '. $this->table .'.moduleid');
    $this->db->join('lms_package','lms_package.packageid = '. $this->table .'.packageid');
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

//alan
private function _get_datatables_query_ALAN()
  {
    $this->db->select ('lms_package_module.id as no, lms_package.name as package_name,lms_module.name as module_name,lms_package.packageid as ni,lms_module.id');
    $this->db->from($this->table);
    $this->db->join('lms_module','lms_package_module.moduleid=lms_module.id');
    $this->db->join('lms_package','lms_package_module.packageid=lms_package.packageid');

     $i = 0;
  
    // foreach ($this->column as $item) // loop column 
    // {
    //   if($_POST['search']['value']) // if datatable send POST for search
    //   {
        
    //     if($i===0) // first loop
    //     {
    //       $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
    //       $this->db->like($item, $_POST['search']['value']);
    //     }
    //     else
    //     {
    //       $this->db->or_like($item, $_POST['search']['value']);
    //     }

    //     if(count($this->column) - 1 == $i) //last loop
    //       $this->db->group_end(); //close bracket
    //   }
    //   $column[$i] = $item; // set column array variable to order processing
    //   $i++;
    // }
    
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
    //$this->_get_datatables_query();
    //alan
    $this->_get_datatables_query_ALAN();
    //alan
    // if($_POST['length'] != -1)
    // $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();

    //alan
    //var_dump($this->db->last_query());
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

  public function get_by_id($packageid)
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

  public function delete_by_id($packageid)
  {
    $this->db->where('id', $packageid);
    $this->db->delete($this->table);
  }

  

  } ?>