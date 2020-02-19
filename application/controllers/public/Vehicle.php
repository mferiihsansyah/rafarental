<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Vehicle extends MY_Controller
 * 
 *	Class ini untuk halaman Kendaraan
 *
 *	@subpackage			model, view, helper, date
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends MY_Controller {


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
						'Admin/Msetting',
						'Public/Pvehicle',
						'Admin/Mtype',
						'Admin/Mseat',
						'Public/Puser'
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
		// var
		$var['title_web']		= 'Rafa Rental';
		$var['page_web']		= 'Kendaraan';

		// data
		$var['chat']			= $this->Puser->load_chat();
		$var['menu'] 			= $this->Msetting->load_menu();
		$var['bus_data'] 		= $this->Pvehicle->load_data();
		$var['mobil']			= $this->Pvehicle->load_mobil_order();
		$var['mobil_banyak'] 	= $this->Pvehicle->load_mobil_banyak();

		// setting
		$var['bank_data']  		= $this->Msetting->load_data_bank();
		$var['site_data']		= $this->Msetting->load_data_ws();
		$var['type_car']		= $this->Mtype->load_data();
		$var['seat_car']		= $this->Mseat->load_data();
		if ($this->session->userdata('status')=="Login") 
		{
		// template
		$this->cs_template($var);
		$this->load->view('public/part/bus/index', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footerlogin');
		}else{
		// template
		$this->public_template($var);
		$this->load->view('public/part/bus/index', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footer');
		}

	}

	public function list()
	{	
		$this->check_waitlist();
		// var
		$var['title_web']		= 'Rafa Rental';
		$var['page_web']		= 'Daftar Kendaraan';

		// data
		$var['chat']			= $this->Puser->load_chat();
		$var['menu'] 			= $this->Msetting->load_menu();
		$var['data'] 			= $this->Pvehicle->load_data_mobil();
		$var['data_mobil']		= $this->Pvehicle->load_data_slider();
		$var['mobil']			= $this->Pvehicle->load_mobil_order();
		$var['mobil_banyak'] 	= $this->Pvehicle->load_mobil_banyak();
		$var['recomend']		= $this->Pvehicle->load_rekomendasi();
		$var['cek_rec']			= count($this->Pvehicle->load_rekomendasi());

		// setting
		$var['bank_data']  		= $this->Msetting->load_data_bank();
		$var['site_data']		= $this->Msetting->load_data_ws();
		$var['type_car']		= $this->Mtype->load_data();
		$var['seat_car']		= $this->Mseat->load_data();
		if ($this->session->userdata('status')=="Login") 
		{
		// template
		$this->cs_template($var);
		$this->load->view('public/part/single/rent_bus', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footerlogin');
		}else{
		// template
		$this->public_template($var);
		$this->load->view('public/part/single/rent_bus', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footer');
		}

	}

	public function search_list($mirip)
	{
		// var
		$var['mirip']			= $mirip;
		$var['title_web']		= 'Rafa Rental';
		$var['page_web']		= 'Daftar Kendaraan';

		// data
		$var['chat']			= $this->Puser->load_chat();
		$var['menu'] 			= $this->Msetting->load_menu();
		$var['data'] 			= $this->Pvehicle->search_data_mobil($mirip);
		$var['hitung'] 			= count($this->Pvehicle->search_data_mobil($mirip));
		$var['data_mobil']		= $this->Pvehicle->load_data_slider();
		$var['mobil']			= $this->Pvehicle->load_mobil_order();
		$var['mobil_banyak'] 	= $this->Pvehicle->load_mobil_banyak();
		$var['recomend']		= $this->Pvehicle->load_rekomendasi();
		$var['cek_rec']			= count($this->Pvehicle->load_rekomendasi());

		// setting
		$var['bank_data']  		= $this->Msetting->load_data_bank();
		$var['site_data']		= $this->Msetting->load_data_ws();
		$var['type_car']		= $this->Mtype->load_data();
		$var['seat_car']		= $this->Mseat->load_data();
		if ($this->session->userdata('status')=="Login") 
		{
		// template
		$this->cs_template($var);
		$this->load->view('public/part/single/search_bus', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footerlogin');
		}else{
		// template
		$this->public_template($var);
		$this->load->view('public/part/single/search_bus', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footer');
		}

	}

	// fungsi kendaraan / halaman
	public function single_page($id)
	{
		// var
		$var['chat']			= $this->Puser->load_chat();
		$var['title_web']		= 'Rafa Rental';
		$var['page_web']		= $this->Pvehicle->load_name($id);
		$var['menu'] 			= $this->Msetting->load_menu();

		// data
		$var['bus_data']  		= $this->Pvehicle->load_sc($id);

		// setting
		$var['bank_data']  		= $this->Msetting->load_data_bank();
		$var['site_data']		= $this->Msetting->load_data_ws();
		$var['type_car']		= $this->Mtype->load_data();
		$var['seat_car']		= $this->Mseat->load_data();

		// template
		if ($this->session->userdata('status')=="Login") 
		{
		// template
		$this->cs_template($var);
		$this->load->view('public/part/single/bus', $var);
		$this->load->view('public/template/footerlogin', $var);
		}else{
		// template
		$this->public_template($var);
		$this->load->view('public/part/single/bus', $var);
		$this->load->view('public/template/footer', $var);
		}

	}

	//fungsi sewa / halaman
	public function single_rent($id)
	{
		// var
		$var['chat']			= $this->Puser->load_chat();
		$var['title_web']		= 'Rafa Rental';
		$var['page_web']		= $this->Pvehicle->load_name($id);
		$var['menu'] 			= $this->Msetting->load_menu();

		// data
		$var['bus_data']  		= $this->Pvehicle->load_sc($id);

		// setting
		$var['bank_data']  		= $this->Msetting->load_data_bank();
		$var['site_data']		= $this->Msetting->load_data_ws();
		$var['type_car']		= $this->Mtype->load_data();
		$var['seat_car']		= $this->Mseat->load_data();

		// template
		if ($this->session->userdata('status')=="Login") 
		{
		// template
		$this->cs_template($var);
		$this->load->view('public/part/single/rent', $var);
		$this->load->view('public/template/footerlogin', $var);
		}else{
		$this->public_template($var);
		$this->load->view('public/part/single/rent', $var);
		$this->load->view('public/template/footer', $var);
		}
	}
	public function login()
	{
		$var['title_web']		= 'Rafa Rental';
		$var['page_web']		= 'Login';

		//template
		$this->load->view('public/part/bus/login');
	}

	public function waitlist($id)
	{
		// var
		$var['chat']			= $this->Puser->load_chat();
		$var['title_web']		= 'Rafa Rental';
		$var['page_web']		= $this->Pvehicle->load_name($id);
		$var['menu'] 			= $this->Msetting->load_menu();

		// data
		$var['bus_data']  		= $this->Pvehicle->load_sc($id);

		// setting
		$var['bank_data']  		= $this->Msetting->load_data_bank();
		$var['site_data']		= $this->Msetting->load_data_ws();
		$var['type_car']		= $this->Mtype->load_data();
		$var['seat_car']		= $this->Mseat->load_data();

		// template
		if ($this->session->userdata('status')=="Login") 
		{
		// template
		$this->cs_template($var);
		$this->load->view('public/part/single/waiting_list', $var);
		$this->load->view('public/template/footerlogin', $var);
		}else{
		$this->public_template($var);
		$this->load->view('public/part/single/waiting_list', $var);
		$this->load->view('public/template/footer', $var);
		}
	}
// end model
}