<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Pvehicle extends CI_Model
 * 
 *	Class ini untuk model kendaraan
 *
 *	@subpackage			library, helper
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class pvehicle extends CI_Model {

	// mengambil data kendaraan
	public function load_data()
	{	
		
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->join('bb_meta_category', 'bb_meta_category.id_vh = bb_vehicle.id_vh');
		$this->db->join('bb_category', 'bb_category.id_cat = bb_meta_category.id_cat');
		$query = $this->db->get();
		return $query->result();
	}

	public function load_data_mobil()
	{	
		
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		
		$query = $this->db->get();
		return $query->result();
	}
	public function search_data_mobil($mirip)
	{	
		
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->like('type_vh',$mirip);
		$this->db->or_like('seat_vh',$mirip);
		
		$query = $this->db->get();
		return $query->result();
	}

	public function load_data_slider()
	{	
		
		$this->db->select('*, count(*) as total');
		$this->db->from('bb_vehicle');
		$this->db->join('bb_invoice', 'bb_invoice.id_vh = bb_vehicle.id_vh');
		$this->db->group_by('bb_invoice.id_vh');
		$this->db->order_by('total','ASC');
		$this->db->limit(6);
		$query = $this->db->get();
		return $query->result();
	}

	public function load_rekomendasi()
	{
		$user = $this->session->userdata('email');
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->join('bb_invoice', 'bb_invoice.id_vh = bb_vehicle.id_vh');
		$this->db->group_by('bb_invoice.id_vh');
		$this->db->where('email_inv',$user);
		$this->db->where('qty_vh >',0);
		$this->db->order_by('price_vh','DESC');
		$this->db->limit(2);
		$query = $this->db->get();
		return $query->result();
	}
	// mengambil data kendaraan
	public function load_mobil_banyak()
	{	
		
		$this->db->select('*, count(*) as total');
		$this->db->from('bb_vehicle');
		$this->db->join('bb_invoice', 'bb_invoice.id_vh = bb_vehicle.id_vh');
		$this->db->group_by('bb_invoice.id_vh');
		$this->db->order_by('total','DESC');
		$this->db->where('status_inv',2);
		$this->db->limit(4);
		$query = $this->db->get();
		return $query->result();
	}

	public function load_mobil_banyak_bulan()
	{	
		
		$this->db->select('*,month(start_date) as bulan, count(*) as total');
		$this->db->from('bb_vehicle');
		$this->db->join('bb_invoice', 'bb_invoice.id_vh = bb_vehicle.id_vh');
		$this->db->group_by('bb_invoice.id_vh');
		$this->db->group_by('bulan');
		$this->db->order_by('total','DESC');
		$this->db->where('status_inv',2);
		$this->db->limit(4);
		$query = $this->db->get();
		return $query->result();
	}


	public function load_mobil_order()
	{	
		
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->order_by('date_time_vh','DESC');
		$this->db->limit(4);
		
		$query = $this->db->get();
		return $query->result();
	}

	// mengambil data kendaraan
	public function load_kendaraan()
	{	
		
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->where('qty_vh', 0);
		$query = $this->db->get();
		return $query->result();
	}

	// mengambil nama kendaraan
	function load_name($id)
	{
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->where('id_vh', $id);

		$query = $this->db->get();
		
		foreach($query->result() as $row)
		{
			$res = $row->id_vh;
		}

		return $res;
	}
	// mengambil kode promo
	function load_code($code)
	{
		$this->db->select('*');
		$this->db->from('bb_promo');
		$this->db->where('codepromo',$code);

		$query = $this->db->get();
		return $query->result();
	}
	// mengambil data untuk single page kendaraan
	function load_sc($id)
	{
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->where('id_vh', $id);

		$query = $this->db->get();
		return $query->result();
	}

	// mengambil data dari id
	function load_id($idcar)
	{
		$this->db->select('*');
		$this->db->from('bb_vehicle');
		$this->db->where('id_vh', $idcar);

		$query = $this->db->get();
		return $query->result();
	}




// end model
}