<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\parametro_general\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Parametro General Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/parametro_general/util/parametro_general_carga.php');
	use com\bydan\contabilidad\general\parametro_general\util\parametro_general_carga;
	
	//include_once('com/bydan/contabilidad/general/parametro_general/presentation/view/parametro_general_web.php');
	//use com\bydan\contabilidad\general\parametro_general\presentation\view\parametro_general_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	parametro_general_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	parametro_general_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$parametro_general_web1= new parametro_general_web();	
	$parametro_general_web1->cargarDatosGenerales();
	
	//$moduloActual=$parametro_general_web1->moduloActual;
	//$usuarioActual=$parametro_general_web1->usuarioActual;
	//$sessionBase=$parametro_general_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$parametro_general_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/parametro_general/js/templating/parametro_general_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/parametro_general/js/templating/parametro_general_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/parametro_general/js/templating/parametro_general_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/parametro_general/js/templating/parametro_general_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			parametro_general_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					parametro_general_web::$GET_POST=$_GET;
				} else {
					parametro_general_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			parametro_general_web::$STR_NOMBRE_PAGINA = 'parametro_general_view.php';
			parametro_general_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			parametro_general_web::$BIT_ES_PAGINA_FORM = 'false';
				
			parametro_general_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {parametro_general_constante,parametro_general_constante1} from './webroot/js/JavaScript/contabilidad/general/parametro_general/js/util/parametro_general_constante.js?random=1';
			import {parametro_general_funcion,parametro_general_funcion1} from './webroot/js/JavaScript/contabilidad/general/parametro_general/js/util/parametro_general_funcion.js?random=1';
			
			let parametro_general_constante2 = new parametro_general_constante();
			
			parametro_general_constante2.STR_NOMBRE_PAGINA="<?php echo(parametro_general_web::$STR_NOMBRE_PAGINA); ?>";
			parametro_general_constante2.STR_TYPE_ON_LOADparametro_general="<?php echo(parametro_general_web::$STR_TYPE_ONLOAD); ?>";
			parametro_general_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(parametro_general_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			parametro_general_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(parametro_general_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			parametro_general_constante2.STR_ACTION="<?php echo(parametro_general_web::$STR_ACTION); ?>";
			parametro_general_constante2.STR_ES_POPUP="<?php echo(parametro_general_web::$STR_ES_POPUP); ?>";
			parametro_general_constante2.STR_ES_BUSQUEDA="<?php echo(parametro_general_web::$STR_ES_BUSQUEDA); ?>";
			parametro_general_constante2.STR_FUNCION_JS="<?php echo(parametro_general_web::$STR_FUNCION_JS); ?>";
			parametro_general_constante2.BIG_ID_ACTUAL="<?php echo(parametro_general_web::$BIG_ID_ACTUAL); ?>";
			parametro_general_constante2.BIG_ID_OPCION="<?php echo(parametro_general_web::$BIG_ID_OPCION); ?>";
			parametro_general_constante2.STR_OBJETO_JS="<?php echo(parametro_general_web::$STR_OBJETO_JS); ?>";
			parametro_general_constante2.STR_ES_RELACIONES="<?php echo(parametro_general_web::$STR_ES_RELACIONES); ?>";
			parametro_general_constante2.STR_ES_RELACIONADO="<?php echo(parametro_general_web::$STR_ES_RELACIONADO); ?>";
			parametro_general_constante2.STR_ES_SUB_PAGINA="<?php echo(parametro_general_web::$STR_ES_SUB_PAGINA); ?>";
			parametro_general_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(parametro_general_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			parametro_general_constante2.BIT_ES_PAGINA_FORM=<?php echo(parametro_general_web::$BIT_ES_PAGINA_FORM); ?>;
			parametro_general_constante2.STR_SUFIJO="<?php echo(parametro_general_web::$STR_SUF); ?>";//parametro_general
			parametro_general_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(parametro_general_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//parametro_general
			
			parametro_general_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(parametro_general_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			parametro_general_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($parametro_general_web1->moduloActual->getnombre()); ?>";
			parametro_general_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(parametro_general_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			parametro_general_constante2.BIT_ES_LOAD_NORMAL=true;
			/*parametro_general_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			parametro_general_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.parametro_general_constante2 = parametro_general_constante2;
			
		</script>
		
		<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.parametro_general_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.parametro_general_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="parametro_generalActual" ></a>
	
	<div id="divResumenparametro_generalActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(parametro_general_web::$STR_ES_BUSQUEDA=='false' && parametro_general_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(parametro_general_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false' && parametro_general_web::$STR_ES_POPUP=='false' && parametro_general_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdparametro_generalNuevoToolBar">
										<img id="imgNuevoToolBarparametro_general" name="imgNuevoToolBarparametro_general" title="Nuevo Parametro General" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(parametro_general_web::$STR_ES_BUSQUEDA=='false' && parametro_general_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdparametro_generalNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarparametro_general" name="imgNuevoGuardarCambiosToolBarparametro_general" title="Nuevo TABLA Parametro General" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_general_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdparametro_generalGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarparametro_general" name="imgGuardarCambiosToolBarparametro_general" title="Guardar Parametro General" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false' && parametro_general_web::$STR_ES_RELACIONES=='false' && parametro_general_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdparametro_generalCopiarToolBar">
										<img id="imgCopiarToolBarparametro_general" name="imgCopiarToolBarparametro_general" title="Copiar Parametro General" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_generalDuplicarToolBar">
										<img id="imgDuplicarToolBarparametro_general" name="imgDuplicarToolBarparametro_general" title="Duplicar Parametro General" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdparametro_generalRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarparametro_general" name="imgRecargarInformacionToolBarparametro_general" title="Recargar Parametro General" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_generalAnterioresToolBar">
										<img id="imgAnterioresToolBarparametro_general" name="imgAnterioresToolBarparametro_general" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_generalSiguientesToolBar">
										<img id="imgSiguientesToolBarparametro_general" name="imgSiguientesToolBarparametro_general" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdparametro_generalAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarparametro_general" name="imgAbrirOrderByToolBarparametro_general" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((parametro_general_web::$STR_ES_RELACIONADO=='false' && parametro_general_web::$STR_ES_RELACIONES=='false') || parametro_general_web::$STR_ES_BUSQUEDA=='true'  || parametro_general_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdparametro_generalCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarparametro_general" name="imgCerrarPaginaToolBarparametro_general" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trparametro_generalCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaparametro_general" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaparametro_general',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trparametro_generalCabeceraBusquedas/super -->

		<tr id="trBusquedaparametro_general" class="busqueda" style="display:table-row">
			<td id="tdBusquedaparametro_general" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaparametro_general" name="frmBusquedaparametro_general">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaparametro_general" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trparametro_generalBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idmoneda" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idmoneda"> Por Moneda</a></li>
						<li id="listrVisibleFK_Idpais" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idpais"> Por  Pais</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idmoneda">
					<table id="tblstrVisibleFK_Idmoneda" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Moneda</span>
						</td>
						<td align="center">
							<select id="FK_Idmoneda-cmbid_modena" name="FK_Idmoneda-cmbid_modena" title="Moneda" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarparametro_generalFK_Idmoneda" name="btnBuscarparametro_generalFK_Idmoneda" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idpais">
					<table id="tblstrVisibleFK_Idpais" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Pais</span>
						</td>
						<td align="center">
							<select id="FK_Idpais-cmbid_pais" name="FK_Idpais-cmbid_pais" title=" Pais" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarparametro_generalFK_Idpais" name="btnBuscarparametro_generalFK_Idpais" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarparametro_general" style="display:table-row">
					<td id="tdParamsBuscarparametro_general">
		<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarparametro_general">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosparametro_general" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosparametro_general"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosparametro_general" name="ParamsBuscar-txtNumeroRegistrosparametro_general" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionparametro_general">
							<td id="tdGenerarReporteparametro_general" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosparametro_general" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosparametro_general" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionparametro_general" name="btnRecargarInformacionparametro_general" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaparametro_general" name="btnImprimirPaginaparametro_general" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*parametro_general_web::$STR_ES_BUSQUEDA=='false'  &&*/ parametro_general_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByparametro_general">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByparametro_general" name="btnOrderByparametro_general" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(parametro_general_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdparametro_generalConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosparametro_general -->

							</td><!-- tdGenerarReporteparametro_general -->
						</tr><!-- trRecargarInformacionparametro_general -->
					</table><!-- tblParamsBuscarNumeroRegistrosparametro_general -->
				</div> <!-- divParamsBuscarparametro_general -->
		<?php } ?>
				</td> <!-- tdParamsBuscarparametro_general -->
				</tr><!-- trParamsBuscarparametro_general -->
				</table> <!-- tblBusquedaparametro_general -->
				</form> <!-- frmBusquedaparametro_general -->
				

			</td> <!-- tdBusquedaparametro_general -->
		</tr> <!-- trBusquedaparametro_general/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divparametro_generalPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblparametro_generalPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmparametro_generalAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnparametro_generalAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="parametro_general_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnparametro_generalAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmparametro_generalAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblparametro_generalPopupAjaxWebPart -->
		</div> <!-- divparametro_generalPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trparametro_generalTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaparametro_general"></a>
		<img id="imgTablaParaDerechaparametro_general" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaparametro_general'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaparametro_general" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaparametro_general'"/>
		<a id="TablaDerechaparametro_general"></a>
	</td>
</tr> <!-- trparametro_generalTablaNavegacion/super -->
<?php } ?>

<tr id="trparametro_generalTablaDatos">
	<td colspan="3" id="htmlTableCellparametro_general">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosparametro_generalsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trparametro_generalTablaDatos/super -->
		
		
		<tr id="trparametro_generalPaginacion" style="display:table-row">
			<td id="tdparametro_generalPaginacion" align="center">
				<div id="divparametro_generalPaginacionAjaxWebPart">
				<form id="frmPaginacionparametro_general" name="frmPaginacionparametro_general">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionparametro_general" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(parametro_general_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkparametro_general" name="btnSeleccionarLoteFkparametro_general" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false' /*&& parametro_general_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresparametro_general" name="btnAnterioresparametro_general" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(parametro_general_web::$STR_ES_BUSQUEDA=='false' && parametro_general_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdparametro_generalNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararparametro_general" name="btnNuevoTablaPrepararparametro_general" title="NUEVO Parametro General" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaparametro_general" name="ParamsPaginar-txtNumeroNuevoTablaparametro_general" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(parametro_general_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdparametro_generalConEditarparametro_general">
							<label>
								<input id="ParamsBuscar-chbConEditarparametro_general" name="ParamsBuscar-chbConEditarparametro_general" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false'/* && parametro_general_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesparametro_general" name="btnSiguientesparametro_general" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionparametro_general -->
				</form> <!-- frmPaginacionparametro_general -->
				<form id="frmNuevoPrepararparametro_general" name="frmNuevoPrepararparametro_general">
				<table id="tblNuevoPrepararparametro_general" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trparametro_generalNuevo" height="10">
						<?php if(parametro_general_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdparametro_generalNuevo" align="center">
							<input type="button" id="btnNuevoPrepararparametro_general" name="btnNuevoPrepararparametro_general" title="NUEVO Parametro General" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdparametro_generalGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosparametro_general" name="btnGuardarCambiosparametro_general" title="GUARDAR Parametro General" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false' && parametro_general_web::$STR_ES_RELACIONES=='false' && parametro_general_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdparametro_generalDuplicar" align="center">
							<input type="button" id="btnDuplicarparametro_general" name="btnDuplicarparametro_general" title="DUPLICAR Parametro General" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdparametro_generalCopiar" align="center">
							<input type="button" id="btnCopiarparametro_general" name="btnCopiarparametro_general" title="COPIAR Parametro General" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false' && ((parametro_general_web::$STR_ES_RELACIONADO=='false' && parametro_general_web::$STR_ES_RELACIONES=='false') || parametro_general_web::$STR_ES_BUSQUEDA=='true'  || parametro_general_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdparametro_generalCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaparametro_general" name="btnCerrarPaginaparametro_general" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararparametro_general -->
				</form> <!-- frmNuevoPrepararparametro_general -->
				</div> <!-- divparametro_generalPaginacionAjaxWebPart -->
			</td> <!-- tdparametro_generalPaginacion -->
		</tr> <!-- trparametro_generalPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesparametro_generalAjaxWebPart">
			<td id="tdAccionesRelacionesparametro_generalAjaxWebPart">
				<div id="divAccionesRelacionesparametro_generalAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesparametro_generalAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesparametro_generalAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByparametro_general">
			<td id="tdOrderByparametro_general">
				<form id="frmOrderByparametro_general" name="frmOrderByparametro_general">
					<div id="divOrderByparametro_generalAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByparametro_general -->
		</tr> <!-- trOrderByparametro_general/super -->
			
		
		
		
		
		
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
			
				import {parametro_general_webcontrol,parametro_general_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/parametro_general/js/webcontrol/parametro_general_webcontrol.js?random=1';
				
				parametro_general_webcontrol1.setparametro_general_constante(window.parametro_general_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(parametro_general_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

