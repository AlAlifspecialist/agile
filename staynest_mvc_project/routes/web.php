<?php

$router->get('', 'HomeController@index');

$router->get('login', 'AuthController@login');
$router->post('login/authenticate', 'AuthController@authenticate');

$router->get('register', 'AuthController@register');
$router->post('register/store', 'AuthController@storeRegister');

$router->get('logout', 'AuthController@logout');

$router->get('dashboard', 'DashboardController@index');

$router->get('properties', 'PropertyController@index');

$router->get('bookings', 'BookingController@index');

$router->get('hosts', 'HostController@index');

$router->get('locations', 'LocationController@index');

$router->get('users', 'UserController@index');

$router->get('admin/dashboard', 'DashboardController@admin');

$router->get('host/dashboard', 'DashboardController@host');

$router->get('staff/dashboard', 'DashboardController@staff');