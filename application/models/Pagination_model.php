<?php
class Pagination_Model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        //$this->load->database();
    }
    
    /*
     * Count All Users And Return Total rows count of users table
     */
    public function users_count() {
        $this->db->from('lms_package_module');
        $count = $this->db->count_all_results();
        return $count;
    }
    
    
    public function getAllUsers($start=0,$perpage=1) 
    {
        $this->db->select("*");
        $this->db->from("lms_package_module");
        $this->db->limit($perpage,$start);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }
    
}