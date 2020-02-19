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

class Mcustomer extends CI_Model {


	// konstruktur
	function __construct()
	{
		parent::__construct();

		// HELPER
		$this->load->helper('date');

		// LIBRARY
		$this->load->library('upload');
	}

	//Customer//
	public function load_dataCS()
	{
		$this->db->select('*');
		$this->db->from('bb_user');

		$query = $this->db->get();
		return $query->result();
	}
	public function load_laporanCS()
	{
		$this->db->select('*');
		$this->db->from('bb_customer');

		$query = $this->db->get();
		return $query->result();
	}

	// mengambil data bus per halaman
	/**
	 *
	 *	$order 	= menentukan order database, desc / asc / random
	 *	$offset = halaman
	 * 	$limit 	= Batas pengambilan data
	 * 	$search = Keyword / kata kunci 
	 *
	*/
	public function load_dataPageCS($order, $offset, $limit, $search)
	{

		$this->db->select('*');
		$this->db->from('bb_customer');

		// kondisi jika kata kunci tidak ada
		if($search != NULL)
		{
			$this->db->like('name_inv', $search);
		}

       	$this->db->order_by('name_inv', $order);

       	// kondisi jika pembatasan dan offset tidak ada
        if($limit != NULL && $offset!=NULL)
        {
        	$this->db->limit($limit,$offset);
        }
       	elseif($offset == NULL)
       	{
       		$this->db->limit($limit);
       	}
        
        $query = $this->db->get();
        
        return $query->result();
	}

	// fungsi hapus data cs
	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
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

}