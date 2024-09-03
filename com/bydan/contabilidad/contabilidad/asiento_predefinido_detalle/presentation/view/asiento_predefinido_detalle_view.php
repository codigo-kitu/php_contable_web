<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Detalle Asiento Predefinido Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/contabilidad/asiento_predefinido_detalle/util/asiento_predefinido_detalle_carga.php');
	use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;
	
	//include_once('com/bydan/contabilidad/contabilidad/asiento_predefinido_detalle/presentation/view/asiento_predefinido_detalle_web.php');
	//use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\view\asiento_predefinido_detalle_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	asiento_predefinido_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	asiento_predefinido_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$asiento_predefinido_detalle_web1= new asiento_predefinido_detalle_web();	
	$asiento_predefinido_detalle_web1->cargarDatosGenerales();
	
	//$moduloActual=$asiento_predefinido_detalle_web1->moduloActual;
	//$usuarioActual=$asiento_predefinido_detalle_web1->usuarioActual;
	//$sessionBase=$asiento_predefinido_detalle_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$asiento_predefinido_detalle_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/asiento_predefinido_detalle/js/templating/asiento_predefinido_detalle_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/asiento_predefinido_detalle/js/templating/asiento_predefinido_detalle_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/asiento_predefinido_detalle/js/templating/asiento_predefinido_detalle_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/contabilidad/asiento_predefinido_detalle/js/templating/asiento_predefinido_detalle_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			asiento_predefinido_detalle_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					asiento_predefinido_detalle_web::$GET_POST=$_GET;
				} else {
					asiento_predefinido_detalle_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			asiento_predefinido_detalle_web::$STR_NOMBRE_PAGINA = 'asiento_predefinido_detalle_view.php';
			asiento_predefinido_detalle_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			asiento_predefinido_detalle_web::$BIT_ES_PAGINA_FORM = 'false';
				
			asiento_predefinido_detalle_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {asiento_predefinido_detalle_constante,asiento_predefinido_detalle_constante1} from './webroot/js/JavaScript/contabilidad/contabilidad/asiento_predefinido_detalle/js/util/asiento_predefinido_detalle_constante.js?random=1';
			import {asiento_predefinido_detalle_funcion,asiento_predefinido_detalle_funcion1} from './webroot/js/JavaScript/contabilidad/contabilidad/asiento_predefinido_detalle/js/util/asiento_predefinido_detalle_funcion.js?random=1';
			
			let asiento_predefinido_detalle_constante2 = new asiento_predefinido_detalle_constante();
			
			asiento_predefinido_detalle_constante2.STR_NOMBRE_PAGINA="<?php echo(asiento_predefinido_detalle_web::$STR_NOMBRE_PAGINA); ?>";
			asiento_predefinido_detalle_constante2.STR_TYPE_ON_LOADasiento_predefinido_detalle="<?php echo(asiento_predefinido_detalle_web::$STR_TYPE_ONLOAD); ?>";
			asiento_predefinido_detalle_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(asiento_predefinido_detalle_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			asiento_predefinido_detalle_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(asiento_predefinido_detalle_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			asiento_predefinido_detalle_constante2.STR_ACTION="<?php echo(asiento_predefinido_detalle_web::$STR_ACTION); ?>";
			asiento_predefinido_detalle_constante2.STR_ES_POPUP="<?php echo(asiento_predefinido_detalle_web::$STR_ES_POPUP); ?>";
			asiento_predefinido_detalle_constante2.STR_ES_BUSQUEDA="<?php echo(asiento_predefinido_detalle_web::$STR_ES_BUSQUEDA); ?>";
			asiento_predefinido_detalle_constante2.STR_FUNCION_JS="<?php echo(asiento_predefinido_detalle_web::$STR_FUNCION_JS); ?>";
			asiento_predefinido_detalle_constante2.BIG_ID_ACTUAL="<?php echo(asiento_predefinido_detalle_web::$BIG_ID_ACTUAL); ?>";
			asiento_predefinido_detalle_constante2.BIG_ID_OPCION="<?php echo(asiento_predefinido_detalle_web::$BIG_ID_OPCION); ?>";
			asiento_predefinido_detalle_constante2.STR_OBJETO_JS="<?php echo(asiento_predefinido_detalle_web::$STR_OBJETO_JS); ?>";
			asiento_predefinido_detalle_constante2.STR_ES_RELACIONES="<?php echo(asiento_predefinido_detalle_web::$STR_ES_RELACIONES); ?>";
			asiento_predefinido_detalle_constante2.STR_ES_RELACIONADO="<?php echo(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO); ?>";
			asiento_predefinido_detalle_constante2.STR_ES_SUB_PAGINA="<?php echo(asiento_predefinido_detalle_web::$STR_ES_SUB_PAGINA); ?>";
			asiento_predefinido_detalle_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(asiento_predefinido_detalle_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			asiento_predefinido_detalle_constante2.BIT_ES_PAGINA_FORM=<?php echo(asiento_predefinido_detalle_web::$BIT_ES_PAGINA_FORM); ?>;
			asiento_predefinido_detalle_constante2.STR_SUFIJO="<?php echo(asiento_predefinido_detalle_web::$STR_SUF); ?>";//asiento_predefinido_detalle
			asiento_predefinido_detalle_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(asiento_predefinido_detalle_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//asiento_predefinido_detalle
			
			asiento_predefinido_detalle_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(asiento_predefinido_detalle_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			asiento_predefinido_detalle_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($asiento_predefinido_detalle_web1->moduloActual->getnombre()); ?>";
			asiento_predefinido_detalle_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(asiento_predefinido_detalle_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			asiento_predefinido_detalle_constante2.BIT_ES_LOAD_NORMAL=true;
			/*asiento_predefinido_detalle_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			asiento_predefinido_detalle_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.asiento_predefinido_detalle_constante2 = asiento_predefinido_detalle_constante2;
			
		</script>
		
		<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.asiento_predefinido_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.asiento_predefinido_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="asiento_predefinido_detalleActual" ></a>
	
	<div id="divResumenasiento_predefinido_detalleActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(asiento_predefinido_detalle_web::$STR_ES_BUSQUEDA=='false' && asiento_predefinido_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false' && asiento_predefinido_detalle_web::$STR_ES_POPUP=='false' && asiento_predefinido_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdasiento_predefinido_detalleNuevoToolBar">
										<img id="imgNuevoToolBarasiento_predefinido_detalle" name="imgNuevoToolBarasiento_predefinido_detalle" title="Nuevo Detalle Asiento Predefinido" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(asiento_predefinido_detalle_web::$STR_ES_BUSQUEDA=='false' && asiento_predefinido_detalle_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdasiento_predefinido_detalleNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarasiento_predefinido_detalle" name="imgNuevoGuardarCambiosToolBarasiento_predefinido_detalle" title="Nuevo TABLA Detalle Asiento Predefinido" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(asiento_predefinido_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdasiento_predefinido_detalleGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarasiento_predefinido_detalle" name="imgGuardarCambiosToolBarasiento_predefinido_detalle" title="Guardar Detalle Asiento Predefinido" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false' && asiento_predefinido_detalle_web::$STR_ES_RELACIONES=='false' && asiento_predefinido_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdasiento_predefinido_detalleCopiarToolBar">
										<img id="imgCopiarToolBarasiento_predefinido_detalle" name="imgCopiarToolBarasiento_predefinido_detalle" title="Copiar Detalle Asiento Predefinido" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdasiento_predefinido_detalleDuplicarToolBar">
										<img id="imgDuplicarToolBarasiento_predefinido_detalle" name="imgDuplicarToolBarasiento_predefinido_detalle" title="Duplicar Detalle Asiento Predefinido" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdasiento_predefinido_detalleRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarasiento_predefinido_detalle" name="imgRecargarInformacionToolBarasiento_predefinido_detalle" title="Recargar Detalle Asiento Predefinido" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdasiento_predefinido_detalleAnterioresToolBar">
										<img id="imgAnterioresToolBarasiento_predefinido_detalle" name="imgAnterioresToolBarasiento_predefinido_detalle" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdasiento_predefinido_detalleSiguientesToolBar">
										<img id="imgSiguientesToolBarasiento_predefinido_detalle" name="imgSiguientesToolBarasiento_predefinido_detalle" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdasiento_predefinido_detalleAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarasiento_predefinido_detalle" name="imgAbrirOrderByToolBarasiento_predefinido_detalle" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false' && asiento_predefinido_detalle_web::$STR_ES_RELACIONES=='false') || asiento_predefinido_detalle_web::$STR_ES_BUSQUEDA=='true'  || asiento_predefinido_detalle_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdasiento_predefinido_detalleCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarasiento_predefinido_detalle" name="imgCerrarPaginaToolBarasiento_predefinido_detalle" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trasiento_predefinido_detalleCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaasiento_predefinido_detalle" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaasiento_predefinido_detalle',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trasiento_predefinido_detalleCabeceraBusquedas/super -->

		<tr id="trBusquedaasiento_predefinido_detalle" class="busqueda" style="display:table-row">
			<td id="tdBusquedaasiento_predefinido_detalle" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaasiento_predefinido_detalle" name="frmBusquedaasiento_predefinido_detalle">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaasiento_predefinido_detalle" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trasiento_predefinido_detalleBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idasiento_predefinido" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idasiento_predefinido"> Por  Asiento Predefinido</a></li>
						<li id="listrVisibleFK_Idcentro_costo" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcentro_costo"> Por Centro Costo</a></li>
						<li id="listrVisibleFK_Idcuenta" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta"> Por  Cuenta</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idasiento_predefinido">
					<table id="tblstrVisibleFK_Idasiento_predefinido" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Asiento Predefinido</span>
						</td>
						<td align="center">
							<select id="FK_Idasiento_predefinido-cmbid_asiento_predefinido" name="FK_Idasiento_predefinido-cmbid_asiento_predefinido" title=" Asiento Predefinido" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarasiento_predefinido_detalleFK_Idasiento_predefinido" name="btnBuscarasiento_predefinido_detalleFK_Idasiento_predefinido" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcentro_costo">
					<table id="tblstrVisibleFK_Idcentro_costo" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Centro Costo</span>
						</td>
						<td align="center">
							<select id="FK_Idcentro_costo-cmbid_centro_costo" name="FK_Idcentro_costo-cmbid_centro_costo" title="Centro Costo" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarasiento_predefinido_detalleFK_Idcentro_costo" name="btnBuscarasiento_predefinido_detalleFK_Idcentro_costo" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta">
					<table id="tblstrVisibleFK_Idcuenta" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuenta</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta-cmbid_cuenta" name="FK_Idcuenta-cmbid_cuenta" title=" Cuenta" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarasiento_predefinido_detalleFK_Idcuenta" name="btnBuscarasiento_predefinido_detalleFK_Idcuenta" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarasiento_predefinido_detalle" style="display:table-row">
					<td id="tdParamsBuscarasiento_predefinido_detalle">
		<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarasiento_predefinido_detalle">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosasiento_predefinido_detalle" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosasiento_predefinido_detalle"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosasiento_predefinido_detalle" name="ParamsBuscar-txtNumeroRegistrosasiento_predefinido_detalle" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionasiento_predefinido_detalle">
							<td id="tdGenerarReporteasiento_predefinido_detalle" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosasiento_predefinido_detalle" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosasiento_predefinido_detalle" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionasiento_predefinido_detalle" name="btnRecargarInformacionasiento_predefinido_detalle" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaasiento_predefinido_detalle" name="btnImprimirPaginaasiento_predefinido_detalle" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*asiento_predefinido_detalle_web::$STR_ES_BUSQUEDA=='false'  &&*/ asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByasiento_predefinido_detalle">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByasiento_predefinido_detalle" name="btnOrderByasiento_predefinido_detalle" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(asiento_predefinido_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdasiento_predefinido_detalleConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosasiento_predefinido_detalle -->

							</td><!-- tdGenerarReporteasiento_predefinido_detalle -->
						</tr><!-- trRecargarInformacionasiento_predefinido_detalle -->
					</table><!-- tblParamsBuscarNumeroRegistrosasiento_predefinido_detalle -->
				</div> <!-- divParamsBuscarasiento_predefinido_detalle -->
		<?php } ?>
				</td> <!-- tdParamsBuscarasiento_predefinido_detalle -->
				</tr><!-- trParamsBuscarasiento_predefinido_detalle -->
				</table> <!-- tblBusquedaasiento_predefinido_detalle -->
				</form> <!-- frmBusquedaasiento_predefinido_detalle -->
				

			</td> <!-- tdBusquedaasiento_predefinido_detalle -->
		</tr> <!-- trBusquedaasiento_predefinido_detalle/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divasiento_predefinido_detallePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblasiento_predefinido_detallePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmasiento_predefinido_detalleAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnasiento_predefinido_detalleAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="asiento_predefinido_detalle_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnasiento_predefinido_detalleAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmasiento_predefinido_detalleAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblasiento_predefinido_detallePopupAjaxWebPart -->
		</div> <!-- divasiento_predefinido_detallePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trasiento_predefinido_detalleTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaasiento_predefinido_detalle"></a>
		<img id="imgTablaParaDerechaasiento_predefinido_detalle" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaasiento_predefinido_detalle'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaasiento_predefinido_detalle" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaasiento_predefinido_detalle'"/>
		<a id="TablaDerechaasiento_predefinido_detalle"></a>
	</td>
</tr> <!-- trasiento_predefinido_detalleTablaNavegacion/super -->
<?php } ?>

<tr id="trasiento_predefinido_detalleTablaDatos">
	<td colspan="3" id="htmlTableCellasiento_predefinido_detalle">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosasiento_predefinido_detallesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trasiento_predefinido_detalleTablaDatos/super -->
		
		
		<tr id="trasiento_predefinido_detallePaginacion" style="display:table-row">
			<td id="tdasiento_predefinido_detallePaginacion" align="center">
				<div id="divasiento_predefinido_detallePaginacionAjaxWebPart">
				<form id="frmPaginacionasiento_predefinido_detalle" name="frmPaginacionasiento_predefinido_detalle">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionasiento_predefinido_detalle" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(asiento_predefinido_detalle_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkasiento_predefinido_detalle" name="btnSeleccionarLoteFkasiento_predefinido_detalle" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false' /*&& asiento_predefinido_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresasiento_predefinido_detalle" name="btnAnterioresasiento_predefinido_detalle" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(asiento_predefinido_detalle_web::$STR_ES_BUSQUEDA=='false' && asiento_predefinido_detalle_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdasiento_predefinido_detalleNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararasiento_predefinido_detalle" name="btnNuevoTablaPrepararasiento_predefinido_detalle" title="NUEVO Detalle Asiento Predefinido" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaasiento_predefinido_detalle" name="ParamsPaginar-txtNumeroNuevoTablaasiento_predefinido_detalle" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdasiento_predefinido_detalleConEditarasiento_predefinido_detalle">
							<label>
								<input id="ParamsBuscar-chbConEditarasiento_predefinido_detalle" name="ParamsBuscar-chbConEditarasiento_predefinido_detalle" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false'/* && asiento_predefinido_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesasiento_predefinido_detalle" name="btnSiguientesasiento_predefinido_detalle" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionasiento_predefinido_detalle -->
				</form> <!-- frmPaginacionasiento_predefinido_detalle -->
				<form id="frmNuevoPrepararasiento_predefinido_detalle" name="frmNuevoPrepararasiento_predefinido_detalle">
				<table id="tblNuevoPrepararasiento_predefinido_detalle" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trasiento_predefinido_detalleNuevo" height="10">
						<?php if(asiento_predefinido_detalle_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdasiento_predefinido_detalleNuevo" align="center">
							<input type="button" id="btnNuevoPrepararasiento_predefinido_detalle" name="btnNuevoPrepararasiento_predefinido_detalle" title="NUEVO Detalle Asiento Predefinido" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdasiento_predefinido_detalleGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosasiento_predefinido_detalle" name="btnGuardarCambiosasiento_predefinido_detalle" title="GUARDAR Detalle Asiento Predefinido" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false' && asiento_predefinido_detalle_web::$STR_ES_RELACIONES=='false' && asiento_predefinido_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdasiento_predefinido_detalleDuplicar" align="center">
							<input type="button" id="btnDuplicarasiento_predefinido_detalle" name="btnDuplicarasiento_predefinido_detalle" title="DUPLICAR Detalle Asiento Predefinido" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdasiento_predefinido_detalleCopiar" align="center">
							<input type="button" id="btnCopiarasiento_predefinido_detalle" name="btnCopiarasiento_predefinido_detalle" title="COPIAR Detalle Asiento Predefinido" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false' && ((asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false' && asiento_predefinido_detalle_web::$STR_ES_RELACIONES=='false') || asiento_predefinido_detalle_web::$STR_ES_BUSQUEDA=='true'  || asiento_predefinido_detalle_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdasiento_predefinido_detalleCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaasiento_predefinido_detalle" name="btnCerrarPaginaasiento_predefinido_detalle" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararasiento_predefinido_detalle -->
				</form> <!-- frmNuevoPrepararasiento_predefinido_detalle -->
				</div> <!-- divasiento_predefinido_detallePaginacionAjaxWebPart -->
			</td> <!-- tdasiento_predefinido_detallePaginacion -->
		</tr> <!-- trasiento_predefinido_detallePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesasiento_predefinido_detalleAjaxWebPart">
			<td id="tdAccionesRelacionesasiento_predefinido_detalleAjaxWebPart">
				<div id="divAccionesRelacionesasiento_predefinido_detalleAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesasiento_predefinido_detalleAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesasiento_predefinido_detalleAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByasiento_predefinido_detalle">
			<td id="tdOrderByasiento_predefinido_detalle">
				<form id="frmOrderByasiento_predefinido_detalle" name="frmOrderByasiento_predefinido_detalle">
					<div id="divOrderByasiento_predefinido_detalleAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByasiento_predefinido_detalle -->
		</tr> <!-- trOrderByasiento_predefinido_detalle/super -->
			
		
		
		
		
		
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
			
				import {asiento_predefinido_detalle_webcontrol,asiento_predefinido_detalle_webcontrol1} from './webroot/js/JavaScript/contabilidad/contabilidad/asiento_predefinido_detalle/js/webcontrol/asiento_predefinido_detalle_webcontrol.js?random=1';
				
				asiento_predefinido_detalle_webcontrol1.setasiento_predefinido_detalle_constante(window.asiento_predefinido_detalle_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(asiento_predefinido_detalle_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

