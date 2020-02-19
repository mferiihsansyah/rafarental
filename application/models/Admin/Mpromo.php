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

class Mpromo extends CI_Model {


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
	public function load_data()
	{
		$this->db->select('*');
		$this->db->from('bb_promo');
		$this->db->group_by('nm_promo');

		$query = $this->db->get();
		return $query->result();
	}

	public function tujuan_promo()
	{
		$this->db->select('email_cs');
		$this->db->from('bb_user');
		$this->db->group_by('email_cs');

		$query	= $this->db->get();
		return $query->result();
	}

	public function load_discount()
	{
		$this->db->select('*');
		$this->db->from('bb_promo');
		$this->db->where('nm_promo','Pelanggan Baru');

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
	public function load_dataPage($order, $offset, $limit, $search)
	{

		$this->db->select('*');
		$this->db->from('bb_promo');

		// kondisi jika kata kunci tidak ada
		if($search != NULL)
		{
			$this->db->like('nm_promo', $search);
		}

       	$this->db->order_by('nm_promo', $order);

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

	public function add_datapromo($data,$table)
	{
		$this->db->insert($table,$data,$this);
	}


}