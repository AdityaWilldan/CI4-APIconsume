<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Komik::index');
$routes->get('/detail/(:any)', 'Komik::detail/$1');
