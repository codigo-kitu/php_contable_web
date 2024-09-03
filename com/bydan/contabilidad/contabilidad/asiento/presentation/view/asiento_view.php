<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\asiento\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Asiento Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/asiento/util/asiento_carga.php');
	use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/asiento/presentation/view/asiento_web.php');
	//use com\bydan\contabilidad\contabilidad\asiento\presentation\view\asiento_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	asiento_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	asiento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$asiento_web1= new asiento_web();	
	$asiento_web1->cargarDatosGenerales();
	
	//$moduloActual=$asiento_web1->moduloActual;
	//$usuarioActual=$asiento_web1->usuarioActual;
	//$sessionBase=$asiento_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$asiento_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/asiento/js/templating/asiento_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/asiento/js/templating/asiento_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/asiento/js/templating/asiento_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/asiento/js/templating/asiento_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/asiento/js/templating/asiento_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			asiento_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					asiento_web::$GET_POST=$_GET;
				} else {
					asiento_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			asiento_web::$STR_NOMBRE_PAGINA = 'asiento_view.php';
			asiento_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			asiento_web::$BIT_ES_PAGINA_FORM = 'false';
				
			asiento_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {asiento_constante,asiento_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/asiento/js/util/asiento_constante.js?random=1';
			import {asiento_funcion,asiento_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/asiento/js/util/asiento_funcion.js?random=1';
			
			let asiento_constante2 = new asiento_constante();
			
			asiento_constante2.STR_NOMBRE_PAGINA="<?php echo(asiento_web::$STR_NOMBRE_PAGINA); ?>";
			asiento_constante2.STR_TYPE_ON_LOADasiento="<?php echo(asiento_web::$STR_TYPE_ONLOAD); ?>";
			asiento_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(asiento_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			asiento_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(asiento_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			asiento_constante2.STR_ACTION="<?php echo(asiento_web::$STR_ACTION); ?>";
			asiento_constante2.STR_ES_POPUP="<?php echo(asiento_web::$STR_ES_POPUP); ?>";
			asiento_constante2.STR_ES_BUSQUEDA="<?php echo(asiento_web::$STR_ES_BUSQUEDA); ?>";
			asiento_constante2.STR_FUNCION_JS="<?php echo(asiento_web::$STR_FUNCION_JS); ?>";
			asiento_constante2.BIG_ID_ACTUAL="<?php echo(asiento_web::$BIG_ID_ACTUAL); ?>";
			asiento_constante2.BIG_ID_OPCION="<?php echo(asiento_web::$BIG_ID_OPCION); ?>";
			asiento_constante2.STR_OBJETO_JS="<?php echo(asiento_web::$STR_OBJETO_JS); ?>";
			asiento_constante2.STR_ES_RELACIONES="<?php echo(asiento_web::$STR_ES_RELACIONES); ?>";
			asiento_constante2.STR_ES_RELACIONADO="<?php echo(asiento_web::$STR_ES_RELACIONADO); ?>";
			asiento_constante2.STR_ES_SUB_PAGINA="<?php echo(asiento_web::$STR_ES_SUB_PAGINA); ?>";
			asiento_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(asiento_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			asiento_constante2.BIT_ES_PAGINA_FORM=<?php echo(asiento_web::$BIT_ES_PAGINA_FORM); ?>;
			asiento_constante2.STR_SUFIJO="<?php echo(asiento_web::$STR_SUF); ?>";//asiento
			asiento_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(asiento_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//asiento
			
			asiento_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(asiento_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			asiento_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($asiento_web1->moduloActual->getnombre()); ?>";
			asiento_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(asiento_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			asiento_constante2.BIT_ES_LOAD_NORMAL=true;
			/*asiento_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			asiento_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.asiento_constante2 = asiento_constante2;
			
		</script>
		
		<?php if(asiento_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.asiento_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.asiento_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="asientoActual" ></a>
	
	<div id="divResumenasientoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(asiento_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(asiento_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(asiento_web::$STR_ES_BUSQUEDA=='false' && asiento_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(asiento_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(asiento_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(asiento_web::$STR_ES_RELACIONADO=='false' && asiento_web::$STR_ES_POPUP=='false' && asiento_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdasientoNuevoToolBar">
										<img id="imgNuevoToolBarasiento" name="imgNuevoToolBarasiento" title="Nuevo Asiento" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(asiento_web::$STR_ES_BUSQUEDA=='false' && asiento_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdasientoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarasiento" name="imgNuevoGuardarCambiosToolBarasiento" title="Nuevo TABLA Asiento" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(asiento_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdasientoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarasiento" name="imgGuardarCambiosToolBarasiento" title="Guardar Asiento" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(asiento_web::$STR_ES_RELACIONADO=='false' && asiento_web::$STR_ES_RELACIONES=='false' && asiento_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdasientoCopiarToolBar">
										<img id="imgCopiarToolBarasiento" name="imgCopiarToolBarasiento" title="Copiar Asiento" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdasientoDuplicarToolBar">
										<img id="imgDuplicarToolBarasiento" name="imgDuplicarToolBarasiento" title="Duplicar Asiento" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(asiento_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdasientoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarasiento" name="imgRecargarInformacionToolBarasiento" title="Recargar Asiento" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdasientoAnterioresToolBar">
										<img id="imgAnterioresToolBarasiento" name="imgAnterioresToolBarasiento" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdasientoSiguientesToolBar">
										<img id="imgSiguientesToolBarasiento" name="imgSiguientesToolBarasiento" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdasientoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarasiento" name="imgAbrirOrderByToolBarasiento" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((asiento_web::$STR_ES_RELACIONADO=='false' && asiento_web::$STR_ES_RELACIONES=='false') || asiento_web::$STR_ES_BUSQUEDA=='true'  || asiento_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdasientoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarasiento" name="imgCerrarPaginaToolBarasiento" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trasientoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaasiento" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaasiento',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trasientoCabeceraBusquedas/super -->

		<tr id="trBusquedaasiento" class="busqueda" style="display:table-row">
			<td id="tdBusquedaasiento" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaasiento" name="frmBusquedaasiento">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaasiento" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trasientoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(asiento_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 95%">
					<ul>
						<li id="listrVisibleFK_Idasiento_predefinido" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idasiento_predefinido"> Por  Asiento Predefinido</a></li>
						<li id="listrVisibleFK_Idcentro_costo" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcentro_costo"> Por  Centro Costo</a></li>
						<li id="listrVisibleFK_Iddocumento_contable" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Iddocumento_contable"> Por  Documento Contable</a></li>
						<li id="listrVisibleFK_Iddocumento_contable_origen" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Iddocumento_contable_origen"> Por  Documento Contable Origen</a></li>
						<li id="listrVisibleFK_Idestado" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado"> Por  Estado</a></li>
						<li id="listrVisibleFK_Idfuente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idfuente"> Por  Fuente</a></li>
						<li id="listrVisibleFK_Idlibro_auxiliar" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idlibro_auxiliar"> Por  Libro Auxiliar</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idasiento_predefinido">
					<table id="tblstrVisibleFK_Idasiento_predefinido" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Asiento Predefinido</span>
						</td>
						<td align="center">
							<select id="FK_Idasiento_predefinido-cmbid_asiento_predefinido" name="FK_Idasiento_predefinido-cmbid_asiento_predefinido" title=" Asiento Predefinido" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarasientoFK_Idasiento_predefinido" name="btnBuscarasientoFK_Idasiento_predefinido" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcentro_costo">
					<table id="tblstrVisibleFK_Idcentro_costo" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Centro Costo</span>
						</td>
						<td align="center">
							<select id="FK_Idcentro_costo-cmbid_centro_costo" name="FK_Idcentro_costo-cmbid_centro_costo" title=" Centro Costo" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarasientoFK_Idcentro_costo" name="btnBuscarasientoFK_Idcentro_costo" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Iddocumento_contable">
					<table id="tblstrVisibleFK_Iddocumento_contable" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Documento Contable</span>
						</td>
						<td align="center">
							<select id="FK_Iddocumento_contable-cmbid_documento_contable" name="FK_Iddocumento_contable-cmbid_documento_contable" title=" Documento Contable" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarasientoFK_Iddocumento_contable" name="btnBuscarasientoFK_Iddocumento_contable" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Iddocumento_contable_origen">
					<table id="tblstrVisibleFK_Iddocumento_contable_origen" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Documento Contable Origen</span>
						</td>
						<td align="center">
							<select id="FK_Iddocumento_contable_origen-cmbid_documento_contable_origen" name="FK_Iddocumento_contable_origen-cmbid_documento_contable_origen" title=" Documento Contable Origen" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarasientoFK_Iddocumento_contable_origen" name="btnBuscarasientoFK_Iddocumento_contable_origen" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idestado">
					<table id="tblstrVisibleFK_Idestado" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Estado</span>
						</td>
						<td align="center">
							<select id="FK_Idestado-cmbid_estado" name="FK_Idestado-cmbid_estado" title=" Estado" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarasientoFK_Idestado" name="btnBuscarasientoFK_Idestado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idfuente">
					<table id="tblstrVisibleFK_Idfuente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Fuente</span>
						</td>
						<td align="center">
							<select id="FK_Idfuente-cmbid_fuente" name="FK_Idfuente-cmbid_fuente" title=" Fuente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarasientoFK_Idfuente" name="btnBuscarasientoFK_Idfuente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idlibro_auxiliar">
					<table id="tblstrVisibleFK_Idlibro_auxiliar" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Libro Auxiliar</span>
						</td>
						<td align="center">
							<select id="FK_Idlibro_auxiliar-cmbid_libro_auxiliar" name="FK_Idlibro_auxiliar-cmbid_libro_auxiliar" title=" Libro Auxiliar" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarasientoFK_Idlibro_auxiliar" name="btnBuscarasientoFK_Idlibro_auxiliar" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarasiento" style="display:table-row">
					<td id="tdParamsBuscarasiento">
		<?php if(asiento_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarasiento">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosasiento" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosasiento"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosasiento" name="ParamsBuscar-txtNumeroRegistrosasiento" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionasiento">
							<td id="tdGenerarReporteasiento" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosasiento" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosasiento" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionasiento" name="btnRecargarInformacionasiento" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaasiento" name="btnImprimirPaginaasiento" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*asiento_web::$STR_ES_BUSQUEDA=='false'  &&*/ asiento_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByasiento">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByasiento" name="btnOrderByasiento" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelasiento" name="btnOrderByRelasiento" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(asiento_web::$STR_ES_RELACIONES=='false' && asiento_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(asiento_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdasientoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosasiento -->

							</td><!-- tdGenerarReporteasiento -->
						</tr><!-- trRecargarInformacionasiento -->
					</table><!-- tblParamsBuscarNumeroRegistrosasiento -->
				</div> <!-- divParamsBuscarasiento -->
		<?php } ?>
				</td> <!-- tdParamsBuscarasiento -->
				</tr><!-- trParamsBuscarasiento -->
				</table> <!-- tblBusquedaasiento -->
				</form> <!-- frmBusquedaasiento -->
				

			</td> <!-- tdBusquedaasiento -->
		</tr> <!-- trBusquedaasiento/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(asiento_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divasientoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblasientoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmasientoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnasientoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="asiento_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnasientoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmasientoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblasientoPopupAjaxWebPart -->
		</div> <!-- divasientoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(asiento_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trasientoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaasiento"></a>
		<img id="imgTablaParaDerechaasiento" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaasiento'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaasiento" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaasiento'"/>
		<a id="TablaDerechaasiento"></a>
	</td>
</tr> <!-- trasientoTablaNavegacion/super -->
<?php } ?>

<tr id="trasientoTablaDatos">
	<td colspan="3" id="htmlTableCellasiento">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosasientosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trasientoTablaDatos/super -->
		
		
		<tr id="trasientoPaginacion" style="display:table-row">
			<td id="tdasientoPaginacion" align="left">
				<div id="divasientoPaginacionAjaxWebPart">
				<form id="frmPaginacionasiento" name="frmPaginacionasiento">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionasiento" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(asiento_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkasiento" name="btnSeleccionarLoteFkasiento" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(asiento_web::$STR_ES_RELACIONADO=='false' /*&& asiento_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresasiento" name="btnAnterioresasiento" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(asiento_web::$STR_ES_BUSQUEDA=='false' && asiento_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdasientoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararasiento" name="btnNuevoTablaPrepararasiento" title="NUEVO Asiento" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaasiento" name="ParamsPaginar-txtNumeroNuevoTablaasiento" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(asiento_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdasientoConEditarasiento">
							<label>
								<input id="ParamsBuscar-chbConEditarasiento" name="ParamsBuscar-chbConEditarasiento" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(asiento_web::$STR_ES_RELACIONADO=='false'/* && asiento_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesasiento" name="btnSiguientesasiento" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionasiento -->
				</form> <!-- frmPaginacionasiento -->
				<form id="frmNuevoPrepararasiento" name="frmNuevoPrepararasiento">
				<table id="tblNuevoPrepararasiento" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trasientoNuevo" height="10">
						<?php if(asiento_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdasientoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararasiento" name="btnNuevoPrepararasiento" title="NUEVO Asiento" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdasientoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosasiento" name="btnGuardarCambiosasiento" title="GUARDAR Asiento" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(asiento_web::$STR_ES_RELACIONADO=='false' && asiento_web::$STR_ES_RELACIONES=='false' && asiento_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdasientoDuplicar" align="center">
							<input type="button" id="btnDuplicarasiento" name="btnDuplicarasiento" title="DUPLICAR Asiento" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdasientoCopiar" align="center">
							<input type="button" id="btnCopiarasiento" name="btnCopiarasiento" title="COPIAR Asiento" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(asiento_web::$STR_ES_RELACIONADO=='false' && ((asiento_web::$STR_ES_RELACIONADO=='false' && asiento_web::$STR_ES_RELACIONES=='false') || asiento_web::$STR_ES_BUSQUEDA=='true'  || asiento_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdasientoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaasiento" name="btnCerrarPaginaasiento" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararasiento -->
				</form> <!-- frmNuevoPrepararasiento -->
				</div> <!-- divasientoPaginacionAjaxWebPart -->
			</td> <!-- tdasientoPaginacion -->
		</tr> <!-- trasientoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(asiento_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesasientoAjaxWebPart">
			<td id="tdAccionesRelacionesasientoAjaxWebPart">
				<div id="divAccionesRelacionesasientoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesasientoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesasientoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByasiento">
			<td id="tdOrderByasiento">
				<form id="frmOrderByasiento" name="frmOrderByasiento">
					<div id="divOrderByasientoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelasiento" name="frmOrderByRelasiento">
					<div id="divOrderByRelasientoAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByasiento -->
		</tr> <!-- trOrderByasiento/super -->
			
		
		
		
		
		
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
			
				import {asiento_webcontrol,asiento_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/asiento/js/webcontrol/asiento_webcontrol.js?random=1';
				
				asiento_webcontrol1.setasiento_constante(window.asiento_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(asiento_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

