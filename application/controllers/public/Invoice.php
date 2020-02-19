<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Invoice extends MY_Controller
 * 
 *	Class ini untuk halaman tagihan
 *
 *	@subpackage			model, view, helper, date
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MY_Controller {


	// Konstruktur
	function __construct()
	{
		parent::__construct();

		// mengambil data model, library, helper


		/**
		 *
		 * Model dan Helper di define dengan array
		 *
		*/

		$array_helper = array(
						'rpcurrency_helper',
						'exdate_helper',
						'websetting_helper'
			);

		$array_model  = array(
						'Public/Pvehicle',
						'Public/Pinvoice',
						'Public/Puser',
						'Admin/Msetting',
						'Admin/Mtype',
						'Admin/Mseat'
			);

		// MODEL
		$this->load->model($array_model);

		// HELPER
		$this->load->helper($array_helper);
	}

	// fungsi index
	public function index($unique_id)
	{
		$this->check_waitlist();
		// var
		$var['title_web']		= 'Rafa Rental';
		$var['page_web']		= 'Tagihan';
		$var['date_now']		= date('H:i:s', now());
		// setting
		$var['chat']			= $this->Puser->load_chat();
		$var['bank_data']  		= $this->Msetting->load_data_bank();
		$var['site_data']		= $this->Msetting->load_data_ws();
		$var['type_car']		= $this->Mtype->load_data();
		$var['seat_car']		= $this->Mseat->load_data();
		// data
		$res = $this->Pinvoice->load_inv($unique_id);
		$var['menu'] 			= $this->Msetting->load_menu();

		foreach($res as $row)
		{
			$id_car = $row->id_vh;
		}
		$var['car_data']		= $this->Pinvoice->load_idcar($id_car);
		$var['inv_data']		= $this->Pinvoice->load_inv($unique_id);

		// setting
		$var['bank_data']  		= $this->Msetting->load_data_bank();

		//confirmation
		$time		= $this->Pinvoice->load_inv($unique_id);
		$date_now	= date('Y-m-d H:i:s', now());

		foreach($time as $row)
		{
			$datetime = $row->date_time_inv;
		}

		$awal  = new DateTime($datetime);
		$akhir = new DateTime($date_now);
		$diff  = $awal->diff($akhir);

		$var['limit'] 		   = $diff->h;

		// view
		$this->cs_template($var);
		$this->load->view('public/part/single/invoice', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footerlogin', $var);
	}

	// timer tagihan
	public function timer($unique)
	{

		$res		= $this->Pinvoice->load_inv($unique);
		$date_now	= date('Y-m-d H:i:s', now());

		foreach($res as $row)
		{
			$datetime = $row->date_time_inv;
		}

		$awal  = new DateTime($datetime);
		$akhir = new DateTime($date_now);
		$diff  = $awal->diff($akhir);
		/*
		if($diff->h > 0)
		{
			$var['status_bayar']='Waktu pembayaran telah habis';
		}
		else
		{
			$var['status_bayar']='echo 60-$diff->i . ' Menit ';
			echo 60-$diff->s . ' Detik ';
			echo "<br><br><div class='btn btn-success conf'>Konfirmasi Pemabayaran</div><br><br>";';		
		}*/
	}

	// konfirmasi tagihan
	public function conf_invoice($unique_id)
	{
		$var['inv_data'] 	= $this->Pinvoice->load_inv($unique_id);

		// view
		$this->load->view('public/part/single/confirm_invoice.php', $var);
	}

	public function process_invoice()
	{
		$this->Pinvoice->confirm();

		echo "Terimakasih telah konfirmasi pembayaran, konfirmasi akan kami process.";
	}

	public function upload_bukti()
	{
		$kode=$this->input->post('kodetransaksi');
		$idvh=$this->input->post('idvh');
		$batas=$this->input->post('batas');
		$config['upload_path']	= './upload/bukti/';
		$config['allowed_types']= 'jpg|jpeg|png';
		$config['overwrite']	= true;
		$config['max_size']		= 10024;
		$config['max_width'] = 6000;
		$config['max_height']= 6000;

		$get = $this->Pinvoice->load_invoice($kode);
		foreach ($get as $key) {
			$tglmulai = date('H:i:s',$key->date_time_inv);
		}
		if($batas>$tglmulai){


		$this->upload->initialize($config);
		$this->upload->do_upload('imgbukti');
		$upload_data = $this->upload->data();
		if(empty($_FILES["imgbukti"]["name"])){
			echo "Gagal";
		}else{
			$image = $upload_data['file_name'];
		
		$data = array(
			'status_inv' => '1',
			'img_inv'	 => $image
		);
		$where = array(
			'code_inv'	=> $kode
		);
		$this->Pinvoice->upload_imgbukti($where,$data,'bb_invoice');
		redirect('ordercheck');
		}
	}else{
		$data = array(
			'status_inv' => '9'
		);
		$where = array(
			'code_inv'	=> $kode
		);
		$this->db->update('bb_invoice',$data,$where);
		$this->db->set('qty_vh','qty_vh+1',False);
		$this->db->where('id_vh',$idvh);
		$this->db->update('bb_vehicle');
	}

	}

// end model
}
