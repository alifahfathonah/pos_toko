<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office_c extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->is_logged_in();
    //Codeigniter : Write Less Do More
    $this->load->model('Home_m');
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.css";
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css";
  }

  function index()
  {
    $this->get_header();
    $this->office_list();
    $this->get_footer();
  }

  function office_list()
  {
    $data['office'] = $this->select_config('office_details','');
    $data['url'] =  "Head_office_form";
    $this->load->view('setting/office/office_list_v', $data);
  }

  function office_form()
  {
    $where = 'WHERE office_detail_id = 1';

    $url   = "setting/office/office_form";
    $data  = array('action_add'   => "Office_c/Office_save",
                   'action_close' => "Head_office",
                   'office'     => $this->select_config('office_details', $where)->row()
                    );

    $this->get_page($data,$url);

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

    function Office_save()
    {
      $i_id = $this->input->post('i_id');
      $i_name = $this->input->post('i_name');
      $i_phone = $this->input->post('i_phone');
      $i_branch = $this->input->post('i_branch');
      $i_email = $this->input->post('i_email');
      $data = array(
                      'office_name'   => $i_name,
                      'branch_id'     => $i_branch,
                      'office_phone'  => $i_phone,
                      'office_phone'  => $i_email
                    );
      if ($i_id) {
        $where_office_detail_id = "office_detail_id = '$i_id'";
        $this->update_config('office_details', $data, $where_office_detail_id);
      } else {
        $this->create_config('office_details', $data);
      }
      redirect('Head_office');
    }
}
