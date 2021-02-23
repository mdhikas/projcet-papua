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
$routes->setDefaultController('Pages');
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
// $routes->get('/', 'Home::index');

$routes->group('dashboard', ['namespace' => '\App\Controllers'], function ($routes) {
  $routes->get('/', 'Pages::index', ['filter => role:superadmin']);
});

$routes->group('admin', ['namespace' => '\App\Controllers\Admin'], function ($routes) {
  $routes->get('/', 'AdminController::index');
  $routes->get('create', 'AdminController::create');
  $routes->post('save', 'AdminController::save');
  $routes->get('edit/(:num)', 'AdminController::edit/$1');
  $routes->post('update/(:num)', 'AdminController::update/$1');
  $routes->delete('delete/(:num)', 'AdminController::delete/$1');
});

$routes->group('user', ['namespace' => '\App\Controllers\User'], function ($routes) {
  $routes->get('profile/(:segment)', 'UserController::index/$1');
  $routes->get('nilai/(:segment)', 'UserController::index/$1');
});



$routes->group('mahasiswa', ['namespace' => '\App\Controllers'], function ($routes) {
  $routes->get('/', 'MahasiswaController::index');
  $routes->get('create', 'MahasiswaController::create');
  $routes->post('store', 'MahasiswaController::store');
  $routes->get('edit/(:num)', 'MahasiswaController::edit/$1');
  $routes->post('update', 'MahasiswaController::update');
  $routes->post('destroy', 'MahasiswaController::destroy');
  $routes->post('get_records', 'MahasiswaController::get_records');
  $routes->post('search_nim', 'MahasiswaController::get_mahasiswa_by_nim');
  $routes->post('get_nama_mahasiswa_by_nim', 'MahasiswaController::get_nama_mahasiswa_by_nim');

  $routes->group('nilai', ['namespace' => '\App\Controllers'], function ($routes) {
    $routes->get('/', 'NilaiMahasiswaController::index');
    $routes->get('create', 'NilaiMahasiswaController::create');
    $routes->post('store', 'NilaiMahasiswaController::store');
    $routes->post('search_nim', 'NilaiMahasiswaController::get_mahasiswa_by_nim');
    $routes->get('get_list_nilai_mahasiswa', 'NilaiMahasiswaController::get_list_nilai_mahasiswa');
  });
});

$routes->group('master', ['namespace' => '\App\Controllers\Master'], function ($routes) {

  $routes->group('fakultas', ['namespace' => '\App\Controllers\Master'], function ($routes) {
    $routes->get('/', 'FakultasController::index');
    $routes->post('store', 'FakultasController::store');
    $routes->post('update', 'FakultasController::update');
    $routes->post('destroy', 'FakultasController::destroy');
    $routes->post('get_records', 'FakultasController::get_records');
  });

  $routes->group('jurusan', ['namespace' => '\App\Controllers\Master'], function ($routes) {
    $routes->get('/', 'JurusanController::index');
    $routes->post('store', 'JurusanController::store');
    $routes->post('update', 'JurusanController::update');
    $routes->post('destroy', 'JurusanController::destroy');
    $routes->post('get_records', 'JurusanController::get_records');
  });

  $routes->group('matkul', ['namespace' => '\App\Controllers\Master'], function ($routes) {
    $routes->get('/', 'MataKuliahController::index');
    $routes->post('store', 'MataKuliahController::store');
    $routes->post('update', 'MataKuliahController::update');
    $routes->post('destroy', 'MataKuliahController::destroy');
    $routes->post('get_records', 'MataKuliahController::get_records');
    $routes->get('search_kode_mk', 'MataKuliahController::get_matkul_by_kode_mk');
    $routes->get('get_nama_matkul_by_kode_mk', 'MataKuliahController::get_nama_matkul_by_kode_mk');
  });

  $routes->group('semester', ['namespace' => '\App\Controllers\Master'], function ($routes) {
    $routes->get('/', 'SemesterController::index');
    $routes->post('store', 'SemesterController::store');
    $routes->post('update', 'SemesterController::update');
    $routes->post('destroy', 'SemesterController::destroy');
    $routes->post('get_records', 'SemesterController::get_records');
  });
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
