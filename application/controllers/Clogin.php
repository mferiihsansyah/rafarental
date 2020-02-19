<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		// load helper
		$this->load->helper('rpcurrency_helper');

		// load model
		$this->load->model('Admin/Mlogin');
	}

	function index()
	{
		if ($this->is_logged_in()) 
		{
			redirect('admin/beranda');
		}else
			{
				redirect('/login');
			}
	}

	public function P_login()
	{
		if ($this->is_logged_in()) 
		{
			redirect('admin/beranda');
		}else
			{
				// data
				$var['title_web']	= $this->web_title();
				$var['page_web'] 	= 'Login';

				// view
				$this->load->view('login/head', $var);
				$this->load->view('login/cover', $var);
				$this->load->view('login/form', $var);
			}
	}

		function login_process()
		{
			$res = $this->Mlogin->check();

			if(count($res)>0)
			{
				foreach($res as $res)
				{
					$data = $res->id_admin;
					$username = $res->username_admin;
					$role = $res->role;
				}

				$_SESSION['user'] = $data;
				$_SESSION['username'] = $username;
				$_SESSION['role'] = $role;

				echo "<script>window.location.href=bu+'admin/beranda';</script>";
			}else
				{
					echo "<script>$('.alert').slideDown('400').delay(3000).slideUp()</script>";
				}
		}

		//Child Login_User
	function go_log()
	{	
		$user 	= $this->input->post('username');
		$pass 	= $this->input->post('password');

		$where 	= array(
			'username_cs'	=> $user,
			'pass_cs'		=> md5($pass)
		);
		$cek = $this->Mlogin->go_login("bb_user",$where);
		if(count($cek)>0){
			foreach($cek as $cek)
			{
				$data = $cek->id_cs;
				$user = $cek->name_inv;
				$email= $cek->email_cs;
			}
			$_SESSION['user']		=	$data;
			$_SESSION['nama']		= 	$user;
			$_SESSION['status']		=	"Login";
			$_SESSION['email']		=   $email;
			redirect(base_url("kendaraan"));
		}else{
			echo "<script>
			alert('Username atau Password yang Anda Masukkan Salah!');
			window.location.href='". base_url() ."login_user';  
			</script>";
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('login');
	}

	public function user_logout()
	{
		session_destroy();
		redirect('kendaraan');
	}


// akhir controller
}