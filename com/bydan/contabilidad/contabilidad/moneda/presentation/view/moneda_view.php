<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\moneda\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Moneda Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/moneda/util/moneda_carga.php');
	use com\bydan\contabilidad\contabilidad\moneda\util\moneda_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/moneda/presentation/view/moneda_web.php');
	//use com\bydan\contabilidad\contabilidad\moneda\presentation\view\moneda_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	moneda_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	moneda_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$moneda_web1= new moneda_web();	
	$moneda_web1->cargarDatosGenerales();
	
	//$moduloActual=$moneda_web1->moduloActual;
	//$usuarioActual=$moneda_web1->usuarioActual;
	//$sessionBase=$moneda_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$moneda_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/moneda/js/templating/moneda_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/moneda/js/templating/moneda_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/moneda/js/templating/moneda_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/moneda/js/templating/moneda_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/moneda/js/templating/moneda_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			moneda_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					moneda_web::$GET_POST=$_GET;
				} else {
					moneda_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			moneda_web::$STR_NOMBRE_PAGINA = 'moneda_view.php';
			moneda_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			moneda_web::$BIT_ES_PAGINA_FORM = 'false';
				
			moneda_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {moneda_constante,moneda_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/moneda/js/util/moneda_constante.js?random=1';
			import {moneda_funcion,moneda_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/moneda/js/util/moneda_funcion.js?random=1';
			
			let moneda_constante2 = new moneda_constante();
			
			moneda_constante2.STR_NOMBRE_PAGINA="<?php echo(moneda_web::$STR_NOMBRE_PAGINA); ?>";
			moneda_constante2.STR_TYPE_ON_LOADmoneda="<?php echo(moneda_web::$STR_TYPE_ONLOAD); ?>";
			moneda_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(moneda_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			moneda_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(moneda_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			moneda_constante2.STR_ACTION="<?php echo(moneda_web::$STR_ACTION); ?>";
			moneda_constante2.STR_ES_POPUP="<?php echo(moneda_web::$STR_ES_POPUP); ?>";
			moneda_constante2.STR_ES_BUSQUEDA="<?php echo(moneda_web::$STR_ES_BUSQUEDA); ?>";
			moneda_constante2.STR_FUNCION_JS="<?php echo(moneda_web::$STR_FUNCION_JS); ?>";
			moneda_constante2.BIG_ID_ACTUAL="<?php echo(moneda_web::$BIG_ID_ACTUAL); ?>";
			moneda_constante2.BIG_ID_OPCION="<?php echo(moneda_web::$BIG_ID_OPCION); ?>";
			moneda_constante2.STR_OBJETO_JS="<?php echo(moneda_web::$STR_OBJETO_JS); ?>";
			moneda_constante2.STR_ES_RELACIONES="<?php echo(moneda_web::$STR_ES_RELACIONES); ?>";
			moneda_constante2.STR_ES_RELACIONADO="<?php echo(moneda_web::$STR_ES_RELACIONADO); ?>";
			moneda_constante2.STR_ES_SUB_PAGINA="<?php echo(moneda_web::$STR_ES_SUB_PAGINA); ?>";
			moneda_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(moneda_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			moneda_constante2.BIT_ES_PAGINA_FORM=<?php echo(moneda_web::$BIT_ES_PAGINA_FORM); ?>;
			moneda_constante2.STR_SUFIJO="<?php echo(moneda_web::$STR_SUF); ?>";//moneda
			moneda_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(moneda_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//moneda
			
			moneda_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(moneda_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			moneda_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($moneda_web1->moduloActual->getnombre()); ?>";
			moneda_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(moneda_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			moneda_constante2.BIT_ES_LOAD_NORMAL=true;
			/*moneda_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			moneda_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.moneda_constante2 = moneda_constante2;
			
		</script>
		
		<?php if(moneda_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.moneda_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.moneda_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="monedaActual" ></a>
	
	<div id="divResumenmonedaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(moneda_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(moneda_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(moneda_web::$STR_ES_BUSQUEDA=='false' && moneda_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(moneda_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(moneda_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(moneda_web::$STR_ES_RELACIONADO=='false' && moneda_web::$STR_ES_POPUP=='false' && moneda_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdmonedaNuevoToolBar">
										<img id="imgNuevoToolBarmoneda" name="imgNuevoToolBarmoneda" title="Nuevo Moneda" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(moneda_web::$STR_ES_BUSQUEDA=='false' && moneda_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdmonedaNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarmoneda" name="imgNuevoGuardarCambiosToolBarmoneda" title="Nuevo TABLA Moneda" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(moneda_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdmonedaGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarmoneda" name="imgGuardarCambiosToolBarmoneda" title="Guardar Moneda" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(moneda_web::$STR_ES_RELACIONADO=='false' && moneda_web::$STR_ES_RELACIONES=='false' && moneda_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdmonedaCopiarToolBar">
										<img id="imgCopiarToolBarmoneda" name="imgCopiarToolBarmoneda" title="Copiar Moneda" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdmonedaDuplicarToolBar">
										<img id="imgDuplicarToolBarmoneda" name="imgDuplicarToolBarmoneda" title="Duplicar Moneda" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(moneda_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdmonedaRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarmoneda" name="imgRecargarInformacionToolBarmoneda" title="Recargar Moneda" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdmonedaAnterioresToolBar">
										<img id="imgAnterioresToolBarmoneda" name="imgAnterioresToolBarmoneda" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdmonedaSiguientesToolBar">
										<img id="imgSiguientesToolBarmoneda" name="imgSiguientesToolBarmoneda" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdmonedaAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarmoneda" name="imgAbrirOrderByToolBarmoneda" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((moneda_web::$STR_ES_RELACIONADO=='false' && moneda_web::$STR_ES_RELACIONES=='false') || moneda_web::$STR_ES_BUSQUEDA=='true'  || moneda_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdmonedaCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarmoneda" name="imgCerrarPaginaToolBarmoneda" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trmonedaCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedamoneda" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedamoneda',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trmonedaCabeceraBusquedas/super -->

		<tr id="trBusquedamoneda" class="busqueda" style="display:table-row">
			<td id="tdBusquedamoneda" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedamoneda" name="frmBusquedamoneda">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedamoneda" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trmonedaBusquedas" class="busqueda" style="display:none"><td>
				<?php if(moneda_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarmoneda" style="display:table-row">
					<td id="tdParamsBuscarmoneda">
		<?php if(moneda_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarmoneda">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosmoneda" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosmoneda"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosmoneda" name="ParamsBuscar-txtNumeroRegistrosmoneda" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionmoneda">
							<td id="tdGenerarReportemoneda" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosmoneda" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosmoneda" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionmoneda" name="btnRecargarInformacionmoneda" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginamoneda" name="btnImprimirPaginamoneda" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*moneda_web::$STR_ES_BUSQUEDA=='false'  &&*/ moneda_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBymoneda">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBymoneda" name="btnOrderBymoneda" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelmoneda" name="btnOrderByRelmoneda" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(moneda_web::$STR_ES_RELACIONES=='false' && moneda_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(moneda_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdmonedaConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosmoneda -->

							</td><!-- tdGenerarReportemoneda -->
						</tr><!-- trRecargarInformacionmoneda -->
					</table><!-- tblParamsBuscarNumeroRegistrosmoneda -->
				</div> <!-- divParamsBuscarmoneda -->
		<?php } ?>
				</td> <!-- tdParamsBuscarmoneda -->
				</tr><!-- trParamsBuscarmoneda -->
				</table> <!-- tblBusquedamoneda -->
				</form> <!-- frmBusquedamoneda -->
				

			</td> <!-- tdBusquedamoneda -->
		</tr> <!-- trBusquedamoneda/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(moneda_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divmonedaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblmonedaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmmonedaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnmonedaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="moneda_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnmonedaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmmonedaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblmonedaPopupAjaxWebPart -->
		</div> <!-- divmonedaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(moneda_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trmonedaTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdamoneda"></a>
		<img id="imgTablaParaDerechamoneda" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechamoneda'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdamoneda" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdamoneda'"/>
		<a id="TablaDerechamoneda"></a>
	</td>
</tr> <!-- trmonedaTablaNavegacion/super -->
<?php } ?>

<tr id="trmonedaTablaDatos">
	<td colspan="3" id="htmlTableCellmoneda">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosmonedasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trmonedaTablaDatos/super -->
		
		
		<tr id="trmonedaPaginacion" style="display:table-row">
			<td id="tdmonedaPaginacion" align="center">
				<div id="divmonedaPaginacionAjaxWebPart">
				<form id="frmPaginacionmoneda" name="frmPaginacionmoneda">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionmoneda" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(moneda_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkmoneda" name="btnSeleccionarLoteFkmoneda" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(moneda_web::$STR_ES_RELACIONADO=='false' /*&& moneda_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresmoneda" name="btnAnterioresmoneda" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(moneda_web::$STR_ES_BUSQUEDA=='false' && moneda_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdmonedaNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararmoneda" name="btnNuevoTablaPrepararmoneda" title="NUEVO Moneda" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablamoneda" name="ParamsPaginar-txtNumeroNuevoTablamoneda" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(moneda_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdmonedaConEditarmoneda">
							<label>
								<input id="ParamsBuscar-chbConEditarmoneda" name="ParamsBuscar-chbConEditarmoneda" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(moneda_web::$STR_ES_RELACIONADO=='false'/* && moneda_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesmoneda" name="btnSiguientesmoneda" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionmoneda -->
				</form> <!-- frmPaginacionmoneda -->
				<form id="frmNuevoPrepararmoneda" name="frmNuevoPrepararmoneda">
				<table id="tblNuevoPrepararmoneda" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trmonedaNuevo" height="10">
						<?php if(moneda_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdmonedaNuevo" align="center">
							<input type="button" id="btnNuevoPrepararmoneda" name="btnNuevoPrepararmoneda" title="NUEVO Moneda" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdmonedaGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosmoneda" name="btnGuardarCambiosmoneda" title="GUARDAR Moneda" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(moneda_web::$STR_ES_RELACIONADO=='false' && moneda_web::$STR_ES_RELACIONES=='false' && moneda_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdmonedaDuplicar" align="center">
							<input type="button" id="btnDuplicarmoneda" name="btnDuplicarmoneda" title="DUPLICAR Moneda" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdmonedaCopiar" align="center">
							<input type="button" id="btnCopiarmoneda" name="btnCopiarmoneda" title="COPIAR Moneda" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(moneda_web::$STR_ES_RELACIONADO=='false' && ((moneda_web::$STR_ES_RELACIONADO=='false' && moneda_web::$STR_ES_RELACIONES=='false') || moneda_web::$STR_ES_BUSQUEDA=='true'  || moneda_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdmonedaCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginamoneda" name="btnCerrarPaginamoneda" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararmoneda -->
				</form> <!-- frmNuevoPrepararmoneda -->
				</div> <!-- divmonedaPaginacionAjaxWebPart -->
			</td> <!-- tdmonedaPaginacion -->
		</tr> <!-- trmonedaPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(moneda_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesmonedaAjaxWebPart">
			<td id="tdAccionesRelacionesmonedaAjaxWebPart">
				<div id="divAccionesRelacionesmonedaAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesmonedaAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesmonedaAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBymoneda">
			<td id="tdOrderBymoneda">
				<form id="frmOrderBymoneda" name="frmOrderBymoneda">
					<div id="divOrderBymonedaAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelmoneda" name="frmOrderByRelmoneda">
					<div id="divOrderByRelmonedaAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBymoneda -->
		</tr> <!-- trOrderBymoneda/super -->
			
		
		
		
		
		
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
			
				import {moneda_webcontrol,moneda_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/moneda/js/webcontrol/moneda_webcontrol.js?random=1';
				
				moneda_webcontrol1.setmoneda_constante(window.moneda_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(moneda_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

