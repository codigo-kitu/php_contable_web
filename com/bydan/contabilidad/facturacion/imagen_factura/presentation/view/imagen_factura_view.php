<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\imagen_factura\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Imagenes Facturas Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/imagen_factura/util/imagen_factura_carga.php');
	use com\bydan\contabilidad\facturacion\imagen_factura\util\imagen_factura_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/imagen_factura/presentation/view/imagen_factura_web.php');
	//use com\bydan\contabilidad\facturacion\imagen_factura\presentation\view\imagen_factura_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	imagen_factura_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	imagen_factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$imagen_factura_web1= new imagen_factura_web();	
	$imagen_factura_web1->cargarDatosGenerales();
	
	//$moduloActual=$imagen_factura_web1->moduloActual;
	//$usuarioActual=$imagen_factura_web1->usuarioActual;
	//$sessionBase=$imagen_factura_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$imagen_factura_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/imagen_factura/js/templating/imagen_factura_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/imagen_factura/js/templating/imagen_factura_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/imagen_factura/js/templating/imagen_factura_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/imagen_factura/js/templating/imagen_factura_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			imagen_factura_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					imagen_factura_web::$GET_POST=$_GET;
				} else {
					imagen_factura_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			imagen_factura_web::$STR_NOMBRE_PAGINA = 'imagen_factura_view.php';
			imagen_factura_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			imagen_factura_web::$BIT_ES_PAGINA_FORM = 'false';
				
			imagen_factura_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {imagen_factura_constante,imagen_factura_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/imagen_factura/js/util/imagen_factura_constante.js?random=1';
			import {imagen_factura_funcion,imagen_factura_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/imagen_factura/js/util/imagen_factura_funcion.js?random=1';
			
			let imagen_factura_constante2 = new imagen_factura_constante();
			
			imagen_factura_constante2.STR_NOMBRE_PAGINA="<?php echo(imagen_factura_web::$STR_NOMBRE_PAGINA); ?>";
			imagen_factura_constante2.STR_TYPE_ON_LOADimagen_factura="<?php echo(imagen_factura_web::$STR_TYPE_ONLOAD); ?>";
			imagen_factura_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(imagen_factura_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			imagen_factura_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(imagen_factura_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			imagen_factura_constante2.STR_ACTION="<?php echo(imagen_factura_web::$STR_ACTION); ?>";
			imagen_factura_constante2.STR_ES_POPUP="<?php echo(imagen_factura_web::$STR_ES_POPUP); ?>";
			imagen_factura_constante2.STR_ES_BUSQUEDA="<?php echo(imagen_factura_web::$STR_ES_BUSQUEDA); ?>";
			imagen_factura_constante2.STR_FUNCION_JS="<?php echo(imagen_factura_web::$STR_FUNCION_JS); ?>";
			imagen_factura_constante2.BIG_ID_ACTUAL="<?php echo(imagen_factura_web::$BIG_ID_ACTUAL); ?>";
			imagen_factura_constante2.BIG_ID_OPCION="<?php echo(imagen_factura_web::$BIG_ID_OPCION); ?>";
			imagen_factura_constante2.STR_OBJETO_JS="<?php echo(imagen_factura_web::$STR_OBJETO_JS); ?>";
			imagen_factura_constante2.STR_ES_RELACIONES="<?php echo(imagen_factura_web::$STR_ES_RELACIONES); ?>";
			imagen_factura_constante2.STR_ES_RELACIONADO="<?php echo(imagen_factura_web::$STR_ES_RELACIONADO); ?>";
			imagen_factura_constante2.STR_ES_SUB_PAGINA="<?php echo(imagen_factura_web::$STR_ES_SUB_PAGINA); ?>";
			imagen_factura_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(imagen_factura_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			imagen_factura_constante2.BIT_ES_PAGINA_FORM=<?php echo(imagen_factura_web::$BIT_ES_PAGINA_FORM); ?>;
			imagen_factura_constante2.STR_SUFIJO="<?php echo(imagen_factura_web::$STR_SUF); ?>";//imagen_factura
			imagen_factura_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(imagen_factura_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//imagen_factura
			
			imagen_factura_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(imagen_factura_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			imagen_factura_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($imagen_factura_web1->moduloActual->getnombre()); ?>";
			imagen_factura_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(imagen_factura_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			imagen_factura_constante2.BIT_ES_LOAD_NORMAL=true;
			/*imagen_factura_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			imagen_factura_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.imagen_factura_constante2 = imagen_factura_constante2;
			
		</script>
		
		<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.imagen_factura_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.imagen_factura_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="imagen_facturaActual" ></a>
	
	<div id="divResumenimagen_facturaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(imagen_factura_web::$STR_ES_BUSQUEDA=='false' && imagen_factura_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(imagen_factura_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false' && imagen_factura_web::$STR_ES_POPUP=='false' && imagen_factura_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdimagen_facturaNuevoToolBar">
										<img id="imgNuevoToolBarimagen_factura" name="imgNuevoToolBarimagen_factura" title="Nuevo Imagenes Facturas" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(imagen_factura_web::$STR_ES_BUSQUEDA=='false' && imagen_factura_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdimagen_facturaNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarimagen_factura" name="imgNuevoGuardarCambiosToolBarimagen_factura" title="Nuevo TABLA Imagenes Facturas" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_factura_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimagen_facturaGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarimagen_factura" name="imgGuardarCambiosToolBarimagen_factura" title="Guardar Imagenes Facturas" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false' && imagen_factura_web::$STR_ES_RELACIONES=='false' && imagen_factura_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimagen_facturaCopiarToolBar">
										<img id="imgCopiarToolBarimagen_factura" name="imgCopiarToolBarimagen_factura" title="Copiar Imagenes Facturas" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_facturaDuplicarToolBar">
										<img id="imgDuplicarToolBarimagen_factura" name="imgDuplicarToolBarimagen_factura" title="Duplicar Imagenes Facturas" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdimagen_facturaRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarimagen_factura" name="imgRecargarInformacionToolBarimagen_factura" title="Recargar Imagenes Facturas" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_facturaAnterioresToolBar">
										<img id="imgAnterioresToolBarimagen_factura" name="imgAnterioresToolBarimagen_factura" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_facturaSiguientesToolBar">
										<img id="imgSiguientesToolBarimagen_factura" name="imgSiguientesToolBarimagen_factura" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_facturaAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarimagen_factura" name="imgAbrirOrderByToolBarimagen_factura" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((imagen_factura_web::$STR_ES_RELACIONADO=='false' && imagen_factura_web::$STR_ES_RELACIONES=='false') || imagen_factura_web::$STR_ES_BUSQUEDA=='true'  || imagen_factura_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdimagen_facturaCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarimagen_factura" name="imgCerrarPaginaToolBarimagen_factura" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trimagen_facturaCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaimagen_factura" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaimagen_factura',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trimagen_facturaCabeceraBusquedas/super -->

		<tr id="trBusquedaimagen_factura" class="busqueda" style="display:table-row">
			<td id="tdBusquedaimagen_factura" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaimagen_factura" name="frmBusquedaimagen_factura">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaimagen_factura" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trimagen_facturaBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idfactura" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idfactura"> Por  Factura</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idfactura">
					<table id="tblstrVisibleFK_Idfactura" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Factura</span>
						</td>
						<td align="center">
							<select id="FK_Idfactura-cmbid_factura" name="FK_Idfactura-cmbid_factura" title=" Factura" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarimagen_facturaFK_Idfactura" name="btnBuscarimagen_facturaFK_Idfactura" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarimagen_factura" style="display:table-row">
					<td id="tdParamsBuscarimagen_factura">
		<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarimagen_factura">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosimagen_factura" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosimagen_factura"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosimagen_factura" name="ParamsBuscar-txtNumeroRegistrosimagen_factura" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionimagen_factura">
							<td id="tdGenerarReporteimagen_factura" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosimagen_factura" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosimagen_factura" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionimagen_factura" name="btnRecargarInformacionimagen_factura" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaimagen_factura" name="btnImprimirPaginaimagen_factura" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*imagen_factura_web::$STR_ES_BUSQUEDA=='false'  &&*/ imagen_factura_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByimagen_factura">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByimagen_factura" name="btnOrderByimagen_factura" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(imagen_factura_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdimagen_facturaConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosimagen_factura -->

							</td><!-- tdGenerarReporteimagen_factura -->
						</tr><!-- trRecargarInformacionimagen_factura -->
					</table><!-- tblParamsBuscarNumeroRegistrosimagen_factura -->
				</div> <!-- divParamsBuscarimagen_factura -->
		<?php } ?>
				</td> <!-- tdParamsBuscarimagen_factura -->
				</tr><!-- trParamsBuscarimagen_factura -->
				</table> <!-- tblBusquedaimagen_factura -->
				</form> <!-- frmBusquedaimagen_factura -->
				

			</td> <!-- tdBusquedaimagen_factura -->
		</tr> <!-- trBusquedaimagen_factura/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divimagen_facturaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblimagen_facturaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmimagen_facturaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnimagen_facturaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="imagen_factura_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnimagen_facturaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmimagen_facturaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblimagen_facturaPopupAjaxWebPart -->
		</div> <!-- divimagen_facturaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trimagen_facturaTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaimagen_factura"></a>
		<img id="imgTablaParaDerechaimagen_factura" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaimagen_factura'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaimagen_factura" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaimagen_factura'"/>
		<a id="TablaDerechaimagen_factura"></a>
	</td>
</tr> <!-- trimagen_facturaTablaNavegacion/super -->
<?php } ?>

<tr id="trimagen_facturaTablaDatos">
	<td colspan="3" id="htmlTableCellimagen_factura">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosimagen_facturasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trimagen_facturaTablaDatos/super -->
		
		
		<tr id="trimagen_facturaPaginacion" style="display:table-row">
			<td id="tdimagen_facturaPaginacion" align="center">
				<div id="divimagen_facturaPaginacionAjaxWebPart">
				<form id="frmPaginacionimagen_factura" name="frmPaginacionimagen_factura">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionimagen_factura" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(imagen_factura_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkimagen_factura" name="btnSeleccionarLoteFkimagen_factura" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false' /*&& imagen_factura_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresimagen_factura" name="btnAnterioresimagen_factura" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(imagen_factura_web::$STR_ES_BUSQUEDA=='false' && imagen_factura_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdimagen_facturaNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararimagen_factura" name="btnNuevoTablaPrepararimagen_factura" title="NUEVO Imagenes Facturas" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaimagen_factura" name="ParamsPaginar-txtNumeroNuevoTablaimagen_factura" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdimagen_facturaConEditarimagen_factura">
							<label>
								<input id="ParamsBuscar-chbConEditarimagen_factura" name="ParamsBuscar-chbConEditarimagen_factura" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false'/* && imagen_factura_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesimagen_factura" name="btnSiguientesimagen_factura" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionimagen_factura -->
				</form> <!-- frmPaginacionimagen_factura -->
				<form id="frmNuevoPrepararimagen_factura" name="frmNuevoPrepararimagen_factura">
				<table id="tblNuevoPrepararimagen_factura" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trimagen_facturaNuevo" height="10">
						<?php if(imagen_factura_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdimagen_facturaNuevo" align="center">
							<input type="button" id="btnNuevoPrepararimagen_factura" name="btnNuevoPrepararimagen_factura" title="NUEVO Imagenes Facturas" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdimagen_facturaGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosimagen_factura" name="btnGuardarCambiosimagen_factura" title="GUARDAR Imagenes Facturas" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false' && imagen_factura_web::$STR_ES_RELACIONES=='false' && imagen_factura_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdimagen_facturaDuplicar" align="center">
							<input type="button" id="btnDuplicarimagen_factura" name="btnDuplicarimagen_factura" title="DUPLICAR Imagenes Facturas" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdimagen_facturaCopiar" align="center">
							<input type="button" id="btnCopiarimagen_factura" name="btnCopiarimagen_factura" title="COPIAR Imagenes Facturas" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false' && ((imagen_factura_web::$STR_ES_RELACIONADO=='false' && imagen_factura_web::$STR_ES_RELACIONES=='false') || imagen_factura_web::$STR_ES_BUSQUEDA=='true'  || imagen_factura_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdimagen_facturaCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaimagen_factura" name="btnCerrarPaginaimagen_factura" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararimagen_factura -->
				</form> <!-- frmNuevoPrepararimagen_factura -->
				</div> <!-- divimagen_facturaPaginacionAjaxWebPart -->
			</td> <!-- tdimagen_facturaPaginacion -->
		</tr> <!-- trimagen_facturaPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesimagen_facturaAjaxWebPart">
			<td id="tdAccionesRelacionesimagen_facturaAjaxWebPart">
				<div id="divAccionesRelacionesimagen_facturaAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesimagen_facturaAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesimagen_facturaAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByimagen_factura">
			<td id="tdOrderByimagen_factura">
				<form id="frmOrderByimagen_factura" name="frmOrderByimagen_factura">
					<div id="divOrderByimagen_facturaAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByimagen_factura -->
		</tr> <!-- trOrderByimagen_factura/super -->
			
		
		
		
		
		
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
			
				import {imagen_factura_webcontrol,imagen_factura_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/imagen_factura/js/webcontrol/imagen_factura_webcontrol.js?random=1';
				
				imagen_factura_webcontrol1.setimagen_factura_constante(window.imagen_factura_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(imagen_factura_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

