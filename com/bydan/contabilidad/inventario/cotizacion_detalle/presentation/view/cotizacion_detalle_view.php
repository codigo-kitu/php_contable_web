<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cotizacion Detalle Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/cotizacion_detalle/util/cotizacion_detalle_carga.php');
	use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_carga;
	
	//include_once('com/bydan/contabilidad/inventario/cotizacion_detalle/presentation/view/cotizacion_detalle_web.php');
	//use com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\view\cotizacion_detalle_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cotizacion_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cotizacion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cotizacion_detalle_web1= new cotizacion_detalle_web();	
	$cotizacion_detalle_web1->cargarDatosGenerales();
	
	//$moduloActual=$cotizacion_detalle_web1->moduloActual;
	//$usuarioActual=$cotizacion_detalle_web1->usuarioActual;
	//$sessionBase=$cotizacion_detalle_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cotizacion_detalle_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/cotizacion_detalle/js/templating/cotizacion_detalle_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/cotizacion_detalle/js/templating/cotizacion_detalle_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/cotizacion_detalle/js/templating/cotizacion_detalle_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/cotizacion_detalle/js/templating/cotizacion_detalle_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			cotizacion_detalle_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cotizacion_detalle_web::$GET_POST=$_GET;
				} else {
					cotizacion_detalle_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cotizacion_detalle_web::$STR_NOMBRE_PAGINA = 'cotizacion_detalle_view.php';
			cotizacion_detalle_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			cotizacion_detalle_web::$BIT_ES_PAGINA_FORM = 'false';
				
			cotizacion_detalle_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cotizacion_detalle_constante,cotizacion_detalle_constante1} from './webroot/js/JavaScript/contabilidad/inventario/cotizacion_detalle/js/util/cotizacion_detalle_constante.js?random=1';
			import {cotizacion_detalle_funcion,cotizacion_detalle_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/cotizacion_detalle/js/util/cotizacion_detalle_funcion.js?random=1';
			
			let cotizacion_detalle_constante2 = new cotizacion_detalle_constante();
			
			cotizacion_detalle_constante2.STR_NOMBRE_PAGINA="<?php echo(cotizacion_detalle_web::$STR_NOMBRE_PAGINA); ?>";
			cotizacion_detalle_constante2.STR_TYPE_ON_LOADcotizacion_detalle="<?php echo(cotizacion_detalle_web::$STR_TYPE_ONLOAD); ?>";
			cotizacion_detalle_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cotizacion_detalle_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cotizacion_detalle_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cotizacion_detalle_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cotizacion_detalle_constante2.STR_ACTION="<?php echo(cotizacion_detalle_web::$STR_ACTION); ?>";
			cotizacion_detalle_constante2.STR_ES_POPUP="<?php echo(cotizacion_detalle_web::$STR_ES_POPUP); ?>";
			cotizacion_detalle_constante2.STR_ES_BUSQUEDA="<?php echo(cotizacion_detalle_web::$STR_ES_BUSQUEDA); ?>";
			cotizacion_detalle_constante2.STR_FUNCION_JS="<?php echo(cotizacion_detalle_web::$STR_FUNCION_JS); ?>";
			cotizacion_detalle_constante2.BIG_ID_ACTUAL="<?php echo(cotizacion_detalle_web::$BIG_ID_ACTUAL); ?>";
			cotizacion_detalle_constante2.BIG_ID_OPCION="<?php echo(cotizacion_detalle_web::$BIG_ID_OPCION); ?>";
			cotizacion_detalle_constante2.STR_OBJETO_JS="<?php echo(cotizacion_detalle_web::$STR_OBJETO_JS); ?>";
			cotizacion_detalle_constante2.STR_ES_RELACIONES="<?php echo(cotizacion_detalle_web::$STR_ES_RELACIONES); ?>";
			cotizacion_detalle_constante2.STR_ES_RELACIONADO="<?php echo(cotizacion_detalle_web::$STR_ES_RELACIONADO); ?>";
			cotizacion_detalle_constante2.STR_ES_SUB_PAGINA="<?php echo(cotizacion_detalle_web::$STR_ES_SUB_PAGINA); ?>";
			cotizacion_detalle_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cotizacion_detalle_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cotizacion_detalle_constante2.BIT_ES_PAGINA_FORM=<?php echo(cotizacion_detalle_web::$BIT_ES_PAGINA_FORM); ?>;
			cotizacion_detalle_constante2.STR_SUFIJO="<?php echo(cotizacion_detalle_web::$STR_SUF); ?>";//cotizacion_detalle
			cotizacion_detalle_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cotizacion_detalle_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cotizacion_detalle
			
			cotizacion_detalle_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cotizacion_detalle_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cotizacion_detalle_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cotizacion_detalle_web1->moduloActual->getnombre()); ?>";
			cotizacion_detalle_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cotizacion_detalle_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cotizacion_detalle_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cotizacion_detalle_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cotizacion_detalle_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cotizacion_detalle_constante2 = cotizacion_detalle_constante2;
			
		</script>
		
		<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cotizacion_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cotizacion_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cotizacion_detalleActual" ></a>
	
	<div id="divResumencotizacion_detalleActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(cotizacion_detalle_web::$STR_ES_BUSQUEDA=='false' && cotizacion_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cotizacion_detalle_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' && cotizacion_detalle_web::$STR_ES_POPUP=='false' && cotizacion_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcotizacion_detalleNuevoToolBar">
										<img id="imgNuevoToolBarcotizacion_detalle" name="imgNuevoToolBarcotizacion_detalle" title="Nuevo Cotizacion Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(cotizacion_detalle_web::$STR_ES_BUSQUEDA=='false' && cotizacion_detalle_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcotizacion_detalleNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcotizacion_detalle" name="imgNuevoGuardarCambiosToolBarcotizacion_detalle" title="Nuevo TABLA Cotizacion Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cotizacion_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcotizacion_detalleGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcotizacion_detalle" name="imgGuardarCambiosToolBarcotizacion_detalle" title="Guardar Cotizacion Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' && cotizacion_detalle_web::$STR_ES_RELACIONES=='false' && cotizacion_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcotizacion_detalleCopiarToolBar">
										<img id="imgCopiarToolBarcotizacion_detalle" name="imgCopiarToolBarcotizacion_detalle" title="Copiar Cotizacion Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcotizacion_detalleDuplicarToolBar">
										<img id="imgDuplicarToolBarcotizacion_detalle" name="imgDuplicarToolBarcotizacion_detalle" title="Duplicar Cotizacion Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcotizacion_detalleRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcotizacion_detalle" name="imgRecargarInformacionToolBarcotizacion_detalle" title="Recargar Cotizacion Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcotizacion_detalleAnterioresToolBar">
										<img id="imgAnterioresToolBarcotizacion_detalle" name="imgAnterioresToolBarcotizacion_detalle" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcotizacion_detalleSiguientesToolBar">
										<img id="imgSiguientesToolBarcotizacion_detalle" name="imgSiguientesToolBarcotizacion_detalle" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcotizacion_detalleAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcotizacion_detalle" name="imgAbrirOrderByToolBarcotizacion_detalle" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' && cotizacion_detalle_web::$STR_ES_RELACIONES=='false') || cotizacion_detalle_web::$STR_ES_BUSQUEDA=='true'  || cotizacion_detalle_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcotizacion_detalleCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcotizacion_detalle" name="imgCerrarPaginaToolBarcotizacion_detalle" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcotizacion_detalleCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacotizacion_detalle" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacotizacion_detalle',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcotizacion_detalleCabeceraBusquedas/super -->

		<tr id="trBusquedacotizacion_detalle" class="busqueda" style="display:table-row">
			<td id="tdBusquedacotizacion_detalle" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacotizacion_detalle" name="frmBusquedacotizacion_detalle">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacotizacion_detalle" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcotizacion_detalleBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleFK_Idbodega" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idbodega"> Por Bodega</a></li>
						<li id="listrVisibleFK_Idcotizacion" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcotizacion"> Por Cotizacion</a></li>
						<li id="listrVisibleFK_Idotro_suplidor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idotro_suplidor"> Por Otro Suplidor</a></li>
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
							<input type="button" id="btnBuscarcotizacion_detalleFK_Idbodega" name="btnBuscarcotizacion_detalleFK_Idbodega" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcotizacion">
					<table id="tblstrVisibleFK_Idcotizacion" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cotizacion</span>
						</td>
						<td align="center">
							<select id="FK_Idcotizacion-cmbid_cotizacion" name="FK_Idcotizacion-cmbid_cotizacion" title="Cotizacion" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcotizacion_detalleFK_Idcotizacion" name="btnBuscarcotizacion_detalleFK_Idcotizacion" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idotro_suplidor">
					<table id="tblstrVisibleFK_Idotro_suplidor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Otro Suplidor</span>
						</td>
						<td align="center">
							<select id="FK_Idotro_suplidor-cmbid_otro_suplidor" name="FK_Idotro_suplidor-cmbid_otro_suplidor" title="Otro Suplidor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcotizacion_detalleFK_Idotro_suplidor" name="btnBuscarcotizacion_detalleFK_Idotro_suplidor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarcotizacion_detalleFK_Idproducto" name="btnBuscarcotizacion_detalleFK_Idproducto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarcotizacion_detalleFK_Idunidad" name="btnBuscarcotizacion_detalleFK_Idunidad" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcotizacion_detalle" style="display:table-row">
					<td id="tdParamsBuscarcotizacion_detalle">
		<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcotizacion_detalle">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscotizacion_detalle" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscotizacion_detalle"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscotizacion_detalle" name="ParamsBuscar-txtNumeroRegistroscotizacion_detalle" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncotizacion_detalle">
							<td id="tdGenerarReportecotizacion_detalle" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscotizacion_detalle" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscotizacion_detalle" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncotizacion_detalle" name="btnRecargarInformacioncotizacion_detalle" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacotizacion_detalle" name="btnImprimirPaginacotizacion_detalle" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*cotizacion_detalle_web::$STR_ES_BUSQUEDA=='false'  &&*/ cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycotizacion_detalle">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycotizacion_detalle" name="btnOrderBycotizacion_detalle" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(cotizacion_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcotizacion_detalleConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscotizacion_detalle -->

							</td><!-- tdGenerarReportecotizacion_detalle -->
						</tr><!-- trRecargarInformacioncotizacion_detalle -->
					</table><!-- tblParamsBuscarNumeroRegistroscotizacion_detalle -->
				</div> <!-- divParamsBuscarcotizacion_detalle -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcotizacion_detalle -->
				</tr><!-- trParamsBuscarcotizacion_detalle -->
				</table> <!-- tblBusquedacotizacion_detalle -->
				</form> <!-- frmBusquedacotizacion_detalle -->
				

			</td> <!-- tdBusquedacotizacion_detalle -->
		</tr> <!-- trBusquedacotizacion_detalle/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcotizacion_detallePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcotizacion_detallePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcotizacion_detalleAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncotizacion_detalleAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cotizacion_detalle_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncotizacion_detalleAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcotizacion_detalleAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcotizacion_detallePopupAjaxWebPart -->
		</div> <!-- divcotizacion_detallePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcotizacion_detalleTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacotizacion_detalle"></a>
		<img id="imgTablaParaDerechacotizacion_detalle" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacotizacion_detalle'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacotizacion_detalle" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacotizacion_detalle'"/>
		<a id="TablaDerechacotizacion_detalle"></a>
	</td>
</tr> <!-- trcotizacion_detalleTablaNavegacion/super -->
<?php } ?>

