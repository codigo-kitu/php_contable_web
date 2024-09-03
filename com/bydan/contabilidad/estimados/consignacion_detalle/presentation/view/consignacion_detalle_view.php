<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\estimados\consignacion_detalle\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Consignacion Detalle Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/estimados/consignacion_detalle/util/consignacion_detalle_carga.php');
	use com\bydan\contabilidad\estimados\consignacion_detalle\util\consignacion_detalle_carga;
	
	//include_once('com/bydan/contabilidad/estimados/consignacion_detalle/presentation/view/consignacion_detalle_web.php');
	//use com\bydan\contabilidad\estimados\consignacion_detalle\presentation\view\consignacion_detalle_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	consignacion_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	consignacion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$consignacion_detalle_web1= new consignacion_detalle_web();	
	$consignacion_detalle_web1->cargarDatosGenerales();
	
	//$moduloActual=$consignacion_detalle_web1->moduloActual;
	//$usuarioActual=$consignacion_detalle_web1->usuarioActual;
	//$sessionBase=$consignacion_detalle_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$consignacion_detalle_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/consignacion_detalle/js/templating/consignacion_detalle_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/consignacion_detalle/js/templating/consignacion_detalle_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/consignacion_detalle/js/templating/consignacion_detalle_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/consignacion_detalle/js/templating/consignacion_detalle_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			consignacion_detalle_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					consignacion_detalle_web::$GET_POST=$_GET;
				} else {
					consignacion_detalle_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			consignacion_detalle_web::$STR_NOMBRE_PAGINA = 'consignacion_detalle_view.php';
			consignacion_detalle_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			consignacion_detalle_web::$BIT_ES_PAGINA_FORM = 'false';
				
			consignacion_detalle_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {consignacion_detalle_constante,consignacion_detalle_constante1} from './webroot/js/JavaScript/contabilidad/estimados/consignacion_detalle/js/util/consignacion_detalle_constante.js?random=1';
			import {consignacion_detalle_funcion,consignacion_detalle_funcion1} from './webroot/js/JavaScript/contabilidad/estimados/consignacion_detalle/js/util/consignacion_detalle_funcion.js?random=1';
			
			let consignacion_detalle_constante2 = new consignacion_detalle_constante();
			
			consignacion_detalle_constante2.STR_NOMBRE_PAGINA="<?php echo(consignacion_detalle_web::$STR_NOMBRE_PAGINA); ?>";
			consignacion_detalle_constante2.STR_TYPE_ON_LOADconsignacion_detalle="<?php echo(consignacion_detalle_web::$STR_TYPE_ONLOAD); ?>";
			consignacion_detalle_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(consignacion_detalle_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			consignacion_detalle_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(consignacion_detalle_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			consignacion_detalle_constante2.STR_ACTION="<?php echo(consignacion_detalle_web::$STR_ACTION); ?>";
			consignacion_detalle_constante2.STR_ES_POPUP="<?php echo(consignacion_detalle_web::$STR_ES_POPUP); ?>";
			consignacion_detalle_constante2.STR_ES_BUSQUEDA="<?php echo(consignacion_detalle_web::$STR_ES_BUSQUEDA); ?>";
			consignacion_detalle_constante2.STR_FUNCION_JS="<?php echo(consignacion_detalle_web::$STR_FUNCION_JS); ?>";
			consignacion_detalle_constante2.BIG_ID_ACTUAL="<?php echo(consignacion_detalle_web::$BIG_ID_ACTUAL); ?>";
			consignacion_detalle_constante2.BIG_ID_OPCION="<?php echo(consignacion_detalle_web::$BIG_ID_OPCION); ?>";
			consignacion_detalle_constante2.STR_OBJETO_JS="<?php echo(consignacion_detalle_web::$STR_OBJETO_JS); ?>";
			consignacion_detalle_constante2.STR_ES_RELACIONES="<?php echo(consignacion_detalle_web::$STR_ES_RELACIONES); ?>";
			consignacion_detalle_constante2.STR_ES_RELACIONADO="<?php echo(consignacion_detalle_web::$STR_ES_RELACIONADO); ?>";
			consignacion_detalle_constante2.STR_ES_SUB_PAGINA="<?php echo(consignacion_detalle_web::$STR_ES_SUB_PAGINA); ?>";
			consignacion_detalle_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(consignacion_detalle_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			consignacion_detalle_constante2.BIT_ES_PAGINA_FORM=<?php echo(consignacion_detalle_web::$BIT_ES_PAGINA_FORM); ?>;
			consignacion_detalle_constante2.STR_SUFIJO="<?php echo(consignacion_detalle_web::$STR_SUF); ?>";//consignacion_detalle
			consignacion_detalle_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(consignacion_detalle_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//consignacion_detalle
			
			consignacion_detalle_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(consignacion_detalle_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			consignacion_detalle_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($consignacion_detalle_web1->moduloActual->getnombre()); ?>";
			consignacion_detalle_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(consignacion_detalle_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			consignacion_detalle_constante2.BIT_ES_LOAD_NORMAL=true;
			/*consignacion_detalle_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			consignacion_detalle_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.consignacion_detalle_constante2 = consignacion_detalle_constante2;
			
		</script>
		
		<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.consignacion_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.consignacion_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="consignacion_detalleActual" ></a>
	
	<div id="divResumenconsignacion_detalleActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(consignacion_detalle_web::$STR_ES_BUSQUEDA=='false' && consignacion_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(consignacion_detalle_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false' && consignacion_detalle_web::$STR_ES_POPUP=='false' && consignacion_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdconsignacion_detalleNuevoToolBar">
										<img id="imgNuevoToolBarconsignacion_detalle" name="imgNuevoToolBarconsignacion_detalle" title="Nuevo Consignacion Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(consignacion_detalle_web::$STR_ES_BUSQUEDA=='false' && consignacion_detalle_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdconsignacion_detalleNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarconsignacion_detalle" name="imgNuevoGuardarCambiosToolBarconsignacion_detalle" title="Nuevo TABLA Consignacion Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(consignacion_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdconsignacion_detalleGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarconsignacion_detalle" name="imgGuardarCambiosToolBarconsignacion_detalle" title="Guardar Consignacion Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false' && consignacion_detalle_web::$STR_ES_RELACIONES=='false' && consignacion_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdconsignacion_detalleCopiarToolBar">
										<img id="imgCopiarToolBarconsignacion_detalle" name="imgCopiarToolBarconsignacion_detalle" title="Copiar Consignacion Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdconsignacion_detalleDuplicarToolBar">
										<img id="imgDuplicarToolBarconsignacion_detalle" name="imgDuplicarToolBarconsignacion_detalle" title="Duplicar Consignacion Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdconsignacion_detalleRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarconsignacion_detalle" name="imgRecargarInformacionToolBarconsignacion_detalle" title="Recargar Consignacion Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdconsignacion_detalleAnterioresToolBar">
										<img id="imgAnterioresToolBarconsignacion_detalle" name="imgAnterioresToolBarconsignacion_detalle" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdconsignacion_detalleSiguientesToolBar">
										<img id="imgSiguientesToolBarconsignacion_detalle" name="imgSiguientesToolBarconsignacion_detalle" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdconsignacion_detalleAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarconsignacion_detalle" name="imgAbrirOrderByToolBarconsignacion_detalle" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((consignacion_detalle_web::$STR_ES_RELACIONADO=='false' && consignacion_detalle_web::$STR_ES_RELACIONES=='false') || consignacion_detalle_web::$STR_ES_BUSQUEDA=='true'  || consignacion_detalle_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdconsignacion_detalleCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarconsignacion_detalle" name="imgCerrarPaginaToolBarconsignacion_detalle" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trconsignacion_detalleCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaconsignacion_detalle" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaconsignacion_detalle',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trconsignacion_detalleCabeceraBusquedas/super -->

		<tr id="trBusquedaconsignacion_detalle" class="busqueda" style="display:table-row">
			<td id="tdBusquedaconsignacion_detalle" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaconsignacion_detalle" name="frmBusquedaconsignacion_detalle">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaconsignacion_detalle" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trconsignacion_detalleBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleFK_Idbodega" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idbodega"> Por Bodega</a></li>
						<li id="listrVisibleFK_Idconsignacion" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idconsignacion"> Por Consignacion</a></li>
						<li id="listrVisibleFK_Idproducto" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproducto"> Por Producto</a></li>
						<li id="listrVisibleFK_Idunidad" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idunidad"> Por Unidad</a></li>
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
							<input type="button" id="btnBuscarconsignacion_detalleFK_Idbodega" name="btnBuscarconsignacion_detalleFK_Idbodega" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idconsignacion">
					<table id="tblstrVisibleFK_Idconsignacion" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Consignacion</span>
						</td>
						<td align="center">
							<select id="FK_Idconsignacion-cmbid_consignacion" name="FK_Idconsignacion-cmbid_consignacion" title="Consignacion" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarconsignacion_detalleFK_Idconsignacion" name="btnBuscarconsignacion_detalleFK_Idconsignacion" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproducto">
					<table id="tblstrVisibleFK_Idproducto" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Producto</span>
						</td>
						<td align="center">
							<select id="FK_Idproducto-cmbid_producto" name="FK_Idproducto-cmbid_producto" title="Producto" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarconsignacion_detalleFK_Idproducto" name="btnBuscarconsignacion_detalleFK_Idproducto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idunidad">
					<table id="tblstrVisibleFK_Idunidad" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Unidad</span>
						</td>
						<td align="center">
							<select id="FK_Idunidad-cmbid_unidad" name="FK_Idunidad-cmbid_unidad" title="Unidad" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarconsignacion_detalleFK_Idunidad" name="btnBuscarconsignacion_detalleFK_Idunidad" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarconsignacion_detalle" style="display:table-row">
					<td id="tdParamsBuscarconsignacion_detalle">
		<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarconsignacion_detalle">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosconsignacion_detalle" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosconsignacion_detalle"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosconsignacion_detalle" name="ParamsBuscar-txtNumeroRegistrosconsignacion_detalle" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionconsignacion_detalle">
							<td id="tdGenerarReporteconsignacion_detalle" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosconsignacion_detalle" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosconsignacion_detalle" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionconsignacion_detalle" name="btnRecargarInformacionconsignacion_detalle" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaconsignacion_detalle" name="btnImprimirPaginaconsignacion_detalle" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*consignacion_detalle_web::$STR_ES_BUSQUEDA=='false'  &&*/ consignacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByconsignacion_detalle">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByconsignacion_detalle" name="btnOrderByconsignacion_detalle" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(consignacion_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdconsignacion_detalleConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosconsignacion_detalle -->

							</td><!-- tdGenerarReporteconsignacion_detalle -->
						</tr><!-- trRecargarInformacionconsignacion_detalle -->
					</table><!-- tblParamsBuscarNumeroRegistrosconsignacion_detalle -->
				</div> <!-- divParamsBuscarconsignacion_detalle -->
		<?php } ?>
				</td> <!-- tdParamsBuscarconsignacion_detalle -->
				</tr><!-- trParamsBuscarconsignacion_detalle -->
				</table> <!-- tblBusquedaconsignacion_detalle -->
				</form> <!-- frmBusquedaconsignacion_detalle -->
				

			</td> <!-- tdBusquedaconsignacion_detalle -->
		</tr> <!-- trBusquedaconsignacion_detalle/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divconsignacion_detallePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblconsignacion_detallePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmconsignacion_detalleAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnconsignacion_detalleAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="consignacion_detalle_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnconsignacion_detalleAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmconsignacion_detalleAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblconsignacion_detallePopupAjaxWebPart -->
		</div> <!-- divconsignacion_detallePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trconsignacion_detalleTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaconsignacion_detalle"></a>
		<img id="imgTablaParaDerechaconsignacion_detalle" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaconsignacion_detalle'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaconsignacion_detalle" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaconsignacion_detalle'"/>
		<a id="TablaDerechaconsignacion_detalle"></a>
	</td>
</tr> <!-- trconsignacion_detalleTablaNavegacion/super -->
<?php } ?>

<tr id="trconsignacion_detalleTablaDatos">
	<td colspan="3" id="htmlTableCellconsignacion_detalle">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosconsignacion_detallesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trconsignacion_detalleTablaDatos/super -->
		
		
		<tr id="trconsignacion_detallePaginacion" style="display:table-row">
			<td id="tdconsignacion_detallePaginacion" align="left">
				<div id="divconsignacion_detallePaginacionAjaxWebPart">
				<form id="frmPaginacionconsignacion_detalle" name="frmPaginacionconsignacion_detalle">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionconsignacion_detalle" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(consignacion_detalle_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkconsignacion_detalle" name="btnSeleccionarLoteFkconsignacion_detalle" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false' /*&& consignacion_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresconsignacion_detalle" name="btnAnterioresconsignacion_detalle" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(consignacion_detalle_web::$STR_ES_BUSQUEDA=='false' && consignacion_detalle_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdconsignacion_detalleNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararconsignacion_detalle" name="btnNuevoTablaPrepararconsignacion_detalle" title="NUEVO Consignacion Detalle" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaconsignacion_detalle" name="ParamsPaginar-txtNumeroNuevoTablaconsignacion_detalle" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdconsignacion_detalleConEditarconsignacion_detalle">
							<label>
								<input id="ParamsBuscar-chbConEditarconsignacion_detalle" name="ParamsBuscar-chbConEditarconsignacion_detalle" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false'/* && consignacion_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesconsignacion_detalle" name="btnSiguientesconsignacion_detalle" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionconsignacion_detalle -->
				</form> <!-- frmPaginacionconsignacion_detalle -->
				<form id="frmNuevoPrepararconsignacion_detalle" name="frmNuevoPrepararconsignacion_detalle">
				<table id="tblNuevoPrepararconsignacion_detalle" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trconsignacion_detalleNuevo" height="10">
						<?php if(consignacion_detalle_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdconsignacion_detalleNuevo" align="center">
							<input type="button" id="btnNuevoPrepararconsignacion_detalle" name="btnNuevoPrepararconsignacion_detalle" title="NUEVO Consignacion Detalle" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdconsignacion_detalleGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosconsignacion_detalle" name="btnGuardarCambiosconsignacion_detalle" title="GUARDAR Consignacion Detalle" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false' && consignacion_detalle_web::$STR_ES_RELACIONES=='false' && consignacion_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdconsignacion_detalleDuplicar" align="center">
							<input type="button" id="btnDuplicarconsignacion_detalle" name="btnDuplicarconsignacion_detalle" title="DUPLICAR Consignacion Detalle" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdconsignacion_detalleCopiar" align="center">
							<input type="button" id="btnCopiarconsignacion_detalle" name="btnCopiarconsignacion_detalle" title="COPIAR Consignacion Detalle" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false' && ((consignacion_detalle_web::$STR_ES_RELACIONADO=='false' && consignacion_detalle_web::$STR_ES_RELACIONES=='false') || consignacion_detalle_web::$STR_ES_BUSQUEDA=='true'  || consignacion_detalle_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdconsignacion_detalleCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaconsignacion_detalle" name="btnCerrarPaginaconsignacion_detalle" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararconsignacion_detalle -->
				</form> <!-- frmNuevoPrepararconsignacion_detalle -->
				</div> <!-- divconsignacion_detallePaginacionAjaxWebPart -->
			</td> <!-- tdconsignacion_detallePaginacion -->
		</tr> <!-- trconsignacion_detallePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesconsignacion_detalleAjaxWebPart">
			<td id="tdAccionesRelacionesconsignacion_detalleAjaxWebPart">
				<div id="divAccionesRelacionesconsignacion_detalleAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesconsignacion_detalleAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesconsignacion_detalleAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByconsignacion_detalle">
			<td id="tdOrderByconsignacion_detalle">
				<form id="frmOrderByconsignacion_detalle" name="frmOrderByconsignacion_detalle">
					<div id="divOrderByconsignacion_detalleAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByconsignacion_detalle -->
		</tr> <!-- trOrderByconsignacion_detalle/super -->
			
		
		
		
		
		
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
			
				import {consignacion_detalle_webcontrol,consignacion_detalle_webcontrol1} from './webroot/js/JavaScript/contabilidad/estimados/consignacion_detalle/js/webcontrol/consignacion_detalle_webcontrol.js?random=1';
				
				consignacion_detalle_webcontrol1.setconsignacion_detalle_constante(window.consignacion_detalle_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(consignacion_detalle_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

