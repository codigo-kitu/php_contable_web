<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\devolucion_factura\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Devolucion Factura Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/devolucion_factura/util/devolucion_factura_carga.php');
	use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/devolucion_factura/presentation/view/devolucion_factura_web.php');
	//use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\view\devolucion_factura_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	devolucion_factura_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	devolucion_factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$devolucion_factura_web1= new devolucion_factura_web();	
	$devolucion_factura_web1->cargarDatosGenerales();
	
	//$moduloActual=$devolucion_factura_web1->moduloActual;
	//$usuarioActual=$devolucion_factura_web1->usuarioActual;
	//$sessionBase=$devolucion_factura_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$devolucion_factura_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/devolucion_factura/js/templating/devolucion_factura_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/devolucion_factura/js/templating/devolucion_factura_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/devolucion_factura/js/templating/devolucion_factura_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/devolucion_factura/js/templating/devolucion_factura_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/devolucion_factura/js/templating/devolucion_factura_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			devolucion_factura_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					devolucion_factura_web::$GET_POST=$_GET;
				} else {
					devolucion_factura_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			devolucion_factura_web::$STR_NOMBRE_PAGINA = 'devolucion_factura_view.php';
			devolucion_factura_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			devolucion_factura_web::$BIT_ES_PAGINA_FORM = 'false';
				
			devolucion_factura_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {devolucion_factura_constante,devolucion_factura_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/devolucion_factura/js/util/devolucion_factura_constante.js?random=1';
			import {devolucion_factura_funcion,devolucion_factura_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/devolucion_factura/js/util/devolucion_factura_funcion.js?random=1';
			
			let devolucion_factura_constante2 = new devolucion_factura_constante();
			
			devolucion_factura_constante2.STR_NOMBRE_PAGINA="<?php echo(devolucion_factura_web::$STR_NOMBRE_PAGINA); ?>";
			devolucion_factura_constante2.STR_TYPE_ON_LOADdevolucion_factura="<?php echo(devolucion_factura_web::$STR_TYPE_ONLOAD); ?>";
			devolucion_factura_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(devolucion_factura_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			devolucion_factura_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(devolucion_factura_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			devolucion_factura_constante2.STR_ACTION="<?php echo(devolucion_factura_web::$STR_ACTION); ?>";
			devolucion_factura_constante2.STR_ES_POPUP="<?php echo(devolucion_factura_web::$STR_ES_POPUP); ?>";
			devolucion_factura_constante2.STR_ES_BUSQUEDA="<?php echo(devolucion_factura_web::$STR_ES_BUSQUEDA); ?>";
			devolucion_factura_constante2.STR_FUNCION_JS="<?php echo(devolucion_factura_web::$STR_FUNCION_JS); ?>";
			devolucion_factura_constante2.BIG_ID_ACTUAL="<?php echo(devolucion_factura_web::$BIG_ID_ACTUAL); ?>";
			devolucion_factura_constante2.BIG_ID_OPCION="<?php echo(devolucion_factura_web::$BIG_ID_OPCION); ?>";
			devolucion_factura_constante2.STR_OBJETO_JS="<?php echo(devolucion_factura_web::$STR_OBJETO_JS); ?>";
			devolucion_factura_constante2.STR_ES_RELACIONES="<?php echo(devolucion_factura_web::$STR_ES_RELACIONES); ?>";
			devolucion_factura_constante2.STR_ES_RELACIONADO="<?php echo(devolucion_factura_web::$STR_ES_RELACIONADO); ?>";
			devolucion_factura_constante2.STR_ES_SUB_PAGINA="<?php echo(devolucion_factura_web::$STR_ES_SUB_PAGINA); ?>";
			devolucion_factura_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(devolucion_factura_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			devolucion_factura_constante2.BIT_ES_PAGINA_FORM=<?php echo(devolucion_factura_web::$BIT_ES_PAGINA_FORM); ?>;
			devolucion_factura_constante2.STR_SUFIJO="<?php echo(devolucion_factura_web::$STR_SUF); ?>";//devolucion_factura
			devolucion_factura_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(devolucion_factura_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//devolucion_factura
			
			devolucion_factura_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(devolucion_factura_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			devolucion_factura_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($devolucion_factura_web1->moduloActual->getnombre()); ?>";
			devolucion_factura_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(devolucion_factura_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			devolucion_factura_constante2.BIT_ES_LOAD_NORMAL=true;
			/*devolucion_factura_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			devolucion_factura_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.devolucion_factura_constante2 = devolucion_factura_constante2;
			
		</script>
		
		<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.devolucion_factura_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.devolucion_factura_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="devolucion_facturaActual" ></a>
	
	<div id="divResumendevolucion_facturaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(devolucion_factura_web::$STR_ES_BUSQUEDA=='false' && devolucion_factura_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(devolucion_factura_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false' && devolucion_factura_web::$STR_ES_POPUP=='false' && devolucion_factura_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tddevolucion_facturaNuevoToolBar">
										<img id="imgNuevoToolBardevolucion_factura" name="imgNuevoToolBardevolucion_factura" title="Nuevo Devolucion Factura" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(devolucion_factura_web::$STR_ES_BUSQUEDA=='false' && devolucion_factura_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tddevolucion_facturaNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBardevolucion_factura" name="imgNuevoGuardarCambiosToolBardevolucion_factura" title="Nuevo TABLA Devolucion Factura" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(devolucion_factura_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddevolucion_facturaGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBardevolucion_factura" name="imgGuardarCambiosToolBardevolucion_factura" title="Guardar Devolucion Factura" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false' && devolucion_factura_web::$STR_ES_RELACIONES=='false' && devolucion_factura_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddevolucion_facturaCopiarToolBar">
										<img id="imgCopiarToolBardevolucion_factura" name="imgCopiarToolBardevolucion_factura" title="Copiar Devolucion Factura" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tddevolucion_facturaDuplicarToolBar">
										<img id="imgDuplicarToolBardevolucion_factura" name="imgDuplicarToolBardevolucion_factura" title="Duplicar Devolucion Factura" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tddevolucion_facturaRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBardevolucion_factura" name="imgRecargarInformacionToolBardevolucion_factura" title="Recargar Devolucion Factura" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tddevolucion_facturaAnterioresToolBar">
										<img id="imgAnterioresToolBardevolucion_factura" name="imgAnterioresToolBardevolucion_factura" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tddevolucion_facturaSiguientesToolBar">
										<img id="imgSiguientesToolBardevolucion_factura" name="imgSiguientesToolBardevolucion_factura" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tddevolucion_facturaAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBardevolucion_factura" name="imgAbrirOrderByToolBardevolucion_factura" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((devolucion_factura_web::$STR_ES_RELACIONADO=='false' && devolucion_factura_web::$STR_ES_RELACIONES=='false') || devolucion_factura_web::$STR_ES_BUSQUEDA=='true'  || devolucion_factura_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tddevolucion_facturaCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBardevolucion_factura" name="imgCerrarPaginaToolBardevolucion_factura" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trdevolucion_facturaCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedadevolucion_factura" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedadevolucion_factura',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trdevolucion_facturaCabeceraBusquedas/super -->

		<tr id="trBusquedadevolucion_factura" class="busqueda" style="display:table-row">
			<td id="tdBusquedadevolucion_factura" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedadevolucion_factura" name="frmBusquedadevolucion_factura">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedadevolucion_factura" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trdevolucion_facturaBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 95%">
					<ul>
						<li id="listrVisibleFK_Idasiento" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idasiento"> Por Asiento</a></li>
						<li id="listrVisibleFK_Idcliente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcliente"> Por Cliente</a></li>
						<li id="listrVisibleFK_Iddocumento_cuenta_cobrar" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Iddocumento_cuenta_cobrar"> Por Docs Cc</a></li>
						<li id="listrVisibleFK_Idestado" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado"> Por Estado</a></li>
						<li id="listrVisibleFK_Idkardex" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idkardex"> Por Kardex</a></li>
						<li id="listrVisibleFK_Idmoneda" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idmoneda"> Por Moneda</a></li>
						<li id="listrVisibleFK_Idtermino_pago" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtermino_pago"> Por Terminos Pago</a></li>
						<li id="listrVisibleFK_Idvendedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idvendedor"> Por Vendedor</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idasiento">
					<table id="tblstrVisibleFK_Idasiento" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Asiento</span>
						</td>
						<td align="center">
							<select id="FK_Idasiento-cmbid_asiento" name="FK_Idasiento-cmbid_asiento" title="Asiento" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucion_facturaFK_Idasiento" name="btnBuscardevolucion_facturaFK_Idasiento" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcliente">
					<table id="tblstrVisibleFK_Idcliente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cliente</span>
						</td>
						<td align="center">
							<select id="FK_Idcliente-cmbid_cliente" name="FK_Idcliente-cmbid_cliente" title="Cliente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucion_facturaFK_Idcliente" name="btnBuscardevolucion_facturaFK_Idcliente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Iddocumento_cuenta_cobrar">
					<table id="tblstrVisibleFK_Iddocumento_cuenta_cobrar" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Docs Cc</span>
						</td>
						<td align="center">
							<select id="FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar" name="FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar" title="Docs Cc" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucion_facturaFK_Iddocumento_cuenta_cobrar" name="btnBuscardevolucion_facturaFK_Iddocumento_cuenta_cobrar" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idestado">
					<table id="tblstrVisibleFK_Idestado" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Estado</span>
						</td>
						<td align="center">
							<select id="FK_Idestado-cmbid_estado" name="FK_Idestado-cmbid_estado" title="Estado" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucion_facturaFK_Idestado" name="btnBuscardevolucion_facturaFK_Idestado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idkardex">
					<table id="tblstrVisibleFK_Idkardex" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Kardex</span>
						</td>
						<td align="center">
							<select id="FK_Idkardex-cmbid_kardex" name="FK_Idkardex-cmbid_kardex" title="Kardex" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucion_facturaFK_Idkardex" name="btnBuscardevolucion_facturaFK_Idkardex" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idmoneda">
					<table id="tblstrVisibleFK_Idmoneda" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Moneda</span>
						</td>
						<td align="center">
							<select id="FK_Idmoneda-cmbid_moneda" name="FK_Idmoneda-cmbid_moneda" title="Moneda" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucion_facturaFK_Idmoneda" name="btnBuscardevolucion_facturaFK_Idmoneda" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtermino_pago">
					<table id="tblstrVisibleFK_Idtermino_pago" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Terminos Pago</span>
						</td>
						<td align="center">
							<select id="FK_Idtermino_pago-cmbid_termino_pago_cliente" name="FK_Idtermino_pago-cmbid_termino_pago_cliente" title="Terminos Pago" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucion_facturaFK_Idtermino_pago" name="btnBuscardevolucion_facturaFK_Idtermino_pago" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idvendedor">
					<table id="tblstrVisibleFK_Idvendedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Vendedor</span>
						</td>
						<td align="center">
							<select id="FK_Idvendedor-cmbid_vendedor" name="FK_Idvendedor-cmbid_vendedor" title="Vendedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucion_facturaFK_Idvendedor" name="btnBuscardevolucion_facturaFK_Idvendedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscardevolucion_factura" style="display:table-row">
					<td id="tdParamsBuscardevolucion_factura">
		<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscardevolucion_factura">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosdevolucion_factura" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosdevolucion_factura"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosdevolucion_factura" name="ParamsBuscar-txtNumeroRegistrosdevolucion_factura" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformaciondevolucion_factura">
							<td id="tdGenerarReportedevolucion_factura" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosdevolucion_factura" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosdevolucion_factura" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformaciondevolucion_factura" name="btnRecargarInformaciondevolucion_factura" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginadevolucion_factura" name="btnImprimirPaginadevolucion_factura" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*devolucion_factura_web::$STR_ES_BUSQUEDA=='false'  &&*/ devolucion_factura_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBydevolucion_factura">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBydevolucion_factura" name="btnOrderBydevolucion_factura" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByReldevolucion_factura" name="btnOrderByReldevolucion_factura" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(devolucion_factura_web::$STR_ES_RELACIONES=='false' && devolucion_factura_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(devolucion_factura_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tddevolucion_facturaConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosdevolucion_factura -->

							</td><!-- tdGenerarReportedevolucion_factura -->
						</tr><!-- trRecargarInformaciondevolucion_factura -->
					</table><!-- tblParamsBuscarNumeroRegistrosdevolucion_factura -->
				</div> <!-- divParamsBuscardevolucion_factura -->
		<?php } ?>
				</td> <!-- tdParamsBuscardevolucion_factura -->
				</tr><!-- trParamsBuscardevolucion_factura -->
				</table> <!-- tblBusquedadevolucion_factura -->
				</form> <!-- frmBusquedadevolucion_factura -->
				

			</td> <!-- tdBusquedadevolucion_factura -->
		</tr> <!-- trBusquedadevolucion_factura/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divdevolucion_facturaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbldevolucion_facturaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmdevolucion_facturaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btndevolucion_facturaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="devolucion_factura_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btndevolucion_facturaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmdevolucion_facturaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbldevolucion_facturaPopupAjaxWebPart -->
		</div> <!-- divdevolucion_facturaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trdevolucion_facturaTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdadevolucion_factura"></a>
		<img id="imgTablaParaDerechadevolucion_factura" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechadevolucion_factura'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdadevolucion_factura" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdadevolucion_factura'"/>
		<a id="TablaDerechadevolucion_factura"></a>
	</td>
</tr> <!-- trdevolucion_facturaTablaNavegacion/super -->
<?php } ?>

<tr id="trdevolucion_facturaTablaDatos">
	<td colspan="3" id="htmlTableCelldevolucion_factura">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosdevolucion_facturasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trdevolucion_facturaTablaDatos/super -->
		
		
		<tr id="trdevolucion_facturaPaginacion" style="display:table-row">
			<td id="tddevolucion_facturaPaginacion" align="left">
				<div id="divdevolucion_facturaPaginacionAjaxWebPart">
				<form id="frmPaginaciondevolucion_factura" name="frmPaginaciondevolucion_factura">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginaciondevolucion_factura" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(devolucion_factura_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkdevolucion_factura" name="btnSeleccionarLoteFkdevolucion_factura" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false' /*&& devolucion_factura_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresdevolucion_factura" name="btnAnterioresdevolucion_factura" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(devolucion_factura_web::$STR_ES_BUSQUEDA=='false' && devolucion_factura_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tddevolucion_facturaNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparardevolucion_factura" name="btnNuevoTablaPreparardevolucion_factura" title="NUEVO Devolucion Factura" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTabladevolucion_factura" name="ParamsPaginar-txtNumeroNuevoTabladevolucion_factura" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tddevolucion_facturaConEditardevolucion_factura">
							<label>
								<input id="ParamsBuscar-chbConEditardevolucion_factura" name="ParamsBuscar-chbConEditardevolucion_factura" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false'/* && devolucion_factura_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesdevolucion_factura" name="btnSiguientesdevolucion_factura" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginaciondevolucion_factura -->
				</form> <!-- frmPaginaciondevolucion_factura -->
				<form id="frmNuevoPreparardevolucion_factura" name="frmNuevoPreparardevolucion_factura">
				<table id="tblNuevoPreparardevolucion_factura" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trdevolucion_facturaNuevo" height="10">
						<?php if(devolucion_factura_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tddevolucion_facturaNuevo" align="center">
							<input type="button" id="btnNuevoPreparardevolucion_factura" name="btnNuevoPreparardevolucion_factura" title="NUEVO Devolucion Factura" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tddevolucion_facturaGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosdevolucion_factura" name="btnGuardarCambiosdevolucion_factura" title="GUARDAR Devolucion Factura" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false' && devolucion_factura_web::$STR_ES_RELACIONES=='false' && devolucion_factura_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tddevolucion_facturaDuplicar" align="center">
							<input type="button" id="btnDuplicardevolucion_factura" name="btnDuplicardevolucion_factura" title="DUPLICAR Devolucion Factura" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tddevolucion_facturaCopiar" align="center">
							<input type="button" id="btnCopiardevolucion_factura" name="btnCopiardevolucion_factura" title="COPIAR Devolucion Factura" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false' && ((devolucion_factura_web::$STR_ES_RELACIONADO=='false' && devolucion_factura_web::$STR_ES_RELACIONES=='false') || devolucion_factura_web::$STR_ES_BUSQUEDA=='true'  || devolucion_factura_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tddevolucion_facturaCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginadevolucion_factura" name="btnCerrarPaginadevolucion_factura" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparardevolucion_factura -->
				</form> <!-- frmNuevoPreparardevolucion_factura -->
				</div> <!-- divdevolucion_facturaPaginacionAjaxWebPart -->
			</td> <!-- tddevolucion_facturaPaginacion -->
		</tr> <!-- trdevolucion_facturaPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesdevolucion_facturaAjaxWebPart">
			<td id="tdAccionesRelacionesdevolucion_facturaAjaxWebPart">
				<div id="divAccionesRelacionesdevolucion_facturaAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesdevolucion_facturaAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesdevolucion_facturaAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBydevolucion_factura">
			<td id="tdOrderBydevolucion_factura">
				<form id="frmOrderBydevolucion_factura" name="frmOrderBydevolucion_factura">
					<div id="divOrderBydevolucion_facturaAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByReldevolucion_factura" name="frmOrderByReldevolucion_factura">
					<div id="divOrderByReldevolucion_facturaAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBydevolucion_factura -->
		</tr> <!-- trOrderBydevolucion_factura/super -->
			
		
		
		
		
		
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
			
				import {devolucion_factura_webcontrol,devolucion_factura_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/devolucion_factura/js/webcontrol/devolucion_factura_webcontrol.js?random=1';
				
				devolucion_factura_webcontrol1.setdevolucion_factura_constante(window.devolucion_factura_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(devolucion_factura_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

