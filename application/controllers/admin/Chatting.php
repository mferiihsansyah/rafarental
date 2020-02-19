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

class Chatting extends MY_Controller {


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
						'Admin/Mtroom',
						'Public/Puser'
			);

		// MODEL
		$this->load->model($array_model);

		// HELPER
		$this->load->helper($array_helper);
	}

	public function index()
	{	
		$this->check_waitlist();
		$this->check_transaction();
		// cek jika sudah login ata session login masih ada di cookie
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Chatting';

			$var['data']		= $this->Puser->load_inbox();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/chat/index', $var);
			
		}else
			{
				redirect('');
			}	
	}

	public function read($id){
		$this->check_waitlist();
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Chatting';

			$var['data']		= $this->Puser->load_read_inbox($id);

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/chat/single_chat', $var);
			
		}else
			{
				redirect('');
			}	
	}

	public function send(){
		
		$nama	= 'Admin';
		$isi 	= $this->input->post('pesan');
		$date_chat = date('Y-m-d',now());
		$time_chat = date('H:i:s', now());
		$tujuan = $this->input->post('id');

		$data = array(
			'name_chat'		=> $nama,
			'rec_chat'		=> $tujuan,
			'content'		=> $isi,
			'date_chat'		=> $date_chat,
			'time_chat'		=> $time_chat,
			'status_chat'	=> 0
		);

		$this->db->insert('bb_chat',$data);
		redirect('admin/chatting/read/'.$tujuan);
	}

}