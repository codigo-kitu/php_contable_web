<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\costo_producto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Costo Producto Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/costo_producto/util/costo_producto_carga.php');
	use com\bydan\contabilidad\inventario\costo_producto\util\costo_producto_carga;
	
	//include_once('com/bydan/contabilidad/inventario/costo_producto/presentation/view/costo_producto_web.php');
	//use com\bydan\contabilidad\inventario\costo_producto\presentation\view\costo_producto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	costo_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	costo_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$costo_producto_web1= new costo_producto_web();	
	$costo_producto_web1->cargarDatosGenerales();
	
	//$moduloActual=$costo_producto_web1->moduloActual;
	//$usuarioActual=$costo_producto_web1->usuarioActual;
	//$sessionBase=$costo_producto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$costo_producto_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/costo_producto/js/templating/costo_producto_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/costo_producto/js/templating/costo_producto_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/costo_producto/js/templating/costo_producto_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/costo_producto/js/templating/costo_producto_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			costo_producto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					costo_producto_web::$GET_POST=$_GET;
				} else {
					costo_producto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			costo_producto_web::$STR_NOMBRE_PAGINA = 'costo_producto_view.php';
			costo_producto_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			costo_producto_web::$BIT_ES_PAGINA_FORM = 'false';
				
			costo_producto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {costo_producto_constante,costo_producto_constante1} from './webroot/js/JavaScript/contabilidad/inventario/costo_producto/js/util/costo_producto_constante.js?random=1';
			import {costo_producto_funcion,costo_producto_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/costo_producto/js/util/costo_producto_funcion.js?random=1';
			
			let costo_producto_constante2 = new costo_producto_constante();
			
			costo_producto_constante2.STR_NOMBRE_PAGINA="<?php echo(costo_producto_web::$STR_NOMBRE_PAGINA); ?>";
			costo_producto_constante2.STR_TYPE_ON_LOADcosto_producto="<?php echo(costo_producto_web::$STR_TYPE_ONLOAD); ?>";
			costo_producto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(costo_producto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			costo_producto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(costo_producto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			costo_producto_constante2.STR_ACTION="<?php echo(costo_producto_web::$STR_ACTION); ?>";
			costo_producto_constante2.STR_ES_POPUP="<?php echo(costo_producto_web::$STR_ES_POPUP); ?>";
			costo_producto_constante2.STR_ES_BUSQUEDA="<?php echo(costo_producto_web::$STR_ES_BUSQUEDA); ?>";
			costo_producto_constante2.STR_FUNCION_JS="<?php echo(costo_producto_web::$STR_FUNCION_JS); ?>";
			costo_producto_constante2.BIG_ID_ACTUAL="<?php echo(costo_producto_web::$BIG_ID_ACTUAL); ?>";
			costo_producto_constante2.BIG_ID_OPCION="<?php echo(costo_producto_web::$BIG_ID_OPCION); ?>";
			costo_producto_constante2.STR_OBJETO_JS="<?php echo(costo_producto_web::$STR_OBJETO_JS); ?>";
			costo_producto_constante2.STR_ES_RELACIONES="<?php echo(costo_producto_web::$STR_ES_RELACIONES); ?>";
			costo_producto_constante2.STR_ES_RELACIONADO="<?php echo(costo_producto_web::$STR_ES_RELACIONADO); ?>";
			costo_producto_constante2.STR_ES_SUB_PAGINA="<?php echo(costo_producto_web::$STR_ES_SUB_PAGINA); ?>";
			costo_producto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(costo_producto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			costo_producto_constante2.BIT_ES_PAGINA_FORM=<?php echo(costo_producto_web::$BIT_ES_PAGINA_FORM); ?>;
			costo_producto_constante2.STR_SUFIJO="<?php echo(costo_producto_web::$STR_SUF); ?>";//costo_producto
			costo_producto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(costo_producto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//costo_producto
			
			costo_producto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(costo_producto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			costo_producto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($costo_producto_web1->moduloActual->getnombre()); ?>";
			costo_producto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(costo_producto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			costo_producto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*costo_producto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			costo_producto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.costo_producto_constante2 = costo_producto_constante2;
			
		</script>
		
		<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.costo_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.costo_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="costo_productoActual" ></a>
	
	<div id="divResumencosto_productoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(costo_producto_web::$STR_ES_BUSQUEDA=='false' && costo_producto_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(costo_producto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false' && costo_producto_web::$STR_ES_POPUP=='false' && costo_producto_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcosto_productoNuevoToolBar">
										<img id="imgNuevoToolBarcosto_producto" name="imgNuevoToolBarcosto_producto" title="Nuevo Costo Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(costo_producto_web::$STR_ES_BUSQUEDA=='false' && costo_producto_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcosto_productoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcosto_producto" name="imgNuevoGuardarCambiosToolBarcosto_producto" title="Nuevo TABLA Costo Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(costo_producto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcosto_productoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcosto_producto" name="imgGuardarCambiosToolBarcosto_producto" title="Guardar Costo Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false' && costo_producto_web::$STR_ES_RELACIONES=='false' && costo_producto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcosto_productoCopiarToolBar">
										<img id="imgCopiarToolBarcosto_producto" name="imgCopiarToolBarcosto_producto" title="Copiar Costo Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcosto_productoDuplicarToolBar">
										<img id="imgDuplicarToolBarcosto_producto" name="imgDuplicarToolBarcosto_producto" title="Duplicar Costo Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcosto_productoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcosto_producto" name="imgRecargarInformacionToolBarcosto_producto" title="Recargar Costo Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcosto_productoAnterioresToolBar">
										<img id="imgAnterioresToolBarcosto_producto" name="imgAnterioresToolBarcosto_producto" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcosto_productoSiguientesToolBar">
										<img id="imgSiguientesToolBarcosto_producto" name="imgSiguientesToolBarcosto_producto" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcosto_productoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcosto_producto" name="imgAbrirOrderByToolBarcosto_producto" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((costo_producto_web::$STR_ES_RELACIONADO=='false' && costo_producto_web::$STR_ES_RELACIONES=='false') || costo_producto_web::$STR_ES_BUSQUEDA=='true'  || costo_producto_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcosto_productoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcosto_producto" name="imgCerrarPaginaToolBarcosto_producto" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcosto_productoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacosto_producto" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacosto_producto',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcosto_productoCabeceraBusquedas/super -->

		<tr id="trBusquedacosto_producto" class="busqueda" style="display:table-row">
			<td id="tdBusquedacosto_producto" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacosto_producto" name="frmBusquedacosto_producto">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacosto_producto" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcosto_productoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idproducto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproducto"> Por  Producto</a></li>
						<li id="listrVisibleFK_Idtabla" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtabla"> Por Tabla</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idproducto">
					<table id="tblstrVisibleFK_Idproducto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Producto</span>
						</td>
						<td align="center">
							<select id="FK_Idproducto-cmbid_producto" name="FK_Idproducto-cmbid_producto" title=" Producto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcosto_productoFK_Idproducto" name="btnBuscarcosto_productoFK_Idproducto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtabla">
					<table id="tblstrVisibleFK_Idtabla" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Tabla</span>
						</td>
						<td align="center">
							<select id="FK_Idtabla-cmbid_tabla" name="FK_Idtabla-cmbid_tabla" title="Tabla" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcosto_productoFK_Idtabla" name="btnBuscarcosto_productoFK_Idtabla" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcosto_producto" style="display:table-row">
					<td id="tdParamsBuscarcosto_producto">
		<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcosto_producto">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscosto_producto" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscosto_producto"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscosto_producto" name="ParamsBuscar-txtNumeroRegistroscosto_producto" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncosto_producto">
							<td id="tdGenerarReportecosto_producto" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscosto_producto" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscosto_producto" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncosto_producto" name="btnRecargarInformacioncosto_producto" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacosto_producto" name="btnImprimirPaginacosto_producto" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*costo_producto_web::$STR_ES_BUSQUEDA=='false'  &&*/ costo_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycosto_producto">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycosto_producto" name="btnOrderBycosto_producto" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(costo_producto_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcosto_productoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscosto_producto -->

							</td><!-- tdGenerarReportecosto_producto -->
						</tr><!-- trRecargarInformacioncosto_producto -->
					</table><!-- tblParamsBuscarNumeroRegistroscosto_producto -->
				</div> <!-- divParamsBuscarcosto_producto -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcosto_producto -->
				</tr><!-- trParamsBuscarcosto_producto -->
				</table> <!-- tblBusquedacosto_producto -->
				</form> <!-- frmBusquedacosto_producto -->
				

			</td> <!-- tdBusquedacosto_producto -->
		</tr> <!-- trBusquedacosto_producto/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcosto_productoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcosto_productoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcosto_productoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncosto_productoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="costo_producto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncosto_productoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcosto_productoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcosto_productoPopupAjaxWebPart -->
		</div> <!-- divcosto_productoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcosto_productoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacosto_producto"></a>
		<img id="imgTablaParaDerechacosto_producto" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacosto_producto'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacosto_producto" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacosto_producto'"/>
		<a id="TablaDerechacosto_producto"></a>
	</td>
</tr> <!-- trcosto_productoTablaNavegacion/super -->
<?php } ?>

<tr id="trcosto_productoTablaDatos">
	<td colspan="3" id="htmlTableCellcosto_producto">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscosto_productosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcosto_productoTablaDatos/super -->
		
		
		<tr id="trcosto_productoPaginacion" style="display:table-row">
			<td id="tdcosto_productoPaginacion" align="left">
				<div id="divcosto_productoPaginacionAjaxWebPart">
				<form id="frmPaginacioncosto_producto" name="frmPaginacioncosto_producto">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncosto_producto" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(costo_producto_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcosto_producto" name="btnSeleccionarLoteFkcosto_producto" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false' /*&& costo_producto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescosto_producto" name="btnAnteriorescosto_producto" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(costo_producto_web::$STR_ES_BUSQUEDA=='false' && costo_producto_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcosto_productoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcosto_producto" name="btnNuevoTablaPrepararcosto_producto" title="NUEVO Costo Producto" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacosto_producto" name="ParamsPaginar-txtNumeroNuevoTablacosto_producto" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(costo_producto_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcosto_productoConEditarcosto_producto">
							<label>
								<input id="ParamsBuscar-chbConEditarcosto_producto" name="ParamsBuscar-chbConEditarcosto_producto" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false'/* && costo_producto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescosto_producto" name="btnSiguientescosto_producto" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncosto_producto -->
				</form> <!-- frmPaginacioncosto_producto -->
				<form id="frmNuevoPrepararcosto_producto" name="frmNuevoPrepararcosto_producto">
				<table id="tblNuevoPrepararcosto_producto" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trcosto_productoNuevo" height="10">
						<?php if(costo_producto_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcosto_productoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcosto_producto" name="btnNuevoPrepararcosto_producto" title="NUEVO Costo Producto" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcosto_productoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscosto_producto" name="btnGuardarCambioscosto_producto" title="GUARDAR Costo Producto" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false' && costo_producto_web::$STR_ES_RELACIONES=='false' && costo_producto_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcosto_productoDuplicar" align="center">
							<input type="button" id="btnDuplicarcosto_producto" name="btnDuplicarcosto_producto" title="DUPLICAR Costo Producto" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcosto_productoCopiar" align="center">
							<input type="button" id="btnCopiarcosto_producto" name="btnCopiarcosto_producto" title="COPIAR Costo Producto" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false' && ((costo_producto_web::$STR_ES_RELACIONADO=='false' && costo_producto_web::$STR_ES_RELACIONES=='false') || costo_producto_web::$STR_ES_BUSQUEDA=='true'  || costo_producto_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcosto_productoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacosto_producto" name="btnCerrarPaginacosto_producto" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcosto_producto -->
				</form> <!-- frmNuevoPrepararcosto_producto -->
				</div> <!-- divcosto_productoPaginacionAjaxWebPart -->
			</td> <!-- tdcosto_productoPaginacion -->
		</tr> <!-- trcosto_productoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescosto_productoAjaxWebPart">
			<td id="tdAccionesRelacionescosto_productoAjaxWebPart">
				<div id="divAccionesRelacionescosto_productoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescosto_productoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescosto_productoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycosto_producto">
			<td id="tdOrderBycosto_producto">
				<form id="frmOrderBycosto_producto" name="frmOrderBycosto_producto">
					<div id="divOrderBycosto_productoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycosto_producto -->
		</tr> <!-- trOrderBycosto_producto/super -->
			
		
		
		
		
		
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
			
				import {costo_producto_webcontrol,costo_producto_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/costo_producto/js/webcontrol/costo_producto_webcontrol.js?random=1';
				
				costo_producto_webcontrol1.setcosto_producto_constante(window.costo_producto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(costo_producto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

