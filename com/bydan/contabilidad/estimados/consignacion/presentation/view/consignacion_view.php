<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\estimados\consignacion\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Consignacion Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/estimados/consignacion/util/consignacion_carga.php');
	use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
	
	//include_once('com/bydan/contabilidad/estimados/consignacion/presentation/view/consignacion_web.php');
	//use com\bydan\contabilidad\estimados\consignacion\presentation\view\consignacion_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	consignacion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	consignacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$consignacion_web1= new consignacion_web();	
	$consignacion_web1->cargarDatosGenerales();
	
	//$moduloActual=$consignacion_web1->moduloActual;
	//$usuarioActual=$consignacion_web1->usuarioActual;
	//$sessionBase=$consignacion_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$consignacion_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/consignacion/js/templating/consignacion_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/consignacion/js/templating/consignacion_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/consignacion/js/templating/consignacion_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/consignacion/js/templating/consignacion_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/consignacion/js/templating/consignacion_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			consignacion_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					consignacion_web::$GET_POST=$_GET;
				} else {
					consignacion_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			consignacion_web::$STR_NOMBRE_PAGINA = 'consignacion_view.php';
			consignacion_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			consignacion_web::$BIT_ES_PAGINA_FORM = 'false';
				
			consignacion_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {consignacion_constante,consignacion_constante1} from './webroot/js/JavaScript/contabilidad/estimados/consignacion/js/util/consignacion_constante.js?random=1';
			import {consignacion_funcion,consignacion_funcion1} from './webroot/js/JavaScript/contabilidad/estimados/consignacion/js/util/consignacion_funcion.js?random=1';
			
			let consignacion_constante2 = new consignacion_constante();
			
			consignacion_constante2.STR_NOMBRE_PAGINA="<?php echo(consignacion_web::$STR_NOMBRE_PAGINA); ?>";
			consignacion_constante2.STR_TYPE_ON_LOADconsignacion="<?php echo(consignacion_web::$STR_TYPE_ONLOAD); ?>";
			consignacion_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(consignacion_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			consignacion_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(consignacion_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			consignacion_constante2.STR_ACTION="<?php echo(consignacion_web::$STR_ACTION); ?>";
			consignacion_constante2.STR_ES_POPUP="<?php echo(consignacion_web::$STR_ES_POPUP); ?>";
			consignacion_constante2.STR_ES_BUSQUEDA="<?php echo(consignacion_web::$STR_ES_BUSQUEDA); ?>";
			consignacion_constante2.STR_FUNCION_JS="<?php echo(consignacion_web::$STR_FUNCION_JS); ?>";
			consignacion_constante2.BIG_ID_ACTUAL="<?php echo(consignacion_web::$BIG_ID_ACTUAL); ?>";
			consignacion_constante2.BIG_ID_OPCION="<?php echo(consignacion_web::$BIG_ID_OPCION); ?>";
			consignacion_constante2.STR_OBJETO_JS="<?php echo(consignacion_web::$STR_OBJETO_JS); ?>";
			consignacion_constante2.STR_ES_RELACIONES="<?php echo(consignacion_web::$STR_ES_RELACIONES); ?>";
			consignacion_constante2.STR_ES_RELACIONADO="<?php echo(consignacion_web::$STR_ES_RELACIONADO); ?>";
			consignacion_constante2.STR_ES_SUB_PAGINA="<?php echo(consignacion_web::$STR_ES_SUB_PAGINA); ?>";
			consignacion_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(consignacion_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			consignacion_constante2.BIT_ES_PAGINA_FORM=<?php echo(consignacion_web::$BIT_ES_PAGINA_FORM); ?>;
			consignacion_constante2.STR_SUFIJO="<?php echo(consignacion_web::$STR_SUF); ?>";//consignacion
			consignacion_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(consignacion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//consignacion
			
			consignacion_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(consignacion_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			consignacion_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($consignacion_web1->moduloActual->getnombre()); ?>";
			consignacion_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(consignacion_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			consignacion_constante2.BIT_ES_LOAD_NORMAL=true;
			/*consignacion_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			consignacion_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.consignacion_constante2 = consignacion_constante2;
			
		</script>
		
		<?php if(consignacion_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.consignacion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.consignacion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="consignacionActual" ></a>
	
	<div id="divResumenconsignacionActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(consignacion_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(consignacion_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(consignacion_web::$STR_ES_BUSQUEDA=='false' && consignacion_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(consignacion_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(consignacion_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(consignacion_web::$STR_ES_RELACIONADO=='false' && consignacion_web::$STR_ES_POPUP=='false' && consignacion_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdconsignacionNuevoToolBar">
										<img id="imgNuevoToolBarconsignacion" name="imgNuevoToolBarconsignacion" title="Nuevo Consignacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(consignacion_web::$STR_ES_BUSQUEDA=='false' && consignacion_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdconsignacionNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarconsignacion" name="imgNuevoGuardarCambiosToolBarconsignacion" title="Nuevo TABLA Consignacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(consignacion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdconsignacionGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarconsignacion" name="imgGuardarCambiosToolBarconsignacion" title="Guardar Consignacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(consignacion_web::$STR_ES_RELACIONADO=='false' && consignacion_web::$STR_ES_RELACIONES=='false' && consignacion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdconsignacionCopiarToolBar">
										<img id="imgCopiarToolBarconsignacion" name="imgCopiarToolBarconsignacion" title="Copiar Consignacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdconsignacionDuplicarToolBar">
										<img id="imgDuplicarToolBarconsignacion" name="imgDuplicarToolBarconsignacion" title="Duplicar Consignacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(consignacion_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdconsignacionRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarconsignacion" name="imgRecargarInformacionToolBarconsignacion" title="Recargar Consignacion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdconsignacionAnterioresToolBar">
										<img id="imgAnterioresToolBarconsignacion" name="imgAnterioresToolBarconsignacion" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdconsignacionSiguientesToolBar">
										<img id="imgSiguientesToolBarconsignacion" name="imgSiguientesToolBarconsignacion" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdconsignacionAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarconsignacion" name="imgAbrirOrderByToolBarconsignacion" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((consignacion_web::$STR_ES_RELACIONADO=='false' && consignacion_web::$STR_ES_RELACIONES=='false') || consignacion_web::$STR_ES_BUSQUEDA=='true'  || consignacion_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdconsignacionCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarconsignacion" name="imgCerrarPaginaToolBarconsignacion" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trconsignacionCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaconsignacion" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaconsignacion',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trconsignacionCabeceraBusquedas/super -->

		<tr id="trBusquedaconsignacion" class="busqueda" style="display:table-row">
			<td id="tdBusquedaconsignacion" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaconsignacion" name="frmBusquedaconsignacion">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaconsignacion" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trconsignacionBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(consignacion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 95%">
					<ul>
						<li id="listrVisibleFK_Idasiento" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idasiento"> Por Asiento</a></li>
						<li id="listrVisibleFK_Idcliente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcliente"> Por Cliente</a></li>
						<li id="listrVisibleFK_Idestado" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado"> Por Estado</a></li>
						<li id="listrVisibleFK_Idkardex" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idkardex"> Por Kardex</a></li>
						<li id="listrVisibleFK_Idmoneda" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idmoneda"> Por Moneda</a></li>
						<li id="listrVisibleFK_Idtermino_pago" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtermino_pago"> Por Terminos Pago</a></li>
						<li id="listrVisibleFK_Idvendedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idvendedor"> Por Vendedor</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idasiento">
					<table id="tblstrVisibleFK_Idasiento" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Asiento</span>
						</td>
						<td align="center">
							<select id="FK_Idasiento-cmbid_asiento" name="FK_Idasiento-cmbid_asiento" title="Asiento" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarconsignacionFK_Idasiento" name="btnBuscarconsignacionFK_Idasiento" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcliente">
					<table id="tblstrVisibleFK_Idcliente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cliente</span>
						</td>
						<td align="center">
							<select id="FK_Idcliente-cmbid_cliente" name="FK_Idcliente-cmbid_cliente" title="Cliente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarconsignacionFK_Idcliente" name="btnBuscarconsignacionFK_Idcliente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idestado">
					<table id="tblstrVisibleFK_Idestado" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Estado</span>
						</td>
						<td align="center">
							<select id="FK_Idestado-cmbid_estado" name="FK_Idestado-cmbid_estado" title="Estado" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarconsignacionFK_Idestado" name="btnBuscarconsignacionFK_Idestado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idkardex">
					<table id="tblstrVisibleFK_Idkardex" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Kardex</span>
						</td>
						<td align="center">
							<select id="FK_Idkardex-cmbid_kardex" name="FK_Idkardex-cmbid_kardex" title="Kardex" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarconsignacionFK_Idkardex" name="btnBuscarconsignacionFK_Idkardex" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idmoneda">
					<table id="tblstrVisibleFK_Idmoneda" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Moneda</span>
						</td>
						<td align="center">
							<select id="FK_Idmoneda-cmbid_moneda" name="FK_Idmoneda-cmbid_moneda" title="Moneda" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarconsignacionFK_Idmoneda" name="btnBuscarconsignacionFK_Idmoneda" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtermino_pago">
					<table id="tblstrVisibleFK_Idtermino_pago" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Terminos Pago</span>
						</td>
						<td align="center">
							<select id="FK_Idtermino_pago-cmbid_termino_pago_cliente" name="FK_Idtermino_pago-cmbid_termino_pago_cliente" title="Terminos Pago" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarconsignacionFK_Idtermino_pago" name="btnBuscarconsignacionFK_Idtermino_pago" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idvendedor">
					<table id="tblstrVisibleFK_Idvendedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Vendedor</span>
						</td>
						<td align="center">
							<select id="FK_Idvendedor-cmbid_vendedor" name="FK_Idvendedor-cmbid_vendedor" title="Vendedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarconsignacionFK_Idvendedor" name="btnBuscarconsignacionFK_Idvendedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarconsignacion" style="display:table-row">
					<td id="tdParamsBuscarconsignacion">
		<?php if(consignacion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarconsignacion">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosconsignacion" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosconsignacion"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosconsignacion" name="ParamsBuscar-txtNumeroRegistrosconsignacion" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionconsignacion">
							<td id="tdGenerarReporteconsignacion" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosconsignacion" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosconsignacion" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionconsignacion" name="btnRecargarInformacionconsignacion" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaconsignacion" name="btnImprimirPaginaconsignacion" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*consignacion_web::$STR_ES_BUSQUEDA=='false'  &&*/ consignacion_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByconsignacion">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByconsignacion" name="btnOrderByconsignacion" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelconsignacion" name="btnOrderByRelconsignacion" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(consignacion_web::$STR_ES_RELACIONES=='false' && consignacion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(consignacion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdconsignacionConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosconsignacion -->

							</td><!-- tdGenerarReporteconsignacion -->
						</tr><!-- trRecargarInformacionconsignacion -->
					</table><!-- tblParamsBuscarNumeroRegistrosconsignacion -->
				</div> <!-- divParamsBuscarconsignacion -->
		<?php } ?>
				</td> <!-- tdParamsBuscarconsignacion -->
				</tr><!-- trParamsBuscarconsignacion -->
				</table> <!-- tblBusquedaconsignacion -->
				</form> <!-- frmBusquedaconsignacion -->
				

			</td> <!-- tdBusquedaconsignacion -->
		</tr> <!-- trBusquedaconsignacion/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(consignacion_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divconsignacionPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblconsignacionPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmconsignacionAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnconsignacionAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="consignacion_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnconsignacionAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmconsignacionAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblconsignacionPopupAjaxWebPart -->
		</div> <!-- divconsignacionPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(consignacion_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trconsignacionTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaconsignacion"></a>
		<img id="imgTablaParaDerechaconsignacion" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaconsignacion'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaconsignacion" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaconsignacion'"/>
		<a id="TablaDerechaconsignacion"></a>
	</td>
</tr> <!-- trconsignacionTablaNavegacion/super -->
<?php } ?>

<tr id="trconsignacionTablaDatos">
	<td colspan="3" id="htmlTableCellconsignacion">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosconsignacionsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trconsignacionTablaDatos/super -->
		
		
		<tr id="trconsignacionPaginacion" style="display:table-row">
			<td id="tdconsignacionPaginacion" align="left">
				<div id="divconsignacionPaginacionAjaxWebPart">
				<form id="frmPaginacionconsignacion" name="frmPaginacionconsignacion">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionconsignacion" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(consignacion_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkconsignacion" name="btnSeleccionarLoteFkconsignacion" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(consignacion_web::$STR_ES_RELACIONADO=='false' /*&& consignacion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresconsignacion" name="btnAnterioresconsignacion" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(consignacion_web::$STR_ES_BUSQUEDA=='false' && consignacion_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdconsignacionNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararconsignacion" name="btnNuevoTablaPrepararconsignacion" title="NUEVO Consignacion" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaconsignacion" name="ParamsPaginar-txtNumeroNuevoTablaconsignacion" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(consignacion_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdconsignacionConEditarconsignacion">
							<label>
								<input id="ParamsBuscar-chbConEditarconsignacion" name="ParamsBuscar-chbConEditarconsignacion" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(consignacion_web::$STR_ES_RELACIONADO=='false'/* && consignacion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesconsignacion" name="btnSiguientesconsignacion" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionconsignacion -->
				</form> <!-- frmPaginacionconsignacion -->
				<form id="frmNuevoPrepararconsignacion" name="frmNuevoPrepararconsignacion">
				<table id="tblNuevoPrepararconsignacion" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trconsignacionNuevo" height="10">
						<?php if(consignacion_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdconsignacionNuevo" align="center">
							<input type="button" id="btnNuevoPrepararconsignacion" name="btnNuevoPrepararconsignacion" title="NUEVO Consignacion" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdconsignacionGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosconsignacion" name="btnGuardarCambiosconsignacion" title="GUARDAR Consignacion" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(consignacion_web::$STR_ES_RELACIONADO=='false' && consignacion_web::$STR_ES_RELACIONES=='false' && consignacion_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdconsignacionDuplicar" align="center">
							<input type="button" id="btnDuplicarconsignacion" name="btnDuplicarconsignacion" title="DUPLICAR Consignacion" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdconsignacionCopiar" align="center">
							<input type="button" id="btnCopiarconsignacion" name="btnCopiarconsignacion" title="COPIAR Consignacion" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(consignacion_web::$STR_ES_RELACIONADO=='false' && ((consignacion_web::$STR_ES_RELACIONADO=='false' && consignacion_web::$STR_ES_RELACIONES=='false') || consignacion_web::$STR_ES_BUSQUEDA=='true'  || consignacion_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdconsignacionCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaconsignacion" name="btnCerrarPaginaconsignacion" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararconsignacion -->
				</form> <!-- frmNuevoPrepararconsignacion -->
				</div> <!-- divconsignacionPaginacionAjaxWebPart -->
			</td> <!-- tdconsignacionPaginacion -->
		</tr> <!-- trconsignacionPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(consignacion_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesconsignacionAjaxWebPart">
			<td id="tdAccionesRelacionesconsignacionAjaxWebPart">
				<div id="divAccionesRelacionesconsignacionAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesconsignacionAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesconsignacionAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByconsignacion">
			<td id="tdOrderByconsignacion">
				<form id="frmOrderByconsignacion" name="frmOrderByconsignacion">
					<div id="divOrderByconsignacionAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelconsignacion" name="frmOrderByRelconsignacion">
					<div id="divOrderByRelconsignacionAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByconsignacion -->
		</tr> <!-- trOrderByconsignacion/super -->
			
		
		
		
		
		
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
			
				import {consignacion_webcontrol,consignacion_webcontrol1} from './webroot/js/JavaScript/contabilidad/estimados/consignacion/js/webcontrol/consignacion_webcontrol.js?random=1';
				
				consignacion_webcontrol1.setconsignacion_constante(window.consignacion_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(consignacion_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

