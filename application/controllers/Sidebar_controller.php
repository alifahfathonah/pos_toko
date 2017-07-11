<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidebar_controller extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Home_model');
  }

  function index()
  {

  }

}
