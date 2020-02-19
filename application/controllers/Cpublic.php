<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpublic extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		// load helper
		$this->load->helper('date');
		$this->load->helper('url');
		$this->load->helper('rpcurrency_helper');
		$this->load->helper('exdate_helper');
		$this->load->helper('websetting_helper');

		// load model
		$this->load->model('Public/Pfacility');
		$this->load->model('Public/Photel');
		$this->load->model('Public/Pinvoice');
		$this->load->model('Public/Pvehicle');
		$this->load->model('Public/Puser');
		$this->load->model('Admin/Msetting');
		$this->load->model('Admin/Mtype');
		$this->load->model('Admin/Mseat');
		$this->load->model('Admin/Mlogin');
		$this->load->model('Admin/Mpromo');

	}

	public function index()
	{

		// data
        $var['menu'] 			= $this->Msetting->load_menu();
		// var
		$var['title_web']		= $this->web_title();
		$var['page_web']		= 'Beranda';

		// view
		if ($this->session->userdata('status')=="Login") 
		{
		$this->load->view('public/template/head', $var);
		$this->load->view('public/part/home/cover', $var);
		$this->load->view('public/template/menu_head', $var);
		$this->load->view('public/part/home/slogan', $var);
		$this->load->view('public/part/home/endcover');
		}else{
		$this->load->view('public/template/head', $var);
		$this->load->view('public/part/home/cover', $var);
		$this->load->view('public/template/menu_head', $var);
		$this->load->view('public/part/home/slogan', $var);
		$this->load->view('public/part/home/endcover');
		$this->load->view('public/part/template/footer',$var);
		}
		redirect('kendaraan');

	}

	public function p_form()
	{

		$slug 					= $this->input->post('slug');
		$datec					= str_replace('/', '-', $this->input->post('checkin'));

		// var
		$var['title_web']		= $this->web_title();
		$var['page_web']		= $this->Photel->load_name($slug);

		// hootel data
		$var['hotel_data']		= $this->Photel->load_sc($slug);

		// checkin
		$date = date('d-m-Y', strtotime("+".$this->input->post('checkout')." day", strtotime($datec)));
		$var['checkin']			= $this->input->post('checkin');
		$var['checkout']		= $date;
		$var['long']			= $this->input->post('checkout');

		// view
		$this->load->view('public/template/head', $var);
		$this->load->view('public/template/menu_head', $var);
		$this->load->view('public/template/content', $var);
		$this->load->view('public/part/single/reserve_form', $var);
	}

	public function p_process_form()
	{
		$idvh 		= $this->input->post('id');
		$price 		= $this->input->post('harga');
		$name		= $this->input->post('nama');
		$email		= $this->input->post('email');
		$hp 		= $this->input->post('nohp');		
		$desti 		= $this->input->post('tujuan');
		$sdate		= $this->input->post('sdate');
		$long		= $this->input->post('lama');
		$price 		= $this->input->post('biaya');
		$bank 		= $this->input->post('bank');
		$kode		= $this->input->post('kode');

		//Destination Condition
		if($desti=="Luar Kota"){
			$price=$price+100000;
		}else{
			$price=$price;
		}
		$cek_kode	= $this->Pinvoice->check_code();
		if(count($cek_kode)>0)
		{
			foreach($cek_kode as $cek_kode)
			{
				$ds=$cek_kode->ds_promo;
			}
			$discount= $price*$ds/100;
		}else{
			$discount=0;
		}
		$date = date('Y-m-d', now());
		$time = date('H:i:s', now());

		// random generator
		$rn   = mt_rand(1000000, 9999999);

		$stdate = date('Y-m-d', strtotime($sdate)); 
		$fdate  = date('Y-m-d', strtotime("+".$long." day", strtotime($sdate)));

		// unique id
		$unique = substr(str_replace('-','',$date), 2).$rn;

		$datainv = array(
				'id_vh'			=> $idvh,
				'code_inv'		=> $unique,
				'name_inv'		=> $name,
				'handphone_inv'	=> $hp,
				'email_inv'		=> $email,
				'destination_inv'=>$desti,
				'start_date'	=> $sdate,
				'finish_date'	=> $fdate,
				'total_inv'		=> $price*$long-$discount,
				'id_bank' 		=> $bank,
				'status_inv'	=> 0,
				'penalty_inv'	=> 0,
				'f_total'		=> 0,
				'img_inv'		=> 0,
				'long_inv'		=> $long,
				'date_inv'   	=> $date,
				'date_time_inv' => $date.' '.$time
			);

		$this->db->insert('bb_invoice', $datainv);

		$id_inv = $this->db->insert_id();
		// Send link for verification

		$this->load->library('email');

		// configuration for protocol, host, port, user, and pass user email

		$config = array('protocol' => 'smtp', 'smtp_host' => 'ssl://smtp.googlemail.com', 'smtp_port' => '465', 'smtp_user' => 'ihsanferyy@gmail.com', 'smtp_pass' => 'redirect@1997',  'charset' => 'iso-8859-1', 'mailtype'  => 'html'
    	);

		$res = $this->Photel->load_inv($unique);

		foreach($res as $row)
		{
			$idhotel = $row->id_vh;
		}

		$var['hotel_data']		= $this->Photel->load_id($idhotel);
		$var['inv_data']		= $this->Photel->load_inv($unique);
		
		// initializing configuration
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");  

		// email content
		$this->email->from('ihsanferyy@gmail.com', $this->web_title());
		$this->email->to($email);
		$this->email->subject('Pembayaran Rental Mobil Rafa Palembang');
		$this->email->message($this->load->view('email/rent-invoice', $var, TRUE));

		if($this->email->send()){
			echo "email sent";
		} else {
                show_error($this->email->print_debugger());
            }

        $this->db->set('qty_vh','qty_vh-1',False);
		$this->db->where('id_vh',$idvh);
		$this->db->update('bb_vehicle');
		redirect('invoice/'.$unique);
		
	}

	public function p_invoice($unique_id)
	{
		// Send link for verification
		// var
		$var['chat']			= $this->Puser->load_chat();
		$var['title_web']		= $this->web_title();
		$var['page_web']		= 'Tagihan';
		$var['date_now']		= date('H:i:s', now());

		$res = $this->Photel->load_inv($unique_id);

		foreach($res as $row)
		{
			$idhotel = $row->id_vh;
		}

		$var['car_data']		= $this->Photel->load_id($idcar);
		$var['inv_data']		= $this->Photel->load_inv($unique_id);
		$this->load->view('public/template/head', $var);
		$this->load->view('public/template/menu_head', $var);
		$this->load->view('public/template/content', $var);
		$this->load->view('public/part/single/invoice', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footer', $var);
	}

	// FUNCTION ORDER CHECK
	public function p_order_check()
	{
		// data
		$var['menu'] 			= $this->Msetting->load_menu();
		$var['chat']			= $this->Puser->load_chat();
		
		// setting
		$var['car_data']		= $this->Pvehicle->load_kendaraan();
		$var['bank_data']  		= $this->Msetting->load_data_bank();
		$var['site_data']		= $this->Msetting->load_data_ws();
		$var['type_car']		= $this->Mtype->load_data();
		$var['seat_car']		= $this->Mseat->load_data();
		// var
		$var['title_web']		= 'Rafa Rental';
		$var['page_web']		= 'Cek Pemesanan';
		if ($this->session->userdata('status')=="Login") {
		$this->load->view('public/template/head', $var);
		$this->load->view('public/template/head_login', $var);
		$this->load->view('public/template/content', $var);
		$this->load->view('public/part/single/order_check', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footerlogin', $var);
		}else{
		$this->load->view('public/template/head', $var);
		$this->load->view('public/template/menu_head', $var);
		$this->load->view('public/template/content', $var);
		$this->load->view('public/part/single/order_check', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footer', $var);
		}
	}


		// child function
		function proccess_order_check()
		{
			$hp = $this->input->post('noHp');

			$do_check = $this->Pinvoice->order_check($hp);

			if(count($do_check)>0)
			{
				redirect('invoice/'.$id);
			}else
				{
					redirect('');
				}
		}


	// FUNCTION REGISTER
	public function register()
	{

		// var
		$var['title_web']		= $this->web_title();
		$var['page_web']		= 'Daftar Akun';

		// view
		$this->load->view('public/part/single/register', $var);

	}

	//Child Register
	public function go_reg()
	{
		$name 		= $this->input->post('name');
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$email 		= $this->input->post('email');
	
			$reg = array(
				'name_inv'		=> $name,
				'username_cs'	=> $username,
				'pass_cs'		=> md5($password),
				'email_cs'		=> $email
			);
		$res = $this->Puser->load_regis();
		foreach ($res as $load) 
		{
			$user= $load->username_cs;
			$emails=$load->email_cs;
		}
		if($username==$user && $email==$emails ){
			echo "<script>
			alert('Username atau Email Telah Terdaftar, Silakan Masukkan Username Lain');
			window.location.href='". base_url() ."register';  
			</script>";
		}else{
		$this->db->insert('bb_user', $reg);

		//Send Promo Code to Customer
		$this->load->library('email');
		// configuration for protocol, host, port, user, and pass user email

		$config = array('protocol' => 'smtp', 'smtp_host' => 'ssl://smtp.googlemail.com', 'smtp_port' => '465', 'smtp_user' => 'ihsanferyy@gmail.com', 'smtp_pass' => 'redirect@1997',  'charset' => 'iso-8859-1', 'mailtype'  => 'html'
    	);
		$this->load->helper('string');

		$promocode=random_string('alnum',12);
		$vars['nama']	= $name;
		$vars['promocodes']	= $promocode;

    	// initializing configuration
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");  

		// email content
		$this->email->from('ihsanferyy@gmail.com', $this->web_title());
		$this->email->to($email);
		$this->email->subject('Terima Kasih Sudah Menjadi Bagian Rental Mobil Rafa Palembang');
		$this->email->message($this->load->view('email/reg-success', $vars, TRUE));
		/*
		$this->email->message('Hai,'.$name.'Kamu Mendapatkan Kode Promo yang Bisa digunakan saat melakukan Sewa. <h4>'.$promocode.'</h4>');
		*/
		if($this->email->send()){
			echo "email sent";
			$resource=$this->Mpromo->load_data();
			foreach ($resource as $key) {
				$diskon=$key->ds_promo;
				$namapromo	=$key->nm_promo;
			}
			$datas = array(
				'codepromo'	=> $promocode,
				'nm_promo'	=> $namapromo,
				'ds_promo'	=> $diskon
			);

			$this->db->insert('bb_promo',$datas);
		} else {
                show_error($this->email->print_debugger());
        }
		echo "<script>
			alert('Terima Kasih Sudah Menjadi Bagian Dari Rafa Rental');
			window.location.href='". base_url() ."login_user';  
			</script>";	
		}
	}

	//FUNCTION LOGIN CUSTOMER 
	public function login_user()
	{
		// var 
		$var['title_web']		= $this->web_title();
		$var['page_web']		= 'Halaman Login';

		//view
		$this->load->view('public/part/single/login',$var);
	}

	// FUNCTION Saran Keluhan
	public function saran()
	{
		// data
		$var['menu'] 			= $this->Msetting->load_menu();
		$var['chat']			= $this->Puser->load_chat();
		
		// setting
		$var['bank_data']  		= $this->Msetting->load_data_bank();
		$var['site_data']		= $this->Msetting->load_data_ws();
		$var['type_car']		= $this->Mtype->load_data();
		$var['seat_car']		= $this->Mseat->load_data();
		// var
		$var['title_web']		= 'Rafa Rental';
		$var['page_web']		= 'Saran dan Keluhan';

		if ($this->session->userdata('status')=="Login") {
		$this->load->view('public/template/head', $var);
		$this->load->view('public/template/head_login', $var);
		$this->load->view('public/template/content', $var);
		$this->load->view('public/part/single/idea', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footerlogin', $var);
		}else{
		$this->load->view('public/template/head', $var);
		$this->load->view('public/template/menu_head', $var);
		$this->load->view('public/template/content', $var);
		$this->load->view('public/part/single/idea', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footer', $var);
		}

	}
		// child function
		function cek_saran()
		{
			$name = $this->input->post('orderId');
			$saran = $this->input->post('noHp');

			$saran = array(
				'name_id'	=> $name,
				'idea'		=> $saran
			);

		$this->db->insert('bb_idea', $saran);
			echo "<script>
			alert('Terima Kasih Atas Saran dan Keluhan Anda');
			window.location.href='". base_url() ."saran';  
			</script>";
		}
	
	public function waitlist()
	{
		$var['menu'] 			= $this->Msetting->load_menu();
		$var['chat']			= $this->Puser->load_chat();
		
		// setting
		$var['bank_data']  		= $this->Msetting->load_data_bank();
		$var['type_car']		= $this->Mtype->load_data();
		$var['seat_car']		= $this->Mseat->load_data();
		$var['site_data']		= $this->Msetting->load_data_ws();
		// var
		$var['title_web']		= 'Rafa Rental';
		$var['page_web']		= 'Waiting List';

		// view
		if ($this->session->userdata('status')=="Login") {
		$this->load->view('public/template/head', $var);
		$this->load->view('public/template/head_login', $var);
		$this->load->view('public/template/content', $var);
		$this->load->view('public/part/single/wait_list', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footerlogin', $var);
		}else{
		$this->load->view('public/template/head', $var);
		$this->load->view('public/template/menu_head', $var);
		$this->load->view('public/template/content', $var);
		$this->load->view('public/part/single/wait_list', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footer', $var);
		}
	}	

	public function timer($unique)
	{

		$res		= $this->Photel->load_inv($unique);
		$date_now	= date('Y-m-d H:i:s', now());

		foreach($res as $row)
		{
			$datetime = $row->date_time;
		}

		$awal  = new DateTime($datetime);
		$akhir = new DateTime($date_now);
		$diff  = $awal->diff($akhir);

		if($diff->h > 0)
		{
			echo "Waktu pembayaran telah habis";
		}
		else
		{
			echo 120-$diff->i . ' Menit ';
			echo 60-$diff->s . ' Detik ';
		}
	}


	// AUTO UPDATE STATUS INVOICE
	public function checkinv()
	{
		$res		= $this->Pinvoice->load_data_check();
		$date_now	= date('Y-m-d H:i:s', now());

		foreach($res as $row)
		{
			$datetime = $row->date_time_inv;

			$awal  = new DateTime($datetime);
			$akhir = new DateTime($date_now);
			$diff  = $awal->diff($akhir);

			if($diff->h > 0)
			{
				$this->Pinvoice->update($row->id_inv, $row->status);
			}
		}
	}

	public function chatting()
	{	
		$nama 	= $this->session->userdata('nama');
		$teks   = str_replace(' ', '-', $nama);
		$tujuan = 'Admin';
		$isi 	= $this->input->post('isi_chat');
		$date_chat = date('Y-m-d',now());
		$time_chat = date('H:i:s', now());

		$data = array(
			'name_chat'		=> $teks,
			'rec_chat'		=> $tujuan,
			'content'		=> $isi,
			'date_chat'		=> $date_chat,
			'time_chat'		=> $time_chat,
			'status_chat'	=> 0
		);

		$this->db->insert('bb_chat',$data);
		echo "<script>window.history.go(-2);
		</script>";
		
	}	

	public function process_waitlist()
	{	
		$id_vh	= $this->input->post('id');
		$name 	= $this->input->post('nama');
		$email 	= $this->input->post('email');
		$nohp 	= $this->input->post('nohp');
		$tgl_wl = $this->input->post('sdate');
		$tgl	= date('Y-m-d',now());
		$time	= $this->input->post('stime');
		$rn   = mt_rand(1000000, 9999999);

		// unique id
		$unique = substr(str_replace('-','',$date), 2).$rn;
		$data = array(
			'id_vh'		=> $id_vh,
			'code_wl'	=> $unique,
			'name_wl'	=> $name,
			'email_wl'	=> $email,
			'hp_wl'		=> $nohp,
			'date_wl'	=> $tgl,
			'time_wl'	=> $time,
			'start_date_wl'=> $tgl_wl
		);
		$this->db->insert('bb_waitlist',$data);
		echo "<script>
			alert('Berhasil Memasukkan di Waiting List');
			window.location.href='". base_url() ."kendaraan';  
			</script>";
	}

// akhir controller
}
