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

class Customer extends MY_Controller {


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
						'Admin/Mcustomer'
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
			$var['page_web']  	= 'Customer';
			$var['data']		= $this->Mcustomer->load_dataCS();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/customer/index', $var);
			
		}else
			{
				redirect('');
			}	
	}

	public function edit($id){
		$this->check_waitlist();
		$this->check_transaction();
		$data['title_web'] 	= $this->web_title();
		$data['page_web']  	= 'Edit Pelanggan';

		$where = array('id_cs' => $id);
		$data['mobil'] = $this->Mcustomer->edit_data($where,'bb_user')->result();
		$this->admin_template($data);
		$this->load->view('admin/part/customer/edit',$data);
	}	

	public function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$pass = $this->input->post('password');

		$data = array(
			'id_cs'		 => $id,
			'name_inv'	 => $nama,
			'email_cs'	 => $email,
			'pass_cs'	 => md5($pass)
		);
		$where = array(
			'id_cs'	=> $id
		);
		$this->Mcustomer->update_data($where,$data,'bb_user');
		redirect('admin/customer');
	}

	public function delete($id)
	{
		$where = array('id_cs' => $id);
		$this->Mcustomer->hapus_data($where,'bb_user');
		redirect('admin/customer');
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
			$var['page_web']  	= 'Laporan Data Pelanggan';
			$var['data']		= $this->Mcustomer->load_laporanCS();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/customer/laporan', $var);
			
		}else
			{
				redirect('');
			}	
	}

}