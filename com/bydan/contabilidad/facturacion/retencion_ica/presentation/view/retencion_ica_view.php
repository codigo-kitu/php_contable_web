<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\retencion_ica\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Retencion Ica Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/retencion_ica/util/retencion_ica_carga.php');
	use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/retencion_ica/presentation/view/retencion_ica_web.php');
	//use com\bydan\contabilidad\facturacion\retencion_ica\presentation\view\retencion_ica_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	retencion_ica_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	retencion_ica_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$retencion_ica_web1= new retencion_ica_web();	
	$retencion_ica_web1->cargarDatosGenerales();
	
	//$moduloActual=$retencion_ica_web1->moduloActual;
	//$usuarioActual=$retencion_ica_web1->usuarioActual;
	//$sessionBase=$retencion_ica_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$retencion_ica_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion_ica/js/templating/retencion_ica_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion_ica/js/templating/retencion_ica_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion_ica/js/templating/retencion_ica_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion_ica/js/templating/retencion_ica_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion_ica/js/templating/retencion_ica_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			retencion_ica_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					retencion_ica_web::$GET_POST=$_GET;
				} else {
					retencion_ica_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			retencion_ica_web::$STR_NOMBRE_PAGINA = 'retencion_ica_view.php';
			retencion_ica_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			retencion_ica_web::$BIT_ES_PAGINA_FORM = 'false';
				
			retencion_ica_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {retencion_ica_constante,retencion_ica_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/retencion_ica/js/util/retencion_ica_constante.js?random=1';
			import {retencion_ica_funcion,retencion_ica_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/retencion_ica/js/util/retencion_ica_funcion.js?random=1';
			
			let retencion_ica_constante2 = new retencion_ica_constante();
			
			retencion_ica_constante2.STR_NOMBRE_PAGINA="<?php echo(retencion_ica_web::$STR_NOMBRE_PAGINA); ?>";
			retencion_ica_constante2.STR_TYPE_ON_LOADretencion_ica="<?php echo(retencion_ica_web::$STR_TYPE_ONLOAD); ?>";
			retencion_ica_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(retencion_ica_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			retencion_ica_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(retencion_ica_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			retencion_ica_constante2.STR_ACTION="<?php echo(retencion_ica_web::$STR_ACTION); ?>";
			retencion_ica_constante2.STR_ES_POPUP="<?php echo(retencion_ica_web::$STR_ES_POPUP); ?>";
			retencion_ica_constante2.STR_ES_BUSQUEDA="<?php echo(retencion_ica_web::$STR_ES_BUSQUEDA); ?>";
			retencion_ica_constante2.STR_FUNCION_JS="<?php echo(retencion_ica_web::$STR_FUNCION_JS); ?>";
			retencion_ica_constante2.BIG_ID_ACTUAL="<?php echo(retencion_ica_web::$BIG_ID_ACTUAL); ?>";
			retencion_ica_constante2.BIG_ID_OPCION="<?php echo(retencion_ica_web::$BIG_ID_OPCION); ?>";
			retencion_ica_constante2.STR_OBJETO_JS="<?php echo(retencion_ica_web::$STR_OBJETO_JS); ?>";
			retencion_ica_constante2.STR_ES_RELACIONES="<?php echo(retencion_ica_web::$STR_ES_RELACIONES); ?>";
			retencion_ica_constante2.STR_ES_RELACIONADO="<?php echo(retencion_ica_web::$STR_ES_RELACIONADO); ?>";
			retencion_ica_constante2.STR_ES_SUB_PAGINA="<?php echo(retencion_ica_web::$STR_ES_SUB_PAGINA); ?>";
			retencion_ica_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(retencion_ica_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			retencion_ica_constante2.BIT_ES_PAGINA_FORM=<?php echo(retencion_ica_web::$BIT_ES_PAGINA_FORM); ?>;
			retencion_ica_constante2.STR_SUFIJO="<?php echo(retencion_ica_web::$STR_SUF); ?>";//retencion_ica
			retencion_ica_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(retencion_ica_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//retencion_ica
			
			retencion_ica_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(retencion_ica_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			retencion_ica_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($retencion_ica_web1->moduloActual->getnombre()); ?>";
			retencion_ica_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(retencion_ica_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			retencion_ica_constante2.BIT_ES_LOAD_NORMAL=true;
			/*retencion_ica_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			retencion_ica_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.retencion_ica_constante2 = retencion_ica_constante2;
			
		</script>
		
		<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.retencion_ica_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.retencion_ica_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="retencion_icaActual" ></a>
	
	<div id="divResumenretencion_icaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(retencion_ica_web::$STR_ES_BUSQUEDA=='false' && retencion_ica_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(retencion_ica_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false' && retencion_ica_web::$STR_ES_POPUP=='false' && retencion_ica_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdretencion_icaNuevoToolBar">
										<img id="imgNuevoToolBarretencion_ica" name="imgNuevoToolBarretencion_ica" title="Nuevo Retencion Ica" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(retencion_ica_web::$STR_ES_BUSQUEDA=='false' && retencion_ica_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdretencion_icaNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarretencion_ica" name="imgNuevoGuardarCambiosToolBarretencion_ica" title="Nuevo TABLA Retencion Ica" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(retencion_ica_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdretencion_icaGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarretencion_ica" name="imgGuardarCambiosToolBarretencion_ica" title="Guardar Retencion Ica" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false' && retencion_ica_web::$STR_ES_RELACIONES=='false' && retencion_ica_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdretencion_icaCopiarToolBar">
										<img id="imgCopiarToolBarretencion_ica" name="imgCopiarToolBarretencion_ica" title="Copiar Retencion Ica" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdretencion_icaDuplicarToolBar">
										<img id="imgDuplicarToolBarretencion_ica" name="imgDuplicarToolBarretencion_ica" title="Duplicar Retencion Ica" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdretencion_icaRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarretencion_ica" name="imgRecargarInformacionToolBarretencion_ica" title="Recargar Retencion Ica" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdretencion_icaAnterioresToolBar">
										<img id="imgAnterioresToolBarretencion_ica" name="imgAnterioresToolBarretencion_ica" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdretencion_icaSiguientesToolBar">
										<img id="imgSiguientesToolBarretencion_ica" name="imgSiguientesToolBarretencion_ica" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdretencion_icaAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarretencion_ica" name="imgAbrirOrderByToolBarretencion_ica" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((retencion_ica_web::$STR_ES_RELACIONADO=='false' && retencion_ica_web::$STR_ES_RELACIONES=='false') || retencion_ica_web::$STR_ES_BUSQUEDA=='true'  || retencion_ica_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdretencion_icaCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarretencion_ica" name="imgCerrarPaginaToolBarretencion_ica" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trretencion_icaCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaretencion_ica" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaretencion_ica',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trretencion_icaCabeceraBusquedas/super -->

		<tr id="trBusquedaretencion_ica" class="busqueda" style="display:table-row">
			<td id="tdBusquedaretencion_ica" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaretencion_ica" name="frmBusquedaretencion_ica">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaretencion_ica" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trretencion_icaBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcuenta_compras" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_compras"> Por  Cuentas Compras</a></li>
						<li id="listrVisibleFK_Idcuenta_ventas" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_ventas"> Por  Cuentas Ventas</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcuenta_compras">
					<table id="tblstrVisibleFK_Idcuenta_compras" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuentas Compras</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_compras-cmbid_cuenta_compras" name="FK_Idcuenta_compras-cmbid_cuenta_compras" title=" Cuentas Compras" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarretencion_icaFK_Idcuenta_compras" name="btnBuscarretencion_icaFK_Idcuenta_compras" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idcuenta_ventas">
					<table id="tblstrVisibleFK_Idcuenta_ventas" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuentas Ventas</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_ventas-cmbid_cuenta_ventas" name="FK_Idcuenta_ventas-cmbid_cuenta_ventas" title=" Cuentas Ventas" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarretencion_icaFK_Idcuenta_ventas" name="btnBuscarretencion_icaFK_Idcuenta_ventas" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarretencion_ica" style="display:table-row">
					<td id="tdParamsBuscarretencion_ica">
		<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarretencion_ica">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosretencion_ica" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosretencion_ica"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosretencion_ica" name="ParamsBuscar-txtNumeroRegistrosretencion_ica" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionretencion_ica">
							<td id="tdGenerarReporteretencion_ica" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosretencion_ica" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosretencion_ica" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionretencion_ica" name="btnRecargarInformacionretencion_ica" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaretencion_ica" name="btnImprimirPaginaretencion_ica" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*retencion_ica_web::$STR_ES_BUSQUEDA=='false'  &&*/ retencion_ica_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByretencion_ica">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByretencion_ica" name="btnOrderByretencion_ica" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelretencion_ica" name="btnOrderByRelretencion_ica" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(retencion_ica_web::$STR_ES_RELACIONES=='false' && retencion_ica_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(retencion_ica_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdretencion_icaConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosretencion_ica -->

							</td><!-- tdGenerarReporteretencion_ica -->
						</tr><!-- trRecargarInformacionretencion_ica -->
					</table><!-- tblParamsBuscarNumeroRegistrosretencion_ica -->
				</div> <!-- divParamsBuscarretencion_ica -->
		<?php } ?>
				</td> <!-- tdParamsBuscarretencion_ica -->
				</tr><!-- trParamsBuscarretencion_ica -->
				</table> <!-- tblBusquedaretencion_ica -->
				</form> <!-- frmBusquedaretencion_ica -->
				

			</td> <!-- tdBusquedaretencion_ica -->
		</tr> <!-- trBusquedaretencion_ica/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divretencion_icaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblretencion_icaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmretencion_icaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnretencion_icaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="retencion_ica_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnretencion_icaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmretencion_icaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblretencion_icaPopupAjaxWebPart -->
		</div> <!-- divretencion_icaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trretencion_icaTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaretencion_ica"></a>
		<img id="imgTablaParaDerecharetencion_ica" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerecharetencion_ica'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaretencion_ica" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaretencion_ica'"/>
		<a id="TablaDerecharetencion_ica"></a>
	</td>
</tr> <!-- trretencion_icaTablaNavegacion/super -->
<?php } ?>

<tr id="trretencion_icaTablaDatos">
	<td colspan="3" id="htmlTableCellretencion_ica">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosretencion_icasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trretencion_icaTablaDatos/super -->
		
		
		<tr id="trretencion_icaPaginacion" style="display:table-row">
			<td id="tdretencion_icaPaginacion" align="left">
				<div id="divretencion_icaPaginacionAjaxWebPart">
				<form id="frmPaginacionretencion_ica" name="frmPaginacionretencion_ica">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionretencion_ica" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(retencion_ica_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkretencion_ica" name="btnSeleccionarLoteFkretencion_ica" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false' /*&& retencion_ica_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresretencion_ica" name="btnAnterioresretencion_ica" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(retencion_ica_web::$STR_ES_BUSQUEDA=='false' && retencion_ica_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdretencion_icaNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararretencion_ica" name="btnNuevoTablaPrepararretencion_ica" title="NUEVO Retencion Ica" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaretencion_ica" name="ParamsPaginar-txtNumeroNuevoTablaretencion_ica" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdretencion_icaConEditarretencion_ica">
							<label>
								<input id="ParamsBuscar-chbConEditarretencion_ica" name="ParamsBuscar-chbConEditarretencion_ica" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false'/* && retencion_ica_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesretencion_ica" name="btnSiguientesretencion_ica" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionretencion_ica -->
				</form> <!-- frmPaginacionretencion_ica -->
				<form id="frmNuevoPrepararretencion_ica" name="frmNuevoPrepararretencion_ica">
				<table id="tblNuevoPrepararretencion_ica" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trretencion_icaNuevo" height="10">
						<?php if(retencion_ica_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdretencion_icaNuevo" align="center">
							<input type="button" id="btnNuevoPrepararretencion_ica" name="btnNuevoPrepararretencion_ica" title="NUEVO Retencion Ica" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdretencion_icaGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosretencion_ica" name="btnGuardarCambiosretencion_ica" title="GUARDAR Retencion Ica" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false' && retencion_ica_web::$STR_ES_RELACIONES=='false' && retencion_ica_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdretencion_icaDuplicar" align="center">
							<input type="button" id="btnDuplicarretencion_ica" name="btnDuplicarretencion_ica" title="DUPLICAR Retencion Ica" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdretencion_icaCopiar" align="center">
							<input type="button" id="btnCopiarretencion_ica" name="btnCopiarretencion_ica" title="COPIAR Retencion Ica" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false' && ((retencion_ica_web::$STR_ES_RELACIONADO=='false' && retencion_ica_web::$STR_ES_RELACIONES=='false') || retencion_ica_web::$STR_ES_BUSQUEDA=='true'  || retencion_ica_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdretencion_icaCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaretencion_ica" name="btnCerrarPaginaretencion_ica" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararretencion_ica -->
				</form> <!-- frmNuevoPrepararretencion_ica -->
				</div> <!-- divretencion_icaPaginacionAjaxWebPart -->
			</td> <!-- tdretencion_icaPaginacion -->
		</tr> <!-- trretencion_icaPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesretencion_icaAjaxWebPart">
			<td id="tdAccionesRelacionesretencion_icaAjaxWebPart">
				<div id="divAccionesRelacionesretencion_icaAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesretencion_icaAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesretencion_icaAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByretencion_ica">
			<td id="tdOrderByretencion_ica">
				<form id="frmOrderByretencion_ica" name="frmOrderByretencion_ica">
					<div id="divOrderByretencion_icaAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelretencion_ica" name="frmOrderByRelretencion_ica">
					<div id="divOrderByRelretencion_icaAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByretencion_ica -->
		</tr> <!-- trOrderByretencion_ica/super -->
			
		
		
		
		
		
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
			
				import {retencion_ica_webcontrol,retencion_ica_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/retencion_ica/js/webcontrol/retencion_ica_webcontrol.js?random=1';
				
				retencion_ica_webcontrol1.setretencion_ica_constante(window.retencion_ica_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(retencion_ica_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

