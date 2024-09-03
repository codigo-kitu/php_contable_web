<?php declare(strict_types = 1);
namespace com\bydan\framework\contabilidad\presentation\view;
?>
<html>
	<head>
  		
  		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"> 
		
		<title>	</title>
		
		<?php
        	//PHP5.3-medical
        	include_once('com/bydan/framework/contabilidad/util/Constantes.php');
        	use com\bydan\framework\contabilidad\util\Constantes;
        	
        	//PHP5.3-medical
        	include_once('com/bydan/framework/contabilidad/util/Funciones.php');
        	
        	//PHP5.3--use com/bydan/framework/medical/util/Funciones;	
        ?>
        
        <?php include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/General/Constantes.js' ); ?>					
		<?php include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/General/FuncionGeneral.js' ); ?>
		<?php include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/General/FuncionGeneralJQuery.js' ); ?>
		

		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/jquery-1.10.2.js"></script>
				
		<link rel="stylesheet" href="webroot/css/Css/impresion/style_layout.css" type="text/css" media="print,screen"/>
		<link rel="stylesheet" href="webroot/css/Css/impresion/style_shared.css" type="text/css" media="print,screen"/>
		<link rel="stylesheet" href="webroot/css/Css/impresion/style_defecto.css" type="text/css" media="print,screen"/>
		<link rel="stylesheet" href="webroot/css/Css/impresion/style_font_defecto.css" type="text/css" media="print,screen"/>
				 
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/themes/south-street/jquery-ui.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/themes/south-street/jquery.ui.theme.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/jquery.datetimepicker.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/uploadfile.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/select2.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/css/Css/impresion/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/css/jquery.dataTables.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/css/Css/impresion/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/css/dataTables.jqueryui.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/jstree3_0/themes/default/style.css" type="text/css"/>
				
	</head>
	
	<body>
		
		<div id="divReporte">
		
		</div>
	
		<?php include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/General/ReportJQuery.js'); ?>
			
	</body>
			
</html>
