<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Type extends MY_Controller
 * 
 *	Class ini untuk halaman tipe
 *
 *	@subpackage			model, view
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends MY_Controller {


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
						'exdate_helper'
			);

		$array_model  = array(
						'Admin/Mtype',
			);

		// MODEL
		$this->load->model($array_model);

		// HELPER
		$this->load->helper($array_helper);
	}

	// fungsi index
	public function index()
	{	
		$this->check_waitlist();
		$this->check_transaction();
		// cek jika sudah login ata session login masih ada di cookie
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Tipe Kendaraan';
			$var['data']		= $this->Mtype->load_data();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/type/index');
			
		}else
			{
				redirect('');
			}
	}

	public function add()
		{
			$data['title_web'] 	= $this->web_title();
			$data['page_web']  	= 'Tambah Tipe Mobil';

			$this->admin_template($data);
			$this->load->view('admin/part/type/input',$data);
		}

	public function add_data()
	{	
		$tipe = $this->input->post('type');
		$des_tipe = $this->input->post('desc_type');

		$data = array(
			'name_cat'	=> $tipe,
			'desc_cat'	=> $des_tipe,
		);
		$this->Mtype->input_data($data,'bb_category');

		redirect('admin/bus/tipe');

	}

	public function edit($id){
		$data['title_web'] 	= $this->web_title();
		$data['page_web']  	= 'Edit Tipe Mobil';

		$where = array('id_cat' => $id);
		$data['mobil'] = $this->Mtype->edit_data($where,'bb_category')->result();

		$this->admin_template($data);
		$this->load->view('admin/part/type/edit',$data);
	}	

	public function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('type');
		$deskripsi = $this->input->post('des_type');

		$data = array(
			'id_cat'		 => $id,
			'name_cat'	 => $nama,
			'desc_cat'	 => $deskripsi,
		);
		$where = array(
			'id_cat'	=> $id
		);
		$this->Mtype->update_data($where,$data,'bb_category');
		redirect('admin/bus/tipe');
	}

	public function delete($id){
		$where = array('id_cat' => $id);
		$this->Mtype->hapus_data($where,'bb_category');
		redirect('admin/bus/tipe');
	}
// end model
}