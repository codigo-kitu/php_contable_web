<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\cambio_dolar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cambio Dolar Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/cambio_dolar/util/cambio_dolar_carga.php');
	use com\bydan\contabilidad\contabilidad\cambio_dolar\util\cambio_dolar_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/cambio_dolar/presentation/view/cambio_dolar_web.php');
	//use com\bydan\contabilidad\contabilidad\cambio_dolar\presentation\view\cambio_dolar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cambio_dolar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cambio_dolar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cambio_dolar_web1= new cambio_dolar_web();	
	$cambio_dolar_web1->cargarDatosGenerales();
	
	//$moduloActual=$cambio_dolar_web1->moduloActual;
	//$usuarioActual=$cambio_dolar_web1->usuarioActual;
	//$sessionBase=$cambio_dolar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cambio_dolar_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cambio_dolar/js/templating/cambio_dolar_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cambio_dolar/js/templating/cambio_dolar_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cambio_dolar/js/templating/cambio_dolar_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/cambio_dolar/js/templating/cambio_dolar_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			cambio_dolar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cambio_dolar_web::$GET_POST=$_GET;
				} else {
					cambio_dolar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cambio_dolar_web::$STR_NOMBRE_PAGINA = 'cambio_dolar_view.php';
			cambio_dolar_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			cambio_dolar_web::$BIT_ES_PAGINA_FORM = 'false';
				
			cambio_dolar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cambio_dolar_constante,cambio_dolar_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/cambio_dolar/js/util/cambio_dolar_constante.js?random=1';
			import {cambio_dolar_funcion,cambio_dolar_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/cambio_dolar/js/util/cambio_dolar_funcion.js?random=1';
			
			let cambio_dolar_constante2 = new cambio_dolar_constante();
			
			cambio_dolar_constante2.STR_NOMBRE_PAGINA="<?php echo(cambio_dolar_web::$STR_NOMBRE_PAGINA); ?>";
			cambio_dolar_constante2.STR_TYPE_ON_LOADcambio_dolar="<?php echo(cambio_dolar_web::$STR_TYPE_ONLOAD); ?>";
			cambio_dolar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cambio_dolar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cambio_dolar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cambio_dolar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cambio_dolar_constante2.STR_ACTION="<?php echo(cambio_dolar_web::$STR_ACTION); ?>";
			cambio_dolar_constante2.STR_ES_POPUP="<?php echo(cambio_dolar_web::$STR_ES_POPUP); ?>";
			cambio_dolar_constante2.STR_ES_BUSQUEDA="<?php echo(cambio_dolar_web::$STR_ES_BUSQUEDA); ?>";
			cambio_dolar_constante2.STR_FUNCION_JS="<?php echo(cambio_dolar_web::$STR_FUNCION_JS); ?>";
			cambio_dolar_constante2.BIG_ID_ACTUAL="<?php echo(cambio_dolar_web::$BIG_ID_ACTUAL); ?>";
			cambio_dolar_constante2.BIG_ID_OPCION="<?php echo(cambio_dolar_web::$BIG_ID_OPCION); ?>";
			cambio_dolar_constante2.STR_OBJETO_JS="<?php echo(cambio_dolar_web::$STR_OBJETO_JS); ?>";
			cambio_dolar_constante2.STR_ES_RELACIONES="<?php echo(cambio_dolar_web::$STR_ES_RELACIONES); ?>";
			cambio_dolar_constante2.STR_ES_RELACIONADO="<?php echo(cambio_dolar_web::$STR_ES_RELACIONADO); ?>";
			cambio_dolar_constante2.STR_ES_SUB_PAGINA="<?php echo(cambio_dolar_web::$STR_ES_SUB_PAGINA); ?>";
			cambio_dolar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cambio_dolar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cambio_dolar_constante2.BIT_ES_PAGINA_FORM=<?php echo(cambio_dolar_web::$BIT_ES_PAGINA_FORM); ?>;
			cambio_dolar_constante2.STR_SUFIJO="<?php echo(cambio_dolar_web::$STR_SUF); ?>";//cambio_dolar
			cambio_dolar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cambio_dolar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cambio_dolar
			
			cambio_dolar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cambio_dolar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cambio_dolar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cambio_dolar_web1->moduloActual->getnombre()); ?>";
			cambio_dolar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cambio_dolar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cambio_dolar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cambio_dolar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cambio_dolar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cambio_dolar_constante2 = cambio_dolar_constante2;
			
		</script>
		
		<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cambio_dolar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cambio_dolar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="cambio_dolarActual" ></a>
	
	<div id="divResumencambio_dolarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(cambio_dolar_web::$STR_ES_BUSQUEDA=='false' && cambio_dolar_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cambio_dolar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false' && cambio_dolar_web::$STR_ES_POPUP=='false' && cambio_dolar_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcambio_dolarNuevoToolBar">
										<img id="imgNuevoToolBarcambio_dolar" name="imgNuevoToolBarcambio_dolar" title="Nuevo Cambio Dolar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(cambio_dolar_web::$STR_ES_BUSQUEDA=='false' && cambio_dolar_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcambio_dolarNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcambio_dolar" name="imgNuevoGuardarCambiosToolBarcambio_dolar" title="Nuevo TABLA Cambio Dolar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cambio_dolar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcambio_dolarGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcambio_dolar" name="imgGuardarCambiosToolBarcambio_dolar" title="Guardar Cambio Dolar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false' && cambio_dolar_web::$STR_ES_RELACIONES=='false' && cambio_dolar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcambio_dolarCopiarToolBar">
										<img id="imgCopiarToolBarcambio_dolar" name="imgCopiarToolBarcambio_dolar" title="Copiar Cambio Dolar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcambio_dolarDuplicarToolBar">
										<img id="imgDuplicarToolBarcambio_dolar" name="imgDuplicarToolBarcambio_dolar" title="Duplicar Cambio Dolar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcambio_dolarRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcambio_dolar" name="imgRecargarInformacionToolBarcambio_dolar" title="Recargar Cambio Dolar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcambio_dolarAnterioresToolBar">
										<img id="imgAnterioresToolBarcambio_dolar" name="imgAnterioresToolBarcambio_dolar" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcambio_dolarSiguientesToolBar">
										<img id="imgSiguientesToolBarcambio_dolar" name="imgSiguientesToolBarcambio_dolar" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcambio_dolarAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcambio_dolar" name="imgAbrirOrderByToolBarcambio_dolar" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((cambio_dolar_web::$STR_ES_RELACIONADO=='false' && cambio_dolar_web::$STR_ES_RELACIONES=='false') || cambio_dolar_web::$STR_ES_BUSQUEDA=='true'  || cambio_dolar_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcambio_dolarCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcambio_dolar" name="imgCerrarPaginaToolBarcambio_dolar" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcambio_dolarCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacambio_dolar" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacambio_dolar',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcambio_dolarCabeceraBusquedas/super -->

		<tr id="trBusquedacambio_dolar" class="busqueda" style="display:table-row">
			<td id="tdBusquedacambio_dolar" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacambio_dolar" name="frmBusquedacambio_dolar">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacambio_dolar" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcambio_dolarBusquedas" class="busqueda" style="display:none"><td>
				<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcambio_dolar" style="display:table-row">
					<td id="tdParamsBuscarcambio_dolar">
		<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcambio_dolar">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscambio_dolar" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscambio_dolar"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscambio_dolar" name="ParamsBuscar-txtNumeroRegistroscambio_dolar" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncambio_dolar">
							<td id="tdGenerarReportecambio_dolar" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscambio_dolar" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscambio_dolar" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncambio_dolar" name="btnRecargarInformacioncambio_dolar" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacambio_dolar" name="btnImprimirPaginacambio_dolar" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*cambio_dolar_web::$STR_ES_BUSQUEDA=='false'  &&*/ cambio_dolar_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycambio_dolar">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycambio_dolar" name="btnOrderBycambio_dolar" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(cambio_dolar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcambio_dolarConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscambio_dolar -->

							</td><!-- tdGenerarReportecambio_dolar -->
						</tr><!-- trRecargarInformacioncambio_dolar -->
					</table><!-- tblParamsBuscarNumeroRegistroscambio_dolar -->
				</div> <!-- divParamsBuscarcambio_dolar -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcambio_dolar -->
				</tr><!-- trParamsBuscarcambio_dolar -->
				</table> <!-- tblBusquedacambio_dolar -->
				</form> <!-- frmBusquedacambio_dolar -->
				

			</td> <!-- tdBusquedacambio_dolar -->
		</tr> <!-- trBusquedacambio_dolar/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcambio_dolarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcambio_dolarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcambio_dolarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncambio_dolarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cambio_dolar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncambio_dolarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcambio_dolarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcambio_dolarPopupAjaxWebPart -->
		</div> <!-- divcambio_dolarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcambio_dolarTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacambio_dolar"></a>
		<img id="imgTablaParaDerechacambio_dolar" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacambio_dolar'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacambio_dolar" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacambio_dolar'"/>
		<a id="TablaDerechacambio_dolar"></a>
	</td>
</tr> <!-- trcambio_dolarTablaNavegacion/super -->
<?php } ?>

<tr id="trcambio_dolarTablaDatos">
	<td colspan="3" id="htmlTableCellcambio_dolar">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscambio_dolarsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcambio_dolarTablaDatos/super -->
		
		
		<tr id="trcambio_dolarPaginacion" style="display:table-row">
			<td id="tdcambio_dolarPaginacion" align="center">
				<div id="divcambio_dolarPaginacionAjaxWebPart">
				<form id="frmPaginacioncambio_dolar" name="frmPaginacioncambio_dolar">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncambio_dolar" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(cambio_dolar_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcambio_dolar" name="btnSeleccionarLoteFkcambio_dolar" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false' /*&& cambio_dolar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescambio_dolar" name="btnAnteriorescambio_dolar" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(cambio_dolar_web::$STR_ES_BUSQUEDA=='false' && cambio_dolar_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcambio_dolarNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcambio_dolar" name="btnNuevoTablaPrepararcambio_dolar" title="NUEVO Cambio Dolar" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacambio_dolar" name="ParamsPaginar-txtNumeroNuevoTablacambio_dolar" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcambio_dolarConEditarcambio_dolar">
							<label>
								<input id="ParamsBuscar-chbConEditarcambio_dolar" name="ParamsBuscar-chbConEditarcambio_dolar" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false'/* && cambio_dolar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescambio_dolar" name="btnSiguientescambio_dolar" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncambio_dolar -->
				</form> <!-- frmPaginacioncambio_dolar -->
				<form id="frmNuevoPrepararcambio_dolar" name="frmNuevoPrepararcambio_dolar">
				<table id="tblNuevoPrepararcambio_dolar" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trcambio_dolarNuevo" height="10">
						<?php if(cambio_dolar_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcambio_dolarNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcambio_dolar" name="btnNuevoPrepararcambio_dolar" title="NUEVO Cambio Dolar" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcambio_dolarGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscambio_dolar" name="btnGuardarCambioscambio_dolar" title="GUARDAR Cambio Dolar" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false' && cambio_dolar_web::$STR_ES_RELACIONES=='false' && cambio_dolar_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcambio_dolarDuplicar" align="center">
							<input type="button" id="btnDuplicarcambio_dolar" name="btnDuplicarcambio_dolar" title="DUPLICAR Cambio Dolar" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcambio_dolarCopiar" align="center">
							<input type="button" id="btnCopiarcambio_dolar" name="btnCopiarcambio_dolar" title="COPIAR Cambio Dolar" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false' && ((cambio_dolar_web::$STR_ES_RELACIONADO=='false' && cambio_dolar_web::$STR_ES_RELACIONES=='false') || cambio_dolar_web::$STR_ES_BUSQUEDA=='true'  || cambio_dolar_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcambio_dolarCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacambio_dolar" name="btnCerrarPaginacambio_dolar" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcambio_dolar -->
				</form> <!-- frmNuevoPrepararcambio_dolar -->
				</div> <!-- divcambio_dolarPaginacionAjaxWebPart -->
			</td> <!-- tdcambio_dolarPaginacion -->
		</tr> <!-- trcambio_dolarPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescambio_dolarAjaxWebPart">
			<td id="tdAccionesRelacionescambio_dolarAjaxWebPart">
				<div id="divAccionesRelacionescambio_dolarAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescambio_dolarAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescambio_dolarAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycambio_dolar">
			<td id="tdOrderBycambio_dolar">
				<form id="frmOrderBycambio_dolar" name="frmOrderBycambio_dolar">
					<div id="divOrderBycambio_dolarAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycambio_dolar -->
		</tr> <!-- trOrderBycambio_dolar/super -->
			
		
		
		
		
		
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
			
				import {cambio_dolar_webcontrol,cambio_dolar_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/cambio_dolar/js/webcontrol/cambio_dolar_webcontrol.js?random=1';
				
				cambio_dolar_webcontrol1.setcambio_dolar_constante(window.cambio_dolar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cambio_dolar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

