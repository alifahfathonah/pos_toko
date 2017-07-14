<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_c extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Supplier_m');
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.css";
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css";

    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/scripts/datatable.js";
    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.js";
    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js";
  }

  function index()
  {
    $this->get_header($this->load_plugin_head);
    $this->supplier_list();
    $this->get_footer($this->load_plugin_foot);
  }

  function supplier_list()
  {
    $page_bar['data'][] = array(
                              'title_page' => 'Supplier list',
                              'url'        => 'Supplier'
                            );

    $data = array(
                  'title_page' 	=> $this->page_bar($page_bar),
                  'suppliers'   => $this->select_config('suppliers', ''),
                  'action'      => "Supplier_form",
                );
    $this->load->view('master/supplier_master/supplier_list_v', $data);
  }

  function supplier_form()
  {
    $page_bar['data'][] = array(
                              'title_page' => 'Supplier list',
                              'url'        => 'Supplier'
                            );

    $page_bar['data'][] = array(
                              'title_page' => 'Suppler Form',
                              'url'        => 'Supplier_form'
                            );

    $where = '';
    $where_user_id = '';
    $url   = "master/supplier_master/supplier_form";
    $data  = array(
                   'title_page' 	=> $this->page_bar($page_bar),
                   'action_add'   => "Supplier/add_supplier",
                   'action_close' => "Supplier",
                   'supplier_details' => false,
                   'suppliers'    => $this->select_config('suppliers', $where)
                    );
    $this->get_page($data, $url);
  }

  function add_supplier()
  {
    $i_id = $this->input->post('i_id');
    $i_name = $this->input->post('i_name');
    $i_address = $this->input->post('i_address');
    $i_phone = $this->input->post('i_phone');
    $i_email = $this->input->post('i_email');

    $data = array(
                  'supplier_id'         => '',
                  'supplier_name'       => $i_name,
                  'supplier_address'    => $i_address,
                  'supplier_phone'      => $i_phone,
                  'supplier_email'      => $i_email
                  );

    $this->create_config('suppliers', $data);

    redirect('Supplier');
  }

  function edit_supplier($id)
  {
    $page_bar['data'][] = array(
                              'title_page' => 'Supplier list',
                              'url'        => 'Supplier'
                            );

    $page_bar['data'][] = array(
                              'title_page' => 'Suppler Form',
                              'url'        => 'Supplier_form/edit_supplier/'.$id.''
                            );

    $where = '';
    $where_supplier_id  = "WHERE supplier_id = '$id'";

    $action         = "master/supplier_master/supplier_form";
    $data  = array(
                   'title_page' 	=> $this->page_bar($page_bar),
                   'action_add'     => "Supplier_c/update_supplier",
                   'action_close'   => "Supplier",
                   'supplier_details'   => $this->select_config('suppliers', $where_supplier_id)->row()
                    );

    $this->get_page($data, $action);

  }

  function update_supplier()
  {
    $i_id = $this->input->post('i_id');
    $i_name = $this->input->post('i_name');
    $i_address = $this->input->post('i_address');
    $i_phone = $this->input->post('i_phone');
    $i_email = $this->input->post('i_email');

    $data = array(
                  'supplier_name'       => $i_name,
                  'supplier_address'    => $i_address,
                  'supplier_phone'      => $i_phone,
                  'supplier_email'      => $i_email
                  );

    $where = array(
      'supplier_id' => $i_id
    );

   $this->update_config('suppliers', $data, $where);

   redirect('Supplier');

  }

  function delete_supplier($id)
  {
    $where = array(
      'supplier_id' => $id
    );

    $this->delete_config('suppliers',$where);
    redirect('Supplier');

  }

}
