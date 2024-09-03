<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\opcion\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Opcion Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/opcion/util/opcion_carga.php');
	use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/opcion/presentation/view/opcion_web.php');
	//use com\bydan\contabilidad\seguridad\opcion\presentation\view\opcion_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	opcion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$opcion_web1= new opcion_web();	
	$opcion_web1->cargarDatosGenerales();
	
	//$moduloActual=$opcion_web1->moduloActual;
	//$usuarioActual=$opcion_web1->usuarioActual;
	//$sessionBase=$opcion_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$opcion_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/opcion/js/templating/opcion_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/opcion/js/templating/opcion_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/opcion/js/templating/opcion_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/opcion/js/templating/opcion_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/opcion/js/templating/opcion_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			opcion_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					opcion_web::$GET_POST=$_GET;
				} else {
					opcion_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			opcion_web::$STR_NOMBRE_PAGINA = 'opcion_view.php';
			opcion_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			opcion_web::$BIT_ES_PAGINA_FORM = 'false';
				
			opcion_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {opcion_constante,opcion_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/opcion/js/util/opcion_constante.js?random=1';
			import {opcion_funcion,opcion_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/opcion/js/util/opcion_funcion.js?random=1';
			
			let opcion_constante2 = new opcion_constante();
			
			opcion_constante2.STR_NOMBRE_PAGINA="<?php echo(opcion_web::$STR_NOMBRE_PAGINA); ?>";
			opcion_constante2.STR_TYPE_ON_LOADopcion="<?php echo(opcion_web::$STR_TYPE_ONLOAD); ?>";
			opcion_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(opcion_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			opcion_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(opcion_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			opcion_constante2.STR_ACTION="<?php echo(opcion_web::$STR_ACTION); ?>";
			opcion_constante2.STR_ES_POPUP="<?php echo(opcion_web::$STR_ES_POPUP); ?>";
			opcion_constante2.STR_ES_BUSQUEDA="<?php echo(opcion_web::$STR_ES_BUSQUEDA); ?>";
			opcion_constante2.STR_FUNCION_JS="<?php echo(opcion_web::$STR_FUNCION_JS); ?>";
			opcion_constante2.BIG_ID_ACTUAL="<?php echo(opcion_web::$BIG_ID_ACTUAL); ?>";
			opcion_constante2.BIG_ID_OPCION="<?php echo(opcion_web::$BIG_ID_OPCION); ?>";
			opcion_constante2.STR_OBJETO_JS="<?php echo(opcion_web::$STR_OBJETO_JS); ?>";
			opcion_constante2.STR_ES_RELACIONES="<?php echo(opcion_web::$STR_ES_RELACIONES); ?>";
			opcion_constante2.STR_ES_RELACIONADO="<?php echo(opcion_web::$STR_ES_RELACIONADO); ?>";
			opcion_constante2.STR_ES_SUB_PAGINA="<?php echo(opcion_web::$STR_ES_SUB_PAGINA); ?>";
			opcion_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(opcion_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			opcion_constante2.BIT_ES_PAGINA_FORM=<?php echo(opcion_web::$BIT_ES_PAGINA_FORM); ?>;
			opcion_constante2.STR_SUFIJO="<?php echo(opcion_web::$STR_SUF); ?>";//opcion
			opcion_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(opcion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//opcion
			
			opcion_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(opcion_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			opcion_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($opcion_web1->moduloActual->getnombre()); ?>";
			opcion_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(opcion_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			opcion_constante2.BIT_ES_LOAD_NORMAL=true;
			/*opcion_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			opcion_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.opcion_constante2 = opcion_constante2;
			
		</script>
		
		<?php if(opcion_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.opcion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.opcion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="opcionActual" ></a>
	
	<div id="divResumenopcionActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(opcion_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(opcion_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(opcion_web::$STR_ES_BUSQUEDA=='false' && opcion_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(opcion_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(opcion_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(opcion_web::$STR_ES_RELACIONADO=='false' && opcion_web::$STR_ES_POPUP=='false' && opcion_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdopcionNuevoToolBar">
										<img id="imgNuevoToolBaropcion" name="imgNuevoToolBaropcion" title="Nuevo Opcion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(opcion_web::$STR_ES_BUSQUEDA=='false' && opcion_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdopcionNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBaropcion" name="imgNuevoGuardarCambiosToolBaropcion" title="Nuevo TABLA Opcion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(opcion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdopcionGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBaropcion" name="imgGuardarCambiosToolBaropcion" title="Guardar Opcion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(opcion_web::$STR_ES_RELACIONADO=='false' && opcion_web::$STR_ES_RELACIONES=='false' && opcion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdopcionCopiarToolBar">
										<img id="imgCopiarToolBaropcion" name="imgCopiarToolBaropcion" title="Copiar Opcion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdopcionDuplicarToolBar">
										<img id="imgDuplicarToolBaropcion" name="imgDuplicarToolBaropcion" title="Duplicar Opcion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(opcion_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdopcionRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBaropcion" name="imgRecargarInformacionToolBaropcion" title="Recargar Opcion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdopcionAnterioresToolBar">
										<img id="imgAnterioresToolBaropcion" name="imgAnterioresToolBaropcion" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdopcionSiguientesToolBar">
										<img id="imgSiguientesToolBaropcion" name="imgSiguientesToolBaropcion" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdopcionAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBaropcion" name="imgAbrirOrderByToolBaropcion" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((opcion_web::$STR_ES_RELACIONADO=='false' && opcion_web::$STR_ES_RELACIONES=='false') || opcion_web::$STR_ES_BUSQUEDA=='true'  || opcion_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdopcionCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBaropcion" name="imgCerrarPaginaToolBaropcion" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="tropcionCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaopcion" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaopcion',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- tropcionCabeceraBusquedas/super -->

		<tr id="trBusquedaopcion" class="busqueda" style="display:table-row">
			<td id="tdBusquedaopcion" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaopcion" name="frmBusquedaopcion">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaopcion" style="visibility:visible; text-align:left; width: 100%">
				<tr id="tropcionBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(opcion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleBusquedaPorIdSistemaPorIdOpcion" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorIdSistemaPorIdOpcion"> Por Sistema Por Opcion</a></li>
						<li id="listrVisibleBusquedaPorIdSistemaPorNombre" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorIdSistemaPorNombre"> Por Sistema Por Nombre</a></li>
						<li id="listrVisibleFK_Idgrupo_opcion" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idgrupo_opcion"> Por Grupo Opcion</a></li>
						<li id="listrVisibleFK_Idopcion" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idopcion"> Por Opcion</a></li>
						<li id="listrVisibleFK_Idsistema" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idsistema"> Por Sistema</a></li>
					</ul>
				
					<div id="divstrVisibleBusquedaPorIdSistemaPorIdOpcion">
					<table id="tblstrVisibleBusquedaPorIdSistemaPorIdOpcion" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Sistema</span>
						</td>
						<td align="center">
							<select id="BusquedaPorIdSistemaPorIdOpcion-cmbid_sistema" name="BusquedaPorIdSistemaPorIdOpcion-cmbid_sistema" title="Sistema" ></select>

						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Opcion</span>
						</td>
						<td align="center">
							<select id="BusquedaPorIdSistemaPorIdOpcion-cmbid_opcion" name="BusquedaPorIdSistemaPorIdOpcion-cmbid_opcion" title="Opcion" ></select>

						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscaropcionBusquedaPorIdSistemaPorIdOpcion" name="btnBuscaropcionBusquedaPorIdSistemaPorIdOpcion" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleBusquedaPorIdSistemaPorNombre">
					<table id="tblstrVisibleBusquedaPorIdSistemaPorNombre" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Sistema</span>
						</td>
						<td align="center">
							<select id="BusquedaPorIdSistemaPorNombre-cmbid_sistema" name="BusquedaPorIdSistemaPorNombre-cmbid_sistema" title="Sistema" ></select>

						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Nombre</span>
						</td>
						<td align="center">
							<input id="BusquedaPorIdSistemaPorNombre-txtnombre" name="BusquedaPorIdSistemaPorNombre-txtnombre" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"   size="20" >

						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscaropcionBusquedaPorIdSistemaPorNombre" name="btnBuscaropcionBusquedaPorIdSistemaPorNombre" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idgrupo_opcion">
					<table id="tblstrVisibleFK_Idgrupo_opcion" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Grupo Opcion</span>
						</td>
						<td align="center">
							<select id="FK_Idgrupo_opcion-cmbid_grupo_opcion" name="FK_Idgrupo_opcion-cmbid_grupo_opcion" title="Grupo Opcion" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscaropcionFK_Idgrupo_opcion" name="btnBuscaropcionFK_Idgrupo_opcion" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
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
							<input type="button" id="btnBuscaropcionFK_Idopcion" name="btnBuscaropcionFK_Idopcion" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idsistema">
					<table id="tblstrVisibleFK_Idsistema" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Sistema</span>
						</td>
						<td align="center">
							<select id="FK_Idsistema-cmbid_sistema" name="FK_Idsistema-cmbid_sistema" title="Sistema" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscaropcionFK_Idsistema" name="btnBuscaropcionFK_Idsistema" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscaropcion" style="display:table-row">
					<td id="tdParamsBuscaropcion">
		<?php if(opcion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscaropcion">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosopcion" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosopcion"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosopcion" name="ParamsBuscar-txtNumeroRegistrosopcion" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionopcion">
							<td id="tdGenerarReporteopcion" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosopcion" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosopcion" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionopcion" name="btnRecargarInformacionopcion" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
											<input type="button" id="btnArbolopcion" name="btnArbolopcion" title="ARBOL" value="   Arbol" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaopcion" name="btnImprimirPaginaopcion" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*opcion_web::$STR_ES_BUSQUEDA=='false'  &&*/ opcion_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByopcion">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByopcion" name="btnOrderByopcion" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelopcion" name="btnOrderByRelopcion" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(opcion_web::$STR_ES_RELACIONES=='false' && opcion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(opcion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdopcionConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosopcion -->

							</td><!-- tdGenerarReporteopcion -->
						</tr><!-- trRecargarInformacionopcion -->
					</table><!-- tblParamsBuscarNumeroRegistrosopcion -->
				</div> <!-- divParamsBuscaropcion -->
		<?php } ?>
				</td> <!-- tdParamsBuscaropcion -->
				</tr><!-- trParamsBuscaropcion -->
				</table> <!-- tblBusquedaopcion -->
				</form> <!-- frmBusquedaopcion -->
				

			</td> <!-- tdBusquedaopcion -->
		</tr> <!-- trBusquedaopcion/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(opcion_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divopcionPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblopcionPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmopcionAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnopcionAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="opcion_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnopcionAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmopcionAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblopcionPopupAjaxWebPart -->
		</div> <!-- divopcionPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(opcion_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="tropcionTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaopcion"></a>
		<img id="imgTablaParaDerechaopcion" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaopcion'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaopcion" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaopcion'"/>
		<a id="TablaDerechaopcion"></a>
	</td>
</tr> <!-- tropcionTablaNavegacion/super -->
<?php } ?>

<tr id="tropcionTablaDatos">
	<td colspan="3" id="htmlTableCellopcion">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosopcionsAjaxWebPart">
		</div>
	</td>
</tr> <!-- tropcionTablaDatos/super -->
		
		
		<tr id="tropcionPaginacion" style="display:table-row">
			<td id="tdopcionPaginacion" align="left">
				<div id="divopcionPaginacionAjaxWebPart">
				<form id="frmPaginacionopcion" name="frmPaginacionopcion">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionopcion" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(opcion_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkopcion" name="btnSeleccionarLoteFkopcion" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(opcion_web::$STR_ES_RELACIONADO=='false' /*&& opcion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresopcion" name="btnAnterioresopcion" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(opcion_web::$STR_ES_BUSQUEDA=='false' && opcion_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdopcionNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararopcion" name="btnNuevoTablaPrepararopcion" title="NUEVO Opcion" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaopcion" name="ParamsPaginar-txtNumeroNuevoTablaopcion" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(opcion_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdopcionConEditaropcion">
							<label>
								<input id="ParamsBuscar-chbConEditaropcion" name="ParamsBuscar-chbConEditaropcion" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(opcion_web::$STR_ES_RELACIONADO=='false'/* && opcion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesopcion" name="btnSiguientesopcion" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionopcion -->
				</form> <!-- frmPaginacionopcion -->
				<form id="frmNuevoPrepararopcion" name="frmNuevoPrepararopcion">
				<table id="tblNuevoPrepararopcion" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="tropcionNuevo" height="10">
						<?php if(opcion_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdopcionNuevo" align="center">
							<input type="button" id="btnNuevoPrepararopcion" name="btnNuevoPrepararopcion" title="NUEVO Opcion" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdopcionGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosopcion" name="btnGuardarCambiosopcion" title="GUARDAR Opcion" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(opcion_web::$STR_ES_RELACIONADO=='false' && opcion_web::$STR_ES_RELACIONES=='false' && opcion_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdopcionDuplicar" align="center">
							<input type="button" id="btnDuplicaropcion" name="btnDuplicaropcion" title="DUPLICAR Opcion" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdopcionCopiar" align="center">
							<input type="button" id="btnCopiaropcion" name="btnCopiaropcion" title="COPIAR Opcion" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(opcion_web::$STR_ES_RELACIONADO=='false' && ((opcion_web::$STR_ES_RELACIONADO=='false' && opcion_web::$STR_ES_RELACIONES=='false') || opcion_web::$STR_ES_BUSQUEDA=='true'  || opcion_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdopcionCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaopcion" name="btnCerrarPaginaopcion" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararopcion -->
				</form> <!-- frmNuevoPrepararopcion -->
				</div> <!-- divopcionPaginacionAjaxWebPart -->
			</td> <!-- tdopcionPaginacion -->
		</tr> <!-- tropcionPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(opcion_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesopcionAjaxWebPart">
			<td id="tdAccionesRelacionesopcionAjaxWebPart">
				<div id="divAccionesRelacionesopcionAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesopcionAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesopcionAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByopcion">
			<td id="tdOrderByopcion">
				<form id="frmOrderByopcion" name="frmOrderByopcion">
					<div id="divOrderByopcionAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelopcion" name="frmOrderByRelopcion">
					<div id="divOrderByRelopcionAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByopcion -->
		</tr> <!-- trOrderByopcion/super -->
			
		
		
		
		
		
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
			
				import {opcion_webcontrol,opcion_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/opcion/js/webcontrol/opcion_webcontrol.js?random=1';
				
				opcion_webcontrol1.setopcion_constante(window.opcion_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(opcion_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

