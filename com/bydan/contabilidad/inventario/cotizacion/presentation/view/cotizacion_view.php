<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\cotizacion\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cotizacion Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/cotizacion/util/cotizacion_carga.php');
	use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;
	
	//include_once('com/bydan/contabilidad/inventario/cotizacion/presentation/view/cotizacion_web.php');
	//use com\bydan\contabilidad\inventario\cotizacion\presentation\view\cotizacion_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cotizacion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cotizacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cotizacion_web1= new cotizacion_web();	
	$cotizacion_web1->cargarDatosGenerales();
	
	//$moduloActual=$cotizacion_web1->moduloActual;
	//$usuarioActual=$cotizacion_web1->usuarioActual;
	//$sessionBase=$cotizacion_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cotizacion_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/cotizacion/js/templating/cotizacion_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/cotizacion/js/templating/cotizacion_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/cotizacion/js/templating/cotizacion_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/cotizacion/js/templating/cotizacion_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/cotizacion/js/templating/cotizacion_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			cotizacion_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cotizacion_web::$GET_POST=$_GET;
				} else {
					cotizacion_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cotizacion_web::$STR_NOMBRE_PAGINA = 'cotizacion_view.php';
			cotizacion_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			cotizacion_web::$BIT_ES_PAGINA_FORM = 'false';
				
			cotizacion_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cotizacion_constante,cotizacion_constante1} from './webroot/js/JavaScript/contabilidad/inventario/cotizacion/js/util/cotizacion_constante.js?random=1';
			import {cotizacion_funcion,cotizacion_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/cotizacion/js/util/cotizacion_funcion.js?random=1';
			
			let cotizacion_constante2 = new cotizacion_constante();
			
			cotizacion_constante2.STR_NOMBRE_PAGINA="<?php echo(cotizacion_web::$STR_NOMBRE_PAGINA); ?>";
			cotizacion_constante2.STR_TYPE_ON_LOADcotizacion="<?php echo(cotizacion_web::$STR_TYPE_ONLOAD); ?>";
			cotizacion_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cotizacion_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cotizacion_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cotizacion_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cotizacion_constante2.STR_ACTION="<?php echo(cotizacion_web::$STR_ACTION); ?>";
			cotizacion_constante2.STR_ES_POPUP="<?php echo(cotizacion_web::$STR_ES_POPUP); ?>";
			cotizacion_constante2.STR_ES_BUSQUEDA="<?php echo(cotizacion_web::$STR_ES_BUSQUEDA); ?>";
			cotizacion_constante2.STR_FUNCION_JS="<?php echo(cotizacion_web::$STR_FUNCION_JS); ?>";
			cotizacion_constante2.BIG_ID_ACTUAL="<?php echo(cotizacion_web::$BIG_ID_ACTUAL); ?>";
			cotizacion_constante2.BIG_ID_OPCION="<?php echo(cotizacion_web::$BIG_ID_OPCION); ?>";
			cotizacion_constante2.STR_OBJETO_JS="<?php echo(cotizacion_web::$STR_OBJETO_JS); ?>";
			cotizacion_constante2.STR_ES_RELACIONES="<?php echo(cotizacion_web::$STR_ES_RELACIONES); ?>";
			cotizacion_constante2.STR_ES_RELACIONADO="<?php echo(cotizacion_web::$STR_ES_RELACIONADO); ?>";
			cotizacion_constante2.STR_ES_SUB_PAGINA="<?php echo(cotizacion_web::$STR_ES_SUB_PAGINA); ?>";
			cotizacion_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cotizacion_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cotizacion_constante2.BIT_ES_PAGINA_FORM=<?php echo(cotizacion_web::$BIT_ES_PAGINA_FORM); ?>;
			cotizacion_constante2.STR_SUFIJO="<?php echo(cotizacion_web::$STR_SUF); ?>";//cotizacion
			cotizacion_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cotizacion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cotizacion
			
			cotizacion_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cotizacion_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cotizacion_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cotizacion_web1->moduloActual->getnombre()); ?>";
			cotizacion_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cotizacion_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cotizacion_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cotizacion_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cotizacion_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cotizacion_constante2 = cotizacion_constante2;
			
		</script>
		
		<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cotizacion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cotizacion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cotizacionActual" ></a>
	
	<div id="divResumencotizacionActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(cotizacion_web::$STR_ES_BUSQUEDA=='false' && cotizacion_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cotizacion_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false' && cotizacion_web::$STR_ES_POPUP=='false' && cotizacion_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcotizacionNuevoToolBar">
										<img id="imgNuevoToolBarcotizacion" name="imgNuevoToolBarcotizacion" title="Nuevo Cotizacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(cotizacion_web::$STR_ES_BUSQUEDA=='false' && cotizacion_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcotizacionNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcotizacion" name="imgNuevoGuardarCambiosToolBarcotizacion" title="Nuevo TABLA Cotizacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cotizacion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcotizacionGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcotizacion" name="imgGuardarCambiosToolBarcotizacion" title="Guardar Cotizacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false' && cotizacion_web::$STR_ES_RELACIONES=='false' && cotizacion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcotizacionCopiarToolBar">
										<img id="imgCopiarToolBarcotizacion" name="imgCopiarToolBarcotizacion" title="Copiar Cotizacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcotizacionDuplicarToolBar">
										<img id="imgDuplicarToolBarcotizacion" name="imgDuplicarToolBarcotizacion" title="Duplicar Cotizacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcotizacionRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcotizacion" name="imgRecargarInformacionToolBarcotizacion" title="Recargar Cotizacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcotizacionAnterioresToolBar">
										<img id="imgAnterioresToolBarcotizacion" name="imgAnterioresToolBarcotizacion" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcotizacionSiguientesToolBar">
										<img id="imgSiguientesToolBarcotizacion" name="imgSiguientesToolBarcotizacion" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcotizacionAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcotizacion" name="imgAbrirOrderByToolBarcotizacion" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((cotizacion_web::$STR_ES_RELACIONADO=='false' && cotizacion_web::$STR_ES_RELACIONES=='false') || cotizacion_web::$STR_ES_BUSQUEDA=='true'  || cotizacion_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcotizacionCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcotizacion" name="imgCerrarPaginaToolBarcotizacion" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcotizacionCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacotizacion" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacotizacion',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcotizacionCabeceraBusquedas/super -->

		<tr id="trBusquedacotizacion" class="busqueda" style="display:table-row">
			<td id="tdBusquedacotizacion" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacotizacion" name="frmBusquedacotizacion">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacotizacion" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcotizacionBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleFK_Idestado" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado"> Por Estado</a></li>
						<li id="listrVisibleFK_Idmoneda" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idmoneda"> Por Moneda</a></li>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por  Proveedores</a></li>
						<li id="listrVisibleFK_Idtermino_pago_proveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtermino_pago_proveedor"> Por Terminos Pago</a></li>
						<li id="listrVisibleFK_Idvendedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idvendedor"> Por  Vendedor</a></li>
					</ul>
				
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
							<input type="button" id="btnBuscarcotizacionFK_Idestado" name="btnBuscarcotizacionFK_Idestado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarcotizacionFK_Idmoneda" name="btnBuscarcotizacionFK_Idmoneda" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarcotizacionFK_Idproveedor" name="btnBuscarcotizacionFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtermino_pago_proveedor">
					<table id="tblstrVisibleFK_Idtermino_pago_proveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Terminos Pago</span>
						</td>
						<td align="center">
							<select id="FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor" name="FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor" title="Terminos Pago" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcotizacionFK_Idtermino_pago_proveedor" name="btnBuscarcotizacionFK_Idtermino_pago_proveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idvendedor">
					<table id="tblstrVisibleFK_Idvendedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Vendedor</span>
						</td>
						<td align="center">
							<select id="FK_Idvendedor-cmbid_vendedor" name="FK_Idvendedor-cmbid_vendedor" title=" Vendedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcotizacionFK_Idvendedor" name="btnBuscarcotizacionFK_Idvendedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcotizacion" style="display:table-row">
					<td id="tdParamsBuscarcotizacion">
		<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcotizacion">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscotizacion" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscotizacion"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscotizacion" name="ParamsBuscar-txtNumeroRegistroscotizacion" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncotizacion">
							<td id="tdGenerarReportecotizacion" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscotizacion" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscotizacion" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncotizacion" name="btnRecargarInformacioncotizacion" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacotizacion" name="btnImprimirPaginacotizacion" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*cotizacion_web::$STR_ES_BUSQUEDA=='false'  &&*/ cotizacion_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycotizacion">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycotizacion" name="btnOrderBycotizacion" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelcotizacion" name="btnOrderByRelcotizacion" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(cotizacion_web::$STR_ES_RELACIONES=='false' && cotizacion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(cotizacion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcotizacionConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscotizacion -->

							</td><!-- tdGenerarReportecotizacion -->
						</tr><!-- trRecargarInformacioncotizacion -->
					</table><!-- tblParamsBuscarNumeroRegistroscotizacion -->
				</div> <!-- divParamsBuscarcotizacion -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcotizacion -->
				</tr><!-- trParamsBuscarcotizacion -->
				</table> <!-- tblBusquedacotizacion -->
				</form> <!-- frmBusquedacotizacion -->
				

			</td> <!-- tdBusquedacotizacion -->
		</tr> <!-- trBusquedacotizacion/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcotizacionPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcotizacionPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcotizacionAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncotizacionAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cotizacion_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncotizacionAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcotizacionAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcotizacionPopupAjaxWebPart -->
		</div> <!-- divcotizacionPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcotizacionTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacotizacion"></a>
		<img id="imgTablaParaDerechacotizacion" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacotizacion'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacotizacion" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacotizacion'"/>
		<a id="TablaDerechacotizacion"></a>
	</td>
