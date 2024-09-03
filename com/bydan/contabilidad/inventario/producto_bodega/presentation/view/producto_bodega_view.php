<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\producto_bodega\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Producto Bodega Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/producto_bodega/util/producto_bodega_carga.php');
	use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_carga;
	
	//include_once('com/bydan/contabilidad/inventario/producto_bodega/presentation/view/producto_bodega_web.php');
	//use com\bydan\contabilidad\inventario\producto_bodega\presentation\view\producto_bodega_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	producto_bodega_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	producto_bodega_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$producto_bodega_web1= new producto_bodega_web();	
	$producto_bodega_web1->cargarDatosGenerales();
	
	//$moduloActual=$producto_bodega_web1->moduloActual;
	//$usuarioActual=$producto_bodega_web1->usuarioActual;
	//$sessionBase=$producto_bodega_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$producto_bodega_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/producto_bodega/js/templating/producto_bodega_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/producto_bodega/js/templating/producto_bodega_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/producto_bodega/js/templating/producto_bodega_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/producto_bodega/js/templating/producto_bodega_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			producto_bodega_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					producto_bodega_web::$GET_POST=$_GET;
				} else {
					producto_bodega_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			producto_bodega_web::$STR_NOMBRE_PAGINA = 'producto_bodega_view.php';
			producto_bodega_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			producto_bodega_web::$BIT_ES_PAGINA_FORM = 'false';
				
			producto_bodega_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {producto_bodega_constante,producto_bodega_constante1} from './webroot/js/JavaScript/contabilidad/inventario/producto_bodega/js/util/producto_bodega_constante.js?random=1';
			import {producto_bodega_funcion,producto_bodega_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/producto_bodega/js/util/producto_bodega_funcion.js?random=1';
			
			let producto_bodega_constante2 = new producto_bodega_constante();
			
			producto_bodega_constante2.STR_NOMBRE_PAGINA="<?php echo(producto_bodega_web::$STR_NOMBRE_PAGINA); ?>";
			producto_bodega_constante2.STR_TYPE_ON_LOADproducto_bodega="<?php echo(producto_bodega_web::$STR_TYPE_ONLOAD); ?>";
			producto_bodega_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(producto_bodega_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			producto_bodega_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(producto_bodega_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			producto_bodega_constante2.STR_ACTION="<?php echo(producto_bodega_web::$STR_ACTION); ?>";
			producto_bodega_constante2.STR_ES_POPUP="<?php echo(producto_bodega_web::$STR_ES_POPUP); ?>";
			producto_bodega_constante2.STR_ES_BUSQUEDA="<?php echo(producto_bodega_web::$STR_ES_BUSQUEDA); ?>";
			producto_bodega_constante2.STR_FUNCION_JS="<?php echo(producto_bodega_web::$STR_FUNCION_JS); ?>";
			producto_bodega_constante2.BIG_ID_ACTUAL="<?php echo(producto_bodega_web::$BIG_ID_ACTUAL); ?>";
			producto_bodega_constante2.BIG_ID_OPCION="<?php echo(producto_bodega_web::$BIG_ID_OPCION); ?>";
			producto_bodega_constante2.STR_OBJETO_JS="<?php echo(producto_bodega_web::$STR_OBJETO_JS); ?>";
			producto_bodega_constante2.STR_ES_RELACIONES="<?php echo(producto_bodega_web::$STR_ES_RELACIONES); ?>";
			producto_bodega_constante2.STR_ES_RELACIONADO="<?php echo(producto_bodega_web::$STR_ES_RELACIONADO); ?>";
			producto_bodega_constante2.STR_ES_SUB_PAGINA="<?php echo(producto_bodega_web::$STR_ES_SUB_PAGINA); ?>";
			producto_bodega_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(producto_bodega_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			producto_bodega_constante2.BIT_ES_PAGINA_FORM=<?php echo(producto_bodega_web::$BIT_ES_PAGINA_FORM); ?>;
			producto_bodega_constante2.STR_SUFIJO="<?php echo(producto_bodega_web::$STR_SUF); ?>";//producto_bodega
			producto_bodega_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(producto_bodega_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//producto_bodega
			
			producto_bodega_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(producto_bodega_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			producto_bodega_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($producto_bodega_web1->moduloActual->getnombre()); ?>";
			producto_bodega_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(producto_bodega_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			producto_bodega_constante2.BIT_ES_LOAD_NORMAL=true;
			/*producto_bodega_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			producto_bodega_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.producto_bodega_constante2 = producto_bodega_constante2;
			
		</script>
		
		<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.producto_bodega_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.producto_bodega_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="producto_bodegaActual" ></a>
	
	<div id="divResumenproducto_bodegaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(producto_bodega_web::$STR_ES_BUSQUEDA=='false' && producto_bodega_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(producto_bodega_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false' && producto_bodega_web::$STR_ES_POPUP=='false' && producto_bodega_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdproducto_bodegaNuevoToolBar">
										<img id="imgNuevoToolBarproducto_bodega" name="imgNuevoToolBarproducto_bodega" title="Nuevo Producto Bodega" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(producto_bodega_web::$STR_ES_BUSQUEDA=='false' && producto_bodega_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdproducto_bodegaNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarproducto_bodega" name="imgNuevoGuardarCambiosToolBarproducto_bodega" title="Nuevo TABLA Producto Bodega" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(producto_bodega_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdproducto_bodegaGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarproducto_bodega" name="imgGuardarCambiosToolBarproducto_bodega" title="Guardar Producto Bodega" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false' && producto_bodega_web::$STR_ES_RELACIONES=='false' && producto_bodega_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdproducto_bodegaCopiarToolBar">
										<img id="imgCopiarToolBarproducto_bodega" name="imgCopiarToolBarproducto_bodega" title="Copiar Producto Bodega" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdproducto_bodegaDuplicarToolBar">
										<img id="imgDuplicarToolBarproducto_bodega" name="imgDuplicarToolBarproducto_bodega" title="Duplicar Producto Bodega" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdproducto_bodegaRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarproducto_bodega" name="imgRecargarInformacionToolBarproducto_bodega" title="Recargar Producto Bodega" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdproducto_bodegaAnterioresToolBar">
										<img id="imgAnterioresToolBarproducto_bodega" name="imgAnterioresToolBarproducto_bodega" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdproducto_bodegaSiguientesToolBar">
										<img id="imgSiguientesToolBarproducto_bodega" name="imgSiguientesToolBarproducto_bodega" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdproducto_bodegaAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarproducto_bodega" name="imgAbrirOrderByToolBarproducto_bodega" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((producto_bodega_web::$STR_ES_RELACIONADO=='false' && producto_bodega_web::$STR_ES_RELACIONES=='false') || producto_bodega_web::$STR_ES_BUSQUEDA=='true'  || producto_bodega_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdproducto_bodegaCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarproducto_bodega" name="imgCerrarPaginaToolBarproducto_bodega" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trproducto_bodegaCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaproducto_bodega" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaproducto_bodega',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trproducto_bodegaCabeceraBusquedas/super -->

		<tr id="trBusquedaproducto_bodega" class="busqueda" style="display:table-row">
			<td id="tdBusquedaproducto_bodega" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaproducto_bodega" name="frmBusquedaproducto_bodega">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaproducto_bodega" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trproducto_bodegaBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idbodega" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idbodega"> Por Bodega</a></li>
						<li id="listrVisibleFK_Idproducto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproducto"> Por Producto</a></li>
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
							<input type="button" id="btnBuscarproducto_bodegaFK_Idbodega" name="btnBuscarproducto_bodegaFK_Idbodega" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarproducto_bodegaFK_Idproducto" name="btnBuscarproducto_bodegaFK_Idproducto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarproducto_bodega" style="display:table-row">
					<td id="tdParamsBuscarproducto_bodega">
		<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarproducto_bodega">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosproducto_bodega" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosproducto_bodega"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosproducto_bodega" name="ParamsBuscar-txtNumeroRegistrosproducto_bodega" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionproducto_bodega">
							<td id="tdGenerarReporteproducto_bodega" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosproducto_bodega" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosproducto_bodega" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionproducto_bodega" name="btnRecargarInformacionproducto_bodega" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaproducto_bodega" name="btnImprimirPaginaproducto_bodega" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*producto_bodega_web::$STR_ES_BUSQUEDA=='false'  &&*/ producto_bodega_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByproducto_bodega">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByproducto_bodega" name="btnOrderByproducto_bodega" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(producto_bodega_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdproducto_bodegaConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosproducto_bodega -->

							</td><!-- tdGenerarReporteproducto_bodega -->
						</tr><!-- trRecargarInformacionproducto_bodega -->
					</table><!-- tblParamsBuscarNumeroRegistrosproducto_bodega -->
				</div> <!-- divParamsBuscarproducto_bodega -->
		<?php } ?>
				</td> <!-- tdParamsBuscarproducto_bodega -->
				</tr><!-- trParamsBuscarproducto_bodega -->
				</table> <!-- tblBusquedaproducto_bodega -->
				</form> <!-- frmBusquedaproducto_bodega -->
				

			</td> <!-- tdBusquedaproducto_bodega -->
		</tr> <!-- trBusquedaproducto_bodega/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divproducto_bodegaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblproducto_bodegaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmproducto_bodegaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnproducto_bodegaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="producto_bodega_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnproducto_bodegaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmproducto_bodegaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblproducto_bodegaPopupAjaxWebPart -->
		</div> <!-- divproducto_bodegaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trproducto_bodegaTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaproducto_bodega"></a>
		<img id="imgTablaParaDerechaproducto_bodega" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaproducto_bodega'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaproducto_bodega" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaproducto_bodega'"/>
		<a id="TablaDerechaproducto_bodega"></a>
	</td>
</tr> <!-- trproducto_bodegaTablaNavegacion/super -->
<?php } ?>

<tr id="trproducto_bodegaTablaDatos">
	<td colspan="3" id="htmlTableCellproducto_bodega">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosproducto_bodegasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trproducto_bodegaTablaDatos/super -->
		
		
		<tr id="trproducto_bodegaPaginacion" style="display:table-row">
			<td id="tdproducto_bodegaPaginacion" align="center">
				<div id="divproducto_bodegaPaginacionAjaxWebPart">
				<form id="frmPaginacionproducto_bodega" name="frmPaginacionproducto_bodega">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionproducto_bodega" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(producto_bodega_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkproducto_bodega" name="btnSeleccionarLoteFkproducto_bodega" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false' /*&& producto_bodega_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresproducto_bodega" name="btnAnterioresproducto_bodega" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(producto_bodega_web::$STR_ES_BUSQUEDA=='false' && producto_bodega_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdproducto_bodegaNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararproducto_bodega" name="btnNuevoTablaPrepararproducto_bodega" title="NUEVO Producto Bodega" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaproducto_bodega" name="ParamsPaginar-txtNumeroNuevoTablaproducto_bodega" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdproducto_bodegaConEditarproducto_bodega">
							<label>
								<input id="ParamsBuscar-chbConEditarproducto_bodega" name="ParamsBuscar-chbConEditarproducto_bodega" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false'/* && producto_bodega_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesproducto_bodega" name="btnSiguientesproducto_bodega" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionproducto_bodega -->
				</form> <!-- frmPaginacionproducto_bodega -->
				<form id="frmNuevoPrepararproducto_bodega" name="frmNuevoPrepararproducto_bodega">
				<table id="tblNuevoPrepararproducto_bodega" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trproducto_bodegaNuevo" height="10">
						<?php if(producto_bodega_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdproducto_bodegaNuevo" align="center">
							<input type="button" id="btnNuevoPrepararproducto_bodega" name="btnNuevoPrepararproducto_bodega" title="NUEVO Producto Bodega" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdproducto_bodegaGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosproducto_bodega" name="btnGuardarCambiosproducto_bodega" title="GUARDAR Producto Bodega" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false' && producto_bodega_web::$STR_ES_RELACIONES=='false' && producto_bodega_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdproducto_bodegaDuplicar" align="center">
							<input type="button" id="btnDuplicarproducto_bodega" name="btnDuplicarproducto_bodega" title="DUPLICAR Producto Bodega" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdproducto_bodegaCopiar" align="center">
							<input type="button" id="btnCopiarproducto_bodega" name="btnCopiarproducto_bodega" title="COPIAR Producto Bodega" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false' && ((producto_bodega_web::$STR_ES_RELACIONADO=='false' && producto_bodega_web::$STR_ES_RELACIONES=='false') || producto_bodega_web::$STR_ES_BUSQUEDA=='true'  || producto_bodega_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdproducto_bodegaCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaproducto_bodega" name="btnCerrarPaginaproducto_bodega" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararproducto_bodega -->
				</form> <!-- frmNuevoPrepararproducto_bodega -->
				</div> <!-- divproducto_bodegaPaginacionAjaxWebPart -->
			</td> <!-- tdproducto_bodegaPaginacion -->
		</tr> <!-- trproducto_bodegaPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesproducto_bodegaAjaxWebPart">
			<td id="tdAccionesRelacionesproducto_bodegaAjaxWebPart">
				<div id="divAccionesRelacionesproducto_bodegaAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesproducto_bodegaAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesproducto_bodegaAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByproducto_bodega">
			<td id="tdOrderByproducto_bodega">
				<form id="frmOrderByproducto_bodega" name="frmOrderByproducto_bodega">
					<div id="divOrderByproducto_bodegaAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByproducto_bodega -->
		</tr> <!-- trOrderByproducto_bodega/super -->
			
		
		
		
		
		
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
			
				import {producto_bodega_webcontrol,producto_bodega_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/producto_bodega/js/webcontrol/producto_bodega_webcontrol.js?random=1';
				
				producto_bodega_webcontrol1.setproducto_bodega_constante(window.producto_bodega_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(producto_bodega_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

