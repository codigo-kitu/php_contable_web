<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentaspagar\categoria_proveedor\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Categorias Proveedor Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentaspagar/categoria_proveedor/util/categoria_proveedor_carga.php');
	use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_carga;
	
	//include_once('com/bydan/contabilidad/cuentaspagar/categoria_proveedor/presentation/view/categoria_proveedor_web.php');
	//use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\presentation\view\categoria_proveedor_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	categoria_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	categoria_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$categoria_proveedor_web1= new categoria_proveedor_web();	
	$categoria_proveedor_web1->cargarDatosGenerales();
	
	//$moduloActual=$categoria_proveedor_web1->moduloActual;
	//$usuarioActual=$categoria_proveedor_web1->usuarioActual;
	//$sessionBase=$categoria_proveedor_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$categoria_proveedor_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/categoria_proveedor/js/templating/categoria_proveedor_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/categoria_proveedor/js/templating/categoria_proveedor_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/categoria_proveedor/js/templating/categoria_proveedor_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/categoria_proveedor/js/templating/categoria_proveedor_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentaspagar/categoria_proveedor/js/templating/categoria_proveedor_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			categoria_proveedor_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					categoria_proveedor_web::$GET_POST=$_GET;
				} else {
					categoria_proveedor_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			categoria_proveedor_web::$STR_NOMBRE_PAGINA = 'categoria_proveedor_view.php';
			categoria_proveedor_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			categoria_proveedor_web::$BIT_ES_PAGINA_FORM = 'false';
				
			categoria_proveedor_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {categoria_proveedor_constante,categoria_proveedor_constante1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/categoria_proveedor/js/util/categoria_proveedor_constante.js?random=1';
			import {categoria_proveedor_funcion,categoria_proveedor_funcion1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/categoria_proveedor/js/util/categoria_proveedor_funcion.js?random=1';
			
			let categoria_proveedor_constante2 = new categoria_proveedor_constante();
			
			categoria_proveedor_constante2.STR_NOMBRE_PAGINA="<?php echo(categoria_proveedor_web::$STR_NOMBRE_PAGINA); ?>";
			categoria_proveedor_constante2.STR_TYPE_ON_LOADcategoria_proveedor="<?php echo(categoria_proveedor_web::$STR_TYPE_ONLOAD); ?>";
			categoria_proveedor_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(categoria_proveedor_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			categoria_proveedor_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(categoria_proveedor_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			categoria_proveedor_constante2.STR_ACTION="<?php echo(categoria_proveedor_web::$STR_ACTION); ?>";
			categoria_proveedor_constante2.STR_ES_POPUP="<?php echo(categoria_proveedor_web::$STR_ES_POPUP); ?>";
			categoria_proveedor_constante2.STR_ES_BUSQUEDA="<?php echo(categoria_proveedor_web::$STR_ES_BUSQUEDA); ?>";
			categoria_proveedor_constante2.STR_FUNCION_JS="<?php echo(categoria_proveedor_web::$STR_FUNCION_JS); ?>";
			categoria_proveedor_constante2.BIG_ID_ACTUAL="<?php echo(categoria_proveedor_web::$BIG_ID_ACTUAL); ?>";
			categoria_proveedor_constante2.BIG_ID_OPCION="<?php echo(categoria_proveedor_web::$BIG_ID_OPCION); ?>";
			categoria_proveedor_constante2.STR_OBJETO_JS="<?php echo(categoria_proveedor_web::$STR_OBJETO_JS); ?>";
			categoria_proveedor_constante2.STR_ES_RELACIONES="<?php echo(categoria_proveedor_web::$STR_ES_RELACIONES); ?>";
			categoria_proveedor_constante2.STR_ES_RELACIONADO="<?php echo(categoria_proveedor_web::$STR_ES_RELACIONADO); ?>";
			categoria_proveedor_constante2.STR_ES_SUB_PAGINA="<?php echo(categoria_proveedor_web::$STR_ES_SUB_PAGINA); ?>";
			categoria_proveedor_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(categoria_proveedor_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			categoria_proveedor_constante2.BIT_ES_PAGINA_FORM=<?php echo(categoria_proveedor_web::$BIT_ES_PAGINA_FORM); ?>;
			categoria_proveedor_constante2.STR_SUFIJO="<?php echo(categoria_proveedor_web::$STR_SUF); ?>";//categoria_proveedor
			categoria_proveedor_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(categoria_proveedor_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//categoria_proveedor
			
			categoria_proveedor_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(categoria_proveedor_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			categoria_proveedor_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($categoria_proveedor_web1->moduloActual->getnombre()); ?>";
			categoria_proveedor_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(categoria_proveedor_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			categoria_proveedor_constante2.BIT_ES_LOAD_NORMAL=true;
			/*categoria_proveedor_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			categoria_proveedor_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.categoria_proveedor_constante2 = categoria_proveedor_constante2;
			
		</script>
		
		<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.categoria_proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.categoria_proveedor_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="categoria_proveedorActual" ></a>
	
	<div id="divResumencategoria_proveedorActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(categoria_proveedor_web::$STR_ES_BUSQUEDA=='false' && categoria_proveedor_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(categoria_proveedor_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false' && categoria_proveedor_web::$STR_ES_POPUP=='false' && categoria_proveedor_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcategoria_proveedorNuevoToolBar">
										<img id="imgNuevoToolBarcategoria_proveedor" name="imgNuevoToolBarcategoria_proveedor" title="Nuevo Categorias Proveedor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(categoria_proveedor_web::$STR_ES_BUSQUEDA=='false' && categoria_proveedor_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcategoria_proveedorNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcategoria_proveedor" name="imgNuevoGuardarCambiosToolBarcategoria_proveedor" title="Nuevo TABLA Categorias Proveedor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(categoria_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcategoria_proveedorGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcategoria_proveedor" name="imgGuardarCambiosToolBarcategoria_proveedor" title="Guardar Categorias Proveedor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false' && categoria_proveedor_web::$STR_ES_RELACIONES=='false' && categoria_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcategoria_proveedorCopiarToolBar">
										<img id="imgCopiarToolBarcategoria_proveedor" name="imgCopiarToolBarcategoria_proveedor" title="Copiar Categorias Proveedor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcategoria_proveedorDuplicarToolBar">
										<img id="imgDuplicarToolBarcategoria_proveedor" name="imgDuplicarToolBarcategoria_proveedor" title="Duplicar Categorias Proveedor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcategoria_proveedorRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcategoria_proveedor" name="imgRecargarInformacionToolBarcategoria_proveedor" title="Recargar Categorias Proveedor" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcategoria_proveedorAnterioresToolBar">
										<img id="imgAnterioresToolBarcategoria_proveedor" name="imgAnterioresToolBarcategoria_proveedor" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcategoria_proveedorSiguientesToolBar">
										<img id="imgSiguientesToolBarcategoria_proveedor" name="imgSiguientesToolBarcategoria_proveedor" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcategoria_proveedorAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcategoria_proveedor" name="imgAbrirOrderByToolBarcategoria_proveedor" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((categoria_proveedor_web::$STR_ES_RELACIONADO=='false' && categoria_proveedor_web::$STR_ES_RELACIONES=='false') || categoria_proveedor_web::$STR_ES_BUSQUEDA=='true'  || categoria_proveedor_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcategoria_proveedorCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcategoria_proveedor" name="imgCerrarPaginaToolBarcategoria_proveedor" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcategoria_proveedorCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacategoria_proveedor" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacategoria_proveedor',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcategoria_proveedorCabeceraBusquedas/super -->

		<tr id="trBusquedacategoria_proveedor" class="busqueda" style="display:table-row">
			<td id="tdBusquedacategoria_proveedor" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacategoria_proveedor" name="frmBusquedacategoria_proveedor">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacategoria_proveedor" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcategoria_proveedorBusquedas" class="busqueda" style="display:none"><td>
				<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcategoria_proveedor" style="display:table-row">
					<td id="tdParamsBuscarcategoria_proveedor">
		<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcategoria_proveedor">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscategoria_proveedor" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscategoria_proveedor"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscategoria_proveedor" name="ParamsBuscar-txtNumeroRegistroscategoria_proveedor" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncategoria_proveedor">
							<td id="tdGenerarReportecategoria_proveedor" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscategoria_proveedor" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscategoria_proveedor" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncategoria_proveedor" name="btnRecargarInformacioncategoria_proveedor" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacategoria_proveedor" name="btnImprimirPaginacategoria_proveedor" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*categoria_proveedor_web::$STR_ES_BUSQUEDA=='false'  &&*/ categoria_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycategoria_proveedor">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycategoria_proveedor" name="btnOrderBycategoria_proveedor" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelcategoria_proveedor" name="btnOrderByRelcategoria_proveedor" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(categoria_proveedor_web::$STR_ES_RELACIONES=='false' && categoria_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(categoria_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcategoria_proveedorConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscategoria_proveedor -->

							</td><!-- tdGenerarReportecategoria_proveedor -->
						</tr><!-- trRecargarInformacioncategoria_proveedor -->
					</table><!-- tblParamsBuscarNumeroRegistroscategoria_proveedor -->
				</div> <!-- divParamsBuscarcategoria_proveedor -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcategoria_proveedor -->
				</tr><!-- trParamsBuscarcategoria_proveedor -->
				</table> <!-- tblBusquedacategoria_proveedor -->
				</form> <!-- frmBusquedacategoria_proveedor -->
				

			</td> <!-- tdBusquedacategoria_proveedor -->
		</tr> <!-- trBusquedacategoria_proveedor/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcategoria_proveedorPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcategoria_proveedorPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcategoria_proveedorAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncategoria_proveedorAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="categoria_proveedor_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncategoria_proveedorAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcategoria_proveedorAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcategoria_proveedorPopupAjaxWebPart -->
		</div> <!-- divcategoria_proveedorPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcategoria_proveedorTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacategoria_proveedor"></a>
		<img id="imgTablaParaDerechacategoria_proveedor" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacategoria_proveedor'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacategoria_proveedor" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacategoria_proveedor'"/>
		<a id="TablaDerechacategoria_proveedor"></a>
	</td>
</tr> <!-- trcategoria_proveedorTablaNavegacion/super -->
<?php } ?>

<tr id="trcategoria_proveedorTablaDatos">
	<td colspan="3" id="htmlTableCellcategoria_proveedor">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscategoria_proveedorsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcategoria_proveedorTablaDatos/super -->
		
		
		<tr id="trcategoria_proveedorPaginacion" style="display:table-row">
			<td id="tdcategoria_proveedorPaginacion" align="center">
				<div id="divcategoria_proveedorPaginacionAjaxWebPart">
				<form id="frmPaginacioncategoria_proveedor" name="frmPaginacioncategoria_proveedor">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncategoria_proveedor" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(categoria_proveedor_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcategoria_proveedor" name="btnSeleccionarLoteFkcategoria_proveedor" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false' /*&& categoria_proveedor_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescategoria_proveedor" name="btnAnteriorescategoria_proveedor" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(categoria_proveedor_web::$STR_ES_BUSQUEDA=='false' && categoria_proveedor_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcategoria_proveedorNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcategoria_proveedor" name="btnNuevoTablaPrepararcategoria_proveedor" title="NUEVO Categorias Proveedor" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacategoria_proveedor" name="ParamsPaginar-txtNumeroNuevoTablacategoria_proveedor" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcategoria_proveedorConEditarcategoria_proveedor">
							<label>
								<input id="ParamsBuscar-chbConEditarcategoria_proveedor" name="ParamsBuscar-chbConEditarcategoria_proveedor" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false'/* && categoria_proveedor_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescategoria_proveedor" name="btnSiguientescategoria_proveedor" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncategoria_proveedor -->
				</form> <!-- frmPaginacioncategoria_proveedor -->
				<form id="frmNuevoPrepararcategoria_proveedor" name="frmNuevoPrepararcategoria_proveedor">
				<table id="tblNuevoPrepararcategoria_proveedor" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trcategoria_proveedorNuevo" height="10">
						<?php if(categoria_proveedor_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcategoria_proveedorNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcategoria_proveedor" name="btnNuevoPrepararcategoria_proveedor" title="NUEVO Categorias Proveedor" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcategoria_proveedorGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscategoria_proveedor" name="btnGuardarCambioscategoria_proveedor" title="GUARDAR Categorias Proveedor" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false' && categoria_proveedor_web::$STR_ES_RELACIONES=='false' && categoria_proveedor_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcategoria_proveedorDuplicar" align="center">
							<input type="button" id="btnDuplicarcategoria_proveedor" name="btnDuplicarcategoria_proveedor" title="DUPLICAR Categorias Proveedor" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcategoria_proveedorCopiar" align="center">
							<input type="button" id="btnCopiarcategoria_proveedor" name="btnCopiarcategoria_proveedor" title="COPIAR Categorias Proveedor" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false' && ((categoria_proveedor_web::$STR_ES_RELACIONADO=='false' && categoria_proveedor_web::$STR_ES_RELACIONES=='false') || categoria_proveedor_web::$STR_ES_BUSQUEDA=='true'  || categoria_proveedor_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcategoria_proveedorCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacategoria_proveedor" name="btnCerrarPaginacategoria_proveedor" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcategoria_proveedor -->
				</form> <!-- frmNuevoPrepararcategoria_proveedor -->
				</div> <!-- divcategoria_proveedorPaginacionAjaxWebPart -->
			</td> <!-- tdcategoria_proveedorPaginacion -->
		</tr> <!-- trcategoria_proveedorPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescategoria_proveedorAjaxWebPart">
			<td id="tdAccionesRelacionescategoria_proveedorAjaxWebPart">
				<div id="divAccionesRelacionescategoria_proveedorAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescategoria_proveedorAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescategoria_proveedorAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycategoria_proveedor">
			<td id="tdOrderBycategoria_proveedor">
				<form id="frmOrderBycategoria_proveedor" name="frmOrderBycategoria_proveedor">
					<div id="divOrderBycategoria_proveedorAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelcategoria_proveedor" name="frmOrderByRelcategoria_proveedor">
					<div id="divOrderByRelcategoria_proveedorAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycategoria_proveedor -->
		</tr> <!-- trOrderBycategoria_proveedor/super -->
			
		
		
		
		
		
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
			
				import {categoria_proveedor_webcontrol,categoria_proveedor_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentaspagar/categoria_proveedor/js/webcontrol/categoria_proveedor_webcontrol.js?random=1';
				
				categoria_proveedor_webcontrol1.setcategoria_proveedor_constante(window.categoria_proveedor_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(categoria_proveedor_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

