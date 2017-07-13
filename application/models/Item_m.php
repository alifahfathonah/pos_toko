<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_m extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function selectItemKonversi($item_id)
  {
    $query = $this->db->query("SELECT a.*, b.`item_name`, c.`satuan_name` AS satuan_konversi, d.`satuan_name` AS satuan_utama FROM item_konversi a
                               LEFT JOIN items b ON b.`item_id` = a.`item_id`
                               LEFT JOIN satuan c ON c.`satuan_id` = a.`item_satuan`
                               LEFT JOIN satuan d ON d.`satuan_id` = a.`item_satuan_utama`
                               WHERE a.item_id = '".$item_id."'");
    return $query;
  }

}
