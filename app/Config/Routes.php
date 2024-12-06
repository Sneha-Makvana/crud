<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->get('/user', 'UserController::index');
// $routes->post('/user/create', 'UserController::create');
// $routes->get('/user/fetch', 'UserController::fetch');


$routes->get('/form', 'UserController::formPage');
$routes->get('/table', 'UserController::tablePage');
$routes->get('/UserController/fetchUsers', 'UserController::fetchUsers');
$routes->post('/UserController/createUser', 'UserController::createUser');
// $routes->post('/UserController/updateUser/(:num)', 'UserController::');
$routes->delete('/UserController/deleteUser/(:num)', 'UserController::deleteUser/$1');
$routes->get('UserController/fetchUser/(:num)', 'UserController::fetchUser/$1');
$routes->post('UserController/updateUser', 'UserController::updateUser');
