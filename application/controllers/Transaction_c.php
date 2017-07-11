<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_c extends My_controller{

  // public function __construct()
  // {
  //   parent::__construct();
  // }

  function index()
  {
    $this->load->view('template/head');
		$this->load->view('template/topbar');
		$this->sidebar();
		$this->load->view('template/js');
		$this->load->view('template/foot');
  }

}
