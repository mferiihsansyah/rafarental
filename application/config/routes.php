<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Cpublic';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
 *  Routing alamat website / url
 */

///////////////////////////////////
// ADMIN ROUTE
///////////////////////////////////

$route['admin']						= 'cadmin';
$route['admin/beranda']				= 'admin/dashboard';
$route['admin/halaman']				= 'admin/page';
$route['admin/bus/tampil']			= 'admin/bus';
$route['admin/bus/tampil/tambah']	= 'admin/bus/add';
$route['admin/bus/kursi']			= 'admin/seat';
$route['admin/bus/kursi/tambah']	= 'admin/seat/add';
$route['admin/bus/tipe']			= 'admin/type';
$route['admin/bus/tipe/tambah']		= 'admin/type/add';
$route['admin/tagihan/pending'] 	= 'admin/invoice';
$route['admin/tagihan/confirm'] 	= 'admin/invoice/invoice_confirm_view';
$route['admin/tagihan/clear'] 		= 'admin/invoice/invoice_clear_view';
$route['admin/tagihan/process'] 	= 'admin/invoice/invoice_process';
$route['admin/tagihan/cancel'] 		= 'admin/invoice/invoice_cancel';
$route['admin/setting/website'] 	= 'admin/setting/website';
$route['admin/setting/bank'] 		= 'admin/setting/bank';
$route['admin/pelanggan/saran']		= 'admin/idea';
$route['admin/pelanggan/tampil']	= 'admin/customer';
$route['admin/pelanggan/promo']		= 'admin/promo';
$route['admin/supir']				= 'admin/driver';
$route['admin/waitinglist']			= 'admin/waitlist';
$route['admin/laporan/cs']			= 'admin/customer/laporan';
$route['admin/laporan/transaksi']	= 'admin/invoice/report';
$route['admin/laporan/mobil']		= 'admin/bus/laporan';
$route['send_promo']				= 'admin/promo/kirim';

///////////////////////////////////
// LOGIN ROUTE
///////////////////////////////////

$route['login']			= 'clogin/p_login';
$route['login/process'] = 'clogin/login_process';
$route['login/go_log'] 	= 'clogin/go_log';
$route['logout']		= 'clogin/logout';
$route['user_logout']	= 'clogin/user_logout';

///////////////////////////////////
// PUBLIC ROUTE
///////////////////////////////////
$route['memberlogin'] 				= 'public/vehicle/login';
$route['kendaraan']					= 'public/vehicle';
$route['daftar_kendaraan']			= 'public/vehicle/list';
$route['kirim_chat']				= 'cpublic/chatting';
$route['daftar_kendaraan/(:any)']  	= 'public/vehicle/search_list/$1';
$route['customer']					= 'public/vehicle/cs_beranda';
$route['kendaraan/(:any)']  		= 'public/vehicle/single_page/$1';
$route['ordercheck']			 	= 'cpublic/p_order_check';
$route['waitlist']				 	= 'cpublic/waitlist';
$route['wait_list/(:any)']			= 'public/vehicle/waitlist/$1';
$route['rent_vehicle/(:any)']		= 'public/vehicle/single_rent/$1';
$route['register']					= 'cpublic/register';
$route['login_user']				= 'cpublic/login_user';
$route['upload_bukti']				= 'public/invoice/upload_bukti';
$route['saran']						= 'cpublic/saran';
$route['saran/proses']				= 'cpublic/cek_saran';
$route['invoice/(:any)']		 	= 'public/invoice/index/$1';
$route['ordercheck/process'] 	 	= 'cpublic/proccess_order_check';
$route['page/(:any)'] 				= 'public/page/index/$1';
$route['promo_info']				= 'public/page/info_promo';
 

