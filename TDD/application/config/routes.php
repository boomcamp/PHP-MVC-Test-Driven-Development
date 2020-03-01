<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'TDD_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route["test"] = "TDD_controller/index";
$route["example"] = "TDD_EXAMPLE_controller/index";