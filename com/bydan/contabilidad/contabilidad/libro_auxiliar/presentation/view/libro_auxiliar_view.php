<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Libro Auxiliar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/libro_auxiliar/util/libro_auxiliar_carga.php');
	use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/libro_auxiliar/presentation/view/libro_auxiliar_web.php');
	//use com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\view\libro_auxiliar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	libro_auxiliar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	libro_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$libro_auxiliar_web1= new libro_auxiliar_web();	
	$libro_auxiliar_web1->cargarDatosGenerales();
	
	//$moduloActual=$libro_auxiliar_web1->moduloActual;
	//$usuarioActual=$libro_auxiliar_web1->usuarioActual;
	//$sessionBase=$libro_auxiliar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$libro_auxiliar_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/libro_auxiliar/js/templating/libro_auxiliar_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/libro_auxiliar/js/templating/libro_auxiliar_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/libro_auxiliar/js/templating/libro_auxiliar_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/libro_auxiliar/js/templating/libro_auxiliar_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/libro_auxiliar/js/templating/libro_auxiliar_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			libro_auxiliar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					libro_auxiliar_web::$GET_POST=$_GET;
				} else {
					libro_auxiliar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			libro_auxiliar_web::$STR_NOMBRE_PAGINA = 'libro_auxiliar_view.php';
			libro_auxiliar_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			libro_auxiliar_web::$BIT_ES_PAGINA_FORM = 'false';
				
			libro_auxiliar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {libro_auxiliar_constante,libro_auxiliar_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/libro_auxiliar/js/util/libro_auxiliar_constante.js?random=1';
			import {libro_auxiliar_funcion,libro_auxiliar_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/libro_auxiliar/js/util/libro_auxiliar_funcion.js?random=1';
			
			let libro_auxiliar_constante2 = new libro_auxiliar_constante();
			
			libro_auxiliar_constante2.STR_NOMBRE_PAGINA="<?php echo(libro_auxiliar_web::$STR_NOMBRE_PAGINA); ?>";
			libro_auxiliar_constante2.STR_TYPE_ON_LOADlibro_auxiliar="<?php echo(libro_auxiliar_web::$STR_TYPE_ONLOAD); ?>";
			libro_auxiliar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(libro_auxiliar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			libro_auxiliar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(libro_auxiliar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			libro_auxiliar_constante2.STR_ACTION="<?php echo(libro_auxiliar_web::$STR_ACTION); ?>";
			libro_auxiliar_constante2.STR_ES_POPUP="<?php echo(libro_auxiliar_web::$STR_ES_POPUP); ?>";
			libro_auxiliar_constante2.STR_ES_BUSQUEDA="<?php echo(libro_auxiliar_web::$STR_ES_BUSQUEDA); ?>";
			libro_auxiliar_constante2.STR_FUNCION_JS="<?php echo(libro_auxiliar_web::$STR_FUNCION_JS); ?>";
			libro_auxiliar_constante2.BIG_ID_ACTUAL="<?php echo(libro_auxiliar_web::$BIG_ID_ACTUAL); ?>";
			libro_auxiliar_constante2.BIG_ID_OPCION="<?php echo(libro_auxiliar_web::$BIG_ID_OPCION); ?>";
			libro_auxiliar_constante2.STR_OBJETO_JS="<?php echo(libro_auxiliar_web::$STR_OBJETO_JS); ?>";
			libro_auxiliar_constante2.STR_ES_RELACIONES="<?php echo(libro_auxiliar_web::$STR_ES_RELACIONES); ?>";
			libro_auxiliar_constante2.STR_ES_RELACIONADO="<?php echo(libro_auxiliar_web::$STR_ES_RELACIONADO); ?>";
			libro_auxiliar_constante2.STR_ES_SUB_PAGINA="<?php echo(libro_auxiliar_web::$STR_ES_SUB_PAGINA); ?>";
			libro_auxiliar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(libro_auxiliar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			libro_auxiliar_constante2.BIT_ES_PAGINA_FORM=<?php echo(libro_auxiliar_web::$BIT_ES_PAGINA_FORM); ?>;
			libro_auxiliar_constante2.STR_SUFIJO="<?php echo(libro_auxiliar_web::$STR_SUF); ?>";//libro_auxiliar
			libro_auxiliar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(libro_auxiliar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//libro_auxiliar
			
			libro_auxiliar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(libro_auxiliar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			libro_auxiliar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($libro_auxiliar_web1->moduloActual->getnombre()); ?>";
			libro_auxiliar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(libro_auxiliar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			libro_auxiliar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*libro_auxiliar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			libro_auxiliar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.libro_auxiliar_constante2 = libro_auxiliar_constante2;
			
		</script>
		
		<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.libro_auxiliar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.libro_auxiliar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="libro_auxiliarActual" ></a>
	
	<div id="divResumenlibro_auxiliarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(libro_auxiliar_web::$STR_ES_BUSQUEDA=='false' && libro_auxiliar_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(libro_auxiliar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false' && libro_auxiliar_web::$STR_ES_POPUP=='false' && libro_auxiliar_web::$STR_ES_SUB_PAGINA=='false') {?>
						<td align="left" style="width: 3%">
							<img id="imgIrMain" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/ir_main.gif" title="IR A ARBOL DE OPCIONES PRINCIPAL" width="25" height="25"  onclick="funcionGeneral.irWindowAuxiliar('MENU PRINCIPAL','view=Main&action=index&typeonload=onloadhijos')"/>
						</td>
						<td align="left" style="width: 3%">
							<img id="imgCerrarSesion" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar_sesion.gif" title="CERRAR SESION" width="25" height="25"/>
						</td>
						<?php }?>
						<td id="tdToolBar" align="left" style="width: 70%">
							<!-- SECCION/TOOLBAR -->
							<table id="tblToolBar">
								<tr>
									<td id="tdlibro_auxiliarNuevoToolBar">
										<img id="imgNuevoToolBarlibro_auxiliar" name="imgNuevoToolBarlibro_auxiliar" title="Nuevo Libro Auxiliar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(libro_auxiliar_web::$STR_ES_BUSQUEDA=='false' && libro_auxiliar_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdlibro_auxiliarNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarlibro_auxiliar" name="imgNuevoGuardarCambiosToolBarlibro_auxiliar" title="Nuevo TABLA Libro Auxiliar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(libro_auxiliar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdlibro_auxiliarGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarlibro_auxiliar" name="imgGuardarCambiosToolBarlibro_auxiliar" title="Guardar Libro Auxiliar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false' && libro_auxiliar_web::$STR_ES_RELACIONES=='false' && libro_auxiliar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdlibro_auxiliarCopiarToolBar">
										<img id="imgCopiarToolBarlibro_auxiliar" name="imgCopiarToolBarlibro_auxiliar" title="Copiar Libro Auxiliar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdlibro_auxiliarDuplicarToolBar">
										<img id="imgDuplicarToolBarlibro_auxiliar" name="imgDuplicarToolBarlibro_auxiliar" title="Duplicar Libro Auxiliar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdlibro_auxiliarRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarlibro_auxiliar" name="imgRecargarInformacionToolBarlibro_auxiliar" title="Recargar Libro Auxiliar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdlibro_auxiliarAnterioresToolBar">
										<img id="imgAnterioresToolBarlibro_auxiliar" name="imgAnterioresToolBarlibro_auxiliar" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdlibro_auxiliarSiguientesToolBar">
										<img id="imgSiguientesToolBarlibro_auxiliar" name="imgSiguientesToolBarlibro_auxiliar" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdlibro_auxiliarAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarlibro_auxiliar" name="imgAbrirOrderByToolBarlibro_auxiliar" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((libro_auxiliar_web::$STR_ES_RELACIONADO=='false' && libro_auxiliar_web::$STR_ES_RELACIONES=='false') || libro_auxiliar_web::$STR_ES_BUSQUEDA=='true'  || libro_auxiliar_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdlibro_auxiliarCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarlibro_auxiliar" name="imgCerrarPaginaToolBarlibro_auxiliar" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trlibro_auxiliarCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedalibro_auxiliar" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedalibro_auxiliar',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trlibro_auxiliarCabeceraBusquedas/super -->

		<tr id="trBusquedalibro_auxiliar" class="busqueda" style="display:table-row">
			<td id="tdBusquedalibro_auxiliar" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedalibro_auxiliar" name="frmBusquedalibro_auxiliar">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedalibro_auxiliar" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trlibro_auxiliarBusquedas" class="busqueda" style="display:none"><td>
				<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarlibro_auxiliar" style="display:table-row">
					<td id="tdParamsBuscarlibro_auxiliar">
		<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarlibro_auxiliar">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroslibro_auxiliar" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroslibro_auxiliar"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroslibro_auxiliar" name="ParamsBuscar-txtNumeroRegistroslibro_auxiliar" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionlibro_auxiliar">
							<td id="tdGenerarReportelibro_auxiliar" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoslibro_auxiliar" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoslibro_auxiliar" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionlibro_auxiliar" name="btnRecargarInformacionlibro_auxiliar" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginalibro_auxiliar" name="btnImprimirPaginalibro_auxiliar" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*libro_auxiliar_web::$STR_ES_BUSQUEDA=='false'  &&*/ libro_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBylibro_auxiliar">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBylibro_auxiliar" name="btnOrderBylibro_auxiliar" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRellibro_auxiliar" name="btnOrderByRellibro_auxiliar" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(libro_auxiliar_web::$STR_ES_RELACIONES=='false' && libro_auxiliar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(libro_auxiliar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdlibro_auxiliarConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoslibro_auxiliar -->

							</td><!-- tdGenerarReportelibro_auxiliar -->
						</tr><!-- trRecargarInformacionlibro_auxiliar -->
					</table><!-- tblParamsBuscarNumeroRegistroslibro_auxiliar -->
				</div> <!-- divParamsBuscarlibro_auxiliar -->
		<?php } ?>
				</td> <!-- tdParamsBuscarlibro_auxiliar -->
				</tr><!-- trParamsBuscarlibro_auxiliar -->
				</table> <!-- tblBusquedalibro_auxiliar -->
				</form> <!-- frmBusquedalibro_auxiliar -->
				

			</td> <!-- tdBusquedalibro_auxiliar -->
		</tr> <!-- trBusquedalibro_auxiliar/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divlibro_auxiliarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbllibro_auxiliarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmlibro_auxiliarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnlibro_auxiliarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="libro_auxiliar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnlibro_auxiliarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmlibro_auxiliarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbllibro_auxiliarPopupAjaxWebPart -->
		</div> <!-- divlibro_auxiliarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trlibro_auxiliarTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdalibro_auxiliar"></a>
		<img id="imgTablaParaDerechalibro_auxiliar" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechalibro_auxiliar'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdalibro_auxiliar" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdalibro_auxiliar'"/>
		<a id="TablaDerechalibro_auxiliar"></a>
	</td>
</tr> <!-- trlibro_auxiliarTablaNavegacion/super -->
<?php } ?>

<tr id="trlibro_auxiliarTablaDatos">
	<td colspan="3" id="htmlTableCelllibro_auxiliar">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoslibro_auxiliarsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trlibro_auxiliarTablaDatos/super -->
		
		
		<tr id="trlibro_auxiliarPaginacion" style="display:table-row">
			<td id="tdlibro_auxiliarPaginacion" align="left">
				<div id="divlibro_auxiliarPaginacionAjaxWebPart">
				<form id="frmPaginacionlibro_auxiliar" name="frmPaginacionlibro_auxiliar">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionlibro_auxiliar" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(libro_auxiliar_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFklibro_auxiliar" name="btnSeleccionarLoteFklibro_auxiliar" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false' /*&& libro_auxiliar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioreslibro_auxiliar" name="btnAnterioreslibro_auxiliar" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(libro_auxiliar_web::$STR_ES_BUSQUEDA=='false' && libro_auxiliar_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdlibro_auxiliarNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararlibro_auxiliar" name="btnNuevoTablaPrepararlibro_auxiliar" title="NUEVO Libro Auxiliar" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablalibro_auxiliar" name="ParamsPaginar-txtNumeroNuevoTablalibro_auxiliar" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdlibro_auxiliarConEditarlibro_auxiliar">
							<label>
								<input id="ParamsBuscar-chbConEditarlibro_auxiliar" name="ParamsBuscar-chbConEditarlibro_auxiliar" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false'/* && libro_auxiliar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguienteslibro_auxiliar" name="btnSiguienteslibro_auxiliar" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionlibro_auxiliar -->
				</form> <!-- frmPaginacionlibro_auxiliar -->
				<form id="frmNuevoPrepararlibro_auxiliar" name="frmNuevoPrepararlibro_auxiliar">
				<table id="tblNuevoPrepararlibro_auxiliar" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trlibro_auxiliarNuevo" height="10">
						<?php if(libro_auxiliar_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdlibro_auxiliarNuevo" align="center">
							<input type="button" id="btnNuevoPrepararlibro_auxiliar" name="btnNuevoPrepararlibro_auxiliar" title="NUEVO Libro Auxiliar" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdlibro_auxiliarGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioslibro_auxiliar" name="btnGuardarCambioslibro_auxiliar" title="GUARDAR Libro Auxiliar" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false' && libro_auxiliar_web::$STR_ES_RELACIONES=='false' && libro_auxiliar_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdlibro_auxiliarDuplicar" align="center">
							<input type="button" id="btnDuplicarlibro_auxiliar" name="btnDuplicarlibro_auxiliar" title="DUPLICAR Libro Auxiliar" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdlibro_auxiliarCopiar" align="center">
							<input type="button" id="btnCopiarlibro_auxiliar" name="btnCopiarlibro_auxiliar" title="COPIAR Libro Auxiliar" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false' && ((libro_auxiliar_web::$STR_ES_RELACIONADO=='false' && libro_auxiliar_web::$STR_ES_RELACIONES=='false') || libro_auxiliar_web::$STR_ES_BUSQUEDA=='true'  || libro_auxiliar_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdlibro_auxiliarCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginalibro_auxiliar" name="btnCerrarPaginalibro_auxiliar" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararlibro_auxiliar -->
				</form> <!-- frmNuevoPrepararlibro_auxiliar -->
				</div> <!-- divlibro_auxiliarPaginacionAjaxWebPart -->
			</td> <!-- tdlibro_auxiliarPaginacion -->
		</tr> <!-- trlibro_auxiliarPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacioneslibro_auxiliarAjaxWebPart">
			<td id="tdAccionesRelacioneslibro_auxiliarAjaxWebPart">
				<div id="divAccionesRelacioneslibro_auxiliarAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacioneslibro_auxiliarAjaxWebPart -->
		</tr> <!-- trAccionesRelacioneslibro_auxiliarAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBylibro_auxiliar">
			<td id="tdOrderBylibro_auxiliar">
				<form id="frmOrderBylibro_auxiliar" name="frmOrderBylibro_auxiliar">
					<div id="divOrderBylibro_auxiliarAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRellibro_auxiliar" name="frmOrderByRellibro_auxiliar">
					<div id="divOrderByRellibro_auxiliarAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBylibro_auxiliar -->
		</tr> <!-- trOrderBylibro_auxiliar/super -->
			
		
		
		
		
		
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
			
				import {libro_auxiliar_webcontrol,libro_auxiliar_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/libro_auxiliar/js/webcontrol/libro_auxiliar_webcontrol.js?random=1';
				
				libro_auxiliar_webcontrol1.setlibro_auxiliar_constante(window.libro_auxiliar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(libro_auxiliar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

