<?php declare(strict_types = 1);

session_start();

include_once('vendor/autoload.php');

use com\bydan\framework\contabilidad\presentation\routing\Router;

//VARIABLES USADAS POR CAKE QUE TAMBIEN SE USA PARA REPORTES

//define('DIRECTORY_SEPARATOR', '/');
define('APP_DIR', '');//app
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('WEBROOT_DIR', 'webroot');
define('WWW_ROOT', ROOT . DS . WEBROOT_DIR . DS);
	
date_default_timezone_set('America/Guayaquil');

$router = new Router();

$router->addRoute('GET', '/login/index', function () {
    include_once('com/bydan/framework/contabilidad/presentation/view/LoginView.php');
    exit;
});

$router->addRoute('GET', '/blogs', function () {
    echo("My route is working!");
    exit;
});

$router->addRoute('GET', '/blogs/:blogID', function ($blogID) {
    echo("My route is working with blogID => $blogID !");
    exit;
});

$router->matchRoute();

?>