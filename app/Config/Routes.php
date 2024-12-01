<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'AdminController::index');
$routes->get('/', 'AuthController::login');


$routes->group('kos', function($routes) {
    $routes->get('/', 'KosController::index'); // Display the list of kos
    $routes->get('create', 'KosController::create'); // Show form to add new kos
    $routes->post('store', 'KosController::store'); // Handle form submission for new ko
    

});

$routes->get('kriteria/getSubKriteria/(:num)', 'KosController::getSubKriteria/$1');
// New routes for updating and deleting
$routes->group('kriteria', function($routes) {
    $routes->get('/', 'KriteriaController::index');
    $routes->post('add', 'KriteriaController::addKriteria');
    $routes->post('add-sub', 'KriteriaController::addSubKriteria');
    $routes->post('delete/(:num)', 'KriteriaController::deleteKriteria/$1');
});



$routes->get('comparisons', 'CriteriaComparisonController::index');
$routes->post('criteria-comparison/process', 'CriteriaComparisonController::process');

$routes->get('perbandingan', 'PerbandinganController::index');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'AdminController::index', ['as' => 'dashboard']);

    // profile
    $routes->group('profile', function ($routes) {
        $routes->get('/', 'ProfileController::profile', ['as' => 'profile']);
        $routes->post('update/(:num)', 'ProfileController::update/$1', ['as' => 'update-profile']);
        $routes->post('change-password/(:num)', 'ProfileController::changePassword/$1', ['as' => 'change-password']);
    });
});


// route login register
$routes->group('auth', function ($routes) {
    $routes->get('register', 'AuthController::register');
    $routes->post('store', 'AuthController::store', ['as' => 'signup']);
    $routes->get('login', 'AuthController::login');
    $routes->post('authenticate', 'AuthController::authenticate', ['as' => 'authenticate']);
    $routes->get('logout', 'AuthController::logout', ['as' => 'logout']);
});