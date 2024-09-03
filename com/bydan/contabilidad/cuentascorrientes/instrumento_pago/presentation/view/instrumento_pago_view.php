<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Instrumento Pago Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascorrientes/instrumento_pago/util/instrumento_pago_carga.php');
	use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_carga;
	
	//include_once('com/bydan/contabilidad/cuentascorrientes/instrumento_pago/presentation/view/instrumento_pago_web.php');
	//use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\view\instrumento_pago_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	instrumento_pago_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	instrumento_pago_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$instrumento_pago_web1= new instrumento_pago_web();	
	$instrumento_pago_web1->cargarDatosGenerales();
	
	//$moduloActual=$instrumento_pago_web1->moduloActual;
	//$usuarioActual=$instrumento_pago_web1->usuarioActual;
	//$sessionBase=$instrumento_pago_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$instrumento_pago_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/instrumento_pago/js/templating/instrumento_pago_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/instrumento_pago/js/templating/instrumento_pago_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/instrumento_pago/js/templating/instrumento_pago_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/instrumento_pago/js/templating/instrumento_pago_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			instrumento_pago_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					instrumento_pago_web::$GET_POST=$_GET;
				} else {
					instrumento_pago_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			instrumento_pago_web::$STR_NOMBRE_PAGINA = 'instrumento_pago_view.php';
			instrumento_pago_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			instrumento_pago_web::$BIT_ES_PAGINA_FORM = 'false';
				
			instrumento_pago_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {instrumento_pago_constante,instrumento_pago_constante1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/instrumento_pago/js/util/instrumento_pago_constante.js?random=1';
			import {instrumento_pago_funcion,instrumento_pago_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/instrumento_pago/js/util/instrumento_pago_funcion.js?random=1';
			
			let instrumento_pago_constante2 = new instrumento_pago_constante();
			
			instrumento_pago_constante2.STR_NOMBRE_PAGINA="<?php echo(instrumento_pago_web::$STR_NOMBRE_PAGINA); ?>";
			instrumento_pago_constante2.STR_TYPE_ON_LOADinstrumento_pago="<?php echo(instrumento_pago_web::$STR_TYPE_ONLOAD); ?>";
			instrumento_pago_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(instrumento_pago_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			instrumento_pago_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(instrumento_pago_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			instrumento_pago_constante2.STR_ACTION="<?php echo(instrumento_pago_web::$STR_ACTION); ?>";
			instrumento_pago_constante2.STR_ES_POPUP="<?php echo(instrumento_pago_web::$STR_ES_POPUP); ?>";
			instrumento_pago_constante2.STR_ES_BUSQUEDA="<?php echo(instrumento_pago_web::$STR_ES_BUSQUEDA); ?>";
			instrumento_pago_constante2.STR_FUNCION_JS="<?php echo(instrumento_pago_web::$STR_FUNCION_JS); ?>";
			instrumento_pago_constante2.BIG_ID_ACTUAL="<?php echo(instrumento_pago_web::$BIG_ID_ACTUAL); ?>";
			instrumento_pago_constante2.BIG_ID_OPCION="<?php echo(instrumento_pago_web::$BIG_ID_OPCION); ?>";
			instrumento_pago_constante2.STR_OBJETO_JS="<?php echo(instrumento_pago_web::$STR_OBJETO_JS); ?>";
			instrumento_pago_constante2.STR_ES_RELACIONES="<?php echo(instrumento_pago_web::$STR_ES_RELACIONES); ?>";
			instrumento_pago_constante2.STR_ES_RELACIONADO="<?php echo(instrumento_pago_web::$STR_ES_RELACIONADO); ?>";
			instrumento_pago_constante2.STR_ES_SUB_PAGINA="<?php echo(instrumento_pago_web::$STR_ES_SUB_PAGINA); ?>";
			instrumento_pago_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(instrumento_pago_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			instrumento_pago_constante2.BIT_ES_PAGINA_FORM=<?php echo(instrumento_pago_web::$BIT_ES_PAGINA_FORM); ?>;
			instrumento_pago_constante2.STR_SUFIJO="<?php echo(instrumento_pago_web::$STR_SUF); ?>";//instrumento_pago
			instrumento_pago_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(instrumento_pago_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//instrumento_pago
			
			instrumento_pago_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(instrumento_pago_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			instrumento_pago_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($instrumento_pago_web1->moduloActual->getnombre()); ?>";
			instrumento_pago_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(instrumento_pago_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			instrumento_pago_constante2.BIT_ES_LOAD_NORMAL=true;
			/*instrumento_pago_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			instrumento_pago_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.instrumento_pago_constante2 = instrumento_pago_constante2;
			
		</script>
		
		<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.instrumento_pago_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.instrumento_pago_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="instrumento_pagoActual" ></a>
	
	<div id="divResumeninstrumento_pagoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(instrumento_pago_web::$STR_ES_BUSQUEDA=='false' && instrumento_pago_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(instrumento_pago_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false' && instrumento_pago_web::$STR_ES_POPUP=='false' && instrumento_pago_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdinstrumento_pagoNuevoToolBar">
										<img id="imgNuevoToolBarinstrumento_pago" name="imgNuevoToolBarinstrumento_pago" title="Nuevo Instrumento Pago" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(instrumento_pago_web::$STR_ES_BUSQUEDA=='false' && instrumento_pago_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdinstrumento_pagoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarinstrumento_pago" name="imgNuevoGuardarCambiosToolBarinstrumento_pago" title="Nuevo TABLA Instrumento Pago" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(instrumento_pago_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdinstrumento_pagoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarinstrumento_pago" name="imgGuardarCambiosToolBarinstrumento_pago" title="Guardar Instrumento Pago" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false' && instrumento_pago_web::$STR_ES_RELACIONES=='false' && instrumento_pago_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdinstrumento_pagoCopiarToolBar">
										<img id="imgCopiarToolBarinstrumento_pago" name="imgCopiarToolBarinstrumento_pago" title="Copiar Instrumento Pago" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdinstrumento_pagoDuplicarToolBar">
										<img id="imgDuplicarToolBarinstrumento_pago" name="imgDuplicarToolBarinstrumento_pago" title="Duplicar Instrumento Pago" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdinstrumento_pagoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarinstrumento_pago" name="imgRecargarInformacionToolBarinstrumento_pago" title="Recargar Instrumento Pago" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdinstrumento_pagoAnterioresToolBar">
										<img id="imgAnterioresToolBarinstrumento_pago" name="imgAnterioresToolBarinstrumento_pago" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdinstrumento_pagoSiguientesToolBar">
										<img id="imgSiguientesToolBarinstrumento_pago" name="imgSiguientesToolBarinstrumento_pago" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdinstrumento_pagoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarinstrumento_pago" name="imgAbrirOrderByToolBarinstrumento_pago" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((instrumento_pago_web::$STR_ES_RELACIONADO=='false' && instrumento_pago_web::$STR_ES_RELACIONES=='false') || instrumento_pago_web::$STR_ES_BUSQUEDA=='true'  || instrumento_pago_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdinstrumento_pagoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarinstrumento_pago" name="imgCerrarPaginaToolBarinstrumento_pago" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trinstrumento_pagoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedainstrumento_pago" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedainstrumento_pago',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trinstrumento_pagoCabeceraBusquedas/super -->

		<tr id="trBusquedainstrumento_pago" class="busqueda" style="display:table-row">
			<td id="tdBusquedainstrumento_pago" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedainstrumento_pago" name="frmBusquedainstrumento_pago">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedainstrumento_pago" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trinstrumento_pagoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcuenta_compras" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_compras"> Por  Cuenta Compras</a></li>
						<li id="listrVisibleFK_Idcuenta_corriente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_corriente"> Por Cuenta Cliente</a></li>
						<li id="listrVisibleFK_Idcuenta_ventas" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_ventas"> Por  Cuenta Ventas</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcuenta_compras">
					<table id="tblstrVisibleFK_Idcuenta_compras" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuenta Compras</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_compras-cmbid_cuenta_compras" name="FK_Idcuenta_compras-cmbid_cuenta_compras" title=" Cuenta Compras" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarinstrumento_pagoFK_Idcuenta_compras" name="btnBuscarinstrumento_pagoFK_Idcuenta_compras" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta_corriente">
					<table id="tblstrVisibleFK_Idcuenta_corriente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cuenta Cliente</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_corriente-cmbid_cuenta_corriente" name="FK_Idcuenta_corriente-cmbid_cuenta_corriente" title="Cuenta Cliente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarinstrumento_pagoFK_Idcuenta_corriente" name="btnBuscarinstrumento_pagoFK_Idcuenta_corriente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta_ventas">
					<table id="tblstrVisibleFK_Idcuenta_ventas" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuenta Ventas</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_ventas-cmbid_cuenta_ventas" name="FK_Idcuenta_ventas-cmbid_cuenta_ventas" title=" Cuenta Ventas" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarinstrumento_pagoFK_Idcuenta_ventas" name="btnBuscarinstrumento_pagoFK_Idcuenta_ventas" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarinstrumento_pago" style="display:table-row">
					<td id="tdParamsBuscarinstrumento_pago">
		<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarinstrumento_pago">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosinstrumento_pago" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosinstrumento_pago"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosinstrumento_pago" name="ParamsBuscar-txtNumeroRegistrosinstrumento_pago" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioninstrumento_pago">
							<td id="tdGenerarReporteinstrumento_pago" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosinstrumento_pago" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosinstrumento_pago" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioninstrumento_pago" name="btnRecargarInformacioninstrumento_pago" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginainstrumento_pago" name="btnImprimirPaginainstrumento_pago" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*instrumento_pago_web::$STR_ES_BUSQUEDA=='false'  &&*/ instrumento_pago_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByinstrumento_pago">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByinstrumento_pago" name="btnOrderByinstrumento_pago" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(instrumento_pago_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdinstrumento_pagoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosinstrumento_pago -->

							</td><!-- tdGenerarReporteinstrumento_pago -->
						</tr><!-- trRecargarInformacioninstrumento_pago -->
					</table><!-- tblParamsBuscarNumeroRegistrosinstrumento_pago -->
				</div> <!-- divParamsBuscarinstrumento_pago -->
		<?php } ?>
				</td> <!-- tdParamsBuscarinstrumento_pago -->
				</tr><!-- trParamsBuscarinstrumento_pago -->
				</table> <!-- tblBusquedainstrumento_pago -->
				</form> <!-- frmBusquedainstrumento_pago -->
				

			</td> <!-- tdBusquedainstrumento_pago -->
		</tr> <!-- trBusquedainstrumento_pago/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divinstrumento_pagoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblinstrumento_pagoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frminstrumento_pagoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btninstrumento_pagoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="instrumento_pago_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btninstrumento_pagoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frminstrumento_pagoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblinstrumento_pagoPopupAjaxWebPart -->
		</div> <!-- divinstrumento_pagoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trinstrumento_pagoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdainstrumento_pago"></a>
		<img id="imgTablaParaDerechainstrumento_pago" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechainstrumento_pago'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdainstrumento_pago" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdainstrumento_pago'"/>
		<a id="TablaDerechainstrumento_pago"></a>
	</td>
</tr> <!-- trinstrumento_pagoTablaNavegacion/super -->
<?php } ?>

<tr id="trinstrumento_pagoTablaDatos">
	<td colspan="3" id="htmlTableCellinstrumento_pago">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosinstrumento_pagosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trinstrumento_pagoTablaDatos/super -->
		
		
		<tr id="trinstrumento_pagoPaginacion" style="display:table-row">
			<td id="tdinstrumento_pagoPaginacion" align="center">
				<div id="divinstrumento_pagoPaginacionAjaxWebPart">
				<form id="frmPaginacioninstrumento_pago" name="frmPaginacioninstrumento_pago">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioninstrumento_pago" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(instrumento_pago_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkinstrumento_pago" name="btnSeleccionarLoteFkinstrumento_pago" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false' /*&& instrumento_pago_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresinstrumento_pago" name="btnAnterioresinstrumento_pago" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(instrumento_pago_web::$STR_ES_BUSQUEDA=='false' && instrumento_pago_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdinstrumento_pagoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararinstrumento_pago" name="btnNuevoTablaPrepararinstrumento_pago" title="NUEVO Instrumento Pago" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablainstrumento_pago" name="ParamsPaginar-txtNumeroNuevoTablainstrumento_pago" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdinstrumento_pagoConEditarinstrumento_pago">
							<label>
								<input id="ParamsBuscar-chbConEditarinstrumento_pago" name="ParamsBuscar-chbConEditarinstrumento_pago" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false'/* && instrumento_pago_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesinstrumento_pago" name="btnSiguientesinstrumento_pago" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioninstrumento_pago -->
				</form> <!-- frmPaginacioninstrumento_pago -->
				<form id="frmNuevoPrepararinstrumento_pago" name="frmNuevoPrepararinstrumento_pago">
				<table id="tblNuevoPrepararinstrumento_pago" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trinstrumento_pagoNuevo" height="10">
						<?php if(instrumento_pago_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdinstrumento_pagoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararinstrumento_pago" name="btnNuevoPrepararinstrumento_pago" title="NUEVO Instrumento Pago" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdinstrumento_pagoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosinstrumento_pago" name="btnGuardarCambiosinstrumento_pago" title="GUARDAR Instrumento Pago" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false' && instrumento_pago_web::$STR_ES_RELACIONES=='false' && instrumento_pago_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdinstrumento_pagoDuplicar" align="center">
							<input type="button" id="btnDuplicarinstrumento_pago" name="btnDuplicarinstrumento_pago" title="DUPLICAR Instrumento Pago" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdinstrumento_pagoCopiar" align="center">
							<input type="button" id="btnCopiarinstrumento_pago" name="btnCopiarinstrumento_pago" title="COPIAR Instrumento Pago" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false' && ((instrumento_pago_web::$STR_ES_RELACIONADO=='false' && instrumento_pago_web::$STR_ES_RELACIONES=='false') || instrumento_pago_web::$STR_ES_BUSQUEDA=='true'  || instrumento_pago_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdinstrumento_pagoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginainstrumento_pago" name="btnCerrarPaginainstrumento_pago" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararinstrumento_pago -->
				</form> <!-- frmNuevoPrepararinstrumento_pago -->
				</div> <!-- divinstrumento_pagoPaginacionAjaxWebPart -->
			</td> <!-- tdinstrumento_pagoPaginacion -->
		</tr> <!-- trinstrumento_pagoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesinstrumento_pagoAjaxWebPart">
			<td id="tdAccionesRelacionesinstrumento_pagoAjaxWebPart">
				<div id="divAccionesRelacionesinstrumento_pagoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesinstrumento_pagoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesinstrumento_pagoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByinstrumento_pago">
			<td id="tdOrderByinstrumento_pago">
				<form id="frmOrderByinstrumento_pago" name="frmOrderByinstrumento_pago">
					<div id="divOrderByinstrumento_pagoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByinstrumento_pago -->
		</tr> <!-- trOrderByinstrumento_pago/super -->
			
		
		
		
		
		
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
			
				import {instrumento_pago_webcontrol,instrumento_pago_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/instrumento_pago/js/webcontrol/instrumento_pago_webcontrol.js?random=1';
				
				instrumento_pago_webcontrol1.setinstrumento_pago_constante(window.instrumento_pago_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(instrumento_pago_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

