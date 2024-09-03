<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\otro_suplidor\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Otro Suplidor Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/otro_suplidor/util/otro_suplidor_carga.php');
	use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;
	
	//include_once('com/bydan/contabilidad/inventario/otro_suplidor/presentation/view/otro_suplidor_web.php');
	//use com\bydan\contabilidad\inventario\otro_suplidor\presentation\view\otro_suplidor_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	otro_suplidor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	otro_suplidor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$otro_suplidor_web1= new otro_suplidor_web();	
	$otro_suplidor_web1->cargarDatosGenerales();
	
	//$moduloActual=$otro_suplidor_web1->moduloActual;
	//$usuarioActual=$otro_suplidor_web1->usuarioActual;
	//$sessionBase=$otro_suplidor_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$otro_suplidor_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/otro_suplidor/js/templating/otro_suplidor_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/otro_suplidor/js/templating/otro_suplidor_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/otro_suplidor/js/templating/otro_suplidor_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/otro_suplidor/js/templating/otro_suplidor_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/otro_suplidor/js/templating/otro_suplidor_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			otro_suplidor_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					otro_suplidor_web::$GET_POST=$_GET;
				} else {
					otro_suplidor_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			otro_suplidor_web::$STR_NOMBRE_PAGINA = 'otro_suplidor_view.php';
			otro_suplidor_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			otro_suplidor_web::$BIT_ES_PAGINA_FORM = 'false';
				
			otro_suplidor_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {otro_suplidor_constante,otro_suplidor_constante1} from './webroot/js/JavaScript/contabilidad/inventario/otro_suplidor/js/util/otro_suplidor_constante.js?random=1';
			import {otro_suplidor_funcion,otro_suplidor_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/otro_suplidor/js/util/otro_suplidor_funcion.js?random=1';
			
			let otro_suplidor_constante2 = new otro_suplidor_constante();
			
			otro_suplidor_constante2.STR_NOMBRE_PAGINA="<?php echo(otro_suplidor_web::$STR_NOMBRE_PAGINA); ?>";
			otro_suplidor_constante2.STR_TYPE_ON_LOADotro_suplidor="<?php echo(otro_suplidor_web::$STR_TYPE_ONLOAD); ?>";
			otro_suplidor_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(otro_suplidor_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			otro_suplidor_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(otro_suplidor_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			otro_suplidor_constante2.STR_ACTION="<?php echo(otro_suplidor_web::$STR_ACTION); ?>";
			otro_suplidor_constante2.STR_ES_POPUP="<?php echo(otro_suplidor_web::$STR_ES_POPUP); ?>";
			otro_suplidor_constante2.STR_ES_BUSQUEDA="<?php echo(otro_suplidor_web::$STR_ES_BUSQUEDA); ?>";
			otro_suplidor_constante2.STR_FUNCION_JS="<?php echo(otro_suplidor_web::$STR_FUNCION_JS); ?>";
			otro_suplidor_constante2.BIG_ID_ACTUAL="<?php echo(otro_suplidor_web::$BIG_ID_ACTUAL); ?>";
			otro_suplidor_constante2.BIG_ID_OPCION="<?php echo(otro_suplidor_web::$BIG_ID_OPCION); ?>";
			otro_suplidor_constante2.STR_OBJETO_JS="<?php echo(otro_suplidor_web::$STR_OBJETO_JS); ?>";
			otro_suplidor_constante2.STR_ES_RELACIONES="<?php echo(otro_suplidor_web::$STR_ES_RELACIONES); ?>";
			otro_suplidor_constante2.STR_ES_RELACIONADO="<?php echo(otro_suplidor_web::$STR_ES_RELACIONADO); ?>";
			otro_suplidor_constante2.STR_ES_SUB_PAGINA="<?php echo(otro_suplidor_web::$STR_ES_SUB_PAGINA); ?>";
			otro_suplidor_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(otro_suplidor_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			otro_suplidor_constante2.BIT_ES_PAGINA_FORM=<?php echo(otro_suplidor_web::$BIT_ES_PAGINA_FORM); ?>;
			otro_suplidor_constante2.STR_SUFIJO="<?php echo(otro_suplidor_web::$STR_SUF); ?>";//otro_suplidor
			otro_suplidor_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(otro_suplidor_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//otro_suplidor
			
			otro_suplidor_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(otro_suplidor_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			otro_suplidor_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($otro_suplidor_web1->moduloActual->getnombre()); ?>";
			otro_suplidor_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(otro_suplidor_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			otro_suplidor_constante2.BIT_ES_LOAD_NORMAL=true;
			/*otro_suplidor_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			otro_suplidor_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.otro_suplidor_constante2 = otro_suplidor_constante2;
			
		</script>
		
		<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.otro_suplidor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.otro_suplidor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="otro_suplidorActual" ></a>
	
	<div id="divResumenotro_suplidorActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(otro_suplidor_web::$STR_ES_BUSQUEDA=='false' && otro_suplidor_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(otro_suplidor_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false' && otro_suplidor_web::$STR_ES_POPUP=='false' && otro_suplidor_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdotro_suplidorNuevoToolBar">
										<img id="imgNuevoToolBarotro_suplidor" name="imgNuevoToolBarotro_suplidor" title="Nuevo Otro Suplidor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(otro_suplidor_web::$STR_ES_BUSQUEDA=='false' && otro_suplidor_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdotro_suplidorNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarotro_suplidor" name="imgNuevoGuardarCambiosToolBarotro_suplidor" title="Nuevo TABLA Otro Suplidor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(otro_suplidor_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdotro_suplidorGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarotro_suplidor" name="imgGuardarCambiosToolBarotro_suplidor" title="Guardar Otro Suplidor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false' && otro_suplidor_web::$STR_ES_RELACIONES=='false' && otro_suplidor_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdotro_suplidorCopiarToolBar">
										<img id="imgCopiarToolBarotro_suplidor" name="imgCopiarToolBarotro_suplidor" title="Copiar Otro Suplidor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdotro_suplidorDuplicarToolBar">
										<img id="imgDuplicarToolBarotro_suplidor" name="imgDuplicarToolBarotro_suplidor" title="Duplicar Otro Suplidor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdotro_suplidorRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarotro_suplidor" name="imgRecargarInformacionToolBarotro_suplidor" title="Recargar Otro Suplidor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdotro_suplidorAnterioresToolBar">
										<img id="imgAnterioresToolBarotro_suplidor" name="imgAnterioresToolBarotro_suplidor" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdotro_suplidorSiguientesToolBar">
										<img id="imgSiguientesToolBarotro_suplidor" name="imgSiguientesToolBarotro_suplidor" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdotro_suplidorAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarotro_suplidor" name="imgAbrirOrderByToolBarotro_suplidor" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((otro_suplidor_web::$STR_ES_RELACIONADO=='false' && otro_suplidor_web::$STR_ES_RELACIONES=='false') || otro_suplidor_web::$STR_ES_BUSQUEDA=='true'  || otro_suplidor_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdotro_suplidorCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarotro_suplidor" name="imgCerrarPaginaToolBarotro_suplidor" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trotro_suplidorCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaotro_suplidor" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaotro_suplidor',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trotro_suplidorCabeceraBusquedas/super -->

		<tr id="trBusquedaotro_suplidor" class="busqueda" style="display:table-row">
			<td id="tdBusquedaotro_suplidor" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaotro_suplidor" name="frmBusquedaotro_suplidor">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaotro_suplidor" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trotro_suplidorBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idproducto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproducto"> Por Producto</a></li>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por Proveedor</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idproducto">
					<table id="tblstrVisibleFK_Idproducto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Producto</span>
						</td>
						<td align="center">
							<select id="FK_Idproducto-cmbid_producto" name="FK_Idproducto-cmbid_producto" title="Producto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarotro_suplidorFK_Idproducto" name="btnBuscarotro_suplidorFK_Idproducto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproveedor">
					<table id="tblstrVisibleFK_Idproveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Proveedor</span>
						</td>
						<td align="center">
							<select id="FK_Idproveedor-cmbid_proveedor" name="FK_Idproveedor-cmbid_proveedor" title="Proveedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarotro_suplidorFK_Idproveedor" name="btnBuscarotro_suplidorFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarotro_suplidor" style="display:table-row">
					<td id="tdParamsBuscarotro_suplidor">
		<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarotro_suplidor">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosotro_suplidor" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosotro_suplidor"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosotro_suplidor" name="ParamsBuscar-txtNumeroRegistrosotro_suplidor" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionotro_suplidor">
							<td id="tdGenerarReporteotro_suplidor" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosotro_suplidor" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosotro_suplidor" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionotro_suplidor" name="btnRecargarInformacionotro_suplidor" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaotro_suplidor" name="btnImprimirPaginaotro_suplidor" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*otro_suplidor_web::$STR_ES_BUSQUEDA=='false'  &&*/ otro_suplidor_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByotro_suplidor">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByotro_suplidor" name="btnOrderByotro_suplidor" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelotro_suplidor" name="btnOrderByRelotro_suplidor" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(otro_suplidor_web::$STR_ES_RELACIONES=='false' && otro_suplidor_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(otro_suplidor_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdotro_suplidorConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosotro_suplidor -->

							</td><!-- tdGenerarReporteotro_suplidor -->
						</tr><!-- trRecargarInformacionotro_suplidor -->
					</table><!-- tblParamsBuscarNumeroRegistrosotro_suplidor -->
				</div> <!-- divParamsBuscarotro_suplidor -->
		<?php } ?>
				</td> <!-- tdParamsBuscarotro_suplidor -->
				</tr><!-- trParamsBuscarotro_suplidor -->
				</table> <!-- tblBusquedaotro_suplidor -->
				</form> <!-- frmBusquedaotro_suplidor -->
				

			</td> <!-- tdBusquedaotro_suplidor -->
		</tr> <!-- trBusquedaotro_suplidor/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divotro_suplidorPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblotro_suplidorPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmotro_suplidorAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnotro_suplidorAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="otro_suplidor_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnotro_suplidorAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmotro_suplidorAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblotro_suplidorPopupAjaxWebPart -->
		</div> <!-- divotro_suplidorPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trotro_suplidorTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaotro_suplidor"></a>
		<img id="imgTablaParaDerechaotro_suplidor" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaotro_suplidor'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaotro_suplidor" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaotro_suplidor'"/>
		<a id="TablaDerechaotro_suplidor"></a>
	</td>
</tr> <!-- trotro_suplidorTablaNavegacion/super -->
<?php } ?>

<tr id="trotro_suplidorTablaDatos">
	<td colspan="3" id="htmlTableCellotro_suplidor">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosotro_suplidorsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trotro_suplidorTablaDatos/super -->
		
		
		<tr id="trotro_suplidorPaginacion" style="display:table-row">
			<td id="tdotro_suplidorPaginacion" align="center">
				<div id="divotro_suplidorPaginacionAjaxWebPart">
				<form id="frmPaginacionotro_suplidor" name="frmPaginacionotro_suplidor">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionotro_suplidor" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(otro_suplidor_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkotro_suplidor" name="btnSeleccionarLoteFkotro_suplidor" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false' /*&& otro_suplidor_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresotro_suplidor" name="btnAnterioresotro_suplidor" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(otro_suplidor_web::$STR_ES_BUSQUEDA=='false' && otro_suplidor_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdotro_suplidorNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararotro_suplidor" name="btnNuevoTablaPrepararotro_suplidor" title="NUEVO Otro Suplidor" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaotro_suplidor" name="ParamsPaginar-txtNumeroNuevoTablaotro_suplidor" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdotro_suplidorConEditarotro_suplidor">
							<label>
								<input id="ParamsBuscar-chbConEditarotro_suplidor" name="ParamsBuscar-chbConEditarotro_suplidor" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false'/* && otro_suplidor_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesotro_suplidor" name="btnSiguientesotro_suplidor" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionotro_suplidor -->
				</form> <!-- frmPaginacionotro_suplidor -->
				<form id="frmNuevoPrepararotro_suplidor" name="frmNuevoPrepararotro_suplidor">
				<table id="tblNuevoPrepararotro_suplidor" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trotro_suplidorNuevo" height="10">
						<?php if(otro_suplidor_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdotro_suplidorNuevo" align="center">
							<input type="button" id="btnNuevoPrepararotro_suplidor" name="btnNuevoPrepararotro_suplidor" title="NUEVO Otro Suplidor" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdotro_suplidorGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosotro_suplidor" name="btnGuardarCambiosotro_suplidor" title="GUARDAR Otro Suplidor" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false' && otro_suplidor_web::$STR_ES_RELACIONES=='false' && otro_suplidor_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdotro_suplidorDuplicar" align="center">
							<input type="button" id="btnDuplicarotro_suplidor" name="btnDuplicarotro_suplidor" title="DUPLICAR Otro Suplidor" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdotro_suplidorCopiar" align="center">
							<input type="button" id="btnCopiarotro_suplidor" name="btnCopiarotro_suplidor" title="COPIAR Otro Suplidor" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false' && ((otro_suplidor_web::$STR_ES_RELACIONADO=='false' && otro_suplidor_web::$STR_ES_RELACIONES=='false') || otro_suplidor_web::$STR_ES_BUSQUEDA=='true'  || otro_suplidor_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdotro_suplidorCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaotro_suplidor" name="btnCerrarPaginaotro_suplidor" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararotro_suplidor -->
				</form> <!-- frmNuevoPrepararotro_suplidor -->
				</div> <!-- divotro_suplidorPaginacionAjaxWebPart -->
			</td> <!-- tdotro_suplidorPaginacion -->
		</tr> <!-- trotro_suplidorPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesotro_suplidorAjaxWebPart">
			<td id="tdAccionesRelacionesotro_suplidorAjaxWebPart">
				<div id="divAccionesRelacionesotro_suplidorAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesotro_suplidorAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesotro_suplidorAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByotro_suplidor">
			<td id="tdOrderByotro_suplidor">
				<form id="frmOrderByotro_suplidor" name="frmOrderByotro_suplidor">
					<div id="divOrderByotro_suplidorAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelotro_suplidor" name="frmOrderByRelotro_suplidor">
					<div id="divOrderByRelotro_suplidorAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByotro_suplidor -->
		</tr> <!-- trOrderByotro_suplidor/super -->
			
		
		
		
		
		
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
			
				import {otro_suplidor_webcontrol,otro_suplidor_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/otro_suplidor/js/webcontrol/otro_suplidor_webcontrol.js?random=1';
				
				otro_suplidor_webcontrol1.setotro_suplidor_constante(window.otro_suplidor_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(otro_suplidor_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

