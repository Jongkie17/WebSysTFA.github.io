<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home::index');
$routes->get('/tasks', 'Tasks::index');
$routes->get('/profile', 'Profile::index');
$routes->get('/about', 'Pages::about');


$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attempt');
$routes->get('/logout', 'Auth::logout');


$routes->group('tasks', ['filter' => 'auth'], function ($routes) {
    $routes->get('new', 'Tasks::new');
    $routes->post('create', 'Tasks::create');

    $routes->get('edit/(:num)', 'Tasks::edit/$1');
    $routes->post('update/(:num)', 'Tasks::update/$1');

    $routes->get('delete/(:num)', 'Tasks::delete/$1');
});


$routes->group('', ['filter' => 'auth'], function ($routes) {

    $routes->get('/customers', 'Customers::index');
    $routes->get('/customers/new', 'Customers::new');
    $routes->post('/customers/create', 'Customers::create');
    $routes->get('/customers/edit/(:num)', 'Customers::edit/$1');
    $routes->post('/customers/update/(:num)', 'Customers::update/$1');

    $routes->get('/users', 'Users::index');
    $routes->get('/users/new', 'Users::new');
    $routes->post('/users/create', 'Users::create');
    $routes->get('/users/edit/(:num)', 'Users::edit/$1');
    $routes->post('/users/update/(:num)', 'Users::update/$1');
});