<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\estimados\estimado\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Estimado Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/estimados/estimado/util/estimado_carga.php');
	use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
	
	//include_once('com/bydan/contabilidad/estimados/estimado/presentation/view/estimado_web.php');
	//use com\bydan\contabilidad\estimados\estimado\presentation\view\estimado_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	estimado_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	estimado_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$estimado_web1= new estimado_web();	
	$estimado_web1->cargarDatosGenerales();
	
	//$moduloActual=$estimado_web1->moduloActual;
	//$usuarioActual=$estimado_web1->usuarioActual;
	//$sessionBase=$estimado_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$estimado_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/estimado/js/templating/estimado_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/estimado/js/templating/estimado_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/estimado/js/templating/estimado_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/estimado/js/templating/estimado_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/estimados/estimado/js/templating/estimado_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			estimado_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					estimado_web::$GET_POST=$_GET;
				} else {
					estimado_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			estimado_web::$STR_NOMBRE_PAGINA = 'estimado_view.php';
			estimado_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			estimado_web::$BIT_ES_PAGINA_FORM = 'false';
				
			estimado_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {estimado_constante,estimado_constante1} from './webroot/js/JavaScript/contabilidad/estimados/estimado/js/util/estimado_constante.js?random=1';
			import {estimado_funcion,estimado_funcion1} from './webroot/js/JavaScript/contabilidad/estimados/estimado/js/util/estimado_funcion.js?random=1';
			
			let estimado_constante2 = new estimado_constante();
			
			estimado_constante2.STR_NOMBRE_PAGINA="<?php echo(estimado_web::$STR_NOMBRE_PAGINA); ?>";
			estimado_constante2.STR_TYPE_ON_LOADestimado="<?php echo(estimado_web::$STR_TYPE_ONLOAD); ?>";
			estimado_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(estimado_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			estimado_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(estimado_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			estimado_constante2.STR_ACTION="<?php echo(estimado_web::$STR_ACTION); ?>";
			estimado_constante2.STR_ES_POPUP="<?php echo(estimado_web::$STR_ES_POPUP); ?>";
			estimado_constante2.STR_ES_BUSQUEDA="<?php echo(estimado_web::$STR_ES_BUSQUEDA); ?>";
			estimado_constante2.STR_FUNCION_JS="<?php echo(estimado_web::$STR_FUNCION_JS); ?>";
			estimado_constante2.BIG_ID_ACTUAL="<?php echo(estimado_web::$BIG_ID_ACTUAL); ?>";
			estimado_constante2.BIG_ID_OPCION="<?php echo(estimado_web::$BIG_ID_OPCION); ?>";
			estimado_constante2.STR_OBJETO_JS="<?php echo(estimado_web::$STR_OBJETO_JS); ?>";
			estimado_constante2.STR_ES_RELACIONES="<?php echo(estimado_web::$STR_ES_RELACIONES); ?>";
			estimado_constante2.STR_ES_RELACIONADO="<?php echo(estimado_web::$STR_ES_RELACIONADO); ?>";
			estimado_constante2.STR_ES_SUB_PAGINA="<?php echo(estimado_web::$STR_ES_SUB_PAGINA); ?>";
			estimado_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(estimado_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			estimado_constante2.BIT_ES_PAGINA_FORM=<?php echo(estimado_web::$BIT_ES_PAGINA_FORM); ?>;
			estimado_constante2.STR_SUFIJO="<?php echo(estimado_web::$STR_SUF); ?>";//estimado
			estimado_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(estimado_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//estimado
			
			estimado_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(estimado_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			estimado_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($estimado_web1->moduloActual->getnombre()); ?>";
			estimado_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(estimado_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			estimado_constante2.BIT_ES_LOAD_NORMAL=true;
			/*estimado_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			estimado_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.estimado_constante2 = estimado_constante2;
			
		</script>
		
		<?php if(estimado_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.estimado_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.estimado_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="estimadoActual" ></a>
	
	<div id="divResumenestimadoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(estimado_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(estimado_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(estimado_web::$STR_ES_BUSQUEDA=='false' && estimado_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(estimado_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(estimado_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(estimado_web::$STR_ES_RELACIONADO=='false' && estimado_web::$STR_ES_POPUP=='false' && estimado_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdestimadoNuevoToolBar">
										<img id="imgNuevoToolBarestimado" name="imgNuevoToolBarestimado" title="Nuevo Estimado" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(estimado_web::$STR_ES_BUSQUEDA=='false' && estimado_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdestimadoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarestimado" name="imgNuevoGuardarCambiosToolBarestimado" title="Nuevo TABLA Estimado" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(estimado_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdestimadoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarestimado" name="imgGuardarCambiosToolBarestimado" title="Guardar Estimado" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(estimado_web::$STR_ES_RELACIONADO=='false' && estimado_web::$STR_ES_RELACIONES=='false' && estimado_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdestimadoCopiarToolBar">
										<img id="imgCopiarToolBarestimado" name="imgCopiarToolBarestimado" title="Copiar Estimado" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdestimadoDuplicarToolBar">
										<img id="imgDuplicarToolBarestimado" name="imgDuplicarToolBarestimado" title="Duplicar Estimado" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(estimado_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdestimadoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarestimado" name="imgRecargarInformacionToolBarestimado" title="Recargar Estimado" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdestimadoAnterioresToolBar">
										<img id="imgAnterioresToolBarestimado" name="imgAnterioresToolBarestimado" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdestimadoSiguientesToolBar">
										<img id="imgSiguientesToolBarestimado" name="imgSiguientesToolBarestimado" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdestimadoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarestimado" name="imgAbrirOrderByToolBarestimado" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((estimado_web::$STR_ES_RELACIONADO=='false' && estimado_web::$STR_ES_RELACIONES=='false') || estimado_web::$STR_ES_BUSQUEDA=='true'  || estimado_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdestimadoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarestimado" name="imgCerrarPaginaToolBarestimado" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trestimadoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaestimado" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaestimado',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trestimadoCabeceraBusquedas/super -->

		<tr id="trBusquedaestimado" class="busqueda" style="display:table-row">
			<td id="tdBusquedaestimado" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaestimado" name="frmBusquedaestimado">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaestimado" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trestimadoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(estimado_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 80%">
					<ul>
						<li id="listrVisibleFK_Idcliente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcliente"> Por Cliente</a></li>
						<li id="listrVisibleFK_Idestado" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado"> Por Estado</a></li>
						<li id="listrVisibleFK_Idmoneda" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idmoneda"> Por Moneda</a></li>
						<li id="listrVisibleFK_Idproveedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idproveedor"> Por Proveedor</a></li>
						<li id="listrVisibleFK_Idtermino_pago" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtermino_pago"> Por Pago</a></li>
						<li id="listrVisibleFK_Idvendedor" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idvendedor"> Por Vendedor</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcliente">
					<table id="tblstrVisibleFK_Idcliente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Cliente</span>
						</td>
						<td align="center">
							<select id="FK_Idcliente-cmbid_cliente" name="FK_Idcliente-cmbid_cliente" title="Cliente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarestimadoFK_Idcliente" name="btnBuscarestimadoFK_Idcliente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idestado">
					<table id="tblstrVisibleFK_Idestado" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Estado</span>
						</td>
						<td align="center">
							<select id="FK_Idestado-cmbid_estado" name="FK_Idestado-cmbid_estado" title="Estado" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarestimadoFK_Idestado" name="btnBuscarestimadoFK_Idestado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idmoneda">
					<table id="tblstrVisibleFK_Idmoneda" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Moneda</span>
						</td>
						<td align="center">
							<select id="FK_Idmoneda-cmbid_moneda" name="FK_Idmoneda-cmbid_moneda" title="Moneda" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarestimadoFK_Idmoneda" name="btnBuscarestimadoFK_Idmoneda" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idproveedor">
					<table id="tblstrVisibleFK_Idproveedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Proveedor</span>
						</td>
						<td align="center">
							<select id="FK_Idproveedor-cmbid_proveedor" name="FK_Idproveedor-cmbid_proveedor" title="Proveedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarestimadoFK_Idproveedor" name="btnBuscarestimadoFK_Idproveedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtermino_pago">
					<table id="tblstrVisibleFK_Idtermino_pago" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Pago</span>
						</td>
						<td align="center">
							<select id="FK_Idtermino_pago-cmbid_termino_pago_cliente" name="FK_Idtermino_pago-cmbid_termino_pago_cliente" title="Pago" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarestimadoFK_Idtermino_pago" name="btnBuscarestimadoFK_Idtermino_pago" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idvendedor">
					<table id="tblstrVisibleFK_Idvendedor" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Vendedor</span>
						</td>
						<td align="center">
							<select id="FK_Idvendedor-cmbid_vendedor" name="FK_Idvendedor-cmbid_vendedor" title="Vendedor" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarestimadoFK_Idvendedor" name="btnBuscarestimadoFK_Idvendedor" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarestimado" style="display:table-row">
					<td id="tdParamsBuscarestimado">
		<?php if(estimado_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarestimado">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosestimado" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosestimado"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosestimado" name="ParamsBuscar-txtNumeroRegistrosestimado" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionestimado">
							<td id="tdGenerarReporteestimado" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosestimado" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosestimado" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionestimado" name="btnRecargarInformacionestimado" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaestimado" name="btnImprimirPaginaestimado" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*estimado_web::$STR_ES_BUSQUEDA=='false'  &&*/ estimado_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByestimado">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByestimado" name="btnOrderByestimado" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelestimado" name="btnOrderByRelestimado" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(estimado_web::$STR_ES_RELACIONES=='false' && estimado_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(estimado_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdestimadoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosestimado -->

							</td><!-- tdGenerarReporteestimado -->
						</tr><!-- trRecargarInformacionestimado -->
					</table><!-- tblParamsBuscarNumeroRegistrosestimado -->
				</div> <!-- divParamsBuscarestimado -->
		<?php } ?>
				</td> <!-- tdParamsBuscarestimado -->
				</tr><!-- trParamsBuscarestimado -->
				</table> <!-- tblBusquedaestimado -->
				</form> <!-- frmBusquedaestimado -->
				

			</td> <!-- tdBusquedaestimado -->
		</tr> <!-- trBusquedaestimado/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(estimado_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divestimadoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblestimadoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmestimadoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnestimadoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="estimado_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnestimadoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmestimadoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblestimadoPopupAjaxWebPart -->
		</div> <!-- divestimadoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(estimado_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trestimadoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaestimado"></a>
		<img id="imgTablaParaDerechaestimado" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaestimado'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaestimado" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaestimado'"/>
		<a id="TablaDerechaestimado"></a>
	</td>
</tr> <!-- trestimadoTablaNavegacion/super -->
<?php } ?>

<tr id="trestimadoTablaDatos">
	<td colspan="3" id="htmlTableCellestimado">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosestimadosAjaxWebPart">
		</div>
	</td>
</tr> <!-- trestimadoTablaDatos/super -->
		
		
		<tr id="trestimadoPaginacion" style="display:table-row">
			<td id="tdestimadoPaginacion" align="left">
				<div id="divestimadoPaginacionAjaxWebPart">
				<form id="frmPaginacionestimado" name="frmPaginacionestimado">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionestimado" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(estimado_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkestimado" name="btnSeleccionarLoteFkestimado" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(estimado_web::$STR_ES_RELACIONADO=='false' /*&& estimado_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresestimado" name="btnAnterioresestimado" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(estimado_web::$STR_ES_BUSQUEDA=='false' && estimado_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdestimadoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararestimado" name="btnNuevoTablaPrepararestimado" title="NUEVO Estimado" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaestimado" name="ParamsPaginar-txtNumeroNuevoTablaestimado" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(estimado_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdestimadoConEditarestimado">
							<label>
								<input id="ParamsBuscar-chbConEditarestimado" name="ParamsBuscar-chbConEditarestimado" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(estimado_web::$STR_ES_RELACIONADO=='false'/* && estimado_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesestimado" name="btnSiguientesestimado" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionestimado -->
				</form> <!-- frmPaginacionestimado -->
				<form id="frmNuevoPrepararestimado" name="frmNuevoPrepararestimado">
				<table id="tblNuevoPrepararestimado" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trestimadoNuevo" height="10">
						<?php if(estimado_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdestimadoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararestimado" name="btnNuevoPrepararestimado" title="NUEVO Estimado" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdestimadoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosestimado" name="btnGuardarCambiosestimado" title="GUARDAR Estimado" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(estimado_web::$STR_ES_RELACIONADO=='false' && estimado_web::$STR_ES_RELACIONES=='false' && estimado_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdestimadoDuplicar" align="center">
							<input type="button" id="btnDuplicarestimado" name="btnDuplicarestimado" title="DUPLICAR Estimado" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdestimadoCopiar" align="center">
							<input type="button" id="btnCopiarestimado" name="btnCopiarestimado" title="COPIAR Estimado" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(estimado_web::$STR_ES_RELACIONADO=='false' && ((estimado_web::$STR_ES_RELACIONADO=='false' && estimado_web::$STR_ES_RELACIONES=='false') || estimado_web::$STR_ES_BUSQUEDA=='true'  || estimado_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdestimadoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaestimado" name="btnCerrarPaginaestimado" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararestimado -->
				</form> <!-- frmNuevoPrepararestimado -->
				</div> <!-- divestimadoPaginacionAjaxWebPart -->
			</td> <!-- tdestimadoPaginacion -->
		</tr> <!-- trestimadoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(estimado_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesestimadoAjaxWebPart">
			<td id="tdAccionesRelacionesestimadoAjaxWebPart">
				<div id="divAccionesRelacionesestimadoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesestimadoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesestimadoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByestimado">
			<td id="tdOrderByestimado">
				<form id="frmOrderByestimado" name="frmOrderByestimado">
					<div id="divOrderByestimadoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelestimado" name="frmOrderByRelestimado">
					<div id="divOrderByRelestimadoAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByestimado -->
		</tr> <!-- trOrderByestimado/super -->
			
		
		
		
		
		
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
			
				import {estimado_webcontrol,estimado_webcontrol1} from './webroot/js/JavaScript/contabilidad/estimados/estimado/js/webcontrol/estimado_webcontrol.js?random=1';
				
				estimado_webcontrol1.setestimado_constante(window.estimado_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(estimado_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

