<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_c extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Penjualan_m');
    // $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.css";
    // $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css";
    // $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css";

    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css";
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css";
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css";
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css";
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/clockface/css/clockface.css";

    // $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/scripts/datatable.js";
    // $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.js";
    // $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js";

    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js";
    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js";
    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js";
    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/clockface/js/clockface.js";

  }

    function index()
    {
      $this->get_header($this->load_plugin_head);
      $this->penjualan_form();
      $this->get_footer($this->load_plugin_foot);
    }
  function penjualan_form(){
    $where = '';
    $data = array(
      'tanggal'     => Date("d/m/Y"),
      'branch_id'   => $this->session->branch_id,
      'user_id'     => $this->session->user_id,
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

  function get_branch(){
    $where = '';

    $query = $this->select_config('branches', $where);
    $data = array();
    foreach ($query->result() as $row) {
      $data[] = array(
                    'data_id'    => $row->branch_id,
                    'data_name'  => $row->branch_name
                  );
    }
    echo json_encode($data);
  }

  function get_user(){
    $where = '';

    $query = $this->select_config('user', $where);
    $data = array();
    foreach ($query->result() as $row) {
      $data[] = array(
                    'data_id'    => $row->user_id,
                    'data_name'  => $row->user_name
                  );
    }
    echo json_encode($data);
  }

  function get_customer(){
    $where = '';

    $query = $this->select_config('customers', $where);
    $data = array();
    foreach ($query->result() as $row) {
      $data[] = array(
                    'data_id'    => $row->customer_id,
                    'data_name'  => $row->customer_name
                  );
    }
    echo json_encode($data);
  }


  function get_Barang()
  {
    $where = '';

    $query = $this->select_config('items', $where);
    $data = array();
    foreach ($query->result() as $row) {
      $data[] = array(
                    'id'    => $row->item_id,
                    'text'  => $row->item_name
                  );
    }
    echo json_encode($data);
  }

}

?>
