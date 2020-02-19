<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Page extends MY_Controller
 * 
 *	Class ini untuk halaman tagihan
 *
 *	@subpackage			model, view, helper, date
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {


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
						'Public/Ppage',
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


	// FUNGSI INDEX
	public function index($slug)
	{	
		$this->check_waitlist();
		// var
		$var['title_web']		= 'Rafa Rental';
		$var['page_web']		= 'Kendaraan';

		// data
		$var['chat']			= $this->Puser->load_chat();
		$var['menu'] 			= $this->Msetting->load_menu();
		$var['page_data'] 		= $this->Ppage->load_data_by_slug($slug);
		$var['set_data']		= $this->Ppage->load_set_data();

		// setting
		$var['bank_data']  		= $this->Msetting->load_data_bank();
		$var['site_data']		= $this->Msetting->load_data_ws();
		$var['type_car']		= $this->Mtype->load_data();
		$var['seat_car']		= $this->Mseat->load_data();


		// template
		if ($this->session->userdata('status')=="Login") {
		$this->cs_template($var);
		$this->load->view('public/part/page/index', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footerlogin');
		}else{
		$this->public_template($var);
		$this->load->view('public/part/page/index', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footer');
		}
	}

	public function info_promo()
	{
		$this->check_waitlist();
		// var
		$var['title_web']		= 'Rafa Rental';
		$var['page_web']		= 'Kendaraan';

		// data
		$var['chat']			= $this->Puser->load_chat();
		$var['menu'] 			= $this->Msetting->load_menu();
		$var['set_data']		= $this->Ppage->load_set_data();

		// setting
		$var['bank_data']  		= $this->Msetting->load_data_bank();
		$var['site_data']		= $this->Msetting->load_data_ws();
		$var['type_car']		= $this->Mtype->load_data();
		$var['seat_car']		= $this->Mseat->load_data();


		// template
		if ($this->session->userdata('status')=="Login") {
		$this->cs_template($var);
		$this->load->view('public/part/page/promo', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footerlogin');
		}else{
		$this->public_template($var);
		$this->load->view('public/part/page/promo', $var);
		$this->load->view('public/template/end_content');
		$this->load->view('public/template/footer');
		}
	}
// end controller
}
