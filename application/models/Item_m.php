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
    $query = $this->db->query("SELECT a.item_name, b.*, c.satuan_name, d.satuan_name AS satuan_utama FROM items a
                                LEFT JOIN item_konversi b ON b.item_id = a.item_id
                                LEFT JOIN satuan c ON c.satuan_id =	b.item_satuan
                                LEFT JOIN (
                                	SELECT b.satuan_name, a.item_id FROM items a
                                	LEFT JOIN satuan b ON b.satuan_id = a.item_satuan
                                	) AS d ON d.item_id = a.item_id
                                WHERE a.item_id = '".$item_id."'");                            
    return $query;
  }

}
