<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Sistem::index');

$routes->group('Admin', function ($routes) {
	$routes->add('/', 'Admin::login', ['as' => 'login_admin']);
	$routes->post('login', 'Admin::proses', ['as' => 'cek_admin']);
});
$routes->addRedirect('sistem/(:any)', 'Sistem');
$routes->group('Sistem', function ($routes) {
	$routes->add('alternatif', 'Sistem::alternatif', ['as' => 'list_alternatif']);
	$routes->post('alternatif/tambah', 'Sistem::tambah_siswa', ['as' => 'add_alternatif']);
	$routes->post('alternatif/ubah/(:num)', 'Sistem::ubah_siswa/$1', ['as' => 'edit_alternatif']);
	$routes->add('alternatif/hapus/(:num)', 'Sistem::hapus_siswa/$1', ['as' => 'del_alternatif']);
	$routes->add('alternatif/batch', 'Sistem::batch_siswa', ['as' => 'batch_alternatif']);

	$routes->add('kriteria', 'Sistem::kriteria', ['as' => 'list_kriteria']);
	$routes->post('kriteria/tambah', 'Sistem::tambah_kriteria', ['as' => 'add_kriteria']);
	$routes->post('kriteria/ubah/(:num)', 'Sistem::ubah_kriteria/$1', ['as' => 'edit_kriteria']);
	$routes->add('kriteria/hapus/(:num)', 'Sistem::hapus_kriteria/$1', ['as' => 'del_kriteria']);
	$routes->add('kriteria/batch', 'Sistem::batch_kriteria', ['as' => 'batch_kriteria']);

	$routes->add('subkriteria', 'Sistem::subkriteria', ['as' => 'list_subkriteria']);
	$routes->post('subkriteria/tambah', 'Sistem::tambah_subkriteria', ['as' => 'add_subkriteria']);
	$routes->post('subkriteria/ubah/(:num)', 'Sistem::ubah_subkriteria/$1', ['as' => 'edit_subkriteria']);
	$routes->add('subkriteria/hapus/(:num)', 'Sistem::hapus_subkriteria/$1', ['as' => 'del_subkriteria']);
	$routes->add('subkriteria/batch', 'Sistem::batch_subkriteria', ['as' => 'batch_subkriteria']);

	$routes->add('nilai/(:num)/(:num)/(:any)', 'Sistem::nilai/$1/$2/$3');
	$routes->add('ranking', 'Sistem::gap2', ['as' => 'ranking']);
});
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}