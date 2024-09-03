<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\imagen_orden_compra\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Imagenes Orden Compra Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/imagen_orden_compra/util/imagen_orden_compra_carga.php');
	use com\bydan\contabilidad\inventario\imagen_orden_compra\util\imagen_orden_compra_carga;
	
	//include_once('com/bydan/contabilidad/inventario/imagen_orden_compra/presentation/view/imagen_orden_compra_web.php');
	//use com\bydan\contabilidad\inventario\imagen_orden_compra\presentation\view\imagen_orden_compra_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	imagen_orden_compra_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	imagen_orden_compra_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$imagen_orden_compra_web1= new imagen_orden_compra_web();	
	$imagen_orden_compra_web1->cargarDatosGenerales();
	
	//$moduloActual=$imagen_orden_compra_web1->moduloActual;
	//$usuarioActual=$imagen_orden_compra_web1->usuarioActual;
	//$sessionBase=$imagen_orden_compra_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$imagen_orden_compra_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/imagen_orden_compra/js/templating/imagen_orden_compra_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/imagen_orden_compra/js/templating/imagen_orden_compra_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/imagen_orden_compra/js/templating/imagen_orden_compra_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/imagen_orden_compra/js/templating/imagen_orden_compra_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			imagen_orden_compra_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					imagen_orden_compra_web::$GET_POST=$_GET;
				} else {
					imagen_orden_compra_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			imagen_orden_compra_web::$STR_NOMBRE_PAGINA = 'imagen_orden_compra_view.php';
			imagen_orden_compra_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			imagen_orden_compra_web::$BIT_ES_PAGINA_FORM = 'false';
				
			imagen_orden_compra_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {imagen_orden_compra_constante,imagen_orden_compra_constante1} from './webroot/js/JavaScript/contabilidad/inventario/imagen_orden_compra/js/util/imagen_orden_compra_constante.js?random=1';
			import {imagen_orden_compra_funcion,imagen_orden_compra_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/imagen_orden_compra/js/util/imagen_orden_compra_funcion.js?random=1';
			
			let imagen_orden_compra_constante2 = new imagen_orden_compra_constante();
			
			imagen_orden_compra_constante2.STR_NOMBRE_PAGINA="<?php echo(imagen_orden_compra_web::$STR_NOMBRE_PAGINA); ?>";
			imagen_orden_compra_constante2.STR_TYPE_ON_LOADimagen_orden_compra="<?php echo(imagen_orden_compra_web::$STR_TYPE_ONLOAD); ?>";
			imagen_orden_compra_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(imagen_orden_compra_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			imagen_orden_compra_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(imagen_orden_compra_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			imagen_orden_compra_constante2.STR_ACTION="<?php echo(imagen_orden_compra_web::$STR_ACTION); ?>";
			imagen_orden_compra_constante2.STR_ES_POPUP="<?php echo(imagen_orden_compra_web::$STR_ES_POPUP); ?>";
			imagen_orden_compra_constante2.STR_ES_BUSQUEDA="<?php echo(imagen_orden_compra_web::$STR_ES_BUSQUEDA); ?>";
			imagen_orden_compra_constante2.STR_FUNCION_JS="<?php echo(imagen_orden_compra_web::$STR_FUNCION_JS); ?>";
			imagen_orden_compra_constante2.BIG_ID_ACTUAL="<?php echo(imagen_orden_compra_web::$BIG_ID_ACTUAL); ?>";
			imagen_orden_compra_constante2.BIG_ID_OPCION="<?php echo(imagen_orden_compra_web::$BIG_ID_OPCION); ?>";
			imagen_orden_compra_constante2.STR_OBJETO_JS="<?php echo(imagen_orden_compra_web::$STR_OBJETO_JS); ?>";
			imagen_orden_compra_constante2.STR_ES_RELACIONES="<?php echo(imagen_orden_compra_web::$STR_ES_RELACIONES); ?>";
			imagen_orden_compra_constante2.STR_ES_RELACIONADO="<?php echo(imagen_orden_compra_web::$STR_ES_RELACIONADO); ?>";
			imagen_orden_compra_constante2.STR_ES_SUB_PAGINA="<?php echo(imagen_orden_compra_web::$STR_ES_SUB_PAGINA); ?>";
			imagen_orden_compra_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(imagen_orden_compra_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			imagen_orden_compra_constante2.BIT_ES_PAGINA_FORM=<?php echo(imagen_orden_compra_web::$BIT_ES_PAGINA_FORM); ?>;
			imagen_orden_compra_constante2.STR_SUFIJO="<?php echo(imagen_orden_compra_web::$STR_SUF); ?>";//imagen_orden_compra
			imagen_orden_compra_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(imagen_orden_compra_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//imagen_orden_compra
			
			imagen_orden_compra_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(imagen_orden_compra_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			imagen_orden_compra_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($imagen_orden_compra_web1->moduloActual->getnombre()); ?>";
			imagen_orden_compra_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(imagen_orden_compra_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			imagen_orden_compra_constante2.BIT_ES_LOAD_NORMAL=true;
			/*imagen_orden_compra_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			imagen_orden_compra_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.imagen_orden_compra_constante2 = imagen_orden_compra_constante2;
			
		</script>
		
		<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.imagen_orden_compra_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.imagen_orden_compra_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="imagen_orden_compraActual" ></a>
	
	<div id="divResumenimagen_orden_compraActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(imagen_orden_compra_web::$STR_ES_BUSQUEDA=='false' && imagen_orden_compra_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(imagen_orden_compra_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' && imagen_orden_compra_web::$STR_ES_POPUP=='false' && imagen_orden_compra_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdimagen_orden_compraNuevoToolBar">
										<img id="imgNuevoToolBarimagen_orden_compra" name="imgNuevoToolBarimagen_orden_compra" title="Nuevo Imagenes Orden Compra" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(imagen_orden_compra_web::$STR_ES_BUSQUEDA=='false' && imagen_orden_compra_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdimagen_orden_compraNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarimagen_orden_compra" name="imgNuevoGuardarCambiosToolBarimagen_orden_compra" title="Nuevo TABLA Imagenes Orden Compra" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_orden_compra_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimagen_orden_compraGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarimagen_orden_compra" name="imgGuardarCambiosToolBarimagen_orden_compra" title="Guardar Imagenes Orden Compra" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' && imagen_orden_compra_web::$STR_ES_RELACIONES=='false' && imagen_orden_compra_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimagen_orden_compraCopiarToolBar">
										<img id="imgCopiarToolBarimagen_orden_compra" name="imgCopiarToolBarimagen_orden_compra" title="Copiar Imagenes Orden Compra" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_orden_compraDuplicarToolBar">
										<img id="imgDuplicarToolBarimagen_orden_compra" name="imgDuplicarToolBarimagen_orden_compra" title="Duplicar Imagenes Orden Compra" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdimagen_orden_compraRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarimagen_orden_compra" name="imgRecargarInformacionToolBarimagen_orden_compra" title="Recargar Imagenes Orden Compra" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_orden_compraAnterioresToolBar">
										<img id="imgAnterioresToolBarimagen_orden_compra" name="imgAnterioresToolBarimagen_orden_compra" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_orden_compraSiguientesToolBar">
										<img id="imgSiguientesToolBarimagen_orden_compra" name="imgSiguientesToolBarimagen_orden_compra" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_orden_compraAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarimagen_orden_compra" name="imgAbrirOrderByToolBarimagen_orden_compra" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' && imagen_orden_compra_web::$STR_ES_RELACIONES=='false') || imagen_orden_compra_web::$STR_ES_BUSQUEDA=='true'  || imagen_orden_compra_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdimagen_orden_compraCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarimagen_orden_compra" name="imgCerrarPaginaToolBarimagen_orden_compra" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trimagen_orden_compraCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaimagen_orden_compra" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaimagen_orden_compra',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trimagen_orden_compraCabeceraBusquedas/super -->

		<tr id="trBusquedaimagen_orden_compra" class="busqueda" style="display:table-row">
			<td id="tdBusquedaimagen_orden_compra" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaimagen_orden_compra" name="frmBusquedaimagen_orden_compra">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaimagen_orden_compra" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trimagen_orden_compraBusquedas" class="busqueda" style="display:none"><td>
				<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarimagen_orden_compra" style="display:table-row">
					<td id="tdParamsBuscarimagen_orden_compra">
		<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarimagen_orden_compra">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosimagen_orden_compra" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosimagen_orden_compra"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosimagen_orden_compra" name="ParamsBuscar-txtNumeroRegistrosimagen_orden_compra" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionimagen_orden_compra">
							<td id="tdGenerarReporteimagen_orden_compra" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosimagen_orden_compra" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosimagen_orden_compra" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionimagen_orden_compra" name="btnRecargarInformacionimagen_orden_compra" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaimagen_orden_compra" name="btnImprimirPaginaimagen_orden_compra" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*imagen_orden_compra_web::$STR_ES_BUSQUEDA=='false'  &&*/ imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByimagen_orden_compra">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByimagen_orden_compra" name="btnOrderByimagen_orden_compra" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(imagen_orden_compra_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdimagen_orden_compraConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosimagen_orden_compra -->

							</td><!-- tdGenerarReporteimagen_orden_compra -->
						</tr><!-- trRecargarInformacionimagen_orden_compra -->
					</table><!-- tblParamsBuscarNumeroRegistrosimagen_orden_compra -->
				</div> <!-- divParamsBuscarimagen_orden_compra -->
		<?php } ?>
				</td> <!-- tdParamsBuscarimagen_orden_compra -->
				</tr><!-- trParamsBuscarimagen_orden_compra -->
				</table> <!-- tblBusquedaimagen_orden_compra -->
				</form> <!-- frmBusquedaimagen_orden_compra -->
				

			</td> <!-- tdBusquedaimagen_orden_compra -->
		</tr> <!-- trBusquedaimagen_orden_compra/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divimagen_orden_compraPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblimagen_orden_compraPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmimagen_orden_compraAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnimagen_orden_compraAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="imagen_orden_compra_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnimagen_orden_compraAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmimagen_orden_compraAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblimagen_orden_compraPopupAjaxWebPart -->
		</div> <!-- divimagen_orden_compraPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trimagen_orden_compraTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaimagen_orden_compra"></a>
		<img id="imgTablaParaDerechaimagen_orden_compra" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaimagen_orden_compra'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaimagen_orden_compra" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaimagen_orden_compra'"/>
		<a id="TablaDerechaimagen_orden_compra"></a>
	</td>
</tr> <!-- trimagen_orden_compraTablaNavegacion/super -->
<?php } ?>

<tr id="trimagen_orden_compraTablaDatos">
	<td colspan="3" id="htmlTableCellimagen_orden_compra">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosimagen_orden_comprasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trimagen_orden_compraTablaDatos/super -->
		
		
		<tr id="trimagen_orden_compraPaginacion" style="display:table-row">
			<td id="tdimagen_orden_compraPaginacion" align="center">
				<div id="divimagen_orden_compraPaginacionAjaxWebPart">
				<form id="frmPaginacionimagen_orden_compra" name="frmPaginacionimagen_orden_compra">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionimagen_orden_compra" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(imagen_orden_compra_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkimagen_orden_compra" name="btnSeleccionarLoteFkimagen_orden_compra" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' /*&& imagen_orden_compra_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresimagen_orden_compra" name="btnAnterioresimagen_orden_compra" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(imagen_orden_compra_web::$STR_ES_BUSQUEDA=='false' && imagen_orden_compra_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdimagen_orden_compraNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararimagen_orden_compra" name="btnNuevoTablaPrepararimagen_orden_compra" title="NUEVO Imagenes Orden Compra" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaimagen_orden_compra" name="ParamsPaginar-txtNumeroNuevoTablaimagen_orden_compra" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdimagen_orden_compraConEditarimagen_orden_compra">
							<label>
								<input id="ParamsBuscar-chbConEditarimagen_orden_compra" name="ParamsBuscar-chbConEditarimagen_orden_compra" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false'/* && imagen_orden_compra_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesimagen_orden_compra" name="btnSiguientesimagen_orden_compra" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionimagen_orden_compra -->
				</form> <!-- frmPaginacionimagen_orden_compra -->
				<form id="frmNuevoPrepararimagen_orden_compra" name="frmNuevoPrepararimagen_orden_compra">
				<table id="tblNuevoPrepararimagen_orden_compra" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trimagen_orden_compraNuevo" height="10">
						<?php if(imagen_orden_compra_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdimagen_orden_compraNuevo" align="center">
							<input type="button" id="btnNuevoPrepararimagen_orden_compra" name="btnNuevoPrepararimagen_orden_compra" title="NUEVO Imagenes Orden Compra" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdimagen_orden_compraGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosimagen_orden_compra" name="btnGuardarCambiosimagen_orden_compra" title="GUARDAR Imagenes Orden Compra" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' && imagen_orden_compra_web::$STR_ES_RELACIONES=='false' && imagen_orden_compra_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdimagen_orden_compraDuplicar" align="center">
							<input type="button" id="btnDuplicarimagen_orden_compra" name="btnDuplicarimagen_orden_compra" title="DUPLICAR Imagenes Orden Compra" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdimagen_orden_compraCopiar" align="center">
							<input type="button" id="btnCopiarimagen_orden_compra" name="btnCopiarimagen_orden_compra" title="COPIAR Imagenes Orden Compra" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' && ((imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' && imagen_orden_compra_web::$STR_ES_RELACIONES=='false') || imagen_orden_compra_web::$STR_ES_BUSQUEDA=='true'  || imagen_orden_compra_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdimagen_orden_compraCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaimagen_orden_compra" name="btnCerrarPaginaimagen_orden_compra" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararimagen_orden_compra -->
				</form> <!-- frmNuevoPrepararimagen_orden_compra -->
				</div> <!-- divimagen_orden_compraPaginacionAjaxWebPart -->
			</td> <!-- tdimagen_orden_compraPaginacion -->
		</tr> <!-- trimagen_orden_compraPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesimagen_orden_compraAjaxWebPart">
			<td id="tdAccionesRelacionesimagen_orden_compraAjaxWebPart">
				<div id="divAccionesRelacionesimagen_orden_compraAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesimagen_orden_compraAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesimagen_orden_compraAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByimagen_orden_compra">
			<td id="tdOrderByimagen_orden_compra">
				<form id="frmOrderByimagen_orden_compra" name="frmOrderByimagen_orden_compra">
					<div id="divOrderByimagen_orden_compraAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByimagen_orden_compra -->
		</tr> <!-- trOrderByimagen_orden_compra/super -->
			
		
		
		
		
		
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
			
				import {imagen_orden_compra_webcontrol,imagen_orden_compra_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/imagen_orden_compra/js/webcontrol/imagen_orden_compra_webcontrol.js?random=1';
				
				imagen_orden_compra_webcontrol1.setimagen_orden_compra_constante(window.imagen_orden_compra_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(imagen_orden_compra_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

