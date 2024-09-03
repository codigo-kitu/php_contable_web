<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\categoria_cliente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Categorias Cliente Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascobrar/categoria_cliente/util/categoria_cliente_carga.php');
	use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/categoria_cliente/presentation/view/categoria_cliente_web.php');
	//use com\bydan\contabilidad\cuentascobrar\categoria_cliente\presentation\view\categoria_cliente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	categoria_cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	categoria_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$categoria_cliente_web1= new categoria_cliente_web();	
	$categoria_cliente_web1->cargarDatosGenerales();
	
	//$moduloActual=$categoria_cliente_web1->moduloActual;
	//$usuarioActual=$categoria_cliente_web1->usuarioActual;
	//$sessionBase=$categoria_cliente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$categoria_cliente_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/categoria_cliente/js/templating/categoria_cliente_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/categoria_cliente/js/templating/categoria_cliente_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/categoria_cliente/js/templating/categoria_cliente_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/categoria_cliente/js/templating/categoria_cliente_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/categoria_cliente/js/templating/categoria_cliente_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			categoria_cliente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					categoria_cliente_web::$GET_POST=$_GET;
				} else {
					categoria_cliente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			categoria_cliente_web::$STR_NOMBRE_PAGINA = 'categoria_cliente_view.php';
			categoria_cliente_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			categoria_cliente_web::$BIT_ES_PAGINA_FORM = 'false';
				
			categoria_cliente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {categoria_cliente_constante,categoria_cliente_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/categoria_cliente/js/util/categoria_cliente_constante.js?random=1';
			import {categoria_cliente_funcion,categoria_cliente_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/categoria_cliente/js/util/categoria_cliente_funcion.js?random=1';
			
			let categoria_cliente_constante2 = new categoria_cliente_constante();
			
			categoria_cliente_constante2.STR_NOMBRE_PAGINA="<?php echo(categoria_cliente_web::$STR_NOMBRE_PAGINA); ?>";
			categoria_cliente_constante2.STR_TYPE_ON_LOADcategoria_cliente="<?php echo(categoria_cliente_web::$STR_TYPE_ONLOAD); ?>";
			categoria_cliente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(categoria_cliente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			categoria_cliente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(categoria_cliente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			categoria_cliente_constante2.STR_ACTION="<?php echo(categoria_cliente_web::$STR_ACTION); ?>";
			categoria_cliente_constante2.STR_ES_POPUP="<?php echo(categoria_cliente_web::$STR_ES_POPUP); ?>";
			categoria_cliente_constante2.STR_ES_BUSQUEDA="<?php echo(categoria_cliente_web::$STR_ES_BUSQUEDA); ?>";
			categoria_cliente_constante2.STR_FUNCION_JS="<?php echo(categoria_cliente_web::$STR_FUNCION_JS); ?>";
			categoria_cliente_constante2.BIG_ID_ACTUAL="<?php echo(categoria_cliente_web::$BIG_ID_ACTUAL); ?>";
			categoria_cliente_constante2.BIG_ID_OPCION="<?php echo(categoria_cliente_web::$BIG_ID_OPCION); ?>";
			categoria_cliente_constante2.STR_OBJETO_JS="<?php echo(categoria_cliente_web::$STR_OBJETO_JS); ?>";
			categoria_cliente_constante2.STR_ES_RELACIONES="<?php echo(categoria_cliente_web::$STR_ES_RELACIONES); ?>";
			categoria_cliente_constante2.STR_ES_RELACIONADO="<?php echo(categoria_cliente_web::$STR_ES_RELACIONADO); ?>";
			categoria_cliente_constante2.STR_ES_SUB_PAGINA="<?php echo(categoria_cliente_web::$STR_ES_SUB_PAGINA); ?>";
			categoria_cliente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(categoria_cliente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			categoria_cliente_constante2.BIT_ES_PAGINA_FORM=<?php echo(categoria_cliente_web::$BIT_ES_PAGINA_FORM); ?>;
			categoria_cliente_constante2.STR_SUFIJO="<?php echo(categoria_cliente_web::$STR_SUF); ?>";//categoria_cliente
			categoria_cliente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(categoria_cliente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//categoria_cliente
			
			categoria_cliente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(categoria_cliente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			categoria_cliente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($categoria_cliente_web1->moduloActual->getnombre()); ?>";
			categoria_cliente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(categoria_cliente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			categoria_cliente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*categoria_cliente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			categoria_cliente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.categoria_cliente_constante2 = categoria_cliente_constante2;
			
		</script>
		
		<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.categoria_cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.categoria_cliente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="categoria_clienteActual" ></a>
	
	<div id="divResumencategoria_clienteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(categoria_cliente_web::$STR_ES_BUSQUEDA=='false' && categoria_cliente_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(categoria_cliente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false' && categoria_cliente_web::$STR_ES_POPUP=='false' && categoria_cliente_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcategoria_clienteNuevoToolBar">
										<img id="imgNuevoToolBarcategoria_cliente" name="imgNuevoToolBarcategoria_cliente" title="Nuevo Categorias Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(categoria_cliente_web::$STR_ES_BUSQUEDA=='false' && categoria_cliente_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcategoria_clienteNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcategoria_cliente" name="imgNuevoGuardarCambiosToolBarcategoria_cliente" title="Nuevo TABLA Categorias Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(categoria_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcategoria_clienteGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcategoria_cliente" name="imgGuardarCambiosToolBarcategoria_cliente" title="Guardar Categorias Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false' && categoria_cliente_web::$STR_ES_RELACIONES=='false' && categoria_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcategoria_clienteCopiarToolBar">
										<img id="imgCopiarToolBarcategoria_cliente" name="imgCopiarToolBarcategoria_cliente" title="Copiar Categorias Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcategoria_clienteDuplicarToolBar">
										<img id="imgDuplicarToolBarcategoria_cliente" name="imgDuplicarToolBarcategoria_cliente" title="Duplicar Categorias Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcategoria_clienteRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcategoria_cliente" name="imgRecargarInformacionToolBarcategoria_cliente" title="Recargar Categorias Cliente" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcategoria_clienteAnterioresToolBar">
										<img id="imgAnterioresToolBarcategoria_cliente" name="imgAnterioresToolBarcategoria_cliente" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcategoria_clienteSiguientesToolBar">
										<img id="imgSiguientesToolBarcategoria_cliente" name="imgSiguientesToolBarcategoria_cliente" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcategoria_clienteAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcategoria_cliente" name="imgAbrirOrderByToolBarcategoria_cliente" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((categoria_cliente_web::$STR_ES_RELACIONADO=='false' && categoria_cliente_web::$STR_ES_RELACIONES=='false') || categoria_cliente_web::$STR_ES_BUSQUEDA=='true'  || categoria_cliente_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcategoria_clienteCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcategoria_cliente" name="imgCerrarPaginaToolBarcategoria_cliente" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcategoria_clienteCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacategoria_cliente" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacategoria_cliente',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcategoria_clienteCabeceraBusquedas/super -->

		<tr id="trBusquedacategoria_cliente" class="busqueda" style="display:table-row">
			<td id="tdBusquedacategoria_cliente" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacategoria_cliente" name="frmBusquedacategoria_cliente">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacategoria_cliente" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcategoria_clienteBusquedas" class="busqueda" style="display:none"><td>
				<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcategoria_cliente" style="display:table-row">
					<td id="tdParamsBuscarcategoria_cliente">
		<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcategoria_cliente">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscategoria_cliente" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscategoria_cliente"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscategoria_cliente" name="ParamsBuscar-txtNumeroRegistroscategoria_cliente" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncategoria_cliente">
							<td id="tdGenerarReportecategoria_cliente" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscategoria_cliente" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscategoria_cliente" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncategoria_cliente" name="btnRecargarInformacioncategoria_cliente" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacategoria_cliente" name="btnImprimirPaginacategoria_cliente" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*categoria_cliente_web::$STR_ES_BUSQUEDA=='false'  &&*/ categoria_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycategoria_cliente">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycategoria_cliente" name="btnOrderBycategoria_cliente" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelcategoria_cliente" name="btnOrderByRelcategoria_cliente" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(categoria_cliente_web::$STR_ES_RELACIONES=='false' && categoria_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(categoria_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcategoria_clienteConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscategoria_cliente -->

							</td><!-- tdGenerarReportecategoria_cliente -->
						</tr><!-- trRecargarInformacioncategoria_cliente -->
					</table><!-- tblParamsBuscarNumeroRegistroscategoria_cliente -->
				</div> <!-- divParamsBuscarcategoria_cliente -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcategoria_cliente -->
				</tr><!-- trParamsBuscarcategoria_cliente -->
				</table> <!-- tblBusquedacategoria_cliente -->
				</form> <!-- frmBusquedacategoria_cliente -->
				

			</td> <!-- tdBusquedacategoria_cliente -->
		</tr> <!-- trBusquedacategoria_cliente/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcategoria_clientePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcategoria_clientePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcategoria_clienteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncategoria_clienteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="categoria_cliente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncategoria_clienteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcategoria_clienteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcategoria_clientePopupAjaxWebPart -->
		</div> <!-- divcategoria_clientePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcategoria_clienteTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacategoria_cliente"></a>
		<img id="imgTablaParaDerechacategoria_cliente" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacategoria_cliente'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacategoria_cliente" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacategoria_cliente'"/>
		<a id="TablaDerechacategoria_cliente"></a>
	</td>
</tr> <!-- trcategoria_clienteTablaNavegacion/super -->
<?php } ?>

<tr id="trcategoria_clienteTablaDatos">
	<td colspan="3" id="htmlTableCellcategoria_cliente">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscategoria_clientesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcategoria_clienteTablaDatos/super -->
		
		
		<tr id="trcategoria_clientePaginacion" style="display:table-row">
			<td id="tdcategoria_clientePaginacion" align="center">
				<div id="divcategoria_clientePaginacionAjaxWebPart">
				<form id="frmPaginacioncategoria_cliente" name="frmPaginacioncategoria_cliente">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncategoria_cliente" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(categoria_cliente_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcategoria_cliente" name="btnSeleccionarLoteFkcategoria_cliente" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false' /*&& categoria_cliente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescategoria_cliente" name="btnAnteriorescategoria_cliente" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(categoria_cliente_web::$STR_ES_BUSQUEDA=='false' && categoria_cliente_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcategoria_clienteNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcategoria_cliente" name="btnNuevoTablaPrepararcategoria_cliente" title="NUEVO Categorias Cliente" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacategoria_cliente" name="ParamsPaginar-txtNumeroNuevoTablacategoria_cliente" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcategoria_clienteConEditarcategoria_cliente">
							<label>
								<input id="ParamsBuscar-chbConEditarcategoria_cliente" name="ParamsBuscar-chbConEditarcategoria_cliente" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false'/* && categoria_cliente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescategoria_cliente" name="btnSiguientescategoria_cliente" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncategoria_cliente -->
				</form> <!-- frmPaginacioncategoria_cliente -->
				<form id="frmNuevoPrepararcategoria_cliente" name="frmNuevoPrepararcategoria_cliente">
				<table id="tblNuevoPrepararcategoria_cliente" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trcategoria_clienteNuevo" height="10">
						<?php if(categoria_cliente_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcategoria_clienteNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcategoria_cliente" name="btnNuevoPrepararcategoria_cliente" title="NUEVO Categorias Cliente" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcategoria_clienteGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscategoria_cliente" name="btnGuardarCambioscategoria_cliente" title="GUARDAR Categorias Cliente" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false' && categoria_cliente_web::$STR_ES_RELACIONES=='false' && categoria_cliente_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcategoria_clienteDuplicar" align="center">
							<input type="button" id="btnDuplicarcategoria_cliente" name="btnDuplicarcategoria_cliente" title="DUPLICAR Categorias Cliente" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcategoria_clienteCopiar" align="center">
							<input type="button" id="btnCopiarcategoria_cliente" name="btnCopiarcategoria_cliente" title="COPIAR Categorias Cliente" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false' && ((categoria_cliente_web::$STR_ES_RELACIONADO=='false' && categoria_cliente_web::$STR_ES_RELACIONES=='false') || categoria_cliente_web::$STR_ES_BUSQUEDA=='true'  || categoria_cliente_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcategoria_clienteCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacategoria_cliente" name="btnCerrarPaginacategoria_cliente" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcategoria_cliente -->
				</form> <!-- frmNuevoPrepararcategoria_cliente -->
				</div> <!-- divcategoria_clientePaginacionAjaxWebPart -->
			</td> <!-- tdcategoria_clientePaginacion -->
		</tr> <!-- trcategoria_clientePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescategoria_clienteAjaxWebPart">
			<td id="tdAccionesRelacionescategoria_clienteAjaxWebPart">
				<div id="divAccionesRelacionescategoria_clienteAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescategoria_clienteAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescategoria_clienteAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycategoria_cliente">
			<td id="tdOrderBycategoria_cliente">
				<form id="frmOrderBycategoria_cliente" name="frmOrderBycategoria_cliente">
					<div id="divOrderBycategoria_clienteAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelcategoria_cliente" name="frmOrderByRelcategoria_cliente">
					<div id="divOrderByRelcategoria_clienteAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycategoria_cliente -->
		</tr> <!-- trOrderBycategoria_cliente/super -->
			
		
		
		
		
		
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
			
				import {categoria_cliente_webcontrol,categoria_cliente_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/categoria_cliente/js/webcontrol/categoria_cliente_webcontrol.js?random=1';
				
				categoria_cliente_webcontrol1.setcategoria_cliente_constante(window.categoria_cliente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(categoria_cliente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

