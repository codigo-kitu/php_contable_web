<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\ciudad\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Ciudad Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/ciudad/util/ciudad_carga.php');
	use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/ciudad/presentation/view/ciudad_web.php');
	//use com\bydan\contabilidad\seguridad\ciudad\presentation\view\ciudad_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	ciudad_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	ciudad_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$ciudad_web1= new ciudad_web();	
	$ciudad_web1->cargarDatosGenerales();
	
	//$moduloActual=$ciudad_web1->moduloActual;
	//$usuarioActual=$ciudad_web1->usuarioActual;
	//$sessionBase=$ciudad_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$ciudad_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/ciudad/js/templating/ciudad_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/ciudad/js/templating/ciudad_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/ciudad/js/templating/ciudad_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/ciudad/js/templating/ciudad_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/ciudad/js/templating/ciudad_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			ciudad_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					ciudad_web::$GET_POST=$_GET;
				} else {
					ciudad_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			ciudad_web::$STR_NOMBRE_PAGINA = 'ciudad_view.php';
			ciudad_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			ciudad_web::$BIT_ES_PAGINA_FORM = 'false';
				
			ciudad_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {ciudad_constante,ciudad_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/ciudad/js/util/ciudad_constante.js?random=1';
			import {ciudad_funcion,ciudad_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/ciudad/js/util/ciudad_funcion.js?random=1';
			
			let ciudad_constante2 = new ciudad_constante();
			
			ciudad_constante2.STR_NOMBRE_PAGINA="<?php echo(ciudad_web::$STR_NOMBRE_PAGINA); ?>";
			ciudad_constante2.STR_TYPE_ON_LOADciudad="<?php echo(ciudad_web::$STR_TYPE_ONLOAD); ?>";
			ciudad_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(ciudad_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			ciudad_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(ciudad_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			ciudad_constante2.STR_ACTION="<?php echo(ciudad_web::$STR_ACTION); ?>";
			ciudad_constante2.STR_ES_POPUP="<?php echo(ciudad_web::$STR_ES_POPUP); ?>";
			ciudad_constante2.STR_ES_BUSQUEDA="<?php echo(ciudad_web::$STR_ES_BUSQUEDA); ?>";
			ciudad_constante2.STR_FUNCION_JS="<?php echo(ciudad_web::$STR_FUNCION_JS); ?>";
			ciudad_constante2.BIG_ID_ACTUAL="<?php echo(ciudad_web::$BIG_ID_ACTUAL); ?>";
			ciudad_constante2.BIG_ID_OPCION="<?php echo(ciudad_web::$BIG_ID_OPCION); ?>";
			ciudad_constante2.STR_OBJETO_JS="<?php echo(ciudad_web::$STR_OBJETO_JS); ?>";
			ciudad_constante2.STR_ES_RELACIONES="<?php echo(ciudad_web::$STR_ES_RELACIONES); ?>";
			ciudad_constante2.STR_ES_RELACIONADO="<?php echo(ciudad_web::$STR_ES_RELACIONADO); ?>";
			ciudad_constante2.STR_ES_SUB_PAGINA="<?php echo(ciudad_web::$STR_ES_SUB_PAGINA); ?>";
			ciudad_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(ciudad_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			ciudad_constante2.BIT_ES_PAGINA_FORM=<?php echo(ciudad_web::$BIT_ES_PAGINA_FORM); ?>;
			ciudad_constante2.STR_SUFIJO="<?php echo(ciudad_web::$STR_SUF); ?>";//ciudad
			ciudad_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(ciudad_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//ciudad
			
			ciudad_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(ciudad_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			ciudad_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($ciudad_web1->moduloActual->getnombre()); ?>";
			ciudad_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(ciudad_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			ciudad_constante2.BIT_ES_LOAD_NORMAL=true;
			/*ciudad_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			ciudad_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.ciudad_constante2 = ciudad_constante2;
			
		</script>
		
		<?php if(ciudad_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.ciudad_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.ciudad_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="ciudadActual" ></a>
	
	<div id="divResumenciudadActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(ciudad_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(ciudad_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(ciudad_web::$STR_ES_BUSQUEDA=='false' && ciudad_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(ciudad_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(ciudad_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(ciudad_web::$STR_ES_RELACIONADO=='false' && ciudad_web::$STR_ES_POPUP=='false' && ciudad_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdciudadNuevoToolBar">
										<img id="imgNuevoToolBarciudad" name="imgNuevoToolBarciudad" title="Nuevo Ciudad" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(ciudad_web::$STR_ES_BUSQUEDA=='false' && ciudad_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdciudadNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarciudad" name="imgNuevoGuardarCambiosToolBarciudad" title="Nuevo TABLA Ciudad" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(ciudad_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdciudadGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarciudad" name="imgGuardarCambiosToolBarciudad" title="Guardar Ciudad" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(ciudad_web::$STR_ES_RELACIONADO=='false' && ciudad_web::$STR_ES_RELACIONES=='false' && ciudad_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdciudadCopiarToolBar">
										<img id="imgCopiarToolBarciudad" name="imgCopiarToolBarciudad" title="Copiar Ciudad" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdciudadDuplicarToolBar">
										<img id="imgDuplicarToolBarciudad" name="imgDuplicarToolBarciudad" title="Duplicar Ciudad" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(ciudad_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdciudadRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarciudad" name="imgRecargarInformacionToolBarciudad" title="Recargar Ciudad" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdciudadAnterioresToolBar">
										<img id="imgAnterioresToolBarciudad" name="imgAnterioresToolBarciudad" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdciudadSiguientesToolBar">
										<img id="imgSiguientesToolBarciudad" name="imgSiguientesToolBarciudad" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdciudadAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarciudad" name="imgAbrirOrderByToolBarciudad" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((ciudad_web::$STR_ES_RELACIONADO=='false' && ciudad_web::$STR_ES_RELACIONES=='false') || ciudad_web::$STR_ES_BUSQUEDA=='true'  || ciudad_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdciudadCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarciudad" name="imgCerrarPaginaToolBarciudad" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trciudadCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaciudad" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaciudad',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trciudadCabeceraBusquedas/super -->

		<tr id="trBusquedaciudad" class="busqueda" style="display:table-row">
			<td id="tdBusquedaciudad" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaciudad" name="frmBusquedaciudad">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaciudad" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trciudadBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(ciudad_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleBusquedaPorCodigo" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorCodigo"> Por Codigo</a></li>
						<li id="listrVisibleBusquedaPorNombre" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorNombre"> Por Nombre</a></li>
						<li id="listrVisibleFK_Idprovincia" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idprovincia"> Por Provincia</a></li>
					</ul>
				
					<div id="divstrVisibleBusquedaPorCodigo">
					<table id="tblstrVisibleBusquedaPorCodigo" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Codigo</span>
						</td>
						<td align="center">
							<input id="BusquedaPorCodigo-txtcodigo" name="BusquedaPorCodigo-txtcodigo" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"   size="20" >

						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarciudadBusquedaPorCodigo" name="btnBuscarciudadBusquedaPorCodigo" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleBusquedaPorNombre">
					<table id="tblstrVisibleBusquedaPorNombre" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Nombre</span>
						</td>
						<td align="center">
							<input id="BusquedaPorNombre-txtnombre" name="BusquedaPorNombre-txtnombre" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"   size="20" >

						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarciudadBusquedaPorNombre" name="btnBuscarciudadBusquedaPorNombre" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idprovincia">
					<table id="tblstrVisibleFK_Idprovincia" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Provincia</span>
						</td>
						<td align="center">
							<select id="FK_Idprovincia-cmbid_provincia" name="FK_Idprovincia-cmbid_provincia" title="Provincia" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarciudadFK_Idprovincia" name="btnBuscarciudadFK_Idprovincia" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarciudad" style="display:table-row">
					<td id="tdParamsBuscarciudad">
		<?php if(ciudad_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarciudad">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosciudad" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosciudad"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosciudad" name="ParamsBuscar-txtNumeroRegistrosciudad" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionciudad">
							<td id="tdGenerarReporteciudad" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosciudad" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosciudad" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionciudad" name="btnRecargarInformacionciudad" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaciudad" name="btnImprimirPaginaciudad" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*ciudad_web::$STR_ES_BUSQUEDA=='false'  &&*/ ciudad_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByciudad">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByciudad" name="btnOrderByciudad" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelciudad" name="btnOrderByRelciudad" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(ciudad_web::$STR_ES_RELACIONES=='false' && ciudad_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(ciudad_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdciudadConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosciudad -->

							</td><!-- tdGenerarReporteciudad -->
						</tr><!-- trRecargarInformacionciudad -->
					</table><!-- tblParamsBuscarNumeroRegistrosciudad -->
				</div> <!-- divParamsBuscarciudad -->
		<?php } ?>
				</td> <!-- tdParamsBuscarciudad -->
				</tr><!-- trParamsBuscarciudad -->
				</table> <!-- tblBusquedaciudad -->
				</form> <!-- frmBusquedaciudad -->
				

			</td> <!-- tdBusquedaciudad -->
		</tr> <!-- trBusquedaciudad/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(ciudad_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divciudadPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblciudadPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmciudadAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnciudadAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="ciudad_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnciudadAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmciudadAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblciudadPopupAjaxWebPart -->
		</div> <!-- divciudadPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(ciudad_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trciudadTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaciudad"></a>
		<img id="imgTablaParaDerechaciudad" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaciudad'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaciudad" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaciudad'"/>
		<a id="TablaDerechaciudad"></a>
	</td>
</tr> <!-- trciudadTablaNavegacion/super -->
<?php } ?>

<tr id="trciudadTablaDatos">
	<td colspan="3" id="htmlTableCellciudad">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosciudadsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trciudadTablaDatos/super -->
		
		
		<tr id="trciudadPaginacion" style="display:table-row">
			<td id="tdciudadPaginacion" align="center">
				<div id="divciudadPaginacionAjaxWebPart">
				<form id="frmPaginacionciudad" name="frmPaginacionciudad">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionciudad" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(ciudad_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkciudad" name="btnSeleccionarLoteFkciudad" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(ciudad_web::$STR_ES_RELACIONADO=='false' /*&& ciudad_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresciudad" name="btnAnterioresciudad" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(ciudad_web::$STR_ES_BUSQUEDA=='false' && ciudad_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdciudadNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararciudad" name="btnNuevoTablaPrepararciudad" title="NUEVO Ciudad" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaciudad" name="ParamsPaginar-txtNumeroNuevoTablaciudad" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(ciudad_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdciudadConEditarciudad">
							<label>
								<input id="ParamsBuscar-chbConEditarciudad" name="ParamsBuscar-chbConEditarciudad" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(ciudad_web::$STR_ES_RELACIONADO=='false'/* && ciudad_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesciudad" name="btnSiguientesciudad" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionciudad -->
				</form> <!-- frmPaginacionciudad -->
				<form id="frmNuevoPrepararciudad" name="frmNuevoPrepararciudad">
				<table id="tblNuevoPrepararciudad" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trciudadNuevo" height="10">
						<?php if(ciudad_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdciudadNuevo" align="center">
							<input type="button" id="btnNuevoPrepararciudad" name="btnNuevoPrepararciudad" title="NUEVO Ciudad" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdciudadGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosciudad" name="btnGuardarCambiosciudad" title="GUARDAR Ciudad" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(ciudad_web::$STR_ES_RELACIONADO=='false' && ciudad_web::$STR_ES_RELACIONES=='false' && ciudad_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdciudadDuplicar" align="center">
							<input type="button" id="btnDuplicarciudad" name="btnDuplicarciudad" title="DUPLICAR Ciudad" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdciudadCopiar" align="center">
							<input type="button" id="btnCopiarciudad" name="btnCopiarciudad" title="COPIAR Ciudad" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(ciudad_web::$STR_ES_RELACIONADO=='false' && ((ciudad_web::$STR_ES_RELACIONADO=='false' && ciudad_web::$STR_ES_RELACIONES=='false') || ciudad_web::$STR_ES_BUSQUEDA=='true'  || ciudad_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdciudadCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaciudad" name="btnCerrarPaginaciudad" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararciudad -->
				</form> <!-- frmNuevoPrepararciudad -->
				</div> <!-- divciudadPaginacionAjaxWebPart -->
			</td> <!-- tdciudadPaginacion -->
		</tr> <!-- trciudadPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(ciudad_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesciudadAjaxWebPart">
			<td id="tdAccionesRelacionesciudadAjaxWebPart">
				<div id="divAccionesRelacionesciudadAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesciudadAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesciudadAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByciudad">
			<td id="tdOrderByciudad">
				<form id="frmOrderByciudad" name="frmOrderByciudad">
					<div id="divOrderByciudadAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelciudad" name="frmOrderByRelciudad">
					<div id="divOrderByRelciudadAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByciudad -->
		</tr> <!-- trOrderByciudad/super -->
			
		
		
		
		
		
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
			
				import {ciudad_webcontrol,ciudad_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/ciudad/js/webcontrol/ciudad_webcontrol.js?random=1';
				
				ciudad_webcontrol1.setciudad_constante(window.ciudad_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(ciudad_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

