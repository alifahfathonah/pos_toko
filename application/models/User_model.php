
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $table = 'sidebar';
    $query = $this->db->query("SELECT * FROM sidebar where sidebar_level = 1;");
  }
   function select_user_list($branch)
  {
    echo $branch;
    $query = $this->db->query("SELECT a.*, b.user_type_name FROM user a
                               LEFT JOIN user_type b on b.user_type_id = a.user_type
                               $branch");
    return $query;
  }
}
 ?>
