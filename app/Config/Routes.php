<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

use App\Controllers\Api\V1\AuthController;

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
/* Ruta de loggin */
/* users api*/

$routes->get('Api/Users/select', 'User::selectUser');
$routes->post('Api/Users/store', 'User::store');
$routes->get('Api/Users/update/(:num)', 'User::userUpdate/$1');
$routes->post('Api/Users/delete', 'User::deleteUser');
$routes->post('Api/Users/datoUpdate', 'User::update');

/*Paciente api */
$routes->get('Api/Paciente/allData','Paciente::allData');
$routes->post('Api/Paciente/store', 'Paciente::store');
$routes->get('Api/Paciente/update/(:num)', 'Paciente::pacienteUpdate/$1');
$routes->post('Api/Paciente/datoUpdate', 'Paciente::update');
/*Detalles api*/
$routes->get('Api/TestDetalleReporte/','TestPacienteDetalle::reportes');
$routes->get('Api/TestDetalleReporte/detalle','TestPacienteDetalle::total_test_detalle');


/** Rutas Administrativas logeadas */

$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {

    $routes->get('/administrador', 'Administrador::index');
    /** User */
    $routes->get('/Users', 'User::index');
    $routes->get('/Users/select', 'User::selectUser');
    $routes->post('/Users/store', 'User::store');
    $routes->get('/Users/update/(:num)', 'User::userUpdate/$1');
    $routes->post('/Users/delete', 'User::deleteUser');
    $routes->post('/Users/datoUpdate', 'User::update');
    /** Roles */
    $routes->get('/Roles/select', 'Rol::selectRoles');
    $routes->get('/Roles', 'Rol::index');
    /** Paciente */
    $routes->get('Paciente','Paciente::index');
    $routes->get('Paciente/allData','Paciente::allData');
    $routes->post('Paciente/store', 'Paciente::store');
    $routes->get('Paciente/update/(:num)', 'Paciente::pacienteUpdate/$1');
    $routes->post('Paciente/datoUpdate', 'Paciente::update');
    $routes->get('Paciente/detalle','Paciente::detalle');
    $routes->get('Paciente/allDataDetalle','Paciente::allDataDetalles');
    /** Test */
    $routes->get('Test/(:num)', 'TestPsicologia::index/$1');
    $routes->post('Test/store', 'TestPsicologia::store');
    $routes->get('Test/testdepresion','TestPsicologia::testdepresion');
    $routes->get('Test/test','TestPsicologia::test');
    $routes->get('Test/selecttestdepresion','TestPsicologia::selectTestDepresionRealizados');
    $routes->get('Test/selecttest','TestPsicologia::selecttest');
    /** Test Detelle */
    $routes->get('TestDetalle/testDetalle/(:num)','TestPacienteDetalle::index/$1');
    $routes->get('TestDetalleReporte/','TestPacienteDetalle::reportes');
    $routes->get('TestDetalleReporte/detalle','TestPacienteDetalle::total_test_detalle');

});

$routes->group('', ['filter' => 'AlreadyLoggedIn'], function ($routes) {
    $routes->get('/', 'Auth::index');
    $routes->get('/auth', 'Auth::index');

});

/*
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
