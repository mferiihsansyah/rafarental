<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Setting extends MY_Controller
 * 
 *	Class ini untuk halaman setting
 *
 *	@subpackage			model, view
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {


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
						'exdate_helper'
			);

		$array_model  = array(
						'Admin/Msetting',
						'Admin/Mpage',
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
			$var['page_web']  	= 'Setting';

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/setting/index');
			
		}else
			{
				redirect('');
			}
	}

	public function account()
	{	
		$this->check_waitlist();
		// cek jika sudah login ata session login masih ada di cookie
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Setting';
			$var['data']		= $this->Msetting->load_set_account();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/setting/account_setting');
			
		}else
			{
				redirect('');
			}
	}

	// fungsi web setting
	public function website()
	{	
		$this->check_waitlist();
		// cek jika sudah login ata session login masih ada di cookie
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Website Setting';
			$var['data']		= $this->Msetting->load_data_ws();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/setting/web_setting',$var);
			
		}else
			{
				redirect('');
			}
	}

	// fungsi bank setting
	public function bank()
	{	
		$this->check_waitlist();
		if ($this->is_logged_in()) 
		{
		// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Bank Setting';
			$var['data']		= $this->Msetting->load_data_bank();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/setting/bank_setting',$var);
			
		}else{
				redirect('');
			}
	}

	public function add_acc()
	{
		$nama		= $this->input->post('name_acc');
		$username	= $this->input->post('user_acc');
		$password	= $this->input->post('pass_acc');
		$role		= $this->input->post('role_acc');
		$date 	 	= date('Y-m-d',now());
		$time 		= date('H:i:s',now());

		$data 	= array(
			'name_admin'	=> $nama,
			'username_admin'=> $username,
			'password_admin'=> md5($password),
			'role'			=> $role,
			'date_admin'	=> $date,
			'time_admin'	=> $time,
			'date_time_admin'=> $date.' '.$time
		);

		$this->db->insert('bb_admin',$data);
		redirect('admin/setting/account');
	}
	public function add_data_bank()
	{
		$name_bank	= $this->input->post('nm_bank');
		$acc_bank	= $this->input->post('no_rek');
		$owner_bank	= $this->input->post('nm_pemilik');
		$config['upload_path']	= FCPATH .'upload/bank/';
		$config['allowed_types']= 'jpg|jpeg|png';
		$config['overwrite']	= true;
		$config['max_size']		= 10024;
		$config['max_width'] = 6000;
		$config['max_height']= 6000;
		
		$this->upload->initialize($config);
		$this->upload->do_upload('image_bank');
		$upload_data = $this->upload->data();
		$image = $upload_data['file_name'];

		$date 		= date('Y-m-d', now());
		$time		= date('H:i:s', now());
		$data 	= array(
			'name_bank'		=> $name_bank,
			'acc_bank'		=> $acc_bank,
			'owner_bank'	=> $owner_bank,
			'logo_bank'		=> $image,
			'date_bank'		=> $date,
			'time_bank'		=> $time,
			'date_time_bank'=> $date.' '.$time
		);
		$this->db->insert('bb_bank',$data);
		redirect('admin/setting/bank');
	}
	// fungsi menu setting
	public function menu_setting()
	{
		$var['menu'] = $this->Msetting->load_menu();
		$var['page'] = $this->Mpage->load_data();
		$this->load->view('admin/part/setting/menu_setting', $var);
	}

	// fungsi user setting
	public function user_setting()
	{
		$this->load->view('admin/part/setting/user_setting');
	}

	// fungsi data bank seting
	public function bank_setting_data()
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
		$count  = $this->Msetting->load_data_bank();
		$res	= $this->Msetting->load_data_page_bank($order, $offset, $limit, $search);

		foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_bank,
							'desc'		=> $row->acc_bank,
							'date'		=> exDate($row->date_bank),
							'action'	=> '<button id="edit" class="btn btn-primary edit" idcontent="'.$row->id_bank.'"><span class="glyphicon glyphicon-pencil"></span></button> <div id="delete" class="btn btn-danger" idcontent="'.$row->id_bank.'">
            					<span class="glyphicon glyphicon-trash"></span></div>'
							);
			}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}

	// fungsi data bank seting
	public function user_setting_data()
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
		$count  = $this->Msetting->load_data_user();
		$res	= $this->Msetting->load_data_page_bank($order, $offset, $limit, $search);

		foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_bank,
							'desc'		=> $row->acc_bank,
							'date'		=> exDate($row->date_bank),
							'action'	=> '<button id="edit" class="btn btn-primary edit" idcontent="'.$row->id_bank.'"><span class="glyphicon glyphicon-pencil"></span></button> <div id="delete" class="btn btn-danger" idcontent="'.$row->id_bank.'">
            					<span class="glyphicon glyphicon-trash"></span></div>'
							);
			}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}

	// fungsi input bank setting
	public function bank_setting_input()
	{
		$this->load->view('admin/part/setting/input_bank_setting');	
	}

	// fungsi input bank setting save
	public function bank_setting_save()
	{
		$do_save = $this->Msetting->filter_data_bank();

		echo $do_save;
	}

	// fungsi edit bank setting
	public function bank_edit($id)
	{
		$var['bank_data'] = $this->Msetting->load_edit_bank($id);
		// view
		$this->load->view('admin/part/setting/edit_bank_setting', $var);
	}

	// fungsi simpan edit bank
	public function bank_save_edit()
	{
		$this->Msetting->save_edit_bank();

		echo "Data bank sudah disimpan";
	}

	public function bank_delete($id)
	{
		$where = array('id_bank' => $id);
		$this->Msetting->hapus_data($where,'bb_bank');
		redirect('admin/setting/bank');
	}

	
	// fungsi save menu web
	public function save_menu_web()
	{
		$do_save = $this->Msetting->save_menu();

		echo 'Data menu sudah disimpan';
	}

	// fungsi save setting web
	public function save_setting_ws()
	{
		$do_save = $this->Msetting->save_ws();

		echo 'Setting website sudah di simpan';
	}

	public function update_data_acc()
	{	
		$id 		= $this->input->post('id');
		$nama		= $this->input->post('name_acc');
		$username	= $this->input->post('user_acc');
		$password	= $this->input->post('pass_acc');
		$role		= $this->input->post('role_acc');
		$date 	 	= date('Y-m-d',now());
		$time 		= date('H:i:s',now());

		$data 	= array(
			'name_admin'	=> $nama,
			'username_admin'=> $username,
			'password_admin'=> md5($password),
			'role'			=> $role,
			'date_admin'	=> $date,
			'time_admin'	=> $time,
			'date_time_admin'=> $date.' '.$time
		);

		$this->db->where('id_admin',$id);
		$this->db->update('bb_admin',$data);
		redirect('admin/setting/account');
	}

	public function update_data_bank()
	{
		$id 		= $this->input->post('id');
		$namabank	= $this->input->post('nm_bank');
		$norek 		= $this->input->post('no_rek');
		$accbank	= $this->input->post('nm_pemilik');

		$date 	 	= date('Y-m-d',now());
		$time 		= date('H:i:s',now());
		$config['upload_path']	= FCPATH .'upload/bank/';
		$config['allowed_types']= 'jpg|jpeg|png';
		$config['overwrite']	= true;
		$config['max_size']		= 10024;
		$config['max_width'] = 6000;
		$config['max_height']= 6000;
		
		$this->upload->initialize($config);
		$this->upload->do_upload('image_bank');
		$upload_data = $this->upload->data();
		$upload_data = $this->upload->data();
		if(!empty($_FILES["edit_mobil"]["name"])){
			$image = $upload_data['file_name'];
		}else{
			$image = $this->input->post('gambar_lama');
		}

		$data 	= array(
			'name_bank'		=> $namabank,
			'acc_bank'		=> $norek,
			'owner_bank'	=> $accbank,
			'logo_bank'		=> $image,
			'date_bank'		=> $date,
			'time_bank'		=> $time,
			'date_time_bank'=> $date.' '.$time
		);
		$this->db->where('id_bank',$id);
		$this->db->update('bb_bank',$data);
		redirect('admin/setting/bank');

	}
	public function web_update()
	{	
		$id 		= $this->input->post('id');
		$name 		= $this->input->post('nama');
		$slogan		= $this->input->post('slogan');
		$notelp		= $this->input->post('no_telp');
		$email 		= $this->input->post('email');
		$alamat		= $this->input->post('alamat');

		$data =	array(
			'name_ws'	=> $name,
			'slogan_ws'	=> $slogan,
			'telp_ws'	=> $notelp,
			'email_ws'	=> $email,
			'address_ws'=> $alamat
		);
		$this->db->where('id_ws',$id);
		$this->db->update('bb_setting',$data);
		echo "<script>
		confirm('Ubah Data?');
		window.location.href='". base_url() ."admin/setting/website';  
		</script>";	}
// end model
}
