<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan_c extends MY_controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Satuan_m');
	}

	function index()
	{
		$this->get_header();
		$this->satuan_list();
		$this->get_footer();
	}

	function satuan_list()
	{
		$data = array
				(
					'items'		=> $this->select_config('satuan',''),
					'action'	=> "Satuan_c/satuan_form",

				);
		$this->load->view('master/satuan_master/satuan_list_v',$data);
	}

	function satuan_form()
	{
		$where_satuan_id 	= '';
		$where 				= '';
		$action				= "master/satuan_master/satuan_form";
		$data	= array(
				'action_add'	=> "Satuan_c/add_satuan",
				'action_close'	=> "Satuan_c",
				'satuan_details'	=> false,


			);
		$this->get_page($data,$action);
	}

	function add_satuan()
	{
		$satuan_name	= $this->input->post('satuan_name');
		$data = array(

				'satuan_id'		=> '',
				'satuan_name'	=> $satuan_name

			);
		$this->create_config('satuan',$data);
		redirect('Satuan_c');
	}

	function edit_satuan($id)
	{
		$where = '';
		$where_satuan_id 	= "WHERE satuan_id = '$id'";
		$action 			= "master/satuan_master/satuan_form";
		$data	= array(
				'action_add' 		=> 'Satuan_c/update_satuan',
				'action_close'		=> 'Satuan_c',
				'satuan_details'	=> $this->select_config('satuan', $where_satuan_id)->row(),

			);
		$this->get_page($data, $action);
	}

	function update_satuan(){

		$satuan_id 		= $this->input->post('satuan_id');
		$satuan_name	= $this->input->post('satuan_name');
		$data = array(

				'satuan_name'	=> $satuan_name

			);

		$where = array('satuan_id' => $satuan_id);

		$this->update_config('satuan',$data,$where);
		redirect('Satuan_c');

	}

	function delete_satuan($id)
	{
		$where = array(
			'satuan_id'	=> $id
			);
		// var_dump($where);
		$this->delete_config('satuan',$where);
		redirect('satuan_c');
	}



}