<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['share'] = 'main/share';
$route['share/(:any)'] = 'main/share/$1';
$route['api/pidum'] = 'API/Pidum/index';
$route['api/pidum/rekap'] = 'API/Pidum/retrieveRekap';
$route['api/pidum/rekap/bysatker/(:any)'] = 'API/Pidum/retrieveRekapBySatker/$1';
$route['api/pidum/rekap/daftar'] = 'API/Pidum/retrieveDaftarRekap';
$route['api/pidum/statistik/berkas'] = 'API/Pidum/retrieveStatistikBerkas';
$route['api/pidum/statistik/tersangka'] = 'API/Pidum/retrieveStatistikUsiaTersangka';
$route['api/pidum/statistik/all'] = 'API/Pidum/retrieveAllStatistik';
$route['api/pidum/perkara'] = 'API/Pidum/retrieveJenisPerkara';
$route['api/pidum/perkara/bykejari'] = 'API/Pidum/getPerkaraByKejari';
$route['api/pidum/perkara/bykejati'] = 'API/Pidum/getPerkaraByKejati';
$route['api/pidum/tersangka'] = 'API/Pidum/getTersangka';

$route['satker/(:any)'] = 'main/satker/$1';
$route['info'] = 'main/info';
$route['tahapan'] = 'main/tahapan';
