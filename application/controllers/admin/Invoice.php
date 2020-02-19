<?php

/**
 * @package			Codeigniter
 * @author      	Yulius
 * @license 		http://codeigniter.com/user_guide/license.html
 * @since 			Version 3.1.4
*/


// ------------------------------------------------------------------------

/**
 *	Application Controller Class Invoice extends MY_Controller
 * 
 *	Class ini untuk halaman tagihan
 *
 *	@subpackage			model, view
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MY_Controller {


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
			'exdate_helper',
			'rpcurrency_helper'
		);

		$array_model  = array(
			'Admin/Minvoice',
			'Admin/Mdriver',
			'Public/Pinvoice'
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
			$var['page_web']  	= 'Tagihan';
			$var['data']		= $this->Minvoice->load_data_pending();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/invoice/data_pending');
			
		}else
		{
			redirect('');
		}
	}

	// fungsi data tagihan pending
	public function invoice_pending_view()
	{
		//view
		$this->load->view('admin/part/invoice/data_pending');
	}

	public function invoice_pending_data()
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
		$count  = $this->Minvoice->load_data_pending();
		$res	= $this->Minvoice->load_data_page_pending($order, $offset, $limit, $search);

		foreach($res as $row)
		{
			$result[] = array(
				'title'		=> $row->name_inv, 
				'code'		=> '<a target="_blank" href="'.base_url().'/invoice/'.$row->code_inv.'">'.$row->code_inv.'</a>',
				'price'		=> 'Rp. '.rpCurrency($row->total_inv),
				'date'		=> exDate($row->date_inv),
				'action'	=> '<div id="delete" class="btn btn-danger" idbus="'.$row->id_inv.'">
				<span class="glyphicon glyphicon-trash"></span></div>'
			);
		}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}

	// fungsi data tagihan konfirmasi
	public function invoice_confirm_view()
	{
		$this->check_waitlist();
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Konfirmasi Tagihan';
			$var['data']		= $this->Minvoice->load_data_confirm();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/invoice/data_confirm');
			
		}else
		{
			redirect('');
		}
	}

	// fungsi data tagihan yang berjalan
	public function invoice_process()
	{	
		$this->check_waitlist();
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Tagihan Berjalan';
			$var['data']		= $this->Minvoice->load_data_process();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/invoice/data_process');
			
		}else
		{
			redirect('');
		}
	}

	public function invoice_cancel()
	{	
		$this->check_waitlist();
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Tagihan Berjalan';
			$var['data']		= $this->Minvoice->load_data_cancel();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/invoice/data_cancel');
			
		}else
		{
			redirect('');
		}
	}


	public function invoice_confirm_data()
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
		$count  = $this->Minvoice->load_data_confirm();
		$res	= $this->Minvoice->load_data_page_confirm($order, $offset, $limit, $search);

		foreach($res as $row)
		{
			$result[] = array(
				'title'		=> $row->name_inv,
				'code'		=> '<a target="_blank" href="'.base_url().'/invoice/'.$row->code_inv.'">'.$row->code_inv.'</a>',
				'price'		=> 'Rp. '.rpCurrency($row->total_inv),
				'proof' 	=> '<img src="'.base_url().'assets/hpublic/img_inv/'.$row->img_inv.'" invimg="'.$row->img_inv.'" style="width:84px; height:59px;">',
				'date'		=> exDate($row->date_inv),
				'action'	=> '<div id="conf" class="btn btn-primary" idbus="'.$row->id_inv.'">
				<span class="glyphicon glyphicon-ok"></span></div> <div id="delete" class="btn btn-danger del" idbus="'.$row->id_inv.'">
				<span class="glyphicon glyphicon-trash"></span></div>'
			);
		}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}

	// fungsi data tagihan selesai
	public function invoice_clear_view()
	{	
		$this->check_waitlist();
		if ($this->is_logged_in()) 
		{
			// data
			$var['title_web'] 	= $this->web_title();
			$var['page_web']  	= 'Tagihan';
			$var['data']		= $this->Minvoice->load_data_clear();

			// view
			$this->admin_template($var);
			$this->load->view('admin/part/invoice/data_clear');
			
		}else
		{
			redirect('');
		}
	}

	public function invoice_clear_data()
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
		$count  = $this->Minvoice->load_data_clear();
		$res	= $this->Minvoice->load_data_page_clear($order, $offset, $limit, $search);

		foreach($res as $row)
		{
			$result[] = array(
				'title'		=> $row->name_inv,
				'code'		=> '<a target="_blank" href="'.base_url().'/invoice/'.$row->code_inv.'">'.$row->code_inv.'</a>',
				'price'		=> 'Rp. '.rpCurrency($row->total_inv),
				'date'		=> exDate($row->date_inv),
				'proof' 	=> '<img src="'.base_url().'assets/hpublic/img_inv/'.$row->img_inv.'" invimg="'.$row->img_inv.'">',
				'action' 	=> '<div id="penal" class="btn btn-success" idbus="'.$row->id_inv.'">Denda</div>'
			);

		}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}
	/*
	public function invoice_clear_data()
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
		$count  = $this->Minvoice->load_data_clear();
		$res	= $this->Minvoice->load_data_page_clear($order, $offset, $limit, $search);

		foreach($res as $row)
			{
				$result[] = array(
							'title'		=> $row->name_inv,
							'code'		=> '<a target="_blank" href="'.base_url().'/invoice/'.$row->code_inv.'">'.$row->code_inv.'</a>',
							'price'		=> 'Rp. '.rpCurrency($row->total_inv+$row->penalty_inv),
							'proof' 	=> '<img src="'.base_url().'assets/hpublic/img_inv/'.$row->img_inv.'" invimg="'.$row->img_inv.'">',
							'date'		=> exDate($row->date_inv),
							'action' 	=> '<div id="penal" class="btn btn-success" idbus="'.$row->id_inv.'">Denda</div>'
							);
			}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}
	*/

	// fungsi data tagihan cancel
	public function invoice_draff_view()
	{	
		$this->check_waitlist();
		//view
		$this->load->view('admin/part/invoice/data_draff');
	}

	public function invoice_draff_data()
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
		$count  = $this->Minvoice->load_data_draff();
		$res	= $this->Minvoice->load_data_page_draff($order, $offset, $limit, $search);

		foreach($res as $row)
		{
			$result[] = array(
				'title'		=> $row->name_inv,
				'code'		=> '<a target="_blank" href="'.base_url().'/invoice/'.$row->code_inv.'">'.$row->code_inv.'</a>',
				'price'		=> 'Rp. '.rpCurrency($row->total_inv),
				'date'		=> exDate($row->date_inv),
				'action'	=> '<div id="delete" class="btn btn-danger del" idbus="'.$row->id_inv.'">
				<span class="glyphicon glyphicon-trash"></span></div>'
			);
		}

		// konversi array ke json
		echo json_encode(array('total'=>count($count), 'rows'=>$result));
	}

	// fungsi preview image
	public function invoice_prev($src)
	{
		$var['src'] = $src;
		$this->load->view('admin/part/invoice/prev', $var);
	}

	public function invoice_confirm($id)
	{	
		$this->Minvoice->confirm_data($id);
		echo "Tagihan sudah di konfirmasi";
	}

	// fungsi denda
	public function invoice_penalty($id)
	{
		// variable
		$var['idinv'] = $id;
		// view
		$this->load->view('admin/part/invoice/penalty', $var);
	}

	// fungsi simpan denda
	public function invoice_save_penalty()
	{
		$this->Minvoice->save_penalty();
		echo "Denda sudah dimasukan";
	}

	// fungsi hapus tagihan
	public function invoice_delete($id)
	{
		$this->db->where('id_inv', $id);
		$this->db->delete('bb_invoice');

		echo "<script>
		alert('Tagihan Sudah Dihapus');
		window.history.go(-2);
		</script>";
	}

	public function confirm_rent()
	{
		$kode	= $this->input->post('kodetransaksi');
		
		$res = $this->Mdriver->load_supir();
		foreach ($res as $load) {
			$id = $load->id_driver;
			$status = $load->status_driver;
			$nama_driver = $load->nm_driver;
		}

		$data 	= array(
			'status_inv'=>8,
			'id_driver' =>$id,
		);
		$where 	= array('code_inv'	=> $kode);
		$this->Minvoice->update_process($where,$data,'bb_invoice');

		$this->db->set('status_driver', 0);
		$this->db->where('id_driver',$id);
		$this->db->update('bb_driver');
		echo "<script>
		alert('Tagihan Berhasil di Konfirmasi');
		window.location.href='". base_url() ."admin/tagihan/confirm';  
		</script>";

	}

	public function process_cancel($id)
	{
		$idvh 	= $this->input->post('idvh');
		$idinv 	= $this->input->post('idinv');
		$email_cs = $this->input->post('email');
		$data = array(
			'qty_vh' => 'qty_vh+1'
		);
		$where = array (
			'id_vh'	=> $idvh
		);
		$this->db->update('bb_vehicle',$where,$data);
		/*
		$this->load->library('email');

		// configuration for protocol, host, port, user, and pass user email

		$config = array('protocol' => 'smtp', 'smtp_host' => 'ssl://smtp.googlemail.com', 'smtp_port' => '465', 'smtp_user' => 'ihsanferyy@gmail.com', 'smtp_pass' => 'redirect@1997',  'charset' => 'iso-8859-1', 'mailtype'  => 'html'
    	);

		$this->email->initialize($config);
		$this->email->set_newline("\r\n");  

		// email content
		$this->email->from('ihsanferyy@gmail.com', $this->web_title());
		$this->email->to($email_cs);
		$this->email->subject('Tagihan Anda dibatalkan | Rafa Rental');
		$this->email->message('Tagihan Anda dengan Nomor Transaksi '.$idinv .'Telah Dibatalkan');

		if($this->email->send()){
			echo "<script>
		alert('Tagihan Berhasil di Batalkan');
		window.location.href='". base_url() ."admin/tagihan/pending';  
		</script>";
		} else {
                show_error($this->email->print_debugger());
            }
		*/
            echo "<script>
            alert('Tagihan Berhasil di Batalkan');
            window.location.href='". base_url() ."admin/tagihan/pending';  
            </script>";
            $this->db->set('status_inv', 5);
            $this->db->where('id_inv',$id);
            $this->db->update('bb_invoice');


        }

        public function giveback($kode)
        {
        	$res = $this->Minvoice->load_invoice($kode);
        	foreach ($res as $tampil) {
        		$idvh = $tampil->id_vh;
        		$batasawal= new DateTime($tampil->finish_date);
        		$date  = date('Y-m-d', now());
        		$akhir = new DateTime($date);
        		$hari = $batasawal->diff($akhir);
        		$terlambat = $hari->days;
        		$biaya = $tampil->total_inv/$tampil->long_inv;
        		$pinalti = $biaya*$terlambat;    
        		$total = $tampil->total_inv;
        		$id = $tampil->id_driver;
        		$final = $pinalti+$total;
        		
        		$this->db->trans_start();
        		$this->db->query("UPDATE bb_vehicle set qty_vh=qty_vh+1 where id_vh='$idvh'");
        		$this->db->query("UPDATE bb_invoice set status_inv='2', penalty_inv='$pinalti', f_total='$final' where code_inv='$kode'");
        		$this->db->query("UPDATE bb_driver set status_driver='1' where id_driver='$id'");
        		$this->db->trans_complete();
        		/*
        		$data = array(
        			'qty_vh' => 'qty_vh+1'
        		);
        		$where = array (
        			'id_vh'	=> $idvh
        		);
        		$this->db->update('bb_vehicle',$data,$where);
        		$this->db->set('status_inv', 2);
        		$this->db->set('penalty_inv',$pinalti);
        		$this->db->set('f_total',$pinalti+$total);
        		$this->db->where('code_inv',$kode);
        		$this->db->update('bb_invoice');
        		$this->db->set('status_driver', 1);
        		$this->db->where('id_driver',$id);
        		$this->db->update('bb_driver');
        		echo "<script>
        		alert('Tagihan Sudah Selesai');
        		window.location.href='". base_url() ."admin/tagihan/process';  
        		</script>";
        		*/
        	}
        }

        public function report()
        {	
        	$this->check_waitlist();
		// cek jika sudah login ata session login masih ada di cookie
        	if ($this->is_logged_in()) 
        	{
			// data
        		$var['title_web'] 	= $this->web_title();
        		$var['page_web']  	= 'Laporan Data Transaksi';
        		$var['data']		= $this->Minvoice->load_data_clear();

			// view
        		$this->admin_template($var);
        		$this->load->view('admin/part/invoice/report_clear');

        	}else
        	{
        		redirect('');
        	}	
        }

        public function print($kode)
        {	
        	$id= $this->input->post('idvh');
        	$data['mobil'] = $this->Pinvoice->load_idcar($id);
        	$data['invoice'] = $this->Pinvoice->load_inv($kode);
        	$this->load->view('admin/cetak/kwitansi',$data);
        }

        public function report_transaction()
        {  
        	ob_start();    
        	$this->load->view('print');
        	$html = ob_get_contents(); 
        	ob_end_clean();                

        	require_once('./assets/html2pdf/html2pdf.class.php');    
        	$pdf = new HTML2PDF('P','A4','en');   
        	$pdf->setTestTdInOnePage(false); 
        	$pdf->WriteHTML($html);    
        	$pdf->Output('laporan_transaksi.pdf', 'D');
        }


// end model
    }
