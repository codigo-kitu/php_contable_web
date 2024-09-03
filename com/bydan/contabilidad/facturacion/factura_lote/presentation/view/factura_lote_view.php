<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\factura_lote\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Facturas Lotes Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/factura_lote/util/factura_lote_carga.php');
	use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/factura_lote/presentation/view/factura_lote_web.php');
	//use com\bydan\contabilidad\facturacion\factura_lote\presentation\view\factura_lote_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	factura_lote_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	factura_lote_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$factura_lote_web1= new factura_lote_web();	
	$factura_lote_web1->cargarDatosGenerales();
	
	//$moduloActual=$factura_lote_web1->moduloActual;
	//$usuarioActual=$factura_lote_web1->usuarioActual;
	//$sessionBase=$factura_lote_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$factura_lote_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura_lote/js/templating/factura_lote_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura_lote/js/templating/factura_lote_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura_lote/js/templating/factura_lote_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura_lote/js/templating/factura_lote_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura_lote/js/templating/factura_lote_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			factura_lote_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					factura_lote_web::$GET_POST=$_GET;
				} else {
					factura_lote_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			factura_lote_web::$STR_NOMBRE_PAGINA = 'factura_lote_view.php';
			factura_lote_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			factura_lote_web::$BIT_ES_PAGINA_FORM = 'false';
				
			factura_lote_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {factura_lote_constante,factura_lote_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_lote/js/util/factura_lote_constante.js?random=1';
			import {factura_lote_funcion,factura_lote_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_lote/js/util/factura_lote_funcion.js?random=1';
			
			let factura_lote_constante2 = new factura_lote_constante();
			
			factura_lote_constante2.STR_NOMBRE_PAGINA="<?php echo(factura_lote_web::$STR_NOMBRE_PAGINA); ?>";
			factura_lote_constante2.STR_TYPE_ON_LOADfactura_lote="<?php echo(factura_lote_web::$STR_TYPE_ONLOAD); ?>";
			factura_lote_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(factura_lote_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			factura_lote_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(factura_lote_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			factura_lote_constante2.STR_ACTION="<?php echo(factura_lote_web::$STR_ACTION); ?>";
			factura_lote_constante2.STR_ES_POPUP="<?php echo(factura_lote_web::$STR_ES_POPUP); ?>";
			factura_lote_constante2.STR_ES_BUSQUEDA="<?php echo(factura_lote_web::$STR_ES_BUSQUEDA); ?>";
			factura_lote_constante2.STR_FUNCION_JS="<?php echo(factura_lote_web::$STR_FUNCION_JS); ?>";
			factura_lote_constante2.BIG_ID_ACTUAL="<?php echo(factura_lote_web::$BIG_ID_ACTUAL); ?>";
			factura_lote_constante2.BIG_ID_OPCION="<?php echo(factura_lote_web::$BIG_ID_OPCION); ?>";
			factura_lote_constante2.STR_OBJETO_JS="<?php echo(factura_lote_web::$STR_OBJETO_JS); ?>";
			factura_lote_constante2.STR_ES_RELACIONES="<?php echo(factura_lote_web::$STR_ES_RELACIONES); ?>";
			factura_lote_constante2.STR_ES_RELACIONADO="<?php echo(factura_lote_web::$STR_ES_RELACIONADO); ?>";
			factura_lote_constante2.STR_ES_SUB_PAGINA="<?php echo(factura_lote_web::$STR_ES_SUB_PAGINA); ?>";
			factura_lote_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(factura_lote_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			factura_lote_constante2.BIT_ES_PAGINA_FORM=<?php echo(factura_lote_web::$BIT_ES_PAGINA_FORM); ?>;
			factura_lote_constante2.STR_SUFIJO="<?php echo(factura_lote_web::$STR_SUF); ?>";//factura_lote
			factura_lote_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(factura_lote_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//factura_lote
			
			factura_lote_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(factura_lote_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			factura_lote_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($factura_lote_web1->moduloActual->getnombre()); ?>";
			factura_lote_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(factura_lote_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			factura_lote_constante2.BIT_ES_LOAD_NORMAL=true;
			/*factura_lote_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			factura_lote_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.factura_lote_constante2 = factura_lote_constante2;
			
		</script>
		
		<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.factura_lote_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.factura_lote_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="factura_loteActual" ></a>
	
	<div id="divResumenfactura_loteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(factura_lote_web::$STR_ES_BUSQUEDA=='false' && factura_lote_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(factura_lote_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false' && factura_lote_web::$STR_ES_POPUP=='false' && factura_lote_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdfactura_loteNuevoToolBar">
										<img id="imgNuevoToolBarfactura_lote" name="imgNuevoToolBarfactura_lote" title="Nuevo Facturas Lotes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(factura_lote_web::$STR_ES_BUSQUEDA=='false' && factura_lote_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdfactura_loteNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarfactura_lote" name="imgNuevoGuardarCambiosToolBarfactura_lote" title="Nuevo TABLA Facturas Lotes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(factura_lote_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdfactura_loteGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarfactura_lote" name="imgGuardarCambiosToolBarfactura_lote" title="Guardar Facturas Lotes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false' && factura_lote_web::$STR_ES_RELACIONES=='false' && factura_lote_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdfactura_loteCopiarToolBar">
										<img id="imgCopiarToolBarfactura_lote" name="imgCopiarToolBarfactura_lote" title="Copiar Facturas Lotes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdfactura_loteDuplicarToolBar">
										<img id="imgDuplicarToolBarfactura_lote" name="imgDuplicarToolBarfactura_lote" title="Duplicar Facturas Lotes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdfactura_loteRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarfactura_lote" name="imgRecargarInformacionToolBarfactura_lote" title="Recargar Facturas Lotes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdfactura_loteAnterioresToolBar">
										<img id="imgAnterioresToolBarfactura_lote" name="imgAnterioresToolBarfactura_lote" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdfactura_loteSiguientesToolBar">
										<img id="imgSiguientesToolBarfactura_lote" name="imgSiguientesToolBarfactura_lote" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdfactura_loteAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarfactura_lote" name="imgAbrirOrderByToolBarfactura_lote" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((factura_lote_web::$STR_ES_RELACIONADO=='false' && factura_lote_web::$STR_ES_RELACIONES=='false') || factura_lote_web::$STR_ES_BUSQUEDA=='true'  || factura_lote_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdfactura_loteCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarfactura_lote" name="imgCerrarPaginaToolBarfactura_lote" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trfactura_loteCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedafactura_lote" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedafactura_lote',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trfactura_loteCabeceraBusquedas/super -->

		<tr id="trBusquedafactura_lote" class="busqueda" style="display:table-row">
			<td id="tdBusquedafactura_lote" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedafactura_lote" name="frmBusquedafactura_lote">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedafactura_lote" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trfactura_loteBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false' ) {?>
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
							<input type="button" id="btnBuscarfactura_loteFK_Idasiento" name="btnBuscarfactura_loteFK_Idasiento" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarfactura_loteFK_Idcliente" name="btnBuscarfactura_loteFK_Idcliente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarfactura_loteFK_Iddocumento_cuenta_cobrar" name="btnBuscarfactura_loteFK_Iddocumento_cuenta_cobrar" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarfactura_loteFK_Idestado" name="btnBuscarfactura_loteFK_Idestado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarfactura_loteFK_Idkardex" name="btnBuscarfactura_loteFK_Idkardex" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarfactura_loteFK_Idmoneda" name="btnBuscarfactura_loteFK_Idmoneda" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<select id="FK_Idtermino_pago-cmbid_termino_pago" name="FK_Idtermino_pago-cmbid_termino_pago" title="Terminos Pago" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarfactura_loteFK_Idtermino_pago" name="btnBuscarfactura_loteFK_Idtermino_pago" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarfactura_loteFK_Idvendedor" name="btnBuscarfactura_loteFK_Idvendedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarfactura_lote" style="display:table-row">
					<td id="tdParamsBuscarfactura_lote">
		<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarfactura_lote">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosfactura_lote" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosfactura_lote"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosfactura_lote" name="ParamsBuscar-txtNumeroRegistrosfactura_lote" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionfactura_lote">
							<td id="tdGenerarReportefactura_lote" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosfactura_lote" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosfactura_lote" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionfactura_lote" name="btnRecargarInformacionfactura_lote" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginafactura_lote" name="btnImprimirPaginafactura_lote" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*factura_lote_web::$STR_ES_BUSQUEDA=='false'  &&*/ factura_lote_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByfactura_lote">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByfactura_lote" name="btnOrderByfactura_lote" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelfactura_lote" name="btnOrderByRelfactura_lote" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(factura_lote_web::$STR_ES_RELACIONES=='false' && factura_lote_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(factura_lote_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdfactura_loteConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosfactura_lote -->

							</td><!-- tdGenerarReportefactura_lote -->
						</tr><!-- trRecargarInformacionfactura_lote -->
					</table><!-- tblParamsBuscarNumeroRegistrosfactura_lote -->
				</div> <!-- divParamsBuscarfactura_lote -->
		<?php } ?>
				</td> <!-- tdParamsBuscarfactura_lote -->
				</tr><!-- trParamsBuscarfactura_lote -->
				</table> <!-- tblBusquedafactura_lote -->
				</form> <!-- frmBusquedafactura_lote -->
				

			</td> <!-- tdBusquedafactura_lote -->
		</tr> <!-- trBusquedafactura_lote/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divfactura_lotePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblfactura_lotePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmfactura_loteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnfactura_loteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="factura_lote_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnfactura_loteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmfactura_loteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblfactura_lotePopupAjaxWebPart -->
		</div> <!-- divfactura_lotePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trfactura_loteTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdafactura_lote"></a>
		<img id="imgTablaParaDerechafactura_lote" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechafactura_lote'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdafactura_lote" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdafactura_lote'"/>
		<a id="TablaDerechafactura_lote"></a>
	</td>
</tr> <!-- trfactura_loteTablaNavegacion/super -->
<?php } ?>

<tr id="trfactura_loteTablaDatos">
	<td colspan="3" id="htmlTableCellfactura_lote">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosfactura_lotesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trfactura_loteTablaDatos/super -->
		
		
		<tr id="trfactura_lotePaginacion" style="display:table-row">
			<td id="tdfactura_lotePaginacion" align="left">
				<div id="divfactura_lotePaginacionAjaxWebPart">
				<form id="frmPaginacionfactura_lote" name="frmPaginacionfactura_lote">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionfactura_lote" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(factura_lote_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkfactura_lote" name="btnSeleccionarLoteFkfactura_lote" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false' /*&& factura_lote_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresfactura_lote" name="btnAnterioresfactura_lote" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(factura_lote_web::$STR_ES_BUSQUEDA=='false' && factura_lote_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdfactura_loteNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararfactura_lote" name="btnNuevoTablaPrepararfactura_lote" title="NUEVO Facturas Lotes" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablafactura_lote" name="ParamsPaginar-txtNumeroNuevoTablafactura_lote" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(factura_lote_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdfactura_loteConEditarfactura_lote">
							<label>
								<input id="ParamsBuscar-chbConEditarfactura_lote" name="ParamsBuscar-chbConEditarfactura_lote" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false'/* && factura_lote_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesfactura_lote" name="btnSiguientesfactura_lote" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionfactura_lote -->
				</form> <!-- frmPaginacionfactura_lote -->
				<form id="frmNuevoPrepararfactura_lote" name="frmNuevoPrepararfactura_lote">
				<table id="tblNuevoPrepararfactura_lote" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trfactura_loteNuevo" height="10">
						<?php if(factura_lote_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdfactura_loteNuevo" align="center">
							<input type="button" id="btnNuevoPrepararfactura_lote" name="btnNuevoPrepararfactura_lote" title="NUEVO Facturas Lotes" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdfactura_loteGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosfactura_lote" name="btnGuardarCambiosfactura_lote" title="GUARDAR Facturas Lotes" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false' && factura_lote_web::$STR_ES_RELACIONES=='false' && factura_lote_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdfactura_loteDuplicar" align="center">
							<input type="button" id="btnDuplicarfactura_lote" name="btnDuplicarfactura_lote" title="DUPLICAR Facturas Lotes" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdfactura_loteCopiar" align="center">
							<input type="button" id="btnCopiarfactura_lote" name="btnCopiarfactura_lote" title="COPIAR Facturas Lotes" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false' && ((factura_lote_web::$STR_ES_RELACIONADO=='false' && factura_lote_web::$STR_ES_RELACIONES=='false') || factura_lote_web::$STR_ES_BUSQUEDA=='true'  || factura_lote_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdfactura_loteCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginafactura_lote" name="btnCerrarPaginafactura_lote" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararfactura_lote -->
				</form> <!-- frmNuevoPrepararfactura_lote -->
				</div> <!-- divfactura_lotePaginacionAjaxWebPart -->
			</td> <!-- tdfactura_lotePaginacion -->
		</tr> <!-- trfactura_lotePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesfactura_loteAjaxWebPart">
			<td id="tdAccionesRelacionesfactura_loteAjaxWebPart">
				<div id="divAccionesRelacionesfactura_loteAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesfactura_loteAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesfactura_loteAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByfactura_lote">
			<td id="tdOrderByfactura_lote">
				<form id="frmOrderByfactura_lote" name="frmOrderByfactura_lote">
					<div id="divOrderByfactura_loteAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelfactura_lote" name="frmOrderByRelfactura_lote">
					<div id="divOrderByRelfactura_loteAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByfactura_lote -->
		</tr> <!-- trOrderByfactura_lote/super -->
			
		
		
		
		
		
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
			
				import {factura_lote_webcontrol,factura_lote_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_lote/js/webcontrol/factura_lote_webcontrol.js?random=1';
				
				factura_lote_webcontrol1.setfactura_lote_constante(window.factura_lote_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(factura_lote_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

