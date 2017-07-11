<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_c extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Supplier_m');
  }

  function index()
  {
    $this->get_header();
    $this->supplier_list();
    $this->get_footer();
  }

  function supplier_list()
  {
    $data = array('suppliers'   => $this->select_config('suppliers', ''),
                  'action'      => "Supplier_c/supplier_form",
                );
    $this->load->view('master/supplier_master/supplier_list_v', $data);
  }

  function supplier_form()
  {
    $where = '';
    $where_user_id = '';
    $url   = "master/supplier_master/supplier_form";
    $data  = array('action_add'   => "Supplier_c/add_supplier",
                   'action_close' => "Supplier_c",
                   'supplier_details' => false,
                   'suppliers'    => $this->select_config('suppliers', $where)
                    );
    $this->get_page($data,$url);
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

    redirect('Supplier_c');
  }

  function edit_supplier($id)
  {
    $where = '';
    $where_supplier_id  = "WHERE supplier_id = '$id'";

    $action         = "master/supplier_master/supplier_form";
    $data  = array('action_add'     => "Supplier_c/update_supplier",
                   'action_close'   => "Supplier_c",
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

   redirect('supplier_c');

  }

  function delete_supplier($id)
  {
    $where = array(
      'supplier_id' => $id
    );

    $this->delete_config('suppliers',$where);
    redirect('Supplier_c');

  }

}
