<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cuenta Pagar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentaspagar/cuenta_pagar/util/cuenta_pagar_carga.php');
	use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
	
	//include_once('com/bydan/contabilidad/cuentaspagar/cuenta_pagar/presentation/view/cuenta_pagar_web.php');
	//use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\view\cuenta_pagar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cuenta_pagar_web1= new cuenta_pagar_web();	
	$cuenta_pagar_web1->cargarDatosGenerales();
	
	//$moduloActual=$cuenta_pagar_web1->moduloActual;
	//$usuarioActual=$cuenta_pagar_web1->usuarioActual;
	//$sessionBase=$cuenta_pagar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cuenta_pagar_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/cuenta_pagar/js/templating/cuenta_pagar_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/cuenta_pagar/js/templating/cuenta_pagar_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/cuenta_pagar/js/templating/cuenta_pagar_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/cuenta_pagar/js/templating/cuenta_pagar_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/cuenta_pagar/js/templating/cuenta_pagar_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			cuenta_pagar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cuenta_pagar_web::$GET_POST=$_GET;
				} else {
					cuenta_pagar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cuenta_pagar_web::$STR_NOMBRE_PAGINA = 'cuenta_pagar_view.php';
			cuenta_pagar_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			cuenta_pagar_web::$BIT_ES_PAGINA_FORM = 'false';
				
			cuenta_pagar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cuenta_pagar_constante,cuenta_pagar_constante1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/cuenta_pagar/js/util/cuenta_pagar_constante.js?random=1';
			import {cuenta_pagar_funcion,cuenta_pagar_funcion1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/cuenta_pagar/js/util/cuenta_pagar_funcion.js?random=1';
			
			let cuenta_pagar_constante2 = new cuenta_pagar_constante();
			
			cuenta_pagar_constante2.STR_NOMBRE_PAGINA="<?php echo(cuenta_pagar_web::$STR_NOMBRE_PAGINA); ?>";
			cuenta_pagar_constante2.STR_TYPE_ON_LOADcuenta_pagar="<?php echo(cuenta_pagar_web::$STR_TYPE_ONLOAD); ?>";
			cuenta_pagar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cuenta_pagar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cuenta_pagar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cuenta_pagar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cuenta_pagar_constante2.STR_ACTION="<?php echo(cuenta_pagar_web::$STR_ACTION); ?>";
			cuenta_pagar_constante2.STR_ES_POPUP="<?php echo(cuenta_pagar_web::$STR_ES_POPUP); ?>";
			cuenta_pagar_constante2.STR_ES_BUSQUEDA="<?php echo(cuenta_pagar_web::$STR_ES_BUSQUEDA); ?>";
			cuenta_pagar_constante2.STR_FUNCION_JS="<?php echo(cuenta_pagar_web::$STR_FUNCION_JS); ?>";
			cuenta_pagar_constante2.BIG_ID_ACTUAL="<?php echo(cuenta_pagar_web::$BIG_ID_ACTUAL); ?>";
			cuenta_pagar_constante2.BIG_ID_OPCION="<?php echo(cuenta_pagar_web::$BIG_ID_OPCION); ?>";
			cuenta_pagar_constante2.STR_OBJETO_JS="<?php echo(cuenta_pagar_web::$STR_OBJETO_JS); ?>";
			cuenta_pagar_constante2.STR_ES_RELACIONES="<?php echo(cuenta_pagar_web::$STR_ES_RELACIONES); ?>";
			cuenta_pagar_constante2.STR_ES_RELACIONADO="<?php echo(cuenta_pagar_web::$STR_ES_RELACIONADO); ?>";
			cuenta_pagar_constante2.STR_ES_SUB_PAGINA="<?php echo(cuenta_pagar_web::$STR_ES_SUB_PAGINA); ?>";
			cuenta_pagar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cuenta_pagar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cuenta_pagar_constante2.BIT_ES_PAGINA_FORM=<?php echo(cuenta_pagar_web::$BIT_ES_PAGINA_FORM); ?>;
			cuenta_pagar_constante2.STR_SUFIJO="<?php echo(cuenta_pagar_web::$STR_SUF); ?>";//cuenta_pagar
			cuenta_pagar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cuenta_pagar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cuenta_pagar
			
			cuenta_pagar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cuenta_pagar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cuenta_pagar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cuenta_pagar_web1->moduloActual->getnombre()); ?>";
			cuenta_pagar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cuenta_pagar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cuenta_pagar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cuenta_pagar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cuenta_pagar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cuenta_pagar_constante2 = cuenta_pagar_constante2;
			
		</script>
		
		<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cuenta_pagar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cuenta_pagar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cuenta_pagarActual" ></a>
	
	<div id="divResumencuenta_pagarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' && cuenta_pagar_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cuenta_pagar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && cuenta_pagar_web::$STR_ES_POPUP=='false' && cuenta_pagar_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcuenta_pagarNuevoToolBar">
										<img id="imgNuevoToolBarcuenta_pagar" name="imgNuevoToolBarcuenta_pagar" title="Nuevo Cuenta Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' && cuenta_pagar_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcuenta_pagarNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcuenta_pagar" name="imgNuevoGuardarCambiosToolBarcuenta_pagar" title="Nuevo TABLA Cuenta Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcuenta_pagarGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcuenta_pagar" name="imgGuardarCambiosToolBarcuenta_pagar" title="Guardar Cuenta Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && cuenta_pagar_web::$STR_ES_RELACIONES=='false' && cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcuenta_pagarCopiarToolBar">
										<img id="imgCopiarToolBarcuenta_pagar" name="imgCopiarToolBarcuenta_pagar" title="Copiar Cuenta Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcuenta_pagarDuplicarToolBar">
										<img id="imgDuplicarToolBarcuenta_pagar" name="imgDuplicarToolBarcuenta_pagar" title="Duplicar Cuenta Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcuenta_pagarRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcuenta_pagar" name="imgRecargarInformacionToolBarcuenta_pagar" title="Recargar Cuenta Pagar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcuenta_pagarAnterioresToolBar">
										<img id="imgAnterioresToolBarcuenta_pagar" name="imgAnterioresToolBarcuenta_pagar" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcuenta_pagarSiguientesToolBar">
										<img id="imgSiguientesToolBarcuenta_pagar" name="imgSiguientesToolBarcuenta_pagar" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcuenta_pagarAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcuenta_pagar" name="imgAbrirOrderByToolBarcuenta_pagar" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && cuenta_pagar_web::$STR_ES_RELACIONES=='false') || cuenta_pagar_web::$STR_ES_BUSQUEDA=='true'  || cuenta_pagar_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcuenta_pagarCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcuenta_pagar" name="imgCerrarPaginaToolBarcuenta_pagar" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcuenta_pagarCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacuenta_pagar" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacuenta_pagar',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcuenta_pagarCabeceraBusquedas/super -->

		<tr id="trBusquedacuenta_pagar" class="busqueda" style="display:table-row">
			<td id="tdBusquedacuenta_pagar" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacuenta_pagar" name="frmBusquedacuenta_pagar">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacuenta_pagar" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcuenta_pagarBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleFK_Idestado_cuentas_pagar" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado_cuentas_pagar"> Por  Estado Cuentas Pagar</a></li>
						<li id="listrVisibleFK_Idorden_compra" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idorden_compra"> Por  Orden Compra</a></li>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por  Proveedor</a></li>
						<li id="listrVisibleFK_Idtermino_pago_proveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtermino_pago_proveedor"> Por Termino Pago Proveedor</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idestado_cuentas_pagar">
					<table id="tblstrVisibleFK_Idestado_cuentas_pagar" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Estado Cuentas Pagar</span>
						</td>
						<td align="center">
							<select id="FK_Idestado_cuentas_pagar-cmbid_estado_cuentas_pagar" name="FK_Idestado_cuentas_pagar-cmbid_estado_cuentas_pagar" title=" Estado Cuentas Pagar" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcuenta_pagarFK_Idestado_cuentas_pagar" name="btnBuscarcuenta_pagarFK_Idestado_cuentas_pagar" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idorden_compra">
					<table id="tblstrVisibleFK_Idorden_compra" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Orden Compra</span>
						</td>
						<td align="center">
							<select id="FK_Idorden_compra-cmbid_orden_compra" name="FK_Idorden_compra-cmbid_orden_compra" title=" Orden Compra" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcuenta_pagarFK_Idorden_compra" name="btnBuscarcuenta_pagarFK_Idorden_compra" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproveedor">
					<table id="tblstrVisibleFK_Idproveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Proveedor</span>
						</td>
						<td align="center">
							<select id="FK_Idproveedor-cmbid_proveedor" name="FK_Idproveedor-cmbid_proveedor" title=" Proveedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcuenta_pagarFK_Idproveedor" name="btnBuscarcuenta_pagarFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtermino_pago_proveedor">
					<table id="tblstrVisibleFK_Idtermino_pago_proveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Termino Pago Proveedor</span>
						</td>
						<td align="center">
							<select id="FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor" name="FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor" title="Termino Pago Proveedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcuenta_pagarFK_Idtermino_pago_proveedor" name="btnBuscarcuenta_pagarFK_Idtermino_pago_proveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcuenta_pagar" style="display:table-row">
					<td id="tdParamsBuscarcuenta_pagar">
		<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcuenta_pagar">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscuenta_pagar" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscuenta_pagar"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscuenta_pagar" name="ParamsBuscar-txtNumeroRegistroscuenta_pagar" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncuenta_pagar">
							<td id="tdGenerarReportecuenta_pagar" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscuenta_pagar" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscuenta_pagar" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncuenta_pagar" name="btnRecargarInformacioncuenta_pagar" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacuenta_pagar" name="btnImprimirPaginacuenta_pagar" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*cuenta_pagar_web::$STR_ES_BUSQUEDA=='false'  &&*/ cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycuenta_pagar">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycuenta_pagar" name="btnOrderBycuenta_pagar" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelcuenta_pagar" name="btnOrderByRelcuenta_pagar" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(cuenta_pagar_web::$STR_ES_RELACIONES=='false' && cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcuenta_pagarConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscuenta_pagar -->

							</td><!-- tdGenerarReportecuenta_pagar -->
						</tr><!-- trRecargarInformacioncuenta_pagar -->
					</table><!-- tblParamsBuscarNumeroRegistroscuenta_pagar -->
				</div> <!-- divParamsBuscarcuenta_pagar -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcuenta_pagar -->
				</tr><!-- trParamsBuscarcuenta_pagar -->
				</table> <!-- tblBusquedacuenta_pagar -->
				</form> <!-- frmBusquedacuenta_pagar -->
				

			</td> <!-- tdBusquedacuenta_pagar -->
		</tr> <!-- trBusquedacuenta_pagar/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcuenta_pagarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcuenta_pagarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcuenta_pagarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncuenta_pagarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cuenta_pagar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncuenta_pagarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcuenta_pagarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcuenta_pagarPopupAjaxWebPart -->
		</div> <!-- divcuenta_pagarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcuenta_pagarTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacuenta_pagar"></a>
		<img id="imgTablaParaDerechacuenta_pagar" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacuenta_pagar'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacuenta_pagar" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacuenta_pagar'"/>
		<a id="TablaDerechacuenta_pagar"></a>
	</td>
</tr> <!-- trcuenta_pagarTablaNavegacion/super -->
<?php } ?>

