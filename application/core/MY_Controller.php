<?php

class MY_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $array_model  = array(
            'Public/Pvehicle',
            'Public/Pinvoice',
            'Public/Puser',
            'Admin/Msetting',
            'Admin/Mtype',
            'Admin/Mseat',
            'Admin/Mwaitlist',
            'Admin/Mbus',
            'Admin/Minvoice'
        );

        // MODEL
        $this->load->model($array_model);
    }

    public function is_logged_in()
    {
        $user = $this->session->userdata('user');
        $user_admin = $this->session->userdata('username');
        return isset($user, $user_admin);
    }
    public function check_transaction()
    {   
        $tagihan = $this->Minvoice->load_data_pending();
        foreach ($tagihan as $tg){
            $kode = $tg->code_inv;
            $id = $tg->id_vh;
            $nama = $tg->name_inv;
            $email = $tg->email_inv;
            $sts_inv = $tg->status_inv;
            $waktu_inv = $tg->date_time_inv;
            $sekarang = date('Y-m-d H:i:s',now());
            $kadaluarsa =  date('Y-m-d H:i:s',strtotime('+5 hours',strtotime($waktu_inv)));
            if ($kadaluarsa<$sekarang){
             $this->load->library('email');
                // configuration for protocol, host, port, user, and pass user email

             $config = array('protocol' => 'smtp', 'smtp_host' => 'ssl://smtp.googlemail.com', 'smtp_port' => '465', 'smtp_user' => 'youremail@gmail.com', 'smtp_pass' => 'yourpassword',  'charset' => 'iso-8859-1', 'mailtype'  => 'html'
         );
             $vars['nama_pemesan'] = $nama ;
             $vars['kode_transaksi'] = $kode;
             $vars['tanggal_kirim'] = $waktu_inv;
             $this->email->initialize($config);
             $this->email->set_newline("\r\n");
        // email content
             $this->email->from('ihsanferyy@gmail.com', $this->web_title());
             $this->email->to($email);
             $this->email->subject('Pemesanan Anda Telah Dibatalkan | RAFA RENTAL');
             $this->email->message($this->load->view('email/tg_dibatalkan', $vars, TRUE));
             $this->email->send();

             $this->db->trans_start();
             $this->db->query("UPDATE bb_vehicle set qty_vh=qty_vh+1 where id_vh='$id'");
             $this->db->query("UPDATE bb_invoice set status_inv='9' where code_inv='$kode'");
             $this->db->trans_complete();
         }else{

         }
     }
 }
  public function check_late()
    {   
        $tagihan = $this->Minvoice->load_data_process();
        foreach ($tagihan as $tg){
            $kode = $tg->code_inv;
            $id = $tg->id_vh;
            $nama = $tg->name_inv;
            $email = $tg->email_inv;
            $waktu = $tg->finish_date;
            $sekarang = date('Y-m-d H:i:s',now());
            $telat =  date('Y-m-d H:i:s',strtotime('-1 days',strtotime($waktu)));
            if ($telat<$sekarang){
             $this->load->library('email');
                // configuration for protocol, host, port, user, and pass user email

             $config = array('protocol' => 'smtp', 'smtp_host' => 'ssl://smtp.googlemail.com', 'smtp_port' => '465', 'smtp_user' => 'youremail@gmail.com', 'smtp_pass' => 'yourpassword',  'charset' => 'iso-8859-1', 'mailtype'  => 'html'
         );
             $vars['nama_pemesan'] = $nama ;
             $vars['kode_transaksi'] = $kode;
             $vars['batas'] = exDate($waktu);
             $this->email->initialize($config);
             $this->email->set_newline("\r\n");
        // email content
             $this->email->from('ihsanferyy@gmail.com', $this->web_title());
             $this->email->to($email);
             $this->email->subject('Waktu Sewa Anda Hampir Habis | RAFA RENTAL');
             $this->email->message($this->load->view('email/tg_terlambat', $vars, TRUE));
             $this->email->send();
         }else{

         }
     }
 }
 public function check_waitlist()
 {
    $vh = $this->Mbus->load_data();
    $wl = $this->Mwaitlist->load_data();
    foreach ($wl as $wlist) {
       $id = $wlist->id_vh;
       $no_wl = $wlist->code_wl;
       $nama = $wlist->name_wl;
       $email = $wlist->email_wl;
       $tanggal = $wlist->start_date_wl;
       $jam = $wlist->time_wl;
       $hp = $wlist->hp_wl;
       $sts = $wlist->status_wl;

       foreach ($vh as $vehicles) {
        $id_mobil = $vehicles->id_vh;
        $nama_mobil = $vehicles->name_vh;
        $jumlah_mobil = $vehicles->qty_vh;  
        $sekarang = date('Y-m-d',now());
        $skrg = date('H:i:s',now());
        if($id==$id_mobil && $jumlah_mobil>0 && $sts==0 && $tanggal==$sekarang && $skrg>$jam){
            $this->load->library('email');
                // configuration for protocol, host, port, user, and pass user email

            $config = array('protocol' => 'smtp', 'smtp_host' => 'ssl://smtp.googlemail.com', 'smtp_port' => '465', 'smtp_user' => 'youremail@gmail.com', 'smtp_pass' => 'yourpassword',  'charset' => 'iso-8859-1', 'mailtype'  => 'html'
        );
            $vars['nama_pemesan'] = $nama ;
            $vars['nama_mobil'] = $nama_mobil;
            $vars['tanggal_tunggu'] = exDate($tanggal);
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
        // email content
            $this->email->from('ihsanferyy@gmail.com', $this->web_title());
            $this->email->to($email);
            $this->email->subject('Mobil yang Anda Tunggu sudah Tersedia | RAFA RENTAL');
            $this->email->message($this->load->view('email/waitlist', $vars, TRUE));
            $this->email->send();
            $this->db->set('status_wl', 1);
            $this->db->where('code_wl',$no_wl);
            $this->db->update('bb_waitlist');
        }else{

        }
    }
}

}

    // TEMPLATE ADMIN
public function admin_template($var)
{   
    if($this->session->userdata('role')!="superadmin"){
        $this->load->view('admin/template/head', $var);
        $this->load->view('admin/template/navigation', $var);
        $this->load->view('admin/template/side-bar', $var);
        $this->load->view('admin/template/content');
        $this->load->view('admin/template/footer', $var);
    }else{
        $this->load->view('admin/template/head', $var);
        $this->load->view('admin/template/navigation', $var);
        $this->load->view('admin/template/nav-bar', $var);
        $this->load->view('admin/template/content');
        $this->load->view('admin/template/footer', $var);  
    }
}

    // TEMPLATE PUBLIC
public function public_template($var)
{
    $this->load->view('public/template/head', $var);
    $this->load->view('public/template/menu_head', $var);
    $this->load->view('public/template/content', $var);
}

public function cs_template($var)
{
    $this->load->view('public/template/head', $var);
    $this->load->view('public/template/head_login', $var);
    $this->load->view('public/template/content', $var);
}

public function web_title()
{
    $this->db->select('name_ws');
    $this->db->from('bb_setting');

    $query = $this->db->get();

    $res = $query->result();

    foreach($res as $row)
    {
        $res2 = $row->name_ws;
    }

    return $res2;
}



// akhir dari controller
}

