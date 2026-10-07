<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');

$routes->get('/about', 'About::index');

$routes->get('/services', 'Services::index');

$routes->match(['get', 'post'], '/contact', 'Contact::index');

$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::create');

$routes->get('/login', 'Accounts::login');
$routes->post('/login', 'Accounts::login');
$routes->post('/logout', 'Accounts::logout');

$routes->get('/accounts', 'Accounts::index');

$routes->get('/account/(:num)', 'Accounts::viewAccount/$1');

$routes->get('/account/create', 'Accounts::create');
$routes->post('/account', 'Accounts::store');

$routes->get('/account/(:num)/edit', 'Accounts::edit/$1');
$routes->post('/account/(:num)', 'Accounts::update/$1');

$routes->post('/account/(:num)/delete', 'Accounts::delete/$1');