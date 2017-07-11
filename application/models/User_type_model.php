<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_type_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function select_user_type_list()
 {
   $query = $this->db->query("SELECT * FROM user_type");
   return $query;
 }

 function select_permit_access($id)
 {
   $query = $this->db->query("SELECT a.*,(SELECT permit_access FROM permits b
                              WHERE b.sidebar = a.sidebar_id AND b.user_type = '$id') AS permit_access
                              FROM sidebar a WHERE sidebar_level = 2");
   return $query;
 }
}
