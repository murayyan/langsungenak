<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'home/katalog';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// user
$route['login'] = 'authentication/login';
$route['register'] = 'authentication/register';
$route['profil'] = 'customer/profil/profil';
$route['update_profil'] = 'customer/profil/profil';
$route['logout'] = 'authentication/logout';
$route['pesanan'] = 'customer/pesanan/pesanan';
$route['checkout'] = 'customer/pesanan/checkout';
$route['katalog'] = 'customer/pesanan/katalog';
$route['payment/(:num)'] = 'customer/pembayaran/payment/$1';

// admin
$route['admin'] = 'authentication/admin_login';
$route['admin/login'] = 'authentication/admin_login';
$route['admin/logout'] = 'authentication/admin_logout';
$route['admin/dashboard'] = 'admin/dashboard/dashboard';
$route['admin/data_user'] = 'admin/register/data_user';
$route['admin/register'] = 'admin/register/register';
$route['admin/data_produk'] = 'admin/produk/data_produk';
$route['admin/produk'] = 'admin/produk/add_produk';
$route['admin/produk/(:num)'] = 'admin/produk/edit_produk/$1';
$route['admin/data_pesanan'] = 'admin/pesanan/data_pesanan';
$route['admin/produksi'] = 'admin/produksi/produksi';
$route['admin/pesanan/(:num)'] = 'admin/pesanan/detail_pesanan/$1';
$route['admin/data_bahanbaku'] = 'admin/bahanbaku/data_bahanbaku';
$route['admin/jadwal_pengantaran'] = 'admin/pengantaran/jadwal_pengantaran';
$route['admin/jadwal_pengantaran/detail/(:num)'] = 'admin/pengantaran/detail_pengantaran/$1';
$route['admin/input_retur'] = 'admin/pengantaran/input_retur';
