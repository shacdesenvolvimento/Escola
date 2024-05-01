<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'turma';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route["turma"]["get"] = "turma/index";
$route['turma/(:num)']["get"] = 'turma/findById/$1';
$route['turma/relatorio/(:num)']["get"] = 'turma/loadPDF/$1';

$route["turma"]["post"] = "turma/salvar";

$route["adm/logar"] = "adm/login/logar";

$route["aluno/novo"] = "aluno/xpto";
$route['aluno/(:num)']["get"] = 'aluno/findById/$1';

$route["aluno"] = "aluno/menu";