<?php declare(strict_types = 1);

session_start();

include_once('vendor/autoload.php');

//include_once('com/bydan/framework/contabilidad/util/Constantes.php');
//include_once('com/bydan/framework/contabilidad/util/Funciones.php');

use com\bydan\framework\contabilidad\util\Constantes;
//use com\bydan\framework\contabilidad\util\Funciones;

use com\bydan\framework\contabilidad\presentation\control\global\GlobalViewController;
use com\bydan\framework\contabilidad\presentation\control\global\GlobalModuleController;


SetDefineData();

$post = GetPostData();

EjecutarGlobalController($post);


function EjecutarGlobalController($post) {

	if (array_key_exists('view',$_POST) && isset($_POST['view'])
		|| array_key_exists('view',$_GET) && isset($_GET['view'])) {
		
		GlobalViewController::EjecutarViewController($post);
		
	} else if (isset($_POST['controller']) || 
				isset($_GET['controller']) || 
				$post) {
			
		GlobalModuleController::EjecutarModuleController($post);
	}
}

function GetPostData() {
	$post = null;

	if(Constantes::$CON_JSON) {
		$json = file_get_contents('php://input');    
		
		if($json!=null) {
			$post = json_decode($json);
		}
	}

	return $post;
}

function SetDefineData() {
	//VARIABLES USADAS POR CAKE QUE TAMBIEN SE USA PARA REPORTES

	//define('DIRECTORY_SEPARATOR', '/');
	define('APP_DIR', '');//app
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', dirname(__FILE__));
	define('WEBROOT_DIR', 'webroot');
	define('WWW_ROOT', ROOT . DS . WEBROOT_DIR . DS);
		
	date_default_timezone_set('America/Guayaquil');
}

//echo('HI-WORLD-2');
//echo('<script>alert("GLOBAL CONTROLLER");</script>');

function ShowComments() {
	/*
		view=X&
		controller=X
		post
	*/

	//Funciones::logShowDegug('Test');

	//xdebug_break();

	//DESHABILITA
	//error_reporting(0);

	//CREO COMO PHP.INI
	//error_reporting(E_ALL ^ E_NOTICE | E_STRICT | E_WARNING);

	//TODO MENOS NOTICE MENOS WARNING
	//error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING | E_STRICT);

	//TODO MENOS NOTICE
	//error_reporting(E_ALL ^ E_NOTICE | E_WARNING | E_STRICT);

	//ini_set('memory_limit', '200M');

	/*
	if (isset($_POST['view']) || isset($_GET['view'])){	
		if(isset($_GET['view'])) {
			echo('<br>VIEW-GET='.$_GET['view']);
		} else {
			echo('VIEW-POST='.$_POST['view']);
		}
	}

	if (isset($_POST['controller']) || isset($_GET['controller'])){	
		if(isset($_GET['view'])) {
			echo('<br>CONTROLLER-GET='.$_GET['controller']);
		} else {
			echo('CONTROLLER-POST='.$_POST['controller']);
		}
	}

	if (isset($_POST['id']) || isset($_GET['id'])){	
		if(isset($_GET['view'])) {
			echo('<br>id-GET='.$_GET['id']);
		} else {
			echo('id-POST='.$_POST['id']);
			require_once('com/bydan/general/presentation/controller/MejiaEgresadoController.php');
		}
	}
	*/
	//$post=$_POST;
}

?>