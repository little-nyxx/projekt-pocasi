<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Main::zeme');
$routes->get('stanice/(:num)', 'Main::stanice/$1');
$routes->get('udaje', 'Main::udaje');
$routes->get('zeme', 'Main::zeme');
