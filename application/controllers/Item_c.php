<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_c extends My_controller{
  public function __construct()
  {
    parent::__construct();
      $this->is_logged_in();
      $this->load->model('Item_m');
      $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.css";
      $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css";

      $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/scripts/datatable.js";
      $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.js";
      $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js";
  }

  function index()
  {
    $this->get_header($this->load_plugin_head);
    $this->item_list();
    $this->get_footer($this->load_plugin_foot);
  }

  function item_list()
  {

    $page_bar['data'][] = array(
                              'title_page' => 'Item list',
                              'url'        => 'Item'
                            );

    $data = array(
                  'title_page' 	=> $this->page_bar($page_bar),
                  'items'       => $this->select_config('items', ''),
                  'action'      => "Item/item_form",
                );
    $this->load->view('master/item_master/item_list_v', $data);
  }

  function item_form()
  {
    $page_bar['data'][] = array(
                              'title_page' => 'Item list',
                              'url'        => 'Item'
                            );

    $page_bar['data'][] = array(
                              'title_page' => 'Item Form',
                              'url'        => 'item_form'
                            );

    $where_item_id = '';
    $where         = '';
    $action   = "master/item_master/item_form";
    $data  = array(
                   'title_page' 	=> $this->page_bar($page_bar),
                   'action_add' => "Item/add_item",
                   'action_close' => "Item",
                   'item_details'   => false,
                   'kategori_item'  => $this->select_config('kategori', $where),
                   'satuan_item'  => $this->select_config('satuan', $where)
                    );

    $this->get_page($data, $action, $this->load_plugin_head, $this->load_plugin_foot);
  }

  function add_item()
  {
    $i_id = $this->input->post('i_id');
    $i_name = $this->input->post('i_name');
    $i_kategori = $this->input->post('i_kategori');
    $i_img = $this->input->post('i_img');
    $i_hpp = $this->input->post('i_hpp');
    $i_harga_jual = $this->input->post('i_harga_jual');
    $i_satuan = $this->input->post('i_satuan');


    $i_mg_file = isset($_FILES['i_img']['name']) ? $_FILES['i_img']['name']: " ";

    $config['upload_path']          = './assets/img/items/';
    $config['allowed_types']        = 'gif|jpg|png|exe|xls|doc|docx|xlsx|rar|zip';
    $config['max_size']             = '8192';
    $config['remove_spaces']        = TRUE;  //it will remove all spaces

    $this->load->library('upload', $config);

    $data = array('item_id'         => '',
                  'item_name'       => $i_name,
                  'item_satuan'     => $i_satuan,
                  'item_img'        => $i_img,
                  'item_kategori'   => $i_kategori,
                  'item_desc'       => '',
                  'item_harga'      => '',
                  'item_hpp'        => $i_hpp,
                  'item_harga_jual' => $i_harga_jual
                  );


    if ($i_mg_file) { $this->upload->do_upload('i_img');}
    $this->create_config('items', $data);
    redirect('Item_c');
  }

  function edit_item($id)
  {
    $page_bar['data'][] = array(
                              'title_page' => 'Item list',
                              'url'        => 'Item'
                            );

    $page_bar['data'][] = array(
                              'title_page' => 'Item Form',
                              'url'        => '../../Item/edit_item/'.$id
                            );

    $where = '';
    $where_item_id  = "WHERE item_id = '$id'";

    $action         = "master/item_master/item_form";
    $data  = array(
                   'title_page' 	  => $this->page_bar($page_bar),
                   'action_add'     => "Item/update_item",
                   'action_close'   => "Item",
                   'item_details'   => $this->select_config('items', $where_item_id)->row(),
                   'kategori_item'  => $this->select_config('kategori', $where),
                   'satuan_item'    => $this->select_config('satuan', $where),
                   'qitem_konversi'  => $this->Item_m->selectItemKonversi($id)
                    );
    $this->get_page($data, $action, $this->load_plugin_head, $this->load_plugin_foot);
  }

  function update_item(){
  	$i_id = $this->input->post('i_id');
  	$i_nama = $this->input->post('i_name');
    $i_img = $this->input->post('i_img');
  	$i_kategori = $this->input->post('i_kategori');
    $i_hpp = $this->input->post('i_hpp');
    $i_harga_jual = $this->input->post('i_harga_jual');
    $i_satuan = $this->input->post('i_satuan');

    $i_mg_file = $_FILES['i_img']['name'];

    $where = array(
  		'item_id' => $i_id
  	);

    if ($i_mg_file) {

      $data = array(
    		'item_name'       => $i_nama,
        'item_satuan'     => $i_satuan,
        'item_img'        => $i_mg_file,
    		'item_kategori'   => $i_kategori,
    		'item_desc'       => '',
        'item_harga'      => '',
        'item_hpp'        => $i_hpp,
        'item_harga_jual' => $i_harga_jual
    	);

      $config['upload_path']          = './assets/img/items/';
      $config['allowed_types']        = 'gif|jpg|png|exe|xls|doc|docx|xlsx|rar|zip';
      $config['max_size']             = '8192';
      $config['remove_spaces']        = TRUE;  //it will remove all spaces

      $this->load->library('upload', $config);

      $cek_img_old = $this->select_config_one('items', 'item_img', $where);

      if ($cek_img_old->item_img) { unlink($config['upload_path'].$cek_img_old->item_img); }

      $this->upload->do_upload('i_img');

    } else {

      $data = array(
    		'item_name'       => $i_nama,
        'item_satuan'     => $i_satuan,
    		'item_kategori'   => $i_kategori,
    		'item_desc'       => '',
        'item_harga'      => '',
        'item_hpp'        => $i_hpp,
        'item_harga_jual' => $i_harga_jual
    	);

    }

    $this->update_config('items',$data,$where);
  	redirect('item_c');
  }

  function delete_item($id){
    $where = array(
  		'item_id' => $id
  	);
    $this->delete_config('items',$where);
    redirect('item_c');
  }

  function form_konversi(){
    $data = array('action' => 'Item/item_konversi_action');
    $this->load->view('master/item_master/popmodal_item_konversi', $data);
  }

  function item_konversi($value='')
  {
      $item_id = $this->input->post('item_id');
      $select = "a.item_id, a.item_name, b.*, c.*";
      $table  = "items a" ;

      $join['data'][] = array(
        'table' => 'item_konversi b',
        'join'  => 'b.item_id = a.item_id',
        'type'  => 'left'
      );

      $join['data'][] = array(
        'table' => 'satuan c',
        'join'  => 'c.satuan_id = b.item_satuan',
        'type'  => 'left'
      );

      $where['data'][] = array(
        'column' => 'a.item_id',
        'param'   => $item_id
      );

      $data = array(
        'item_konversi' => $this->Global_m->globalselect($select, $table, $join, $where)->row()
      );
  }

  function get_satuan()
  {
    $where = '';
    if ($this->input->post('item_satuan')) {
      $item_satuan_utama = $this->input->post('item_satuan');
      $where = 'WHERE satuan_id != '.$item_satuan_utama;
    }

    $query = $this->select_config('satuan', $where);
    $data = array();
    foreach ($query->result() as $row) {
      $data[] = array(
                    'data_id'    => $row->satuan_id,
                    'data_name'  => $row->satuan_name
                  );
    }
    echo json_encode($data);
  }

  function get_kategori(){
    $where = '';
    $query = $this->select_config('kategori', $where);
    $data = array();
    foreach ($query->result() as $row) {
      $data[] = array(
                    'data_id'    => $row->kategori_id,
                    'data_name'  => $row->kategori_name
                  );
    }
    echo json_encode($data);
  }

  function item_konversi_action(){
    if ($this->input->post('i_satuan_konversi')) {

    } else {
      $data = $this->general_post_data(1);
      // var_dump($data);
      $this->Global_m->create_config('item_konversi', $data);
    }
  }

  function general_post_data($type, $id = null){
		// 1 Insert, 2 Update, 3 Delete / Non Aktif
		$where['data'][] = array(
			'column' => 'barang_id',
			'param'	 => $id
		);

		$barang_kode = $this->input->post('barang_nomor', TRUE);
		if ($type == 1) {
			$data = array(
        'item_id' => $this->input->post('item_id'),
        'item_satuan_utama' => $this->input->post('item_satuan_utama'),
        'item_satuan' => $this->input->post('item_satuan'),
        'item_konversi_jml' => $this->input->post('item_konversi_jml')
      );
		} else if ($type == 2) {
			$data = array(
        'item_id' => $this->input->post('item_id'),
        'item_konversi_id' => $this->input->post('item_konversi_id'),
        'item_satuan_utama' => $this->input->post('item_satuan_utama'),
        'item_satuan' => $this->input->post('item_satuan'),
        'item_konversi_jml' => $this->input->post('item_konversi_jml')
			);
		}

		return $data;
	}

}
