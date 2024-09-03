<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\imagen_kardex\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Imagenes Kardex Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/imagen_kardex/util/imagen_kardex_carga.php');
	use com\bydan\contabilidad\inventario\imagen_kardex\util\imagen_kardex_carga;
	
	//include_once('com/bydan/contabilidad/inventario/imagen_kardex/presentation/view/imagen_kardex_web.php');
	//use com\bydan\contabilidad\inventario\imagen_kardex\presentation\view\imagen_kardex_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	imagen_kardex_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	imagen_kardex_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$imagen_kardex_web1= new imagen_kardex_web();	
	$imagen_kardex_web1->cargarDatosGenerales();
	
	//$moduloActual=$imagen_kardex_web1->moduloActual;
	//$usuarioActual=$imagen_kardex_web1->usuarioActual;
	//$sessionBase=$imagen_kardex_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$imagen_kardex_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/imagen_kardex/js/templating/imagen_kardex_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/imagen_kardex/js/templating/imagen_kardex_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/imagen_kardex/js/templating/imagen_kardex_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/imagen_kardex/js/templating/imagen_kardex_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			imagen_kardex_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					imagen_kardex_web::$GET_POST=$_GET;
				} else {
					imagen_kardex_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			imagen_kardex_web::$STR_NOMBRE_PAGINA = 'imagen_kardex_view.php';
			imagen_kardex_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			imagen_kardex_web::$BIT_ES_PAGINA_FORM = 'false';
				
			imagen_kardex_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {imagen_kardex_constante,imagen_kardex_constante1} from './webroot/js/JavaScript/contabilidad/inventario/imagen_kardex/js/util/imagen_kardex_constante.js?random=1';
			import {imagen_kardex_funcion,imagen_kardex_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/imagen_kardex/js/util/imagen_kardex_funcion.js?random=1';
			
			let imagen_kardex_constante2 = new imagen_kardex_constante();
			
			imagen_kardex_constante2.STR_NOMBRE_PAGINA="<?php echo(imagen_kardex_web::$STR_NOMBRE_PAGINA); ?>";
			imagen_kardex_constante2.STR_TYPE_ON_LOADimagen_kardex="<?php echo(imagen_kardex_web::$STR_TYPE_ONLOAD); ?>";
			imagen_kardex_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(imagen_kardex_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			imagen_kardex_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(imagen_kardex_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			imagen_kardex_constante2.STR_ACTION="<?php echo(imagen_kardex_web::$STR_ACTION); ?>";
			imagen_kardex_constante2.STR_ES_POPUP="<?php echo(imagen_kardex_web::$STR_ES_POPUP); ?>";
			imagen_kardex_constante2.STR_ES_BUSQUEDA="<?php echo(imagen_kardex_web::$STR_ES_BUSQUEDA); ?>";
			imagen_kardex_constante2.STR_FUNCION_JS="<?php echo(imagen_kardex_web::$STR_FUNCION_JS); ?>";
			imagen_kardex_constante2.BIG_ID_ACTUAL="<?php echo(imagen_kardex_web::$BIG_ID_ACTUAL); ?>";
			imagen_kardex_constante2.BIG_ID_OPCION="<?php echo(imagen_kardex_web::$BIG_ID_OPCION); ?>";
			imagen_kardex_constante2.STR_OBJETO_JS="<?php echo(imagen_kardex_web::$STR_OBJETO_JS); ?>";
			imagen_kardex_constante2.STR_ES_RELACIONES="<?php echo(imagen_kardex_web::$STR_ES_RELACIONES); ?>";
			imagen_kardex_constante2.STR_ES_RELACIONADO="<?php echo(imagen_kardex_web::$STR_ES_RELACIONADO); ?>";
			imagen_kardex_constante2.STR_ES_SUB_PAGINA="<?php echo(imagen_kardex_web::$STR_ES_SUB_PAGINA); ?>";
			imagen_kardex_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(imagen_kardex_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			imagen_kardex_constante2.BIT_ES_PAGINA_FORM=<?php echo(imagen_kardex_web::$BIT_ES_PAGINA_FORM); ?>;
			imagen_kardex_constante2.STR_SUFIJO="<?php echo(imagen_kardex_web::$STR_SUF); ?>";//imagen_kardex
			imagen_kardex_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(imagen_kardex_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//imagen_kardex
			
			imagen_kardex_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(imagen_kardex_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			imagen_kardex_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($imagen_kardex_web1->moduloActual->getnombre()); ?>";
			imagen_kardex_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(imagen_kardex_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			imagen_kardex_constante2.BIT_ES_LOAD_NORMAL=true;
			/*imagen_kardex_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			imagen_kardex_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.imagen_kardex_constante2 = imagen_kardex_constante2;
			
		</script>
		
		<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.imagen_kardex_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.imagen_kardex_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="imagen_kardexActual" ></a>
	
	<div id="divResumenimagen_kardexActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(imagen_kardex_web::$STR_ES_BUSQUEDA=='false' && imagen_kardex_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(imagen_kardex_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false' && imagen_kardex_web::$STR_ES_POPUP=='false' && imagen_kardex_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdimagen_kardexNuevoToolBar">
										<img id="imgNuevoToolBarimagen_kardex" name="imgNuevoToolBarimagen_kardex" title="Nuevo Imagenes Kardex" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(imagen_kardex_web::$STR_ES_BUSQUEDA=='false' && imagen_kardex_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdimagen_kardexNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarimagen_kardex" name="imgNuevoGuardarCambiosToolBarimagen_kardex" title="Nuevo TABLA Imagenes Kardex" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_kardex_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimagen_kardexGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarimagen_kardex" name="imgGuardarCambiosToolBarimagen_kardex" title="Guardar Imagenes Kardex" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false' && imagen_kardex_web::$STR_ES_RELACIONES=='false' && imagen_kardex_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimagen_kardexCopiarToolBar">
										<img id="imgCopiarToolBarimagen_kardex" name="imgCopiarToolBarimagen_kardex" title="Copiar Imagenes Kardex" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_kardexDuplicarToolBar">
										<img id="imgDuplicarToolBarimagen_kardex" name="imgDuplicarToolBarimagen_kardex" title="Duplicar Imagenes Kardex" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdimagen_kardexRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarimagen_kardex" name="imgRecargarInformacionToolBarimagen_kardex" title="Recargar Imagenes Kardex" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_kardexAnterioresToolBar">
										<img id="imgAnterioresToolBarimagen_kardex" name="imgAnterioresToolBarimagen_kardex" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_kardexSiguientesToolBar">
										<img id="imgSiguientesToolBarimagen_kardex" name="imgSiguientesToolBarimagen_kardex" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdimagen_kardexAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarimagen_kardex" name="imgAbrirOrderByToolBarimagen_kardex" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((imagen_kardex_web::$STR_ES_RELACIONADO=='false' && imagen_kardex_web::$STR_ES_RELACIONES=='false') || imagen_kardex_web::$STR_ES_BUSQUEDA=='true'  || imagen_kardex_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdimagen_kardexCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarimagen_kardex" name="imgCerrarPaginaToolBarimagen_kardex" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trimagen_kardexCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaimagen_kardex" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaimagen_kardex',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trimagen_kardexCabeceraBusquedas/super -->

		<tr id="trBusquedaimagen_kardex" class="busqueda" style="display:table-row">
			<td id="tdBusquedaimagen_kardex" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaimagen_kardex" name="frmBusquedaimagen_kardex">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaimagen_kardex" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trimagen_kardexBusquedas" class="busqueda" style="display:none"><td>
				<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarimagen_kardex" style="display:table-row">
					<td id="tdParamsBuscarimagen_kardex">
		<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarimagen_kardex">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosimagen_kardex" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosimagen_kardex"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosimagen_kardex" name="ParamsBuscar-txtNumeroRegistrosimagen_kardex" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionimagen_kardex">
							<td id="tdGenerarReporteimagen_kardex" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosimagen_kardex" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosimagen_kardex" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionimagen_kardex" name="btnRecargarInformacionimagen_kardex" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaimagen_kardex" name="btnImprimirPaginaimagen_kardex" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*imagen_kardex_web::$STR_ES_BUSQUEDA=='false'  &&*/ imagen_kardex_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByimagen_kardex">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByimagen_kardex" name="btnOrderByimagen_kardex" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(imagen_kardex_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdimagen_kardexConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosimagen_kardex -->

							</td><!-- tdGenerarReporteimagen_kardex -->
						</tr><!-- trRecargarInformacionimagen_kardex -->
					</table><!-- tblParamsBuscarNumeroRegistrosimagen_kardex -->
				</div> <!-- divParamsBuscarimagen_kardex -->
		<?php } ?>
				</td> <!-- tdParamsBuscarimagen_kardex -->
				</tr><!-- trParamsBuscarimagen_kardex -->
				</table> <!-- tblBusquedaimagen_kardex -->
				</form> <!-- frmBusquedaimagen_kardex -->
				

			</td> <!-- tdBusquedaimagen_kardex -->
		</tr> <!-- trBusquedaimagen_kardex/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divimagen_kardexPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblimagen_kardexPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmimagen_kardexAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnimagen_kardexAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="imagen_kardex_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnimagen_kardexAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmimagen_kardexAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblimagen_kardexPopupAjaxWebPart -->
		</div> <!-- divimagen_kardexPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trimagen_kardexTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaimagen_kardex"></a>
		<img id="imgTablaParaDerechaimagen_kardex" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaimagen_kardex'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaimagen_kardex" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaimagen_kardex'"/>
		<a id="TablaDerechaimagen_kardex"></a>
	</td>
</tr> <!-- trimagen_kardexTablaNavegacion/super -->
<?php } ?>

<tr id="trimagen_kardexTablaDatos">
	<td colspan="3" id="htmlTableCellimagen_kardex">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosimagen_kardexsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trimagen_kardexTablaDatos/super -->
		
		
		<tr id="trimagen_kardexPaginacion" style="display:table-row">
			<td id="tdimagen_kardexPaginacion" align="center">
				<div id="divimagen_kardexPaginacionAjaxWebPart">
				<form id="frmPaginacionimagen_kardex" name="frmPaginacionimagen_kardex">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionimagen_kardex" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(imagen_kardex_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkimagen_kardex" name="btnSeleccionarLoteFkimagen_kardex" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false' /*&& imagen_kardex_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresimagen_kardex" name="btnAnterioresimagen_kardex" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(imagen_kardex_web::$STR_ES_BUSQUEDA=='false' && imagen_kardex_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdimagen_kardexNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararimagen_kardex" name="btnNuevoTablaPrepararimagen_kardex" title="NUEVO Imagenes Kardex" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaimagen_kardex" name="ParamsPaginar-txtNumeroNuevoTablaimagen_kardex" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdimagen_kardexConEditarimagen_kardex">
							<label>
								<input id="ParamsBuscar-chbConEditarimagen_kardex" name="ParamsBuscar-chbConEditarimagen_kardex" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false'/* && imagen_kardex_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesimagen_kardex" name="btnSiguientesimagen_kardex" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionimagen_kardex -->
				</form> <!-- frmPaginacionimagen_kardex -->
				<form id="frmNuevoPrepararimagen_kardex" name="frmNuevoPrepararimagen_kardex">
				<table id="tblNuevoPrepararimagen_kardex" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trimagen_kardexNuevo" height="10">
						<?php if(imagen_kardex_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdimagen_kardexNuevo" align="center">
							<input type="button" id="btnNuevoPrepararimagen_kardex" name="btnNuevoPrepararimagen_kardex" title="NUEVO Imagenes Kardex" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdimagen_kardexGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosimagen_kardex" name="btnGuardarCambiosimagen_kardex" title="GUARDAR Imagenes Kardex" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false' && imagen_kardex_web::$STR_ES_RELACIONES=='false' && imagen_kardex_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdimagen_kardexDuplicar" align="center">
							<input type="button" id="btnDuplicarimagen_kardex" name="btnDuplicarimagen_kardex" title="DUPLICAR Imagenes Kardex" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdimagen_kardexCopiar" align="center">
							<input type="button" id="btnCopiarimagen_kardex" name="btnCopiarimagen_kardex" title="COPIAR Imagenes Kardex" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false' && ((imagen_kardex_web::$STR_ES_RELACIONADO=='false' && imagen_kardex_web::$STR_ES_RELACIONES=='false') || imagen_kardex_web::$STR_ES_BUSQUEDA=='true'  || imagen_kardex_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdimagen_kardexCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaimagen_kardex" name="btnCerrarPaginaimagen_kardex" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararimagen_kardex -->
				</form> <!-- frmNuevoPrepararimagen_kardex -->
				</div> <!-- divimagen_kardexPaginacionAjaxWebPart -->
			</td> <!-- tdimagen_kardexPaginacion -->
		</tr> <!-- trimagen_kardexPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesimagen_kardexAjaxWebPart">
			<td id="tdAccionesRelacionesimagen_kardexAjaxWebPart">
				<div id="divAccionesRelacionesimagen_kardexAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesimagen_kardexAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesimagen_kardexAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByimagen_kardex">
			<td id="tdOrderByimagen_kardex">
				<form id="frmOrderByimagen_kardex" name="frmOrderByimagen_kardex">
					<div id="divOrderByimagen_kardexAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByimagen_kardex -->
		</tr> <!-- trOrderByimagen_kardex/super -->
			
		
		
		
		
		
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
			
				import {imagen_kardex_webcontrol,imagen_kardex_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/imagen_kardex/js/webcontrol/imagen_kardex_webcontrol.js?random=1';
				
				imagen_kardex_webcontrol1.setimagen_kardex_constante(window.imagen_kardex_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(imagen_kardex_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

