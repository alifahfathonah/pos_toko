<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

  public $where_branch_active;

  public $load_plugin_head;
  public $load_plugin_foot;
  public $branch_id;

  public function __construct()
  {
    parent::__construct();
    // $this->load->model('Global_m');
    $this->load->helper(array('form', 'url'));

    $this->branch_id = $this->session->userdata('branch_id');

    $where_branch_id = array(
      'branch_id' => $this->branch_id
    );

    // check apakah kantor pusat
    $check_branch = $this->select_config_one('office_details', 'count(*) as result',$where_branch_id);
    $check_branch = $check_branch->result;

    $this->where_branch_active = null;

    if ($check_branch != 1) {
      $this->where_branch_active = "WHERE branch = '$this->branch_id'";
    }
  }

  function is_logged_in(){
    if ($this->session->userdata('status') == "a"){
      return TRUE;
    }else {
      redirect(base_url('Auth'));
    }
  }


    function sidebar()
    {
      $data['sidebar_lv1'] = $this->Global_m->sidebar_lv1()->result();
      $data['controller']=$this;
      error_reporting(0);
      $this->load->view('template/sidebar', $data);
    }

    function sidebar_lv2($sidebar_lv1){
      $user_type = $this->session->userdata('user_type');
      $data = $this->Global_m->sidebar_lv2($sidebar_lv1, $user_type);
      return $data;
    }

  function page_bar($page_name = null)
  {
    $page_bar = "<ul class='page-breadcrumb'>
                  <li>
                    <a href=".base_url('admin').">Home</a>
                    <i class='fa fa-circle'></i>
                  </li>";
    if ($page_name) {
      for ($i=0; $i < sizeof($page_name['data']) ; $i++) {
        $page_bar = $page_bar."<li>
                                  <a href='".$page_name['data'][$i]['url']."'>".$page_name['data'][$i]['title_page']."</a>
                                  <i class='fa fa-circle'></i>
                               </li>
                               <li>
                                  <span></span>
                               </li>";
      }
    }
    $page_bar = $page_bar."</ul>";
    return  $page_bar;
  }

  function create_config($table, $data){
    $this->Global_m->create_config($table, $data);
  }

  function select_config($table, $where){
    $query = $this->Global_m->select_config($table, $where);
    return $query;
  }

  function select_config_array($table, $where){
    $query = $this->Global_m->select_config_array($table, $where);
    return $query;
  }

  function select_config_one($table, $obj, $where){
    $query = $this->Global_m->select_config_one($table , $obj, $where);
    return $query;
  }

  function update_config($table, $data, $where){
    $query = $this->Global_m->update_config($table, $data,$where);
  }

  function delete_config($table, $where)
  {
    $query = $this->Global_m->delete_config($table,$where);
  }

  function get_header($load_plugin_head = null)
  {
    $data['plugin_head'] = $load_plugin_head;
    $this->is_logged_in();
    $this->load->view('template/head_admin_interface', $data);
		$this->load->view('template/topbar');
    $this->sidebar();
  }

  function get_footer($load_plugin_foot = null)
  {
    $data['plugin_foot'] = $load_plugin_foot;
    $this->load->view('template/js_admin_interface', $data);
		$this->load->view('template/foot');
  }

  function get_header_customer()
  {
    $this->load->view('template/head_customer_interface');
		$this->load->view('template/topbar_customer_interface');
  }

  function get_footer_customer(){
    $this->load->view('template/js_customer_interface');
		$this->load->view('template/foot_customer_interface');
  }


  function get_page($data = null, $url = null, $load_plugin_head = null, $load_plugin_foot = null){
    $this->is_logged_in();
    $data['plugin_head'] = $load_plugin_head;
    $data['plugin_foot'] = $load_plugin_foot;
    $this->session->userdata('sidebar_id', 1);

    $this->load->view('template/head_admin_interface', $data);
    $this->load->view('template/topbar');
    $this->sidebar();
    $this->load->view($url, $data);
    $this->load->view('template/js_admin_interface', $data);
    $this->load->view('template/foot');
  }

  function do_upload($i_img, $path){

    $config['upload_path'] = '../../assets/img/items/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']     = '100';
    $config['max_width'] = '1024';
    $config['max_height'] = '768';

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload($i_img))
             {
               echo "string";
                     $error = array('error' => $this->upload->display_errors());
             }
             else
             {
                     $data = array('upload_data' => $this->upload->data());
             }

  }

  function get_branch()
  {
    $where = '';
    $q_branch = $this->select_config('branches', $where);
    foreach ($q_branch->result() as $row) {
      $data[] = array(
                    'branch_id' => $row->branch_id,
                    'branch_name' => $row->branch_name
                  );
    }
    echo json_encode($data);
  }

}
