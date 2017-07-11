<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang_c extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->is_logged_in();
    $this->load->model('Cabang_m');
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.css";
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css";
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css";

    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css";
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css";
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css";
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css";
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/clockface/css/clockface.css";

    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/scripts/datatable.js";
    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.js";
    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js";

    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js";
    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js";
    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js";
    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/clockface/js/clockface.js";

  }

  function index()
  {
    $this->get_header($this->load_plugin_head);
    $this->cabang_list();
    $this->get_footer($this->load_plugin_foot);
  }

  function cabang_list(){
    $page_bar['data'][] = array(
                              'title_page' => 'Branch list',
                              'url'        => 'cabang_list'
                            );

    $where = '';

    $data = array(
                  'title_page' 	=> $this->page_bar($page_bar),
                  'cabang'     => $this->select_config('branches', $where),
                  'action'    => "cabang_form",
                );
    $cabang     = $this->select_config('branches', $where)->result();

    $this->load->view('master/cabang_master/cabang_list_v', $data);
  }

  function cabang_form()
  {
    $page_bar['data'][] = array(
                              'title_page' => 'Branch list',
                              'url'        => 'cabang_list'
                            );

    $page_bar['data'][] = array(
                              'title_page' => 'Branch Form',
                              'url'        => 'cabang_form'
                            );

    $where = '';
    $where_branch_id = '';
    $url   = "master/cabang_master/cabang_form";
    $data  = array(
                   'title_page' 	=> $this->page_bar($page_bar),
                   'action_add'   => "Cabang_c/cabang_add",
                   'action_close' => "Cabang_c",
                   'cabang'    => $this->select_config('branches', $where)
                    );
    $this->get_page($data,$url, $this->load_plugin_head, $this->load_plugin_foot);
  }

  function cabang_add(){
    $i_name = $this->input->post('i_name');
    $i_phone = $this->input->post('i_phone');
    $i_address = $this->input->post('i_address');
    $i_email = $this->input->post('i_email');
    $i_hour_1 = $this->input->post('i_hour_1');
    $i_hour_2 = $this->input->post('$i_hour_2');

    $data = array(
                  'branch_name'     => $i_name,
                  'branch_phone'    => $i_phone,
                  'branch_address'  => $i_address,
                  'branch_email'    => $i_email,
                  'branch_hour_1'   => strtotime($i_hour_1),
                  'branch_hour_2'   => strtotime($i_hour_2)
                );
    $this->create_config('branches', $data);

    redirect('Cabang_c');
  }

  function cabang_edit($id){

    $page_bar['data'][] = array(
                              'title_page' => 'Cabang list',
                              'url'        => '../cabang_list'
                            );

    $page_bar['data'][] = array(
                              'title_page' => 'Cabang Form',
                              'url'        => '../cabang_edit/'.$id
                            );

    $where = '';
    $where_branch_id  = "WHERE branch_id = '$id'";
    $action         = "master/cabang_master/cabang_form";

    $data  = array(
                   'title_page' 	=> $this->page_bar($page_bar),
                   'action_add'     => "Cabang_c/cabang_update",
                   'action_close'   => "cabang_list",
                   'cabang_details'   => $this->select_config('branches', $where_branch_id)->row()
                    );

    $this->get_page($data, $action, $this->load_plugin_head, $this->load_plugin_foot);

  }

  function cabang_update(){
    $i_id = $this->input->post('i_id');
    $i_name = $this->input->post('i_name');
    $i_phone = $this->input->post('i_phone');
    $i_address = $this->input->post('i_address');
    $i_email = $this->input->post('i_email');
    $i_hour_1 = $this->input->post('i_hour_1');
    $i_hour_2 = $this->input->post('i_hour_2');


    $data = array(
                  'branch_name'     => $i_name,
                  'branch_phone'    => $i_phone,
                  'branch_address'  => $i_address,
                  'branch_email'    => $i_email,
                  'branch_hour_1'   => strtotime($i_hour_1),
                  'branch_hour_2'   => strtotime($i_hour_2)
                );

    $where = array(
      'branch_id' => $i_id
    );

    $this->update_config('branches', $data, $where);
    redirect('cabang_list');

  }

  function cabang_delete($id){
    $where = array(
      'branch_id' => $id
    );
    $this->delete_config('branches',$where);
    redirect('cabang_list');
  }
}
 ?>
