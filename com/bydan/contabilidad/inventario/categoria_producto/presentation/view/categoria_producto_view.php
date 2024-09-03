<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\categoria_producto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Categoria Producto Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/categoria_producto/util/categoria_producto_carga.php');
	use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_carga;
	
	//include_once('com/bydan/contabilidad/inventario/categoria_producto/presentation/view/categoria_producto_web.php');
	//use com\bydan\contabilidad\inventario\categoria_producto\presentation\view\categoria_producto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	categoria_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	categoria_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$categoria_producto_web1= new categoria_producto_web();	
	$categoria_producto_web1->cargarDatosGenerales();
	
	//$moduloActual=$categoria_producto_web1->moduloActual;
	//$usuarioActual=$categoria_producto_web1->usuarioActual;
	//$sessionBase=$categoria_producto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$categoria_producto_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/categoria_producto/js/templating/categoria_producto_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/categoria_producto/js/templating/categoria_producto_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/categoria_producto/js/templating/categoria_producto_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/categoria_producto/js/templating/categoria_producto_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/categoria_producto/js/templating/categoria_producto_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			categoria_producto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					categoria_producto_web::$GET_POST=$_GET;
				} else {
					categoria_producto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			categoria_producto_web::$STR_NOMBRE_PAGINA = 'categoria_producto_view.php';
			categoria_producto_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			categoria_producto_web::$BIT_ES_PAGINA_FORM = 'false';
				
			categoria_producto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {categoria_producto_constante,categoria_producto_constante1} from './webroot/js/JavaScript/contabilidad/inventario/categoria_producto/js/util/categoria_producto_constante.js?random=1';
			import {categoria_producto_funcion,categoria_producto_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/categoria_producto/js/util/categoria_producto_funcion.js?random=1';
			
			let categoria_producto_constante2 = new categoria_producto_constante();
			
			categoria_producto_constante2.STR_NOMBRE_PAGINA="<?php echo(categoria_producto_web::$STR_NOMBRE_PAGINA); ?>";
			categoria_producto_constante2.STR_TYPE_ON_LOADcategoria_producto="<?php echo(categoria_producto_web::$STR_TYPE_ONLOAD); ?>";
			categoria_producto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(categoria_producto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			categoria_producto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(categoria_producto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			categoria_producto_constante2.STR_ACTION="<?php echo(categoria_producto_web::$STR_ACTION); ?>";
			categoria_producto_constante2.STR_ES_POPUP="<?php echo(categoria_producto_web::$STR_ES_POPUP); ?>";
			categoria_producto_constante2.STR_ES_BUSQUEDA="<?php echo(categoria_producto_web::$STR_ES_BUSQUEDA); ?>";
			categoria_producto_constante2.STR_FUNCION_JS="<?php echo(categoria_producto_web::$STR_FUNCION_JS); ?>";
			categoria_producto_constante2.BIG_ID_ACTUAL="<?php echo(categoria_producto_web::$BIG_ID_ACTUAL); ?>";
			categoria_producto_constante2.BIG_ID_OPCION="<?php echo(categoria_producto_web::$BIG_ID_OPCION); ?>";
			categoria_producto_constante2.STR_OBJETO_JS="<?php echo(categoria_producto_web::$STR_OBJETO_JS); ?>";
			categoria_producto_constante2.STR_ES_RELACIONES="<?php echo(categoria_producto_web::$STR_ES_RELACIONES); ?>";
			categoria_producto_constante2.STR_ES_RELACIONADO="<?php echo(categoria_producto_web::$STR_ES_RELACIONADO); ?>";
			categoria_producto_constante2.STR_ES_SUB_PAGINA="<?php echo(categoria_producto_web::$STR_ES_SUB_PAGINA); ?>";
			categoria_producto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(categoria_producto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			categoria_producto_constante2.BIT_ES_PAGINA_FORM=<?php echo(categoria_producto_web::$BIT_ES_PAGINA_FORM); ?>;
			categoria_producto_constante2.STR_SUFIJO="<?php echo(categoria_producto_web::$STR_SUF); ?>";//categoria_producto
			categoria_producto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(categoria_producto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//categoria_producto
			
			categoria_producto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(categoria_producto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			categoria_producto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($categoria_producto_web1->moduloActual->getnombre()); ?>";
			categoria_producto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(categoria_producto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			categoria_producto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*categoria_producto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			categoria_producto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.categoria_producto_constante2 = categoria_producto_constante2;
			
		</script>
		
		<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.categoria_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.categoria_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="categoria_productoActual" ></a>
	
	<div id="divResumencategoria_productoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(categoria_producto_web::$STR_ES_BUSQUEDA=='false' && categoria_producto_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(categoria_producto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false' && categoria_producto_web::$STR_ES_POPUP=='false' && categoria_producto_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcategoria_productoNuevoToolBar">
										<img id="imgNuevoToolBarcategoria_producto" name="imgNuevoToolBarcategoria_producto" title="Nuevo Categoria Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(categoria_producto_web::$STR_ES_BUSQUEDA=='false' && categoria_producto_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcategoria_productoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcategoria_producto" name="imgNuevoGuardarCambiosToolBarcategoria_producto" title="Nuevo TABLA Categoria Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(categoria_producto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcategoria_productoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcategoria_producto" name="imgGuardarCambiosToolBarcategoria_producto" title="Guardar Categoria Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false' && categoria_producto_web::$STR_ES_RELACIONES=='false' && categoria_producto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcategoria_productoCopiarToolBar">
										<img id="imgCopiarToolBarcategoria_producto" name="imgCopiarToolBarcategoria_producto" title="Copiar Categoria Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcategoria_productoDuplicarToolBar">
										<img id="imgDuplicarToolBarcategoria_producto" name="imgDuplicarToolBarcategoria_producto" title="Duplicar Categoria Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcategoria_productoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcategoria_producto" name="imgRecargarInformacionToolBarcategoria_producto" title="Recargar Categoria Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcategoria_productoAnterioresToolBar">
										<img id="imgAnterioresToolBarcategoria_producto" name="imgAnterioresToolBarcategoria_producto" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcategoria_productoSiguientesToolBar">
										<img id="imgSiguientesToolBarcategoria_producto" name="imgSiguientesToolBarcategoria_producto" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcategoria_productoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcategoria_producto" name="imgAbrirOrderByToolBarcategoria_producto" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((categoria_producto_web::$STR_ES_RELACIONADO=='false' && categoria_producto_web::$STR_ES_RELACIONES=='false') || categoria_producto_web::$STR_ES_BUSQUEDA=='true'  || categoria_producto_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcategoria_productoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcategoria_producto" name="imgCerrarPaginaToolBarcategoria_producto" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcategoria_productoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacategoria_producto" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacategoria_producto',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcategoria_productoCabeceraBusquedas/super -->

		<tr id="trBusquedacategoria_producto" class="busqueda" style="display:table-row">
			<td id="tdBusquedacategoria_producto" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacategoria_producto" name="frmBusquedacategoria_producto">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacategoria_producto" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcategoria_productoBusquedas" class="busqueda" style="display:none"><td>
				<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcategoria_producto" style="display:table-row">
					<td id="tdParamsBuscarcategoria_producto">
		<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcategoria_producto">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscategoria_producto" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscategoria_producto"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscategoria_producto" name="ParamsBuscar-txtNumeroRegistroscategoria_producto" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncategoria_producto">
							<td id="tdGenerarReportecategoria_producto" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscategoria_producto" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscategoria_producto" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncategoria_producto" name="btnRecargarInformacioncategoria_producto" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacategoria_producto" name="btnImprimirPaginacategoria_producto" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*categoria_producto_web::$STR_ES_BUSQUEDA=='false'  &&*/ categoria_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycategoria_producto">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycategoria_producto" name="btnOrderBycategoria_producto" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelcategoria_producto" name="btnOrderByRelcategoria_producto" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(categoria_producto_web::$STR_ES_RELACIONES=='false' && categoria_producto_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(categoria_producto_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcategoria_productoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscategoria_producto -->

							</td><!-- tdGenerarReportecategoria_producto -->
						</tr><!-- trRecargarInformacioncategoria_producto -->
					</table><!-- tblParamsBuscarNumeroRegistroscategoria_producto -->
				</div> <!-- divParamsBuscarcategoria_producto -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcategoria_producto -->
				</tr><!-- trParamsBuscarcategoria_producto -->
				</table> <!-- tblBusquedacategoria_producto -->
				</form> <!-- frmBusquedacategoria_producto -->
				

			</td> <!-- tdBusquedacategoria_producto -->
		</tr> <!-- trBusquedacategoria_producto/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcategoria_productoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcategoria_productoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcategoria_productoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncategoria_productoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="categoria_producto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncategoria_productoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcategoria_productoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcategoria_productoPopupAjaxWebPart -->
		</div> <!-- divcategoria_productoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcategoria_productoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacategoria_producto"></a>
		<img id="imgTablaParaDerechacategoria_producto" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacategoria_producto'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacategoria_producto" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacategoria_producto'"/>
		<a id="TablaDerechacategoria_producto"></a>
	</td>
</tr> <!-- trcategoria_productoTablaNavegacion/super -->
<?php } ?>

<tr id="trcategoria_productoTablaDatos">
	<td colspan="3" id="htmlTableCellcategoria_producto">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscategoria_productosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcategoria_productoTablaDatos/super -->
		
		
		<tr id="trcategoria_productoPaginacion" style="display:table-row">
			<td id="tdcategoria_productoPaginacion" align="center">
				<div id="divcategoria_productoPaginacionAjaxWebPart">
				<form id="frmPaginacioncategoria_producto" name="frmPaginacioncategoria_producto">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncategoria_producto" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(categoria_producto_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcategoria_producto" name="btnSeleccionarLoteFkcategoria_producto" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false' /*&& categoria_producto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescategoria_producto" name="btnAnteriorescategoria_producto" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(categoria_producto_web::$STR_ES_BUSQUEDA=='false' && categoria_producto_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcategoria_productoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcategoria_producto" name="btnNuevoTablaPrepararcategoria_producto" title="NUEVO Categoria Producto" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacategoria_producto" name="ParamsPaginar-txtNumeroNuevoTablacategoria_producto" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcategoria_productoConEditarcategoria_producto">
							<label>
								<input id="ParamsBuscar-chbConEditarcategoria_producto" name="ParamsBuscar-chbConEditarcategoria_producto" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false'/* && categoria_producto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescategoria_producto" name="btnSiguientescategoria_producto" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncategoria_producto -->
				</form> <!-- frmPaginacioncategoria_producto -->
				<form id="frmNuevoPrepararcategoria_producto" name="frmNuevoPrepararcategoria_producto">
				<table id="tblNuevoPrepararcategoria_producto" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trcategoria_productoNuevo" height="10">
						<?php if(categoria_producto_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcategoria_productoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcategoria_producto" name="btnNuevoPrepararcategoria_producto" title="NUEVO Categoria Producto" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcategoria_productoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscategoria_producto" name="btnGuardarCambioscategoria_producto" title="GUARDAR Categoria Producto" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false' && categoria_producto_web::$STR_ES_RELACIONES=='false' && categoria_producto_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcategoria_productoDuplicar" align="center">
							<input type="button" id="btnDuplicarcategoria_producto" name="btnDuplicarcategoria_producto" title="DUPLICAR Categoria Producto" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcategoria_productoCopiar" align="center">
							<input type="button" id="btnCopiarcategoria_producto" name="btnCopiarcategoria_producto" title="COPIAR Categoria Producto" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false' && ((categoria_producto_web::$STR_ES_RELACIONADO=='false' && categoria_producto_web::$STR_ES_RELACIONES=='false') || categoria_producto_web::$STR_ES_BUSQUEDA=='true'  || categoria_producto_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcategoria_productoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacategoria_producto" name="btnCerrarPaginacategoria_producto" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcategoria_producto -->
				</form> <!-- frmNuevoPrepararcategoria_producto -->
				</div> <!-- divcategoria_productoPaginacionAjaxWebPart -->
			</td> <!-- tdcategoria_productoPaginacion -->
		</tr> <!-- trcategoria_productoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescategoria_productoAjaxWebPart">
			<td id="tdAccionesRelacionescategoria_productoAjaxWebPart">
				<div id="divAccionesRelacionescategoria_productoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescategoria_productoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescategoria_productoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycategoria_producto">
			<td id="tdOrderBycategoria_producto">
				<form id="frmOrderBycategoria_producto" name="frmOrderBycategoria_producto">
					<div id="divOrderBycategoria_productoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelcategoria_producto" name="frmOrderByRelcategoria_producto">
					<div id="divOrderByRelcategoria_productoAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycategoria_producto -->
		</tr> <!-- trOrderBycategoria_producto/super -->
			
		
		
		
		
		
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
			
				import {categoria_producto_webcontrol,categoria_producto_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/categoria_producto/js/webcontrol/categoria_producto_webcontrol.js?random=1';
				
				categoria_producto_webcontrol1.setcategoria_producto_constante(window.categoria_producto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(categoria_producto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

