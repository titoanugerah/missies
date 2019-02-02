<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/login';
$route['login'] = 'home/login';
$route['dashboard'] = 'home/dashboard';
$route['profile'] = 'home/profile';
$route['logout'] = 'home/logout';

$route['parkIn'] = 'user/parkIn';
$route['parkOut'] = 'user/parkOut';
$route['payPark/(:any)'] = 'user/payPark/$1';

$route['product'] = 'admin/product';
$route['parkReport'] = 'admin/parkReport';
$route['deleteReport/(:any)'] = 'admin/deleteReport/$1';
$route['downloadParkReport'] = 'admin/downloadReport';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
