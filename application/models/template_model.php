<?php
defined ('BASEPATH') OR exit ('No direct access allowed!');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class template_model extends CI_Model {
    
    //construct
    public function __construct() {
        parent::__construct();

    }
     public function getFullName($userid){
       $query = $this->db->query("SELECT userProfileFullName FROM user_profile WHERE userID ='$userid'");
        foreach ($query->result() as $row)
        {
                //return user fullname to view
               return $row->userProfileFullName;
        }
    }
    public function getUserLevel($userLevel){
       /*if($userLevel == 2){
           
           return $userPos = "Site Manager";
       } else {
           
           echo "Administrator";
       }*/
    }
    public function getClusterName ($userid){
        //retrieve clustername (siteName)
        $query = $this->db->query("SELECT siteName FROM site JOIN site_manager WHERE userID ='$userid' AND site.siteID = site_manager.siteID");
        foreach ($query->result() as $row)
        {
               //return cluster name/siteName to view
               return $row->siteName;
        }
    }
    /*public function getSiteName($userid){
       $query = $this->db->query("SELECT siteName FROM site WHERE siteID ='$userid'");
       //$query = $this->db->select('userProfileFullName')->from('user_profile')->where('userID ='$userid'');
               //var_dump($userid);
        foreach ($query->result() as $row)
        {
                //test get
                echo "cluster:".$row->siteName;
                
        }
    }*/
   
    /*public function viewAttendance($userid){
        
        
    }*/
}
