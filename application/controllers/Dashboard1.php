<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard1 extends My_controller {


		public function __construct()
		{
			parent::__construct();
			$this->is_logged_in();

			$this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/css/components-rounded.min.css";
			$this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.css";
			$this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css";
			$this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css";

			$this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/scripts/datatable.js";
			$this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.js";
			$this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js";

		}

	public function index($load_plugin_head = null, $load_plugin_foot = null )
	{
			$data['plugin_head'] = $this->load_plugin_head;
			$data['plugin_foot'] = $this->load_plugin_foot;

			$this->load->view('template/head_admin_interface', $data);
			$this->load->view('template/topbar');
			$this->sidebar();
			$this->load->view('dashboard1');
			$this->load->view('template/js_admin_interface', $data);
			$this->load->view('template/foot');
	}

	function getdatabook()
	{
		// $select = NULL, $table = NULL, $join = NULL, $where = NULL, $where2 = NULL, $like = NULL, $order = NULL, $limit = NULL
		$where = '';
		$branch_id = $this->input->post('branch_id');

		$select = 'a.*, b.customer_name, c.branch_name, d.building_name, d.building_status, d.building_hour_book, d.building_price';

		$table = 'building_booking a';

		$join['data'][] = array(
					'table' => 'customers b',
					'join'	=> 'b.customer_id = a.building_booking_customer',
					'type'	=> 'left'
				);

		$join['data'][] = array(
					'table' => 'branches c',
					'join'	=> 'c.branch_id = a.building_booking_branch',
					'type'	=> 'left'
				);

		$join['data'][] = array(
					'table' => 'buildings d',
					'join'	=> 'd.building_id = a.building_booking_building',
					'type'	=> 'left'
				);

		if ($this->where_branch_active!=null) {
			$where['data'][] = array(
						'column' => 'a.building_booking_branch',
						'param'	 => $branch_id
					);
		}

		$query = $this->Global_m->globalselect($select, $table, $join, $where);
		$data  = array();
		foreach ($query->result() as $row) {
			$data[] = array(
				'building_booking_id' 					=> $row->building_booking_id,
				'branch_name' 									=> $row->branch_name,
				'building_name' 								=> $row->building_name,
				'building_status' 							=> $row->building_status,
				'building_booking_date'					=> date("d-m-Y H:m:s" ,strtotime($row->building_booking_date)),
				'building_booking_date_for'			=> date("d-M-Y" ,strtotime($row->building_booking_date_for)),
				'building_booking_time_1'				=> $row->building_booking_time_1,
				'building_booking_time_2'				=> $row->building_booking_time_2,
				'building_booking_status'				=> $row->building_booking_status,
				'building_booking_status_desc'	=> $row->building_booking_status_desc,
				'customer_name'									=> $row->customer_name
			);
		}

		echo json_encode($data);

	}

	function updatedatabook()
	{
			$booking_id 			= $this->input->post('booking_id');
			$dataupdate 			= array('building_booking_status' => 4);
			$where_booking_id = array('building_booking_id' => $booking_id);

			if($this->update_config('building_booking', $dataupdate, $where_booking_id))
			{
				$data['status'] = 204;
			} else {
				$data['status'] = 200;
				$data['booking_id'] = $booking_id;
			}
			echo json_encode($data);
	}

	function deleteDataBook()
	{
		$booking_id 			= $this->input->post('booking_id');
		// $dataupdate 			= array('building_booking_status' => 2 );
		$where_booking_id = array('building_booking_id' => $booking_id);

		if($this->delete_config('building_booking', $where_booking_id))
		{
			$data['status'] = 204;
		} else {
			$data['status'] = 200;
			$data['booking_id'] = $booking_id;
		}
		echo json_encode($data);
	}

	function getdatabooktoday()
	{
		$branch_id = $this->input->post('branch_id');
		$table = "building_booking a";
		$select = "count(a.building_booking_id) `allbook`, if(a.building_booking_status = 1, count(a.building_booking_id), '0' ) `unC`, if(a.building_booking_status = 2, count(a.building_booking_id), '0' ) `C`";
		$where = '';

		$where['data'][] = array(
					'column' => 'a.building_booking_date',
					'param'	 => date("Y-m-d")
				);

		if ($this->where_branch_active!=null) {
				$where['data'][] = array(
							'column' => 'a.building_booking_branch',
							'param'	 => $branch_id
						);
			}
		$countdataBookingtoday 			= $this->Global_m->globalselect($select, $table, null, $where);
		foreach ($countdataBookingtoday->result() as $row) {
			$data['databooktoday']		= $row->allbook;
			$data['databooktodayunC']	= $row->unC;
			$data['databooktodayC']		= $row->C;
		}
		// echo $this->db->last_query();
		// print_r($data);
		echo json_encode($data);
	}

	function viewdatabook($id){
		$select = "a.*, b.*, c.branch_name, d.building_name";
		$table	= "building_booking a";

		$join['data'][] = array(
					'table' => 'customers b',
					'join'	=> 'b.customer_id = a.building_booking_customer',
					'type'	=> 'left'
				);

		$join['data'][] = array(
					'table' => 'branches c',
					'join'	=> 'c.branch_id = a.building_booking_branch',
					'type'	=> 'left'
				);

		$join['data'][] = array(
					'table' => 'buildings d',
					'join'	=> 'd.building_id = a.building_booking_building',
					'type'	=> 'left'
				);

		$where['data'][] = array(
								'column' => 'a.building_booking_customer',
								'param'	 => $id
							);

		$query = $this->Global_m->globalselect($select, $table, $join, $where)->row();
		$data = array(
			'building_booking_details' => $query
		);
		$this->load->view('buildingbookingdetails_popmodal', $data);
	}

	function popmodal_log_out()
	{

	}

}
