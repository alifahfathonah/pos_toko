<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_c extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
      $this->load->model('Pembelian_m');
  }

  function index()
  {
    $this->get_header();
    $this->pembelian_form();
    $this->get_footer();
  }
  function pembelian_form(){
    $this->load->view('transaksi/pembelian/Pembelian_v');
  }

}
