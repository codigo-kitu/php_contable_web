<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\factura_modelo\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Facturas Modelos Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/factura_modelo/util/factura_modelo_carga.php');
	use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/factura_modelo/presentation/view/factura_modelo_web.php');
	//use com\bydan\contabilidad\facturacion\factura_modelo\presentation\view\factura_modelo_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	factura_modelo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	factura_modelo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$factura_modelo_web1= new factura_modelo_web();	
	$factura_modelo_web1->cargarDatosGenerales();
	
	//$moduloActual=$factura_modelo_web1->moduloActual;
	//$usuarioActual=$factura_modelo_web1->usuarioActual;
	//$sessionBase=$factura_modelo_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$factura_modelo_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura_modelo/js/templating/factura_modelo_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura_modelo/js/templating/factura_modelo_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura_modelo/js/templating/factura_modelo_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/factura_modelo/js/templating/factura_modelo_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			factura_modelo_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					factura_modelo_web::$GET_POST=$_GET;
				} else {
					factura_modelo_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			factura_modelo_web::$STR_NOMBRE_PAGINA = 'factura_modelo_view.php';
			factura_modelo_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			factura_modelo_web::$BIT_ES_PAGINA_FORM = 'false';
				
			factura_modelo_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {factura_modelo_constante,factura_modelo_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_modelo/js/util/factura_modelo_constante.js?random=1';
			import {factura_modelo_funcion,factura_modelo_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_modelo/js/util/factura_modelo_funcion.js?random=1';
			
			let factura_modelo_constante2 = new factura_modelo_constante();
			
			factura_modelo_constante2.STR_NOMBRE_PAGINA="<?php echo(factura_modelo_web::$STR_NOMBRE_PAGINA); ?>";
			factura_modelo_constante2.STR_TYPE_ON_LOADfactura_modelo="<?php echo(factura_modelo_web::$STR_TYPE_ONLOAD); ?>";
			factura_modelo_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(factura_modelo_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			factura_modelo_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(factura_modelo_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			factura_modelo_constante2.STR_ACTION="<?php echo(factura_modelo_web::$STR_ACTION); ?>";
			factura_modelo_constante2.STR_ES_POPUP="<?php echo(factura_modelo_web::$STR_ES_POPUP); ?>";
			factura_modelo_constante2.STR_ES_BUSQUEDA="<?php echo(factura_modelo_web::$STR_ES_BUSQUEDA); ?>";
			factura_modelo_constante2.STR_FUNCION_JS="<?php echo(factura_modelo_web::$STR_FUNCION_JS); ?>";
			factura_modelo_constante2.BIG_ID_ACTUAL="<?php echo(factura_modelo_web::$BIG_ID_ACTUAL); ?>";
			factura_modelo_constante2.BIG_ID_OPCION="<?php echo(factura_modelo_web::$BIG_ID_OPCION); ?>";
			factura_modelo_constante2.STR_OBJETO_JS="<?php echo(factura_modelo_web::$STR_OBJETO_JS); ?>";
			factura_modelo_constante2.STR_ES_RELACIONES="<?php echo(factura_modelo_web::$STR_ES_RELACIONES); ?>";
			factura_modelo_constante2.STR_ES_RELACIONADO="<?php echo(factura_modelo_web::$STR_ES_RELACIONADO); ?>";
			factura_modelo_constante2.STR_ES_SUB_PAGINA="<?php echo(factura_modelo_web::$STR_ES_SUB_PAGINA); ?>";
			factura_modelo_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(factura_modelo_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			factura_modelo_constante2.BIT_ES_PAGINA_FORM=<?php echo(factura_modelo_web::$BIT_ES_PAGINA_FORM); ?>;
			factura_modelo_constante2.STR_SUFIJO="<?php echo(factura_modelo_web::$STR_SUF); ?>";//factura_modelo
			factura_modelo_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(factura_modelo_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//factura_modelo
			
			factura_modelo_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(factura_modelo_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			factura_modelo_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($factura_modelo_web1->moduloActual->getnombre()); ?>";
			factura_modelo_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(factura_modelo_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			factura_modelo_constante2.BIT_ES_LOAD_NORMAL=true;
			/*factura_modelo_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			factura_modelo_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.factura_modelo_constante2 = factura_modelo_constante2;
			
		</script>
		
		<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.factura_modelo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.factura_modelo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="factura_modeloActual" ></a>
	
	<div id="divResumenfactura_modeloActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(factura_modelo_web::$STR_ES_BUSQUEDA=='false' && factura_modelo_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(factura_modelo_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false' && factura_modelo_web::$STR_ES_POPUP=='false' && factura_modelo_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdfactura_modeloNuevoToolBar">
										<img id="imgNuevoToolBarfactura_modelo" name="imgNuevoToolBarfactura_modelo" title="Nuevo Facturas Modelos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(factura_modelo_web::$STR_ES_BUSQUEDA=='false' && factura_modelo_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdfactura_modeloNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarfactura_modelo" name="imgNuevoGuardarCambiosToolBarfactura_modelo" title="Nuevo TABLA Facturas Modelos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(factura_modelo_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdfactura_modeloGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarfactura_modelo" name="imgGuardarCambiosToolBarfactura_modelo" title="Guardar Facturas Modelos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false' && factura_modelo_web::$STR_ES_RELACIONES=='false' && factura_modelo_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdfactura_modeloCopiarToolBar">
										<img id="imgCopiarToolBarfactura_modelo" name="imgCopiarToolBarfactura_modelo" title="Copiar Facturas Modelos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdfactura_modeloDuplicarToolBar">
										<img id="imgDuplicarToolBarfactura_modelo" name="imgDuplicarToolBarfactura_modelo" title="Duplicar Facturas Modelos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdfactura_modeloRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarfactura_modelo" name="imgRecargarInformacionToolBarfactura_modelo" title="Recargar Facturas Modelos" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdfactura_modeloAnterioresToolBar">
										<img id="imgAnterioresToolBarfactura_modelo" name="imgAnterioresToolBarfactura_modelo" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdfactura_modeloSiguientesToolBar">
										<img id="imgSiguientesToolBarfactura_modelo" name="imgSiguientesToolBarfactura_modelo" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdfactura_modeloAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarfactura_modelo" name="imgAbrirOrderByToolBarfactura_modelo" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((factura_modelo_web::$STR_ES_RELACIONADO=='false' && factura_modelo_web::$STR_ES_RELACIONES=='false') || factura_modelo_web::$STR_ES_BUSQUEDA=='true'  || factura_modelo_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdfactura_modeloCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarfactura_modelo" name="imgCerrarPaginaToolBarfactura_modelo" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trfactura_modeloCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedafactura_modelo" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedafactura_modelo',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trfactura_modeloCabeceraBusquedas/super -->

		<tr id="trBusquedafactura_modelo" class="busqueda" style="display:table-row">
			<td id="tdBusquedafactura_modelo" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedafactura_modelo" name="frmBusquedafactura_modelo">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedafactura_modelo" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trfactura_modeloBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcliente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcliente"> Por Cliente</a></li>
						<li id="listrVisibleFK_Idfactura_lote" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idfactura_lote"> Por Factura Lote</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcliente">
					<table id="tblstrVisibleFK_Idcliente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cliente</span>
						</td>
						<td align="center">
							<select id="FK_Idcliente-cmbid_cliente" name="FK_Idcliente-cmbid_cliente" title="Cliente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarfactura_modeloFK_Idcliente" name="btnBuscarfactura_modeloFK_Idcliente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idfactura_lote">
					<table id="tblstrVisibleFK_Idfactura_lote" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Factura Lote</span>
						</td>
						<td align="center">
							<select id="FK_Idfactura_lote-cmbid_factura_lote" name="FK_Idfactura_lote-cmbid_factura_lote" title="Factura Lote" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarfactura_modeloFK_Idfactura_lote" name="btnBuscarfactura_modeloFK_Idfactura_lote" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarfactura_modelo" style="display:table-row">
					<td id="tdParamsBuscarfactura_modelo">
		<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarfactura_modelo">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosfactura_modelo" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosfactura_modelo"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosfactura_modelo" name="ParamsBuscar-txtNumeroRegistrosfactura_modelo" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionfactura_modelo">
							<td id="tdGenerarReportefactura_modelo" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosfactura_modelo" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosfactura_modelo" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionfactura_modelo" name="btnRecargarInformacionfactura_modelo" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginafactura_modelo" name="btnImprimirPaginafactura_modelo" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*factura_modelo_web::$STR_ES_BUSQUEDA=='false'  &&*/ factura_modelo_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByfactura_modelo">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByfactura_modelo" name="btnOrderByfactura_modelo" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(factura_modelo_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdfactura_modeloConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosfactura_modelo -->

							</td><!-- tdGenerarReportefactura_modelo -->
						</tr><!-- trRecargarInformacionfactura_modelo -->
					</table><!-- tblParamsBuscarNumeroRegistrosfactura_modelo -->
				</div> <!-- divParamsBuscarfactura_modelo -->
		<?php } ?>
				</td> <!-- tdParamsBuscarfactura_modelo -->
				</tr><!-- trParamsBuscarfactura_modelo -->
				</table> <!-- tblBusquedafactura_modelo -->
				</form> <!-- frmBusquedafactura_modelo -->
				

			</td> <!-- tdBusquedafactura_modelo -->
		</tr> <!-- trBusquedafactura_modelo/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divfactura_modeloPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblfactura_modeloPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmfactura_modeloAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnfactura_modeloAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="factura_modelo_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnfactura_modeloAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmfactura_modeloAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblfactura_modeloPopupAjaxWebPart -->
		</div> <!-- divfactura_modeloPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trfactura_modeloTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdafactura_modelo"></a>
		<img id="imgTablaParaDerechafactura_modelo" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechafactura_modelo'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdafactura_modelo" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdafactura_modelo'"/>
		<a id="TablaDerechafactura_modelo"></a>
	</td>
</tr> <!-- trfactura_modeloTablaNavegacion/super -->
<?php } ?>

<tr id="trfactura_modeloTablaDatos">
	<td colspan="3" id="htmlTableCellfactura_modelo">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosfactura_modelosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trfactura_modeloTablaDatos/super -->
		
		
		<tr id="trfactura_modeloPaginacion" style="display:table-row">
			<td id="tdfactura_modeloPaginacion" align="center">
				<div id="divfactura_modeloPaginacionAjaxWebPart">
				<form id="frmPaginacionfactura_modelo" name="frmPaginacionfactura_modelo">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionfactura_modelo" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(factura_modelo_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkfactura_modelo" name="btnSeleccionarLoteFkfactura_modelo" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false' /*&& factura_modelo_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresfactura_modelo" name="btnAnterioresfactura_modelo" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(factura_modelo_web::$STR_ES_BUSQUEDA=='false' && factura_modelo_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdfactura_modeloNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararfactura_modelo" name="btnNuevoTablaPrepararfactura_modelo" title="NUEVO Facturas Modelos" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablafactura_modelo" name="ParamsPaginar-txtNumeroNuevoTablafactura_modelo" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdfactura_modeloConEditarfactura_modelo">
							<label>
								<input id="ParamsBuscar-chbConEditarfactura_modelo" name="ParamsBuscar-chbConEditarfactura_modelo" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false'/* && factura_modelo_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesfactura_modelo" name="btnSiguientesfactura_modelo" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionfactura_modelo -->
				</form> <!-- frmPaginacionfactura_modelo -->
				<form id="frmNuevoPrepararfactura_modelo" name="frmNuevoPrepararfactura_modelo">
				<table id="tblNuevoPrepararfactura_modelo" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trfactura_modeloNuevo" height="10">
						<?php if(factura_modelo_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdfactura_modeloNuevo" align="center">
							<input type="button" id="btnNuevoPrepararfactura_modelo" name="btnNuevoPrepararfactura_modelo" title="NUEVO Facturas Modelos" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdfactura_modeloGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosfactura_modelo" name="btnGuardarCambiosfactura_modelo" title="GUARDAR Facturas Modelos" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false' && factura_modelo_web::$STR_ES_RELACIONES=='false' && factura_modelo_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdfactura_modeloDuplicar" align="center">
							<input type="button" id="btnDuplicarfactura_modelo" name="btnDuplicarfactura_modelo" title="DUPLICAR Facturas Modelos" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdfactura_modeloCopiar" align="center">
							<input type="button" id="btnCopiarfactura_modelo" name="btnCopiarfactura_modelo" title="COPIAR Facturas Modelos" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false' && ((factura_modelo_web::$STR_ES_RELACIONADO=='false' && factura_modelo_web::$STR_ES_RELACIONES=='false') || factura_modelo_web::$STR_ES_BUSQUEDA=='true'  || factura_modelo_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdfactura_modeloCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginafactura_modelo" name="btnCerrarPaginafactura_modelo" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararfactura_modelo -->
				</form> <!-- frmNuevoPrepararfactura_modelo -->
				</div> <!-- divfactura_modeloPaginacionAjaxWebPart -->
			</td> <!-- tdfactura_modeloPaginacion -->
		</tr> <!-- trfactura_modeloPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesfactura_modeloAjaxWebPart">
			<td id="tdAccionesRelacionesfactura_modeloAjaxWebPart">
				<div id="divAccionesRelacionesfactura_modeloAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesfactura_modeloAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesfactura_modeloAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByfactura_modelo">
			<td id="tdOrderByfactura_modelo">
				<form id="frmOrderByfactura_modelo" name="frmOrderByfactura_modelo">
					<div id="divOrderByfactura_modeloAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByfactura_modelo -->
		</tr> <!-- trOrderByfactura_modelo/super -->
			
		
		
		
		
		
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
			
				import {factura_modelo_webcontrol,factura_modelo_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/factura_modelo/js/webcontrol/factura_modelo_webcontrol.js?random=1';
				
				factura_modelo_webcontrol1.setfactura_modelo_constante(window.factura_modelo_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(factura_modelo_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

