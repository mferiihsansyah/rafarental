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

class Driver extends MY_Controller {


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
						'rpCurrency_helper',
						'exDate_helper'
			);

		$array_model  = array(
						'admin/mbus',
						'admin/mfacility',
						'admin/mtroom',
						'admin/mdriver'
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
			$var['page_web']  	= 'Supir';
			$var['data']		= $this->mdriver->load_data();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/driver/index', $var);
			
		}else
			{
				redirect('');
			}	
	}

	public function add_data()
	{
		$nama=$this->input->post('supir');
		$hp=$this->input->post('handphone');
		$alamat=$this->input->post('alamat');

		$data = array(
		 'nm_driver' 	=> $nama,
		 'telp_driver'	=> $hp,
		 'alamat_driver'=> $alamat
		);
		$this->mdriver->input_data($data,'bb_driver');
		redirect('admin/supir');
	}

	public function delete($id)
	{
		$where = array('id_driver' => $id);
		$this->mdriver->hapus_data($where,'bb_driver');
		redirect('admin/supir');
	}

}