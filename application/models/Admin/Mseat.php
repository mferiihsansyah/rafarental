<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class seat extends MY_Controller
 * 
 *	Class ini untuk model seat
 *
 *	@subpackage			helper
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Mseat extends CI_Model {


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
						'date'
			);

		// HELPER
		$this->load->helper($array_helper);
	}

	// function mengambil data
	public function load_data()
	{
		$this->db->select('*');
		$this->db->from('bb_seat');

		$query = $this->db->get();
		return $query->result();
	}

	public function input_data($data,$table)
	{
		$this->db->insert($table,$data,$this);
	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

// end model
}