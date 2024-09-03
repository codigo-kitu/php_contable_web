<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\seguridad\campo\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Campo Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/seguridad/campo/util/campo_carga.php');
	use com\bydan\contabilidad\seguridad\campo\util\campo_carga;
	
	//include_once('com/bydan/contabilidad/seguridad/campo/presentation/view/campo_web.php');
	//use com\bydan\contabilidad\seguridad\campo\presentation\view\campo_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	campo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	campo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$campo_web1= new campo_web();	
	$campo_web1->cargarDatosGenerales();
	
	//$moduloActual=$campo_web1->moduloActual;
	//$usuarioActual=$campo_web1->usuarioActual;
	//$sessionBase=$campo_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$campo_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/campo/js/templating/campo_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/campo/js/templating/campo_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/campo/js/templating/campo_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/campo/js/templating/campo_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/seguridad/campo/js/templating/campo_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			campo_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					campo_web::$GET_POST=$_GET;
				} else {
					campo_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			campo_web::$STR_NOMBRE_PAGINA = 'campo_view.php';
			campo_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			campo_web::$BIT_ES_PAGINA_FORM = 'false';
				
			campo_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {campo_constante,campo_constante1} from './webroot/js/JavaScript/contabilidad/seguridad/campo/js/util/campo_constante.js?random=1';
			import {campo_funcion,campo_funcion1} from './webroot/js/JavaScript/contabilidad/seguridad/campo/js/util/campo_funcion.js?random=1';
			
			let campo_constante2 = new campo_constante();
			
			campo_constante2.STR_NOMBRE_PAGINA="<?php echo(campo_web::$STR_NOMBRE_PAGINA); ?>";
			campo_constante2.STR_TYPE_ON_LOADcampo="<?php echo(campo_web::$STR_TYPE_ONLOAD); ?>";
			campo_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(campo_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			campo_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(campo_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			campo_constante2.STR_ACTION="<?php echo(campo_web::$STR_ACTION); ?>";
			campo_constante2.STR_ES_POPUP="<?php echo(campo_web::$STR_ES_POPUP); ?>";
			campo_constante2.STR_ES_BUSQUEDA="<?php echo(campo_web::$STR_ES_BUSQUEDA); ?>";
			campo_constante2.STR_FUNCION_JS="<?php echo(campo_web::$STR_FUNCION_JS); ?>";
			campo_constante2.BIG_ID_ACTUAL="<?php echo(campo_web::$BIG_ID_ACTUAL); ?>";
			campo_constante2.BIG_ID_OPCION="<?php echo(campo_web::$BIG_ID_OPCION); ?>";
			campo_constante2.STR_OBJETO_JS="<?php echo(campo_web::$STR_OBJETO_JS); ?>";
			campo_constante2.STR_ES_RELACIONES="<?php echo(campo_web::$STR_ES_RELACIONES); ?>";
			campo_constante2.STR_ES_RELACIONADO="<?php echo(campo_web::$STR_ES_RELACIONADO); ?>";
			campo_constante2.STR_ES_SUB_PAGINA="<?php echo(campo_web::$STR_ES_SUB_PAGINA); ?>";
			campo_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(campo_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			campo_constante2.BIT_ES_PAGINA_FORM=<?php echo(campo_web::$BIT_ES_PAGINA_FORM); ?>;
			campo_constante2.STR_SUFIJO="<?php echo(campo_web::$STR_SUF); ?>";//campo
			campo_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(campo_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//campo
			
			campo_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(campo_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			campo_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($campo_web1->moduloActual->getnombre()); ?>";
			campo_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(campo_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			campo_constante2.BIT_ES_LOAD_NORMAL=true;
			/*campo_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			campo_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.campo_constante2 = campo_constante2;
			
		</script>
		
		<?php if(campo_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.campo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.campo_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="campoActual" ></a>
	
	<div id="divResumencampoActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(campo_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(campo_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(campo_web::$STR_ES_BUSQUEDA=='false' && campo_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(campo_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(campo_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(campo_web::$STR_ES_RELACIONADO=='false' && campo_web::$STR_ES_POPUP=='false' && campo_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdcampoNuevoToolBar">
										<img id="imgNuevoToolBarcampo" name="imgNuevoToolBarcampo" title="Nuevo Campo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(campo_web::$STR_ES_BUSQUEDA=='false' && campo_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdcampoNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarcampo" name="imgNuevoGuardarCambiosToolBarcampo" title="Nuevo TABLA Campo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(campo_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcampoGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarcampo" name="imgGuardarCambiosToolBarcampo" title="Guardar Campo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(campo_web::$STR_ES_RELACIONADO=='false' && campo_web::$STR_ES_RELACIONES=='false' && campo_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdcampoCopiarToolBar">
										<img id="imgCopiarToolBarcampo" name="imgCopiarToolBarcampo" title="Copiar Campo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdcampoDuplicarToolBar">
										<img id="imgDuplicarToolBarcampo" name="imgDuplicarToolBarcampo" title="Duplicar Campo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(campo_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdcampoRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarcampo" name="imgRecargarInformacionToolBarcampo" title="Recargar Campo" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdcampoAnterioresToolBar">
										<img id="imgAnterioresToolBarcampo" name="imgAnterioresToolBarcampo" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdcampoSiguientesToolBar">
										<img id="imgSiguientesToolBarcampo" name="imgSiguientesToolBarcampo" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdcampoAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarcampo" name="imgAbrirOrderByToolBarcampo" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((campo_web::$STR_ES_RELACIONADO=='false' && campo_web::$STR_ES_RELACIONES=='false') || campo_web::$STR_ES_BUSQUEDA=='true'  || campo_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdcampoCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarcampo" name="imgCerrarPaginaToolBarcampo" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trcampoCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedacampo" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedacampo',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trcampoCabeceraBusquedas/super -->

		<tr id="trBusquedacampo" class="busqueda" style="display:table-row">
			<td id="tdBusquedacampo" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedacampo" name="frmBusquedacampo">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedacampo" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trcampoBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(campo_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idopcion" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idopcion"> Por Opcion</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idopcion">
					<table id="tblstrVisibleFK_Idopcion" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Opcion</span>
						</td>
						<td align="center">
							<select id="FK_Idopcion-cmbid_opcion" name="FK_Idopcion-cmbid_opcion" title="Opcion" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarcampoFK_Idopcion" name="btnBuscarcampoFK_Idopcion" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarcampo" style="display:table-row">
					<td id="tdParamsBuscarcampo">
		<?php if(campo_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarcampo">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistroscampo" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistroscampo"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistroscampo" name="ParamsBuscar-txtNumeroRegistroscampo" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacioncampo">
							<td id="tdGenerarReportecampo" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodoscampo" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodoscampo" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacioncampo" name="btnRecargarInformacioncampo" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginacampo" name="btnImprimirPaginacampo" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*campo_web::$STR_ES_BUSQUEDA=='false'  &&*/ campo_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBycampo">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBycampo" name="btnOrderBycampo" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelcampo" name="btnOrderByRelcampo" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(campo_web::$STR_ES_RELACIONES=='false' && campo_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(campo_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdcampoConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodoscampo -->

							</td><!-- tdGenerarReportecampo -->
						</tr><!-- trRecargarInformacioncampo -->
					</table><!-- tblParamsBuscarNumeroRegistroscampo -->
				</div> <!-- divParamsBuscarcampo -->
		<?php } ?>
				</td> <!-- tdParamsBuscarcampo -->
				</tr><!-- trParamsBuscarcampo -->
				</table> <!-- tblBusquedacampo -->
				</form> <!-- frmBusquedacampo -->
				

			</td> <!-- tdBusquedacampo -->
		</tr> <!-- trBusquedacampo/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(campo_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divcampoPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblcampoPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmcampoAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btncampoAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="campo_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btncampoAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmcampoAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblcampoPopupAjaxWebPart -->
		</div> <!-- divcampoPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(campo_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trcampoTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdacampo"></a>
		<img id="imgTablaParaDerechacampo" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechacampo'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdacampo" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdacampo'"/>
		<a id="TablaDerechacampo"></a>
	</td>
</tr> <!-- trcampoTablaNavegacion/super -->
<?php } ?>

<tr id="trcampoTablaDatos">
	<td colspan="3" id="htmlTableCellcampo">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatoscamposAjaxWebPart">
		</div>
	</td>
</tr> <!-- trcampoTablaDatos/super -->
		
		
		<tr id="trcampoPaginacion" style="display:table-row">
			<td id="tdcampoPaginacion" align="center">
				<div id="divcampoPaginacionAjaxWebPart">
				<form id="frmPaginacioncampo" name="frmPaginacioncampo">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacioncampo" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(campo_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkcampo" name="btnSeleccionarLoteFkcampo" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(campo_web::$STR_ES_RELACIONADO=='false' /*&& campo_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorescampo" name="btnAnteriorescampo" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(campo_web::$STR_ES_BUSQUEDA=='false' && campo_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdcampoNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararcampo" name="btnNuevoTablaPrepararcampo" title="NUEVO Campo" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablacampo" name="ParamsPaginar-txtNumeroNuevoTablacampo" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(campo_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdcampoConEditarcampo">
							<label>
								<input id="ParamsBuscar-chbConEditarcampo" name="ParamsBuscar-chbConEditarcampo" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(campo_web::$STR_ES_RELACIONADO=='false'/* && campo_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientescampo" name="btnSiguientescampo" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacioncampo -->
				</form> <!-- frmPaginacioncampo -->
				<form id="frmNuevoPrepararcampo" name="frmNuevoPrepararcampo">
				<table id="tblNuevoPrepararcampo" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trcampoNuevo" height="10">
						<?php if(campo_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdcampoNuevo" align="center">
							<input type="button" id="btnNuevoPrepararcampo" name="btnNuevoPrepararcampo" title="NUEVO Campo" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdcampoGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambioscampo" name="btnGuardarCambioscampo" title="GUARDAR Campo" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(campo_web::$STR_ES_RELACIONADO=='false' && campo_web::$STR_ES_RELACIONES=='false' && campo_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdcampoDuplicar" align="center">
							<input type="button" id="btnDuplicarcampo" name="btnDuplicarcampo" title="DUPLICAR Campo" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdcampoCopiar" align="center">
							<input type="button" id="btnCopiarcampo" name="btnCopiarcampo" title="COPIAR Campo" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(campo_web::$STR_ES_RELACIONADO=='false' && ((campo_web::$STR_ES_RELACIONADO=='false' && campo_web::$STR_ES_RELACIONES=='false') || campo_web::$STR_ES_BUSQUEDA=='true'  || campo_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdcampoCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginacampo" name="btnCerrarPaginacampo" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararcampo -->
				</form> <!-- frmNuevoPrepararcampo -->
				</div> <!-- divcampoPaginacionAjaxWebPart -->
			</td> <!-- tdcampoPaginacion -->
		</tr> <!-- trcampoPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(campo_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionescampoAjaxWebPart">
			<td id="tdAccionesRelacionescampoAjaxWebPart">
				<div id="divAccionesRelacionescampoAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionescampoAjaxWebPart -->
		</tr> <!-- trAccionesRelacionescampoAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBycampo">
			<td id="tdOrderBycampo">
				<form id="frmOrderBycampo" name="frmOrderBycampo">
					<div id="divOrderBycampoAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelcampo" name="frmOrderByRelcampo">
					<div id="divOrderByRelcampoAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBycampo -->
		</tr> <!-- trOrderBycampo/super -->
			
		
		
		
		
		
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
			
				import {campo_webcontrol,campo_webcontrol1} from './webroot/js/JavaScript/contabilidad/seguridad/campo/js/webcontrol/campo_webcontrol.js?random=1';
				
				campo_webcontrol1.setcampo_constante(window.campo_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(campo_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

