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
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'User';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/* User */
$route['data_peta'] = 'guest/Dashboard/main_map';
$route['data_peta_provinsi/(:any)'] = 'guest/Dashboard/map_province/$1';
$route['data_peta_provinsi'] = 'guest/Dashboard/map_province';
$route['data_peta_kabupaten/(:any)'] = 'guest/Dashboard/map_region/$1';
$route['data_peta_kabupaten'] = 'guest/Dashboard/map_region';
$route['data_peta_kecamatan/(:any)'] = 'guest/Dashboard/map_district/$1';
$route['data_peta_kecamatan'] = 'guest/Dashboard/map_district';
$route['data_grafik'] = 'guest/Dashboard/main_graph';
$route['info'] = 'guest/App/info';

/* Auth */
$route['login'] = 'Auth/login';
$route['login_process'] = 'Auth/login_process';
$route['registrasi'] = 'Auth/registration';
$route['register_process'] = 'Auth/register_process';

/* Admin */
$route['admin_side/launcher'] = 'admin/App/launcher';
$route['admin_side/beranda'] = 'admin/App/home';
$route['admin_side/menu'] = 'admin/App/menu';
$route['admin_side/log_activity'] = 'admin/App/log_activity';
$route['admin_side/cleaning_log'] = 'admin/App/cleaning_log';
$route['admin_side/tentang_aplikasi'] = 'admin/App/about';
$route['admin_side/bantuan'] = 'admin/App/helper';

$route['admin_side/dasbor_peta'] = 'admin/Dashboard';
$route['admin_side/peta_provinsi/(:any)'] = 'admin/Dashboard/province/$1';
$route['admin_side/peta_kabupaten/(:any)'] = 'admin/Dashboard/city/$1';
$route['admin_side/peta_kecamatan/(:any)'] = 'admin/Dashboard/sub_district/$1';

$route['admin_side/dasbor_grafik'] = 'admin/Dashboard/main_graph';
$route['admin_side/dasbor_grafik_provinsi/(:any)/(:any)'] = 'admin/Dashboard/graph_province/$1/$2';
$route['admin_side/dasbor_grafik_kabupaten/(:any)/(:any)'] = 'admin/Dashboard/graph_region/$1/$2';
$route['admin_side/dasbor_grafik_kecamatan/(:any)/(:any)'] = 'admin/Dashboard/graph_district/$1/$2';

$route['admin_side/administrator'] = 'admin/Master/administrator_data';
$route['admin_side/tambah_data_admin'] = 'admin/Master/add_administrator_data';
$route['admin_side/simpan_data_admin'] = 'admin/Master/save_administrator_data';
$route['admin_side/detail_data_admin/(:any)'] = 'admin/Master/detail_administrator_data/$1';
$route['admin_side/ubah_data_admin/(:any)'] = 'admin/Master/edit_administrator_data/$1';
$route['admin_side/perbarui_data_admin'] = 'admin/Master/update_administrator_data';
$route['admin_side/atur_ulang_kata_sandi_admin/(:any)'] = 'admin/Master/reset_password_administrator_account/$1';
$route['admin_side/hapus_data_admin/(:any)'] = 'admin/Master/delete_administrator_data/$1';

$route['admin_side/kube'] = 'admin/Master/kube_data';
$route['admin_side/tambah_data_kube'] = 'admin/Master/add_kube_data';
$route['admin_side/simpan_data_kube'] = 'admin/Master/save_kube_data';
$route['admin_side/detil_data_kube/(:any)'] = 'admin/Master/detail_kube_data/$1';
$route['admin_side/ubah_data_kube/(:any)'] = 'admin/Master/edit_kube_data/$1';
$route['admin_side/perbarui_data_kube'] = 'admin/Master/update_kube_data';
$route['admin_side/simpan_data_anggota_kube'] = 'admin/Master/save_kube_member';
$route['admin_side/perbarui_data_anggota_kube'] = 'admin/Master/update_kube_member';
$route['admin_side/atur_ulang_kata_sandi_anggota_kube/(:any)'] = 'admin/Master/reset_password_kube_member_account/$1';
$route['admin_side/hapus_data_kube/(:any)'] = 'admin/Master/delete_kube_data/$1';
$route['admin_side/hapus_data_anggota_kube/(:any)'] = 'admin/Master/delete_kube_member/$1';