<tr id="trcuenta_pagarTablaDatos">
	<td colspan="3" id="htmlTableCellcuenta_pagar">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscuenta_pagarsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcuenta_pagarTablaDatos/super -->
		
		
		<tr id="trcuenta_pagarPaginacion" style="display:table-row">
			<td id="tdcuenta_pagarPaginacion" align="left">
				<div id="divcuenta_pagarPaginacionAjaxWebPart">
				<form id="frmPaginacioncuenta_pagar" name="frmPaginacioncuenta_pagar">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncuenta_pagar" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(cuenta_pagar_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcuenta_pagar" name="btnSeleccionarLoteFkcuenta_pagar" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false' /*&& cuenta_pagar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescuenta_pagar" name="btnAnteriorescuenta_pagar" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' && cuenta_pagar_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcuenta_pagarNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcuenta_pagar" name="btnNuevoTablaPrepararcuenta_pagar" title="NUEVO Cuenta Pagar" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacuenta_pagar" name="ParamsPaginar-txtNumeroNuevoTablacuenta_pagar" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcuenta_pagarConEditarcuenta_pagar">
							<label>
								<input id="ParamsBuscar-chbConEditarcuenta_pagar" name="ParamsBuscar-chbConEditarcuenta_pagar" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false'/* && cuenta_pagar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescuenta_pagar" name="btnSiguientescuenta_pagar" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncuenta_pagar -->
				</form> <!-- frmPaginacioncuenta_pagar -->
				<form id="frmNuevoPrepararcuenta_pagar" name="frmNuevoPrepararcuenta_pagar">
				<table id="tblNuevoPrepararcuenta_pagar" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trcuenta_pagarNuevo" height="10">
						<?php if(cuenta_pagar_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcuenta_pagarNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcuenta_pagar" name="btnNuevoPrepararcuenta_pagar" title="NUEVO Cuenta Pagar" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcuenta_pagarGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscuenta_pagar" name="btnGuardarCambioscuenta_pagar" title="GUARDAR Cuenta Pagar" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && cuenta_pagar_web::$STR_ES_RELACIONES=='false' && cuenta_pagar_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcuenta_pagarDuplicar" align="center">
							<input type="button" id="btnDuplicarcuenta_pagar" name="btnDuplicarcuenta_pagar" title="DUPLICAR Cuenta Pagar" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcuenta_pagarCopiar" align="center">
							<input type="button" id="btnCopiarcuenta_pagar" name="btnCopiarcuenta_pagar" title="COPIAR Cuenta Pagar" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && ((cuenta_pagar_web::$STR_ES_RELACIONADO=='false' && cuenta_pagar_web::$STR_ES_RELACIONES=='false') || cuenta_pagar_web::$STR_ES_BUSQUEDA=='true'  || cuenta_pagar_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcuenta_pagarCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacuenta_pagar" name="btnCerrarPaginacuenta_pagar" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcuenta_pagar -->
				</form> <!-- frmNuevoPrepararcuenta_pagar -->
				</div> <!-- divcuenta_pagarPaginacionAjaxWebPart -->
			</td> <!-- tdcuenta_pagarPaginacion -->
		</tr> <!-- trcuenta_pagarPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescuenta_pagarAjaxWebPart">
			<td id="tdAccionesRelacionescuenta_pagarAjaxWebPart">
				<div id="divAccionesRelacionescuenta_pagarAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescuenta_pagarAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescuenta_pagarAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycuenta_pagar">
			<td id="tdOrderBycuenta_pagar">
				<form id="frmOrderBycuenta_pagar" name="frmOrderBycuenta_pagar">
					<div id="divOrderBycuenta_pagarAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelcuenta_pagar" name="frmOrderByRelcuenta_pagar">
					<div id="divOrderByRelcuenta_pagarAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycuenta_pagar -->
		</tr> <!-- trOrderBycuenta_pagar/super -->
			
		
		
		
		
		
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
			
				import {cuenta_pagar_webcontrol,cuenta_pagar_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/cuenta_pagar/js/webcontrol/cuenta_pagar_webcontrol.js?random=1';
				
				cuenta_pagar_webcontrol1.setcuenta_pagar_constante(window.cuenta_pagar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cuenta_pagar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