</tr> <!-- trcotizacionTablaNavegacion/super -->
<?php } ?>

<tr id="trcotizacionTablaDatos">
	<td colspan="3" id="htmlTableCellcotizacion">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscotizacionsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcotizacionTablaDatos/super -->
		
		
		<tr id="trcotizacionPaginacion" style="display:table-row">
			<td id="tdcotizacionPaginacion" align="left">
				<div id="divcotizacionPaginacionAjaxWebPart">
				<form id="frmPaginacioncotizacion" name="frmPaginacioncotizacion">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncotizacion" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(cotizacion_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcotizacion" name="btnSeleccionarLoteFkcotizacion" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false' /*&& cotizacion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescotizacion" name="btnAnteriorescotizacion" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(cotizacion_web::$STR_ES_BUSQUEDA=='false' && cotizacion_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcotizacionNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcotizacion" name="btnNuevoTablaPrepararcotizacion" title="NUEVO Cotizacion" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacotizacion" name="ParamsPaginar-txtNumeroNuevoTablacotizacion" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(cotizacion_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcotizacionConEditarcotizacion">
							<label>
								<input id="ParamsBuscar-chbConEditarcotizacion" name="ParamsBuscar-chbConEditarcotizacion" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false'/* && cotizacion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescotizacion" name="btnSiguientescotizacion" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncotizacion -->
				</form> <!-- frmPaginacioncotizacion -->
				<form id="frmNuevoPrepararcotizacion" name="frmNuevoPrepararcotizacion">
				<table id="tblNuevoPrepararcotizacion" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trcotizacionNuevo" height="10">
						<?php if(cotizacion_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcotizacionNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcotizacion" name="btnNuevoPrepararcotizacion" title="NUEVO Cotizacion" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcotizacionGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscotizacion" name="btnGuardarCambioscotizacion" title="GUARDAR Cotizacion" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false' && cotizacion_web::$STR_ES_RELACIONES=='false' && cotizacion_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcotizacionDuplicar" align="center">
							<input type="button" id="btnDuplicarcotizacion" name="btnDuplicarcotizacion" title="DUPLICAR Cotizacion" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcotizacionCopiar" align="center">
							<input type="button" id="btnCopiarcotizacion" name="btnCopiarcotizacion" title="COPIAR Cotizacion" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false' && ((cotizacion_web::$STR_ES_RELACIONADO=='false' && cotizacion_web::$STR_ES_RELACIONES=='false') || cotizacion_web::$STR_ES_BUSQUEDA=='true'  || cotizacion_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcotizacionCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacotizacion" name="btnCerrarPaginacotizacion" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcotizacion -->
				</form> <!-- frmNuevoPrepararcotizacion -->
				</div> <!-- divcotizacionPaginacionAjaxWebPart -->
			</td> <!-- tdcotizacionPaginacion -->
		</tr> <!-- trcotizacionPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescotizacionAjaxWebPart">
			<td id="tdAccionesRelacionescotizacionAjaxWebPart">
				<div id="divAccionesRelacionescotizacionAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescotizacionAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescotizacionAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycotizacion">
			<td id="tdOrderBycotizacion">
				<form id="frmOrderBycotizacion" name="frmOrderBycotizacion">
					<div id="divOrderBycotizacionAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelcotizacion" name="frmOrderByRelcotizacion">
					<div id="divOrderByRelcotizacionAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycotizacion -->
		</tr> <!-- trOrderBycotizacion/super -->
			
		
		
		
		
		
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
			
				import {cotizacion_webcontrol,cotizacion_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/cotizacion/js/webcontrol/cotizacion_webcontrol.js?random=1';
				
				cotizacion_webcontrol1.setcotizacion_constante(window.cotizacion_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cotizacion_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

