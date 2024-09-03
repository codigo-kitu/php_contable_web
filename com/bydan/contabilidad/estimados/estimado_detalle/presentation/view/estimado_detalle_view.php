<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\estimados\estimado_detalle\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Estimado Detalle Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/estimados/estimado_detalle/util/estimado_detalle_carga.php');
	use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_carga;
	
	//include_once('com/bydan/contabilidad/estimados/estimado_detalle/presentation/view/estimado_detalle_web.php');
	//use com\bydan\contabilidad\estimados\estimado_detalle\presentation\view\estimado_detalle_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	estimado_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	estimado_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$estimado_detalle_web1= new estimado_detalle_web();	
	$estimado_detalle_web1->cargarDatosGenerales();
	
	//$moduloActual=$estimado_detalle_web1->moduloActual;
	//$usuarioActual=$estimado_detalle_web1->usuarioActual;
	//$sessionBase=$estimado_detalle_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$estimado_detalle_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/estimado_detalle/js/templating/estimado_detalle_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/estimado_detalle/js/templating/estimado_detalle_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/estimado_detalle/js/templating/estimado_detalle_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/estimado_detalle/js/templating/estimado_detalle_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			estimado_detalle_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					estimado_detalle_web::$GET_POST=$_GET;
				} else {
					estimado_detalle_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			estimado_detalle_web::$STR_NOMBRE_PAGINA = 'estimado_detalle_view.php';
			estimado_detalle_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			estimado_detalle_web::$BIT_ES_PAGINA_FORM = 'false';
				
			estimado_detalle_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {estimado_detalle_constante,estimado_detalle_constante1} from './webroot/js/JavaScript/contabilidad/estimados/estimado_detalle/js/util/estimado_detalle_constante.js?random=1';
			import {estimado_detalle_funcion,estimado_detalle_funcion1} from './webroot/js/JavaScript/contabilidad/estimados/estimado_detalle/js/util/estimado_detalle_funcion.js?random=1';
			
			let estimado_detalle_constante2 = new estimado_detalle_constante();
			
			estimado_detalle_constante2.STR_NOMBRE_PAGINA="<?php echo(estimado_detalle_web::$STR_NOMBRE_PAGINA); ?>";
			estimado_detalle_constante2.STR_TYPE_ON_LOADestimado_detalle="<?php echo(estimado_detalle_web::$STR_TYPE_ONLOAD); ?>";
			estimado_detalle_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(estimado_detalle_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			estimado_detalle_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(estimado_detalle_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			estimado_detalle_constante2.STR_ACTION="<?php echo(estimado_detalle_web::$STR_ACTION); ?>";
			estimado_detalle_constante2.STR_ES_POPUP="<?php echo(estimado_detalle_web::$STR_ES_POPUP); ?>";
			estimado_detalle_constante2.STR_ES_BUSQUEDA="<?php echo(estimado_detalle_web::$STR_ES_BUSQUEDA); ?>";
			estimado_detalle_constante2.STR_FUNCION_JS="<?php echo(estimado_detalle_web::$STR_FUNCION_JS); ?>";
			estimado_detalle_constante2.BIG_ID_ACTUAL="<?php echo(estimado_detalle_web::$BIG_ID_ACTUAL); ?>";
			estimado_detalle_constante2.BIG_ID_OPCION="<?php echo(estimado_detalle_web::$BIG_ID_OPCION); ?>";
			estimado_detalle_constante2.STR_OBJETO_JS="<?php echo(estimado_detalle_web::$STR_OBJETO_JS); ?>";
			estimado_detalle_constante2.STR_ES_RELACIONES="<?php echo(estimado_detalle_web::$STR_ES_RELACIONES); ?>";
			estimado_detalle_constante2.STR_ES_RELACIONADO="<?php echo(estimado_detalle_web::$STR_ES_RELACIONADO); ?>";
			estimado_detalle_constante2.STR_ES_SUB_PAGINA="<?php echo(estimado_detalle_web::$STR_ES_SUB_PAGINA); ?>";
			estimado_detalle_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(estimado_detalle_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			estimado_detalle_constante2.BIT_ES_PAGINA_FORM=<?php echo(estimado_detalle_web::$BIT_ES_PAGINA_FORM); ?>;
			estimado_detalle_constante2.STR_SUFIJO="<?php echo(estimado_detalle_web::$STR_SUF); ?>";//estimado_detalle
			estimado_detalle_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(estimado_detalle_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//estimado_detalle
			
			estimado_detalle_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(estimado_detalle_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			estimado_detalle_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($estimado_detalle_web1->moduloActual->getnombre()); ?>";
			estimado_detalle_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(estimado_detalle_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			estimado_detalle_constante2.BIT_ES_LOAD_NORMAL=true;
			/*estimado_detalle_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			estimado_detalle_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.estimado_detalle_constante2 = estimado_detalle_constante2;
			
		</script>
		
		<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.estimado_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.estimado_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="estimado_detalleActual" ></a>
	
	<div id="divResumenestimado_detalleActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(estimado_detalle_web::$STR_ES_BUSQUEDA=='false' && estimado_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(estimado_detalle_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false' && estimado_detalle_web::$STR_ES_POPUP=='false' && estimado_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdestimado_detalleNuevoToolBar">
										<img id="imgNuevoToolBarestimado_detalle" name="imgNuevoToolBarestimado_detalle" title="Nuevo Estimado Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(estimado_detalle_web::$STR_ES_BUSQUEDA=='false' && estimado_detalle_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdestimado_detalleNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarestimado_detalle" name="imgNuevoGuardarCambiosToolBarestimado_detalle" title="Nuevo TABLA Estimado Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(estimado_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdestimado_detalleGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarestimado_detalle" name="imgGuardarCambiosToolBarestimado_detalle" title="Guardar Estimado Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false' && estimado_detalle_web::$STR_ES_RELACIONES=='false' && estimado_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdestimado_detalleCopiarToolBar">
										<img id="imgCopiarToolBarestimado_detalle" name="imgCopiarToolBarestimado_detalle" title="Copiar Estimado Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdestimado_detalleDuplicarToolBar">
										<img id="imgDuplicarToolBarestimado_detalle" name="imgDuplicarToolBarestimado_detalle" title="Duplicar Estimado Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdestimado_detalleRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarestimado_detalle" name="imgRecargarInformacionToolBarestimado_detalle" title="Recargar Estimado Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdestimado_detalleAnterioresToolBar">
										<img id="imgAnterioresToolBarestimado_detalle" name="imgAnterioresToolBarestimado_detalle" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdestimado_detalleSiguientesToolBar">
										<img id="imgSiguientesToolBarestimado_detalle" name="imgSiguientesToolBarestimado_detalle" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdestimado_detalleAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarestimado_detalle" name="imgAbrirOrderByToolBarestimado_detalle" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((estimado_detalle_web::$STR_ES_RELACIONADO=='false' && estimado_detalle_web::$STR_ES_RELACIONES=='false') || estimado_detalle_web::$STR_ES_BUSQUEDA=='true'  || estimado_detalle_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdestimado_detalleCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarestimado_detalle" name="imgCerrarPaginaToolBarestimado_detalle" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trestimado_detalleCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaestimado_detalle" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaestimado_detalle',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trestimado_detalleCabeceraBusquedas/super -->

		<tr id="trBusquedaestimado_detalle" class="busqueda" style="display:table-row">
			<td id="tdBusquedaestimado_detalle" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaestimado_detalle" name="frmBusquedaestimado_detalle">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaestimado_detalle" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trestimado_detalleBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleFK_Idbodega" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idbodega"> Por Bodega</a></li>
						<li id="listrVisibleFK_Idestimado" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestimado"> Por Estimado</a></li>
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
							<input type="button" id="btnBuscarestimado_detalleFK_Idbodega" name="btnBuscarestimado_detalleFK_Idbodega" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idestimado">
					<table id="tblstrVisibleFK_Idestimado" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Estimado</span>
						</td>
						<td align="center">
							<select id="FK_Idestimado-cmbid_estimado" name="FK_Idestimado-cmbid_estimado" title="Estimado" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarestimado_detalleFK_Idestimado" name="btnBuscarestimado_detalleFK_Idestimado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarestimado_detalleFK_Idproducto" name="btnBuscarestimado_detalleFK_Idproducto" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarestimado_detalleFK_Idunidad" name="btnBuscarestimado_detalleFK_Idunidad" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarestimado_detalle" style="display:table-row">
					<td id="tdParamsBuscarestimado_detalle">
		<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarestimado_detalle">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosestimado_detalle" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosestimado_detalle"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosestimado_detalle" name="ParamsBuscar-txtNumeroRegistrosestimado_detalle" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionestimado_detalle">
							<td id="tdGenerarReporteestimado_detalle" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosestimado_detalle" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosestimado_detalle" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionestimado_detalle" name="btnRecargarInformacionestimado_detalle" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaestimado_detalle" name="btnImprimirPaginaestimado_detalle" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*estimado_detalle_web::$STR_ES_BUSQUEDA=='false'  &&*/ estimado_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByestimado_detalle">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByestimado_detalle" name="btnOrderByestimado_detalle" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(estimado_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdestimado_detalleConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosestimado_detalle -->

							</td><!-- tdGenerarReporteestimado_detalle -->
						</tr><!-- trRecargarInformacionestimado_detalle -->
					</table><!-- tblParamsBuscarNumeroRegistrosestimado_detalle -->
				</div> <!-- divParamsBuscarestimado_detalle -->
		<?php } ?>
				</td> <!-- tdParamsBuscarestimado_detalle -->
				</tr><!-- trParamsBuscarestimado_detalle -->
				</table> <!-- tblBusquedaestimado_detalle -->
				</form> <!-- frmBusquedaestimado_detalle -->
				

			</td> <!-- tdBusquedaestimado_detalle -->
		</tr> <!-- trBusquedaestimado_detalle/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divestimado_detallePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblestimado_detallePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmestimado_detalleAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnestimado_detalleAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="estimado_detalle_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnestimado_detalleAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmestimado_detalleAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblestimado_detallePopupAjaxWebPart -->
		</div> <!-- divestimado_detallePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trestimado_detalleTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaestimado_detalle"></a>
		<img id="imgTablaParaDerechaestimado_detalle" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaestimado_detalle'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaestimado_detalle" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaestimado_detalle'"/>
		<a id="TablaDerechaestimado_detalle"></a>
	</td>
</tr> <!-- trestimado_detalleTablaNavegacion/super -->
<?php } ?>

<tr id="trestimado_detalleTablaDatos">
	<td colspan="3" id="htmlTableCellestimado_detalle">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosestimado_detallesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trestimado_detalleTablaDatos/super -->
		
		
		<tr id="trestimado_detallePaginacion" style="display:table-row">
			<td id="tdestimado_detallePaginacion" align="left">
				<div id="divestimado_detallePaginacionAjaxWebPart">
				<form id="frmPaginacionestimado_detalle" name="frmPaginacionestimado_detalle">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionestimado_detalle" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(estimado_detalle_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkestimado_detalle" name="btnSeleccionarLoteFkestimado_detalle" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false' /*&& estimado_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresestimado_detalle" name="btnAnterioresestimado_detalle" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(estimado_detalle_web::$STR_ES_BUSQUEDA=='false' && estimado_detalle_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdestimado_detalleNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararestimado_detalle" name="btnNuevoTablaPrepararestimado_detalle" title="NUEVO Estimado Detalle" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaestimado_detalle" name="ParamsPaginar-txtNumeroNuevoTablaestimado_detalle" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdestimado_detalleConEditarestimado_detalle">
							<label>
								<input id="ParamsBuscar-chbConEditarestimado_detalle" name="ParamsBuscar-chbConEditarestimado_detalle" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false'/* && estimado_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesestimado_detalle" name="btnSiguientesestimado_detalle" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionestimado_detalle -->
				</form> <!-- frmPaginacionestimado_detalle -->
				<form id="frmNuevoPrepararestimado_detalle" name="frmNuevoPrepararestimado_detalle">
				<table id="tblNuevoPrepararestimado_detalle" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trestimado_detalleNuevo" height="10">
						<?php if(estimado_detalle_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdestimado_detalleNuevo" align="center">
							<input type="button" id="btnNuevoPrepararestimado_detalle" name="btnNuevoPrepararestimado_detalle" title="NUEVO Estimado Detalle" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdestimado_detalleGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosestimado_detalle" name="btnGuardarCambiosestimado_detalle" title="GUARDAR Estimado Detalle" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false' && estimado_detalle_web::$STR_ES_RELACIONES=='false' && estimado_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdestimado_detalleDuplicar" align="center">
							<input type="button" id="btnDuplicarestimado_detalle" name="btnDuplicarestimado_detalle" title="DUPLICAR Estimado Detalle" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdestimado_detalleCopiar" align="center">
							<input type="button" id="btnCopiarestimado_detalle" name="btnCopiarestimado_detalle" title="COPIAR Estimado Detalle" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false' && ((estimado_detalle_web::$STR_ES_RELACIONADO=='false' && estimado_detalle_web::$STR_ES_RELACIONES=='false') || estimado_detalle_web::$STR_ES_BUSQUEDA=='true'  || estimado_detalle_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdestimado_detalleCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaestimado_detalle" name="btnCerrarPaginaestimado_detalle" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararestimado_detalle -->
				</form> <!-- frmNuevoPrepararestimado_detalle -->
				</div> <!-- divestimado_detallePaginacionAjaxWebPart -->
			</td> <!-- tdestimado_detallePaginacion -->
		</tr> <!-- trestimado_detallePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesestimado_detalleAjaxWebPart">
			<td id="tdAccionesRelacionesestimado_detalleAjaxWebPart">
				<div id="divAccionesRelacionesestimado_detalleAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesestimado_detalleAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesestimado_detalleAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByestimado_detalle">
			<td id="tdOrderByestimado_detalle">
				<form id="frmOrderByestimado_detalle" name="frmOrderByestimado_detalle">
					<div id="divOrderByestimado_detalleAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByestimado_detalle -->
		</tr> <!-- trOrderByestimado_detalle/super -->
			
		
		
		
		
		
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
			
				import {estimado_detalle_webcontrol,estimado_detalle_webcontrol1} from './webroot/js/JavaScript/contabilidad/estimados/estimado_detalle/js/webcontrol/estimado_detalle_webcontrol.js?random=1';
				
				estimado_detalle_webcontrol1.setestimado_detalle_constante(window.estimado_detalle_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(estimado_detalle_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

