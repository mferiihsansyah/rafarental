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
 *	Class ini untuk halaman page / halaman
 *
 *	@subpackage			model, view
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
						'rpCurrency_helper',
						'exDate_helper'
			);

		$array_model  = array(
						'admin/mpage',
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
			$var['page_web']  	= 'Halaman';
			$var['data']		= $this->mpage->load_data();
			// view
			$this->admin_template($var);
			$this->load->view('admin/part/page/index');
			
		}else
			{
				redirect('');
			}
	}

	// fungsi data halaman
	public function page_data()
	{
		$order 	= $_GET['order'];	// order database
		$offset = $_GET['offset'];	// offset 
		$limit 	= $_GET['limit'];   // batas menarik data

		if(isset($_GET['search']))
		{
			$search = $_GET['search']; // keyword
		}
		else
		{
			$search = NULL;
		}

		$result = array();
		$count  = $this->mpage->load_data();
		$res	= $this->mpage->load_data_page($order, $offset, $limit, $search);

		foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_page, 
							'desc'		=> $row->desc_page,							
							'date'		=> exDate($row->date_page),
							'action'	=> '<button class="btn btn-primary edit" idcontent="'.$row->id_page.'"><span class="glyphicon glyphicon-pencil"></span></button> <div class="btn btn-danger del" idcontent="'.$row->id_page.'">
            					<span class="glyphicon glyphicon-trash"></span></div>'
							);
			}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));

	}

	// fungsi input data halaman
	public function add_data()
	{
		$nama = $this->input->post('nama');
		$isi  = $this->input->post('isi');

		$slug = url_title($nama,'-',TRUE);
		$date 		= date('Y-m-d', now());
		$time		= date('H:i:s', now());

		$data = array(
			'name_page'	=> $nama,
			'desc_page'	=> $isi,
			'slug_page' => $slug,
			'date_page'	=> $date,
			'time_page'	=> $time,
			'date_time_page'	=> $date.' '.$time
		);
		$this->db->insert('bb_page',$data);
		redirect('admin/halaman');
	}

	// fungsi edit data halaman
	public function page_edit($id)
	{
		$this->check_waitlist();
		// menetapkan data
		$var['page_data']	= $this->mpage->edit_data($id);

		// view
		$this->load->view('admin/part/page/edit', $var);
	}

	// fungsi menyimpan edit data halaman
	public function page_edit_save()
	{
		$do_save = $this->mpage->filter_edit_data();

		echo $do_save;
	}

	// fungsi hapus data halaman
	public function page_delete($id)
	{
		$do_del = $this->mpage->delete_data($id);

		echo $do_del;
	}

}