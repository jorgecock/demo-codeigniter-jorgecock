	<?php

use CodeIgniter\Router\RouteCollection;



/**
 * @var RouteCollection $routes
 */

$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');

$routes->get('/', 'HomeController::index');
$routes->get('/rockets', 'RocketController::index');
$routes->get('/rockets/create', 'RocketController::create');
$routes->post('/rockets/store', 'RocketController::store');
$routes->get('/rockets/spacex', 'RocketController::getSpaceXRockets');
$routes->get('rockets/edit/(:num)', 'RocketController::edit/$1');
$routes->post('rockets/update/(:num)', 'RocketController::update/$1');
$routes->get('rockets/delete/(:num)', 'RocketController::delete/$1'); 