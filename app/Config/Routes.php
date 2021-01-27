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
// $routes->get('/', 'Home::index');
$routes->get('/', 'Pages::index');
$routes->get('/home', 'Pages::index');
$routes->get('/nilai', 'Pages::nilai');
$routes->get('/nilai/nilai_mhs', 'Pages::nilai_mhs');

$routes->group('mahasiswa', ['namespace' => '\App\Controllers'], function($routes) {
  $routes->get('/', 'MahasiswaController::index');
  $routes->get('create', 'MahasiswaController::create');
  $routes->post('store', 'MahasiswaController::store');
  $routes->get('edit/(:num)', 'MahasiswaController::edit/$1');
  $routes->post('update', 'MahasiswaController::update');
  $routes->post('destroy', 'MahasiswaController::destroy');
  $routes->post('get_records', 'MahasiswaController::get_records');
});

$routes->group('master', ['namespace' => '\App\Controllers\Master'], function($routes) {
  
  $routes->group('fakultas', ['namespace' => '\App\Controllers\Master'], function($routes) {
    $routes->get('/', 'FakultasController::index');
    $routes->post('store', 'FakultasController::store');
    $routes->post('update', 'FakultasController::update');
    $routes->post('destroy', 'FakultasController::destroy');
    $routes->post('get_records', 'FakultasController::get_records');
  });

  $routes->group('jurusan', ['namespace' => '\App\Controllers\Master'], function($routes) {
    $routes->get('/', 'JurusanController::index');
    $routes->post('store', 'JurusanController::store');
    $routes->post('update', 'JurusanController::update');
    $routes->post('destroy', 'JurusanController::destroy');
    $routes->post('get_records', 'JurusanController::get_records');
  });

  $routes->group('matkul', ['namespace' => '\App\Controllers\Master'], function($routes) {
    $routes->get('/', 'MataKuliahController::index');
    $routes->post('store', 'MataKuliahController::store');
    $routes->post('update', 'MataKuliahController::update');
    $routes->post('destroy', 'MataKuliahController::destroy');
    $routes->post('get_records', 'MataKuliahController::get_records');
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
