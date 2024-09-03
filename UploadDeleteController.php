<?php
use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\presentation\web\SessionBase;

include_once('com/bydan/framework/contabilidad/util/Constantes.php');
include_once('com/bydan/framework/contabilidad/presentation/web/SessionBase.php');

$sessionBase=new SessionBase();
$sessionBase->start();

//PHP5.3-namespace com\bydan\framework\seguridad\util;

//$output_dir = "uploads/";
$output_dir = Constantes::$strPathBaseUploadsToComplete;

if($_SESSION['PATH_UPLOADS_ACTUAL']!=null) {
	$output_dir =$sessionBase->read('PATH_UPLOADS_ACTUAL');
}

if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name'])) {
	$fileName =$_POST['name'];
	$filePath = $output_dir. $fileName;
	
	if (file_exists($filePath)) {
        unlink($filePath);
    }

    echo "Deleted File ".$fileName."<br>";
}

?>