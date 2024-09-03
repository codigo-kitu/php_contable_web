<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cuenta Cobrar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascobrar/cuenta_cobrar/util/cuenta_cobrar_carga.php');
	use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/cuenta_cobrar/presentation/view/cuenta_cobrar_web.php');
	//use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\view\cuenta_cobrar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cuenta_cobrar_web1= new cuenta_cobrar_web();	
	$cuenta_cobrar_web1->cargarDatosGenerales();
	
	//$moduloActual=$cuenta_cobrar_web1->moduloActual;
	//$usuarioActual=$cuenta_cobrar_web1->usuarioActual;
	//$sessionBase=$cuenta_cobrar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cuenta_cobrar_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/cuenta_cobrar/js/templating/cuenta_cobrar_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/cuenta_cobrar/js/templating/cuenta_cobrar_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/cuenta_cobrar/js/templating/cuenta_cobrar_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/cuenta_cobrar/js/templating/cuenta_cobrar_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/cuenta_cobrar/js/templating/cuenta_cobrar_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			cuenta_cobrar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cuenta_cobrar_web::$GET_POST=$_GET;
				} else {
					cuenta_cobrar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cuenta_cobrar_web::$STR_NOMBRE_PAGINA = 'cuenta_cobrar_view.php';
			cuenta_cobrar_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			cuenta_cobrar_web::$BIT_ES_PAGINA_FORM = 'false';
				
			cuenta_cobrar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cuenta_cobrar_constante,cuenta_cobrar_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/cuenta_cobrar/js/util/cuenta_cobrar_constante.js?random=1';
			import {cuenta_cobrar_funcion,cuenta_cobrar_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/cuenta_cobrar/js/util/cuenta_cobrar_funcion.js?random=1';
			
			let cuenta_cobrar_constante2 = new cuenta_cobrar_constante();
			
			cuenta_cobrar_constante2.STR_NOMBRE_PAGINA="<?php echo(cuenta_cobrar_web::$STR_NOMBRE_PAGINA); ?>";
			cuenta_cobrar_constante2.STR_TYPE_ON_LOADcuenta_cobrar="<?php echo(cuenta_cobrar_web::$STR_TYPE_ONLOAD); ?>";
			cuenta_cobrar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cuenta_cobrar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cuenta_cobrar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cuenta_cobrar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cuenta_cobrar_constante2.STR_ACTION="<?php echo(cuenta_cobrar_web::$STR_ACTION); ?>";
			cuenta_cobrar_constante2.STR_ES_POPUP="<?php echo(cuenta_cobrar_web::$STR_ES_POPUP); ?>";
			cuenta_cobrar_constante2.STR_ES_BUSQUEDA="<?php echo(cuenta_cobrar_web::$STR_ES_BUSQUEDA); ?>";
			cuenta_cobrar_constante2.STR_FUNCION_JS="<?php echo(cuenta_cobrar_web::$STR_FUNCION_JS); ?>";
			cuenta_cobrar_constante2.BIG_ID_ACTUAL="<?php echo(cuenta_cobrar_web::$BIG_ID_ACTUAL); ?>";
			cuenta_cobrar_constante2.BIG_ID_OPCION="<?php echo(cuenta_cobrar_web::$BIG_ID_OPCION); ?>";
			cuenta_cobrar_constante2.STR_OBJETO_JS="<?php echo(cuenta_cobrar_web::$STR_OBJETO_JS); ?>";
			cuenta_cobrar_constante2.STR_ES_RELACIONES="<?php echo(cuenta_cobrar_web::$STR_ES_RELACIONES); ?>";
			cuenta_cobrar_constante2.STR_ES_RELACIONADO="<?php echo(cuenta_cobrar_web::$STR_ES_RELACIONADO); ?>";
			cuenta_cobrar_constante2.STR_ES_SUB_PAGINA="<?php echo(cuenta_cobrar_web::$STR_ES_SUB_PAGINA); ?>";
			cuenta_cobrar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cuenta_cobrar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cuenta_cobrar_constante2.BIT_ES_PAGINA_FORM=<?php echo(cuenta_cobrar_web::$BIT_ES_PAGINA_FORM); ?>;
			cuenta_cobrar_constante2.STR_SUFIJO="<?php echo(cuenta_cobrar_web::$STR_SUF); ?>";//cuenta_cobrar
			cuenta_cobrar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cuenta_cobrar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cuenta_cobrar
			
			cuenta_cobrar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cuenta_cobrar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cuenta_cobrar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cuenta_cobrar_web1->moduloActual->getnombre()); ?>";
			cuenta_cobrar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cuenta_cobrar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cuenta_cobrar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cuenta_cobrar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cuenta_cobrar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cuenta_cobrar_constante2 = cuenta_cobrar_constante2;
			
		</script>
		
		<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cuenta_cobrar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cuenta_cobrar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cuenta_cobrarActual" ></a>
	
	<div id="divResumencuenta_cobrarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' && cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cuenta_cobrar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && cuenta_cobrar_web::$STR_ES_POPUP=='false' && cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcuenta_cobrarNuevoToolBar">
										<img id="imgNuevoToolBarcuenta_cobrar" name="imgNuevoToolBarcuenta_cobrar" title="Nuevo Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' && cuenta_cobrar_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcuenta_cobrarNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcuenta_cobrar" name="imgNuevoGuardarCambiosToolBarcuenta_cobrar" title="Nuevo TABLA Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcuenta_cobrarGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcuenta_cobrar" name="imgGuardarCambiosToolBarcuenta_cobrar" title="Guardar Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && cuenta_cobrar_web::$STR_ES_RELACIONES=='false' && cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcuenta_cobrarCopiarToolBar">
										<img id="imgCopiarToolBarcuenta_cobrar" name="imgCopiarToolBarcuenta_cobrar" title="Copiar Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcuenta_cobrarDuplicarToolBar">
										<img id="imgDuplicarToolBarcuenta_cobrar" name="imgDuplicarToolBarcuenta_cobrar" title="Duplicar Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcuenta_cobrarRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcuenta_cobrar" name="imgRecargarInformacionToolBarcuenta_cobrar" title="Recargar Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcuenta_cobrarAnterioresToolBar">
										<img id="imgAnterioresToolBarcuenta_cobrar" name="imgAnterioresToolBarcuenta_cobrar" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcuenta_cobrarSiguientesToolBar">
										<img id="imgSiguientesToolBarcuenta_cobrar" name="imgSiguientesToolBarcuenta_cobrar" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcuenta_cobrarAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcuenta_cobrar" name="imgAbrirOrderByToolBarcuenta_cobrar" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && cuenta_cobrar_web::$STR_ES_RELACIONES=='false') || cuenta_cobrar_web::$STR_ES_BUSQUEDA=='true'  || cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcuenta_cobrarCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcuenta_cobrar" name="imgCerrarPaginaToolBarcuenta_cobrar" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcuenta_cobrarCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacuenta_cobrar" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacuenta_cobrar',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcuenta_cobrarCabeceraBusquedas/super -->

		<tr id="trBusquedacuenta_cobrar" class="busqueda" style="display:table-row">
			<td id="tdBusquedacuenta_cobrar" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacuenta_cobrar" name="frmBusquedacuenta_cobrar">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacuenta_cobrar" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcuenta_cobrarBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleFK_Idestado_cuentas_cobrar" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado_cuentas_cobrar"> Por  Estado Cuentas Cobrar</a></li>
						<li id="listrVisibleFK_Idfactura" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idfactura"> Por Factura</a></li>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por  Cliente</a></li>
						<li id="listrVisibleFK_Idtermino_pago_cliente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtermino_pago_cliente"> Por  Termino Pago Cliente</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idestado_cuentas_cobrar">
					<table id="tblstrVisibleFK_Idestado_cuentas_cobrar" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Estado Cuentas Cobrar</span>
						</td>
						<td align="center">
							<select id="FK_Idestado_cuentas_cobrar-cmbid_estado_cuentas_cobrar" name="FK_Idestado_cuentas_cobrar-cmbid_estado_cuentas_cobrar" title=" Estado Cuentas Cobrar" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcuenta_cobrarFK_Idestado_cuentas_cobrar" name="btnBuscarcuenta_cobrarFK_Idestado_cuentas_cobrar" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idfactura">
					<table id="tblstrVisibleFK_Idfactura" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Factura</span>
						</td>
						<td align="center">
							<select id="FK_Idfactura-cmbid_factura" name="FK_Idfactura-cmbid_factura" title="Factura" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcuenta_cobrarFK_Idfactura" name="btnBuscarcuenta_cobrarFK_Idfactura" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproveedor">
					<table id="tblstrVisibleFK_Idproveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cliente</span>
						</td>
						<td align="center">
							<select id="FK_Idproveedor-cmbid_cliente" name="FK_Idproveedor-cmbid_cliente" title=" Cliente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcuenta_cobrarFK_Idproveedor" name="btnBuscarcuenta_cobrarFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtermino_pago_cliente">
					<table id="tblstrVisibleFK_Idtermino_pago_cliente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Termino Pago Cliente</span>
						</td>
						<td align="center">
							<select id="FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente" name="FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente" title=" Termino Pago Cliente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcuenta_cobrarFK_Idtermino_pago_cliente" name="btnBuscarcuenta_cobrarFK_Idtermino_pago_cliente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcuenta_cobrar" style="display:table-row">
					<td id="tdParamsBuscarcuenta_cobrar">
		<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcuenta_cobrar">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscuenta_cobrar" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscuenta_cobrar"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscuenta_cobrar" name="ParamsBuscar-txtNumeroRegistroscuenta_cobrar" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncuenta_cobrar">
							<td id="tdGenerarReportecuenta_cobrar" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscuenta_cobrar" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscuenta_cobrar" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncuenta_cobrar" name="btnRecargarInformacioncuenta_cobrar" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacuenta_cobrar" name="btnImprimirPaginacuenta_cobrar" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false'  &&*/ cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycuenta_cobrar">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycuenta_cobrar" name="btnOrderBycuenta_cobrar" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelcuenta_cobrar" name="btnOrderByRelcuenta_cobrar" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(cuenta_cobrar_web::$STR_ES_RELACIONES=='false' && cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcuenta_cobrarConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscuenta_cobrar -->

							</td><!-- tdGenerarReportecuenta_cobrar -->
						</tr><!-- trRecargarInformacioncuenta_cobrar -->
					</table><!-- tblParamsBuscarNumeroRegistroscuenta_cobrar -->
				</div> <!-- divParamsBuscarcuenta_cobrar -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcuenta_cobrar -->
				</tr><!-- trParamsBuscarcuenta_cobrar -->
				</table> <!-- tblBusquedacuenta_cobrar -->
				</form> <!-- frmBusquedacuenta_cobrar -->
				

			</td> <!-- tdBusquedacuenta_cobrar -->
		</tr> <!-- trBusquedacuenta_cobrar/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcuenta_cobrarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcuenta_cobrarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcuenta_cobrarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncuenta_cobrarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cuenta_cobrar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncuenta_cobrarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcuenta_cobrarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcuenta_cobrarPopupAjaxWebPart -->
		</div> <!-- divcuenta_cobrarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcuenta_cobrarTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacuenta_cobrar"></a>
		<img id="imgTablaParaDerechacuenta_cobrar" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacuenta_cobrar'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacuenta_cobrar" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacuenta_cobrar'"/>
		<a id="TablaDerechacuenta_cobrar"></a>
	</td>
</tr> <!-- trcuenta_cobrarTablaNavegacion/super -->
<?php } ?>

