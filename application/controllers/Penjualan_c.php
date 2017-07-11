<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_c extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Penjualan_m');
  }

    function index()
    {
      $this->get_header();
      $this->penjualan_form();
      $this->get_footer();
    }
// ./assets/img/items/
  function penjualan_form(){
    $where = '';
    $data = array(
      'tanggal'     => Date("d/m/Y"),
      'items'       => $this->select_config('items', '')
   );
    $this->load->view('transaksi/penjualan/penjualan_v', $data);
  }

  function item_detail(){
    $i_item_id = $this->input->post('i_item_id');
    $where_item_id = "where item_id = '$i_item_id'";
    $query = $this->select_config('items', $where_item_id)->row();

    $data = array(
                  'item_id'         => $query->item_id,
                  'item_name'       => $query->item_name,
                  'item_img'        => $query->item_img,
                  'item_harga_jual' => $query->item_harga_jual
                    );

    echo json_encode($data);
  }

  function save_penjualan_tmp(){
    $i_item_id  = $this->input->post('i_item_id');
    $i_qty      = $this->input->post('i_qty');
    $i_item_harga_jual      = $this->input->post('i_item_harga_jual');
    $i_item_harga_total     = $i_qty*$i_item_harga_jual;

    $data = array(
                  'penjualan_tmp_id' => '',
                  'item'   => $i_item_id,
                  'item_qty'  => $i_qty,
                  'item_harga_total' => $i_item_harga_total

                );
    $this->create_config('penjualan_tmp', $data);
  }
}
?>
