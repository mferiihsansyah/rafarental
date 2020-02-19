<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Bus extends MY_Controller
 * 
 *	Class ini untuk halaman Bus admin
 *
 *	@subpackage			model, view, helper, date
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Bus extends MY_Controller {


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
						'exdate_helper'
			);

		$array_model  = array(
						'Admin/Mbus',
						'Admin/Mfacility',
						'Admin/Mtroom'
			);

		// MODEL
		$this->load->model($array_model);

		// HELPER
		$this->load->helper($array_helper);
	}

	// Fungsi Index
	public function index()
	{	
		$this->check_waitlist();
		$this->check_transaction();
		// cek jika sudah login ata session login masih ada di cookie
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Mobil';
			$var['data']		= $this->Mbus->load_data();
			$var['tipe_mobil'] = $this->Mbus->load_tipe();
			$var['kursi_mobil']= $this->Mbus->load_kursi();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/bus/index', $var);
			
		}else
			{
				redirect('');
			}	
	}

	public function add()
	{	
		$this->check_waitlist();
		$this->check_transaction();
		$data['title_web'] 	= $this->web_title();
		$data['page_web']  	= 'Tambah Mobil';
		$data['tipe_mobil'] = $this->Mbus->load_tipe();
		$data['kursi_mobil']= $this->Mbus->load_kursi();

		$this->admin_template($data);
		$this->load->view('admin/part/bus/add',$data);
	}

	public function add_data()
	{	
		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');
		$stok = $this->input->post('stok');
		$biaya = $this->input->post('biaya');
		$id_kursi = $this->input->post('jumlah_kursi');
		$id_tipe= $this->input->post('tipe_mobil');
		$wait_list = $this->input->post('wait_list');

		$config['upload_path']	= FCPATH .'upload/mobil/';
		$config['allowed_types']= 'jpg|jpeg|png';
		$config['overwrite']	= true;
		$config['max_size']		= 10024;
		$config['max_width'] = 6000;
		$config['max_height']= 6000;
		
		$this->upload->initialize($config);
		$this->upload->do_upload('image_mobil');
		$upload_data = $this->upload->data();
		$image = $upload_data['file_name'];

		//Date Declaration
		$tgl	= date("Y-m-d H:i:s",now());
		$data = array(
			'name_vh'		=> $nama,
			'desc_vh'		=> $deskripsi,
			'qty_vh'		=> $stok,
			'price_vh'		=> $biaya,
			'date_time_vh'	=> $tgl,
			'type_vh'		=> $id_tipe,
			'waitlist_vh'	=> $wait_list,
			'seat_vh'		=> $id_kursi,
			'image_vh'		=> $image
		);

		$this->Mbus->input_data($data,'bb_vehicle');

		redirect('admin/bus/');
	
	}

	public function edit($id){
		$this->check_waitlist();
		$this->check_transaction();
		$data['title_web'] 	= $this->web_title();
		$data['page_web']  	= 'Edit Mobil';

		$where = array('id_vh' => $id);
		$data['mobil'] = $this->Mbus->edit_data($where,'bb_vehicle')->result();
		$this->admin_template($data);
		$this->load->view('admin/part/bus/edit',$data);
	}	

	public function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');
		$stok = $this->input->post('stok');
		$biaya = $this->input->post('biaya');

		$config['upload_path']	= './upload/mobil/';
		$config['allowed_types']= 'jpg|jpeg|png';
		$config['overwrite']	= true;
		$config['max_size']		= 10024;
		$config['max_width'] = 6000;
		$config['max_height']= 6000;
		
		$this->upload->initialize($config);
		$this->upload->do_upload('edit_mobil');
		$upload_data = $this->upload->data();
		if(!empty($_FILES["edit_mobil"]["name"])){
			$image = $upload_data['file_name'];
		}else{
			$image = $this->input->post('gambar_lama');
		}

		$data = array(
			'id_vh'		 => $id,
			'name_vh'	 => $nama,
			'desc_vh'	 => $deskripsi,
			'qty_vh'	 => $stok,
			'price_vh'	 => $biaya,
			'image_vh'	 => $image
		);
		$where = array(
			'id_vh'	=> $id
		);
		$this->Mbus->update_data($where,$data,'bb_vehicle');
		redirect('admin/bus');
	}

	public function delete($id){
		$where = array('id_vh' => $id);
		$this->Mbus->hapus_data($where,'bb_vehicle');
		redirect('admin/bus');
	}

	// Fungsi Index
	public function laporan()
	{	
		$this->check_waitlist();
		$this->check_transaction();
		// cek jika sudah login ata session login masih ada di cookie
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Laporan Data Bus';
			$var['data']		= $this->Mbus->load_laporanbus();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/bus/laporan', $var);
			
		}else
			{
				redirect('');
			}	
	}

}