<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\municipio\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Municipio Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/municipio/util/municipio_carga.php');
	use com\bydan\contabilidad\seguridad\municipio\util\municipio_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/municipio/presentation/view/municipio_web.php');
	//use com\bydan\contabilidad\seguridad\municipio\presentation\view\municipio_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	municipio_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	municipio_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$municipio_web1= new municipio_web();	
	$municipio_web1->cargarDatosGenerales();
	
	//$moduloActual=$municipio_web1->moduloActual;
	//$usuarioActual=$municipio_web1->usuarioActual;
	//$sessionBase=$municipio_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$municipio_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/municipio/js/templating/municipio_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/municipio/js/templating/municipio_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/municipio/js/templating/municipio_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/municipio/js/templating/municipio_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			municipio_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					municipio_web::$GET_POST=$_GET;
				} else {
					municipio_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			municipio_web::$STR_NOMBRE_PAGINA = 'municipio_view.php';
			municipio_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			municipio_web::$BIT_ES_PAGINA_FORM = 'false';
				
			municipio_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {municipio_constante,municipio_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/municipio/js/util/municipio_constante.js?random=1';
			import {municipio_funcion,municipio_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/municipio/js/util/municipio_funcion.js?random=1';
			
			let municipio_constante2 = new municipio_constante();
			
			municipio_constante2.STR_NOMBRE_PAGINA="<?php echo(municipio_web::$STR_NOMBRE_PAGINA); ?>";
			municipio_constante2.STR_TYPE_ON_LOADmunicipio="<?php echo(municipio_web::$STR_TYPE_ONLOAD); ?>";
			municipio_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(municipio_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			municipio_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(municipio_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			municipio_constante2.STR_ACTION="<?php echo(municipio_web::$STR_ACTION); ?>";
			municipio_constante2.STR_ES_POPUP="<?php echo(municipio_web::$STR_ES_POPUP); ?>";
			municipio_constante2.STR_ES_BUSQUEDA="<?php echo(municipio_web::$STR_ES_BUSQUEDA); ?>";
			municipio_constante2.STR_FUNCION_JS="<?php echo(municipio_web::$STR_FUNCION_JS); ?>";
			municipio_constante2.BIG_ID_ACTUAL="<?php echo(municipio_web::$BIG_ID_ACTUAL); ?>";
			municipio_constante2.BIG_ID_OPCION="<?php echo(municipio_web::$BIG_ID_OPCION); ?>";
			municipio_constante2.STR_OBJETO_JS="<?php echo(municipio_web::$STR_OBJETO_JS); ?>";
			municipio_constante2.STR_ES_RELACIONES="<?php echo(municipio_web::$STR_ES_RELACIONES); ?>";
			municipio_constante2.STR_ES_RELACIONADO="<?php echo(municipio_web::$STR_ES_RELACIONADO); ?>";
			municipio_constante2.STR_ES_SUB_PAGINA="<?php echo(municipio_web::$STR_ES_SUB_PAGINA); ?>";
			municipio_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(municipio_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			municipio_constante2.BIT_ES_PAGINA_FORM=<?php echo(municipio_web::$BIT_ES_PAGINA_FORM); ?>;
			municipio_constante2.STR_SUFIJO="<?php echo(municipio_web::$STR_SUF); ?>";//municipio
			municipio_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(municipio_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//municipio
			
			municipio_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(municipio_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			municipio_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($municipio_web1->moduloActual->getnombre()); ?>";
			municipio_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(municipio_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			municipio_constante2.BIT_ES_LOAD_NORMAL=true;
			/*municipio_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			municipio_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.municipio_constante2 = municipio_constante2;
			
		</script>
		
		<?php if(municipio_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.municipio_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.municipio_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="municipioActual" ></a>
	
	<div id="divResumenmunicipioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(municipio_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(municipio_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(municipio_web::$STR_ES_BUSQUEDA=='false' && municipio_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(municipio_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(municipio_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(municipio_web::$STR_ES_RELACIONADO=='false' && municipio_web::$STR_ES_POPUP=='false' && municipio_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdmunicipioNuevoToolBar">
										<img id="imgNuevoToolBarmunicipio" name="imgNuevoToolBarmunicipio" title="Nuevo Municipio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(municipio_web::$STR_ES_BUSQUEDA=='false' && municipio_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdmunicipioNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarmunicipio" name="imgNuevoGuardarCambiosToolBarmunicipio" title="Nuevo TABLA Municipio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(municipio_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdmunicipioGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarmunicipio" name="imgGuardarCambiosToolBarmunicipio" title="Guardar Municipio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(municipio_web::$STR_ES_RELACIONADO=='false' && municipio_web::$STR_ES_RELACIONES=='false' && municipio_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdmunicipioCopiarToolBar">
										<img id="imgCopiarToolBarmunicipio" name="imgCopiarToolBarmunicipio" title="Copiar Municipio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdmunicipioDuplicarToolBar">
										<img id="imgDuplicarToolBarmunicipio" name="imgDuplicarToolBarmunicipio" title="Duplicar Municipio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(municipio_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdmunicipioRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarmunicipio" name="imgRecargarInformacionToolBarmunicipio" title="Recargar Municipio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdmunicipioAnterioresToolBar">
										<img id="imgAnterioresToolBarmunicipio" name="imgAnterioresToolBarmunicipio" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdmunicipioSiguientesToolBar">
										<img id="imgSiguientesToolBarmunicipio" name="imgSiguientesToolBarmunicipio" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdmunicipioAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarmunicipio" name="imgAbrirOrderByToolBarmunicipio" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((municipio_web::$STR_ES_RELACIONADO=='false' && municipio_web::$STR_ES_RELACIONES=='false') || municipio_web::$STR_ES_BUSQUEDA=='true'  || municipio_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdmunicipioCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarmunicipio" name="imgCerrarPaginaToolBarmunicipio" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trmunicipioCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedamunicipio" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedamunicipio',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trmunicipioCabeceraBusquedas/super -->

		<tr id="trBusquedamunicipio" class="busqueda" style="display:table-row">
			<td id="tdBusquedamunicipio" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedamunicipio" name="frmBusquedamunicipio">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedamunicipio" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trmunicipioBusquedas" class="busqueda" style="display:none"><td>
				<?php if(municipio_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarmunicipio" style="display:table-row">
					<td id="tdParamsBuscarmunicipio">
		<?php if(municipio_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarmunicipio">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosmunicipio" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosmunicipio"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosmunicipio" name="ParamsBuscar-txtNumeroRegistrosmunicipio" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionmunicipio">
							<td id="tdGenerarReportemunicipio" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosmunicipio" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosmunicipio" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionmunicipio" name="btnRecargarInformacionmunicipio" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginamunicipio" name="btnImprimirPaginamunicipio" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*municipio_web::$STR_ES_BUSQUEDA=='false'  &&*/ municipio_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBymunicipio">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBymunicipio" name="btnOrderBymunicipio" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(municipio_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdmunicipioConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosmunicipio -->

							</td><!-- tdGenerarReportemunicipio -->
						</tr><!-- trRecargarInformacionmunicipio -->
					</table><!-- tblParamsBuscarNumeroRegistrosmunicipio -->
				</div> <!-- divParamsBuscarmunicipio -->
		<?php } ?>
				</td> <!-- tdParamsBuscarmunicipio -->
				</tr><!-- trParamsBuscarmunicipio -->
				</table> <!-- tblBusquedamunicipio -->
				</form> <!-- frmBusquedamunicipio -->
				

			</td> <!-- tdBusquedamunicipio -->
		</tr> <!-- trBusquedamunicipio/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(municipio_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divmunicipioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblmunicipioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmmunicipioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnmunicipioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="municipio_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnmunicipioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmmunicipioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblmunicipioPopupAjaxWebPart -->
		</div> <!-- divmunicipioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(municipio_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trmunicipioTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdamunicipio"></a>
		<img id="imgTablaParaDerechamunicipio" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechamunicipio'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdamunicipio" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdamunicipio'"/>
		<a id="TablaDerechamunicipio"></a>
	</td>
</tr> <!-- trmunicipioTablaNavegacion/super -->
<?php } ?>

<tr id="trmunicipioTablaDatos">
	<td colspan="3" id="htmlTableCellmunicipio">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosmunicipiosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trmunicipioTablaDatos/super -->
		
		
		<tr id="trmunicipioPaginacion" style="display:table-row">
			<td id="tdmunicipioPaginacion" align="center">
				<div id="divmunicipioPaginacionAjaxWebPart">
				<form id="frmPaginacionmunicipio" name="frmPaginacionmunicipio">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionmunicipio" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(municipio_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkmunicipio" name="btnSeleccionarLoteFkmunicipio" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(municipio_web::$STR_ES_RELACIONADO=='false' /*&& municipio_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresmunicipio" name="btnAnterioresmunicipio" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(municipio_web::$STR_ES_BUSQUEDA=='false' && municipio_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdmunicipioNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararmunicipio" name="btnNuevoTablaPrepararmunicipio" title="NUEVO Municipio" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablamunicipio" name="ParamsPaginar-txtNumeroNuevoTablamunicipio" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(municipio_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdmunicipioConEditarmunicipio">
							<label>
								<input id="ParamsBuscar-chbConEditarmunicipio" name="ParamsBuscar-chbConEditarmunicipio" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(municipio_web::$STR_ES_RELACIONADO=='false'/* && municipio_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesmunicipio" name="btnSiguientesmunicipio" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionmunicipio -->
				</form> <!-- frmPaginacionmunicipio -->
				<form id="frmNuevoPrepararmunicipio" name="frmNuevoPrepararmunicipio">
				<table id="tblNuevoPrepararmunicipio" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trmunicipioNuevo" height="10">
						<?php if(municipio_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdmunicipioNuevo" align="center">
							<input type="button" id="btnNuevoPrepararmunicipio" name="btnNuevoPrepararmunicipio" title="NUEVO Municipio" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdmunicipioGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosmunicipio" name="btnGuardarCambiosmunicipio" title="GUARDAR Municipio" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(municipio_web::$STR_ES_RELACIONADO=='false' && municipio_web::$STR_ES_RELACIONES=='false' && municipio_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdmunicipioDuplicar" align="center">
							<input type="button" id="btnDuplicarmunicipio" name="btnDuplicarmunicipio" title="DUPLICAR Municipio" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdmunicipioCopiar" align="center">
							<input type="button" id="btnCopiarmunicipio" name="btnCopiarmunicipio" title="COPIAR Municipio" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(municipio_web::$STR_ES_RELACIONADO=='false' && ((municipio_web::$STR_ES_RELACIONADO=='false' && municipio_web::$STR_ES_RELACIONES=='false') || municipio_web::$STR_ES_BUSQUEDA=='true'  || municipio_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdmunicipioCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginamunicipio" name="btnCerrarPaginamunicipio" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararmunicipio -->
				</form> <!-- frmNuevoPrepararmunicipio -->
				</div> <!-- divmunicipioPaginacionAjaxWebPart -->
			</td> <!-- tdmunicipioPaginacion -->
		</tr> <!-- trmunicipioPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(municipio_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesmunicipioAjaxWebPart">
			<td id="tdAccionesRelacionesmunicipioAjaxWebPart">
				<div id="divAccionesRelacionesmunicipioAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesmunicipioAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesmunicipioAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBymunicipio">
			<td id="tdOrderBymunicipio">
				<form id="frmOrderBymunicipio" name="frmOrderBymunicipio">
					<div id="divOrderBymunicipioAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBymunicipio -->
		</tr> <!-- trOrderBymunicipio/super -->
			
		
		
		
		
		
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
			
				import {municipio_webcontrol,municipio_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/municipio/js/webcontrol/municipio_webcontrol.js?random=1';
				
				municipio_webcontrol1.setmunicipio_constante(window.municipio_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(municipio_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

