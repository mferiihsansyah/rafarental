<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puser extends CI_Model {

	function __construct()
	{
		parent::__construct();

		// load helper
		$this->load->helper('date');

		// load library
		$this->load->library('upload');
	}

	public function load_regis(){
		$this->db->select('*');
		$this->db->from('bb_user');

		$query=$this->db->get();
		return $query->result();
	}

	public function load_chat()
	{	
		$user = $this->session->userdata('nama');
		$fix =  str_replace(' ', '-', $user);
		$this->db->select('*');
		$this->db->from('bb_chat');
		$this->db->where('name_chat',$fix);
		$this->db->or_where('rec_chat',$fix);

		$query=$this->db->get();
		return $query->result();
	}

	public function load_inbox()
	{
		$this->db->select('*');
		$this->db->from('bb_chat');
		$this->db->where('rec_chat','admin');
		$this->db->or_where('rec_chat','Admin');
		$this->db->group_by('name_chat');
		

		$query=$this->db->get();
		return $query->result();
	}

	public function  load_read_inbox($id)
	{
		$this->db->select('*');
		$this->db->from('bb_chat');
		$this->db->where('rec_chat',$id);
		$this->db->or_where('name_chat',$id);

		$query=$this->db->get();
		return $query->result();
	}

	public function GetUserData()
	{
		$this->db->select('*');
		$this->db->from('bb_user');
		$this->db->limit(1);

  		$query = $this->db->get();

 		if ($query) {

			 return $query->row_array();

		 } else {

			 return false;

		 }
	}
}