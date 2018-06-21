<?php
	session_start();
	if( isset($_SESSION['login']) ):
	else:
		echo '<script>location.href="index" </script>';
	endif;
//*** DEFINE TIMEZONE ***\\
date_default_timezone_set('America/Recife');

//*** CHARSET PHP ***\\
header('Content-type: text/html; charset=utf-8');

/* DIRECTORY SEPARATOR */
//define('DS', DIRECTORY_SEPARATOR);
define('DS', '/');

/* PATH ROOT */
define('ROOT', dirname(htmlspecialchars($_SERVER['SCRIPT_NAME'], ENT_QUOTES, "utf-8")) . DS);

/* SRC PATHS */
define('CONFIG', 'Src/Config/');
define('CONTROLLER', 'Src/Controller/');
define('MODEL', 'Src/Model/');
define('ENTIDADE', 'Src/Entidade/');
define('DAO', 'Src/DAO/');

/* PUBLIC PATHS */
define('VIEW', 'public/views/');
define('TEMPLATES', 'public/templates/default/');
define('LIBS', 'public/libs/');
define('CSS', 'public/css/');
define('JS', 'public/js/');
define('IMG', 'public/img/');

$url = isset($_GET['url']) ? $_GET['url'] : 'index' . DS . 'index';
$explode = explode(DS, $url);
$controller = (!isset($explode[0]) || $explode[0] == null || $explode[0] == 'index') ? 'index' : $explode[0];
$controllerClass = ucwords($controller) . 'Controller';
$namespaceControllerClass = '\Src\Controller\\' . $controllerClass;
$action = (!isset($explode[1]) || $explode[1] == null || $explode[1] == 'index') ? 'index' : $explode[1];

require_once CONFIG . 'DBConnection.php';
require_once CONTROLLER . 'IndexController.php';
require_once ENTIDADE . 'Visitantes.php';
require_once MODEL . 'VisitantesModel.php';
require_once DAO . 'VisitantesDAO.php';

$objController = new $namespaceControllerClass();
$objController->$action();