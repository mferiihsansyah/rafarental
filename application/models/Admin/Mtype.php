<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Type extends MY_Controller
 * 
 *	Class ini untuk model tipe bus
 *
 *	@subpackage			helper
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Mtype extends CI_Model {


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

	// fungsi mengambi data tipe bus
	public function load_data()
	{
		$this->db->select('*');
		$this->db->from('bb_category');

		$query = $this->db->get();
		return $query->result();
	}

	public function input_data($data,$table)
	{	
		$this->db->insert($table,$data,$this);
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

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
// end model
}

