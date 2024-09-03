<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\factura_detalle\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Factura Detalle Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/factura_detalle/util/factura_detalle_carga.php');
	use com\bydan\contabilidad\facturacion\factura_detalle\util\factura_detalle_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/factura_detalle/presentation/view/factura_detalle_web.php');
	//use com\bydan\contabilidad\facturacion\factura_detalle\presentation\view\factura_detalle_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	factura_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	factura_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$factura_detalle_web1= new factura_detalle_web();	
	$factura_detalle_web1->cargarDatosGenerales();
	
	//$moduloActual=$factura_detalle_web1->moduloActual;
	//$usuarioActual=$factura_detalle_web1->usuarioActual;
	//$sessionBase=$factura_detalle_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$factura_detalle_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura_detalle/js/templating/factura_detalle_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura_detalle/js/templating/factura_detalle_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura_detalle/js/templating/factura_detalle_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura_detalle/js/templating/factura_detalle_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			factura_detalle_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					factura_detalle_web::$GET_POST=$_GET;
				} else {
					factura_detalle_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			factura_detalle_web::$STR_NOMBRE_PAGINA = 'factura_detalle_view.php';
			factura_detalle_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			factura_detalle_web::$BIT_ES_PAGINA_FORM = 'false';
				
			factura_detalle_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {factura_detalle_constante,factura_detalle_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_detalle/js/util/factura_detalle_constante.js?random=1';
			import {factura_detalle_funcion,factura_detalle_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_detalle/js/util/factura_detalle_funcion.js?random=1';
			
			let factura_detalle_constante2 = new factura_detalle_constante();
			
			factura_detalle_constante2.STR_NOMBRE_PAGINA="<?php echo(factura_detalle_web::$STR_NOMBRE_PAGINA); ?>";
			factura_detalle_constante2.STR_TYPE_ON_LOADfactura_detalle="<?php echo(factura_detalle_web::$STR_TYPE_ONLOAD); ?>";
			factura_detalle_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(factura_detalle_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			factura_detalle_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(factura_detalle_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			factura_detalle_constante2.STR_ACTION="<?php echo(factura_detalle_web::$STR_ACTION); ?>";
			factura_detalle_constante2.STR_ES_POPUP="<?php echo(factura_detalle_web::$STR_ES_POPUP); ?>";
			factura_detalle_constante2.STR_ES_BUSQUEDA="<?php echo(factura_detalle_web::$STR_ES_BUSQUEDA); ?>";
			factura_detalle_constante2.STR_FUNCION_JS="<?php echo(factura_detalle_web::$STR_FUNCION_JS); ?>";
			factura_detalle_constante2.BIG_ID_ACTUAL="<?php echo(factura_detalle_web::$BIG_ID_ACTUAL); ?>";
			factura_detalle_constante2.BIG_ID_OPCION="<?php echo(factura_detalle_web::$BIG_ID_OPCION); ?>";
			factura_detalle_constante2.STR_OBJETO_JS="<?php echo(factura_detalle_web::$STR_OBJETO_JS); ?>";
			factura_detalle_constante2.STR_ES_RELACIONES="<?php echo(factura_detalle_web::$STR_ES_RELACIONES); ?>";
			factura_detalle_constante2.STR_ES_RELACIONADO="<?php echo(factura_detalle_web::$STR_ES_RELACIONADO); ?>";
			factura_detalle_constante2.STR_ES_SUB_PAGINA="<?php echo(factura_detalle_web::$STR_ES_SUB_PAGINA); ?>";
			factura_detalle_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(factura_detalle_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			factura_detalle_constante2.BIT_ES_PAGINA_FORM=<?php echo(factura_detalle_web::$BIT_ES_PAGINA_FORM); ?>;
			factura_detalle_constante2.STR_SUFIJO="<?php echo(factura_detalle_web::$STR_SUF); ?>";//factura_detalle
			factura_detalle_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(factura_detalle_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//factura_detalle
			
			factura_detalle_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(factura_detalle_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			factura_detalle_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($factura_detalle_web1->moduloActual->getnombre()); ?>";
			factura_detalle_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(factura_detalle_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			factura_detalle_constante2.BIT_ES_LOAD_NORMAL=true;
			/*factura_detalle_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			factura_detalle_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.factura_detalle_constante2 = factura_detalle_constante2;
			
		</script>
		
		<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.factura_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.factura_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="factura_detalleActual" ></a>
	
	<div id="divResumenfactura_detalleActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(factura_detalle_web::$STR_ES_BUSQUEDA=='false' && factura_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(factura_detalle_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false' && factura_detalle_web::$STR_ES_POPUP=='false' && factura_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdfactura_detalleNuevoToolBar">
										<img id="imgNuevoToolBarfactura_detalle" name="imgNuevoToolBarfactura_detalle" title="Nuevo Factura Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(factura_detalle_web::$STR_ES_BUSQUEDA=='false' && factura_detalle_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdfactura_detalleNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarfactura_detalle" name="imgNuevoGuardarCambiosToolBarfactura_detalle" title="Nuevo TABLA Factura Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(factura_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdfactura_detalleGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarfactura_detalle" name="imgGuardarCambiosToolBarfactura_detalle" title="Guardar Factura Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false' && factura_detalle_web::$STR_ES_RELACIONES=='false' && factura_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdfactura_detalleCopiarToolBar">
										<img id="imgCopiarToolBarfactura_detalle" name="imgCopiarToolBarfactura_detalle" title="Copiar Factura Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdfactura_detalleDuplicarToolBar">
										<img id="imgDuplicarToolBarfactura_detalle" name="imgDuplicarToolBarfactura_detalle" title="Duplicar Factura Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdfactura_detalleRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarfactura_detalle" name="imgRecargarInformacionToolBarfactura_detalle" title="Recargar Factura Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdfactura_detalleAnterioresToolBar">
										<img id="imgAnterioresToolBarfactura_detalle" name="imgAnterioresToolBarfactura_detalle" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdfactura_detalleSiguientesToolBar">
										<img id="imgSiguientesToolBarfactura_detalle" name="imgSiguientesToolBarfactura_detalle" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdfactura_detalleAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarfactura_detalle" name="imgAbrirOrderByToolBarfactura_detalle" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((factura_detalle_web::$STR_ES_RELACIONADO=='false' && factura_detalle_web::$STR_ES_RELACIONES=='false') || factura_detalle_web::$STR_ES_BUSQUEDA=='true'  || factura_detalle_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdfactura_detalleCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarfactura_detalle" name="imgCerrarPaginaToolBarfactura_detalle" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trfactura_detalleCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedafactura_detalle" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedafactura_detalle',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trfactura_detalleCabeceraBusquedas/super -->

		<tr id="trBusquedafactura_detalle" class="busqueda" style="display:table-row">
			<td id="tdBusquedafactura_detalle" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedafactura_detalle" name="frmBusquedafactura_detalle">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedafactura_detalle" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trfactura_detalleBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleFK_Idbodega" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idbodega"> Por Bodega</a></li>
						<li id="listrVisibleFK_Idfactura" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idfactura"> Por Factura</a></li>
						<li id="listrVisibleFK_Idproducto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproducto"> Por Producto</a></li>
						<li id="listrVisibleFK_Idunidad" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idunidad"> Por Unidad</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idbodega">
					<table id="tblstrVisibleFK_Idbodega" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Bodega</span>
						</td>
						<td align="center">
							<select id="FK_Idbodega-cmbid_bodega" name="FK_Idbodega-cmbid_bodega" title="Bodega" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarfactura_detalleFK_Idbodega" name="btnBuscarfactura_detalleFK_Idbodega" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idfactura">
					<table id="tblstrVisibleFK_Idfactura" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Factura</span>
						</td>
						<td align="center">
							<select id="FK_Idfactura-cmbid_factura" name="FK_Idfactura-cmbid_factura" title="Factura" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarfactura_detalleFK_Idfactura" name="btnBuscarfactura_detalleFK_Idfactura" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproducto">
					<table id="tblstrVisibleFK_Idproducto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Producto</span>
						</td>
						<td align="center">
							<select id="FK_Idproducto-cmbid_producto" name="FK_Idproducto-cmbid_producto" title="Producto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarfactura_detalleFK_Idproducto" name="btnBuscarfactura_detalleFK_Idproducto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idunidad">
					<table id="tblstrVisibleFK_Idunidad" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Unidad</span>
						</td>
						<td align="center">
							<select id="FK_Idunidad-cmbid_unidad" name="FK_Idunidad-cmbid_unidad" title="Unidad" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarfactura_detalleFK_Idunidad" name="btnBuscarfactura_detalleFK_Idunidad" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarfactura_detalle" style="display:table-row">
					<td id="tdParamsBuscarfactura_detalle">
		<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarfactura_detalle">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosfactura_detalle" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosfactura_detalle"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosfactura_detalle" name="ParamsBuscar-txtNumeroRegistrosfactura_detalle" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionfactura_detalle">
							<td id="tdGenerarReportefactura_detalle" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosfactura_detalle" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosfactura_detalle" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionfactura_detalle" name="btnRecargarInformacionfactura_detalle" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginafactura_detalle" name="btnImprimirPaginafactura_detalle" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*factura_detalle_web::$STR_ES_BUSQUEDA=='false'  &&*/ factura_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByfactura_detalle">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByfactura_detalle" name="btnOrderByfactura_detalle" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(factura_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdfactura_detalleConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosfactura_detalle -->

							</td><!-- tdGenerarReportefactura_detalle -->
						</tr><!-- trRecargarInformacionfactura_detalle -->
					</table><!-- tblParamsBuscarNumeroRegistrosfactura_detalle -->
				</div> <!-- divParamsBuscarfactura_detalle -->
		<?php } ?>
				</td> <!-- tdParamsBuscarfactura_detalle -->
				</tr><!-- trParamsBuscarfactura_detalle -->
				</table> <!-- tblBusquedafactura_detalle -->
				</form> <!-- frmBusquedafactura_detalle -->
				

			</td> <!-- tdBusquedafactura_detalle -->
		</tr> <!-- trBusquedafactura_detalle/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divfactura_detallePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblfactura_detallePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmfactura_detalleAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnfactura_detalleAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="factura_detalle_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnfactura_detalleAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmfactura_detalleAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblfactura_detallePopupAjaxWebPart -->
		</div> <!-- divfactura_detallePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trfactura_detalleTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdafactura_detalle"></a>
		<img id="imgTablaParaDerechafactura_detalle" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechafactura_detalle'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdafactura_detalle" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdafactura_detalle'"/>
		<a id="TablaDerechafactura_detalle"></a>
	</td>
</tr> <!-- trfactura_detalleTablaNavegacion/super -->
<?php } ?>

<tr id="trfactura_detalleTablaDatos">
	<td colspan="3" id="htmlTableCellfactura_detalle">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosfactura_detallesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trfactura_detalleTablaDatos/super -->
		
		
		<tr id="trfactura_detallePaginacion" style="display:table-row">
			<td id="tdfactura_detallePaginacion" align="left">
				<div id="divfactura_detallePaginacionAjaxWebPart">
				<form id="frmPaginacionfactura_detalle" name="frmPaginacionfactura_detalle">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionfactura_detalle" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(factura_detalle_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkfactura_detalle" name="btnSeleccionarLoteFkfactura_detalle" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false' /*&& factura_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresfactura_detalle" name="btnAnterioresfactura_detalle" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(factura_detalle_web::$STR_ES_BUSQUEDA=='false' && factura_detalle_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdfactura_detalleNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararfactura_detalle" name="btnNuevoTablaPrepararfactura_detalle" title="NUEVO Factura Detalle" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablafactura_detalle" name="ParamsPaginar-txtNumeroNuevoTablafactura_detalle" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdfactura_detalleConEditarfactura_detalle">
							<label>
								<input id="ParamsBuscar-chbConEditarfactura_detalle" name="ParamsBuscar-chbConEditarfactura_detalle" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false'/* && factura_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesfactura_detalle" name="btnSiguientesfactura_detalle" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionfactura_detalle -->
				</form> <!-- frmPaginacionfactura_detalle -->
				<form id="frmNuevoPrepararfactura_detalle" name="frmNuevoPrepararfactura_detalle">
				<table id="tblNuevoPrepararfactura_detalle" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trfactura_detalleNuevo" height="10">
						<?php if(factura_detalle_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdfactura_detalleNuevo" align="center">
							<input type="button" id="btnNuevoPrepararfactura_detalle" name="btnNuevoPrepararfactura_detalle" title="NUEVO Factura Detalle" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdfactura_detalleGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosfactura_detalle" name="btnGuardarCambiosfactura_detalle" title="GUARDAR Factura Detalle" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false' && factura_detalle_web::$STR_ES_RELACIONES=='false' && factura_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdfactura_detalleDuplicar" align="center">
							<input type="button" id="btnDuplicarfactura_detalle" name="btnDuplicarfactura_detalle" title="DUPLICAR Factura Detalle" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdfactura_detalleCopiar" align="center">
							<input type="button" id="btnCopiarfactura_detalle" name="btnCopiarfactura_detalle" title="COPIAR Factura Detalle" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false' && ((factura_detalle_web::$STR_ES_RELACIONADO=='false' && factura_detalle_web::$STR_ES_RELACIONES=='false') || factura_detalle_web::$STR_ES_BUSQUEDA=='true'  || factura_detalle_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdfactura_detalleCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginafactura_detalle" name="btnCerrarPaginafactura_detalle" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararfactura_detalle -->
				</form> <!-- frmNuevoPrepararfactura_detalle -->
				</div> <!-- divfactura_detallePaginacionAjaxWebPart -->
			</td> <!-- tdfactura_detallePaginacion -->
		</tr> <!-- trfactura_detallePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesfactura_detalleAjaxWebPart">
			<td id="tdAccionesRelacionesfactura_detalleAjaxWebPart">
				<div id="divAccionesRelacionesfactura_detalleAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesfactura_detalleAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesfactura_detalleAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByfactura_detalle">
			<td id="tdOrderByfactura_detalle">
				<form id="frmOrderByfactura_detalle" name="frmOrderByfactura_detalle">
					<div id="divOrderByfactura_detalleAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByfactura_detalle -->
		</tr> <!-- trOrderByfactura_detalle/super -->
			
		
		
		
		
		
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
			
				import {factura_detalle_webcontrol,factura_detalle_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_detalle/js/webcontrol/factura_detalle_webcontrol.js?random=1';
				
				factura_detalle_webcontrol1.setfactura_detalle_constante(window.factura_detalle_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(factura_detalle_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

