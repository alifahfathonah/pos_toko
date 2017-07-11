<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_interface_c extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Customer_interface_m');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->get_header_customer();
    $this->customer_interface();
    $this->get_footer_customer();
  }

  function customer_interface()
  {
    $where         = '';
    $data = array(
					'branches'		=> $this->select_config('branches',$where)
					// 'action'	=> "Customer_interface_c/buil",
				);

    $this->load->view('customer_interface/customer_interface_view', $data);
  }


  // data-json
  function get_lapangan()
  {
    $branch_id = $this->input->post('branch_id');
    $where_branch_id = "WHERE branch = '$branch_id'";
    $q_buildings = $this->Customer_interface_m->get_lapangan($branch_id);
    // <div class="status-lapangan">Available</div>
    foreach ($q_buildings->result() as $r_building)
    {
      $status_building = "<div class='status-lapangan no-available'>".$r_building->status_building_name."</div>";
      if ($r_building->status_building_id == 1) { $status_building = "<div class='status-lapangan available'>".$r_building->status_building_name."</div>"; }

      $data[] = array(
                                'building_id'           => $r_building->building_id,
                                'building_status'       => $r_building->building_status,
                                'building_name'         => $r_building->building_name,
                                'building_img'          => $r_building->building_img,
                                'path'                  =>  base_url().'assets/img/buildings/',
                                'status_building_name'  => $r_building->status_building_name,
                                'status_building_id'    => $r_building->status_building_id,
                                'status'                => $status_building,
                                'branch'                => $r_building->branch
                              );

    };
    echo json_encode($data);

  }

  function popmodal_booking($branch, $building)
  {
      $where_building_and_branch_id = array(
          'building_id' => $building,
          'branch' => $branch
     );

     $data = array(
                    'buildings'   => $this->select_config_array('buildings', $where_building_and_branch_id)->row(),
                    'building_id' => $building,
                    'branch_id'   => $branch,
                    'action'      => "Customer_interface_c/save_booking"
                  );

      $this->load->view('customer_interface/popmodal_booking', $data);
  }

  function get_time()
  {
    $building   = $this->input->post('building_id');
    $branch     = $this->input->post('branch_id');
    $i_tangggal = $this->input->post('i_tangggal');
    $i_tangggal_   = date("Y-m-d", strtotime($i_tangggal));

    $where_building_and_branch_id = array(
        'building_booking_building' => $building,
        'building_booking_branch'   => $branch,
        'building_booking_date_for' => $i_tangggal_
      );

    $where_branch_id = array('branch_id' => $branch );

    $q_booking = $this->Global_m->select_config_array('building_booking', $where_building_and_branch_id);
    $r_branch  = $this->Global_m->select_config_array('branches', $where_branch_id)->row();

    foreach ($q_booking->result() as $r_booking) {
      $data['booking'][] = array(
                                  'building_booking_time_1' => $r_booking->building_booking_time_1,
                                  'building_booking_time_2' => $r_booking->building_booking_time_2
                                );

    }

    $data['open_time'] = array(
      'branch_hour_1'     => date("H:m", $r_branch->branch_hour_1),
      'branch_hour_2'     => date("H:m", $r_branch->branch_hour_2),
      'strbranch_hour_1'  => $r_branch->branch_hour_1,
      'strbranch_hour_2'  => $r_branch->branch_hour_2,
    );

    echo json_encode($data);

  }

  function save_booking()
  {

    $i_building   = $this->input->post('i_building');
    $i_branch     = $this->input->post('i_branch');

    $i_name       = $this->input->post('i_name');
    $i_nik        = $this->input->post('i_nik');
    $i_alamat     = $this->input->post('i_alamat');
    $i_phone      = $this->input->post('i_phone');
    $i_email      = $this->input->post('i_email');

    $i_tangggal   = $this->input->post('i_tangggal');
    $i_tangggal_   = date("Y-m-d", strtotime($i_tangggal));

    $i_jam_1      = $this->input->post('i_jam_1');
    $i_jam_2      = $this->input->post('i_jam_2');
    $data = array();

    $i_code       = $this->generate_code($i_tangggal, $i_jam_1, $i_jam_2, $i_building, $i_branch );
    $data_customer = array(
                            'customer_name'     => $i_name,
                            'customer_nik'      => $i_nik,
                            'customer_address'  => $i_alamat,
                            'customer_phone'    => $i_phone,
                            'customer_email'    => $i_email,
                            'customer_status'   => 1
                          );

    $customer_id = $this->Global_m->create_config('customers', $data_customer);



    $data_booking = array(
                  'building_booking_building'     => $i_building,
                  'building_booking_code'         => $i_code,
                  'building_booking_branch'       => $i_branch,
                  'building_booking_customer'     => $customer_id,
                  'building_booking_user'         => '',
                  'building_booking_date'         => date("Y-m-d"),
                  'building_booking_date_for'     => $i_tangggal_,
                  'building_booking_time_1'       => $i_jam_1,
                  'building_booking_time_2'       => $i_jam_2,
                  'building_booking_status'       => 1,
                  'building_booking_status_desc'  => 'Belum Ada Konfirmasi',
                  'building_bukti_upload_date'    => '',
                  'building_bukti_img'            => ''
                );

    // $this->create_config('building_booking', $data_booking);
    $id = $this->Global_m->create_config('building_booking', $data_booking);
    $wherebranchid = array(
      'branch_id' => $i_branch,
    );
    $branch_mail = $this->Global_m->select_config_one('branches', 'branch_email', $wherebranchid);
    if ($id){
      $this->send_email();
      $data['status'] = '200';
      $data['customer'] = $customer_id;
    } else {
      $data['status'] = '204';
    }

    echo json_encode($data);

  }

  function send_email(){
      $this->load->library('MyPHPMailer');
      $fromEmail = "lntngp19@gmail.com";
      $isiEmail = "Isi email tulis disini";

      $mail = new PHPMailer();
      $mail->IsHTML(true);    // set email format to HTML
      $mail->IsSMTP();   // we are going to use SMTP
      $mail->SMTPAuth   = true; // enabled SMTP authentication
      $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
      $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
      $mail->Port       = 465;                   // SMTP port to connect to GMail
      $mail->Username   = $fromEmail;  // alamat email kamu
      $mail->Password   = "permanaday19";            // password GMail
      $mail->SetFrom('info@yourdomain.com', 'noreply');  //Siapa yg mengirim email
      $mail->Subject    = "Subjek email";
      $mail->Body       = $isiEmail;
      $toEmail = "lntngppp@gmail.com"; // siapa yg menerima email ini
      $mail->AddAddress($toEmail);

      $mail->Send();

  }

  function generate_code($tanggal, $jam1, $jam2, $i_building, $i_branch)
  {
    $i_code = $tanggal."/".$jam1."/".$jam2."/".$i_building."/".$i_branch;
    return $i_code;
  }

  function logincustomer_popmodal()
  {
    $this->load->view('customer_interface/logincustomer_popmodal');
  }

  public function checkcustomerlogin()
	{
		$i_username = $this->input->post('i_username');
		$i_email = $this->input->post('i_email');

		$where = array(
			'customer_name'     => $i_username,
			'customer_email'    => $i_email
			);

		$status = 0;
		$cek = $this->Customer_interface_m->cek_login("customers",$where)->num_rows();
    $customer_id = $this->select_config_one('customers', 'customer_id', $where);
    $data = array();
    $data['customer_id'] = $customer_id->customer_id;

		if ($cek > 0) {
			$data['status'] = '200';
		} else {
		  $data['status'] = '204';
		}

		echo json_encode($data);
	}

  function customerformdetailindex($customer_id)
  {
    $this->get_header_customer();
    $this->customerformdetail($customer_id);
    $this->get_footer_customer();
  }

  function customerformdetail($customer_id)
  {
    $select = "a.*, b.*, c.*, d.building_name";
    $table = 'customers a';
    $where = array('a.customer_id' => $customer_id);

    $join['data'][] = array(
					'table' => 'building_booking b',
					'join'	=> 'b.building_booking_customer = a.customer_id',
					'type'	=> 'left'
				);

    $join['data'][] = array(
          'table' => 'branches c',
          'join'	=> 'c.branch_id = b.building_booking_branch',
          'type'	=> 'left'
        );

    $join['data'][] = array(
          'table' => 'buildings d',
          'join'	=> 'd.building_id = b.building_booking_building',
          'type'	=> 'left'
        );

    $data = array(
      'customer' => $this->Global_m->globalselect($select, $table, $join, NULL, $where)->row(),
      'action'   => "Customer_interface_c/savebuktipembayaran"
     );
    //  echo $this->db->last_query();
    $this->load->view('customer_interface/customerformdetail', $data);
  }

  function savebuktipembayaran(){
    $customer_id = $this->input->post('customer_id');
    $i_img = $_FILES["i_img"]["name"];

    $tanggal = date("Y-m-d H:m:s");
    $where = array(
      'building_booking_customer' => $customer_id,
      'building_booking_status' => 1
    );

    $datasimpan = array(
      'building_booking_status'      => 2,
      'building_booking_status_desc' => 'sudah mengirim bukti',
      'building_bukti_upload_date'   => $tanggal,
      'building_bukti_img'           => $i_img
   );
   $update = $this->Global_m->update_config('building_booking', $datasimpan, $where);

   $i_mg_file = isset($_FILES['i_img']['name']) ? $_FILES['i_img']['name']: " ";
   $config['upload_path']          = './assets/img/bukti_booking/';
   $config['allowed_types']        = 'gif|jpg|png|exe|xls|doc|docx|xlsx|rar|zip';
   $config['max_size']             = '8192';
   $config['remove_spaces']        = TRUE;  //it will remove all spaces

   $this->load->library('upload', $config);

   if ($i_mg_file) {$this->upload->do_upload('i_img');}
   $data['status'] = $update;

   echo json_encode($data);

  }
}
