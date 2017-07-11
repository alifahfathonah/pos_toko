<?php
defined('BASEPATH') OR exit('No direct script access allowed');


  class Ruangan_c extends My_controller{

    public $load_plugin_head;
    public $load_plugin_foot;

    public function __construct()
    {
      parent::__construct();
        $this->load->model('Ruangan_m');

        $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.css";
        $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css";
        $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css";

        $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/scripts/datatable.js";
        $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.js";
        $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js";
        $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js";

    }

    function index()
    {
  		$this->get_header($this->load_plugin_head);
      $this->ruangan_list();
      $this->get_footer($this->load_plugin_foot);
    }

    function ruangan_list()
    {
      $page_bar['data'][] = array(
                                'title_page' => 'Field list',
                                'url'        => 'lapangan_list'
                              );

      $data = array(
                    'title_page' 	=> $this->page_bar($page_bar),
                    'buildings'   => $this->select_config('buildings', $this->where_branch_active),
                    'action'      => "lapangan_form",
                  );

      $this->load->view('master/ruangan_master/ruangan_list_v', $data);
    }

    function ruangan_form()
    {
      $page_bar['data'][] = array(
                                'title_page' => 'Field list',
                                'url'        => 'lapangan_list'
                              );

      $page_bar['data'][] = array(
                                'title_page' => 'Field form',
                                'url'        => 'lapangan_form'
                              );

      $where_ruangan_id = '';
      $where         = '';
      $action   = "master/ruangan_master/ruangan_form";
      $data  = array(
                     'title_page' 	      => $this->page_bar($page_bar),
                     'action_add'         => "Ruangan_c/add_ruangan",
                     'action_close'       => "lapangan_list",
                     'building_details'   => false,
                     'status'             => $this->select_config('status_buildings', $where),
                     'branches'           => $this->select_config('branches', $where),
                      );

      $this->get_page($data, $action, $this->load_plugin_head, $this->load_plugin_foot);
    }

    function add_ruangan()
    {
      $i_id = $this->input->post('i_id');
      $i_name = $this->input->post('i_name');
      $i_kategori = $this->input->post('i_kategori');
      $i_img = $this->input->post('i_img');
      $i_status = $this->input->post('i_status');
      $i_hour = $this->input->post('i_hour');
      $i_harga_jual = $this->input->post('i_harga_jual');
      $i_branch = $this->input->post('i_branch');


      $i_mg_file = isset($_FILES['i_img']['name']) ? $_FILES['i_img']['name']: " ";

      $config['upload_path']          = './assets/img/buildings/';
      $config['allowed_types']        = 'gif|jpg|png|exe|xls|doc|docx|xlsx|rar|zip';
      $config['max_size']             = '8192';
      $config['remove_spaces']        = TRUE;  //it will remove all spaces

      $this->load->library('upload', $config);

      $data = array(
                    'building_name'       => $i_name,
                    'building_img'        => $i_mg_file,
                    'building_status'     => $i_status,
                    'building_hour_book'  => $i_hour,
                    'building_price'      => $i_harga_jual,
                    'branch'              => $i_branch
                  );


      if ($i_mg_file) { $this->upload->do_upload('i_img');}
      $this->create_config('buildings', $data);
      redirect('lapangan_list');
    }

    function edit_ruangan($id)
    {
      $page_bar['data'][] = array(
                                'title_page' => 'Field list',
                                'url'        => 'lapangan_list'
                              );

      $page_bar['data'][] = array(
                                'title_page' => 'Field form',
                                'url'        => '../lapangan_edit/'.$id
                              );
      $where = '';
      $where_building_id  = "WHERE building_id = '$id'";
      $action         = "master/ruangan_master/ruangan_form";
      $data  = array(
                     'title_page' 	      => $this->page_bar($page_bar),
                     'action_add'         => "Ruangan_c/update_ruangan",
                     'action_close'       => "lapangan_list",
                     'building_details'   => $this->select_config('buildings', $where_building_id)->row(),
                     'status'             => $this->select_config('status_buildings', $where),
                     'branches'           => $this->select_config('branches', $where)
                      );
      $building_details   = $this->select_config('buildings', $where_building_id)->result();

      $this->get_page($data, $action);
    }

    function update_ruangan(){

    	$i_id = $this->input->post('i_id');
    	$i_name = $this->input->post('i_name');
      $i_img = $this->input->post('i_img');
    	$i_branch = $this->input->post('i_branch');
      $i_status = $this->input->post('i_status');
      $i_hour = $this->input->post('i_hour');
      $i_harga_jual = $this->input->post('i_harga_jual');

      $i_mg_file = $_FILES['i_img']['name'];

      $where = array(
    		'building_id' => $i_id
    	);

      if ($i_mg_file) {
        echo $i_mg_file;
        $data = array(
      		'building_name'       => $i_name,
          'building_img'        => $i_mg_file,
      		'building_status'     => $i_status,
      		'building_hour_book'  => $i_hour,
          'building_price'      => $i_harga_jual,
          'branch'              => $i_branch
      	);

        $config['upload_path']          = './assets/img/buildings/';
        $config['allowed_types']        = 'gif|jpg|png|exe|xls|doc|docx|xlsx|rar|zip';
        $config['max_size']             = '8192';
        $config['remove_spaces']        = TRUE;  //it will remove all spaces

        $this->load->library('upload', $config);

        $cek_img_old = $this->select_config_one('buildings', 'building_img', $where);

        if ($cek_img_old->building_img) { unlink($config['upload_path'].$cek_img_old->building_img);}

        $this->upload->do_upload('i_img');

      } else {

        $data = array(
      		'building_name'       => $i_name,
      		'building_status'     => $i_status,
      		'building_hour_book'  => $i_hour,
          'building_price'      => $i_harga_jual,
          'branch'              => $i_branch
      	);
      }
      var_dump($_POST);
      $this->update_config('buildings', $data, $where);
    	redirect('lapangan_list');
    }

    function delete_ruangan($id){
      $where = array(
    		'building_id' => $id
    	);
      $this->delete_config('buildings',$where);
      redirect('lapangan_list');
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

    function get_status()
    {
      $where = '';
      $q_status = $this->select_config('status_buildings', $where);
      foreach ($q_status->result() as $row) {
        $data[] = array(
                      'status_building_id' => $row->status_building_id,
                      'status_building_name' => $row->status_building_name
                    );
      }
      echo json_encode($data);
    }


    function popmodal_ruangan_konversi($satuan_utama)
    {
        $this->load->view('master/ruangan_master/popmodal_ruangan_konversi');
    }
  }
