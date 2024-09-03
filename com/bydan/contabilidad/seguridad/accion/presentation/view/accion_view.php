<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\accion\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Accion Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/accion/util/accion_carga.php');
	use com\bydan\contabilidad\seguridad\accion\util\accion_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/accion/presentation/view/accion_web.php');
	//use com\bydan\contabilidad\seguridad\accion\presentation\view\accion_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	accion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	accion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$accion_web1= new accion_web();	
	$accion_web1->cargarDatosGenerales();
	
	//$moduloActual=$accion_web1->moduloActual;
	//$usuarioActual=$accion_web1->usuarioActual;
	//$sessionBase=$accion_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$accion_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/accion/js/templating/accion_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/accion/js/templating/accion_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/accion/js/templating/accion_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/accion/js/templating/accion_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/accion/js/templating/accion_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			accion_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					accion_web::$GET_POST=$_GET;
				} else {
					accion_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			accion_web::$STR_NOMBRE_PAGINA = 'accion_view.php';
			accion_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			accion_web::$BIT_ES_PAGINA_FORM = 'false';
				
			accion_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {accion_constante,accion_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/accion/js/util/accion_constante.js?random=1';
			import {accion_funcion,accion_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/accion/js/util/accion_funcion.js?random=1';
			
			let accion_constante2 = new accion_constante();
			
			accion_constante2.STR_NOMBRE_PAGINA="<?php echo(accion_web::$STR_NOMBRE_PAGINA); ?>";
			accion_constante2.STR_TYPE_ON_LOADaccion="<?php echo(accion_web::$STR_TYPE_ONLOAD); ?>";
			accion_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(accion_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			accion_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(accion_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			accion_constante2.STR_ACTION="<?php echo(accion_web::$STR_ACTION); ?>";
			accion_constante2.STR_ES_POPUP="<?php echo(accion_web::$STR_ES_POPUP); ?>";
			accion_constante2.STR_ES_BUSQUEDA="<?php echo(accion_web::$STR_ES_BUSQUEDA); ?>";
			accion_constante2.STR_FUNCION_JS="<?php echo(accion_web::$STR_FUNCION_JS); ?>";
			accion_constante2.BIG_ID_ACTUAL="<?php echo(accion_web::$BIG_ID_ACTUAL); ?>";
			accion_constante2.BIG_ID_OPCION="<?php echo(accion_web::$BIG_ID_OPCION); ?>";
			accion_constante2.STR_OBJETO_JS="<?php echo(accion_web::$STR_OBJETO_JS); ?>";
			accion_constante2.STR_ES_RELACIONES="<?php echo(accion_web::$STR_ES_RELACIONES); ?>";
			accion_constante2.STR_ES_RELACIONADO="<?php echo(accion_web::$STR_ES_RELACIONADO); ?>";
			accion_constante2.STR_ES_SUB_PAGINA="<?php echo(accion_web::$STR_ES_SUB_PAGINA); ?>";
			accion_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(accion_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			accion_constante2.BIT_ES_PAGINA_FORM=<?php echo(accion_web::$BIT_ES_PAGINA_FORM); ?>;
			accion_constante2.STR_SUFIJO="<?php echo(accion_web::$STR_SUF); ?>";//accion
			accion_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(accion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//accion
			
			accion_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(accion_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			accion_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($accion_web1->moduloActual->getnombre()); ?>";
			accion_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(accion_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			accion_constante2.BIT_ES_LOAD_NORMAL=true;
			/*accion_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			accion_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.accion_constante2 = accion_constante2;
			
		</script>
		
		<?php if(accion_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.accion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.accion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="accionActual" ></a>
	
	<div id="divResumenaccionActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(accion_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(accion_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(accion_web::$STR_ES_BUSQUEDA=='false' && accion_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(accion_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(accion_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(accion_web::$STR_ES_RELACIONADO=='false' && accion_web::$STR_ES_POPUP=='false' && accion_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdaccionNuevoToolBar">
										<img id="imgNuevoToolBaraccion" name="imgNuevoToolBaraccion" title="Nuevo Accion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(accion_web::$STR_ES_BUSQUEDA=='false' && accion_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdaccionNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBaraccion" name="imgNuevoGuardarCambiosToolBaraccion" title="Nuevo TABLA Accion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(accion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdaccionGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBaraccion" name="imgGuardarCambiosToolBaraccion" title="Guardar Accion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(accion_web::$STR_ES_RELACIONADO=='false' && accion_web::$STR_ES_RELACIONES=='false' && accion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdaccionCopiarToolBar">
										<img id="imgCopiarToolBaraccion" name="imgCopiarToolBaraccion" title="Copiar Accion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdaccionDuplicarToolBar">
										<img id="imgDuplicarToolBaraccion" name="imgDuplicarToolBaraccion" title="Duplicar Accion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(accion_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdaccionRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBaraccion" name="imgRecargarInformacionToolBaraccion" title="Recargar Accion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdaccionAnterioresToolBar">
										<img id="imgAnterioresToolBaraccion" name="imgAnterioresToolBaraccion" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdaccionSiguientesToolBar">
										<img id="imgSiguientesToolBaraccion" name="imgSiguientesToolBaraccion" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdaccionAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBaraccion" name="imgAbrirOrderByToolBaraccion" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((accion_web::$STR_ES_RELACIONADO=='false' && accion_web::$STR_ES_RELACIONES=='false') || accion_web::$STR_ES_BUSQUEDA=='true'  || accion_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdaccionCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBaraccion" name="imgCerrarPaginaToolBaraccion" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="traccionCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaaccion" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaaccion',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- traccionCabeceraBusquedas/super -->

		<tr id="trBusquedaaccion" class="busqueda" style="display:table-row">
			<td id="tdBusquedaaccion" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaaccion" name="frmBusquedaaccion">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaaccion" style="visibility:visible; text-align:left; width: 100%">
				<tr id="traccionBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(accion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idopcion" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idopcion"> Por Opcion</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idopcion">
					<table id="tblstrVisibleFK_Idopcion" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Opcion</span>
						</td>
						<td align="center">
							<select id="FK_Idopcion-cmbid_opcion" name="FK_Idopcion-cmbid_opcion" title="Opcion" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscaraccionFK_Idopcion" name="btnBuscaraccionFK_Idopcion" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscaraccion" style="display:table-row">
					<td id="tdParamsBuscaraccion">
		<?php if(accion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscaraccion">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosaccion" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosaccion"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosaccion" name="ParamsBuscar-txtNumeroRegistrosaccion" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionaccion">
							<td id="tdGenerarReporteaccion" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosaccion" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosaccion" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionaccion" name="btnRecargarInformacionaccion" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaaccion" name="btnImprimirPaginaaccion" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*accion_web::$STR_ES_BUSQUEDA=='false'  &&*/ accion_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByaccion">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByaccion" name="btnOrderByaccion" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelaccion" name="btnOrderByRelaccion" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(accion_web::$STR_ES_RELACIONES=='false' && accion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(accion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdaccionConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosaccion -->

							</td><!-- tdGenerarReporteaccion -->
						</tr><!-- trRecargarInformacionaccion -->
					</table><!-- tblParamsBuscarNumeroRegistrosaccion -->
				</div> <!-- divParamsBuscaraccion -->
		<?php } ?>
				</td> <!-- tdParamsBuscaraccion -->
				</tr><!-- trParamsBuscaraccion -->
				</table> <!-- tblBusquedaaccion -->
				</form> <!-- frmBusquedaaccion -->
				

			</td> <!-- tdBusquedaaccion -->
		</tr> <!-- trBusquedaaccion/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(accion_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divaccionPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblaccionPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmaccionAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnaccionAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="accion_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnaccionAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmaccionAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblaccionPopupAjaxWebPart -->
		</div> <!-- divaccionPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(accion_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="traccionTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaaccion"></a>
		<img id="imgTablaParaDerechaaccion" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaaccion'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaaccion" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaaccion'"/>
		<a id="TablaDerechaaccion"></a>
	</td>
</tr> <!-- traccionTablaNavegacion/super -->
<?php } ?>

<tr id="traccionTablaDatos">
	<td colspan="3" id="htmlTableCellaccion">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosaccionsAjaxWebPart">
		</div>
	</td>
</tr> <!-- traccionTablaDatos/super -->
		
		
		<tr id="traccionPaginacion" style="display:table-row">
			<td id="tdaccionPaginacion" align="center">
				<div id="divaccionPaginacionAjaxWebPart">
				<form id="frmPaginacionaccion" name="frmPaginacionaccion">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionaccion" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(accion_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkaccion" name="btnSeleccionarLoteFkaccion" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(accion_web::$STR_ES_RELACIONADO=='false' /*&& accion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresaccion" name="btnAnterioresaccion" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(accion_web::$STR_ES_BUSQUEDA=='false' && accion_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdaccionNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararaccion" name="btnNuevoTablaPrepararaccion" title="NUEVO Accion" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaaccion" name="ParamsPaginar-txtNumeroNuevoTablaaccion" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(accion_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdaccionConEditaraccion">
							<label>
								<input id="ParamsBuscar-chbConEditaraccion" name="ParamsBuscar-chbConEditaraccion" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(accion_web::$STR_ES_RELACIONADO=='false'/* && accion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesaccion" name="btnSiguientesaccion" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionaccion -->
				</form> <!-- frmPaginacionaccion -->
				<form id="frmNuevoPrepararaccion" name="frmNuevoPrepararaccion">
				<table id="tblNuevoPrepararaccion" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="traccionNuevo" height="10">
						<?php if(accion_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdaccionNuevo" align="center">
							<input type="button" id="btnNuevoPrepararaccion" name="btnNuevoPrepararaccion" title="NUEVO Accion" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdaccionGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosaccion" name="btnGuardarCambiosaccion" title="GUARDAR Accion" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(accion_web::$STR_ES_RELACIONADO=='false' && accion_web::$STR_ES_RELACIONES=='false' && accion_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdaccionDuplicar" align="center">
							<input type="button" id="btnDuplicaraccion" name="btnDuplicaraccion" title="DUPLICAR Accion" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdaccionCopiar" align="center">
							<input type="button" id="btnCopiaraccion" name="btnCopiaraccion" title="COPIAR Accion" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(accion_web::$STR_ES_RELACIONADO=='false' && ((accion_web::$STR_ES_RELACIONADO=='false' && accion_web::$STR_ES_RELACIONES=='false') || accion_web::$STR_ES_BUSQUEDA=='true'  || accion_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdaccionCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaaccion" name="btnCerrarPaginaaccion" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararaccion -->
				</form> <!-- frmNuevoPrepararaccion -->
				</div> <!-- divaccionPaginacionAjaxWebPart -->
			</td> <!-- tdaccionPaginacion -->
		</tr> <!-- traccionPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(accion_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesaccionAjaxWebPart">
			<td id="tdAccionesRelacionesaccionAjaxWebPart">
				<div id="divAccionesRelacionesaccionAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesaccionAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesaccionAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByaccion">
			<td id="tdOrderByaccion">
				<form id="frmOrderByaccion" name="frmOrderByaccion">
					<div id="divOrderByaccionAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelaccion" name="frmOrderByRelaccion">
					<div id="divOrderByRelaccionAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByaccion -->
		</tr> <!-- trOrderByaccion/super -->
			
		
		
		
		
		
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
			
				import {accion_webcontrol,accion_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/accion/js/webcontrol/accion_webcontrol.js?random=1';
				
				accion_webcontrol1.setaccion_constante(window.accion_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(accion_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

