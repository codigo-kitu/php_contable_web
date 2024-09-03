<?php
use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\presentation\web\SessionBase;

include_once('com/bydan/framework/contabilidad/util/Constantes.php');
include_once('com/bydan/framework/contabilidad/presentation/web/SessionBase.php');

$sessionBase=new SessionBase();

$sessionBase->start();

//PHP5.3-namespace com\bydan\framework\seguridad\util;

$output_dir = Constantes::$strPathBaseUploadsToComplete;//"uploads/";
$output_dir_tabla ="";

if(isset($_FILES["myfile"])) {
	$ret = array();

	//$error =$_FILES["myfile"]["error"];
	
	//$post =$_POST;
	
	$modulo =$_POST["modulo"];
	
	if($modulo!=null && $modulo!='') {
		$tabla =$_POST["tabla"];
		$columna =$_POST["columna"];
		
		$output_dir_tabla=$modulo.'/'.$tabla.'/'.$columna.'/';
		
		$output_dir=$output_dir.$output_dir_tabla;
		
		$sessionBase->write('PATH_UPLOADS_ACTUAL',$output_dir);
		
		
		if(!file_exists($output_dir)) {
		    mkdir($output_dir,"0777",true);		  
		}
	}
	
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
	if(!is_array($_FILES["myfile"]["name"])) //single file
	{		
		//$_FILES["myfile"]["name"]="111_".$_FILES["myfile"]["name"];
		
 	 	$fileName = $_FILES["myfile"]["name"];
 	 	
 	 	$id =$_POST["id"];	
		if($id!=null && $id!='' && $id>0) {
			$_FILES["myfile"]["name"]=$id."_".$_FILES["myfile"]["name"];
			$fileName = $_FILES["myfile"]["name"];
		}						
 	 	
 	 	move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
    	$ret[]= $fileName;
	}
	else  //Multiple files, file[]
	{
	  $fileCount = count($_FILES["myfile"]["name"]);
	  
	  for($i=0; $i < $fileCount; $i++) {
	  	$fileName = $_FILES["myfile"]["name"][$i];
		move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName);
	  	$ret[]= $fileName;
	  }	
	}
	
    echo json_encode($ret);
 }
 ?>