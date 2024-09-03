<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Historial Cambio Clave Mantenimiento" markupType="html"> -->
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

	
<?php

 /*
*AVISO LEGAL
(C) Copyright
*Este programa esta protegido por la ley de derechos de autor.
*La reproduccion o distribucion ilicita de este programa o de cualquiera de
*sus partes esta penado por la ley con severas sanciones civiles y penales,
*y seran objeto de todas las sanciones legales que correspondan.

*Su contenido no puede copiarse para fines comerciales o de otras,
*ni puede mostrarse, incluso en una version modificada, en otros sitios Web.
Solo esta permitido colocar hipervinculos al sitio web.
*/

	include_once('com/bydan/framework/contabilidad/util/Constantes.php');
	use com\bydan\framework\contabilidad\util\Constantes;
	
	//include_once('com/bydan/framework/contabilidad/util/Funciones.php');
	//use com\bydan\framework\contabilidad\util\Funciones;
	
	include_once('com/bydan/framework/contabilidad/util/PaqueteTipo.php');
	use com\bydan\framework\contabilidad\util\PaqueteTipo;
	
	include_once('com/bydan/contabilidad/seguridad/historial_cambio_clave/util/historial_cambio_clave_carga.php');
	use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/historial_cambio_clave/presentation/view/historial_cambio_clave_web.php');
	//use com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\view\historial_cambio_clave_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	historial_cambio_clave_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	historial_cambio_clave_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$historial_cambio_clave_web1= new historial_cambio_clave_web();	
	$historial_cambio_clave_web1->cargarDatosGenerales();
	
	//$moduloActual=$historial_cambio_clave_web1->moduloActual;
	//$usuarioActual=$historial_cambio_clave_web1->usuarioActual;
	//$sessionBase=$historial_cambio_clave_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$historial_cambio_clave_web1->parametroGeneralUsuarioActual;
	
	
		
	//$STR_SUFIJO_ESTILO_LETRA_USUARIO=Funciones::getParametroEstiloTipoLetraUsuario($parametroGeneralUsuarioActual);
