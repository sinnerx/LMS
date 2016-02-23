<?php 

Class Reporting_model extends CI_Model
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


public function get_list_site($q){
    $this->db->select('siteID, siteName');
    $this->db->like('siteName', $q);
    $query = $this->db->get('site');
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['siteName']));
        $new_row['value']=htmlentities(stripslashes($row['siteID']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }

  public function get_list_user($q){
    $this->db->select('user.userID, userProfileFullName AS userName');
    $this->db->like('userProfileFullName', $q);
    $this->db->join('user_profile', 'user.UserID = user_profile.userID');
    $this->db->where('user.userLevel', '1');
    $query = $this->db->get('user');

    //print_r($query);
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['userName']));
        $new_row['value']=htmlentities(stripslashes($row['userID']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }  

  public function get_list_module($q){
    //print_r("abc");
    $this->db->select('id, name');
    $this->db->like('name', $q);
    $query = $this->db->get('lms_module');
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['name']));
        $new_row['value']=htmlentities(stripslashes($row['id']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }   
  }


  public function getClusterByUserID($id){
    //echo $id;
    $this->db->select("cluster_lead.clusterID, clusterName");
    $this->db->where('cluster_lead.userID', $id);
    $this->db->join('cluster','cluster_lead.clusterID = cluster.clusterID');
    $result = $this->db->get('cluster_lead');

    //$result = $result->result_array();
      $return = array();
      $x = 0;
      foreach($result->result_array() as $row) {
        //$return[$x][$row['clusterID']] = $row['clusterName'];
        $return[$row['clusterID']] = $row['clusterName'];
        $x++;
      }    
    //$result = $result->id;
      //$this->db->stop_cache();
      //$this->db->flush_cache();
    return $return;
       // return 'abc';
  }

  public function get_cluster($regionid = null)
    {
      //$this->db->from('city');
      $this->db->select('clusterID, clusterName');
      //$this->db->order_by('clusterName');

      if($regionid == 2){
        $arrayCluster = array('5', '6');
      }
      else if ($regionid == 3){
        $arrayCluster = array('1', '2', '3', '4');        
      }
      else
        $arrayCluster = array('1', '2', '3', '4', '5', '6');  

      $this->db->where_in('clusterID', $arrayCluster);
      $result = $this->db->get('cluster');
      $return = array();
      $x = 0;
      if($result->num_rows() > 0) {
        $return[''] = 'No Cluster';
      foreach($result->result_array() as $row) {
        //$return[$x][$row['clusterID']] = $row['clusterName'];
        $return[$row['clusterID']] = $row['clusterName'];
        $x++;
      }

    }  
    //return $result;
    return $return;
  }

  public function get_list_package(){
      $this->db->select('packageid, name');
      $result = $this->db->get('lms_package');
      $return = array();
      $x = 0;
      if($result->num_rows() > 0) {
        $return[''] = 'No Package';      
        foreach($result->result_array() as $row) {
          //$return[$x][$row['clusterID']] = $row['clusterName'];
          $return[$row['packageid']] = $row['name'];
          $x++;
        }
      }    
    //$result = $result->id;
      //$this->db->stop_cache();
      //$this->db->flush_cache();
    return $return;

  }

  // public function get_packageFrom_LMS_Result(){
  //     $this->db->where('status', '1');
  //     $this->db->order_by('id', 'desc');
  //     $this->db->group_by('userid');
  //     $this->db->get('lms_result');

  //     $queryresultUser = $this->db->result();

  //     $this->db->



  // }

  public function get_list_result($getdata)
  {
      // $this->db->join("lms_module as M", "M.id = R.moduleid");
      // $this->db->join("user as U", "U.userid = R.userid");
      // $this->db->join("user_profile as UP", "UP.userID = U.userid");
      // //$this->db->join("lms_package_module LPM", "M.id = R.moduleid");
      // //$this->db->join("lms_package P", "M.");
      // $this->db->where('R.status', '1');

      // $get = $this->db->get('lms_result as R');
      // $query = $get->result_array();
      // //print_r($query);
      // //die;

      // return $query;

      //query 1
//       $this->db->select("U.userid, userprofilefullname, T.trainingid, M.name, P.name, BTI.billingitemid, R.status");

//       $this->db->from("user U");

//       $this->db->join("user_Profile UP","UP.userID = U.userID");
//       $this->db->join("activity_user AU","au.userid = U.userid");
//       $this->db->join("training T ","T.activityID = au.activityID");
//       $this->db->join("training_lms TL ","TL.trainingID = T.trainingID");
//       $this->db->join("lms_module M ","M.id = TL.packageModuleID", "RIGHT OUTER");
//       $this->db->join("lms_package_Module  LP ","M.id = LP.moduleid", "RIGHT OUTER");
//       $this->db->join("lms_package P ","P.packageID = LP.packageid", "RIGHT OUTER");

//       $this->db->join("billing_item BI ","BI.billingItemID = P.billing_item_id", "LEFT OUTER");
//       $this->db->join("billing_transaction_item BTI","BTI.billingitemid = BI.billingitemid", "LEFT OUTER");
//       $this->db->join("lms_result R","R.userid = user.userid AND R.moduleid = M.id AND R.status = 1", "LEFT OUTER");

//       //$this->db->get();
//       $subQuery1 = $this->db->_compile_select();
//       //$this->db->get()->result();

//       //print_r($subQuery1);
//       //die;
//       //$this->db->_reset_select();

//       //query2
//       $this->db->select("U.userid, userprofilefullname, T.trainingid, M.name, P.name, BTI.billingitemid, R.status");

//       $this->db->from("U");

//       $this->db->join("user_Profile UP","UP.userID = U.userID");
//       $this->db->join("activity_user AU","au.userid = U.userid");
//       $this->db->join("training T ","T.activityID = au.activityID");
//       $this->db->join("training_lms TL ","TL.trainingID = T.trainingID");
//       $this->db->join("lms_module M ","M.id = TL.packageModuleID", "LEFT OUTER");
//       $this->db->join("lms_package_Module  LP ","M.id = LP.moduleid", "LEFT OUTER");
//       $this->db->join("lms_package P ","P.packageID = LP.packageid", "LEFT OUTER");

//       $this->db->join("billing_item BI ","BI.billingItemID = P.billing_item_id", "RIGHT OUTER");
//       $this->db->join("billing_transaction_item BTI","BTI.billingitemid = BI.billingitemid", "RIGHT OUTER");
//       $this->db->join("lms_result R"," R.userid = user.userid AND R.moduleid = M.id AND R.status = 1");
// //      $this->db->get();
//       $subQuery2 = $this->db->_compile_select();

      //$this->db->_reset_select();

      //combine query
      // $this->db->from("($subQuery1 UNION $subQuery2)");
      //print_r($getdata['testresult']);
      //die;
      $sqlwhere = " WHERE 1 = 1 ";

      // if($getdata['participant']){
      //     if($getdata['participant'] == 1){
      //       $listofuser = '';
      //       //$listofpackage = ;

      //       $sqlwhere .= " SM.userid IN (" . $listofuser . ")";
      //     }
      //     else if($getdata['participant'] == 2){
      //       $listofuser = ;
      //       $listofpackage = ;

      //       $sqlwhere .= " SM.userid IN (" . $listofuser . ") AND LP.packageid IN (". $listofpackage .") ";
      //     }
      // }

      if($getdata['testresult']){
          if($getdata['testresult'] == 1)
            $sqlwhere .= " AND R.status = 1 ";
          else if ($getdata['testresult'] == 2)
            $sqlwhere .='';
            //$sqlwhere .= " AND R.status = 0";
      }

      if($getdata['payment']){
          if($getdata['payment'] == 1){
              //$sqlwhere .=" AND BTU.billingTransactionUserID <> '' ";
              $sqlwhere .= "";
          }
            
          else if ($getdata['payment'] == 2)
            $sqlwhere .=" AND BTU.billingTransactionUserID is NULL ";
      }

      if($getdata['package']){
          $sqlwhere .= " AND LP.packageid = ". $getdata['package'] ." ";
      }      
      
      if($getdata['moduleid']){
          $sqlwhere .= " AND LP.moduleid = ". $getdata['moduleid'] ." ";
      }

      if($getdata['cluster']){
          $sqlwhere .= " AND CS.clusterid = ". $getdata['cluster'] ." ";
      }

      if($getdata['siteid']){
          $sqlwhere .= " AND CS.siteid = ". $getdata['siteid'] ." ";
      }

      if($getdata['memberid']){
          $sqlwhere .= " AND SM.userid = ". $getdata['memberid'] ." ";
      } 

      if ($getdata['region'] != ''){
            $regionid = $getdata['region'];
          if($regionid == 2){
            $arrayCluster = array('5', '6');
          }
          else if ($regionid == 3){
            $arrayCluster = array('1', '2', '3', '4');        
          }
          else
            $arrayCluster = array('1', '2', '3', '4', '5', '6');  

          $arrayCluster = implode($arrayCluster,",");
          //$this->db->join('cluster AS c', 'c.clusterID = att_attendancedetails.clusterID');
          //$this->db->where_in('att_attendancedetails.clusterID', $arrayCluster);
          $sqlwhere .= " AND CS.clusterid IN (" . $arrayCluster .")";

        }//if region                           
      //if($getdata['']){
          //$sqlwhere .= " AND LP.packageid = 1 ";
      //}
      

      $sql = '
            (SELECT user.userid, userprofilefullname as username, S.sitename as Pi1M, C.clustername as Cluster, T.trainingid, M.name as ModuleName, P.name as PackageName, BTU.billingTransactionUserID, R.status
            FROM user
            JOIN site_member SM ON sm.userId = user.userid 
            JOIN site S ON S.siteid = SM.siteid
            JOIN cluster_site CS ON cs.siteID = sm.siteid
            JOIN cluster C ON C.clusterID = CS.clusterid
            JOIN user_Profile up ON up.userID = user.userID
            JOIN activity_user au on au.userid = user.userid
            JOIN training T ON T.activityID = au.activityID
            JOIN training_lms TL ON TL.trainingID = T.trainingID

            RIGHT OUTER JOIN lms_module M ON M.id = TL.packageModuleID
            RIGHT OUTER JOIN lms_package_Module  LP ON M.id = LP.moduleid
            RIGHT OUTER JOIN lms_package P ON P.packageID = LP.packageid

            LEFT OUTER JOIN billing_item BI ON BI.`billingItemID` = P.billing_item_id
            LEFT OUTER JOIN billing_transaction_item BTI ON BTI.billingitemid = BI.billingitemid
            LEFT OUTER JOIN billing_transaction BT ON BT.billingTransactionID = BTI.billingTransactionID
            LEFT OUTER JOIN billing_transaction_user BTU ON BTU.billingTransactionID = BT.billingTransactionID AND BTU.billingTransactionUser = user.userid

            LEFT JOIN lms_result R ON R.userid = user.userid AND R.moduleid = M.id  AND R.status = 1
            ' . $sqlwhere . '
            )';


            // UNION 
            // (SELECT user.userid, userprofilefullname as username, S.sitename as Pi1M, C.clustername as Cluster, T.trainingid, M.name as ModuleName, P.name as PackageName, BTU.billingTransactionUserID, R.status
            // FROM user
            // JOIN site_member SM ON sm.userId = user.userid 
            // JOIN site S ON S.siteid = SM.siteid
            // JOIN cluster_site CS ON cs.siteID = sm.siteid
            // JOIN cluster C ON C.clusterID = CS.clusterid
            // JOIN user_Profile up ON up.userID = user.userID
            // JOIN activity_user au on au.userid = user.userid
            // JOIN training T ON T.activityID = au.activityID
            // JOIN training_lms TL ON TL.trainingID = T.trainingID

            // LEFT OUTER JOIN lms_module M ON M.id = TL.packageModuleID
            // LEFT OUTER JOIN lms_package_Module  LP ON M.id = LP.moduleid
            // LEFT OUTER JOIN lms_package P ON P.packageID = LP.packageid

            // RIGHT OUTER JOIN billing_item BI ON BI.`billingItemID` = P.billing_item_id
            // RIGHT OUTER JOIN billing_transaction_item BTI ON BTI.billingitemid = BI.billingitemid
            // RIGHT OUTER JOIN billing_transaction BT ON BT.billingTransactionID = BTI.billingTransactionID
            // RIGHT OUTER JOIN billing_transaction_user BTU ON BTU.billingTransactionID = BT.billingTransactionID AND BTU.billingTransactionUser = user.userid

            // JOIN lms_result R ON R.userid = user.userid AND R.moduleid = M.id AND R.status = 1
            // ' . $sqlwhere . '
            // )';

      //print_r($sql);
      //die;
      //$ci=& get_instance();

      //print($db['default']['hostname']);
      //print($this->db->hostname);
      //die;
      $con=mysqli_connect($this->db->hostname,$this->db->username,$this->db->password,$this->db->database);
      // Check connection
      if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

      // Perform queries 
      $test = mysqli_query($con,$sql);

      while ($row = mysqli_fetch_array($test))
          {
            $data[] = $row;
          }      
      mysqli_close($con);


      //print_r($data);
      //die;

      return $data;
  }  
}
?>