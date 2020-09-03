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

class Promo extends MY_Controller {


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
						'Admin/Mpromo'
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
			$var['page_web']  	= 'Kode Promo';
			$var['data']		= $this->Mpromo->load_data();


			// view
			$this->admin_template($var);
			$this->load->view('admin/part/promo/index', $var);
			
		}else
			{
				redirect('');
			}	
	}
	//Fungsi Tampil Promo
	
	public function promo_data()
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
		$count  = $this->Mpromo->load_data();
		$res	= $this->Mpromo->load_dataPage($order, $offset, $limit, $search);

		foreach($res as $row)
			{
				$result[] = array(
							'title'			=> $row->nm_promo, 
							'codepromo'		=> $row->codepromo,
							'discount'		=> $row->ds_promo,							
							'quantity'		=> $row->jl_promo,
							'action'		=> '<button id="send" class="btn btn-primary send" idcontent="'.$row->nm_promo.'"><span class="glyphicon glyphicon-envelope"></span></button> <div class="btn btn-danger del" idcontent="'.$row->nm_promo.'">
            					<span class="glyphicon glyphicon-trash"></span></div>'
							);
			}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));

	}

	public function kirim()
	{
		$nama	=	$this->input->post('namapromo');
		$judul	=	$this->input->post('judulpesan');
		$pesan	=	$this->input->post('pesanpromo');
		$diskon	=  $this->input->post('dspromo');

		$tujuan = $this->Mpromo->tujuan_promo();
		foreach ($tujuan as $user_email) {
			$email=$user_email->email_cs;

			$this->load->helper('string');
			$kode =random_string('alnum',12);
		

		$this->load->library('email');
		// configuration for protocol, host, port, user, and pass user email

		$config = array('protocol' => 'smtp', 'smtp_host' => 'ssl://smtp.googlemail.com', 'smtp_port' => '465', 'smtp_user' => 'youremail@gmail.com', 'smtp_pass' => 'yourpassword',  'charset' => 'iso-8859-1', 'mailtype'  => 'html'
    	);
    	$vars['kode']	= $kode;
    	$vars['pesan']	= $pesan;
    	$vars['nama']	= $nama;
    	$this->email->initialize($config);
		$this->email->set_newline("\r\n");  

		// email content
		$this->email->from('ihsanferyy@gmail.com', $this->web_title());
		$this->email->to($email);
		$this->email->subject($judul.' | RAFA RENTAL MOBIL');
		$this->email->message($this->load->view('email/tg_terlambat', $vars, TRUE));
		if($this->email->send()){
			echo "email sent";
			$resource=$this->Mpromo->load_data();
			foreach ($resource as $key) {
				$diskon=$key->ds_promo;
				$namapromo	=$key->nm_promo;
			}
			$datas = array(
				'codepromo'	=> $kode,
				'nm_promo'	=> $namapromo,
				'ds_promo'	=> $diskon
			);

			$this->db->insert('bb_promo',$datas);
		} else {
                show_error($this->email->print_debugger());
        }
			echo "<script>
			alert('Promo Berhasil Terkirim');
			window.location.href='". base_url() ."admin/pelanggan/promo';  
			</script>";
		}
	}

	public function add_promo(){
		$data['title_web'] 	= $this->web_title();
		$data['page_web']  	= 'Tambah Promo';

		$this->admin_template($data);
		$this->load->view('admin/part/promo/add',$data);
	}

	public function add_process(){
		$nama		=$this->input->post('addnama');
		$potongan	=$this->input->post('addpotongan');
		$this->load->helper('string');
		$kode =random_string('alnum',12);
        $code = $kode; 
		$data 	= array(
		    'codepromo' => $code,
			'nm_promo'	=> $nama,
			'ds_promo'	=> $potongan
		);
		$this->Mpromo->add_datapromo($data,'bb_promo');

		redirect('admin/promo');

	}


}
