<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Auditoria Detalle Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/auditoria_detalle/util/auditoria_detalle_carga.php');
	use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/auditoria_detalle/presentation/view/auditoria_detalle_web.php');
	//use com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\view\auditoria_detalle_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	auditoria_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	auditoria_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$auditoria_detalle_web1= new auditoria_detalle_web();	
	$auditoria_detalle_web1->cargarDatosGenerales();
	
	//$moduloActual=$auditoria_detalle_web1->moduloActual;
	//$usuarioActual=$auditoria_detalle_web1->usuarioActual;
	//$sessionBase=$auditoria_detalle_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$auditoria_detalle_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/auditoria_detalle/js/templating/auditoria_detalle_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/auditoria_detalle/js/templating/auditoria_detalle_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/auditoria_detalle/js/templating/auditoria_detalle_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/auditoria_detalle/js/templating/auditoria_detalle_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			auditoria_detalle_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					auditoria_detalle_web::$GET_POST=$_GET;
				} else {
					auditoria_detalle_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			auditoria_detalle_web::$STR_NOMBRE_PAGINA = 'auditoria_detalle_view.php';
			auditoria_detalle_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			auditoria_detalle_web::$BIT_ES_PAGINA_FORM = 'false';
				
			auditoria_detalle_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {auditoria_detalle_constante,auditoria_detalle_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/auditoria_detalle/js/util/auditoria_detalle_constante.js?random=1';
			import {auditoria_detalle_funcion,auditoria_detalle_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/auditoria_detalle/js/util/auditoria_detalle_funcion.js?random=1';
			
			let auditoria_detalle_constante2 = new auditoria_detalle_constante();
			
			auditoria_detalle_constante2.STR_NOMBRE_PAGINA="<?php echo(auditoria_detalle_web::$STR_NOMBRE_PAGINA); ?>";
			auditoria_detalle_constante2.STR_TYPE_ON_LOADauditoria_detalle="<?php echo(auditoria_detalle_web::$STR_TYPE_ONLOAD); ?>";
			auditoria_detalle_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(auditoria_detalle_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			auditoria_detalle_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(auditoria_detalle_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			auditoria_detalle_constante2.STR_ACTION="<?php echo(auditoria_detalle_web::$STR_ACTION); ?>";
			auditoria_detalle_constante2.STR_ES_POPUP="<?php echo(auditoria_detalle_web::$STR_ES_POPUP); ?>";
			auditoria_detalle_constante2.STR_ES_BUSQUEDA="<?php echo(auditoria_detalle_web::$STR_ES_BUSQUEDA); ?>";
			auditoria_detalle_constante2.STR_FUNCION_JS="<?php echo(auditoria_detalle_web::$STR_FUNCION_JS); ?>";
			auditoria_detalle_constante2.BIG_ID_ACTUAL="<?php echo(auditoria_detalle_web::$BIG_ID_ACTUAL); ?>";
			auditoria_detalle_constante2.BIG_ID_OPCION="<?php echo(auditoria_detalle_web::$BIG_ID_OPCION); ?>";
			auditoria_detalle_constante2.STR_OBJETO_JS="<?php echo(auditoria_detalle_web::$STR_OBJETO_JS); ?>";
			auditoria_detalle_constante2.STR_ES_RELACIONES="<?php echo(auditoria_detalle_web::$STR_ES_RELACIONES); ?>";
			auditoria_detalle_constante2.STR_ES_RELACIONADO="<?php echo(auditoria_detalle_web::$STR_ES_RELACIONADO); ?>";
			auditoria_detalle_constante2.STR_ES_SUB_PAGINA="<?php echo(auditoria_detalle_web::$STR_ES_SUB_PAGINA); ?>";
			auditoria_detalle_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(auditoria_detalle_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			auditoria_detalle_constante2.BIT_ES_PAGINA_FORM=<?php echo(auditoria_detalle_web::$BIT_ES_PAGINA_FORM); ?>;
			auditoria_detalle_constante2.STR_SUFIJO="<?php echo(auditoria_detalle_web::$STR_SUF); ?>";//auditoria_detalle
			auditoria_detalle_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(auditoria_detalle_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//auditoria_detalle
			
			auditoria_detalle_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(auditoria_detalle_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			auditoria_detalle_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($auditoria_detalle_web1->moduloActual->getnombre()); ?>";
			auditoria_detalle_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(auditoria_detalle_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			auditoria_detalle_constante2.BIT_ES_LOAD_NORMAL=true;
			/*auditoria_detalle_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			auditoria_detalle_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.auditoria_detalle_constante2 = auditoria_detalle_constante2;
			
		</script>
		
		<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.auditoria_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.auditoria_detalle_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="auditoria_detalleActual" ></a>
	
	<div id="divResumenauditoria_detalleActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(auditoria_detalle_web::$STR_ES_BUSQUEDA=='false' && auditoria_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(auditoria_detalle_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false' && auditoria_detalle_web::$STR_ES_POPUP=='false' && auditoria_detalle_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdauditoria_detalleNuevoToolBar">
										<img id="imgNuevoToolBarauditoria_detalle" name="imgNuevoToolBarauditoria_detalle" title="Nuevo Auditoria Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(auditoria_detalle_web::$STR_ES_BUSQUEDA=='false' && auditoria_detalle_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdauditoria_detalleNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarauditoria_detalle" name="imgNuevoGuardarCambiosToolBarauditoria_detalle" title="Nuevo TABLA Auditoria Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(auditoria_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdauditoria_detalleGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarauditoria_detalle" name="imgGuardarCambiosToolBarauditoria_detalle" title="Guardar Auditoria Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false' && auditoria_detalle_web::$STR_ES_RELACIONES=='false' && auditoria_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdauditoria_detalleCopiarToolBar">
										<img id="imgCopiarToolBarauditoria_detalle" name="imgCopiarToolBarauditoria_detalle" title="Copiar Auditoria Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdauditoria_detalleDuplicarToolBar">
										<img id="imgDuplicarToolBarauditoria_detalle" name="imgDuplicarToolBarauditoria_detalle" title="Duplicar Auditoria Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdauditoria_detalleRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarauditoria_detalle" name="imgRecargarInformacionToolBarauditoria_detalle" title="Recargar Auditoria Detalle" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdauditoria_detalleAnterioresToolBar">
										<img id="imgAnterioresToolBarauditoria_detalle" name="imgAnterioresToolBarauditoria_detalle" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdauditoria_detalleSiguientesToolBar">
										<img id="imgSiguientesToolBarauditoria_detalle" name="imgSiguientesToolBarauditoria_detalle" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdauditoria_detalleAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarauditoria_detalle" name="imgAbrirOrderByToolBarauditoria_detalle" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((auditoria_detalle_web::$STR_ES_RELACIONADO=='false' && auditoria_detalle_web::$STR_ES_RELACIONES=='false') || auditoria_detalle_web::$STR_ES_BUSQUEDA=='true'  || auditoria_detalle_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdauditoria_detalleCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarauditoria_detalle" name="imgCerrarPaginaToolBarauditoria_detalle" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trauditoria_detalleCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaauditoria_detalle" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaauditoria_detalle',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trauditoria_detalleCabeceraBusquedas/super -->

		<tr id="trBusquedaauditoria_detalle" class="busqueda" style="display:table-row">
			<td id="tdBusquedaauditoria_detalle" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaauditoria_detalle" name="frmBusquedaauditoria_detalle">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaauditoria_detalle" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trauditoria_detalleBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleBusquedaPorIdAuditoriaPorNombreCampo" class="titulotab" style="display:table-row"><a href="#divstrVisibleBusquedaPorIdAuditoriaPorNombreCampo"> Por Auditoria Por Nombre Del Campo</a></li>
						<li id="listrVisibleFK_Idauditoria" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idauditoria"> Por Auditoria</a></li>
					</ul>
				
					<div id="divstrVisibleBusquedaPorIdAuditoriaPorNombreCampo">
					<table id="tblstrVisibleBusquedaPorIdAuditoriaPorNombreCampo" class="busqueda">
					
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Auditoria</span>
						</td>
						<td align="center">
							<select id="BusquedaPorIdAuditoriaPorNombreCampo-cmbid_auditoria" name="BusquedaPorIdAuditoriaPorNombreCampo-cmbid_auditoria" title="Auditoria" ></select>

						</td>
						</tr>
						<tr>
						<td class="busquedatitulocampo"><span  class="busquedatitulocampo">Nombre Del Campo</span>
						</td>
						<td align="center">
							<input id="BusquedaPorIdAuditoriaPorNombreCampo-txtnombre_campo" name="BusquedaPorIdAuditoriaPorNombreCampo-txtnombre_campo" type="text" class="form-control"  placeholder="Nombre Del Campo"  title="Nombre Del Campo"   size="20" >

						</td>
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarauditoria_detalleBusquedaPorIdAuditoriaPorNombreCampo" name="btnBuscarauditoria_detalleBusquedaPorIdAuditoriaPorNombreCampo" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idauditoria">
					<table id="tblstrVisibleFK_Idauditoria" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Auditoria</span>
						</td>
						<td align="center">
							<select id="FK_Idauditoria-cmbid_auditoria" name="FK_Idauditoria-cmbid_auditoria" title="Auditoria" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarauditoria_detalleFK_Idauditoria" name="btnBuscarauditoria_detalleFK_Idauditoria" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarauditoria_detalle" style="display:table-row">
					<td id="tdParamsBuscarauditoria_detalle">
		<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarauditoria_detalle">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosauditoria_detalle" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosauditoria_detalle"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosauditoria_detalle" name="ParamsBuscar-txtNumeroRegistrosauditoria_detalle" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionauditoria_detalle">
							<td id="tdGenerarReporteauditoria_detalle" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosauditoria_detalle" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosauditoria_detalle" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionauditoria_detalle" name="btnRecargarInformacionauditoria_detalle" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaauditoria_detalle" name="btnImprimirPaginaauditoria_detalle" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*auditoria_detalle_web::$STR_ES_BUSQUEDA=='false'  &&*/ auditoria_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByauditoria_detalle">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByauditoria_detalle" name="btnOrderByauditoria_detalle" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(auditoria_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdauditoria_detalleConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosauditoria_detalle -->

							</td><!-- tdGenerarReporteauditoria_detalle -->
						</tr><!-- trRecargarInformacionauditoria_detalle -->
					</table><!-- tblParamsBuscarNumeroRegistrosauditoria_detalle -->
				</div> <!-- divParamsBuscarauditoria_detalle -->
		<?php } ?>
				</td> <!-- tdParamsBuscarauditoria_detalle -->
				</tr><!-- trParamsBuscarauditoria_detalle -->
				</table> <!-- tblBusquedaauditoria_detalle -->
				</form> <!-- frmBusquedaauditoria_detalle -->
				

			</td> <!-- tdBusquedaauditoria_detalle -->
		</tr> <!-- trBusquedaauditoria_detalle/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divauditoria_detallePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblauditoria_detallePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmauditoria_detalleAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnauditoria_detalleAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="auditoria_detalle_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnauditoria_detalleAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmauditoria_detalleAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblauditoria_detallePopupAjaxWebPart -->
		</div> <!-- divauditoria_detallePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trauditoria_detalleTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaauditoria_detalle"></a>
		<img id="imgTablaParaDerechaauditoria_detalle" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaauditoria_detalle'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaauditoria_detalle" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaauditoria_detalle'"/>
		<a id="TablaDerechaauditoria_detalle"></a>
	</td>
</tr> <!-- trauditoria_detalleTablaNavegacion/super -->
<?php } ?>

<tr id="trauditoria_detalleTablaDatos">
	<td colspan="3" id="htmlTableCellauditoria_detalle">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosauditoria_detallesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trauditoria_detalleTablaDatos/super -->
		
		
		<tr id="trauditoria_detallePaginacion" style="display:table-row">
			<td id="tdauditoria_detallePaginacion" align="center">
				<div id="divauditoria_detallePaginacionAjaxWebPart">
				<form id="frmPaginacionauditoria_detalle" name="frmPaginacionauditoria_detalle">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionauditoria_detalle" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(auditoria_detalle_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkauditoria_detalle" name="btnSeleccionarLoteFkauditoria_detalle" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false' /*&& auditoria_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresauditoria_detalle" name="btnAnterioresauditoria_detalle" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(auditoria_detalle_web::$STR_ES_BUSQUEDA=='false' && auditoria_detalle_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdauditoria_detalleNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararauditoria_detalle" name="btnNuevoTablaPrepararauditoria_detalle" title="NUEVO Auditoria Detalle" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaauditoria_detalle" name="ParamsPaginar-txtNumeroNuevoTablaauditoria_detalle" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdauditoria_detalleConEditarauditoria_detalle">
							<label>
								<input id="ParamsBuscar-chbConEditarauditoria_detalle" name="ParamsBuscar-chbConEditarauditoria_detalle" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false'/* && auditoria_detalle_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesauditoria_detalle" name="btnSiguientesauditoria_detalle" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionauditoria_detalle -->
				</form> <!-- frmPaginacionauditoria_detalle -->
				<form id="frmNuevoPrepararauditoria_detalle" name="frmNuevoPrepararauditoria_detalle">
				<table id="tblNuevoPrepararauditoria_detalle" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trauditoria_detalleNuevo" height="10">
						<?php if(auditoria_detalle_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdauditoria_detalleNuevo" align="center">
							<input type="button" id="btnNuevoPrepararauditoria_detalle" name="btnNuevoPrepararauditoria_detalle" title="NUEVO Auditoria Detalle" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdauditoria_detalleGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosauditoria_detalle" name="btnGuardarCambiosauditoria_detalle" title="GUARDAR Auditoria Detalle" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false' && auditoria_detalle_web::$STR_ES_RELACIONES=='false' && auditoria_detalle_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdauditoria_detalleDuplicar" align="center">
							<input type="button" id="btnDuplicarauditoria_detalle" name="btnDuplicarauditoria_detalle" title="DUPLICAR Auditoria Detalle" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdauditoria_detalleCopiar" align="center">
							<input type="button" id="btnCopiarauditoria_detalle" name="btnCopiarauditoria_detalle" title="COPIAR Auditoria Detalle" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false' && ((auditoria_detalle_web::$STR_ES_RELACIONADO=='false' && auditoria_detalle_web::$STR_ES_RELACIONES=='false') || auditoria_detalle_web::$STR_ES_BUSQUEDA=='true'  || auditoria_detalle_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdauditoria_detalleCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaauditoria_detalle" name="btnCerrarPaginaauditoria_detalle" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararauditoria_detalle -->
				</form> <!-- frmNuevoPrepararauditoria_detalle -->
				</div> <!-- divauditoria_detallePaginacionAjaxWebPart -->
			</td> <!-- tdauditoria_detallePaginacion -->
		</tr> <!-- trauditoria_detallePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesauditoria_detalleAjaxWebPart">
			<td id="tdAccionesRelacionesauditoria_detalleAjaxWebPart">
				<div id="divAccionesRelacionesauditoria_detalleAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesauditoria_detalleAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesauditoria_detalleAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByauditoria_detalle">
			<td id="tdOrderByauditoria_detalle">
				<form id="frmOrderByauditoria_detalle" name="frmOrderByauditoria_detalle">
					<div id="divOrderByauditoria_detalleAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByauditoria_detalle -->
		</tr> <!-- trOrderByauditoria_detalle/super -->
			
		
		
		
		
		
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
			
				import {auditoria_detalle_webcontrol,auditoria_detalle_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/auditoria_detalle/js/webcontrol/auditoria_detalle_webcontrol.js?random=1';
				
				auditoria_detalle_webcontrol1.setauditoria_detalle_constante(window.auditoria_detalle_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(auditoria_detalle_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

