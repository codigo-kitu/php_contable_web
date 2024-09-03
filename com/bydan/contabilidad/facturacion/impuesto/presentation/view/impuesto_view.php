<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\impuesto\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Impuesto Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/impuesto/util/impuesto_carga.php');
	use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/impuesto/presentation/view/impuesto_web.php');
	//use com\bydan\contabilidad\facturacion\impuesto\presentation\view\impuesto_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	impuesto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	impuesto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$impuesto_web1= new impuesto_web();	
	$impuesto_web1->cargarDatosGenerales();
	
	//$moduloActual=$impuesto_web1->moduloActual;
	//$usuarioActual=$impuesto_web1->usuarioActual;
	//$sessionBase=$impuesto_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$impuesto_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/impuesto/js/templating/impuesto_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/impuesto/js/templating/impuesto_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/impuesto/js/templating/impuesto_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/impuesto/js/templating/impuesto_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/impuesto/js/templating/impuesto_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			impuesto_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					impuesto_web::$GET_POST=$_GET;
				} else {
					impuesto_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			impuesto_web::$STR_NOMBRE_PAGINA = 'impuesto_view.php';
			impuesto_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			impuesto_web::$BIT_ES_PAGINA_FORM = 'false';
				
			impuesto_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {impuesto_constante,impuesto_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/impuesto/js/util/impuesto_constante.js?random=1';
			import {impuesto_funcion,impuesto_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/impuesto/js/util/impuesto_funcion.js?random=1';
			
			let impuesto_constante2 = new impuesto_constante();
			
			impuesto_constante2.STR_NOMBRE_PAGINA="<?php echo(impuesto_web::$STR_NOMBRE_PAGINA); ?>";
			impuesto_constante2.STR_TYPE_ON_LOADimpuesto="<?php echo(impuesto_web::$STR_TYPE_ONLOAD); ?>";
			impuesto_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(impuesto_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			impuesto_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(impuesto_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			impuesto_constante2.STR_ACTION="<?php echo(impuesto_web::$STR_ACTION); ?>";
			impuesto_constante2.STR_ES_POPUP="<?php echo(impuesto_web::$STR_ES_POPUP); ?>";
			impuesto_constante2.STR_ES_BUSQUEDA="<?php echo(impuesto_web::$STR_ES_BUSQUEDA); ?>";
			impuesto_constante2.STR_FUNCION_JS="<?php echo(impuesto_web::$STR_FUNCION_JS); ?>";
			impuesto_constante2.BIG_ID_ACTUAL="<?php echo(impuesto_web::$BIG_ID_ACTUAL); ?>";
			impuesto_constante2.BIG_ID_OPCION="<?php echo(impuesto_web::$BIG_ID_OPCION); ?>";
			impuesto_constante2.STR_OBJETO_JS="<?php echo(impuesto_web::$STR_OBJETO_JS); ?>";
			impuesto_constante2.STR_ES_RELACIONES="<?php echo(impuesto_web::$STR_ES_RELACIONES); ?>";
			impuesto_constante2.STR_ES_RELACIONADO="<?php echo(impuesto_web::$STR_ES_RELACIONADO); ?>";
			impuesto_constante2.STR_ES_SUB_PAGINA="<?php echo(impuesto_web::$STR_ES_SUB_PAGINA); ?>";
			impuesto_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(impuesto_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			impuesto_constante2.BIT_ES_PAGINA_FORM=<?php echo(impuesto_web::$BIT_ES_PAGINA_FORM); ?>;
			impuesto_constante2.STR_SUFIJO="<?php echo(impuesto_web::$STR_SUF); ?>";//impuesto
			impuesto_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(impuesto_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//impuesto
			
			impuesto_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(impuesto_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			impuesto_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($impuesto_web1->moduloActual->getnombre()); ?>";
			impuesto_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(impuesto_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			impuesto_constante2.BIT_ES_LOAD_NORMAL=true;
			/*impuesto_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			impuesto_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.impuesto_constante2 = impuesto_constante2;
			
		</script>
		
		<?php if(impuesto_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.impuesto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.impuesto_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="impuestoActual" ></a>
	
	<div id="divResumenimpuestoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(impuesto_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(impuesto_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(impuesto_web::$STR_ES_BUSQUEDA=='false' && impuesto_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(impuesto_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(impuesto_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(impuesto_web::$STR_ES_RELACIONADO=='false' && impuesto_web::$STR_ES_POPUP=='false' && impuesto_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdimpuestoNuevoToolBar">
										<img id="imgNuevoToolBarimpuesto" name="imgNuevoToolBarimpuesto" title="Nuevo Impuesto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(impuesto_web::$STR_ES_BUSQUEDA=='false' && impuesto_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdimpuestoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarimpuesto" name="imgNuevoGuardarCambiosToolBarimpuesto" title="Nuevo TABLA Impuesto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(impuesto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimpuestoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarimpuesto" name="imgGuardarCambiosToolBarimpuesto" title="Guardar Impuesto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(impuesto_web::$STR_ES_RELACIONADO=='false' && impuesto_web::$STR_ES_RELACIONES=='false' && impuesto_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdimpuestoCopiarToolBar">
										<img id="imgCopiarToolBarimpuesto" name="imgCopiarToolBarimpuesto" title="Copiar Impuesto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdimpuestoDuplicarToolBar">
										<img id="imgDuplicarToolBarimpuesto" name="imgDuplicarToolBarimpuesto" title="Duplicar Impuesto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(impuesto_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdimpuestoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarimpuesto" name="imgRecargarInformacionToolBarimpuesto" title="Recargar Impuesto" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdimpuestoAnterioresToolBar">
										<img id="imgAnterioresToolBarimpuesto" name="imgAnterioresToolBarimpuesto" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdimpuestoSiguientesToolBar">
										<img id="imgSiguientesToolBarimpuesto" name="imgSiguientesToolBarimpuesto" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdimpuestoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarimpuesto" name="imgAbrirOrderByToolBarimpuesto" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((impuesto_web::$STR_ES_RELACIONADO=='false' && impuesto_web::$STR_ES_RELACIONES=='false') || impuesto_web::$STR_ES_BUSQUEDA=='true'  || impuesto_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdimpuestoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarimpuesto" name="imgCerrarPaginaToolBarimpuesto" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trimpuestoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaimpuesto" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaimpuesto',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trimpuestoCabeceraBusquedas/super -->

		<tr id="trBusquedaimpuesto" class="busqueda" style="display:table-row">
			<td id="tdBusquedaimpuesto" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaimpuesto" name="frmBusquedaimpuesto">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaimpuesto" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trimpuestoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(impuesto_web::$STR_ES_RELACIONADO=='false' ) {?>
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
							<input type="button" id="btnBuscarimpuestoFK_Idcuenta_compras" name="btnBuscarimpuestoFK_Idcuenta_compras" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarimpuestoFK_Idcuenta_ventas" name="btnBuscarimpuestoFK_Idcuenta_ventas" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarimpuesto" style="display:table-row">
					<td id="tdParamsBuscarimpuesto">
		<?php if(impuesto_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarimpuesto">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosimpuesto" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosimpuesto"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosimpuesto" name="ParamsBuscar-txtNumeroRegistrosimpuesto" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionimpuesto">
							<td id="tdGenerarReporteimpuesto" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosimpuesto" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosimpuesto" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionimpuesto" name="btnRecargarInformacionimpuesto" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaimpuesto" name="btnImprimirPaginaimpuesto" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*impuesto_web::$STR_ES_BUSQUEDA=='false'  &&*/ impuesto_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByimpuesto">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByimpuesto" name="btnOrderByimpuesto" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelimpuesto" name="btnOrderByRelimpuesto" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(impuesto_web::$STR_ES_RELACIONES=='false' && impuesto_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(impuesto_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdimpuestoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosimpuesto -->

							</td><!-- tdGenerarReporteimpuesto -->
						</tr><!-- trRecargarInformacionimpuesto -->
					</table><!-- tblParamsBuscarNumeroRegistrosimpuesto -->
				</div> <!-- divParamsBuscarimpuesto -->
		<?php } ?>
				</td> <!-- tdParamsBuscarimpuesto -->
				</tr><!-- trParamsBuscarimpuesto -->
				</table> <!-- tblBusquedaimpuesto -->
				</form> <!-- frmBusquedaimpuesto -->
				

			</td> <!-- tdBusquedaimpuesto -->
		</tr> <!-- trBusquedaimpuesto/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(impuesto_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divimpuestoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblimpuestoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmimpuestoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnimpuestoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="impuesto_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnimpuestoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmimpuestoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblimpuestoPopupAjaxWebPart -->
		</div> <!-- divimpuestoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(impuesto_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trimpuestoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaimpuesto"></a>
		<img id="imgTablaParaDerechaimpuesto" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaimpuesto'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaimpuesto" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaimpuesto'"/>
		<a id="TablaDerechaimpuesto"></a>
	</td>
</tr> <!-- trimpuestoTablaNavegacion/super -->
<?php } ?>

<tr id="trimpuestoTablaDatos">
	<td colspan="3" id="htmlTableCellimpuesto">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosimpuestosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trimpuestoTablaDatos/super -->
		
		
		<tr id="trimpuestoPaginacion" style="display:table-row">
			<td id="tdimpuestoPaginacion" align="left">
				<div id="divimpuestoPaginacionAjaxWebPart">
				<form id="frmPaginacionimpuesto" name="frmPaginacionimpuesto">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionimpuesto" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(impuesto_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkimpuesto" name="btnSeleccionarLoteFkimpuesto" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(impuesto_web::$STR_ES_RELACIONADO=='false' /*&& impuesto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresimpuesto" name="btnAnterioresimpuesto" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(impuesto_web::$STR_ES_BUSQUEDA=='false' && impuesto_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdimpuestoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararimpuesto" name="btnNuevoTablaPrepararimpuesto" title="NUEVO Impuesto" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaimpuesto" name="ParamsPaginar-txtNumeroNuevoTablaimpuesto" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(impuesto_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdimpuestoConEditarimpuesto">
							<label>
								<input id="ParamsBuscar-chbConEditarimpuesto" name="ParamsBuscar-chbConEditarimpuesto" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(impuesto_web::$STR_ES_RELACIONADO=='false'/* && impuesto_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesimpuesto" name="btnSiguientesimpuesto" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionimpuesto -->
				</form> <!-- frmPaginacionimpuesto -->
				<form id="frmNuevoPrepararimpuesto" name="frmNuevoPrepararimpuesto">
				<table id="tblNuevoPrepararimpuesto" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trimpuestoNuevo" height="10">
						<?php if(impuesto_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdimpuestoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararimpuesto" name="btnNuevoPrepararimpuesto" title="NUEVO Impuesto" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdimpuestoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosimpuesto" name="btnGuardarCambiosimpuesto" title="GUARDAR Impuesto" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(impuesto_web::$STR_ES_RELACIONADO=='false' && impuesto_web::$STR_ES_RELACIONES=='false' && impuesto_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdimpuestoDuplicar" align="center">
							<input type="button" id="btnDuplicarimpuesto" name="btnDuplicarimpuesto" title="DUPLICAR Impuesto" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdimpuestoCopiar" align="center">
							<input type="button" id="btnCopiarimpuesto" name="btnCopiarimpuesto" title="COPIAR Impuesto" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(impuesto_web::$STR_ES_RELACIONADO=='false' && ((impuesto_web::$STR_ES_RELACIONADO=='false' && impuesto_web::$STR_ES_RELACIONES=='false') || impuesto_web::$STR_ES_BUSQUEDA=='true'  || impuesto_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdimpuestoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaimpuesto" name="btnCerrarPaginaimpuesto" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararimpuesto -->
				</form> <!-- frmNuevoPrepararimpuesto -->
				</div> <!-- divimpuestoPaginacionAjaxWebPart -->
			</td> <!-- tdimpuestoPaginacion -->
		</tr> <!-- trimpuestoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(impuesto_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesimpuestoAjaxWebPart">
			<td id="tdAccionesRelacionesimpuestoAjaxWebPart">
				<div id="divAccionesRelacionesimpuestoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesimpuestoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesimpuestoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByimpuesto">
			<td id="tdOrderByimpuesto">
				<form id="frmOrderByimpuesto" name="frmOrderByimpuesto">
					<div id="divOrderByimpuestoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelimpuesto" name="frmOrderByRelimpuesto">
					<div id="divOrderByRelimpuestoAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByimpuesto -->
		</tr> <!-- trOrderByimpuesto/super -->
			
		
		
		
		
		
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
			
				import {impuesto_webcontrol,impuesto_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/impuesto/js/webcontrol/impuesto_webcontrol.js?random=1';
				
				impuesto_webcontrol1.setimpuesto_constante(window.impuesto_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(impuesto_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

