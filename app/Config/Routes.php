<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], 'insert', 'Home::insert');
$routes->get('listAuthors', 'Home::listAuthors');
$routes->get('deleteAuthor/(:any)', 'Home::deleteAuthor/$1');
$routes->get('drilldownAuthor/(:any)', 'Home::drilldownAuthor/$1');
$routes->match(['get', 'post'], 'updateAuthor/(:any)', 'Home::updateAuthor/$1');