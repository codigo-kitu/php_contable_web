<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\orden_compra\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Orden Compra Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/orden_compra/util/orden_compra_carga.php');
	use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
	
	//include_once('com/bydan/contabilidad/inventario/orden_compra/presentation/view/orden_compra_web.php');
	//use com\bydan\contabilidad\inventario\orden_compra\presentation\view\orden_compra_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	orden_compra_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	orden_compra_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$orden_compra_web1= new orden_compra_web();	
	$orden_compra_web1->cargarDatosGenerales();
	
	//$moduloActual=$orden_compra_web1->moduloActual;
	//$usuarioActual=$orden_compra_web1->usuarioActual;
	//$sessionBase=$orden_compra_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$orden_compra_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/orden_compra/js/templating/orden_compra_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/orden_compra/js/templating/orden_compra_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/orden_compra/js/templating/orden_compra_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/orden_compra/js/templating/orden_compra_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/orden_compra/js/templating/orden_compra_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			orden_compra_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					orden_compra_web::$GET_POST=$_GET;
				} else {
					orden_compra_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			orden_compra_web::$STR_NOMBRE_PAGINA = 'orden_compra_view.php';
			orden_compra_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			orden_compra_web::$BIT_ES_PAGINA_FORM = 'false';
				
			orden_compra_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {orden_compra_constante,orden_compra_constante1} from './webroot/js/JavaScript/contabilidad/inventario/orden_compra/js/util/orden_compra_constante.js?random=1';
			import {orden_compra_funcion,orden_compra_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/orden_compra/js/util/orden_compra_funcion.js?random=1';
			
			let orden_compra_constante2 = new orden_compra_constante();
			
			orden_compra_constante2.STR_NOMBRE_PAGINA="<?php echo(orden_compra_web::$STR_NOMBRE_PAGINA); ?>";
			orden_compra_constante2.STR_TYPE_ON_LOADorden_compra="<?php echo(orden_compra_web::$STR_TYPE_ONLOAD); ?>";
			orden_compra_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(orden_compra_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			orden_compra_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(orden_compra_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			orden_compra_constante2.STR_ACTION="<?php echo(orden_compra_web::$STR_ACTION); ?>";
			orden_compra_constante2.STR_ES_POPUP="<?php echo(orden_compra_web::$STR_ES_POPUP); ?>";
			orden_compra_constante2.STR_ES_BUSQUEDA="<?php echo(orden_compra_web::$STR_ES_BUSQUEDA); ?>";
			orden_compra_constante2.STR_FUNCION_JS="<?php echo(orden_compra_web::$STR_FUNCION_JS); ?>";
			orden_compra_constante2.BIG_ID_ACTUAL="<?php echo(orden_compra_web::$BIG_ID_ACTUAL); ?>";
			orden_compra_constante2.BIG_ID_OPCION="<?php echo(orden_compra_web::$BIG_ID_OPCION); ?>";
			orden_compra_constante2.STR_OBJETO_JS="<?php echo(orden_compra_web::$STR_OBJETO_JS); ?>";
			orden_compra_constante2.STR_ES_RELACIONES="<?php echo(orden_compra_web::$STR_ES_RELACIONES); ?>";
			orden_compra_constante2.STR_ES_RELACIONADO="<?php echo(orden_compra_web::$STR_ES_RELACIONADO); ?>";
			orden_compra_constante2.STR_ES_SUB_PAGINA="<?php echo(orden_compra_web::$STR_ES_SUB_PAGINA); ?>";
			orden_compra_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(orden_compra_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			orden_compra_constante2.BIT_ES_PAGINA_FORM=<?php echo(orden_compra_web::$BIT_ES_PAGINA_FORM); ?>;
			orden_compra_constante2.STR_SUFIJO="<?php echo(orden_compra_web::$STR_SUF); ?>";//orden_compra
			orden_compra_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(orden_compra_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//orden_compra
			
			orden_compra_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(orden_compra_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			orden_compra_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($orden_compra_web1->moduloActual->getnombre()); ?>";
			orden_compra_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(orden_compra_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			orden_compra_constante2.BIT_ES_LOAD_NORMAL=true;
			/*orden_compra_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			orden_compra_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.orden_compra_constante2 = orden_compra_constante2;
			
		</script>
		
		<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.orden_compra_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.orden_compra_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="orden_compraActual" ></a>
	
	<div id="divResumenorden_compraActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(orden_compra_web::$STR_ES_BUSQUEDA=='false' && orden_compra_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(orden_compra_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false' && orden_compra_web::$STR_ES_POPUP=='false' && orden_compra_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdorden_compraNuevoToolBar">
										<img id="imgNuevoToolBarorden_compra" name="imgNuevoToolBarorden_compra" title="Nuevo Orden Compra" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(orden_compra_web::$STR_ES_BUSQUEDA=='false' && orden_compra_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdorden_compraNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarorden_compra" name="imgNuevoGuardarCambiosToolBarorden_compra" title="Nuevo TABLA Orden Compra" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(orden_compra_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdorden_compraGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarorden_compra" name="imgGuardarCambiosToolBarorden_compra" title="Guardar Orden Compra" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false' && orden_compra_web::$STR_ES_RELACIONES=='false' && orden_compra_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdorden_compraCopiarToolBar">
										<img id="imgCopiarToolBarorden_compra" name="imgCopiarToolBarorden_compra" title="Copiar Orden Compra" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdorden_compraDuplicarToolBar">
										<img id="imgDuplicarToolBarorden_compra" name="imgDuplicarToolBarorden_compra" title="Duplicar Orden Compra" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdorden_compraRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarorden_compra" name="imgRecargarInformacionToolBarorden_compra" title="Recargar Orden Compra" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdorden_compraAnterioresToolBar">
										<img id="imgAnterioresToolBarorden_compra" name="imgAnterioresToolBarorden_compra" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdorden_compraSiguientesToolBar">
										<img id="imgSiguientesToolBarorden_compra" name="imgSiguientesToolBarorden_compra" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdorden_compraAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarorden_compra" name="imgAbrirOrderByToolBarorden_compra" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((orden_compra_web::$STR_ES_RELACIONADO=='false' && orden_compra_web::$STR_ES_RELACIONES=='false') || orden_compra_web::$STR_ES_BUSQUEDA=='true'  || orden_compra_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdorden_compraCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarorden_compra" name="imgCerrarPaginaToolBarorden_compra" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trorden_compraCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaorden_compra" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaorden_compra',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trorden_compraCabeceraBusquedas/super -->

		<tr id="trBusquedaorden_compra" class="busqueda" style="display:table-row">
			<td id="tdBusquedaorden_compra" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaorden_compra" name="frmBusquedaorden_compra">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaorden_compra" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trorden_compraBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 95%">
					<ul>
						<li id="listrVisibleFK_Idasiento" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idasiento"> Por Asiento</a></li>
						<li id="listrVisibleFK_Iddocumento_cuenta_pagar" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Iddocumento_cuenta_pagar"> Por Docuemento Cuenta por Pagar</a></li>
						<li id="listrVisibleFK_Idestado" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado"> Por Estado</a></li>
						<li id="listrVisibleFK_Idkardex" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idkardex"> Por Kardex</a></li>
						<li id="listrVisibleFK_Idmoneda" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idmoneda"> Por Moneda</a></li>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por Proveedor</a></li>
						<li id="listrVisibleFK_Idtermino_pago" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtermino_pago"> Por Terminos Pago</a></li>
						<li id="listrVisibleFK_Idvendedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idvendedor"> Por  Vendedor</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idasiento">
					<table id="tblstrVisibleFK_Idasiento" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Asiento</span>
						</td>
						<td align="center">
							<select id="FK_Idasiento-cmbid_asiento" name="FK_Idasiento-cmbid_asiento" title="Asiento" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarorden_compraFK_Idasiento" name="btnBuscarorden_compraFK_Idasiento" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Iddocumento_cuenta_pagar">
					<table id="tblstrVisibleFK_Iddocumento_cuenta_pagar" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Docuemento Cuenta por Pagar</span>
						</td>
						<td align="center">
							<select id="FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar" name="FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar" title="Docuemento Cuenta por Pagar" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarorden_compraFK_Iddocumento_cuenta_pagar" name="btnBuscarorden_compraFK_Iddocumento_cuenta_pagar" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarorden_compraFK_Idestado" name="btnBuscarorden_compraFK_Idestado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idkardex">
					<table id="tblstrVisibleFK_Idkardex" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Kardex</span>
						</td>
						<td align="center">
							<select id="FK_Idkardex-cmbid_kardex" name="FK_Idkardex-cmbid_kardex" title="Kardex" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarorden_compraFK_Idkardex" name="btnBuscarorden_compraFK_Idkardex" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idmoneda">
					<table id="tblstrVisibleFK_Idmoneda" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Moneda</span>
						</td>
						<td align="center">
							<select id="FK_Idmoneda-cmbid_moneda" name="FK_Idmoneda-cmbid_moneda" title="Moneda" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarorden_compraFK_Idmoneda" name="btnBuscarorden_compraFK_Idmoneda" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproveedor">
					<table id="tblstrVisibleFK_Idproveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Proveedor</span>
						</td>
						<td align="center">
							<select id="FK_Idproveedor-cmbid_proveedor" name="FK_Idproveedor-cmbid_proveedor" title="Proveedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarorden_compraFK_Idproveedor" name="btnBuscarorden_compraFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<select id="FK_Idtermino_pago-cmbid_termino_pago_proveedor" name="FK_Idtermino_pago-cmbid_termino_pago_proveedor" title="Terminos Pago" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarorden_compraFK_Idtermino_pago" name="btnBuscarorden_compraFK_Idtermino_pago" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idvendedor">
					<table id="tblstrVisibleFK_Idvendedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Vendedor</span>
						</td>
						<td align="center">
							<select id="FK_Idvendedor-cmbid_vendedor" name="FK_Idvendedor-cmbid_vendedor" title=" Vendedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarorden_compraFK_Idvendedor" name="btnBuscarorden_compraFK_Idvendedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarorden_compra" style="display:table-row">
					<td id="tdParamsBuscarorden_compra">
		<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarorden_compra">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosorden_compra" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosorden_compra"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosorden_compra" name="ParamsBuscar-txtNumeroRegistrosorden_compra" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionorden_compra">
							<td id="tdGenerarReporteorden_compra" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosorden_compra" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosorden_compra" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionorden_compra" name="btnRecargarInformacionorden_compra" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaorden_compra" name="btnImprimirPaginaorden_compra" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*orden_compra_web::$STR_ES_BUSQUEDA=='false'  &&*/ orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByorden_compra">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByorden_compra" name="btnOrderByorden_compra" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelorden_compra" name="btnOrderByRelorden_compra" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(orden_compra_web::$STR_ES_RELACIONES=='false' && orden_compra_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(orden_compra_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdorden_compraConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosorden_compra -->

							</td><!-- tdGenerarReporteorden_compra -->
						</tr><!-- trRecargarInformacionorden_compra -->
					</table><!-- tblParamsBuscarNumeroRegistrosorden_compra -->
				</div> <!-- divParamsBuscarorden_compra -->
		<?php } ?>
				</td> <!-- tdParamsBuscarorden_compra -->
				</tr><!-- trParamsBuscarorden_compra -->
				</table> <!-- tblBusquedaorden_compra -->
				</form> <!-- frmBusquedaorden_compra -->
				

			</td> <!-- tdBusquedaorden_compra -->
		</tr> <!-- trBusquedaorden_compra/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divorden_compraPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblorden_compraPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmorden_compraAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnorden_compraAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="orden_compra_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnorden_compraAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmorden_compraAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblorden_compraPopupAjaxWebPart -->
		</div> <!-- divorden_compraPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trorden_compraTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaorden_compra"></a>
		<img id="imgTablaParaDerechaorden_compra" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaorden_compra'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaorden_compra" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaorden_compra'"/>
		<a id="TablaDerechaorden_compra"></a>
	</td>
</tr> <!-- trorden_compraTablaNavegacion/super -->
<?php } ?>

<tr id="trorden_compraTablaDatos">
	<td colspan="3" id="htmlTableCellorden_compra">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosorden_comprasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trorden_compraTablaDatos/super -->
		
		
		<tr id="trorden_compraPaginacion" style="display:table-row">
			<td id="tdorden_compraPaginacion" align="left">
				<div id="divorden_compraPaginacionAjaxWebPart">
				<form id="frmPaginacionorden_compra" name="frmPaginacionorden_compra">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionorden_compra" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(orden_compra_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkorden_compra" name="btnSeleccionarLoteFkorden_compra" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false' /*&& orden_compra_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresorden_compra" name="btnAnterioresorden_compra" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(orden_compra_web::$STR_ES_BUSQUEDA=='false' && orden_compra_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdorden_compraNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararorden_compra" name="btnNuevoTablaPrepararorden_compra" title="NUEVO Orden Compra" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaorden_compra" name="ParamsPaginar-txtNumeroNuevoTablaorden_compra" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(orden_compra_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdorden_compraConEditarorden_compra">
							<label>
								<input id="ParamsBuscar-chbConEditarorden_compra" name="ParamsBuscar-chbConEditarorden_compra" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false'/* && orden_compra_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesorden_compra" name="btnSiguientesorden_compra" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionorden_compra -->
				</form> <!-- frmPaginacionorden_compra -->
				<form id="frmNuevoPrepararorden_compra" name="frmNuevoPrepararorden_compra">
				<table id="tblNuevoPrepararorden_compra" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trorden_compraNuevo" height="10">
						<?php if(orden_compra_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdorden_compraNuevo" align="center">
							<input type="button" id="btnNuevoPrepararorden_compra" name="btnNuevoPrepararorden_compra" title="NUEVO Orden Compra" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdorden_compraGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosorden_compra" name="btnGuardarCambiosorden_compra" title="GUARDAR Orden Compra" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false' && orden_compra_web::$STR_ES_RELACIONES=='false' && orden_compra_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdorden_compraDuplicar" align="center">
							<input type="button" id="btnDuplicarorden_compra" name="btnDuplicarorden_compra" title="DUPLICAR Orden Compra" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdorden_compraCopiar" align="center">
							<input type="button" id="btnCopiarorden_compra" name="btnCopiarorden_compra" title="COPIAR Orden Compra" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false' && ((orden_compra_web::$STR_ES_RELACIONADO=='false' && orden_compra_web::$STR_ES_RELACIONES=='false') || orden_compra_web::$STR_ES_BUSQUEDA=='true'  || orden_compra_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdorden_compraCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaorden_compra" name="btnCerrarPaginaorden_compra" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararorden_compra -->
				</form> <!-- frmNuevoPrepararorden_compra -->
				</div> <!-- divorden_compraPaginacionAjaxWebPart -->
			</td> <!-- tdorden_compraPaginacion -->
		</tr> <!-- trorden_compraPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesorden_compraAjaxWebPart">
			<td id="tdAccionesRelacionesorden_compraAjaxWebPart">
				<div id="divAccionesRelacionesorden_compraAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesorden_compraAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesorden_compraAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByorden_compra">
			<td id="tdOrderByorden_compra">
				<form id="frmOrderByorden_compra" name="frmOrderByorden_compra">
					<div id="divOrderByorden_compraAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelorden_compra" name="frmOrderByRelorden_compra">
					<div id="divOrderByRelorden_compraAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByorden_compra -->
		</tr> <!-- trOrderByorden_compra/super -->
			
		
		
		
		
		
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
			
				import {orden_compra_webcontrol,orden_compra_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/orden_compra/js/webcontrol/orden_compra_webcontrol.js?random=1';
				
				orden_compra_webcontrol1.setorden_compra_constante(window.orden_compra_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(orden_compra_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