$route['admin_side/rutilahu'] = 'admin/Master/rutilahu_data';
$route['admin_side/tambah_data_rutilahu'] = 'admin/Master/add_rutilahu_data';
$route['admin_side/simpan_data_rutilahu'] = 'admin/Master/save_rutilahu_data';
$route['admin_side/detil_data_rutilahu/(:any)'] = 'admin/Master/detail_rutilahu_data/$1';
$route['admin_side/ubah_data_rutilahu/(:any)'] = 'admin/Master/edit_rutilahu_data/$1';
$route['admin_side/perbarui_data_rutilahu'] = 'admin/Master/update_rutilahu_data';
$route['admin_side/simpan_data_anggota_rutilahu'] = 'admin/Master/save_rutilahu_member';
$route['admin_side/perbarui_data_anggota_rutilahu'] = 'admin/Master/update_rutilahu_member';
$route['admin_side/atur_ulang_kata_sandi_anggota_rutilahu/(:any)'] = 'admin/Master/reset_password_rutilahu_member_account/$1';
$route['admin_side/hapus_data_rutilahu/(:any)'] = 'admin/Master/delete_rutilahu_data/$1';
$route['admin_side/hapus_data_anggota_rutilahu/(:any)'] = 'admin/Master/delete_rutilahu_member/$1';

$route['admin_side/sarling'] = 'admin/Master/sarling_data';
$route['admin_side/tambah_data_sarling'] = 'admin/Master/add_sarling_data';
$route['admin_side/simpan_data_sarling'] = 'admin/Master/save_sarling_data';
$route['admin_side/detil_data_sarling/(:any)'] = 'admin/Master/detail_sarling_data/$1';
$route['admin_side/ubah_data_sarling/(:any)'] = 'admin/Master/edit_sarling_data/$1';
$route['admin_side/perbarui_data_sarling'] = 'admin/Master/update_sarling_data';
$route['admin_side/simpan_data_anggota_sarling'] = 'admin/Master/save_sarling_member';
$route['admin_side/perbarui_data_anggota_sarling'] = 'admin/Master/update_sarling_member';
$route['admin_side/atur_ulang_kata_sandi_anggota_sarling/(:any)'] = 'admin/Master/reset_password_sarling_member_account/$1';
$route['admin_side/hapus_data_sarling/(:any)'] = 'admin/Master/delete_sarling_data/$1';
$route['admin_side/hapus_data_anggota_sarling/(:any)'] = 'admin/Master/delete_sarling_member/$1';

$route['admin_side/data_provinsi'] = 'admin/Map/province';
$route['admin_side/tambah_data_provinsi'] = 'admin/Map/add_province';
$route['admin_side/simpan_data_provinsi'] = 'admin/Map/save_province';
$route['admin_side/ubah_data_provinsi/(:any)'] = 'admin/Map/edit_province/$1';
$route['admin_side/perbarui_data_provinsi'] = 'admin/Map/update_province_data';
$route['admin_side/hapus_data_provinsi/(:any)'] = 'admin/Map/delete_province/$1';
$route['admin_side/data_kabkot'] = 'admin/Map/city';
$route['admin_side/tambah_data_kabkot'] = 'admin/Map/add_city';
$route['admin_side/simpan_data_kabkot'] = 'admin/Map/save_city';
$route['admin_side/ubah_data_kabkot/(:any)'] = 'admin/Map/edit_city/$1';
$route['admin_side/perbarui_data_kabkot'] = 'admin/Map/update_city_data';
$route['admin_side/hapus_data_kabkot/(:any)'] = 'admin/Map/delete_city/$1';
$route['admin_side/data_kecamatan'] = 'admin/Map/sub_district';
$route['admin_side/tambah_data_kecamatan'] = 'admin/Map/add_sub_district';
$route['admin_side/simpan_data_kecamatan'] = 'admin/Map/save_sub_district';
$route['admin_side/ubah_data_kecamatan/(:any)'] = 'admin/Map/edit_sub_district/$1';
$route['admin_side/perbarui_data_kecamatan'] = 'admin/Map/update_sub_district_data';
$route['admin_side/hapus_data_kecamatan/(:any)'] = 'admin/Map/delete_sub_district/$1';
$route['admin_side/data_kelurahan'] = 'admin/Map/village';
$route['admin_side/tambah_data_kelurahan'] = 'admin/Map/add_village';
$route['admin_side/simpan_data_kelurahan'] = 'admin/Map/save_village';
$route['admin_side/ubah_data_kelurahan/(:any)'] = 'admin/Map/edit_village/$1';
$route['admin_side/perbarui_data_kelurahan'] = 'admin/Map/update_village_data';
$route['admin_side/hapus_data_kelurahan/(:any)'] = 'admin/Map/delete_village/$1';

