<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('insertArtist', 'ArtistController::showInsertArtistForm');
$routes->post('insertArtist', 'ArtistController::insertArtist');

$routes->match(['get', 'post'], 'insertArtist', 'ArtistController::insertArtist');

$routes->get('updateArtist/(:num)', 'ArtistController::showUpdateArtistForm/$1');
$routes->post('update/(:num)', 'ArtistController::updateArtist/$1');

$routes->match(['get', 'post'], 'updateArtist/(:num)', 'ArtistController::updateArtist/$1');
$routes->get('deleteArtist/(:num)', 'ArtistController::deleteArtist/$1');


// auth
$routes->get('/login', 'AuthController::login');
$routes->post('/auth/loginSubmit', 'AuthController::loginSubmit');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/addAdmin', 'AuthController::addAdmin');
$routes->post('/auth/addAdminSubmit', 'AuthController::addAdminSubmit');

$routes->get('/register', 'AuthController::register');
$routes->post('/auth/registerSubmit', 'AuthController::registerSubmit');

$routes->get('/products', 'ProductController::index');
$routes->get('/products/search', 'ProductController::search');
$routes->get('/products/view/(:any)', 'ProductController::view/$1');
$routes->get('/products/create', 'ProductController::create');
$routes->post('/products/store', 'ProductController::store');
$routes->get('/products/edit/(:any)', 'ProductController::edit/$1');
$routes->post('/products/update/(:any)', 'ProductController::update/$1');
$routes->get('/products/delete/(:any)', 'ProductController::delete/$1');

$routes->get('/products/addToWishlist/(:any)', 'ProductController::addToWishlist/$1');
$routes->get('/products/viewWishlist', 'ProductController::viewWishlist');
$routes->get('/products/deleteFromWishlist/(:any)', 'ProductController::deleteFromWishlist/$1');

//$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/dashboard', 'ProductController::index');

$routes->get('cart/view', 'CartController::viewCart');
$routes->get('cart/addToCart/(:segment)', 'CartController::addToCart/$1');
$routes->get('cart/removeFromCart/(:segment)', 'CartController::removeFromCart/$1');

$routes->get('orders/view', 'OrderController::viewAllOrders');
$routes->get('orders/view/(:segment)', 'OrderController::viewOrder/$1');
$routes->match(['get', 'post'], 'orders/update/(:segment)', 'OrderController::editOrder/$1');
$routes->match(['get', 'post'], 'orders/edit/(:segment)', 'OrderController::editOrder/$1');





$routes->get('artists', 'ArtistController::listArtists');
$routes->get('drilldownArtist/(:num)', 'ArtistController::drilldownArtist/$1');


$routes->get('/about', 'TestController::about');

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