?>
		
		
	
		
		<script type="module" src="webroot/js/JavaScript/Library/General/Constantes.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Entity/GeneralEntityConstante.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Entity/GeneralEntityFuncion.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Entity/GeneralEntityWebControl.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneral.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralEventoJQuery.js"></script>		
		
		<!-- El Templating SOLO funciona con include desde Php -->
		<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/Library/Presentation/Templating/OrderByTemplate.js' ); ?>				
		<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/Library/Presentation/Templating/OrderByRelTemplate.js' ); ?>
		
		<script type="text/javascript" src="webroot/js/JavaScript/Library/Ajax/waiter.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Validacion/Validacion.js"></script>
		
		
			
			<!-- El Templating SOLO funciona con include desde Php -->
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/historial_cambio_clave/js/templating/historial_cambio_clave_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/historial_cambio_clave/js/templating/historial_cambio_clave_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/historial_cambio_clave/js/templating/historial_cambio_clave_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/historial_cambio_clave/js/templating/historial_cambio_clave_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			historial_cambio_clave_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					historial_cambio_clave_web::$GET_POST=$_GET;
				} else {
					historial_cambio_clave_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			historial_cambio_clave_web::$STR_NOMBRE_PAGINA = 'historial_cambio_clave_view.php';
			historial_cambio_clave_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			historial_cambio_clave_web::$BIT_ES_PAGINA_FORM = 'false';
				
			historial_cambio_clave_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {historial_cambio_clave_constante,historial_cambio_clave_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/historial_cambio_clave/js/util/historial_cambio_clave_constante.js?random=1';
			import {historial_cambio_clave_funcion,historial_cambio_clave_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/historial_cambio_clave/js/util/historial_cambio_clave_funcion.js?random=1';
			
			let historial_cambio_clave_constante2 = new historial_cambio_clave_constante();
			
			historial_cambio_clave_constante2.STR_NOMBRE_PAGINA="<?php echo(historial_cambio_clave_web::$STR_NOMBRE_PAGINA); ?>";
			historial_cambio_clave_constante2.STR_TYPE_ON_LOADhistorial_cambio_clave="<?php echo(historial_cambio_clave_web::$STR_TYPE_ONLOAD); ?>";
			historial_cambio_clave_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(historial_cambio_clave_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			historial_cambio_clave_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(historial_cambio_clave_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			historial_cambio_clave_constante2.STR_ACTION="<?php echo(historial_cambio_clave_web::$STR_ACTION); ?>";
			historial_cambio_clave_constante2.STR_ES_POPUP="<?php echo(historial_cambio_clave_web::$STR_ES_POPUP); ?>";
			historial_cambio_clave_constante2.STR_ES_BUSQUEDA="<?php echo(historial_cambio_clave_web::$STR_ES_BUSQUEDA); ?>";
			historial_cambio_clave_constante2.STR_FUNCION_JS="<?php echo(historial_cambio_clave_web::$STR_FUNCION_JS); ?>";
			historial_cambio_clave_constante2.BIG_ID_ACTUAL="<?php echo(historial_cambio_clave_web::$BIG_ID_ACTUAL); ?>";
			historial_cambio_clave_constante2.BIG_ID_OPCION="<?php echo(historial_cambio_clave_web::$BIG_ID_OPCION); ?>";
			historial_cambio_clave_constante2.STR_OBJETO_JS="<?php echo(historial_cambio_clave_web::$STR_OBJETO_JS); ?>";
			historial_cambio_clave_constante2.STR_ES_RELACIONES="<?php echo(historial_cambio_clave_web::$STR_ES_RELACIONES); ?>";
			historial_cambio_clave_constante2.STR_ES_RELACIONADO="<?php echo(historial_cambio_clave_web::$STR_ES_RELACIONADO); ?>";
			historial_cambio_clave_constante2.STR_ES_SUB_PAGINA="<?php echo(historial_cambio_clave_web::$STR_ES_SUB_PAGINA); ?>";
			historial_cambio_clave_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(historial_cambio_clave_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			historial_cambio_clave_constante2.BIT_ES_PAGINA_FORM=<?php echo(historial_cambio_clave_web::$BIT_ES_PAGINA_FORM); ?>;
			historial_cambio_clave_constante2.STR_SUFIJO="<?php echo(historial_cambio_clave_web::$STR_SUF); ?>";//historial_cambio_clave
			historial_cambio_clave_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(historial_cambio_clave_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//historial_cambio_clave
			
			historial_cambio_clave_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(historial_cambio_clave_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			historial_cambio_clave_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($historial_cambio_clave_web1->moduloActual->getnombre()); ?>";
			historial_cambio_clave_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(historial_cambio_clave_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			historial_cambio_clave_constante2.BIT_ES_LOAD_NORMAL=true;
			/*historial_cambio_clave_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			historial_cambio_clave_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.historial_cambio_clave_constante2 = historial_cambio_clave_constante2;
			
		</script>
		
		<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
		<script type="text/javascript" src="webroot/js/handlebars-4.7.6/handlebars.min.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/jquery-1.10.2.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.form.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.popupWindow.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.validate.js"></script>		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.datetimepicker.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.uploadfile.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/select2.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jstree3_0/jstree.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.datepicker.js"></script>
		
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.effect.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.tabs.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.mouse.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.draggable.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.position.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.slider.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.menu.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.autocomplete.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.resizable.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.dialog.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.effect-blind.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.effect-explode.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.button.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.tooltip.js"></script>
		
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/themes/<?php echo(Constantes::$STR_THEME);?>/jquery-ui.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/themes/<?php echo(Constantes::$STR_THEME);?>/jquery.ui.theme.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/jquery.datetimepicker.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/uploadfile.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/select2.css" type="text/css"/>		
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/css/jquery.dataTables.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/css/dataTables.jqueryui.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/jstree3_0/themes/default/style.css" type="text/css"/>
		
		<script type="text/javascript">
		</script>
		
		
		
		
		<?php if(!Constantes::$BIT_CON_CSS_PHP) {?>
		
		<link rel="stylesheet" type="text/css" href="webroot/scss/pagina.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="webroot/scss/general.css" media="screen" />		
		
		
		<link rel="stylesheet" href="webroot/css/bootstrap5/bootstrap.min.css" type="text/css"/>
		<script type="text/javascript" src="webroot/js/bootstrap5/bootstrap.bundle.min.js"></script>

		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script> -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->	
		
		<?php } else { /*NO ES USADO, TALVEZ SE DEJA*/ ?>
		
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_layout.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_shared.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.historial_cambio_clave_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.historial_cambio_clave_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="historial_cambio_claveActual" ></a>
	
	<div id="divResumenhistorial_cambio_claveActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						<div id="divOpcionesBanner" >
								<!-- <jsp:include page="/Component/header.jsp" /> -->
						</div>						
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(historial_cambio_clave_web::$STR_ES_BUSQUEDA=='false' && historial_cambio_clave_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(historial_cambio_clave_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' && historial_cambio_clave_web::$STR_ES_POPUP=='false' && historial_cambio_clave_web::$STR_ES_SUB_PAGINA=='false') {?>
						<td align="left" style="width: 3%">
							<img id="imgIrMain" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/ir_main.gif" title="IR A ARBOL DE OPCIONES PRINCIPAL" width="25" height="25"  onclick="funcionGeneral.irWindowAuxiliar('MENU PRINCIPAL','view=Main&action=index&typeonload=onloadhijos')"/>
						</td>
						<td align="left" style="width: 3%">
							<img id="imgCerrarSesion" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar_sesion.gif" title="CERRAR SESION" width="25" height="25"/>
						</td>
						<?php }?>
						<td id="tdToolBar" align="center" style="width: 70%">
							<!-- SECCION/TOOLBAR -->
							<table id="tblToolBar">
								<tr>
									<td id="tdhistorial_cambio_claveNuevoToolBar">
										<img id="imgNuevoToolBarhistorial_cambio_clave" name="imgNuevoToolBarhistorial_cambio_clave" title="Nuevo Historial Cambio Clave" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(historial_cambio_clave_web::$STR_ES_BUSQUEDA=='false' && historial_cambio_clave_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdhistorial_cambio_claveNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarhistorial_cambio_clave" name="imgNuevoGuardarCambiosToolBarhistorial_cambio_clave" title="Nuevo TABLA Historial Cambio Clave" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(historial_cambio_clave_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdhistorial_cambio_claveGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarhistorial_cambio_clave" name="imgGuardarCambiosToolBarhistorial_cambio_clave" title="Guardar Historial Cambio Clave" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' && historial_cambio_clave_web::$STR_ES_RELACIONES=='false' && historial_cambio_clave_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdhistorial_cambio_claveCopiarToolBar">
										<img id="imgCopiarToolBarhistorial_cambio_clave" name="imgCopiarToolBarhistorial_cambio_clave" title="Copiar Historial Cambio Clave" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdhistorial_cambio_claveDuplicarToolBar">
										<img id="imgDuplicarToolBarhistorial_cambio_clave" name="imgDuplicarToolBarhistorial_cambio_clave" title="Duplicar Historial Cambio Clave" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdhistorial_cambio_claveRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarhistorial_cambio_clave" name="imgRecargarInformacionToolBarhistorial_cambio_clave" title="Recargar Historial Cambio Clave" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdhistorial_cambio_claveAnterioresToolBar">
										<img id="imgAnterioresToolBarhistorial_cambio_clave" name="imgAnterioresToolBarhistorial_cambio_clave" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdhistorial_cambio_claveSiguientesToolBar">
										<img id="imgSiguientesToolBarhistorial_cambio_clave" name="imgSiguientesToolBarhistorial_cambio_clave" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdhistorial_cambio_claveAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarhistorial_cambio_clave" name="imgAbrirOrderByToolBarhistorial_cambio_clave" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' && historial_cambio_clave_web::$STR_ES_RELACIONES=='false') || historial_cambio_clave_web::$STR_ES_BUSQUEDA=='true'  || historial_cambio_clave_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdhistorial_cambio_claveCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarhistorial_cambio_clave" name="imgCerrarPaginaToolBarhistorial_cambio_clave" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
									</td>
									<?php } ?>
								</tr>
							</table> <!-- tblToolBar -->
						</td> <!-- tdToolBar -->
						<td id="tdControlesSecciones" align="center" style="width: 20%">
							<a id="ControlesSecciones" ></a>

							<img id="imgAreaBusquedas" align="right" style="visibility:hidden" src="/contabilidad0/webroot/img/Imagenes/busqueda.gif" width="20" height="20"  onclick="funcionGeneral.irAreaDePagina('Busquedas')"/>
							<img id="imgAreaControles" align="right" style="visibility:hidden" src="/contabilidad0/webroot/img/Imagenes/controles.gif" width="20" height="20"  onclick="funcionGeneral.irAreaDePagina('Campos')"/>
							<img id="imgAreaAcciones" align="right" style="visibility:hidden" src="/contabilidad0/webroot/img/Imagenes/acciones.gif" width="20" height="20"  onclick="funcionGeneral.irAreaDePagina('Acciones')"/>
							<img id="imgAtras" align="right" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/atras.gif" width="20" height="20"  onclick="history.back()"/>
						</td> <!-- tdControlesSecciones -->
					</tr> <!-- trExpandirColapsar -->
				</table> <!-- tblExpandirColapsar -->
			</form> <!-- frmExpandirColapsar -->
		</td>
	</tr> <!-- trNavegacion/super -->
	<?php } ?> 
	
		
		<tr id="trhistorial_cambio_claveCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedahistorial_cambio_clave" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedahistorial_cambio_clave',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trhistorial_cambio_claveCabeceraBusquedas/super -->

		<tr id="trBusquedahistorial_cambio_clave" class="busqueda" style="display:table-row">
			<td id="tdBusquedahistorial_cambio_clave" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedahistorial_cambio_clave" name="frmBusquedahistorial_cambio_clave">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedahistorial_cambio_clave" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trhistorial_cambio_claveBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleBusquedaPorIdUsuarioPorFechaHora" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorIdUsuarioPorFechaHora"> Por Usuario Por Fecha Hora</a></li>
					</ul>
				
					<div id="divstrVisibleBusquedaPorIdUsuarioPorFechaHora">
					<table id="tblstrVisibleBusquedaPorIdUsuarioPorFechaHora" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Usuario</span>
						</td>
						<td align="center">
							<select id="BusquedaPorIdUsuarioPorFechaHora-cmbid_usuario" name="BusquedaPorIdUsuarioPorFechaHora-cmbid_usuario" title="Usuario" ></select>

						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Fecha Hora</span>
						</td>
						<td align="center">
							<input id="BusquedaPorIdUsuarioPorFechaHora-dtfecha_hora" name="BusquedaPorIdUsuarioPorFechaHora-dtfecha_hora" type="text" class="form-control"  placeholder="Fecha Hora"  title="Fecha Hora"  >
						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarhistorial_cambio_claveBusquedaPorIdUsuarioPorFechaHora" name="btnBuscarhistorial_cambio_claveBusquedaPorIdUsuarioPorFechaHora" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarhistorial_cambio_clave" style="display:table-row">
					<td id="tdParamsBuscarhistorial_cambio_clave">
		<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarhistorial_cambio_clave">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroshistorial_cambio_clave" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroshistorial_cambio_clave"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroshistorial_cambio_clave" name="ParamsBuscar-txtNumeroRegistroshistorial_cambio_clave" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionhistorial_cambio_clave">
							<td id="tdGenerarReportehistorial_cambio_clave" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoshistorial_cambio_clave" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoshistorial_cambio_clave" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionhistorial_cambio_clave" name="btnRecargarInformacionhistorial_cambio_clave" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
										</td>
										<td>
											<select id="ParamsBuscar-cmbPaginacion" name="ParamsBuscar-cmbPaginacion" title="TIPOS DE PAGINACION" style="width:100px"></select>
											<input id="ParamsBuscar-chbConPaginacionInterna" name="ParamsBuscar-chbConPaginacionInterna" title="CON PAGINACION INTERNA" type="checkbox"></input>
										</td>
										<td>
											<label>
												<input id="ParamsBuscar-chbConAltoMaximoTabla" name="ParamsBuscar-chbConAltoMaximoTabla" title="CON ALTO MAXIMO DE TABLA" type="checkbox" checked></input>Alt Max.
											</label>
										</td>							
										<td>							
											<select id="ParamsBuscar-cmbGenerarReporte" name="ParamsBuscar-cmbGenerarReporte" title="TIPOS IMPRESION DE REPORTES" style="width:100px"></select>							
											<input id="ParamsBuscar-chbConReportico" name="ParamsBuscar-chbConReportico" title="CON REPORTICO" type="checkbox">							
										</td>							
										<td>							
											<select id="ParamsBuscar-cmbTiposReporte" name="ParamsBuscar-cmbTiposReporte" title="TIPOS DE REPORTES" style="width:100px"></select>							
										</td>							
										<td>							
											<input type="button" id="btnImprimirPaginahistorial_cambio_clave" name="btnImprimirPaginahistorial_cambio_clave" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*historial_cambio_clave_web::$STR_ES_BUSQUEDA=='false'  &&*/ historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByhistorial_cambio_clave">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByhistorial_cambio_clave" name="btnOrderByhistorial_cambio_clave" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
												</tr>
											</table>
										</td>
										<td>
											<select id="ParamsBuscar-cmbTiposColumnasSelect" name="ParamsBuscar-cmbTiposColumnasSelect" title="TIPOS DE COLUMNAS DE TABLA" style="width:125px"></select>
											<label>
												<input id="ParamsBuscar-chbParaActualizarFk" name="ParamsBuscar-chbParaActualizarFk" title="ABRIR VENTANA ACTUALIZAR DATOS RELACIONADOS" type="checkbox">
											</label>
										</td>
										<td>
											<label>
												<input id="ParamsBuscar-chbSelTodos" name="ParamsBuscar-chbSelTodos" title="SELECCIONAR TODOS LOS REGISTROS" type="checkbox">Sel.Todos
											</label>
										</td>

										<?php if(historial_cambio_clave_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdhistorial_cambio_claveConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoshistorial_cambio_clave -->

							</td><!-- tdGenerarReportehistorial_cambio_clave -->
						</tr><!-- trRecargarInformacionhistorial_cambio_clave -->
					</table><!-- tblParamsBuscarNumeroRegistroshistorial_cambio_clave -->
				</div> <!-- divParamsBuscarhistorial_cambio_clave -->
		<?php } ?>
				</td> <!-- tdParamsBuscarhistorial_cambio_clave -->
				</tr><!-- trParamsBuscarhistorial_cambio_clave -->
				</table> <!-- tblBusquedahistorial_cambio_clave -->
				</form> <!-- frmBusquedahistorial_cambio_clave -->
				

			</td> <!-- tdBusquedahistorial_cambio_clave -->
		</tr> <!-- trBusquedahistorial_cambio_clave/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' ) {?>

		<!-- SECCION/MENSAJE -->
		<div id="divMensajePage" class="ui-state-highlight ui-corner-all" style="display:none;margin-top: 20px; padding: 0 .7em;">
			<p id="parrMensajePage">
				<span id="spanIcoMensajePage" class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<span id="spanMensajePage"></span>
			</p>
		</div> <!-- divMensajePage -->

		<div id="divMensajePageDialog" title="Mensaje" class="ui-state-highlight ui-corner-all">
			<p id="parrMensajePageDialog">
				<span id="spanIcoMensajePageDialog" class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<span id="spanMensajePageDialog"></span>
			</p>
		</div> <!-- divMensajePageDialog -->
<?php }?>

		<div id="divhistorial_cambio_clavePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblhistorial_cambio_clavePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmhistorial_cambio_claveAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnhistorial_cambio_claveAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="historial_cambio_clave_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnhistorial_cambio_claveAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmhistorial_cambio_claveAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblhistorial_cambio_clavePopupAjaxWebPart -->
		</div> <!-- divhistorial_cambio_clavePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trhistorial_cambio_claveTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdahistorial_cambio_clave"></a>
		<img id="imgTablaParaDerechahistorial_cambio_clave" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechahistorial_cambio_clave'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdahistorial_cambio_clave" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdahistorial_cambio_clave'"/>
		<a id="TablaDerechahistorial_cambio_clave"></a>
	</td>
</tr> <!-- trhistorial_cambio_claveTablaNavegacion/super -->
<?php } ?>

<tr id="trhistorial_cambio_claveTablaDatos">
	<td colspan="3" id="htmlTableCellhistorial_cambio_clave">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoshistorial_cambio_clavesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trhistorial_cambio_claveTablaDatos/super -->
		
		
		<tr id="trhistorial_cambio_clavePaginacion" style="display:table-row">
			<td id="tdhistorial_cambio_clavePaginacion" align="center">
				<div id="divhistorial_cambio_clavePaginacionAjaxWebPart">
				<form id="frmPaginacionhistorial_cambio_clave" name="frmPaginacionhistorial_cambio_clave">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionhistorial_cambio_clave" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(historial_cambio_clave_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkhistorial_cambio_clave" name="btnSeleccionarLoteFkhistorial_cambio_clave" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' /*&& historial_cambio_clave_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioreshistorial_cambio_clave" name="btnAnterioreshistorial_cambio_clave" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(historial_cambio_clave_web::$STR_ES_BUSQUEDA=='false' && historial_cambio_clave_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdhistorial_cambio_claveNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararhistorial_cambio_clave" name="btnNuevoTablaPrepararhistorial_cambio_clave" title="NUEVO Historial Cambio Clave" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablahistorial_cambio_clave" name="ParamsPaginar-txtNumeroNuevoTablahistorial_cambio_clave" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdhistorial_cambio_claveConEditarhistorial_cambio_clave">
							<label>
								<input id="ParamsBuscar-chbConEditarhistorial_cambio_clave" name="ParamsBuscar-chbConEditarhistorial_cambio_clave" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false'/* && historial_cambio_clave_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguienteshistorial_cambio_clave" name="btnSiguienteshistorial_cambio_clave" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionhistorial_cambio_clave -->
				</form> <!-- frmPaginacionhistorial_cambio_clave -->
				<form id="frmNuevoPrepararhistorial_cambio_clave" name="frmNuevoPrepararhistorial_cambio_clave">
				<table id="tblNuevoPrepararhistorial_cambio_clave" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trhistorial_cambio_claveNuevo" height="10">
						<?php if(historial_cambio_clave_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdhistorial_cambio_claveNuevo" align="center">
							<input type="button" id="btnNuevoPrepararhistorial_cambio_clave" name="btnNuevoPrepararhistorial_cambio_clave" title="NUEVO Historial Cambio Clave" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdhistorial_cambio_claveGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioshistorial_cambio_clave" name="btnGuardarCambioshistorial_cambio_clave" title="GUARDAR Historial Cambio Clave" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' && historial_cambio_clave_web::$STR_ES_RELACIONES=='false' && historial_cambio_clave_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdhistorial_cambio_claveDuplicar" align="center">
							<input type="button" id="btnDuplicarhistorial_cambio_clave" name="btnDuplicarhistorial_cambio_clave" title="DUPLICAR Historial Cambio Clave" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdhistorial_cambio_claveCopiar" align="center">
							<input type="button" id="btnCopiarhistorial_cambio_clave" name="btnCopiarhistorial_cambio_clave" title="COPIAR Historial Cambio Clave" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' && ((historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' && historial_cambio_clave_web::$STR_ES_RELACIONES=='false') || historial_cambio_clave_web::$STR_ES_BUSQUEDA=='true'  || historial_cambio_clave_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdhistorial_cambio_claveCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginahistorial_cambio_clave" name="btnCerrarPaginahistorial_cambio_clave" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararhistorial_cambio_clave -->
				</form> <!-- frmNuevoPrepararhistorial_cambio_clave -->
				</div> <!-- divhistorial_cambio_clavePaginacionAjaxWebPart -->
			</td> <!-- tdhistorial_cambio_clavePaginacion -->
		</tr> <!-- trhistorial_cambio_clavePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacioneshistorial_cambio_claveAjaxWebPart">
			<td id="tdAccionesRelacioneshistorial_cambio_claveAjaxWebPart">
				<div id="divAccionesRelacioneshistorial_cambio_claveAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacioneshistorial_cambio_claveAjaxWebPart -->
		</tr> <!-- trAccionesRelacioneshistorial_cambio_claveAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByhistorial_cambio_clave">
			<td id="tdOrderByhistorial_cambio_clave">
				<form id="frmOrderByhistorial_cambio_clave" name="frmOrderByhistorial_cambio_clave">
					<div id="divOrderByhistorial_cambio_claveAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByhistorial_cambio_clave -->
		</tr> <!-- trOrderByhistorial_cambio_clave/super -->
			
		
		
		
		
		
	</table> <!-- super -->
	
		
	
			</div> <!-- content -->    

			


    	</div> <!-- main -->
	
 	</div> <!-- outerborder -->	
	
	
		<?php 
			if(array_key_exists('typeonload',$_REQUEST) && $_REQUEST['typeonload']!=null && $_REQUEST['typeonload']=='onloadhijos') {
		?>
		
		<?php 
			}
		?>	
		
		
		
		
				
				<script type="module">
			
				import {historial_cambio_clave_webcontrol,historial_cambio_clave_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/historial_cambio_clave/js/webcontrol/historial_cambio_clave_webcontrol.js?random=1';
				
				historial_cambio_clave_webcontrol1.sethistorial_cambio_clave_constante(window.historial_cambio_clave_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(historial_cambio_clave_web::$STR_ES_RELACIONADO=='false') {?>
	
	
	<?php 
		if(Constantes::$BIT_CON_ARBOL_MENU) { 
			 /*$tree->writeJavascript();*/ 		
		}	
	?>
	

	
	<?php }?>



	<!-- <div name="footer"> -->    
	<!-- </div> -->
</body>

</html>