<tr id="trcotizacion_detalleTablaDatos">
	<td colspan="3" id="htmlTableCellcotizacion_detalle">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscotizacion_detallesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcotizacion_detalleTablaDatos/super -->
		
		
		<tr id="trcotizacion_detallePaginacion" style="display:table-row">
			<td id="tdcotizacion_detallePaginacion" align="left">
				<div id="divcotizacion_detallePaginacionAjaxWebPart">
				<form id="frmPaginacioncotizacion_detalle" name="frmPaginacioncotizacion_detalle">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncotizacion_detalle" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(cotizacion_detalle_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcotizacion_detalle" name="btnSeleccionarLoteFkcotizacion_detalle" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' /*&& cotizacion_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescotizacion_detalle" name="btnAnteriorescotizacion_detalle" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(cotizacion_detalle_web::$STR_ES_BUSQUEDA=='false' && cotizacion_detalle_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcotizacion_detalleNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcotizacion_detalle" name="btnNuevoTablaPrepararcotizacion_detalle" title="NUEVO Cotizacion Detalle" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacotizacion_detalle" name="ParamsPaginar-txtNumeroNuevoTablacotizacion_detalle" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcotizacion_detalleConEditarcotizacion_detalle">
							<label>
								<input id="ParamsBuscar-chbConEditarcotizacion_detalle" name="ParamsBuscar-chbConEditarcotizacion_detalle" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false'/* && cotizacion_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescotizacion_detalle" name="btnSiguientescotizacion_detalle" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncotizacion_detalle -->
				</form> <!-- frmPaginacioncotizacion_detalle -->
				<form id="frmNuevoPrepararcotizacion_detalle" name="frmNuevoPrepararcotizacion_detalle">
				<table id="tblNuevoPrepararcotizacion_detalle" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trcotizacion_detalleNuevo" height="10">
						<?php if(cotizacion_detalle_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcotizacion_detalleNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcotizacion_detalle" name="btnNuevoPrepararcotizacion_detalle" title="NUEVO Cotizacion Detalle" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcotizacion_detalleGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscotizacion_detalle" name="btnGuardarCambioscotizacion_detalle" title="GUARDAR Cotizacion Detalle" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' && cotizacion_detalle_web::$STR_ES_RELACIONES=='false' && cotizacion_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcotizacion_detalleDuplicar" align="center">
							<input type="button" id="btnDuplicarcotizacion_detalle" name="btnDuplicarcotizacion_detalle" title="DUPLICAR Cotizacion Detalle" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcotizacion_detalleCopiar" align="center">
							<input type="button" id="btnCopiarcotizacion_detalle" name="btnCopiarcotizacion_detalle" title="COPIAR Cotizacion Detalle" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' && ((cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' && cotizacion_detalle_web::$STR_ES_RELACIONES=='false') || cotizacion_detalle_web::$STR_ES_BUSQUEDA=='true'  || cotizacion_detalle_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcotizacion_detalleCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacotizacion_detalle" name="btnCerrarPaginacotizacion_detalle" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcotizacion_detalle -->
				</form> <!-- frmNuevoPrepararcotizacion_detalle -->
				</div> <!-- divcotizacion_detallePaginacionAjaxWebPart -->
			</td> <!-- tdcotizacion_detallePaginacion -->
		</tr> <!-- trcotizacion_detallePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescotizacion_detalleAjaxWebPart">
			<td id="tdAccionesRelacionescotizacion_detalleAjaxWebPart">
				<div id="divAccionesRelacionescotizacion_detalleAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescotizacion_detalleAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescotizacion_detalleAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycotizacion_detalle">
			<td id="tdOrderBycotizacion_detalle">
				<form id="frmOrderBycotizacion_detalle" name="frmOrderBycotizacion_detalle">
					<div id="divOrderBycotizacion_detalleAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycotizacion_detalle -->
		</tr> <!-- trOrderBycotizacion_detalle/super -->
			
		
		
		
		
		
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
			
				import {cotizacion_detalle_webcontrol,cotizacion_detalle_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/cotizacion_detalle/js/webcontrol/cotizacion_detalle_webcontrol.js?random=1';
				
				cotizacion_detalle_webcontrol1.setcotizacion_detalle_constante(window.cotizacion_detalle_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cotizacion_detalle_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

