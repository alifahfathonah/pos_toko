<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_m extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function selectCode($select = NULL, $table = NULL, $join = NULL, $where = NULL, $where2 = NULL, $like = NULL, $order = NULL, $limit = NULL)
  {
    $this->db->select($select);
    $this->db->from($table);
    if ($join) {
        for ($i=0; $i<sizeof($join['data']) ; $i++) {
            $this->db->join($join['data'][$i]['table'],$join['data'][$i]['join'],$join['data'][$i]['type']);
        }
    }
    if ($where) {
        for ($i=0; $i<sizeof($where['data']) ; $i++) {
            $this->db->where($where['data'][$i]['column'],$where['data'][$i]['param']);
        }
    }
    if ($where2) {
        $this->db->where($where2);
    }

    if ($like) {
        for ($i=0; $i<sizeof($like['data']) ; $i++) {
            $this->db->like('CONCAT_WS(" ", '.$like['data'][$i]['column'].')',$like['data'][$i]['param']);
        }
    }
    if ($limit) {
        $this->db->limit($limit['finish'],$limit['start']);
    }
    if ($order) {
        for ($i=0; $i<sizeof($order['data']) ; $i++) {
            $this->db->order_by($order['data'][$i]['column'], $order['data'][$i]['type']);
        }
    }

    $query = $this->db->get();
    // echo $this->db->last_query();
    if($query->num_rows() > 0)
        return $query;
    else
        return false;
  }
}
