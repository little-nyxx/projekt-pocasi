<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Main::zeme');
$routes->get('stanice/(:num)', 'Main::staniceZemi/$1');
$routes->get('staniceinfo/(:num)', 'Main::staniceinfo/$1');
$routes->get('udaje/(:num)', 'Main::udajeStanic/$1');
$routes->get('zeme', 'Main::zeme');
$routes->get('vsechny', 'Main::vsechny');
