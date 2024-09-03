<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\precio_producto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Precio Producto Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/precio_producto/util/precio_producto_carga.php');
	use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_carga;
	
	//include_once('com/bydan/contabilidad/inventario/precio_producto/presentation/view/precio_producto_web.php');
	//use com\bydan\contabilidad\inventario\precio_producto\presentation\view\precio_producto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	precio_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	precio_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$precio_producto_web1= new precio_producto_web();	
	$precio_producto_web1->cargarDatosGenerales();
	
	//$moduloActual=$precio_producto_web1->moduloActual;
	//$usuarioActual=$precio_producto_web1->usuarioActual;
	//$sessionBase=$precio_producto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$precio_producto_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/precio_producto/js/templating/precio_producto_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/precio_producto/js/templating/precio_producto_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/precio_producto/js/templating/precio_producto_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/precio_producto/js/templating/precio_producto_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			precio_producto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					precio_producto_web::$GET_POST=$_GET;
				} else {
					precio_producto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			precio_producto_web::$STR_NOMBRE_PAGINA = 'precio_producto_view.php';
			precio_producto_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			precio_producto_web::$BIT_ES_PAGINA_FORM = 'false';
				
			precio_producto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {precio_producto_constante,precio_producto_constante1} from './webroot/js/JavaScript/contabilidad/inventario/precio_producto/js/util/precio_producto_constante.js?random=1';
			import {precio_producto_funcion,precio_producto_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/precio_producto/js/util/precio_producto_funcion.js?random=1';
			
			let precio_producto_constante2 = new precio_producto_constante();
			
			precio_producto_constante2.STR_NOMBRE_PAGINA="<?php echo(precio_producto_web::$STR_NOMBRE_PAGINA); ?>";
			precio_producto_constante2.STR_TYPE_ON_LOADprecio_producto="<?php echo(precio_producto_web::$STR_TYPE_ONLOAD); ?>";
			precio_producto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(precio_producto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			precio_producto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(precio_producto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			precio_producto_constante2.STR_ACTION="<?php echo(precio_producto_web::$STR_ACTION); ?>";
			precio_producto_constante2.STR_ES_POPUP="<?php echo(precio_producto_web::$STR_ES_POPUP); ?>";
			precio_producto_constante2.STR_ES_BUSQUEDA="<?php echo(precio_producto_web::$STR_ES_BUSQUEDA); ?>";
			precio_producto_constante2.STR_FUNCION_JS="<?php echo(precio_producto_web::$STR_FUNCION_JS); ?>";
			precio_producto_constante2.BIG_ID_ACTUAL="<?php echo(precio_producto_web::$BIG_ID_ACTUAL); ?>";
			precio_producto_constante2.BIG_ID_OPCION="<?php echo(precio_producto_web::$BIG_ID_OPCION); ?>";
			precio_producto_constante2.STR_OBJETO_JS="<?php echo(precio_producto_web::$STR_OBJETO_JS); ?>";
			precio_producto_constante2.STR_ES_RELACIONES="<?php echo(precio_producto_web::$STR_ES_RELACIONES); ?>";
			precio_producto_constante2.STR_ES_RELACIONADO="<?php echo(precio_producto_web::$STR_ES_RELACIONADO); ?>";
			precio_producto_constante2.STR_ES_SUB_PAGINA="<?php echo(precio_producto_web::$STR_ES_SUB_PAGINA); ?>";
			precio_producto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(precio_producto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			precio_producto_constante2.BIT_ES_PAGINA_FORM=<?php echo(precio_producto_web::$BIT_ES_PAGINA_FORM); ?>;
			precio_producto_constante2.STR_SUFIJO="<?php echo(precio_producto_web::$STR_SUF); ?>";//precio_producto
			precio_producto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(precio_producto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//precio_producto
			
			precio_producto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(precio_producto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			precio_producto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($precio_producto_web1->moduloActual->getnombre()); ?>";
			precio_producto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(precio_producto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			precio_producto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*precio_producto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			precio_producto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.precio_producto_constante2 = precio_producto_constante2;
			
		</script>
		
		<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.precio_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.precio_producto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="precio_productoActual" ></a>
	
	<div id="divResumenprecio_productoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(precio_producto_web::$STR_ES_BUSQUEDA=='false' && precio_producto_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(precio_producto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false' && precio_producto_web::$STR_ES_POPUP=='false' && precio_producto_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdprecio_productoNuevoToolBar">
										<img id="imgNuevoToolBarprecio_producto" name="imgNuevoToolBarprecio_producto" title="Nuevo Precio Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(precio_producto_web::$STR_ES_BUSQUEDA=='false' && precio_producto_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdprecio_productoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarprecio_producto" name="imgNuevoGuardarCambiosToolBarprecio_producto" title="Nuevo TABLA Precio Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(precio_producto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdprecio_productoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarprecio_producto" name="imgGuardarCambiosToolBarprecio_producto" title="Guardar Precio Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false' && precio_producto_web::$STR_ES_RELACIONES=='false' && precio_producto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdprecio_productoCopiarToolBar">
										<img id="imgCopiarToolBarprecio_producto" name="imgCopiarToolBarprecio_producto" title="Copiar Precio Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdprecio_productoDuplicarToolBar">
										<img id="imgDuplicarToolBarprecio_producto" name="imgDuplicarToolBarprecio_producto" title="Duplicar Precio Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdprecio_productoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarprecio_producto" name="imgRecargarInformacionToolBarprecio_producto" title="Recargar Precio Producto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdprecio_productoAnterioresToolBar">
										<img id="imgAnterioresToolBarprecio_producto" name="imgAnterioresToolBarprecio_producto" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdprecio_productoSiguientesToolBar">
										<img id="imgSiguientesToolBarprecio_producto" name="imgSiguientesToolBarprecio_producto" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdprecio_productoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarprecio_producto" name="imgAbrirOrderByToolBarprecio_producto" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((precio_producto_web::$STR_ES_RELACIONADO=='false' && precio_producto_web::$STR_ES_RELACIONES=='false') || precio_producto_web::$STR_ES_BUSQUEDA=='true'  || precio_producto_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdprecio_productoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarprecio_producto" name="imgCerrarPaginaToolBarprecio_producto" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trprecio_productoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaprecio_producto" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaprecio_producto',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trprecio_productoCabeceraBusquedas/super -->

		<tr id="trBusquedaprecio_producto" class="busqueda" style="display:table-row">
			<td id="tdBusquedaprecio_producto" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaprecio_producto" name="frmBusquedaprecio_producto">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaprecio_producto" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trprecio_productoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idbodega" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idbodega"> Por Bodega</a></li>
						<li id="listrVisibleFK_Idproducto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproducto"> Por  Producto</a></li>
						<li id="listrVisibleFK_Idtipo_precio" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_precio"> Por  Tipo Precio</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idbodega">
					<table id="tblstrVisibleFK_Idbodega" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Bodega</span>
						</td>
						<td align="center">
							<select id="FK_Idbodega-cmbid_bodega" name="FK_Idbodega-cmbid_bodega" title="Bodega" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarprecio_productoFK_Idbodega" name="btnBuscarprecio_productoFK_Idbodega" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
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
							<input type="button" id="btnBuscarprecio_productoFK_Idproducto" name="btnBuscarprecio_productoFK_Idproducto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarprecio_productoFK_Idtipo_precio" name="btnBuscarprecio_productoFK_Idtipo_precio" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarprecio_producto" style="display:table-row">
					<td id="tdParamsBuscarprecio_producto">
		<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarprecio_producto">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosprecio_producto" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosprecio_producto"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosprecio_producto" name="ParamsBuscar-txtNumeroRegistrosprecio_producto" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionprecio_producto">
							<td id="tdGenerarReporteprecio_producto" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosprecio_producto" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosprecio_producto" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionprecio_producto" name="btnRecargarInformacionprecio_producto" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaprecio_producto" name="btnImprimirPaginaprecio_producto" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*precio_producto_web::$STR_ES_BUSQUEDA=='false'  &&*/ precio_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByprecio_producto">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByprecio_producto" name="btnOrderByprecio_producto" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(precio_producto_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdprecio_productoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosprecio_producto -->

							</td><!-- tdGenerarReporteprecio_producto -->
						</tr><!-- trRecargarInformacionprecio_producto -->
					</table><!-- tblParamsBuscarNumeroRegistrosprecio_producto -->
				</div> <!-- divParamsBuscarprecio_producto -->
		<?php } ?>
				</td> <!-- tdParamsBuscarprecio_producto -->
				</tr><!-- trParamsBuscarprecio_producto -->
				</table> <!-- tblBusquedaprecio_producto -->
				</form> <!-- frmBusquedaprecio_producto -->
				

			</td> <!-- tdBusquedaprecio_producto -->
		</tr> <!-- trBusquedaprecio_producto/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divprecio_productoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblprecio_productoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmprecio_productoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnprecio_productoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="precio_producto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnprecio_productoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmprecio_productoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblprecio_productoPopupAjaxWebPart -->
		</div> <!-- divprecio_productoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trprecio_productoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaprecio_producto"></a>
		<img id="imgTablaParaDerechaprecio_producto" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaprecio_producto'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaprecio_producto" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaprecio_producto'"/>
		<a id="TablaDerechaprecio_producto"></a>
	</td>
</tr> <!-- trprecio_productoTablaNavegacion/super -->
<?php } ?>

<tr id="trprecio_productoTablaDatos">
	<td colspan="3" id="htmlTableCellprecio_producto">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosprecio_productosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trprecio_productoTablaDatos/super -->
		
		
		<tr id="trprecio_productoPaginacion" style="display:table-row">
			<td id="tdprecio_productoPaginacion" align="center">
				<div id="divprecio_productoPaginacionAjaxWebPart">
				<form id="frmPaginacionprecio_producto" name="frmPaginacionprecio_producto">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionprecio_producto" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(precio_producto_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkprecio_producto" name="btnSeleccionarLoteFkprecio_producto" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false' /*&& precio_producto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresprecio_producto" name="btnAnterioresprecio_producto" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(precio_producto_web::$STR_ES_BUSQUEDA=='false' && precio_producto_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdprecio_productoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararprecio_producto" name="btnNuevoTablaPrepararprecio_producto" title="NUEVO Precio Producto" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaprecio_producto" name="ParamsPaginar-txtNumeroNuevoTablaprecio_producto" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(precio_producto_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdprecio_productoConEditarprecio_producto">
							<label>
								<input id="ParamsBuscar-chbConEditarprecio_producto" name="ParamsBuscar-chbConEditarprecio_producto" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false'/* && precio_producto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesprecio_producto" name="btnSiguientesprecio_producto" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionprecio_producto -->
				</form> <!-- frmPaginacionprecio_producto -->
				<form id="frmNuevoPrepararprecio_producto" name="frmNuevoPrepararprecio_producto">
				<table id="tblNuevoPrepararprecio_producto" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trprecio_productoNuevo" height="10">
						<?php if(precio_producto_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdprecio_productoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararprecio_producto" name="btnNuevoPrepararprecio_producto" title="NUEVO Precio Producto" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdprecio_productoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosprecio_producto" name="btnGuardarCambiosprecio_producto" title="GUARDAR Precio Producto" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false' && precio_producto_web::$STR_ES_RELACIONES=='false' && precio_producto_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdprecio_productoDuplicar" align="center">
							<input type="button" id="btnDuplicarprecio_producto" name="btnDuplicarprecio_producto" title="DUPLICAR Precio Producto" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdprecio_productoCopiar" align="center">
							<input type="button" id="btnCopiarprecio_producto" name="btnCopiarprecio_producto" title="COPIAR Precio Producto" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false' && ((precio_producto_web::$STR_ES_RELACIONADO=='false' && precio_producto_web::$STR_ES_RELACIONES=='false') || precio_producto_web::$STR_ES_BUSQUEDA=='true'  || precio_producto_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdprecio_productoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaprecio_producto" name="btnCerrarPaginaprecio_producto" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararprecio_producto -->
				</form> <!-- frmNuevoPrepararprecio_producto -->
				</div> <!-- divprecio_productoPaginacionAjaxWebPart -->
			</td> <!-- tdprecio_productoPaginacion -->
		</tr> <!-- trprecio_productoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesprecio_productoAjaxWebPart">
			<td id="tdAccionesRelacionesprecio_productoAjaxWebPart">
				<div id="divAccionesRelacionesprecio_productoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesprecio_productoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesprecio_productoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByprecio_producto">
			<td id="tdOrderByprecio_producto">
				<form id="frmOrderByprecio_producto" name="frmOrderByprecio_producto">
					<div id="divOrderByprecio_productoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByprecio_producto -->
		</tr> <!-- trOrderByprecio_producto/super -->
			
		
		
		
		
		
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
			
				import {precio_producto_webcontrol,precio_producto_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/precio_producto/js/webcontrol/precio_producto_webcontrol.js?random=1';
				
				precio_producto_webcontrol1.setprecio_producto_constante(window.precio_producto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(precio_producto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

