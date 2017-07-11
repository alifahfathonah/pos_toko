<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_c extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->is_logged_in();
    $this->load->model('Payment_m');
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css";
    $this->load_plugin_head[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css";

    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js";
    $this->load_plugin_foot[] = base_url()."assets/metronic_v4.5.6/theme/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js";
  }

  function index()
  {
    $this->get_header($this->load_plugin_head);
    $this->payment_form();
    $this->get_footer($this->load_plugin_foot);
  }

  function payment_form()
  {
    $data = array(
      'branch_active' => $this->where_branch_active,
    );

    $this->load->view('payment/payment_form.php', $data);
  }

  function getCodePembayaran()
  {
    $inputcode    = $this->input->get('q');
    $i_branch     = $this->input->get('branch');
    $select       = "a.building_booking_code";
    $table        = "building_booking a";
    $where = null;

    if ($i_branch) {
      $where['data'][] = array(
                  'column' => 'a.building_booking_branch =',
                  'param'	 => $i_branch
                );
    }

      $where2 = "a.building_booking_status != 3";


    $where_like['data'][] = array(
                'column' => 'a.building_booking_code',
                'param'	 => $inputcode
              );

    // print_r($where_like);
    $q_kode = $this->Payment_m->selectCode($select, $table, null, $where, $where2, $where_like);
    foreach ($q_kode->result() as $row) {
			$data['items'][] = array(
				'id'	=> $row->building_booking_code,
				'text'	=> $row->building_booking_code
			);
      // $data['status'] = '200';
    }
    // $data = '';
    // echo $this->db->last_query();
    echo json_encode($data);
  }

  function getDatabooking()
  {
    $kode     = $this->input->post('kode');
    $i_branch = $this->input->post('branch');
    $table    = "building_booking a";
    $select   = "a.*, b.customer_name, c.*, d.branch_name";

    $data = array();

    $where = null;
    $qBookingDetail = "";
    $data['status'] = '204';
    if ($i_branch!=0) {

      $join['data'][] = array(
  					'table' => 'customers b',
  					'join'	=> 'b.customer_id = a.building_booking_customer',
  					'type'	=> 'left'
  				);

      $join['data'][] = array(
  					'table' => 'buildings c',
  					'join'	=> 'c.building_id = a.building_booking_building',
  					'type'	=> 'left'
  				);

      $join['data'][] = array(
  					'table' => 'branches d',
  					'join'	=> 'd.branch_id = a.building_booking_branch',
  					'type'	=> 'left'
  				);


      $where['data'][] = array(
                  'column' => 'a.building_booking_branch',
                  'param'	 => $i_branch
                );

      $where['data'][] = array(
                  'column' => 'a.building_booking_code',
                  'param'	 => $kode
                );

      $row = $this->Global_m->globalselect($select, $table, $join, $where)->row();
      // foreach ($qBookingDetail->result() as $row)
      // {
        $data['bookingDetail'][] = array(
          'building_booking_id'         => $row->building_booking_id,
          'building_booking_code'       => $row->building_booking_code,
          'building_booking_building'     => $row->building_booking_building,
          'building_booking_branch'     => $row->building_booking_branch,
          'building_booking_customer'   => $row->building_booking_customer,
          'building_booking_date'       => date("d-m-Y", strtotime($row->building_booking_date)),
          'building_booking_date_for'   => date("d-m-Y", strtotime($row->building_booking_date_for)),
          'building_booking_time_1'     => $row->building_booking_time_1,
          'building_booking_time_2'     => $row->building_booking_time_2,
          'building_booking_status'     => $row->building_booking_status,
          'building_bookingCustomerName'=> $row->customer_name,
          'building_bookingBuildingName'=> $row->building_name,
          'building_hour_book'          => $row->building_hour_book,
          'building_price'              => $row->building_price
        );
      // }
      $data['status'] = '200';
    }
    $data['action_close'] = "admin";
    echo json_encode($data);
  }

  function saveBookpayment()
  {
    // $i_branch   = $this->input->post('i_branch');
    $i_tanggal    = $this->input->post('i_tanggal');
    $i_code   = $this->input->post('i_code');
    $i_total    = $this->input->post('i_total');
    $i_bayar    = $this->input->post('i_bayar');
    $i_building = $this->input->post('i_building');
    $i_branch = $this->input->post('i_branch');
    $i_bookingcode = $this->input->post('i_bookingcode');
    $i_change = $this->input->post('i_change');

    $tanggal = date("Y-m-d H:m:s");
    $tanggal_ = date("d-m-Y");

    $paymentcode = $this->generate_code($tanggal_, $i_code, $i_building, $i_branch);

    $datasave = array(
    'book_payment_code' => $paymentcode,
    'building_booking_code' => $i_bookingcode,
    'book_payment_date' => $tanggal,
    'book_payment_total' => $i_total,
    'book_payment_nominal' => $i_bayar,
    'book_payment_change' => $i_change,
    'book_payment_method' => '0',
    'book_payment_bank' => '0',
    'book_payment_bank_no' => '0'
  );
  $id = $this->Global_m->create_config('book_payment', $datasave);

  if ($id) {
    $data = array(
      'status'  => '200',
      'id'      => $id,
      'building'  => $i_building,
      'branch'  => $i_branch
    );
  } else {
    $data['status'] = '204';
  }
  // print_r($this->db->last_query());
  echo json_encode($data);

  }

  function generate_code($tanggal, $i_code, $i_building, $i_branch)
  {
    $i_code = "PAY/".$tanggal."/".$i_code."/".$i_building."/".$i_branch;
    return $i_code;
  }

  function printbookpayment($id, $building, $branch)
  {
    $table    = "book_payment a";
    $select   = "a.*, b.*, c.*, d.*, e.customer_name";

    $data = array();

    $where = null;
    $qBookingDetail = "";

      $join['data'][] = array(
            'table' => 'building_booking b',
            'join'	=> 'b.building_booking_code = a.building_booking_code',
            'type'	=> 'left'
          );

      $join['data'][] = array(
            'table' => 'buildings c',
            'join'	=> 'c.building_id = b.building_booking_building',
            'type'	=> 'left'
          );

      $join['data'][] = array(
            'table' => 'branches d',
            'join'	=> 'd.branch_id = b.building_booking_branch',
            'type'	=> 'left'
          );

      $join['data'][] = array(
            'table' => 'customers e',
            'join'	=> 'e.customer_id = b.building_booking_customer',
            'type'	=> 'left'
          );


      $where['data'][] = array(
                  'column' => 'a.book_payment_id',
                  'param'	 => $id
                );

      $where['data'][] = array(
                  'column' => 'b.building_booking_building',
                  'param'	 => $building
                );

      $where['data'][] = array(
                  'column' => 'b.building_booking_branch',
                  'param'	 => $branch
                );

      $row = $this->Global_m->globalselect($select, $table, $join, $where)->row();
      // echo $this->db->last_query();

        $data['val'] = array(
          'building_booking_id'         => $row->building_booking_id,
          'building_booking_code'       => $row->building_booking_code,
          'building_booking_building'     => $row->building_booking_building,
          'building_booking_branch'     => $row->building_booking_branch,
          'building_booking_customer'   => $row->building_booking_customer,
          'building_booking_date'       => date("d-m-Y", strtotime($row->building_booking_date)),
          'building_booking_date_for'   => date("d-m-Y", strtotime($row->building_booking_date_for)),
          'building_booking_time_1'     => $row->building_booking_time_1,
          'building_booking_time_2'     => $row->building_booking_time_2,
          'building_booking_status'     => $row->building_booking_status,
          'building_bookingCustomerName'=> $row->customer_name,
          'building_bookingBuildingName'=> $row->building_name,
          'building_hour_book'          => $row->building_hour_book,
          'building_price'              => $row->building_price
        );
    // $qBookingDetail =
    $data['title'][] = array(
		'title_page' 	  => 'Pembayaran',
		'title_page2' 	=> 'Print Pembayaran',
		);

    $this->load->library('pdf');

    $this->pdf->set_paper('A4', 'landscape');
		$this->pdf->load_view('print/bookpayment', $data);
		$this->pdf->render();
		$this->pdf->stream('Pembayaran',array("Attachment"=>false));
  }

}
