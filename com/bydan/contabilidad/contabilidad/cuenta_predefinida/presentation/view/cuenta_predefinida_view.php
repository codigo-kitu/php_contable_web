<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cuentas Predefinidas Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/cuenta_predefinida/util/cuenta_predefinida_carga.php');
	use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/cuenta_predefinida/presentation/view/cuenta_predefinida_web.php');
	//use com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\view\cuenta_predefinida_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cuenta_predefinida_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cuenta_predefinida_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cuenta_predefinida_web1= new cuenta_predefinida_web();	
	$cuenta_predefinida_web1->cargarDatosGenerales();
	
	//$moduloActual=$cuenta_predefinida_web1->moduloActual;
	//$usuarioActual=$cuenta_predefinida_web1->usuarioActual;
	//$sessionBase=$cuenta_predefinida_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cuenta_predefinida_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cuenta_predefinida/js/templating/cuenta_predefinida_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cuenta_predefinida/js/templating/cuenta_predefinida_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cuenta_predefinida/js/templating/cuenta_predefinida_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cuenta_predefinida/js/templating/cuenta_predefinida_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			cuenta_predefinida_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cuenta_predefinida_web::$GET_POST=$_GET;
				} else {
					cuenta_predefinida_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cuenta_predefinida_web::$STR_NOMBRE_PAGINA = 'cuenta_predefinida_view.php';
			cuenta_predefinida_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			cuenta_predefinida_web::$BIT_ES_PAGINA_FORM = 'false';
				
			cuenta_predefinida_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cuenta_predefinida_constante,cuenta_predefinida_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/cuenta_predefinida/js/util/cuenta_predefinida_constante.js?random=1';
			import {cuenta_predefinida_funcion,cuenta_predefinida_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/cuenta_predefinida/js/util/cuenta_predefinida_funcion.js?random=1';
			
			let cuenta_predefinida_constante2 = new cuenta_predefinida_constante();
			
			cuenta_predefinida_constante2.STR_NOMBRE_PAGINA="<?php echo(cuenta_predefinida_web::$STR_NOMBRE_PAGINA); ?>";
			cuenta_predefinida_constante2.STR_TYPE_ON_LOADcuenta_predefinida="<?php echo(cuenta_predefinida_web::$STR_TYPE_ONLOAD); ?>";
			cuenta_predefinida_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cuenta_predefinida_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cuenta_predefinida_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cuenta_predefinida_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cuenta_predefinida_constante2.STR_ACTION="<?php echo(cuenta_predefinida_web::$STR_ACTION); ?>";
			cuenta_predefinida_constante2.STR_ES_POPUP="<?php echo(cuenta_predefinida_web::$STR_ES_POPUP); ?>";
			cuenta_predefinida_constante2.STR_ES_BUSQUEDA="<?php echo(cuenta_predefinida_web::$STR_ES_BUSQUEDA); ?>";
			cuenta_predefinida_constante2.STR_FUNCION_JS="<?php echo(cuenta_predefinida_web::$STR_FUNCION_JS); ?>";
			cuenta_predefinida_constante2.BIG_ID_ACTUAL="<?php echo(cuenta_predefinida_web::$BIG_ID_ACTUAL); ?>";
			cuenta_predefinida_constante2.BIG_ID_OPCION="<?php echo(cuenta_predefinida_web::$BIG_ID_OPCION); ?>";
			cuenta_predefinida_constante2.STR_OBJETO_JS="<?php echo(cuenta_predefinida_web::$STR_OBJETO_JS); ?>";
			cuenta_predefinida_constante2.STR_ES_RELACIONES="<?php echo(cuenta_predefinida_web::$STR_ES_RELACIONES); ?>";
			cuenta_predefinida_constante2.STR_ES_RELACIONADO="<?php echo(cuenta_predefinida_web::$STR_ES_RELACIONADO); ?>";
			cuenta_predefinida_constante2.STR_ES_SUB_PAGINA="<?php echo(cuenta_predefinida_web::$STR_ES_SUB_PAGINA); ?>";
			cuenta_predefinida_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cuenta_predefinida_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cuenta_predefinida_constante2.BIT_ES_PAGINA_FORM=<?php echo(cuenta_predefinida_web::$BIT_ES_PAGINA_FORM); ?>;
			cuenta_predefinida_constante2.STR_SUFIJO="<?php echo(cuenta_predefinida_web::$STR_SUF); ?>";//cuenta_predefinida
			cuenta_predefinida_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cuenta_predefinida_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cuenta_predefinida
			
			cuenta_predefinida_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cuenta_predefinida_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cuenta_predefinida_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cuenta_predefinida_web1->moduloActual->getnombre()); ?>";
			cuenta_predefinida_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cuenta_predefinida_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cuenta_predefinida_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cuenta_predefinida_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cuenta_predefinida_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cuenta_predefinida_constante2 = cuenta_predefinida_constante2;
			
		</script>
		
		<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cuenta_predefinida_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cuenta_predefinida_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cuenta_predefinidaActual" ></a>
	
	<div id="divResumencuenta_predefinidaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(cuenta_predefinida_web::$STR_ES_BUSQUEDA=='false' && cuenta_predefinida_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cuenta_predefinida_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' && cuenta_predefinida_web::$STR_ES_POPUP=='false' && cuenta_predefinida_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcuenta_predefinidaNuevoToolBar">
										<img id="imgNuevoToolBarcuenta_predefinida" name="imgNuevoToolBarcuenta_predefinida" title="Nuevo Cuentas Predefinidas" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(cuenta_predefinida_web::$STR_ES_BUSQUEDA=='false' && cuenta_predefinida_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcuenta_predefinidaNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcuenta_predefinida" name="imgNuevoGuardarCambiosToolBarcuenta_predefinida" title="Nuevo TABLA Cuentas Predefinidas" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cuenta_predefinida_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcuenta_predefinidaGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcuenta_predefinida" name="imgGuardarCambiosToolBarcuenta_predefinida" title="Guardar Cuentas Predefinidas" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' && cuenta_predefinida_web::$STR_ES_RELACIONES=='false' && cuenta_predefinida_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcuenta_predefinidaCopiarToolBar">
										<img id="imgCopiarToolBarcuenta_predefinida" name="imgCopiarToolBarcuenta_predefinida" title="Copiar Cuentas Predefinidas" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcuenta_predefinidaDuplicarToolBar">
										<img id="imgDuplicarToolBarcuenta_predefinida" name="imgDuplicarToolBarcuenta_predefinida" title="Duplicar Cuentas Predefinidas" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcuenta_predefinidaRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcuenta_predefinida" name="imgRecargarInformacionToolBarcuenta_predefinida" title="Recargar Cuentas Predefinidas" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcuenta_predefinidaAnterioresToolBar">
										<img id="imgAnterioresToolBarcuenta_predefinida" name="imgAnterioresToolBarcuenta_predefinida" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcuenta_predefinidaSiguientesToolBar">
										<img id="imgSiguientesToolBarcuenta_predefinida" name="imgSiguientesToolBarcuenta_predefinida" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcuenta_predefinidaAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcuenta_predefinida" name="imgAbrirOrderByToolBarcuenta_predefinida" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' && cuenta_predefinida_web::$STR_ES_RELACIONES=='false') || cuenta_predefinida_web::$STR_ES_BUSQUEDA=='true'  || cuenta_predefinida_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcuenta_predefinidaCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcuenta_predefinida" name="imgCerrarPaginaToolBarcuenta_predefinida" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcuenta_predefinidaCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacuenta_predefinida" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacuenta_predefinida',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcuenta_predefinidaCabeceraBusquedas/super -->

		<tr id="trBusquedacuenta_predefinida" class="busqueda" style="display:table-row">
			<td id="tdBusquedacuenta_predefinida" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacuenta_predefinida" name="frmBusquedacuenta_predefinida">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacuenta_predefinida" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcuenta_predefinidaBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idtipo_cuenta" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_cuenta"> Por Tipo Cuenta</a></li>
						<li id="listrVisibleFK_Idtipo_cuenta_predefinida" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_cuenta_predefinida"> Por Tipo Cuenta Predefinida</a></li>
						<li id="listrVisibleFK_Idtipo_nivel_cuenta" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_nivel_cuenta"> Por Tipo Nivel Cuenta</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idtipo_cuenta">
					<table id="tblstrVisibleFK_Idtipo_cuenta" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Tipo Cuenta</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_cuenta-cmbid_tipo_cuenta" name="FK_Idtipo_cuenta-cmbid_tipo_cuenta" title="Tipo Cuenta" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcuenta_predefinidaFK_Idtipo_cuenta" name="btnBuscarcuenta_predefinidaFK_Idtipo_cuenta" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_cuenta_predefinida">
					<table id="tblstrVisibleFK_Idtipo_cuenta_predefinida" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Tipo Cuenta Predefinida</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_cuenta_predefinida-cmbid_tipo_cuenta_predefinida" name="FK_Idtipo_cuenta_predefinida-cmbid_tipo_cuenta_predefinida" title="Tipo Cuenta Predefinida" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcuenta_predefinidaFK_Idtipo_cuenta_predefinida" name="btnBuscarcuenta_predefinidaFK_Idtipo_cuenta_predefinida" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_nivel_cuenta">
					<table id="tblstrVisibleFK_Idtipo_nivel_cuenta" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Tipo Nivel Cuenta</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta" name="FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta" title="Tipo Nivel Cuenta" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcuenta_predefinidaFK_Idtipo_nivel_cuenta" name="btnBuscarcuenta_predefinidaFK_Idtipo_nivel_cuenta" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcuenta_predefinida" style="display:table-row">
					<td id="tdParamsBuscarcuenta_predefinida">
		<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcuenta_predefinida">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscuenta_predefinida" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscuenta_predefinida"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscuenta_predefinida" name="ParamsBuscar-txtNumeroRegistroscuenta_predefinida" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncuenta_predefinida">
							<td id="tdGenerarReportecuenta_predefinida" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscuenta_predefinida" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscuenta_predefinida" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncuenta_predefinida" name="btnRecargarInformacioncuenta_predefinida" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacuenta_predefinida" name="btnImprimirPaginacuenta_predefinida" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*cuenta_predefinida_web::$STR_ES_BUSQUEDA=='false'  &&*/ cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycuenta_predefinida">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycuenta_predefinida" name="btnOrderBycuenta_predefinida" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(cuenta_predefinida_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcuenta_predefinidaConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscuenta_predefinida -->

							</td><!-- tdGenerarReportecuenta_predefinida -->
						</tr><!-- trRecargarInformacioncuenta_predefinida -->
					</table><!-- tblParamsBuscarNumeroRegistroscuenta_predefinida -->
				</div> <!-- divParamsBuscarcuenta_predefinida -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcuenta_predefinida -->
				</tr><!-- trParamsBuscarcuenta_predefinida -->
				</table> <!-- tblBusquedacuenta_predefinida -->
				</form> <!-- frmBusquedacuenta_predefinida -->
				

			</td> <!-- tdBusquedacuenta_predefinida -->
		</tr> <!-- trBusquedacuenta_predefinida/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcuenta_predefinidaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcuenta_predefinidaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcuenta_predefinidaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncuenta_predefinidaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cuenta_predefinida_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncuenta_predefinidaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcuenta_predefinidaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcuenta_predefinidaPopupAjaxWebPart -->
		</div> <!-- divcuenta_predefinidaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcuenta_predefinidaTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacuenta_predefinida"></a>
		<img id="imgTablaParaDerechacuenta_predefinida" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacuenta_predefinida'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacuenta_predefinida" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacuenta_predefinida'"/>
		<a id="TablaDerechacuenta_predefinida"></a>
	</td>
</tr> <!-- trcuenta_predefinidaTablaNavegacion/super -->
<?php } ?>

<tr id="trcuenta_predefinidaTablaDatos">
	<td colspan="3" id="htmlTableCellcuenta_predefinida">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscuenta_predefinidasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcuenta_predefinidaTablaDatos/super -->
		
		
		<tr id="trcuenta_predefinidaPaginacion" style="display:table-row">
			<td id="tdcuenta_predefinidaPaginacion" align="left">
				<div id="divcuenta_predefinidaPaginacionAjaxWebPart">
				<form id="frmPaginacioncuenta_predefinida" name="frmPaginacioncuenta_predefinida">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncuenta_predefinida" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(cuenta_predefinida_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcuenta_predefinida" name="btnSeleccionarLoteFkcuenta_predefinida" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' /*&& cuenta_predefinida_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescuenta_predefinida" name="btnAnteriorescuenta_predefinida" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(cuenta_predefinida_web::$STR_ES_BUSQUEDA=='false' && cuenta_predefinida_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcuenta_predefinidaNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcuenta_predefinida" name="btnNuevoTablaPrepararcuenta_predefinida" title="NUEVO Cuentas Predefinidas" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacuenta_predefinida" name="ParamsPaginar-txtNumeroNuevoTablacuenta_predefinida" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcuenta_predefinidaConEditarcuenta_predefinida">
							<label>
								<input id="ParamsBuscar-chbConEditarcuenta_predefinida" name="ParamsBuscar-chbConEditarcuenta_predefinida" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false'/* && cuenta_predefinida_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescuenta_predefinida" name="btnSiguientescuenta_predefinida" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncuenta_predefinida -->
				</form> <!-- frmPaginacioncuenta_predefinida -->
				<form id="frmNuevoPrepararcuenta_predefinida" name="frmNuevoPrepararcuenta_predefinida">
				<table id="tblNuevoPrepararcuenta_predefinida" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trcuenta_predefinidaNuevo" height="10">
						<?php if(cuenta_predefinida_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcuenta_predefinidaNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcuenta_predefinida" name="btnNuevoPrepararcuenta_predefinida" title="NUEVO Cuentas Predefinidas" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcuenta_predefinidaGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscuenta_predefinida" name="btnGuardarCambioscuenta_predefinida" title="GUARDAR Cuentas Predefinidas" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' && cuenta_predefinida_web::$STR_ES_RELACIONES=='false' && cuenta_predefinida_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcuenta_predefinidaDuplicar" align="center">
							<input type="button" id="btnDuplicarcuenta_predefinida" name="btnDuplicarcuenta_predefinida" title="DUPLICAR Cuentas Predefinidas" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcuenta_predefinidaCopiar" align="center">
							<input type="button" id="btnCopiarcuenta_predefinida" name="btnCopiarcuenta_predefinida" title="COPIAR Cuentas Predefinidas" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' && ((cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' && cuenta_predefinida_web::$STR_ES_RELACIONES=='false') || cuenta_predefinida_web::$STR_ES_BUSQUEDA=='true'  || cuenta_predefinida_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcuenta_predefinidaCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacuenta_predefinida" name="btnCerrarPaginacuenta_predefinida" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcuenta_predefinida -->
				</form> <!-- frmNuevoPrepararcuenta_predefinida -->
				</div> <!-- divcuenta_predefinidaPaginacionAjaxWebPart -->
			</td> <!-- tdcuenta_predefinidaPaginacion -->
		</tr> <!-- trcuenta_predefinidaPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescuenta_predefinidaAjaxWebPart">
			<td id="tdAccionesRelacionescuenta_predefinidaAjaxWebPart">
				<div id="divAccionesRelacionescuenta_predefinidaAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescuenta_predefinidaAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescuenta_predefinidaAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycuenta_predefinida">
			<td id="tdOrderBycuenta_predefinida">
				<form id="frmOrderBycuenta_predefinida" name="frmOrderBycuenta_predefinida">
					<div id="divOrderBycuenta_predefinidaAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycuenta_predefinida -->
		</tr> <!-- trOrderBycuenta_predefinida/super -->
			
		
		
		
		
		
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
			
				import {cuenta_predefinida_webcontrol,cuenta_predefinida_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/cuenta_predefinida/js/webcontrol/cuenta_predefinida_webcontrol.js?random=1';
				
				cuenta_predefinida_webcontrol1.setcuenta_predefinida_constante(window.cuenta_predefinida_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cuenta_predefinida_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

