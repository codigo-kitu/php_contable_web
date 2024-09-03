<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\lote_producto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Lotes Producto Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/lote_producto/util/lote_producto_carga.php');
	use com\bydan\contabilidad\inventario\lote_producto\util\lote_producto_carga;
	
	//include_once('com/bydan/contabilidad/inventario/lote_producto/presentation/view/lote_producto_web.php');
	//use com\bydan\contabilidad\inventario\lote_producto\presentation\view\lote_producto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	lote_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	lote_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$lote_producto_web1= new lote_producto_web();	
	$lote_producto_web1->cargarDatosGenerales();
	
	//$moduloActual=$lote_producto_web1->moduloActual;
	//$usuarioActual=$lote_producto_web1->usuarioActual;
	//$sessionBase=$lote_producto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$lote_producto_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lote_producto/js/templating/lote_producto_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lote_producto/js/templating/lote_producto_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lote_producto/js/templating/lote_producto_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lote_producto/js/templating/lote_producto_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/lote_producto/js/templating/lote_producto_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			lote_producto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					lote_producto_web::$GET_POST=$_GET;
				} else {
					lote_producto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			lote_producto_web::$STR_NOMBRE_PAGINA = 'lote_producto_view.php';
			lote_producto_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			lote_producto_web::$BIT_ES_PAGINA_FORM = 'false';
				
			lote_producto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {lote_producto_constante,lote_producto_constante1} from './webroot/js/JavaScript/contabilidad/inventario/lote_producto/js/util/lote_producto_constante.js?random=1';
			import {lote_producto_funcion,lote_producto_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/lote_producto/js/util/lote_producto_funcion.js?random=1';
			
			let lote_producto_constante2 = new lote_producto_constante();
			
			lote_producto_constante2.STR_NOMBRE_PAGINA="<?php echo(lote_producto_web::$STR_NOMBRE_PAGINA); ?>";
			lote_producto_constante2.STR_TYPE_ON_LOADlote_producto="<?php echo(lote_producto_web::$STR_TYPE_ONLOAD); ?>";
			lote_producto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(lote_producto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			lote_producto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(lote_producto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			lote_producto_constante2.STR_ACTION="<?php echo(lote_producto_web::$STR_ACTION); ?>";
			lote_producto_constante2.STR_ES_POPUP="<?php echo(lote_producto_web::$STR_ES_POPUP); ?>";
			lote_producto_constante2.STR_ES_BUSQUEDA="<?php echo(lote_producto_web::$STR_ES_BUSQUEDA); ?>";
			lote_producto_constante2.STR_FUNCION_JS="<?php echo(lote_producto_web::$STR_FUNCION_JS); ?>";
			lote_producto_constante2.BIG_ID_ACTUAL="<?php echo(lote_producto_web::$BIG_ID_ACTUAL); ?>";
			lote_producto_constante2.BIG_ID_OPCION="<?php echo(lote_producto_web::$BIG_ID_OPCION); ?>";
			lote_producto_constante2.STR_OBJETO_JS="<?php echo(lote_producto_web::$STR_OBJETO_JS); ?>";
			lote_producto_constante2.STR_ES_RELACIONES="<?php echo(lote_producto_web::$STR_ES_RELACIONES); ?>";
			lote_producto_constante2.STR_ES_RELACIONADO="<?php echo(lote_producto_web::$STR_ES_RELACIONADO); ?>";
			lote_producto_constante2.STR_ES_SUB_PAGINA="<?php echo(lote_producto_web::$STR_ES_SUB_PAGINA); ?>";
			lote_producto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(lote_producto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			lote_producto_constante2.BIT_ES_PAGINA_FORM=<?php echo(lote_producto_web::$BIT_ES_PAGINA_FORM); ?>;
			lote_producto_constante2.STR_SUFIJO="<?php echo(lote_producto_web::$STR_SUF); ?>";//lote_producto
			lote_producto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(lote_producto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//lote_producto
			
			lote_producto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(lote_producto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			lote_producto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($lote_producto_web1->moduloActual->getnombre()); ?>";
			lote_producto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(lote_producto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			lote_producto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*lote_producto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			lote_producto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.lote_producto_constante2 = lote_producto_constante2;
			
		</script>
		
		<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.lote_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.lote_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="lote_productoActual" ></a>
	
	<div id="divResumenlote_productoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(lote_producto_web::$STR_ES_BUSQUEDA=='false' && lote_producto_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(lote_producto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false' && lote_producto_web::$STR_ES_POPUP=='false' && lote_producto_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdlote_productoNuevoToolBar">
										<img id="imgNuevoToolBarlote_producto" name="imgNuevoToolBarlote_producto" title="Nuevo Lotes Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(lote_producto_web::$STR_ES_BUSQUEDA=='false' && lote_producto_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdlote_productoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarlote_producto" name="imgNuevoGuardarCambiosToolBarlote_producto" title="Nuevo TABLA Lotes Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(lote_producto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdlote_productoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarlote_producto" name="imgGuardarCambiosToolBarlote_producto" title="Guardar Lotes Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false' && lote_producto_web::$STR_ES_RELACIONES=='false' && lote_producto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdlote_productoCopiarToolBar">
										<img id="imgCopiarToolBarlote_producto" name="imgCopiarToolBarlote_producto" title="Copiar Lotes Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdlote_productoDuplicarToolBar">
										<img id="imgDuplicarToolBarlote_producto" name="imgDuplicarToolBarlote_producto" title="Duplicar Lotes Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdlote_productoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarlote_producto" name="imgRecargarInformacionToolBarlote_producto" title="Recargar Lotes Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdlote_productoAnterioresToolBar">
										<img id="imgAnterioresToolBarlote_producto" name="imgAnterioresToolBarlote_producto" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdlote_productoSiguientesToolBar">
										<img id="imgSiguientesToolBarlote_producto" name="imgSiguientesToolBarlote_producto" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdlote_productoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarlote_producto" name="imgAbrirOrderByToolBarlote_producto" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((lote_producto_web::$STR_ES_RELACIONADO=='false' && lote_producto_web::$STR_ES_RELACIONES=='false') || lote_producto_web::$STR_ES_BUSQUEDA=='true'  || lote_producto_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdlote_productoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarlote_producto" name="imgCerrarPaginaToolBarlote_producto" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trlote_productoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedalote_producto" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedalote_producto',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trlote_productoCabeceraBusquedas/super -->

		<tr id="trBusquedalote_producto" class="busqueda" style="display:table-row">
			<td id="tdBusquedalote_producto" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedalote_producto" name="frmBusquedalote_producto">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedalote_producto" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trlote_productoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idbodega" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idbodega"> Por Bodega</a></li>
						<li id="listrVisibleFK_Idproducto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproducto"> Por Producto</a></li>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por Proveedor</a></li>
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
							<input type="button" id="btnBuscarlote_productoFK_Idbodega" name="btnBuscarlote_productoFK_Idbodega" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarlote_productoFK_Idproducto" name="btnBuscarlote_productoFK_Idproducto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
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
							<input type="button" id="btnBuscarlote_productoFK_Idproveedor" name="btnBuscarlote_productoFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarlote_producto" style="display:table-row">
					<td id="tdParamsBuscarlote_producto">
		<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarlote_producto">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroslote_producto" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroslote_producto"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroslote_producto" name="ParamsBuscar-txtNumeroRegistroslote_producto" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionlote_producto">
							<td id="tdGenerarReportelote_producto" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoslote_producto" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoslote_producto" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionlote_producto" name="btnRecargarInformacionlote_producto" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginalote_producto" name="btnImprimirPaginalote_producto" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*lote_producto_web::$STR_ES_BUSQUEDA=='false'  &&*/ lote_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBylote_producto">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBylote_producto" name="btnOrderBylote_producto" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRellote_producto" name="btnOrderByRellote_producto" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(lote_producto_web::$STR_ES_RELACIONES=='false' && lote_producto_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(lote_producto_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdlote_productoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoslote_producto -->

							</td><!-- tdGenerarReportelote_producto -->
						</tr><!-- trRecargarInformacionlote_producto -->
					</table><!-- tblParamsBuscarNumeroRegistroslote_producto -->
				</div> <!-- divParamsBuscarlote_producto -->
		<?php } ?>
				</td> <!-- tdParamsBuscarlote_producto -->
				</tr><!-- trParamsBuscarlote_producto -->
				</table> <!-- tblBusquedalote_producto -->
				</form> <!-- frmBusquedalote_producto -->
				

			</td> <!-- tdBusquedalote_producto -->
		</tr> <!-- trBusquedalote_producto/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divlote_productoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbllote_productoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmlote_productoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnlote_productoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="lote_producto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnlote_productoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmlote_productoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbllote_productoPopupAjaxWebPart -->
		</div> <!-- divlote_productoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trlote_productoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdalote_producto"></a>
		<img id="imgTablaParaDerechalote_producto" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechalote_producto'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdalote_producto" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdalote_producto'"/>
		<a id="TablaDerechalote_producto"></a>
	</td>
</tr> <!-- trlote_productoTablaNavegacion/super -->
<?php } ?>

<tr id="trlote_productoTablaDatos">
	<td colspan="3" id="htmlTableCelllote_producto">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoslote_productosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trlote_productoTablaDatos/super -->
		
		
		<tr id="trlote_productoPaginacion" style="display:table-row">
			<td id="tdlote_productoPaginacion" align="left">
				<div id="divlote_productoPaginacionAjaxWebPart">
				<form id="frmPaginacionlote_producto" name="frmPaginacionlote_producto">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionlote_producto" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(lote_producto_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFklote_producto" name="btnSeleccionarLoteFklote_producto" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false' /*&& lote_producto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioreslote_producto" name="btnAnterioreslote_producto" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(lote_producto_web::$STR_ES_BUSQUEDA=='false' && lote_producto_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdlote_productoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararlote_producto" name="btnNuevoTablaPrepararlote_producto" title="NUEVO Lotes Producto" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablalote_producto" name="ParamsPaginar-txtNumeroNuevoTablalote_producto" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(lote_producto_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdlote_productoConEditarlote_producto">
							<label>
								<input id="ParamsBuscar-chbConEditarlote_producto" name="ParamsBuscar-chbConEditarlote_producto" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false'/* && lote_producto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguienteslote_producto" name="btnSiguienteslote_producto" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionlote_producto -->
				</form> <!-- frmPaginacionlote_producto -->
				<form id="frmNuevoPrepararlote_producto" name="frmNuevoPrepararlote_producto">
				<table id="tblNuevoPrepararlote_producto" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trlote_productoNuevo" height="10">
						<?php if(lote_producto_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdlote_productoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararlote_producto" name="btnNuevoPrepararlote_producto" title="NUEVO Lotes Producto" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdlote_productoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioslote_producto" name="btnGuardarCambioslote_producto" title="GUARDAR Lotes Producto" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false' && lote_producto_web::$STR_ES_RELACIONES=='false' && lote_producto_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdlote_productoDuplicar" align="center">
							<input type="button" id="btnDuplicarlote_producto" name="btnDuplicarlote_producto" title="DUPLICAR Lotes Producto" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdlote_productoCopiar" align="center">
							<input type="button" id="btnCopiarlote_producto" name="btnCopiarlote_producto" title="COPIAR Lotes Producto" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false' && ((lote_producto_web::$STR_ES_RELACIONADO=='false' && lote_producto_web::$STR_ES_RELACIONES=='false') || lote_producto_web::$STR_ES_BUSQUEDA=='true'  || lote_producto_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdlote_productoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginalote_producto" name="btnCerrarPaginalote_producto" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararlote_producto -->
				</form> <!-- frmNuevoPrepararlote_producto -->
				</div> <!-- divlote_productoPaginacionAjaxWebPart -->
			</td> <!-- tdlote_productoPaginacion -->
		</tr> <!-- trlote_productoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacioneslote_productoAjaxWebPart">
			<td id="tdAccionesRelacioneslote_productoAjaxWebPart">
				<div id="divAccionesRelacioneslote_productoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacioneslote_productoAjaxWebPart -->
		</tr> <!-- trAccionesRelacioneslote_productoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBylote_producto">
			<td id="tdOrderBylote_producto">
				<form id="frmOrderBylote_producto" name="frmOrderBylote_producto">
					<div id="divOrderBylote_productoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRellote_producto" name="frmOrderByRellote_producto">
					<div id="divOrderByRellote_productoAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBylote_producto -->
		</tr> <!-- trOrderBylote_producto/super -->
			
		
		
		
		
		
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
			
				import {lote_producto_webcontrol,lote_producto_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/lote_producto/js/webcontrol/lote_producto_webcontrol.js?random=1';
				
				lote_producto_webcontrol1.setlote_producto_constante(window.lote_producto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(lote_producto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

