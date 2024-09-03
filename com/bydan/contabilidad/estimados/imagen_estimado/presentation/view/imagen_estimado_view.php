<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\estimados\imagen_estimado\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Imagenes Estimado Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/estimados/imagen_estimado/util/imagen_estimado_carga.php');
	use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_carga;
	
	//include_once('com/bydan/contabilidad/estimados/imagen_estimado/presentation/view/imagen_estimado_web.php');
	//use com\bydan\contabilidad\estimados\imagen_estimado\presentation\view\imagen_estimado_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	imagen_estimado_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	imagen_estimado_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$imagen_estimado_web1= new imagen_estimado_web();	
	$imagen_estimado_web1->cargarDatosGenerales();
	
	//$moduloActual=$imagen_estimado_web1->moduloActual;
	//$usuarioActual=$imagen_estimado_web1->usuarioActual;
	//$sessionBase=$imagen_estimado_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$imagen_estimado_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/imagen_estimado/js/templating/imagen_estimado_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/imagen_estimado/js/templating/imagen_estimado_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/imagen_estimado/js/templating/imagen_estimado_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/imagen_estimado/js/templating/imagen_estimado_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			imagen_estimado_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					imagen_estimado_web::$GET_POST=$_GET;
				} else {
					imagen_estimado_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			imagen_estimado_web::$STR_NOMBRE_PAGINA = 'imagen_estimado_view.php';
			imagen_estimado_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			imagen_estimado_web::$BIT_ES_PAGINA_FORM = 'false';
				
			imagen_estimado_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {imagen_estimado_constante,imagen_estimado_constante1} from './webroot/js/JavaScript/contabilidad/estimados/imagen_estimado/js/util/imagen_estimado_constante.js?random=1';
			import {imagen_estimado_funcion,imagen_estimado_funcion1} from './webroot/js/JavaScript/contabilidad/estimados/imagen_estimado/js/util/imagen_estimado_funcion.js?random=1';
			
			let imagen_estimado_constante2 = new imagen_estimado_constante();
			
			imagen_estimado_constante2.STR_NOMBRE_PAGINA="<?php echo(imagen_estimado_web::$STR_NOMBRE_PAGINA); ?>";
			imagen_estimado_constante2.STR_TYPE_ON_LOADimagen_estimado="<?php echo(imagen_estimado_web::$STR_TYPE_ONLOAD); ?>";
			imagen_estimado_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(imagen_estimado_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			imagen_estimado_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(imagen_estimado_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			imagen_estimado_constante2.STR_ACTION="<?php echo(imagen_estimado_web::$STR_ACTION); ?>";
			imagen_estimado_constante2.STR_ES_POPUP="<?php echo(imagen_estimado_web::$STR_ES_POPUP); ?>";
			imagen_estimado_constante2.STR_ES_BUSQUEDA="<?php echo(imagen_estimado_web::$STR_ES_BUSQUEDA); ?>";
			imagen_estimado_constante2.STR_FUNCION_JS="<?php echo(imagen_estimado_web::$STR_FUNCION_JS); ?>";
			imagen_estimado_constante2.BIG_ID_ACTUAL="<?php echo(imagen_estimado_web::$BIG_ID_ACTUAL); ?>";
			imagen_estimado_constante2.BIG_ID_OPCION="<?php echo(imagen_estimado_web::$BIG_ID_OPCION); ?>";
			imagen_estimado_constante2.STR_OBJETO_JS="<?php echo(imagen_estimado_web::$STR_OBJETO_JS); ?>";
			imagen_estimado_constante2.STR_ES_RELACIONES="<?php echo(imagen_estimado_web::$STR_ES_RELACIONES); ?>";
			imagen_estimado_constante2.STR_ES_RELACIONADO="<?php echo(imagen_estimado_web::$STR_ES_RELACIONADO); ?>";
			imagen_estimado_constante2.STR_ES_SUB_PAGINA="<?php echo(imagen_estimado_web::$STR_ES_SUB_PAGINA); ?>";
			imagen_estimado_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(imagen_estimado_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			imagen_estimado_constante2.BIT_ES_PAGINA_FORM=<?php echo(imagen_estimado_web::$BIT_ES_PAGINA_FORM); ?>;
			imagen_estimado_constante2.STR_SUFIJO="<?php echo(imagen_estimado_web::$STR_SUF); ?>";//imagen_estimado
			imagen_estimado_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(imagen_estimado_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//imagen_estimado
			
			imagen_estimado_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(imagen_estimado_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			imagen_estimado_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($imagen_estimado_web1->moduloActual->getnombre()); ?>";
			imagen_estimado_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(imagen_estimado_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			imagen_estimado_constante2.BIT_ES_LOAD_NORMAL=true;
			/*imagen_estimado_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			imagen_estimado_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.imagen_estimado_constante2 = imagen_estimado_constante2;
			
		</script>
		
		<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.imagen_estimado_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.imagen_estimado_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="imagen_estimadoActual" ></a>
	
	<div id="divResumenimagen_estimadoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(imagen_estimado_web::$STR_ES_BUSQUEDA=='false' && imagen_estimado_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(imagen_estimado_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false' && imagen_estimado_web::$STR_ES_POPUP=='false' && imagen_estimado_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdimagen_estimadoNuevoToolBar">
										<img id="imgNuevoToolBarimagen_estimado" name="imgNuevoToolBarimagen_estimado" title="Nuevo Imagenes Estimado" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(imagen_estimado_web::$STR_ES_BUSQUEDA=='false' && imagen_estimado_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdimagen_estimadoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarimagen_estimado" name="imgNuevoGuardarCambiosToolBarimagen_estimado" title="Nuevo TABLA Imagenes Estimado" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_estimado_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimagen_estimadoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarimagen_estimado" name="imgGuardarCambiosToolBarimagen_estimado" title="Guardar Imagenes Estimado" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false' && imagen_estimado_web::$STR_ES_RELACIONES=='false' && imagen_estimado_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimagen_estimadoCopiarToolBar">
										<img id="imgCopiarToolBarimagen_estimado" name="imgCopiarToolBarimagen_estimado" title="Copiar Imagenes Estimado" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_estimadoDuplicarToolBar">
										<img id="imgDuplicarToolBarimagen_estimado" name="imgDuplicarToolBarimagen_estimado" title="Duplicar Imagenes Estimado" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdimagen_estimadoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarimagen_estimado" name="imgRecargarInformacionToolBarimagen_estimado" title="Recargar Imagenes Estimado" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_estimadoAnterioresToolBar">
										<img id="imgAnterioresToolBarimagen_estimado" name="imgAnterioresToolBarimagen_estimado" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_estimadoSiguientesToolBar">
										<img id="imgSiguientesToolBarimagen_estimado" name="imgSiguientesToolBarimagen_estimado" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_estimadoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarimagen_estimado" name="imgAbrirOrderByToolBarimagen_estimado" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((imagen_estimado_web::$STR_ES_RELACIONADO=='false' && imagen_estimado_web::$STR_ES_RELACIONES=='false') || imagen_estimado_web::$STR_ES_BUSQUEDA=='true'  || imagen_estimado_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdimagen_estimadoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarimagen_estimado" name="imgCerrarPaginaToolBarimagen_estimado" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trimagen_estimadoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaimagen_estimado" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaimagen_estimado',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trimagen_estimadoCabeceraBusquedas/super -->

		<tr id="trBusquedaimagen_estimado" class="busqueda" style="display:table-row">
			<td id="tdBusquedaimagen_estimado" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaimagen_estimado" name="frmBusquedaimagen_estimado">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaimagen_estimado" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trimagen_estimadoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idestimado" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestimado"> Por  Estimado</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idestimado">
					<table id="tblstrVisibleFK_Idestimado" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Estimado</span>
						</td>
						<td align="center">
							<select id="FK_Idestimado-cmbid_estimado" name="FK_Idestimado-cmbid_estimado" title=" Estimado" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarimagen_estimadoFK_Idestimado" name="btnBuscarimagen_estimadoFK_Idestimado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarimagen_estimado" style="display:table-row">
					<td id="tdParamsBuscarimagen_estimado">
		<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarimagen_estimado">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosimagen_estimado" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosimagen_estimado"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosimagen_estimado" name="ParamsBuscar-txtNumeroRegistrosimagen_estimado" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionimagen_estimado">
							<td id="tdGenerarReporteimagen_estimado" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosimagen_estimado" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosimagen_estimado" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionimagen_estimado" name="btnRecargarInformacionimagen_estimado" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaimagen_estimado" name="btnImprimirPaginaimagen_estimado" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*imagen_estimado_web::$STR_ES_BUSQUEDA=='false'  &&*/ imagen_estimado_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByimagen_estimado">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByimagen_estimado" name="btnOrderByimagen_estimado" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(imagen_estimado_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdimagen_estimadoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosimagen_estimado -->

							</td><!-- tdGenerarReporteimagen_estimado -->
						</tr><!-- trRecargarInformacionimagen_estimado -->
					</table><!-- tblParamsBuscarNumeroRegistrosimagen_estimado -->
				</div> <!-- divParamsBuscarimagen_estimado -->
		<?php } ?>
				</td> <!-- tdParamsBuscarimagen_estimado -->
				</tr><!-- trParamsBuscarimagen_estimado -->
				</table> <!-- tblBusquedaimagen_estimado -->
				</form> <!-- frmBusquedaimagen_estimado -->
				

			</td> <!-- tdBusquedaimagen_estimado -->
		</tr> <!-- trBusquedaimagen_estimado/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divimagen_estimadoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblimagen_estimadoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmimagen_estimadoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnimagen_estimadoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="imagen_estimado_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnimagen_estimadoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmimagen_estimadoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblimagen_estimadoPopupAjaxWebPart -->
		</div> <!-- divimagen_estimadoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trimagen_estimadoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaimagen_estimado"></a>
		<img id="imgTablaParaDerechaimagen_estimado" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaimagen_estimado'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaimagen_estimado" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaimagen_estimado'"/>
		<a id="TablaDerechaimagen_estimado"></a>
	</td>
</tr> <!-- trimagen_estimadoTablaNavegacion/super -->
<?php } ?>

<tr id="trimagen_estimadoTablaDatos">
	<td colspan="3" id="htmlTableCellimagen_estimado">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosimagen_estimadosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trimagen_estimadoTablaDatos/super -->
		
		
		<tr id="trimagen_estimadoPaginacion" style="display:table-row">
			<td id="tdimagen_estimadoPaginacion" align="center">
				<div id="divimagen_estimadoPaginacionAjaxWebPart">
				<form id="frmPaginacionimagen_estimado" name="frmPaginacionimagen_estimado">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionimagen_estimado" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(imagen_estimado_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkimagen_estimado" name="btnSeleccionarLoteFkimagen_estimado" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false' /*&& imagen_estimado_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresimagen_estimado" name="btnAnterioresimagen_estimado" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(imagen_estimado_web::$STR_ES_BUSQUEDA=='false' && imagen_estimado_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdimagen_estimadoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararimagen_estimado" name="btnNuevoTablaPrepararimagen_estimado" title="NUEVO Imagenes Estimado" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaimagen_estimado" name="ParamsPaginar-txtNumeroNuevoTablaimagen_estimado" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdimagen_estimadoConEditarimagen_estimado">
							<label>
								<input id="ParamsBuscar-chbConEditarimagen_estimado" name="ParamsBuscar-chbConEditarimagen_estimado" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false'/* && imagen_estimado_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesimagen_estimado" name="btnSiguientesimagen_estimado" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionimagen_estimado -->
				</form> <!-- frmPaginacionimagen_estimado -->
				<form id="frmNuevoPrepararimagen_estimado" name="frmNuevoPrepararimagen_estimado">
				<table id="tblNuevoPrepararimagen_estimado" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trimagen_estimadoNuevo" height="10">
						<?php if(imagen_estimado_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdimagen_estimadoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararimagen_estimado" name="btnNuevoPrepararimagen_estimado" title="NUEVO Imagenes Estimado" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdimagen_estimadoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosimagen_estimado" name="btnGuardarCambiosimagen_estimado" title="GUARDAR Imagenes Estimado" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false' && imagen_estimado_web::$STR_ES_RELACIONES=='false' && imagen_estimado_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdimagen_estimadoDuplicar" align="center">
							<input type="button" id="btnDuplicarimagen_estimado" name="btnDuplicarimagen_estimado" title="DUPLICAR Imagenes Estimado" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdimagen_estimadoCopiar" align="center">
							<input type="button" id="btnCopiarimagen_estimado" name="btnCopiarimagen_estimado" title="COPIAR Imagenes Estimado" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false' && ((imagen_estimado_web::$STR_ES_RELACIONADO=='false' && imagen_estimado_web::$STR_ES_RELACIONES=='false') || imagen_estimado_web::$STR_ES_BUSQUEDA=='true'  || imagen_estimado_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdimagen_estimadoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaimagen_estimado" name="btnCerrarPaginaimagen_estimado" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararimagen_estimado -->
				</form> <!-- frmNuevoPrepararimagen_estimado -->
				</div> <!-- divimagen_estimadoPaginacionAjaxWebPart -->
			</td> <!-- tdimagen_estimadoPaginacion -->
		</tr> <!-- trimagen_estimadoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesimagen_estimadoAjaxWebPart">
			<td id="tdAccionesRelacionesimagen_estimadoAjaxWebPart">
				<div id="divAccionesRelacionesimagen_estimadoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesimagen_estimadoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesimagen_estimadoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByimagen_estimado">
			<td id="tdOrderByimagen_estimado">
				<form id="frmOrderByimagen_estimado" name="frmOrderByimagen_estimado">
					<div id="divOrderByimagen_estimadoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByimagen_estimado -->
		</tr> <!-- trOrderByimagen_estimado/super -->
			
		
		
		
		
		
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
			
				import {imagen_estimado_webcontrol,imagen_estimado_webcontrol1} from './webroot/js/JavaScript/contabilidad/estimados/imagen_estimado/js/webcontrol/imagen_estimado_webcontrol.js?random=1';
				
				imagen_estimado_webcontrol1.setimagen_estimado_constante(window.imagen_estimado_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(imagen_estimado_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

