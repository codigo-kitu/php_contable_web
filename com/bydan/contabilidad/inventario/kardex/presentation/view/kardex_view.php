<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\kardex\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Kardex Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/kardex/util/kardex_carga.php');
	use com\bydan\contabilidad\inventario\kardex\util\kardex_carga;
	
	//include_once('com/bydan/contabilidad/inventario/kardex/presentation/view/kardex_web.php');
	//use com\bydan\contabilidad\inventario\kardex\presentation\view\kardex_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	kardex_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	kardex_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$kardex_web1= new kardex_web();	
	$kardex_web1->cargarDatosGenerales();
	
	//$moduloActual=$kardex_web1->moduloActual;
	//$usuarioActual=$kardex_web1->usuarioActual;
	//$sessionBase=$kardex_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$kardex_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/kardex/js/templating/kardex_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/kardex/js/templating/kardex_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/kardex/js/templating/kardex_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/kardex/js/templating/kardex_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/kardex/js/templating/kardex_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			kardex_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					kardex_web::$GET_POST=$_GET;
				} else {
					kardex_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			kardex_web::$STR_NOMBRE_PAGINA = 'kardex_view.php';
			kardex_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			kardex_web::$BIT_ES_PAGINA_FORM = 'false';
				
			kardex_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {kardex_constante,kardex_constante1} from './webroot/js/JavaScript/contabilidad/inventario/kardex/js/util/kardex_constante.js?random=1';
			import {kardex_funcion,kardex_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/kardex/js/util/kardex_funcion.js?random=1';
			
			let kardex_constante2 = new kardex_constante();
			
			kardex_constante2.STR_NOMBRE_PAGINA="<?php echo(kardex_web::$STR_NOMBRE_PAGINA); ?>";
			kardex_constante2.STR_TYPE_ON_LOADkardex="<?php echo(kardex_web::$STR_TYPE_ONLOAD); ?>";
			kardex_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(kardex_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			kardex_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(kardex_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			kardex_constante2.STR_ACTION="<?php echo(kardex_web::$STR_ACTION); ?>";
			kardex_constante2.STR_ES_POPUP="<?php echo(kardex_web::$STR_ES_POPUP); ?>";
			kardex_constante2.STR_ES_BUSQUEDA="<?php echo(kardex_web::$STR_ES_BUSQUEDA); ?>";
			kardex_constante2.STR_FUNCION_JS="<?php echo(kardex_web::$STR_FUNCION_JS); ?>";
			kardex_constante2.BIG_ID_ACTUAL="<?php echo(kardex_web::$BIG_ID_ACTUAL); ?>";
			kardex_constante2.BIG_ID_OPCION="<?php echo(kardex_web::$BIG_ID_OPCION); ?>";
			kardex_constante2.STR_OBJETO_JS="<?php echo(kardex_web::$STR_OBJETO_JS); ?>";
			kardex_constante2.STR_ES_RELACIONES="<?php echo(kardex_web::$STR_ES_RELACIONES); ?>";
			kardex_constante2.STR_ES_RELACIONADO="<?php echo(kardex_web::$STR_ES_RELACIONADO); ?>";
			kardex_constante2.STR_ES_SUB_PAGINA="<?php echo(kardex_web::$STR_ES_SUB_PAGINA); ?>";
			kardex_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(kardex_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			kardex_constante2.BIT_ES_PAGINA_FORM=<?php echo(kardex_web::$BIT_ES_PAGINA_FORM); ?>;
			kardex_constante2.STR_SUFIJO="<?php echo(kardex_web::$STR_SUF); ?>";//kardex
			kardex_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(kardex_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//kardex
			
			kardex_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(kardex_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			kardex_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($kardex_web1->moduloActual->getnombre()); ?>";
			kardex_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(kardex_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			kardex_constante2.BIT_ES_LOAD_NORMAL=true;
			/*kardex_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			kardex_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.kardex_constante2 = kardex_constante2;
			
		</script>
		
		<?php if(kardex_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.kardex_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.kardex_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="kardexActual" ></a>
	
	<div id="divResumenkardexActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(kardex_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(kardex_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(kardex_web::$STR_ES_BUSQUEDA=='false' && kardex_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(kardex_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(kardex_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(kardex_web::$STR_ES_RELACIONADO=='false' && kardex_web::$STR_ES_POPUP=='false' && kardex_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdkardexNuevoToolBar">
										<img id="imgNuevoToolBarkardex" name="imgNuevoToolBarkardex" title="Nuevo Kardex" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(kardex_web::$STR_ES_BUSQUEDA=='false' && kardex_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdkardexNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarkardex" name="imgNuevoGuardarCambiosToolBarkardex" title="Nuevo TABLA Kardex" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(kardex_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdkardexGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarkardex" name="imgGuardarCambiosToolBarkardex" title="Guardar Kardex" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(kardex_web::$STR_ES_RELACIONADO=='false' && kardex_web::$STR_ES_RELACIONES=='false' && kardex_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdkardexCopiarToolBar">
										<img id="imgCopiarToolBarkardex" name="imgCopiarToolBarkardex" title="Copiar Kardex" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdkardexDuplicarToolBar">
										<img id="imgDuplicarToolBarkardex" name="imgDuplicarToolBarkardex" title="Duplicar Kardex" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(kardex_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdkardexRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarkardex" name="imgRecargarInformacionToolBarkardex" title="Recargar Kardex" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdkardexAnterioresToolBar">
										<img id="imgAnterioresToolBarkardex" name="imgAnterioresToolBarkardex" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdkardexSiguientesToolBar">
										<img id="imgSiguientesToolBarkardex" name="imgSiguientesToolBarkardex" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdkardexAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarkardex" name="imgAbrirOrderByToolBarkardex" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((kardex_web::$STR_ES_RELACIONADO=='false' && kardex_web::$STR_ES_RELACIONES=='false') || kardex_web::$STR_ES_BUSQUEDA=='true'  || kardex_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdkardexCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarkardex" name="imgCerrarPaginaToolBarkardex" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trkardexCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedakardex" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedakardex',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trkardexCabeceraBusquedas/super -->

		<tr id="trBusquedakardex" class="busqueda" style="display:table-row">
			<td id="tdBusquedakardex" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedakardex" name="frmBusquedakardex">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedakardex" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trkardexBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(kardex_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleFK_Idcliente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcliente"> Por  Clientes</a></li>
						<li id="listrVisibleFK_Idestado" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado"> Por Estado</a></li>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por  Proveedores</a></li>
						<li id="listrVisibleFK_Idtipo_kardex" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_kardex"> Por Tipo Kardex</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcliente">
					<table id="tblstrVisibleFK_Idcliente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Clientes</span>
						</td>
						<td align="center">
							<select id="FK_Idcliente-cmbid_cliente" name="FK_Idcliente-cmbid_cliente" title=" Clientes" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarkardexFK_Idcliente" name="btnBuscarkardexFK_Idcliente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarkardexFK_Idestado" name="btnBuscarkardexFK_Idestado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproveedor">
					<table id="tblstrVisibleFK_Idproveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Proveedores</span>
						</td>
						<td align="center">
							<select id="FK_Idproveedor-cmbid_proveedor" name="FK_Idproveedor-cmbid_proveedor" title=" Proveedores" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarkardexFK_Idproveedor" name="btnBuscarkardexFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_kardex">
					<table id="tblstrVisibleFK_Idtipo_kardex" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Tipo Kardex</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_kardex-cmbid_tipo_kardex" name="FK_Idtipo_kardex-cmbid_tipo_kardex" title="Tipo Kardex" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarkardexFK_Idtipo_kardex" name="btnBuscarkardexFK_Idtipo_kardex" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarkardex" style="display:table-row">
					<td id="tdParamsBuscarkardex">
		<?php if(kardex_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarkardex">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroskardex" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroskardex"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroskardex" name="ParamsBuscar-txtNumeroRegistroskardex" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionkardex">
							<td id="tdGenerarReportekardex" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoskardex" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoskardex" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionkardex" name="btnRecargarInformacionkardex" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginakardex" name="btnImprimirPaginakardex" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*kardex_web::$STR_ES_BUSQUEDA=='false'  &&*/ kardex_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBykardex">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBykardex" name="btnOrderBykardex" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelkardex" name="btnOrderByRelkardex" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(kardex_web::$STR_ES_RELACIONES=='false' && kardex_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(kardex_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdkardexConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoskardex -->

							</td><!-- tdGenerarReportekardex -->
						</tr><!-- trRecargarInformacionkardex -->
					</table><!-- tblParamsBuscarNumeroRegistroskardex -->
				</div> <!-- divParamsBuscarkardex -->
		<?php } ?>
				</td> <!-- tdParamsBuscarkardex -->
				</tr><!-- trParamsBuscarkardex -->
				</table> <!-- tblBusquedakardex -->
				</form> <!-- frmBusquedakardex -->
				

			</td> <!-- tdBusquedakardex -->
		</tr> <!-- trBusquedakardex/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(kardex_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divkardexPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblkardexPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmkardexAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnkardexAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="kardex_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnkardexAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmkardexAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblkardexPopupAjaxWebPart -->
		</div> <!-- divkardexPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(kardex_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trkardexTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdakardex"></a>
		<img id="imgTablaParaDerechakardex" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechakardex'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdakardex" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdakardex'"/>
		<a id="TablaDerechakardex"></a>
	</td>
</tr> <!-- trkardexTablaNavegacion/super -->
<?php } ?>

<tr id="trkardexTablaDatos">
	<td colspan="3" id="htmlTableCellkardex">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoskardexsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trkardexTablaDatos/super -->
		
		
		<tr id="trkardexPaginacion" style="display:table-row">
			<td id="tdkardexPaginacion" align="left">
				<div id="divkardexPaginacionAjaxWebPart">
				<form id="frmPaginacionkardex" name="frmPaginacionkardex">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionkardex" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(kardex_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkkardex" name="btnSeleccionarLoteFkkardex" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(kardex_web::$STR_ES_RELACIONADO=='false' /*&& kardex_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioreskardex" name="btnAnterioreskardex" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(kardex_web::$STR_ES_BUSQUEDA=='false' && kardex_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdkardexNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararkardex" name="btnNuevoTablaPrepararkardex" title="NUEVO Kardex" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablakardex" name="ParamsPaginar-txtNumeroNuevoTablakardex" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(kardex_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdkardexConEditarkardex">
							<label>
								<input id="ParamsBuscar-chbConEditarkardex" name="ParamsBuscar-chbConEditarkardex" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(kardex_web::$STR_ES_RELACIONADO=='false'/* && kardex_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguienteskardex" name="btnSiguienteskardex" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionkardex -->
				</form> <!-- frmPaginacionkardex -->
				<form id="frmNuevoPrepararkardex" name="frmNuevoPrepararkardex">
				<table id="tblNuevoPrepararkardex" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trkardexNuevo" height="10">
						<?php if(kardex_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdkardexNuevo" align="center">
							<input type="button" id="btnNuevoPrepararkardex" name="btnNuevoPrepararkardex" title="NUEVO Kardex" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdkardexGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioskardex" name="btnGuardarCambioskardex" title="GUARDAR Kardex" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(kardex_web::$STR_ES_RELACIONADO=='false' && kardex_web::$STR_ES_RELACIONES=='false' && kardex_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdkardexDuplicar" align="center">
							<input type="button" id="btnDuplicarkardex" name="btnDuplicarkardex" title="DUPLICAR Kardex" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdkardexCopiar" align="center">
							<input type="button" id="btnCopiarkardex" name="btnCopiarkardex" title="COPIAR Kardex" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(kardex_web::$STR_ES_RELACIONADO=='false' && ((kardex_web::$STR_ES_RELACIONADO=='false' && kardex_web::$STR_ES_RELACIONES=='false') || kardex_web::$STR_ES_BUSQUEDA=='true'  || kardex_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdkardexCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginakardex" name="btnCerrarPaginakardex" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararkardex -->
				</form> <!-- frmNuevoPrepararkardex -->
				</div> <!-- divkardexPaginacionAjaxWebPart -->
			</td> <!-- tdkardexPaginacion -->
		</tr> <!-- trkardexPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(kardex_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacioneskardexAjaxWebPart">
			<td id="tdAccionesRelacioneskardexAjaxWebPart">
				<div id="divAccionesRelacioneskardexAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacioneskardexAjaxWebPart -->
		</tr> <!-- trAccionesRelacioneskardexAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBykardex">
			<td id="tdOrderBykardex">
				<form id="frmOrderBykardex" name="frmOrderBykardex">
					<div id="divOrderBykardexAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelkardex" name="frmOrderByRelkardex">
					<div id="divOrderByRelkardexAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBykardex -->
		</tr> <!-- trOrderBykardex/super -->
			
		
		
		
		
		
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
			
				import {kardex_webcontrol,kardex_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/kardex/js/webcontrol/kardex_webcontrol.js?random=1';
				
				kardex_webcontrol1.setkardex_constante(window.kardex_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(kardex_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

