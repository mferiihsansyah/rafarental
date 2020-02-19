<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Dashboard extends MY_Controller
 * 
 *	Class ini untuk halaman index / dashboard admin
 *
 *	@subpackage			model, view
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


	function __construct()
	{
		parent::__construct();

		$this->load->model('Admin/Minvoice');
	}

	// fungsi index
	function index()
	{	
		$this->check_waitlist();
		$this->check_transaction();
		// cek jika sudah login ata session login masih ada di cookie
		if ($this->is_logged_in()) 
		{
			// data variable untuk passing ke view
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Beranda';

			$var['graphic_data'] = $this->Minvoice->graphic();

			$var['pend'] = count($this->Minvoice->load_pend());
			$var['conf'] = count($this->Minvoice->load_conf());
			$var['cancel'] = count($this->Minvoice->load_cancel());

			//Pelanggan
			$var['cs_data']	= $this->Minvoice->cs_data();
			// tampilan
			$this->admin_template($var);
			$this->load->view('admin/part/home/index', $var);
			
		}else
			{
				redirect('');
			}
	}

}