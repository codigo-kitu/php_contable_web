<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\devolucion\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Devolucion Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/devolucion/util/devolucion_carga.php');
	use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
	
	//include_once('com/bydan/contabilidad/inventario/devolucion/presentation/view/devolucion_web.php');
	//use com\bydan\contabilidad\inventario\devolucion\presentation\view\devolucion_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	devolucion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	devolucion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$devolucion_web1= new devolucion_web();	
	$devolucion_web1->cargarDatosGenerales();
	
	//$moduloActual=$devolucion_web1->moduloActual;
	//$usuarioActual=$devolucion_web1->usuarioActual;
	//$sessionBase=$devolucion_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$devolucion_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/devolucion/js/templating/devolucion_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/devolucion/js/templating/devolucion_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/devolucion/js/templating/devolucion_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/devolucion/js/templating/devolucion_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/devolucion/js/templating/devolucion_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			devolucion_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					devolucion_web::$GET_POST=$_GET;
				} else {
					devolucion_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			devolucion_web::$STR_NOMBRE_PAGINA = 'devolucion_view.php';
			devolucion_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			devolucion_web::$BIT_ES_PAGINA_FORM = 'false';
				
			devolucion_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {devolucion_constante,devolucion_constante1} from './webroot/js/JavaScript/contabilidad/inventario/devolucion/js/util/devolucion_constante.js?random=1';
			import {devolucion_funcion,devolucion_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/devolucion/js/util/devolucion_funcion.js?random=1';
			
			let devolucion_constante2 = new devolucion_constante();
			
			devolucion_constante2.STR_NOMBRE_PAGINA="<?php echo(devolucion_web::$STR_NOMBRE_PAGINA); ?>";
			devolucion_constante2.STR_TYPE_ON_LOADdevolucion="<?php echo(devolucion_web::$STR_TYPE_ONLOAD); ?>";
			devolucion_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(devolucion_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			devolucion_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(devolucion_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			devolucion_constante2.STR_ACTION="<?php echo(devolucion_web::$STR_ACTION); ?>";
			devolucion_constante2.STR_ES_POPUP="<?php echo(devolucion_web::$STR_ES_POPUP); ?>";
			devolucion_constante2.STR_ES_BUSQUEDA="<?php echo(devolucion_web::$STR_ES_BUSQUEDA); ?>";
			devolucion_constante2.STR_FUNCION_JS="<?php echo(devolucion_web::$STR_FUNCION_JS); ?>";
			devolucion_constante2.BIG_ID_ACTUAL="<?php echo(devolucion_web::$BIG_ID_ACTUAL); ?>";
			devolucion_constante2.BIG_ID_OPCION="<?php echo(devolucion_web::$BIG_ID_OPCION); ?>";
			devolucion_constante2.STR_OBJETO_JS="<?php echo(devolucion_web::$STR_OBJETO_JS); ?>";
			devolucion_constante2.STR_ES_RELACIONES="<?php echo(devolucion_web::$STR_ES_RELACIONES); ?>";
			devolucion_constante2.STR_ES_RELACIONADO="<?php echo(devolucion_web::$STR_ES_RELACIONADO); ?>";
			devolucion_constante2.STR_ES_SUB_PAGINA="<?php echo(devolucion_web::$STR_ES_SUB_PAGINA); ?>";
			devolucion_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(devolucion_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			devolucion_constante2.BIT_ES_PAGINA_FORM=<?php echo(devolucion_web::$BIT_ES_PAGINA_FORM); ?>;
			devolucion_constante2.STR_SUFIJO="<?php echo(devolucion_web::$STR_SUF); ?>";//devolucion
			devolucion_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(devolucion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//devolucion
			
			devolucion_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(devolucion_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			devolucion_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($devolucion_web1->moduloActual->getnombre()); ?>";
			devolucion_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(devolucion_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			devolucion_constante2.BIT_ES_LOAD_NORMAL=true;
			/*devolucion_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			devolucion_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.devolucion_constante2 = devolucion_constante2;
			
		</script>
		
		<?php if(devolucion_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.devolucion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.devolucion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="devolucionActual" ></a>
	
	<div id="divResumendevolucionActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(devolucion_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(devolucion_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(devolucion_web::$STR_ES_BUSQUEDA=='false' && devolucion_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(devolucion_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(devolucion_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(devolucion_web::$STR_ES_RELACIONADO=='false' && devolucion_web::$STR_ES_POPUP=='false' && devolucion_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tddevolucionNuevoToolBar">
										<img id="imgNuevoToolBardevolucion" name="imgNuevoToolBardevolucion" title="Nuevo Devolucion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(devolucion_web::$STR_ES_BUSQUEDA=='false' && devolucion_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tddevolucionNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBardevolucion" name="imgNuevoGuardarCambiosToolBardevolucion" title="Nuevo TABLA Devolucion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(devolucion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddevolucionGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBardevolucion" name="imgGuardarCambiosToolBardevolucion" title="Guardar Devolucion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(devolucion_web::$STR_ES_RELACIONADO=='false' && devolucion_web::$STR_ES_RELACIONES=='false' && devolucion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddevolucionCopiarToolBar">
										<img id="imgCopiarToolBardevolucion" name="imgCopiarToolBardevolucion" title="Copiar Devolucion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tddevolucionDuplicarToolBar">
										<img id="imgDuplicarToolBardevolucion" name="imgDuplicarToolBardevolucion" title="Duplicar Devolucion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(devolucion_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tddevolucionRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBardevolucion" name="imgRecargarInformacionToolBardevolucion" title="Recargar Devolucion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tddevolucionAnterioresToolBar">
										<img id="imgAnterioresToolBardevolucion" name="imgAnterioresToolBardevolucion" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tddevolucionSiguientesToolBar">
										<img id="imgSiguientesToolBardevolucion" name="imgSiguientesToolBardevolucion" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tddevolucionAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBardevolucion" name="imgAbrirOrderByToolBardevolucion" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((devolucion_web::$STR_ES_RELACIONADO=='false' && devolucion_web::$STR_ES_RELACIONES=='false') || devolucion_web::$STR_ES_BUSQUEDA=='true'  || devolucion_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tddevolucionCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBardevolucion" name="imgCerrarPaginaToolBardevolucion" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trdevolucionCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedadevolucion" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedadevolucion',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trdevolucionCabeceraBusquedas/super -->

		<tr id="trBusquedadevolucion" class="busqueda" style="display:table-row">
			<td id="tdBusquedadevolucion" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedadevolucion" name="frmBusquedadevolucion">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedadevolucion" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trdevolucionBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(devolucion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 95%">
					<ul>
						<li id="listrVisibleFK_Idasiento" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idasiento"> Por Asiento</a></li>
						<li id="listrVisibleFK_Iddocumento_cuenta_pagar" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Iddocumento_cuenta_pagar"> Por Docs Cp</a></li>
						<li id="listrVisibleFK_Idestado" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado"> Por Estado</a></li>
						<li id="listrVisibleFK_Idkardex" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idkardex"> Por Kardex</a></li>
						<li id="listrVisibleFK_Idmoneda" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idmoneda"> Por Moneda</a></li>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por Proveedor</a></li>
						<li id="listrVisibleFK_Idtermino_pago" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtermino_pago"> Por Terminos Pago</a></li>
						<li id="listrVisibleFK_Idvendedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idvendedor"> Por  Vendedor</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idasiento">
					<table id="tblstrVisibleFK_Idasiento" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Asiento</span>
						</td>
						<td align="center">
							<select id="FK_Idasiento-cmbid_asiento" name="FK_Idasiento-cmbid_asiento" title="Asiento" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucionFK_Idasiento" name="btnBuscardevolucionFK_Idasiento" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Iddocumento_cuenta_pagar">
					<table id="tblstrVisibleFK_Iddocumento_cuenta_pagar" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Docs Cp</span>
						</td>
						<td align="center">
							<select id="FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar" name="FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar" title="Docs Cp" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucionFK_Iddocumento_cuenta_pagar" name="btnBuscardevolucionFK_Iddocumento_cuenta_pagar" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idestado">
					<table id="tblstrVisibleFK_Idestado" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Estado</span>
						</td>
						<td align="center">
							<select id="FK_Idestado-cmbid_estado" name="FK_Idestado-cmbid_estado" title="Estado" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucionFK_Idestado" name="btnBuscardevolucionFK_Idestado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idkardex">
					<table id="tblstrVisibleFK_Idkardex" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Kardex</span>
						</td>
						<td align="center">
							<select id="FK_Idkardex-cmbid_kardex" name="FK_Idkardex-cmbid_kardex" title="Kardex" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucionFK_Idkardex" name="btnBuscardevolucionFK_Idkardex" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idmoneda">
					<table id="tblstrVisibleFK_Idmoneda" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Moneda</span>
						</td>
						<td align="center">
							<select id="FK_Idmoneda-cmbid_moneda" name="FK_Idmoneda-cmbid_moneda" title="Moneda" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucionFK_Idmoneda" name="btnBuscardevolucionFK_Idmoneda" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscardevolucionFK_Idproveedor" name="btnBuscardevolucionFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtermino_pago">
					<table id="tblstrVisibleFK_Idtermino_pago" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Terminos Pago</span>
						</td>
						<td align="center">
							<select id="FK_Idtermino_pago-cmbid_termino_pago_proveedor" name="FK_Idtermino_pago-cmbid_termino_pago_proveedor" title="Terminos Pago" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucionFK_Idtermino_pago" name="btnBuscardevolucionFK_Idtermino_pago" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idvendedor">
					<table id="tblstrVisibleFK_Idvendedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Vendedor</span>
						</td>
						<td align="center">
							<select id="FK_Idvendedor-cmbid_vendedor" name="FK_Idvendedor-cmbid_vendedor" title=" Vendedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardevolucionFK_Idvendedor" name="btnBuscardevolucionFK_Idvendedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscardevolucion" style="display:table-row">
					<td id="tdParamsBuscardevolucion">
		<?php if(devolucion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscardevolucion">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosdevolucion" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosdevolucion"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosdevolucion" name="ParamsBuscar-txtNumeroRegistrosdevolucion" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformaciondevolucion">
							<td id="tdGenerarReportedevolucion" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosdevolucion" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosdevolucion" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformaciondevolucion" name="btnRecargarInformaciondevolucion" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginadevolucion" name="btnImprimirPaginadevolucion" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*devolucion_web::$STR_ES_BUSQUEDA=='false'  &&*/ devolucion_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBydevolucion">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBydevolucion" name="btnOrderBydevolucion" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByReldevolucion" name="btnOrderByReldevolucion" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(devolucion_web::$STR_ES_RELACIONES=='false' && devolucion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(devolucion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tddevolucionConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosdevolucion -->

							</td><!-- tdGenerarReportedevolucion -->
						</tr><!-- trRecargarInformaciondevolucion -->
					</table><!-- tblParamsBuscarNumeroRegistrosdevolucion -->
				</div> <!-- divParamsBuscardevolucion -->
		<?php } ?>
				</td> <!-- tdParamsBuscardevolucion -->
				</tr><!-- trParamsBuscardevolucion -->
				</table> <!-- tblBusquedadevolucion -->
				</form> <!-- frmBusquedadevolucion -->
				

			</td> <!-- tdBusquedadevolucion -->
		</tr> <!-- trBusquedadevolucion/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(devolucion_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divdevolucionPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbldevolucionPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmdevolucionAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btndevolucionAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="devolucion_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btndevolucionAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmdevolucionAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbldevolucionPopupAjaxWebPart -->
		</div> <!-- divdevolucionPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(devolucion_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trdevolucionTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdadevolucion"></a>
		<img id="imgTablaParaDerechadevolucion" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechadevolucion'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdadevolucion" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdadevolucion'"/>
		<a id="TablaDerechadevolucion"></a>
	</td>
</tr> <!-- trdevolucionTablaNavegacion/super -->
<?php } ?>

<tr id="trdevolucionTablaDatos">
	<td colspan="3" id="htmlTableCelldevolucion">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosdevolucionsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trdevolucionTablaDatos/super -->
		
		
		<tr id="trdevolucionPaginacion" style="display:table-row">
			<td id="tddevolucionPaginacion" align="left">
				<div id="divdevolucionPaginacionAjaxWebPart">
				<form id="frmPaginaciondevolucion" name="frmPaginaciondevolucion">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginaciondevolucion" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(devolucion_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkdevolucion" name="btnSeleccionarLoteFkdevolucion" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(devolucion_web::$STR_ES_RELACIONADO=='false' /*&& devolucion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresdevolucion" name="btnAnterioresdevolucion" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(devolucion_web::$STR_ES_BUSQUEDA=='false' && devolucion_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tddevolucionNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparardevolucion" name="btnNuevoTablaPreparardevolucion" title="NUEVO Devolucion" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTabladevolucion" name="ParamsPaginar-txtNumeroNuevoTabladevolucion" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(devolucion_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tddevolucionConEditardevolucion">
							<label>
								<input id="ParamsBuscar-chbConEditardevolucion" name="ParamsBuscar-chbConEditardevolucion" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(devolucion_web::$STR_ES_RELACIONADO=='false'/* && devolucion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesdevolucion" name="btnSiguientesdevolucion" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginaciondevolucion -->
				</form> <!-- frmPaginaciondevolucion -->
				<form id="frmNuevoPreparardevolucion" name="frmNuevoPreparardevolucion">
				<table id="tblNuevoPreparardevolucion" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trdevolucionNuevo" height="10">
						<?php if(devolucion_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tddevolucionNuevo" align="center">
							<input type="button" id="btnNuevoPreparardevolucion" name="btnNuevoPreparardevolucion" title="NUEVO Devolucion" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tddevolucionGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosdevolucion" name="btnGuardarCambiosdevolucion" title="GUARDAR Devolucion" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(devolucion_web::$STR_ES_RELACIONADO=='false' && devolucion_web::$STR_ES_RELACIONES=='false' && devolucion_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tddevolucionDuplicar" align="center">
							<input type="button" id="btnDuplicardevolucion" name="btnDuplicardevolucion" title="DUPLICAR Devolucion" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tddevolucionCopiar" align="center">
							<input type="button" id="btnCopiardevolucion" name="btnCopiardevolucion" title="COPIAR Devolucion" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(devolucion_web::$STR_ES_RELACIONADO=='false' && ((devolucion_web::$STR_ES_RELACIONADO=='false' && devolucion_web::$STR_ES_RELACIONES=='false') || devolucion_web::$STR_ES_BUSQUEDA=='true'  || devolucion_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tddevolucionCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginadevolucion" name="btnCerrarPaginadevolucion" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparardevolucion -->
				</form> <!-- frmNuevoPreparardevolucion -->
				</div> <!-- divdevolucionPaginacionAjaxWebPart -->
			</td> <!-- tddevolucionPaginacion -->
		</tr> <!-- trdevolucionPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(devolucion_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesdevolucionAjaxWebPart">
			<td id="tdAccionesRelacionesdevolucionAjaxWebPart">
				<div id="divAccionesRelacionesdevolucionAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesdevolucionAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesdevolucionAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBydevolucion">
			<td id="tdOrderBydevolucion">
				<form id="frmOrderBydevolucion" name="frmOrderBydevolucion">
					<div id="divOrderBydevolucionAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByReldevolucion" name="frmOrderByReldevolucion">
					<div id="divOrderByReldevolucionAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBydevolucion -->
		</tr> <!-- trOrderBydevolucion/super -->
			
		
		
		
		
		
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
			
				import {devolucion_webcontrol,devolucion_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/devolucion/js/webcontrol/devolucion_webcontrol.js?random=1';
				
				devolucion_webcontrol1.setdevolucion_constante(window.devolucion_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(devolucion_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