$route['admin_side/laporan_kube'] = 'admin/Report/kube';
$route['admin_side/tambah_laporan_kube'] = 'admin/Report/add_kube_report';
$route['admin_side/simpan_laporan_kube'] = 'admin/Report/save_kube_report';
$route['admin_side/detil_laporan_kube/(:any)'] = 'admin/Report/detail_kube_report/$1';
$route['admin_side/ubah_data_laporan_kube/(:any)'] = 'admin/Report/edit_kube_report/$1';
$route['admin_side/perbarui_laporan_kube'] = 'admin/Report/update_kube_report';
$route['admin_side/hapus_data_laporan_kube/(:any)'] = 'admin/Report/delete_kube_report/$1';

$route['admin_side/laporan_rutilahu'] = 'admin/Report/rutilahu';
$route['admin_side/tambah_laporan_rutilahu'] = 'admin/Report/add_rutilahu_report';
$route['admin_side/simpan_laporan_rutilahu'] = 'admin/Report/save_rutilahu_report';
$route['admin_side/detil_laporan_rutilahu/(:any)'] = 'admin/Report/detail_rutilahu_report/$1';
$route['admin_side/ubah_data_laporan_rutilahu/(:any)'] = 'admin/Report/edit_rutilahu_report/$1';
$route['admin_side/perbarui_laporan_rutilahu'] = 'admin/Report/update_rutilahu_report';
$route['admin_side/hapus_data_laporan_rutilahu/(:any)'] = 'admin/Report/delete_rutilahu_report/$1';

$route['admin_side/laporan_sarling'] = 'admin/Report/sarling';
$route['admin_side/tambah_laporan_sarling'] = 'admin/Report/add_sarling_report';
$route['admin_side/simpan_laporan_sarling'] = 'admin/Report/save_sarling_report';
$route['admin_side/detil_laporan_sarling/(:any)'] = 'admin/Report/detail_sarling_report/$1';
$route['admin_side/ubah_data_laporan_sarling/(:any)'] = 'admin/Report/edit_sarling_report/$1';
$route['admin_side/perbarui_laporan_sarling'] = 'admin/Report/update_sarling_report';
$route['admin_side/hapus_data_laporan_sarling/(:any)'] = 'admin/Report/delete_sarling_report/$1';

/* Admin Wilayah (Provinsi atau Kabupaten/ Kota) */
$route['spv/launcher'] = 'spv/App/launcher';
$route['spv/beranda'] = 'spv/App/home';
$route['spv/menu'] = 'spv/App/menu';
$route['spv/log_activity'] = 'spv/App/log_activity';
$route['spv/cleaning_log'] = 'spv/App/cleaning_log';
$route['spv/tentang_aplikasi'] = 'spv/App/about';
$route['spv/bantuan'] = 'spv/App/helper';

$route['spv/dasbor_peta'] = 'spv/Dashboard';
$route['spv/peta_provinsi/(:any)'] = 'spv/Dashboard/province/$1';
$route['spv/peta_kabupaten/(:any)'] = 'spv/Dashboard/city/$1';
$route['spv/peta_kecamatan/(:any)'] = 'spv/Dashboard/sub_district/$1';

$route['spv/dasbor_grafik'] = 'spv/Dashboard/main_graph';
$route['spv/dasbor_grafik_provinsi/(:any)'] = 'spv/Dashboard/graph_province/$1';
$route['spv/dasbor_grafik_provinsi/(:any)/(:any)'] = 'spv/Dashboard/graph_province/$1/$2';
$route['spv/dasbor_grafik_kabupaten/(:any)'] = 'spv/Dashboard/graph_region/$1';
$route['spv/dasbor_grafik_kabupaten/(:any)/(:any)'] = 'spv/Dashboard/graph_region/$1/$2';
$route['spv/dasbor_grafik_kecamatan/(:any)/(:any)'] = 'spv/Dashboard/graph_district/$1/$2';

$route['spv/laporan_kube'] = 'spv/Report/kube';
$route['spv/tambah_laporan_kube'] = 'spv/Report/add_kube_report';
$route['spv/simpan_laporan_kube'] = 'spv/Report/save_kube_report';
$route['spv/detil_laporan_kube/(:any)'] = 'spv/Report/detail_kube_report/$1';
$route['spv/ubah_data_laporan_kube/(:any)'] = 'spv/Report/edit_kube_report/$1';
$route['spv/perbarui_laporan_kube'] = 'spv/Report/update_kube_report';
$route['spv/hapus_data_laporan_kube/(:any)'] = 'spv/Report/delete_kube_report/$1';

