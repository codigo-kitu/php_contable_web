<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\producto_equivalente\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Producto Equivalentes Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/producto_equivalente/util/producto_equivalente_carga.php');
	use com\bydan\contabilidad\inventario\producto_equivalente\util\producto_equivalente_carga;
	
	//include_once('com/bydan/contabilidad/inventario/producto_equivalente/presentation/view/producto_equivalente_web.php');
	//use com\bydan\contabilidad\inventario\producto_equivalente\presentation\view\producto_equivalente_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	producto_equivalente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	producto_equivalente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$producto_equivalente_web1= new producto_equivalente_web();	
	$producto_equivalente_web1->cargarDatosGenerales();
	
	//$moduloActual=$producto_equivalente_web1->moduloActual;
	//$usuarioActual=$producto_equivalente_web1->usuarioActual;
	//$sessionBase=$producto_equivalente_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$producto_equivalente_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/producto_equivalente/js/templating/producto_equivalente_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/producto_equivalente/js/templating/producto_equivalente_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/producto_equivalente/js/templating/producto_equivalente_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/producto_equivalente/js/templating/producto_equivalente_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			producto_equivalente_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					producto_equivalente_web::$GET_POST=$_GET;
				} else {
					producto_equivalente_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			producto_equivalente_web::$STR_NOMBRE_PAGINA = 'producto_equivalente_view.php';
			producto_equivalente_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			producto_equivalente_web::$BIT_ES_PAGINA_FORM = 'false';
				
			producto_equivalente_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {producto_equivalente_constante,producto_equivalente_constante1} from './webroot/js/JavaScript/contabilidad/inventario/producto_equivalente/js/util/producto_equivalente_constante.js?random=1';
			import {producto_equivalente_funcion,producto_equivalente_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/producto_equivalente/js/util/producto_equivalente_funcion.js?random=1';
			
			let producto_equivalente_constante2 = new producto_equivalente_constante();
			
			producto_equivalente_constante2.STR_NOMBRE_PAGINA="<?php echo(producto_equivalente_web::$STR_NOMBRE_PAGINA); ?>";
			producto_equivalente_constante2.STR_TYPE_ON_LOADproducto_equivalente="<?php echo(producto_equivalente_web::$STR_TYPE_ONLOAD); ?>";
			producto_equivalente_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(producto_equivalente_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			producto_equivalente_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(producto_equivalente_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			producto_equivalente_constante2.STR_ACTION="<?php echo(producto_equivalente_web::$STR_ACTION); ?>";
			producto_equivalente_constante2.STR_ES_POPUP="<?php echo(producto_equivalente_web::$STR_ES_POPUP); ?>";
			producto_equivalente_constante2.STR_ES_BUSQUEDA="<?php echo(producto_equivalente_web::$STR_ES_BUSQUEDA); ?>";
			producto_equivalente_constante2.STR_FUNCION_JS="<?php echo(producto_equivalente_web::$STR_FUNCION_JS); ?>";
			producto_equivalente_constante2.BIG_ID_ACTUAL="<?php echo(producto_equivalente_web::$BIG_ID_ACTUAL); ?>";
			producto_equivalente_constante2.BIG_ID_OPCION="<?php echo(producto_equivalente_web::$BIG_ID_OPCION); ?>";
			producto_equivalente_constante2.STR_OBJETO_JS="<?php echo(producto_equivalente_web::$STR_OBJETO_JS); ?>";
			producto_equivalente_constante2.STR_ES_RELACIONES="<?php echo(producto_equivalente_web::$STR_ES_RELACIONES); ?>";
			producto_equivalente_constante2.STR_ES_RELACIONADO="<?php echo(producto_equivalente_web::$STR_ES_RELACIONADO); ?>";
			producto_equivalente_constante2.STR_ES_SUB_PAGINA="<?php echo(producto_equivalente_web::$STR_ES_SUB_PAGINA); ?>";
			producto_equivalente_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(producto_equivalente_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			producto_equivalente_constante2.BIT_ES_PAGINA_FORM=<?php echo(producto_equivalente_web::$BIT_ES_PAGINA_FORM); ?>;
			producto_equivalente_constante2.STR_SUFIJO="<?php echo(producto_equivalente_web::$STR_SUF); ?>";//producto_equivalente
			producto_equivalente_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(producto_equivalente_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//producto_equivalente
			
			producto_equivalente_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(producto_equivalente_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			producto_equivalente_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($producto_equivalente_web1->moduloActual->getnombre()); ?>";
			producto_equivalente_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(producto_equivalente_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			producto_equivalente_constante2.BIT_ES_LOAD_NORMAL=true;
			/*producto_equivalente_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			producto_equivalente_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.producto_equivalente_constante2 = producto_equivalente_constante2;
			
		</script>
		
		<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.producto_equivalente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.producto_equivalente_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="producto_equivalenteActual" ></a>
	
	<div id="divResumenproducto_equivalenteActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(producto_equivalente_web::$STR_ES_BUSQUEDA=='false' && producto_equivalente_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(producto_equivalente_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false' && producto_equivalente_web::$STR_ES_POPUP=='false' && producto_equivalente_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdproducto_equivalenteNuevoToolBar">
										<img id="imgNuevoToolBarproducto_equivalente" name="imgNuevoToolBarproducto_equivalente" title="Nuevo Producto Equivalentes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(producto_equivalente_web::$STR_ES_BUSQUEDA=='false' && producto_equivalente_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdproducto_equivalenteNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarproducto_equivalente" name="imgNuevoGuardarCambiosToolBarproducto_equivalente" title="Nuevo TABLA Producto Equivalentes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(producto_equivalente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdproducto_equivalenteGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarproducto_equivalente" name="imgGuardarCambiosToolBarproducto_equivalente" title="Guardar Producto Equivalentes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false' && producto_equivalente_web::$STR_ES_RELACIONES=='false' && producto_equivalente_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdproducto_equivalenteCopiarToolBar">
										<img id="imgCopiarToolBarproducto_equivalente" name="imgCopiarToolBarproducto_equivalente" title="Copiar Producto Equivalentes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdproducto_equivalenteDuplicarToolBar">
										<img id="imgDuplicarToolBarproducto_equivalente" name="imgDuplicarToolBarproducto_equivalente" title="Duplicar Producto Equivalentes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdproducto_equivalenteRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarproducto_equivalente" name="imgRecargarInformacionToolBarproducto_equivalente" title="Recargar Producto Equivalentes" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdproducto_equivalenteAnterioresToolBar">
										<img id="imgAnterioresToolBarproducto_equivalente" name="imgAnterioresToolBarproducto_equivalente" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdproducto_equivalenteSiguientesToolBar">
										<img id="imgSiguientesToolBarproducto_equivalente" name="imgSiguientesToolBarproducto_equivalente" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdproducto_equivalenteAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarproducto_equivalente" name="imgAbrirOrderByToolBarproducto_equivalente" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((producto_equivalente_web::$STR_ES_RELACIONADO=='false' && producto_equivalente_web::$STR_ES_RELACIONES=='false') || producto_equivalente_web::$STR_ES_BUSQUEDA=='true'  || producto_equivalente_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdproducto_equivalenteCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarproducto_equivalente" name="imgCerrarPaginaToolBarproducto_equivalente" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trproducto_equivalenteCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaproducto_equivalente" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaproducto_equivalente',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trproducto_equivalenteCabeceraBusquedas/super -->

		<tr id="trBusquedaproducto_equivalente" class="busqueda" style="display:table-row">
			<td id="tdBusquedaproducto_equivalente" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaproducto_equivalente" name="frmBusquedaproducto_equivalente">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaproducto_equivalente" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trproducto_equivalenteBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idproducto_equivalente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproducto_equivalente"> Por  Producto Equivalente</a></li>
						<li id="listrVisibleFK_Idproducto_principal" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproducto_principal"> Por  Producto Principal</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idproducto_equivalente">
					<table id="tblstrVisibleFK_Idproducto_equivalente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Producto Equivalente</span>
						</td>
						<td align="center">
							<select id="FK_Idproducto_equivalente-cmbid_producto_equivalente" name="FK_Idproducto_equivalente-cmbid_producto_equivalente" title=" Producto Equivalente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproducto_equivalenteFK_Idproducto_equivalente" name="btnBuscarproducto_equivalenteFK_Idproducto_equivalente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproducto_principal">
					<table id="tblstrVisibleFK_Idproducto_principal" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Producto Principal</span>
						</td>
						<td align="center">
							<select id="FK_Idproducto_principal-cmbid_producto_principal" name="FK_Idproducto_principal-cmbid_producto_principal" title=" Producto Principal" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarproducto_equivalenteFK_Idproducto_principal" name="btnBuscarproducto_equivalenteFK_Idproducto_principal" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarproducto_equivalente" style="display:table-row">
					<td id="tdParamsBuscarproducto_equivalente">
		<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarproducto_equivalente">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosproducto_equivalente" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosproducto_equivalente"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosproducto_equivalente" name="ParamsBuscar-txtNumeroRegistrosproducto_equivalente" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionproducto_equivalente">
							<td id="tdGenerarReporteproducto_equivalente" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosproducto_equivalente" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosproducto_equivalente" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionproducto_equivalente" name="btnRecargarInformacionproducto_equivalente" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
											<input type="button" id="btnArbolproducto_equivalente" name="btnArbolproducto_equivalente" title="ARBOL" value="   Arbol" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaproducto_equivalente" name="btnImprimirPaginaproducto_equivalente" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*producto_equivalente_web::$STR_ES_BUSQUEDA=='false'  &&*/ producto_equivalente_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByproducto_equivalente">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByproducto_equivalente" name="btnOrderByproducto_equivalente" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelproducto_equivalente" name="btnOrderByRelproducto_equivalente" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(producto_equivalente_web::$STR_ES_RELACIONES=='false' && producto_equivalente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(producto_equivalente_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdproducto_equivalenteConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosproducto_equivalente -->

							</td><!-- tdGenerarReporteproducto_equivalente -->
						</tr><!-- trRecargarInformacionproducto_equivalente -->
					</table><!-- tblParamsBuscarNumeroRegistrosproducto_equivalente -->
				</div> <!-- divParamsBuscarproducto_equivalente -->
		<?php } ?>
				</td> <!-- tdParamsBuscarproducto_equivalente -->
				</tr><!-- trParamsBuscarproducto_equivalente -->
				</table> <!-- tblBusquedaproducto_equivalente -->
				</form> <!-- frmBusquedaproducto_equivalente -->
				

			</td> <!-- tdBusquedaproducto_equivalente -->
		</tr> <!-- trBusquedaproducto_equivalente/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divproducto_equivalentePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblproducto_equivalentePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmproducto_equivalenteAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnproducto_equivalenteAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="producto_equivalente_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnproducto_equivalenteAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmproducto_equivalenteAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblproducto_equivalentePopupAjaxWebPart -->
		</div> <!-- divproducto_equivalentePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trproducto_equivalenteTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaproducto_equivalente"></a>
		<img id="imgTablaParaDerechaproducto_equivalente" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaproducto_equivalente'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaproducto_equivalente" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaproducto_equivalente'"/>
		<a id="TablaDerechaproducto_equivalente"></a>
	</td>
</tr> <!-- trproducto_equivalenteTablaNavegacion/super -->
<?php } ?>

<tr id="trproducto_equivalenteTablaDatos">
	<td colspan="3" id="htmlTableCellproducto_equivalente">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosproducto_equivalentesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trproducto_equivalenteTablaDatos/super -->
		
		
		<tr id="trproducto_equivalentePaginacion" style="display:table-row">
			<td id="tdproducto_equivalentePaginacion" align="center">
				<div id="divproducto_equivalentePaginacionAjaxWebPart">
				<form id="frmPaginacionproducto_equivalente" name="frmPaginacionproducto_equivalente">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionproducto_equivalente" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(producto_equivalente_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkproducto_equivalente" name="btnSeleccionarLoteFkproducto_equivalente" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false' /*&& producto_equivalente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresproducto_equivalente" name="btnAnterioresproducto_equivalente" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(producto_equivalente_web::$STR_ES_BUSQUEDA=='false' && producto_equivalente_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdproducto_equivalenteNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararproducto_equivalente" name="btnNuevoTablaPrepararproducto_equivalente" title="NUEVO Producto Equivalentes" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaproducto_equivalente" name="ParamsPaginar-txtNumeroNuevoTablaproducto_equivalente" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdproducto_equivalenteConEditarproducto_equivalente">
							<label>
								<input id="ParamsBuscar-chbConEditarproducto_equivalente" name="ParamsBuscar-chbConEditarproducto_equivalente" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false'/* && producto_equivalente_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesproducto_equivalente" name="btnSiguientesproducto_equivalente" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionproducto_equivalente -->
				</form> <!-- frmPaginacionproducto_equivalente -->
				<form id="frmNuevoPrepararproducto_equivalente" name="frmNuevoPrepararproducto_equivalente">
				<table id="tblNuevoPrepararproducto_equivalente" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trproducto_equivalenteNuevo" height="10">
						<?php if(producto_equivalente_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdproducto_equivalenteNuevo" align="center">
							<input type="button" id="btnNuevoPrepararproducto_equivalente" name="btnNuevoPrepararproducto_equivalente" title="NUEVO Producto Equivalentes" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdproducto_equivalenteGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosproducto_equivalente" name="btnGuardarCambiosproducto_equivalente" title="GUARDAR Producto Equivalentes" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false' && producto_equivalente_web::$STR_ES_RELACIONES=='false' && producto_equivalente_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdproducto_equivalenteDuplicar" align="center">
							<input type="button" id="btnDuplicarproducto_equivalente" name="btnDuplicarproducto_equivalente" title="DUPLICAR Producto Equivalentes" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdproducto_equivalenteCopiar" align="center">
							<input type="button" id="btnCopiarproducto_equivalente" name="btnCopiarproducto_equivalente" title="COPIAR Producto Equivalentes" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false' && ((producto_equivalente_web::$STR_ES_RELACIONADO=='false' && producto_equivalente_web::$STR_ES_RELACIONES=='false') || producto_equivalente_web::$STR_ES_BUSQUEDA=='true'  || producto_equivalente_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdproducto_equivalenteCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaproducto_equivalente" name="btnCerrarPaginaproducto_equivalente" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararproducto_equivalente -->
				</form> <!-- frmNuevoPrepararproducto_equivalente -->
				</div> <!-- divproducto_equivalentePaginacionAjaxWebPart -->
			</td> <!-- tdproducto_equivalentePaginacion -->
		</tr> <!-- trproducto_equivalentePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesproducto_equivalenteAjaxWebPart">
			<td id="tdAccionesRelacionesproducto_equivalenteAjaxWebPart">
				<div id="divAccionesRelacionesproducto_equivalenteAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesproducto_equivalenteAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesproducto_equivalenteAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByproducto_equivalente">
			<td id="tdOrderByproducto_equivalente">
				<form id="frmOrderByproducto_equivalente" name="frmOrderByproducto_equivalente">
					<div id="divOrderByproducto_equivalenteAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelproducto_equivalente" name="frmOrderByRelproducto_equivalente">
					<div id="divOrderByRelproducto_equivalenteAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByproducto_equivalente -->
		</tr> <!-- trOrderByproducto_equivalente/super -->
			
		
		
		
		
		
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
			
				import {producto_equivalente_webcontrol,producto_equivalente_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/producto_equivalente/js/webcontrol/producto_equivalente_webcontrol.js?random=1';
				
				producto_equivalente_webcontrol1.setproducto_equivalente_constante(window.producto_equivalente_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(producto_equivalente_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

