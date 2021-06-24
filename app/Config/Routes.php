<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.



$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');


$routes->group('plan', function($route){
  $route->match(
   ['get', 'post'],
   'saveplan', 
   'PlanController::savePlan' 
  );
  
  $route->match(
   ['get', 'post'],
   'savefiles', 
   'PlanController::processImages' 
  );
  
  $route->match(
   ['get', 'post'],
   'get', 
   'PlanController::getPlans' 
  );
  
  $route->match(
   ['get', 'post'],
   'add-to-cart', 
   'PlanController::addToCart' 
  );
});

### AUTH ROUTES
$routes->group('/', function ($routes){
  
  # Register
  $routes->match(
    ['get', 'post'], 
    'attemptRegister',
    'AuthController::attemptRegister'
  );
  $routes->get('register', 'AuthController::register');
  
  #login
  $routes->get('login', 'AuthController::login');
  $routes->match(
    ['get', 'post'], 
    'attemptLogin',
    'AuthController::attemptLogin'
  ); 
  
  $routes->match(
    ['get', 'post'], 
    'logout',
    'AuthController::logout'
  );
  
  #forgot
  $routes->match(
    ['get', 'post'], 
    'attemptForgot',
    'AuthController::attemptForgot'
  );
  $routes->get('forgot', 'AuthController::forgotPassword');
  $routes->get('reset-password', 'AuthController::resetPassword');
  
  # Activate account 
  $routes->get('activate-account', 'AuthController::activateAccount');
  $routes->match(
    ['get', 'post'], 
    'resend-activate-account',
    'AuthController::resendActivateAccount'
  );
  
  
});


# APPLICATION ROUTER
$routes->group('app', function ($routes){
  $routes->get('/', 'Application::index');
  
  $routes->match(
    ['get', 'post'], 
    'fetch-user-data',
    'Application::user'
  ); 
  
  $routes->get('(:segment)', 'Application::view/$1');
});


# Dashboard ROUTES
$routes->group('dashboard', function($routes){
  $routes->get('/', 'Dashboard::index');
    
  $routes->match(
    ['get', 'post'], 
    'get/(:segment)',
    'Dashboard::get/$1'
  );
  $routes->match(
    ['get', 'post'], 
    'set/(:segment)',
    'Dashboard::set/$1'
  );
  
  
  $routes->match(
    ['get', 'post'], 
    'create/(:segment)',
    'Dashboard::createGroup/$1'
  );
  
  $routes->match(
    ['get', 'post'], 
    'promote/(:segment)',
    'Dashboard::promote/$1'
  );
  
  $routes->get('(:segment)', 'Dashboard::view/$1');
});

$routes->get('test', 'Home::testApp');

$routes->get('startapp', 'InitializeApp::index');


$routes->get('(:any)', 'Home::view/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here.             
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
