<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\parametro_inventario\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Parametro Inventario Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/inventario/parametro_inventario/util/parametro_inventario_carga.php');
	use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_carga;
	
	//include_once('com/bydan/contabilidad/inventario/parametro_inventario/presentation/view/parametro_inventario_web.php');
	//use com\bydan\contabilidad\inventario\parametro_inventario\presentation\view\parametro_inventario_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	parametro_inventario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	parametro_inventario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$parametro_inventario_web1= new parametro_inventario_web();	
	$parametro_inventario_web1->cargarDatosGenerales();
	
	//$moduloActual=$parametro_inventario_web1->moduloActual;
	//$usuarioActual=$parametro_inventario_web1->usuarioActual;
	//$sessionBase=$parametro_inventario_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$parametro_inventario_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/parametro_inventario/js/templating/parametro_inventario_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/parametro_inventario/js/templating/parametro_inventario_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/parametro_inventario/js/templating/parametro_inventario_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/inventario/parametro_inventario/js/templating/parametro_inventario_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			parametro_inventario_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					parametro_inventario_web::$GET_POST=$_GET;
				} else {
					parametro_inventario_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			parametro_inventario_web::$STR_NOMBRE_PAGINA = 'parametro_inventario_view.php';
			parametro_inventario_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			parametro_inventario_web::$BIT_ES_PAGINA_FORM = 'false';
				
			parametro_inventario_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {parametro_inventario_constante,parametro_inventario_constante1} from './webroot/js/JavaScript/contabilidad/inventario/parametro_inventario/js/util/parametro_inventario_constante.js?random=1';
			import {parametro_inventario_funcion,parametro_inventario_funcion1} from './webroot/js/JavaScript/contabilidad/inventario/parametro_inventario/js/util/parametro_inventario_funcion.js?random=1';
			
			let parametro_inventario_constante2 = new parametro_inventario_constante();
			
			parametro_inventario_constante2.STR_NOMBRE_PAGINA="<?php echo(parametro_inventario_web::$STR_NOMBRE_PAGINA); ?>";
			parametro_inventario_constante2.STR_TYPE_ON_LOADparametro_inventario="<?php echo(parametro_inventario_web::$STR_TYPE_ONLOAD); ?>";
			parametro_inventario_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(parametro_inventario_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			parametro_inventario_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(parametro_inventario_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			parametro_inventario_constante2.STR_ACTION="<?php echo(parametro_inventario_web::$STR_ACTION); ?>";
			parametro_inventario_constante2.STR_ES_POPUP="<?php echo(parametro_inventario_web::$STR_ES_POPUP); ?>";
			parametro_inventario_constante2.STR_ES_BUSQUEDA="<?php echo(parametro_inventario_web::$STR_ES_BUSQUEDA); ?>";
			parametro_inventario_constante2.STR_FUNCION_JS="<?php echo(parametro_inventario_web::$STR_FUNCION_JS); ?>";
			parametro_inventario_constante2.BIG_ID_ACTUAL="<?php echo(parametro_inventario_web::$BIG_ID_ACTUAL); ?>";
			parametro_inventario_constante2.BIG_ID_OPCION="<?php echo(parametro_inventario_web::$BIG_ID_OPCION); ?>";
			parametro_inventario_constante2.STR_OBJETO_JS="<?php echo(parametro_inventario_web::$STR_OBJETO_JS); ?>";
			parametro_inventario_constante2.STR_ES_RELACIONES="<?php echo(parametro_inventario_web::$STR_ES_RELACIONES); ?>";
			parametro_inventario_constante2.STR_ES_RELACIONADO="<?php echo(parametro_inventario_web::$STR_ES_RELACIONADO); ?>";
			parametro_inventario_constante2.STR_ES_SUB_PAGINA="<?php echo(parametro_inventario_web::$STR_ES_SUB_PAGINA); ?>";
			parametro_inventario_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(parametro_inventario_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			parametro_inventario_constante2.BIT_ES_PAGINA_FORM=<?php echo(parametro_inventario_web::$BIT_ES_PAGINA_FORM); ?>;
			parametro_inventario_constante2.STR_SUFIJO="<?php echo(parametro_inventario_web::$STR_SUF); ?>";//parametro_inventario
			parametro_inventario_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(parametro_inventario_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//parametro_inventario
			
			parametro_inventario_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(parametro_inventario_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			parametro_inventario_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($parametro_inventario_web1->moduloActual->getnombre()); ?>";
			parametro_inventario_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(parametro_inventario_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			parametro_inventario_constante2.BIT_ES_LOAD_NORMAL=true;
			/*parametro_inventario_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			parametro_inventario_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.parametro_inventario_constante2 = parametro_inventario_constante2;
			
		</script>
		
		<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.parametro_inventario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.parametro_inventario_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="parametro_inventarioActual" ></a>
	
	<div id="divResumenparametro_inventarioActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(parametro_inventario_web::$STR_ES_BUSQUEDA=='false' && parametro_inventario_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(parametro_inventario_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false' && parametro_inventario_web::$STR_ES_POPUP=='false' && parametro_inventario_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdparametro_inventarioNuevoToolBar">
										<img id="imgNuevoToolBarparametro_inventario" name="imgNuevoToolBarparametro_inventario" title="Nuevo Parametro Inventario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(parametro_inventario_web::$STR_ES_BUSQUEDA=='false' && parametro_inventario_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdparametro_inventarioNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarparametro_inventario" name="imgNuevoGuardarCambiosToolBarparametro_inventario" title="Nuevo TABLA Parametro Inventario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_inventario_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdparametro_inventarioGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarparametro_inventario" name="imgGuardarCambiosToolBarparametro_inventario" title="Guardar Parametro Inventario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false' && parametro_inventario_web::$STR_ES_RELACIONES=='false' && parametro_inventario_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdparametro_inventarioCopiarToolBar">
										<img id="imgCopiarToolBarparametro_inventario" name="imgCopiarToolBarparametro_inventario" title="Copiar Parametro Inventario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_inventarioDuplicarToolBar">
										<img id="imgDuplicarToolBarparametro_inventario" name="imgDuplicarToolBarparametro_inventario" title="Duplicar Parametro Inventario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdparametro_inventarioRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarparametro_inventario" name="imgRecargarInformacionToolBarparametro_inventario" title="Recargar Parametro Inventario" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_inventarioAnterioresToolBar">
										<img id="imgAnterioresToolBarparametro_inventario" name="imgAnterioresToolBarparametro_inventario" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_inventarioSiguientesToolBar">
										<img id="imgSiguientesToolBarparametro_inventario" name="imgSiguientesToolBarparametro_inventario" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_inventarioAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarparametro_inventario" name="imgAbrirOrderByToolBarparametro_inventario" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((parametro_inventario_web::$STR_ES_RELACIONADO=='false' && parametro_inventario_web::$STR_ES_RELACIONES=='false') || parametro_inventario_web::$STR_ES_BUSQUEDA=='true'  || parametro_inventario_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdparametro_inventarioCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarparametro_inventario" name="imgCerrarPaginaToolBarparametro_inventario" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trparametro_inventarioCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaparametro_inventario" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaparametro_inventario',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trparametro_inventarioCabeceraBusquedas/super -->

		<tr id="trBusquedaparametro_inventario" class="busqueda" style="display:table-row">
			<td id="tdBusquedaparametro_inventario" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaparametro_inventario" name="frmBusquedaparametro_inventario">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaparametro_inventario" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trparametro_inventarioBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idtermino_pago_proveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtermino_pago_proveedor"> Por  Termino Pago Proveedor</a></li>
						<li id="listrVisibleFK_Idtipo_costeo_kardex" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_costeo_kardex"> Por  Tipo Costeo Kardex</a></li>
						<li id="listrVisibleFK_Idtipo_kardex" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtipo_kardex"> Por  Tipo Kardex</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idtermino_pago_proveedor">
					<table id="tblstrVisibleFK_Idtermino_pago_proveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Termino Pago Proveedor</span>
						</td>
						<td align="center">
							<select id="FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor" name="FK_Idtermino_pago_proveedor-cmbid_termino_pago_proveedor" title=" Termino Pago Proveedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarparametro_inventarioFK_Idtermino_pago_proveedor" name="btnBuscarparametro_inventarioFK_Idtermino_pago_proveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_costeo_kardex">
					<table id="tblstrVisibleFK_Idtipo_costeo_kardex" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Tipo Costeo Kardex</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_costeo_kardex-cmbid_tipo_costeo_kardex" name="FK_Idtipo_costeo_kardex-cmbid_tipo_costeo_kardex" title=" Tipo Costeo Kardex" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarparametro_inventarioFK_Idtipo_costeo_kardex" name="btnBuscarparametro_inventarioFK_Idtipo_costeo_kardex" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtipo_kardex">
					<table id="tblstrVisibleFK_Idtipo_kardex" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Tipo Kardex</span>
						</td>
						<td align="center">
							<select id="FK_Idtipo_kardex-cmbid_tipo_kardex" name="FK_Idtipo_kardex-cmbid_tipo_kardex" title=" Tipo Kardex" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarparametro_inventarioFK_Idtipo_kardex" name="btnBuscarparametro_inventarioFK_Idtipo_kardex" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarparametro_inventario" style="display:table-row">
					<td id="tdParamsBuscarparametro_inventario">
		<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarparametro_inventario">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosparametro_inventario" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosparametro_inventario"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosparametro_inventario" name="ParamsBuscar-txtNumeroRegistrosparametro_inventario" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionparametro_inventario">
							<td id="tdGenerarReporteparametro_inventario" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosparametro_inventario" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosparametro_inventario" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionparametro_inventario" name="btnRecargarInformacionparametro_inventario" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaparametro_inventario" name="btnImprimirPaginaparametro_inventario" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*parametro_inventario_web::$STR_ES_BUSQUEDA=='false'  &&*/ parametro_inventario_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByparametro_inventario">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByparametro_inventario" name="btnOrderByparametro_inventario" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(parametro_inventario_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdparametro_inventarioConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosparametro_inventario -->

							</td><!-- tdGenerarReporteparametro_inventario -->
						</tr><!-- trRecargarInformacionparametro_inventario -->
					</table><!-- tblParamsBuscarNumeroRegistrosparametro_inventario -->
				</div> <!-- divParamsBuscarparametro_inventario -->
		<?php } ?>
				</td> <!-- tdParamsBuscarparametro_inventario -->
				</tr><!-- trParamsBuscarparametro_inventario -->
				</table> <!-- tblBusquedaparametro_inventario -->
				</form> <!-- frmBusquedaparametro_inventario -->
				

			</td> <!-- tdBusquedaparametro_inventario -->
		</tr> <!-- trBusquedaparametro_inventario/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divparametro_inventarioPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblparametro_inventarioPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmparametro_inventarioAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnparametro_inventarioAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="parametro_inventario_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnparametro_inventarioAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmparametro_inventarioAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblparametro_inventarioPopupAjaxWebPart -->
		</div> <!-- divparametro_inventarioPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trparametro_inventarioTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaparametro_inventario"></a>
		<img id="imgTablaParaDerechaparametro_inventario" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaparametro_inventario'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaparametro_inventario" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaparametro_inventario'"/>
		<a id="TablaDerechaparametro_inventario"></a>
	</td>
</tr> <!-- trparametro_inventarioTablaNavegacion/super -->
<?php } ?>

<tr id="trparametro_inventarioTablaDatos">
	<td colspan="3" id="htmlTableCellparametro_inventario">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosparametro_inventariosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trparametro_inventarioTablaDatos/super -->
		
		
		<tr id="trparametro_inventarioPaginacion" style="display:table-row">
			<td id="tdparametro_inventarioPaginacion" align="left">
				<div id="divparametro_inventarioPaginacionAjaxWebPart">
				<form id="frmPaginacionparametro_inventario" name="frmPaginacionparametro_inventario">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionparametro_inventario" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(parametro_inventario_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkparametro_inventario" name="btnSeleccionarLoteFkparametro_inventario" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false' /*&& parametro_inventario_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresparametro_inventario" name="btnAnterioresparametro_inventario" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(parametro_inventario_web::$STR_ES_BUSQUEDA=='false' && parametro_inventario_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdparametro_inventarioNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararparametro_inventario" name="btnNuevoTablaPrepararparametro_inventario" title="NUEVO Parametro Inventario" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaparametro_inventario" name="ParamsPaginar-txtNumeroNuevoTablaparametro_inventario" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdparametro_inventarioConEditarparametro_inventario">
							<label>
								<input id="ParamsBuscar-chbConEditarparametro_inventario" name="ParamsBuscar-chbConEditarparametro_inventario" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false'/* && parametro_inventario_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesparametro_inventario" name="btnSiguientesparametro_inventario" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionparametro_inventario -->
				</form> <!-- frmPaginacionparametro_inventario -->
				<form id="frmNuevoPrepararparametro_inventario" name="frmNuevoPrepararparametro_inventario">
				<table id="tblNuevoPrepararparametro_inventario" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trparametro_inventarioNuevo" height="10">
						<?php if(parametro_inventario_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdparametro_inventarioNuevo" align="center">
							<input type="button" id="btnNuevoPrepararparametro_inventario" name="btnNuevoPrepararparametro_inventario" title="NUEVO Parametro Inventario" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdparametro_inventarioGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosparametro_inventario" name="btnGuardarCambiosparametro_inventario" title="GUARDAR Parametro Inventario" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false' && parametro_inventario_web::$STR_ES_RELACIONES=='false' && parametro_inventario_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdparametro_inventarioDuplicar" align="center">
							<input type="button" id="btnDuplicarparametro_inventario" name="btnDuplicarparametro_inventario" title="DUPLICAR Parametro Inventario" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdparametro_inventarioCopiar" align="center">
							<input type="button" id="btnCopiarparametro_inventario" name="btnCopiarparametro_inventario" title="COPIAR Parametro Inventario" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false' && ((parametro_inventario_web::$STR_ES_RELACIONADO=='false' && parametro_inventario_web::$STR_ES_RELACIONES=='false') || parametro_inventario_web::$STR_ES_BUSQUEDA=='true'  || parametro_inventario_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdparametro_inventarioCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaparametro_inventario" name="btnCerrarPaginaparametro_inventario" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararparametro_inventario -->
				</form> <!-- frmNuevoPrepararparametro_inventario -->
				</div> <!-- divparametro_inventarioPaginacionAjaxWebPart -->
			</td> <!-- tdparametro_inventarioPaginacion -->
		</tr> <!-- trparametro_inventarioPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesparametro_inventarioAjaxWebPart">
			<td id="tdAccionesRelacionesparametro_inventarioAjaxWebPart">
				<div id="divAccionesRelacionesparametro_inventarioAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesparametro_inventarioAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesparametro_inventarioAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByparametro_inventario">
			<td id="tdOrderByparametro_inventario">
				<form id="frmOrderByparametro_inventario" name="frmOrderByparametro_inventario">
					<div id="divOrderByparametro_inventarioAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByparametro_inventario -->
		</tr> <!-- trOrderByparametro_inventario/super -->
			
		
		
		
		
		
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
			
				import {parametro_inventario_webcontrol,parametro_inventario_webcontrol1} from './webroot/js/JavaScript/contabilidad/inventario/parametro_inventario/js/webcontrol/parametro_inventario_webcontrol.js?random=1';
				
				parametro_inventario_webcontrol1.setparametro_inventario_constante(window.parametro_inventario_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(parametro_inventario_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

