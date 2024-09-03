<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\unidad\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Unidad Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/unidad/util/unidad_carga.php');
	use com\bydan\contabilidad\inventario\unidad\util\unidad_carga;
	
	//include_once('com/bydan/contabilidad/inventario/unidad/presentation/view/unidad_web.php');
	//use com\bydan\contabilidad\inventario\unidad\presentation\view\unidad_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	unidad_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	unidad_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$unidad_web1= new unidad_web();	
	$unidad_web1->cargarDatosGenerales();
	
	//$moduloActual=$unidad_web1->moduloActual;
	//$usuarioActual=$unidad_web1->usuarioActual;
	//$sessionBase=$unidad_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$unidad_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/unidad/js/templating/unidad_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/unidad/js/templating/unidad_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/unidad/js/templating/unidad_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/unidad/js/templating/unidad_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			unidad_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					unidad_web::$GET_POST=$_GET;
				} else {
					unidad_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			unidad_web::$STR_NOMBRE_PAGINA = 'unidad_view.php';
			unidad_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			unidad_web::$BIT_ES_PAGINA_FORM = 'false';
				
			unidad_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {unidad_constante,unidad_constante1} from './webroot/js/JavaScript/contabilidad/inventario/unidad/js/util/unidad_constante.js?random=1';
			import {unidad_funcion,unidad_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/unidad/js/util/unidad_funcion.js?random=1';
			
			let unidad_constante2 = new unidad_constante();
			
			unidad_constante2.STR_NOMBRE_PAGINA="<?php echo(unidad_web::$STR_NOMBRE_PAGINA); ?>";
			unidad_constante2.STR_TYPE_ON_LOADunidad="<?php echo(unidad_web::$STR_TYPE_ONLOAD); ?>";
			unidad_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(unidad_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			unidad_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(unidad_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			unidad_constante2.STR_ACTION="<?php echo(unidad_web::$STR_ACTION); ?>";
			unidad_constante2.STR_ES_POPUP="<?php echo(unidad_web::$STR_ES_POPUP); ?>";
			unidad_constante2.STR_ES_BUSQUEDA="<?php echo(unidad_web::$STR_ES_BUSQUEDA); ?>";
			unidad_constante2.STR_FUNCION_JS="<?php echo(unidad_web::$STR_FUNCION_JS); ?>";
			unidad_constante2.BIG_ID_ACTUAL="<?php echo(unidad_web::$BIG_ID_ACTUAL); ?>";
			unidad_constante2.BIG_ID_OPCION="<?php echo(unidad_web::$BIG_ID_OPCION); ?>";
			unidad_constante2.STR_OBJETO_JS="<?php echo(unidad_web::$STR_OBJETO_JS); ?>";
			unidad_constante2.STR_ES_RELACIONES="<?php echo(unidad_web::$STR_ES_RELACIONES); ?>";
			unidad_constante2.STR_ES_RELACIONADO="<?php echo(unidad_web::$STR_ES_RELACIONADO); ?>";
			unidad_constante2.STR_ES_SUB_PAGINA="<?php echo(unidad_web::$STR_ES_SUB_PAGINA); ?>";
			unidad_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(unidad_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			unidad_constante2.BIT_ES_PAGINA_FORM=<?php echo(unidad_web::$BIT_ES_PAGINA_FORM); ?>;
			unidad_constante2.STR_SUFIJO="<?php echo(unidad_web::$STR_SUF); ?>";//unidad
			unidad_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(unidad_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//unidad
			
			unidad_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(unidad_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			unidad_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($unidad_web1->moduloActual->getnombre()); ?>";
			unidad_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(unidad_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			unidad_constante2.BIT_ES_LOAD_NORMAL=true;
			/*unidad_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			unidad_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.unidad_constante2 = unidad_constante2;
			
		</script>
		
		<?php if(unidad_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.unidad_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.unidad_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="unidadActual" ></a>
	
	<div id="divResumenunidadActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(unidad_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(unidad_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(unidad_web::$STR_ES_BUSQUEDA=='false' && unidad_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(unidad_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(unidad_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(unidad_web::$STR_ES_RELACIONADO=='false' && unidad_web::$STR_ES_POPUP=='false' && unidad_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdunidadNuevoToolBar">
										<img id="imgNuevoToolBarunidad" name="imgNuevoToolBarunidad" title="Nuevo Unidad" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(unidad_web::$STR_ES_BUSQUEDA=='false' && unidad_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdunidadNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarunidad" name="imgNuevoGuardarCambiosToolBarunidad" title="Nuevo TABLA Unidad" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(unidad_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdunidadGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarunidad" name="imgGuardarCambiosToolBarunidad" title="Guardar Unidad" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(unidad_web::$STR_ES_RELACIONADO=='false' && unidad_web::$STR_ES_RELACIONES=='false' && unidad_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdunidadCopiarToolBar">
										<img id="imgCopiarToolBarunidad" name="imgCopiarToolBarunidad" title="Copiar Unidad" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdunidadDuplicarToolBar">
										<img id="imgDuplicarToolBarunidad" name="imgDuplicarToolBarunidad" title="Duplicar Unidad" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(unidad_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdunidadRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarunidad" name="imgRecargarInformacionToolBarunidad" title="Recargar Unidad" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdunidadAnterioresToolBar">
										<img id="imgAnterioresToolBarunidad" name="imgAnterioresToolBarunidad" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdunidadSiguientesToolBar">
										<img id="imgSiguientesToolBarunidad" name="imgSiguientesToolBarunidad" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdunidadAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarunidad" name="imgAbrirOrderByToolBarunidad" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((unidad_web::$STR_ES_RELACIONADO=='false' && unidad_web::$STR_ES_RELACIONES=='false') || unidad_web::$STR_ES_BUSQUEDA=='true'  || unidad_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdunidadCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarunidad" name="imgCerrarPaginaToolBarunidad" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trunidadCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaunidad" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaunidad',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trunidadCabeceraBusquedas/super -->

		<tr id="trBusquedaunidad" class="busqueda" style="display:table-row">
			<td id="tdBusquedaunidad" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaunidad" name="frmBusquedaunidad">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaunidad" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trunidadBusquedas" class="busqueda" style="display:none"><td>
				<?php if(unidad_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarunidad" style="display:table-row">
					<td id="tdParamsBuscarunidad">
		<?php if(unidad_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarunidad">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosunidad" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosunidad"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosunidad" name="ParamsBuscar-txtNumeroRegistrosunidad" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionunidad">
							<td id="tdGenerarReporteunidad" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosunidad" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosunidad" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionunidad" name="btnRecargarInformacionunidad" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaunidad" name="btnImprimirPaginaunidad" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*unidad_web::$STR_ES_BUSQUEDA=='false'  &&*/ unidad_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByunidad">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByunidad" name="btnOrderByunidad" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(unidad_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdunidadConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosunidad -->

							</td><!-- tdGenerarReporteunidad -->
						</tr><!-- trRecargarInformacionunidad -->
					</table><!-- tblParamsBuscarNumeroRegistrosunidad -->
				</div> <!-- divParamsBuscarunidad -->
		<?php } ?>
				</td> <!-- tdParamsBuscarunidad -->
				</tr><!-- trParamsBuscarunidad -->
				</table> <!-- tblBusquedaunidad -->
				</form> <!-- frmBusquedaunidad -->
				

			</td> <!-- tdBusquedaunidad -->
		</tr> <!-- trBusquedaunidad/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(unidad_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divunidadPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblunidadPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmunidadAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnunidadAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="unidad_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnunidadAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmunidadAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblunidadPopupAjaxWebPart -->
		</div> <!-- divunidadPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(unidad_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trunidadTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaunidad"></a>
		<img id="imgTablaParaDerechaunidad" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaunidad'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaunidad" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaunidad'"/>
		<a id="TablaDerechaunidad"></a>
	</td>
</tr> <!-- trunidadTablaNavegacion/super -->
<?php } ?>

<tr id="trunidadTablaDatos">
	<td colspan="3" id="htmlTableCellunidad">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosunidadsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trunidadTablaDatos/super -->
		
		
		<tr id="trunidadPaginacion" style="display:table-row">
			<td id="tdunidadPaginacion" align="center">
				<div id="divunidadPaginacionAjaxWebPart">
				<form id="frmPaginacionunidad" name="frmPaginacionunidad">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionunidad" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(unidad_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkunidad" name="btnSeleccionarLoteFkunidad" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(unidad_web::$STR_ES_RELACIONADO=='false' /*&& unidad_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresunidad" name="btnAnterioresunidad" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(unidad_web::$STR_ES_BUSQUEDA=='false' && unidad_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdunidadNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararunidad" name="btnNuevoTablaPrepararunidad" title="NUEVO Unidad" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaunidad" name="ParamsPaginar-txtNumeroNuevoTablaunidad" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(unidad_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdunidadConEditarunidad">
							<label>
								<input id="ParamsBuscar-chbConEditarunidad" name="ParamsBuscar-chbConEditarunidad" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(unidad_web::$STR_ES_RELACIONADO=='false'/* && unidad_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesunidad" name="btnSiguientesunidad" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionunidad -->
				</form> <!-- frmPaginacionunidad -->
				<form id="frmNuevoPrepararunidad" name="frmNuevoPrepararunidad">
				<table id="tblNuevoPrepararunidad" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trunidadNuevo" height="10">
						<?php if(unidad_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdunidadNuevo" align="center">
							<input type="button" id="btnNuevoPrepararunidad" name="btnNuevoPrepararunidad" title="NUEVO Unidad" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdunidadGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosunidad" name="btnGuardarCambiosunidad" title="GUARDAR Unidad" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(unidad_web::$STR_ES_RELACIONADO=='false' && unidad_web::$STR_ES_RELACIONES=='false' && unidad_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdunidadDuplicar" align="center">
							<input type="button" id="btnDuplicarunidad" name="btnDuplicarunidad" title="DUPLICAR Unidad" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdunidadCopiar" align="center">
							<input type="button" id="btnCopiarunidad" name="btnCopiarunidad" title="COPIAR Unidad" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(unidad_web::$STR_ES_RELACIONADO=='false' && ((unidad_web::$STR_ES_RELACIONADO=='false' && unidad_web::$STR_ES_RELACIONES=='false') || unidad_web::$STR_ES_BUSQUEDA=='true'  || unidad_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdunidadCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaunidad" name="btnCerrarPaginaunidad" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararunidad -->
				</form> <!-- frmNuevoPrepararunidad -->
				</div> <!-- divunidadPaginacionAjaxWebPart -->
			</td> <!-- tdunidadPaginacion -->
		</tr> <!-- trunidadPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(unidad_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesunidadAjaxWebPart">
			<td id="tdAccionesRelacionesunidadAjaxWebPart">
				<div id="divAccionesRelacionesunidadAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesunidadAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesunidadAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByunidad">
			<td id="tdOrderByunidad">
				<form id="frmOrderByunidad" name="frmOrderByunidad">
					<div id="divOrderByunidadAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByunidad -->
		</tr> <!-- trOrderByunidad/super -->
			
		
		
		
		
		
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
			
				import {unidad_webcontrol,unidad_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/unidad/js/webcontrol/unidad_webcontrol.js?random=1';
				
				unidad_webcontrol1.setunidad_constante(window.unidad_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(unidad_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

