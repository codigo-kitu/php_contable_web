<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\factura\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Factura Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/factura/util/factura_carga.php');
	use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/factura/presentation/view/factura_web.php');
	//use com\bydan\contabilidad\facturacion\factura\presentation\view\factura_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	factura_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$factura_web1= new factura_web();	
	$factura_web1->cargarDatosGenerales();
	
	//$moduloActual=$factura_web1->moduloActual;
	//$usuarioActual=$factura_web1->usuarioActual;
	//$sessionBase=$factura_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$factura_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura/js/templating/factura_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura/js/templating/factura_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura/js/templating/factura_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura/js/templating/factura_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura/js/templating/factura_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			factura_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					factura_web::$GET_POST=$_GET;
				} else {
					factura_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			factura_web::$STR_NOMBRE_PAGINA = 'factura_view.php';
			factura_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			factura_web::$BIT_ES_PAGINA_FORM = 'false';
				
			factura_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {factura_constante,factura_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/factura/js/util/factura_constante.js?random=1';
			import {factura_funcion,factura_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/factura/js/util/factura_funcion.js?random=1';
			
			let factura_constante2 = new factura_constante();
			
			factura_constante2.STR_NOMBRE_PAGINA="<?php echo(factura_web::$STR_NOMBRE_PAGINA); ?>";
			factura_constante2.STR_TYPE_ON_LOADfactura="<?php echo(factura_web::$STR_TYPE_ONLOAD); ?>";
			factura_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(factura_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			factura_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(factura_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			factura_constante2.STR_ACTION="<?php echo(factura_web::$STR_ACTION); ?>";
			factura_constante2.STR_ES_POPUP="<?php echo(factura_web::$STR_ES_POPUP); ?>";
			factura_constante2.STR_ES_BUSQUEDA="<?php echo(factura_web::$STR_ES_BUSQUEDA); ?>";
			factura_constante2.STR_FUNCION_JS="<?php echo(factura_web::$STR_FUNCION_JS); ?>";
			factura_constante2.BIG_ID_ACTUAL="<?php echo(factura_web::$BIG_ID_ACTUAL); ?>";
			factura_constante2.BIG_ID_OPCION="<?php echo(factura_web::$BIG_ID_OPCION); ?>";
			factura_constante2.STR_OBJETO_JS="<?php echo(factura_web::$STR_OBJETO_JS); ?>";
			factura_constante2.STR_ES_RELACIONES="<?php echo(factura_web::$STR_ES_RELACIONES); ?>";
			factura_constante2.STR_ES_RELACIONADO="<?php echo(factura_web::$STR_ES_RELACIONADO); ?>";
			factura_constante2.STR_ES_SUB_PAGINA="<?php echo(factura_web::$STR_ES_SUB_PAGINA); ?>";
			factura_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(factura_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			factura_constante2.BIT_ES_PAGINA_FORM=<?php echo(factura_web::$BIT_ES_PAGINA_FORM); ?>;
			factura_constante2.STR_SUFIJO="<?php echo(factura_web::$STR_SUF); ?>";//factura
			factura_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(factura_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//factura
			
			factura_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(factura_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			factura_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($factura_web1->moduloActual->getnombre()); ?>";
			factura_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(factura_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			factura_constante2.BIT_ES_LOAD_NORMAL=true;
			/*factura_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			factura_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.factura_constante2 = factura_constante2;
			
		</script>
		
		<?php if(factura_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.factura_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.factura_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="facturaActual" ></a>
	
	<div id="divResumenfacturaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(factura_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(factura_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(factura_web::$STR_ES_BUSQUEDA=='false' && factura_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(factura_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(factura_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(factura_web::$STR_ES_RELACIONADO=='false' && factura_web::$STR_ES_POPUP=='false' && factura_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdfacturaNuevoToolBar">
										<img id="imgNuevoToolBarfactura" name="imgNuevoToolBarfactura" title="Nuevo Factura" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(factura_web::$STR_ES_BUSQUEDA=='false' && factura_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdfacturaNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarfactura" name="imgNuevoGuardarCambiosToolBarfactura" title="Nuevo TABLA Factura" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(factura_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdfacturaGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarfactura" name="imgGuardarCambiosToolBarfactura" title="Guardar Factura" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(factura_web::$STR_ES_RELACIONADO=='false' && factura_web::$STR_ES_RELACIONES=='false' && factura_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdfacturaCopiarToolBar">
										<img id="imgCopiarToolBarfactura" name="imgCopiarToolBarfactura" title="Copiar Factura" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdfacturaDuplicarToolBar">
										<img id="imgDuplicarToolBarfactura" name="imgDuplicarToolBarfactura" title="Duplicar Factura" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(factura_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdfacturaRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarfactura" name="imgRecargarInformacionToolBarfactura" title="Recargar Factura" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdfacturaAnterioresToolBar">
										<img id="imgAnterioresToolBarfactura" name="imgAnterioresToolBarfactura" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdfacturaSiguientesToolBar">
										<img id="imgSiguientesToolBarfactura" name="imgSiguientesToolBarfactura" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdfacturaAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarfactura" name="imgAbrirOrderByToolBarfactura" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((factura_web::$STR_ES_RELACIONADO=='false' && factura_web::$STR_ES_RELACIONES=='false') || factura_web::$STR_ES_BUSQUEDA=='true'  || factura_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdfacturaCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarfactura" name="imgCerrarPaginaToolBarfactura" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trfacturaCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedafactura" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedafactura',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trfacturaCabeceraBusquedas/super -->

		<tr id="trBusquedafactura" class="busqueda" style="display:table-row">
			<td id="tdBusquedafactura" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedafactura" name="frmBusquedafactura">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedafactura" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trfacturaBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(factura_web::$STR_ES_RELACIONADO=='false' ) {?>
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
							<input type="button" id="btnBuscarfacturaFK_Idasiento" name="btnBuscarfacturaFK_Idasiento" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarfacturaFK_Idcliente" name="btnBuscarfacturaFK_Idcliente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarfacturaFK_Iddocumento_cuenta_cobrar" name="btnBuscarfacturaFK_Iddocumento_cuenta_cobrar" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarfacturaFK_Idestado" name="btnBuscarfacturaFK_Idestado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarfacturaFK_Idkardex" name="btnBuscarfacturaFK_Idkardex" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarfacturaFK_Idmoneda" name="btnBuscarfacturaFK_Idmoneda" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarfacturaFK_Idtermino_pago" name="btnBuscarfacturaFK_Idtermino_pago" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarfacturaFK_Idvendedor" name="btnBuscarfacturaFK_Idvendedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarfactura" style="display:table-row">
					<td id="tdParamsBuscarfactura">
		<?php if(factura_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarfactura">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosfactura" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosfactura"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosfactura" name="ParamsBuscar-txtNumeroRegistrosfactura" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionfactura">
							<td id="tdGenerarReportefactura" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosfactura" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosfactura" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionfactura" name="btnRecargarInformacionfactura" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginafactura" name="btnImprimirPaginafactura" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*factura_web::$STR_ES_BUSQUEDA=='false'  &&*/ factura_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByfactura">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByfactura" name="btnOrderByfactura" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelfactura" name="btnOrderByRelfactura" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(factura_web::$STR_ES_RELACIONES=='false' && factura_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(factura_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdfacturaConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosfactura -->

							</td><!-- tdGenerarReportefactura -->
						</tr><!-- trRecargarInformacionfactura -->
					</table><!-- tblParamsBuscarNumeroRegistrosfactura -->
				</div> <!-- divParamsBuscarfactura -->
		<?php } ?>
				</td> <!-- tdParamsBuscarfactura -->
				</tr><!-- trParamsBuscarfactura -->
				</table> <!-- tblBusquedafactura -->
				</form> <!-- frmBusquedafactura -->
				

			</td> <!-- tdBusquedafactura -->
		</tr> <!-- trBusquedafactura/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(factura_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divfacturaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblfacturaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmfacturaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnfacturaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="factura_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnfacturaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmfacturaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblfacturaPopupAjaxWebPart -->
		</div> <!-- divfacturaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(factura_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trfacturaTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdafactura"></a>
		<img id="imgTablaParaDerechafactura" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechafactura'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdafactura" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdafactura'"/>
		<a id="TablaDerechafactura"></a>
	</td>
</tr> <!-- trfacturaTablaNavegacion/super -->
<?php } ?>

<tr id="trfacturaTablaDatos">
	<td colspan="3" id="htmlTableCellfactura">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosfacturasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trfacturaTablaDatos/super -->
		
		
		<tr id="trfacturaPaginacion" style="display:table-row">
			<td id="tdfacturaPaginacion" align="left">
				<div id="divfacturaPaginacionAjaxWebPart">
				<form id="frmPaginacionfactura" name="frmPaginacionfactura">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionfactura" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(factura_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkfactura" name="btnSeleccionarLoteFkfactura" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(factura_web::$STR_ES_RELACIONADO=='false' /*&& factura_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresfactura" name="btnAnterioresfactura" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(factura_web::$STR_ES_BUSQUEDA=='false' && factura_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdfacturaNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararfactura" name="btnNuevoTablaPrepararfactura" title="NUEVO Factura" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablafactura" name="ParamsPaginar-txtNumeroNuevoTablafactura" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(factura_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdfacturaConEditarfactura">
							<label>
								<input id="ParamsBuscar-chbConEditarfactura" name="ParamsBuscar-chbConEditarfactura" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(factura_web::$STR_ES_RELACIONADO=='false'/* && factura_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesfactura" name="btnSiguientesfactura" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionfactura -->
				</form> <!-- frmPaginacionfactura -->
				<form id="frmNuevoPrepararfactura" name="frmNuevoPrepararfactura">
				<table id="tblNuevoPrepararfactura" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trfacturaNuevo" height="10">
						<?php if(factura_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdfacturaNuevo" align="center">
							<input type="button" id="btnNuevoPrepararfactura" name="btnNuevoPrepararfactura" title="NUEVO Factura" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdfacturaGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosfactura" name="btnGuardarCambiosfactura" title="GUARDAR Factura" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(factura_web::$STR_ES_RELACIONADO=='false' && factura_web::$STR_ES_RELACIONES=='false' && factura_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdfacturaDuplicar" align="center">
							<input type="button" id="btnDuplicarfactura" name="btnDuplicarfactura" title="DUPLICAR Factura" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdfacturaCopiar" align="center">
							<input type="button" id="btnCopiarfactura" name="btnCopiarfactura" title="COPIAR Factura" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(factura_web::$STR_ES_RELACIONADO=='false' && ((factura_web::$STR_ES_RELACIONADO=='false' && factura_web::$STR_ES_RELACIONES=='false') || factura_web::$STR_ES_BUSQUEDA=='true'  || factura_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdfacturaCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginafactura" name="btnCerrarPaginafactura" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararfactura -->
				</form> <!-- frmNuevoPrepararfactura -->
				</div> <!-- divfacturaPaginacionAjaxWebPart -->
			</td> <!-- tdfacturaPaginacion -->
		</tr> <!-- trfacturaPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(factura_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesfacturaAjaxWebPart">
			<td id="tdAccionesRelacionesfacturaAjaxWebPart">
				<div id="divAccionesRelacionesfacturaAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesfacturaAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesfacturaAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByfactura">
			<td id="tdOrderByfactura">
				<form id="frmOrderByfactura" name="frmOrderByfactura">
					<div id="divOrderByfacturaAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelfactura" name="frmOrderByRelfactura">
					<div id="divOrderByRelfacturaAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByfactura -->
		</tr> <!-- trOrderByfactura/super -->
			
		
		
		
		
		
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
			
				import {factura_webcontrol,factura_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/factura/js/webcontrol/factura_webcontrol.js?random=1';
				
				factura_webcontrol1.setfactura_constante(window.factura_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(factura_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

