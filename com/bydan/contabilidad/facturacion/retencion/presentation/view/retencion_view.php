<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\facturacion\retencion\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Retencion Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/facturacion/retencion/util/retencion_carga.php');
	use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
	
	//include_once('com/bydan/contabilidad/facturacion/retencion/presentation/view/retencion_web.php');
	//use com\bydan\contabilidad\facturacion\retencion\presentation\view\retencion_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	retencion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	retencion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$retencion_web1= new retencion_web();	
	$retencion_web1->cargarDatosGenerales();
	
	//$moduloActual=$retencion_web1->moduloActual;
	//$usuarioActual=$retencion_web1->usuarioActual;
	//$sessionBase=$retencion_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$retencion_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion/js/templating/retencion_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion/js/templating/retencion_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion/js/templating/retencion_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion/js/templating/retencion_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/facturacion/retencion/js/templating/retencion_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			retencion_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					retencion_web::$GET_POST=$_GET;
				} else {
					retencion_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			retencion_web::$STR_NOMBRE_PAGINA = 'retencion_view.php';
			retencion_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			retencion_web::$BIT_ES_PAGINA_FORM = 'false';
				
			retencion_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {retencion_constante,retencion_constante1} from './webroot/js/JavaScript/contabilidad/facturacion/retencion/js/util/retencion_constante.js?random=1';
			import {retencion_funcion,retencion_funcion1} from './webroot/js/JavaScript/contabilidad/facturacion/retencion/js/util/retencion_funcion.js?random=1';
			
			let retencion_constante2 = new retencion_constante();
			
			retencion_constante2.STR_NOMBRE_PAGINA="<?php echo(retencion_web::$STR_NOMBRE_PAGINA); ?>";
			retencion_constante2.STR_TYPE_ON_LOADretencion="<?php echo(retencion_web::$STR_TYPE_ONLOAD); ?>";
			retencion_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(retencion_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			retencion_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(retencion_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			retencion_constante2.STR_ACTION="<?php echo(retencion_web::$STR_ACTION); ?>";
			retencion_constante2.STR_ES_POPUP="<?php echo(retencion_web::$STR_ES_POPUP); ?>";
			retencion_constante2.STR_ES_BUSQUEDA="<?php echo(retencion_web::$STR_ES_BUSQUEDA); ?>";
			retencion_constante2.STR_FUNCION_JS="<?php echo(retencion_web::$STR_FUNCION_JS); ?>";
			retencion_constante2.BIG_ID_ACTUAL="<?php echo(retencion_web::$BIG_ID_ACTUAL); ?>";
			retencion_constante2.BIG_ID_OPCION="<?php echo(retencion_web::$BIG_ID_OPCION); ?>";
			retencion_constante2.STR_OBJETO_JS="<?php echo(retencion_web::$STR_OBJETO_JS); ?>";
			retencion_constante2.STR_ES_RELACIONES="<?php echo(retencion_web::$STR_ES_RELACIONES); ?>";
			retencion_constante2.STR_ES_RELACIONADO="<?php echo(retencion_web::$STR_ES_RELACIONADO); ?>";
			retencion_constante2.STR_ES_SUB_PAGINA="<?php echo(retencion_web::$STR_ES_SUB_PAGINA); ?>";
			retencion_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(retencion_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			retencion_constante2.BIT_ES_PAGINA_FORM=<?php echo(retencion_web::$BIT_ES_PAGINA_FORM); ?>;
			retencion_constante2.STR_SUFIJO="<?php echo(retencion_web::$STR_SUF); ?>";//retencion
			retencion_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(retencion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//retencion
			
			retencion_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(retencion_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			retencion_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($retencion_web1->moduloActual->getnombre()); ?>";
			retencion_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(retencion_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			retencion_constante2.BIT_ES_LOAD_NORMAL=true;
			/*retencion_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			retencion_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.retencion_constante2 = retencion_constante2;
			
		</script>
		
		<?php if(retencion_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.retencion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.retencion_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="retencionActual" ></a>
	
	<div id="divResumenretencionActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(retencion_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(retencion_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(retencion_web::$STR_ES_BUSQUEDA=='false' && retencion_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(retencion_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(retencion_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(retencion_web::$STR_ES_RELACIONADO=='false' && retencion_web::$STR_ES_POPUP=='false' && retencion_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdretencionNuevoToolBar">
										<img id="imgNuevoToolBarretencion" name="imgNuevoToolBarretencion" title="Nuevo Retencion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(retencion_web::$STR_ES_BUSQUEDA=='false' && retencion_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdretencionNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarretencion" name="imgNuevoGuardarCambiosToolBarretencion" title="Nuevo TABLA Retencion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(retencion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdretencionGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarretencion" name="imgGuardarCambiosToolBarretencion" title="Guardar Retencion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(retencion_web::$STR_ES_RELACIONADO=='false' && retencion_web::$STR_ES_RELACIONES=='false' && retencion_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdretencionCopiarToolBar">
										<img id="imgCopiarToolBarretencion" name="imgCopiarToolBarretencion" title="Copiar Retencion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdretencionDuplicarToolBar">
										<img id="imgDuplicarToolBarretencion" name="imgDuplicarToolBarretencion" title="Duplicar Retencion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(retencion_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdretencionRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarretencion" name="imgRecargarInformacionToolBarretencion" title="Recargar Retencion" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdretencionAnterioresToolBar">
										<img id="imgAnterioresToolBarretencion" name="imgAnterioresToolBarretencion" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdretencionSiguientesToolBar">
										<img id="imgSiguientesToolBarretencion" name="imgSiguientesToolBarretencion" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdretencionAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarretencion" name="imgAbrirOrderByToolBarretencion" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((retencion_web::$STR_ES_RELACIONADO=='false' && retencion_web::$STR_ES_RELACIONES=='false') || retencion_web::$STR_ES_BUSQUEDA=='true'  || retencion_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdretencionCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarretencion" name="imgCerrarPaginaToolBarretencion" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trretencionCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaretencion" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaretencion',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trretencionCabeceraBusquedas/super -->

		<tr id="trBusquedaretencion" class="busqueda" style="display:table-row">
			<td id="tdBusquedaretencion" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaretencion" name="frmBusquedaretencion">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaretencion" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trretencionBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(retencion_web::$STR_ES_RELACIONADO=='false' ) {?>
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
							<input type="button" id="btnBuscarretencionFK_Idcuenta_compras" name="btnBuscarretencionFK_Idcuenta_compras" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
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
							<input type="button" id="btnBuscarretencionFK_Idcuenta_ventas" name="btnBuscarretencionFK_Idcuenta_ventas" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarretencion" style="display:table-row">
					<td id="tdParamsBuscarretencion">
		<?php if(retencion_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarretencion">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosretencion" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosretencion"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosretencion" name="ParamsBuscar-txtNumeroRegistrosretencion" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionretencion">
							<td id="tdGenerarReporteretencion" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosretencion" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosretencion" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionretencion" name="btnRecargarInformacionretencion" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaretencion" name="btnImprimirPaginaretencion" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*retencion_web::$STR_ES_BUSQUEDA=='false'  &&*/ retencion_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByretencion">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByretencion" name="btnOrderByretencion" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelretencion" name="btnOrderByRelretencion" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(retencion_web::$STR_ES_RELACIONES=='false' && retencion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(retencion_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdretencionConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosretencion -->

							</td><!-- tdGenerarReporteretencion -->
						</tr><!-- trRecargarInformacionretencion -->
					</table><!-- tblParamsBuscarNumeroRegistrosretencion -->
				</div> <!-- divParamsBuscarretencion -->
		<?php } ?>
				</td> <!-- tdParamsBuscarretencion -->
				</tr><!-- trParamsBuscarretencion -->
				</table> <!-- tblBusquedaretencion -->
				</form> <!-- frmBusquedaretencion -->
				

			</td> <!-- tdBusquedaretencion -->
		</tr> <!-- trBusquedaretencion/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(retencion_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divretencionPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblretencionPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmretencionAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnretencionAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="retencion_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnretencionAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmretencionAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblretencionPopupAjaxWebPart -->
		</div> <!-- divretencionPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(retencion_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trretencionTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaretencion"></a>
		<img id="imgTablaParaDerecharetencion" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerecharetencion'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaretencion" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaretencion'"/>
		<a id="TablaDerecharetencion"></a>
	</td>
</tr> <!-- trretencionTablaNavegacion/super -->
<?php } ?>

<tr id="trretencionTablaDatos">
	<td colspan="3" id="htmlTableCellretencion">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosretencionsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trretencionTablaDatos/super -->
		
		
		<tr id="trretencionPaginacion" style="display:table-row">
			<td id="tdretencionPaginacion" align="left">
				<div id="divretencionPaginacionAjaxWebPart">
				<form id="frmPaginacionretencion" name="frmPaginacionretencion">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionretencion" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(retencion_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkretencion" name="btnSeleccionarLoteFkretencion" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(retencion_web::$STR_ES_RELACIONADO=='false' /*&& retencion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresretencion" name="btnAnterioresretencion" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(retencion_web::$STR_ES_BUSQUEDA=='false' && retencion_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdretencionNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararretencion" name="btnNuevoTablaPrepararretencion" title="NUEVO Retencion" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaretencion" name="ParamsPaginar-txtNumeroNuevoTablaretencion" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(retencion_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdretencionConEditarretencion">
							<label>
								<input id="ParamsBuscar-chbConEditarretencion" name="ParamsBuscar-chbConEditarretencion" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(retencion_web::$STR_ES_RELACIONADO=='false'/* && retencion_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesretencion" name="btnSiguientesretencion" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionretencion -->
				</form> <!-- frmPaginacionretencion -->
				<form id="frmNuevoPrepararretencion" name="frmNuevoPrepararretencion">
				<table id="tblNuevoPrepararretencion" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trretencionNuevo" height="10">
						<?php if(retencion_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdretencionNuevo" align="center">
							<input type="button" id="btnNuevoPrepararretencion" name="btnNuevoPrepararretencion" title="NUEVO Retencion" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdretencionGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosretencion" name="btnGuardarCambiosretencion" title="GUARDAR Retencion" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(retencion_web::$STR_ES_RELACIONADO=='false' && retencion_web::$STR_ES_RELACIONES=='false' && retencion_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdretencionDuplicar" align="center">
							<input type="button" id="btnDuplicarretencion" name="btnDuplicarretencion" title="DUPLICAR Retencion" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdretencionCopiar" align="center">
							<input type="button" id="btnCopiarretencion" name="btnCopiarretencion" title="COPIAR Retencion" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(retencion_web::$STR_ES_RELACIONADO=='false' && ((retencion_web::$STR_ES_RELACIONADO=='false' && retencion_web::$STR_ES_RELACIONES=='false') || retencion_web::$STR_ES_BUSQUEDA=='true'  || retencion_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdretencionCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaretencion" name="btnCerrarPaginaretencion" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararretencion -->
				</form> <!-- frmNuevoPrepararretencion -->
				</div> <!-- divretencionPaginacionAjaxWebPart -->
			</td> <!-- tdretencionPaginacion -->
		</tr> <!-- trretencionPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(retencion_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesretencionAjaxWebPart">
			<td id="tdAccionesRelacionesretencionAjaxWebPart">
				<div id="divAccionesRelacionesretencionAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesretencionAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesretencionAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByretencion">
			<td id="tdOrderByretencion">
				<form id="frmOrderByretencion" name="frmOrderByretencion">
					<div id="divOrderByretencionAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelretencion" name="frmOrderByRelretencion">
					<div id="divOrderByRelretencionAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByretencion -->
		</tr> <!-- trOrderByretencion/super -->
			
		
		
		
		
		
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
			
				import {retencion_webcontrol,retencion_webcontrol1} from './webroot/js/JavaScript/contabilidad/facturacion/retencion/js/webcontrol/retencion_webcontrol.js?random=1';
				
				retencion_webcontrol1.setretencion_constante(window.retencion_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(retencion_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

