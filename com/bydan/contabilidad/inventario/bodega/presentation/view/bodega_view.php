<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\bodega\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Bodega Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/bodega/util/bodega_carga.php');
	use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
	
	//include_once('com/bydan/contabilidad/inventario/bodega/presentation/view/bodega_web.php');
	//use com\bydan\contabilidad\inventario\bodega\presentation\view\bodega_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	bodega_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	bodega_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$bodega_web1= new bodega_web();	
	$bodega_web1->cargarDatosGenerales();
	
	//$moduloActual=$bodega_web1->moduloActual;
	//$usuarioActual=$bodega_web1->usuarioActual;
	//$sessionBase=$bodega_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$bodega_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/bodega/js/templating/bodega_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/bodega/js/templating/bodega_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/bodega/js/templating/bodega_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/bodega/js/templating/bodega_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/bodega/js/templating/bodega_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			bodega_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					bodega_web::$GET_POST=$_GET;
				} else {
					bodega_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			bodega_web::$STR_NOMBRE_PAGINA = 'bodega_view.php';
			bodega_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			bodega_web::$BIT_ES_PAGINA_FORM = 'false';
				
			bodega_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {bodega_constante,bodega_constante1} from './webroot/js/JavaScript/contabilidad/inventario/bodega/js/util/bodega_constante.js?random=1';
			import {bodega_funcion,bodega_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/bodega/js/util/bodega_funcion.js?random=1';
			
			let bodega_constante2 = new bodega_constante();
			
			bodega_constante2.STR_NOMBRE_PAGINA="<?php echo(bodega_web::$STR_NOMBRE_PAGINA); ?>";
			bodega_constante2.STR_TYPE_ON_LOADbodega="<?php echo(bodega_web::$STR_TYPE_ONLOAD); ?>";
			bodega_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(bodega_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			bodega_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(bodega_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			bodega_constante2.STR_ACTION="<?php echo(bodega_web::$STR_ACTION); ?>";
			bodega_constante2.STR_ES_POPUP="<?php echo(bodega_web::$STR_ES_POPUP); ?>";
			bodega_constante2.STR_ES_BUSQUEDA="<?php echo(bodega_web::$STR_ES_BUSQUEDA); ?>";
			bodega_constante2.STR_FUNCION_JS="<?php echo(bodega_web::$STR_FUNCION_JS); ?>";
			bodega_constante2.BIG_ID_ACTUAL="<?php echo(bodega_web::$BIG_ID_ACTUAL); ?>";
			bodega_constante2.BIG_ID_OPCION="<?php echo(bodega_web::$BIG_ID_OPCION); ?>";
			bodega_constante2.STR_OBJETO_JS="<?php echo(bodega_web::$STR_OBJETO_JS); ?>";
			bodega_constante2.STR_ES_RELACIONES="<?php echo(bodega_web::$STR_ES_RELACIONES); ?>";
			bodega_constante2.STR_ES_RELACIONADO="<?php echo(bodega_web::$STR_ES_RELACIONADO); ?>";
			bodega_constante2.STR_ES_SUB_PAGINA="<?php echo(bodega_web::$STR_ES_SUB_PAGINA); ?>";
			bodega_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(bodega_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			bodega_constante2.BIT_ES_PAGINA_FORM=<?php echo(bodega_web::$BIT_ES_PAGINA_FORM); ?>;
			bodega_constante2.STR_SUFIJO="<?php echo(bodega_web::$STR_SUF); ?>";//bodega
			bodega_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(bodega_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//bodega
			
			bodega_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(bodega_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			bodega_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($bodega_web1->moduloActual->getnombre()); ?>";
			bodega_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(bodega_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			bodega_constante2.BIT_ES_LOAD_NORMAL=true;
			/*bodega_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			bodega_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.bodega_constante2 = bodega_constante2;
			
		</script>
		
		<?php if(bodega_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.bodega_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.bodega_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="bodegaActual" ></a>
	
	<div id="divResumenbodegaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(bodega_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(bodega_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(bodega_web::$STR_ES_BUSQUEDA=='false' && bodega_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(bodega_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(bodega_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(bodega_web::$STR_ES_RELACIONADO=='false' && bodega_web::$STR_ES_POPUP=='false' && bodega_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdbodegaNuevoToolBar">
										<img id="imgNuevoToolBarbodega" name="imgNuevoToolBarbodega" title="Nuevo Bodega" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(bodega_web::$STR_ES_BUSQUEDA=='false' && bodega_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdbodegaNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarbodega" name="imgNuevoGuardarCambiosToolBarbodega" title="Nuevo TABLA Bodega" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(bodega_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdbodegaGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarbodega" name="imgGuardarCambiosToolBarbodega" title="Guardar Bodega" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(bodega_web::$STR_ES_RELACIONADO=='false' && bodega_web::$STR_ES_RELACIONES=='false' && bodega_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdbodegaCopiarToolBar">
										<img id="imgCopiarToolBarbodega" name="imgCopiarToolBarbodega" title="Copiar Bodega" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdbodegaDuplicarToolBar">
										<img id="imgDuplicarToolBarbodega" name="imgDuplicarToolBarbodega" title="Duplicar Bodega" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(bodega_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdbodegaRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarbodega" name="imgRecargarInformacionToolBarbodega" title="Recargar Bodega" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdbodegaAnterioresToolBar">
										<img id="imgAnterioresToolBarbodega" name="imgAnterioresToolBarbodega" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdbodegaSiguientesToolBar">
										<img id="imgSiguientesToolBarbodega" name="imgSiguientesToolBarbodega" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdbodegaAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarbodega" name="imgAbrirOrderByToolBarbodega" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((bodega_web::$STR_ES_RELACIONADO=='false' && bodega_web::$STR_ES_RELACIONES=='false') || bodega_web::$STR_ES_BUSQUEDA=='true'  || bodega_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdbodegaCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarbodega" name="imgCerrarPaginaToolBarbodega" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trbodegaCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedabodega" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedabodega',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trbodegaCabeceraBusquedas/super -->

		<tr id="trBusquedabodega" class="busqueda" style="display:table-row">
			<td id="tdBusquedabodega" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedabodega" name="frmBusquedabodega">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedabodega" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trbodegaBusquedas" class="busqueda" style="display:none"><td>
				<?php if(bodega_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarbodega" style="display:table-row">
					<td id="tdParamsBuscarbodega">
		<?php if(bodega_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarbodega">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosbodega" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosbodega"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosbodega" name="ParamsBuscar-txtNumeroRegistrosbodega" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionbodega">
							<td id="tdGenerarReportebodega" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosbodega" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosbodega" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionbodega" name="btnRecargarInformacionbodega" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginabodega" name="btnImprimirPaginabodega" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*bodega_web::$STR_ES_BUSQUEDA=='false'  &&*/ bodega_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBybodega">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBybodega" name="btnOrderBybodega" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelbodega" name="btnOrderByRelbodega" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(bodega_web::$STR_ES_RELACIONES=='false' && bodega_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(bodega_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdbodegaConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosbodega -->

							</td><!-- tdGenerarReportebodega -->
						</tr><!-- trRecargarInformacionbodega -->
					</table><!-- tblParamsBuscarNumeroRegistrosbodega -->
				</div> <!-- divParamsBuscarbodega -->
		<?php } ?>
				</td> <!-- tdParamsBuscarbodega -->
				</tr><!-- trParamsBuscarbodega -->
				</table> <!-- tblBusquedabodega -->
				</form> <!-- frmBusquedabodega -->
				

			</td> <!-- tdBusquedabodega -->
		</tr> <!-- trBusquedabodega/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(bodega_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divbodegaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblbodegaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmbodegaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnbodegaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="bodega_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnbodegaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmbodegaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblbodegaPopupAjaxWebPart -->
		</div> <!-- divbodegaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(bodega_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trbodegaTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdabodega"></a>
		<img id="imgTablaParaDerechabodega" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechabodega'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdabodega" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdabodega'"/>
		<a id="TablaDerechabodega"></a>
	</td>
</tr> <!-- trbodegaTablaNavegacion/super -->
<?php } ?>

<tr id="trbodegaTablaDatos">
	<td colspan="3" id="htmlTableCellbodega">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosbodegasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trbodegaTablaDatos/super -->
		
		
		<tr id="trbodegaPaginacion" style="display:table-row">
			<td id="tdbodegaPaginacion" align="left">
				<div id="divbodegaPaginacionAjaxWebPart">
				<form id="frmPaginacionbodega" name="frmPaginacionbodega">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionbodega" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(bodega_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkbodega" name="btnSeleccionarLoteFkbodega" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(bodega_web::$STR_ES_RELACIONADO=='false' /*&& bodega_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresbodega" name="btnAnterioresbodega" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(bodega_web::$STR_ES_BUSQUEDA=='false' && bodega_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdbodegaNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararbodega" name="btnNuevoTablaPrepararbodega" title="NUEVO Bodega" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablabodega" name="ParamsPaginar-txtNumeroNuevoTablabodega" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(bodega_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdbodegaConEditarbodega">
							<label>
								<input id="ParamsBuscar-chbConEditarbodega" name="ParamsBuscar-chbConEditarbodega" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(bodega_web::$STR_ES_RELACIONADO=='false'/* && bodega_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesbodega" name="btnSiguientesbodega" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionbodega -->
				</form> <!-- frmPaginacionbodega -->
				<form id="frmNuevoPrepararbodega" name="frmNuevoPrepararbodega">
				<table id="tblNuevoPrepararbodega" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trbodegaNuevo" height="10">
						<?php if(bodega_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdbodegaNuevo" align="center">
							<input type="button" id="btnNuevoPrepararbodega" name="btnNuevoPrepararbodega" title="NUEVO Bodega" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdbodegaGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosbodega" name="btnGuardarCambiosbodega" title="GUARDAR Bodega" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(bodega_web::$STR_ES_RELACIONADO=='false' && bodega_web::$STR_ES_RELACIONES=='false' && bodega_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdbodegaDuplicar" align="center">
							<input type="button" id="btnDuplicarbodega" name="btnDuplicarbodega" title="DUPLICAR Bodega" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdbodegaCopiar" align="center">
							<input type="button" id="btnCopiarbodega" name="btnCopiarbodega" title="COPIAR Bodega" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(bodega_web::$STR_ES_RELACIONADO=='false' && ((bodega_web::$STR_ES_RELACIONADO=='false' && bodega_web::$STR_ES_RELACIONES=='false') || bodega_web::$STR_ES_BUSQUEDA=='true'  || bodega_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdbodegaCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginabodega" name="btnCerrarPaginabodega" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararbodega -->
				</form> <!-- frmNuevoPrepararbodega -->
				</div> <!-- divbodegaPaginacionAjaxWebPart -->
			</td> <!-- tdbodegaPaginacion -->
		</tr> <!-- trbodegaPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(bodega_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesbodegaAjaxWebPart">
			<td id="tdAccionesRelacionesbodegaAjaxWebPart">
				<div id="divAccionesRelacionesbodegaAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesbodegaAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesbodegaAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBybodega">
			<td id="tdOrderBybodega">
				<form id="frmOrderBybodega" name="frmOrderBybodega">
					<div id="divOrderBybodegaAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelbodega" name="frmOrderByRelbodega">
					<div id="divOrderByRelbodegaAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBybodega -->
		</tr> <!-- trOrderBybodega/super -->
			
		
		
		
		
		
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
			
				import {bodega_webcontrol,bodega_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/bodega/js/webcontrol/bodega_webcontrol.js?random=1';
				
				bodega_webcontrol1.setbodega_constante(window.bodega_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(bodega_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

