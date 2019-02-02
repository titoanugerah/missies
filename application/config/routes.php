<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/login';
$route['login'] = 'home/login';
$route['dashboard'] = 'home/dashboard';
$route['profile'] = 'home/profile';
$route['logout'] = 'home/logout';

$route['listProduct'] = 'user/listProduct';
$route['selectProduct/(:any)'] = 'user/selectProduct/$1';
$route['teller'] = 'user/teller';
$route['inputTeller/(:any)'] = 'user/inputTeller/$1';
$route['deleteInputTrx/(:any)/(:any)'] = 'user/deleteInputTrx/$1/$2';
$route['parkIn'] = 'user/parkIn';
$route['parkOut'] = 'user/parkOut';
$route['payPark/(:any)'] = 'user/payPark/$1';

$route['product'] = 'admin/product';
$route['detailProduct/(:any)'] = 'admin/detailProduct/$1';
$route['parkReport'] = 'admin/parkReport';
$route['deleteReport/(:any)'] = 'admin/deleteReport/$1';
$route['downloadParkReport'] = 'admin/downloadReport';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
