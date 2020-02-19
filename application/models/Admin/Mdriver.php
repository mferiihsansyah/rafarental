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
 *	@subpackage			library, helper
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdriver extends CI_Model {


	// konstruktur
	function __construct()
	{
		parent::__construct();

		// HELPER
		$this->load->helper('date');

		// LIBRARY
		$this->load->library('upload');
	}

	// mengambil data bus
	public function load_data()
	{
		$this->db->select('*');
		$this->db->from('bb_driver');

		$query = $this->db->get();
		return $query->result();
	}

	public function load_supir()
	{
		$this->db->select('*');
		$this->db->from('bb_driver');
		$this->db->limit(1);
		$this->db->where('status_driver',1);

		$query = $this->db->get();
		return $query->result();
	}

	public function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function input_data($data,$table)
	{	
		$this->db->insert($table,$data,$this);
	}
	/*
	public function _uploadimage()
	{
		$config['upload_path']	= './upload/mobil/';
		$config['allowed_types']= 'jpg|jpeg|png';
		$config['overwrite']	= true;
		$config['max_size']		= 1024;
		$config['max_width'] = 1024;
		$config['max_height']= 768;
		
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('image_mobil')){
			return $this->upload->data("file_name");
		}
		$
		//return "default.jpg";
	}
	*/
	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

}