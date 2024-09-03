<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\otro_impuesto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Otro Impuesto Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/otro_impuesto/util/otro_impuesto_carga.php');
	use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/otro_impuesto/presentation/view/otro_impuesto_web.php');
	//use com\bydan\contabilidad\facturacion\otro_impuesto\presentation\view\otro_impuesto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	otro_impuesto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	otro_impuesto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$otro_impuesto_web1= new otro_impuesto_web();	
	$otro_impuesto_web1->cargarDatosGenerales();
	
	//$moduloActual=$otro_impuesto_web1->moduloActual;
	//$usuarioActual=$otro_impuesto_web1->usuarioActual;
	//$sessionBase=$otro_impuesto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$otro_impuesto_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/otro_impuesto/js/templating/otro_impuesto_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/otro_impuesto/js/templating/otro_impuesto_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/otro_impuesto/js/templating/otro_impuesto_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/otro_impuesto/js/templating/otro_impuesto_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/otro_impuesto/js/templating/otro_impuesto_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			otro_impuesto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					otro_impuesto_web::$GET_POST=$_GET;
				} else {
					otro_impuesto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			otro_impuesto_web::$STR_NOMBRE_PAGINA = 'otro_impuesto_view.php';
			otro_impuesto_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			otro_impuesto_web::$BIT_ES_PAGINA_FORM = 'false';
				
			otro_impuesto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {otro_impuesto_constante,otro_impuesto_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/otro_impuesto/js/util/otro_impuesto_constante.js?random=1';
			import {otro_impuesto_funcion,otro_impuesto_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/otro_impuesto/js/util/otro_impuesto_funcion.js?random=1';
			
			let otro_impuesto_constante2 = new otro_impuesto_constante();
			
			otro_impuesto_constante2.STR_NOMBRE_PAGINA="<?php echo(otro_impuesto_web::$STR_NOMBRE_PAGINA); ?>";
			otro_impuesto_constante2.STR_TYPE_ON_LOADotro_impuesto="<?php echo(otro_impuesto_web::$STR_TYPE_ONLOAD); ?>";
			otro_impuesto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(otro_impuesto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			otro_impuesto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(otro_impuesto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			otro_impuesto_constante2.STR_ACTION="<?php echo(otro_impuesto_web::$STR_ACTION); ?>";
			otro_impuesto_constante2.STR_ES_POPUP="<?php echo(otro_impuesto_web::$STR_ES_POPUP); ?>";
			otro_impuesto_constante2.STR_ES_BUSQUEDA="<?php echo(otro_impuesto_web::$STR_ES_BUSQUEDA); ?>";
			otro_impuesto_constante2.STR_FUNCION_JS="<?php echo(otro_impuesto_web::$STR_FUNCION_JS); ?>";
			otro_impuesto_constante2.BIG_ID_ACTUAL="<?php echo(otro_impuesto_web::$BIG_ID_ACTUAL); ?>";
			otro_impuesto_constante2.BIG_ID_OPCION="<?php echo(otro_impuesto_web::$BIG_ID_OPCION); ?>";
			otro_impuesto_constante2.STR_OBJETO_JS="<?php echo(otro_impuesto_web::$STR_OBJETO_JS); ?>";
			otro_impuesto_constante2.STR_ES_RELACIONES="<?php echo(otro_impuesto_web::$STR_ES_RELACIONES); ?>";
			otro_impuesto_constante2.STR_ES_RELACIONADO="<?php echo(otro_impuesto_web::$STR_ES_RELACIONADO); ?>";
			otro_impuesto_constante2.STR_ES_SUB_PAGINA="<?php echo(otro_impuesto_web::$STR_ES_SUB_PAGINA); ?>";
			otro_impuesto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(otro_impuesto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			otro_impuesto_constante2.BIT_ES_PAGINA_FORM=<?php echo(otro_impuesto_web::$BIT_ES_PAGINA_FORM); ?>;
			otro_impuesto_constante2.STR_SUFIJO="<?php echo(otro_impuesto_web::$STR_SUF); ?>";//otro_impuesto
			otro_impuesto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(otro_impuesto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//otro_impuesto
			
			otro_impuesto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(otro_impuesto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			otro_impuesto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($otro_impuesto_web1->moduloActual->getnombre()); ?>";
			otro_impuesto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(otro_impuesto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			otro_impuesto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*otro_impuesto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			otro_impuesto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.otro_impuesto_constante2 = otro_impuesto_constante2;
			
		</script>
		
		<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.otro_impuesto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.otro_impuesto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="otro_impuestoActual" ></a>
	
	<div id="divResumenotro_impuestoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(otro_impuesto_web::$STR_ES_BUSQUEDA=='false' && otro_impuesto_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(otro_impuesto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false' && otro_impuesto_web::$STR_ES_POPUP=='false' && otro_impuesto_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdotro_impuestoNuevoToolBar">
										<img id="imgNuevoToolBarotro_impuesto" name="imgNuevoToolBarotro_impuesto" title="Nuevo Otro Impuesto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(otro_impuesto_web::$STR_ES_BUSQUEDA=='false' && otro_impuesto_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdotro_impuestoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarotro_impuesto" name="imgNuevoGuardarCambiosToolBarotro_impuesto" title="Nuevo TABLA Otro Impuesto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(otro_impuesto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdotro_impuestoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarotro_impuesto" name="imgGuardarCambiosToolBarotro_impuesto" title="Guardar Otro Impuesto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false' && otro_impuesto_web::$STR_ES_RELACIONES=='false' && otro_impuesto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdotro_impuestoCopiarToolBar">
										<img id="imgCopiarToolBarotro_impuesto" name="imgCopiarToolBarotro_impuesto" title="Copiar Otro Impuesto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdotro_impuestoDuplicarToolBar">
										<img id="imgDuplicarToolBarotro_impuesto" name="imgDuplicarToolBarotro_impuesto" title="Duplicar Otro Impuesto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdotro_impuestoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarotro_impuesto" name="imgRecargarInformacionToolBarotro_impuesto" title="Recargar Otro Impuesto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdotro_impuestoAnterioresToolBar">
										<img id="imgAnterioresToolBarotro_impuesto" name="imgAnterioresToolBarotro_impuesto" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdotro_impuestoSiguientesToolBar">
										<img id="imgSiguientesToolBarotro_impuesto" name="imgSiguientesToolBarotro_impuesto" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdotro_impuestoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarotro_impuesto" name="imgAbrirOrderByToolBarotro_impuesto" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((otro_impuesto_web::$STR_ES_RELACIONADO=='false' && otro_impuesto_web::$STR_ES_RELACIONES=='false') || otro_impuesto_web::$STR_ES_BUSQUEDA=='true'  || otro_impuesto_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdotro_impuestoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarotro_impuesto" name="imgCerrarPaginaToolBarotro_impuesto" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trotro_impuestoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaotro_impuesto" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaotro_impuesto',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trotro_impuestoCabeceraBusquedas/super -->

		<tr id="trBusquedaotro_impuesto" class="busqueda" style="display:table-row">
			<td id="tdBusquedaotro_impuesto" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaotro_impuesto" name="frmBusquedaotro_impuesto">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaotro_impuesto" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trotro_impuestoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcuenta_compras" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_compras"> Por  Cuentas Compras</a></li>
						<li id="listrVisibleFK_Idcuenta_ventas" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_ventas"> Por  Cuentas Ventas</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcuenta_compras">
					<table id="tblstrVisibleFK_Idcuenta_compras" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuentas Compras</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_compras-cmbid_cuenta_compras" name="FK_Idcuenta_compras-cmbid_cuenta_compras" title=" Cuentas Compras" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarotro_impuestoFK_Idcuenta_compras" name="btnBuscarotro_impuestoFK_Idcuenta_compras" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta_ventas">
					<table id="tblstrVisibleFK_Idcuenta_ventas" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuentas Ventas</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_ventas-cmbid_cuenta_ventas" name="FK_Idcuenta_ventas-cmbid_cuenta_ventas" title=" Cuentas Ventas" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarotro_impuestoFK_Idcuenta_ventas" name="btnBuscarotro_impuestoFK_Idcuenta_ventas" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarotro_impuesto" style="display:table-row">
					<td id="tdParamsBuscarotro_impuesto">
		<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarotro_impuesto">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosotro_impuesto" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosotro_impuesto"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosotro_impuesto" name="ParamsBuscar-txtNumeroRegistrosotro_impuesto" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionotro_impuesto">
							<td id="tdGenerarReporteotro_impuesto" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosotro_impuesto" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosotro_impuesto" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionotro_impuesto" name="btnRecargarInformacionotro_impuesto" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaotro_impuesto" name="btnImprimirPaginaotro_impuesto" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*otro_impuesto_web::$STR_ES_BUSQUEDA=='false'  &&*/ otro_impuesto_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByotro_impuesto">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByotro_impuesto" name="btnOrderByotro_impuesto" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelotro_impuesto" name="btnOrderByRelotro_impuesto" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(otro_impuesto_web::$STR_ES_RELACIONES=='false' && otro_impuesto_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(otro_impuesto_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdotro_impuestoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosotro_impuesto -->

							</td><!-- tdGenerarReporteotro_impuesto -->
						</tr><!-- trRecargarInformacionotro_impuesto -->
					</table><!-- tblParamsBuscarNumeroRegistrosotro_impuesto -->
				</div> <!-- divParamsBuscarotro_impuesto -->
		<?php } ?>
				</td> <!-- tdParamsBuscarotro_impuesto -->
				</tr><!-- trParamsBuscarotro_impuesto -->
				</table> <!-- tblBusquedaotro_impuesto -->
				</form> <!-- frmBusquedaotro_impuesto -->
				

			</td> <!-- tdBusquedaotro_impuesto -->
		</tr> <!-- trBusquedaotro_impuesto/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divotro_impuestoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblotro_impuestoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmotro_impuestoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnotro_impuestoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="otro_impuesto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnotro_impuestoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmotro_impuestoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblotro_impuestoPopupAjaxWebPart -->
		</div> <!-- divotro_impuestoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trotro_impuestoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaotro_impuesto"></a>
		<img id="imgTablaParaDerechaotro_impuesto" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaotro_impuesto'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaotro_impuesto" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaotro_impuesto'"/>
		<a id="TablaDerechaotro_impuesto"></a>
	</td>
</tr> <!-- trotro_impuestoTablaNavegacion/super -->
<?php } ?>

<tr id="trotro_impuestoTablaDatos">
	<td colspan="3" id="htmlTableCellotro_impuesto">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosotro_impuestosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trotro_impuestoTablaDatos/super -->
		
		
		<tr id="trotro_impuestoPaginacion" style="display:table-row">
			<td id="tdotro_impuestoPaginacion" align="left">
				<div id="divotro_impuestoPaginacionAjaxWebPart">
				<form id="frmPaginacionotro_impuesto" name="frmPaginacionotro_impuesto">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionotro_impuesto" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(otro_impuesto_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkotro_impuesto" name="btnSeleccionarLoteFkotro_impuesto" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false' /*&& otro_impuesto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresotro_impuesto" name="btnAnterioresotro_impuesto" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(otro_impuesto_web::$STR_ES_BUSQUEDA=='false' && otro_impuesto_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdotro_impuestoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararotro_impuesto" name="btnNuevoTablaPrepararotro_impuesto" title="NUEVO Otro Impuesto" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaotro_impuesto" name="ParamsPaginar-txtNumeroNuevoTablaotro_impuesto" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdotro_impuestoConEditarotro_impuesto">
							<label>
								<input id="ParamsBuscar-chbConEditarotro_impuesto" name="ParamsBuscar-chbConEditarotro_impuesto" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false'/* && otro_impuesto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesotro_impuesto" name="btnSiguientesotro_impuesto" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionotro_impuesto -->
				</form> <!-- frmPaginacionotro_impuesto -->
				<form id="frmNuevoPrepararotro_impuesto" name="frmNuevoPrepararotro_impuesto">
				<table id="tblNuevoPrepararotro_impuesto" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trotro_impuestoNuevo" height="10">
						<?php if(otro_impuesto_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdotro_impuestoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararotro_impuesto" name="btnNuevoPrepararotro_impuesto" title="NUEVO Otro Impuesto" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdotro_impuestoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosotro_impuesto" name="btnGuardarCambiosotro_impuesto" title="GUARDAR Otro Impuesto" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false' && otro_impuesto_web::$STR_ES_RELACIONES=='false' && otro_impuesto_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdotro_impuestoDuplicar" align="center">
							<input type="button" id="btnDuplicarotro_impuesto" name="btnDuplicarotro_impuesto" title="DUPLICAR Otro Impuesto" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdotro_impuestoCopiar" align="center">
							<input type="button" id="btnCopiarotro_impuesto" name="btnCopiarotro_impuesto" title="COPIAR Otro Impuesto" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false' && ((otro_impuesto_web::$STR_ES_RELACIONADO=='false' && otro_impuesto_web::$STR_ES_RELACIONES=='false') || otro_impuesto_web::$STR_ES_BUSQUEDA=='true'  || otro_impuesto_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdotro_impuestoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaotro_impuesto" name="btnCerrarPaginaotro_impuesto" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararotro_impuesto -->
				</form> <!-- frmNuevoPrepararotro_impuesto -->
				</div> <!-- divotro_impuestoPaginacionAjaxWebPart -->
			</td> <!-- tdotro_impuestoPaginacion -->
		</tr> <!-- trotro_impuestoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesotro_impuestoAjaxWebPart">
			<td id="tdAccionesRelacionesotro_impuestoAjaxWebPart">
				<div id="divAccionesRelacionesotro_impuestoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesotro_impuestoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesotro_impuestoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByotro_impuesto">
			<td id="tdOrderByotro_impuesto">
				<form id="frmOrderByotro_impuesto" name="frmOrderByotro_impuesto">
					<div id="divOrderByotro_impuestoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelotro_impuesto" name="frmOrderByRelotro_impuesto">
					<div id="divOrderByRelotro_impuestoAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByotro_impuesto -->
		</tr> <!-- trOrderByotro_impuesto/super -->
			
		
		
		
		
		
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
			
				import {otro_impuesto_webcontrol,otro_impuesto_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/otro_impuesto/js/webcontrol/otro_impuesto_webcontrol.js?random=1';
				
				otro_impuesto_webcontrol1.setotro_impuesto_constante(window.otro_impuesto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(otro_impuesto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

