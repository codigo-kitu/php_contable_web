<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\otro_parametro\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Otros Parametros Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/otro_parametro/util/otro_parametro_carga.php');
	use com\bydan\contabilidad\general\otro_parametro\util\otro_parametro_carga;
	
	//include_once('com/bydan/contabilidad/general/otro_parametro/presentation/view/otro_parametro_web.php');
	//use com\bydan\contabilidad\general\otro_parametro\presentation\view\otro_parametro_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	otro_parametro_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	otro_parametro_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$otro_parametro_web1= new otro_parametro_web();	
	$otro_parametro_web1->cargarDatosGenerales();
	
	//$moduloActual=$otro_parametro_web1->moduloActual;
	//$usuarioActual=$otro_parametro_web1->usuarioActual;
	//$sessionBase=$otro_parametro_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$otro_parametro_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/otro_parametro/js/templating/otro_parametro_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/otro_parametro/js/templating/otro_parametro_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/otro_parametro/js/templating/otro_parametro_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/otro_parametro/js/templating/otro_parametro_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			otro_parametro_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					otro_parametro_web::$GET_POST=$_GET;
				} else {
					otro_parametro_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			otro_parametro_web::$STR_NOMBRE_PAGINA = 'otro_parametro_view.php';
			otro_parametro_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			otro_parametro_web::$BIT_ES_PAGINA_FORM = 'false';
				
			otro_parametro_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {otro_parametro_constante,otro_parametro_constante1} from './webroot/js/JavaScript/contabilidad/general/otro_parametro/js/util/otro_parametro_constante.js?random=1';
			import {otro_parametro_funcion,otro_parametro_funcion1} from './webroot/js/JavaScript/contabilidad/general/otro_parametro/js/util/otro_parametro_funcion.js?random=1';
			
			let otro_parametro_constante2 = new otro_parametro_constante();
			
			otro_parametro_constante2.STR_NOMBRE_PAGINA="<?php echo(otro_parametro_web::$STR_NOMBRE_PAGINA); ?>";
			otro_parametro_constante2.STR_TYPE_ON_LOADotro_parametro="<?php echo(otro_parametro_web::$STR_TYPE_ONLOAD); ?>";
			otro_parametro_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(otro_parametro_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			otro_parametro_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(otro_parametro_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			otro_parametro_constante2.STR_ACTION="<?php echo(otro_parametro_web::$STR_ACTION); ?>";
			otro_parametro_constante2.STR_ES_POPUP="<?php echo(otro_parametro_web::$STR_ES_POPUP); ?>";
			otro_parametro_constante2.STR_ES_BUSQUEDA="<?php echo(otro_parametro_web::$STR_ES_BUSQUEDA); ?>";
			otro_parametro_constante2.STR_FUNCION_JS="<?php echo(otro_parametro_web::$STR_FUNCION_JS); ?>";
			otro_parametro_constante2.BIG_ID_ACTUAL="<?php echo(otro_parametro_web::$BIG_ID_ACTUAL); ?>";
			otro_parametro_constante2.BIG_ID_OPCION="<?php echo(otro_parametro_web::$BIG_ID_OPCION); ?>";
			otro_parametro_constante2.STR_OBJETO_JS="<?php echo(otro_parametro_web::$STR_OBJETO_JS); ?>";
			otro_parametro_constante2.STR_ES_RELACIONES="<?php echo(otro_parametro_web::$STR_ES_RELACIONES); ?>";
			otro_parametro_constante2.STR_ES_RELACIONADO="<?php echo(otro_parametro_web::$STR_ES_RELACIONADO); ?>";
			otro_parametro_constante2.STR_ES_SUB_PAGINA="<?php echo(otro_parametro_web::$STR_ES_SUB_PAGINA); ?>";
			otro_parametro_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(otro_parametro_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			otro_parametro_constante2.BIT_ES_PAGINA_FORM=<?php echo(otro_parametro_web::$BIT_ES_PAGINA_FORM); ?>;
			otro_parametro_constante2.STR_SUFIJO="<?php echo(otro_parametro_web::$STR_SUF); ?>";//otro_parametro
			otro_parametro_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(otro_parametro_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//otro_parametro
			
			otro_parametro_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(otro_parametro_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			otro_parametro_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($otro_parametro_web1->moduloActual->getnombre()); ?>";
			otro_parametro_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(otro_parametro_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			otro_parametro_constante2.BIT_ES_LOAD_NORMAL=true;
			/*otro_parametro_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			otro_parametro_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.otro_parametro_constante2 = otro_parametro_constante2;
			
		</script>
		
		<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.otro_parametro_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.otro_parametro_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="otro_parametroActual" ></a>
	
	<div id="divResumenotro_parametroActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(otro_parametro_web::$STR_ES_BUSQUEDA=='false' && otro_parametro_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(otro_parametro_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false' && otro_parametro_web::$STR_ES_POPUP=='false' && otro_parametro_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdotro_parametroNuevoToolBar">
										<img id="imgNuevoToolBarotro_parametro" name="imgNuevoToolBarotro_parametro" title="Nuevo Otros Parametros" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(otro_parametro_web::$STR_ES_BUSQUEDA=='false' && otro_parametro_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdotro_parametroNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarotro_parametro" name="imgNuevoGuardarCambiosToolBarotro_parametro" title="Nuevo TABLA Otros Parametros" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(otro_parametro_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdotro_parametroGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarotro_parametro" name="imgGuardarCambiosToolBarotro_parametro" title="Guardar Otros Parametros" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false' && otro_parametro_web::$STR_ES_RELACIONES=='false' && otro_parametro_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdotro_parametroCopiarToolBar">
										<img id="imgCopiarToolBarotro_parametro" name="imgCopiarToolBarotro_parametro" title="Copiar Otros Parametros" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdotro_parametroDuplicarToolBar">
										<img id="imgDuplicarToolBarotro_parametro" name="imgDuplicarToolBarotro_parametro" title="Duplicar Otros Parametros" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdotro_parametroRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarotro_parametro" name="imgRecargarInformacionToolBarotro_parametro" title="Recargar Otros Parametros" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdotro_parametroAnterioresToolBar">
										<img id="imgAnterioresToolBarotro_parametro" name="imgAnterioresToolBarotro_parametro" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdotro_parametroSiguientesToolBar">
										<img id="imgSiguientesToolBarotro_parametro" name="imgSiguientesToolBarotro_parametro" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdotro_parametroAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarotro_parametro" name="imgAbrirOrderByToolBarotro_parametro" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((otro_parametro_web::$STR_ES_RELACIONADO=='false' && otro_parametro_web::$STR_ES_RELACIONES=='false') || otro_parametro_web::$STR_ES_BUSQUEDA=='true'  || otro_parametro_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdotro_parametroCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarotro_parametro" name="imgCerrarPaginaToolBarotro_parametro" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trotro_parametroCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaotro_parametro" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaotro_parametro',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trotro_parametroCabeceraBusquedas/super -->

		<tr id="trBusquedaotro_parametro" class="busqueda" style="display:table-row">
			<td id="tdBusquedaotro_parametro" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaotro_parametro" name="frmBusquedaotro_parametro">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaotro_parametro" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trotro_parametroBusquedas" class="busqueda" style="display:none"><td>
				<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarotro_parametro" style="display:table-row">
					<td id="tdParamsBuscarotro_parametro">
		<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarotro_parametro">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosotro_parametro" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosotro_parametro"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosotro_parametro" name="ParamsBuscar-txtNumeroRegistrosotro_parametro" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionotro_parametro">
							<td id="tdGenerarReporteotro_parametro" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosotro_parametro" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosotro_parametro" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionotro_parametro" name="btnRecargarInformacionotro_parametro" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaotro_parametro" name="btnImprimirPaginaotro_parametro" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*otro_parametro_web::$STR_ES_BUSQUEDA=='false'  &&*/ otro_parametro_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByotro_parametro">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByotro_parametro" name="btnOrderByotro_parametro" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(otro_parametro_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdotro_parametroConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosotro_parametro -->

							</td><!-- tdGenerarReporteotro_parametro -->
						</tr><!-- trRecargarInformacionotro_parametro -->
					</table><!-- tblParamsBuscarNumeroRegistrosotro_parametro -->
				</div> <!-- divParamsBuscarotro_parametro -->
		<?php } ?>
				</td> <!-- tdParamsBuscarotro_parametro -->
				</tr><!-- trParamsBuscarotro_parametro -->
				</table> <!-- tblBusquedaotro_parametro -->
				</form> <!-- frmBusquedaotro_parametro -->
				

			</td> <!-- tdBusquedaotro_parametro -->
		</tr> <!-- trBusquedaotro_parametro/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divotro_parametroPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblotro_parametroPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmotro_parametroAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnotro_parametroAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="otro_parametro_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnotro_parametroAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmotro_parametroAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblotro_parametroPopupAjaxWebPart -->
		</div> <!-- divotro_parametroPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trotro_parametroTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaotro_parametro"></a>
		<img id="imgTablaParaDerechaotro_parametro" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaotro_parametro'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaotro_parametro" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaotro_parametro'"/>
		<a id="TablaDerechaotro_parametro"></a>
	</td>
</tr> <!-- trotro_parametroTablaNavegacion/super -->
<?php } ?>

<tr id="trotro_parametroTablaDatos">
	<td colspan="3" id="htmlTableCellotro_parametro">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosotro_parametrosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trotro_parametroTablaDatos/super -->
		
		
		<tr id="trotro_parametroPaginacion" style="display:table-row">
			<td id="tdotro_parametroPaginacion" align="center">
				<div id="divotro_parametroPaginacionAjaxWebPart">
				<form id="frmPaginacionotro_parametro" name="frmPaginacionotro_parametro">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionotro_parametro" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(otro_parametro_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkotro_parametro" name="btnSeleccionarLoteFkotro_parametro" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false' /*&& otro_parametro_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresotro_parametro" name="btnAnterioresotro_parametro" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(otro_parametro_web::$STR_ES_BUSQUEDA=='false' && otro_parametro_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdotro_parametroNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararotro_parametro" name="btnNuevoTablaPrepararotro_parametro" title="NUEVO Otros Parametros" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaotro_parametro" name="ParamsPaginar-txtNumeroNuevoTablaotro_parametro" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdotro_parametroConEditarotro_parametro">
							<label>
								<input id="ParamsBuscar-chbConEditarotro_parametro" name="ParamsBuscar-chbConEditarotro_parametro" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false'/* && otro_parametro_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesotro_parametro" name="btnSiguientesotro_parametro" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionotro_parametro -->
				</form> <!-- frmPaginacionotro_parametro -->
				<form id="frmNuevoPrepararotro_parametro" name="frmNuevoPrepararotro_parametro">
				<table id="tblNuevoPrepararotro_parametro" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trotro_parametroNuevo" height="10">
						<?php if(otro_parametro_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdotro_parametroNuevo" align="center">
							<input type="button" id="btnNuevoPrepararotro_parametro" name="btnNuevoPrepararotro_parametro" title="NUEVO Otros Parametros" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdotro_parametroGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosotro_parametro" name="btnGuardarCambiosotro_parametro" title="GUARDAR Otros Parametros" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false' && otro_parametro_web::$STR_ES_RELACIONES=='false' && otro_parametro_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdotro_parametroDuplicar" align="center">
							<input type="button" id="btnDuplicarotro_parametro" name="btnDuplicarotro_parametro" title="DUPLICAR Otros Parametros" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdotro_parametroCopiar" align="center">
							<input type="button" id="btnCopiarotro_parametro" name="btnCopiarotro_parametro" title="COPIAR Otros Parametros" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false' && ((otro_parametro_web::$STR_ES_RELACIONADO=='false' && otro_parametro_web::$STR_ES_RELACIONES=='false') || otro_parametro_web::$STR_ES_BUSQUEDA=='true'  || otro_parametro_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdotro_parametroCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaotro_parametro" name="btnCerrarPaginaotro_parametro" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararotro_parametro -->
				</form> <!-- frmNuevoPrepararotro_parametro -->
				</div> <!-- divotro_parametroPaginacionAjaxWebPart -->
			</td> <!-- tdotro_parametroPaginacion -->
		</tr> <!-- trotro_parametroPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesotro_parametroAjaxWebPart">
			<td id="tdAccionesRelacionesotro_parametroAjaxWebPart">
				<div id="divAccionesRelacionesotro_parametroAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesotro_parametroAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesotro_parametroAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByotro_parametro">
			<td id="tdOrderByotro_parametro">
				<form id="frmOrderByotro_parametro" name="frmOrderByotro_parametro">
					<div id="divOrderByotro_parametroAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByotro_parametro -->
		</tr> <!-- trOrderByotro_parametro/super -->
			
		
		
		
		
		
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
			
				import {otro_parametro_webcontrol,otro_parametro_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/otro_parametro/js/webcontrol/otro_parametro_webcontrol.js?random=1';
				
				otro_parametro_webcontrol1.setotro_parametro_constante(window.otro_parametro_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(otro_parametro_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