$route['spv/laporan_rutilahu'] = 'spv/Report/rutilahu';
$route['spv/tambah_laporan_rutilahu'] = 'spv/Report/add_rutilahu_report';
$route['spv/simpan_laporan_rutilahu'] = 'spv/Report/save_rutilahu_report';
$route['spv/detil_laporan_rutilahu/(:any)'] = 'spv/Report/detail_rutilahu_report/$1';
$route['spv/ubah_data_laporan_rutilahu/(:any)'] = 'spv/Report/edit_rutilahu_report/$1';
$route['spv/perbarui_laporan_rutilahu'] = 'spv/Report/update_rutilahu_report';
$route['spv/hapus_data_laporan_rutilahu/(:any)'] = 'spv/Report/delete_rutilahu_report/$1';

$route['spv/laporan_sarling'] = 'spv/Report/sarling';
$route['spv/tambah_laporan_sarling'] = 'spv/Report/add_sarling_report';
$route['spv/simpan_laporan_sarling'] = 'spv/Report/save_sarling_report';
$route['spv/detil_laporan_sarling/(:any)'] = 'spv/Report/detail_sarling_report/$1';
$route['spv/ubah_data_laporan_sarling/(:any)'] = 'spv/Report/edit_sarling_report/$1';
$route['spv/perbarui_laporan_sarling'] = 'spv/Report/update_sarling_report';
$route['spv/hapus_data_laporan_sarling/(:any)'] = 'spv/Report/delete_sarling_report/$1';

/* Member a.k.a Anggota Kelompok */
$route['member_side/launcher'] = 'member/App/launcher';
$route['member_side/beranda'] = 'member/App/home';
$route['member_side/menu'] = 'member/App/menu';
$route['member_side/log_activity'] = 'member/App/log_activity';
$route['member_side/cleaning_log'] = 'member/App/cleaning_log';
$route['member_side/tentang_aplikasi'] = 'member/App/about';
$route['member_side/bantuan'] = 'member/App/helper';

$route['spv/kube'] = 'spv/Master/kube_data';
$route['spv/tambah_data_kube'] = 'spv/Master/add_kube_data';
$route['spv/simpan_data_kube'] = 'spv/Master/save_kube_data';
$route['spv/detil_data_kube/(:any)'] = 'spv/Master/detail_kube_data/$1';
$route['spv/ubah_data_kube/(:any)'] = 'spv/Master/edit_kube_data/$1';
$route['spv/perbarui_data_kube'] = 'spv/Master/update_kube_data';
$route['spv/simpan_data_anggota_kube'] = 'spv/Master/save_kube_member';
$route['spv/perbarui_data_anggota_kube'] = 'spv/Master/update_kube_member';
$route['spv/atur_ulang_kata_sandi_anggota_kube/(:any)'] = 'spv/Master/reset_password_kube_member_account/$1';
$route['spv/hapus_data_kube/(:any)'] = 'spv/Master/delete_kube_data/$1';
$route['spv/hapus_data_anggota_kube/(:any)'] = 'spv/Master/delete_kube_member/$1';

$route['spv/rutilahu'] = 'spv/Master/rutilahu_data';
$route['spv/tambah_data_rutilahu'] = 'spv/Master/add_rutilahu_data';
$route['spv/simpan_data_rutilahu'] = 'spv/Master/save_rutilahu_data';
$route['spv/detil_data_rutilahu/(:any)'] = 'spv/Master/detail_rutilahu_data/$1';
$route['spv/ubah_data_rutilahu/(:any)'] = 'spv/Master/edit_rutilahu_data/$1';
$route['spv/perbarui_data_rutilahu'] = 'spv/Master/update_rutilahu_data';
$route['spv/simpan_data_anggota_rutilahu'] = 'spv/Master/save_rutilahu_member';
$route['spv/perbarui_data_anggota_rutilahu'] = 'spv/Master/update_rutilahu_member';
$route['spv/atur_ulang_kata_sandi_anggota_rutilahu/(:any)'] = 'spv/Master/reset_password_rutilahu_member_account/$1';
$route['spv/hapus_data_rutilahu/(:any)'] = 'spv/Master/delete_rutilahu_data/$1';
$route['spv/hapus_data_anggota_rutilahu/(:any)'] = 'spv/Master/delete_rutilahu_member/$1';

