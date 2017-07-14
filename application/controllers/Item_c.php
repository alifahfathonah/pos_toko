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
                              'url'        => 'Item/Item_form'
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
                              'url'        => 'Item/edit_item/'.$id
                            );

    $where = '';

    $where_item_id_ = array(
      'item_id' => $id
    );

    $item_satuan_utama = $this->Global_m->select_config_one('items', 'item_satuan', $where_item_id_);

    $where_item_id  = "WHERE item_id = '$id' AND item_satuan = '$item_satuan_utama->item_satuan'";

    $action         = "master/item_master/item_form";
    $data  = array(
                   'title_page' 	  => $this->page_bar($page_bar),
                   'action_add'     => "Item/update_item",
                   'action_close'   => "Item",
                   'item_details'   => $this->select_config('items', $where_item_id)->row(),
                   'kategori_item'  => $this->select_config('kategori', $where),
                   'satuan_item'    => $this->select_config('satuan', $where),
                   'qitem_konversi' => $this->Item_m->selectItemKonversi($id)
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

  public function loadDatakonversi(){
    $item_id = $this->input->post('item_id');
    $where_item_id_ = array(
      'item_id' => $item_id
    );

    $item_satuan_utama = $this->Global_m->select_config_one('items', 'item_satuan', $where_item_id_);

    $where_item_id  = "WHERE item_id = '$item_id' AND item_satuan = '$item_satuan_utama->item_satuan'";
    $qitem_konversi = $this->Item_m->selectItemKonversi($item_id);

    $response['data'] = array();

    $no = 1;
    foreach ($qitem_konversi->result() as $key => $value) {
      $response['data'][] = array(
        'no'                          => $no,
        'item_konversi_id'            => $value->item_konversi_id,
        'satuan_utama'                => $value->satuan_utama,
        'item_satuan_utama_jml'       => $value->item_satuan_utama_jml,
        'satuan_konversi'             => $value->satuan_konversi,
        'item_satuan_konversi_jml'    => $value->item_satuan_konversi_jml
      );
      $no++;
    }
    echo json_encode($response);
	}

  function form_konversi(){
    $data = array(
      'action' => 'Item/item_konversi_action'
    );
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

  function get_satuan_name(){
    $item_satuan = $this->input->post('item_satuan');
    $where = array('satuan_id' => $item_satuan);

    $satuan_name = $this->select_config_one('satuan', 'satuan_name', $where);
    $satuan_name = $satuan_name->satuan_name;
    echo json_encode($satuan_name);
  }

  function get_konversidetails()
  {
    $item_id = $this->input->post('item_id');
    $item_satuan = $this->input->post('item_satuan');

    $data = array();
    if ($this->input->post('item_konversi_id')) {

      $item_konversi_id = $this->input->post('item_konversi_id');
      $where_item_konversi_id = array(
        'item_konversi_id' => $item_konversi_id
      );

      $itemkonversidetail = $this->Global_m->select_config_array('item_konversi', $where_item_konversi_id)->row();

        $data['data'] = array(
          'item_satuan_utama'         => $itemkonversidetail->item_satuan_utama,
          'item_satuan_utama_jml'     => $itemkonversidetail->item_satuan_utama_jml,
          'item_satuan_konversi'      => $itemkonversidetail->item_satuan_konversi,
          'item_satuan_konversi_jml'  => $itemkonversidetail->item_satuan_konversi_jml
        );

        $where = array('satuan_id' => $item_satuan);
        $satuan_name = $this->Global_m->select_config_one('satuan', 'satuan_name', $where);
        $data['satuan_name'] = $satuan_name->satuan_name;

    } else {

      $where = array('satuan_id' => $item_satuan);

      $satuan_name = $this->select_config_one('satuan', 'satuan_name', $where);
      $data['data'][] = array('satuan_name' => $satuan_name->satuan_name );

    }

    echo json_encode($data);
  }


  function item_konversi_action(){
    $response['response'] = '204';

    if ($this->input->post('item_konversi_id')) {

      $item_konversi_id = $this->input->post('item_konversi_id');
      $data = $this->general_post_data(2);
      $where = array('item_konversi_id' => $item_konversi_id);
      $update = $this->Global_m->update_config('item_konversi', $data, $where);

      if ($update == '200') {
        $response['response'] = '200';
      }

    } else {

      $data = $this->general_post_data(1);

      $create_config = $this->Global_m->create_config('item_konversi', $data);
      if ($create_config) {
        $response['response'] = '200';
      }

    }
    echo json_encode($response);
  }

  public function delete_itemKonversi($value='')
  {
    $data['response'] = '204';

    $item_konversi_id = $this->input->post('item_konversi_id');
    $where = array(
      'item_konversi_id' => $item_konversi_id
    );
    $query = $this->Global_m->delete_config('item_konversi', $where);
    if ($query) {
      $data['response'] = '200';
    }

    echo json_encode($data);

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
        'item_satuan_utama_jml' => $this->input->post('item_satuan_utama_jml'),
        'item_satuan_konversi' => $this->input->post('item_satuan_konversi'),
        'item_satuan_konversi_jml' => $this->input->post('item_satuan_konversi_jml')
      );
		} else if ($type == 2) {
			$data = array(
        'item_id' => $this->input->post('item_id'),
        'item_konversi_id' => $this->input->post('item_konversi_id'),
        'item_satuan_utama' => $this->input->post('item_satuan_utama'),
        'item_satuan_utama_jml' => $this->input->post('item_satuan_utama_jml'),
        'item_satuan_konversi' => $this->input->post('item_satuan_konversi'),
        'item_satuan_konversi_jml' => $this->input->post('item_satuan_konversi_jml')
			);
		}

		return $data;
	}

}
