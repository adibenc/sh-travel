<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['default_controller'] = 'home/index';
$route['cat'] = 'home/index';
$route['cat/(:any)'] = 'home/byCategory/$1';

$route['satker/(:any)'] = 'main/satker/$1';
$route['info'] = 'main/info';
$route['tahapan'] = 'main/tahapan';


