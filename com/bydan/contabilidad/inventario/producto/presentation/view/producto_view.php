<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\producto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Producto Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/producto/util/producto_carga.php');
	use com\bydan\contabilidad\inventario\producto\util\producto_carga;
	
	//include_once('com/bydan/contabilidad/inventario/producto/presentation/view/producto_web.php');
	//use com\bydan\contabilidad\inventario\producto\presentation\view\producto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$producto_web1= new producto_web();	
	$producto_web1->cargarDatosGenerales();
	
	//$moduloActual=$producto_web1->moduloActual;
	//$usuarioActual=$producto_web1->usuarioActual;
	//$sessionBase=$producto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$producto_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/producto/js/templating/producto_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/producto/js/templating/producto_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/producto/js/templating/producto_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/producto/js/templating/producto_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/producto/js/templating/producto_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			producto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					producto_web::$GET_POST=$_GET;
				} else {
					producto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			producto_web::$STR_NOMBRE_PAGINA = 'producto_view.php';
			producto_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			producto_web::$BIT_ES_PAGINA_FORM = 'false';
				
			producto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {producto_constante,producto_constante1} from './webroot/js/JavaScript/contabilidad/inventario/producto/js/util/producto_constante.js?random=1';
			import {producto_funcion,producto_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/producto/js/util/producto_funcion.js?random=1';
			
			let producto_constante2 = new producto_constante();
			
			producto_constante2.STR_NOMBRE_PAGINA="<?php echo(producto_web::$STR_NOMBRE_PAGINA); ?>";
			producto_constante2.STR_TYPE_ON_LOADproducto="<?php echo(producto_web::$STR_TYPE_ONLOAD); ?>";
			producto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(producto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			producto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(producto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			producto_constante2.STR_ACTION="<?php echo(producto_web::$STR_ACTION); ?>";
			producto_constante2.STR_ES_POPUP="<?php echo(producto_web::$STR_ES_POPUP); ?>";
			producto_constante2.STR_ES_BUSQUEDA="<?php echo(producto_web::$STR_ES_BUSQUEDA); ?>";
			producto_constante2.STR_FUNCION_JS="<?php echo(producto_web::$STR_FUNCION_JS); ?>";
			producto_constante2.BIG_ID_ACTUAL="<?php echo(producto_web::$BIG_ID_ACTUAL); ?>";
			producto_constante2.BIG_ID_OPCION="<?php echo(producto_web::$BIG_ID_OPCION); ?>";
			producto_constante2.STR_OBJETO_JS="<?php echo(producto_web::$STR_OBJETO_JS); ?>";
			producto_constante2.STR_ES_RELACIONES="<?php echo(producto_web::$STR_ES_RELACIONES); ?>";
			producto_constante2.STR_ES_RELACIONADO="<?php echo(producto_web::$STR_ES_RELACIONADO); ?>";
			producto_constante2.STR_ES_SUB_PAGINA="<?php echo(producto_web::$STR_ES_SUB_PAGINA); ?>";
			producto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(producto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			producto_constante2.BIT_ES_PAGINA_FORM=<?php echo(producto_web::$BIT_ES_PAGINA_FORM); ?>;
			producto_constante2.STR_SUFIJO="<?php echo(producto_web::$STR_SUF); ?>";//producto
			producto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(producto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//producto
			
			producto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(producto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			producto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($producto_web1->moduloActual->getnombre()); ?>";
			producto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(producto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			producto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*producto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			producto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.producto_constante2 = producto_constante2;
			
		</script>
		
		<?php if(producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="productoActual" ></a>
	
	<div id="divResumenproductoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(producto_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(producto_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(producto_web::$STR_ES_BUSQUEDA=='false' && producto_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(producto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(producto_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(producto_web::$STR_ES_RELACIONADO=='false' && producto_web::$STR_ES_POPUP=='false' && producto_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdproductoNuevoToolBar">
										<img id="imgNuevoToolBarproducto" name="imgNuevoToolBarproducto" title="Nuevo Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(producto_web::$STR_ES_BUSQUEDA=='false' && producto_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdproductoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarproducto" name="imgNuevoGuardarCambiosToolBarproducto" title="Nuevo TABLA Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(producto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdproductoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarproducto" name="imgGuardarCambiosToolBarproducto" title="Guardar Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(producto_web::$STR_ES_RELACIONADO=='false' && producto_web::$STR_ES_RELACIONES=='false' && producto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdproductoCopiarToolBar">
										<img id="imgCopiarToolBarproducto" name="imgCopiarToolBarproducto" title="Copiar Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdproductoDuplicarToolBar">
										<img id="imgDuplicarToolBarproducto" name="imgDuplicarToolBarproducto" title="Duplicar Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(producto_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdproductoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarproducto" name="imgRecargarInformacionToolBarproducto" title="Recargar Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdproductoAnterioresToolBar">
										<img id="imgAnterioresToolBarproducto" name="imgAnterioresToolBarproducto" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdproductoSiguientesToolBar">
										<img id="imgSiguientesToolBarproducto" name="imgSiguientesToolBarproducto" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdproductoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarproducto" name="imgAbrirOrderByToolBarproducto" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((producto_web::$STR_ES_RELACIONADO=='false' && producto_web::$STR_ES_RELACIONES=='false') || producto_web::$STR_ES_BUSQUEDA=='true'  || producto_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdproductoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarproducto" name="imgCerrarPaginaToolBarproducto" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trproductoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaproducto" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaproducto',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trproductoCabeceraBusquedas/super -->

		<tr id="trBusquedaproducto" class="busqueda" style="display:table-row">
			<td id="tdBusquedaproducto" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaproducto" name="frmBusquedaproducto">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaproducto" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trproductoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(producto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 95%">
					<ul>
						<li id="listrVisibleFK_Idbodega" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idbodega"> Por Bodega Defecto</a></li>
						<li id="listrVisibleFK_Idcategoria_producto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcategoria_producto"> Por Categoria Producto</a></li>
						<li id="listrVisibleFK_Idcuenta_compra" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_compra"> Por Cuenta Compra/Activo/Inventario</a></li>
						<li id="listrVisibleFK_Idcuenta_inventario" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_inventario"> Por Cuenta Costo</a></li>
						<li id="listrVisibleFK_Idcuenta_venta" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_venta"> Por Cuenta Venta/Ingresos</a></li>
						<li id="listrVisibleFK_Idimpuesto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idimpuesto"> Por Impuesto</a></li>
						<li id="listrVisibleFK_Idotro_impuesto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idotro_impuesto"> Por Otro Impuesto</a></li>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por  Proveedores</a></li>
						<li id="listrVisibleFK_Idretencion" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idretencion"> Por Retencione</a></li>
						<li id="listrVisibleFK_Idsub_categoria_producto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idsub_categoria_producto"> Por Sub Categoria Producto</a></li>
						<li id="listrVisibleFK_Idtipo_producto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_producto"> Por Tipo Producto</a></li>
						<li id="listrVisibleFK_Idunidad_compra" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idunidad_compra"> Por Unidad Compra</a></li>
						<li id="listrVisibleFK_Idunidad_venta" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idunidad_venta"> Por Unidad Venta</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idbodega">
					<table id="tblstrVisibleFK_Idbodega" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Bodega Defecto</span>
						</td>
						<td align="center">
							<select id="FK_Idbodega-cmbid_bodega_defecto" name="FK_Idbodega-cmbid_bodega_defecto" title="Bodega Defecto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproductoFK_Idbodega" name="btnBuscarproductoFK_Idbodega" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcategoria_producto">
					<table id="tblstrVisibleFK_Idcategoria_producto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Categoria Producto</span>
						</td>
						<td align="center">
							<select id="FK_Idcategoria_producto-cmbid_categoria_producto" name="FK_Idcategoria_producto-cmbid_categoria_producto" title="Categoria Producto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproductoFK_Idcategoria_producto" name="btnBuscarproductoFK_Idcategoria_producto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta_compra">
					<table id="tblstrVisibleFK_Idcuenta_compra" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cuenta Compra/Activo/Inventario</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_compra-cmbid_cuenta_compra" name="FK_Idcuenta_compra-cmbid_cuenta_compra" title="Cuenta Compra/Activo/Inventario" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproductoFK_Idcuenta_compra" name="btnBuscarproductoFK_Idcuenta_compra" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta_inventario">
					<table id="tblstrVisibleFK_Idcuenta_inventario" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cuenta Costo</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_inventario-cmbid_cuenta_costo" name="FK_Idcuenta_inventario-cmbid_cuenta_costo" title="Cuenta Costo" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproductoFK_Idcuenta_inventario" name="btnBuscarproductoFK_Idcuenta_inventario" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta_venta">
					<table id="tblstrVisibleFK_Idcuenta_venta" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cuenta Venta/Ingresos</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_venta-cmbid_cuenta_venta" name="FK_Idcuenta_venta-cmbid_cuenta_venta" title="Cuenta Venta/Ingresos" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproductoFK_Idcuenta_venta" name="btnBuscarproductoFK_Idcuenta_venta" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idimpuesto">
					<table id="tblstrVisibleFK_Idimpuesto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Impuesto</span>
						</td>
						<td align="center">
							<select id="FK_Idimpuesto-cmbid_impuesto" name="FK_Idimpuesto-cmbid_impuesto" title="Impuesto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproductoFK_Idimpuesto" name="btnBuscarproductoFK_Idimpuesto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idotro_impuesto">
					<table id="tblstrVisibleFK_Idotro_impuesto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Otro Impuesto</span>
						</td>
						<td align="center">
							<select id="FK_Idotro_impuesto-cmbid_otro_impuesto" name="FK_Idotro_impuesto-cmbid_otro_impuesto" title="Otro Impuesto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproductoFK_Idotro_impuesto" name="btnBuscarproductoFK_Idotro_impuesto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproveedor">
					<table id="tblstrVisibleFK_Idproveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Proveedores</span>
						</td>
						<td align="center">
							<select id="FK_Idproveedor-cmbid_proveedor" name="FK_Idproveedor-cmbid_proveedor" title=" Proveedores" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproductoFK_Idproveedor" name="btnBuscarproductoFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idretencion">
					<table id="tblstrVisibleFK_Idretencion" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Retencione</span>
						</td>
						<td align="center">
							<select id="FK_Idretencion-cmbid_retencion" name="FK_Idretencion-cmbid_retencion" title="Retencione" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproductoFK_Idretencion" name="btnBuscarproductoFK_Idretencion" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idsub_categoria_producto">
					<table id="tblstrVisibleFK_Idsub_categoria_producto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Sub Categoria Producto</span>
						</td>
						<td align="center">
							<select id="FK_Idsub_categoria_producto-cmbid_sub_categoria_producto" name="FK_Idsub_categoria_producto-cmbid_sub_categoria_producto" title="Sub Categoria Producto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproductoFK_Idsub_categoria_producto" name="btnBuscarproductoFK_Idsub_categoria_producto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_producto">
					<table id="tblstrVisibleFK_Idtipo_producto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Tipo Producto</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_producto-cmbid_tipo_producto" name="FK_Idtipo_producto-cmbid_tipo_producto" title="Tipo Producto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproductoFK_Idtipo_producto" name="btnBuscarproductoFK_Idtipo_producto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idunidad_compra">
					<table id="tblstrVisibleFK_Idunidad_compra" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Unidad Compra</span>
						</td>
						<td align="center">
							<select id="FK_Idunidad_compra-cmbid_unidad_compra" name="FK_Idunidad_compra-cmbid_unidad_compra" title="Unidad Compra" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproductoFK_Idunidad_compra" name="btnBuscarproductoFK_Idunidad_compra" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idunidad_venta">
					<table id="tblstrVisibleFK_Idunidad_venta" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Unidad Venta</span>
						</td>
						<td align="center">
							<select id="FK_Idunidad_venta-cmbid_unidad_venta" name="FK_Idunidad_venta-cmbid_unidad_venta" title="Unidad Venta" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproductoFK_Idunidad_venta" name="btnBuscarproductoFK_Idunidad_venta" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarproducto" style="display:table-row">
					<td id="tdParamsBuscarproducto">
		<?php if(producto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarproducto">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosproducto" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosproducto"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosproducto" name="ParamsBuscar-txtNumeroRegistrosproducto" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionproducto">
							<td id="tdGenerarReporteproducto" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosproducto" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosproducto" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionproducto" name="btnRecargarInformacionproducto" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaproducto" name="btnImprimirPaginaproducto" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*producto_web::$STR_ES_BUSQUEDA=='false'  &&*/ producto_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByproducto">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByproducto" name="btnOrderByproducto" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelproducto" name="btnOrderByRelproducto" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(producto_web::$STR_ES_RELACIONES=='false' && producto_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(producto_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdproductoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosproducto -->

							</td><!-- tdGenerarReporteproducto -->
						</tr><!-- trRecargarInformacionproducto -->
					</table><!-- tblParamsBuscarNumeroRegistrosproducto -->
				</div> <!-- divParamsBuscarproducto -->
		<?php } ?>
				</td> <!-- tdParamsBuscarproducto -->
				</tr><!-- trParamsBuscarproducto -->
				</table> <!-- tblBusquedaproducto -->
				</form> <!-- frmBusquedaproducto -->
				

			</td> <!-- tdBusquedaproducto -->
		</tr> <!-- trBusquedaproducto/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divproductoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblproductoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmproductoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnproductoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="producto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnproductoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmproductoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblproductoPopupAjaxWebPart -->
		</div> <!-- divproductoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(producto_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trproductoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaproducto"></a>
		<img id="imgTablaParaDerechaproducto" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaproducto'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaproducto" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaproducto'"/>
		<a id="TablaDerechaproducto"></a>
	</td>
</tr> <!-- trproductoTablaNavegacion/super -->
<?php } ?>

<tr id="trproductoTablaDatos">
	<td colspan="3" id="htmlTableCellproducto">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosproductosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trproductoTablaDatos/super -->
		
		
		<tr id="trproductoPaginacion" style="display:table-row">
			<td id="tdproductoPaginacion" align="left">
				<div id="divproductoPaginacionAjaxWebPart">
				<form id="frmPaginacionproducto" name="frmPaginacionproducto">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionproducto" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(producto_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkproducto" name="btnSeleccionarLoteFkproducto" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(producto_web::$STR_ES_RELACIONADO=='false' /*&& producto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresproducto" name="btnAnterioresproducto" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(producto_web::$STR_ES_BUSQUEDA=='false' && producto_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdproductoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararproducto" name="btnNuevoTablaPrepararproducto" title="NUEVO Producto" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaproducto" name="ParamsPaginar-txtNumeroNuevoTablaproducto" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(producto_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdproductoConEditarproducto">
							<label>
								<input id="ParamsBuscar-chbConEditarproducto" name="ParamsBuscar-chbConEditarproducto" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(producto_web::$STR_ES_RELACIONADO=='false'/* && producto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesproducto" name="btnSiguientesproducto" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionproducto -->
				</form> <!-- frmPaginacionproducto -->
				<form id="frmNuevoPrepararproducto" name="frmNuevoPrepararproducto">
				<table id="tblNuevoPrepararproducto" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trproductoNuevo" height="10">
						<?php if(producto_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdproductoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararproducto" name="btnNuevoPrepararproducto" title="NUEVO Producto" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdproductoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosproducto" name="btnGuardarCambiosproducto" title="GUARDAR Producto" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(producto_web::$STR_ES_RELACIONADO=='false' && producto_web::$STR_ES_RELACIONES=='false' && producto_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdproductoDuplicar" align="center">
							<input type="button" id="btnDuplicarproducto" name="btnDuplicarproducto" title="DUPLICAR Producto" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdproductoCopiar" align="center">
							<input type="button" id="btnCopiarproducto" name="btnCopiarproducto" title="COPIAR Producto" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(producto_web::$STR_ES_RELACIONADO=='false' && ((producto_web::$STR_ES_RELACIONADO=='false' && producto_web::$STR_ES_RELACIONES=='false') || producto_web::$STR_ES_BUSQUEDA=='true'  || producto_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdproductoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaproducto" name="btnCerrarPaginaproducto" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararproducto -->
				</form> <!-- frmNuevoPrepararproducto -->
				</div> <!-- divproductoPaginacionAjaxWebPart -->
			</td> <!-- tdproductoPaginacion -->
		</tr> <!-- trproductoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(producto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesproductoAjaxWebPart">
			<td id="tdAccionesRelacionesproductoAjaxWebPart">
				<div id="divAccionesRelacionesproductoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesproductoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesproductoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByproducto">
			<td id="tdOrderByproducto">
				<form id="frmOrderByproducto" name="frmOrderByproducto">
					<div id="divOrderByproductoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelproducto" name="frmOrderByRelproducto">
					<div id="divOrderByRelproductoAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByproducto -->
		</tr> <!-- trOrderByproducto/super -->
			
		
		
		
		
		
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
			
				import {producto_webcontrol,producto_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/producto/js/webcontrol/producto_webcontrol.js?random=1';
				
				producto_webcontrol1.setproducto_constante(window.producto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(producto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

