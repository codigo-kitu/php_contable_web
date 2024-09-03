<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\reporte_monica\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Reportes Monica Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/reporte_monica/util/reporte_monica_carga.php');
	use com\bydan\contabilidad\general\reporte_monica\util\reporte_monica_carga;
	
	//include_once('com/bydan/contabilidad/general/reporte_monica/presentation/view/reporte_monica_web.php');
	//use com\bydan\contabilidad\general\reporte_monica\presentation\view\reporte_monica_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	reporte_monica_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	reporte_monica_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$reporte_monica_web1= new reporte_monica_web();	
	$reporte_monica_web1->cargarDatosGenerales();
	
	//$moduloActual=$reporte_monica_web1->moduloActual;
	//$usuarioActual=$reporte_monica_web1->usuarioActual;
	//$sessionBase=$reporte_monica_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$reporte_monica_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/reporte_monica/js/templating/reporte_monica_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/reporte_monica/js/templating/reporte_monica_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/reporte_monica/js/templating/reporte_monica_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/reporte_monica/js/templating/reporte_monica_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			reporte_monica_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					reporte_monica_web::$GET_POST=$_GET;
				} else {
					reporte_monica_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			reporte_monica_web::$STR_NOMBRE_PAGINA = 'reporte_monica_view.php';
			reporte_monica_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			reporte_monica_web::$BIT_ES_PAGINA_FORM = 'false';
				
			reporte_monica_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {reporte_monica_constante,reporte_monica_constante1} from './webroot/js/JavaScript/contabilidad/general/reporte_monica/js/util/reporte_monica_constante.js?random=1';
			import {reporte_monica_funcion,reporte_monica_funcion1} from './webroot/js/JavaScript/contabilidad/general/reporte_monica/js/util/reporte_monica_funcion.js?random=1';
			
			let reporte_monica_constante2 = new reporte_monica_constante();
			
			reporte_monica_constante2.STR_NOMBRE_PAGINA="<?php echo(reporte_monica_web::$STR_NOMBRE_PAGINA); ?>";
			reporte_monica_constante2.STR_TYPE_ON_LOADreporte_monica="<?php echo(reporte_monica_web::$STR_TYPE_ONLOAD); ?>";
			reporte_monica_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(reporte_monica_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			reporte_monica_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(reporte_monica_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			reporte_monica_constante2.STR_ACTION="<?php echo(reporte_monica_web::$STR_ACTION); ?>";
			reporte_monica_constante2.STR_ES_POPUP="<?php echo(reporte_monica_web::$STR_ES_POPUP); ?>";
			reporte_monica_constante2.STR_ES_BUSQUEDA="<?php echo(reporte_monica_web::$STR_ES_BUSQUEDA); ?>";
			reporte_monica_constante2.STR_FUNCION_JS="<?php echo(reporte_monica_web::$STR_FUNCION_JS); ?>";
			reporte_monica_constante2.BIG_ID_ACTUAL="<?php echo(reporte_monica_web::$BIG_ID_ACTUAL); ?>";
			reporte_monica_constante2.BIG_ID_OPCION="<?php echo(reporte_monica_web::$BIG_ID_OPCION); ?>";
			reporte_monica_constante2.STR_OBJETO_JS="<?php echo(reporte_monica_web::$STR_OBJETO_JS); ?>";
			reporte_monica_constante2.STR_ES_RELACIONES="<?php echo(reporte_monica_web::$STR_ES_RELACIONES); ?>";
			reporte_monica_constante2.STR_ES_RELACIONADO="<?php echo(reporte_monica_web::$STR_ES_RELACIONADO); ?>";
			reporte_monica_constante2.STR_ES_SUB_PAGINA="<?php echo(reporte_monica_web::$STR_ES_SUB_PAGINA); ?>";
			reporte_monica_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(reporte_monica_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			reporte_monica_constante2.BIT_ES_PAGINA_FORM=<?php echo(reporte_monica_web::$BIT_ES_PAGINA_FORM); ?>;
			reporte_monica_constante2.STR_SUFIJO="<?php echo(reporte_monica_web::$STR_SUF); ?>";//reporte_monica
			reporte_monica_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(reporte_monica_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//reporte_monica
			
			reporte_monica_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(reporte_monica_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			reporte_monica_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($reporte_monica_web1->moduloActual->getnombre()); ?>";
			reporte_monica_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(reporte_monica_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			reporte_monica_constante2.BIT_ES_LOAD_NORMAL=true;
			/*reporte_monica_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			reporte_monica_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.reporte_monica_constante2 = reporte_monica_constante2;
			
		</script>
		
		<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.reporte_monica_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.reporte_monica_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="reporte_monicaActual" ></a>
	
	<div id="divResumenreporte_monicaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(reporte_monica_web::$STR_ES_BUSQUEDA=='false' && reporte_monica_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(reporte_monica_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false' && reporte_monica_web::$STR_ES_POPUP=='false' && reporte_monica_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdreporte_monicaNuevoToolBar">
										<img id="imgNuevoToolBarreporte_monica" name="imgNuevoToolBarreporte_monica" title="Nuevo Reportes Monica" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(reporte_monica_web::$STR_ES_BUSQUEDA=='false' && reporte_monica_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdreporte_monicaNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarreporte_monica" name="imgNuevoGuardarCambiosToolBarreporte_monica" title="Nuevo TABLA Reportes Monica" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(reporte_monica_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdreporte_monicaGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarreporte_monica" name="imgGuardarCambiosToolBarreporte_monica" title="Guardar Reportes Monica" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false' && reporte_monica_web::$STR_ES_RELACIONES=='false' && reporte_monica_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdreporte_monicaCopiarToolBar">
										<img id="imgCopiarToolBarreporte_monica" name="imgCopiarToolBarreporte_monica" title="Copiar Reportes Monica" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdreporte_monicaDuplicarToolBar">
										<img id="imgDuplicarToolBarreporte_monica" name="imgDuplicarToolBarreporte_monica" title="Duplicar Reportes Monica" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdreporte_monicaRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarreporte_monica" name="imgRecargarInformacionToolBarreporte_monica" title="Recargar Reportes Monica" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdreporte_monicaAnterioresToolBar">
										<img id="imgAnterioresToolBarreporte_monica" name="imgAnterioresToolBarreporte_monica" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdreporte_monicaSiguientesToolBar">
										<img id="imgSiguientesToolBarreporte_monica" name="imgSiguientesToolBarreporte_monica" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdreporte_monicaAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarreporte_monica" name="imgAbrirOrderByToolBarreporte_monica" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((reporte_monica_web::$STR_ES_RELACIONADO=='false' && reporte_monica_web::$STR_ES_RELACIONES=='false') || reporte_monica_web::$STR_ES_BUSQUEDA=='true'  || reporte_monica_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdreporte_monicaCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarreporte_monica" name="imgCerrarPaginaToolBarreporte_monica" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trreporte_monicaCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedareporte_monica" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedareporte_monica',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trreporte_monicaCabeceraBusquedas/super -->

		<tr id="trBusquedareporte_monica" class="busqueda" style="display:table-row">
			<td id="tdBusquedareporte_monica" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedareporte_monica" name="frmBusquedareporte_monica">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedareporte_monica" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trreporte_monicaBusquedas" class="busqueda" style="display:none"><td>
				<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarreporte_monica" style="display:table-row">
					<td id="tdParamsBuscarreporte_monica">
		<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarreporte_monica">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosreporte_monica" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosreporte_monica"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosreporte_monica" name="ParamsBuscar-txtNumeroRegistrosreporte_monica" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionreporte_monica">
							<td id="tdGenerarReportereporte_monica" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosreporte_monica" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosreporte_monica" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionreporte_monica" name="btnRecargarInformacionreporte_monica" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginareporte_monica" name="btnImprimirPaginareporte_monica" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*reporte_monica_web::$STR_ES_BUSQUEDA=='false'  &&*/ reporte_monica_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByreporte_monica">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByreporte_monica" name="btnOrderByreporte_monica" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(reporte_monica_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdreporte_monicaConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosreporte_monica -->

							</td><!-- tdGenerarReportereporte_monica -->
						</tr><!-- trRecargarInformacionreporte_monica -->
					</table><!-- tblParamsBuscarNumeroRegistrosreporte_monica -->
				</div> <!-- divParamsBuscarreporte_monica -->
		<?php } ?>
				</td> <!-- tdParamsBuscarreporte_monica -->
				</tr><!-- trParamsBuscarreporte_monica -->
				</table> <!-- tblBusquedareporte_monica -->
				</form> <!-- frmBusquedareporte_monica -->
				

			</td> <!-- tdBusquedareporte_monica -->
		</tr> <!-- trBusquedareporte_monica/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divreporte_monicaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblreporte_monicaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmreporte_monicaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnreporte_monicaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="reporte_monica_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnreporte_monicaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmreporte_monicaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblreporte_monicaPopupAjaxWebPart -->
		</div> <!-- divreporte_monicaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trreporte_monicaTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdareporte_monica"></a>
		<img id="imgTablaParaDerechareporte_monica" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechareporte_monica'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdareporte_monica" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdareporte_monica'"/>
		<a id="TablaDerechareporte_monica"></a>
	</td>
</tr> <!-- trreporte_monicaTablaNavegacion/super -->
<?php } ?>

<tr id="trreporte_monicaTablaDatos">
	<td colspan="3" id="htmlTableCellreporte_monica">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosreporte_monicasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trreporte_monicaTablaDatos/super -->
		
		
		<tr id="trreporte_monicaPaginacion" style="display:table-row">
			<td id="tdreporte_monicaPaginacion" align="center">
				<div id="divreporte_monicaPaginacionAjaxWebPart">
				<form id="frmPaginacionreporte_monica" name="frmPaginacionreporte_monica">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionreporte_monica" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(reporte_monica_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkreporte_monica" name="btnSeleccionarLoteFkreporte_monica" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false' /*&& reporte_monica_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresreporte_monica" name="btnAnterioresreporte_monica" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(reporte_monica_web::$STR_ES_BUSQUEDA=='false' && reporte_monica_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdreporte_monicaNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararreporte_monica" name="btnNuevoTablaPrepararreporte_monica" title="NUEVO Reportes Monica" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablareporte_monica" name="ParamsPaginar-txtNumeroNuevoTablareporte_monica" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdreporte_monicaConEditarreporte_monica">
							<label>
								<input id="ParamsBuscar-chbConEditarreporte_monica" name="ParamsBuscar-chbConEditarreporte_monica" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false'/* && reporte_monica_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesreporte_monica" name="btnSiguientesreporte_monica" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionreporte_monica -->
				</form> <!-- frmPaginacionreporte_monica -->
				<form id="frmNuevoPrepararreporte_monica" name="frmNuevoPrepararreporte_monica">
				<table id="tblNuevoPrepararreporte_monica" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trreporte_monicaNuevo" height="10">
						<?php if(reporte_monica_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdreporte_monicaNuevo" align="center">
							<input type="button" id="btnNuevoPrepararreporte_monica" name="btnNuevoPrepararreporte_monica" title="NUEVO Reportes Monica" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdreporte_monicaGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosreporte_monica" name="btnGuardarCambiosreporte_monica" title="GUARDAR Reportes Monica" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false' && reporte_monica_web::$STR_ES_RELACIONES=='false' && reporte_monica_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdreporte_monicaDuplicar" align="center">
							<input type="button" id="btnDuplicarreporte_monica" name="btnDuplicarreporte_monica" title="DUPLICAR Reportes Monica" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdreporte_monicaCopiar" align="center">
							<input type="button" id="btnCopiarreporte_monica" name="btnCopiarreporte_monica" title="COPIAR Reportes Monica" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false' && ((reporte_monica_web::$STR_ES_RELACIONADO=='false' && reporte_monica_web::$STR_ES_RELACIONES=='false') || reporte_monica_web::$STR_ES_BUSQUEDA=='true'  || reporte_monica_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdreporte_monicaCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginareporte_monica" name="btnCerrarPaginareporte_monica" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararreporte_monica -->
				</form> <!-- frmNuevoPrepararreporte_monica -->
				</div> <!-- divreporte_monicaPaginacionAjaxWebPart -->
			</td> <!-- tdreporte_monicaPaginacion -->
		</tr> <!-- trreporte_monicaPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesreporte_monicaAjaxWebPart">
			<td id="tdAccionesRelacionesreporte_monicaAjaxWebPart">
				<div id="divAccionesRelacionesreporte_monicaAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesreporte_monicaAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesreporte_monicaAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByreporte_monica">
			<td id="tdOrderByreporte_monica">
				<form id="frmOrderByreporte_monica" name="frmOrderByreporte_monica">
					<div id="divOrderByreporte_monicaAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByreporte_monica -->
		</tr> <!-- trOrderByreporte_monica/super -->
			
		
		
		
		
		
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
			
				import {reporte_monica_webcontrol,reporte_monica_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/reporte_monica/js/webcontrol/reporte_monica_webcontrol.js?random=1';
				
				reporte_monica_webcontrol1.setreporte_monica_constante(window.reporte_monica_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(reporte_monica_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

