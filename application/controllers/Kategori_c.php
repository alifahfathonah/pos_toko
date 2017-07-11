<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_c extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kategori_m');
  }

  function index()
  {
    $this->get_header();
    $this->kategori_list();
    $this->get_footer();
  }

  function kategori_list()
  {
    $data = array('kategori'   => $this->select_config('kategori', ''),
                  'action'      => "kategori_c/kategori_form",
                );
    $this->load->view('master/kategori_master/kategori_list_v', $data);
  }

  function kategori_form()
  {
    $where = '';
    $where_user_id = '';
    $url   = "master/kategori_master/kategori_form";
    $data  = array('action_add'   => "kategori_c/add_kategori",
                   'action_close' => "kategori_c",
                   'kategori_details' => false,
                   'kategori'    => $this->select_config('kategori', $where)
                    );
    $this->get_page($data,$url);
  }

  function add_kategori()
  {
    $i_id = $this->input->post('i_id');
    $i_name = $this->input->post('i_name');

    $data = array(
                  'kategori_id'         => '',
                  'kategori_name'       => $i_name,
                  );

    $this->create_config('kategori', $data);

    redirect('kategori_c');
  }

  function edit_kategori($id)
  {
    $where = '';
    $where_kategori_id  = "WHERE kategori_id = '$id'";

    $action         = "master/kategori_master/kategori_form";
    $data  = array('action_add'     => "kategori_c/update_kategori",
                   'action_close'   => "kategori_c",
                   'kategori_details'   => $this->select_config('kategori', $where_kategori_id)->row()
                    );

    $this->get_page($data, $action);

  }

  function update_kategori()
  {
    $i_id = $this->input->post('i_id');
    $i_name = $this->input->post('i_name');
    $i_address = $this->input->post('i_address');
    $i_phone = $this->input->post('i_phone');
    $i_email = $this->input->post('i_email');

    $data = array(
                  'kategori_name'       => $i_name,
                  );

    $where = array(
      'kategori_id' => $i_id
    );

   $this->update_config('kategori', $data, $where);

   redirect('kategori_c');

  }

  function delete_kategori($id)
  {
    $where = array(
      'kategori_id' => $id
    );

    $this->delete_config('kategori',$where);
    redirect('kategori_c');

  }

}
