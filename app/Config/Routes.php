<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('Modules\Auth\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false); // True para setar as config acima como default '/'

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Páginas fora do controle de login
 * --------------------------------------------------------------------
 */
$routes->group('/', function ($routes) {

	$routes->get('', 'Auth::index'); // from
	$routes->post('auth/login', 'Auth::login'); // post login
	$routes->get('auth/logout', 'Auth::logout'); //get logout

});

/*
 * --------------------------------------------------------------------
 * rotas protegidas
 * --------------------------------------------------------------------
 */ 
 
$routes->group('todo', ['namespace' => '\Modules\Todo','filter'=>'auth'], function($routes)
{
	$routes->get('relatorios/tarefas', 'Relatorios\Tarefas\Controllers\Tarefas::index'); // index
	
	$routes->group('dashboard', function ($routes) {

		$routes->get('', 'Dashboard\Controllers\Dashboard::index'); // index
	});

	$routes->group('tarefas', function ($routes) {
        $routes->match(['get'], 'editar/(:num)', 'Cadastros\Tarefas\Controllers\Tarefas::editar/$1'); // novo e salvar
		$routes->get('adicionar', 'Cadastros\Tarefas\Controllers\Tarefas::index'); // index
		$routes->post('salvar', 'Cadastros\Tarefas\Controllers\Tarefas::salvar'); // index
		$routes->get('listar', 'Cadastros\Tarefas\Controllers\Tarefas::listar'); // index
		$routes->get('status/(:num)/(:num)', 'Cadastros\Tarefas\Controllers\Tarefas::status/$1/$2'); // index
	});
	
    
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
