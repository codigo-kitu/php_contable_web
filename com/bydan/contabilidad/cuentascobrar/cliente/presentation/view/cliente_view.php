<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\cliente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Cliente Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascobrar/cliente/util/cliente_carga.php');
	use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/cliente/presentation/view/cliente_web.php');
	//use com\bydan\contabilidad\cuentascobrar\cliente\presentation\view\cliente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$cliente_web1= new cliente_web();	
	$cliente_web1->cargarDatosGenerales();
	
	//$moduloActual=$cliente_web1->moduloActual;
	//$usuarioActual=$cliente_web1->usuarioActual;
	//$sessionBase=$cliente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$cliente_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/cliente/js/templating/cliente_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/cliente/js/templating/cliente_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/cliente/js/templating/cliente_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/cliente/js/templating/cliente_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/cliente/js/templating/cliente_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			cliente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					cliente_web::$GET_POST=$_GET;
				} else {
					cliente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			cliente_web::$STR_NOMBRE_PAGINA = 'cliente_view.php';
			cliente_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			cliente_web::$BIT_ES_PAGINA_FORM = 'false';
				
			cliente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {cliente_constante,cliente_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/cliente/js/util/cliente_constante.js?random=1';
			import {cliente_funcion,cliente_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/cliente/js/util/cliente_funcion.js?random=1';
			
			let cliente_constante2 = new cliente_constante();
			
			cliente_constante2.STR_NOMBRE_PAGINA="<?php echo(cliente_web::$STR_NOMBRE_PAGINA); ?>";
			cliente_constante2.STR_TYPE_ON_LOADcliente="<?php echo(cliente_web::$STR_TYPE_ONLOAD); ?>";
			cliente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(cliente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			cliente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(cliente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			cliente_constante2.STR_ACTION="<?php echo(cliente_web::$STR_ACTION); ?>";
			cliente_constante2.STR_ES_POPUP="<?php echo(cliente_web::$STR_ES_POPUP); ?>";
			cliente_constante2.STR_ES_BUSQUEDA="<?php echo(cliente_web::$STR_ES_BUSQUEDA); ?>";
			cliente_constante2.STR_FUNCION_JS="<?php echo(cliente_web::$STR_FUNCION_JS); ?>";
			cliente_constante2.BIG_ID_ACTUAL="<?php echo(cliente_web::$BIG_ID_ACTUAL); ?>";
			cliente_constante2.BIG_ID_OPCION="<?php echo(cliente_web::$BIG_ID_OPCION); ?>";
			cliente_constante2.STR_OBJETO_JS="<?php echo(cliente_web::$STR_OBJETO_JS); ?>";
			cliente_constante2.STR_ES_RELACIONES="<?php echo(cliente_web::$STR_ES_RELACIONES); ?>";
			cliente_constante2.STR_ES_RELACIONADO="<?php echo(cliente_web::$STR_ES_RELACIONADO); ?>";
			cliente_constante2.STR_ES_SUB_PAGINA="<?php echo(cliente_web::$STR_ES_SUB_PAGINA); ?>";
			cliente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(cliente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			cliente_constante2.BIT_ES_PAGINA_FORM=<?php echo(cliente_web::$BIT_ES_PAGINA_FORM); ?>;
			cliente_constante2.STR_SUFIJO="<?php echo(cliente_web::$STR_SUF); ?>";//cliente
			cliente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(cliente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//cliente
			
			cliente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(cliente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			cliente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($cliente_web1->moduloActual->getnombre()); ?>";
			cliente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(cliente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			cliente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*cliente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			cliente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.cliente_constante2 = cliente_constante2;
			
		</script>
		
		<?php if(cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="clienteActual" ></a>
	
	<div id="divResumenclienteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(cliente_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(cliente_web::$STR_ES_BUSQUEDA=='false' && cliente_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(cliente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(cliente_web::$STR_ES_RELACIONADO=='false' && cliente_web::$STR_ES_POPUP=='false' && cliente_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdclienteNuevoToolBar">
										<img id="imgNuevoToolBarcliente" name="imgNuevoToolBarcliente" title="Nuevo Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(cliente_web::$STR_ES_BUSQUEDA=='false' && cliente_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdclienteNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcliente" name="imgNuevoGuardarCambiosToolBarcliente" title="Nuevo TABLA Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cliente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdclienteGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcliente" name="imgGuardarCambiosToolBarcliente" title="Guardar Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cliente_web::$STR_ES_RELACIONADO=='false' && cliente_web::$STR_ES_RELACIONES=='false' && cliente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdclienteCopiarToolBar">
										<img id="imgCopiarToolBarcliente" name="imgCopiarToolBarcliente" title="Copiar Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdclienteDuplicarToolBar">
										<img id="imgDuplicarToolBarcliente" name="imgDuplicarToolBarcliente" title="Duplicar Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(cliente_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdclienteRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcliente" name="imgRecargarInformacionToolBarcliente" title="Recargar Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdclienteAnterioresToolBar">
										<img id="imgAnterioresToolBarcliente" name="imgAnterioresToolBarcliente" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdclienteSiguientesToolBar">
										<img id="imgSiguientesToolBarcliente" name="imgSiguientesToolBarcliente" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdclienteAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcliente" name="imgAbrirOrderByToolBarcliente" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((cliente_web::$STR_ES_RELACIONADO=='false' && cliente_web::$STR_ES_RELACIONES=='false') || cliente_web::$STR_ES_BUSQUEDA=='true'  || cliente_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdclienteCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcliente" name="imgCerrarPaginaToolBarcliente" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trclienteCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacliente" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacliente',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trclienteCabeceraBusquedas/super -->

		<tr id="trBusquedacliente" class="busqueda" style="display:table-row">
			<td id="tdBusquedacliente" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacliente" name="frmBusquedacliente">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacliente" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trclienteBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 95%">
					<ul>
						<li id="listrVisibleFK_Idcategoria_cliente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcategoria_cliente"> Por Categorias Cliente</a></li>
						<li id="listrVisibleFK_Idciudad" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idciudad"> Por Ciudad</a></li>
						<li id="listrVisibleFK_Idcuenta" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta"> Por Cuenta Contable Ventas</a></li>
						<li id="listrVisibleFK_Idgiro_negocio" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idgiro_negocio"> Por Giro Negocio</a></li>
						<li id="listrVisibleFK_Idimpuesto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idimpuesto"> Por Impuesto</a></li>
						<li id="listrVisibleFK_Idotro_impuesto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idotro_impuesto"> Por  Otro Impuesto</a></li>
						<li id="listrVisibleFK_Idpais" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idpais"> Por Pais</a></li>
						<li id="listrVisibleFK_Idprovincia" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idprovincia"> Por Provincia</a></li>
						<li id="listrVisibleFK_Idretencion" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idretencion"> Por  Retencion</a></li>
						<li id="listrVisibleFK_Idretencion_fuente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idretencion_fuente"> Por  Retencion Fuente</a></li>
						<li id="listrVisibleFK_Idretencion_ica" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idretencion_ica"> Por  Retencion Ica</a></li>
						<li id="listrVisibleFK_Idtermino_pago" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtermino_pago"> Por Terminos Pago</a></li>
						<li id="listrVisibleFK_Idtipo_persona" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_persona"> Por  Tipo Persona</a></li>
						<li id="listrVisibleFK_Idtipo_precio" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_precio"> Por  Tipo Precio</a></li>
						<li id="listrVisibleFK_Idvendedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idvendedor"> Por Vendedor</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcategoria_cliente">
					<table id="tblstrVisibleFK_Idcategoria_cliente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Categorias Cliente</span>
						</td>
						<td align="center">
							<select id="FK_Idcategoria_cliente-cmbid_categoria_cliente" name="FK_Idcategoria_cliente-cmbid_categoria_cliente" title="Categorias Cliente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclienteFK_Idcategoria_cliente" name="btnBuscarclienteFK_Idcategoria_cliente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idciudad">
					<table id="tblstrVisibleFK_Idciudad" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Ciudad</span>
						</td>
						<td align="center">
							<select id="FK_Idciudad-cmbid_ciudad" name="FK_Idciudad-cmbid_ciudad" title="Ciudad" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclienteFK_Idciudad" name="btnBuscarclienteFK_Idciudad" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta">
					<table id="tblstrVisibleFK_Idcuenta" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cuenta Contable Ventas</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta-cmbid_cuenta" name="FK_Idcuenta-cmbid_cuenta" title="Cuenta Contable Ventas" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclienteFK_Idcuenta" name="btnBuscarclienteFK_Idcuenta" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idgiro_negocio">
					<table id="tblstrVisibleFK_Idgiro_negocio" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Giro Negocio</span>
						</td>
						<td align="center">
							<select id="FK_Idgiro_negocio-cmbid_giro_negocio_cliente" name="FK_Idgiro_negocio-cmbid_giro_negocio_cliente" title="Giro Negocio" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclienteFK_Idgiro_negocio" name="btnBuscarclienteFK_Idgiro_negocio" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idimpuesto">
					<table id="tblstrVisibleFK_Idimpuesto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Impuesto</span>
						</td>
						<td align="center">
							<select id="FK_Idimpuesto-cmbid_impuesto" name="FK_Idimpuesto-cmbid_impuesto" title="Impuesto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclienteFK_Idimpuesto" name="btnBuscarclienteFK_Idimpuesto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idotro_impuesto">
					<table id="tblstrVisibleFK_Idotro_impuesto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Otro Impuesto</span>
						</td>
						<td align="center">
							<select id="FK_Idotro_impuesto-cmbid_otro_impuesto" name="FK_Idotro_impuesto-cmbid_otro_impuesto" title=" Otro Impuesto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclienteFK_Idotro_impuesto" name="btnBuscarclienteFK_Idotro_impuesto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idpais">
					<table id="tblstrVisibleFK_Idpais" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Pais</span>
						</td>
						<td align="center">
							<select id="FK_Idpais-cmbid_pais" name="FK_Idpais-cmbid_pais" title="Pais" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclienteFK_Idpais" name="btnBuscarclienteFK_Idpais" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarclienteFK_Idprovincia" name="btnBuscarclienteFK_Idprovincia" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idretencion">
					<table id="tblstrVisibleFK_Idretencion" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Retencion</span>
						</td>
						<td align="center">
							<select id="FK_Idretencion-cmbid_retencion" name="FK_Idretencion-cmbid_retencion" title=" Retencion" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclienteFK_Idretencion" name="btnBuscarclienteFK_Idretencion" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idretencion_fuente">
					<table id="tblstrVisibleFK_Idretencion_fuente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Retencion Fuente</span>
						</td>
						<td align="center">
							<select id="FK_Idretencion_fuente-cmbid_retencion_fuente" name="FK_Idretencion_fuente-cmbid_retencion_fuente" title=" Retencion Fuente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclienteFK_Idretencion_fuente" name="btnBuscarclienteFK_Idretencion_fuente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idretencion_ica">
					<table id="tblstrVisibleFK_Idretencion_ica" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Retencion Ica</span>
						</td>
						<td align="center">
							<select id="FK_Idretencion_ica-cmbid_retencion_ica" name="FK_Idretencion_ica-cmbid_retencion_ica" title=" Retencion Ica" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclienteFK_Idretencion_ica" name="btnBuscarclienteFK_Idretencion_ica" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<select id="FK_Idtermino_pago-cmbid_termino_pago_cliente" name="FK_Idtermino_pago-cmbid_termino_pago_cliente" title="Terminos Pago" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclienteFK_Idtermino_pago" name="btnBuscarclienteFK_Idtermino_pago" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_persona">
					<table id="tblstrVisibleFK_Idtipo_persona" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Tipo Persona</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_persona-cmbid_tipo_persona" name="FK_Idtipo_persona-cmbid_tipo_persona" title=" Tipo Persona" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclienteFK_Idtipo_persona" name="btnBuscarclienteFK_Idtipo_persona" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_precio">
					<table id="tblstrVisibleFK_Idtipo_precio" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Tipo Precio</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_precio-cmbid_tipo_precio" name="FK_Idtipo_precio-cmbid_tipo_precio" title=" Tipo Precio" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclienteFK_Idtipo_precio" name="btnBuscarclienteFK_Idtipo_precio" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idvendedor">
					<table id="tblstrVisibleFK_Idvendedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Vendedor</span>
						</td>
						<td align="center">
							<select id="FK_Idvendedor-cmbid_vendedor" name="FK_Idvendedor-cmbid_vendedor" title="Vendedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarclienteFK_Idvendedor" name="btnBuscarclienteFK_Idvendedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcliente" style="display:table-row">
					<td id="tdParamsBuscarcliente">
		<?php if(cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcliente">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscliente" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscliente"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscliente" name="ParamsBuscar-txtNumeroRegistroscliente" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncliente">
							<td id="tdGenerarReportecliente" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscliente" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscliente" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncliente" name="btnRecargarInformacioncliente" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacliente" name="btnImprimirPaginacliente" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*cliente_web::$STR_ES_BUSQUEDA=='false'  &&*/ cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycliente">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycliente" name="btnOrderBycliente" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelcliente" name="btnOrderByRelcliente" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(cliente_web::$STR_ES_RELACIONES=='false' && cliente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(cliente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdclienteConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscliente -->

							</td><!-- tdGenerarReportecliente -->
						</tr><!-- trRecargarInformacioncliente -->
					</table><!-- tblParamsBuscarNumeroRegistroscliente -->
				</div> <!-- divParamsBuscarcliente -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcliente -->
				</tr><!-- trParamsBuscarcliente -->
				</table> <!-- tblBusquedacliente -->
				</form> <!-- frmBusquedacliente -->
				

			</td> <!-- tdBusquedacliente -->
		</tr> <!-- trBusquedacliente/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(cliente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divclientePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblclientePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmclienteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnclienteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="cliente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnclienteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmclienteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblclientePopupAjaxWebPart -->
		</div> <!-- divclientePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trclienteTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacliente"></a>
		<img id="imgTablaParaDerechacliente" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacliente'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacliente" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacliente'"/>
		<a id="TablaDerechacliente"></a>
	</td>
</tr> <!-- trclienteTablaNavegacion/super -->
<?php } ?>

<tr id="trclienteTablaDatos">
	<td colspan="3" id="htmlTableCellcliente">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosclientesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trclienteTablaDatos/super -->
		
		
		<tr id="trclientePaginacion" style="display:table-row">
			<td id="tdclientePaginacion" align="left">
				<div id="divclientePaginacionAjaxWebPart">
				<form id="frmPaginacioncliente" name="frmPaginacioncliente">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncliente" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(cliente_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcliente" name="btnSeleccionarLoteFkcliente" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cliente_web::$STR_ES_RELACIONADO=='false' /*&& cliente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescliente" name="btnAnteriorescliente" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(cliente_web::$STR_ES_BUSQUEDA=='false' && cliente_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdclienteNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcliente" name="btnNuevoTablaPrepararcliente" title="NUEVO Cliente" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacliente" name="ParamsPaginar-txtNumeroNuevoTablacliente" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(cliente_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdclienteConEditarcliente">
							<label>
								<input id="ParamsBuscar-chbConEditarcliente" name="ParamsBuscar-chbConEditarcliente" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(cliente_web::$STR_ES_RELACIONADO=='false'/* && cliente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescliente" name="btnSiguientescliente" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncliente -->
				</form> <!-- frmPaginacioncliente -->
				<form id="frmNuevoPrepararcliente" name="frmNuevoPrepararcliente">
				<table id="tblNuevoPrepararcliente" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trclienteNuevo" height="10">
						<?php if(cliente_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdclienteNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcliente" name="btnNuevoPrepararcliente" title="NUEVO Cliente" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdclienteGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscliente" name="btnGuardarCambioscliente" title="GUARDAR Cliente" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cliente_web::$STR_ES_RELACIONADO=='false' && cliente_web::$STR_ES_RELACIONES=='false' && cliente_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdclienteDuplicar" align="center">
							<input type="button" id="btnDuplicarcliente" name="btnDuplicarcliente" title="DUPLICAR Cliente" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdclienteCopiar" align="center">
							<input type="button" id="btnCopiarcliente" name="btnCopiarcliente" title="COPIAR Cliente" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(cliente_web::$STR_ES_RELACIONADO=='false' && ((cliente_web::$STR_ES_RELACIONADO=='false' && cliente_web::$STR_ES_RELACIONES=='false') || cliente_web::$STR_ES_BUSQUEDA=='true'  || cliente_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdclienteCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacliente" name="btnCerrarPaginacliente" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcliente -->
				</form> <!-- frmNuevoPrepararcliente -->
				</div> <!-- divclientePaginacionAjaxWebPart -->
			</td> <!-- tdclientePaginacion -->
		</tr> <!-- trclientePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesclienteAjaxWebPart">
			<td id="tdAccionesRelacionesclienteAjaxWebPart">
				<div id="divAccionesRelacionesclienteAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesclienteAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesclienteAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycliente">
			<td id="tdOrderBycliente">
				<form id="frmOrderBycliente" name="frmOrderBycliente">
					<div id="divOrderByclienteAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelcliente" name="frmOrderByRelcliente">
					<div id="divOrderByRelclienteAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycliente -->
		</tr> <!-- trOrderBycliente/super -->
			
		
		
		
		
		
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
			
				import {cliente_webcontrol,cliente_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/cliente/js/webcontrol/cliente_webcontrol.js?random=1';
				
				cliente_webcontrol1.setcliente_constante(window.cliente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(cliente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

