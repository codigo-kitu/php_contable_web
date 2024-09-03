<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\imagen_proveedor\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Imagenes Proveedores Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentaspagar/imagen_proveedor/util/imagen_proveedor_carga.php');
	use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_carga;
	
	//include_once('com/bydan/contabilidad/cuentaspagar/imagen_proveedor/presentation/view/imagen_proveedor_web.php');
	//use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\presentation\view\imagen_proveedor_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	imagen_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	imagen_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$imagen_proveedor_web1= new imagen_proveedor_web();	
	$imagen_proveedor_web1->cargarDatosGenerales();
	
	//$moduloActual=$imagen_proveedor_web1->moduloActual;
	//$usuarioActual=$imagen_proveedor_web1->usuarioActual;
	//$sessionBase=$imagen_proveedor_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$imagen_proveedor_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/imagen_proveedor/js/templating/imagen_proveedor_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/imagen_proveedor/js/templating/imagen_proveedor_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/imagen_proveedor/js/templating/imagen_proveedor_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/imagen_proveedor/js/templating/imagen_proveedor_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			imagen_proveedor_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					imagen_proveedor_web::$GET_POST=$_GET;
				} else {
					imagen_proveedor_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			imagen_proveedor_web::$STR_NOMBRE_PAGINA = 'imagen_proveedor_view.php';
			imagen_proveedor_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			imagen_proveedor_web::$BIT_ES_PAGINA_FORM = 'false';
				
			imagen_proveedor_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {imagen_proveedor_constante,imagen_proveedor_constante1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/imagen_proveedor/js/util/imagen_proveedor_constante.js?random=1';
			import {imagen_proveedor_funcion,imagen_proveedor_funcion1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/imagen_proveedor/js/util/imagen_proveedor_funcion.js?random=1';
			
			let imagen_proveedor_constante2 = new imagen_proveedor_constante();
			
			imagen_proveedor_constante2.STR_NOMBRE_PAGINA="<?php echo(imagen_proveedor_web::$STR_NOMBRE_PAGINA); ?>";
			imagen_proveedor_constante2.STR_TYPE_ON_LOADimagen_proveedor="<?php echo(imagen_proveedor_web::$STR_TYPE_ONLOAD); ?>";
			imagen_proveedor_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(imagen_proveedor_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			imagen_proveedor_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(imagen_proveedor_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			imagen_proveedor_constante2.STR_ACTION="<?php echo(imagen_proveedor_web::$STR_ACTION); ?>";
			imagen_proveedor_constante2.STR_ES_POPUP="<?php echo(imagen_proveedor_web::$STR_ES_POPUP); ?>";
			imagen_proveedor_constante2.STR_ES_BUSQUEDA="<?php echo(imagen_proveedor_web::$STR_ES_BUSQUEDA); ?>";
			imagen_proveedor_constante2.STR_FUNCION_JS="<?php echo(imagen_proveedor_web::$STR_FUNCION_JS); ?>";
			imagen_proveedor_constante2.BIG_ID_ACTUAL="<?php echo(imagen_proveedor_web::$BIG_ID_ACTUAL); ?>";
			imagen_proveedor_constante2.BIG_ID_OPCION="<?php echo(imagen_proveedor_web::$BIG_ID_OPCION); ?>";
			imagen_proveedor_constante2.STR_OBJETO_JS="<?php echo(imagen_proveedor_web::$STR_OBJETO_JS); ?>";
			imagen_proveedor_constante2.STR_ES_RELACIONES="<?php echo(imagen_proveedor_web::$STR_ES_RELACIONES); ?>";
			imagen_proveedor_constante2.STR_ES_RELACIONADO="<?php echo(imagen_proveedor_web::$STR_ES_RELACIONADO); ?>";
			imagen_proveedor_constante2.STR_ES_SUB_PAGINA="<?php echo(imagen_proveedor_web::$STR_ES_SUB_PAGINA); ?>";
			imagen_proveedor_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(imagen_proveedor_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			imagen_proveedor_constante2.BIT_ES_PAGINA_FORM=<?php echo(imagen_proveedor_web::$BIT_ES_PAGINA_FORM); ?>;
			imagen_proveedor_constante2.STR_SUFIJO="<?php echo(imagen_proveedor_web::$STR_SUF); ?>";//imagen_proveedor
			imagen_proveedor_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(imagen_proveedor_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//imagen_proveedor
			
			imagen_proveedor_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(imagen_proveedor_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			imagen_proveedor_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($imagen_proveedor_web1->moduloActual->getnombre()); ?>";
			imagen_proveedor_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(imagen_proveedor_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			imagen_proveedor_constante2.BIT_ES_LOAD_NORMAL=true;
			/*imagen_proveedor_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			imagen_proveedor_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.imagen_proveedor_constante2 = imagen_proveedor_constante2;
			
		</script>
		
		<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.imagen_proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.imagen_proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="imagen_proveedorActual" ></a>
	
	<div id="divResumenimagen_proveedorActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(imagen_proveedor_web::$STR_ES_BUSQUEDA=='false' && imagen_proveedor_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(imagen_proveedor_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false' && imagen_proveedor_web::$STR_ES_POPUP=='false' && imagen_proveedor_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdimagen_proveedorNuevoToolBar">
										<img id="imgNuevoToolBarimagen_proveedor" name="imgNuevoToolBarimagen_proveedor" title="Nuevo Imagenes Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(imagen_proveedor_web::$STR_ES_BUSQUEDA=='false' && imagen_proveedor_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdimagen_proveedorNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarimagen_proveedor" name="imgNuevoGuardarCambiosToolBarimagen_proveedor" title="Nuevo TABLA Imagenes Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimagen_proveedorGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarimagen_proveedor" name="imgGuardarCambiosToolBarimagen_proveedor" title="Guardar Imagenes Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false' && imagen_proveedor_web::$STR_ES_RELACIONES=='false' && imagen_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimagen_proveedorCopiarToolBar">
										<img id="imgCopiarToolBarimagen_proveedor" name="imgCopiarToolBarimagen_proveedor" title="Copiar Imagenes Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_proveedorDuplicarToolBar">
										<img id="imgDuplicarToolBarimagen_proveedor" name="imgDuplicarToolBarimagen_proveedor" title="Duplicar Imagenes Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdimagen_proveedorRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarimagen_proveedor" name="imgRecargarInformacionToolBarimagen_proveedor" title="Recargar Imagenes Proveedores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_proveedorAnterioresToolBar">
										<img id="imgAnterioresToolBarimagen_proveedor" name="imgAnterioresToolBarimagen_proveedor" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_proveedorSiguientesToolBar">
										<img id="imgSiguientesToolBarimagen_proveedor" name="imgSiguientesToolBarimagen_proveedor" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_proveedorAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarimagen_proveedor" name="imgAbrirOrderByToolBarimagen_proveedor" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((imagen_proveedor_web::$STR_ES_RELACIONADO=='false' && imagen_proveedor_web::$STR_ES_RELACIONES=='false') || imagen_proveedor_web::$STR_ES_BUSQUEDA=='true'  || imagen_proveedor_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdimagen_proveedorCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarimagen_proveedor" name="imgCerrarPaginaToolBarimagen_proveedor" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trimagen_proveedorCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaimagen_proveedor" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaimagen_proveedor',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trimagen_proveedorCabeceraBusquedas/super -->

		<tr id="trBusquedaimagen_proveedor" class="busqueda" style="display:table-row">
			<td id="tdBusquedaimagen_proveedor" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaimagen_proveedor" name="frmBusquedaimagen_proveedor">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaimagen_proveedor" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trimagen_proveedorBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por Proveedor</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idproveedor">
					<table id="tblstrVisibleFK_Idproveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Proveedor</span>
						</td>
						<td align="center">
							<select id="FK_Idproveedor-cmbid_proveedor" name="FK_Idproveedor-cmbid_proveedor" title="Proveedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarimagen_proveedorFK_Idproveedor" name="btnBuscarimagen_proveedorFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarimagen_proveedor" style="display:table-row">
					<td id="tdParamsBuscarimagen_proveedor">
		<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarimagen_proveedor">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosimagen_proveedor" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosimagen_proveedor"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosimagen_proveedor" name="ParamsBuscar-txtNumeroRegistrosimagen_proveedor" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionimagen_proveedor">
							<td id="tdGenerarReporteimagen_proveedor" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosimagen_proveedor" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosimagen_proveedor" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionimagen_proveedor" name="btnRecargarInformacionimagen_proveedor" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaimagen_proveedor" name="btnImprimirPaginaimagen_proveedor" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*imagen_proveedor_web::$STR_ES_BUSQUEDA=='false'  &&*/ imagen_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByimagen_proveedor">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByimagen_proveedor" name="btnOrderByimagen_proveedor" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(imagen_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdimagen_proveedorConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosimagen_proveedor -->

							</td><!-- tdGenerarReporteimagen_proveedor -->
						</tr><!-- trRecargarInformacionimagen_proveedor -->
					</table><!-- tblParamsBuscarNumeroRegistrosimagen_proveedor -->
				</div> <!-- divParamsBuscarimagen_proveedor -->
		<?php } ?>
				</td> <!-- tdParamsBuscarimagen_proveedor -->
				</tr><!-- trParamsBuscarimagen_proveedor -->
				</table> <!-- tblBusquedaimagen_proveedor -->
				</form> <!-- frmBusquedaimagen_proveedor -->
				

			</td> <!-- tdBusquedaimagen_proveedor -->
		</tr> <!-- trBusquedaimagen_proveedor/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divimagen_proveedorPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblimagen_proveedorPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmimagen_proveedorAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnimagen_proveedorAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="imagen_proveedor_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnimagen_proveedorAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmimagen_proveedorAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblimagen_proveedorPopupAjaxWebPart -->
		</div> <!-- divimagen_proveedorPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trimagen_proveedorTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaimagen_proveedor"></a>
		<img id="imgTablaParaDerechaimagen_proveedor" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaimagen_proveedor'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaimagen_proveedor" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaimagen_proveedor'"/>
		<a id="TablaDerechaimagen_proveedor"></a>
	</td>
</tr> <!-- trimagen_proveedorTablaNavegacion/super -->
<?php } ?>

<tr id="trimagen_proveedorTablaDatos">
	<td colspan="3" id="htmlTableCellimagen_proveedor">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosimagen_proveedorsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trimagen_proveedorTablaDatos/super -->
		
		
		<tr id="trimagen_proveedorPaginacion" style="display:table-row">
			<td id="tdimagen_proveedorPaginacion" align="center">
				<div id="divimagen_proveedorPaginacionAjaxWebPart">
				<form id="frmPaginacionimagen_proveedor" name="frmPaginacionimagen_proveedor">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionimagen_proveedor" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(imagen_proveedor_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkimagen_proveedor" name="btnSeleccionarLoteFkimagen_proveedor" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false' /*&& imagen_proveedor_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresimagen_proveedor" name="btnAnterioresimagen_proveedor" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(imagen_proveedor_web::$STR_ES_BUSQUEDA=='false' && imagen_proveedor_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdimagen_proveedorNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararimagen_proveedor" name="btnNuevoTablaPrepararimagen_proveedor" title="NUEVO Imagenes Proveedores" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaimagen_proveedor" name="ParamsPaginar-txtNumeroNuevoTablaimagen_proveedor" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdimagen_proveedorConEditarimagen_proveedor">
							<label>
								<input id="ParamsBuscar-chbConEditarimagen_proveedor" name="ParamsBuscar-chbConEditarimagen_proveedor" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false'/* && imagen_proveedor_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesimagen_proveedor" name="btnSiguientesimagen_proveedor" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionimagen_proveedor -->
				</form> <!-- frmPaginacionimagen_proveedor -->
				<form id="frmNuevoPrepararimagen_proveedor" name="frmNuevoPrepararimagen_proveedor">
				<table id="tblNuevoPrepararimagen_proveedor" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trimagen_proveedorNuevo" height="10">
						<?php if(imagen_proveedor_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdimagen_proveedorNuevo" align="center">
							<input type="button" id="btnNuevoPrepararimagen_proveedor" name="btnNuevoPrepararimagen_proveedor" title="NUEVO Imagenes Proveedores" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdimagen_proveedorGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosimagen_proveedor" name="btnGuardarCambiosimagen_proveedor" title="GUARDAR Imagenes Proveedores" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false' && imagen_proveedor_web::$STR_ES_RELACIONES=='false' && imagen_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdimagen_proveedorDuplicar" align="center">
							<input type="button" id="btnDuplicarimagen_proveedor" name="btnDuplicarimagen_proveedor" title="DUPLICAR Imagenes Proveedores" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdimagen_proveedorCopiar" align="center">
							<input type="button" id="btnCopiarimagen_proveedor" name="btnCopiarimagen_proveedor" title="COPIAR Imagenes Proveedores" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false' && ((imagen_proveedor_web::$STR_ES_RELACIONADO=='false' && imagen_proveedor_web::$STR_ES_RELACIONES=='false') || imagen_proveedor_web::$STR_ES_BUSQUEDA=='true'  || imagen_proveedor_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdimagen_proveedorCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaimagen_proveedor" name="btnCerrarPaginaimagen_proveedor" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararimagen_proveedor -->
				</form> <!-- frmNuevoPrepararimagen_proveedor -->
				</div> <!-- divimagen_proveedorPaginacionAjaxWebPart -->
			</td> <!-- tdimagen_proveedorPaginacion -->
		</tr> <!-- trimagen_proveedorPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesimagen_proveedorAjaxWebPart">
			<td id="tdAccionesRelacionesimagen_proveedorAjaxWebPart">
				<div id="divAccionesRelacionesimagen_proveedorAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesimagen_proveedorAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesimagen_proveedorAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByimagen_proveedor">
			<td id="tdOrderByimagen_proveedor">
				<form id="frmOrderByimagen_proveedor" name="frmOrderByimagen_proveedor">
					<div id="divOrderByimagen_proveedorAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByimagen_proveedor -->
		</tr> <!-- trOrderByimagen_proveedor/super -->
			
		
		
		
		
		
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
			
				import {imagen_proveedor_webcontrol,imagen_proveedor_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/imagen_proveedor/js/webcontrol/imagen_proveedor_webcontrol.js?random=1';
				
				imagen_proveedor_webcontrol1.setimagen_proveedor_constante(window.imagen_proveedor_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(imagen_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