$route['spv/sarling'] = 'spv/Master/sarling_data';
$route['spv/tambah_data_sarling'] = 'spv/Master/add_sarling_data';
$route['spv/simpan_data_sarling'] = 'spv/Master/save_sarling_data';
$route['spv/detil_data_sarling/(:any)'] = 'spv/Master/detail_sarling_data/$1';
$route['spv/ubah_data_sarling/(:any)'] = 'spv/Master/edit_sarling_data/$1';
$route['spv/perbarui_data_sarling'] = 'spv/Master/update_sarling_data';
$route['spv/simpan_data_anggota_sarling'] = 'spv/Master/save_sarling_member';
$route['spv/perbarui_data_anggota_sarling'] = 'spv/Master/update_sarling_member';
$route['spv/atur_ulang_kata_sandi_anggota_sarling/(:any)'] = 'spv/Master/reset_password_sarling_member_account/$1';
$route['spv/hapus_data_sarling/(:any)'] = 'spv/Master/delete_sarling_data/$1';
$route['spv/hapus_data_anggota_sarling/(:any)'] = 'spv/Master/delete_sarling_member/$1';

$route['member_side/tambah_laporan_kube'] = 'member/Report/add_kube_report';
$route['member_side/simpan_laporan_kube'] = 'member/Report/save_kube_report';
$route['member_side/detil_laporan_kube/(:any)'] = 'member/Report/detail_kube_report/$1';
$route['member_side/ubah_data_laporan_kube/(:any)'] = 'member/Report/edit_kube_report/$1';
$route['member_side/perbarui_laporan_kube'] = 'member/Report/update_kube_report';
$route['member_side/hapus_data_laporan_kube/(:any)'] = 'member/Report/delete_kube_report/$1';

$route['member_side/tambah_laporan_rutilahu'] = 'member/Report/add_rutilahu_report';
$route['member_side/simpan_laporan_rutilahu'] = 'member/Report/save_rutilahu_report';
$route['member_side/detil_laporan_rutilahu/(:any)'] = 'member/Report/detail_rutilahu_report/$1';
$route['member_side/ubah_data_laporan_rutilahu/(:any)'] = 'member/Report/edit_rutilahu_report/$1';
$route['member_side/perbarui_laporan_rutilahu'] = 'member/Report/update_rutilahu_report';
$route['member_side/hapus_data_laporan_rutilahu/(:any)'] = 'member/Report/delete_rutilahu_report/$1';

$route['member_side/tambah_laporan_sarling'] = 'member/Report/add_sarling_report';
$route['member_side/simpan_laporan_sarling'] = 'member/Report/save_sarling_report';
$route['member_side/detil_laporan_sarling/(:any)'] = 'member/Report/detail_sarling_report/$1';
$route['member_side/ubah_data_laporan_sarling/(:any)'] = 'member/Report/edit_sarling_report/$1';
$route['member_side/perbarui_laporan_sarling'] = 'member/Report/update_sarling_report';
$route['member_side/hapus_data_laporan_sarling/(:any)'] = 'member/Report/delete_sarling_report/$1';

/* REST API */
$route['api'] = 'Rest_server/documentation';

$route['api/login'] = 'api/auth/Login';
$route['api/change_password'] = 'api/auth/Change_password';

$route['api/indikator'] = 'api/master/Indikator';
$route['api/user_data'] = 'api/master/User_data';
$route['api/device'] = 'api/master/Device';
$route['api/provinsi'] = 'api/master/Provinsi';
$route['api/kabupaten'] = 'api/master/Kabupaten';
$route['api/kecamatan'] = 'api/master/Kecamatan';
$route['api/desa'] = 'api/master/Desa';

$route['api/kube'] = 'api/kube/Master';
$route['api/anggota_kube'] = 'api/kube/Member';
$route['api/laporan_kube'] = 'api/kube/Report';

$route['api/rutilahu'] = 'api/rutilahu/Master';
$route['api/anggota_rutilahu'] = 'api/rutilahu/Member';
$route['api/laporan_rutilahu'] = 'api/rutilahu/Report';

$route['api/sarling'] = 'api/sarling/Master';
$route['api/anggota_sarling'] = 'api/sarling/Member';
$route['api/laporan_sarling'] = 'api/sarling/Report';

$route['api/hapus_laporan'] = 'api/Other/delete_report';

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8