<tr id="trcuenta_cobrarTablaDatos">
	<td colspan="3" id="htmlTableCellcuenta_cobrar">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscuenta_cobrarsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcuenta_cobrarTablaDatos/super -->
		
		
		<tr id="trcuenta_cobrarPaginacion" style="display:table-row">
			<td id="tdcuenta_cobrarPaginacion" align="left">
				<div id="divcuenta_cobrarPaginacionAjaxWebPart">
				<form id="frmPaginacioncuenta_cobrar" name="frmPaginacioncuenta_cobrar">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncuenta_cobrar" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(cuenta_cobrar_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcuenta_cobrar" name="btnSeleccionarLoteFkcuenta_cobrar" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' /*&& cuenta_cobrar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescuenta_cobrar" name="btnAnteriorescuenta_cobrar" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' && cuenta_cobrar_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcuenta_cobrarNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcuenta_cobrar" name="btnNuevoTablaPrepararcuenta_cobrar" title="NUEVO Cuenta Cobrar" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacuenta_cobrar" name="ParamsPaginar-txtNumeroNuevoTablacuenta_cobrar" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcuenta_cobrarConEditarcuenta_cobrar">
							<label>
								<input id="ParamsBuscar-chbConEditarcuenta_cobrar" name="ParamsBuscar-chbConEditarcuenta_cobrar" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false'/* && cuenta_cobrar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescuenta_cobrar" name="btnSiguientescuenta_cobrar" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncuenta_cobrar -->
				</form> <!-- frmPaginacioncuenta_cobrar -->
				<form id="frmNuevoPrepararcuenta_cobrar" name="frmNuevoPrepararcuenta_cobrar">
				<table id="tblNuevoPrepararcuenta_cobrar" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trcuenta_cobrarNuevo" height="10">
						<?php if(cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcuenta_cobrarNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcuenta_cobrar" name="btnNuevoPrepararcuenta_cobrar" title="NUEVO Cuenta Cobrar" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcuenta_cobrarGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscuenta_cobrar" name="btnGuardarCambioscuenta_cobrar" title="GUARDAR Cuenta Cobrar" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && cuenta_cobrar_web::$STR_ES_RELACIONES=='false' && cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcuenta_cobrarDuplicar" align="center">
							<input type="button" id="btnDuplicarcuenta_cobrar" name="btnDuplicarcuenta_cobrar" title="DUPLICAR Cuenta Cobrar" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcuenta_cobrarCopiar" align="center">
							<input type="button" id="btnCopiarcuenta_cobrar" name="btnCopiarcuenta_cobrar" title="COPIAR Cuenta Cobrar" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && ((cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && cuenta_cobrar_web::$STR_ES_RELACIONES=='false') || cuenta_cobrar_web::$STR_ES_BUSQUEDA=='true'  || cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcuenta_cobrarCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacuenta_cobrar" name="btnCerrarPaginacuenta_cobrar" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcuenta_cobrar -->
				</form> <!-- frmNuevoPrepararcuenta_cobrar -->
				</div> <!-- divcuenta_cobrarPaginacionAjaxWebPart -->
			</td> <!-- tdcuenta_cobrarPaginacion -->
		</tr> <!-- trcuenta_cobrarPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescuenta_cobrarAjaxWebPart">
			<td id="tdAccionesRelacionescuenta_cobrarAjaxWebPart">
				<div id="divAccionesRelacionescuenta_cobrarAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescuenta_cobrarAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescuenta_cobrarAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycuenta_cobrar">
			<td id="tdOrderBycuenta_cobrar">
				<form id="frmOrderBycuenta_cobrar" name="frmOrderBycuenta_cobrar">
					<div id="divOrderBycuenta_cobrarAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelcuenta_cobrar" name="frmOrderByRelcuenta_cobrar">
					<div id="divOrderByRelcuenta_cobrarAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycuenta_cobrar -->
		</tr> <!-- trOrderBycuenta_cobrar/super -->
			
		
		
		
		
		
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
			
				import {cuenta_cobrar_webcontrol,cuenta_cobrar_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/cuenta_cobrar/js/webcontrol/cuenta_cobrar_webcontrol.js?random=1';
				
				cuenta_cobrar_webcontrol1.setcuenta_cobrar_constante(window.cuenta_cobrar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

