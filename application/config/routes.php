<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'controler/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['index'] = 'controler/index';

//Custom Routes
$route['usuarios'] = 'controler/usuarios';
$route['nuevo'] = 'controler/nuevousuario';
$route['nuevousuario'] = 'api/ApiController/insert';


//API Routes
$route['api/demo'] = 'api/ApiController/index';
$route['api/usuarios'] = 'api/ApiController/usuarios';
//$route['api/usuarios?nombre=(:any)']['get'] = 'api/ApiController/usuariopornombre/$1';
$route['api/usuarios:']['post'] = 'api/ApiController/insert';
