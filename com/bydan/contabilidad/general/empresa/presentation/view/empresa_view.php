<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\general\empresa\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Empresa Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/general/empresa/util/empresa_carga.php');
	use com\bydan\contabilidad\general\empresa\util\empresa_carga;
	
	//include_once('com/bydan/contabilidad/general/empresa/presentation/view/empresa_web.php');
	//use com\bydan\contabilidad\general\empresa\presentation\view\empresa_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	empresa_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	empresa_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$empresa_web1= new empresa_web();	
	$empresa_web1->cargarDatosGenerales();
	
	//$moduloActual=$empresa_web1->moduloActual;
	//$usuarioActual=$empresa_web1->usuarioActual;
	//$sessionBase=$empresa_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$empresa_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/empresa/js/templating/empresa_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/empresa/js/templating/empresa_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/empresa/js/templating/empresa_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/general/empresa/js/templating/empresa_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			empresa_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					empresa_web::$GET_POST=$_GET;
				} else {
					empresa_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			empresa_web::$STR_NOMBRE_PAGINA = 'empresa_view.php';
			empresa_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			empresa_web::$BIT_ES_PAGINA_FORM = 'false';
				
			empresa_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {empresa_constante,empresa_constante1} from './webroot/js/JavaScript/contabilidad/general/empresa/js/util/empresa_constante.js?random=1';
			import {empresa_funcion,empresa_funcion1} from './webroot/js/JavaScript/contabilidad/general/empresa/js/util/empresa_funcion.js?random=1';
			
			let empresa_constante2 = new empresa_constante();
			
			empresa_constante2.STR_NOMBRE_PAGINA="<?php echo(empresa_web::$STR_NOMBRE_PAGINA); ?>";
			empresa_constante2.STR_TYPE_ON_LOADempresa="<?php echo(empresa_web::$STR_TYPE_ONLOAD); ?>";
			empresa_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(empresa_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			empresa_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(empresa_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			empresa_constante2.STR_ACTION="<?php echo(empresa_web::$STR_ACTION); ?>";
			empresa_constante2.STR_ES_POPUP="<?php echo(empresa_web::$STR_ES_POPUP); ?>";
			empresa_constante2.STR_ES_BUSQUEDA="<?php echo(empresa_web::$STR_ES_BUSQUEDA); ?>";
			empresa_constante2.STR_FUNCION_JS="<?php echo(empresa_web::$STR_FUNCION_JS); ?>";
			empresa_constante2.BIG_ID_ACTUAL="<?php echo(empresa_web::$BIG_ID_ACTUAL); ?>";
			empresa_constante2.BIG_ID_OPCION="<?php echo(empresa_web::$BIG_ID_OPCION); ?>";
			empresa_constante2.STR_OBJETO_JS="<?php echo(empresa_web::$STR_OBJETO_JS); ?>";
			empresa_constante2.STR_ES_RELACIONES="<?php echo(empresa_web::$STR_ES_RELACIONES); ?>";
			empresa_constante2.STR_ES_RELACIONADO="<?php echo(empresa_web::$STR_ES_RELACIONADO); ?>";
			empresa_constante2.STR_ES_SUB_PAGINA="<?php echo(empresa_web::$STR_ES_SUB_PAGINA); ?>";
			empresa_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(empresa_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			empresa_constante2.BIT_ES_PAGINA_FORM=<?php echo(empresa_web::$BIT_ES_PAGINA_FORM); ?>;
			empresa_constante2.STR_SUFIJO="<?php echo(empresa_web::$STR_SUF); ?>";//empresa
			empresa_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(empresa_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//empresa
			
			empresa_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(empresa_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			empresa_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($empresa_web1->moduloActual->getnombre()); ?>";
			empresa_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(empresa_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			empresa_constante2.BIT_ES_LOAD_NORMAL=true;
			/*empresa_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			empresa_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.empresa_constante2 = empresa_constante2;
			
		</script>
		
		<?php if(empresa_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.empresa_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.empresa_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="empresaActual" ></a>
	
	<div id="divResumenempresaActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(empresa_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(empresa_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(empresa_web::$STR_ES_BUSQUEDA=='false' && empresa_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(empresa_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(empresa_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(empresa_web::$STR_ES_RELACIONADO=='false' && empresa_web::$STR_ES_POPUP=='false' && empresa_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdempresaNuevoToolBar">
										<img id="imgNuevoToolBarempresa" name="imgNuevoToolBarempresa" title="Nuevo Empresa" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(empresa_web::$STR_ES_BUSQUEDA=='false' && empresa_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdempresaNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarempresa" name="imgNuevoGuardarCambiosToolBarempresa" title="Nuevo TABLA Empresa" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(empresa_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdempresaGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarempresa" name="imgGuardarCambiosToolBarempresa" title="Guardar Empresa" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(empresa_web::$STR_ES_RELACIONADO=='false' && empresa_web::$STR_ES_RELACIONES=='false' && empresa_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdempresaCopiarToolBar">
										<img id="imgCopiarToolBarempresa" name="imgCopiarToolBarempresa" title="Copiar Empresa" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdempresaDuplicarToolBar">
										<img id="imgDuplicarToolBarempresa" name="imgDuplicarToolBarempresa" title="Duplicar Empresa" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(empresa_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdempresaRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarempresa" name="imgRecargarInformacionToolBarempresa" title="Recargar Empresa" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdempresaAnterioresToolBar">
										<img id="imgAnterioresToolBarempresa" name="imgAnterioresToolBarempresa" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdempresaSiguientesToolBar">
										<img id="imgSiguientesToolBarempresa" name="imgSiguientesToolBarempresa" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdempresaAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarempresa" name="imgAbrirOrderByToolBarempresa" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((empresa_web::$STR_ES_RELACIONADO=='false' && empresa_web::$STR_ES_RELACIONES=='false') || empresa_web::$STR_ES_BUSQUEDA=='true'  || empresa_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdempresaCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarempresa" name="imgCerrarPaginaToolBarempresa" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trempresaCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedaempresa" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedaempresa',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trempresaCabeceraBusquedas/super -->

		<tr id="trBusquedaempresa" class="busqueda" style="display:table-row">
			<td id="tdBusquedaempresa" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedaempresa" name="frmBusquedaempresa">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedaempresa" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trempresaBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(empresa_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idciudad" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idciudad"> Por Ciudad</a></li>
						<li id="listrVisibleFK_Idpais" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idpais"> Por Pais</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idciudad">
					<table id="tblstrVisibleFK_Idciudad" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Ciudad</span>
						</td>
						<td align="center">
							<select id="FK_Idciudad-cmbid_ciudad" name="FK_Idciudad-cmbid_ciudad" title="Ciudad" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarempresaFK_Idciudad" name="btnBuscarempresaFK_Idciudad" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idpais">
					<table id="tblstrVisibleFK_Idpais" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo">Pais</span>
						</td>
						<td align="center">
							<select id="FK_Idpais-cmbid_pais" name="FK_Idpais-cmbid_pais" title="Pais" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscarempresaFK_Idpais" name="btnBuscarempresaFK_Idpais" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarempresa" style="display:table-row">
					<td id="tdParamsBuscarempresa">
		<?php if(empresa_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarempresa">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosempresa" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosempresa"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosempresa" name="ParamsBuscar-txtNumeroRegistrosempresa" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionempresa">
							<td id="tdGenerarReporteempresa" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosempresa" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosempresa" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionempresa" name="btnRecargarInformacionempresa" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginaempresa" name="btnImprimirPaginaempresa" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*empresa_web::$STR_ES_BUSQUEDA=='false'  &&*/ empresa_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderByempresa">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderByempresa" name="btnOrderByempresa" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
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

										<?php if(empresa_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdempresaConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosempresa -->

							</td><!-- tdGenerarReporteempresa -->
						</tr><!-- trRecargarInformacionempresa -->
					</table><!-- tblParamsBuscarNumeroRegistrosempresa -->
				</div> <!-- divParamsBuscarempresa -->
		<?php } ?>
				</td> <!-- tdParamsBuscarempresa -->
				</tr><!-- trParamsBuscarempresa -->
				</table> <!-- tblBusquedaempresa -->
				</form> <!-- frmBusquedaempresa -->
				

			</td> <!-- tdBusquedaempresa -->
		</tr> <!-- trBusquedaempresa/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(empresa_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divempresaPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblempresaPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmempresaAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnempresaAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="empresa_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnempresaAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmempresaAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblempresaPopupAjaxWebPart -->
		</div> <!-- divempresaPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(empresa_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trempresaTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdaempresa"></a>
		<img id="imgTablaParaDerechaempresa" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechaempresa'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdaempresa" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdaempresa'"/>
		<a id="TablaDerechaempresa"></a>
	</td>
</tr> <!-- trempresaTablaNavegacion/super -->
<?php } ?>

<tr id="trempresaTablaDatos">
	<td colspan="3" id="htmlTableCellempresa">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosempresasAjaxWebPart">
		</div>
	</td>
</tr> <!-- trempresaTablaDatos/super -->
		
		
		<tr id="trempresaPaginacion" style="display:table-row">
			<td id="tdempresaPaginacion" align="left">
				<div id="divempresaPaginacionAjaxWebPart">
				<form id="frmPaginacionempresa" name="frmPaginacionempresa">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionempresa" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(empresa_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkempresa" name="btnSeleccionarLoteFkempresa" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(empresa_web::$STR_ES_RELACIONADO=='false' /*&& empresa_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresempresa" name="btnAnterioresempresa" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(empresa_web::$STR_ES_BUSQUEDA=='false' && empresa_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdempresaNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararempresa" name="btnNuevoTablaPrepararempresa" title="NUEVO Empresa" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablaempresa" name="ParamsPaginar-txtNumeroNuevoTablaempresa" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(empresa_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdempresaConEditarempresa">
							<label>
								<input id="ParamsBuscar-chbConEditarempresa" name="ParamsBuscar-chbConEditarempresa" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(empresa_web::$STR_ES_RELACIONADO=='false'/* && empresa_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesempresa" name="btnSiguientesempresa" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionempresa -->
				</form> <!-- frmPaginacionempresa -->
				<form id="frmNuevoPrepararempresa" name="frmNuevoPrepararempresa">
				<table id="tblNuevoPrepararempresa" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trempresaNuevo" height="10">
						<?php if(empresa_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdempresaNuevo" align="center">
							<input type="button" id="btnNuevoPrepararempresa" name="btnNuevoPrepararempresa" title="NUEVO Empresa" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdempresaGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosempresa" name="btnGuardarCambiosempresa" title="GUARDAR Empresa" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(empresa_web::$STR_ES_RELACIONADO=='false' && empresa_web::$STR_ES_RELACIONES=='false' && empresa_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdempresaDuplicar" align="center">
							<input type="button" id="btnDuplicarempresa" name="btnDuplicarempresa" title="DUPLICAR Empresa" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdempresaCopiar" align="center">
							<input type="button" id="btnCopiarempresa" name="btnCopiarempresa" title="COPIAR Empresa" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(empresa_web::$STR_ES_RELACIONADO=='false' && ((empresa_web::$STR_ES_RELACIONADO=='false' && empresa_web::$STR_ES_RELACIONES=='false') || empresa_web::$STR_ES_BUSQUEDA=='true'  || empresa_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdempresaCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginaempresa" name="btnCerrarPaginaempresa" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararempresa -->
				</form> <!-- frmNuevoPrepararempresa -->
				</div> <!-- divempresaPaginacionAjaxWebPart -->
			</td> <!-- tdempresaPaginacion -->
		</tr> <!-- trempresaPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(empresa_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesempresaAjaxWebPart">
			<td id="tdAccionesRelacionesempresaAjaxWebPart">
				<div id="divAccionesRelacionesempresaAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesempresaAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesempresaAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderByempresa">
			<td id="tdOrderByempresa">
				<form id="frmOrderByempresa" name="frmOrderByempresa">
					<div id="divOrderByempresaAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderByempresa -->
		</tr> <!-- trOrderByempresa/super -->
			
		
		
		
		
		
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
			
				import {empresa_webcontrol,empresa_webcontrol1} from './webroot/js/JavaScript/contabilidad/general/empresa/js/webcontrol/empresa_webcontrol.js?random=1';
				
				empresa_webcontrol1.setempresa_constante(window.empresa_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(empresa_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

