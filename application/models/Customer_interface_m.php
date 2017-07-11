<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_interface_m extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_lapangan($id)
  {

    $this->db->select('buildings.*, status_buildings.*');
    $this->db->from('buildings');
    $this->db->join('status_buildings', 'status_buildings.status_building_id = buildings.building_status', 'left');
    $this->db->where('buildings.branch', $id);

    $query = $this->db->get();
    return $query;
  }

  function cek_login($table, $where){
    $query = $this->db->get_where($table,$where);
    return $query;
  }

}
