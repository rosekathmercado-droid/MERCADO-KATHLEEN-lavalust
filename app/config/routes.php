<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$router->get('/login', 'Auth::login');
$router->post('/login', 'Auth::login');
$router->get('/logout', 'Auth::logout');


/*
|--------------------------------------------------------------------------
| Protected Product Routes
|--------------------------------------------------------------------------
*/

$router->get('/products', 'Product::index')->middleware('auth');

$router->get('/products/create', 'Product::create')->middleware('auth');
$router->post('/products/create', 'Product::create')->middleware('auth');

$router->get('/products/edit/{id}', 'Product::edit')->middleware('auth');
$router->post('/products/edit/{id}', 'Product::edit')->middleware('auth');

$router->get('/products/delete/{id}', 'Product::delete')->middleware('auth');

?>