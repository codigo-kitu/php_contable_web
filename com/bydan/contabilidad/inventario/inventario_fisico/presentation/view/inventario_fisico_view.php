<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\inventario_fisico\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Inventario Fisico Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/inventario_fisico/util/inventario_fisico_carga.php');
	use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_carga;
	
	//include_once('com/bydan/contabilidad/inventario/inventario_fisico/presentation/view/inventario_fisico_web.php');
	//use com\bydan\contabilidad\inventario\inventario_fisico\presentation\view\inventario_fisico_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	inventario_fisico_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	inventario_fisico_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$inventario_fisico_web1= new inventario_fisico_web();	
	$inventario_fisico_web1->cargarDatosGenerales();
	
	//$moduloActual=$inventario_fisico_web1->moduloActual;
	//$usuarioActual=$inventario_fisico_web1->usuarioActual;
	//$sessionBase=$inventario_fisico_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$inventario_fisico_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/inventario_fisico/js/templating/inventario_fisico_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/inventario_fisico/js/templating/inventario_fisico_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/inventario_fisico/js/templating/inventario_fisico_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/inventario_fisico/js/templating/inventario_fisico_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/inventario_fisico/js/templating/inventario_fisico_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			inventario_fisico_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					inventario_fisico_web::$GET_POST=$_GET;
				} else {
					inventario_fisico_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			inventario_fisico_web::$STR_NOMBRE_PAGINA = 'inventario_fisico_view.php';
			inventario_fisico_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			inventario_fisico_web::$BIT_ES_PAGINA_FORM = 'false';
				
			inventario_fisico_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {inventario_fisico_constante,inventario_fisico_constante1} from './webroot/js/JavaScript/contabilidad/inventario/inventario_fisico/js/util/inventario_fisico_constante.js?random=1';
			import {inventario_fisico_funcion,inventario_fisico_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/inventario_fisico/js/util/inventario_fisico_funcion.js?random=1';
			
			let inventario_fisico_constante2 = new inventario_fisico_constante();
			
			inventario_fisico_constante2.STR_NOMBRE_PAGINA="<?php echo(inventario_fisico_web::$STR_NOMBRE_PAGINA); ?>";
			inventario_fisico_constante2.STR_TYPE_ON_LOADinventario_fisico="<?php echo(inventario_fisico_web::$STR_TYPE_ONLOAD); ?>";
			inventario_fisico_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(inventario_fisico_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			inventario_fisico_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(inventario_fisico_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			inventario_fisico_constante2.STR_ACTION="<?php echo(inventario_fisico_web::$STR_ACTION); ?>";
			inventario_fisico_constante2.STR_ES_POPUP="<?php echo(inventario_fisico_web::$STR_ES_POPUP); ?>";
			inventario_fisico_constante2.STR_ES_BUSQUEDA="<?php echo(inventario_fisico_web::$STR_ES_BUSQUEDA); ?>";
			inventario_fisico_constante2.STR_FUNCION_JS="<?php echo(inventario_fisico_web::$STR_FUNCION_JS); ?>";
			inventario_fisico_constante2.BIG_ID_ACTUAL="<?php echo(inventario_fisico_web::$BIG_ID_ACTUAL); ?>";
			inventario_fisico_constante2.BIG_ID_OPCION="<?php echo(inventario_fisico_web::$BIG_ID_OPCION); ?>";
			inventario_fisico_constante2.STR_OBJETO_JS="<?php echo(inventario_fisico_web::$STR_OBJETO_JS); ?>";
			inventario_fisico_constante2.STR_ES_RELACIONES="<?php echo(inventario_fisico_web::$STR_ES_RELACIONES); ?>";
			inventario_fisico_constante2.STR_ES_RELACIONADO="<?php echo(inventario_fisico_web::$STR_ES_RELACIONADO); ?>";
			inventario_fisico_constante2.STR_ES_SUB_PAGINA="<?php echo(inventario_fisico_web::$STR_ES_SUB_PAGINA); ?>";
			inventario_fisico_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(inventario_fisico_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			inventario_fisico_constante2.BIT_ES_PAGINA_FORM=<?php echo(inventario_fisico_web::$BIT_ES_PAGINA_FORM); ?>;
			inventario_fisico_constante2.STR_SUFIJO="<?php echo(inventario_fisico_web::$STR_SUF); ?>";//inventario_fisico
			inventario_fisico_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(inventario_fisico_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//inventario_fisico
			
			inventario_fisico_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(inventario_fisico_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			inventario_fisico_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($inventario_fisico_web1->moduloActual->getnombre()); ?>";
			inventario_fisico_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(inventario_fisico_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			inventario_fisico_constante2.BIT_ES_LOAD_NORMAL=true;
			/*inventario_fisico_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			inventario_fisico_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.inventario_fisico_constante2 = inventario_fisico_constante2;
			
		</script>
		
		<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.inventario_fisico_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.inventario_fisico_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="inventario_fisicoActual" ></a>
	
	<div id="divResumeninventario_fisicoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(inventario_fisico_web::$STR_ES_BUSQUEDA=='false' && inventario_fisico_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(inventario_fisico_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false' && inventario_fisico_web::$STR_ES_POPUP=='false' && inventario_fisico_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdinventario_fisicoNuevoToolBar">
										<img id="imgNuevoToolBarinventario_fisico" name="imgNuevoToolBarinventario_fisico" title="Nuevo Inventario Fisico" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(inventario_fisico_web::$STR_ES_BUSQUEDA=='false' && inventario_fisico_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdinventario_fisicoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarinventario_fisico" name="imgNuevoGuardarCambiosToolBarinventario_fisico" title="Nuevo TABLA Inventario Fisico" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(inventario_fisico_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdinventario_fisicoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarinventario_fisico" name="imgGuardarCambiosToolBarinventario_fisico" title="Guardar Inventario Fisico" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false' && inventario_fisico_web::$STR_ES_RELACIONES=='false' && inventario_fisico_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdinventario_fisicoCopiarToolBar">
										<img id="imgCopiarToolBarinventario_fisico" name="imgCopiarToolBarinventario_fisico" title="Copiar Inventario Fisico" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdinventario_fisicoDuplicarToolBar">
										<img id="imgDuplicarToolBarinventario_fisico" name="imgDuplicarToolBarinventario_fisico" title="Duplicar Inventario Fisico" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdinventario_fisicoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarinventario_fisico" name="imgRecargarInformacionToolBarinventario_fisico" title="Recargar Inventario Fisico" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdinventario_fisicoAnterioresToolBar">
										<img id="imgAnterioresToolBarinventario_fisico" name="imgAnterioresToolBarinventario_fisico" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdinventario_fisicoSiguientesToolBar">
										<img id="imgSiguientesToolBarinventario_fisico" name="imgSiguientesToolBarinventario_fisico" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdinventario_fisicoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarinventario_fisico" name="imgAbrirOrderByToolBarinventario_fisico" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((inventario_fisico_web::$STR_ES_RELACIONADO=='false' && inventario_fisico_web::$STR_ES_RELACIONES=='false') || inventario_fisico_web::$STR_ES_BUSQUEDA=='true'  || inventario_fisico_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdinventario_fisicoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarinventario_fisico" name="imgCerrarPaginaToolBarinventario_fisico" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trinventario_fisicoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedainventario_fisico" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedainventario_fisico',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trinventario_fisicoCabeceraBusquedas/super -->

		<tr id="trBusquedainventario_fisico" class="busqueda" style="display:table-row">
			<td id="tdBusquedainventario_fisico" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedainventario_fisico" name="frmBusquedainventario_fisico">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedainventario_fisico" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trinventario_fisicoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idbodega" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idbodega"> Por  Bodega</a></li>
						<li id="listrVisibleFK_Idinventario_fisico" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idinventario_fisico"> Por Inventario Fisico</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idbodega">
					<table id="tblstrVisibleFK_Idbodega" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Bodega</span>
						</td>
						<td align="center">
							<select id="FK_Idbodega-cmbid_bodega" name="FK_Idbodega-cmbid_bodega" title=" Bodega" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarinventario_fisicoFK_Idbodega" name="btnBuscarinventario_fisicoFK_Idbodega" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idinventario_fisico">
					<table id="tblstrVisibleFK_Idinventario_fisico" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Inventario Fisico</span>
						</td>
						<td align="center">
							<select id="FK_Idinventario_fisico-cmbid_inventario_fisico" name="FK_Idinventario_fisico-cmbid_inventario_fisico" title="Inventario Fisico" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarinventario_fisicoFK_Idinventario_fisico" name="btnBuscarinventario_fisicoFK_Idinventario_fisico" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarinventario_fisico" style="display:table-row">
					<td id="tdParamsBuscarinventario_fisico">
		<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarinventario_fisico">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosinventario_fisico" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosinventario_fisico"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosinventario_fisico" name="ParamsBuscar-txtNumeroRegistrosinventario_fisico" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioninventario_fisico">
							<td id="tdGenerarReporteinventario_fisico" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosinventario_fisico" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosinventario_fisico" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioninventario_fisico" name="btnRecargarInformacioninventario_fisico" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
											<input type="button" id="btnArbolinventario_fisico" name="btnArbolinventario_fisico" title="ARBOL" value="   Arbol" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginainventario_fisico" name="btnImprimirPaginainventario_fisico" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*inventario_fisico_web::$STR_ES_BUSQUEDA=='false'  &&*/ inventario_fisico_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByinventario_fisico">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByinventario_fisico" name="btnOrderByinventario_fisico" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelinventario_fisico" name="btnOrderByRelinventario_fisico" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(inventario_fisico_web::$STR_ES_RELACIONES=='false' && inventario_fisico_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(inventario_fisico_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdinventario_fisicoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosinventario_fisico -->

							</td><!-- tdGenerarReporteinventario_fisico -->
						</tr><!-- trRecargarInformacioninventario_fisico -->
					</table><!-- tblParamsBuscarNumeroRegistrosinventario_fisico -->
				</div> <!-- divParamsBuscarinventario_fisico -->
		<?php } ?>
				</td> <!-- tdParamsBuscarinventario_fisico -->
				</tr><!-- trParamsBuscarinventario_fisico -->
				</table> <!-- tblBusquedainventario_fisico -->
				</form> <!-- frmBusquedainventario_fisico -->
				

			</td> <!-- tdBusquedainventario_fisico -->
		</tr> <!-- trBusquedainventario_fisico/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divinventario_fisicoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblinventario_fisicoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frminventario_fisicoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btninventario_fisicoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="inventario_fisico_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btninventario_fisicoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frminventario_fisicoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblinventario_fisicoPopupAjaxWebPart -->
		</div> <!-- divinventario_fisicoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trinventario_fisicoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdainventario_fisico"></a>
		<img id="imgTablaParaDerechainventario_fisico" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechainventario_fisico'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdainventario_fisico" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdainventario_fisico'"/>
		<a id="TablaDerechainventario_fisico"></a>
	</td>
</tr> <!-- trinventario_fisicoTablaNavegacion/super -->
<?php } ?>

<tr id="trinventario_fisicoTablaDatos">
	<td colspan="3" id="htmlTableCellinventario_fisico">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosinventario_fisicosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trinventario_fisicoTablaDatos/super -->
		
		
		<tr id="trinventario_fisicoPaginacion" style="display:table-row">
			<td id="tdinventario_fisicoPaginacion" align="left">
				<div id="divinventario_fisicoPaginacionAjaxWebPart">
				<form id="frmPaginacioninventario_fisico" name="frmPaginacioninventario_fisico">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioninventario_fisico" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(inventario_fisico_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkinventario_fisico" name="btnSeleccionarLoteFkinventario_fisico" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false' /*&& inventario_fisico_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresinventario_fisico" name="btnAnterioresinventario_fisico" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(inventario_fisico_web::$STR_ES_BUSQUEDA=='false' && inventario_fisico_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdinventario_fisicoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararinventario_fisico" name="btnNuevoTablaPrepararinventario_fisico" title="NUEVO Inventario Fisico" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablainventario_fisico" name="ParamsPaginar-txtNumeroNuevoTablainventario_fisico" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdinventario_fisicoConEditarinventario_fisico">
							<label>
								<input id="ParamsBuscar-chbConEditarinventario_fisico" name="ParamsBuscar-chbConEditarinventario_fisico" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false'/* && inventario_fisico_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesinventario_fisico" name="btnSiguientesinventario_fisico" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioninventario_fisico -->
				</form> <!-- frmPaginacioninventario_fisico -->
				<form id="frmNuevoPrepararinventario_fisico" name="frmNuevoPrepararinventario_fisico">
				<table id="tblNuevoPrepararinventario_fisico" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trinventario_fisicoNuevo" height="10">
						<?php if(inventario_fisico_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdinventario_fisicoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararinventario_fisico" name="btnNuevoPrepararinventario_fisico" title="NUEVO Inventario Fisico" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdinventario_fisicoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosinventario_fisico" name="btnGuardarCambiosinventario_fisico" title="GUARDAR Inventario Fisico" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false' && inventario_fisico_web::$STR_ES_RELACIONES=='false' && inventario_fisico_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdinventario_fisicoDuplicar" align="center">
							<input type="button" id="btnDuplicarinventario_fisico" name="btnDuplicarinventario_fisico" title="DUPLICAR Inventario Fisico" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdinventario_fisicoCopiar" align="center">
							<input type="button" id="btnCopiarinventario_fisico" name="btnCopiarinventario_fisico" title="COPIAR Inventario Fisico" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false' && ((inventario_fisico_web::$STR_ES_RELACIONADO=='false' && inventario_fisico_web::$STR_ES_RELACIONES=='false') || inventario_fisico_web::$STR_ES_BUSQUEDA=='true'  || inventario_fisico_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdinventario_fisicoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginainventario_fisico" name="btnCerrarPaginainventario_fisico" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararinventario_fisico -->
				</form> <!-- frmNuevoPrepararinventario_fisico -->
				</div> <!-- divinventario_fisicoPaginacionAjaxWebPart -->
			</td> <!-- tdinventario_fisicoPaginacion -->
		</tr> <!-- trinventario_fisicoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesinventario_fisicoAjaxWebPart">
			<td id="tdAccionesRelacionesinventario_fisicoAjaxWebPart">
				<div id="divAccionesRelacionesinventario_fisicoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesinventario_fisicoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesinventario_fisicoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByinventario_fisico">
			<td id="tdOrderByinventario_fisico">
				<form id="frmOrderByinventario_fisico" name="frmOrderByinventario_fisico">
					<div id="divOrderByinventario_fisicoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelinventario_fisico" name="frmOrderByRelinventario_fisico">
					<div id="divOrderByRelinventario_fisicoAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByinventario_fisico -->
		</tr> <!-- trOrderByinventario_fisico/super -->
			
		
		
		
		
		
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
			
				import {inventario_fisico_webcontrol,inventario_fisico_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/inventario_fisico/js/webcontrol/inventario_fisico_webcontrol.js?random=1';
				
				inventario_fisico_webcontrol1.setinventario_fisico_constante(window.inventario_fisico_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(inventario_fisico_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

