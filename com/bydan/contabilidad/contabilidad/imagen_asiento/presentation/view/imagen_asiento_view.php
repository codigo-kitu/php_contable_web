<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\imagen_asiento\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Imagenes Asientos Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/imagen_asiento/util/imagen_asiento_carga.php');
	use com\bydan\contabilidad\contabilidad\imagen_asiento\util\imagen_asiento_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/imagen_asiento/presentation/view/imagen_asiento_web.php');
	//use com\bydan\contabilidad\contabilidad\imagen_asiento\presentation\view\imagen_asiento_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	imagen_asiento_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	imagen_asiento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$imagen_asiento_web1= new imagen_asiento_web();	
	$imagen_asiento_web1->cargarDatosGenerales();
	
	//$moduloActual=$imagen_asiento_web1->moduloActual;
	//$usuarioActual=$imagen_asiento_web1->usuarioActual;
	//$sessionBase=$imagen_asiento_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$imagen_asiento_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/imagen_asiento/js/templating/imagen_asiento_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/imagen_asiento/js/templating/imagen_asiento_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/imagen_asiento/js/templating/imagen_asiento_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/imagen_asiento/js/templating/imagen_asiento_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			imagen_asiento_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					imagen_asiento_web::$GET_POST=$_GET;
				} else {
					imagen_asiento_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			imagen_asiento_web::$STR_NOMBRE_PAGINA = 'imagen_asiento_view.php';
			imagen_asiento_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			imagen_asiento_web::$BIT_ES_PAGINA_FORM = 'false';
				
			imagen_asiento_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {imagen_asiento_constante,imagen_asiento_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/imagen_asiento/js/util/imagen_asiento_constante.js?random=1';
			import {imagen_asiento_funcion,imagen_asiento_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/imagen_asiento/js/util/imagen_asiento_funcion.js?random=1';
			
			let imagen_asiento_constante2 = new imagen_asiento_constante();
			
			imagen_asiento_constante2.STR_NOMBRE_PAGINA="<?php echo(imagen_asiento_web::$STR_NOMBRE_PAGINA); ?>";
			imagen_asiento_constante2.STR_TYPE_ON_LOADimagen_asiento="<?php echo(imagen_asiento_web::$STR_TYPE_ONLOAD); ?>";
			imagen_asiento_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(imagen_asiento_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			imagen_asiento_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(imagen_asiento_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			imagen_asiento_constante2.STR_ACTION="<?php echo(imagen_asiento_web::$STR_ACTION); ?>";
			imagen_asiento_constante2.STR_ES_POPUP="<?php echo(imagen_asiento_web::$STR_ES_POPUP); ?>";
			imagen_asiento_constante2.STR_ES_BUSQUEDA="<?php echo(imagen_asiento_web::$STR_ES_BUSQUEDA); ?>";
			imagen_asiento_constante2.STR_FUNCION_JS="<?php echo(imagen_asiento_web::$STR_FUNCION_JS); ?>";
			imagen_asiento_constante2.BIG_ID_ACTUAL="<?php echo(imagen_asiento_web::$BIG_ID_ACTUAL); ?>";
			imagen_asiento_constante2.BIG_ID_OPCION="<?php echo(imagen_asiento_web::$BIG_ID_OPCION); ?>";
			imagen_asiento_constante2.STR_OBJETO_JS="<?php echo(imagen_asiento_web::$STR_OBJETO_JS); ?>";
			imagen_asiento_constante2.STR_ES_RELACIONES="<?php echo(imagen_asiento_web::$STR_ES_RELACIONES); ?>";
			imagen_asiento_constante2.STR_ES_RELACIONADO="<?php echo(imagen_asiento_web::$STR_ES_RELACIONADO); ?>";
			imagen_asiento_constante2.STR_ES_SUB_PAGINA="<?php echo(imagen_asiento_web::$STR_ES_SUB_PAGINA); ?>";
			imagen_asiento_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(imagen_asiento_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			imagen_asiento_constante2.BIT_ES_PAGINA_FORM=<?php echo(imagen_asiento_web::$BIT_ES_PAGINA_FORM); ?>;
			imagen_asiento_constante2.STR_SUFIJO="<?php echo(imagen_asiento_web::$STR_SUF); ?>";//imagen_asiento
			imagen_asiento_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(imagen_asiento_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//imagen_asiento
			
			imagen_asiento_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(imagen_asiento_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			imagen_asiento_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($imagen_asiento_web1->moduloActual->getnombre()); ?>";
			imagen_asiento_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(imagen_asiento_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			imagen_asiento_constante2.BIT_ES_LOAD_NORMAL=true;
			/*imagen_asiento_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			imagen_asiento_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.imagen_asiento_constante2 = imagen_asiento_constante2;
			
		</script>
		
		<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.imagen_asiento_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.imagen_asiento_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="imagen_asientoActual" ></a>
	
	<div id="divResumenimagen_asientoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(imagen_asiento_web::$STR_ES_BUSQUEDA=='false' && imagen_asiento_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(imagen_asiento_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false' && imagen_asiento_web::$STR_ES_POPUP=='false' && imagen_asiento_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdimagen_asientoNuevoToolBar">
										<img id="imgNuevoToolBarimagen_asiento" name="imgNuevoToolBarimagen_asiento" title="Nuevo Imagenes Asientos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(imagen_asiento_web::$STR_ES_BUSQUEDA=='false' && imagen_asiento_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdimagen_asientoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarimagen_asiento" name="imgNuevoGuardarCambiosToolBarimagen_asiento" title="Nuevo TABLA Imagenes Asientos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_asiento_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimagen_asientoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarimagen_asiento" name="imgGuardarCambiosToolBarimagen_asiento" title="Guardar Imagenes Asientos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false' && imagen_asiento_web::$STR_ES_RELACIONES=='false' && imagen_asiento_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimagen_asientoCopiarToolBar">
										<img id="imgCopiarToolBarimagen_asiento" name="imgCopiarToolBarimagen_asiento" title="Copiar Imagenes Asientos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_asientoDuplicarToolBar">
										<img id="imgDuplicarToolBarimagen_asiento" name="imgDuplicarToolBarimagen_asiento" title="Duplicar Imagenes Asientos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdimagen_asientoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarimagen_asiento" name="imgRecargarInformacionToolBarimagen_asiento" title="Recargar Imagenes Asientos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_asientoAnterioresToolBar">
										<img id="imgAnterioresToolBarimagen_asiento" name="imgAnterioresToolBarimagen_asiento" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_asientoSiguientesToolBar">
										<img id="imgSiguientesToolBarimagen_asiento" name="imgSiguientesToolBarimagen_asiento" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_asientoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarimagen_asiento" name="imgAbrirOrderByToolBarimagen_asiento" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((imagen_asiento_web::$STR_ES_RELACIONADO=='false' && imagen_asiento_web::$STR_ES_RELACIONES=='false') || imagen_asiento_web::$STR_ES_BUSQUEDA=='true'  || imagen_asiento_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdimagen_asientoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarimagen_asiento" name="imgCerrarPaginaToolBarimagen_asiento" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trimagen_asientoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaimagen_asiento" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaimagen_asiento',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trimagen_asientoCabeceraBusquedas/super -->

		<tr id="trBusquedaimagen_asiento" class="busqueda" style="display:table-row">
			<td id="tdBusquedaimagen_asiento" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaimagen_asiento" name="frmBusquedaimagen_asiento">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaimagen_asiento" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trimagen_asientoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idasiento" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idasiento"> Por  Asiento</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idasiento">
					<table id="tblstrVisibleFK_Idasiento" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Asiento</span>
						</td>
						<td align="center">
							<select id="FK_Idasiento-cmbid_asiento" name="FK_Idasiento-cmbid_asiento" title=" Asiento" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarimagen_asientoFK_Idasiento" name="btnBuscarimagen_asientoFK_Idasiento" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarimagen_asiento" style="display:table-row">
					<td id="tdParamsBuscarimagen_asiento">
		<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarimagen_asiento">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosimagen_asiento" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosimagen_asiento"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosimagen_asiento" name="ParamsBuscar-txtNumeroRegistrosimagen_asiento" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionimagen_asiento">
							<td id="tdGenerarReporteimagen_asiento" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosimagen_asiento" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosimagen_asiento" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionimagen_asiento" name="btnRecargarInformacionimagen_asiento" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaimagen_asiento" name="btnImprimirPaginaimagen_asiento" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*imagen_asiento_web::$STR_ES_BUSQUEDA=='false'  &&*/ imagen_asiento_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByimagen_asiento">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByimagen_asiento" name="btnOrderByimagen_asiento" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(imagen_asiento_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdimagen_asientoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosimagen_asiento -->

							</td><!-- tdGenerarReporteimagen_asiento -->
						</tr><!-- trRecargarInformacionimagen_asiento -->
					</table><!-- tblParamsBuscarNumeroRegistrosimagen_asiento -->
				</div> <!-- divParamsBuscarimagen_asiento -->
		<?php } ?>
				</td> <!-- tdParamsBuscarimagen_asiento -->
				</tr><!-- trParamsBuscarimagen_asiento -->
				</table> <!-- tblBusquedaimagen_asiento -->
				</form> <!-- frmBusquedaimagen_asiento -->
				

			</td> <!-- tdBusquedaimagen_asiento -->
		</tr> <!-- trBusquedaimagen_asiento/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divimagen_asientoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblimagen_asientoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmimagen_asientoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnimagen_asientoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="imagen_asiento_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnimagen_asientoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmimagen_asientoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblimagen_asientoPopupAjaxWebPart -->
		</div> <!-- divimagen_asientoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trimagen_asientoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaimagen_asiento"></a>
		<img id="imgTablaParaDerechaimagen_asiento" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaimagen_asiento'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaimagen_asiento" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaimagen_asiento'"/>
		<a id="TablaDerechaimagen_asiento"></a>
	</td>
</tr> <!-- trimagen_asientoTablaNavegacion/super -->
<?php } ?>

<tr id="trimagen_asientoTablaDatos">
	<td colspan="3" id="htmlTableCellimagen_asiento">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosimagen_asientosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trimagen_asientoTablaDatos/super -->
		
		
		<tr id="trimagen_asientoPaginacion" style="display:table-row">
			<td id="tdimagen_asientoPaginacion" align="center">
				<div id="divimagen_asientoPaginacionAjaxWebPart">
				<form id="frmPaginacionimagen_asiento" name="frmPaginacionimagen_asiento">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionimagen_asiento" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(imagen_asiento_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkimagen_asiento" name="btnSeleccionarLoteFkimagen_asiento" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false' /*&& imagen_asiento_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresimagen_asiento" name="btnAnterioresimagen_asiento" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(imagen_asiento_web::$STR_ES_BUSQUEDA=='false' && imagen_asiento_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdimagen_asientoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararimagen_asiento" name="btnNuevoTablaPrepararimagen_asiento" title="NUEVO Imagenes Asientos" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaimagen_asiento" name="ParamsPaginar-txtNumeroNuevoTablaimagen_asiento" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdimagen_asientoConEditarimagen_asiento">
							<label>
								<input id="ParamsBuscar-chbConEditarimagen_asiento" name="ParamsBuscar-chbConEditarimagen_asiento" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false'/* && imagen_asiento_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesimagen_asiento" name="btnSiguientesimagen_asiento" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionimagen_asiento -->
				</form> <!-- frmPaginacionimagen_asiento -->
				<form id="frmNuevoPrepararimagen_asiento" name="frmNuevoPrepararimagen_asiento">
				<table id="tblNuevoPrepararimagen_asiento" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trimagen_asientoNuevo" height="10">
						<?php if(imagen_asiento_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdimagen_asientoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararimagen_asiento" name="btnNuevoPrepararimagen_asiento" title="NUEVO Imagenes Asientos" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdimagen_asientoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosimagen_asiento" name="btnGuardarCambiosimagen_asiento" title="GUARDAR Imagenes Asientos" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false' && imagen_asiento_web::$STR_ES_RELACIONES=='false' && imagen_asiento_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdimagen_asientoDuplicar" align="center">
							<input type="button" id="btnDuplicarimagen_asiento" name="btnDuplicarimagen_asiento" title="DUPLICAR Imagenes Asientos" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdimagen_asientoCopiar" align="center">
							<input type="button" id="btnCopiarimagen_asiento" name="btnCopiarimagen_asiento" title="COPIAR Imagenes Asientos" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false' && ((imagen_asiento_web::$STR_ES_RELACIONADO=='false' && imagen_asiento_web::$STR_ES_RELACIONES=='false') || imagen_asiento_web::$STR_ES_BUSQUEDA=='true'  || imagen_asiento_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdimagen_asientoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaimagen_asiento" name="btnCerrarPaginaimagen_asiento" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararimagen_asiento -->
				</form> <!-- frmNuevoPrepararimagen_asiento -->
				</div> <!-- divimagen_asientoPaginacionAjaxWebPart -->
			</td> <!-- tdimagen_asientoPaginacion -->
		</tr> <!-- trimagen_asientoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesimagen_asientoAjaxWebPart">
			<td id="tdAccionesRelacionesimagen_asientoAjaxWebPart">
				<div id="divAccionesRelacionesimagen_asientoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesimagen_asientoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesimagen_asientoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByimagen_asiento">
			<td id="tdOrderByimagen_asiento">
				<form id="frmOrderByimagen_asiento" name="frmOrderByimagen_asiento">
					<div id="divOrderByimagen_asientoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByimagen_asiento -->
		</tr> <!-- trOrderByimagen_asiento/super -->
			
		
		
		
		
		
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
			
				import {imagen_asiento_webcontrol,imagen_asiento_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/imagen_asiento/js/webcontrol/imagen_asiento_webcontrol.js?random=1';
				
				imagen_asiento_webcontrol1.setimagen_asiento_constante(window.imagen_asiento_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(imagen_asiento_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

