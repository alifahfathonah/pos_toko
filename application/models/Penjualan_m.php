<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_m extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function selectItemReady($i_barang, $i_branch){
    $query = $this->db->query("SELECT a.*, b.item_stock_id, b.item_id, b.item_stock_qty, b.branch_id FROM items a
                               LEFT JOIN (
                              	 SELECT a.item_stock_id, a.item_id, a.item_stock_qty, a.branch_id FROM item_stock a
                              	 WHERE a.branch_id = '$i_branch'
                               ) AS b ON b.item_id = a.item_id
                               WHERE a.item_id = '$i_barang'");
    return $query;
  }
}
