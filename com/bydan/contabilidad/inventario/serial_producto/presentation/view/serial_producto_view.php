<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\serial_producto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Seriales Producto Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/serial_producto/util/serial_producto_carga.php');
	use com\bydan\contabilidad\inventario\serial_producto\util\serial_producto_carga;
	
	//include_once('com/bydan/contabilidad/inventario/serial_producto/presentation/view/serial_producto_web.php');
	//use com\bydan\contabilidad\inventario\serial_producto\presentation\view\serial_producto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	serial_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	serial_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$serial_producto_web1= new serial_producto_web();	
	$serial_producto_web1->cargarDatosGenerales();
	
	//$moduloActual=$serial_producto_web1->moduloActual;
	//$usuarioActual=$serial_producto_web1->usuarioActual;
	//$sessionBase=$serial_producto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$serial_producto_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/serial_producto/js/templating/serial_producto_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/serial_producto/js/templating/serial_producto_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/serial_producto/js/templating/serial_producto_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/serial_producto/js/templating/serial_producto_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			serial_producto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					serial_producto_web::$GET_POST=$_GET;
				} else {
					serial_producto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			serial_producto_web::$STR_NOMBRE_PAGINA = 'serial_producto_view.php';
			serial_producto_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			serial_producto_web::$BIT_ES_PAGINA_FORM = 'false';
				
			serial_producto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {serial_producto_constante,serial_producto_constante1} from './webroot/js/JavaScript/contabilidad/inventario/serial_producto/js/util/serial_producto_constante.js?random=1';
			import {serial_producto_funcion,serial_producto_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/serial_producto/js/util/serial_producto_funcion.js?random=1';
			
			let serial_producto_constante2 = new serial_producto_constante();
			
			serial_producto_constante2.STR_NOMBRE_PAGINA="<?php echo(serial_producto_web::$STR_NOMBRE_PAGINA); ?>";
			serial_producto_constante2.STR_TYPE_ON_LOADserial_producto="<?php echo(serial_producto_web::$STR_TYPE_ONLOAD); ?>";
			serial_producto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(serial_producto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			serial_producto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(serial_producto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			serial_producto_constante2.STR_ACTION="<?php echo(serial_producto_web::$STR_ACTION); ?>";
			serial_producto_constante2.STR_ES_POPUP="<?php echo(serial_producto_web::$STR_ES_POPUP); ?>";
			serial_producto_constante2.STR_ES_BUSQUEDA="<?php echo(serial_producto_web::$STR_ES_BUSQUEDA); ?>";
			serial_producto_constante2.STR_FUNCION_JS="<?php echo(serial_producto_web::$STR_FUNCION_JS); ?>";
			serial_producto_constante2.BIG_ID_ACTUAL="<?php echo(serial_producto_web::$BIG_ID_ACTUAL); ?>";
			serial_producto_constante2.BIG_ID_OPCION="<?php echo(serial_producto_web::$BIG_ID_OPCION); ?>";
			serial_producto_constante2.STR_OBJETO_JS="<?php echo(serial_producto_web::$STR_OBJETO_JS); ?>";
			serial_producto_constante2.STR_ES_RELACIONES="<?php echo(serial_producto_web::$STR_ES_RELACIONES); ?>";
			serial_producto_constante2.STR_ES_RELACIONADO="<?php echo(serial_producto_web::$STR_ES_RELACIONADO); ?>";
			serial_producto_constante2.STR_ES_SUB_PAGINA="<?php echo(serial_producto_web::$STR_ES_SUB_PAGINA); ?>";
			serial_producto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(serial_producto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			serial_producto_constante2.BIT_ES_PAGINA_FORM=<?php echo(serial_producto_web::$BIT_ES_PAGINA_FORM); ?>;
			serial_producto_constante2.STR_SUFIJO="<?php echo(serial_producto_web::$STR_SUF); ?>";//serial_producto
			serial_producto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(serial_producto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//serial_producto
			
			serial_producto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(serial_producto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			serial_producto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($serial_producto_web1->moduloActual->getnombre()); ?>";
			serial_producto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(serial_producto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			serial_producto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*serial_producto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			serial_producto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.serial_producto_constante2 = serial_producto_constante2;
			
		</script>
		
		<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.serial_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.serial_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="serial_productoActual" ></a>
	
	<div id="divResumenserial_productoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(serial_producto_web::$STR_ES_BUSQUEDA=='false' && serial_producto_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(serial_producto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false' && serial_producto_web::$STR_ES_POPUP=='false' && serial_producto_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdserial_productoNuevoToolBar">
										<img id="imgNuevoToolBarserial_producto" name="imgNuevoToolBarserial_producto" title="Nuevo Seriales Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(serial_producto_web::$STR_ES_BUSQUEDA=='false' && serial_producto_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdserial_productoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarserial_producto" name="imgNuevoGuardarCambiosToolBarserial_producto" title="Nuevo TABLA Seriales Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(serial_producto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdserial_productoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarserial_producto" name="imgGuardarCambiosToolBarserial_producto" title="Guardar Seriales Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false' && serial_producto_web::$STR_ES_RELACIONES=='false' && serial_producto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdserial_productoCopiarToolBar">
										<img id="imgCopiarToolBarserial_producto" name="imgCopiarToolBarserial_producto" title="Copiar Seriales Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdserial_productoDuplicarToolBar">
										<img id="imgDuplicarToolBarserial_producto" name="imgDuplicarToolBarserial_producto" title="Duplicar Seriales Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdserial_productoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarserial_producto" name="imgRecargarInformacionToolBarserial_producto" title="Recargar Seriales Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdserial_productoAnterioresToolBar">
										<img id="imgAnterioresToolBarserial_producto" name="imgAnterioresToolBarserial_producto" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdserial_productoSiguientesToolBar">
										<img id="imgSiguientesToolBarserial_producto" name="imgSiguientesToolBarserial_producto" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdserial_productoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarserial_producto" name="imgAbrirOrderByToolBarserial_producto" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((serial_producto_web::$STR_ES_RELACIONADO=='false' && serial_producto_web::$STR_ES_RELACIONES=='false') || serial_producto_web::$STR_ES_BUSQUEDA=='true'  || serial_producto_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdserial_productoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarserial_producto" name="imgCerrarPaginaToolBarserial_producto" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trserial_productoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaserial_producto" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaserial_producto',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trserial_productoCabeceraBusquedas/super -->

		<tr id="trBusquedaserial_producto" class="busqueda" style="display:table-row">
			<td id="tdBusquedaserial_producto" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaserial_producto" name="frmBusquedaserial_producto">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaserial_producto" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trserial_productoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
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
							<input type="button" id="btnBuscarserial_productoFK_Idbodega" name="btnBuscarserial_productoFK_Idbodega" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarserial_productoFK_Idproducto" name="btnBuscarserial_productoFK_Idproducto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarserial_producto" style="display:table-row">
					<td id="tdParamsBuscarserial_producto">
		<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarserial_producto">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosserial_producto" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosserial_producto"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosserial_producto" name="ParamsBuscar-txtNumeroRegistrosserial_producto" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionserial_producto">
							<td id="tdGenerarReporteserial_producto" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosserial_producto" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosserial_producto" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionserial_producto" name="btnRecargarInformacionserial_producto" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaserial_producto" name="btnImprimirPaginaserial_producto" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*serial_producto_web::$STR_ES_BUSQUEDA=='false'  &&*/ serial_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByserial_producto">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByserial_producto" name="btnOrderByserial_producto" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(serial_producto_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdserial_productoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosserial_producto -->

							</td><!-- tdGenerarReporteserial_producto -->
						</tr><!-- trRecargarInformacionserial_producto -->
					</table><!-- tblParamsBuscarNumeroRegistrosserial_producto -->
				</div> <!-- divParamsBuscarserial_producto -->
		<?php } ?>
				</td> <!-- tdParamsBuscarserial_producto -->
				</tr><!-- trParamsBuscarserial_producto -->
				</table> <!-- tblBusquedaserial_producto -->
				</form> <!-- frmBusquedaserial_producto -->
				

			</td> <!-- tdBusquedaserial_producto -->
		</tr> <!-- trBusquedaserial_producto/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divserial_productoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblserial_productoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmserial_productoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnserial_productoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="serial_producto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnserial_productoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmserial_productoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblserial_productoPopupAjaxWebPart -->
		</div> <!-- divserial_productoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trserial_productoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaserial_producto"></a>
		<img id="imgTablaParaDerechaserial_producto" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaserial_producto'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaserial_producto" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaserial_producto'"/>
		<a id="TablaDerechaserial_producto"></a>
	</td>
</tr> <!-- trserial_productoTablaNavegacion/super -->
<?php } ?>

<tr id="trserial_productoTablaDatos">
	<td colspan="3" id="htmlTableCellserial_producto">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosserial_productosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trserial_productoTablaDatos/super -->
		
		
		<tr id="trserial_productoPaginacion" style="display:table-row">
			<td id="tdserial_productoPaginacion" align="left">
				<div id="divserial_productoPaginacionAjaxWebPart">
				<form id="frmPaginacionserial_producto" name="frmPaginacionserial_producto">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionserial_producto" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(serial_producto_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkserial_producto" name="btnSeleccionarLoteFkserial_producto" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false' /*&& serial_producto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresserial_producto" name="btnAnterioresserial_producto" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(serial_producto_web::$STR_ES_BUSQUEDA=='false' && serial_producto_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdserial_productoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararserial_producto" name="btnNuevoTablaPrepararserial_producto" title="NUEVO Seriales Producto" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaserial_producto" name="ParamsPaginar-txtNumeroNuevoTablaserial_producto" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(serial_producto_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdserial_productoConEditarserial_producto">
							<label>
								<input id="ParamsBuscar-chbConEditarserial_producto" name="ParamsBuscar-chbConEditarserial_producto" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false'/* && serial_producto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesserial_producto" name="btnSiguientesserial_producto" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionserial_producto -->
				</form> <!-- frmPaginacionserial_producto -->
				<form id="frmNuevoPrepararserial_producto" name="frmNuevoPrepararserial_producto">
				<table id="tblNuevoPrepararserial_producto" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trserial_productoNuevo" height="10">
						<?php if(serial_producto_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdserial_productoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararserial_producto" name="btnNuevoPrepararserial_producto" title="NUEVO Seriales Producto" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdserial_productoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosserial_producto" name="btnGuardarCambiosserial_producto" title="GUARDAR Seriales Producto" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false' && serial_producto_web::$STR_ES_RELACIONES=='false' && serial_producto_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdserial_productoDuplicar" align="center">
							<input type="button" id="btnDuplicarserial_producto" name="btnDuplicarserial_producto" title="DUPLICAR Seriales Producto" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdserial_productoCopiar" align="center">
							<input type="button" id="btnCopiarserial_producto" name="btnCopiarserial_producto" title="COPIAR Seriales Producto" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false' && ((serial_producto_web::$STR_ES_RELACIONADO=='false' && serial_producto_web::$STR_ES_RELACIONES=='false') || serial_producto_web::$STR_ES_BUSQUEDA=='true'  || serial_producto_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdserial_productoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaserial_producto" name="btnCerrarPaginaserial_producto" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararserial_producto -->
				</form> <!-- frmNuevoPrepararserial_producto -->
				</div> <!-- divserial_productoPaginacionAjaxWebPart -->
			</td> <!-- tdserial_productoPaginacion -->
		</tr> <!-- trserial_productoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesserial_productoAjaxWebPart">
			<td id="tdAccionesRelacionesserial_productoAjaxWebPart">
				<div id="divAccionesRelacionesserial_productoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesserial_productoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesserial_productoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByserial_producto">
			<td id="tdOrderByserial_producto">
				<form id="frmOrderByserial_producto" name="frmOrderByserial_producto">
					<div id="divOrderByserial_productoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByserial_producto -->
		</tr> <!-- trOrderByserial_producto/super -->
			
		
		
		
		
		
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
			
				import {serial_producto_webcontrol,serial_producto_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/serial_producto/js/webcontrol/serial_producto_webcontrol.js?random=1';
				
				serial_producto_webcontrol1.setserial_producto_constante(window.serial_producto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(serial_producto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

