<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Seat extends MY_Controller
 * 
 *	Class ini untuk halaman seat
 *
 *	@subpackage			model, view
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Seat extends MY_Controller {


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
						'exDate_helper'
			);

		$array_model  = array(
						'admin/mseat',
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
			$var['page_web']  	= 'Jumlah Kursi Mobil';
			$var['data']		= $this->mseat->load_data();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/seat/index');
			
		}else
			{
				redirect('');
			}
	}

	public function add()
	{
		$data['title_web'] 	= $this->web_title();
		$data['page_web']  	= 'Tambah Data Jumlah Kursi';

		$this->admin_template($data);
		$this->load->view('admin/part/seat/input',$data);
	}

	public function add_data()
	{
		$kursi=$this->input->post('j_kursi');
		$data = array( 'total_seat' => $kursi);
		$this->mseat->input_data($data,'bb_seat');
		redirect('admin/seat');
	}

	public function delete($id){
		$where = array('id_seat' => $id);
		$this->mseat->hapus_data($where,'bb_seat');
		redirect('admin/seat');
	}
// end model
}