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

class Idea extends MY_Controller {


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
						'Admin/Midea'
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
			$var['page_web']  	= 'Saran dan Keluhan';
			$var['data']		= $this->Midea->load_data();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/idea/index', $var);
			
		}else
			{
				redirect('');
			}	
	}


}