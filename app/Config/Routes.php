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

$routes->match(['get', 'post'], 'insertCustomer', 'Home::insertCustomer');
$routes->get('listCustomers', 'Home::listCustomers');
$routes->get('deleteCustomer/(:any)', 'Home::deleteCustomer/$1');
$routes->get('drilldownCustomer/(:any)', 'Home::drilldownCustomer/$1');
$routes->match(['get', 'post'], 'updateCustomer/(:any)', 'Home::updateCustomer/$1');