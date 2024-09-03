<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\archivo\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Archivos Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/archivo/util/archivo_carga.php');
	use com\bydan\contabilidad\general\archivo\util\archivo_carga;
	
	//include_once('com/bydan/contabilidad/general/archivo/presentation/view/archivo_web.php');
	//use com\bydan\contabilidad\general\archivo\presentation\view\archivo_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	archivo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	archivo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$archivo_web1= new archivo_web();	
	$archivo_web1->cargarDatosGenerales();
	
	//$moduloActual=$archivo_web1->moduloActual;
	//$usuarioActual=$archivo_web1->usuarioActual;
	//$sessionBase=$archivo_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$archivo_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/archivo/js/templating/archivo_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/archivo/js/templating/archivo_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/archivo/js/templating/archivo_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/archivo/js/templating/archivo_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/archivo/js/templating/archivo_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			archivo_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					archivo_web::$GET_POST=$_GET;
				} else {
					archivo_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			archivo_web::$STR_NOMBRE_PAGINA = 'archivo_view.php';
			archivo_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			archivo_web::$BIT_ES_PAGINA_FORM = 'false';
				
			archivo_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {archivo_constante,archivo_constante1} from './webroot/js/JavaScript/contabilidad/general/archivo/js/util/archivo_constante.js?random=1';
			import {archivo_funcion,archivo_funcion1} from './webroot/js/JavaScript/contabilidad/general/archivo/js/util/archivo_funcion.js?random=1';
			
			let archivo_constante2 = new archivo_constante();
			
			archivo_constante2.STR_NOMBRE_PAGINA="<?php echo(archivo_web::$STR_NOMBRE_PAGINA); ?>";
			archivo_constante2.STR_TYPE_ON_LOADarchivo="<?php echo(archivo_web::$STR_TYPE_ONLOAD); ?>";
			archivo_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(archivo_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			archivo_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(archivo_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			archivo_constante2.STR_ACTION="<?php echo(archivo_web::$STR_ACTION); ?>";
			archivo_constante2.STR_ES_POPUP="<?php echo(archivo_web::$STR_ES_POPUP); ?>";
			archivo_constante2.STR_ES_BUSQUEDA="<?php echo(archivo_web::$STR_ES_BUSQUEDA); ?>";
			archivo_constante2.STR_FUNCION_JS="<?php echo(archivo_web::$STR_FUNCION_JS); ?>";
			archivo_constante2.BIG_ID_ACTUAL="<?php echo(archivo_web::$BIG_ID_ACTUAL); ?>";
			archivo_constante2.BIG_ID_OPCION="<?php echo(archivo_web::$BIG_ID_OPCION); ?>";
			archivo_constante2.STR_OBJETO_JS="<?php echo(archivo_web::$STR_OBJETO_JS); ?>";
			archivo_constante2.STR_ES_RELACIONES="<?php echo(archivo_web::$STR_ES_RELACIONES); ?>";
			archivo_constante2.STR_ES_RELACIONADO="<?php echo(archivo_web::$STR_ES_RELACIONADO); ?>";
			archivo_constante2.STR_ES_SUB_PAGINA="<?php echo(archivo_web::$STR_ES_SUB_PAGINA); ?>";
			archivo_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(archivo_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			archivo_constante2.BIT_ES_PAGINA_FORM=<?php echo(archivo_web::$BIT_ES_PAGINA_FORM); ?>;
			archivo_constante2.STR_SUFIJO="<?php echo(archivo_web::$STR_SUF); ?>";//archivo
			archivo_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(archivo_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//archivo
			
			archivo_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(archivo_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			archivo_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($archivo_web1->moduloActual->getnombre()); ?>";
			archivo_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(archivo_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			archivo_constante2.BIT_ES_LOAD_NORMAL=true;
			/*archivo_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			archivo_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.archivo_constante2 = archivo_constante2;
			
		</script>
		
		<?php if(archivo_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.archivo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.archivo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="archivoActual" ></a>
	
	<div id="divResumenarchivoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(archivo_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(archivo_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(archivo_web::$STR_ES_BUSQUEDA=='false' && archivo_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(archivo_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(archivo_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(archivo_web::$STR_ES_RELACIONADO=='false' && archivo_web::$STR_ES_POPUP=='false' && archivo_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdarchivoNuevoToolBar">
										<img id="imgNuevoToolBararchivo" name="imgNuevoToolBararchivo" title="Nuevo Archivos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(archivo_web::$STR_ES_BUSQUEDA=='false' && archivo_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdarchivoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBararchivo" name="imgNuevoGuardarCambiosToolBararchivo" title="Nuevo TABLA Archivos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(archivo_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdarchivoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBararchivo" name="imgGuardarCambiosToolBararchivo" title="Guardar Archivos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(archivo_web::$STR_ES_RELACIONADO=='false' && archivo_web::$STR_ES_RELACIONES=='false' && archivo_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdarchivoCopiarToolBar">
										<img id="imgCopiarToolBararchivo" name="imgCopiarToolBararchivo" title="Copiar Archivos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdarchivoDuplicarToolBar">
										<img id="imgDuplicarToolBararchivo" name="imgDuplicarToolBararchivo" title="Duplicar Archivos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(archivo_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdarchivoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBararchivo" name="imgRecargarInformacionToolBararchivo" title="Recargar Archivos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdarchivoAnterioresToolBar">
										<img id="imgAnterioresToolBararchivo" name="imgAnterioresToolBararchivo" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdarchivoSiguientesToolBar">
										<img id="imgSiguientesToolBararchivo" name="imgSiguientesToolBararchivo" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdarchivoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBararchivo" name="imgAbrirOrderByToolBararchivo" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((archivo_web::$STR_ES_RELACIONADO=='false' && archivo_web::$STR_ES_RELACIONES=='false') || archivo_web::$STR_ES_BUSQUEDA=='true'  || archivo_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdarchivoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBararchivo" name="imgCerrarPaginaToolBararchivo" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trarchivoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaarchivo" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaarchivo',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trarchivoCabeceraBusquedas/super -->

		<tr id="trBusquedaarchivo" class="busqueda" style="display:table-row">
			<td id="tdBusquedaarchivo" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaarchivo" name="frmBusquedaarchivo">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaarchivo" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trarchivoBusquedas" class="busqueda" style="display:none"><td>
				<?php if(archivo_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscararchivo" style="display:table-row">
					<td id="tdParamsBuscararchivo">
		<?php if(archivo_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscararchivo">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosarchivo" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosarchivo"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosarchivo" name="ParamsBuscar-txtNumeroRegistrosarchivo" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionarchivo">
							<td id="tdGenerarReportearchivo" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosarchivo" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosarchivo" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionarchivo" name="btnRecargarInformacionarchivo" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaarchivo" name="btnImprimirPaginaarchivo" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*archivo_web::$STR_ES_BUSQUEDA=='false'  &&*/ archivo_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByarchivo">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByarchivo" name="btnOrderByarchivo" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelarchivo" name="btnOrderByRelarchivo" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(archivo_web::$STR_ES_RELACIONES=='false' && archivo_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(archivo_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdarchivoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosarchivo -->

							</td><!-- tdGenerarReportearchivo -->
						</tr><!-- trRecargarInformacionarchivo -->
					</table><!-- tblParamsBuscarNumeroRegistrosarchivo -->
				</div> <!-- divParamsBuscararchivo -->
		<?php } ?>
				</td> <!-- tdParamsBuscararchivo -->
				</tr><!-- trParamsBuscararchivo -->
				</table> <!-- tblBusquedaarchivo -->
				</form> <!-- frmBusquedaarchivo -->
				

			</td> <!-- tdBusquedaarchivo -->
		</tr> <!-- trBusquedaarchivo/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(archivo_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divarchivoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblarchivoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmarchivoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnarchivoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="archivo_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnarchivoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmarchivoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblarchivoPopupAjaxWebPart -->
		</div> <!-- divarchivoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(archivo_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trarchivoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaarchivo"></a>
		<img id="imgTablaParaDerechaarchivo" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaarchivo'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaarchivo" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaarchivo'"/>
		<a id="TablaDerechaarchivo"></a>
	</td>
</tr> <!-- trarchivoTablaNavegacion/super -->
<?php } ?>

<tr id="trarchivoTablaDatos">
	<td colspan="3" id="htmlTableCellarchivo">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosarchivosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trarchivoTablaDatos/super -->
		
		
		<tr id="trarchivoPaginacion" style="display:table-row">
			<td id="tdarchivoPaginacion" align="center">
				<div id="divarchivoPaginacionAjaxWebPart">
				<form id="frmPaginacionarchivo" name="frmPaginacionarchivo">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionarchivo" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(archivo_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkarchivo" name="btnSeleccionarLoteFkarchivo" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(archivo_web::$STR_ES_RELACIONADO=='false' /*&& archivo_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresarchivo" name="btnAnterioresarchivo" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(archivo_web::$STR_ES_BUSQUEDA=='false' && archivo_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdarchivoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparararchivo" name="btnNuevoTablaPreparararchivo" title="NUEVO Archivos" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaarchivo" name="ParamsPaginar-txtNumeroNuevoTablaarchivo" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(archivo_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdarchivoConEditararchivo">
							<label>
								<input id="ParamsBuscar-chbConEditararchivo" name="ParamsBuscar-chbConEditararchivo" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(archivo_web::$STR_ES_RELACIONADO=='false'/* && archivo_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesarchivo" name="btnSiguientesarchivo" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionarchivo -->
				</form> <!-- frmPaginacionarchivo -->
				<form id="frmNuevoPreparararchivo" name="frmNuevoPreparararchivo">
				<table id="tblNuevoPreparararchivo" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trarchivoNuevo" height="10">
						<?php if(archivo_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdarchivoNuevo" align="center">
							<input type="button" id="btnNuevoPreparararchivo" name="btnNuevoPreparararchivo" title="NUEVO Archivos" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdarchivoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosarchivo" name="btnGuardarCambiosarchivo" title="GUARDAR Archivos" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(archivo_web::$STR_ES_RELACIONADO=='false' && archivo_web::$STR_ES_RELACIONES=='false' && archivo_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdarchivoDuplicar" align="center">
							<input type="button" id="btnDuplicararchivo" name="btnDuplicararchivo" title="DUPLICAR Archivos" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdarchivoCopiar" align="center">
							<input type="button" id="btnCopiararchivo" name="btnCopiararchivo" title="COPIAR Archivos" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(archivo_web::$STR_ES_RELACIONADO=='false' && ((archivo_web::$STR_ES_RELACIONADO=='false' && archivo_web::$STR_ES_RELACIONES=='false') || archivo_web::$STR_ES_BUSQUEDA=='true'  || archivo_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdarchivoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaarchivo" name="btnCerrarPaginaarchivo" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparararchivo -->
				</form> <!-- frmNuevoPreparararchivo -->
				</div> <!-- divarchivoPaginacionAjaxWebPart -->
			</td> <!-- tdarchivoPaginacion -->
		</tr> <!-- trarchivoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(archivo_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesarchivoAjaxWebPart">
			<td id="tdAccionesRelacionesarchivoAjaxWebPart">
				<div id="divAccionesRelacionesarchivoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesarchivoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesarchivoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByarchivo">
			<td id="tdOrderByarchivo">
				<form id="frmOrderByarchivo" name="frmOrderByarchivo">
					<div id="divOrderByarchivoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelarchivo" name="frmOrderByRelarchivo">
					<div id="divOrderByRelarchivoAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByarchivo -->
		</tr> <!-- trOrderByarchivo/super -->
			
		
		
		
		
		
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
			
				import {archivo_webcontrol,archivo_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/archivo/js/webcontrol/archivo_webcontrol.js?random=1';
				
				archivo_webcontrol1.setarchivo_constante(window.archivo_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(archivo_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

