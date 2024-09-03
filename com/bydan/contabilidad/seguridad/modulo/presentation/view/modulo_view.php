<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\modulo\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Modulo Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/modulo/util/modulo_carga.php');
	use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/modulo/presentation/view/modulo_web.php');
	//use com\bydan\contabilidad\seguridad\modulo\presentation\view\modulo_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	modulo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	modulo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$modulo_web1= new modulo_web();	
	$modulo_web1->cargarDatosGenerales();
	
	//$moduloActual=$modulo_web1->moduloActual;
	//$usuarioActual=$modulo_web1->usuarioActual;
	//$sessionBase=$modulo_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$modulo_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/modulo/js/templating/modulo_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/modulo/js/templating/modulo_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/modulo/js/templating/modulo_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/modulo/js/templating/modulo_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			modulo_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					modulo_web::$GET_POST=$_GET;
				} else {
					modulo_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			modulo_web::$STR_NOMBRE_PAGINA = 'modulo_view.php';
			modulo_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			modulo_web::$BIT_ES_PAGINA_FORM = 'false';
				
			modulo_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {modulo_constante,modulo_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/modulo/js/util/modulo_constante.js?random=1';
			import {modulo_funcion,modulo_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/modulo/js/util/modulo_funcion.js?random=1';
			
			let modulo_constante2 = new modulo_constante();
			
			modulo_constante2.STR_NOMBRE_PAGINA="<?php echo(modulo_web::$STR_NOMBRE_PAGINA); ?>";
			modulo_constante2.STR_TYPE_ON_LOADmodulo="<?php echo(modulo_web::$STR_TYPE_ONLOAD); ?>";
			modulo_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(modulo_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			modulo_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(modulo_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			modulo_constante2.STR_ACTION="<?php echo(modulo_web::$STR_ACTION); ?>";
			modulo_constante2.STR_ES_POPUP="<?php echo(modulo_web::$STR_ES_POPUP); ?>";
			modulo_constante2.STR_ES_BUSQUEDA="<?php echo(modulo_web::$STR_ES_BUSQUEDA); ?>";
			modulo_constante2.STR_FUNCION_JS="<?php echo(modulo_web::$STR_FUNCION_JS); ?>";
			modulo_constante2.BIG_ID_ACTUAL="<?php echo(modulo_web::$BIG_ID_ACTUAL); ?>";
			modulo_constante2.BIG_ID_OPCION="<?php echo(modulo_web::$BIG_ID_OPCION); ?>";
			modulo_constante2.STR_OBJETO_JS="<?php echo(modulo_web::$STR_OBJETO_JS); ?>";
			modulo_constante2.STR_ES_RELACIONES="<?php echo(modulo_web::$STR_ES_RELACIONES); ?>";
			modulo_constante2.STR_ES_RELACIONADO="<?php echo(modulo_web::$STR_ES_RELACIONADO); ?>";
			modulo_constante2.STR_ES_SUB_PAGINA="<?php echo(modulo_web::$STR_ES_SUB_PAGINA); ?>";
			modulo_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(modulo_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			modulo_constante2.BIT_ES_PAGINA_FORM=<?php echo(modulo_web::$BIT_ES_PAGINA_FORM); ?>;
			modulo_constante2.STR_SUFIJO="<?php echo(modulo_web::$STR_SUF); ?>";//modulo
			modulo_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(modulo_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//modulo
			
			modulo_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(modulo_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			modulo_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($modulo_web1->moduloActual->getnombre()); ?>";
			modulo_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(modulo_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			modulo_constante2.BIT_ES_LOAD_NORMAL=true;
			/*modulo_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			modulo_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.modulo_constante2 = modulo_constante2;
			
		</script>
		
		<?php if(modulo_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.modulo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.modulo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="moduloActual" ></a>
	
	<div id="divResumenmoduloActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(modulo_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(modulo_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(modulo_web::$STR_ES_BUSQUEDA=='false' && modulo_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(modulo_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(modulo_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(modulo_web::$STR_ES_RELACIONADO=='false' && modulo_web::$STR_ES_POPUP=='false' && modulo_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdmoduloNuevoToolBar">
										<img id="imgNuevoToolBarmodulo" name="imgNuevoToolBarmodulo" title="Nuevo Modulo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(modulo_web::$STR_ES_BUSQUEDA=='false' && modulo_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdmoduloNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarmodulo" name="imgNuevoGuardarCambiosToolBarmodulo" title="Nuevo TABLA Modulo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(modulo_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdmoduloGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarmodulo" name="imgGuardarCambiosToolBarmodulo" title="Guardar Modulo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(modulo_web::$STR_ES_RELACIONADO=='false' && modulo_web::$STR_ES_RELACIONES=='false' && modulo_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdmoduloCopiarToolBar">
										<img id="imgCopiarToolBarmodulo" name="imgCopiarToolBarmodulo" title="Copiar Modulo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdmoduloDuplicarToolBar">
										<img id="imgDuplicarToolBarmodulo" name="imgDuplicarToolBarmodulo" title="Duplicar Modulo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(modulo_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdmoduloRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarmodulo" name="imgRecargarInformacionToolBarmodulo" title="Recargar Modulo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdmoduloAnterioresToolBar">
										<img id="imgAnterioresToolBarmodulo" name="imgAnterioresToolBarmodulo" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdmoduloSiguientesToolBar">
										<img id="imgSiguientesToolBarmodulo" name="imgSiguientesToolBarmodulo" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdmoduloAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarmodulo" name="imgAbrirOrderByToolBarmodulo" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((modulo_web::$STR_ES_RELACIONADO=='false' && modulo_web::$STR_ES_RELACIONES=='false') || modulo_web::$STR_ES_BUSQUEDA=='true'  || modulo_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdmoduloCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarmodulo" name="imgCerrarPaginaToolBarmodulo" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trmoduloCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedamodulo" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedamodulo',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trmoduloCabeceraBusquedas/super -->

		<tr id="trBusquedamodulo" class="busqueda" style="display:table-row">
			<td id="tdBusquedamodulo" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedamodulo" name="frmBusquedamodulo">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedamodulo" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trmoduloBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(modulo_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idpaquete" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idpaquete"> Por Paquete</a></li>
						<li id="listrVisibleFK_Idsistema" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idsistema"> Por Sistema</a></li>
						<li id="listrVisibleFK_Idtipo_tecla_mascara" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_tecla_mascara"> Por Tipo Tecla Mascara</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idpaquete">
					<table id="tblstrVisibleFK_Idpaquete" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Paquete</span>
						</td>
						<td align="center">
							<select id="FK_Idpaquete-cmbid_paquete" name="FK_Idpaquete-cmbid_paquete" title="Paquete" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarmoduloFK_Idpaquete" name="btnBuscarmoduloFK_Idpaquete" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idsistema">
					<table id="tblstrVisibleFK_Idsistema" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Sistema</span>
						</td>
						<td align="center">
							<select id="FK_Idsistema-cmbid_sistema" name="FK_Idsistema-cmbid_sistema" title="Sistema" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarmoduloFK_Idsistema" name="btnBuscarmoduloFK_Idsistema" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_tecla_mascara">
					<table id="tblstrVisibleFK_Idtipo_tecla_mascara" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Tipo Tecla Mascara</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_tecla_mascara-cmbid_tipo_tecla_mascara" name="FK_Idtipo_tecla_mascara-cmbid_tipo_tecla_mascara" title="Tipo Tecla Mascara" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarmoduloFK_Idtipo_tecla_mascara" name="btnBuscarmoduloFK_Idtipo_tecla_mascara" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarmodulo" style="display:table-row">
					<td id="tdParamsBuscarmodulo">
		<?php if(modulo_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarmodulo">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosmodulo" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosmodulo"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosmodulo" name="ParamsBuscar-txtNumeroRegistrosmodulo" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionmodulo">
							<td id="tdGenerarReportemodulo" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosmodulo" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosmodulo" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionmodulo" name="btnRecargarInformacionmodulo" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginamodulo" name="btnImprimirPaginamodulo" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*modulo_web::$STR_ES_BUSQUEDA=='false'  &&*/ modulo_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBymodulo">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBymodulo" name="btnOrderBymodulo" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(modulo_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdmoduloConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosmodulo -->

							</td><!-- tdGenerarReportemodulo -->
						</tr><!-- trRecargarInformacionmodulo -->
					</table><!-- tblParamsBuscarNumeroRegistrosmodulo -->
				</div> <!-- divParamsBuscarmodulo -->
		<?php } ?>
				</td> <!-- tdParamsBuscarmodulo -->
				</tr><!-- trParamsBuscarmodulo -->
				</table> <!-- tblBusquedamodulo -->
				</form> <!-- frmBusquedamodulo -->
				

			</td> <!-- tdBusquedamodulo -->
		</tr> <!-- trBusquedamodulo/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(modulo_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divmoduloPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblmoduloPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmmoduloAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnmoduloAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="modulo_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnmoduloAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmmoduloAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblmoduloPopupAjaxWebPart -->
		</div> <!-- divmoduloPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(modulo_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trmoduloTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdamodulo"></a>
		<img id="imgTablaParaDerechamodulo" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechamodulo'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdamodulo" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdamodulo'"/>
		<a id="TablaDerechamodulo"></a>
	</td>
</tr> <!-- trmoduloTablaNavegacion/super -->
<?php } ?>

<tr id="trmoduloTablaDatos">
	<td colspan="3" id="htmlTableCellmodulo">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosmodulosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trmoduloTablaDatos/super -->
		
		
		<tr id="trmoduloPaginacion" style="display:table-row">
			<td id="tdmoduloPaginacion" align="left">
				<div id="divmoduloPaginacionAjaxWebPart">
				<form id="frmPaginacionmodulo" name="frmPaginacionmodulo">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionmodulo" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(modulo_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkmodulo" name="btnSeleccionarLoteFkmodulo" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(modulo_web::$STR_ES_RELACIONADO=='false' /*&& modulo_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresmodulo" name="btnAnterioresmodulo" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(modulo_web::$STR_ES_BUSQUEDA=='false' && modulo_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdmoduloNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararmodulo" name="btnNuevoTablaPrepararmodulo" title="NUEVO Modulo" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablamodulo" name="ParamsPaginar-txtNumeroNuevoTablamodulo" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(modulo_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdmoduloConEditarmodulo">
							<label>
								<input id="ParamsBuscar-chbConEditarmodulo" name="ParamsBuscar-chbConEditarmodulo" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(modulo_web::$STR_ES_RELACIONADO=='false'/* && modulo_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesmodulo" name="btnSiguientesmodulo" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionmodulo -->
				</form> <!-- frmPaginacionmodulo -->
				<form id="frmNuevoPrepararmodulo" name="frmNuevoPrepararmodulo">
				<table id="tblNuevoPrepararmodulo" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trmoduloNuevo" height="10">
						<?php if(modulo_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdmoduloNuevo" align="center">
							<input type="button" id="btnNuevoPrepararmodulo" name="btnNuevoPrepararmodulo" title="NUEVO Modulo" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdmoduloGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosmodulo" name="btnGuardarCambiosmodulo" title="GUARDAR Modulo" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(modulo_web::$STR_ES_RELACIONADO=='false' && modulo_web::$STR_ES_RELACIONES=='false' && modulo_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdmoduloDuplicar" align="center">
							<input type="button" id="btnDuplicarmodulo" name="btnDuplicarmodulo" title="DUPLICAR Modulo" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdmoduloCopiar" align="center">
							<input type="button" id="btnCopiarmodulo" name="btnCopiarmodulo" title="COPIAR Modulo" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(modulo_web::$STR_ES_RELACIONADO=='false' && ((modulo_web::$STR_ES_RELACIONADO=='false' && modulo_web::$STR_ES_RELACIONES=='false') || modulo_web::$STR_ES_BUSQUEDA=='true'  || modulo_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdmoduloCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginamodulo" name="btnCerrarPaginamodulo" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararmodulo -->
				</form> <!-- frmNuevoPrepararmodulo -->
				</div> <!-- divmoduloPaginacionAjaxWebPart -->
			</td> <!-- tdmoduloPaginacion -->
		</tr> <!-- trmoduloPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(modulo_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesmoduloAjaxWebPart">
			<td id="tdAccionesRelacionesmoduloAjaxWebPart">
				<div id="divAccionesRelacionesmoduloAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesmoduloAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesmoduloAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBymodulo">
			<td id="tdOrderBymodulo">
				<form id="frmOrderBymodulo" name="frmOrderBymodulo">
					<div id="divOrderBymoduloAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBymodulo -->
		</tr> <!-- trOrderBymodulo/super -->
			
		
		
		
		
		
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
			
				import {modulo_webcontrol,modulo_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/modulo/js/webcontrol/modulo_webcontrol.js?random=1';
				
				modulo_webcontrol1.setmodulo_constante(window.modulo_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(modulo_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

